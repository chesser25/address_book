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
                    <div class="row pt-2">
                        <label for="first_name" class="col-sm">First Name:</label>
                        <input id="first_name" 
                            type="text" 
                            class="form-control col-sm-10
                            @error('first_name') is-invalid @enderror" 
                            name="first_name" 
                            value="{{ old('first_name') }}"  
                            autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback col-sm-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2">
                        <label for="last_name" class="col-sm">Last Name:</label>
                        <input id="last_name" 
                            type="text" 
                            class="form-control col-sm-10
                            @error('last_name') is-invalid @enderror" 
                            name="last_name" 
                            value="{{ old('last_name') }}"  
                            autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback col-sm-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2">
                        <label for="email" class="col-sm">Email:</label>
                        <input id="email" 
                            type="text" 
                            class="form-control col-sm-10
                            @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}"  
                            autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback col-sm-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2">
                        <label for="country" class="col-sm">Country:</label>
                        <select class="form-control m-bot15" name="country" id="country">
                                <option value="Ukraine">Ukraine</option>  
                        </select>

                        @error('country')
                            <span class="invalid-feedback col-sm-6" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2">
                        <label for="city" class="col-sm">City:</label>
                        <select class="form-control m-bot15" name="city" id="city">
                                <option value="Ukraine">Ukraine</option>  
                        </select>

                        @error('city')
                            <span class="invalid-feedback col-sm-6" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-2">
                        <label for="photo" class="col-md-2">Photo:</label>
                        <input type="file" class="form-control-file" id="photo" name="photo"/>
                
                        @error('photo')
                            <strong style="color:red;">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                                    
                <div class="pt-2">
                    <img class="form-control-file" src="/images/no-photo.jpg" alt="" width="300px" height="400px"/>
                </div>

                <div class="form-group row justify-content-center pt-5">
                        <label for="description" class="text-center"><b>Notes:</b></label>
                        <textarea rows="4" cols="50" id="description" 
                            type="text" 
                            class="form-control 
                            @error('description') is-invalid @enderror" 
                            name="description" 
                            value="{{ old('description') }}"  
                            autocomplete="description" autofocus></textarea>
                </div>

                <div class="row pt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mr-1">Save</button>
                    <button class="btn btn-secondary">Return</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
