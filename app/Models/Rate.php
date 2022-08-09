<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ratable()
    {
        return $this->MorphTo("model");
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
