<?php

namespace App\Models;

use App\Trait\Commentable;
use App\Trait\Likable;
use App\Trait\Ratable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory,Likable,Commentable,Ratable;

    protected $guarded = [];

    protected $casts = [
        'links'=>'array',
        'options'=>'array',
    ];
    protected $appends=["picture","created",
            "rate_count",
            "rate_1_count",
            "rate_2_count",
            "rate_3_count",
            "rate_4_count",
            "rate_5_count",
            "comments_count",
        ];
    protected $with = ['owner'];


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
