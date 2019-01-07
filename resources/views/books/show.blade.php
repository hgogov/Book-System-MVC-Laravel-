@extends('layouts.app')

@section('content')
    <a href="{{route('books.index')}}" class="btn btn-outline-dark">Go Back</a>
    <h1>{{$book->title}}</h1>
    <div>
        {{$book->title}}
    </div>
@endsection