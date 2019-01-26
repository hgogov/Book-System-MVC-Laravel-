@extends('layouts.app')

@section('content')
    <h1>Edit Genre</h1>
    {!! Form::open(['action' => ['GenresController@update', $genre->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Genre Name')}}
        {{Form::text('name', $genre->name , ['class' => 'form-control', 'placeholder' => 'Genre Name'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection