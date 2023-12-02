
@extends('website.layout.structure')

@section('main_container') 

@include('sweetalert::alert')

<main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h3 class="hero-title text-center mb-5">Enter otp</h3>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form action="{{url('/otp_match')}}" method="post">
                                       @csrf
                                        <div class="form-floating mb-4 p-0">
                                        <input type="number" name="otp" id="email"   class="form-control" placeholder="Enter otp">
                                            <!--@error('otp')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror-->
                                            <label for="otp">OTP</label>
                                        </div>
                                    <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            submit
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
        