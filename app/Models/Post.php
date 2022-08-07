<?php

namespace App\Models;

use App\Trait\Commentable;
use App\Trait\Likable;
use Carbon\Carbon;
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
    protected $appends=["picture","created"];
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function getPictureAttribute()
    {
        return /* $this->getFirstMediaUrl("picture")?$this->getFirstMediaUrl("picture"): */"/images/image-placeholder.png";
    }
    public function getCreatedAttribute(): string
        {
            return Carbon::parse($this->created_at)->format('d/m/Y h:i:s');
        }
}
