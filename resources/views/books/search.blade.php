@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'BooksController@search', 'method' => 'GET']) !!}
    <div class="form-group">
        {{Form::select('author_id', (['' => 'Search by Author'] + $author_ids->toArray()),
            null, ['class' => 'form-group'])}}
        {{Form::select('genre_id', (['' => 'Search by Genre'] + $genre_ids->toArray()),
            null, ['class' => 'form-group'])}}
    </div>
    <div class="input-group">

        {{Form::text('q', '' , ['class' => 'form-group', 'placeholder' => 'Search books'])}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary form-group'])}}
    </div>
    {!! Form::close() !!}
    @if(count($books) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                @if(Auth::check())
                    @if(auth()->user()->isAdmin())
                        <th> id</th>@endif @endif
                <th style=@if(Auth::check()) @if(!auth()->user()->isAdmin())"border-right: hidden"@endif @endif> @if(Auth::check()) @if(auth()->user()->isAdmin())
                        cover @endif @endif</th>
                <th> title</th>
                <th> author</th>
                <th> genre</th>
                <th> publish date</th>
                @if(Auth::check())
                    @if(auth()->user()->isAdmin())
                        <th></th>@endif @endif
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    @if(Auth::check())
                        @if(auth()->user()->isAdmin())
                            <td> {{$book->id}} </td>@endif @endif
                    <td style="width: 75px;border-right: hidden"><a href="{{route('books.show', $book->id)}}"><img
                                    src="/storage/cover_images/{{$book->cover_image}}"
                                    style="width: 50px; height: 75px;"></a></td>
                    <td><a href="{{route('books.show', $book->id)}}"> {{$book->title}}</a></td>
                    <td> {{$book->author->name}} </td>
                    <td> {{$book->genre->name}} </td>
                    <td> {{$book->publish_date->format('Y-m-d')}} </td>
                    @if(Auth::check())
                        @if(auth()->user()->isAdmin())
                            <td style="width: 240px">
                                {!!Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST', 'class' => '','onsubmit' => 'return ConfirmDelete()']) !!}
                                {{csrf_field()}}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-right'])}}
                                {!!Form::close() !!}
                                <a href="/books/{{$book->id}}/edit" class="btn btn-sm btn-outline-dark">Edit</a>
                                <a href="{{route('books.create')}}" class="btn btn-sm btn-primary">Create</a>
                                <a href="{{route('books.show', $book->id)}}" class="btn btn-sm btn-success">Details</a>
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--{{$books->links()}}--}}
        {{$books->appends(request()->input())->links()}}
    @else
        <p>No results found!</p>
    @endif
    <a href="{{route('books.index')}}" class="btn btn-outline-dark">Go Back</a>
@endsection