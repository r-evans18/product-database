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

    public function editProduct(Request $request, $productCode) {
        if ($request->isMethod('post')) {
            $productDescription = $request->input('productDescription');
            $price = $request->input('price');
            ProductHelper::editProduct($productCode, $productDescription, $price);
            return redirect()->route('admin.products.index')->with('success', 'Product has been edited');
        }
        $product = Product::where('product_code', $productCode)->first();
        return view('admin.products.edit', compact('product'));
    }

    public function addProduct(Request $request) {
        $productCode = $request->input('productCode');
        $productDescription = $request->input('productDescription');
        $price = $request->input('price');
        ProductHelper::addProduct($productCode, $productDescription, $price);

        return redirect()->route('admin.products.index')->with('success', 'Product ' . $request->input('product_name') . ' added');
    }

    public function deleteProduct($productCode) {
        ProductHelper::deleteProduct($productCode);
        return redirect()->back()->with('success', 'Product Deleted');
    }
}
