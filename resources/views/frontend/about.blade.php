@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<!-- <li><a href="#">Pages</a></li> -->
					<li><a href="{{route('getAbout')}}">About Us</a></li>
				</ul>
				<h2>About Us</h2>
			</div>
		</div>
	</div>
</div>
<!--/ End Breadcrumb -->

<!-- About Us -->
<section id="about-us" class="about-us section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
				<!-- About Left -->
				<div class="about-left">
					<img src="{{asset('uploads/page/thumbnail/'.$about->image)}}" alt="#">
				</div>
				<!--/ End About Left -->
			</div>
			<div class="col-lg-6 col-12">
				<!-- About Right -->
				<div class="about-right">
					{!!$about->description!!}
				</div>
				<!--/ End About Right -->
			</div>
		</div>
	</div>
</section>
<!--/ End About Us -->

<!-- Counter -->
<section id="counter" class="counter overlay section" data-stellar-background-ratio="0.7" style="background-position: 0% -38.4px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-12">
				<!-- Single Count -->
				<div class="single-count">
					<h2><span class="number">2500</span> Satisfied Customer</h2>
					<p>We are technology leaders and have crafted intuitive and lasting online and mobile experiences</p>
				</div>
				<!--/ End Single Count -->
			</div>
			<div class="col-lg-4 col-md-4 col-12">
				<!-- Single Count -->
				<div class="single-count">
					<h2><span class="number">5533</span> Advanced Booking</h2>
					<p>We are technology leaders and have crafted intuitive and lasting online and mobile experiences</p>
				</div>
				<!--/ End Single Count -->
			</div>
			<div class="col-lg-4 col-md-4 col-12">
				<!-- Single Count -->
				<div class="single-count">
					<h2><span class="number">231</span> Different Tailor Trips</h2>
					<p>We are technology leaders and have crafted intuitive and lasting online and mobile experiences</p>
				</div>
				<!--/ End Single Count -->
			</div>
		</div>
	</div>
</section>
<!--/ End Counter -->

<!-- About Company -->
<section id="cta" class="cta style2 section overlay" data-stellar-background-ratio="0.7" >
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
				<!-- CTA Text -->
				<div class="cta-text">
					<div class="title-line">
						<p>about company</p>
						<h2>Worthy time spent<span>around the world.</span></h2>
					</div>
					<p>The average employee is wasting between 50%-80% of their day on non-work related distractions. Time wasted is money wasted, thats money that could stay in your pocket simply by changing the way you assign your tasks.</p>
					<a href="#" class="btn">Book your trip</a>
				</div>
				<!-- End CTA Text -->
			</div>
		</div>
	</div>
</section>
<!--/ End About Company -->
@endsection
@section('meta_keywords', $about->meta_keywords)
@section('meta_keywords', $about->meta_tag)
@section('title', $about->title_tag)