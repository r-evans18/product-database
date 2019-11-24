@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('admin.products.add')}}" class="float-right btn btn-primary">Add Product</a>
        <a href="{{route('admin.products.exportProducts')}}" class="float-right btn btn-primary" style="margin-right: 8px;">Export Products</a>
        <h3>Master Stock</h3>
        <hr />
        <p></p>

        @if (sizeof($products) == null)
            There are no products to display.
        @else
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->product_description}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{route('admin.products.editProduct', ['productCode' => $product->product_code])}}">Edit</a>
                                <a href="{{route('admin.products.deleteProduct', ['productCode' => $product->product_code])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        @endif
    </div>
</div>

@endsection
