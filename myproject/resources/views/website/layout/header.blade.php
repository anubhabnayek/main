<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="{{url('website/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('website/css/bootstrap-icons.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{url('website/css/slick.css')}}"/>

        <link href="{{url('website/css/tooplate-little-fashion.css')}}" rel="stylesheet">
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
	@include('sweetalert::alert')

    
    <body>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index">
                        <strong><span>Little</span> Fashion</strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="sign-in" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail" class="bi-bag custom-icon"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="/">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="about">Story</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="products">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq">FAQ</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact">Contact</a>
                            </li> 
                        </ul>

                        <div class="d-none d-lg-block">
						@if(session()->has('userid'))
                            <a href="profile" class="bi bi-person-circle me-3"></a>
						hi....{{session('name')}}
						    <a href="userlogout" class="bi bi-box-arrow-left me-3"></a>
							@else
                            <a href="signin" class=" bi bi-box-arrow-in-right me-3"></a>
                           <!-- <a href="product-detail" class="bi-bag custom-icon"></a>-->
						   
                            @endif
                        </div>
                    </div>
                </div>
            </nav>