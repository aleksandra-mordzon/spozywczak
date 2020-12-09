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
        $productsPopular=Product::orderBy('popularity','desc')->take(8)->get();
        $productsSale=DB::select('SELECT * FROM products WHERE newprice IS NOT NULL');
        
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

    protected $minPrice, $maxPrice, $name, $order, $how;
    
    public function list(Request $request, $list)
    {
        
        $categories=Category::all();
        $this->minPrice=$request->get('minPrice');
        $this->maxPrice=$request->get('maxPrice');
        $this->order='price';
        $this->how='desc';
        $filter=$request->filters;
        
        switch($filter){
            case '1': $this->how='asc';
                break;
            case '3': $this->order='created_at';
                break;
            case '4': $this->order='popularity';
                break;
        }

        $this->minPrice= ($this->minPrice)? $this->minPrice : 0;
        $this->maxPrice= ($this->maxPrice)? $this->maxPrice : 100;
        
        if($list=='new')
        {
            $this->name='Nowości';
            $products=$this->listNew();
        }
        elseif($list=='sale')
        {
            $this->name='Wyprzedaż';
            $products=$this->listSale();
            
        }
        elseif($list=='groceries')
        {
            $this->name='Produkty spożywcze';
            $products=$this->listGroceries();
        }
        elseif($list=='search')
        {
            $this->name='Wyniki wyszukiwania';
            
            $q=$request->get('q');
            $products=$this->listSearch($q);
        }
        

        $data=array(
            'products'=>$products,
            'categories'=>$categories,
            'name'=>$this->name,
            'minPrice'=>$this->minPrice,
            'maxPrice'=>$this->maxPrice,
            'list'=>$list
        );
        return view('products')->with($data); 
    }

    public function listNew()
    {
        
        $productsQuery=Product::whereBetween('price', [$this->minPrice, $this->maxPrice])->orderBy('created_at','desc');
        
        if(request()->category){
            $this->name=ucfirst(request()->category);
            $productsQuery->with('categories')->whereHas('categories', function ($query){$query->where('slug', request()->category);});   
        }

            $products=$productsQuery->take(12)->get();
            return $products;
    }

    public function listSale()
    {
        if(request()->category){

            $this->name=ucfirst(trans(request()->category));
            $productsQuery=Product::with('categories')->whereHas('categories', function ($query){
                $query->where('slug', request()->category);
            })->whereNotNull('newprice')->whereBetween('price', [$this->minPrice, $this->maxPrice]);
        }
        else
        {
            $productsQuery=Product::whereNotNull('newprice')->whereBetween('price', [$this->minPrice, $this->maxPrice]);
        }
        if($this->order!=NULL)
        {
            $productsQuery->orderBy($this->order,$this->how);
        }
        $products=$productsQuery->take(12)->get();
        return $products;
    }

    public function listGroceries(){
        
        if(request()->category){
            $this->name=ucfirst(trans(request()->category));
            $productsQuery=Product::with('categories')->whereHas('categories', function ($query){
                $query->where('isgrocery',1)->where('slug', request()->category);
            })->whereBetween('price', [$this->minPrice, $this->maxPrice]);
        }
        else
        {
            $productsQuery=Product::with('categories')->whereHas('categories', function ($query){
                $query->where('isgrocery',1);
            })->whereBetween('price', [$this->minPrice, $this->maxPrice]);
        }
        if($this->order!=NULL)
        {
            $productsQuery->orderBy($this->order,$this->how);
        }
        $products=$productsQuery->simplePaginate(12);  
        $products->appends(request()->query());
        return $products;
    }

    public function listSearch($q){
        
            if(request()->category){
                $productsQuery=Product::whereHas('categories', function ($query){
                    $query->where('slug', request()->category);
                })->whereBetween('price', [$this->minPrice, $this->maxPrice])->where('title','LIKE','%'.$q.'%');
               
            }
            else{
                $productsQuery=Product::whereBetween('price', [$this->minPrice, $this->maxPrice])->where('title','LIKE','%'.$q.'%');
                
            }
            if($this->order!=NULL)
            {
                $productsQuery->orderBy($this->order,$this->how);
            }
            $products=$productsQuery->simplePaginate(12)->setPath('');
            $products->appends([ 'q' => $q])->render();
            return $products;
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
