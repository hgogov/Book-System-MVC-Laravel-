@extends('layouts.app')


@section('content')
    <h1>User: {{$user->name}}</h1>
    <div>
        <table>
            <tr>
                <th>Name:</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Role:</th>
                <td>{{$user->role->role}}</td>
            </tr>
            <tr>
                <th>Join Date:</th>
                <td>{{$user->created_at}}</td>
            </tr>
        </table>
    </div>
    <hr>
    <a href="{{route('users.index')}}" class="btn btn-outline-dark">Go Back</a>
    @if(Auth::check())
        @if(auth()->user()->isAdmin())
            <a href="/users/{{$user->id}}/edit" class="btn btn-outline-dark">Edit</a>
            <a href="{{route('users.create')}}" class="btn btn-primary">Create</a>

            {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right','onsubmit' => 'return ConfirmDelete()']) !!}
            {{csrf_field()}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
        @endif
    @endif

@endsection
