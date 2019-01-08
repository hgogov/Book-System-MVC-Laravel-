@extends('layouts.app')

@section('content')
    <a href="{{route('books.index')}}" class="btn btn-outline-dark">Go Back</a>
    <h1>{{$book->title}}</h1>
    <div>
        {{$book->title}}
    </div>
    <hr>
    <a href="/books/{{$book->id}}/edit" class="btn btn-outline-dark">Edit</a>

    {!!Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST', 'class' => 'float-right']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}
@endsection