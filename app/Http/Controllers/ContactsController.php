<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
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
        return view('admin.contacts.index', compact('contacts', 'hasContact'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->surname = $request->surname;
        $contact->mail = $request->mail;
        $contact->phone = $request->phone;
        $contact->city = $request->city;
        $contact->save();
        return redirect('admin/contacts/index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::all()->find($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::all()->find($id);
        $contact->name = $request->name;
        $contact->surname = $request->surname;
        $contact->mail = $request->mail;
        $contact->phone = $request->phone;
        $contact->city = $request->city;
        $contact->save();
        return redirect('admin/contacts/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect('admin/contacts/index');

    }
}
