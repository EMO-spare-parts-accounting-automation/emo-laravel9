@extends('layouts.customer.customer')

@section('content')
    @if(Session::has('addshopcart'))

        <div class="alert alert-success">
            {{ Session::get('addshopcart') }}
        </div>

    @endif
    @if(Session::has('addshopcartwarning'))

        <div class="alert alert-warning">
            {{ Session::get('addshopcartwarning') }}
        </div>

    @endif
    @if(Session::has('addshopcartwarningstock'))

        <div class="alert alert-warning">
            {{ Session::get('addshopcartwarningstock') }}
        </div>

    @endif
    @if(Session::has('deleteproduct'))

        <div class="alert alert-danger">
            {{ Session::get('deleteproduct') }}
        </div>

    @endif
    @if($hasProduct)
        <h3 style="text-align: center;">Sepetiniz Boş!</h3>
    @else
        <center>
            <table style="width: 1100px">
                <tr>
                    <td bgcolor="#e8e8e8" style="padding: 5px;margin: 5px">ID</td>
                    <td  bgcolor="#e8e8e8">Marka</td>
                    <td  bgcolor="#e8e8e8">İsim</td>
                    <td  bgcolor="#e8e8e8">Fiyat</td>
                    <td  bgcolor="#e8e8e8">Urfa</td>
                    <td  bgcolor="#e8e8e8">Hatay</td>
                    <td  bgcolor="#e8e8e8">Maras</td>
                    <td bgcolor="#e8e8e8" colspan="3">adet</td>
                    <td  bgcolor="#e8e8e8"></td>

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
                        <td>
                            <a href="{{route('customer.shopcart.increaseCount' ,$product->id)}}"
                               class="btn btn-xs btn-success" style="margin: 5px"
                               @if($ShopcartProducts[$productcount]->productcount==$product->stock)disabled @endif>
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </td>
                        <td>
                            <form style=" position: relative;right: 33px;bottom: 7px;
                                padding:0px;margin: 0px;width: 10px;height: 10px;"
                                  action="{{route('customer.shopcart.updateProductCount',$product->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" maxlength="3" style="width: 50px" name="newproductCount"
                                       value="{{$ShopcartProducts[$productcount]->productcount}}">
                            </form>


                        </td>
                        <td>
                            <a href="{{route('customer.shopcart.decreaseCount',$product->id)}}"
                               class="btn btn-xs btn-danger" style="margin: 5px"
                               @if($ShopcartProducts[$productcount]->productcount==1)disabled @endif>
                                <span class="glyphicon glyphicon-minus"></span>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('customer.shopcart.destroy',$product->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger"
                                        style="margin: 5px;padding-left: 10px;padding-right: 10px;padding-top: 5px;padding-bottom: 5px;">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                            <?php
                            $productcount += 1;
                            ?>

                    </tr>
                @endforeach

            </table>
        </center>

        <div style="position: relative;left: 70%;top:50px;width: 250px">
            <h3><span class="glyphicon glyphicon-credit-card" style="position: relative;left: -50px;top:51px;"></span></h3>
            <h3> Tutar = {{$totalCost}} TL</h3>

            @include('ui_helper.updateButton',['route'=>route('customer.shopcart.deletecart'),
                            'text'=>'Sepeti Onayla!',
                            'bgColor'=>"#0000ff" ,
                            'textColor'=>"#ffffff"])
        </div>
    @endif

@endsection
