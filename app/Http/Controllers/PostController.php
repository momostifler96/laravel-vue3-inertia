<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {   

        $posts = Post::paginate(20);
        return Inertia::render("blog/index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("dashboard/post/Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            request()->validate([
                "title"=>["alpha","required","min:10"],
                "slug"=>["alpha_dash","required","min:10",""],
                "description"=>["alpha","required","min:10"],
            ]);
            DB::beginTransaction();
            $post = Post::create($request->input());
            $post->category()->save(request()->category);
            //$post->tag()->saveMany(request()->category);

            DB::commit();
            session()->flash("success","votre article a bien ete cree");
            
        } catch (\Throwable $th) {
            
            DB::rollBack();
            session()->flash("error","Erreur lors de la creation de votre article");
            
        }
    }

    public function myPosts()
    {   
        $posts = request()->user()->posts()->paginate();
        return Inertia::render("dashboard/post/index",compact("posts"));
        
    }

    public function show(Post $post)
    {
        return Inertia::render("blog/single",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render("dashboard/post/edit",compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   
        try {
            DB::beginTransaction();
            $post->update($request->input());
            DB::commit();
            session()->flash("success","votre article a bien ete mis ajour");
            
        } catch (\Throwable $th) {
            
            DB::rollBack();
            session()->flash("error","Erreur lors de la mis ajour de votre article");
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();
                Post::destroy($post->id);
            DB::commit();
            session()->flash("success","votre article a bien ete suprimer");
            
        } catch (\Throwable $th) {
            
            DB::rollBack();
            session()->flash("error","Erreur lors de la suppression de votre article");
            
        }
    }
}
