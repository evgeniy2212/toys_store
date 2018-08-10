<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->all();
        $cartItem = Cart::add($data['id'], $data['name'], 1, $data['price']);
        $content = Cart::content();
        return response()->json([
            'count'   => Cart::count(),
        ]);
    }

    public function index()
    {
        $content = Cart::content();
        return view('site.cart', [
            'content'   => $content,
        ]);
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect()
                    ->route('cart');
    }
}
