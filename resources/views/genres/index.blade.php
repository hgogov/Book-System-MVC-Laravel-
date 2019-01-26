@extends('layouts.app')

@section('content')
    <h1>Genres</h1>
    @if(count($genres) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                @if(!Auth::guest())
                    <th></th>@endif
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{$genre->id}}</td>
                    <td><a href="{{route('genres.show', $genre->id)}}">{{$genre->name}}</a></td>
                    @if(!Auth::guest())
                        <td>
                            <a href="/genres/{{$genre->id}}/edit"
                               class="btn btn-sm btn-outline-dark float-left">Edit</a>
                            <a href="{{route('genres.create')}}" class="btn btn-sm btn-primary float-left">Create</a>
                            <a href="{{route('genres.show', $genre->id)}}" class="btn btn-sm btn-success float-left">Details</a>
                            {!!Form::open(['action' => ['GenresController@destroy', $genre->id], 'method' => 'POST', 'class' => '','onsubmit' => 'return ConfirmDelete()']) !!}
                            {{csrf_field()}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-left'])}}
                            {!!Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$genres->links()}}
    @else
        <p>No genres found</p>
    @endif
@endsection