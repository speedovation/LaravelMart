{!! $discounted_price = round($product->price - ($product->price * $product->discount / 100), 3 )!!}

<div>
    <h2 class='divide-section' >
        {!!$product->name!!} 
        <small class='text-small'>(#{!!$product->code!!})</small> 
        <button class='button success add-to-cart-button float-right' product-code='{!!$product->code!!}'> 
            <i class='i-rupee size-24'></i> {!!$discounted_price!!}  
            <i class='i-shopping-cart size-24'></i> ADD TO CART
        </button>
    </h2>
    <p></p>
    <div class='row section'> 
        <div class='desktop-7'>

            <img data-src='holder.js/400x300' src='{!!$product->image!!}' />

            <div>
                <img class='item-box' data-src='holder.js/170x120' src='{!!$product->image!!}' />
                <img class='item-box' data-src='holder.js/170x120' src='{!!$product->image!!}' />
                <img class='item-box' data-src='holder.js/170x120' src='{!!$product->image!!}' />
                <img class='item-box' data-src='holder.js/170x120' src='{!!$product->image!!}' />



            </div>

        </div>
        <div class='desktop-5'>

            <table class="table bordered rounded">
                <tr>
                    <th colspan="2">OFFER Details</th>
                </tr>
                <tr>
                    <td>MRP</td>
                    <td>{!! round($product->mrp,3) !!}</td>
                </tr>
                <tr>
                    <td>Selling Price</td>
                    <td>{!! round($product->price,3) !!}</td>
                </tr>
                <tr>
                    <td>OFFER PRICE </td>
                    <td>
                        {!!$discounted_price!!} 
                        <span class="badge badge-danger badge-inside-table"> {!!$product->discount!!}% </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {!!link_to_action('WishlistController@create','Add to Wishlist ',['product_code'=> $product->code ],['class'=>'button'])!!}
                        <!--<a class="button" href="http://cart.po/wishlist/create">Add to Wishlist <span class="spinner"></span></a>-->
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> 
                        <div data-number="5" data-score='4.5' class='raty float-left'></div> 
                        <div class="review-panel float-right"> 43 Reviews | Write a Review</div>
                    </td>
                </tr>
            </table> 

            <ul>
                <li><i class='i-vehical size-32'></i>FREE SHIPPING</li>
                <li><i class='i-rupee size-32'></i>30 DAYS MONEY BACK GUARANTEE</li>
                <li><i class='i-repeat size-32'></i>30 DAYS FREE RETURN</li>
            </ul>


        </div>
    </div>
    <div class="row section">
        <div class="desktop-7 text-center">




            <!--Selling Price Rs 1400
            OFFER PRICE
            Rs 1372
            2%
            Available
            Add to Wishlist
            Free Delivery
            Dispatched in 3 business days-->



        </div>

        <div class="desktop-5">

        </div>



    </div>
    <div class="hidden"> 
        <div class="w-25">
            <i class='i-vehical size-32'></i>FREE SHIPPING
        </div>
        <div class="w-42">

            <i class='i-rupee size-32'></i>30 DAYS MONEY BACK GUARANTEE
        </div>

        <div class="w-33">

            <i class='i-repeat size-32'></i>30 DAYS FREE RETURN
        </div>


    </div>

    <p>Category : {!!$product->category->name!!}  #Product Code :{!!$product->code!!}</p>

    <div class="info section">
        
        <li><a class="fancybox fancybox.ajax" href="/cart/basket">Ajax</a></li>

        <h3><b> Key Features </b></h3>
        <div class="line bmargin10">
            <ul class="feature_bullet">
                <li><span>Android v4.1 (Jelly Bean) OS</span></li><li><span>Expandable Storage Capacity of 32 GB</span></li><li><span>Dual Standby SIM (GSM + GSM)</span></li><li><span>FM Radio with Recording</span></li><li><span>1 GHz Cortex-A5 Processor</span></li><li><span>3 MP Primary Camera</span></li><li><span>3.2-inch TFT Capacitive Touchscreen</span></li><li><span>Wi-Fi Enabled</span></li>                    </ul>
        </div>
        <p>
            Samsung has worked its way into the premier league of being one of the most preferred smartphone brands of today. Known for creating Android phones for all kinds of budgets, its latest offering is an ode to budget Android smartphones. The Samsung Galaxy Young S6312 is a candy bar dual GSM SIM smartphone that runs on an <strong>Android v4.1 (Jelly Bean) operating system</strong> with a 1 Ghz Cortex A5 processor and 512 MB of RAM.</p>
        <p>
            This starter smartphone with Java sports a <strong>3.5 inch TFT HVGA capacitive touch screen</strong> that has a resolution of 320 x 480 pixels and a color depth of 262 K as well. The pinch to zoom and auto rotate features imbibe the best of luxury smartphones giving you ultimate functionality with value for money.&nbsp;</p>
        <p>
            The Galaxy Young comes armed with a <strong>3 megapixel camera</strong> to capture the high points of your life and it is capable of recording videos of the resolution 640 x 480 at the rate of 24 frames per second; enjoy re-watching the video of your friend’s birthday party after the hullabaloo has died down. With the CMOS sensor, the photos taken on the phone are sure to be memorable.</p>

        <h3>Design and Connectivity</h3>
        <p>
            The <strong>Samsung Galaxy Young S6312</strong> is designed to be simple and clean without compromising on style. Be spoilt for connectivity options with the Samsung Galaxy Young. Change your Facebook status and be in touch with all your friends via Whatsapp through fast internet connectivity with the <strong>GPRS, EDGE, 3G and Wi-Fi </strong>options on the phone. Transferring data, music and files become easier with the microUSB and bluetooth features. Turn the device into a modem and use it to connect to the internet with either the microUSB or a Wi-Fi hotspot.&nbsp;</p>
        <p>
            <strong>Storage and Battery</strong></p>
        <p>
            The Galaxy Young is powered by a <strong>Li-Ion 1300 mAh battery </strong>that can give you up to 6 hours on a 3G network. The phone has an inbuilt memory of 2 GB to store all your media and files and it can be <strong>extended up to 64 GB</strong> through a microSD card.</p>        


        Price: {!!$product->long_desc!!}
        Stock: {!!$product->stock!!} </div>
</div>
