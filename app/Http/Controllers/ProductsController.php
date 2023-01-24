<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Products\NewProducts;
use App\Products\SaleProducts;
use App\Products\GroceriesProducts;
use App\Products\SearchProducts;

class ProductsController extends Controller
{
    
    public function index()
    {
        $productsNew=Product::orderBy('created_at','desc')->take(8)->get();
        $productsPopular=Product::orderBy('popularity','desc')->take(8)->get();
        $productsSale=Product::whereNotNull('newprice')->get();
        
        $arr=array(
            array("Wyprzedaż", "#CD5C5C;", $productsSale, ""),
            array("Nowe produkty", "#30ab51;", $productsNew, "glide__green"),
            array("Najpopularniejsze produkty", "#4091a3;", $productsPopular, "glide__blue")
        );
        $ar=$arr;
        return view('index')->with("ar",$ar);
    }

   
    public function getStars($rating){
        $n = (strpos(strval($rating),'.')) ?  floor($rating) + 0.5 : $rating;
        if($n<=0)
        {
            $n=0;
        }
        return $n;
    }

    public function show($slug)
    {
        $product=Product::where('slug', $slug)->firstOrFail();
        $randomproducts=Product::inRandomOrder()->take(8)->get();
        $category=$product->categories;
        $id=$product->id;
        $opinions=\App\Opinion::where('product_id',$id)->get();
        $rating=\App\Opinion::where('product_id',$id)->avg('rating');

        
        $img=$this->getStars($rating);

        $data=array(
            'product'=>$product,
            'randomproducts'=>$randomproducts,
            'category'=>$category,
            'opinions'=>$opinions,
            'rating'=>$rating,
            'img'=>$img
        );
        return view('show')->with($data);
    }

    
    public function list(Request $request, $list)
    {
        
        $categories=Category::all();
        $minPrice=$request->get('minPrice');
        $maxPrice=$request->get('maxPrice');
        $order='price';
        $how='desc';
        $filter=$request->filters;
        $q=null;
        
        switch($filter){
            case '1': $how='asc';
                break;
            case '3': $order='created_at';
                break;
            case '4': $order='popularity';
                break;
        }

        $minPrice= ($minPrice)? $minPrice : 0;
        $maxPrice= ($maxPrice)? $maxPrice : 100;
        
        if($list=='new')
        {
            $products=new NewProducts();

        }
        elseif($list=='sale')
        {
            $products=new SaleProducts();
            
        }
        elseif($list=='groceries')
        {
            $products=new GroceriesProducts();
        }
        elseif($list=='search')
        {
            $q=$request->get('q');
            $products=new SearchProducts();
        }
        

        $data=array(
            'products'=>$products->list($minPrice,$maxPrice, $order, $how, $q),
            'categories'=>$categories,
            'name'=>$products->name,
            'minPrice'=>$minPrice,
            'maxPrice'=>$maxPrice,
            'list'=>$list
        );
        return view('products')->with($data); 
    }
    
   

}
