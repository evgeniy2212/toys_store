<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = new Product();
        $category = [];
        foreach (Category::all() as $item) {
            $name = $item['cat_name'];
            $category[$name] = $name;
        }

        $products = $products->getAllProducts();

        return view('product.index', [
            'products'   => $products,
            'category'   => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = [];

        foreach (Category::all() as $item) {
            $name = $item['cat_name'];
            $id = $item['id'];
            $category[$id] = $name;
        }

        return view('product.create',[
                'category' => $category,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $file = $request->file('image');
        $data = $request->all();
        $file->move(public_path(). '/images', $file->getClientOriginalName());
        $path = 'images/'. $file->getClientOriginalName();
        $product->fill($data);
        $product->image = $path;
        $product->category_id = '1';
        $product->save();
        return redirect()
                    ->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = new Product();

        $product = $product->getProductById($id);
        return view('product.create',[
            'product'  => $product[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Sort product by category
     */
    public function sort(Request $request)
    {
        $products = new Product();
        $categoryName = $request->all()['category'];
        $products = $products->getAllProducts()->where('cat_name', $categoryName);
        $category = [];
        foreach (Category::all() as $item) {
            $name = $item['cat_name'];
            $category[$name] = $name;
        }
        return view('product.index', [
            'products'   => $products,
            'category'   => $category,
        ]);
    }
}
