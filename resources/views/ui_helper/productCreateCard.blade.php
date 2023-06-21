<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$header}}</h2></div>

                <div class="card-body" style="padding-left: 150px">
                    <div class="form">
                        <form action="{{$route}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method($method)
                            <div class="row mb-3">
                                <fieldset>
                                    <label class="col-md-4 col-form-label">Marka</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$marka}}" class=form-control name="brand"
                                               placeholder="Marka" maxlength="15" autofous required>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row mb-3">
                                <fieldset>
                                    <label class="col-md-4 col-form-label ">İsim</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$isim}}" class=form-control name="name"
                                               placeholder="İsim" autofous required>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row mb-3">
                                <fieldset>
                                    <label class="col-md-4 col-form-label">Geliş Fiyatı</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$gelisi}}" class=form-control name="cost"
                                               placeholder="Fiyat" maxlength="15" autofous required>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div class="col-md-9 ">
                                <fieldset>
                                    <table cellpadding="10">
                                        <tr>
                                            <td style="padding-left: 20px">
                                                <legend>Şanlıurfa</legend>
                                            </td>
                                            <td style="padding-left: 20px">
                                                <legend>Hatay</legend>
                                            </td>
                                            <td style="padding-left: 20px">
                                                <legend>Maraş</legend>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 20px">
                                                Var <input type="radio" name="sanliurfa" value="var"
                                                           @if($product->sanliurfa=="var")checked @endif>
                                                Yok <input type="radio" name="sanliurfa" value="yok"
                                                           @if($product->sanliurfa=="yok")checked @endif>
                                            </td>


                                            <td style="padding-left: 20px">
                                                Var <input type="radio" name="hatay" value="var"
                                                           @if($product->hatay=="var")checked @endif>
                                                Yok <input type="radio" name="hatay" value="yok"
                                                           @if($product->hatay=="yok")checked @endif>
                                            </td>


                                            <td style="padding-left: 20px">
                                                Var <input type="radio" name="maras" value="var"
                                                           @if($product->maras=="var")checked @endif>
                                                Yok <input type="radio" name="maras" value="yok"
                                                           @if($product->maras=="yok")checked @endif>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>

                            <div class="row mb-3" style="width: 200px;height: 100px;">
                                <fieldset>
                                    <br>
                                    <label class="col-md-4 col-form-label">Stok</label><br>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$stok}}" class="form-control" name="stock"
                                               placeholder="Stok" maxlength="15" autofous required>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row mb-3" >
                                <fieldset>
                                    <label class="col-md-4 col-form-label">Ürün Görseli: </label><br>
                                    <div class="col-md-9">
                                        <input class="btn btn-light" type="file" name="img" alt="img" >
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div class="row mb-0">
                                <div class="col-md-8 ">
                                    <input class="btn btn-primary" type="submit" name="{{$butonName}}"
                                           value="{{$butonAdi}}">
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
