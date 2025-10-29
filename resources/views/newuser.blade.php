<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>New user</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="container-fluid mt-3">

<h3>Add User</h3>
<?php 
    if(isset($user) ? $user->id : '') {
        $manageuser = 'updateuser/'.$user->id;
    }else{
        $manageuser = 'manageuser';
    }
?>
<form action="{{ url($manageuser) }}" method="post">
    @csrf
    <label for="fullname">Full Name:</label><br>
    <input type="text" id="fullname" name="fullname" value="{{ old('fullname', isset($user) ? $user->name : '') }}" placeholder="Enter name" autocomplete="off"><br><br>
    @if ($errors->has('fullname'))
        <div class="error">
            {{ $errors->first('fullname') }}
        </div>
    @endif

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" 
    placeholder="Enter Email" autocomplete="off" @if(isset($user) && $user->id) disabled @endif><br><br>
    @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
    @endif    
    @if(!isset($user))
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="Enter password" autocomplete="off"><br><br>
        @if ($errors->has('password'))
            <div class="error">
                {{ $errors->first('password') }}
            </div>
        @endif


        <label for="password_confirmation">Confirm Password:</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter confirm password" autocomplete="off"><br><br>
    @endif
        <input type="submit" value="Submit" class="btn btn-primary">
        <a href="{{ url('index') }}"><input type="button" value="Cancle" class="btn btn-primary"></a>
    
</form>

</body>
</html>
