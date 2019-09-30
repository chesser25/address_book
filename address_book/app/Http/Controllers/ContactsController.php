<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Country;
use \App\City;

use Image;

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
        // Validate data
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'country' => 'required',
            'city' => 'required',
            'photo' => ['required', 'image'],
            'description' => ''
        ]);

        // Get foreign keys objects 
        $country = \App\Country::where('name', $data['country'])->firstOrFail();
        $city = \App\City::where('name', $data['city'])->firstOrFail();
        
        // Save photo
        //$photoPath = request('photo')->store('uploads', 'public');
        $thumbnailImage = Image::make(request('photo'));
        $thumbnailImage = $thumbnailImage->resize(300, 400);
        $thumbnailImage = $thumbnailImage->save('uploads/'.time().request('photo')->getClientOriginalName());

        // Create new contact and save in db
        $contact = new \App\Contact();
        $contact->first_name = $data['first_name'];
        $contact->last_name = $data['last_name'];
        $contact->email = $data['email'];
        $contact->photo = $thumbnailImage->basename;
        $contact->description = $data['description'];
        $contact->country_id = $country->id;
        $contact->city_id = $city->id;
        $contact->save();

        // Show a list of all contacts
        return redirect('/home');
    }
}
