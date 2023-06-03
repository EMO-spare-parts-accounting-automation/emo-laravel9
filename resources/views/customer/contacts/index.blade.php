@extends('layouts.customer.customer')
@section('content')
    <html>
    <head>

        <style>
            .button {
                display: inline-block;
                text-decoration: none;
                color: #fff;
                font-family: 'Quicksand', sans-serif;
                font-weight: 500;
                padding: 3px;
                border-radius: 6px;
                position: relative;
                overflow: hidden;
            }

            .button::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 200%;
                height: 100%;
                background: linear-gradient(115deg, #4fcf70, #fad648, #a767e5, #12bcfe, #44ce7b);
                background-size: 50% 100%;
                border-radius: inherit;
            }

            .button:hover::before {
                animation: animate_border .75s linear infinite;
            }

            .button span {
                display: block;
                background-color: #0e0872;
                padding: 13px 20px;
                border-radius: 3px;
                position: relative;
                z-index: 2;
            }

            @keyframes animate_border {
                to {
                    transform: translateX(-50%);
                }
            }
        </style>

    </head>
    <body>
    @if($hasContact)
        <h3 style="text-align: center;">İletişim Bulunamadı</h3>

    @else

        <center>
            <table style="width: 1500px">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>

                @foreach($contacts as $contact)
                    @if(($contact->id)%3==1||($contact->id)==1)
                        <tr>
                            @endif
                            <td style="padding: 0px;margin: 0px;">
                                <div class="container" style="padding: 0px;margin: 0px;width: 500px">
                                    <div class="row justify-content-center" style="padding: 0px;margin: 0px">
                                        <div class="col-md-8"
                                             style="width: 470px;height: 300px ;padding: 20px;margin: 0px">
                                            <div class="card" style="width: 450px;height: 250px;padding: 0px;">

                                                <div
                                                    class="card-header">{{ $contact->name }} {{$contact->surname}}</div>

                                                <div class="card-body" style="position: relative;left: 1px;
                                                width: 447px;height: 240px;background-size: cover;background-repeat: no-repeat; background-image:
                                                @if($contact->city==='Sanliurfa')
                                                url(https://www.shutterstock.com/image-photo/balikligol-fish-lake-sanliurfa-city-260nw-1372544012.jpg)
                                                @elseif($contact->city==='Hatay')
                                                url(https://icdn.tgrthaber.com.tr/crop/360x250/images/haberler/22-07/04/yeni-kalip-intro-1656940467.jpg)
                                                @elseif($contact->city==='Kahramanmaras')
                                                url(https://media-cdn.tripadvisor.com/media/photo-s/06/b0/19/bc/kahramanmaras-kalesi.jpg)
                                                @endif">
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label text-md-end"
                                                               style="font-size: 18px;font-family: Verdana;-webkit-text-stroke: 1px #0e0872; color: white"><b><strong>{{ __('E-mail:') }}</strong></b></label>

                                                        <div class="col-md-9"
                                                             style="font-size: 18px;font-family: Verdana;-webkit-text-stroke: 1px #0e0872; color: white;padding-top: 7px">
                                                            <b><strong>{{$contact->mail}}</strong></b>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label text-md-end"
                                                               style="font-size: 18px;font-family: Verdana;-webkit-text-stroke: 1px #0e0872; color: white"><b><strong>{{ __('Telefon:') }}</strong></b></label>

                                                        <div class="col-md-6"
                                                             style="font-size: 18px;font-family: Verdana;-webkit-text-stroke: 1px #0e0872; color: white;padding-top: 7px">
                                                            <b><strong>{{$contact->phone}}</strong></b>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label text-md-end"
                                                               style="font-size: 18px;font-family: Verdana;-webkit-text-stroke: 1px #0e0872; color: white"><b><strong>{{ __('Şehir:') }}</strong></b></label>

                                                        <div class="col-md-6"
                                                             style=" font-size: 18px;font-family: Verdana;-webkit-text-stroke: 1px #0e0872; color: white;padding-top: 7px">
                                                            <b><strong>{{$contact->city}}</strong></b>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        @if(($contact->id)%3==0)
                            <tr>
                        @endif
                        @endforeach


            </table>
        </center>
    @endif
    </body>
    </html>

@endsection
