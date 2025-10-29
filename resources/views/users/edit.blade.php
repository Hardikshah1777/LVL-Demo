@extends('layout')

@section('content')
    <h1>Edit User</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}"><br><br>

        <label>Date:</label><br>
        <input type="date" name="date" value="{{ old('date', $user->date) }}"><br><br>

        <label>Current Profile Picture:</label><br>
        @if($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" alt="Profile Picture" /><br><br>
        @endif

        <label>Change Profile Picture:</label><br>
        <input type="file" name="profile_picture"><br><br>

        <button type="submit">Update</button>
    </form>
@endsection
