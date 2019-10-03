<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Library\Services\Repository;
use \App\Library\Services\ImageManager;
use \App\Library\Services\Validator;

class ContactsController extends Controller
{
    private $repository;
    private $imageManager;
    private $validator;

    function __construct(Repository $repository, ImageManager $imageManager, Validator $validator){
        $this->repository = $repository;
        $this->imageManager = $imageManager;
        $this->validator = $validator;
    }

    public function index(){
        return view('contacts.index', [
            'contacts' => $this->repository->getPaginatedContactsList(),
            'countries' => $this->repository->getAllCountries(),
            'cities' => $this->repository->getAllCities()
        ]);
    }

    public function show(Contact $person){
        return view('contacts.show', compact('person'));
    }

    public function create(){
        return view('contacts/create',[
            'countries' => $this->repository->getAllCountries(),
            'cities' => $this->repository->getAllCities()
        ]);
    }

    public function store(){
        // Validate data
        $data = $this->validator->validateSave(request());

        $data['photo'] = $this->imageManager->save($data['photo']);
        $data['country_id'] = $this->repository->getCountryByName($data['country_id'])->id;
        $data['city_id'] = $this->repository->getCityByName($data['city_id'])->id;
        $this->repository->createContact($data);

        // Show a list of all contacts
        return redirect('/dashboard');
    }

    public function edit(Contact $person){
        return view('contacts.edit', [
            'person' => $person,
            'countries' => $this->repository->getAllCountries(),
            'cities' => $this->repository->getAllCities()
        ]);
    }

    public function update(Contact $person){
        // Validate data
        $data = $this->validator->validateUpdate(request());

        $data['country_id'] = $this->repository->getCountryByName($data['country_id'])->id;
        $data['city_id'] = $this->repository->getCityByName($data['city_id'])->id;

        // Save photo
        if(isset($data['photo'])){
            $this->imageManager->delete($person->photo);
            $data['photo'] = $this->imageManager->save($data['photo']);
        }else{
            $data['photo'] = $person->photo;
        }

        $this->repository->updateContact($person, $data);
        return redirect('/dashboard');
    }

    public function destroy(Contact $person){
        $this->imageManager->delete($person->photo);
        $this->repository->deleteContact($person);
        return redirect('/dashboard');
    }

    public function search(){
        $keywords = request()['keywords'];
        $country = request()['country_id'];
        $city = request()['city_id'];

        return view('contacts.index', [
            'contacts' => $contacts,
            'countries' => $this->repository->getAllCountries(),
            'cities' => $this->repository->findContact($keywords, $country, $city)
        ]);
    }
}
