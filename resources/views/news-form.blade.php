@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-8">
        <h1 class="text-2xl font-bold text-orange-600 mb-6">
            {{ isset($news) ? 'แก้ไขข่าว' : 'เพิ่มข่าวใหม่' }}
        </h1>

        <form action="{{ isset($news) ? route('news.update', $news->id) : route('news.store') }}" method="POST">
            @csrf
            @if (isset($news))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">หัวข้อข่าว</label>
                <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-orange-200" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">URL รูปภาพ (ถ้ามี)</label>
                <input type="text" name="image_url" value="{{ old('image_url', $news->image_url ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-orange-200">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">เนื้อหาข่าว</label>
                <textarea name="content" rows="5"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-orange-200" required>{{ old('content', $news->content ?? '') }}</textarea>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('news') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">ยกเลิก</a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                    {{ isset($news) ? 'บันทึกการแก้ไข' : 'เพิ่มข่าว' }}
                </button>
            </div>
        </form>
    </div>
@endsection
