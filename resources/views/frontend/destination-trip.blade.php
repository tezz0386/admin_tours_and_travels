@extends('layouts.app')
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}}">Home</a></li>
					<li><a href="{{route('getPackages')}}">Booking</a></li>
					<li><a href="{{route('getSinglePackage', $package->slug)}}">{{$package->slug}}</a></li>
				</ul>
				<h2>{{$package->name}}</h2>
			</div>
		</div>
	</div>
</div>
<section id="trip-single" class="trip-single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="trip-details">
					<!-- Trip Gallery -->
					<div class="trip-gallery">
						<div class="gallery-slider owl-carousel owl-theme owl-loaded">
							<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3750px, 0px, 0px); transition: all 0s ease 0s; width: 5250px;"><div class="owl-item cloned" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('uploads/destination/thumbnail/'.$destination->image)}}" alt="#"></div></div><div class="owl-item cloned" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img3.jpg')}}" alt="#"></div></div><div class="owl-item" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img1.jpg')}}" alt="#"></div></div><div class="owl-item" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img2.jpg')}}" alt="#"></div></div><div class="owl-item animated owl-animated-out fadeOut" style="width: 750px; margin-right: 0px; left: 750px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img3.jpg')}}" alt="#"></div></div><div class="owl-item cloned animated owl-animated-in fadeIn active" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img1.jpg')}}" alt="#"></div></div><div class="owl-item cloned" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img2.jpg')}}" alt="#"></div></div></div>
							</div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></div><div class="owl-next" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></div></div><div class="owl-dots" style="display: none;"></div></div></div>
						</div>
						<!--/ End Trip Gallery -->
						<div class="trip-content">
							<div class="trip-head">
								<h2>{{$destination->name}}</h2>
								<h4>{{$package->name}}</h4>
								<p>From <span class="price">${{$package->start_from / $package->duration_nights}}.00</span><span> / Night</span></p>
							</div>
							<p>{{$destination->summary}}</p>
						</div>
						<div class="trip-tab">
							<div class="trip-tab-inner">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab8" role="tab">TRIP OVERVIEW</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab9" role="tab">Itinearary</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab10" role="tab">Pricing Plan</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab11" role="tab">Booking</a></li>
								</ul>
								<!--/ End Tab Nav -->
								<div class="tab-content" id="myTabContent">
									<!-- Tab Single -->
									<div class="tab-pane fade show active" id="t-tab8" role="tabpanel">
										<p>{!! $package->trip_overview !!}</p>
									</div>
									<!--/ End Tabn Single -->
									<!-- Tab Single -->
									<div class="tab-pane fade" id="t-tab9" role="tabpanel">
										<p>{!!$package->itinearary!!}</p>
									</div>
									<!--/ End Tabn Single -->
									<!-- Tab Single -->
									<div class="tab-pane fade" id="t-tab10" role="tabpanel">
										<p>{!!$package->pricing_plan!!}</p>
									</div>
									<!--/ End Tabn Single -->
									<!-- Tab Single -->
									<div class="tab-pane fade" id="t-tab11" role="tabpanel">
										<p>{!!$package->booking!!}</p>
									</div>
									<!--/ End Tabn Single -->
								</div>
							</div>
							<!--/ End Post Tab -->
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12">
					<!-- Trip Sidebar -->
					<div class="sidebar-main">
						<!-- Booking Form -->
						<div class="single-widget booking">
							<h2>Trip Booking</h2>
							<form class="form">
								<div class="form-group date">
									<h4>Arrival Date</h4>
									<input type="date" name="arrival" id="arrival" value="{{$arrival}}">
								</div>
								<div class="form-group date">
									<h4>Departure Date</h4>
									<input type="date" name="departure" id="departure" readonly="readonly" value="{{$departure}}">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<h4>Adults</h4>
											<select class="form-control" name="adults" id="adults">
												@for($i=0; $i<=10; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor
											</select>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<h4>Child</h4>
											<select class="form-control" name="childs" id="childs">
												@for($i=0; $i<=10; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- End Booking Form -->
						<!-- Trip list -->
						<div class="single-widget trip-details">
							<h2>Trip Detailes</h2>
							<div class="trip-list">
								<!-- single list -->
								<div class="single-list">
									<div class="left">Categories:</div>
									<div class="right">{{$package->category->name}}</div>
								</div>
								<!--/ End single list -->
								<!-- single list -->
								<div class="single-list">
									<div class="left">Duration:</div>
									<div class="right">{{$package->duration_days}} Days and {{$package->duration_nights}} Nights</div>
								</div>
								<!--/ End single list -->
								<!-- single list -->
								<div class="single-list">
									<div class="left">Charge:</div>
									<div class="right" id="charge"></div>
								</div>
								<!--/ End single list -->
								<!-- single list -->
								<div class="single-list">
									<div class="left">Difficulty:</div>
									<div class="right">{{$package->difficulty}}</div>
								</div>
								<!--/ End single list -->
								<!-- single list -->
								<div class="single-list">
									<div class="left">Departure:</div>
									<div class="right" id="departure_date">{{$departure}}</div>
								</div>
								<!--/ End single list -->
								<label><input type="checkbox" name="clear" id="agree"> Agree</label>
								<div class="form-group button">
									<form action="{{route('getPostBooking')}}" method="post">
										@csrf
										<input type="" name="package" id="formPackage" hidden="hidden" value="{{$package->id}}">
										<input type="" name="adults" id="formAdults" hidden="hidden">
										<input type="" name="childs" id="formChilds" hidden="hidden">
										<input type="" name="charge" id="formCharge" hidden="hidden">
										<input type="" name="arrival" id="formArrival" hidden="hidden">
										<input type="" name="departure" id="formDeparture" hidden="hidden">
										<input type="text" name="destination_id" id="formDestination" value="{{$destination->id}}" hidden="hidden">
										<button disabled id="book-trip" class="btn">Book Now</button>
									</form>
								</div>
							</div>
						</div>
						<div class="single-widget categories">
							<h2>Categories</h2>
							<ul>
								@if(isset($packageCategories) && count($packageCategories)>0)
								@foreach($packageCategories as $category)
								<li><a href="#">{{$category->name}}</a></li>
								@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
	@section('meta_keywords', $package->meta_keywords)
	@section('meta_description', $package->meta_tag)
	@section('title', $package->title_tag)
	@push('js')
	<script type="text/javascript">
		// $(document).ready(function(){
	//  $(document).on('keyup', '#search', function(){
	//       var query=$(this).val();
	//       fetch_data(query);
	//  });

	    function isPastDate(dateText) {
		// date is dd/mm/yyyy
        var inputDate = dateText.split("/");
        var today = new Date();
        today = inputDate[2]+'-'+inputDate[0]+'-'+inputDate[1];
        return today;
		}

		function getDeparture(dateText){
			var inputDate = dateText.split("/");
        	var today = new Date();
        	inputDate = new Date(inputDate[2], inputDate[1] - 1, inputDate[0], 0, 0, 0, 0);
        	today = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 0, 0, 0, 0);
        	var dateString = today;
           	let dateObj = new Date(dateString);
           	return dateObj.toDateString();
		}


	$(document).ready(function(){
	// $(document).on('click', '#booking-button', function(e){
	// 	e.preventDefault();
	// 	alert();
	// });
	// var date1='';
	// var date2='';
	// var today = new Date();
	// var dd = String(today.getDate()).padStart(2, '0');
	// var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	// var yyyy = today.getFullYear();

	// today = yyyy + '-' + mm + '-' + dd;

 		// var 
	    function fetch_data(data1='')
	      {
		      	$.ajax({
			      		 url:"{{route('getBookingCalculation')}}",
			      		 method:'get',
			      		 data:{
			      		 	arrival:data1.arrival,
			      		 	departure:data1.departure,
			      		 	adults:data1.adults,
			      		 	childs:data1.childs,
			      		 	package:"{{$package->id}}",
			      		 },
			      		 dataType:'json',
			      		 success:function(data)
			      		 {
			      		 	$('#charge').text('$ '+data.charge)
				      		 console.log(data.charge);
				      		 console.log(data.adults);
				      		 console.log(data.childs);
				      		$('#formAdults').val(data.adults);
				      		$('#formChilds').val(data.childs);
				      		$('#formArrival').val(data.arrival);
				      		$('#formDeparture').val(data.departure);
				      		$('#formCharge').val(data.charge);
			      		 },
			      		 error: function(e) {
	               console.log(e.responseText);
	              }
		      	});
	      }

	    $(document).on('change', '#arrival', function(){
			var arrival = $(this).val();
			$.ajax({
			      		 url:"{{route('getDate')}}",
			      		 method:'get',
			      		 data:{
			      		 	arrival:arrival,
			      		 	package:"{{$package->id}}",
			      		 },
			      		 dataType:'json',
			      		success:function(data)
			      		 {
			      		 	$('#departure').val(data.departure);
			      		 	var departure_text = getDeparture(data.departure);
			      		 	$('#departure_date').text(departure_text);
				      		 console.log(data.arrival);
				      		 console.log(data.departure);
			      		 },
			      		error: function(e) {
	                      console.log(e.responseText);
	                    }
		    });

	    });
	    // $(document).on('change', '#departure', function(){
	    // 	var date = getDeparture($(this).val());
	    // 	$('#departure_date').text(date);
	    // });
	    $(document).on('change', '#adults', function(){
	    	var data1={};
	    	var arrival = $('#arrival').val();
	    	var departure = $('#departure').val();
	    	var adults = $(this).val();
	    	var childs = $('#childs').val();
	    	data1['arrival']=arrival;
	    	data1['departure']=departure;
	    	data1['adults']=adults;
	    	data1['childs']=childs;
	    	// console.log(data1);
	    	fetch_data(data1);
	    });
	    $(document).on('change', '#childs', function(){
	    	var data1={};
	    	var arrival = $('#arrival').val();
	    	var departure = $('#departure').val();
	    	var adults = $('#adults').val();
	    	var childs = $(this).val();
	    	data1['arrival']=arrival;
	    	data1['departure']=departure;
	    	data1['adults']=adults;
	    	data1['childs']=childs;
	    	// console.log(data1);
	    	fetch_data(data1);

	    });

	    $('#agree').on('click', function(){
	    	var data1={};
	    	var arrival = $('#arrival').val();
	    	var departure = $('#departure').val();
	    	var adults = $('#adults').val();
	    	var childs = $('#childs').val();
	    	data1['arrival']=arrival;
	    	data1['departure']=departure;
	    	data1['adults']=adults;
	    	data1['childs']=childs;
	    	// console.log(data1);
	    	fetch_data(data1);
	    	$('#book-trip').removeAttr('disabled');
	    });
	});
	</script>
	@endpush