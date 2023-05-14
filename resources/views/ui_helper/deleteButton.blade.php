<form method="POST" action="{{$route}}">
    @csrf
    @method('DELETE')
    <button type="submit" style="background-color: {{$bgColor}}; color: {{$textColor}}">
        {{$text}}
    </button>
</form>
