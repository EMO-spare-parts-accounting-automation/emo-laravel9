@extends('layouts.admin.admin')
@section('content')
    <div style="display: flex;">
        <h3><span class="glyphicon glyphicon-compressed" style="position: relative;left: 150px;">  {{$status}}</span>
        </h3>
        <form id="orderUpdate" method="POST" action="{{route('admin.orders.update',$orderID)}}"
              style="position: relative;left: 200px;">
            @csrf
            @method('PUT')
            <select name="status" onchange="submitForm()">
                <option value="Kargoya verilmesi bekleniyor" selected>Kargoya verilmesi bekleniyor</option>
                <option value="Kargoya verildi">Kargoya verildi</option>
                <option value="Teslim edildi">Teslim edildi</option>
            </select>
        </form>
    </div>
    <script>
        function submitForm() {
            document.getElementById("orderUpdate").submit();
        }
    </script>
    <br><br>
    <center>
        <div style="border-style: solid;border-color: #3e606f;border-top-left-radius: 20px;
        border-bottom-right-radius: 20px;margin: 20px;
        position: relative;bottom: 20px;left: 30%;
        width: 400px;height: 80px;background-color: #d1dbbd;">
            <h3><label style="position: relative;bottom: 60px;right: 20px"><b><strong>Müşteri</strong></b></label></h3>
            <h3><span class="glyphicon glyphicon-user"
                      style="position: relative;left: -170px;top:-60px;font-size: 50px"></span></h3>
            <h3>
                <label style="position: relative;bottom: 140px;right: 20px">{{$user->id}}-{{$user->name}}</label><br>
            </h3>
            <h3><label style="position: relative;bottom: 160px;">{{$user->email}}</label></h3>

        </div>
        <table border="1" style=" width: 1300px">
            <tr>
                <td bgcolor="#303030" style="padding: 5px;margin: 5px"><label style="color: white">Ürün Kodu</label>
                </td>
                <td bgcolor="#303030"><label style="color: white">Adet</label></td>
                <td bgcolor="#303030"><label style="color: white">Ürün Fiyatı</label></td>
                <td bgcolor="#303030"><label style="color: white">Toplam</label></td>
                <td bgcolor="#303030"><label style="color: white">İndirim</label></td>


            </tr>

            @foreach($orderDetails as $orderDetail)
                <tr>

                    <td style="padding: 15px;margin: 15px">{{$orderDetail['productId']}}</td>
                    <td style="position: relative;left: 10px;">{{$orderDetail['count']}}</td>
                    <td style="position: relative;left: 10px;">{{$orderDetail['cost']}}</td>
                    <td style="position: relative;left: 10px;">{{($orderDetail['cost']*$orderDetail['count'])}}</td>
                    <td style="position: relative;left: 10px;">{{($orderDetail['campaignCost'])}}</td>

            @endforeach

        </table>

    </center>
    <h3><span class="glyphicon glyphicon-tags" style="position: relative;left: 1100px;top: 50px;">
                  indirim= -{{$discount}} TL</span></h3>
    <h3><span class="glyphicon glyphicon-credit-card" style="position: relative;left: 1100px;top: 50px;">
                  Genel Toplam={{$orderDetail->totalCost}}</span></h3>

@endsection
