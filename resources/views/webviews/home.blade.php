@include('webviews/header')
<section class="section gradient-banner">
    <div class="shapes-container">
        <div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
        <div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
        <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
        <div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
        <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
        <div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
        <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1 text-center text-md-left">
                <h1 class="text-white font-weight-bold mb-4">Welcome To The Scene</h1>
                <p class="text-white mb-5">
                    The Scene is an entertainment promotion company that operates as a for-profit charity organization that has formed a community of members to promote the live music shows and other events that The Scene puts on and donates to charity from each event's total revenue to good causes. This is done by the community members posting event-links (e-Links) for ticket sales to the events on their social media handles and all over the internet. The Scene pays a commission to its community members for each sale made from the e-Links they post.
                </p>
                <p class="text-white mb-5"></p>
                <a href="FAQ.html" class="btn btn-main-md" style="background: #000000;">Book Tickets</i></a>
            </div>
            <div class="col-md-6 text-center order-1 order-md-2">
                <img class="img-fluid" src="{{asset('assets-front/images/banner-img.jpg')}}" alt="screenshot">
            </div>
        </div>
    </div>
</section>
<section class="section pt-0 position-relative pull-top">
    <div class="container">
        <div class="rounded shadow p-5 bg-white">
            <div class="row">
                <div class="center-head">
                    <h4>EVENTS</h4>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 mt-5 mt-md-0 text-center">

                    <p class="mt-4 text-capitalize h5 ">Texas<br />

                        McKinney<br />
                        Music Concert<br />
                        4-Dec-2022
                    </p>

                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-md-0 text-center">
                    <p class="mt-4 text-capitalize h5 ">Texas<br />

                        McKinney<br />
                        Music Concert<br />
                        4-Dec-2022
                    </p>

                </div>
                <div class="col-lg-3 col-md-12 mt-5 mt-lg-0 text-center">
                    <p class="mt-4 text-capitalize h5 ">Texas<br />

                        McKinney<br />
                        Music Concert<br />
                        4-Dec-2022
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==================================
=            Feature Grid            =
===================================-->
<section class="feature section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ml-auto justify-content-center">
                <!-- Feature Mockup -->
                <div class="image-content" data-aos="fade-right">
                    <img class="img-fluid" src="{{ asset('assets-front/images/member.jpg') }}" alt="seminar">
                </div>
            </div>
            <div class="col-lg-6 mr-auto align-self-center">
                <div class="feature-content">
                    <!-- Feature Title -->
                    <h2>New Member</a></h2>
                    <!-- Feature Description -->
                    <p class="desc">
                        We want you! Join the fun of making easy money, helping good causes and getting to go to shows that are always packed because of your effort. That sounds like a win, win, win, and lots of more wins proposition to us. Join today and promote alongside the best professional promoters of live music events ever. The Scene thinks that the community could even achieve the almost impossible level in business of being professional at being a professional. It doesn't get any more serious than that. Right?
                    </p>
                </div>
                <!-- Testimonial Quote -->

                <a href="sign-up" class="btn btn-main-md">Continue</a>

                <p style="font-size: 13px; margin-top: 10px;">
                    I want to make $5 per <br />ticket “Sold”.
                </p>

            </div>
        </div>
    </div>
</section>

<section class="feature section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ml-auto align-self-center">
                <div class="feature-content">
                    <!-- Feature Title -->
                    <h2>Login </h2>
                    <form action="login" method="post">
                        @csrf
                        <!-- Name -->
                        <div class="mb-2">
                            <input class="form-control-2 main" type="email" name="username" placeholder="Email" required>
                        </div>
                        <!-- Email -->
                        <div class=" mb-2">
                            <input class="form-control-2 main" type="password" name="password" placeholder="password"
                                required>
                        </div>
                        <div class="submit-btn">
                            <button class="btn btn-main-md" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- Testimonial Quote -->

            </div>
            <div class="col-lg-6 mr-auto justify-content-center">
                <!-- Feature mockup -->
                <div class="image-content" data-aos="fade-left">
                    <img class="img-fluid" src="{{ asset('assets-front/images/login.jpeg') }}" alt="concert">
                </div>
            </div>
        </div>
    </div>
</section>
<!--====  End of Feature Grid  ====-->

<section class="service section bg-gray">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>List of Popular Events</h2>
                    <p>Go and grab your tickets soon.s</p>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 align-self-center">
                <!-- Feature Image -->
                <div class="service-thumb left" data-aos="fade-right">
                    <img class="img-fluid" src="{{ asset('assets-front/images/big-img.jpg') }}" alt="iphone-ipad">
                </div>
            </div>
            <div class="col-lg-5 mr-auto align-self-center">
                <div class="service-box">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xs-12">
                            <!-- Service 01 -->
                            <div class="service-item">
                                <!-- Icon -->
                                <i class="ti-location-pin"></i>
                                <!-- Heading -->
                                <h3>New York</h3>
                                <!-- Description -->
                                <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet
                                    quam id dui</p>
                                <p class="event-time"><i class="ti-timer"></i>5PM - 7PM</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- Service 01 -->
                            <div class="service-item">
                                <!-- Icon -->
                                <i class="ti-location-pin"></i>
                                <!-- Heading -->
                                <h3>Las Vegas</h3>
                                <!-- Description -->
                                <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet
                                    quam id dui</p>
                                <p class="event-time"><i class="ti-timer"></i>5PM - 7PM</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- Service 01 -->
                            <div class="service-item">
                                <!-- Icon -->
                                <i class="ti-location-pin"></i>
                                <!-- Heading -->
                                <h3>Columbus</h3>
                                <!-- Description -->
                                <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet
                                    quam id dui</p>
                                <p class="event-time"><i class="ti-timer"></i>5PM - 7PM</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- Service 01 -->
                            <div class="service-item">
                                <!-- Icon -->
                                <i class="ti-location-pin"></i>
                                <!-- Heading -->
                                <h3>California</h3>
                                <!-- Description -->
                                <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet
                                    quam id dui</p>
                                <p class="event-time"><i class="ti-timer"></i>5PM - 7PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('webviews/footer')
