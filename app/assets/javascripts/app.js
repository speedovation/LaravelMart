/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
// Handler for .ready() called.

    $(".fancybox").fancybox({scrolling:'no'});


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
    $(".remove-cart-item").click(remove_cart_item);


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
                $('.cart-info').html(data.message);
                a.parent().parent().remove();

            }

            //alert("Data Loaded: " + data['result'] + data.result);


        });
    }


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