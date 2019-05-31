@extends('layouts.app')
@section('title','Save Log')

@section('content')
<center>
<div class="container">

  <form action="/form-worklog">
    <div class="form-group">
      <label for="email">SAVE SUCCESS</label>
     
    </div>
  
    <button type="submit" class="btn btn-primary">OK</button>
  </form>
</div>
</center>
@endsection