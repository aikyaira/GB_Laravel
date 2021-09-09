<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        //show news list
        return view('news.index', [
            'news' => News::paginate(18)
        ]);
    }

    public function show(News $news)
    {

        return view('news.show', [
            'news' => $news
        ]);
    }
}
