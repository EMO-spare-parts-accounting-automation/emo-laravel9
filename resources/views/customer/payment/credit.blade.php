@extends('layouts.customer.customer')

@section('content')
    <html>
    <head>
        <title>deneme</title>
        <style>

            body {
                background: linear-gradient(to right, rgba(235, 224, 232, 1) 52%, rgba(254, 191, 1, 1) 53%, rgba(254, 191, 1, 1) 100%);
                font-family: 'Roboto', sans-serif;
            }

            .card {
                border: none;
                max-width: 450px;
                border-radius: 15px;
                margin: 150px 0 150px;
                padding: 35px;
                padding-bottom: 20px !important;
            }

            .heading {
                color: black;
                font-size: 20px;
                font-weight: bold;

            }

            .img-credit {
                transform: translate(160px, -10px);
            }

            .img-credit:hover {
                cursor: pointer;
            }

            .text-warning {
                font-size: 12px;
                font-weight: 500;
                color: #edb537 !important;
            }

            #cno {
                transform: translateY(-10px);
            }

            input {
                border-bottom: 1.5px solid #E8E5D2 !important;
                font-weight: bold;
                border-radius: 0;
                border: 0;

            }

            .form-group input:focus {
                border: 0;
                outline: 0;
            }

            .col-sm-5 {
                padding-left: 90px;
            }

            .btn {
                background: #F3A002 !important;
                border: none;
                border-radius: 20px;
            }

            .btn:focus {
                box-shadow: none;
            }
        </style>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12">
                <div class="card mx-auto">
                    <h1><p class="heading">Kredi/Banka kartı</p></h1>
                    <form class="card-details " action="{{route('admin.payments.addbalance')}}" method="POST">
                        @csrf
                        <div class="form-group mb-0">
                            <p class="text-warning mb-0">Kart No:</p>
                            <input type="text" name="card-num" placeholder="1234 5678 9012 3457" size="16" id="cno"
                                   minlength="16" maxlength="16" required>
                            <img class="img-credit" src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px"/>
                        </div>

                        <div class="form-group">
                            <p class="text-warning mb-0">Kart Sahibinin Adı:</p> <input type="text" name="name"
                                                                                        placeholder="Ad soyad" size="17"
                                                                                        required>
                        </div>
                        <div class="form-group pt-2">
                            <div class="row d-flex">
                                <div class="col-sm-4">
                                    <p class="text-warning mb-0">Son Kullanım Tarihi:</p>
                                    <input type="text" name="exp" placeholder="MM/YYYY" size="7" id="exp" minlength="5"
                                           maxlength="7" required>
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-warning mb-0">Cvv</p>
                                    <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" size="3"
                                           minlength="3" maxlength="3" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <p class="text-warning mb-0">Yüklenecek Tutar:</p> <input type="number" step=".01"
                                                                                      name="balance"
                                                                                      placeholder="ödenecek tutar"
                                                                                      size="17" required>
                        </div>
                        <br>
                        <div class="col-sm-5 pt-0">
                            <button type="submit" style="position: relative;right: -180px" class="btn btn-primary"><i
                                    class="fas fa-arrow-right px-3 py-2">Öde</i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
@endsection
