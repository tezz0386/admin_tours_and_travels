@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Destination List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Destination Name</th>
									<th>Belongs To</th>
									<th>Summary</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($destinations) && count($destinations)>0)
								@foreach($destinations as $destination)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$destination->name}}</td>
									<td>
										<a href="{{route('category.show', $destination->category)}}">{{$destination->category->name}}</a>
									</td>
									<td>{{Substr($destination->summary, 0, 200)}}</td>
									<td><a href="{{route('destination.show', $destination)}}">View</a></td>
									<td><a href="{{route('destination.edit', $destination)}}">Edit</a></td>
									<td>
										<form action="{{route('destination.destroy', $destination)}}" method="post">
											@csrf
											{{method_field('DELETE')}}
											<button type="submit" class="btn-link">Deleted</button>
										</form>
									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="5">
										<center>No Record Found</center>
									</td>
								</tr>
								@endif
							</tbody>
						</table>

						{{$destinations->links()}}
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