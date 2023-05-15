
<table border="1" cellpadding="10" style="width: 70%">
    <thead>
    <tr>
        <td bgcolor="#e8e8e8">ID</td>
        <td bgcolor="#e8e8e8">Marka</td>
        <td bgcolor="#e8e8e8">İsim</td>
        <td bgcolor="#e8e8e8">Alış</td>
        <td bgcolor="#e8e8e8">KDV'li</td>
        <td bgcolor="#e8e8e8">Liste Fiyatı</td>
        <td bgcolor="#e8e8e8">Urfa</td>
        <td bgcolor="#e8e8e8">Hatay</td>
        <td bgcolor="#e8e8e8">Maras</td>
        <td bgcolor="#e8e8e8">Stok</td>
        <td bgcolor="#e8e8e8">Düzenle</td>
        <td bgcolor="#e8e8e8">Sil</td>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
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
                @include('ui_helper.updateButton',[
                    'route'=>route('admin.products.edit',$product->id),
                    'text'=>'Düzenle',
                    'bgColor'=>"#0000ff",
                    'textColor'=>"#ffffff"
                    ])
            </td>
            <td>
                @include('ui_helper.deleteButton',[
                    'route'=>route('admin.products.destroy',$product->id),
                    'text'=>'SİL!',
                    'bgColor'=>'#ff0000',
                    'textColor'=>'#ffffff',
                ])
            </td>

        </tr>
    @endforeach
    </tbody>

</table>
