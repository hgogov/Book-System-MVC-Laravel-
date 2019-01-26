@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    @if(count($users) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th> id</th>
                <th> name</th>
                <th> email</th>
                <th> role</th>
                <th> join date</th>
                @if(!Auth::guest())
                    <th></th>@endif
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('users.show', $user->id)}}">{{$user->name}}</a></td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->role->role}} </td>
                    <td> {{$user->created_at->format('Y-m-d')}} </td>
                    @if(!Auth::guest())
                        <td>
                            <a href="/users/{{$user->id}}/edit"
                               class="btn btn-sm btn-outline-dark float-left">Edit</a>
                            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary float-left">Create</a>
                            <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-success float-left">Details</a>
                            {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => '','onsubmit' => 'return ConfirmDelete()']) !!}
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
        {{$users->links()}}
    @else
        <p>No users found</p>
    @endif
@endsection