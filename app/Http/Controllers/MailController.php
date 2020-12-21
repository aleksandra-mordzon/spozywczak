<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Mail\DeleteMail;

class MailController extends Controller
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId=$userId;
    }

    public function sendOrderMail($orderId){
        
        
        $user=\App\User::find($this->userId);
        $email=$user->email;
        
        $order=\App\ProductCart::find($orderId);
        $products=$order->products;
        $subprice=$order->subtotal_price;
        $price=$order->total_price;
        $data=[
            'orderId'=>$orderId,
            'products'=>$products,
            'subprice'=>$subprice,
            'price'=>$price

        ];
        
        Mail::to($email)->send(new OrderMail($data));
    }

    public function sendDeleteUserMail()
    {
        $user=\App\User::find($this->userId);
        $email=$user->email;
        Mail::to($email)->send(new DeleteMail($email));
    }

}
