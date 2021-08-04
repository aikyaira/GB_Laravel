<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //show categories list
        return view('categories.index', [
            'categories' => $this->categoriesList
        ]);
    }
    public function show(int $id)
    {
        if (empty($this->getCategory($id))) {
            abort(404);
        }

        return view('categories.show', [
            'category' => $this->getCategory($id),
            'newsList' => $this->getNewsList($id)
        ]);
    }
}
