<form method="GET" action="{{$route}}">
    @csrf
    <button type="submit" style="color:{{$textColor}};background-color: {{$bgColor}}">{{$text}}</button>
</form>
