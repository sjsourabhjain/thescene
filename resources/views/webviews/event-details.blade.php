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
                    <article class="single-post">
                        <div class="post-body">
                            <div class="reserve">
                                <p>Free</p>
                                <a class="btn popup-btn btn-main-md" href="/ticket-booking/{{ $event->slug }}">Reserve a spot</a>
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
@include('webviews/footer')
<script>
$(document).ready(function() {
    $('.carousel').carousel({
        interval: 6000
    })
});
</script>