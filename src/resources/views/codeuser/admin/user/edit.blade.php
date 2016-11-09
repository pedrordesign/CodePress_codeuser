@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Edit User</h3>

        {!! Form::Open(['method' => 'post', 'route' => ['admin.posts.store']]) !!}

            <div class="form-group">
                {!! Form::label('Title', 'Name:') !!}
                {!! Form::text('title', $user->title, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Username:') !!}
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Email:') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Password:') !!}
                {!! Form::text('password', $user->password, ['class' => 'form-control', 'type' => 'password']) !!}
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