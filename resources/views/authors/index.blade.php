@extends('layouts.app')

@section('content')
    <h1>Authors</h1>
    @if(count($authors) > 0)
        @foreach($authors as $author)
            <div class="card card-body bg-light">
                <h3><a href="{{route('authors.show', $author->id)}}">{{$author->name}}</a></h3>
            </div>
        @endforeach
        {{$authors->links()}}
    @else
        <p>No authors found</p>
    @endif
@endsection