@include('webviews/header')
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
                            </div>
                            <h1>{{ $event->title }}</h1>
                            <p>{{$event->category_id}}</p>
                            <h5 class="ab-head">When and where</h5>
                            <ul class="ab-list">
                                <li class="ab-list-he"><i class="ti-calendar"></i>Date & Time<br />
                                    <p>{{ date('D, M d, Y, H:i a', strtotime($event->start_datetime)) }}
                                        –<br />{{ date('D, M d, Y, H:i a', strtotime($event->end_datetime)) }}</p>
                                </li>
                                <li><i class="ti-location-pin"></i>Location
                                    <p>{{ $event->location }}</p>
                                </li>
                            </ul>
                            <h5 class="ab-head">About this event</h5>
                            <ul class="ab-list">
                                <li><i class="ti-timer"></i>1 day 6 hours</li>
                                <li><i class="ti-mobile"></i>Mobile eTicket</li>
                            </ul>
                            <h5 class="ab-head">When to join ?</h5>
                            <p>{{ date('D, M d, Y, H:i a', strtotime($event->start_datetime)) }}</p>
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
<div class="popup-wrap">
    <div class="popup-box">
        <div class="left-box">
            <h2>{{$event->title}}</h2>
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
@include('webviews/footer')
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 6000
            })
        });
    </script>
