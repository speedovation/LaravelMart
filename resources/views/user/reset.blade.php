@extends("layout")
@section("content")
    {{ Form::open([
        "url" => URL::route("user/reset") . $token,
        "autocomplete" => "off"
    ]) }}
        @if ($error = $errors->first("token"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        {{ Form::label("email", "Email")}}
        {{ Form::text("email", Input::get("email"), [
            "placeholder" => "john@example.com"
        ]) }}
        @if ($error = $errors->first("email"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        {{ Form::label("password", "Password")}}
        {{ Form::password("password", [
            "placeholder" => "••••••••••"
        ]) }}
        @if ($error = $errors->first("password"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        {{ Form::label("password_confirmation", "Confirm Password")}}
        {{ Form::password("password_confirmation", [
            "placeholder" => "••••••••••"
        ]) }}
        @if ($error = $errors->first("password_confirmation"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        {{ Form::submit("reset") }}
    {{ Form::close() }}
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop