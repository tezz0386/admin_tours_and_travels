@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<li><a href="{{route('getSingleMember', $member->slug)}}">{{$member->name}}</a></li>
				</ul>
				<h2>{{$member->name}}</h2>
			</div>
		</div>
	</div>
</div>
<!--/ End Breadcrumb -->
<!-- team-info -->
<!-- php start for rate -->
@php
$rate = 0;
$count=null;
@endphp
@if(count($member->ratting)>0)
@foreach($member->ratting as $ratting)
@php
$rate +=$ratting->rate;
@endphp
@endforeach
@php
$rate=$rate/count($member->ratting);
$rate = (int)$rate;
$count =5-$rate;
$count = (int)$count;
@endphp
@else
@php
$count=5;
@endphp
@endif
<!-- php end for rate -->
<section id="team-single" class="single-team-main mt-5 mb-5">
	<div class="container">
		<div class="mainteam-wrapper">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<img src="{{asset('uploads/member/thumbnail/'.$member->image)}}">
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="t-bottom-team">
						<h2><span>{{$member->designation}}</span> </h2>
						@for($i=1; $i<=$rate; $i++)
						<i class="fas fa-star"></i>
						@endfor
						@for($j=1; $j<=$count; $j++)
						<i class="fas fa-star" style="color: black;"></i>
						@endfor
						<h2 class="mb-3"><a href="{{route('getSingleMember', $member->slug)}}">{{$member->name}}</a></h2>
						<p>{{$member->summary}}</p>
						<p class="team-rate mt-5"><strong>Rate Your Experience With Our Team</strong></p>
						<form class="my-ratting-form" method="post" action="{{route('postRatting', $member->slug)}}">
							@csrf
							<label>
								@for($i=1; $i<=5; $i++)
								<i class="fa fa-star" id="fa{{$i}}" data-value="{{$i}}"></i>
								@endfor
							</label>
							<input type="number" name="rate" hidden="hidden" id="rate">
							<div class="btn-rate-submit">
								<button class="btn btn-danger text-white" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<style type="text/css">
	.my-ratting-form .fa-star{
		font-family: 'FontAwesome';
         font-style: initial;
         color: #ff5050;
         margin: 0 3px;
         font-size: 32px;
         color: black;
	}

</style>
@endsection
@section('meta_keywords', $setting->name)
@section('meta_description', $setting->meta_tag)
@section('title', $member->name)
@push('js')
<script type="text/javascript">
	@for($i=1; $i<=5; $i++)
	   $('#fa{{$i}}').on('click', function(){
	   	$(this).prevAll().css( "color", "red" );
	   	$(this).nextAll().css( "color", "black" );
	   	$(this).css( "color", "red" );
	   	$('#rate').val($(this).data('value'));
	   });
	@endfor
</script>
@endpush