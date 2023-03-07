@include('webviews/header')
<section class="faq section pt-0">
<div class="container">
<div class="row">
	<div class="col-lg-10 m-auto">
		<div class="block shadow">
			<!-- Getting Started -->
			<form class="cr-ev" action="{{route('store-event')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="faq-item">
					<!-- Title -->
					<div class="faq-item-title">
						<h2>Basic Info</h2>
					</div> 
					<input class="form-control main" type="text" placeholder="Event Title*" required name="event_name">
					<select name="type" id="events-cr">
						<option value="0">Type</option>
						@foreach($event_type as $type)							 
					    <option value="{{$type->id}}">{{$type->event_type}}</option>
					    @endforeach
					</select>
					<select name="category_id" id="events-cr">
						<option value="0">Category</option>							 
				    	@foreach($categories as $category)							 
					    <option value="{{$category->id}}">{{$category->category_name}}</option>
					    @endforeach
				  	</select>
					<div class="faq-item">
						<div class="faq-item-title">
							<h2>Location</h2>
							<p>Help people in the area discover your event and let attendees know where to show up.</p>
							<input class="form-control main" type="text" placeholder="Search for a venue or address*" name="location" required>
						</div>
					</div>
					<div class="faq-item">
						<div class="faq-item-title">
							<h2>General Ticket Details</h2>
							<p>Help people in the area discover your event and let attendees know where to show up.</p>
							<input class="form-control main" type="text" placeholder="General Seat" required name="general_seat">
							<input class="form-control main" type="text" placeholder="General Seat Price" required name="general_seat_price"> 
						</div>
					</div>
					<div class="faq-item">
						<div class="faq-item-title">
							<h2>VIP Ticket Details</h2>
							<p>Help people in the area discover your event and let attendees know where to show up.</p>
							<input class="form-control main" type="text" placeholder="VIP Seat" required name="vip_seat">
							<input class="form-control main" type="text" placeholder="VIP Seat Price" required name="vip_seat_price"> 
						</div>
					</div>
				</div>
				<div class="faq-item">
					<div class="faq-item-title">
					<h2>Date & Time</h2>
					<p>Tell event-goers when your event starts and ends so they can make plans to attend.</p>
				</div>
				<select name="events_date_time">
					<option value="single">Single Event</option>
					<option value="recurring">Recurring Event</option>
				</select>
				<div class="categr">
					<div class="input-group">
						<label>Start Date & Time</label>
						<input id="txtDate" type="datetime-local" class="form-control date-input" placeholder="Start Date" name="start_datetime" />
					</div>
					<div class="input-group">
						<label>End Date & Time</label>
					    <input id="txtDate" type="datetime-local" class="form-control date-input" name="end_datetime" />
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
				<input type="file" name="image">
				<!-- <div class="upl-image">
				  <div class="inner-sec">	
					<i class="fa fa-upload" aria-hidden="true"></i>
					<p>Upload event poster</p>
				  </div>
				</div> -->
			</div>
				<input type="submit" name="save" class="btn btn-main-md" value="Save Event">
			</div>
		</div>
	</div>
</div>
</form>
</section>
@include('webviews/footer')