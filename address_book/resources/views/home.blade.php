@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered">
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
</div>
@endsection
