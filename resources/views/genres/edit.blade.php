@extends('layouts.app')

@section('content')
    <h1>Create Genre</h1>
    {!! Form::open(['action' => 'GenresController@update', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Genre Name')}}
        {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Genre Name'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection