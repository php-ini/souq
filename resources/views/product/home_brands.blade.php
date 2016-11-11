
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
                <li onclick="location.href='/brand/{{$brand->title}}';return;" data-tab="showcase-{{$i}}" class="item @if($i == 1)active @endif"><img src="{{ $image_url . $brand->image }}" alt="logo" class="item-img img-responsive" /></li>
                <?php $i++;?>
                @endif
                @endforeach

            </ul>
            
            
            
            
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
