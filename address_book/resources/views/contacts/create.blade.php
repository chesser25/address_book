@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/contact" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="text-center">
                    <h1>Add New Record</h1>
                </div>
                <div class="container">
                    <div class="row pt-2 d-flex align-items-baseline">
                        <label for="first_name" class="col-sm-2">First Name:</label>
                        <input id="first_name" 
                            type="text" 
                            class="form-control col-sm-10
                            @error('first_name') is-invalid @enderror" 
                            name="first_name" 
                            value="{{ old('first_name') }}"  
                            autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback col-8 offset-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2 d-flex align-items-baseline">
                        <label for="last_name" class="col-sm">Last Name:</label>
                        <input id="last_name" 
                            type="text" 
                            class="form-control col-sm-10
                            @error('last_name') is-invalid @enderror" 
                            name="last_name" 
                            value="{{ old('last_name') }}"  
                            autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback col-8 offset-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2 d-flex align-items-baseline">
                        <label for="email" class="col-sm">Email:</label>
                        <input id="email" 
                            type="text" 
                            class="form-control col-sm-10
                            @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}"  
                            autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback col-8 offset-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2 d-flex align-items-baseline">
                        <label for="country" class="col-sm">Country:</label>
                        <select class="form-control col-sm-10" name="country_id" id="country_id">
                                @foreach($countries as $country)
                                    <option value="{{ $country->name}}">
                                        {{$country->name}}</option>  
                                @endforeach
                        </select>

                        @error('country')
                            <span class="invalid-feedback col-8 offset-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2 d-flex align-items-baseline">
                        <label for="city" class="col-sm">City:</label>
                        <select class="form-control col-sm-10" name="city_id" id="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->name}}">
                                        {{$city->name}}</option>  
                                @endforeach  
                        </select>

                        @error('city')
                            <span class="invalid-feedback col-8 offset-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2 d-flex align-items-baseline">
                        <label for="photo" class="col-sm">Photo:</label>
                        <input type="file" class="form-control-file col-sm-10" id="photo" name="photo"/>
                
                        @error('photo')
                            <strong class="col-8 offset-2" style="color:red;">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                                
                <div class="container">
                    <div class="row pt-2 d-flex align-items-baseline">
                        <img id="photo-preview" class="form-control-file col-10 offset-2" src="/images/no-photo.jpg" alt="" width="300px" height="400px"/>
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-4 d-flex justify-content-center">
                        <label for="description"><b>Notes:</b></label>
                        <textarea rows="4" cols="50" id="description" 
                            type="text" 
                            class="form-control 
                            @error('description') is-invalid @enderror" 
                            name="description" 
                            value="{{ old('description') }}"  
                            autocomplete="description" autofocus></textarea>
                    </div>
                </div>

                <div class="row pt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mr-1">Save</button>
                    <a class="btn btn-secondary" href='/home'>Return</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

