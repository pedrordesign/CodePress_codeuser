@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Users</h3>

        <a href="{{ route('admin.users.create') }}">Create User</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <!--<th>Content</th>-->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <!--<td>{{ str_limit($user->content, 55) }}</td>-->
                        <td>
                            <a name="link_edit_user_{{$user->id}}" href="{{route('admin.users.edit', ['id' => $user->id])}}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

@endsection