@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<li><a href="{{route('getFAQ')}}">FAQ</a></li>
				</ul>
				<h2>FAQ</h2>
			</div>
		</div>
	</div>
</div>
<!--/ End Breadcrumb -->
<!-- Faq Info -->
<section id="faq-main" class="faq-main section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-line center">
					<p>Frequently Asked Questions</p>
					<h2>Frequently <span>Asked Questions</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9 offset-lg-1 col-12">
				<!-- Faqs Area -->
				<div class="faq-area">
					<div id="accordion" role="tablist">
						<!-- Single Faq -->
						@if(isset($faqs) && count($faqs)>0)
						@foreach($faqs as $faq)
						<div class="single-faq">
							<div class="faq-heading" role="tab" id="faq1">
								<h4 class="faq-title">
								<a data-toggle="collapse" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne">
									{{$faq->question}}
								</a>
								</h4>
							</div>
							<div id="collapse{{$faq->id}}" class="collapse" role="tabpanel" aria-labelledby="faq1" data-parent="#accordion">
								<div class="faq-body">
									<p>{{$faq->answer}}</p>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
				<!--/ End Faqs Area -->
			</div>
		</div>
	</div>
</section>
<!--/ End faq Info -->
@endsection
@section('meta_keywords', $pageInfo->meta_keywords)
@section('meta_description', $pageInfo->meta_tag)
@section('title', $pageInfo->title_tag)