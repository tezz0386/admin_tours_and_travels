<div class="slider-active owl-carousel owl-theme owl-loaded">
    @if(isset($banners) && count($banners)>0)
    @foreach($banners as $banner)
    <div class="owl-item slider-item"><div class="single-slider overlay" style="background-image:url({{asset('uploads/banners/thumbnail/'.$banner->image)}})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-inner">
                        <!-- Welcome Text -->
                        <div class="welcome-text">
                            <p># 1 Most loved by everyone</p>
                            <h1>Simply the Best</h1>
                            <!-- Button -->
                            <div class="button">
                                <a href="trip-3-column.html" class="btn">Book your Trip</a>
                                <a href="{{route('getContact')}}" class="btn primary">Contact Us</a>
                            </div>
                            <!--/ End Button -->
                        </div>
                        <!--/ End Welcome Text -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
</div>