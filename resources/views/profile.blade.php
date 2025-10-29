<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-BFWSxuGpjY5ws/UktvuF0TH9Zpe+74DPAHKmtdH8bKtPJqX1Di02biG8oJlOWjilJNfIyvkQjkwuS1+xNcGV5w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        * {
            margin: 0;
            padding: 0
        }

        body {
            background-color: #000
        }

        .card {
            width: 350px;
            background-color: #efefef;
            border: none;
            cursor: pointer;
            transition: all 0.5s;
        }

        .image img {
            transition: all 0.5s
        }

        .card:hover .image img {
            transform: scale(1.5)
        }

        .btn {
            height: 140px;
            width: 140px;
            border-radius: 50%
        }

        .name {
            font-size: 22px;
            font-weight: bold
        }

        .idd {
            font-size: 14px;
            font-weight: 600
        }

        .idd1 {
            font-size: 12px
        }

        .number {
            font-size: 22px;
            font-weight: bold
        }

        .follow {
            font-size: 12px;
            font-weight: 500;
            color: #444444
        }

        .btn1 {
            height: 40px;
            width: 150px;
            border: none;
            background-color: #000;
            color: #aeaeae;
            font-size: 15px
        }

        .text span {
            font-size: 13px;
            color: #545454;
            font-weight: 500
        }

        .icons i {
            font-size: 19px
        }

        hr .new1 {
            border: 1px solid
        }

        .join {
            font-size: 14px;
            color: #a0a0a0;
            font-weight: bold
        }

        .date {
            background-color: #ccc
        }
    </style>
</head>
<body>
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <a href="{{url('index')}}"><i class="fa fa-chevron-left"></i></a><span></span>
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary">
                <img src="http://localhost/edloomio/pluginfile.php/2174/user/icon/primelight/f1?rev=54715" height="100" width="100"/>
            </button>
            <span class="name mt-3">{{$user->name}}</span>
            <span class="idd">{{$user->email}}</span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd1">9685742569</span> <span></span>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                <span class="number">1069 <span class="follow">Followers</span></span>
            </div>
            <div class=" d-flex mt-2">
                <a href="{{ url('edit/' . $user->id) }}"><button class="btn1 btn-dark">Edit Profile</button></a>
            </div>
            <div class="text mt-3">
                <span>{{$user->name}} is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span>
            </div>
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                <span><i class="fa fa-twitter"></i></span>
                <span><i class="fa fa-facebook-f"></i></span>
                <span><i class="fa fa-instagram"></i></span>
                <span><i class="fa fa-linkedin"></i></span>
            </div>
            <div class=" px-2 rounded mt-4 date ">
                <span class="join">Joined May,2020</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
