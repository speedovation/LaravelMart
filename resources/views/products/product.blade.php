@extends('layouts.main')

@section('title', 'Product Title')



@section('content')

<div class="row">

    <div class='desktop-9 product-single'>

        @include('products.single',['product' => $product] )

    </div>

    <div class='desktop-3 product-sidebar'>
        <h3>Deal of the day</h3>
        <img data-src='holder.js/250x300' src='{!!$product->image!!}' />
        <h3>Related Items</h3>
        <img data-src='holder.js/250x300' src='{!!$product->image!!}' />
    </div>
</div>


@endsection
