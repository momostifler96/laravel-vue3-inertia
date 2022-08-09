<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {   

        $posts = Post::orderBy('created_at','desc')->paginate(20);
        return Inertia::render("blog/index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return Inertia::render("dashboard/post/Create",compact("categories","tags"));
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

            DB::beginTransaction();
            $post = Post::create([
                "title"=>$request->input('title'),
                "type"=>$request->input('type'),
                "slug"=>$request->input('title').''.Carbon::now(),
                "description"=>$request->input('contente'),
                "category_id"=>$request->input('categorie'),
                "user_id"=>Auth::id(),
            ]);
            //$post->category()->save(request()->category);
            //$post->tag()->saveMany(request()->category);

            DB::commit();
            session()->flash("success","votre article a bien ete cree");
            return to_route('dashboard.post.myPosts');
        } catch (\Throwable $th) {
            Log::info('Erreur lors de lenregistrement de votre article : '.$th->getMessage());
            DB::rollBack();
            session()->flash("error","Erreur lors de la creation de votre article");
            
        }
    }

    public function myPosts()
    {   
        $categories = Category::all();
        $posts = request()->user()->posts()->when(request()->query('category'),function($post,$cat){
            return $post->where('category_id',$cat);
        })->orderBy('created_at','desc')->paginate();
        return Inertia::render("dashboard/post/index",compact("posts","categories"));
        
    }

    public function show($slug)
    {   

        $post = Post::where('slug',$slug)->with('owner','comments')->firstOrFail();
        $comment = Auth::check()? Comment::where('user_id',Auth::id())->where('model_type',Post::class)->where('model_id',$post->id)->first():false;
        $rate = Auth::check()?  Rate::where('user_id',Auth::id())->where('model_type',Post::class)->where('model_id',$post->id)->first():false;

        return Inertia::render("blog/Single",compact("post","comment","rate"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {   
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::where('slug',$slug)->firstOrFail();
        return Inertia::render("dashboard/post/Edit",compact("post","categories","tags"));
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
            $post = Post::find($request->id);
            DB::beginTransaction();
            $post->update([
                "title"=>$request->input('title'),
                "type"=>$request->input('type'),
                "slug"=>$request->input('title').''.Carbon::now(),
                "description"=>$request->input('contente'),
                "category_id"=>$request->input('categorie'),
                "user_id"=>Auth::id(),
            ]);
            //$post->category()->save(request()->category);
            //$post->tag()->saveMany(request()->category);

            DB::commit();
            session()->flash("success","votre article a bien ete mis ajour ");
            return to_route('dashboard.post.myPosts');
        } catch (\Throwable $th) {
            
            DB::rollBack();
            session()->flash("error","Erreur lors de la mis ajour de votre article");
            return back();
        }

    }
    public function addComment(Request $request)
    {   
        try {
             //dd($request->all());
            $post = Post::find($request->id);
            DB::beginTransaction();
                if(!empty($request->comment)){

                    if($request->comment_id && $comment = Comment::find($request->comment_id)){
                        $comment->update(['comment'=>$request->comment]);
                    }else{
                        $post->newComment([
                            'comment'=>$request->comment,
                            'user_id'=>Auth::id(),
                        ]);
                    }
                    
                }
                if($request->rate != 0){
                    if($request->rate_id && $rate = Rate::find($request->rate_id)){
                        $rate->update(['rate'=>$request->rate]);

                    }else{
                        $post->newRate([
                            'rate'=>$request->rate,
                            'user_id'=>Auth::id(),
                        ]);
                    }
                    
                }
            DB::commit();
            session()->flash("success","Votre commentaire et note on bien ete enregister ");
            return back();
        } catch (\Throwable $th) {
            Log::info('error de note et commentaire : '.$th->getMessage());
            DB::rollBack();
            session()->flash("error","Erreur lors de la l'enregistrement de votre note et commentaire");
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
            
        try {
            DB::beginTransaction();
            Post::destroy($request->id);
            DB::commit();
            session()->flash("success","votre article a bien ete suprimer");
            return back();
            
        } catch (\Throwable $th) {
            
            DB::rollBack();
            session()->flash("error","Erreur lors de la suppression de votre article");
            return back();
            
        }
    }
}
