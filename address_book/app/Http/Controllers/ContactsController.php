<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function create(){
        return view('contacts/create');
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
        dd(request()->all());
    }
}
