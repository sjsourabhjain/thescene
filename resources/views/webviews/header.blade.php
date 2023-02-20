<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>The Scene</title>
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bootstrap App Landing Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Small Apps Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site_logo.png') }}" />

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="{{asset('assets-front/plugins/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-front/plugins/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets-front/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets-front/plugins/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets-front/plugins/fancybox/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-front/plugins/aos/aos.css')}}">
    <link href="{{asset('assets-front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    

    {{-- Css For Carousal --}}
    <link rel="stylesheet" href="{{asset('assets-front/css-car/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-front/css-car/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('assets-front/css-car/style-car.css')}}">

    <!-- CUSTOM CSS -->
    <link href="{{asset('assets-front/css/style.css')}}" rel="stylesheet">
</head>
<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">
  

    <nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
        <div class="container">
            <a class="navbar-brand" href="{{url('')}}"><img src="{{asset('assets-front/images/logo.png')}}" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link">Home</a>
                    </li>

                    <li class="nav-item @@about">
                        <a class="nav-link" href="/about-us">About</a>
                    </li>
                    <li class="nav-item @@about">
                        <a class="nav-link" href="/events">Events</a>
                    </li>

                    <li class="nav-item @@about">
                        <a class="nav-link" href="/create-event">Create an event</a>
                    </li>
                    <li class="nav-item @@contact">
                        <a class="nav-link" href="/contact-us">Contact</a>
                    </li>
                @if (Session('user'))
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" style="text-transform: lowercase;" href="#"
                            data-toggle="dropdown"><i class="ti-user"></i>{{Session('user')->email}}
                            <span><i class="ti-angle-down"></i></span>
                        </a>
                        <!-- Dropdown list -->
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item " href="/account-setting">Account Setting</a></li>
                            <li><a class="dropdown-item" href="logout">Logout</a></li>

                        </ul>
                    </li>
                @endif
                    
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="col-12 text-right">
                            <button class="btn btn-main-md"><a href="sell-ticket.html">Sell Ticket</a></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
