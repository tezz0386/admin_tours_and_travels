@extends('layouts.app')
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Package</a></li>
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
							<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3750px, 0px, 0px); transition: all 0s ease 0s; width: 5250px;"><div class="owl-item cloned" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('uploads/package/thumbnail/'.$package->thumbnail)}}" alt="#"></div></div><div class="owl-item cloned" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img3.jpg')}}" alt="#"></div></div><div class="owl-item" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img1.jpg')}}" alt="#"></div></div><div class="owl-item" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img2.jpg')}}" alt="#"></div></div><div class="owl-item animated owl-animated-out fadeOut" style="width: 750px; margin-right: 0px; left: 750px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img3.jpg')}}" alt="#"></div></div><div class="owl-item cloned animated owl-animated-in fadeIn active" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img1.jpg')}}" alt="#"></div></div><div class="owl-item cloned" style="width: 750px; margin-right: 0px;"><div class="single-slider"><img src="{{asset('frontend/images/gallery-img2.jpg')}}" alt="#"></div></div></div>
						</div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></div><div class="owl-next" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></div></div><div class="owl-dots" style="display: none;"></div></div></div>
						</div>
						<!--/ End Trip Gallery -->
						<div class="trip-content">
							<div class="trip-head">
								<h2>{{$package->name}}</h2>
								<p>From <span class="price">${{$package->start_from / $package->duration_nights}}.00</span><span> / Night</span></p>
							</div>
							<p>{{$package->summary}}</p>
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
									<input type="text" id="datepicker">
									<i class="fa fa-calendar"></i>
								</div>
								<div class="form-group date">
									<h4>Departure Date</h4>
									<input type="text" id="datepicker2">
									<i class="fa fa-calendar"></i>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<h4>Adults</h4>
											<div class="nice-select form-control wide" tabindex="0"><span class="current">02</span>
											<ul class="list">
												<li data-value="1" class="option selected">01</li>
												<li data-value="2" class="option">02</li>
												<li data-value="3" class="option">03</li>
												<li data-value="4" class="option">04</li>
												<li data-value="5" class="option">05</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<h4>Child</h4>
										<div class="nice-select form-control wide" tabindex="0"><span class="current">03</span>
										<ul class="list">
											<li data-value="1" class="option selected">01</li>
											<li data-value="2" class="option">02</li>
											<li data-value="3" class="option">03</li>
											<li data-value="4" class="option">04</li>
											<li data-value="5" class="option">05</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group button">
							<button type="submit" class="btn">Book a Trip</button>
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
							<div class="left">Price:</div>
							<div class="right">${{$package->start_from}}.00</div>
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
							<div class="right">Feb 17 March 06 March 14</div>
						</div>
						<!--/ End single list -->
					</div>
				</div>
				<!--/ End Trip list -->
				<!-- Trip Categories -->
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
				<!--/ End Trip Categories -->
				<!-- Other Trips -->
				<!-- <div class="single-widget other-trips">
					<h2>Other Trips</h2>
					<div class="trips">
						<div class="signle-trip">
							<img src="{{asset('frontend/images/trip-img1.jpg')}}" alt="#">
							<div class="text">
								<h4><a href="#">Estern Europe Tour</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur </p>
							</div>
						</div>>
						<div class="signle-trip">
							<img src="{{asset('frontend/images/trip-img2.jpg')}}" alt="#">
							<div class="text">
								<h4><a href="#">Estern Europe Tour</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur </p>
							</div>
						</div>
						<div class="signle-trip">
							<img src="{{asset('frontend/images/trip-img3.jpg')}}" alt="#">
							<div class="text">
								<h4><a href="#">Estern Europe Tour</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur </p>
							</div>
						</div>
					</div>
				</div> -->
				<!--/ End Other Trips -->
			</div>
			<!--/ End Trip Sidebar -->
		</div>
	</div>
</div>
</section>
@endsection
@section('meta_keywords', $package->meta_keywords)
@section('meta_description', $package->meta_tag)
@section('title', $package->title_tag)