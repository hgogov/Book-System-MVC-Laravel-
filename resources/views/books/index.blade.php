@extends('layouts.app')

@section('content')
    <h1>Books</h1>
    @if(count($books) > 0)
        @foreach($books as $book)
            <div class="card card-body bg-light">
                <h3><a href="{{route('books.show', $book->id)}}">{{$book->title}}</a></h3>
                <small>Published on {{$book->publish_date->format('Y-m-d')}}</small>
            </div>
        @endforeach
        {{$books->links()}}
    @else
        <p>No books found</p>
    @endif
@endsection