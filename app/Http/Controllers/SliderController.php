<?php

namespace App\Http\Controllers;

use App\Models\TopSliderModal;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = TopSliderModal::all();
        return view('admin.sliders.index' ,compact('sliders') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slider = new TopSliderModal;
        
        $this->validate($request, [
            'sliderImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('sliderImage')) {
            $image = $request->file('sliderImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/sliders');
            $image->move($destinationPath, $name);
            $slider->image = $name;
            $slider->save();

            Session::flash('message', 'Slider Added Successfully!'); 
            Session::flash('alert-class', 'alert-success'); 
    
            return redirect('/admin/sliders');
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
        $slider = TopSliderModal::where('id',$id)->first();
        return view('admin.sliders.edit', compact('slider'));

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
        $id = $request->input('id');
        $old_image_name = TopSliderModal::where('id',$id)->first()->image;
        $this->validate($request, [
            'sliderImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('sliderImage')) {
            $image = $request->file('sliderImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/sliders');
            $image->move($destinationPath, $name);

            $update = TopSliderModal::where('id',$id)
                        ->update(['image' => $name]);

            $image_path = public_path('images/sliders/'.$old_image_name );
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        
    }
            Session::flash('message', 'Slider Updated Successfully!'); 
            Session::flash('alert-class', 'alert-success'); 

            return redirect('/admin/sliders')->with('success', 'Image Successfully Updated');

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_image_name = TopSliderModal::where('id',$id)->first()->image;
        $image_path = public_path('images/sliders/'.$old_image_name );

        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        TopSliderModal::where('id',$id)->delete();
        return redirect('admin/sliders');
    }
}
