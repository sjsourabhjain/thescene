<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>{{ $event->event_title }}</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content={{ $event->event_title }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="The Scene">
    <meta name="generator" content="The Scene Ticket Bokking Plateform">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="{{ asset('assets-front/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/plugins/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/plugins/aos/aos.css') }}">
    <link href="{{ asset('assets-front/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">



    {{-- Css For Carousal --}}
    <link rel="stylesheet" href="{{ asset('assets-front/css-car/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/css-car/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets-front/css-car/style-car.css') }}">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('assets-front/css/style.css') }}" rel="stylesheet">
</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


    <nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('assets-front/images/logo.png') }}"
                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link">Home

                        </a>

                    </li>

                    <li class="nav-item @@about">
                        <a class="nav-link" href="/about-us">About</a>
                    </li>
                    <li class="nav-item @@about">
                        <a class="nav-link" href="/events">Events</a>
                    </li>

                    <li class="nav-item @@about">
                        <a class="nav-link" href="create-event.html">Create an event</a>
                    </li>
                    <li class="nav-item @@contact">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    @if (Session('user'))
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" style="text-transform: lowercase;" href="#"
                                data-toggle="dropdown"><i class="ti-user"></i>{{ Session('user')->email }}
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
    <section class="section blog-single" style="padding: 0px;">
        <div class="feature-image">
            <img class="img-fluid" src="{{ asset('storage/' . $event->event_poster_img) }}" alt="feature-image">
        </div>

    </section>
    <section class="section event-single" style="padding: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <!-- Single Post -->
                    <article class="single-post">

                        <!-- Post body -->
                        <div class="post-body">
                            <!-- Feature Image -->

                            <div class="reserve">
                                <p>Free</p>
                                <a class="btn popup-btn btn-main-md" href="#">Reserve a spot</a>
                                <div class="popup-wrap">
                                    <div class="popup-box">
                                        <div class="left-box">
                                            <h2>Music Event 2022</h2>
                                            <p>Tuesday, Nov 29, 2022, 5:00 PM IST</p>

                                            <table>
                                                <tr>
                                                    <th>General Admission
                                                        <p>Free</p>

                                                        <p>Sales end on Nov 28, 2022</p>
                                                    </th>
                                                    <th style="text-align: right;">
                                                        <form action="/action_page.php">
                                                            <select name="numbers" id="numbers">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                        </form>

                                                    </th>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>
                                            <p class="power">Powered by The Scene</p>

                                            <div class="register-btn">
                                                <a class="btn popup-btn btn-main-md" href="#">Register</a>
                                            </div>
                                        </div>



                                        <div class="right-box">
                                            <img src="images/event/img-a.png">
                                            <h5>Order Summary</h5>

                                            <table>
                                                <tr>
                                                    <th>1 x Music Event 2022</th>
                                                    <th style="text-align: right;">
                                                        $0.00
                                                    </th>
                                                <tr>
                                                    <td>Total</td>
                                                    <td style="text-align: right;">$0.00</td>

                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>


                                        </div>

                                        <div class="left-box">
                                            <h2>Checkout</h2>
                                            <p>Time Left 18:29</p>


                                            <h2 style="text-align: left;">Contact Information</h2>
                                            <p style="text-align: left;">Logged in as meenaljain1112@gmail.com. <a
                                                    href="#"> Not you?</a></p>

                                            <form class="register-form" action="#">
                                                <!-- Username -->
                                                <input class="form-control main adjust" type="text"
                                                    placeholder="First Name*" required>

                                                <!-- Email -->
                                                <input class="form-control main" type="email"
                                                    placeholder="Last Name*" required>

                                                <!-- Password -->
                                                <div class="password-container le-up-adj">
                                                    <input class="form-control main" style="width:100%;"
                                                        type="email" placeholder="Email Address*" required>
                                                    <i class="ti-pencil" id="eye"></i>
                                                </div>
                                            </form>
                                            <div class="term-list">
                                                <ul id="ulLanguageFilter" class="category-filters">
                                                    <li><label class="tn-checkbox-container"><input type="checkbox"
                                                                name="language_filter" value="HINDI"> <span
                                                                class="tn-checkbox"></span> <span
                                                                class="tn-label">Keep me
                                                                updated on more events and news from this event
                                                                organizer.</span></label></li>
                                                    <li><label class="tn-checkbox-container"><input type="checkbox"
                                                                name="language_filter" value="ENGLISH"> <span
                                                                class="tn-checkbox"></span> <span
                                                                class="tn-label">Send me
                                                                emails about the best events happening nearby or
                                                                online.</span></label></li>
                                                    <li><label class="tn-checkbox-container"><input type="checkbox"
                                                                name="language_filter" value="ENGLISH"> <span
                                                                class="tn-checkbox"></span> <span class="tn-label">I
                                                                accept
                                                                the <a href="#">Terms & Conditions</a> and <a
                                                                    href="#">Privacy Policy</a>.
                                                                (Required)</span></label></li>

                                                </ul>
                                            </div>

                                            <p class="power">Powered by The Scene</p>

                                            <div class="register-btn">
                                                <a class="btn popup-btn btn-main-md" href="#">Register</a>
                                            </div>
                                        </div>

                                        <div class="right-box">
                                            <img src="images/event/img-a.png">
                                            <h5>Order Summary</h5>

                                            <table>
                                                <tr>
                                                    <th>1 x Music Event 2022</th>
                                                    <th style="text-align: right;">
                                                        $0.00
                                                    </th>

                                                <tr>
                                                    <th>Delivery<br />
                                                        1 x eTicket</th>
                                                    <th style="text-align: right;">
                                                        $0.00
                                                    </th>
                                                <tr>
                                                    <td>Total</td>
                                                    <td style="text-align: right;">$0.00</td>

                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>


                                        </div>

                                        <div class="left-box thank">

                                            <p>Thanks for your order! #5224412</p>
                                            <p>YOU'RE GOING TO</p>
                                            <h2>Music Event 2022</h2>
                                            <table>
                                                <tr>
                                                    <th>
                                                        <p><strong>1 TICKET SENT TO</strong></p>
                                                        <p>meenaljain1112@gmail.com</p>
                                                        <p><a href="#">Send to another email address</a></p>
                                                    </th>
                                                    <th style="text-align: right;">
                                                        <p><strong>DATE</strong></p>
                                                        <p>November 28 · 11am -<br /> November 29 · 5pm IST</p>

                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <p><strong>Location</strong></p>
                                                        <p>New York, USA</p>

                                                    </th>
                                                    <th style="text-align: right;">


                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>
                                            <p class="power">Powered by The Scene</p>

                                            <div class="register-btn view-btn">
                                                <a class="btn popup-btn btn-main-md" href="#">View Tickets</a>
                                            </div>

                                            <div class="so-me-ic-po">
                                                <ul class="social-icon list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="https://www.facebook.com/themefisher"><i
                                                                class="ti-facebook"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="https://twitter.com/themefisher"><i
                                                                class="ti-twitter"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="https://www.instagram.com/themefisher/"><i
                                                                class="ti-instagram"></i></a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <a class="close-btn popup-close" href="#">x</a>
                                    </div>
                                </div>
                            </div>



                            <h1>{{ $event->event_title }}</h1>
                            <p>Music Event 2022</p>


                            <!-- Paragrapgh -->

                            <h5 class="ab-head">When and where</h5>

                            <ul class="ab-list">
                                <li class="ab-list-he"><i class="ti-calendar"></i>Date & Time<br />
                                    <p>{{ date('D, M d, Y, H:i a', strtotime($event->event_start_at)) }}
                                        –<br />{{ date('D, M d, Y, H:i a', strtotime($event->event_end_at)) }}</p>
                                </li>
                                <li><i class="ti-location-pin"></i>Location<br />
                                    <p>{{ $event->event_location }}<br />{{ $event->event_city }}</p>
                                </li>
                            </ul>

                            <h5 class="ab-head">About this event</h5>

                            <ul class="ab-list">
                                <li><i class="ti-timer"></i>1 day 6 hours</li>
                                <li><i class="ti-mobile"></i>Mobile eTicket</li>
                            </ul>
                            <p>{{ $event->event_description }}</p>

                            <h5 class="ab-head">When to join ?</h5>
                            <p>{{ date('D, M d, Y, H:i a', strtotime($event->event_start_at)) }}</p>

                            <h5 class="ab-head">E-links :</h5>
                            <p class="elink-col"><a href="{{ url()->current() }}">{{ url()->current() }}</a>
                            </p>

                            <h5 class="ab-head">Share with friends <i class="ti-sharethis"
                                    style="font-size: 15px; padding-left: 10px;"></i></h5>
                            <ul class="social-icon list-inline">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/themefisher"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/themefisher"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/themefisher/"><i class="ti-instagram"></i></a>
                                </li>
                            </ul>
                        </div>




                    </article>

                    <section class="ftco-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <h5 class="ab-head mb-5">Tickets for Resell</h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="featured-carousel owl-carousel">
                                        <div class="item">
                                            <div class="work">
                                                <div class="img d-flex align-items-end justify-content-center"
                                                    style="background-image: url({{ asset('assets-front/images/work-1.jpg') }});">
                                                    <div class="text w-100">
                                                        <span class="cat">Music Event</span>
                                                        <p>12 Tickets available</p>
                                                        <p>29 Dec, 2022 - 11:00 AM</p>
                                                        <p>New York</p>
                                                        <button class="buy"><a href="ticket-detail.html">Buy
                                                                Now</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="work">
                                                <div class="img d-flex align-items-end justify-content-center"
                                                    style="background-image: url({{ asset('assets-front/images/work-2.jpg') }});">
                                                    <div class="text w-100">
                                                        <span class="cat">Comedy Show</span>
                                                        <p>9 Tickets available</p>
                                                        <p>31 Dec, 2022 - 5:00 PM</p>
                                                        <p>California</p>
                                                        <button class="buy"><a href="ticket-detail.html">Buy
                                                                Now</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="work">
                                                <div class="img d-flex align-items-end justify-content-center"
                                                    style="background-image: url({{ asset('assets-front/images/work-3.jpg') }});">
                                                    <div class="text w-100">
                                                        <span class="cat">Live Theatre</span>
                                                        <p>15 Tickets available</p>
                                                        <p>31 Dec, 2022 - 5:00 PM</p>
                                                        <p>San francisco</p>
                                                        <button class="buy"><a href="ticket-detail.html">Buy
                                                                Now</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="work">
                                                <div class="img d-flex align-items-end justify-content-center"
                                                    style="background-image: url({{ asset('assets-front/images/work-4.jpg') }});">
                                                    <div class="text w-100">
                                                        <span class="cat">Game Show</span>
                                                        <p>6 Tickets available</p>
                                                        <p>18 Jan, 2023 - 1:00 PM</p>
                                                        <p>New York</p>
                                                        <button class="buy"><a href="ticket-detail.html">Buy
                                                                Now</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="work">
                                                <div class="img d-flex align-items-end justify-content-center"
                                                    style="background-image: url({{ asset('assets-front/images/work-5.jpg') }});">
                                                    <div class="text w-100">
                                                        <span class="cat">Dance Show</span>
                                                        <p>10 Tickets available</p>
                                                        <p>14 Feb, 2023 - 6:00 PM</p>
                                                        <p>California</p>
                                                        <button class="buy"><a href="ticket-detail.html">Buy
                                                                Now</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>




                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 m-md-auto align-self-center">
                        <div class="block">

                            <!-- Social Site Icons -->
                            <ul class="social-icon list-inline">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/themefisher"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/themefisher"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/themefisher/"><i class="ti-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12 mt-5 mt-lg-0">
                        <div class="block-2">
                            <!-- heading -->

                            <!-- links -->
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="/about-us">About</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="/terms-conditions">Terms & Conditions</a></li>
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center bg-dark py-4">
            <small class="text-secondary">Copyright &copy;The Scene 2022. Designed &amp; Developed by <a
                    href="https://cosmostaker.com/">Cosmostaker</a></small class="text-secondary">
        </div>
    </footer>


    <!-- To Top -->
    <div class="scroll-top-to">
        <i class="ti-angle-up"></i>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('assets-front/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-front/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-front/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets-front/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets-front/plugins/syotimer/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets-front/plugins/aos/aos.js') }}"></script>
    <!-- validation -->

    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="{{ asset('assets-front/plugins/google-map/gmap.js') }}"></script>

    <script src="{{ asset('assets-front/js/script.js') }}"></script>

    <script src="{{ asset('assets-front/js/popper.js') }}"></script>
    <script src="{{ asset('assets-front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-front/js/main.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('.popup-btn').click(function(e) {
                $('.popup-wrap').fadeIn(500);
                $('.popup-box').removeClass('transform-out').addClass('transform-in');
                e.preventDefault();
            });

            $('.popup-close').click(function(e) {
                $('.popup-wrap').fadeOut(500);
                $('.popup-box').removeClass('transform-in').addClass('transform-out');

                e.preventDefault();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 6000
            })
        });
    </script>
    <script>
        $(".fa-eye").click(function() {
            $(this).toggleClass('fa-eye-slash');
            var input = $(this).closest('div.password-container').find('input');
            var type = $(input).attr('type');
            if (type == 'password') {
                $(input).attr('type', 'text');
            } else {
                $(input).attr('type', 'password');
            }
        })
    </script>

</body>

</html>
