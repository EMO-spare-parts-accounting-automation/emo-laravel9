@extends('layouts.customer.customer')

@section('content')
    @if(Session::has('deletecart'))

        <div class="alert alert-success">
            {{ Session::get('deletecart') }}
        </div>

    @endif
    @if($hasProduct)
        <h3 style="text-align: center;">Ürün Bulunamadı</h3>

    @else
        <center>
            <form method="GET" action="{{route('customer.products.search')}}">
                <input type="search" name="search" value="" placeholder="Parça ara">
                <input type="submit" value="Ara">
            </form>
            <br>
            <br>
            <table style="width: 1300px">
                <tr>
                    <td bgcolor="#303030" style="padding: 5px;margin: 5px">><label style="color: white">ID</label></td>
                    <td bgcolor="#303030">><label style="color: white">Marka</label></td>
                    <td bgcolor="#303030">><label style="color: white">İsim</label></td>
                    <td bgcolor="#303030">><label style="color: white">Fiyat</label></td>
                    <td bgcolor="#303030">><label style="color: white">Urfa</label></td>
                    <td bgcolor="#303030">><label style="color: white">Hatay</label></td>
                    <td bgcolor="#303030">><label style="color: white">Maras</label></td>
                    <td bgcolor="#303030">><label style="color: white">Stok</label></td>

                </tr>

                @foreach($products as $product)
                    <tr>
                        <td style="padding: 15px;margin: 15px">{{$product['id']}}</td>
                        <td>{{$product['brand']}}</td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['listCost']}}</td>
                        <td>@if($product['sanliurfa']=='var')
                                <i style="color: green" class='bi bi-check-circle-fill'></i>
                            @else
                                <i style="color: red" class='bi bi-x-circle-fill'></i>
                            @endif</td>
                        <td>@if($product['hatay']=='var')
                                <i style="color: green" class='bi bi-check-circle-fill'></i>
                            @else
                                <i style="color: red" class='bi bi-x-circle-fill'></i>
                            @endif</td>
                        <td>@if($product['maras']=='var')
                                <i style="color: green" class='bi bi-check-circle-fill'></i>
                            @else
                                <i style="color: red" class='bi bi-x-circle-fill'></i>
                            @endif</td>
                        <td>{{$product['stock']}}</td>
                        <td>
                            @if($product->stock > 0)
                                <form method="GET" action="{{route('customer.shopcart.addshopcart',$product->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn" style="margin: 5px;background-color: #e09540">
                                        <span class="glyphicon glyphicon-shopping-cart" style="color: white"></span>
                                    </button>
                                </form>
                            @else
                                <button

                                    class="btn btn" style="margin: 5px;background-color: red">
                                    <i class="fas fa-exclamation-circle" style="color: white"></i>

                                </button>
                            @endif
                        </td>


                    </tr>
                @endforeach

            </table>
        </center>

    @endif

@endsection
