@extends('layouts.admin')

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
            <table border="1" cellpadding="10" style=" width: 70% ">
                <thead>
                <tr>
                    <td bgcolor="#e8e8e8">ID</td>
                    <td bgcolor="#e8e8e8">KULLANICI ADI</td>
                    <td bgcolor="#e8e8e8">E-MAİL</td>
                    <td bgcolor="#e8e8e8">KULLANICI TİPİ</td>
                    <td bgcolor="#e8e8e8">KAYIT TARİHİ</td>
                    <td colspan="2" bgcolor="#e8e8e8">İŞLEMLER</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @if($user->email===$myaccount->email)
                        <tr>
                            <td bgcolor="#7fffd4">{{$user->id}}</td>
                            <td bgcolor="#7fffd4">{{$user->name}}</td>
                            <td bgcolor="#7fffd4">{{$user->email}}</td>
                            <td bgcolor="#7fffd4">{{$user->userType}}</td>
                            <td bgcolor="#7fffd4">{{$user->created_at}}</td>
                            <td bgcolor="#7fffd4">
                                <form method="GET" action="#">
                                    @csrf
                                    <button type="submit" style="color: white;background-color: green">AKTİF KULLANICI</button>
                                </form>
                            </td>
                            <td bgcolor="#7fffd4"></td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->userType}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                @if($user->email===$myaccount->email)
                                    <form method="GET" action="#">
                                        @csrf
                                        <button type="submit" style="color: white;background-color: green">AKTİF KULLANICI</button>
                                    </form>
                                @elseif($user->userType==='customer')
                                    <form method="GET" action="{{route('admin.customerlist.yetki',$user->id)}}">
                                        @csrf
                                        <button type="submit" style="color: white;background-color: blue">Yetkilendir</button>
                                    </form>
                                @elseif($user->userType==='admin')
                                    <form method="GET" action="{{route('admin.customerlist.yetki',$user->id)}}">
                                        @csrf
                                        <button type="submit" style="color: white;background-color: blue">Yetkisini Al!</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if($user->email!=$myaccount->email)
                                    <form method="POST" action="{{route('admin.customerlist.destroy',$user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: red; color: white">
                                            SİL!
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </center>
    @else
        <div style="height: 150px"><br></div>
        <center><h2>GEÇERLİ KULLANICI YOK</h2></center>
    @endif
@endsection
