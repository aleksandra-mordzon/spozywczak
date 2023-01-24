<?php

namespace App\Products;

use App\Products\ListProducts;
use App\Product;

class SaleProducts implements ListProducts
{
    public $name='Wyprzedaż';

    public function list($minPrice,$maxPrice, $order, $how, $q ){
        if(request()->category){

            $this->name=ucfirst(trans(request()->category));
            $productsQuery=Product::with('categories')->whereHas('categories', function ($query){
                $query->where('slug', request()->category);
            })->whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice]);
        }
        else
        {
            $productsQuery=Product::whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice]);
        }
        if($order!=NULL)
        {
            $productsQuery->orderBy($order,$how);
        }
        return $productsQuery->take(12)->get();
        
    }
}