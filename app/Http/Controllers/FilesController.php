<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Defuse\Crypto\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function store()
    {
        $files = Files::orderBy("updated_at", "desc")
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
        ->where('agrupation_id',"LIKE",'%'.$agrupation_id.'%')
        ->where('status','=',$status)
        ->orderBy("updated_at", "desc")
        ->paginate(25);

        foreach ($files as $file) {
        $file->Agrupation;
        $file->User;
        }
        return response()->json($files,200);

    }

    public function validation_create(Request $request){

        $dependence_number = $request->search_dependence_number;
        $central_number  = $request->search_central_number;
        $final_number  = $request->search_final_number;

        $files=Files::where('dependence_number','=',$dependence_number)
        ->where('central_number','=',$central_number)
        ->where('final_number','=',$final_number)
        ->paginate(25);

        foreach ($files as $file) {
            $file->Agrupation;
            $file->User;
            }

        return response()->json($files, 200);
    }


    public function create(Request $request){

        $file=Files::create([
            'dependence_number'=> $request->dependence_number,
            'central_number'=> $request->central_number,
            'final_number'=> $request->final_number,
            'initiator'=> $request->initiator,
            'concept'=> $request->concept,
            'status'=> $request->status,
            'agrupation_id'=> $request->agrupation_id,
            'user_id'=> $request->user_id
            ]);

            

        return  response()->json($file,200);
    }


}
