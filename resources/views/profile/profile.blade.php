
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
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
    </style>
</head>
<body>
@if(Session::has('UpdatedProfile'))

    <div class="alert alert-success">
        {{ Session::get('UpdatedProfile') }}
    </div>

@endif
@if(Session::has('UpdatedPassword'))

    <div class="alert alert-info">
        {{ Session::get('UpdatedPassword') }}
    </div>

@endif
@if(Session::has('updatedAddress'))

    <div class="alert alert-success">
        {{ Session::get('updatedAddress') }}
    </div>

@endif
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
        <div class="name">{{$user->name}}</div>
        <div class="tag">{{$user->email}}</div>
    </div>

    <div class="bottom-section">
        <div class="edit">
            <a href="{{route('home')}}"><i class="fas fa-reply"></i></a>
            <a href="{{route('updateaddress')}}"><i class="fas fa-house-user"></i></a>
            <a href="{{route('update')}}"><i class="fas fa-edit"></i></a>
            <a href="{{route('updatepassword')}}"><i class="fas fa-key"></i></a>

        </div>

            <div style="position: relative;left: 30px">BAKİYE<hr> <span><strong style="color: red"><b>{{$user->balance}} TL</b></strong></span></div>
            <div class="border" style="position: relative;left: 30px"></div>
            <div style="position: relative;left: 30px">YETKİ <hr><span><strong style="color: red"><b></b>{{$user->userType}}</strong></span></div>
            <div class="border" style="position: relative;left: 30px"></div>
            <div style="position: relative;left: 30px">ŞİFRE <hr><span><strong style="color: red"><b>********</b></strong></span></div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
