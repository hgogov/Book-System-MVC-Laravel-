@extends('layouts.app')

@section('content')
    <h1>Genres</h1>
    @if(count($genres) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th style="width: 75px">id</th>
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
                        <td style="width: 240px">
                            {!!Form::open(['action' => ['GenresController@destroy', $genre->id], 'method' => 'POST', 'class' => '','onsubmit' => 'return ConfirmDelete()']) !!}
                            {{csrf_field()}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-right'])}}
                            {!!Form::close() !!}
                            <a href="/genres/{{$genre->id}}/edit"
                               class="btn btn-sm btn-outline-dark">Edit</a>
                            <a href="{{route('genres.create')}}" class="btn btn-sm btn-primary">Create</a>
                            <a href="{{route('genres.show', $genre->id)}}" class="btn btn-sm btn-success">Details</a>
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