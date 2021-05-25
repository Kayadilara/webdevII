<?php

namespace App\Http\Controllers;
//DELETE THIS
use App\Repository\NewsRepository;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    } 

    function index()
    {
        return view('news.index', ['news' => NewsRepository::GetOverviewNews()]);
    }

    function show($id)
    {
        return view('news.detail', ['newsDetail' => News::find($id)]);
    }

    function create()
    {
        return view('news.create');
    }

    function store(Request $request)
    {
        $storeNews = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);

        News::create($storeNews);

        return redirect('/news');
    }

    function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', ['newsDetail' => $news]);
    }

    function update(Request $request, $id)
    {
        $updateNews = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        
        News::whereId($id)->update($updateNews);
        return redirect()->route('news.show', $id);
    }

    function destroy($id)
    {
        News::whereId($id)->delete();
        return redirect()->route('news.index');
    }
}
