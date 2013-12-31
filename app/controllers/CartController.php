<?php


class CartController extends BaseController
{
        /**
         * Flag for whether the controller is RESTful.
         *
         * @access public
         * @var boolean
         */
        public $restful = true;
        
        protected $layout = "layouts.main";

        /**
         * Shows the cart contents.
         *
         * @access public
         * @return void
         */
        public function getIndex()
        {

            // Batch method
            Cart::add(array(
              array('id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00),
              array('id' => '4832k', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => array('size' => 'large'))
            ));


                // Show the page.
                //
                $this->layout->content =  View::make('cart.cart');
        }

        /**
         * Updates or empties the cart contents.
         *
         * @access public
         * @return void
         */
        public function postIndex()
        {
                // If we are updating the items information.
                //
                if (Input::get('update'))
                {
                        try
                        {
                                // Get the items to be updated.
                                //
                                $items = array();
                                foreach(Input::get('items') as $rowid => $values)
                                {        
                                        $options=array();
                                        
                                        $items[] = array(
                                                'rowid' => $rowid,
                                                'qty' => $values['qty'],
                                                'options'=>$values['options']
                                        );
                                }
                                
                               Cart::update($items);
                        }

                        // Is the Item Row ID valid?
                        // ShoppingcartInstanceException
                        catch (\Gloudemans\Shoppingcart\Exceptions\ShoppingcartInvalidRowIDException $e)
                        {
                                // Redirect back to the shopping cart page.
                                //
                                return Redirect::to('cart')->with('error', 'Invalid Item Row ID!');
                        }

//                        // Does this item exists on the shopping cart?
//                        //
//                        catch (Shpcart\CartItemNotFoundException $e)
//                        {
//                                // Redirect back to the shopping cart page.
//                                //
//                                return Redirect::to('cart')->with('error', 'Item was not found in your shopping cart!');
//                        }
//
//                        // Is the item quantity valid?
//                        //
//                        catch (Shpcart\CartInvalidItemQuantityException $e)
//                        {
//                                // Redirect back to the shopping cart page.
//                                //
//                                return Redirect::to('cart')->with('error', 'Invalid item quantity!');
//                        }

                        // Redirect back to the shopping cart page.
                        //
                        return Redirect::to('cart')->with('success', 'Your shopping cart was updated.');
                }

                // If we are emptying the cart.
                //
                elseif (Input::get('empty'))
                {
                        // Let's clear the shopping cart!
                        //
                        Cart::destroy();

                        // Redirect back to the shopping cart page.
                        //
                        return Redirect::to('cart')->with('success', 'Your shopping cart was cleared!');
                }
        }

        /**
         * Removes an item from the shopping cart.
         *
         * @access public
         * @param string
         * @return void
         */
        public function getRemove($item_id = null)
        {
                try
                {
                        // Remove the item from the cart.
                        //
                        Cart::remove($item_id);
                }

                // Is the Item Row ID valid?
                //
                catch (\Gloudemans\Shoppingcart\Exceptions\ShoppingcartInvalidRowIDException $e)
                {
                        // Redirect back to the shopping cart page.
                        //
                        return Redirect::to('cart')->with('error', 'Invalid Item Row ID!');
                }

//                // Does this item exists on the shopping cart?
//                //
//                catch (Shpcart\CartItemNotFoundException $e)
//                {
//                        // Redirect back to the shopping cart page.
//                        //
//                        return Redirect::to('cart')->with('error', 'Item was not found in your shopping cart!');
//                }
//
//                // Other error.
//                //
//                catch (Shpcart\CartException $e)
//                {
//                        // Redirect back to the home page.
//                        //
//                        return Redirect::to('cart')->with('error', 'An unexpected error occurred!');
//                }

                // Redirect back to the shopping cart page.
                //
                return Redirect::to('cart')->with('success', 'The item was removed from the shopping cart.');
        }
        
         public function getMycart()
        {

            

                // Show the page.
                //
               return  View::make('cart.mycart');
        }
}




    
    
   

