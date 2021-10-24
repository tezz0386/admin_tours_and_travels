@extends('layouts.app')
@section('content')
<section id="hero-area" class="hero-area overlay style2">
	<!-- Slider Area -->
	@include('frontend.partials.slider')
	<!--/ End Slider Area -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Trip Search -->
				<div class="trip-search">
					<form class="form">
						<h2><span>Find your trip</span></h2>
						<!-- Single Form -->
						<div class="form-group">
							<h4>Destination</h4>
							<div class="nice-select form-control wide" tabindex="0"><span class="current"><img src="{{asset('frontend/images/destination-icon.png')}}" alt="#">Where to Go</span>
							<ul class="list">
								<li data-value="1" class="option selected ">Destination One</li>
								<li data-value="2" class="option">Destination Two</li>
								<li data-value="3" class="option">Destination Three</li>
							</ul>
						</div>
					</div>
					<!--/ End Single Form -->
					<!-- Single Form -->
					<div class="form-group">
						<h4>Activities</h4>
						<div class="nice-select form-control wide" tabindex="0"><span class="current"><img src="{{asset('frontend/images/activities-icon.png')}}" alt="#">What to do</span>
						<ul class="list">
							<li data-value="1" class="option selected ">Activities One</li>
							<li data-value="2" class="option">Activities Two</li>
							<li data-value="3" class="option">Activities Three</li>
						</ul>
					</div>
				</div>
				<!--/ End Single Form -->
				<!-- Single Form -->
				<div class="form-group duration">
					<h4>Duration</h4>
					<div class="nice-select form-control wide" tabindex="0"><span class="current"><img src="{{asset('frontend/images/duration-icon.png')}}" alt="#">When to go</span>
					<ul class="list">
						<li data-value="1" class="option selected ">Duration One</li>
						<li data-value="2" class="option">Duration Two</li>
						<li data-value="3" class="option">Duration Three</li>
					</ul>
				</div>
			</div>
			<!--/ End Single Form -->
			<!-- Single Form -->
			<div class="form-group range">
				<h4>Budget</h4>
				<div class="price-filter">
					<div class="price-filter-inner">
						<div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span></div>
						<div class="price_slider_amount">
							<div class="label-input">
								<input type="text" id="amount" name="price" placeholder="Add Your Price">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Single Form -->
			<!-- Form Button -->
			<div class="form-group button">
				<button type="submit" class="btn">Search Trip</button>
			</div>
			<!--/ End Form Button -->
		</form>
	</div>
	<!--/ End Trip Search -->
</div>
</div>
</div>
</section>
<!--/ End Hero Area -->

<!-- About Us -->
<section id="about-us" class="about-us section">
<div class="container">
<div class="row">
<div class="col-lg-6 col-12">
	<!-- About Left -->
	<div class="about-left wow fadeInLeft" data-wow-delay="0.2s">
		<img src="{{asset('uploads/page/thumbnail/'.$about->image)}}" alt="#">
	</div>
	<!--/ End About Left -->
</div>
<div class="col-lg-6 col-12">
	<!-- About Right -->
	<div class="about-right">
		<div class="title-line wow fadeIn" data-wow-delay="0.2s">
			{!! $about->description !!}
		</div>
		<div class="about-main">
			
			<!-- Skill Main -->
			<div class="skill-main">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 wow fadeInLeft" data-wow-delay="0.4s">
						<!-- Single Skill -->
						<div class="single-skill">
							<div class="circle" data-value="1" data-size="130">
								<strong>100%</strong>
							</div>
							<h4>Satisfied <span>Clients</span></h4>
						</div>
						<!--/ End Single Skill -->
					</div>
					<div class="col-lg-6 col-md-6 col-12 wow fadeInRight" data-wow-delay="0.6s">
						<!-- Single Skill -->
						<div class="single-skill">
							<div class="circle" data-value="0.75" data-size="130">
								<strong>75%</strong>
							</div>
							<h4>Advanced <span>Booking</span></h4>
						</div>
						<!--/ End Single Skill -->
					</div>
				</div>
			</div>
			<!--/ End Skill Main -->
		</div>
	</div>
	<!--/ End About Right -->
</div>
</div>
</div>
</section>
<!--/ End Main Area -->


@if(isset($destinations) && count($destinations)>0)
<!-- Popular Destination -->
<section id="p-destination" class="p-destination section">
<div class="container">
<div class="row">
<div class="col-12 wow fadeIn" data-wow-delay="0.2s">
	<div class="title-line center">
		<p>Nepal's best treeking destinations</p>
		<h2><span>Book your </span> Treeking Destination</h2>
	</div>
