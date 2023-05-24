@extends('layouts.customer.customer')

@section('content')
    <center>
        <div style="position:relative; top:50px;">
            <h1>Lütfen ödeme türünü seçiniz...</h1>
        </div>
        <div class="animasyon-div">
            <a href="{{route('customer.payment.credit')}}">
                <button class="round green" >
                    KREDİ KARTI<span class="round">Kredi/Banka kartı ile online bakiye yüklemek için tıklayın... </span>
                </button>
            </a>
        </div>

        <div class="animasyon-div">
            <a href="{{route('customer.payment.transfer')}}">
                <button class="round green">
                    HAVALE/EFT<span class="round">Satıcı banka bilgilerini kullanarak havale/eft ile bakiye yüklemek için tıklayın...</span>
                </button>
            </a>
        </div>
    </center>


@endsection
