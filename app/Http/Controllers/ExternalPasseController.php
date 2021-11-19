<?php

namespace App\Http\Controllers;

use App\Models\External_passe;
use App\Models\Internal_passe;
use App\Models\Files;
use Illuminate\Http\Request;

class ExternalPasseController extends Controller
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
    public function create(Request $request)
    {
        $file = Files::find($request->file_id);
            $file->status = true;
            $file->save();

        $external_passe = External_passe::create([
            'from' => $request->from,
            'from_date' => $request->from_date,
            'status' => $request->status,
            'responsable' => $request->responsable,
            'file' => $request->file_id
        ]);


        return response()->json($external_passe, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $external_passes = External_passe::orderBy("updated_at", "desc")
        ->Paginate(10);

         foreach ($external_passes as $item) {
             $item->File;
             $item->User;
             $item->From_Office;
             $item->To_Office;
         }

        return response()->json($external_passes, 200);
}

public function search($file_id)
{
    $external_passes = External_passe::where('file','=',$file_id)
    ->orderBy("updated_at", "desc")
    ->Paginate(5);

     foreach ($external_passes as $item) {
         $item->File;
         $item->User;
         $item->From_Office;
         $item->To_Office;
     }

    return response()->json($external_passes, 200);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\External_passe  $external_passe
     * @return \Illuminate\Http\Response
     */
    public function show(External_passe $external_passe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\External_passe  $external_passe
     * @return \Illuminate\Http\Response
     */
    public function edit(External_passe $external_passe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\External_passe  $external_passe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $external_passe = External_passe::find($request->id);

        $external_passe->to = $request->to;
        $external_passe->to_date = $request->to_date;
        $external_passe->status = $request->status;
        $external_passe->responsable = $request->responsable;
        $external_passe->save();

        $file = Files::find($request->file_id);
        $file->status = false;
        $file->save();

        return response()->json($external_passe,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\External_passe  $external_passe
     * @return \Illuminate\Http\Response
     */
    public function destroy(External_passe $external_passe)
    {
        //
    }
}
