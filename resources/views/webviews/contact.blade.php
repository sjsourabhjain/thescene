@include('webviews/header')
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Contact Us</h1>
			</div>
		</div>
	</div>
</section>
<section class="address">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 align-self-center">
				<div class="block">
					<div class="address-block text-center mb-5">
						<div class="icon">
							<i class="ti-mobile"></i>
						</div>
						<div class="details">
							<h3>(00) 789 456 7890 (USA)</h3>
							<h3>(88) 016 725 0455 (UK)</h3>
						</div>
					</div>
					<div class="address-block text-center">
						<div class="icon">
							<i class="ti-map-alt"></i>
						</div>
						<div class="details">
							<h3>36. St Michael’s St, Oxford OX1, UK</h3>
							<h3>123, Pennsylvania, USA</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7 mt-5 mt-lg-0">
				<div class="google-map">
					<!-- Google Map -->
					
					<div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=36.%20St%20Michael%E2%80%99s%20St,%20Oxford%20OX1,%20UK%20123,%20Pennsylvania,%20USA+(The%20Scene)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">area maps</a></iframe></div>
					
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of Address and Map  ====-->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Drop us a mail</h2>
			</div>
			<div class="col-12">
				<form action="{{route('contact-us')}}" method="POST">
					@csrf
					<div class="row">
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" name="name" placeholder="Name" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="email" name="email" placeholder="Your Email Address" required>
						</div>
						<!-- subject -->
						<div class="col-md-12 mb-2">
							<input class="form-control main" type="text" name="subject" placeholder="Subject" required>
						</div>
						<!-- Message -->
						<div class="col-md-12 mb-2">
							<textarea class="form-control main" name="message" rows="10" placeholder="Your Message"></textarea>
						</div>
						<!-- Submit Button -->
						<div class="col-12 text-right">
							<input type="submit" name="submit" class="btn btn-main-md" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@include('webviews/footer')