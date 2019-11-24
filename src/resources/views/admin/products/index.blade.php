@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('admin.products.add')}}" class="float-right btn btn-primary">Add Product</a>
        <h3>Master Stock</h3>
        <hr />
        <p></p>
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
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
