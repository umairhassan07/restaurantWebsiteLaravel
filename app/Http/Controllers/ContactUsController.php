<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUsModel;
use redirect;
use Session;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactUsModel::where('id', 1)->first();
        return view('admin.contact.edit', compact('contact'));
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
    public function update(Request $request)
    {
        $contact_us = new ContactUsModel;
        $contact = ContactUsModel::where('id', 1)->get();
        if($contact->count() == 0){

            $contact_us->heading = $request->input('heading');
            $contact_us->description = $request->input('description');
            $contact_us->phone1 = $request->input('phone');
            $contact_us->phone2 = $request->input('phone2');
            $contact_us->email1 = $request->input('email');
            $contact_us->email2 = $request->input('email2');
            $contact_us->save();
            return redirect()->route('contact');

        }else{
            ContactUsModel::where('id', 1)->update([
                'heading' => $request->input('heading'),
                'description' => $request->input('description'),
                'phone1' => $request->input('phone'),
                'phone2' => $request->input('phone2'),
                'email1' => $request->input('email'),
                'email2' => $request->input('email2')
            ]);

            Session::flash('message', 'Record Updated Successfully!'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->route('contact');
        }
        

        
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
