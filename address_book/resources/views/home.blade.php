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
                          <option value="Ukraine">Ukraine</option>
                      </select>
                    </div>
                </div>
                <div class="col-4 d-flex h-100 justify-content-center align-items-center">
                    <div class="col-3">City: </div>
                    <div class="col-6">
                        <select class="form-control" name="city_id">
                            <option value="Kirovograd">Kirovograd</option>
                        </select>
                    </div>
                </div>
            </td>
          </tr>
          <tr>
            <td class="d-flex justify-content-center"><button class="btn btn-primary">Search</button></td>
          </tr>
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
          <a href="/contact/create">Add new record</a>
      </div>
      <table class="table table-bordered" name="contacts_table">
            <thead>
              <tr class="text-center">
                <th scope="col">@sortablelink('id', '#')</th>
                <th scope="col">@sortablelink('first_name', 'Name')</th>
                <th scope="col">@sortablelink('country.name', 'Country')</th>
                <th scope="col">@sortablelink('city.name', 'City')</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contacts as $contact)
                <tr class="text-center">
                <th scope="row">{{ $contact->id }}</th>
                  <td>{{ $contact->first_name }}</td>
                  <td>{{ $contact->country->name }}</td>
                  <td>{{ $contact->city->name }}</td>
                  <td class="text-center">
                      <a href="/contact/{{$contact->id}}/edit">[Edit]</a>    
                  </td>
                  <td class="text-center">
                      <!-- <a href="/contact/{{$contact->id}}/destroy" onclick="return confirm('Do you really want to delete the record?')">[Delete]</a> -->
                      <form action="/contact/{{$contact->id}}/destroy" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="link" type="submit" onclick="return confirm('Do you really want to delete the record?');">[Delete]</button>
                       </form>
                  </td>
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
