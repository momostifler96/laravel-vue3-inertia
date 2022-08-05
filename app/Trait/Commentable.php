<?php

namespace App\Trait;

use App\Models\Comment;

trait Commentable
{   
    protected function comments()
    {
        return $this->MorphMany(Comment::class,"model");
    }

    public function newComment($data)
    {
        return $this->comments()->save($data);
    }

    public function updateComment($data)
    {
        return $this->comments()->update($data);
    }

    public function getComments($data = null)
    {
        return $this->comments()->get($data);
    }

    public function deleteComment($id)
    {
        return $this->comments()->destroy($id);
    }
}
