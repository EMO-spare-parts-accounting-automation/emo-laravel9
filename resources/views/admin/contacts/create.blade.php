@extends('layouts.admin.admin')

@section('content')

    <h1>İletişim Formu</h1>

    <form method="POST" action="{{route('admin.contacts.store')}}">
        @csrf
        <h2> İletişim için aşağıdaki bilgileri giriniz</h2>
        <table>

            <tr>
                <td>Adı </td>
                <td>
                    <label>
                        <input type="text" name="name" size="40" required maxlength="50" minlength="3"/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>Soyadı </td>
                <td>
                    <label>
                        <input type="text" name="surname" size="40" required maxlength="50" minlength="2"/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>E-Posta Adresi </td>
                <td>
                    <label>
                        <input type="email" name="mail" size="40" required maxlength="70"/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>Telefon Numarası</td>
                <td>
                    <label>
                        <input type="number"  name="phone" placeholder="(___)(_______)" size="40" maxlength="10"/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>Şehir</td>
                <td>
                    <select id="" name="city" required>
                        <option value="sanliurfa">Şanlıurfa</option>
                        <option value="hatay">Hatay</option>
                        <option value="kahramanmaras">Kahramanmaraş</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" value="Kaydet"/>
                </td>
            </tr>

        </table>
    </form>




@endsection
