<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['id', 'name', 'articul', 'purchase_price',
        'selling_price', 'discount', 'category_id', 'short_description',
        'description', 'image', 'site'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getProductById ($id)
    {
        return DB::table('products')
                    ->where('id', $id)
                    ->get();
    }

    public function getAllProducts ()
    {
        return $products = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.id', 'products.name', 'articul', 'purchase_price',
                'selling_price', 'discount', 'category.cat_name', 'short_description',
                'description', 'image')
            ->get();
    }

    public function getOrderByProducts ($method)
    {
        return DB::table('products')->orderBy('selling_price', $method)
                                    ->get();
    }

    public function getWhereCategory($name)
    {
        return $products = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.id', 'products.name', 'articul', 'purchase_price',
                'selling_price', 'discount', 'category.cat_name', 'short_description',
                'description', 'image')
            ->where('cat_name',$name)
            ->get();
    }
}
