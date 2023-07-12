<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;

use RealRashid\SweetAlert\Facades\Alert;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request)
    {
        $request->validated();
        // $image = $request->file('image')->store('public/categories');

         Table::create([
            'name'   => $request->input('name'),
            'guest_number'  => $request->input('guest_number'),
            'status'   => $request->input('status'),
            'location'  => $request->input('location'),
            
            
        ]);
            Alert::success('Table added successfully', 'category');
            return to_route('admin.tables.index');
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
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableStoreRequest $request, Table $table)
    {
       $table->update($request->validated());
        // $table->update([
        //     'name' => $request->name,
        //     'guest_number' => $request->guest_number,
        //     'status' => $request->status,
        //     'location' => $request->location,
        // ]);

        Alert::success('Table Updated successfully', 'table');
           
           return to_route('admin.tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        
        $table->delete();
        $table->reservations()->delete();
        return to_route('admin.tables.index')->with('danger', 'Table deleted successfully');
   }

}
