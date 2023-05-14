@extends('layouts.admin.admin')
@section('content')
    @include('ui_helper.productCreateCard',[
            'route'=>route('admin.products.update',$product->id),
            'method'=>'PUT',
            'header'=>'Ürün Düzenle',
            'marka'=>$product->brand,
            'isim'=>$product->name,
            'gelisi'=>$product->cost,
            'stok'=>"$product->stock",
            'butonAdi'=>'Değişikliği Kaydet!',
            'product'=>$product,
            'butonName'=>'update'
        ])
@endsection
