@extends('layouts.app')

@section('content')
    <h1>{{$author->name}}</h1>
    <div>
        {{$author->name}}
    </div>
    <hr>
    <a href="{{route('authors.index')}}" class="btn btn-outline-dark">Go Back</a>
    <a href="/authors/{{$author->id}}/edit" class="btn btn-outline-dark">Edit</a>
    <a href="{{route('authors.create')}}" class="btn btn-primary">Create</a>

    {!!Form::open(['action' => ['AuthorsController@destroy', $author->id], 'method' => 'POST', 'class' => 'float-right']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}
@endsection