<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function store()
    {
        $files = Files::orderBy("updated_at", "asc")
            ->Paginate(25);

            foreach ($files as $file) {
                $file->Agrupation;
                $file->User;
            }

            return response()->json($files, 200);
    }

    public function edit(Request $request)
    {
        $file = Files::find($request->id);

        $file->agrupation_id = $request->agrupation_id;
        $file->save();

        return response()->json('File Update', 200);
    }

    public function total(){

        $active= count(Files::where('status','=',true)->get());
        $inactive= count(Files::where('status','=',false)->get());

        $totalfile = [
            "active" => $active,
            "inactive" => $inactive,
            "total" => $active + $inactive
        ];

        return response()->json($totalfile, 200);

    }

    public function search(Request $request){

        $dependence_number = $request->search_dependence_number;
        $central_number  = $request->search_central_number;
        $final_number  = $request->search_final_number;
        $initiator  = $request->search_initiator;
        $concept  = $request->search_concept;
        $agrupation_id  = $request->search_agrupation_id;
        $status  = $request->search_status;

    $files=Files::where('dependence_number','LIKE','%'.$dependence_number.'%')
    ->where('central_number','LIKE','%'.$central_number.'%')
    ->where('final_number','LIKE','%'.$final_number.'%')
    ->where('initiator','LIKE','%'.$initiator.'%')
    ->where('concept','LIKE','%'.$concept.'%')
    ->where('agrupation_id',"=",$agrupation_id)
    ->where('status','=',$status)
    ->paginate(25);

    foreach ($files as $file) {
        $file->Agrupation;
        $file->User;
    }


    return response()->json($files,200);

    }

}
