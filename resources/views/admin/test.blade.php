@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<form action="{{route('postTest')}}" method="post">
				@csrf
				<input type="date" name="date" class="form-control" placeholder="enter date">
				<button type="submit" class="btn btn-primary">Test</button>
			</form>
		</div>
	</div>
</section>
@endsection