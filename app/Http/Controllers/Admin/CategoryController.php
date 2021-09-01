<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catgoriesList = Category::all();
        return view("admin.categories.index", [
            "categoriesList" => $catgoriesList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
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
            'title' => ['required', 'string']
        ]);

        $category = Category::create(
            $request->only(['title', 'description', 'created_at' => now('GMT+3')])
        );

        if ($category) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория добавлена');
        }
        return back()->withInput()->with('error', 'Не удалось добавить категорию');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $category = $category->fill($request->only(['title', 'description', 'updated_at' => now('GMT+3')]))
            ->save();

        if ($category) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория изменена успешно');
        }

        return back()->withInput()->with('error', 'Не удалось измененить категорию');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  Category $category)
    {
        if($request->ajax()){
            try{
                $category->delete();
                return response()->json('ok');
            }
            catch (\Exception $e){                
                return response()->json('error', 400);
            }
        }
    }
}
