<?php

namespace App\Http\Controllers;

use App\Models\ProvisTipo;
use Illuminate\Http\Request;

class ProvisTipoController extends Controller
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

        $provis = ProvisTipo::orderBy("name", "asc")->Paginate(1);
        foreach ($provis as $provi) {
            $provi->Office;
        }
        return response()->json($provis,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProvisTipo  $provisTipo
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $name = $request->name;
        $office_id = $request->office_id;

        if ($request->office_id) {
            $provis = ProvisTipo::where('name','LIKE','%'.$name.'%')
                                ->where('office_id',"=",$office_id)
                                ->orderBy("name", "asc")->Paginate(3);
            foreach ($provis as $provi) {
                $provi->Office;
            }
             }else{

                $provis = ProvisTipo::where('name','LIKE','%'.$name.'%')
                ->orderBy("name", "asc")->Paginate(3);
                    foreach ($provis as $provi) {
                    $provi->Office;
                }
        }
        return response()->json($provis,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProvisTipo  $provisTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProvisTipo $provisTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProvisTipo  $provisTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProvisTipo $provisTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProvisTipo  $provisTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProvisTipo $provisTipo)
    {
        //
    }
}
