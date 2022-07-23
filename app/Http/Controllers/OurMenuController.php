<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use redirect;
use File;
use Session;

class OurMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = MenuModel::get();
        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'menuImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = new MenuModel;
        if($request->hasFile('menuImage')){
            //save image in directory
            $image = $request->file('menuImage');
            $original_name = $image->getClientOriginalName();
            $name = time().$original_name.'.'.$image->getClientOriginalExtension();;
            $destinationPath = public_path('/images/menu');
            $image->move($destinationPath, $name);
            
            // save record in database
            $menu->title = $request->input('title');
            $menu->description = $request->input('description');
            $menu->price = $request->input('price');
            $menu->image = $name;
            $menu->save();

            Session::flash('message', 'Menu Added Successfully!'); 
            Session::flash('alert-class', 'alert-success'); 

            return redirect()->route('our-menu');
            

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
        $menu = MenuModel::where('id', $id)->first();
        return view('admin.menu.edit', compact('menu'));
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
        $menu = new MenuModel;

        //to delete the old image from directory
        $old_image = MenuModel::where('id', $id)->first()->image;
        $image_path = public_path('/images/menu/'.$old_image);
        


        if($request->hasFile('menuImage')){
            $image = $request->file('menuImage');
            $original_name = $image->getClientOriginalName();
            $name = time().'.'.$image->getClientOriginalExtension();;
            $destinationPath = public_path('/images/menu');
            $image->move($destinationPath, $name);

            if(File::exists($image_path)){
                File::delete($image_path);
            }

            MenuModel::where('id', $id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $name,
            ]);

            
        }

        Session::flash('message', 'Menu Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 

            return redirect()->route('our-menu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_image_name = MenuModel::where('id', $id)->first()->image;
        $image_path = public_path('/images/menu/'.$old_image_name);

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        $menu = MenuModel::where('id', $id)->delete();
        return redirect()->route('our-menu');
    }
}
