<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function contact(){
        return $this->hasMany(User::class);
    }
}
