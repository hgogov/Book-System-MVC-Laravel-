@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    {!! Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('author_id', 'authors')}}
        {{Form::number('author_id', $book->author_id , ['class' => 'form-control', 'placeholder' => 'Author ID'])}}
    </div>
    <div class="form-group">
        {{Form::label('genre_id', 'Genre ID')}}
        {{Form::number('genre_id', $book->genre_id , ['class' => 'form-control', 'placeholder' => 'Genre ID'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $book->title , ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('publish_date', 'Publish Date')}}
        {{Form::date('publish_date', $book->publish_date , ['class' => 'form-control', 'placeholder' => 'Publish Date'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection