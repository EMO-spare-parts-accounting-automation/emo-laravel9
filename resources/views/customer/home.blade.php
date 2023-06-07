<!--burdan itibaren admin sayfa düzenlemeleri admin klasöründe olmak şartıyla yapılabilir-->

@extends('layouts.customer.customer')

@section('content')
    <center>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <center><h1><label><b><strong>Her gün olduğu gibi bu günde bir adım daha ileriye!</strong></b></label> </h1></center>
        <figure>
            <img class="img-home" src="https://r.resimlink.com/hbqwK5i.jpeg" alt="">
        </figure>
        <center><h1><label>Hoşgeldin <b><strong style="font-family: Verdana;
        -webkit-text-stroke: 1px black;color:red ">{{$user->name}}!</strong></b></label> </h1></center>
        <center><h1><label><b>YETKİ:<strong style="font-family: Verdana;
        -webkit-text-stroke: 1px black;color:red">
                            MÜŞTERİ</strong></b></label> </h1></center>
    </center>



@endsection
