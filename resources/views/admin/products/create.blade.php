@extends('layouts.admin')
@section('content')
    <h2 style="text-align: center">Ürün Ekle</h2>
    <div class="form">

        <form action="{{route('admin.products.store')}}" method="POST" style="padding: 45px;margin: auto;width: 50%;">
            @csrf
            <fieldset>
                <legend>Marka</legend>
                <input type="text" name="brand" placeholder="Marka" maxlength="15" autofous required><br>
            </fieldset>
            <fieldset>
                <legend>İsim</legend>
                <input type="text" name="name" placeholder="İsim" autofous required><br>
            </fieldset>
            <fieldset>
            <fieldset>
                <legend>Geliş Fiyatı</legend>
                <input type="text" name="cost" placeholder="Fiyat" maxlength="15" autofous required><br>
            </fieldset>
                <legend>Şanlıurfa</legend>
                Var<input type="radio" name="sanliurfa" value="var"><br>
                Yok<input type="radio" name="sanliurfa" value="yok" checked><br>
            </fieldset>
            <fieldset>
                <legend>Hatay</legend>
                Var<input type="radio" name="hatay" value="var"><br>
                Yok<input type="radio" name="hatay" value="yok" checked><br>
            </fieldset>
            <fieldset>
                <legend>Maraş</legend>
                Var<input type="radio" name="maras" value="var"><br>
                Yok<input type="radio" name="maras" value="yok" checked><br>
            </fieldset>
            <fieldset>
                <legend>Stok</legend>
                <input type="text" name="stock" placeholder="Stok" maxlength="15" autofous required><br>
            </fieldset>
            <br>
            <input type="submit" name="create" value="Oluştur">

        </form>

    </div>
@endsection
