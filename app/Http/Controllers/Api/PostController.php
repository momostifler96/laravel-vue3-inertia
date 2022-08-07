<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke()
    {   

        $posts = Post::paginate(20)->orderBy('created_at','desc');
        return response()->json(compact('posts'), 200);
    }
    public function search()
    {   

        $posts = Post::where('title','LIKE','%'.request()->query('srh').'%')
        ->orWhere('description','LIKE','%'.request()->query('srh').'%')
        ->paginate(20);
        return response()->json(compact('posts'), 200);
    
    }
    public function popular()
    {   
        $posts = Post::get()->take(5);
        return response()->json(compact('posts'), 200);
    }
}
