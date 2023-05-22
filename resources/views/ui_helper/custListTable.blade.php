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
                        @include('ui_helper.updateButton',['route'=>route('admin.customerlist.authority',$user->id),
                            'text'=>'Yetkilendir!','bgColor'=>"#0000ff" ,'textColor'=>"#ffffff"])
                    @elseif($user->userType==='admin')
                        @include('ui_helper.updateButton',['route'=>route('admin.customerlist.authority',$user->id),
                            'text'=>'Yetkisini Al!','bgColor'=>"#0000ff" ,'textColor'=>"#ffffff"])
                    @endif
                </td>
                <td>
                    @if($user->email!=$myaccount->email)
                        @include('ui_helper.deleteButton',[
                                'route'=>route('admin.customerlist.destroy',$user->id),
                                'text'=>'SİL!',
                                'bgColor'=>'#ff0000',
                                'textColor'=>'#ffffff',
                                ])
                    @endif
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
