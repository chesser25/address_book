<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * Country model
 * 
 * @author Andrew Lomakin
 * 
 */
class country extends Model {
    
    // Trait to make sorting of the model by its name
    use Sortable;
    public $sortable = ['name'];

    /**
     * Relation Many-to-One between Country and Contact 
     * The same instance of Country model could be related to many Contacts
     */
    public function contact(){
        return $this->hasMany(Contact::class);
    }
}
