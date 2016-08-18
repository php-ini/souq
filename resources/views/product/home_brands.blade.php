
<div class="container">
    <div class="brand-showcase">
        <h2 class="brand-showcase-title">
            الماركات التجارية
        </h2>
        <div class="brand-showcase-box">
            <ul class="brand-showcase-logo owl-carousel" data-loop="true" data-nav = "true" data-dots="false" data-margin = "1" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":5},"1000":{"items":8}}'>
                <?php $i = 1;?>
                @foreach(\App\brands::where('id', '<>', 15)->get() as $brand)
                @if(count($brand->thirds) > 0)
                <?php //echo"<pre>";print_r($brand->thirds()->toArray());exit;?>
                <li data-tab="showcase-{{$i}}" class="item @if($i == 1)active @endif"><img src="{{ $image_url . $brand->image }}" alt="logo" class="item-img" /></li>
                <?php $i++;?>
                @endif
                @endforeach
                <!--<li data-tab="showcase-2" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-3" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-4" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-5" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-6" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-7" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-8" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-9" class="item"><img src="{{ asset('data/gucci.png') }}" alt="logo" class="item-img" /></li>-->
            </ul>
            <div class="brand-showcase-content">
            	
            	<?php $i = 1;?>
                @foreach(\App\brands::all() as $brand)
                @if(count($brand->thirds) > 0)
                <div class="brand-showcase-content-tab @if($i == 1)active @endif" id="showcase-{{$i}}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="/brand/{{$brand->id}}"><img src="{{ $image_url . $brand->image }}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                {!! $brand->description_ar !!}
                            </div>
                            <a href="/brand/{{$brand->title}}" class="trademark-link">شاهد المنتجات</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                            	@if(count($brand->thirds) > 0)
                            	<?php $tot = 1;?>
                            	@foreach($brand->thirds as $one)
                            	@if($tot <= 4)
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="/product/{{\App\third::slug($one->id)}}">
                                        	<img class="img-repon" alt="product" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" /></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="/product/{{\App\third::slug($one->id)}}">
                                            <h5>{{$one->title_ar}}</h5>
                                        </a>
                                        <span class="product-price"><span class="currency" style="margin-top: 4px;">{{$currency}}</span> {{$one->price}} </span>
                                        @if($one->price_before != 0 && $one->price_before != "")
                                        <span class="price old-price" style="text-decoration: line-through"><span class="currency" style="text-decoration: line-through">{{$currency}}</span> {{$one->price_before}}</span>
                                        @endif
                                        </span>
                                        <div class="product-star">
                                            @for($s=1; $s<=5; $s++)
		                                    	@if($one->stars >= $s)
		                                    		<i class="fa fa-star"></i>
		                                    	@else
		                                    		<i class="fa fa-star-o"></i>
		                                    	@endif
	                                    	@endfor
                                        </div>
                                        <a class="btn-view-more" title="المزيد" href="/product/{{\App\third::slug($one->id)}}">المزيد</a>
                                    </div>
                                </div>
                                @endif
                                <?php $tot++;?>
                                @endforeach
                                @endif
                                
                                <!--
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
                                -->
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;?>
                @endif
                @endforeach
                
                
                <!--
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
               -->
                
                
            </div>
        </div>
        
    </div>
</div>

<style>
	.item .item-img{
	    width: 100px !important;
	    height: 50px;
	    margin: 0px 11px;
	}
	.trademark-logo img{
		width: 150px;
	}
	.trademark-logo{
		text-align: center;
	}
	.trademark-product .product-item{
		height: 180px;
	}
	
	.trademark-info .trademark-desc{
		text-align: right;
		direction: rtl;
	}
	
</style>
