@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<li><a href="{{route('getContact')}}">Contact Us</a></li>
				</ul>
				<h2>Contact Us</h2>
			</div>
		</div>
	</div>
</div>
<!--/ End Breadcrumb -->
<!-- About Us -->
<section id="contact-us" class="contact-us section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-line center">
					<p>our information</p>
					<h2>Contact <span>Us</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Contact Form -->
			<div class="col-lg-8 offset-lg-2 col-12">
				<form class="form" method="post" action="https://themelamp.com/themes/traveltrek-demo/mail/mail.php">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<input type="text" name="name" placeholder="Name" required="required">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<input type="email" name="email" placeholder="Email" required="required">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<input type="text" name="subject" placeholder="Subject" required="required">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="message" rows="8" placeholder="Your Message"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group button">
								<button type="submit" class="btn primary">Send Message</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--/ End Contact Form -->
			<div class="col-lg-12">
				<div class="contact">
					<div class="row contact-page-contact">
						<div class="col-lg-4 col-md-4 col-12">
							<!-- Single Contact -->
							<div class="single-contact">
								<img src="{{asset('frontend/images/location-icon.png')}}" alt="#">
								<h4>Our Location</h4>
								<p>{{$setting->address}}</p>
							</div>
							<!--/ End Single Contact -->
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<!-- Single Contact -->
							<div class="single-contact">
								<img src="{{asset('frontend/images/call-icon.png')}}" alt="#">
								<h4>Contact Us</h4>
								<p>Telephone: +{{$setting->toll_free}}</p>
								<p><a href="mailto:{{$setting->email}}">Email: {{$setting->email}}</a></p>
							</div>
							<!--/ End Single Contact -->
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<!-- Single Contact -->
							<div class="single-contact">
								<img src="{{asset('frontend/images/clock-icon.png')}}" alt="#">
								<h4>Working Times</h4>
								@php
                                 $dates = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                                @endphp
								<p>
                                    @for($i=0; $i<=6; $i++)
                                        @if($dates[$i] == $setting->close_day)
                                            @if($i==6)
                                             {{$dates[0]}} - {{$dates[5]}}
                                            @else
                                            {{$dates[$i+1]}} - {{$dates[$i-1]}}
                                            @endif
                                        @endif
                                    @endfor
                                    {{$setting->open_time}} {{$setting->close_time}}
                                </p>
                                <p>
                                    @for($i=0; $i<=6; $i++)
                                        @if($dates[$i] == $setting->close_day) {{$setting->close_day}} Closed @endif
                                    @endfor
                                </p>
							</div>
							<!--/ End Single Contact -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End About Us -->
<!-- Map -->
<div class="map-section">
	<iframe src="{{$setting->location}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<!--/ End map -->
@endsection
@section('meta_keywords', $pageInfo->meta_keywords)
@section('meta_description', $pageInfo->meta_tag)
@section('title', $pageInfo->title_tag)