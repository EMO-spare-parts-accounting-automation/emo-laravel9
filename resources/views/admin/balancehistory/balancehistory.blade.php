@extends('layouts.admin.admin')
@section('content')

    <center>
        @if($hasPayments)
            <h3 style="text-align: center;">Ödeme Geçmişi Bulunmamaktadır</h3>
        @else
            <table style=" width: 1300px">
                <tr>
                    <td bgcolor="#303030" style="padding: 5px;margin: 5px"><label style="color: white">Bakiye ID</label></td>
                    <td bgcolor="#303030"><label style="color: white">Müşteri ID</label></td>
                    <td bgcolor="#303030"><label style="color: white">Durum</label></td>
                    <td bgcolor="#303030"><label style="color: white">Sipariş Kodu</label></td>
                    <td bgcolor="#303030"><label style="color: white">Ödeme</label></td>
                    <td bgcolor="#303030"><label style="color: white">Toplam Bakiye</label></td>
                    <td bgcolor="#303030"><label style="color: white">Tarih</label></td>


                </tr>

                @foreach($payments as $payment)
                    <tr>
                        @if($payment->orderid==null)
                            <td style="padding: 15px;margin: 15px">{{$payment['id']}}</td>
                            <td style="padding: 15px;margin: 15px">{{$payment['userid']}}</td>
                            <td style="padding: 15px;margin: 15px"><strong><b>{{$payment['status']}}</b></strong></td>
                            <td style="position: relative;left: 10px;">{{$payment['orderid']}}</td>
                            <td style="position: relative;left: 10px;"><label style="color: green"><strong><b>+{{$payment['payment']}}</b></strong></label></td>
                            <td style="position: relative;left: 10px;">{{$payment['totalbalance']}}</td>
                            <td style="position: relative;left: 10px;">{{($payment['transactiondate'])}}</td>
                        @else
                            <td style="padding: 15px;margin: 15px">
                                <a style="color: black;" href="{{route('admin.orderDetails.show',$payment->orderid)}}">
                                    <div>
                                        {{$payment['id']}}
                                    </div>


                                </a>

                            </td>
                            <td style="padding: 15px;margin: 15px">
                                <a style="color: black;" href="{{route('admin.orderDetails.show',$payment->orderid)}}">
                                    <div>
                                        {{$payment['userid']}}
                                    </div>


                                </a>

                            </td>
                            <td style="padding: 15px;margin: 15px">
                                <a style="color: black;" href="{{route('admin.orderDetails.show',$payment->orderid)}}">
                                    <div>
                                        <strong><b>{{$payment['status']}}</b></strong>
                                    </div>
                                </a>
                            </td>
                            <td style="position: relative;left: 10px;">
                                <a style="color: black;" href="{{route('admin.orderDetails.show',$payment->orderid)}}">
                                    <div>
                                        {{$payment['orderid']}}
                                    </div>
                                </a>
                            </td>
                            <td style="position: relative;left: 10px;">
                                <a style="color: black;" href="{{route('admin.orderDetails.show',$payment->orderid)}}">
                                    <div>
                                        @if($payment['payment']>0)
                                            <label style="color: green"><strong><b>+{{$payment['payment']}}</b></strong></label>
                                        @else
                                            <label style="color: red"><strong><b>{{$payment['payment']}}</b></strong></label>
                                        @endif

                                    </div>
                                </a>
                            </td>
                            <td style="position: relative;left: 10px;">
                                <a style="color: black;" href="{{route('admin.orderDetails.show',$payment->orderid)}}">
                                    <div>
                                        {{$payment['totalbalance']}}
                                    </div>
                                </a>
                            </td>
                            <td style="position: relative;left: 10px;">
                                <a style="color: black;" href="{{route('admin.orderDetails.show',$payment->orderid)}}">
                                    <div>
                                        {{($payment['transactiondate'])}}
                                    </div>
                                </a>
                            </td>
                        @endif
                    </tr>

                @endforeach

            </table>

        @endif
    </center>
@endsection
