@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Activity List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Activity Name</th>
									<th>Summary</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($activities) && count($activities)>0)
								@foreach($activities as $activity)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$activity->name}}</td>
									<td>{{Substr($activity->summary, 0, 200)}}</td>
									<td><a href="{{route('activity.edit', $activity)}}">Edit</a></td>
									<td>
										<form action="{{route('activity.destroy', $activity)}}" method="post">
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

						{{$activities->links()}}
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