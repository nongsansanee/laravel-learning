@extends('layouts.app')
@section('title','Hello Nong')

@section('content')
        <!-- {{$header}}

        <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" value="0">ชาย
        </label>
        </div>
        <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" value="1">หญิง
        </label>
        </div>

        <br>    
        @foreach($genders as $gender)
        <label>
            <input type="radio" name="gender" value="{{$gender['id']}}">{{ $gender['name']}}
        </label>
        
        @endforeach -->

        <form action="/store" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token()}}" ><br>
            Username : <input type="text" name="username"> <br>
            Password : <input type="password" name="password"><br>
            <input type="submit" value="Submit">
        
        </form>

@endsection