</div>
</div>
<div class="row">
<div class="col-12">
	<!-- Destination -->
	<div class="destination-main">
		<div class="row">
			@foreach($destinations as $destination)
			<div class="col-lg-4 col-12 wow fadeIn" data-wow-delay="0.2s">
				<!-- Single Destination -->
				<div class="single-destination overlay">
					<img src="{{asset('uploads/destination/thumbnail/'.$destination->image)}}" alt="#">
					<div class="hover">
						<p class="price">FROM <span>${{$destination->start_from}}</span></p>
						<h4 class="name">{{$destination->name}}</h4>
						<p class="location">{{$destination->category->name}}</p>
					</div>
				</div>
				<!--/ End Destination -->
			</div>
			@endforeach
		</div>
	</div>
	<!--/ End Destination -->
</div>
</div>
</div>
</section>
<!--/ End Popular Destination -->
@endif


@if(isset($packages) && count($packages)>0)
<!-- Popular Trips -->
<section id="popular-trips" class="popular-trips section overlay" style="background-image:url({{asset('frontend/images/popular-bg.jpg')}});">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 col-12">
	<div class="title-line wow fadeIn" data-wow-delay="0.2s">
		<p>Popular Trips</p>
		<h2>Worthy time spent<span>around the world</span></h2>
		<p class="text">The average employee is wasting between 50%-80% of their day on non-work related distractions. Time wasted is money wasted, that's money that could stay in your pocket simply by changing the way you assign your tasks.</p>
	</div>
</div>
</div>
<div class="row">
<div class="col-12 wow fadeInUp" data-wow-delay="0.4s">
	<div class="trips-main">
		<!-- Trips Slider -->
		<div class="trips-slider">
			@foreach($packages as $package)
			@if($package->is_off)
			<!-- Single Slider -->
			<div class="single-slider">
				<div class="trip-head">
					<div class="trip-offer">{{$package->off_percent}}% OFF</div>
					<img src="{{asset('uploads/package/thumbnail/'.$package->thumbnail)}}" alt="#">
				</div>
				<div class="trip-details">
					<div class="left">
						<h4><a href="{{route('getSinglePackage', $package->slug)}}">{{$package->name}}</a></h4>
						<p><i class="fa fa-clock-o"></i>{{$package->duration_days}} Days and {{$package->duration_nights}} Nights</p>
					</div>
					<div class="right">
						<p>From<span>${{$package->start_from}}</span></p>
					</div>
					<a href="{{route('getSinglePackage', $package->slug)}}" class="btn">View More</a>
				</div>
			</div>
			@endif
			<!--/ End Single Trips -->
			@endforeach
		</div>
		<!--/ End Trips Slider -->
	</div>
</div>
</div>
</div>
</section>

@endif
<!--/ End Popular Trips -->

<!-- Top Destination -->
<section id="top-destination" class="top-destination section">
<div class="container">
<div class="row">
<div class="col-12 wow fadeIn" data-wow-delay="0.2s">
	<div class="title-line center">
		<p>Nepal's best tourist destinations</p>
		<h2><span>Book your Trek</span>Top Treks</h2>
	</div>
</div>
</div>
<div class="row">
<div class="col-12">
	<!-- Destination Tab -->
	<div class="destination-inner wow fadeInUp" data-wow-delay="0.4s">
		<!-- Nav Tab  -->
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab1" role="tab">All Packages</a></li>
			@if(isset($packageWithCategory) && count($packageWithCategory)>0)
			@foreach($packageWithCategory as $category)
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab2{{$category->id}}" role="tab">{{$category->name}}</a></li>
			@endforeach
			@endif

		</ul>
		<!--/ End Nav Tab -->

		<div class="tab-content" id="myTabContent">
			<!-- Tab 1 -->
			<div class="tab-pane fade show active" id="t-tab1" role="tabpanel">
				<div class="row">
					@foreach($packageWithCategory as $category)
					@foreach($category->packages as $package)
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Tab -->
						<div class="single-package">
							<div class="trip-head">
								@if($package->is_off)
								<div class="trip-offer">30% OFF</div>
								@endif
								<img src="{{asset('uploads/package/thumbnail/'.$package->thumbnail)}}" alt="#">
							</div>
							<div class="trip-details">
								<div class="left">
									<h4><a href="{{route('getSinglePackage', $package->slug)}}">{{$package->name}}</a></h4>
									<p><i class="fa fa-clock-o"></i>{{$package->duration_days}} Days and {{$package->duration_nights}} Nigts</p>
								</div>
								<div class="right">
									<p>From<span>${{$package->start_from}}</span></p>
								</div>
								<a href="{{route('getSinglePackage', $package->slug)}}" class="btn primary">View More</a>
							</div>
						</div>
						<!--/ End Single Tab -->
					</div>
					@endforeach
					@endforeach
				</div>
			</div>

			<!--/ End Tab 1 -->
			<!-- Tab 2 -->
			@foreach($packageWithCategory as $category)
			<div class="tab-pane fade" id="t-tab2{{$category->id}}" role="tabpanel">
				<div class="row">
					@foreach($category->packages as $package)
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Tab -->
						<div class="single-package">
							<div class="trip-head">
								@if($package->is_off)
								<div class="trip-offer">30% OFF</div>
								@endif
								<img src="{{asset('uploads/package/thumbnail/'.$package->thumbnail)}}" alt="#">
							</div>
							<div class="trip-details">
								<div class="left">
									<h4><a href="{{route('getSinglePackage', $package->slug)}}">{{$package->name}}</a></h4>
									<p><i class="fa fa-clock-o"></i>{{$package->duration_days}} Days and {{$package->duration_nights}} Nights</p>
								</div>
								<div class="right">
									<p>From<span>${{$package->start_from}}</span></p>
								</div>
								<a href="{{route('getSinglePackage', $package->slug)}}" class="btn primary">View More</a>
							</div>
						</div>
						<!--/ End Single Tab -->
					</div>
					@endforeach
				</div>
			</div>
			@endforeach
			<!--/ End Tab 2 -->
		</div>

	</div>
	<!--/ End Destination Tab -->
