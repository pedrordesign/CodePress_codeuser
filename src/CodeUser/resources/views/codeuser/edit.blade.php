@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Edit User</h3>

        {!! Form::Open(['method' => 'post', 'route' => ['admin.users.store']]) !!}

            <div class="form-group">
                {!! Form::label('Title', 'Name:') !!}
                {!! Form::text('name', $post->name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Email:') !!}
                {!! Form::text('email', $post->email, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', 'Password:') !!}
                {!! Form::text('password', $post->password, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::Close() !!}

    </div>

@endsection