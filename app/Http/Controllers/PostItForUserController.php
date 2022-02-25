<?php

namespace App\Http\Controllers;

use App\Models\PostItForUser;
use App\Models\PostIt;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class PostItForUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

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
    public function store($id)
    {

        $postIts = PostItForUser::where('user_id','=',$id)->orderBy("id", "desc")->paginate(100);

        foreach ($postIts as $item) {
            $item->User;
            $item->PostIt;
            $item->Shared_By = PostItForUser::where('post_it_id','=',$item->post_it_id)->get();
            foreach ($item->Shared_By as $aux) {
                $aux->User;
            }
     }

   return response()->json($postIts, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostItForUser  $postItForUser
     * @return \Illuminate\Http\Response
     */
    public function share(Request $request)
    {
        $id = $request->id;
        $shared_ids = $request->shared_ids;
        $size = sizeof($shared_ids);

        for ($i=0; $i < $size; $i++) {

            $forUser = PostItForUser::create([
                'user_id'=> $shared_ids[$i],
                'post_it_id'=> $id
            ]);
        }
        return response()->json("guardado",200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostItForUser  $postItForUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostItForUser  $postItForUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostItForUser $postItForUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostItForUser  $postItForUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $postItDorUser =PostItForUser::find($id);
        $postit_id =$postItDorUser->post_it_id;

        $postItDorUser->delete();
        $aux = PostItForUser::where('post_it_id','=',$postItDorUser->post_it_id)->get();
         if(sizeof($aux) <= 1){
             $postIt = PostIt::find($postit_id);
             $postIt->delete();
             return response()->json("port-it borrado " ,200);
         }else{
         return response()->json("post-it for user borrado",200);
         }
        return response()->json(sizeof($aux),200);
    }
}
