<?php

namespace App\Trait;

use App\Models\Rate;

trait Ratable
{   
    protected function rate()
    {
        return $this->morphMany(Rate::class,"model");
    }
    public function newRate($data)
    {
        return $this->rate()->create($data);
    }
    public function updaterate($data)
    {
        return $this->rate()->update($data);
    }

    public function getRateCountAttribute()
    {
        return $this->rate()->count();
    }
    public function getRate5CountAttribute()
    {
        return $this->rate()->where('rate',5)->count();
    }
    public function getRate4CountAttribute()
    {
        return $this->rate()->where('rate',4)->count();
    }
    public function getRate3CountAttribute()
    {
        return $this->rate()->where('rate',3)->count();
    }
    public function getRate2CountAttribute()
    {
        return $this->rate()->where('rate',2)->count();
    }
    public function getRate1CountAttribute()
    {
        return $this->rate()->where('rate',1)->count();
    }
    public function getRateAttribute()
    {
        return $this->rate()->where('rate',1)->count();
    }
}
