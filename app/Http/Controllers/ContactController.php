<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\AccountDetail;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use GeneralTrait;
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
        $accountDetail = AccountDetail::latest()->first();
        return view('contact.create', [
            'account_code' => $accountDetail->account_code,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->all());
        $this->storeImage($contact);
        return redirect(route('accountDetail.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function storeImage($contact)
    {
        $contact->update([
            'image' => $this->imagePath('image', 'contact', $contact),
            'cnic_front' => $this->imagePath('cnic_front', 'contact', $contact),
            'cnic_back' => $this->imagePath('cnic_back', 'contact', $contact),
            'document' => $this->imagePath('document', 'contact', $contact),
        ]);
    }
}
