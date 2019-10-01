<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Country;
use \App\City;
use \App\Contact;

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
        $country = Country::where('name', $data['country'])->firstOrFail();
        $city = City::where('name', $data['city'])->firstOrFail();
        
        // Save photo
        $thumbnailImage = Image::make(request('photo'));
        $thumbnailImage = $thumbnailImage->resize(300, 400);
        $thumbnailImage = $thumbnailImage->save('uploads/'.time().request('photo')->getClientOriginalName());

        // Create new contact and save in db
        $contact = new Contact();
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

    public function edit(Contact $person){
        $countries = Country::all();
        $cities = City::all();
        return view('contacts.edit', [
            'person' => $person,
            'countries' => $countries,
            'cities' => $cities
        ]);
    }

    public function update(Contact $person){
        // Validate data
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'country' => 'required',
            'city' => 'required',
            'photo' => '',
            'description' => ''
        ]);

        // Get foreign keys objects 
        $country = Country::where('name', $data['country'])->firstOrFail();
        $city = City::where('name', $data['city'])->firstOrFail();

        
        unset($data['country']);
        unset($data['city']);

        $data['country_id'] = $country->id;
        $data['city_id'] = $city->id;

        // Save photo
        if(isset($data['photo'])){
            unlink('uploads/' . $person->photo);
            $thumbnailImage = Image::make(request('photo'));
            $thumbnailImage = $thumbnailImage->resize(300, 400);
            $thumbnailImage = $thumbnailImage->save('uploads/'.time().request('photo')->getClientOriginalName());
            $data['photo'] = $thumbnailImage->basename;
        }else{
            $data['photo'] = $person->photo;
        }

        Contact::where('id', $person->id)->update($data);
        return redirect('/home');
    }

    public function destroy(Contact $person){
        unlink('uploads/' . $person->photo);
        Contact::where('id', $person->id)->delete();
        return redirect('/home');
    }
}
