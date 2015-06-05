<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CartController extends CoreController {

    /**
     * Flag for whether the controller is RESTful.
     *
     * @access public
     * @var boolean
     */
    public $restful = true;


    /**
     * Shows the cart contents.
     *
     * @access public
     * @return void
     */
    public function getIndex() {
        return view('cart.basket');
    }

    public function getBasket() {
        return view('cart.basket');
    }

    public function getRemoveitem() {

        $message = 'Item Removed Successfuly';
        try {
            //get rowid
            $row_id = Input::get('row_id');

            //remove            
            Cart::remove($row_id);
        } catch (ShoppingcartInvalidRowIDException $e) {
            $message = "Failed to remove item";
        }

        //provide result
        return json_encode([
            'result' => true,
            'message' => $message,
            'items_count' => Cart::count(),
            'rows_count' => Cart::count(false),
            'total_amount' => Cart::total()
        ]);
    }

    //Add Product into cart
    public function getAdditem() {

        $message = "Item Added Successfuly";

        try {
            //get product code
            $product_code = Input::get('product_code');

            //get product info
            $product = Product::where('code', '=', $product_code)->first();

            Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => round($product->price - ($product->price * $product->discount / 100), 3),
                        'options' => ['img' => $product->image, 'code' => $product->code]
                    ]
            );
        } catch (ShoppingcartInvalidRowIDException $e) {
            $message = "Failed to add item";
        }


        //provide result
        return json_encode(['result' => true, 'message' => $message]);
    }

    //Add Product into cart
    public function getUpdateqtyitem() {

        //get product code
        $row_id = Input::get('row_id');
        $qty = Input::get('qty');
        $message = "Item Updated Successfuly";

        try {
            Cart::update($row_id, $qty);
        } catch (ShoppingcartInvalidRowIDException $e) {
            $message = "Failed to update item";
        }


        return json_encode([
            'result' => true,
            'message' => $message,
            'subtotal' => Cart::get($row_id)['subtotal'],
            'items_count' => Cart::count(),
            'rows_count' => Cart::count(false),
            'total_amount' => Cart::total()
        ]);
    }

}

