@extends("layout")
@section("content")
    @if ($requested)
        Check your mail!
    @else
        {{ Form::open([
            "route" => "user/request",
            "autocomplete" => "off"
        ]) }}
            {{ Form::label("email", "Email")}}
            {{ Form::text("email", Input::get("email"), [
                "placeholder" => "john@example.com"
            ]) }}
            {{ Form::submit("reset") }}
        {{ Form::close() }}
    @endif
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop