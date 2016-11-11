<li @if(!isset($noClass))class="col-sx-12 col-sm-4"@endif>
                            <div class="product-container productItem" rel={{$one->id}}
                            	<?php
                            	$wish = count(\Request::session()->get('wish')) > 0 ? \Request::session()->get('wish') : [];
                            	$compare = count(\Request::session()->get('compare')) > 0 ? \Request::session()->get('compare') : [];
                            	$cart = count(\Request::session()->get('cart')) > 0 ? \Request::session()->get('cart') : [];
								
								if(in_array($one->id, $wish)){
									echo " style='border: 1px solid coral;'";
								}elseif(in_array($one->id, $compare)){
									echo " style='border: 1px solid cornflowerblue;'";
								}elseif(in_array($one->id, $cart)){
									echo " style='border: 1px solid darkgreen;'";
								}
								
								?>
                            	>
                            	
                                <div class="left-block">
                                    <a href="/product/{{\App\third::slug($one->id)}}">
                                        <img class="img-responsive" alt="product" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->thumb }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="اضف الى قائمة المفضلة" class="heart add" rel="wish" style="cursor: pointer;" ></a>
                                            <a title="قارن المنتج" class="compare add" rel="compare" style="cursor: pointer;"></a>
                                            <a title="عرض سريع" class="search" style="cursor: pointer;"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" class="add" rel="cart" style="cursor: pointer;">اضف الى عربة المشتريات</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="/product/{{\App\third::slug($one->id)}}">{{$one->title_ar}}</a>
                                    	@if($one->brandz->title_ar != "")<span class="brand"> @if($one->brandz->id != 15)({{$one->brandz->title_ar}}) <img  src="{{$image_url.$one->brandz->image}}" width="40" class="img-responsive" /> @endif</span>@endif</h5>
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
                                        <span class="price old-price"><span class="currency" style="text-decoration: line-through"> {{$one->price_before}}</span><span class="currency2" style="text-decoration: line-through;">{{$currency}}</span>
                                       </span>
                                        @endif
                                    </div>
                                    <div class="info-orther">
                                        @if($one->code != "")<p style="display: block; clear: both;">كود المنتج: {{$one->code}}</p>@endif
                                        <?php
                                        $avail[0] = "غير متوفر";
										$avail[1] = "متوفر حاليا";
										?>
                                        <p class="availability">التوفر: <span>{{ $avail[$one->available]}}</span></p>
                                        <div class="product-desc">
                                            {!! substr($one->description_ar, 0, 100) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>