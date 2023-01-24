<?php

namespace App\Products;

use App\Products\ListProducts;
use App\Product;

class SearchProducts implements ListProducts
{
    public $name='Wyniki wyszukiwania';

    public function list($minPrice,$maxPrice, $order, $how, $q ){
        if(request()->category){
            $productsQuery=Product::whereHas('categories', function ($query){
                $query->where('slug', request()->category);
            })->whereBetween('price', [$minPrice, $maxPrice])->where('title','LIKE','%'.$q.'%');
           
        }
        else{
            $productsQuery=Product::whereBetween('price', [$minPrice, $maxPrice])->where('title','LIKE','%'.$q.'%');
            
        }
        if($order!=NULL)
        {
            $productsQuery->orderBy($order,$how);
        }
        $products=$productsQuery->simplePaginate(12)->setPath('');
        $products->appends([ 'q' => $q])->render();
        return $products;
        
    }
}