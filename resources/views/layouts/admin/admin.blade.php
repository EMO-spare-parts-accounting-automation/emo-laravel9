<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--#tüm sayfalarda geçerli arkaplan oluşturuldu(layout aracılığıyla)! -->
    <style>
        body {
            background-repeat: no-repeat;
            background-position: top center;
            background-attachment: fixed;
            background-size: 1000px;
            height: 100%;
            background-color: #fcfff5;
            font-family: 'Nunito', sans-serif;

        }
        nav{
            background: linear-gradient(bottom,#d1dbbd,#3e606f);
            background: -moz-linear-gradient(bottom,#d1dbbd,#3e606f);
            background: -webkit-linear-gradient(bottom,#d1dbbd,#3e606f);
        }
        figure {
            display:flex;
        }

        .img-emo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #999;
            object-fit: cover;
            object-position: 50% 15%;
        }
    </style>


</head>
<body>

<div id="app">
    <ul class="nav nav-tabs">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <figure>
                <img class="img-emo" src="https://r.resimlink.com/hbqwK5i.jpeg" alt="">
            </figure>
            <a class="navbar-brand" href="{{ route('admin.products.index') }}" style="position: relative ;bottom: 10px;">
                <span class="glyphicon glyphicon-search" style="position: relative ;left: 30px;"></span><br>
                Parça Ara
            </a>
            <a class="navbar-brand"  href="{{ route('admin.orders.index') }}" style="position: relative ;bottom: 10px;">
                <span class="glyphicon glyphicon-duplicate" style="position: relative ;left: 30px;"></span><br>
                Siparişler
            </a>
            <a class="navbar-brand" href="{{ route('admin.products.create') }}" style="position: relative ;bottom: 10px;">
                <span class="glyphicon glyphicon-plus" style="position: relative ;left: 30px;"></span><br>
                Ürün Ekle
            </a>
            <a class="navbar-brand" href="{{ route('admin.contacts.index') }}" style="position: relative ;bottom: 10px;">
                <span class="glyphicon glyphicon-envelope" style="position: relative ;left: 20px;"></span><br>
                İletişim
            </a>
            <a class="navbar-brand" href="{{ route('admin.returnproduct.index') }}" style="position: relative ;bottom: 10px;">
                <span class="glyphicon glyphicon-refresh" style="position: relative ;left: 20px;"></span><br>
                İadeler
            </a>
            <a class="navbar-brand" href="{{ route('admin.campaigns.index') }}" style="position: relative ;bottom: 10px;">
                <span class="glyphicon glyphicon-tags" style="position: relative ;left: 40px;"></span><br>
                Kampanyalar
            </a>
            <a class="navbar-brand" href="{{ route('admin.customerlist') }}" style="position: relative ;bottom: 10px;">
                <span class="glyphicon glyphicon-globe" style="position: relative ;left: 33px;"></span><br>
                Müşteriler
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


        </div>


        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position: relative;left: 15%;top: 5px">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="glyphicon glyphicon-user" style="position: relative ;"></span>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

        </div>
    </nav>
    </ul>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>




<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    header {
        background-color: #f2f2f2;
        padding: 20px;
    }

    .content {
        min-height: 40vh;
    }

    footer {
        background-color: #333;
        color: #fff;
        padding: 40px 0;

    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-row {
        display: flex;
        flex-wrap: wrap;
    }

    .footer-column {
        flex: 1 1 300px;
        margin-bottom: 20px;
    }

    h2 {
        color: #fff;
        font-size: 30px;
        margin-bottom: 10px;
    }

    p {
        color: #ccc;
        line-height: 1.5;
        font-size: 20px;
    }

    .social-media {
        margin-bottom: 20px;
        text-align: center;
    }

    .social-icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        background-color: #fff;
        color: #333;
        border-radius: 50%;
        line-height: 40px;
        margin-right: 10px;
        font-size: 18px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .social-icon:hover {
        background-color: #ccc;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
    }

    ul li a {
        color: #ccc;
        text-decoration: none;
        font-size: 20px;
    }

    .copy-text {
        text-align: center;
        margin-top: 20px;
    }


</style>


<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<div class="content">
    <!-- Sayfa içeriği arada boşluk kalsın diye ekledim -->
</div>

<footer>
    <div class="container">
        <div class="footer-row">
            <div class="footer-column">
                <h2>Linkler</h2>
                <ul>
                    <li><a href="#">Anasayfa</a></li>
                    <li><a href="{{route('admin.orders.index')}}">Siparişler</a></li>
                    <li><a href="{{route('admin.products.create')}}">Ürün Ekle</a></li>
                    <li><a href="{{route('admin.contacts.index')}}">İletişim</a></li>
                    <li><a href="#">İadeler</a></li>
                    <li><a href="#">Kampanyalar</a></li>
                    <li><a href="{{route('admin.customerlist')}}">Müşteriler</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h2>İletişim</h2>
                <p>Adres:Şanlıurfa/Merkez Türkiye</p>
                <p>Telefon: 123-456-7890</p>
                <p>E-posta:<a href="https://www.emo.org.tr/">www.emo.org.tr</a></p>
            </div>
            <div class="footer-column">
                <h2>Hakkımızda</h2>
                <p>EMO Şirketi, oto yedek parça sektöründe uzmanlaşmış bir e-ticaret platformudur. Müşterilerimize kaliteli ve orijinal yedek parçaları uygun fiyatlarla sunmayı hedefliyoruz. Geniş ürün yelpazemiz ve güvenilir tedarikçi ağımız ile aradığınız parçaları kolayca bulmanızı sağlıyoruz. Müşteri memnuniyeti bizim önceliğimizdir ve her adımda müşterilerimize en iyi hizmeti sunmaya çalışıyoruz. </p>
            </div>


            <div class="footer-column">
                <div class="social-media">
                    <a href="https://www.facebook.com/" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com/" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linked.com/" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <p class="copy-text">Telif Hakkı &copy; 2023 | EMO Şirketi</p>
    </div>
</footer>

</body>


</body>
</html>
