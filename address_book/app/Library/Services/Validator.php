<?php
namespace App\Library\Services;

use App\Contact;
use App\City;
use App\Country;
  
class Validator
{
    private $dataToValidate;
    
    function __construct(){
        $this->dataToValidate = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'country_id' => 'required',
            'city_id' => 'required',
            'photo' => '',
            'description' => ''
        ];
    }

    public function validateSave($request){
        $this->dataToValidate['photo'] = ['required', 'image']; 
        return $this->validateData($request);
    }

    public function validateUpdate($request){
        return $this->validateData($request);
    }

    private function validateData($request){
        return $request->validate($this->dataToValidate);
    }
}