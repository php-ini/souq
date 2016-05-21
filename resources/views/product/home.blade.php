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
                          <li><img alt="Funky roots" src="http://2.bp.blogspot.com/-0tVheG8wkXo/TW7l5diIq7I/AAAAAAAAAZk/RA_G0MiAWw0/s1600/4.jpg" title="Funky roots" /></li>
                          <li><img alt="Funky roots" src="https://az837918.vo.msecnd.net/publishedimages/offers/1057/en-CA/images/1/west-edmonton-mall-shopping-package-L-2.jpg" title="Funky roots" /></li>
                          <li><img  alt="Funky roots" src="http://travelfashiongirl.com/wp-content/uploads/2014/03/Best-Shopping-Spots-Around-Paris.jpg" title="Funky roots" /></li>
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
            <div class="info">
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
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html">
                                            <img class="img-responsive" alt="product" src="{{ asset('data/p48.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html">
                                            <img class="img-responsive" alt="product" src="{{ asset('data/p49.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html"><img class="img-responsive" alt="product" src="{{ asset('data/p50.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html"><img class="img-responsive" alt="product" src="{{ asset('data/p51.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab-3" class="tab-panel">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html"><img class="img-responsive" alt="product" src="{{ asset('data/p60.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html"><img class="img-responsive" alt="product" src="{{ asset('data/p61.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html"><img class="img-responsive" alt="product" src="{{ asset('data/p62.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail.html"><img class="img-responsive" alt="product" src="{{ asset('data/p63.jpg') }}" /></a>
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
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
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

<div class="container">
    <div class="brand-showcase">
        <h2 class="brand-showcase-title">
            brand showcase
        </h2>
        <div class="brand-showcase-box">
            <ul class="brand-showcase-logo owl-carousel" data-loop="true" data-nav = "true" data-dots="false" data-margin = "1" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":5},"1000":{"items":8}}'>
                <li data-tab="showcase-1" class="item active"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-2" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-3" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-4" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-5" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-6" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-7" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-8" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-9" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
            </ul>
            <div class="brand-showcase-content">
                <div class="brand-showcase-content-tab active" id="showcase-1">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p24.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p25.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p26.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p27.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p10.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p11.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p13.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="brand-showcase-content-tab" id="showcase-3">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p14.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p15.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p16.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{ asset('data/p17.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p18.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p19.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p20.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p21.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p22.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p23.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p24.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p25.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p26.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p27.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p28.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p29.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-7">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p30.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p31.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p32.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p15.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p25.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p21.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p10.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p23.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-9">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="detail.html"><img src="{{ asset('data/trademark.jpg') }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-repon" src="{{ asset('data/p24.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p14.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p30.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="detail.html"><img class="img-responsive" src="{{ asset('data/p29.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="detail.html">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div id="content-wrap">
    <div class="container">
        <div id="hot-categories" class="row">
            <div class="col-sm-12 group-title-box">
                <h2 class="group-title ">
                    <span>Hot categories</span>
                </h2>
            </div>
            
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Electronics</p>
                        </div>
                        <a href="" class="cate-link link-active" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product1.png') }}" alt="Electronics" class="hot-cate-img" />
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
            </div> <!-- /.cate-box -->
            
            <div class="col-sm-6  col-lg-3 cate-box">
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
            </div> <!-- /.cate-box -->
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
            </div> <!-- /.cate-box -->
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
            </div> <!-- /.cate-box -->
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
            </div> <!-- /.cate-box -->
            
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
            </div><!-- /.cate-box -->
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
            </div> <!-- /.cate-box -->
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
            </div><!-- /.cate-box -->                                                       
        </div> <!-- /#hot-categories -->
        
    </div> <!-- /.container -->
</div>

@endsection
