@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                          <li><img alt="" src="http://2.bp.blogspot.com/-0tVheG8wkXo/TW7l5diIq7I/AAAAAAAAAZk/RA_G0MiAWw0/s1600/4.jpg" title="" /></li>
                          <li><img alt="" src="https://az837918.vo.msecnd.net/publishedimages/offers/1057/en-CA/images/1/west-edmonton-mall-shopping-package-L-2.jpg" title="" /></li>
                          <li><img  alt="" src="http://travelfashiongirl.com/wp-content/uploads/2014/03/Best-Shopping-Spots-Around-Paris.jpg" title="" /></li>
                        </ul>
                    </div>
                </div>
                <div class="header-banner banner-opacity">
                    <!--<a href="#"><img alt="Funky roots" src="http://images02.oe24.at/8_Martina_Fasslaben_417772a.jpg/1.390.809" /></a>-->
                    <a href="#"><img alt="Funky roots" src="{{ asset('images/temp_side.jpg') }}" style="height: 538px;"/></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<!-- servives -->
<div class="container">
    <div class="service ">
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{ asset('data/s1.png') }}" />
            </div>
            <div class="info">
                <a href="#"><h3>شحن مجانا</h3></a>
                <span>شحن مجاني للمشتريات فوق 500 ريال</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{ asset('data/s2.png') }}" />
            </div>
            <div class="info" style="direction: rtl;">
                <a href="#"><h3>30 يوم ضمان</h3></a>
                <span>ضمان استرجاع النقود خلال 30 يوم</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{ asset('data/s3.png') }}" />
            </div>
            
            <div class="info" >
                <a href="#"><h3>دعم فني 24/7</h3></a>
                <span>استشارة متواجدة دائما</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
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
            <div class="col-xs-12 col-sm-9 page-top-left">
                <div class="popular-tabs">
                      <ul class="nav-tab">
                        <li class="active"><a data-toggle="tab" href="#tab-1">احدث المنتجات</a></li>
                        <li><a data-toggle="tab" href="#tab-2">اعلى خصومات</a></li>
                        <li><a data-toggle="tab" href="#tab-3">افضل الماركات</a></li>
                      </ul>
                      <div class="tab-container">
                            <div id="tab-1" class="tab-panel active">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    @foreach(\App\third::orderBy('date', 'desc')->take(5)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach
                                    
                                    
                                    
                                    
                                </ul>
                            </div>
                            <div id="tab-2" class="tab-panel">
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "30"  data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    
                                    
                                    @foreach(\App\third::orderBy('sale', 'desc')->take(5)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <div id="tab-3" class="tab-panel">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    
                                    @foreach(\App\third::orderBy('price', 'desc')->take(5)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 page-top-right">
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
            </div>
        </div>
    </div>
</div>
<!---->
<div class="content-page">
    <div class="container">
        <!-- featured category fashion -->
        <?php $first_id = 8;$elevator = 1;$owlcolor = 'red';?>
        @include('product.home-owl-block')
        
        <?php $first_id = 3;$elevator = 2;$owlcolor = 'green';?>
        @include('product.home-owl-block')
        
        <?php $first_id = 7;$elevator = 3;$owlcolor = 'orange';?>
        @include('product.home-owl-block')
        
        
        
        
        
        <!-- end featured category fashion -->
        <!-- featured category sports -->
        
        <!-- end featured category sports-->
        
        <!-- featured category electronic -->
        
        <!-- end featured category electronic-->
        <!-- featured category Digital -->
        
        <!-- end featured category Digital-->
        <!-- featured category furniture -->
        
        <!-- end featured category furniture-->
        <!-- featured category jewelry -->
        
        <!-- end featured category jewelry-->
        
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

<div id="content-wrap">
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
                            <img src="{{ $image_url.$first->image }}" alt="{{$first->title_ar}}" class="hot-cate-img" />
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
                        
                        <!--
                        <li><a href="#">Headphone, Headset</a></li>
                        <li><a href="#">Home Audio</a></li>
                        <li><a href="#">Mp3 Player Accessories</a></li>-->
                    </ul>
                </div>
            </div> <!-- /.cate-box -->
            @endforeach
            <!--<div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Sport & Outdoors</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product2.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Golf Supplies</a></li>
                        <li><a href="#">Outdoor & Traveling Supplies</a></li>
                        <li><a href="#">Camping & Hiking</a></li>
                        <li><a href="#">Fishing</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Fashion</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product3.png') }}" alt="Electronics" class="hot-cate-img"/>
                        </a>
                    </div>
                    
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Batteries & Chargers</a></li>
                        <li><a href="#">Headphone, Headset</a></li>
                        <li><a href="#">Home Audio</a></li>
                        <li><a href="#">Mp3 Player Accessories</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Health & Beauty</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product4.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                    
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Bath & Body</a></li>
                        <li><a href="#">Shaving & Hair Removal</a></li>
                        <li><a href="#">Fragrances</a></li>
                        <li><a href="#">Salon & Spa Equipment</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Jewelry & Watches</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product5.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Men Watches</a></li>
                        <li><a href="#">Wedding Rings</a></li>
                        <li><a href="#">Earring</a></li>
                        <li><a href="#">Necklaces</a></li>
                    </ul>
                </div>
            </div> 
            
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Digital</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product6.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Accessories for iPhone</a></li>
                        <li><a href="#">Accessories for iPad</a></li>
                        <li><a href="#">Accessories for Tablet PC</a></li>
                        <li><a href="#">Tablet PC</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Furniture</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product7.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                    
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Batteries & Chargers</a></li>
                        <li><a href="#">Headphone, Headset</a></li>
                        <li><a href="#">Home Audio</a></li>
                        <li><a href="#">Mp3 Player Accessories</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Toys & Hobbies</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product8.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Walkera</a></li>
                        <li><a href="#">Fpv System & Parts</a></li>
                        <li><a href="#">RC Cars & Parts</a></li>
                        <li><a href="#">Helicopters & Part</a></li>
                    </ul>
                </div>
            </div>--><!-- /.cate-box -->    
            
                                                               
        </div> <!-- /#hot-categories -->
        
    </div> <!-- /.container -->
</div>

@endsection
