@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<?php


// Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
// $headers .= 'From: Mashoftesh Support<info@mashoftesh.com>' . "\r\n";
// mail('jinkazama_m@yahoo.com', 'test', 'Hello 7ooda', $headers);




// Mail::send('layouts.sidebar', array(), function($message)
// {
    // $message
        // ->to('jinkazama_m@yahoo.com')
        // ->from('info@prorom.com')
        // ->subject('TEST');
// });
?>



<div class="columns-container productItem" rel="{{$product->id}}">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">بوروروم</a>
            <span class="navigation-pipe">&nbsp;</span>

            <a class="home" href="/category/{{\App\first::slug($product->second->first->id)}}" title="{{$product->second->first->title}}">{{$product->second->first->title_ar}}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="/products/{{\App\second::slug($product->second->id)}}" title="{{$product->second->title}}">{{$product->second->title_ar}}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="/product/{{\App\third::slug($product->id)}}" title="{{$product->title}}">{{$product->title_ar}}</a>

        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
         <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9 col-sm-push-3" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-6">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                    	@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $product->id])->count() > 0)
    <img class="img-responsive" id="product-zoom" src='{{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $product->id])->first()->image }}' data-zoom-image="{{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $product->id])->first()->image }}"/>
                                        @endif

                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="false">
                                            @foreach($product->images as $image)
                                            <li>
                                                <a href="#" data-image="{{ $image_url . $image->image }}" data-zoom-image="{{ $image_url . $image->image }}">
                                                    <img class="img-responsive" id="product-zoom"  src="{{ $image_url . $image->thumb }}" />
                                                </a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                
                                
                                <!-- product-imge-->
                                <div class="form-action">
                                	<p class=""style="margin-bottom: 10px;">الشحن من 3 - 7 ايام</p>
                                    <div class="button-group">
                                        <a class="btn-add-cart add" rel="cart" style="cursor: pointer;">اضف الى عربة التسوق</a>
                                    </div>
                                    <div class="button-group my-margin-top">
                                        <a class="wishlist add" rel="wish" style="cursor: pointer;"><i class="fa fa-heart-o"></i>
                                        المفضلة</a>
                                        <a class="compare add" rel="compare" style="cursor: pointer;"><i class="fa fa-signal"></i>

                                        قارن</a>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-6">
                                <h1 class="product-name">{{ $product->title_ar }}</h1>
                                <div class="product-comments">
                                    <div class="product-star">
                                        @for($s=1; $s<=5; $s++)
                                    	@if($product->stars >= $s)
                                    	<i class="fa fa-star"></i>
                                    	@else
                                    	<i class="fa fa-star-o"></i>
                                    	@endif
                                    	@endfor
                                    </div>
                                    <div class="comments-advices">
                                        <a href="#" style="direction: rtl;"><?=rand(1,15)?> تقييمات</a>
                                        <!--<a href="#"><i class="fa fa-pencil"></i> write a review</a>-->
                                    </div>
                                </div>
                                <div class="product-price-group">

                                    <span class="price"><span class="currency" style="">{{$product->price}}</span> <span class="currency2" style="">{{$currency}} </span>

                                    @if($product->price_before != 0 && $product->price_before != "")
                                        <span class="old-price"><span class="currency"  style="text-decoration: line-through"> {{$currency}}</span><span class="currency2" style="text-decoration: line-through">{{$product->price_before}}</span>
                                        @endif
                                    <span class="discount">-{{ $product->sale }}%</span>
                                </div>
                                <div class="info-orther" style="direction: rtl; text-align: center;">
                                    <p>كود المنتج: #{{ $product->code }}</p>
                                    
                                    <p>الحالة: جديد</p>
                                    
                                    	@if($product->qty <=3 && $product->qty > 0)
                                    	<p style="color: green;">الكمية المتاحة: 
                                    	اخر {{ $product->qty}} قطع
                                    	</p>
                                    	@elseif($product->qty == 0)
                                    	<p style="color: red;">الكمية المتاحة: 
                                    	نفذت الكمية من هذا المنتج!
                                    	</p>
                                    	@endif
                                    	
                                    <p>اسم البائع: @if($product->uid != 0){{$product->member->username}} @else Pororom.com @endif</p>
                                    
                                </div>
                                <div class="product-desc">
                                    {!! substr($product->description_ar, 0, 200) !!}
                                </div>
                                <div class="form-option">
                                    <p class="form-option-title">الخيارات المتاحة</p>
                                    @if(count($product->colors) > 0)
                                    <div class="attributes">
                                        <div class="attribute-label">Color:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                @foreach($product->colors as $color)
                                                <li style="background: {{$color->color->title}};"><a href="#">{{$color->color->title_ar}}</a></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="attributes">
                                        <div class="attribute-label">الكمية:</div>
                                        <div class="attribute-list product-qty">
                                            <div class="qty">
                                                <input id="option-product-qty" type="number" value="1" max="{{$product->qty}}">
                                            </div>
                                            <div class="btn-plus">
                                                <a href="#" class="btn-plus-up">
                                                    <i class="fa fa-caret-up"></i>
                                                </a>
                                                <a href="#" class="btn-plus-down">
                                                    <i class="fa fa-caret-down" style="height: 4px;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($product->sizes) > 0)
                                    <div class="attributes">
                                        <div class="attribute-label">Size:</div>
                                        <div class="attribute-list">
                                            <select>
                                            	@foreach($product->sizes as $size)
                                                <option value="{{$size->size->id}}">{{$size->size->title_ar}}</option>
                                                @endforeach
                                                
                                            </select>

                                        </div>

                                    </div>
                                    @endif


                                    @if($product->second->clothes == 1)
                                    	<a id="size_chart" class="fancybox" href="{{ asset('data/size-chart2.jpg') }}">مخطط المقاسات</a>
                                    @endif
                                </div>

                                <div class="form-share">

                                    <div class="network-share">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab product -->
                        <div class="product-tab">
                            <ul class="nav-tab">
                                <li class="active">
                                    <a aria-expanded="false" data-toggle="tab" href="#product-detail">تفاصيل المنتج</a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#reviews">الاراء والتقييم</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#extra-tabs">فيديو المنتج</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#guarantees">ضمان المنتج</a>
                                </li>
                            </ul>
                            <div class="tab-container">
                                <div id="product-detail" class="tab-panel active">
                                    <p>{!! $product->description_ar !!}</p>
                                </div>

                                <div id="reviews" class="tab-panel">
                                    <div class="product-comments-block-tab">
                                        <div class="comment row">
                                            <div class="col-sm-3 author">
                                                <div class="grade">
                                                    <span>Grade</span>
                                                    <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                                <div class="info-author">
                                                    <span><strong>Jame</strong></span>
                                                    <em>04/08/2015</em>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 commnet-dettail">
                                                Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                            </div>
                                        </div>
                                        <div class="comment row">
                                            <div class="col-sm-3 author">
                                                <div class="grade">
                                                    <span>Grade</span>
                                                    <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                                <div class="info-author">
                                                    <span><strong>Author</strong></span>
                                                    <em>04/08/2015</em>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 commnet-dettail">
                                                Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                            </div>
                                        </div>
                                        <p>
                                            <a class="btn-comment" href="#">Write your review !</a>
                                        </p>
                                    </div>

                                </div>
                                <div id="extra-tabs" class="tab-panel">

	@if($product->video != "")
	<p class="grid-100 tablet-grid-100" style="height: 500px;">
		<?php $you = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","//www.youtube.com/embed/$1",$product->video);
		?>
		<iframe width="100%" height="100%" src="{{ $you }}"></iframe>
