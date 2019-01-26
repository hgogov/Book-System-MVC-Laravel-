@extends('layouts.app')

@section('content')
    <h1>Showing role: {{$role->role}}</h1>
    <div>
        <p>Role: {{$role->role}}</p>
    </div>
    <hr>
    <a href="{{route('roles.index')}}" class="btn btn-outline-dark">Go Back</a>
    @if(Auth::check())
        @if(auth()->user()->isAdmin())
            <a href="/roles/{{$role->id}}/edit" class="btn btn-outline-dark">Edit</a>
            <a href="{{route('roles.create')}}" class="btn btn-primary">Create</a>

            {!!Form::open(['action' => ['RolesController@destroy', $role->id], 'method' => 'POST', 'class' => 'float-right','onsubmit' => 'return ConfirmDelete()']) !!}
            {{csrf_field()}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
        @endif
    @endif
@endsection