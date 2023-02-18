<!--====  End of Our Story  ====-->
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