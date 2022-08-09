<?php

namespace App\Trait;

use App\Models\Comment;

trait Commentable
{   
    public function comments()
    {
        return $this->morphMany(Comment::class,"model");
    }

    public function newComment($data)
    {
        return $this->comments()->create($data);
    }

    public function getAllComments($data = null)
    {
        return $this->comments()->orderBy('created_at','desc')->paginate();
    }
    public function getComments($data = null)
    {
        return $this->comments()->orderBy('created_at','desc')->when($data,function($com,$dt){
            return $com->pluck($dt);
        })->take(5);
    }

    

    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }

    
}
