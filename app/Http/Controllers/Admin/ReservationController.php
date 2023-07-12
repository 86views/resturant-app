<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservations = Reservation::all();  
      return view('admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tables = Table::all();
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
      $table = Table::findOrFail($request->table_id);
       if($request->guest_number >  $table->guest_number) {
         return back()->with('warning', 'Please choose the table base on the guest');
       } 
       $request_date = Carbon::parse($request->res_date);
       foreach($table->reservations as $reserve) {
          if($reserve->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
            return back()->with('info', 'The table has already reserved' . " " .  
            $reserve->res_date->format('Y-m-d'));
       }
    }
    


     

      $request->validated();
        // $image = $request->file('image')->store('public/categories');
    //    Reservation::create($request->validated());
         Reservation::create([
            'first_name'   => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'   => $request->input('email'),
            'location'  => $request->input('location'),
            
            'emai'   => $request->input('email'),
            'phone'  => $request->input('phone'),
            'res_date'   => $request->input('res_date'),
            'table_id'  => $request->input('table_id'),
            'guest_number'  => $request->input('guest_number'),

            
            
        ]);
            Alert::success('Reservation added successfully', 'Reservation');
            return to_route('admin.reservation.index');
    }   
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.reservation.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation  $reservation)
    {
      $tables = Table::where('status', TableStatus::Available)->get(); 
        return view('admin.reservation.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());
        // $table->update([
        //     'name' => $request->name,
        //     'guest_number' => $request->guest_number,
        //     'status' => $request->status,
        //     'location' => $request->location,
        // ]);

        Alert::success('Reservation Updated successfully', 'Reservation Updated successfully');
           
        return to_route('admin.reservation.index');
    }   
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
    }
}
