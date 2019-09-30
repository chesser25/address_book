<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function contact(){
        return $this->hasMany(User::class);
    }
}
