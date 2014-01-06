/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
// Handler for .ready() called.


    $('.raty').raty({
        starHalf: '/assets/img/raty/star-half-big.png', // The name of the half star image.
        starOff: '/assets/img/raty/star-off-big.png', // Name of the star image off.
        starOn: '/assets/img/raty/star-on-big.png',
        width : 'inherit',
        score: function() {
            return $(this).attr('data-score');
        },
        number: function() {
            return $(this).attr('data-number');
        }
    });
    
    
    //cart functions
    $( ".remove-cart-item" ).click(remove_cart_item);
    
    
    //remove action will trigger remove item from cart
    function remove_cart_item()
    {
        
        $.post( "test.php", { name: "John", time: "2pm" })
        .done(function( data ) {
        alert( "Data Loaded: " + data );
        });
    }   

});