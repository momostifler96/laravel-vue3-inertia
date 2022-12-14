<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends= ['created'];
    protected $with = ['owner'];
    public function comentable()
    {
        return $this->MorphTo("model");
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getCreatedAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d/m/Y h:i:s');
    }
}
