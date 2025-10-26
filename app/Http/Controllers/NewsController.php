<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Show the list of news articles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $allNews = News::orderBy('created_at', 'desc')->get();
        $latestNews = $allNews->shift();
        $otherNews = $allNews;

        return view('news', [
            'latestNews' => $latestNews,
            'otherNews' => $otherNews
        ]);
    }

    public function create()
    {
        return view('news-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|string',
        ]);

        News::create($request->all());
        return redirect()->route('news')->with('success', 'เพิ่มข่าวสำเร็จ!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news-form', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|string',
        ]);

        $news = News::findOrFail($id);
        $news->update($request->all());

        return redirect()->route('news')->with('success', 'แก้ไขข่าวสำเร็จ!');
    }

    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->route('news')->with('success', 'ลบข่าวสำเร็จ!');
    }

    /**
     * Show the details of a specific news article.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $createdAt = Carbon::parse($news->created_at);
        $now = Carbon::now();
        $daysAgo = $createdAt->diffInDays($now);

        return view('news-detail', [
            'news' => $news,
            'daysAgo' => $daysAgo
        ]);
    }
}
