<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: "Open Sans",sans-serif;
            box-sizing: border-box;
            text-decoration: none;
        }

        body{
            background: url("https://media.istockphoto.com/id/478107962/tr/foto%C4%9Fraf/auto-parts.jpg?s=612x612&w=0&k=20&c=irx8I4ZTxi42yPZc1Y1Oj_Z-ADqxGZbPiOqKcVnxFZw=");
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-card{
            width: 420px;
            overflow: hidden;
            text-align: center;
            position: relative;
            box-shadow: 0 0 10px #00000070;
        }

        .top-section{
            padding: 60px 40px;
            background: #2c2c54aa;
        }

        .message,.notif{
            position: absolute;
            top: 20px;
            font-size: 20px;
            cursor: pointer;
            color: #ffffff50
        }

        .message{
            right: 40px;
        }

        .notif{
            left: 80px;
        }

        .pic{
            width: 150px;
            height: 150px;
            margin: auto;
            margin-bottom: 20px;
            border: 2px solid red;
            border-radius: 50%;
            padding: 8px;
            position: relative;
        }

        .pic:after{
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            border: 1px solid red;
            left: 0;
            top: 0;
            box-sizing: border-box;
            border-radius: 50%;
            animation: wave 1.5s infinite linear;
        }

        @keyframes wave {
            to{
                transform: scale(1.5);
                opacity: 0;
            }
        }

        .pic img{
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .name{
            color: #f1f1f1;
            font-size: 28px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .tag{
            font-size: 14.2px;
            color: #fff;
        }

        .bottom-section{
            background: #f1f1f1;
            padding: 60px 40px;
            position: relative;
            display: flex;
        }

        .border{
            width: 1px;
            height: 20px;
            background: #bbb;
            margin: 0 30px;
        }

        .edit{
            position: absolute;
            width: 100%;
            top: -33px;
            left: 0;
            z-index: 1;
        }

        .edit i{
            width: 60px;
            height: 60px;
            background: #2c3e50;
            border-radius: 50%;
            color: #f1f1f1;
            font-size: 20px;
            line-height: 60px !important;
            margin: 0 10px;
            position: relative;
        }

        .edit i:after{
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            background: red;
            left: 0;
            top: 0;
            box-sizing: border-box;
            border-radius: 50%;
            z-index: -1;
            transition: 0.4s linear;
        }

        .edit i:hover:after{
            transform: scale(1.4);
            opacity: 0;
        }
        input[type=email], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        input[type=password], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #2c3e50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: blue;
        }

        .div {
            border-radius: 5px;
            background-color: transparent;
            padding: 20px;
            position: relative;
            left: 20px;
        }
    </style>
</head>
<body>
<div class="profile-card">
    <?php
    $user = Illuminate\Support\Facades\Auth::user();
    ?>

    <div class="top-section">
        <i class="notif fas fa-handshake"> EMO DEVELOPMENT <i class="fas fa-handshake"></i></i>
        <a href="{{route('profile')}}">
            <div class="pic">
                <img src="https://r.resimlink.com/hbqwK5i.jpeg" alt="">
            </div>
        </a>
        <div class="name"></div>
        <div class="tag"></div>
    </div>

    <div class="bottom-section">
        <div class="edit">
            <a href="{{route('home')}}"><i class="fas fa-reply"></i></a>
            <a href="{{route('updateaddress')}}"><i class="fas fa-house-user"></i></a>
            <a href="{{route('update')}}"><i class="fas fa-edit"></i></a>
            <a href="{{route('updatepassword')}}"><i class="fas fa-key"></i></a>
        </div>

        <form action="{{ route('editProfile') }}" method="POST" >
            <div class="div">
                @csrf
                <label for="name" class="col-md-4 col-form-label text-md-end">AD</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <br>
                <label for="email" class="col-md-4 col-form-label text-md-end">E-MAİL</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <br>
                <input type="submit" value="Kaydet">
            </div>

        </form>
    </div>
</div>
</body>
</html>
