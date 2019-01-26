@extends('layouts.app')

@section('content')
    <h1>{{$genre->name}}</h1>
    <div>
        {{$genre->name}}
    </div>
    <hr>
    <a href="{{route('genres.index')}}" class="btn btn-outline-dark">Go Back</a>
    @if(Auth::check())
        @if(auth()->user()->isAdmin())
            <a href="/genres/{{$genre->id}}/edit" class="btn btn-outline-dark">Edit</a>
            <a href="{{route('genres.create')}}" class="btn btn-primary">Create</a>

            {!!Form::open(['action' => ['GenresController@destroy', $genre->id], 'method' => 'POST', 'class' => 'float-right','onsubmit' => 'return ConfirmDelete()']) !!}
            {{csrf_field()}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
        @endif
    @endif
@endsection