
@extends('website.layout.structure')

@section('main_container') 

@include('sweetalert::alert')

<main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h3 class="hero-title text-center mb-5">Reset pass</h3>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form action="{{url('/reset_pass')}}" method="post">
                                       @csrf
                                        <div class="form-floating mb-4 p-0">
                                        <input type="password" name="password"   class="form-control" placeholder="Enter password">
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="email">new password</label>
                                        </div>

                                        <div class="form-floating p-0">
                                            <input type="password" name="confirm_password"   class="form-control" placeholder="Enter confirm Password" >
                                            @error('confirm_password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="password">confirm password</label>
                                        </div>

                                        <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Submit
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
        