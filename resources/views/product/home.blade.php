@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left">
           <a href="#"><img class="img-responsive" alt="Funky roots" src="{{ asset('images/temp_side.jpg') }}" style="height: 540px;"/></a>
           </div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                        	@foreach(\DB::table('files')->where('status', 1)->get() as $slider)
                          <li><img class="img-responsive" alt="" src="{{ $image_url . $slider->url}}" title="{{ $slider->title }}" /></li>
                        	@endforeach


                        </ul>
                    </div>
                </div>
                <div class="header-banner banner-opacity">

                    <a href="#"><img class="img-responsive" alt="Funky roots" src="{{ asset('images/temp_side.jpg') }}" style="height: 538px;"/></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<div class="container my-margin-top" style="padding:0px;">
<div class="col-xs-12 hidden-sm hidden-md hidden-lg ">
	<a href="#"><img class="img-responsive" alt="Funky roots" src="{{ asset('images/mobile-ads.jpg') }}"/></a>
</div>

</div>
<!-- END mobile ads-->
<!-- servives -->
<div class="container">
    <div class="service " style="margin-top: 10px;">
        <div class="col-xs-12 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{ asset('data/s1.png') }}" />
            </div>
            <div class="info">
                <a href="#"><h3>شحن مجانا</h3></a>
                <span>شحن مجاني للمشتريات فوق 500 ريال</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{ asset('data/s2.png') }}" />
            </div>
            <div class="info" style="direction: rtl;">
                <a href="#"><h3>30 يوم ضمان</h3></a>
                <span>ضمان استرجاع النقود خلال 30 يوم</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item hidden-xs  ">
            <div class="icon">
                <img alt="services" src="{{ asset('data/s3.png') }}" />
            </div>

            <div class="info" >
                <a href="#"><h3>دعم فني 24/7</h3></a>
                <span>استشارة متواجدة دائما</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item hidden-xs">
            <div class="icon">
                <img alt="services" src="{{ asset('data/s4.png') }}" />
            </div>
            <div class="info">
                <a href="#"><h3>تسوق أمن</h3></a>
                <span>ضمان التسوق الامن</span>
            </div>
        </div>
    </div>
</div>
<!-- end services -->

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 page-top-left">
                <div class="popular-tabs">
                      <ul class="nav-tab">
                        <li class="active"><a data-toggle="tab" href="#tab-1">احدث المنتجات</a></li>
                        <li><a data-toggle="tab" href="#tab-2">اعلى خصومات</a></li>
                        <li><a data-toggle="tab" href="#tab-3">افضل الماركات</a></li>
                      </ul>
                      <div class="tab-container">
                            <div id="tab-1" class="tab-panel active">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":4}}'>
                                    @foreach(\App\third::where('qty', '>', 0)->where('status_id', 2)->orderBy('date', 'desc')->take(5)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach




                                </ul>
                            </div>
                            <div id="tab-2" class="tab-panel">
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "30"  data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":4}}'>


                                    @foreach(\App\third::where('qty', '>', 0)->where('status_id', 2)->orderBy('sale', 'desc')->take(5)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach

                                </ul>
                            </div>
                            <div id="tab-3" class="tab-panel">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":4}}'>

                                    @foreach(\App\third::where('qty', '>', 0)->where('status_id', 2)->orderBy('price', 'desc')->take(5)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach

                                </ul>
                            </div>
                      </div>
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-3 page-top-right">
                <div class="latest-deals">
                    <h2 class="latest-deal-title">اخر العروض</h2>
                    <div class="latest-deal-content">
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":1}}'>
                            <li>
                                <div class="count-down-time" data-countdown="2017/06/27"></div>
                                <div class="left-block">
                                    <a href="detail.html"><img class="img-responsive" alt="product" src="http://www.apexphonesllc.com/wp-content/uploads/2016/03/iphone6-hero-270x330.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.html">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-10%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2017/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="detail.html"><img class="img-responsive" alt="product" src="https://s-media-cache-ak0.pinimg.com/736x/97/52/0b/97520bcc1ae4877463569d2f515d29f5.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.html">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-90%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2017/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="detail.html"><img class="img-responsive" alt="product" src="http://www.epey.com/resim/47835/m_huawei-y6-7.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.html">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-20%)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!---->
<div class="content-page">
    <div class="container">
        <!-- featured category fashion -->
        <?php $elevator = 0;?>
        @foreach(\App\first::where('status', 1)->orderBy('indx')->get() as $fir)
	        @if($fir->id == 10)
	        	<?php $first_id = $fir->id;$elevator++;$owlcolor = 'red';?>
	        	@include('product.home-owl-block')
        	@elseif($fir->id == 6)
        		<?php $first_id = $fir->id;$elevator++;$owlcolor = 'green';?>
	        	@include('product.home-owl-block')
        	@elseif($fir->id == 8)
        		<?php $first_id = $fir->id;$elevator++;$owlcolor = 'blue';?>
	        	@include('product.home-owl-block')
        	@elseif($fir->id == 5)
        		<?php $first_id = $fir->id;$elevator++;$owlcolor = 'orange';?>
	        	@include('product.home-owl-block')
        	@elseif($fir->id == 2)
        		<?php $first_id = $fir->id;$elevator++;$owlcolor = 'gray';?>
	        	@include('product.home-owl-block')
	        @endif
	        
        @endforeach

        







        <!-- Baner bottom -->
        <div class="row banner-bottom">
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="{{ asset('images/sense.jpg') }}" /></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="{{ asset('images/sense.jpg') }}" /></a>
                </div>
            </div>
        </div>
        <!-- end banner bottom -->
    </div>
</div>





@include('product.home_brands')
 
<div id="content-wrap" style="display:none;">
    <div class="container">
        <div id="hot-categories" class="row">
            <div class="col-sm-12 group-title-box">
                <h2 class="group-title ">
                    <span>اقسام الموقع</span>
                </h2>
            </div>

            @foreach(\App\first::orderBy('id', 'desc')->get() as $first)
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">{{$first->title_ar}}</p>
                        </div>
                        <a href="/category/{{\App\first::slug($first->id)}}" class="cate-link link-active" data-ac="flipInX" ><span>تسوق الان</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ $image_url.$first->image }}" alt="{{$first->title_ar}}" class="hot-cate-img img-responsive" />
                        </a>
                    </div>


                </div>
                <div class="cate-content">
                    <ul>
                    	<?php $count = 1;?>
                    	@foreach($first->seconds as $second)
                    	@if($count <= 5)
                        <li><a href="/products/{{\App\second::slug($second->id)}}">{{$second->title_ar}}</a></li>
                        @endif
                        <?php $count++;?>
                        @endforeach


                    </ul>
                </div>
            </div> <!-- /.cate-box -->
            @endforeach



        </div> <!-- /#hot-categories -->

    </div> <!-- /.container -->
</div>
@endsection
