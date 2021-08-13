<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{

    protected function getNewsItem($id)
    {
        return DB::table('news')->find($id);
    }

    protected function getNewsList()
    {
        return DB::table('news')->get();
    }

    protected function getCategoryItem($id)
    {
        $category = DB::table('categories')
            ->join('news', 'categories.id', '=', 'news.category_id')
            ->select('news.*', 'categories.title as category_title')
            ->where('category_id', '=', $id)
            ->get();
        return $category;
    }
    protected function getCategoryItemName($id)
    {

        return DB::table('categories')->select('title')->find($id);;
    }
    protected function getCategoriesList()
    {
        return DB::table('categories')->get();
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
