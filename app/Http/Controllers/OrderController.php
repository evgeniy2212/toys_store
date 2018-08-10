<?php

namespace App\Http\Controllers;

use App\Http\Requests\cartForm;
use App\Mail\OrderShipped;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    public function index()
    {
        $orders = new Order();
        $orders = $orders->getAllOrders();

        foreach ($orders as $order) {
            $order->order_list = unserialize($order->order_list);
            $order->order_quantity = unserialize($order->order_quantity);
            $order->price_list = unserialize($order->price_list);
            $order->articuls = unserialize($order->articuls);
        }

        return view('order.index', [
            'orders'    => $orders,
        ]);
    }

    public function storeOrder(cartForm $request)
    {
        Order::sendMail(Order::getData($request));

        Cart::destroy();

        return back()->with('status', 'Заказ принят!');
    }



    public function confirmOrder($id)
    {
        Order::changeStatus($id);
        return back();
    }



}
