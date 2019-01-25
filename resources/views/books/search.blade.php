@extends('layouts.app')

@section('content')
    <h1>Books</h1>
    @if(count($books) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                @if(!Auth::guest())
                    <th> id</th>@endif
                <th style=@if(Auth::guest())"border-right: hidden"@endif> @if(!Auth::guest())cover @endif</th>
                <th> title</th>
                <th> author</th>
                <th> genre</th>
                <th> publish date</th>
                @if(!Auth::guest())
                    <th></th>@endif
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    @if(!Auth::guest())
                        <td> {{$book->id}} </td>@endif
                    <td style="width: 75px;border-right: hidden"><a href="{{route('books.show', $book->id)}}"><img
                                    src="/storage/cover_images/{{$book->cover_image}}"
                                    style="width: 50px; height: 75px;"></a></td>
                    <td><a href="{{route('books.show', $book->id)}}"> {{$book->title}}</a></td>
                    <td> {{$book->author->name}} </td>
                    <td> {{$book->genre->name}} </td>
                    <td> {{$book->publish_date->format('Y-m-d')}} </td>
                    @if(!Auth::guest())
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
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$books->links()}}
    @else
        <p>There are no books found</p>
    @endif
@endsection