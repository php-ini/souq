


<div class="column col-xs-12 col-sm-3 col-sm-pull-9" id="left_column" style="">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Today's Deals</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered">
                            <div class="layered-content">
                                <div class="today-deals">
                                    <ul class="deals-product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3,"margin":20},"1000":{"items":1}}'>
                                        <li>
                                            <div class="product-conatainer">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('data/ld2.jpg') }}" alt="Product">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="show-count-down">
                                                        <span class="countdown-lastest" data-y="2017" data-m="7" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                                                    </div>
                                                    <h5 class="product-name">
                                                        <a href="#"> Jackets and coats</a>
                                                    </h5>
                                                    <div class="product-meta">
                                                        <span class="price">$38,95</span>
                                                        <span class="old-price">$52,00</span>
                                                        <span class="star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-conatainer">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('data/ld1.jpg') }}" alt="Product">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="show-count-down">
                                                        <span class="countdown-lastest" data-y="2017" data-m="7" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                                                    </div>
                                                    <h5 class="product-name">
                                                        <a href="#"> Jackets and coats</a>
                                                    </h5>
                                                    <div class="product-meta">
                                                        <span class="price">$38,95</span>
                                                        <span class="old-price">$52,00</span>
                                                        <span class="star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-conatainer">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('data/ld3.jpg') }}" alt="Product">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="show-count-down">
                                                        <span class="countdown-lastest" data-y="2015" data-m="7" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                                                    </div>
                                                    <h5 class="product-name">
                                                        <a href="#"> Jackets and coats</a>
                                                    </h5>
                                                    <div class="product-meta">
                                                        <span class="price">$38,95</span>
                                                        <span class="old-price">$52,00</span>
                                                        <span class="star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
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
                                    
                                    <!--<li>
                                        <input type="checkbox" id="c2" name="cc" />
                                        <label for="c2">
                                        <span class="button"></span>
                                        T-shirts<span class="count">(10)</span>
                                        </label>
                                    </li>-->
                                    
                                    
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
                                <!--<ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="p1" name="price_range[]" />
                                        <label for="p1">
                                        <span class="button"></span>
                                        $20 - $50<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p2" name="cc" />
                                        <label for="p2">
                                        <span class="button"></span>
                                        $50 - $100<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p3" name="cc" />
                                        <label for="p3">
                                        <span class="button"></span>
                                        $100 - $250<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                </ul>-->
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
                                    <!--<li>
                                        <input type="checkbox" id="color1" name="cc" />
                                        <label style=" background:#aab2bd;" for="color1"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color2" name="cc" />
                                        <label style=" background:#cfc4a6;" for="color2"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color3" name="cc" />
                                        <label style=" background:#aab2bd;" for="color3"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color4" name="cc" />
                                        <label style=" background:#fccacd;" for="color4"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color5" name="cc" />
                                        <label style="background:#964b00;" for="color5"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color6" name="cc" />
                                        <label style=" background:#faebd7;" for="color6"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color7" name="cc" />
                                        <label style=" background:#e84c3d;" for="color7"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color8" name="cc" />
                                        <label style=" background:#c19a6b;" for="color8"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color9" name="cc" />
                                        <label style=" background:#f39c11;" for="color9"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color10" name="cc" />
                                        <label style=" background:#5d9cec;" for="color10"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color11" name="cc" />
                                        <label style=" background:#a0d468;" for="color11"><span class="button"></span></label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="color12" name="cc" />
                                        <label style=" background:#f1c40f;" for="color12"><span class="button"></span></label>   
                                    </li>-->

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
                                    <!--li>
                                        <input type="checkbox" id="brand2" name="cc" />
                                        <label for="brand2">
                                        <span class="button"></span>
                                        Mamypokon<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="brand3" name="cc" />
                                        <label for="brand3">
                                        <span class="button"></span>
                                        Pamperson<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="brand4" name="cc" />
                                        <label for="brand4">
                                        <span class="button"></span>
                                        Pumano<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="brand5" name="cc" />
                                        <label for="brand5">
                                        <span class="button"></span>
                                        AME<span class="count">(0)</span>
                                        </label>   
                                    </li>-->
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
                                    <!--<li>
                                        <input type="checkbox" id="size2" name="cc" />
                                        <label for="size2">
                                        <span class="button"></span>XXL
                                        </label>   
                                    </li>-->
                                    
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
                    <p class="title_block">SPECIAL PRODUCTS</p>
                    <div class="block_content">
                        <ul class="products-block">
                            <li>
                                <div class="products-block-left">
                                    <a href="#">
                                        <img src="{{ asset('data/product-100x122.jpg') }}" alt="SPECIAL PRODUCTS">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="#">Woman Within Plus Size Flared</a>
                                    </p>
                                    <p class="product-price">$38,95</p>
                                    <p class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </p>
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
                <!--<div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level1">good</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                        </div>
                    </div>
                </div>-->
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