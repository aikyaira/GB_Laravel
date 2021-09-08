<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }
    public function show(Category $category)
    {
        return view('categories.show', [
            'categoryName' => $category->title,
            'newsList' => $category->news
        ]);
    }
}
