@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($faq))
		<form action="{{route('faq.update', $faq)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			<form action="{{route('faq.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="container">
							<div class="card card-primary">
								@csrf
								<div class="card-header">
									<div class="card-title">FAQ @if(isset($faq)) Update @else Addon @endif Form </div>
								</div>
								<div class="card-body">
									<div class="form-group float-right">
										<label>Status:</label>
										 <input type="checkbox" name="status" value="1" data-bootstrap-switch @if(isset($faq)) @if($faq->status) checked @endif @else checked @endif>
									</div>
									<div class="form-group">
										<label for="title">Question:</label>
										<input type="text" name="question" class="form-control" placeholder="Enter Destination Name" value="{{old('question', @$faq->question)}}">
										@error('question')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="title">Answer:</label>
										<textarea class="form-control" style="height: 100px;" name="answer">{{old('answer', @$faq->answer)}}</textarea>
										@error('answer')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="card-footer">
									<div>
										<button type="submit" class="btn btn-primary float-right">
											@if(isset($faq))
											Update
											@else
											Save
											@endif
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	@endsection

	@push('js')
	<script src="{{asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
	<script type="text/javascript">
		$("input[data-bootstrap-switch]").each(function(){
           $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
	</script>
	@endpush