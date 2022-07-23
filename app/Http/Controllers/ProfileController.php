<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use File;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('admin.profile.update', compact('user'));
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
    public function update(Request $request, $id)
    {
        //validations 
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        //password validation if user entered password
        $password = $request->input('password');
        if(isset($password)){
            $validated = $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);

        }

        //get old image name from db
        $old_image = User::where('id', $id)->first()->image;
        $image_path = public_path('images/users/'.$old_image);

        if($request->hasFile('profileImage')){
            //upload image in directory
            $image = $request->file('profileImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/users/');
            $image->move($destination, $name);


            //remove old image
            if(File::exists($image_path)){
                File::delete($image_path);
            }

            //update image name in db
            User::where('id', $id)->update([
                'image' => $name
            ]);

        }

        //update user fields in db
        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_as' => $request->input('role'),
            'password' => Hash::make($request->input('password'))
        ]);

        //set session flash message
        Session::flash('message', 'Profile updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('profile');
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
