@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="card card-primary">
					<div class="card-header" style="padding: 0px;">
						<div class="card-title" >New Charge Setup</div>
						<div>
							<a class="btn btn-primary float-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">+ Create New</a>
						</div>
					</div>
					<div class="card-body @if(!isset($charge)) collapse @endif" id="collapseExample">
						<div class="container">
							@if(isset($charge))
							<form class="form-inline" action="{{route('charge.update', $charge)}}" method="post">
								{{method_field('PATCH')}}
								@else
								<form class="form-inline" action="{{route('charge.store')}}" method="post">
									@endif
									@csrf
									<div class="form-group m-2">
										<label for="staticEmail2" class="sr-only">Title For</label>
										<select class="form-control" name="title">
											@if(isset($charge))
											<option value="{{$charge->title}}">{{$charge->title}}</option>
											@else
											<option value="">Please Choose a title</option>
											@endif
											<option value="Adult">Adult</option>
											<option value="Child">Child</option>
											<option value="Others">Others</option>
										</select>
									</div>
									<div class="input-group m-2">
										<label for="inputPassword2" class="sr-only">Per Day</label>
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="number" name="per_day" class="form-control" placeholder="Per Day" value="{{old('per_day', @$charge->per_day)}}">
										@error('per_day')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div>
									<div class="form-group mx-sm-3 m-2">
										<label for="inputPassword2" class="sr-only">Per Night</label>
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="number" name="per_night" class="form-control" placeholder="Per Night" value="{{old('per_night', @$charge->per_night)}}">
										@error('per_night')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div>
									<button type="submit" class="btn btn-primary m-2">
										@if(isset($charge))
										Update
										@else
										Add
										@endif
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Charge List</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Charge To </th>
										<th>Per Day ($)</th>
										<th>Per Night ($)</th>
									</tr>
								</thead>
								<tbody>
									@if(isset($charges) && count($charges)>0)
									@foreach($charges as $charge)
									<tr>
										<td>{{$n++}}</td>
										<td>{{$charge->title}}</td>
										<td>$ {{$charge->per_day}}</td>
										<td>$ {{$charge->per_night}}</td>
										<td><a href="{{route('charge.edit', $charge)}}">Edit</a></td>
									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="4">
											<center>No Record Found</center>
										</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	@endsection