</p>
	@else
	<p style="text-align: center;">
	- عفوا.. لايوجد فيديو لهذا المنتج -
	</p>


	@endif

                                </div>
                                <div id="guarantees" class="tab-panel">
                                    <p>تساعد خطط الضمان من سوق.كوم على تغطية السلع التي تم شراؤها ضد المشكلات من بعد عملية الشراء. تدار جميع مطالبات الضمان من مراكز الخدمة لدى سوق.كوم
إحرص دائماً على الحفاظ على التغليف الأصلي للسلعة لتضمن الإستفادة من هذا الضمان. في حال أن السلعة التي قمت بشرائها لم يذكر عليها ضمان سوق.كوم ، فإن السلعة من الممكن أن تكون مشمولة بضمان مقدم من البائع. في هذه الحالة، فإنه لابد للبائع من ذكر هذا في وصف السلعة المذكور على الموقع.</p>
                                </div>
                            </div>
                        </div>
                        <!-- ./tab product -->
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">منتجات مشابهة</h3>
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":3}}'>
                                @foreach(\App\third::where('sid', $product->sid)->orderBy(\DB::raw('RAND()'))->take(6)->get() as $one)
	                                @include('product.one-product', ['noClass' => true])
                                @endforeach

                            </ul>
                        </div>
                        <!-- ./box product -->
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">المنتجات الاكثر عرضا</h3>
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":3}}'>
                                @foreach(\App\third::where('sid', $product->sid)->orderBy('views', 'desc')->take(6)->get() as $one)
	                                @include('product.one-product', ['noClass' => true])
                                @endforeach
                            </ul>
                        </div>
                        <!-- ./box product -->
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3 col-sm-pull-9" id="left_column">
                <!-- block best sellers -->
                <div class="block left-module">
                    <p class="title_block" >منتجات جديدة</p>
                    <div class="block_content">
                        <ul class="products-block best-sell">
                                @foreach(\App\third::orderBy('date')->take(4)->get() as $one)
                                <li>
                                    <div class="products-block-left">
                                        <a href="/product/{{\App\third::slug($one->id)}}">
                                            <img class="img-responsive" alt="product" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" />
                                        </a>
                                    </div>
                                    <div class="products-block-right">
                                        <p class="product-name" style="direction: rtl;">
                                            <a href="/product/{{\App\third::slug($one->id)}}">{{$one->title_ar}}</a>@if($one->brand_ar != "")<span class="brand"> ({{$one->brand_ar}})</span>@endif
                                        </p>
                                        <p class="product-price"><span class="currency" style=""> {{$one->price}} </span><span class="currency2" style="">{{$currency}}</span></p>
                                        <div class="product-star" style="margin-top: 40px;">
	                                        @for($s=1; $s<=5; $s++)
	                                    	@if($one->stars >= $s)
	                                    	<i class="fa fa-star"></i>
	                                    	@else
	                                    	<i class="fa fa-star-o"></i>
	                                    	@endif
	                                    	@endfor
	                                    </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                    </div>
                </div>
                <!-- ./block best sellers  -->
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">اقسام @if(isset($product->second->first->title_ar))({{$product->second->first->title_ar}}) @endif
                    	</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">

                                    <?php $i = 0;
                                    count($product->second->first->seconds);//I Really Don't know why it is not working without this line :/
                                    ?>
                                    @if(isset($product->second->first->seconds) && count($product->second->first->seconds) > 0)
                                    @foreach($product->second->first->seconds as $second)
                                    @if($i < 10)
                                    <li><span></span><a href="/products/{{\App\second::slug($second->id)}}" style="margin-right: 5px;">{{$second->title_ar}}</a></li>
                                    @endif
                                    <?php $i++;?>
                                    @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->


                <!-- left silide -->
                <div class="col-left-slide left-module" style="border: 1px solid #eee;">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        @foreach(\App\image::where(['type'=> 'third', 'status'=>1])->orderBy(\DB::raw('RAND()'))->take(3)->get() as $im)
                        <li><a href="/product/{{\App\third::slug($im->third->id)}}"><img class="img-responsive" src="{{ $image_url . $im->image}}" alt="{{$im->third->title_ar}}" title="{{$im->third->title_ar}}"></a></li>

                        @endforeach
                        <!--<li><a href="#"><img src="assets/data/slide-left2.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="assets/data/slide-left3.png" alt="slide-left"></a></li>-->
                    </ul>
                </div>
                <!--./left silde-->
                <!-- block best sellers -->
                <div class="block left-module">
                    <p class="title_block">خصومات</p>
                    <div class="block_content product-onsale">
                        <ul class="product-list owl-carousel" data-loop="true" data-nav = "false" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                            @foreach(\App\third::where('sale', '>', 0)->orderBy(\DB::raw('RAND()'))->take(3)->get() as $one)
                            <li>
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="/product/{{\App\third::slug($one->id)}}">
                                            <img class="img-responsive" alt="product" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" />
                                        </a>
                                        <div class="price-percent-reduction2">-{{$one->sale}}% OFF</div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="/product/{{\App\third::slug($one->id)}}">{{$one->title_ar}}</a></h5>
                                        <div class="product-star">
	                                        @for($s=1; $s<=5; $s++)
	                                    	@if($one->stars >= $s)
	                                    	<i class="fa fa-star"></i>
	                                    	@else
	                                    	<i class="fa fa-star-o"></i>
	                                    	@endif
	                                    	@endfor
	                                    </div>
                                        <div class="content_price">
	                                        <span class="price product-price"><span class="currency" style=""> {{$one->price}} </span><span class="currency2" style="">{{$currency}}</span>
	                                       </span>
	                                        @if($one->price_before != 0 && $one->price_before != "")
	                                        <span class="price old-price"><span class="currency" style="text-decoration: line-through"> {{$one->price_before}}</span><span class="currency2" style="text-decoration: line-through">{{$currency}}</span>
	                                       </span>
	                                        @endif
	                                    </div>
                                    </div>
                                    <div class="product-bottom">
                                        <a class="btn-add-cart" title="تفاصيل" href="/product/{{\App\third::slug($one->id)}}">تفاصيل</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- ./block best sellers  -->
                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <div class="banner-opacity">
                        <!-- <a href="#"><img class="img-responsive" src="{{ asset('data/ads-banner.jpg') }}" alt="ads-banner"></a> -->
                    </div>
                </div>
                <!--./left silde-->
            </div>
            <!-- ./left colunm -->

        </div>
        <!-- ./row-->
    </div>
</div>

<style>
	#left_column .block .title_block{
		text-align: center;
		direction: rtl;
	}
	.tree-menu li {
    	direction: rtl;
    	text-align: right;
	}
	.tree-menu > li >span:before {
    	content: "\f104";
   }
   #product .pb-right-column .form-action, .sendtofriend-print {
	    direction: rtl;
	    text-align: center;
   }
   .product-tab .nav-tab>li{
   		float: right;
   		margin-right: 0;
   		margin-left: 8px;
   }
   .product-tab .nav-tab>li:last-child {
    	margin-left: 8px;
	}
	.product-tab .tab-container p{
		direction: rtl;
	}


</style>

@endsection
