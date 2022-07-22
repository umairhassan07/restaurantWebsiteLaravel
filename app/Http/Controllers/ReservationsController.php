<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationModel;
use Session;


class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = ReservationModel::paginate(5);
        foreach($reservations as $key => $value){
            $date = date('d-M-Y', strtotime($value->reservation_date));
            $reservations[$key]['reservation_date'] = $date;

        }
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reservations.create');
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
    public function get(){
        return $reservations = ReservationModel::get()->count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = ReservationModel::where('id', $id)->first();
        return view('admin.reservations.edit', compact('reservation'));
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
        ReservationModel::where('id', $id)->delete();
        Session::flash('message', 'Reservation Successfully Deleted!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('reservations');
    }

    public function ajaxStore(Request $request)
    {
        $reservation_date = date("Y-m-d", strtotime($request->input('reservation_date')));
        $page = $request->input('page_name');
        $page = isset($page) ? $page : '';

       
        $id = $request->input('id');
        if(isset($id)){
            ReservationModel::where('id', $id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'number_of_guests' => $request->input('number_guests'),
                'reservation_date' => $reservation_date,
                'time' => $request->input('time'),
                'message' => $request->input('message')
            ]);


            Session::flash('message', 'Reservation Successfully Updated!'); 
            Session::flash('alert-class', 'alert-success'); 

            if(!empty($page) && $page == 'admin_page'){
                return redirect()->route('reservations');
            }


        }else{
            $reservation = new ReservationModel();
            $reservation->name = $request->input('name');
            $reservation->email = $request->input('email');
            $reservation->phone = $request->input('phone');
            $reservation->number_of_guests = $request->input('number_guests');
            $reservation->reservation_date = $reservation_date;
            $reservation->time = $request->input('time');
            $reservation->message = $request->input('message');
            $reservation->save();
    
            
            Session::flash('message', 'Reservation Successfully Added!'); 
            Session::flash('alert-class', 'alert-success'); 
    
            if(!empty($page) && $page == 'admin_page'){
                return redirect()->route('reservations');
            }

            return response()->json([
                'success' => 'true',
                'page' => $page,
                'message' => 'Reservation Booked Successfully',
                ]);
        }

        
        

        

        
    }
}
