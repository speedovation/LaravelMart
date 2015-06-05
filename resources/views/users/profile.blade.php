   @extends('layouts.main')

@section('title', 'Product Title')



@section('content')

<h2>Hello {!!Auth::user()->username !!}</h2>
    <p>Welcome to your sparse profile page.</p>
@endsection
