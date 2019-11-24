@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3><a class="back-link tip" title="Go Back" href="{{route('admin.products.index')}}"><i
                class="fa fa-arrow-circle-left fa-fw"></i></a>&nbsp;&nbsp;Add New Product</h3>
        <hr />
        <p></p>
        <div class="card">
            <div class="card-header">
                Product Details
            </div>
            <div class="card-body">
                <form action="{{route('admin.products.addProduct')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productCode">Product Code</label>
                                <input type="text" name="productCode" class="form-control" placeholder="Product name..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">£</span>
                                  </div>
                                  <input type="decimal" class="form-control" name="price" placeholder="0.00" required min="0" step="00.01">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productDescription">Product Description</label>
                                <textarea type="text" rows="3" name="productDescription" class="form-control" placeholder="Product description..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="Product Image">Product Image</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input type="productImage" class="custom-file-input">
                                <label class="custom-file-label">Product Image, choose file</label>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productBarcode">Product Barcode</label>
                                <input type="text" name="productBarcode" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
