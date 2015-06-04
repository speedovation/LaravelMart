<p class="text-info">
    Thanks for shopping at the Angular Store.<br>
    This is your shopping cart. Here you can edit the items, 
    go back to the store, clear the cart, or check out.
</p>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-md-8">

            <!-- items -->
            <table class="table table-bordered">

                <!-- header -->
                <tbody><tr class="well">
                    <td><b>Item</b></td>
                    <td class="tdCenter"><b>Quantity</b></td>
                    <td class="tdRight"><b>Price</b></td>
                    <td></td>
                </tr>

                <!-- empty cart message -->
                <tr ng-hide="cart.getTotalCount() > 0">
                    <td class="tdCenter" colspan="4">
                        Your cart is empty.
                    </td>
                </tr>

                <!-- cart items -->
                <tr ng-repeat="item in cart.items | orderBy:'name'">
                    <td>{{item.name}}</td>
                    <td class="tdCenter">
                      <div class="input-append">
                        <!-- use type=tel instead of  to prevent spinners -->
                        <input class="span3 text-center form-control" ng-model="item.quantity" ng-change="cart.saveItems()" type="tel">
                        <button class="btn btn-success" type="button" ng-disabled="item.quantity >= 1000" ng-click="cart.addItem(item.sku, item.name, item.price, +1)">+</button>
                        <button class="btn btn-default" type="button" ng-disabled="item.quantity <= 1" ng-click="cart.addItem(item.sku, item.name, item.price, -1)">-</button>
                      </div>
                    </td>
                    <td class="tdRight">{{item.price * item.quantity | currency}}</td>
                    <td class="tdCenter" title="remove from cart">
                        <a href="" ng-click="cart.addItem(item.sku, item.name, item.price, -10000000)">
                            <i class="icon-remove"></i>
                        </a>
                    </td>
                </tr>

                <!-- footer -->
                <tr class="well">
                    <td><b>Total</b></td>
                    <td class="tdCenter"><b>{{cart.getTotalCount()}}</b></td>
                    <td class="tdRight"><b>{{cart.getTotalPrice() | currency}}</b></td>
                    <td></td>
                </tr>
            </tbody></table>
        </div>

        <!-- buttons -->
        <div class="col-sm-4 col-md-4">
            <p class="text-info">
                <button class="btn btn-block btn-default" onclick="window.location.href='default.htm'">
                    <i class="icon-chevron-left"></i> back to store
                </button>
                <button class="btn btn-block btn-danger" ng-click="cart.clearItems()" ng-disabled="cart.getTotalCount() < 1">
                    <i class="icon-trash icon-white"></i> clear cart
                </button>
            </p>

            <br><br>

            <p class="text-info">
                <button class="btn btn-block btn-primary" ng-click="cart.checkout('PayPal')" ng-disabled="cart.getTotalCount() < 1">
                    <i class="icon-ok icon-white"></i> check out using PayPal
                </button>
                <button class="btn btn-block btn-primary" ng-click="cart.checkout('Google')" ng-disabled="cart.getTotalCount() < 1">
                    <i class="icon-ok icon-white"></i> check out using Google
                </button>
                <button class="btn btn-block btn-primary" ng-click="cart.checkout('Stripe')" ng-disabled="cart.getTotalCount() < 1">
                    <i class="icon-ok icon-white"></i> check out using Stripe
                </button>
            </p>
                <!-- Stripe needs a form to post to -->
                <form class="form-stripe"></form>

            <br><br>

            <p class="text-info">
                <button class="btn btn-block btn-link btn-default" ng-click="cart.checkout('PayPal')" ng-disabled="cart.getTotalCount() < 1">
                    <img src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" alt="checkout PayPal">
                </button>    
                <button class="btn btn-block btn-link btn-default" ng-click="cart.checkout('Google')" ng-disabled="cart.getTotalCount() < 1">
                    <img src="https://checkout.google.com/buttons/checkout.gif?w=168&amp;h=44&amp;style=white&amp;variant=text" alt="checkoutGoogle">
                </button>    
            </p>
        </div>
    </div>
</div>