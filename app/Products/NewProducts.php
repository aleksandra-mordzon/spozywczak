<?php

namespace App\Products;

use App\Products\ListProducts;
use App\Product;

class NewProducts implements ListProducts
{
    public $name='Nowości';

    public function list($minPrice,$maxPrice, $order, $how, $q ){
        $productsQuery=Product::whereBetween('price', [$minPrice, $maxPrice])->orderBy('created_at','desc');
        
        if(request()->category){
            $this->name=ucfirst(request()->category);
            $productsQuery->with('categories')->whereHas('categories', function ($query){$query->where('slug', request()->category);});   
        }

            $products=$productsQuery->take(12)->get();
            return $products;
    }
}