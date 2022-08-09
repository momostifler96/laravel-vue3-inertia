<?php

namespace App\Trait;

use App\Models\Rate;

trait Rater
{   
    protected function rates()
    {
        return $this->hasMany(Rate::class,"user_id");
    }
    public function newrate($data)
    {
        return $this->rates()->save($data);
    }
    public function updaterate($data)
    {
        return Rate::find($data['id'])->update($data);
    }
}
