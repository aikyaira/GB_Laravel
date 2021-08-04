<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        //show news list
        return view('news.index', [
            'news' => $this->newsList
        ]);
    }

    public function show(int $id)
    {

        if (empty($this->getNewsElement($id))) {
            abort(404);
        }

        return view('news.show', [
            'news' => $this->getNewsElement($id)
        ]);
    }
}
