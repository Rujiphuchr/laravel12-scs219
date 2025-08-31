<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข่าวการศึกษา</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 font-sans">

    @extends('layouts.app')
    @section('content')

        <main class="container mx-auto max-w-7xl px-4 py-8">
            <h1 class="text-4xl font-bold text-center text-orange-600 mb-12">ข่าวการศึกษาล่าสุด</h1>

            <!-- Latest News Card -->
            @if ($latestNews)
                <a href="{{ route('news.detail', ['id' => $latestNews->id]) }}" class="block mb-8 md:mb-12 group">
                    <div
                        class="bg-white rounded-3xl shadow-2xl overflow-hidden md:flex md:items-center transition duration-500 hover:scale-[1.02] hover:shadow-orange-200">
                        <img src="{{ $latestNews->image_url }}" alt="{{ $latestNews->title }}"
                            class="w-full md:w-1/2 h-64 object-cover object-center transition duration-300 group-hover:opacity-80">
                        <div class="p-6 md:p-8 flex flex-col justify-between w-full md:w-1/2">
                            <div>
                                <span class="text-sm text-gray-500 font-medium flex items-center">
                                    <i class="fas fa-calendar-alt text-orange-400 mr-2"></i>
                                    {{ \Carbon\Carbon::parse($latestNews->created_at)->format('d F Y') }}
                                </span>
                                <h2
                                    class="mt-3 text-2xl md:text-3xl font-bold text-gray-800 leading-tight group-hover:text-orange-600 transition duration-300">
                                    {{ $latestNews->title }}</h2>
                                <p class="mt-4 text-gray-600 hidden md:block">{{ Str::limit($latestNews->content, 200) }}
                                </p>
                            </div>
                            <div class="mt-4 flex items-center text-orange-600 font-bold">
                                <span>อ่านต่อ</span>
                                <i
                                    class="fas fa-arrow-right ml-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @endif

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($otherNews as $news)
                    <div class="relative group h-full">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-orange-400 to-orange-300 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-300">
                        </div>
                        <a href="{{ route('news.detail', ['id' => $news->id]) }}"
                            class="relative flex flex-col h-full bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ $news->image_url }}"
                                class="w-full h-48 object-cover transform group-hover:scale-105 transition duration-500"
                                alt="{{ $news->title }}">
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="font-bold text-xl mb-3 group-hover:text-orange-600 transition duration-300">
                                    {{ Str::limit($news->title, 60) }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 flex-grow">
                                    {{ Str::limit($news->content, 120) }}
                                </p>
                                <div class="flex justify-between items-center text-sm text-gray-500 mt-auto">
                                    <span>
                                        <i class="far fa-clock mr-1"></i>
                                        {{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}
                                    </span>
                                    <span
                                        class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700">
                                        อ่านต่อ
                                        <i
                                            class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </main>
        
    @endsection

</body>

</html>
