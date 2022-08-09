<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function likable()
    {
        return $this->MorphTo("model");
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
