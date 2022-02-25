<?php

namespace App\Http\Controllers;

use App\Models\PostIt;
use App\Models\PostItForUser;
use Illuminate\Http\Request;

class PostItController extends Controller
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
        $new = PostIt::create([
            'text' => $request->text,
            'user_id'=> $request->user_id,
            'echo' => false
        ]);

        $forUser = PostItForUser::create([
            'user_id'=> $new->user_id,
            'post_it_id'=> $new->id
        ]);

        return response()->json($new,200);
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
     * @param  \App\Models\PostIt  $postIt
     * @return \Illuminate\Http\Response
     */
    public function shared(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostIt  $postIt
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post_it = PostIt::find($request->id);

        $post_it->text = $request->text;
        $post_it->echo = $request->echo;
        $post_it->save();

        return response()->Json($post_it);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostIt  $postIt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostIt $postIt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostIt  $postIt
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostIt $postIt)
    {
        //
    }
}
