@extends('layouts.app')
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="{{route('index')}}">Home</a></li>
					<li><a href="{{route('getBlog')}}">Blog</a></li>
				</ul>
				<h2>Blog</h2>
			</div>
		</div>
	</div>
</div>
<!--/ End Breadcrumb -->
<!-- Blog with sidebar -->
<section id="blog-area" class="blog-area archive classic section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					@if(isset($blogs) && count($blogs)>0)
					@foreach($blogs as $blog)
					<div class="col-12">
						<!-- Single Blog -->
						<div class="single-blog">
							<div class="blog-head">
								<img src="{{asset('uploads/blog/thumbnail/'.$blog->image)}}" alt="#">
							</div>
							<div class="blog-content">
								<h4><a href="blog-single.html">{{$blog->title}}</a></h4>
								<div class="meta">{{$blog->created_at->diffForHumans()}} <span>|</span> 2 Comments</div>
								<p>{{$blog->summary}}</p>
								<a href="blog-single.html" class="btn">Continue Reading</a>
							</div>
						</div>
						<!--/ End Single Blog -->
					</div>
					@endforeach
					@endif


				</div>
				<div class="row">
					<div class="col-12">
						<!-- Start Pagination -->
						<ul class="pagination">
							{{$blogs->links()}}
						</ul>
						<!--/ End Pagination -->
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<!-- Blog Sidebar -->
				<div class="sidebar-main">
					<!-- Search -->
					<div class="single-widget search">
						<h2>Search</h2>
						<form class="form" action="#">
							<input type="text">
							<button type="submit">Search</button>
						</form>
					</div>
					<!--/ End Search -->
					<!-- Categories -->
					<div class="single-widget categories">
						<h2>Categories</h2>
						<ul class="categories-inner">
							@if(isset($packageCategories) && count($packageCategories)>0)
							@foreach($packageCategories as $category)
							<li><a href="#">{{$category->name}}</a></li>
							@endforeach
							@endif
						</ul>
					</div>
					<!--/ End Categories -->
					<!-- Other Trips -->
				<!-- 	<div class="single-widget other-trips">
						<h2>Other Trips</h2>
						<div class="trips">
							<div class="signle-trip">
								<img src="{{asset('frontend/images/trip-img1.jpg')}}" alt="#">
								<div class="text">
									<h4><a href="#">Estern Europe Tour</a></h4>
									<p>Lorem ipsum dolor sit amet, consectetur </p>
								</div>
							</div>
							<div class="signle-trip">
								<img src="{{asset('frontend/images/trip-img2.jpg')}}" alt="#">
								<div class="text">
									<h4><a href="#">Estern Europe Tour</a></h4>
									<p>Lorem ipsum dolor sit amet, consectetur </p>
								</div>
							</div>
							<div class="signle-trip">
								<img src="{{asset('frontend/images/trip-img3.jpg')}}" alt="#">
								<div class="text">
									<h4><a href="#">Estern Europe Tour</a></h4>
									<p>Lorem ipsum dolor sit amet, consectetur </p>
								</div>
							</div>
						</div>
					</div> -->
					<!--/ End Other Trips -->
					<!-- Tags -->
					<div class="single-widget tags">
						<h2>Recent Tags</h2>
						<div class="tags">
							<ul>
								<li><a href="#">advice,</a></li>
								<li><a href="#">assistant,</a></li>
								<li><a href="#">employees,</a></li>
								<li><a href="#">employers,</a></li>
								<li><a href="#">life,</a></li>
								<li><a href="#">media,</a></li>
								<li><a href="#">organization,</a></li>
								<li><a href="#">quote,</a></li>
								<li><a href="#">research,</a></li>
								<li><a href="#">skills,</a></li>
								<li><a href="#">startup,</a></li>
								<li><a href="#">team,</a></li>
								<li><a href="#">tips,</a></li>
								<li><a href="#">train</a></li>
							</ul>
						</div>
					</div>
					<!--/ End Tags -->
				</div>
				<!--/ End Blog Sidebar -->
			</div>
		</div>
	</div>
</section>
@endsection
@section('meta_keywords', $pageInfo->meta_keywords)
@section('meta_description', $pageInfo->meta_tag)
@section('title', $pageInfo->title_tag)