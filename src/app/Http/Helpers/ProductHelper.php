<?php

namespace App\Http\Helpers;

use Illuminate\Http\Request;
use App\Product;

class ProductHelper
{

    public static function getAllProducts() {
        return Product::get();
    }
    
    public static function addProduct($productCode, $productDescription, $price) {
        Product::create([
            'product_code' => $productCode,
            'product_description' => $productDescription,
            'price' => $price,
        ]);
    }
}
