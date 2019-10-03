<?php
namespace App\Library\Services;

use App\contact;
use App\city;
use App\country;

/**
 * Implementation of repository
 * 
 * @author Andrew Lomakin
 * 
 */
class repository {
    
    function __construct(){
        // Constant to indicate a count of contacts per table
        define('CONTACTS_PER_PAGE', 1);
    }

    /**
     * Get a list of all country objects
     * @return array
     */
    public function get_all_countries(){
        return country::all();
    }

    /**
     * Get a list of all city objects
     * @return array
     */
    public function get_all_cities(){
        return city::all();
    }

    /**
     * Get a sortable & paginated list of contacts
     * @return array
     */
    public function get_paginated_contacts_list(){
        return contact::sortable()->paginate(CONTACTS_PER_PAGE);
    }

    /**
     * Delete contact
     * @param contact $contact
     */
    public function delete_contact(Contact $contact){
        contact::where('id', $contact->id)->delete();
    }

    /**
     * Find contact
     * @param $keywords (first or last name)
     * @param $country
     * @param $city
     */
    public function find_contact($keywords, $country, $city){
        return contact::where('first_name', 'LIKE', '%' . $keywords . '%')
            ->orWhere('last_name', 'LIKE', '%' . $keywords . '%')
            ->orWhere('city', '=', $city)
            ->orWhere('counntry', '=', $country)
            ->sortable()
            ->paginate(CONTACTS_PER_PAGE);
    }

    /**
     * Update contact
     * @param contact $person to update
     * @param array list of Contact data
     */
    public function update_contact($person, $data){
        contact::where('id', $person->id)->update($data);
    }

    /**
     * Create contact
     * @param array of contact data
     */
    public function create_contact($data){
        contact::create($data);
    }
}