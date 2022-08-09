<?php

namespace App\Trait;

trait Commenter
{   
    protected function comments()
    {
        return $this->hasMany(Comment::class,"user_id");
    }

    public function deleteComment($id)
    {
        return $this->comments()->destroy($id);
    }

    public function updateComment($data)
    {
        return $this->comments()->update($data);
    }
}
