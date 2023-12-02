@extends('website.layout.structure')

@section('main_container')
<!-- @php
echo"helo hi";exit;
@php -->
            

           

           

            <section class="featured-product section-padding ">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12 text-center">
                            <h3 class="mb-4">Manage profile</h3>
                        </div>

                        <div class="col-12 text-center">
                            <div class="product-thumb">
                                
                                    <img src="{{url('upload/customer/'.$data->file)}}" width="200px" height="200px" alt="">
                                         
										 <div class="product-title mb-0">
                                        
                                        <h5 >
                                           Name:{{$data->name}}<br>
										   Email:{{$data->email}}
											
                                        </h5>
										</div>
										<p>Gender :{{$data->gender}}</p>
										<p>Language :{{$data->lag}}</p>
										<p>Phone :{{$data->phone}}</p>

                            </div>
                        </div>
                            <div class="col-12 text-center">
                            <a href="{{url('profile/'.$data->id)}}" class="btn btn-primary">Edit profile</a>
                        </div>

                    </div>
                </div>
            </section>

        </main>
        @endsection

        