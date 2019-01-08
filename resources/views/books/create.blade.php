@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['action' => 'BooksController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('author_id', 'Author ID')}}
        {{Form::number('author_id', '' , ['class' => 'form-control', 'placeholder' => 'authors'])}}
    </div>
    <div class="form-group">
        {{Form::label('genre_id', 'Genre ID')}}
        {{Form::number('genre_id', '' , ['class' => 'form-control', 'placeholder' => 'Genre ID'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '' , ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('publish_date', 'Publish Date')}}
        {{Form::date('publish_date', '' , ['class' => 'form-control', 'placeholder' => 'Publish Date'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection