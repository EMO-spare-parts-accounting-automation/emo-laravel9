
@extends('layouts.admin.admin')
@section('content')

    @if($hasOrder)
        <h3 style="text-align: center;">Henüz Sipariş Yok</h3>

    @else

        <center>
        <table border="1" style="position: relative;top: 100px;width: 1300px">
            <tr>
                <td bgcolor="#303030" style="padding: 5px;margin: 5px"><label style="color: white">Sipariş Numarası</label></td>
                <td bgcolor="#303030"><label style="color: white">Tarih</label></td>
                <td bgcolor="#303030"><label style="color: white">Durum</label></td>
                <td bgcolor="#303030"><label style="color: white">Tutar</label></td>
                <td bgcolor="#303030" style="padding-left: 40px"><label style="color: white">Detay</label></td>

            </tr>

            @foreach($orders as $order)
                <tr>


                    <td style="padding: 15px;margin: 15px">
                        <a style="color: black;" href="{{route('admin.orderDetails.show',$order->id)}}">
                            <div>
                                {{$order['id']}}
                            </div>


                        </a>

                    </td>
                    <td>
                        <a style="color: black;" href="{{route('admin.orderDetails.show',$order->id)}}">
                            <div>
                                {{$order['orderDate']}}
                            </div>
                        </a>
                    </td>
                    <td>
                        <a style="color: black;" href="{{route('admin.orderDetails.show',$order->id)}}">
                            <div>
                                {{$order['status']}}
                            </div>
                        </a>
                    </td>
                    <td>
                        <a style="color: black;" href="{{route('admin.orderDetails.show',$order->id)}}">
                            <div>
                                {{$order['totalCost']}}
                            </div>
                        </a>
                    </td>
                    <td>
                        <a style="color: black;" href="{{route('admin.orderDetails.show',$order->id)}}">
                            <div>
                                <form method="GET" action="{{route('admin.orderDetails.show',$order->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn " style="position: relative;left: 10px;background-color: #e09540;margin: 5px">
                                        <span class="glyphicon glyphicon-hand-left" style="color: white">  <label style="position: relative;
                                        bottom: 2px">Detay</label></span>
                                    </button>
                                </form>
                            </div>
                        </a>


                    </td>
            @endforeach

        </table>

        </center>


    @endif

@endsection











