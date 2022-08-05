<?php

namespace App\Trait;

use App\Models\Like;

trait Likable
{
    protected function likes()
    {
        return $this->MorphMany(Like::class,"model");
    }

    public function newlike($data)
    {
        return $this->likes()->save($data);
    }

    public function updatelike($data)
    {
        return $this->likes()->update($data);
    }

    public function getLikes($data = null)
    {
        return $this->likes()->get($data);
    }

    public function deletelike($id)
    {
        return $this->likes()->destroy($id);
    }
}
