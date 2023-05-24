@extends('layouts.admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>İletişim Formu</h2></div>

                    <div class="card-body" style="padding-left: 150px">
                        <div class="form">
                            <form action="{{route('admin.contacts.store')}}" method="POST">
                                <h2> İletişim için aşağıdaki bilgileri giriniz</h2>
                                @csrf
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-4 col-form-label">Adı</label>
                                        <div class="col-md-9">
                                            <input type="text" class=form-control name="name"
                                                   placeholder="Adınız" maxlength="20" autofous required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-4 col-form-label ">Soyadı</label>
                                        <div class="col-md-9">
                                            <input type="text" class=form-control name="surname"
                                                   placeholder="Soyadınız" autofous required maxlength="20">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-4 col-form-label">E-Posta Adresi</label>
                                        <div class="col-md-9">
                                            <input type="email" class=form-control name="mail"
                                                   placeholder="mail adresiniz" maxlength="40" autofous required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-4 col-form-label">Telefon Numarası</label>
                                        <div class="col-md-9">
                                            <input type="number"  name="phone" placeholder="(___)(_______)"
                                                   class=form-control maxlength="10" autofous required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row mb-9">
                                    <fieldset>
                                        <legend class="col-md-4 col-form-label">Şehir</legend>
                                        <div class="col-md-6">
                                            <select id="" name="city" required>
                                                <option value="Sanliurfa">Şanlıurfa</option>
                                                <option value="Hatay">Hatay</option>
                                                <option value="Kahramanmaras">Kahramanmaraş</option>
                                            </select>
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
