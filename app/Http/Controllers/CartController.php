<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        return view('cart.cart');
    }

    public function add($id, $quantity){
        Cart::update($id, $quantity);
        session()->flash('success_message','Zawartość koszyka została zaktualizowana!');
        return response('success');
    }

    public function submit()
    {
        if(Cart::instance('default')->count()<=0) {
                
            return view('cart.cart');
        }
        else{
        return view('cart.summary');
        }
    }

    public function store(Request $request)
    {
        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Product');
        
        $popularity=\App\Product::where('id', $request->id)->increment('popularity');
        return redirect()->back()->with('success_message','Produkt został dodany do koszyka!');
    }

    public function paysuccess()
    {
        if(! session()->has('success')){
            return redirect('/');
        }
        echo "<script>setTimeout(function(){ window.location.href = 'http://127.0.0.1:8000'; }, 4000);</script>";
        return view('cart.success');
    }

    public function destroy($id)
    {
        if(Cart::instance('default')->count()<=0) {
                
            return view('cart.cart');
        }
        else{
        Cart::remove($id);
        return back()->with('success_message','Usunięto produkt z koszyka!');
        }
    }
}
