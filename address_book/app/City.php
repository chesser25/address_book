<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * City model
 * 
 * @author Andrew Lomakin
 * 
 */
class city extends Model {
    
    // Trait to make sorting of the model by its name
    use Sortable;
    public $sortable = ['name'];

    /**
     * Relation Many-to-One between City and Contact 
     * The same instance of City model could be related to many Contacts
     */
    public function contact(){
        return $this->hasMany(Contact::class);
    }
}
