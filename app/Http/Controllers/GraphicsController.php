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

    public function line(){

        $data=[];

        for ($i=1; $i < 13; $i++) {
            $externalPasse = External_passe::WhereYear('created_at',"=",2021)
            ->whereMonth('created_at', '=', $i)
            ->get();

            $aux=["mount"=>$i, "total"=> count($externalPasse)];
            array_push($data,$aux);
        }

        return response() -> json($data, 200);
    }

}
