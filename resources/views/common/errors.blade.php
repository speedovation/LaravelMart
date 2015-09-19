@if($errors->any())
    <ul class="message message-danger large">
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif
