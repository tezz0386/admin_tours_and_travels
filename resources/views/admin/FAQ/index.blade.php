@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">faq List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Question</th>
									<th>Answer</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($faqs) && count($faqs)>0)
								@foreach($faqs as $faq)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$faq->question}}</td>
									<td>{{$faq->answer}}</td>
									<td><a href="{{route('faq.edit', $faq)}}">Edit</a></td>
									<td>
										<form action="{{route('faq.destroy', $faq)}}" method="post">
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

						{{$faqs->links()}}
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