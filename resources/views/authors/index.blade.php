@extends('layouts.app')

@section('content')
    <h1>Authors</h1>
    @if(count($authors) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th style="width: 75px">id</th>
                <th>name</th>
                @if(!Auth::guest())<th></th>@endif
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{$author->id}}</td>
                    <td><a href="{{route('authors.show', $author->id)}}">{{$author->name}}</a></td>
                    @if(!Auth::guest())
                    <td style="width: 255px">
                        {!!Form::open(['action' => ['AuthorsController@destroy', $author->id], 'method' => 'POST', 'class' => '','onsubmit' => 'return ConfirmDelete()']) !!}
                        {{csrf_field()}}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-right'])}}
                        {!!Form::close() !!}
                        <a href="/authors/{{$author->id}}/edit" class="btn btn-sm btn-outline-dark">Edit</a>
                        <a href="{{route('authors.create')}}" class="btn btn-sm btn-primary">Create</a>
                        <a href="{{route('authors.show', $author->id)}}" class="btn btn-sm btn-success">Details</a>
                    </td>
                        @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$authors->links()}}
    @else
        <p>No authors found</p>
    @endif
@endsection