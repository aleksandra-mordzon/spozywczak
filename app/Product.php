<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public $primarykey='id';
    public $timestamps=true;
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function opinion(){
        return $this->hasMany('App\Opinion', 'product_id');
    }
}
