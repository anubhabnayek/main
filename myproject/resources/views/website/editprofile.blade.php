@extends('website.layout.structure')

@section('main_container')
    @include('sweetalert::alert')
        <main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h3 class="hero-title text-center mb-5">Edit profile</h3>

                           
                            </div>

                            <div class="div-separator w-50 m-auto my-4"><span>or</span></div>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form action="{{url('/profile/'.$data->id)}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
									<label for="name">Name:</label>
                                            <input type="text" name="name" value="{{$data->name}}"  class="form-control" placeholder="Enter full name" required><br>

                                        </div>

                                        <div class="form-group">
										  <label for="email">Email address:</label>

                                            <input type="email" name="email" value="{{$data->email}}"  class="form-control" placeholder=" Enter Email address" required><br>

                                        </div>
										
										 <div class="form-group">
										  <label for="phone">Phone:</label>

                                            <input type="text" name="phone" value="{{$data->phone}}"" class="form-control" placeholder="Enter phone number" required><br>

                                        </div>
										 <div class="form-group">
										  <label for="phone">Gender:</label>

                                            Male<input type="radio" name="gender" value="male"<?php if($data->gender=="male"){echo "checked";}?>>
                                             Female:<input type="radio" name="gender" value="female" <?php if($data->gender=="female"){echo "checked";}?>>
											   Others:<input type="radio" name="gender" value="others"<?php if($data->gender=="others"){echo "checked";}?>><br><br>

                                        </div>
										
										<div class="form-group">
										  <label for="language">Language:</label>
                                                   Bengali<input type="checkbox" name="lag[]" value="bengali"
												   <?php
												   $lag=$data->lag;
												   $lag_arr=explode(",",$lag);
												   if(in_array("bengali",$lag_arr)){
													   echo "checked";
												   }
												   
												   ?>>
												   English<input type="checkbox" name="lag[]" value="English"
												   <?php
												   $lag=$data->lag;
												   $lag_arr=explode(",",$lag);
												   if(in_array("English",$lag_arr)){
												   echo"checked";
												   
												   }
												   
												  ?>> 
												   Hindi<input type="checkbox" name="lag[]" value="Hindi"
												 <?php
												   $lag=$data->lag;
												   $lag_arr=explode(",",$lag);
												   if(in_array("Hindi",$lag_arr)){
												   echo"checked";
												   
												   }
												 
												 
												 ?>
												   
												   ><br><br>

                                        </div>

                                        
												  
										   <div class="form-group">
											  <label for="phone">country:</label>
												 <select name="cid" class="form-control">
												 
													<option value="">-----Select Country-----</option>
												@if(!empty($country))
													@foreach($country as $c)
														 @if($c->id==$data->cid)
														<option value="{{$c->id}}" selected>{{$c->cnm}}</option>
														@else
														 <option value="{{$c->id}}">{{$c->cnm}}</option>
														@endif
													@endforeach
												 @endif

											 </select>

                                        </div>
										 <div class="form-group">
										  <label for="image">Image:</label>

                                            <input type="file" name="file" class="form-control" placeholder="" ss><br>
                                             <img src="{{url('upload/customer/'.$data->file)}}" width="70px" height="70px">
                                        </div>

                                        

                                        <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">
                                           Save
                                        </button>

                                        

                                    </form>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>

        @endsection