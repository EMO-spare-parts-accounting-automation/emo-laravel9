

<!--Burada giriş yapan müşteri mı admin mi kontrolü yapılır ona göre sayfa görüntülenir-->
@if($user->userType==='admin')
    {{view('admin.home',compact('user'))}}         <!--giriş yapanın bilgisi sayfaya gönderilir compact ile-->
@elseif($user->userType==='customer')
    {{view('customer.home',compact('user'))}}      <!--giriş yapanın bilgisi sayfaya gönderilir compact ile-->
@endif
