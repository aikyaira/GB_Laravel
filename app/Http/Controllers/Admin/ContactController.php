<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
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
    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->validated());
        if ($contact) {
            $url = $request->headers->get('referer');
            return redirect($url)->with('success', trans('messages.admin.contact.store.success'));
        }
        
        return back()->withInput()->with('error', trans('messages.admin.contact.store.error'));
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
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact = $contact->fill($request->validated())->save();

        if ($contact) {
            return redirect()->route('admin.orders.index')
                ->with('success', trans('messages.admin.contact.update.success'));
        }

        return back()->withInput()->with('error', trans('messages.admin.contact.update.error'));
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
