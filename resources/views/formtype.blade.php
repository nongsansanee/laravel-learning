@extends('layouts.app')
@section('title','Save Type')

@section('content')

@if($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
 @endif

    @if($errors->any())
        <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
        </div>
    @endif
<form action="{{url('/savetype')}}" method="post" class="was-validated">
        <!-- <div class="card"> -->
        <input class="form-check-input @error('type') is-invalid @enderror" type="hidden" name="_token" value="{{ csrf_token()}}" ><br>
        <h2 class="card-header">{{$header}}</h2>
      
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">*ชื่องาน:</label>
            <div class="col-sm-10">
                  <!-- <input type="text" class="form-control" name="name" value="{{old('name')}}" maxlength="100" required> -->
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" maxlength="100">
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
            </div>
       

       
           
        <!-- </div>    -->
        <br>
        <center>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-secondary">Cancel</button>
        </center>
    </form>
    @endsection