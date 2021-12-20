<?php

namespace App\Http\Controllers;

use App\Models\Internal_passe;
use App\Models\External_passe;
use App\Models\Files;
use Illuminate\Http\Request;

class InternalPasseController extends Controller
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
        $internal_passe = Internal_passe::create([
            'from' => $request->from ,
            'from_date' => $request->from_date ,
            'response' => $request->response ,
            'to' => $request->to ,
            'to_date' => $request->to_date ,
            'status' => $request->status ,
            'responsable' => $request->responsable ,
            'external_passe'=> $request->external_passe
        ]);

       return response()->json($internal_passe, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $internal_passes = Internal_passe::orderBy("updated_at", "desc")
        ->Paginate(10);

        //  foreach ($internal_passes as $item) {
        //      $item->File;
        //      $item->User;
        //      $item->From_Office;
        //      $item->To_Office;
        //  }

        return response()->json($internal_passes, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Internal_passe  $internal_passe
     * @return \Illuminate\Http\Response
     */
    public function search($external_passe_id)
    {
        $internal_passes = Internal_passe::where('external_passe','=',$external_passe_id)
        ->orderBy("from_date", "desc")
        ->Paginate(10);

          foreach ($internal_passes as $item) {
              $item->From;
              $item->To;
              $item->Responsable;
              $item->External_passe;
          }

        return response()->json($internal_passes, 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Internal_passe  $internal_passe
     * @return \Illuminate\Http\Response
     */
    public function edit(Internal_passe $internal_passe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Internal_passe  $internal_passe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internal_passe $internal_passe)
    {
        $internal_passe = Internal_passe::find($request->id);

        $internal_passe->to = $request->to;
        $internal_passe->to_date = $request->to_date;
        $internal_passe->status = $request->status;
        $internal_passe->response = $request->response;
        $internal_passe->responsable = $request->responsable;
        $internal_passe->save();


        $file = Files::find($request->file_id);
        $file->site_id = $request->to;
        $file->save();

        $external_passe = External_passe::find($request->external_passe);
        $external_passe->response = $request->response;
        $external_passe->responsable = $request->to;
        $external_passe->save();

        return response()->json($internal_passe,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Internal_passe  $internal_passe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internal_passe $internal_passe)
    {
        //
    }
}
