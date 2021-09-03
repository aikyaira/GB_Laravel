<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.orders.index", [
            "ordersList" =>  Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());
        if ($order) {
            $url = $request->headers->get('referer');
            return redirect($url)->with('success', trans('messages.admin.order.store.success'));
        }
        
        return back()->withInput()->with('error', trans('messages.admin.order.store.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {

        $order = $order->fill($request->validated())->save();

        if ($order) {
            return redirect()->route('admin.orders.index')
                ->with('success', trans('messages.admin.order.update.success'));
        }

        return back()->withInput()->with('error', trans('messages.admin.order.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  Order $order)
    {
        if($request->ajax()){
            try{
                $order->delete();
                return response()->json('ok');
            }
            catch (\Exception $e){                
                return response()->json('error', 400);
            }
        }
    }
}
