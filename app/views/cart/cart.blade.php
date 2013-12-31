@if ($success = Session::get('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Success!</strong> {{ $success }}
</div>
@endif
@if ($error = Session::get('error'))
<div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Error!</strong> {{ $error }}
</div>
@endif
@if ($warning = Session::get('warning'))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Warning!</strong> {{ $warning }}
</div>
@endif


{ { dd(Cart::content())}} 

<a ng-disabled="cart.getTotalCount() &lt; 1" title="go to shopping cart" href="{{ Request::url()}}#/cart">
                <i class="icon-shopping-cart"></i>
                <b class="ng-binding">1</b> items, <b class="ng-binding">$12.00</b>
            </a>

<table class="table table-bordered">

    <thead>
        <tr >
            <td><b>Item</b></td>
            <td class="tdCenter"><b>Quantity</b></td>
            <td class="tdRight"><b>Price</b></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="ng-binding">Apple</td>
            <td class="tdCenter">
                <div class="input-append">
                    <!-- use type=tel instead of  to prevent spinners -->
                    <input type="tel" ng-change="cart.saveItems()" ng-model="item.quantity" class="span3 text-center ng-pristine ng-valid">
                    <button ng-click="cart.addItem(item.sku, item.name, item.price, +1)" ng-disabled="item.quantity &gt;= 1000" type="button" class="btn btn-success">+</button>
                    <button ng-click="cart.addItem(item.sku, item.name, item.price, -1)" ng-disabled="item.quantity &lt;= 1" type="button" class="btn btn-inverse" disabled="disabled">-</button>
                </div>
            </td>
            <td class="tdRight ng-binding">$12.00</td>
            <td title="remove from cart" class="tdCenter">
                <a ng-click="cart.addItem(item.sku, item.name, item.price, -10000000)" href="">
                    <i class="icon-remove"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td class="ng-binding">Apple</td>
            <td class="tdCenter">
                <div class="input-append">
                    <!-- use type=tel instead of  to prevent spinners -->
                    <input type="tel" ng-change="cart.saveItems()" ng-model="item.quantity" class="span3 text-center ng-pristine ng-valid">
                    <button ng-click="cart.addItem(item.sku, item.name, item.price, +1)" ng-disabled="item.quantity &gt;= 1000" type="button" class="btn btn-success">+</button>
                    <button ng-click="cart.addItem(item.sku, item.name, item.price, -1)" ng-disabled="item.quantity &lt;= 1" type="button" class="btn btn-inverse" disabled="disabled">-</button>
                </div>
            </td>
            <td class="tdRight ng-binding">$12.00</td>
            <td title="remove from cart" class="tdCenter">
                <a ng-click="cart.addItem(item.sku, item.name, item.price, -10000000)" href="">
                    <i class="icon-remove"></i>
                </a>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr >
            <td><b>Total</b></td>
            <td class="tdCenter"><b class="ng-binding">1</b></td>
            <td class="tdRight"><b class="ng-binding">$12.00</b></td>
            <td></td>
        </tr>
    </tfoot>
</table>


<table clas='table'>
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Item Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach (Cart::content() as $row) : ?>

            <tr>
                <td>
                    <p><strong><?php echo $row->name; ?></strong></p>
                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                </td>
                <td><input type="text" value="<?php echo $row->qty; ?>"></td>
                <td>$<?php echo $row->price; ?></td>
                <td>$<?php echo $row->subtotal; ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>