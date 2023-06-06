@extends('layouts.customer.customer')

@section('content')
    @if(Session::has('added'))

        <div class="alert alert-success">
            {{ Session::get('added') }}
        </div>

    @endif
    @if(Session::has('feedback'))

        <div class="alert alert-info">
            {{ Session::get('feedback') }}
        </div>

    @endif
    @if($hasReturnOrder)
        <h3 style="text-align: center;">İade Talebi Bulunamadı</h3>

    @else
        <center>
            <table style="width: 1500px">
                <tr>
                    <td bgcolor="#303030" style="padding: 5px;margin: 5px">><label style="color: white">ID</label></td>
                    <td bgcolor="#303030">><label style="color: white">Sipariş İD</label></td>
                    <td bgcolor="#303030">><label style="color: white">Urun İD</label></td>
                    <td bgcolor="#303030">><label style="color: white">Talebim</label></td>
                    <td bgcolor="#303030">><label style="color: white">Firma Geribildirimi</label></td>
                    <td bgcolor="#303030">><label style="color: white">Bakiye İade</label></td>
                    <td bgcolor="#303030">><label style="color: white">Ürün Yenileme</label></td>
                    <td bgcolor="#303030">><label style="color: white">Talep Tarihi</label></td>
                    <td bgcolor="#303030">><label style="color: white">Durum</label></td>
                    <td></td>

                </tr>

                @foreach($returnOrders as $returnOrder)
                    <tr>
                        <td style="padding: 15px;margin: 15px">{{$returnOrder['id']}}</td>
                        <td>{{$returnOrder['orderid']}}</td>
                        <td>{{$returnOrder['productid']}}</td>
                        <td>{{$returnOrder['customerfeedback']}}</td>
                        <td><b><strong>{{$returnOrder['adminfeedback']}}</strong></b></td>
                        <td>@if($returnOrder['returncost'])
                                <i style="color: green" class='bi bi-check-circle-fill'></i>
                            @else
                                <i style="color: red" class='bi bi-x-circle-fill'></i>
                            @endif</td>
                        <td>@if($returnOrder['refreshproduct'])
                                <i style="color: green" class='bi bi-check-circle-fill'></i>
                            @else
                                <i style="color: red" class='bi bi-x-circle-fill'></i>
                            @endif</td>

                        <td>{{$returnOrder['orderDate']}}</td>
                        <td><b><strong>{{$returnOrder['status']}}</strong></b></td>

                        @if($returnOrder['status']!='İade Tamamlandı')
                             <td>
                                 <a href="{{route('customer.returnproduct.feedback',$returnOrder['id'])}}">
                                     <button style="background-color: #3e606f">
                                         <span class="material-icons" style="color: white">rate_review</span>
                                         <label style="color: white">GeriBildirim</label>
                                     </button>
                                 </a>
                             </td>
                        @endif



                    </tr>
                @endforeach

            </table>
        </center>

    @endif

@endsection
