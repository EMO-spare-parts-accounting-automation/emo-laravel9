

<!--burdan itibaren admin sayfa düzenlemeleri admin klasöründe olmak şartıyla yapılabilir-->

@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ADMİN PAGE') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <center><h1>HOŞGELDİN {{$user->name}}!</h1></center> <!--ismi ile karşılama mesajı-->
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
