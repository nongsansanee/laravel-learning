@extends('layouts.app')
@section('title','USERS')

@section('content')

<h2>Username Login:{{Auth::user()->name}}</h2>

<h1 class="text-center">USERS</h1>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
      <tr>

      <tbody id="myTable">
    @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
<div class="pagination justify-content-center">
  {{$users->links()}}
</div>

@endsection