


<div class="column col-xs-12 col-sm-3 col-sm-pull-9" id="left_column" style="">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">عروض اليوم</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered">
                            <div class="layered-content">
                                <div class="today-deals">
                                    <ul class="deals-product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3,"margin":20},"1000":{"items":1}}'>
                                        @foreach(\App\image::where(['type'=> 'third', 'status'=>1])->orderBy(\DB::raw('RAND()'))->take(3)->get() as $im)
                                        <li>
                                            <div class="product-conatainer">
                                                <div class="product-thumb">
                                                    <a href="/product/{{\App\third::slug($im->third->id)}}"><img class="img-responsive" src="{{ $image_url . $im->image}}" alt="{{$im->third->title_ar}}" title="{{$im->third->title_ar}}"></a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="show-count-down">
                                                        <span class="countdown-lastest" data-y="2017" data-m="7" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                                                    </div>
                                                    <h5 class="product-name">
                                                        <a href="/product/{{\App\third::slug($im->third->id)}}"> {{$im->third->title_ar}}</a>
                                                    </h5>
                                                    <div class="product-meta">
                                                        <span class="price" style="direction: rtl;">{{$im->third->price}}{{$currency}}</span>
                                                        @if($im->third->price_before > 0 && $im->third->sale > 0)
                                                        <span class="old-price" style="direction: rtl;float: right;">{{$im->third->price_before}}{{$currency}}</span>
                                                        @endif
                                                        <!--<span class="star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </span>-->
                                                        <div class="star">
					                                        @for($s=1; $s<=5; $s++)
					                                    	@if($im->third->stars >= $s)
					                                    	<i class="fa fa-star"></i>
					                                    	@else
					                                    	<i class="fa fa-star-o"></i>
					                                    	@endif
					                                    	@endfor
					                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                @if(\Request::route()->getName() == 'products' || \Request::route()->getName() == 'productRedirect')
                <!--Filter -->
                <div class="block left-module">
                    <p class="title_block" style="text-align: center;">تصفية المنتجات</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter categgory -->
                            <form method="POST" action="/products/{{\App\second::slug($second->id)}}">
                            <div class="layered_subtitle "  style="text-align: center;">اقسام اخرى</div>
                            <div class="layered-content sections">
                                <ul class="check-box-list">
                                	<ul class="nav nav-list">
                                    @foreach(\DB::table('groups')->get() as $group)
                                    
                                    
                                	@if(\App\second::where(['group_id'=> $group->id, 'pid' => $second->first->id])->count() > 0)
						            <li><label class="tree-toggler nav-header">{{$group->title_ar}}</label>
						                <ul class="nav nav-list tree" style="display: none">
						                    @foreach(\App\second::where(['group_id' => $group->id, 'pid' => $second->first->id])->get() as $cat)
						                    <li><a href="/products/{{\App\second::slug($cat->id)}}"><span class=" fa fa-caret-left"></span> {{ $cat->title_ar }}</a></li>
						                    @endforeach
						                    
						                </ul>
						            </li>
						            
						            @endif
                                    
                                    @endforeach
                                    </ul>
                                    
                                    
                                    
                                    
                                </ul>
                            </div> 
 <style>
 	.sections .check-box-list li {
	    line-height: 25px;
	}
	.sections .nav>li>a{
		padding: 0px 15px 4px;
	}
	.sections .check-box-list label {
	    font-size: 13px;
	    font-weight: bold;
	}
 </style>       
    <script>                            
            $(document).ready(function () {
				$('label.tree-toggler').click(function () {
					$(this).parent().children('ul.tree').toggle(300);
				});
			});
