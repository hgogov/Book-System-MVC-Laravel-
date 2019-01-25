@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    {!! Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('author_id', 'Author')}}
        {{Form::select('author_id', $author_ids->toArray(),
            $book->author_id, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('genre_id', 'Genre')}}
        {{Form::select('genre_id', $genre_ids->toArray(),
            $book->genre_id, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $book->title , ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('publish_date', 'Publish Date')}}
        {{Form::date('publish_date', $book->publish_date , ['class' => 'form-control', 'placeholder' => 'Publish Date'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $book->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('cover_image', 'Cover Image')}}
        {{Form::file('cover_image',['class' => 'form-control'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection