<div class="row">

    <div class='desktop-8 product-single'>

        @include('products.single',['product' => $product] )

    </div>

    <div class='desktop-4 product-sidebar'>
        <h3>Deal of the day</h3>
        <img data-src='holder.js/350x300' src='{{$product->image}}' />
        <h3>Related Items</h3>
        <img data-src='holder.js/350x300' src='{{$product->image}}' />
    </div>
</div>