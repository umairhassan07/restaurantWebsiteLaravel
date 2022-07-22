<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealsModel;
use Session;
use File;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = MealsModel::paginate(10);
        return view('admin.meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meals.create');
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
            'name' => 'required|',
            'description' => 'required',
            'meal_image' => 'required',
            'price' => 'required'
        ]);
        
        if($request->hasFile('meal_image')){
            $image = $request->file('meal_image');
            $name = time(). '.'. $image->getClientOriginalExtension();
            $image->move(public_path('images/meals'), $name);

            $meals = new MealsModel;
            $meals->name = $request->input('name');
            $meals->description = $request->input('description');
            $meals->price = $request->input('price');
            $meals->image = $name;
            $meals->type = $request->input('type');
            $meals->save();

            Session::flash('message', 'Meal Successfully Inserted!'); 
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('meals');


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
        $meal = MealsModel::where('id', $id)->first();
        return view('admin.meals.edit', compact('meal'));
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
        $old_image_name = MealsModel::where('id', $id)->first()->image;
        $old_image_path = public_path('images/meals/'. $old_image_name);
        
        $validated = $request->validate([
            'name' => 'required|',
            'description' => 'required',
            'price' => 'required'
        ]);

        if($request->hasFile('meal_image')){
            $image = $request->file('meal_image');
            $name = time(). '.'. $image->getClientOriginalExtension();
            $image->move(public_path('images/meals'), $name);

            MealsModel::where('id', $id)->update([
                'image' => $name
            ]);

            if(File::exists($old_image_path)){
                File::delete($old_image_path);
            }

        }

        MealsModel::where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'type' => $request->input('type')
        ]);

        Session::flash('message', 'Meal Successfully updated!'); 
        Session::flash('alert-class', 'alert-success');
            
        return redirect()->route('meals');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MealsModel::where('id', $id)->delete();
        Session::flash('message', 'Meal Successfully Deleted!'); 
        Session::flash('alert-class', 'alert-success');
            
        return redirect()->route('meals');
    }
}
