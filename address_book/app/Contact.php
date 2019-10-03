<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * Contact model
 * 
 * @author Andrew Lomakin
 * 
 */
class contact extends Model {
    
    // Trait to make sorting of the model by its name
    use Sortable;
    public $sortable = ['id', 'first_name'];

    // Allow custom field validation
    protected $guarded = [];
    
        
    /**
     * Relation One-to-Many between Contact and Country 
     * The same instance of Contact model could be related only with one Country
     */
    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    /**
     * Relation One-to-Many between Contact and City 
     * The same instance of Contact model could be related only with one City
     */
    public function city(){
        return $this->belongsTo(City::class);
    }
}
