<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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
        $data=array(
            'productsNew'=>$productsNew,
            'productsPopular'=>$productsPopular,
            'productsSale'=>$productsSale
        );
        return view('index')->with($data);
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
        $data=array(
            'product'=>$product,
            'randomproducts'=>$randomproducts
        );
        return view('show')->with($data);
    }

    public function list(Request $request, $list)
    {
        
        

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
            $products=Product::whereBetween('price', [$minPrice, $maxPrice])->orderBy('created_at','desc')->take(12)->get();
            $categories=DB::select('SELECT DISTINCT category FROM products order by category asc ');
            $name='Nowości';
            
        }
        elseif($list=='sale')
        {
            if($order!=NULL)
            {
                $products=Product::whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice])->orderBy($order,$how)->take(12)->get();

            }
            else{
                $products=Product::whereNotNull('newprice')->whereBetween('price', [$minPrice, $maxPrice])->take(12)->get();
            }
            $categories=DB::select('SELECT DISTINCT category FROM products order by category asc ');
            $name='Wyprzedaż';
            
        }

        elseif($list=='groceries')
        {
            if($order!=NULL)
            {
                $products=Product::where('isgrocery',1)->whereBetween('price', [$minPrice, $maxPrice])->orderBy($order,$how)->simplePaginate(12);

            }
            else
            {
                $products=Product::where('isgrocery',1)->whereBetween('price', [$minPrice, $maxPrice])->simplePaginate(12);

            }
            $products->appends(request()->query());
            $categories=DB::select('SELECT DISTINCT category FROM products order by category asc ');
            $name='Produkty spożywcze';
            
        }
        elseif($list=='hygiene_products')
        {
            $products=Product::where('isgrocery',0)->whereBetween('price', [$minPrice, $maxPrice])->simplePaginate(12);
            $categories=DB::select('SELECT DISTINCT category FROM products order by category asc ');
            $products->appends(request()->input())->links();
            $name='Produkty higieniczne';
            
        }
        
        $data=array(
            'products'=>$products,
            'categories'=>$categories,
            'name'=>$name,
            'minPrice'=>$minPrice,
            'maxPrice'=>$maxPrice
        );
        return view('products')->with($data);
        
    }


    public function search(Request $request)
    {
        $minPrice=$request->get('minPrice');
        $maxPrice=$request->get('maxPrice');
        $q=$request->get('q');
        if($minPrice==NULL)
        {
            $minPrice=0;
        }
        if($maxPrice==NULL)
        {
            $maxPrice=100;
        }
        $products=Product::whereBetween('price', [$minPrice, $maxPrice])->where('title','LIKE','%'.$q.'%')->simplePaginate(2)->setPath('');
       
        $products->appends([ 'q' => $q])->render();
        $categories=DB::select('SELECT DISTINCT category FROM products order by category asc ');

        $data=array(
            'products'=>$products,
            'categories'=>$categories,
            'name'=>'Wyniki wyszukiwania'
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
