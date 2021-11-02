@extends('layouts.app')
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<li><a href="#">Package</a></li>
				</ul>
				<h2>Package Booking</h2>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mt-2">
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title">
								<center><strong>Package Booking Formn</strong></center>
							</div>
						</div>
						<form action="{{route('postBooking')}}" method="post">
							@csrf
							<div class="card-body">
								<div class="from-group">
									<label for="name">Full Name:</label>
									<input type="text" name="name" class="form-control " placeholder="Enter Full name" value="{{old('name')}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="from-group">
									<label for="name">Address:</label>
									<input type="text" name="address" class="form-control " placeholder="Enter Address" value="{{old('address')}}">
									@error('address')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="from-group">
									<label for="name">Contact No:</label>
									<input type="text" name="contact_no" class="form-control " placeholder="Enter Contact No" value="{{old('contact_no')}}">
									@error('contact_no')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="from-group">
									<label for="name">Email:</label>
									<input type="email" name="email" class="form-control " placeholder="Enter Email Address" value="{{old('email')}}">
									@error('email')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-primary float-right">Submit</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div>
@endsection