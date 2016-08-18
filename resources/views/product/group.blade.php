@extends('layouts.default')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{$cat->group->title_ar}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            @include('layouts.sidebar')
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- category-slider -->
                <div class="category-slider">
                    <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                        <li>
                            <img src="{{ $image_url . $cat->image }}" alt="category-slider">
                        </li>
                        <li>
                            <img src="http://d152j5tfobgaot.cloudfront.net/wp-content/uploads/2015/10/yourstory-delhi-online-shopping.jpg" alt="category-slider">
                        </li>
                    </ul>
                </div>
                <!-- ./category-slider -->

                <!-- category short-description -->
                <div class="cat-short-desc">
                    
                    <div class="cat-short-desc-products">
                        <ul class="row">
                        	@foreach($second as $category)
                            <li class="col-sm-4">
                                <div class="product-container" style="margin-bottom: 7px;min-height: 140px;">
                                    <div class="product-thumb" style="text-align: center;">
                                    <a href="/products/{{\App\second::slug($category->id)}}"><img src="{{ $image_url . $category->image }}" alt="{{$category->title_ar}}" onerror="this.src='{{asset('images/not_found.jpg')}}'" style="max-height: 91px;"></a>
                                    </div>
                                    <h5 class="product-name" style="direction: rtl;text-align: center;">
                                        <a href="/products/{{\App\second::slug($category->id)}}">{{$category->title_ar}}</a>
                                        <span>({{$category->thirds->count()}})</span>
                                    </h5>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
                <!-- ./category short-description -->
                
                
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>

@endsection