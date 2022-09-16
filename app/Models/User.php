<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_confirmed_at',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'email_verified_at',
        'created_at',
        'updated_at',
        'birthday',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',

    ];

    protected $appends=["picture","full_name","created","birthday_date"];

    public function registerMediaCollections(): void
        {
            $this->addMediaCollection('picture');
        }

        public function getFullNameAttribute(): string
        {
            return $this->last_name . ' ' . $this->first_name;
        }
    public function getPictureAttribute()
        {
            return /* $this->getFirstMediaUrl("picture")?$this->getFirstMediaUrl("picture"): */"/images/avatar.png";
        }

    public function getCreatedAttribute(): string
        {
            return Carbon::parse($this->created_at)->format('d/m/Y');
        }

    public function getBirthdayDateAttribute(): string
        {
            return Carbon::parse($this->birthday)->format('d/m/Y');
        }

    public function posts()
    {
        return $this->HasMany(Post::class);
    }


}
