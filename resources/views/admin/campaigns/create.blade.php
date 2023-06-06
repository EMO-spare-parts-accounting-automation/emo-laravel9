@extends('layouts.admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Kampanya oluşturma</h2></div>

                    <div class="card-body" style="padding-left: 150px">
                        <div class="form">
                            <form action="{{route('admin.campaigns.store')}}" method="POST">
                                <h2> Yeni kampanya oluşturmak için aşağıdaki bilgileri doldurun</h2>
                                @csrf
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-4 col-form-label">Parça kodu</label>
                                        <div class="col-md-9">
                                            <input type="number" class=form-control name="productid"
                                                   placeholder="Parça kodunu giriniz" maxlength="20" autofous required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-4 col-form-label ">Kampanya şart adedi</label>
                                        <div class="col-md-9">
                                            <input type="number" class=form-control name="productcount"
                                                   placeholder="Kampanya adedi giriniz" autofous required maxlength="4">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-4 col-form-label">Kampanya yüzdesi</label>
                                        <div class="col-md-9">
                                            <input type="number" class=form-control name="discount"
                                                   placeholder="Kampanya yüzdesini girniz" maxlength="3" autofous required>
                                        </div>
                                    </fieldset>
                                </div>
                                <br><br>
                                <div class="row mb-0">
                                    <div class="col-md-8 ">
                                        <input class="btn btn-primary" type="submit"
                                               value="Kaydet">
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
