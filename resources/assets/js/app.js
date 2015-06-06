/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 'autoScale': true,
 'transitionIn': 'elastic',
 'transitionOut': 'elastic',
 'speedIn': 500,
 'speedOut': 300,
 'autoDimensions': true,
 'centerOnScroll': true
 */

$(function() {
// Handler for .ready() called.

    $(".add-to-cart-button").click(myfunction);
//    

    function myfunction(event)
    {
        
        event.preventDefault();

        var url = '/cart/additem';
        var product_code = $('.add-to-cart-button').attr('product-code');

        $.getJSON(url, {product_code: product_code})
                .done(function(data) {
            if (data.result)
            {
                $.fancybox.open({
                    type: 'ajax',
                    href: '/cart/basket',
                    scrolling: 'no',
                    afterShow: function() {
                        $('.cart-info').fadeIn().html(data.message).addClass('message-success').fadeOut({duration: 3000});
                    }
                });

            } //end of done

        }); //end of getjson
    }


    $('.raty').raty({
        starHalf: '/assets/img/raty/star-half-big.png', // The name of the half star image.
        starOff: '/assets/img/raty/star-off-big.png', // Name of the star image off.
        starOn: '/assets/img/raty/star-on-big.png',
        width: 'inherit',
        score: function() {
            return $(this).attr('data-score');
        },
        number: function() {
            return $(this).attr('data-number');
        }
    });


    //cart functions
    $("body").on("click", ".remove-cart-item", remove_cart_item);


    //remove action will trigger remove item from cart
    function remove_cart_item(e)
    {

        e.preventDefault();

        var url = '/cart/removeitem';
        var row_id = $(this).attr('row-id');
        var a = $(this);

        $.getJSON(url, {row_id: row_id})
                .done(function(data) {
            if (data.result)
            {

                $('.cart-info').fadeIn().html(data.message).addClass('message-danger').fadeOut({duration: 3000});

                //remove item row
                a.parent().parent().remove();

                //update total item count
                $('.items_count').html(data.items_count);

                //update total amount
                $('.total_amount').html(data.total_amount);


            }


        });
    }

    $("body").on("keyup", ".qty", function(e) {
// Check input( $( this ).val() ) for validity here
        this.value = this.value.replace(/[^0-9\.]/g, '');

        if (this.value === '')
        {
            e.preventDefault();
            return false;
        }



        var url = '/cart/updateqtyitem';
        var row_id = $(this).attr('row-id');
        var qty = this.value;
        var i = $(this);

        $.getJSON(url, {row_id: row_id, qty: qty})
                .done(function(data) {
            if (data.result)
            {

                $('.cart-info').fadeIn({duration:0}).html(data.message).addClass('message-info').fadeOut({duration: 3000});

                //update subtotal
                i.parent().parent().find('.subtotal').html(data.subtotal);

                //update total item count
                $('.items_count').html(data.items_count);

                //update total amount
                $('.total_amount').html(data.total_amount);


            }

        });

    });


    function reload_shopping_cart() {

        var url = '/cart/basket';

        var a = $(this);


        $.get(url)
                .done(function(data) {
            if (data.result)
            {
                $('.cart-info').html(data.message);
                a.parent().parent().remove();

            }
        });
    }


});
