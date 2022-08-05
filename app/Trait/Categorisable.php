<?php

namespace App\Trait;

use App\Models\Category;

trait Categorisable
{
    public function Categories()
    {
        return $this->belongsToMany(Category::class,"model","category_models");
    }

    public function Owner()
    {
       return $this::class;
    }
}
