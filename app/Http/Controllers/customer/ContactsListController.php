<?php

namespace App\Http\Controllers\customer;

use App\Models\Contact;
use App\Http\Controllers\Controller;


class ContactsListController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $i = 1;
        foreach ($contacts as $contact) {
            $contact->id = $i;
            $i = $i + 1;
            $contact->save();
        }
        $hasContact = $contacts->isEmpty();
        return view('customer.contacts.index', compact('contacts', 'hasContact'));
    }

}
