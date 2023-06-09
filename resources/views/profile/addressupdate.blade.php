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
        }
        input[type=text] {

            background-color: white;

            background-image: url('https://cdn-icons-png.flaticon.com/512/4820/4820122.png');

            background-position: 10px 10px;

            background-repeat: no-repeat;

            padding-left: 40px;

        }
        input[type=text] {

            -webkit-transition: width 0.4s ease-in-out;

            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {

            width: 100%;
        }
        textarea {
            width: 300px;

            height: 85px;

            padding: 12px 20px;

            box-sizing: border-box;

            border: 2px solid #ccc;

            border-radius: 4px;

            resize: none;
        }
        input {

            padding:8px 20px;

            border: 1px solid #eee;

            border-left: 3px solid;

            border-left-color:salmon;

            border-radius: 5px;

            transition: border-color .8s ease-out;
        }

        input:focus{

            outline:none;

            border: 1px solid #eee;

            border-left: 3px solid #888;

        }
        input[type=text]:focus {

            border: 3px solid LightSeaGreen ;
        }

    </style>
</head>
<body>
<?php
    $redirectControl=0;
?>
@if(Session::has('AddAddress'))

    <div class="alert alert-info">
        {{ Session::get('AddAddress') }}
    </div>

    <?php
        $redirectControl=1;
    ?>

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

        <form action="{{ route('editaddress',$redirectControl) }}" method="POST" >
            <div class="div" style="width: 340px">
                @csrf
                <legend style="position: relative;bottom: 40px;"><b><strong>Adres:</strong></b></legend>
                <label style="position: relative;bottom: 40px;" for="address" class="col-md-4 col-form-label text-md-end">{{$user->address}}</label>
                <br>
                <br>
                <legend><b><strong>Güncel Adres:</strong></b></legend>
                <textarea style="height: 110px" id="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-address"></textarea>

                @error('address')
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
