@extends('layouts.admin.admin')
@section('content')
    @if($hasProduct)
        <h3 style="text-align: center;">Ürün Bulunamadı</h3>

    @else
        <center>
            <form method="GET" action="{{route('admin.products.search')}}">
                <input type="search" name="search" value="" placeholder="Parça ara">
                <input type="submit" value="Ara">
            </form>
            @include('ui_helper.adminProductListTable',['products'=>$products])

        </center>
    @endif

@endsection
