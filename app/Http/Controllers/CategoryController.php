<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => $this->getCategoriesList()
        ]);
    }
    public function show(int $id)
    {
        if (empty($this->getCategoryItem($id))) {
            abort(404);
        }
        
        return view('categories.show', [
            'categoryName' => $this->getCategoryItemName($id),
            'newsList' => $this->getCategoryItem($id),
        ]);
    }
}
