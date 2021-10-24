@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-12 col-lg-12">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title">Info of Country: {{$destination->name}}</div>
						</div>
						<div class="card-body">
							<div class="row">
								<img src="{{asset('uploads/destination/thumbnail/'.$destination->image)}}" width="358" height="239">
							</div>
							<hr>
							<div class="form-group mt-2">
								<label>Created Or Updated By: {{$destination->user->name}}</label>
							</div>
							<div class="form-group">
								<label>Belongs To: </label><br>
								<p>
									{{$destination->category->name}}
								</p>
							</div>
							<div class="form-group">
								<label>Summary: </label><br>
								<p>
									{{$destination->summary}}
								</p>
							</div>
							<div class="form-group">
								<label>Description: </label><br>
								<p>
									{!! $destination->description !!}
								</p>
							</div>
							<div class="form-group">
								<label>Title Tag: {{$destination->title_tag}}</label>
							</div>
							<div class="form-group">
								<label>Meta Keywords: </label>
								{{$destination->meta_keywords}}
							</div>
							<div class="form-group">
								<label>Meta Description:</label>
								<p>
									{{$destination->meta_description}}
								</p>
							</div>
						</div>
						<div class="card-footer">
							<div>
								<center><a href="{{route('destination.index')}}"><< Go Back</a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection