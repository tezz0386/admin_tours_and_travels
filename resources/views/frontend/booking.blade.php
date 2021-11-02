@extends('layouts.app')
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<li><a href="{{route('getPackages')}}">Bookings</a></li>
				</ul>
				<h2>Bookings</h2>
			</div>
		</div>
	</div>
</div>
<!--/ End Breadcrumb -->
<!-- About Us -->
<section id="top-destination" class="top-destination section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
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
@endsection
@section('meta_keywords', $pageInfo->meta_keywords)
@section('meta_description', $pageInfo->meta_tag)
@section('title', $pageInfo->title_tag)