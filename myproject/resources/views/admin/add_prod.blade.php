@extends('admin.layout.structure')

@section('main_container')
@include('sweetalert::alert')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Product</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                        Add Product 
                        </div>
                        <div class="panel-body">
                            <form action="{{url('/add_prod')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                        <div class="form-group">
                                            <label>	products name</label>
                                            <input class="form-control" type="text" name="product_name">
                                            @error('product_name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>	Discount price</label>
                                            <input class="form-control" type="number" name="discount_price">
                                            @error('discount_price')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Main price</label>
                                            <input class="form-control" type="number" name="price">
                                            @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Product image</label>
                                            <input class="form-control" type="file" name="product_img">
                                            @error('product_img')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                 <div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" type="text" name="description">
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                            
                                  
                                 
                                        <button type="submit" name="submit" class="btn btn-info">Submit</button>

                                    </form>
                            </div>
                        </div>
                            </div>
                           </div>
@endsection