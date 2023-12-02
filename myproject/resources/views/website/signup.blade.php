@extends('website.layout.structure')

@section('main_container')
    @include('sweetalert::alert')
        <main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h3 class="hero-title text-center mb-5">Sign Up</h3>

                           
                            </div>

                            <div class="div-separator w-50 m-auto my-4"><span>or</span></div>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form action="{{url('/signup')}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
									<label for="name">Name:</label>
                                            <input type="text" name="name" id=""  class="form-control" placeholder="Enter full name" value="{{old('name')}}" ><br>
                                           @error('name')
                                           <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                           </div>

                                        <div class="form-group">
										 <label for="email">Email address:</label>

                                            <input type="email" name="email"  class="form-control" placeholder=" Enter Email address" value="{{old('email')}}"><br>
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="form-group">
										   <label for="password">Password:</label>

                                            <input type="password" name="password"  class="form-control" placeholder="Password" value="{{old('password')}}" ><br>
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                            
                                        </div>
										 <div class="form-group">
										  <label for="phone">Phone:</label>

                                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="{{old('phone')}}" ><br>
                                            @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                        </div>
										 <div class="form-group">
										  <label for="phone">Gender:</label>

                                            Male<input type="radio" name="gender" value="male" >
                                             Female:<input type="radio" name="gender" value="female">
											   Others:<input type="radio" name="gender" value="others">
                                               @error('gender')
                                               <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                               <br><br>

                                        </div>
										
										<div class="form-group">
										  <label for="language">Language:</label>
                                                   Bengali<input type="checkbox" name="lag[]" value="bengali">
												   English<input type="checkbox" name="lag[]" value="English">
												   Hindi<input type="checkbox" name="lag[]" value="Hindi"><br><br>
                                                   @error('lag')
                                                   <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                        </div>

                                        
												  
										   <div class="form-group">
											  <label for="phone">country:</label>
												 <select name="cid" class="form-control">
												 
												 <option value="">-----Select Country-----</option>
												 @if(!empty($country))
													 @foreach($country as $c)
												 <option value="{{$c->id}}">{{$c->cnm}}</option>
												 @endforeach
												 @endif

											 </select>
                                             @error('cid')
                                             <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                        </div>
										 <div class="form-group">
										  <label for="image">Image:</label>

                                        <input type="file" name="file" class="form-control" placeholder=""><br>
                                            @error('file')
                                            <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                        </div>

                                        

                                        <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Create account
                                        </button>

                                        <p class="text-center">Already have an account? Please <a href="signin">Sign In</a></p>

                                    </form>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>

        @endsection