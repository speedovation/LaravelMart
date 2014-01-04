<table class="table">
    <tr>
        <td>Product Name : {{$product->name}} #Product Code :{{$product->code}}

        </td>
    </tr>
    <tr>
        <td> <img data-src='holder.js/400x300' src='{{$product->image}}' /></td>
    </tr>
    <tr>
        <td>Price: {{$product->long_desc}}</td>
    </tr>
    <tr>
        <td>More options</td>
    </tr>
    <tr>
        <td>Category : {{$product->category->name}} Stock: {{$product->stock}}</td>
    </tr>
    <tr>
        <td>Price: {{$product->price}}</td>
    </tr>
</table>