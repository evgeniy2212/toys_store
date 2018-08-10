<?php

namespace App;

use App\Mail\OrderShipped;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['id', 'status',
        'order_list', 'order_quantity', 'price_list',
        'amount', 'created_at', 'updated_at', 'adress',
        'name', 'number', 'delivery_method', 'articuls',
        'city'];

    public function getAllOrders()
    {
        return DB::table('orders')
            ->get();
    }


    public static function changeStatus($id)
    {
        DB::table('orders')
            ->where('id', $id)
            ->update(['status' => true]);
    }

    public static function sendMail(Order $order)
    {
        Mail::to('kabanusha28@gmail.com')->send(new OrderShipped([
            'id'        => $order->articuls,
            'orderList' => $order->order_list,
            'quantity'  => $order->order_quantity,
            'priceList' => $order->price_list,
            'amount'    => $order->amount,
            'name'      => $order->name,
            'number'    => $order->number,
            'adress'    => $order->adress,
            'delivery'  => $order->delivery_method,
            'city'      => $order->city,
        ]));

    }

    public static function getData($request)
    {
        $order = new Order();

        $products = $request->session()->all()['cart']['default'];
        $data = $request->all();
        $id = [];
        $orderList = [];
        $quantity = [];
        $priceList = [];
        $amount = Cart::subtotal();

        foreach ($products as $item) {
            $id[] = $item->id;
            $orderList[] = $item->name;
            $quantity[] = $item->qty;
            $priceList[] = $item->price;
        }

        $order->articuls = serialize($id);
        $order->order_list = serialize($orderList);
        $order->order_quantity = serialize($quantity);
        $order->price_list = serialize($priceList);
        $order->amount = $amount;
        $order->name = $data['name'];
        $order->number = $data['number'];
        $order->adress = $data['adress'];
        $order->delivery_method = $data['delivery'];
        $order->city = $data['city'];
        $order->status = false;

        $order->save();

        return $order;
    }

}
