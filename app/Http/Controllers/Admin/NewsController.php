<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $news = News::create(
            $request->only(['title', 'description', 'author', 'image', 'status', 'category_id', 'created_at' => now('GMT+3')])
        );

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость добавлена');
        }
        return back()->withInput()->with('error', 'Не удалось добавить новость');
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
    public function update(Request $request, News $news)
    {
 
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $news = $news->fill($request->only(['title', 'description', 'author', 'image', 'status', 'category_id', 'updated_at' => now('GMT+3')]))
            ->save();

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость изменена успешно');
        }

        return back()->withInput()->with('error', 'Не удалось измененить новость');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  News $news)
    {
        if($request->ajax()){
            try{
                $news->delete();
                return response()->json('ok');
            }
            catch (\Exception $e){                
                return response()->json('error', 400);
            }
        }
    }
}
