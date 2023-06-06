<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-..." crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

        nav {
            background: linear-gradient(bottom, #d1dbbd, #3e606f);
            background: -moz-linear-gradient(bottom, #d1dbbd, #3e606f);
            background: -webkit-linear-gradient(bottom, #d1dbbd, #3e606f);
        }

        figure {
            display: flex;
        }

        .img-emo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #999;
            object-fit: cover;
            object-position: 50% 15%;
        }

        .animasyon-div {
            list-style: none;
            position: relative;
            display: inline-block;
            width: 200px;
            height: 200px;
            top: 110px;
        }

        @-moz-keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        @-webkit-keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        @-o-keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        .round {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            text-decoration: none;
            text-align: center;
            font-size: 35px;
            text-shadow: 0 1px 0 rgba(255, 255, 255, .7);
            letter-spacing: -.065em;
            font-family: "Hammersmith One", sans-serif;
            -webkit-transition: all .25s ease-in-out;
            -o-transition: all .25s ease-in-out;
            -moz-transition: all .25s ease-in-out;
            transition: all .25s ease-in-out;
            box-shadow: 2px 2px 7px rgba(0, 0, 0, .2);
            border-radius: 300px;
            z-index: 1;
            border-width: 4px;
            border-style: solid;
        }

        .round:hover {
            width: 130%;
            height: 130%;
            left: -15%;
            top: -15%;
            font-size: 40px;
            padding-top: 38px;
            cursor: pointer;
            -moz-box-shadow: 5px 5px 10px rgba(0, 0, 0, .3);
            -webkit-box-shadow: 5px 5px 10px rgba(0, 0, 0, .3);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, .3);
            z-index: 2;
            -webkit-transform: rotate(-360deg);
            -moz-transform: rotate(-360deg);
            -o-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }

        button.green {
            background-color: rgba(1, 151, 171, 1);
            color: rgba(0, 63, 71, 1);
            border-color: rgba(0, 63, 71, .2);
        }

        button.green:hover {
            color: rgba(1, 151, 171, 1);
        }

        .round span.round {
            display: block;
            opacity: 0;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            font-size: 1px;
            border: none;
            padding: 40% 20% 0 20%;
            color: #fff;
        }

        .round span:hover {
            opacity: .85;
            font-size: 25px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .5);
        }

        .green span {
            background: rgba(0, 63, 71, .7);
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
                <a class="navbar-brand" href="{{ route('customer.products.index') }}"
                   style="position: relative ;bottom: 10px;">
                    <span class="glyphicon glyphicon-search" style="position: relative ;left: 30px;"></span><br>
                    Parça Ara
                </a>
                <a class="navbar-brand" href="{{ route('customer.orders.index') }}"
                   style="position: relative ;bottom: 10px;">
                    <span class="glyphicon glyphicon-duplicate" style="position: relative ;left: 40px;"></span><br>
                    Siparişlerim
                </a>
                <a class="navbar-brand" href="{{ route('customer.payment') }}"
                   style="position: relative ;bottom: 10px;">
                    <span class="glyphicon glyphicon-credit-card" style="position: relative ;left: 20px;"></span><br>
                    Ödeme
                </a>
                <a class="navbar-brand" href="{{ route('customer.contacts.index') }}"
                   style="position: relative ;bottom: 10px;">
                    <span class="glyphicon glyphicon-envelope" style="position: relative ;left: 20px;"></span><br>
                    İletişim
                </a>
                <a class="navbar-brand" href="{{ route('customer.returnproduct.index') }}" style="position: relative ;bottom: 10px;">
                    <span class="glyphicon glyphicon-refresh" style="position: relative ;left: 20px;"></span><br>
                    İadeler
                </a>
                <a class="navbar-brand" href="{{ route('customer.campaigns.index') }}" style="position: relative ;bottom: 10px;">
                    <span class="glyphicon glyphicon-tags" style="position: relative ;left: 40px;"></span><br>
                    Kampanyalar
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a style="position: relative;left: 10%;bottom: 10px"
                   class="navbar-brand" href="{{ route('customer.shopcart.index') }}">
                    <span class="glyphicon glyphicon-shopping-cart cart-icon"
                          style="position: relative ;left: 15px;"></span>
                    <?php
                    $user = Illuminate\Support\Facades\Auth::user();
                    $sayac = 0;
                    $Shopcart = \App\Models\Shopcart::where('userid', 'LIKE', $user->id)->get();;
                    foreach ($Shopcart as $product) {
                        $sayac += 1;
                    }
                    ?>
                    <span class="badge cart-count"
                          style="position: relative ;left: 10px;bottom: 10px;background-color: red">@if($sayac!=0)
                            {{$sayac}}
                        @endif</span><br>
                    Sepet

                </a>
                <div style="position: relative;left: 13%;top: 5px;">
                    <span class="glyphicon glyphicon-piggy-bank" style="position: relative ;left: 40px;"></span><br>
                    <label
                        style="position: relative;right: 10px">BAKİYENİZ: {{Auth::user()->balance}} TL</label></div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent"
                 style="position: relative;left: 15%;top: 5px">


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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                </ul>
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
</body>
</html>
