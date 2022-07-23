<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use redirect;
use File;
use Hash;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required'
        ]);

        $user = new User;

        if($request->hasFile('profileImage')){

            $image = $request->file('profileImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('images/users');
            $image->move($path, $name);
            $user->image = $name;

        }
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->email = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Session::flash('message', 'New User Created Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
    
        return redirect()->route('users');

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
        $user = User::where('id',$id)->first();
        return view('admin.users.edit', compact('user'));
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
        if($request->hasFile('profileImage')){
            $image = $request->file('profileImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/users/');
            $image->move($destination, $name);

            User::where('id', $id)->update([
                'image' => $name
            ]);

        }

        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_as' => $request->input('role')
        ]);

        Session::flash('message', 'User Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
    
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = User::where('id', $id)->first()->image;
        $image_path = public_path('images/users/'.$image_name);
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        User::where('id', $id)->delete();
        Session::flash('message', 'User Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
    
        return redirect()->route('users');
    }
}
