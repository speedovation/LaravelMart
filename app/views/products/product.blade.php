<div class="row">

    <div class='col-md-12 col-sm-4'>

        <table class="table well">
            <tr>
                <td>Product Name : {{$product->name}} #Product Code :{{$product->id}}
               
                </td>
            </tr>
            <tr>
                <td> <img data-src='holder.js/400x300' src='{{$product->image}}' /></td>
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






    </div>
</div>



