@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'UsersController@search', 'method' => 'GET']) !!}
    <div class="input-group">
        {{Form::text('q', '' , ['class' => 'form-group', 'placeholder' => 'Search users'])}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary form-group'])}}
    </div>
    {!! Form::close() !!}
    @if(count($users) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th style="width: 75px"> id</th>
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
                        <td style="width: 255px;">
                            {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => '','onsubmit' => 'return ConfirmDelete()']) !!}
                            {{csrf_field()}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-right'])}}
                            {!!Form::close() !!}
                            <a href="/users/{{$user->id}}/edit"
                               class="btn btn-sm btn-outline-dark">Edit</a>
                            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Create</a>
                            <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-success">Details</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--{{$users->links()}}--}}
        {{$users->appends(request()->input())->links()}}
    @else
        <p>No results found!</p>
    @endif
    <a href="{{route('users.index')}}" class="btn btn-outline-dark">Go Back</a>
@endsection