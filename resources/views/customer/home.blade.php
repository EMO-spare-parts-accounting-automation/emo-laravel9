<!--burdan itibaren admin sayfa düzenlemeleri admin klasöründe olmak şartıyla yapılabilir-->

@extends('layouts.customer.customer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Müşteri page') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <center><h1>SAYIN {{$user->name}} HOŞGELDİN!</h1></center>   <!--ismi ile karşılama mesajı-->
                        {{ __('You are logged customer!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
