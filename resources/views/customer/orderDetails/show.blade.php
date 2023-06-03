@extends('layouts.customer.customer')
@section('content')
    <h3>{{$status}}</h3>
        <table style="width: 70%">
            <tr>
                <td>Ürün Kodu</td>
                <td>Sayı</td>
                <td>Ürün Fiyatı</td>
                <td>Toplam</td>

            </tr>

            @foreach($orderDetails as $orderDetail)
                <tr>
                    <td>{{$orderDetail['productId']}}</td>
                    <td>{{$orderDetail['count']}}</td>
                    <td>{{$orderDetail['cost']}}</td>
                    <td>{{($orderDetail['cost']*$orderDetail['count'])}}</td>

            @endforeach

        </table>
        <h3>Genel Toplam={{$orderDetail->totalCost}}</h3>


@endsection
