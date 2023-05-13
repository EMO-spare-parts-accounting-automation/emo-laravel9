@extends('layouts.customer.customer')
@section('content')
    @if($hasProduct)
        <h3 style="text-align: center;">Ürün Bulunamadı</h3>

    @else
        <form method="GET" action="{{route('customer.products.search')}}">
            <input type="search" name="search" value="" placeholder="Parça ara">
            <input type="submit" value="Ara">
        </form>
        <table style="width: 70%">
            <tr>
                <td>ID</td>
                <td>Marka</td>
                <td>İsim</td>
                <td>Fiyat</td>
                <td>Urfa</td>
                <td>Hatay</td>
                <td>Maras</td>
                <td>Stok</td>

            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td>{{$product['brand']}}</td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['listCost']}}</td>
                    <td>{{$product['sanliurfa']}}</td>
                    <td>{{$product['hatay']}}</td>
                    <td>{{$product['maras']}}</td>
                    <td>{{$product['stock']}}</td>
                    <td>
                        <form method="GET" action="#">
                            @csrf
                            <button type="submit">Sepete Ekle</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

    @endif

@endsection
