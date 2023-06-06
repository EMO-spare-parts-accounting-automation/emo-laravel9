@extends('layouts.customer.customer')

@section('content')
    <html>
    <head>
        <title>Kampanyalar</title>
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
                background-color: #3e606f;
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
    <center>
        @if($hascampaigns)
            <h3 style="text-align: center;position: relative;top:100px;">
                <i class="material-icons" style="font-size: 60px">campaign</i> <label style="position: relative;top:-20px"> Üzgünüz Şuan Kampanya Bulunmamaktadır!</label>
            </h3>
        @else
            <table>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                @foreach($campaigns as $campaign)
                        <?php
                        $product=\App\Models\Product::query()->find($campaign->productid)
                        ?>
                    @if(($campaign->id)%2==1||($campaign->id)==1)
                        <tr>
                            @endif
                            <td style="width:50%;height: 50%;margin: 0px;padding: 100px">
                                <div style="border-style: solid;border-color: #3e606f;width: 400px;height: 400px;background-color: #d1dbbd;
                                    border-bottom-left-radius: 80px;border-top-right-radius: 80px">
                                    <i class="material-icons" style="font-size: 120px;position: relative;bottom: 120px;left: -60px;
                                    transform: rotate(-45deg);-moz-transform: rotate(-45deg);-webkit-transform: rotate(-45deg);-o-transform: rotate(-45deg);
                                        -ms-transform: rotate(-45deg);">campaigns</i><br>

                                    <legend style="position: relative;bottom: 100px;"><label style="position: relative;right: -35%;">{{$product->brand}}</label></legend> <br>
                                    <legend style="height: 80px;position: relative;bottom: 10px"><label style="position: relative;bottom: 100px;left: 10px;">ÜRÜN: {{$product->name}}</label></legend><br>
                                        <?php
                                        $totalcost=($product->listCost*$campaign->productcount);
                                        $discount=($totalcost* $campaign->discount)/100;
                                        $discountTotalCost=$totalcost-$discount;
                                        ?>
                                    <legend style="position: relative;bottom: 10px;font-size: 15px"><label style="position: relative;left: 10px;">Kampanya: Bu üründen <b><strong style="color: red;font-size: 20px">{{$campaign->productcount}}</strong></b> adet siparişinizde geçerlidir!</label></legend><br>
                                    <label style="position: relative;right: 190px;top:-20px">Fiyat: <label style="text-decoration:line-through;"> {{$totalcost}}</label> TL yerine </label>
                                    <legend style="width: 200px;position: relative;left: 100px;"><label style="position: relative;left: 10px;"><b><strong style="color: red">{{$discountTotalCost}} TL</strong></b></label></legend>


                                    <a href="{{route('customer.shopcart.getCampaigns',$campaign->id)}}">
                                        <img style="width: 200px;position: relative;bottom:90px;left: 280px;" src="https://r.resimlink.com/7am5JuGb.png" alt="">
                                        <i class="material-icons" style="color: white;font-size: 80px;position: relative;bottom: 60px;left: 100px;">percent</i>
                                        <label style="color: white;font-size: 80px;position: relative;bottom:70px;left: 80px;" >{{$campaign->discount}}</label>

                                    </a>

                                </div>
                            </td>

                            @if(($campaign->id)%2==0)
                        </tr>
                    @endif
                @endforeach

            </table>
        @endif
    </center>

    </body>
    </html>


@endsection
