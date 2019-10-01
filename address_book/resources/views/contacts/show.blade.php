@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="font-weight-bold text-center"> View {{$person->first_name}} {{ $person->last_name }}</h3>
    <hr/>
    <div class="d-flex flex-row justify-content-center pt-5">
        <div>
            <div>
                Name:
            </div>
            <div class="pt-2">
                Location:
            </div>
            <div class="pt-2">
                Email:
            </div>
        </div>
        <div class="pl-5">
            <div>
                {{ $person->first_name }} {{ $person->last_name }}
            </div>
            <div class="pt-2">
                {{ $person->city->name }}, {{ $person->country->name }}
            </div>
            <div class="pt-2">
                {{ $person->email }}
            </div>
        </div>
        <div class="rounded float-left offset-3">
            <img id="photo-preview" class="form-control-file" src="/uploads/{{$person->photo}}" alt="" width="300px" height="400px"/>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-start pt-5">
        <b>Notes:</b>
    </div>
    <hr/>
    <div>
        {{ $person->description ?? 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. '}}
    </div>
    <div class="text-center pt-5">
        <a href="/">Back to the list</a>
    </div>
</div>
@endsection
