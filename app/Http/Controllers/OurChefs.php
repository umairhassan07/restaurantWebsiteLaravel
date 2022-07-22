<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheffModel;
use File;
use Session;

class OurChefs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cheff = CheffModel::get();
        return view('admin.chefs.index', compact('cheff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chefs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cheff = new CheffModel;

        if($request->hasFile('profileImage')){
            $image = $request->file('profileImage');
            $original_name = $image->getClientOriginalName();
            $name = time().$original_name.'.'.$image->getClientOriginalExtension();;
            $destinationPath = public_path('/images/cheffs');
            $image->move($destinationPath, $name);

            $cheff->name = $request->input('name');
            $cheff->designation = $request->input('designation');
            $cheff->image = $name;
            $cheff->save();

            Session::flash('message', 'Cheff Added Successfully!'); 
            Session::flash('alert-class', 'alert-success'); 

            return redirect()->route('our-cheff');
        }
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
        $cheff = CheffModel::first();
        return view('admin.chefs.edit', compact('cheff') );
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
        //get old image name and path to delete
        $old_image_name = CheffModel::where('id', $id)->first()->image;
        $image_path = public_path('images/cheffs/'.$old_image_name);


        //check if image is selected on update 
        if($request->hasFile('profileImage')){
            $image = $request->file('profileImage');
            $original_name = $image->getClientOriginalName();
            $name = time().$original_name.'.'.$image->getClientOriginalExtension();;
            $destinationPath = public_path('/images/cheffs');
            $image->move($destinationPath, $name);


            if(File::exists($image_path)){
                File::delete($image_path);
            }

            CheffModel::where('id', $id)->update([
                'image' => $name,
            ]);
        }

        //save other fields
        
        CheffModel::where('id', $id)->update([
            'name' => $request->input('name'),
            'designation'=> $request->input('designation'),
        ]);
       
        Session::flash('message', 'Cheff Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('our-cheff');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get image name from db
        $old_image_name = CheffModel::where('id', $id)->first()->image;
        $image_path = public_path('images/cheffs/'.$old_image_name);

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        
        CheffModel::where('id', $id)->delete();
        return redirect()->route('our-cheff');

    }
}
