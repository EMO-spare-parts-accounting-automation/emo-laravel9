@extends('layouts.admin.admin')
@section('content')

    <table style="width: 70%">
        <tr>
            <td>İsim</td>
            <td>Soyisim</td>
            <td>E-Posta Adresi</td>
            <td>Telefon Numarası</td>
            <td>Şehri</td>
        </tr>

        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact['name']}}</td>
                <td>{{$contact['surname']}}</td>
                <td>{{$contact['mail']}}</td>
                <td>{{$contact['phone']}}</td>
                <td>{{$contact['city']}}</td>
                <td>

            </tr>
        @endforeach


    </table>



@endsection
