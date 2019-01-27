@extends('layouts.app')

@section('content')
    <h2>Dashboard</h2>
    <hr>
    <div class="row">
    <div class="form-group col-md-12">
    <h3>Database Table Statistics:</h3><br>
    <h4>Total Authors: {{\App\Author::all()->count()}}</h4>
    <h4>Total Books: {{\App\Book::all()->count()}}</h4>
    <h4>Total Genres: {{\App\Genre::all()->count()}}</h4>
    <h4>Total Roles: {{\App\Role::all()->count()}}</h4>
    <h4>Total Users: {{\App\User::all()->count()}}</h4>
    </div>
    </div>
    @endsection