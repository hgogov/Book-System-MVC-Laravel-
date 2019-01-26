@extends('layouts.app')

@section('content')
    <h1>Edit User: {{$user->name}}</h1>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $user->name , ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('role_id', 'Role')}}
        {{Form::select('role_id', (['' => 'Select a Role'] + $role_ids->toArray()),
            $user->role_id, ['class' => 'form-control'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection