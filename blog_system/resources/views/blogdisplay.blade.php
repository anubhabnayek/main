<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>Bootstrap Snipp for Datatable</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <tr>
                   <th><input type="checkbox" id="checkall" /></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                    </tr>
                   </thead>
                    <tbody>
    
                    @foreach($data as $d)
    
                    <tr>
                    <td><input type="checkbox" class="checkthis" /></td>
                    <td>{{$d->id}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->description}}</td>
                    

                    <td><img src="{{url('upload/blog/'.$d->file)}}" width="100px" height="100px"></td>
           
           
                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="{{url('/editblog/'.$d->id)}}" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="{{url('/blogdisplay/'.$d->id)}}"class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                    </tr>
                  
                    </tbody>
          @endforeach
         </table>
         <div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            
        
        </div>
            <!-- /.modal-content --> 
          </div>
              <!-- /.modal-dialog --> 
            </div>
        
        
        
        
                
    
 
    
    

    
   
    
   
    
   