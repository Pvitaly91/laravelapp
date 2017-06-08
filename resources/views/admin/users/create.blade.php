@extends('layouts.admin')

@section('content')
    <h1>Create</h1>

    {!! Form::open(['method' => 'POST','action' => 'AdminUsersController@store','files' => true]) !!}
        <div class="form-group">
            {!! Form::label('photo_id','Phone') !!}
            {!! Form::file('photo_id',null,['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',null,['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','Status') !!}
            {!! Form::select('is_active',[1 => "active",0=>'no active'],null,['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role','Role') !!}
            {!! Form::select('role_id',[''=> "Choose option"] + $roles ,null,['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',null,['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add',['class' =>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    @include('includes.form_error')


@endsection