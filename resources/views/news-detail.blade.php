<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 font-sans">

    @extends('layouts.app')
    @section('content')
        <main class="container mx-auto max-w-5xl px-4 py-8">
            <div class="bg-white rounded-3xl shadow-xl p-6 md:p-12">
                <a href="{{ route('news') }}"
                    class="inline-flex items-center text-orange-500 hover:text-orange-600 transition-colors duration-300 mb-6">
                    <i class="fas fa-arrow-left mr-2"></i> กลับหน้าหลัก
                </a>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight mb-4">{{ $news->title }}</h1>
                <div class="flex flex-col md:flex-row md:items-center text-sm text-gray-500 mb-6">
                    <span class="flex items-center"><i class="fas fa-clock mr-2 text-orange-400"></i>
                        {{ \Carbon\Carbon::parse($news->created_at)->format('d F Y H:i น.') }}</span>
                    <span class="hidden md:inline-block mx-2">•</span>
                    <span class="flex items-center mt-2 md:mt-0">
                        <i class="fas fa-history mr-2 text-orange-400"></i>
                        เผยแพร่เมื่อ
                        @php
                            $createdAt = \Carbon\Carbon::parse($news->created_at);
                            $now = \Carbon\Carbon::now();
                            $diffInDays = floor($createdAt->floatDiffInDays($now));

                            if ($diffInDays == 0) {
                                $diffInHours = floor($createdAt->floatDiffInHours($now));
                                if ($diffInHours == 0) {
                                    $diffInMinutes = floor($createdAt->floatDiffInMinutes($now));
                                    $timeAgo =
                                        $diffInMinutes > 0 ? "{$diffInMinutes} นาทีที่แล้ว" : 'ไม่กี่วินาทีที่แล้ว';
                                } else {
                                    $timeAgo = "{$diffInHours} ชั่วโมงที่แล้ว";
                                }
                            } else {
                                $timeAgo = "{$diffInDays} วันที่แล้ว";
                            }
                        @endphp
                        {{ $timeAgo }}
                    </span>
                    @php
                        // ดึง host
                        $host = parse_url($news->source_url, PHP_URL_HOST);

                        // ตัด www. ถ้ามี
                        $host = preg_replace('/^www\./', '', $host);

                        // แยกชื่อหลักก่อน dot แรก
                        $hostParts = explode('.', $host);
                        $sourceName = $hostParts[0];

                        // แสดงชื่อภาษาไทยหรืออังกฤษ

                    @endphp

                    <a href="{{ $news->source_url }}" target="_blank"
                        class="ml-auto text-orange-600 hover:underline mt-2 md:mt-0">
                        <span class="hidden md:inline-block">ที่มา:</span> {{ $sourceName }}
                    </a>


                </div>

                <img src="{{ $news->image_url }}" alt="{{ $news->title }}"
                    class="w-full h-auto rounded-2xl shadow-lg mb-8">

                <div class="text-gray-700 leading-relaxed text-lg space-y-6 text-justify">
                    @php
                        $paragraphs = preg_split('/\n\s*\n/', $news->content, -1, PREG_SPLIT_NO_EMPTY);
                    @endphp
                    @foreach ($paragraphs as $index => $paragraph)
                        @php
                            $formattedParagraph = $paragraph;
                            // First, convert URLs to clickable links.
                            $formattedParagraph = preg_replace(
                                '/(https?:\/\/[^\s]+)/',
                                '<a href="$1" class="text-orange-500 hover:underline" target="_blank">$1</a>',
                                $formattedParagraph,
                            );

                            // Then, safely find and color English words. This regex will not match words inside <a> tags.
                            $formattedParagraph = preg_replace_callback(
                                '/(<a\s+[^>]+>.*?<\/a>)|(\b[a-zA-Z]+\b)/',
                                function ($matches) {
                                    // If group 1 exists, it's an <a> tag, so return it as is.
        if (isset($matches[1]) && !empty($matches[1])) {
            return $matches[1];
        }
        // If group 2 exists, it's an English word. Wrap it in a span.
                                    if (isset($matches[2]) && !empty($matches[2])) {
                                        return '<span class="text-orange-500">' . $matches[2] . '</span>';
                                    }
                                    return $matches[0];
                                },
                                $formattedParagraph,
                            );
                        @endphp
                        <p class="indent-8">{!! $formattedParagraph !!}</p>
                    @endforeach
                </div>
            </div>
        </main>
    @endsection

</body>

</html>