</div>
</div>
</div>
</section>
<!--/ End Top Destination -->

<!-- Call To Action -->
<section id="cta" class="cta section" style="background-image: url({{asset('frontend/images/cta-bg.jpg')}});">
<div class="container">
<div class="row">
<div class="col-lg-6 col-12 wow fadeIn" data-wow-delay="0.2s">
	<div class="cta-text">
		<div class="title-line">
			<p>subscribe us</p>
			<h2>Subscribe to <span>our best treeking company.</span></h2>
		</div>
		<a href="trip-3-column.html" class="btn">Subscribe Now</a>
	</div>
</div>
</div>
</div>
</section>
<!--/ End Call To Action -->

<!-- Testimonials -->
<section id="testimonials" class="testimonials section">
<div class="container">
<div class="row">
<div class="col-12 wow fadeIn" data-wow-delay="0.2s">
	<div class="title-line center">
		<p>What our guest are saying</p>
		<h2><span>Clients</span> Experience</h2>
	</div>
</div>
</div>
<div class="row">
<div class="col-12">
	<div class="testimonial-main">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12 wow fadeInLeft" data-wow-delay="0.4s">
				<!-- Testimonial Slider -->
				<div class="testimonial-slider">
					@if(isset($testimonials) && count($testimonials)>0)
					@foreach($testimonials as $testimonial)
					<div class="single-slider">
						<p>{{$testimonial->speech}}</p>
						<span>{{$testimonial->name}}</span>
					</div>
					@endforeach
					@endif
				</div>
				<!--/ End Testimonial Slider -->
			</div>
			<div class="col-lg-6 col-md-6 col-12 wow fadeInRight" data-wow-delay="0.4s">
				<!-- Testimonial Image -->
				<div class="testimonial-image">
					<img src="{{asset('frontend/images/testimonial-img.jpg')}}" alt="#">
				</div>
				<!--/ End Testimonial Image -->
			</div>
		</div>
	</div>
</div>
</div>
</div>
</section>
<!--/ End Testimonials -->

<!-- Services -->

<!--/ End Services -->

<!-- Blog Area -->

<!--/ End Blog Area -->


@if(isset($members) && count($members)>0)
<!-- Clients -->
<section id="team" class="team section">
<div class="container">
<div class="row">
<div class="col-12">
	<div class="title-line center">
		<p>Our expert team</p>
		<h2>Our <span>Experties</span></h2>
	</div>
</div>
</div>
<div class="row">
@foreach($members as $member)
<div class="col-lg-4 col-md-6 col-12">
	<!-- Single Team -->
	<div class="single-team">
		<!-- Team Head -->
		<div class="t-head overlay">
			<img src="{{asset('uploads/member/thumbnail/'.$member->image)}}" alt="#">
			<div class="t-hover">
				<ul class="t-social">
					<li><a href="{{$member->facebook_link}}"><i class="fa fa-facebook"></i></a></li>
					<li><a href="{{$member->twitter_link}}"><i class="fa fa-twitter"></i></a></li>
				</ul>
			</div>
		</div>
		<!-- Team Bottom -->
		<div class="t-bottom">
			<h2><span>{{$member->designation}}</span>{{$member->name}}</h2>
			<p>{{$member->summary}}</p>
		</div>
		<!--/ End Team Bottom -->
	</div>
	<!-- End Single Team -->
</div>
@endforeach
</div>
</div>
</section>
@endif
<!--/ End Clients -->
@endsection
@section('meta_keywords', $setting->meta_keywords)
@section('meta_description', $setting->meta_tag)
@section('title', $setting->title_tag)