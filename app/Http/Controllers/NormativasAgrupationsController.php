<?php

namespace App\Http\Controllers;

use App\Models\normativas;
use App\Models\normativasAgrupations;
use Illuminate\Http\Request;

class NormativasAgrupationsController extends Controller
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
        $list = normativasAgrupations::orderBy("name", "desc")->get();

        return response()->json($list,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\normativasAgrupations  $normativasAgrupations
     * @return \Illuminate\Http\Response
     */
    public function show(normativasAgrupations $normativasAgrupations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\normativasAgrupations  $normativasAgrupations
     * @return \Illuminate\Http\Response
     */
    public function edit(normativasAgrupations $normativasAgrupations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\normativasAgrupations  $normativasAgrupations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, normativasAgrupations $normativasAgrupations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\normativasAgrupations  $normativasAgrupations
     * @return \Illuminate\Http\Response
     */
    public function destroy(normativasAgrupations $normativasAgrupations)
    {
        //
    }
}
