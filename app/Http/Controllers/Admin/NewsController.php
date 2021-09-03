<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.news.index", [
            "newsList" => News::all(),
            "categoriesList" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.news.create", [
            "categoriesList" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {

        $news = News::create($request->validated());

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.store.success'));
        }
        
        return back()->withInput()->with('error', trans('messages.admin.news.store.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'categoriesList' => Category::all(),
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {

        $news = $news->fill($request->validated())->save();

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.update.success'));
        }

        return back()->withInput()->with('error', trans('messages.admin.news.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  News $news)
    {
        if ($request->ajax()) {
            try {
                $news->delete();
                return response()->json('ok');
            } catch (\Exception $e) {
                return response()->json('error', 400);
            }
        }
    }
}
