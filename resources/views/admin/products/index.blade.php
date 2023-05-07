@extends('layouts.admin')
@section('content')

    <table style="width: 70%">
        <tr>
            <td>ID</td>
            <td>Marka</td>
            <td>İsim</td>
            <td>Alış</td>
            <td>KDV'li</td>
            <td>Liste Fiyatı</td>
            <td>Urfa</td>
            <td>Hatay</td>
            <td>Maras</td>
            <td>Stok</td>
            <td>Düzenle</td>
            <td>Sil</td>
        </tr>

        @foreach($products as $product)
            <tr>
                <td >{{$product['id']}}</td>
                <td>{{$product['brand']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['cost']}}</td>
                <td>{{$product['costKDV']}}</td>
                <td>{{$product['listCost']}}</td>
                <td>{{$product['sanliurfa']}}</td>
                <td>{{$product['hatay']}}</td>
                <td>{{$product['maras']}}</td>
                <td>{{$product['stock']}}</td>
                <td>
                    <form method="GET" action="{{route('admin.products.edit',$product->id)}}">
                        @csrf
                        <button type="submit">Düzenle</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{route('admin.products.destroy',$product->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red">Sil</button>
                    </form>
                </td>

            </tr>
        @endforeach


    </table>



@endsection
