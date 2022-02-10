<?php

namespace App\Http\Controllers;

use App\Models\notObjetions;
use Illuminate\Http\Request;

class NotObjetionsController extends Controller
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
    public function store(Request $request)
    {

        $notObjetions = notObjetions::orderBy("name", "asc")->Paginate(15);
        return response()->json($notObjetions,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notObjetions  $notObjetions
     * @return \Illuminate\Http\Response
     */
    public function show(notObjetions $notObjetions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notObjetions  $notObjetions
     * @return \Illuminate\Http\Response
     */
    public function edit(notObjetions $notObjetions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notObjetions  $notObjetions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notObjetions $notObjetions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notObjetions  $notObjetions
     * @return \Illuminate\Http\Response
     */
    public function destroy(notObjetions $notObjetions)
    {
        //
    }
}
