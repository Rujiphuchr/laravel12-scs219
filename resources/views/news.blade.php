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

            <h1 class="text-4xl font-bold text-center text-orange-600 mb-8">ข่าวการศึกษาล่าสุด</h1>

            <!-- ปุ่มเพิ่มข่าว -->
            <div class="flex justify-end mb-6">
                <a href="{{ route('news.create') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md transition">
                    ➕ เพิ่มข่าว
                </a>
            </div>

            <!-- แจ้งเตือนเมื่อทำรายการสำเร็จ -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- ข่าวล่าสุด -->
            @if ($latestNews)
                <div class="mb-8 md:mb-12 group">
                    <div
                        class="bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2 transition duration-500 hover:scale-[1.02] hover:shadow-orange-200">

                        <!-- ภาพฝั่งซ้ายเต็ม -->
                        <a href="{{ route('news.detail', ['id' => $latestNews->id]) }}" class="block w-full h-full">
                            <img src="{{ $latestNews->image_url }}" alt="{{ $latestNews->title }}"
                                class="w-full h-full object-cover object-center transition duration-300 group-hover:opacity-80">
                        </a>

                        <!-- ข้อความฝั่งขวา -->
                        <div class="flex flex-col justify-between p-6 md:p-8">
                            <div>
                                <span class="text-sm text-gray-500 font-medium flex items-center">
                                    <i class="fas fa-calendar-alt text-orange-400 mr-2"></i>
                                    {{ \Carbon\Carbon::parse($latestNews->created_at)->format('d F Y') }}
                                </span>
                                <h2
                                    class="mt-3 text-2xl md:text-3xl font-bold text-gray-800 leading-tight group-hover:text-orange-600 transition duration-300">
                                    {{ $latestNews->title }}
                                </h2>
                                <p class="mt-4 text-gray-600 hidden md:block">{{ Str::limit($latestNews->content, 200) }}
                                </p>
                            </div>

                            <!-- อ่านต่อ -->
                            <div class="mt-4">
                                <a href="{{ route('news.detail', ['id' => $latestNews->id]) }}"
                                    class="flex items-center text-orange-600 font-bold hover:underline">
                                    <span>อ่านต่อ</span>
                                    <i
                                        class="fas fa-arrow-right ml-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                                </a>
                            </div>

                            <!-- ปุ่มแก้ไข / ลบ -->
                            <div class="mt-4 flex justify-end gap-4 border-t pt-3">
                                <a href="{{ route('news.edit', $latestNews->id) }}"
                                    class="text-blue-600 hover:text-blue-800 font-semibold">
                                    ✏️ แก้ไข
                                </a>
                                <form action="{{ route('news.destroy', $latestNews->id) }}" method="POST"
                                    onsubmit="return confirm('ยืนยันการลบข่าวนี้หรือไม่?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                        ❌ ลบ
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endif


            <!-- ข่าวอื่น ๆ -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($otherNews as $news)
                    <div class="relative group h-full">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-orange-400 to-orange-300 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-300">
                        </div>

                        <div class="relative flex flex-col h-full bg-white rounded-lg shadow-lg overflow-hidden">
                            <a href="{{ route('news.detail', ['id' => $news->id]) }}">
                                <img src="{{ $news->image_url }}"
                                    class="w-full h-48 object-cover transform group-hover:scale-105 transition duration-500"
                                    alt="{{ $news->title }}">
                            </a>

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
                                    <a href="{{ route('news.detail', ['id' => $news->id]) }}"
                                        class="flex items-center text-orange-600 font-bold hover:underline">
                                        <span>อ่านต่อ</span>
                                        <i
                                            class="fas fa-arrow-right ml-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                                    </a>
                                </div>

                                <!-- ปุ่มแก้ไข / ลบ -->
                                <div class="mt-4 flex justify-between border-t pt-3">
                                    <a href="{{ route('news.edit', $news->id) }}"
                                        class="text-blue-600 hover:text-blue-800 font-semibold">
                                        ✏️ แก้ไข
                                    </a>

                                    <form action="{{ route('news.destroy', $news->id) }}" method="POST"
                                        onsubmit="return confirm('ยืนยันการลบข่าวนี้หรือไม่?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                            ❌ ลบ
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </main>
    @endsection
</body>

</html>
