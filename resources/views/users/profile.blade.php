   @extends('layouts.main')

@section('title', 'Product Title')



@section('content')

<div class="row">

<h2>Hello {!!Auth::user()->username !!}</h2>
    <p>Welcome to your sparse profile page.</p>

</div>

@endsection
