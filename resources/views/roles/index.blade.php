@extends('layouts.app')

@section('content')
    <h1>Roles</h1>
    @if(count($roles) > 0)
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th style="width: 75px">id</th>
                <th>role</th>
                @if(!Auth::guest())<th></th>@endif
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td><a href="{{route('roles.show', $role->id)}}">{{$role->role}}</a></td>
                    @if(!Auth::guest())
                        <td style="width: 240px">
                            {!!Form::open(['action' => ['RolesController@destroy', $role->id], 'method' => 'POST', 'class' => '','onsubmit' => 'return ConfirmDelete()']) !!}
                            {{csrf_field()}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-right'])}}
                            {!!Form::close() !!}
                            <a href="/roles/{{$role->id}}/edit" class="btn btn-sm btn-outline-dark">Edit</a>
                            <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary">Create</a>
                            <a href="{{route('roles.show', $role->id)}}" class="btn btn-sm btn-success">Details</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$roles->links()}}
    @else
        <p>No roles found</p>
    @endif
@endsection