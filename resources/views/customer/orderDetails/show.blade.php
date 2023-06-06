@extends('layouts.customer.customer')
@section('content')

    <h3><span class="glyphicon glyphicon-compressed" style="position: relative;left: 150px;">  {{$status}}</span></h3>
    <br><br>
    <center>
        <table border="1" style=" width: 1300px">
            <tr>
                <td bgcolor="#303030" style="padding: 5px;margin: 5px"><label style="color: white">Ürün Kodu</label></td>
                <td bgcolor="#303030"><label style="color: white">Adet</label></td>
                <td bgcolor="#303030"><label style="color: white">Ürün Fiyatı</label></td>
                <td bgcolor="#303030"><label style="color: white">Toplam</label></td>


            </tr>

            @foreach($orderDetails as $orderDetail)
                <tr>

                    <td style="padding: 15px;margin: 15px">{{$orderDetail['productId']}}</td>
                    <td style="position: relative;left: 10px;">{{$orderDetail['count']}}</td>
                    <td style="position: relative;left: 10px;">{{$orderDetail['cost']}}</td>
                    <td style="position: relative;left: 10px;">{{($orderDetail['cost']*$orderDetail['count'])}}</td>


            @endforeach

        </table>

    </center>
    <h3><span class="glyphicon glyphicon-tags" style="position: relative;left: 1100px;top: 50px;">
                  indirim= -{{$discount}} TL</span></h3>
        <h3><span class="glyphicon glyphicon-credit-card" style="position: relative;left: 1100px;top: 50px;">
                  Genel Toplam={{$orderDetail->totalCost}} TL</span></h3>



@endsection
