@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-12 col-lg-12">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title">Info of Package: {{$package->name}}</div>
						</div>
						<div class="card-body">
							<div class="row">
								<img src="{{asset('uploads/package/thumbnail/'.$package->thumbnail)}}" width="358" height="239">
							</div>
							<hr>
							<div class="form-group mt-2">
								<label>Created Or Updated By: {{$package->user->name}}</label>
							</div>
							<div class="form-group">
								<label>Duration: {{$package->duration_days}} Days {{$package->duration_nights}} Nights</label><br>
							</div>
							<div class="form-group">
								<label>Difficulty:{{$package->difficulty}}</label><br>
							</div>
							<div class="form-group">
								<label>Start From: $ {{$package->start_from}}</label><br>
							</div>
							<div class="form-group">
								<label>Summary: </label><br>
								<p>
									{{$package->summary}}
								</p>
							</div>
							<div class="row">
								<div class="card card-primary card-tabs">
									<div class="card-header p-0 pt-1">
										<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Trip Overview</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Itinearary</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Pricing Plan</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Booking</a>
											</li>
										</ul>
									</div>
									<div class="card-body">
										<div class="tab-content" id="custom-tabs-one-tabContent">
											<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
												{!! $package->trip_overview !!}
											</div>
											<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
												{!! $package->itinearary !!}
											</div>
											<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
												{!! $package->pricing_plan !!}
											</div>
											<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
												{!! $package->booking !!}
											</div>
										</div>
									</div>
									<!-- /.card -->
								</div>
							</div>
							<div class="form-group">
								<label>Title Tag: {{$package->title_tag}}</label>
							</div>
							<div class="form-group">
								<label>Meta Keywords: </label>
								{{$package->meta_keywords}}
							</div>
							<div class="form-group">
								<label>Meta Description:</label>
								<p>
									{{$package->meta_description}}
								</p>
							</div>
							<div class="row">
								@foreach($package->thumbnails as $thumnail)
								<a href="{{asset('uploads/package/thumbnail/'.$thumnail->image)}}"><img src="{{asset('uploads/package/thumbnail/'.$thumnail->image)}}" height="100" width="100" class="m-2"></a>
								@endforeach
							</div>
						</div>
						<div class="card-footer">
							<div>
								<center><a href="{{route('package.index')}}"><< Go Back</a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection