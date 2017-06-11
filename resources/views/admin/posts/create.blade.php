@extends('layouts.admin')

@section('content')
    <h1>Post create page</h1>

        {!! Form::open(['method' => 'POST','action' => 'AdminPostsController@store','files' => true]) !!}
                @include('includes.form_error')
                <div class="form-group">
                    {!! Form::label('photo_id','Photo') !!}
                    {!! Form::file('photo_id',null,['class' =>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title','Title') !!}
                    {!! Form::text('title',null,['class' =>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id','Category') !!}
                    {!! Form::select('category_id',[''=> "Choose option"] ,null,['class' =>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body','body') !!}
                    {!! Form::textarea('body',null,['class' =>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Add',['class' =>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
@endsection