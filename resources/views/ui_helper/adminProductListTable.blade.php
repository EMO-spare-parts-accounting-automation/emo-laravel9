<table border="1" style="width: 1300px;height: 100%;padding: 10px;margin: 20px;">
    <thead>
    <tr st>
        <td bgcolor="#e8e8e8" style="padding: 5px;margin: 5px">ID</td>
        <td bgcolor="#e8e8e8">Marka</td>
        <td bgcolor="#e8e8e8">İsim</td>
        <td bgcolor="#e8e8e8">Görsel</td>
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
    <?php
        $sayac=0;
    ?>
    @foreach($products as $product)
        <tr>
            <td style="padding: 15px;margin: 15px">{{$product['id']}}</td>
            <td>{{$product['brand']}}</td>
            <td>{{$product['name']}}</td>
            <td>
                    <?php
                        $image=\App\Models\Image::where('productid',$product['id'])->get();
                    ?>
                @if($image->isEmpty())
                    <span class="material-icons" style="color: grey;">image_search</span>
                @else
                    <a class="myBtn" href="#" onclick="imagescript({{$sayac}})">
                        <div>
                            <span class="material-icons" style="color: blue">image_search</span>
                        </div>
                    </a>
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p><legend>Parça Görseli: {{$product['id']}}</legend> </p>
                            <center><img style="height: 80%;object-fit: contain" src="/uploads/{{$product['id']}}.jpg"></center>
                        </div>
                    </div>

                    <?php
                        $sayac+=1;
                    ?>
                @endif

            </td>
            <td>{{$product['cost']}}</td>
            <td>{{$product['costKDV']}}</td>
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
