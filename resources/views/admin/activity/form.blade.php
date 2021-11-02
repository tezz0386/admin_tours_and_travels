@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($activity))
		<form action="{{route('activity.update', $activity)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			<form action="{{route('activity.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							@csrf
							<div class="card-header">
								<div class="card-title">activity @if(isset($activity)) Update @else Addon @endif Form </div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="title">Activity Name:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Destination Name" value="{{old('name', @$activity->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Summary</label>
									<textarea class="form-control" style="height: 100px;" name="summary">{{old('summary', @$activity->summary)}}</textarea>
									@error('summary')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Description</label>
									<textarea class="form-control editor" style="height: 150px;" name="description">{{old('description', @$activity->description)}}</textarea>
									@error('description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card card-header">
								<div class="card-title">Your Page Info</div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<textarea class="form-control" style="height: 200px;" name="meta_keywords">{{old('meta_keywords', @$activity->meta_keywords)}}</textarea>
									@error('meta_keywords')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Description</label>
									<textarea class="form-control" style="height: 200px;" name="meta_description">{{old('meta_description', @$activity->meta_description)}}</textarea>
									@error('meta_description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-primary btn-lg float-right">
									@if(isset($activity)) Update @else Save @endif
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</form>
		</div>
	</section>
	@endsection