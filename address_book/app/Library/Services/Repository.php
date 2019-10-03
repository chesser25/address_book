<?php
namespace App\Library\Services;

use App\Contact;
use App\City;
use App\Country;
  
class Repository
{
    function __construct(){
        define('CONTACTS_PER_PAGE', 1);
    }

    public function getAllCountries(){
        return Country::all();
    }

    public function getAllCities(){
        return City::all();
    }

    public function getPaginatedContactsList(){
        return Contact::sortable()->paginate(CONTACTS_PER_PAGE);
    }

    public function deleteContact(Contact $contact){
        Contact::where('id', $contact->id)->delete();
    }

    public function findContact($keywords, $country, $city){
        return Contact::where('first_name', 'LIKE', '%' . $keywords . '%')
            ->orWhere('last_name', 'LIKE', '%' . $keywords . '%')
            ->orWhere('city', '=', $city)
            ->orWhere('counntry', '=', $country)
            ->sortable()
            ->paginate(CONTACTS_PER_PAGE);
    }

    public function updateContact($person, $data){
        Contact::where('id', $person->id)->update($data);
    }

    public function createContact($data){
        Contact::create($data);
    }
}