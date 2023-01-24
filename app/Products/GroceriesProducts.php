<?php

namespace App\Products;

use App\Products\ListProducts;
use App\Product;

class GroceriesProducts implements ListProducts
{
    public $name='Produkty spożywcze';

    public function list($minPrice,$maxPrice, $order, $how, $q ){
        if(request()->category){
            $this->name=ucfirst(trans(request()->category));
            $productsQuery=Product::with('categories')->whereHas('categories', function ($query){
                $query->where('isgrocery',1)->where('slug', request()->category);
            })->whereBetween('price', [$minPrice, $maxPrice]);
        }
        else
        {
            $productsQuery=Product::with('categories')->whereHas('categories', function ($query){
                $query->where('isgrocery',1);
            })->whereBetween('price', [$minPrice, $maxPrice]);
        }
        if($order!=NULL)
        {
            $productsQuery->orderBy($order,$how);
        }
        $products=$productsQuery->simplePaginate(12);  
        $products->appends(request()->query());
        return $products;
        
    }
}