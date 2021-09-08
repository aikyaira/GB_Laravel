<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResourceRequest;
use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function parce(Resource $resource)
    {
        dd($resource->url);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.resources.index", [
            "resourcesList" => Resource::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.resources.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourceRequest $request)
    {
        $resource = Resource::create($request->validated());

        if ($resource) {
            return redirect()->route('admin.resources.index')
                ->with('success', trans('messages.admin.resource.store.success'));
        }

        return back()->withInput()->with('error', trans('messages.admin.resource.store.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', [
            'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResourceRequest $request, Resource $resource)
    {

        $resource = $resource->fill($request->validated())->save();

        if ($resource) {
            return redirect()->route('admin.resources.index')
                ->with('success', trans('messages.admin.resource.update.success'));
        }

        return back()->withInput()->with('error', trans('messages.admin.resource.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Resource $resource)
    {
        if ($request->ajax()) {
            try {
                $resource->delete();
                return response()->json('ok');
            } catch (\Exception $e) {
                return response()->json('error', 400);
            }
        }
    }
}
