@extends('layouts.admin')

@section('content')
<h1>Edit user </h1>
<div class="row">
    @include('includes.form_error')
</div>
<div class="row">
    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user,['method' => 'PATCH','action' => ['AdminUsersController@update',$user->id],'files' => true]) !!}
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
                {!! Form::select('role_id', $user->allRoles ,null,['class' =>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password') !!}
                {!! Form::password('password',null,['class' =>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add',['class' =>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        {!! Form::Open(['method' => "DELETE", 'action' =>['AdminUsersController@destroy',$user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete user',['class'=> 'btn btn-danger']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>




@endsection