@extends('layouts.admin.admin')
@section('content')
    @include('ui_helper.productCreateCard',[
        'route'=>route('admin.products.store'),
        'method'=>'POST',
        'header'=>'Ürün Ekle',
        'marka'=>"",
        'isim'=>"",
        'gelisi'=>"",
        'stok'=>"",
        'butonAdi'=>'Parça Oluştur',
        'product'=>new \App\Models\Product(),
        'butonName'=>'create',
    ])

@endsection
