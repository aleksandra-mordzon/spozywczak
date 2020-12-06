<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    public $primarykey='id';
    
    protected $table='cart_products';
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
