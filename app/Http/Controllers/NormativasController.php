<?php

namespace App\Http\Controllers;

use App\Models\normativas;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class NormativasController extends Controller
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

    public function create(Request $request){

        //$dest = '/var/www/public/normativas/';
        $dest ='home/lberraz/public_html/new_sec_back/public/static/normativas';

        $normativa=normativas::create([
            'name'=> $request->name,
            'number'=> $request->number,
            'year'=> $request->year,
            'reference'=> $request->reference,
            'type_id'=> $request->type,
            'agrupation_id'=> $request->agrupation,
          ]);


        $pdf = base64_decode($request->file);

          if(Storage::disk('public')->put('Normativas/'.$request->name, $pdf)){

            return response()->json($request,200);

        }else{

            log("fuck!!",500);
        }

        Storage::disk('public/Normativas/')->move($request->name, $dest.$request->name);


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
     * @param  \App\Models\normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function show(normativas $normativas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function edit(normativas $normativas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, normativas $normativas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function destroy(normativas $normativas)
    {
        //
    }

    public function search(Request $request){

        $type = $request->type;
        $number = $request->number;
        $year = $request->year;
        $reference = $request->reference;
        $agrupation = $request->agrupation;

        if($request->order_by == ""){
            $order_by = "type_id";
           }else{
                $order_by = $request->order_by;
            }

        $order = $request->order;

         $Normativas = normativas::
                    where('type_id','LIKE','%'.$type.'%')
                    ->where('number','LIKE','%'.$number.'%')
                    ->where('year','LIKE','%'.$year.'%')
                    ->where('reference',"LIKE",'%'.$reference.'%')
                    ->where('agrupation_id',"LIKE",'%'.$agrupation.'%')
                    ->orderBy($order_by, $order)
                    ->paginate(10);

                    foreach ($Normativas as $Normativa) {
                        $Normativa->Agrupation;
                        $Normativa->Type;

                    }


            return response()->json($Normativas,200);


    }
}
