<?php  namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/*use Formativ\Billing\GatewayInterface;
use Formativ\Billing\DocumentInterface;
use Formativ\Billing\MessengerInterface;*/

class OrderController extends CoreController {

    protected $gateway;
    protected $document;
    protected $messenger;

    public function __construct(
    //GatewayInterface $gateway, DocumentInterface $document, MessengerInterface $messenger
    ) {
       /* $this->gateway = $gateway;
        $this->document = $document;
        $this->messenger = $messenger;*/
    }

    public function indexAction() {
        $query = Order::with([
                    "users",
                    "orderItems",
                    "orderItems.product",
                    "orderItems.product.category"
        ]);

        $account = Input::get("user");

        if ($account) {
            $query->where("user_id", $account);
        }

        return $query->get();
    }

    public function addAction() {
        $validator = Validator::make(Input::all(), [
                    "account" => "required|exists:users,id",
                    "items" => "required"
        ]);

        if ($validator->passes()) {
            $order = Order::create([
                        "user_id" => Input::get("user")
            ]);

            try {
                $items = json_decode(Input::get("items"));
            } catch (Exception $e) {
                return Response::json([
                            "status" => "error",
                            "errors" => [
                                "items" => [
                                    "Invalid items format."
                                ]
                            ]
                ]);
            }

            $total = 0;

            foreach ($items as $item) {
                $orderItem = OrderItem::create([
                            "order_id" => $order->id,
                            "product_id" => $item->product_id,
                            "quantity" => $item->quantity
                ]);

                $product = $orderItem->product;

                $orderItem->price = $product->price;
                $orderItem->save();

                $product->stock -= $item->quantity;
                $product->save();

                $total += $orderItem->quantity * $orderItem->price;
            }

            $result = $this->gateway->pay(
                    Input::get("number"), Input::get("expiry"), $total, "usd"
            );

            if (!$result) {
                return Response::json([
                            "status" => "error",
                            "errors" => [
                                "gateway" => [
                                    "Payment error"
                                ]
                            ]
                ]);
            }

            $account = $order->user;

            $document = $this->document->create($order);
            $this->messenger->send($order, $document);

            return Response::json([
                        "status" => "ok",
                        "order" => $order->toArray()
            ]);
        }

        return Response::json([
                    "status" => "error",
                    "errors" => $validator->errors()->toArray()
        ]);
    }

}
