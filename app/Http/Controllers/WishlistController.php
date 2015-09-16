<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WishlistController extends CoreController {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('wishlists.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //store wishlist
        //dd(Auth::user());
        //get user id
        $user_id = Auth::user()->id;

        //get product code from request segment
        $product_code = Input::get('product_code');

        //check if already exists or not
        try {
            Wishlist::where('product_code', '=', $product_code)->firstOrFail();

            $message = 'Already exists';

            //To register the error handler, listen for the 
        } catch (ModelNotFoundException $e) {

            //insert new record
            // Create a new user in the database...
            $wishlist = Wishlist::create([ 'user_id' => $user_id, 'product_code' => $product_code]);

            $message = 'Successfully added';


            if (!$wishlist) {
                //some error
                //get error and show it to user
                //for now no errors are assumed ;)
                $message = 'At the moment we can\'t add your item. Please try again';
            }
        }

//show index of wishlist
        return Redirect::to('products/product/p--' . $product_code)->with('message', $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //not required
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return View::make('wishlists.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        return View::make('wishlists.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
