@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered" name="search_table">
        <thead>
          <tr>
            <th class="text-center" colspan="4">
                <h3>Search</h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <form action="search" method="GET">
              @csrf
              <tr>
                <td class="d-flex">
                    <div class="col-4 d-flex h-100 justify-content-center align-items-center">
                        <div class="col-3">Keywords: </div>
                        <div class="col-6">
                            <input name="keywords" id="keywords"/>
                        </div>
                    </div>
                    <div class="col-4 d-flex h-100 justify-content-center align-items-center">
                        <div class="col-3">Country: </div>
                        <div class="col-6">
                            <select class="form-control" name="country_id">
                                @foreach($countries as $country)
                                    <option value="{{ $country->name}}">{{$country->name}}</option>  
                                @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-4 d-flex h-100 justify-content-center align-items-center">
                        <div class="col-3">City: </div>
                        <div class="col-6">
                            <select class="form-control" name="city_id">
                                @foreach($cities as $city)
                                  <option value="{{ $city->name}}">{{$city->name}}</option>  
                                @endforeach
                            </select>
                        </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Search</button>
                </td>
              </tr>
          </form>
        </tbody>
      </table>
      @if (Auth::check())
        <div class="d-flex justify-content-center">
            <a href="/contact/create">Add new record</a>
        </div>
      @endif
      <table class="table table-bordered" name="contacts_table">
            <thead>
              <tr class="text-center">
                <th scope="col">@sortablelink('id', '#')</th>
                <th scope="col">@sortablelink('first_name', 'Name')</th>
                <th scope="col">@sortablelink('country.name', 'Country')</th>
                <th scope="col">@sortablelink('city.name', 'City')</th>
                @if (Auth::check())
                  <th colspan="2">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($contacts as $contact)
                <tr class="text-center">
                <th scope="row">{{ $contact->id }}</th>
                  <td>
                    @if (Auth::check())
                      {{ $contact->first_name }}
                    @else
                      <a href="/contact/{{$contact->id}}">{{ $contact->first_name }}</a>
                    @endif
                  </td>
                  <td>{{ $contact->country->name }}</td>
                  <td>{{ $contact->city->name }}</td>
                  @if (Auth::check())
                    <td class="text-center">
                        <a href="/contact/{{$contact->id}}/edit">[Edit]</a>    
                    </td>
                    <td class="text-center">
                        <form action="/contact/{{$contact->id}}/destroy" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="link" type="submit" onclick="return confirm('Do you really want to delete the record?');">[Delete]</button>
                        </form>
                    </td>
                  @endif
                </tr>
              @endforeach
              
            </tbody>
          </table>
          <div class="row">
              <div class="col-12">
                  {{ $contacts->links() }}
              </div>
          </div>
</div>
@endsection
