<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request) 
    {
        // dd($_REQUEST);
        $search = $request->search;
        $posts =Post::where('title', 'LIKE', "%{$search}%")
        ->with('user')
        ->latest()->paginate();

        return view('home', ['posts'=> $posts]);

    }

    
    public function blog() 
    {
        //Diferentes formas de presentar los datos
        // esta linea es elocuent, trae todos los posts
    //$posts =Post::get();
    //$post =Post::first();
    //$post =Post::find(28);

    //dd($post);   //  dependiendo del metodo que se utilice, se puede obtener un dato o una coleccion de datos
    $posts =Post::latest()->paginate();

    //dd($posts);   //  con dd se visualizan los metadatoa o en formato json
    return view('blog', ['posts'=> $posts]);

    }

    public function post(Post $post) 
    {

    return view('post', ['post' => $post]);

    }
    
}
