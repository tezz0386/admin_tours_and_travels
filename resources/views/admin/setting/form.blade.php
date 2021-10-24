@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<ul class="list-inline">
					<li class="list-inline-item"><a href="{{route('banner.index')}}">Banner Setting</a>/</li>
					<li class="list-inline-item"><a href="{{route('page.index')}}">Page Setting</a>/</li>
				</ul>
			</div>
		</div>
		<hr>
		@if(isset($setting))
		<form action="{{route('setting.update', $setting)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			<form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							@csrf
							<div class="card-header">
								<div class="card-title">Setting @if(isset($setting)) Update @else Addon @endif Form </div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label for="title">Logo</label>
											<input type="file" name="logo" class="form-control">
											@error('logo')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label for="title">Icon </label>
											<input type="file" name="icon" class="form-control">
											@error('icon')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="title">Title:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Site Title" value="{{old('name', @$setting->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Email:</label>
									<input type="email" name="email" class="form-control" placeholder="Enter Site email" value="{{old('email', @$setting->email)}}">
									@error('email')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Address:</label>
									<input type="text" name="address" class="form-control" placeholder="Enter Site Address" value="{{old('address', @$setting->address)}}">
									@error('address')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Open Time:</label>
									<input type="time" name="open_time" class="form-control" placeholder="Open Time" value="{{old('open_time', @$setting->open_time)}}">
									@error('open_time')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Close Time:</label>
									<input type="time" name="close_time" class="form-control" placeholder="Open Time" value="{{old('close_time', @$setting->close_time)}}">
									@error('close_time')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Close Day:</label>
									<select class="form-control" name="close_day">
										@if(isset($setting))
										<option value="{{$setting->close_day}}">{{$setting->close_day}}</option>
										@endif
										<option value="Sunday">Sunday</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
									</select>
									@error('close_day')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Contact No:</label>
									<input type="number" name="contact_no" class="form-control" value="{{old('contact_no', @$setting->contact_no)}}">
									@error('contact_no')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Toll Free:</label>
									<input type="number" name="toll_free" class="form-control" value="{{old('toll_free', @$setting->toll_free)}}">
									@error('toll_free')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Location</label>
									<input type="text" name="location" class="form-control" value="{{old('location', @$setting->location)}}">
									@error('location')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card card-header">
								<div class="card-title">Your Web Info</div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="title">Summary</label>
									<textarea class="form-control" style="height: 100px;" name="summary">{{old('summary', @$setting->summary)}}</textarea>
									@error('summary')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Description</label>
									<textarea class="form-control editor" style="height: 150px;" name="description">{{old('description', @$setting->description)}}</textarea>
									@error('description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Title Tag:</label>
									<input type="text" name="title_tag" class="form-control" value="{{old('title_tag', @$setting->title_tag)}}">
									@error('title_tag')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<textarea class="form-control" style="height: 200px;" name="meta_keywords">{{old('meta_keywords', @$setting->meta_keywords)}}</textarea>
									@error('meta_keywords')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Description</label>
									<textarea class="form-control" style="height: 200px;" name="meta_description">{{old('meta_description', @$setting->meta_description)}}</textarea>
									@error('meta_description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-primary btn-lg float-right">
									@if(isset($setting)) Update @else Save @endif
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