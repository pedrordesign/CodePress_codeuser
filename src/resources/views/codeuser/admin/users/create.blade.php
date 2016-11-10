@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Create User</h3>

        {!! Form::Open(['method' => 'post', 'route' => ['admin.posts.store']]) !!}

            <div class="form-group">
                {!! Form::label('Title', 'Name:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Username:') !!}
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('roles[]', 'Roles:') !!}
                {!! Form::select('roles[]', $roles, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Email:') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Password:') !!}
                {!! Form::text('password', null, ['class' => 'form-control', 'type' => 'password']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Active', 'Active:') !!}
                {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::Close() !!}

    </div>

@endsection