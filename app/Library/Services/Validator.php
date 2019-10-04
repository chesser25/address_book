<?php
namespace App\Library\Services;

/**
 * Implementation of validator
 * 
 * @author Andrew Lomakin
 * 
 */
class validator {
    private $data_to_validate;

    function __construct() {
        // Data to be validated
        $this->data_to_validate = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'country_id' => 'required',
            'city_id' => 'required',
            'photo' => '',
            'description' => ''
        ];
    }

    /**
     * Validate data when user saves new contact
     * @param $request 
     * @return array of validated data
     */
    public function validate_save_contact($request){
        $this->data_to_validate['photo'] = ['required', 'image']; 
        return $this->validate_data($request);
    }

    /**
     * Validate data when user makes an update of contact
     * @param $request 
     * @return array of validated data
     */
    public function validate_update_contact($request){
        return $this->validate_data($request);
    }

    /**
     * General method to validate
     * @param $request 
     * @return array of validated data
     */
    private function validate_data($request){
        return $request->validate($this->data_to_validate);
    }
}