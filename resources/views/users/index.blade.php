@extends('layout')

@section('content')
    <h1>Users</h1>
    <a href="{{ route('create') }}">Create New User</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Date</th><th>Profile Picture</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->date }}</td>
                <td>
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" width="50" alt="Profile Picture" />
                    @endif
                </td>
                <td>
                    <a href="{{ route('users.show', $user) }}">View</a> |
                    <a href="{{ route('users.edit', $user) }}">Edit</a> |
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
