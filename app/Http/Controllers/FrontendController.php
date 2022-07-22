<?php

namespace App\Http\Controllers;

use App\Models\TopSliderModal;
use App\Models\AboutUsModel;
use App\Models\MenuModel;
use App\Models\ContactUsModel;
use App\Models\CheffModel;
use App\Models\MealsModel;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = TopSliderModal::get();
        $about = AboutUsModel::first();
        $imgs[] = $about['img1'];
        $imgs[] = $about['img2'];
        $imgs[] = $about['img3'];
        $about['images'] = $imgs;

        $menu  = MenuModel::get();

        $cheffs = CheffModel::get();

        $contact = ContactUsModel::where('id', 1)->first();

        $meals_breakfast = MealsModel::where('type', 'breakfast')->get();
       
        $meals_lunch = MealsModel::where('type', 'lunch')->get();
       
        $meals_dinner = MealsModel::where('type', 'dinner')->get();

        return view('home', compact('sliders','about','menu','cheffs','contact','meals_breakfast','meals_lunch','meals_dinner'));    
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
        //
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
