<li>
                                        <div class="left-block">
                                            <a href="/product/{{\App\third::slug($one->id)}}">
                                            	
                                                <img class="img-responsive" alt="product" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" />
                                            </a>
                                            <div class="quick-view">
                                                    <a title="اضف الى قائمة المفضلة" class="heart" href="#"></a>
                                                    <a title="قارن المنتج" class="compare" href="#"></a>
                                                    <a title="عرض سريع" class="search" href="#"></a>
                                            </div>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">اضف الى عربة المشتريات</a>
                                            </div>
                                            <div class="group-price">
                                                <span class="product-new">جديد</span>
                                                @if($one->sale > 0)
                                                <span class="product-sale" style="direction: rtl;">خصم{{$one->sale . "%"}}</span>
                                                @endif
                                                @if($one->code != "")<span class="product-new">{{$one->code}}</span>@endif
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="/product/{{\App\third::slug($one->id)}}">{{$one->title_ar}}</a>@if($one->brand_ar != "")<span class="brand"> ({{$one->brand_ar}})</span>@endif</h5>
                                            <div class="content_price">
                                                <span class="price product-price"><span class="currency" style="margin-top: 4px;">{{$currency}}</span> {{$one->price}} </span>
                                                @if($one->price_before != 0 && $one->price_before != "")
                                                <span class="price old-price"><span class="currency" style="text-decoration: line-through">{{$currency}}</span> {{$one->price_before}}</span>
                                                @endif
                                            </div>
                                            <div class="product-star">
                                            	@for($s=1; $s<=5; $s++)
                                            	@if($one->stars >= $s)
                                            	<i class="fa fa-star"></i>
                                            	@else
                                            	<i class="fa fa-star-o"></i>
                                            	@endif
                                            	@endfor
                                                <!--<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>-->
                                            </div>
                                        </div>
                                    </li>