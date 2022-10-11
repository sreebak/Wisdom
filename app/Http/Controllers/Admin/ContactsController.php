<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Contact;
use Exception;
use Gate;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index')->with('contacts',$contacts);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.contacts.index'));
        }
        return view('admin.contacts.new');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.contacts.index'));
        }


        try {
            
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->remarks = $request->remarks;

            if($contact->save()) {
                $request->session()->flash("Success",$contact->name. " has bas been added");
                return redirect()->route('admin.contacts.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the contact");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.contacts.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.contacts.index'));
        }
        
        $contact = Contact::find($id);

        return view('admin.contacts.edit')->with([
            'contact'=>$contact
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.contacts.index'));
        }
  

        try {
            
            $contact = Contact::find($id);
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->remarks = $request->remarks;

            if($contact->save()) {
                $request->session()->flash("Success",$contact->name. " has bas been updated");
                return redirect()->route('admin.contacts.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the contact");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.contacts.edit',$contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.contacts.index'));
        }

        $contact = Contact::find($id);

        try {
            $contact->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }
        return redirect()->route('admin.contacts.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.contacts.index'));
        }

        try {
            $contact = Contact::find($request->id);
            $contact->status = $request->status;
            if($contact->save()) {
                return "Success";
            }
            else {
                return "Failed";
            }
        }
        catch (Exception $ex) {
            return "Failed";
        } 
    }
}
