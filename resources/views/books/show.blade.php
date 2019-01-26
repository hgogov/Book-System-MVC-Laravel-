@extends('layouts.app')


@section('content')
    <h1>{{$book->title}}</h1>
    <div>
        <table>
            <span class="float-left">
            <tr>
                <td><img style="width: border-box;height: border-box;width: 150px;"
                         src="/storage/cover_images/{{$book->cover_image}}"></td>
            </tr>
            </span>
            <tr>
                <th>Author:</th>
                <td>{{$book->author->name}}</td>
            </tr>
            <tr>
                <th>Genre:</th>
                <td>{{$book->genre->name}}</td>
            </tr>
            <tr>
                <th>Title:</th>
                <td>{{$book->title}}</td>
            </tr>
            <tr>
                <th>Publish Date:</th>
                <td>{{$book->publish_date->format('Y-m-d')}}</td>
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{$book->description}}</td>
            </tr>
        </table>
    </div>
    <hr>
    <a href="{{route('books.index')}}" class="btn btn-outline-dark">Go Back</a>
    @if(Auth::check())
        @if(auth()->user()->isAdmin())
            <a href="/books/{{$book->id}}/edit" class="btn btn-outline-dark">Edit</a>
            <a href="{{route('books.create')}}" class="btn btn-primary">Create</a>

            {!!Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST', 'class' => 'float-right','onsubmit' => 'return ConfirmDelete()']) !!}
            {{csrf_field()}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
        @endif
    @endif

@endsection
