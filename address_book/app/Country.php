<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Country extends Model
{
    use Sortable;
    public $sortable = ['name'];

    public function contact(){
        return $this->hasMany(User::class);
    }
}
