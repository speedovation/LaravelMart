<div class='grid cart-container'>

    <div class='row'>
        

        <div class='desktop-12'>
            <h1>Shopping cart <small class='cart-info message'></small> </h1>
            
            <table width="100%" cellspacing="0" cellpadding="0" class="cart table rounded bordered zebra">
                <thead>
                    <tr>
                        <th class="image-cell head-cell">Preview</th>
                        <th class="item-cell head-cell">Item</th>
                        <th class="qty-cell fk-text-center head-cell">Qty</th>
                        <th class="price-cell fk-text-center head-cell">Price</th>
                        <th class="head-cell subtotal-cell fk-text-center">Subtotal</th>
                        <th class="head-cell">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach (Cart::content() as $row) 

                    <tr>
                        <td data-title='Preview'>
                            <img data-src='holder.js/100x100' src="{{$row->options->has('img') ? $row->options->img : 'default-image'}}" /> 
                        </td>
                        <td data-title='Item'>{{ $row->name }} </td>
                        <td data-title='Qty'> <input name="qty" class='qty' value="{{ $row->qty }}" row-id='{{ $row->rowid }}' /> </td>
                        <td data-title='Price'><i class='i-rupee'></i> {{$row->price}}</td>
                        <td data-title='Subtotal'><i class='i-rupee'></i> <span class='subtotal'>{{$row->subtotal}}</span> </td>
                        <td data-title='Remove'> <a class='remove-cart-item' href="javascipt://;" row-id='{{ $row->rowid }}'><i class='i-close-square '></i></a> </td>

                    </tr>

                    @endforeach

                    <tr>

                        <td colspan="6" class="text-right strong">Total Item count <span class='items_count'>{{ Cart::count() }}</span></td>

                    </tr>



                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="desktop-4">
            <p> Shipping to: Address Name <a href="">Change</a> </p>


        </div>
        <div class="desktop-8 text-right">

            <!--<h4>Offer Discount Amount: <i class="i-rupee"></i> 17</h4>-->
            <h2>Amount Payable: <i class="i-rupee"></i> <span class='total_amount'>{{Cart::total()}}</span></h2> 


        </div>
    </div>
    <div class="row">
        <div class="desktop-4">
            <button class="button"><i class='i-chevron-circleleft'></i> Continue Shopping</button>
        </div>
        <div class="desktop-4 bottom-margin-cart">
            Need Help? {{ trans('about.telephone')}} or contact us
        </div>
        <div class="desktop-4 text-right">

            <button class="button positive large">Proceed to Payment <i class='i-chevron-circle-right'></i></button>
        </div>
    </div>

</div>