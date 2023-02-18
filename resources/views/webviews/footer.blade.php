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
