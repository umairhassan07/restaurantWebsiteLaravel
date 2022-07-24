<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\regsiterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\OurMenuController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\OurChefs;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function(){
//     dd(Hash::make('12341234'));
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
   
    Route::get('/home', [FrontendController::class, 'index']);
    Route::get('/', function () {
        return redirect('/home');
    });

    
});


//for admin role
Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::prefix('/admin')->group(function(){
        Route::get('/', function(){
            return redirect()->route('dashboard');
        });

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


        //routes for slider 
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');
        Route::get('/sliders/add-slider', [SliderController::class, 'create'])->name('add-slider');
        Route::post('/sliders/add-slider', [SliderController::class, 'store'])->name('add-slider');
        Route::get('/sliders/edit-slider/{id?}', [SliderController::class, 'edit'])->name('edit-slider');
        Route::post('/sliders/update-slider', [SliderController::class, 'update'])->name('update-slider');
        Route::get('/sliders/delete-slider/{id?}', [SliderController::class, 'destroy'])->name('delete-slider');
    

        //routes for about-us page
        Route::get('/aboutus', [AboutusController::class, 'index'])->name('about-us');
        Route::get('/aboutus/update/{id?}', [AboutusController::class, 'edit'])->name('update-about-us');
        Route::post('/aboutus/update', [AboutusController::class, 'update'])->name('edit-about');


        //routes for our-menu page 
        Route::get('/menu', [OurMenuController::class, 'index'])->name('our-menu');
        Route::get('/menu/add', [OurMenuController::class, 'create'])->name('add-menu');
        Route::post('/menu/add', [OurMenuController::class, 'store'])->name('add-menu');
        Route::get('/menu/edit/{id?}', [OurMenuController::class, 'edit'])->name('edit-menu');
        Route::post('/menu/update/{id?}', [OurMenuController::class, 'update'])->name('update-menu');
        Route::get('/menu/delete/{id?}', [OurMenuController::class, 'destroy'])->name('delete-menu');


        //route for our-chefs page
        Route::get('/chefs', [OurChefs::class, 'index'])->name('our-cheff');
        Route::get('/chefs/add', [OurChefs::class, 'create'])->name('add-cheff');
        Route::post('/chefs/add', [OurChefs::class, 'store'])->name('add-cheff');
        Route::get('/chefs/edit/{id?}', [OurChefs::class, 'edit'])->name('edit-cheff');
        Route::post('/chefs/update/{id?}', [OurChefs::class, 'update'])->name('update-cheff');
        Route::get('/chefs/delete/{id?}', [OurChefs::class, 'destroy'])->name('delete-cheff');


        //route for contact us page
        Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact');
        Route::post('/update-contact',[ContactUsController::class, 'update'])->name('update-contact');

        //route for reservations page
        Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations');
        Route::post('/submit/reservation',[ReservationsController::class, 'ajaxStore'])->name('add-reservation');
        Route::get('/add-reservation', [ReservationsController::class, 'create'])->name('add-reservation-form');
        Route::get('/reservations/edit/{id?}',[ReservationsController::class, 'edit'])->name('edit-reservation');
        Route::get('/reservations/update/{id?}',[ReservationsController::class, 'update'])->name('update-reservation');
        Route::get('/reservations/delete/{id?}',[ReservationsController::class, 'destroy'])->name('delete-reservation');


        //routes for meals
        Route::get('meals', [MealsController::class, 'index'])->name('meals');
        Route::get('/meals/add', [MealsController::class, 'create'])->name('add-meal-form');
        Route::post('/meals/add', [MealsController::class, 'store'])->name('add-meal');
        Route::get('/meals/edit/{id?}', [MealsController::class, 'edit'])->name('edit-meal');
        Route::post('/meals/update/{id?}', [MealsController::class, 'update'])->name('update-meal');
        Route::get('/meals/delete/{id?}',[MealsController::class, 'destroy'])->name('delete-meal');

        //users routes
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::get('/users/add', [UsersController::class, 'create'])->name('add-user');
        Route::post('/users/store', [UsersController::class, 'store'])->name('store-user');
        Route::get('/users/edit/{id?}', [UsersController::class, 'edit'])->name('edit-user');
        Route::post('/users/update/{id?}', [UsersController::class, 'update'])->name('update-user');
        Route::get('/users/delete/{id?}', [UsersController::class, 'destroy'])->name('delete-user');

        //routes for profile page
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update/{id?}', [ProfileController::class, 'update'])->name('update-profile');

        //routes for settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings/update/{id?}', [SettingController::class, 'update'])->name('update-settings');
        
    });

    
    
});








// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
