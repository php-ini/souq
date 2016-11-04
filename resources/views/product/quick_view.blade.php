<div id="product" >
                        <div class="primary-box row productItem" rel="{{$product->id}}">
                            <div class="pb-left-column col-xs-12 col-sm-6">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                        <img class="img-responsive" id="product-zoom" src='{{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $product->id])->first()->image }}' data-zoom-image="{{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $product->id])->first()->image }}"/>
                                                
                                                
                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="false">
                                            @foreach($product->images as $image)
                                            <li>
                                                <a href="#" data-image="{{ $image_url . $image->image }}" data-zoom-image="{{ $image_url . $image->image }}">
                                                    <img clsas="img-responsive" id="product-zoom"  src="{{ $image_url . $image->thumb }}" /> 
                                                </a>
                                            </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- product-imge-->
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
                                    <span class="price"><span class="currency" style="margin-top: 4px;">{{$currency}}</span> {{$product->price}} </span>
                                    
                                    @if($product->price_before != 0 && $product->price_before != "")
                                        <span class="old-price"><span class="currency" style="text-decoration: line-through">{{$currency}}</span> {{$product->price_before}}</span>
                                        @endif
                                    <span class="discount">-{{ $product->sale }}%</span>
                                </div>
                                <div class="info-orther" style="direction: rtl; text-align: center;">
                                    <p>كود المنتج: #{{ $product->code }}</p>
                                    <p>التوفر: <span class="in-stock">متوفر</span></p>
                                    <p>الحالة: جديد</p>
                                </div>
                                <div class="product-desc">
                                    {!! substr($product->description_ar, 0, 200) !!} 
                                </div>
                                <div class="form-option">
                                    <p class="form-option-title">الخيارات المتاحة</p>
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
                                    <div class="attributes">
                                        <div class="attribute-label">Qty:</div>
                                        <div class="attribute-list product-qty">
                                            <div class="qty">
                                                <input id="option-product-qty" type="text" value="1">
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
                                    <div class="attributes">
                                        <div class="attribute-label">Size:</div>
                                        <div class="attribute-list">
                                            <select>
                                            	@foreach($product->sizes as $size)
                                                <option value="{{$size->size->id}}">{{$size->size->title_ar}}</option>
                                                @endforeach
                                                
                                            </select>
                                            <a id="size_chart" class="fancybox" target="_blank" href="{{ asset('data/size-chart2.jpg') }}">مخطط المقاسات</a>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart add" rel="cart">اضف الى عربة التسوق</a>
                                    </div>
                                    <div class="button-group">
                                        <a class="wishlist add" rel="wish"><i class="fa fa-heart-o"></i>
                                        <br>المفضلة</a>
                                        <a class="compare add" rel="compare"><i class="fa fa-signal"></i>
                                        <br>        
                                        قارن</a>
                                    </div>
                                </div>
                                <div class="form-share">
                                    <div class="sendtofriend-print">
                                        <!--<a href="javascript:print();"><i class="fa fa-print"></i> اطبع</a>
                                        <a href="#"><i class="fa fa-envelope-o fa-fw"></i>ارسل لصديق</a>-->
                                    </div>
                                    <div class="network-share">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab product -->
                        
                        
                        
                        <!-- ./box product -->
                    </div>