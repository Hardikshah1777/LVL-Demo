@extends('layout')

@section('content')
    <h1>User Details</h1>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Date:</strong> {{ $user->date }}</p>
    <p><strong>Profile Picture:</strong><br>
        @if($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" width="150" alt="Profile Picture" />
        @else
            No picture uploaded.
        @endif
    </p>

    <a href="{{ route('users.index') }}">Back to List</a>
@endsection
