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


});