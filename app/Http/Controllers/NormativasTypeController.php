<?php

namespace App\Http\Controllers;

use App\Models\normativasType;
use Illuminate\Http\Request;

class NormativasTypeController extends Controller
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
        $list = normativasType::orderBy("name", "desc")->get();

        return response()->json($list,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\normativasType  $normativasType
     * @return \Illuminate\Http\Response
     */
    public function show(normativasType $normativasType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\normativasType  $normativasType
     * @return \Illuminate\Http\Response
     */
    public function edit(normativasType $normativasType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\normativasType  $normativasType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, normativasType $normativasType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\normativasType  $normativasType
     * @return \Illuminate\Http\Response
     */
    public function destroy(normativasType $normativasType)
    {
        //
    }
}
