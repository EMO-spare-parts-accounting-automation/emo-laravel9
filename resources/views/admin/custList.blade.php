@extends('layouts.admin.admin')

@section('content')
    @if(!$isempty)
        <div class="kullaniciArama" style="position: center;align-items: center;align-content: center;text-align: center">
            <form method="GET" action="{{route('admin.customerlist.search')}}">
                <input type="search" name="search" placeholder="Kullanici Arayın!">
                <button type="submit">Ara</button>
            </form>
        </div>
        <br>
        <center>
            @include('ui_helper.custListTable',['users'=>$users,'myaccount'=>$myaccount])
        </center>
    @else
        <div style="height: 150px"><br></div>
        <center><h2>GEÇERLİ KULLANICI YOK</h2></center>
    @endif
@endsection
