<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Country;
use \App\City;

class ContactsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $countries = Country::all();
        $cities = City::all();
        return view('contacts/create',[
            'countries' => $countries,
            'cities' => $cities
        ]);
    }

    public function store(){
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'country' => 'required',
            'city' => 'required',
            'photo' => ['required', 'image'],
            'description' => ''
        ]);
        $country = \App\Country::where('name', $data['country'])->firstOrFail();
        $city = \App\City::where('name', $data['city'])->firstOrFail();
        $contact = new \App\Contact();
        $contact->first_name = $data['first_name'];
        $contact->last_name = $data['last_name'];
        $contact->email = $data['email'];
        $contact->photo = $data['photo'];
        $contact->description = $data['description'];
        $contact->country_id = $country;
        $contact->city_id = $city;
        $contact->save();
        return view('/home');
    }
}
