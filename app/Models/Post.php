<?php

namespace App\Models;

use App\Trait\Commentable;
use App\Trait\Likable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory,Likable,Commentable;

    protected $guarded = [];

    protected $casts = [
        'links'=>'array',
        'options'=>'array',
    ];
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
