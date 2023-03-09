@include('webviews/header')
<!--====  End of Address and Map  ====-->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Account Information</h2>
			</div>
			<div class="col-12 col-sm-12" style="margin: 0 auto;">
				<form action="">
					<div class="row">
						<p class="p-fo-si">Basic Information :</p>						
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" value="{{Auth::user()->full_name}}" placeholder="Full Name" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="email" value="{{Auth::user()->email}}" placeholder="email" required>
						</div>
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" value="{{Auth::user()->mob_no}}" placeholder="Mobile Number" required>
						</div>

						<p class="p-fo-si">Home Address :</p>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Address" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Address 2" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="City" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Zip/Postal Code" required>
						</div>
					
						<!-- Submit Button -->
						<div class="col-12 text-center">
							<button class="btn btn-main-md sell-btn">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@include('webviews/footer')