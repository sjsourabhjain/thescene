@include('webviews/header')
<section class="faq section pt-0">
<div class="container">
<div class="row">
	<div class="col-lg-10 m-auto">
		<div class="block shadow">
			<!-- Getting Started -->
			<form class="cr-ev" action="{{route('store-event')}}" method="POST">
				@csrf
				<div class="faq-item">
					<!-- Title -->
					<div class="faq-item-title">
						<h2>Basic Info</h2>
						<p>Name your event and tell event-goers why they should come. Add details that highlight what makes it unique.</p>
					</div> 
					<input class="form-control main" type="text" placeholder="Event Title*" required name="event_name">
					<select name="Type" id="events-cr">
						<option value="0">Type</option>							 
					    <option value="1">Appearance</option>
					    <option value="2">Singing</option>
					    <option value="3">Seminar</option>
					    <option value="4">Concert</option>
						<option value="5">Conference</option>
						<option value="6">Convention</option>
						<option value="7">Meeting event</option>
						<option value="8">Social gathering</option>
						<option value="9">Rally</option>
						<option value="10">Tour</option>
					</select>
					<select name="category_id" id="events-cr">
						<option value="0">Category</option>							 
				    	<option value="1">Business</option>
				    	<option value="2">Charity</option>
				    	<option value="3">Community</option>
				    	<option value="4">Education</option>
						<option value="5">Fashion</option>
					  	<option value="6">Film</option>
					  	<option value="7">Food</option>
					  	<option value="8">Health & Wealth</option>
					  	<option value="9">Home & Lifestyle</option>
					  	<option value="10">Music</option>
				  	</select>
					<select name="Type" id="events-cr">
						<option value="0">Ticket Category</option>							 
						<option value="1">General Admission</option>
						<option value="2">VIP</option>
					</select>
					<input class="form-control main pr-ad" type="text" name="price" placeholder="$ Price" required>	
					<div class="faq-item">
						<div class="faq-item-title">
							<h2>Location</h2>
							<p>Help people in the area discover your event and let attendees know where to show up.</p>
							<input class="form-control main" type="text" placeholder="Search for a venue or address*" required>
						</div>
					</div>
				</div>
				<div class="faq-item">
					<div class="faq-item-title">
					<h2>Date & Time</h2>
					<p>Tell event-goers when your event starts and ends so they can make plans to attend.</p>
				</div>
				<div class="tab">
					<button class="tablinks2" onclick="openCity(event, 'America')">Single Event</button>
					<button class="tablinks2" onclick="openCity(event, 'Japan')">Recurring event</button>
				</div>
				<div id="America" class="tabcontent2">
					<div class="categr">
						<p>Single event happens once and can last multiple days</p>
						<div class="input-group">
						    <input id="txtDate" type="text" class="form-control date-input" readonly="readonly" />
						    <label class="input-group-btn" for="txtDate">
						        <span class="btn btn-default">
						            <span class="ti-calendar"></span>
						        </span>
						    </label>
						</div>
						<div class="input-group">
						    <input id="txtDate" type="text" class="form-control date-input" readonly="readonly" />
						    <label class="input-group-btn" for="txtDate">
						        <span class="btn btn-default">
						            <span class="ti-time"></span>
						        </span>
						    </label>
						</div>
						<div class="input-group">
						    <input id="txtDate" type="text" class="form-control date-input" readonly="readonly" />
						    <label class="input-group-btn" for="txtDate">
						        <span class="btn btn-default">
						            <span class="ti-calendar"></span>
						        </span>
						    </label>
						</div>
						<div class="input-group">
						    <input id="txtDate" type="text" class="form-control date-input" readonly="readonly" />
						    <label class="input-group-btn" for="txtDate">
						        <span class="btn btn-default">
						            <span class="ti-time"></span>
						        </span>
						    </label>
						</div>
						<div class="term-list">
							<ul id="ulLanguageFilter" class="category-filters">
								<li>
									<label class="tn-checkbox-container">
										<input type="checkbox" name="language_filter" value="HINDI"> <span class="tn-checkbox"></span> <span class="tn-label"><strong>Display start time.</strong><br/>
										The start time of your event will be displayed to attendees.</span></label>
								</li>
								<li>
									<label class="tn-checkbox-container"><input type="checkbox" name="language_filter" value="ENGLISH"> <span class="tn-checkbox"></span> <span class="tn-label"><strong>Display end time.</strong><br/>The end time of your event will be displayed to attendees.</span></label>
								</li>
			               	</ul>
						</div>
					</div>
				</div>
				<div id="Japan" class="tabcontent2">
					<div class="categr">
						<p>You’ll be able to set a schedule for your recurring event in the next step. Event details and ticket types will apply to all instances.</p>
					</div>
					<div class="term-list">
						<ul id="ulLanguageFilter" class="category-filters">
							<li>
								<label class="tn-checkbox-container"><input type="checkbox" name="language_filter" value="HINDI"> <span class="tn-checkbox"></span> <span class="tn-label"><strong>Display end time.</strong><br/>
								The end time of your event will be displayed to attendees.</span></label>
							</li>
			            </ul>
					</div>
				</div>
			</div>
			<div class="faq-item">
				<!-- Title -->
				<div class="faq-item-title">
					<h2>
						Upload an Image
					</h2>
					
				</div>
				
				<div class="upl-image">
				  <div class="inner-sec">	
					<i class="fa fa-upload" aria-hidden="true"></i>
					<p>Upload event poster</p>
				  </div>
				</div>
			</div>
				<input type="submit" name="save" class="btn btn-main-md" value="Save Event">
			</div>
		</div>
	</div>
</div>
</form>
</section>
@include('webviews/footer')