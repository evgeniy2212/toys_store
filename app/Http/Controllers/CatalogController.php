<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function showProductsCatalog()
    {
        $products = Product::all();
        return view('site.catalog',[
            'products'  => $products,
        ]);
    }

    /**
     * Show products by sort
     */
    public function sort(Request $request)
    {
        $data = $request->all();
        $products = new Product();
        if ($data['price']=='Big') {
            $products = $products->getOrderByProducts('asc');
        } else {
            $products = $products->getOrderByProducts('desc');
        }
        return view('site.catalog',[
            'products'  => $products,
        ]);
    }

    /**
     * show products for the categories
     */
    public function show($name)
    {
        $products = new Product();

        $products = $products->getWhereCategory($name);

        return view('site.catalog', [
            'products' => $products,
        ]);
    }
}
