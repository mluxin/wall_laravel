<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class WallController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Wall.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();

        return view('wall', ['posts'=>$posts]);
    }

     /**
     * Insert a post in database
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postonwall(Request $request) // recup request en param
    {
        $post = new Post; //nouvel objet
        $post->content = $request->content;  //prend la requete comme content
        $post->user_id = \Auth::id(); //pour register l'id de l'user qui a poster sur le wall
        $post->save();

        return redirect()->route('wall');
        // pourrait faire return redirect('wall'), mais ça serait pas la route mais l'url
    }

     /**
     * Delete post in database
     */
    public function deletepost($id) // recup l'id de l'url en param dans la route
    {
        $post = Post::find($id); //nouvel objet

        if($post->user_id == \Auth::id())
            $post->delete();
        else
            die('Ce post nest pas à vous');

        return redirect('wall');
    }

     /**
     * Edit post in database (recupère et enregistre)
     */
    public function editpost($id) // recup request en param
    {
        $post = Post::find($id);
        return view('editpost', ['post'=>$post]);
    }

    /**
     * Update post in database
     */
    public function updatepost($id, Request $request )
    {
        $post = Post::find($id);
        $post->content = $request->content;
        if($post->user_id == \Auth::id())
            $post->save();
        else
            die(`Ce post n'est pas à vous`);

        return redirect('wall');
    }

}