</script>
                            <!-- ./filter categgory -->
                            <!-- filter price -->
                            <div class="layered_subtitle" style="text-align: center">تصفية بالسعر</div>
                            <div class="layered-content slider-range">
                                
                                <div data-label-reasult="مدى السعر:" data-min="{{$filter['min_price']}}" data-max="{{$filter['max_price']}}" data-unit="ريال" class="slider-range-price" data-value-min="{{$filter['sel_min_price']}}" data-value-max="{{$filter['sel_max_price']}}"></div>
                                <div class="amount-range-price" style="direction: rtl;text-align: center;">مدى السعر: {{$filter['sel_min_price']}} - {{$filter['sel_max_price']}}</div>
                                <input name="min_price" value="{{$filter['sel_min_price']}}" type="hidden" />
                                <input name="max_price" value="{{$filter['sel_max_price']}}" type="hidden" />
                                
                            </div>
                            <!-- ./filter price -->
                            <!-- filter color -->
                            <div class="layered_subtitle" style="text-align: center">تصفية باللون</div>
                            <div class="layered-content filter-color">
                                <ul class="check-box-list">
                                	<?php $cc = 1;?>
                                    @foreach(\App\third_color::where('sid', $second->id)->get() as $color)
                                    <li>
                                        <input type="checkbox" id="color{{$cc}}" name="color[]" value="{{$color->color->id}}"
                                        @if(isset($filter['color']) && count($filter['color']) > 0)
                                        @foreach($filter['color'] as $col)
                                        @if($col == $color->color->id)
                                        checked="checked"
                                        @endif
                                        @endforeach
                                        @endif
                                         />
                                        <label style=" background: {{$color->color->title}};" for="color{{$cc}}"><span class="button"></span></label>   
                                    </li>
                                    <?php $cc++;?>
                                    @endforeach
                                    

                                </ul>
                            </div>
                            <!-- ./filter color -->
                            <!-- ./filter brand -->
                            <div class="layered_subtitle" style="text-align: center">العلامة التجارية</div>
                            <div class="layered-content filter-brand">
                                <ul class="check-box-list">
                                	<?php $bb = 1;
                                	// echo $second->id;exit;
                                	?>
                                    @foreach(\App\third::where('sid', $second->id)->groupBy('brand')->get() as $brand)
                                    <li>
                                        <input type="checkbox" id="brand{{$bb}}" name="brand[]" value="{{$brand->brandz->id}}"
                                        @if(isset($filter['brand']) && count($filter['brand']) > 0)
                                        
                                        @foreach($filter['brand'] as $bra)
                                        @if($bra == $brand->brandz->id)
                                        checked="checked"
                                        @endif
                                        @endforeach
                                        @endif
                                         />
                                        <label for="brand{{$bb}}">
                                        <span class="button"></span>
                                        {{$brand->brandz->title_ar}}<span class="count"> ({{\App\third::where(['sid'=> $second->id, 'brand' => $brand->brandz->id])->count()}})</span>
                                        </label>   
                                    </li>
                                    <?php $bb++;?>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <!-- ./filter brand -->
                            <!-- ./filter size -->
                            <div class="layered_subtitle" style="text-align: center;">تصفية بالمقاس</div>
                            <div class="layered-content filter-size">
                                <ul class="check-box-list">
                                    <?php $ss = 1;?>
                                    @foreach(\App\third_size::where('sid', $second->id)->get() as $size)
                                    <li>
                                        <input type="checkbox" id="size{{$ss}}" name="size[]" value="{{$size->size->id}}"
                                        @if(isset($filter['size']) && count($filter['size']) > 0)
                                        @foreach($filter['size'] as $siz)
                                        @if($siz == $size->size->id)
                                        checked="checked"
                                        @endif
                                        @endforeach
                                        @endif
                                         />
                                        <label for="size{{$ss}}">
                                        <span class="button"></span>{{$size->size->title_ar}}
                                        </label>   
                                    </li>
                                    <?php $ss++;?>
                                    @endforeach
                                    
                                    
                                </ul>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <input type="hidden" name="sort" value="{{$filter['sort']}}" />
                            <input type="hidden" name="sort_type" value="{{$filter['sort_type']}}" />
                            <!-- ./filter size -->
                            <button type="submit"  class="btn btn-success" >تصفية البحث</button>
                            </form>
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>
                
                <!--Filter -->
                @endif
                
                
                
                
                <!-- left silide -->
                <div class="col-left-slide left-module" style="border: 1px solid #eee;">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        @foreach(\App\image::where(['type'=> 'third', 'status'=>1])->orderBy(\DB::raw('RAND()'))->take(3)->get() as $im)
                        <li><a href="/product/{{\App\third::slug($im->third->id)}}"><img src="{{ $image_url . $im->image}}" alt="{{$im->third->title_ar}}" title="{{$im->third->title_ar}}"></a></li>
                        
                        @endforeach
                        <!--<li><a href="#"><img src="assets/data/slide-left2.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="assets/data/slide-left3.png" alt="slide-left"></a></li>-->
                    </ul>
                </div>
                <!--./left silde-->
                <!-- SPECIAL -->
                <div class="block left-module">
                    <p class="title_block">منتجات خاصة</p>
                    <div class="block_content">
                        <ul class="products-block">
                        	<?php
                        	$one = \App\third::orderBy('views', 'desc')->first();
                        	?>
                            <li>
                                <div class="products-block-left">
                                    <a href="/product/{{\App\third::slug($one->id)}}">
                                            <img class="img-responsive" alt="{{$one->title_ar}}" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" />
                                        </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="/product/{{\App\third::slug($one->id)}}">{{$one->title_ar}}</a>
                                    </p>
                                    <p class="product-price">{{$one->price}}{{$currency}}</p>
                                    <div class="product-star">
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
                        </ul>
                        <div class="products-block">
                            <div class="products-block-bottom">
                                <a class="link-all" href="#">All Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./SPECIAL -->
                <!-- TAGS -->
                
                <!-- ./TAGS -->
                <!-- Testimonials -->
                <div class="block left-module">
                    <p class="title_block">اراء العملاء</p>
                    <div class="block_content">
                        <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                            <li>
                                <div class="client-mane">Mahmoud Mostafa</div>
                                <div class="client-avarta">
                                    <img src="{{ asset('data/testimonial.jpg') }}" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "خدمات متميزة وسرعة في الاستجابة من ناحية فريق الموقع"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">طارق خير</div>
                                <div class="client-avarta">
                                    <img src="{{ asset('data/testimonial.jpg') }}" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "اسعار المنتجات اقل تقريبا من اسعار السوق المحلي"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">محمد علي</div>
                                <div class="client-avarta">
                                    <img src="{{ asset('data/testimonial.jpg') }}" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "شكرا لدعم فريق العمل الرائع وخدمة مابعد البيع"
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./Testimonials -->
            </div>
            
            <style>
            	.check-box-list li {
				    direction: rtl;
				    text-align: right;
				}
            	
            </style>