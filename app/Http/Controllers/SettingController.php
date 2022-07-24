<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingModel;
use File;
use Session;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingModel::where('id', 1)->first();
        $settings['social'] = json_decode($settings['social_links']);
        return view('admin.settings.update', compact('settings'));
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
        //old image name and path 
        $old_name = SettingModel::where('id', 1)->first()->image;
        $image_path = public_path('images/settings/'.$old_name);

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/settings/');
            $image->move($destination, $name);

            if(File::exists($image_path)){
                File::delete($image_path);
            }

            SettingModel::where('id', 1)->update([
                'logo' => $name
            ]);
        }

        SettingModel::where('id', 1)->update([
            'social_links' => json_encode($request->input('social')),
            'footer_text' => $request->input('footertext')
        ]);


        Session::flash('message', 'Settings Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('settings');



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
