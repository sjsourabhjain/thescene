@include('webviews/header')
<!--====  End of Address and Map  ====-->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Sell Your Ticket</h2>
			</div>
			<div class="col-12 col-sm-12" style="margin: 0 auto;">
				<form action="">
					<div class="row">
						<p class="p-fo-si">Ticket Details :</p>
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Event Name" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<!--<p class="p-fo-si">Email address to whome you sell ticket</p>-->
							<input class="form-control main" type="email" placeholder="Event Date & Time" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Ticket Order Id" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Event Location" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<select name="Type" id="tick-type">
	<option value="0">Ticket Category</option>							 
    <option value="1">General Admission</option>
    <option value="2">VIP</option>
  </select>
						</div>
						
						<div class="col-md-6 mb-2 upl-adj">
							<i class="fa fa-upload" aria-hidden="true"></i>
							<input class="form-control main upl" type="text" placeholder="Upload an image" required>
						</div>
						
						<div class="col-md-6 mb-2 upl-adj">
							<i class="fa fa-dollar" aria-hidden="true"></i>
							<input class="form-control main upl" type="text" placeholder="Price" required>
						</div>
						
						<p class="p-fo-si">Personal Details :</p>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Full Name" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Email" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Contact no." required>
						</div>
						
						<p class="p-fo-si">Bank Details :</p>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Account Holder Name" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Name of Bank" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Account Number" required>
						</div>
						
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="SWIFT CODE" required>
						</div>
						<!-- Submit Button -->
						<div class="col-12 text-center">
							<button class="btn btn-main-md sell-btn">Sell Ticket</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@include('webviews/footer')