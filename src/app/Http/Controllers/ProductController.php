<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Helpers\ProductHelper;

class ProductController extends Controller
{
    public function index() {
        $products = ProductHelper::getAllProducts();
        return view('admin.products.index', compact('products'));
    }

    public function add() {
        return view('admin.products.add');
    }

    public function addProduct(Request $request) {
        $productCode = $request->input('productCode');
        $productDescription = $request->input('productDescription');
        $price = $request->input('price');
        ProductHelper::addProduct($productCode, $productDescription, $price);

        return redirect()->route('admin.products.index')->with('success', 'Product ' . $request->input('product_name') . ' added');
    }
}
