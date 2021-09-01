<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

class WidgetFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        /*$content = 'Сообщение от ' . $request->input('name') . ' c email ' . $request->input('email') . ' и телефоном ' . $request->input('phone') . ', со следующим текстом:' . $request->input('text');
        Storage::disk('local')->append('orderform.txt', $content);
        $url = $request->headers->get('referer');
        return redirect($url)->with('success', 'Спасибо, Ваше сообщение отправлено!');*/
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'int'],
            'text' => ['required', 'string']
        ]);
        $contact = Order::create(
            $request->only(['name', 'text', 'phone', 'email', 'created_at' => now('GMT+3')])
        );
        if ($contact) {
            $url = $request->headers->get('referer');
            return redirect($url)->with('success', 'Заказ успешно отправлен');
        }
        
        return back()->withInput()->with('error', 'Не удалось отправить Заказ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
