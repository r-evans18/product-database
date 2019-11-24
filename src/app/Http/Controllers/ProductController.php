<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Helpers\ProductHelper;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

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
        // Checking route method
        if ($request->isMethod('post')) {
            $productDescription = $request->input('productDescription');
            $price = $request->input('price');
            $productBarcode = $request->input('productBarcode');
            ProductHelper::editProduct($productCode, $productDescription, $price, $productBarcode);
            return redirect()->route('admin.products.index')->with('success', 'Product has been edited');
        }
        $product = Product::where('product_code', $productCode)->first();
        return view('admin.products.edit', compact('product'));
    }

    public function addProduct(Request $request) {
        $productCode = $request->input('productCode');
        $productDescription = $request->input('productDescription');
        $price = $request->input('price');
        $productBarcode = $request->input('productBarcode');

        // Check if product code exists
        $checkProductCode = ProductHelper::checkProductCode($productCode);
        if ($checkProductCode == 0) {
            ProductHelper::addProduct($productCode, $productDescription, $price, $productBarcode);
            return redirect()->route('admin.products.index')->with('success', 'Product ' . $request->input('product_name') . ' added');
        } else {
            return redirect()->route('admin.products.index')->with('warning', 'Product is duplicated, please check exsiting product');
        }
    }

    public function deleteProduct($productCode) {
        ProductHelper::deleteProduct($productCode);
        return redirect()->back()->with('success', 'Product Deleted');
    }

    public function exportProducts() {
        return Excel::download(new ProductExport, 'products.csv');
    }

    public function searchProducts(Request $request) {
        $products = ProductHelper::searchProducts($request);
        return view('admin.products.index', compact('products'));
    }
}
