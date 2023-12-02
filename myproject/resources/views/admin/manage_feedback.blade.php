

@extends('admin.layout.structure')

@section('main_container')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Feedback</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Feedback
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @if(!empty($data_contacts))
                                        @foreach($data_contacts as $d)
                                            
                                        
                                        <tr>
                                        <td>{{ $d->id}}</td>
                                        <td>{{ $d->name}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{ $d->comment}}</td>


                                        <td><button type="button" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-success">Edit</button>
                                        <a href="{{url('/manage_feedback/'.$d->id)}}" class="btn btn-danger">Delete</a>

                                      </td>
                                    </tr>
									@endforeach
                                   @else
                                        ?>
                                       <tr>
                                        <td>DATA NOT FOUND</td>
                                       </tr>
                                   @endif   
                                        
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                     <!-- End  Kitchen Sink -->
             @endsection