<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ParcerContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParcerRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\ParcerService;
use Illuminate\Http\Request;

class ParcerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ParcerContract $parcer)
    {
        $url = 'https://news.yandex.ru/music.rss';

        dd($parcer->getData($url));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.parcer.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.parcer.create", [
            'categoriesList' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParcerRequest $request, ParcerContract $parcer)
    {
       $data=$parcer->getData($request->validated()['url']);
        foreach ($data['news'] as $item) {
            $news = News::create([
                'category_id'=>$request->validated()['category_id'],
                'title' => $item['title'],
                'description' => $item['description'],
                'link' => $item['link'],
                'author' => $request->validated()['author'],
            ]);
            if (!$news) {
                return back()->withInput()->with('error', trans('messages.admin.news.store.error'));
            }
        }
        return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.store.success'));

    }
}
