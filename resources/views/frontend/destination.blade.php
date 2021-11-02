@extends('layouts.app')
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<!-- <li><a href="#">Pages</a></li> -->
					<li><a href="{{route('getDestination', $category->slug)}}">{{$category->name}}</a></li>
				</ul>
				<h2>{{$category->name}}</h2>
			</div>
		</div>
	</div>
</div>
<!--/ End Breadcrumb -->
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
@endsection