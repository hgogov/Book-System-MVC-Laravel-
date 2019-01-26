@extends('layouts.app')

@section('content')
    <h1>Create User</h1>
    {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::email('email', '' , ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password')}}
        {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
    </div>
    <div class="form-group">
        {{Form::label('password_confirmation', 'Confirm Password')}}
        {{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password'])}}
    </div>
    <div class="form-group">
        {{Form::label('role_id', 'Role')}}
        {{Form::select('role_id', (['' => 'Select a Role'] + $role_ids->toArray()),
            null, ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection