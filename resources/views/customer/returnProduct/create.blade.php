@extends('layouts.customer.customer')

@section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h2>İade Talebi Oluşturma</h2></div>

                        <div class="card-body" style="padding-left: 150px">
                            <div class="form">
                                <form action="{{route('customer.returnproduct.store',$id)}}" method="POST">
                                    <h2> İade Talebiniz için aşağıdaki bilgileri doldurunuz!</h2>
                                    @csrf
                                    <div class="row mb-3">
                                        <fieldset>
                                            <label class="col-md-9 col-form-label">ürün için neden iade oluşturmak istiyorsunuz?</label>
                                            <div class="col-md-9">
                                                <input type="text" class=form-control name="customerfeedback"
                                                       placeholder="Talebinizi girin" autofous required>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <br>
                                    <div class="col-md-9 ">
                                        <fieldset>
                                                        <legend>Ürün ücret iadesi istiyor musunuz?</legend>
                                                            Evet <input type="radio" name="returncost" value=1 checked>
                                                            Hayır <input type="radio" name="returncost" value=0 >
                                                        <br>
                                                        <legend>Ürünü yenilemek istiyor musunuz?</legend>
                                                            Evet <input type="radio" name="refreshproduct" value=1 checked>
                                                            Hayır <input type="radio" name="refreshproduct" value=0>

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
