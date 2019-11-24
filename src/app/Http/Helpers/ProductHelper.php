<?php

namespace App\Http\Helpers;

use Illuminate\Http\Request;
use App\Product;

class ProductHelper
{

    public static function getAllProducts() {
        return Product::paginate(15);
    }

    public static function checkProductCode($productCode) {
        return Product::where('product_code', $productCode)->count();
    }

    public static function addProduct($productCode, $productDescription, $price, $productBarcode) {
        Product::create([
            'product_code' => $productCode,
            'product_description' => $productDescription,
            'price' => $price,
            'barcode' => $productBarcode,
        ]);
    }

    public static function editProduct($productCode, $productDescription, $price, $productBarcode){
        Product::where('product_code', $productCode)->update([
            'product_description' => $productDescription,
            'price' => $price,
            'barcode' => $productBarcode,
        ]);
    }

    public static function deleteProduct($productCode) {
        Product::where('product_code', $productCode)->delete();
    }
}
