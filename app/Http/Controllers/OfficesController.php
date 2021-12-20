<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store()
    {
        return response()->json(Office::orderBy("name", "asc")->Paginate(10000),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function show(Office $offices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $offices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $offices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $offices)
    {
        //
    }

    public function search(Request $request){

        $name = $request->name;
        $internal_phone = $request->internal;
        $code_sie = $request->SIE;
        $officer_in_charge = $request->officer_in_charge;
        $order_by = $request->order_by;
        $order = $request->order;

         $offices = Office::where('name','LIKE','%'.$name.'%')
                    ->where('internal_phone','LIKE','%'.$internal_phone.'%')
                    ->where('code_sie','LIKE','%'.$code_sie.'%')
                    ->where('officer_in_charge',"LIKE",'%'.$officer_in_charge.'%')
                    ->orderBy($order_by, $order)
                    ->paginate(10);

            return response()->json($offices,200);


    }
}
