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
          <a href="#">Add new record</a>
      </div>
      <table class="table table-bordered" name="contacts_table">
            <thead>
              <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">City</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td class="text-center">
                    <a href="#">[Edit]</a>    
                </td>
                <td class="text-center">
                    <a href="#">[Delete]</a>
                </td>
              </tr>
              <tr class="text-center">
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td class="text-center">
                    <a href="#">[Edit]</a>    
                </td>
                <td class="text-center">
                    <a href="#">[Delete]</a>
                </td>
              </tr>
              <tr class="text-center">
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td class="text-center">
                        <a href="#">[Edit]</a>    
                    </td>
                    <td class="text-center">
                        <a href="#">[Delete]</a>
                    </td>
              </tr>
            </tbody>
          </table>
</div>
@endsection
