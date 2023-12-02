

@extends('admin.layout.structure')

@section('main_container')
        <!-- /. NAV SIDE  -->
        <script>
	$(document).ready(function() 
	{
		$('#table').DataTable();
	} );
</script>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Product</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product image</th>
                                            <th>Price</th>
                                            <th>Discount_price</th>
                                            <th>Description</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                         @if(!empty($data_products))
                                            @foreach($data_products as $d)
                                                
                                                <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->product_name}}</td>
                                                <td><img src="{{url('upload/product/'.$d->product_img)}}"width="50" height="50"></td>
                                                <td>{{$d->price}}</td>
                                                <td>{{$d->discount_price}}</td>    
                                                <td>{{$d->description}}</td>
    
                                                <td>
                                                <a href="{{url('/manage_prod/'. $d->id)}}" class="btn btn-danger">Delete</a>

												<a href="{{url('/editprod/'.$d->id)}}" class="btn btn-success">Edit</a>
    
                                              </td>
                                            </tr>
                                            @endforeach
                                         @else
                                            ?>
                                            <tr>
                                            <td> Data Not Found</td>
                                            </tr>
                                         @endif
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
               @endsection