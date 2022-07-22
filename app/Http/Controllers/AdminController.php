<?php

namespace App\Http\Controllers;


use App\Http\Controllers\ReservationsController;
use App\Models\CheffModel;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){

        $reservations = ReservationsController::get();
        $cheffs = CheffModel::all()->count();
        $users = User::all()->count();
        return view('admin.home', compact('reservations','cheffs','users'));
    }
}
