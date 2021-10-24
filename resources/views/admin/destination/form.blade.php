@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($destination))
		<form action="{{route('destination.update', $destination)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
		@else
			<form action="{{route('destination.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							@csrf
							<div class="card-header">
								<div class="card-title">Destination @if(isset($destination)) Update @else Addon @endif Form </div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="country">Choose Country of Destination:</label>
									<select class="form-control form-control-sm" name="category_name">
										@if(isset($destination))
										<option value="{{$destination->category_id}}">{{$destination->category->name}}</option>
										@else
										<option value="">Choose A Country</option>
										@endif
										@foreach($navCategories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="title">Destination Name:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Destination Name" value="{{old('name', @$destination->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Start From:</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">$</span>
										</div>
										<input type="number" class="form-control" placeholder="Enter Amount" value="{{old('start_from', @$destination->start_from)}}" name="start_from">
									</div>
									@error('start_from')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="image">
										<input type="file" name="image" placeholder="Choose An image">
									</label>
								</div>
								<div class="form-group">
									<label for="title">Summary</label>
									<textarea class="form-control" style="height: 100px;" name="summary">{{old('summary', @$destination->summary)}}</textarea>
									@error('summary')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Description</label>
									<textarea class="form-control editor" style="height: 150px;" name="description">{{old('description', @$destination->description)}}</textarea>
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
									<label for="title">Title Tag:</label>
									<input type="text" name="title_tag" class="form-control" value="{{old('title_tag', @$destination->title_tag)}}">
									@error('title_tag')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<textarea class="form-control" style="height: 200px;" name="meta_keywords">{{old('meta_keywords', @$destination->meta_keywords)}}</textarea>
									@error('meta_keywords')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Description</label>
									<textarea class="form-control" style="height: 200px;" name="meta_description">{{old('meta_description', @$destination->meta_description)}}</textarea>
									@error('meta_description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-primary btn-lg float-right">
									@if(isset($destination)) Update @else Save @endif
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