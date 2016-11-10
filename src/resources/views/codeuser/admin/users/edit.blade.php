@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Edit User</h3>

        {!! Form::Open(['method' => 'put', 'route' => ['admin.users.update', $user->id ]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('title', $user->name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Active', 'Active:') !!}
                {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('roles[]', 'Roles:') !!}
                {!! Form::select('roles[]', $roles, $user->roles->pluck('id')->toArray(), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::Close() !!}

    </div>

@endsection