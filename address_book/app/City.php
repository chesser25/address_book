<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class City extends Model
{
    use Sortable;
    public $sortable = ['name'];

    public function contact(){
        return $this->hasMany(User::class);
    }
}
