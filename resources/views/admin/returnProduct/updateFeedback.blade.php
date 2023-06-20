@extends('layouts.admin.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Firma Geribildirimi</h2></div>

                    <div class="card-body" style="padding-left: 150px">
                        <div class="form">
                            <form action="{{route('admin.returnproduct.store',$id)}}" method="POST">
                                <h2> Müşteri için geribildirim oluşturun!</h2>
                                @csrf
                                <div class="row mb-3">
                                    <fieldset>
                                        <label class="col-md-9 col-form-label">Geribildirim</label>
                                        <div class="col-md-9">
                                            <input type="text" class=form-control name="adminfeedback"
                                                   placeholder="Geribildirim girin" autofous required>
                                        </div>
                                    </fieldset>
                                </div>
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
