@extends('layouts.app')

@section('content')
    <h1>Create Author</h1>
    {!! Form::open(['action' => 'AuthorsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection