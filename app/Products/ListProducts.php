<?php

namespace App\Products;

interface ListProducts{
    public function list($minPrice,$maxPrice, $order, $how, $q );
}