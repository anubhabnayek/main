
@extends('website.layout.structure')

@section('main_container') 

@include('sweetalert::alert')

<main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h3 class="hero-title text-center mb-5">Sign In</h3>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form action="{{url('/login_auth')}}" method="post">
                                       @csrf
                                        <div class="form-floating mb-4 p-0">
                                        <input type="email" name="email" id="email" value="{{old('email')}}" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address">
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="email">Email address</label>
                                        </div>

                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" placeholder="Password" >
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="password">Password</label>
                                        </div>

                                        <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Sign in
                                        </button>

                                        <p class="text-center">Don’t have an account? <a href="signup">Create One</a></p>
										 <p class="text-center"><a href="forgot">Forgat password</a></p>

                                    </form>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>
@endsection
        