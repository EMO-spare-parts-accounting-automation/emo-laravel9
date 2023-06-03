
@extends('layouts.customer.customer')
@section('content')

    @if($hasOrder)
        <h3 style="text-align: center;">Mevcut Sipariş Yok</h3>

    @else

        <table style="width: 70%">
            <tr>
                <td>Sipariş Numarası</td>
                <td>Tarih</td>
                <td>Durum</td>
                <td>Tutar</td>
                <td>Detay</td>
            </tr>

            @foreach($orders as $order)
                <tr>
                    <td>{{$order['id']}}</td>
                    <td>{{$order['orderDate']}}</td>
                    <td>{{$order['status']}}</td>
                    <td>{{$order['totalCost']}}</td>
                    <td>
                        <form method="GET" action="{{route('customer.orderDetails.show',$order->id)}}">
                            @csrf
                            <button type="submit" class="btn btn btn-success" style="margin: 5px">
                                Detay
                            </button>
                        </form>
                    </td>
            @endforeach

        </table>

    @endif

@endsection











