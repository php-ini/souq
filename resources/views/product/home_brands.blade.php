
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
                <li data-tab="showcase-{{$i}}" class="item @if($i == 1)active @endif"><img src="{{ $image_url . $brand->image }}" alt="logo" class="item-img img-responsive" /></li>
                <?php $i++;?>
                @endif
                @endforeach

            </ul>
            <div class="brand-showcase-content">

            	<?php $i = 1;?>
                @foreach(\App\brands::all() as $brand)
                @if(count($brand->thirds) > 0)
                <div class="brand-showcase-content-tab @if($i == 1)active @endif" id="showcase-{{$i}}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="/brand/{{$brand->title}}"><img class="img-responsive" src="{{ $image_url . $brand->image }}" alt="trademark"></a>
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
                                        	<img class="img-repon img-responsive" alt="product" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" /></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="/product/{{\App\third::slug($one->id)}}">
                                            <h5>{{$one->title_ar}}</h5>
                                        </a>
                                        <span class="price product-price"><span class="currency" style=""> {{$one->price}} </span> <span class="currency2"> {{$currency}} </span>
                                        @if($one->price_before != 0 && $one->price_before != "")
                                        <span class="price old-price" style="color: darkgray;"><span class="currency"  style="text-decoration: line-through"> {{$one->price_before}}</span><span class="currency2" style="text-decoration: line-through">{{$currency}}</span>
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




                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;?>
                @endif
                @endforeach





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
