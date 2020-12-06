<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsNew=Product::orderBy('created_at','desc')->take(8)->get();
        //return view('index')->with('productsNew', $productsNew);

        $productsPopular=Product::orderBy('popularity','desc')->take(8)->get();

        $productsSale=DB::select('SELECT * FROM products WHERE newprice IS NOT NULL');
        /*
        $data=array(
            'productsNew'=>$productsNew,
            'productsPopular'=>$productsPopular,
            'productsSale'=>$productsSale
        );
        */
        $arr=array(
            array("Wyprzedaż", "#CD5C5C;", $productsSale, ""),
            array("Nowe produkty", "#30ab51;", $productsNew, "glide__green"),
            array("Najpopularniejsze produkty", "#4091a3;", $productsPopular, "glide__blue")
        );
        $ar=$arr;
        return view('index')->with("ar",$ar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $product=Product::where('slug', $slug)->firstOrFail();
        $randomproducts=Product::inRandomOrder()->take(8)->get();
        $category=$product->categories;
        $id=$product->id;
        $opinions=\App\Opinion::where('product_id',$id)->get();
        $rating=\App\Opinion::where('product_id',$id)->avg('rating');
        $data=array(
            'product'=>$product,
            'randomproducts'=>$randomproducts,
            'category'=>$category,
            'opinions'=>$opinions,
            'rating'=>$rating
        );
        return view('show')->with($data);
    }

    public function list(Request $request, $list)
    {
        
        $categories=Category::all();
        $minPrice=$request->get('minPrice');
        $maxPrice=$request->get('maxPrice');
        $order=NULL;
        $how=NULL;
        $filter=$request->filters;
        if($filter=='1'){
            $order='price';
            $how='asc';
        }
        else{
            $how='desc';
            if($filter=='2'){
                $order='price'; 
            }
            elseif($filter=='3'){
                $order='created_at'; 
            }
            elseif($filter=='4'){
                $order='popularity'; 
            }
        }


        if($minPrice==NULL)
        {
            $minPrice=0;
        }
        if($maxPrice==NULL)
        {
            $maxPrice=100;
        }


        if($list=='new')
        {
            if(request()->category){
                $name=ucfirst(trans(request()->category));
                $products=Product::whereBetween('price', [$minPrice, $maxPrice])->orderBy('created_at','desc')->with('categories')->whereHas('categories', function ($query){
                    $query->where('slug', request()->category);
                })->take(12)->get();
                
            }
            else
            {
                $products=Product::whereBetween('price', [$minPrice, $maxPrice])->orderBy('created_at','desc')->take(12)->get();
                $name='Nowości';
            }
           
            
        }
        elseif($list=='sale')
        {
            if(request()->category){

                $name=ucfirst(trans(request()->category));
                if($order!=NULL)
                {
                    $products=Product::with('categories')->whereHas('categories', function ($query){
                        $query->where('slug', request()->category);
                    })->whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice])->orderBy($order,$how)->simplePaginate(12);
                }
                else{
                    $products=Product::with('categories')->whereHas('categories', function ($query){
                        $query->where('slug', request()->category);
                    })->whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice])->simplePaginate(12);
                }
                
            }
            else
            {
                if($order!=NULL)
                {
                    $products=Product::whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice])->orderBy($order,$how)->take(12)->get();

                }
                else{
                    $products=Product::whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice])->take(12)->get();
                }
                $name='Wyprzedaż';
            }
            
        }

        elseif($list=='groceries')
        {
            if(request()->category){
                $name=ucfirst(trans(request()->category));
                if($order!=NULL)
                {
                $products=Product::with('categories')->whereHas('categories', function ($query){
                    $query->where('isgrocery',1)->where('slug', request()->category);
                })->whereBetween('price', [$minPrice, $maxPrice])->orderBy($order,$how)->simplePaginate(12);
                }
                else{
                    $products=Product::with('categories')->whereHas('categories', function ($query){
                        $query->where('isgrocery',1)->where('slug', request()->category);
                    })->whereBetween('price', [$minPrice, $maxPrice])->simplePaginate(12);
                }
            }
            else
            {
                if($order!=NULL)
                {
                    $products=Product::with('categories')->whereHas('categories', function ($query){
                        $query->where('isgrocery',1);
                    })->whereBetween('price', [$minPrice, $maxPrice])->orderBy($order,$how)->simplePaginate(12);
    
                }
                else
                {
                    //where('isgrocery',1)->
                    $products=Product::with('categories')->whereHas('categories', function ($query){
                        $query->where('isgrocery',1);
                    })->whereBetween('price', [$minPrice, $maxPrice])->simplePaginate(12);
    
                }
                $name='Produkty spożywcze';

            }
            
            $products->appends(request()->query());
            
            
        }
        elseif($list=='search')
        {
            $q=$request->get('q');
            if(request()->category){
                if($order!=NULL)
                {
                    $products=Product::whereHas('categories', function ($query){
                        $query->where('slug', request()->category);
                    })->whereBetween('price', [$minPrice, $maxPrice])->where('title','LIKE','%'.$q.'%')->orderBy($order,$how)->simplePaginate(12)->setPath('');

                }
                else
                {
                    $products=Product::whereHas('categories', function ($query){
                        $query->where('slug', request()->category);
                    })->whereBetween('price', [$minPrice, $maxPrice])->where('title','LIKE','%'.$q.'%')->simplePaginate(12)->setPath('');

                }
            }
            else{
                if($order!=NULL)
                {
                    $products=Product::whereBetween('price', [$minPrice, $maxPrice])->where('title','LIKE','%'.$q.'%')->orderBy($order,$how)->simplePaginate(12)->setPath('');
    
                }
                else
                {
                    $products=Product::whereBetween('price', [$minPrice, $maxPrice])->where('title','LIKE','%'.$q.'%')->simplePaginate(12)->setPath('');
    
                }
            }
            
            $products->appends([ 'q' => $q])->render();
            $name='Wyniki wyszukiwania';

        }
        
        $data=array(
            'products'=>$products,
            'categories'=>$categories,
            'name'=>$name,
            'minPrice'=>$minPrice,
            'maxPrice'=>$maxPrice,
            'list'=>$list
        );
        return view('products')->with($data);
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
