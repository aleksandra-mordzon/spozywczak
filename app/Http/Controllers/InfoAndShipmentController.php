<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Http\Controllers\MailController;

class InfoAndShipmentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Cart::instance('default')->count()<=0) {
                
            return view('cart.cart');
            }
        else
        {

            return view('cart.infoandshipment');
        }
        
        
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
    public function store(PaymentRequest $request)
    {
        $user_id=auth()->user()->id;
        $shipment=(double)$request->input('shipment')[0];
        
        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::subtotal()+$shipment,
                'currency' => 'PLN',
                'source' => $request->stripeToken,
                'description' => 'Order',
                //'receipt_email' => $request->email,
                'metadata' => [
                    //'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ],
            ]);
            $id=round(microtime(true) * 1000);
            $productcart=new \App\ProductCart;
            $productcart->id=$id;
            $productcart->user_id=$user_id;
            $productcart->products=rtrim($request->input('products'), ',');
            $productcart->subtotal_price=Cart::subtotal();
            $productcart->total_price=Cart::subtotal()+$shipment;
            $productcart->name=$request->input('name');
            $productcart->surname=$request->input('surname');
            $productcart->city=$request->input('city');
            $productcart->street=$request->input('street');
            $productcart->postal_address=$request->input('postal_address');
            $productcart->phone_number=$request->input('phone_number');
            $productcart->status='Opłacone';

            
        //$popularity=\App\Product::where('id',$opinions->product_id)->increment('popularity');
            if($shipment==8.99)
            {
                $productcart->ispaczkomat=true;
                $productcart->ispunkt=false;
                $productcart->paczkomat_name=$request->input('paczkomat_name');
                $productcart->paczkomat_address=$request->input('paczkomat_address');
                $productcart->paczkomat_address2=$request->input('paczkomat_address2');
            }
            elseif($shipment==9.99){
                $productcart->ispunkt=true;
                $productcart->ispaczkomat=false;
                $productcart->punkt_name=$request->input('punkt_name');
                $productcart->punkt_street=$request->input('punkt_street');
                $productcart->punkt_city=$request->input('punkt_city');
            }
            else{
                $productcart->ispaczkomat=false;
                $productcart->ispunkt=false;
            }
            $productcart->save();
            

            Cart::destroy();
            $mail= new MailController($user_id);
            $mail->sendOrderMail($id);
            return view('cart.success')->with('success','sukces');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
        
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
