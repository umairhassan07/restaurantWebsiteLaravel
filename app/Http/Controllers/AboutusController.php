<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUsModel;
use File;
use Redirect;
use Session;


class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AboutUsModel::first();
        return view('admin.about.edit', compact('about'));
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
    public function edit()
    {
        return view('admin.about.edit');
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

        
        $about = new AboutUsModel;

        $old_image_name1 = AboutUsModel::where('id',1)->first()->img1;
        $old_image_name2 = AboutUsModel::where('id',1)->first()->img2;
        $old_image_name3 = AboutUsModel::where('id',1)->first()->img3;

        $image_path1 = public_path('images/about/'.$old_image_name1 );
        $image_path2 = public_path('images/about/'.$old_image_name2 );
        $image_path3 = public_path('images/about/'.$old_image_name3 );


        $destinationPath = public_path('/images/about');

        if(!empty($request->file('image1'))){
            $image = $request->file('image1');
            $real_name = $image->getClientOriginalName();
            $name = time().$real_name.'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            if(File::exists($image_path1)) {
                File::delete($image_path1);
            }

            AboutUsModel::where('id',1)
                        ->update([
                            'img1' => $name,
                        ]);

        }

        if(!empty($request->file('image2'))){
            $image = $request->file('image2');
            $real_name = $image->getClientOriginalName();
            $name = time().$real_name.'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            if(File::exists($image_path2)) {
                File::delete($image_path2);
            }

            AboutUsModel::where('id',1)
                        ->update([
                            'img2' => $name,
                        ]);

        }

        if(!empty($request->file('image3'))){
            $image = $request->file('image3');
            $real_name = $image->getClientOriginalName();
            $name = time().$real_name.'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            if(File::exists($image_path3)) {
                File::delete($image_path3);
            }

            AboutUsModel::where('id',1)
                        ->update([
                            'img3' => $name,
                        ]);

        }
       

            AboutUsModel::where('id', 1)
                        ->update([
                            'heading' => $request->input('heading'),
                            'description' => $request->input('description'),
                            'videoLink' => $request->input('videoLink'),
                        ]);

           

            Session::flash('message', 'Record Update Successfully!'); 
            Session::flash('alert-class', 'alert-success');

            return Redirect::route('about-us');
      
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
