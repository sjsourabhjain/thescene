@include('webviews/header')
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 style="font-weight: 600;" class="mb-5 text-center">Ticket Details</h2>
			</div>
		</div>
	</div>
</section>
<section class="faq section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 m-auto">
				<div class="block shadow">
					<!-- Getting Started -->
					<div class="faq-item">
						<!-- Title -->
						<div class="faq-item-title">
							<h2>
								Ticket Details
							</h2>
						</div>
						<!-- Get Started Accordion -->
						<div id="gstAccordion" data-children=".item">
						  <!-- Accordion Item 01 -->
						  <div class="item">
							  <img class="img-fluid ticket-img" src="images/big-img.jpg">
							  <ul>
								  <li><strong> Event Name : </strong>
							     Music Event</li>
								  <li><strong>Event's Date & Time :</strong>
							     29 Dec, 11:00 AM</li>
								  <li><strong>Order Id :</strong>
							     #548623</li>
								  <li><strong>Event Location :</strong>
							     New York, USA</li>
								  <li><strong>Ticket category :</strong>
							     VIP</li>
								  <li><strong>Price :</strong>
							     $500</li>
							  </ul>
						  </div>
						</div>
					</div>
					<!-- Account Accordion -->
					<div class="faq-item">
						<!-- Title -->
						<div class="faq-item-title">
							<h2>
								Personal Details:
							</h2>
						</div>
						<!-- Account Accordion -->
						<div id="accountAccordion" data-children=".item">
						  <!-- Accordion Item 01 -->
						  <div class="item">
						  	<ul>
								  <li><strong> Full Name : </strong>
							     John Carter</li>
								  <li><strong>Email :</strong>
							     johncarter256@yahoo.com</li>
								  <li><strong>Contact no. :</strong>
							     +31 256 235 25</li>
							  </ul>
						  </div>
						</div>
					</div>
					<!-- Pricing & License Accordion -->
					<div class="faq-item">
						<!-- Title -->
						<div class="faq-item-title">
							<h2>
								Bank Details :
							</h2>
						</div>
						<!-- Account Accordion -->
						<div id="plAccordion" data-children=".item">
						  <!-- Accordion Item 01 -->
						  <div class="item">
						  	<ul>
								  <li><strong> Account Holder Name : </strong>
							     John Carter</li>
								  <li><strong>Bank Name :</strong>
							     Axis Bank</li>
								  <li><strong>Account no. :</strong>
							     1256634895</li>
								  <li><strong>SWIFT CODE :</strong>
							     11DFGH15GH</li>
							  </ul>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of FAQ Section  ====-->
@include('webviews/footer')