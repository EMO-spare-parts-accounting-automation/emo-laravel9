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
                <td bgcolor="#e8e8e8" style="padding: 5px;margin: 5px">ID</td>
                <td bgcolor="#e8e8e8">Marka</td>
                <td bgcolor="#e8e8e8">İsim</td>
                <td bgcolor="#e8e8e8">Fiyat</td>
                <td bgcolor="#e8e8e8">Urfa</td>
                <td bgcolor="#e8e8e8">Hatay</td>
                <td bgcolor="#e8e8e8">Maras</td>
                <td bgcolor="#e8e8e8">Stok</td>

            </tr>

            @foreach($products as $product)
                <tr>
                    <td style="padding: 15px;margin: 15px">{{$product['id']}}</td>
                    <td>{{$product['brand']}}</td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['listCost']}}</td>
                    <td>{{$product['sanliurfa']}}</td>
                    <td>{{$product['hatay']}}</td>
                    <td>{{$product['maras']}}</td>
                    <td>{{$product['stock']}}</td>
                    <td>
                        <form method="GET" action="{{route('customer.shopcart.addshopcart',$product->id)}}">
                            @csrf
                            <button type="submit" class="btn btn" style="margin: 5px;background-color: #e09540">
                                <span class="glyphicon glyphicon-shopping-cart" style="color: white"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </center>

    @endif

@endsection
