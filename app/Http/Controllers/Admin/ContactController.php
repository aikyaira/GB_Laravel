<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("admin.contacts.index", [
            "contactsList" =>  Contact::all()
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', [
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'int'],
            'text' => ['required', 'string']
        ]);

        $contact = $contact->fill($request->only(['name', 'text', 'phone', 'email', 'created_at' => now('GMT+3')]))
            ->save();

        if ($contact) {
            return redirect()->route('admin.contacts.index')
                ->with('success', 'Сообщение изменено успешно');
        }

        return back()->withInput()->with('error', 'Не удалось измененить сообщение');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact)
    {
        if($request->ajax()){
            try{
                $contact->delete();
                return response()->json('ok');
            }
            catch (\Exception $e){                
                return response()->json('error', 400);
            }
        }
    }
}
