<table class="table">
    <tr>
        <td>
            <h2 >Product Name : {{$product->name}} <button class='button success large float-right'> <i class='i-rupee'></i> {{round($product->price,3)}} ADD TO CART</button>
            </h2>
        </td>
    </tr>
    <tr>
        <td> <img data-src='holder.js/400x300' src='{{$product->image}}' /></td>
    </tr>
    <tr>
        <td> <span class='float-left'>Category : {{$product->category->name}}  #Product Code :{{$product->code}}</span> </td>
    </tr>
    <tr>
        <td>Price: {{$product->long_desc}}</td>
    </tr>
    <tr>
        <td>More options</td>
    </tr>
    <tr>
        <td>Stock: {{$product->stock}}</td>
    </tr>
    <tr>
        <td>Price: {{$product->price}}</td>
    </tr>
</table>