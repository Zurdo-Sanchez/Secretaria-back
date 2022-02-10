<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use App\Models\External_passe;
use App\Models\Agrupation;
use Illuminate\Support\Arr;

class GraphicsController extends Controller
{

    public function pie(){

        $pie = [];

        $agrupations = Agrupation::orderBy("name", "asc")->get();

        foreach($agrupations as $agrupation){


            $file = Files::where('agrupation_id','=',$agrupation->id)
            ->get();

            $count = count($file);
            $aux=["name"=>$agrupation->name,"count"=>$count];
            array_push($pie,$aux);
        }

        return response()->json($pie, 200);

    }

    public function line($year){

        $data=[];

        for ($i=1; $i < 13; $i++) {
            $externalPasse = External_passe::WhereYear('created_at',"=",$year)
            ->whereMonth('created_at', '=', $i)
            ->get();

            $outPasse = External_passe::WhereYear('updated_at',"=",$year)
            ->whereMonth('updated_at', '=', $i)
            ->where('status','=',1)
            ->get();


            $aux=["mount"=>$i, "total"=> count($externalPasse), "out"=> count($outPasse)];
            array_push($data,$aux);
        }

        return response() -> json($data, 200);
    }

}
