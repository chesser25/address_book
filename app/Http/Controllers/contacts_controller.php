<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Library\Services\repository;
use \App\Library\Services\image_manager;
use \App\Library\Services\validator;
use App\contact;

/**
 * Implementation of contacts controller
 * 
 * @author Andrew Lomakin
 * 
 */
class contacts_controller extends Controller {

    // Services
    private $repository;
    private $image_manager;
    private $validator;

    // Initialize services in constructor
    function __construct(repository $repository, image_manager $image_manager, validator $validator){
        $this->repository = $repository;
        $this->image_manager = $image_manager;
        $this->validator = $validator;
    }

    /**
     * Start page, when user open website
    */
    public function index(){
        return view('contacts.index', array_merge([
            'contacts' => $this->repository->get_paginated_contacts_list(),
        ], $this->get_cities_and_countries()));
    }

    /**
     * Show a page of concrete contact info
     * @param Contact $person 
    */
    public function show(contact $person){
        return view('contacts.show', compact('person'));
    }

    /**
     * Show a page to create new contact
    */
    public function create(){
        return view('contacts/create', $this->get_cities_and_countries());
    }

    /**
     * Handle contact creation
    */
    public function store(){
        // Validate data
        $data = $this->validator->validate_save_contact(request());

        // Save photo on disk and return its name to data array
        $data['photo'] = $this->image_manager->save($data['photo']);

        // Save new contact in db
        $this->repository->create_contact($data);

        // Show a list of all contacts
        return redirect('/dashboard');
    }

    /**
     * Show a page to edit an existing contact
     * @param Contact $person
    */
    public function edit(contact $person){
        return view('contacts.edit', array_merge([
            'person' => $person
        ], $this->get_cities_and_countries()));
    }

    /**
     * Handle update of existing contact
     * @param Contact $person
    */
    public function update(contact $person){
        // Validate data
        $data = $this->validator->validate_update_contact(request());

        if(isset($data['photo'])){
            // Remove previous image file from disk
            $this->image_manager->delete($person->photo);
            // Save new photo and return its name to a list of data
            $data['photo'] = $this->image_manager->save($data['photo']);
        } else {
            $data['photo'] = $person->photo;
        }

        // Update data in db
        $this->repository->update_contact($person, $data);

        // Show a list of all contacts
        return redirect('/dashboard');
    }

    /**
     * Destroy contact
     * @param Contact $person
    */
    public function destroy(contact $person){
        // Remove photo related to this contact
        $this->image_manager->delete($person->photo);

        // Remove contact from db
        $this->repository->delete_contact($person);

        return redirect('/dashboard');
    }

    /**
     * Find contacts by keywords, country or city
    */
    public function search(){
        // Search input data
        $keywords = request()['keywords'];
        $country = request()['country_id'];
        $city = request()['city_id'];

        return view('contacts.index', array_merge([
            'contacts' => $this->repository->find_contact($keywords, $country, $city)   
        ], $this->get_cities_and_countries()));
    }

    /**
     * Help function to get all cities and countries at once
     * @return array of all countries and cities
     */
    private function get_cities_and_countries(){
        return ['countries' => $this->repository->get_all_countries(),
                'cities' => $this->repository->get_all_cities()];
    }
}
