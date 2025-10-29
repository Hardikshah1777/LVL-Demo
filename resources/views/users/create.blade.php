@extends('layout')

@section('content')
    <h1>Create User</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Date:</label><br>
        <input type="date" name="date" value="{{ old('date') }}"><br><br>

        <label>Profile Picture:</label><br>
        <input type="file" name="profile_picture"><br><br>

        <button type="submit">Create</button>
    </form>
@endsection
