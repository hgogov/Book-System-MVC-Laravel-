@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['action' => 'BooksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('author_id', 'Author')}}
        {{Form::select('author_id', (['' => 'Select an Author'] + $author_ids->toArray()),
            null, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('genre_id', 'Genre')}}
        {{Form::select('genre_id', (['' => 'Select a Genre'] + $genre_ids->toArray()),
            null, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '' , ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('publish_date', 'Publish Date')}}
        {{Form::date('publish_date', '' , ['class' => 'form-control', 'placeholder' => 'Publish Date'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description','', ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('cover_image', 'Cover')}}
        {{Form::file('cover_image',['class' => 'form-control'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection