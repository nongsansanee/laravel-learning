@extends('layouts.app')
@section('title','upload-excel')

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

<!-- <div class="form-group">
            <label>file excel:</label>
            <input type="file" name="file_upload_xls">

        </div> -->
<h2>Import Data From Excel File</h2>
<div class="card">
    <div class="card-body">
        <form class="md-form" action="{{url('/up-excel-file')}}" method="post" enctype="multipart/form-data">
        <input  type="hidden" name="_token" value="{{ csrf_token()}}" ><br>
            <div class="form-group">
                 <input type="file" class="form-control-file border" name="file_upload" >
            </div>
            <center> <button type="submit" class="btn btn-primary">Submit</button> </center>
        </form>
    </div>
</div>
@endsection