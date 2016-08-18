<?php
$input = \Request::all();
		$ids = \Request::session()->get('cart');
		$prods = \App\third::whereIn('id', $ids)->get();
		$prodsCount = \App\third::whereIn('id', $ids)->count();
		if(!isset($image_url))$image_url = "http://perfectteamwork.com/";
		if(!isset($currency))$currency = "ريال";
		
		?>

<a class="cart-link" href="cart">
                    <span class="title">عربة التسوق</span>
                    <span class="total" style="direction: rtl;">
                    	@if($prodsCount == 0)
                        	<span style="float: left;">لاتوجد منتجات في عربة التسوق</span>
                        	@else
                        	<span style="float: left;">منتج في عربة التسوق</span> <span>{{$prodsCount}}</span>
                        	@endif
                        	 </span>
                    <span class="notify notify-left">{{$prodsCount}}</span>
                </a>

<div class="cart-block">
                    <div class="cart-block-content">
                        <h5 class="cart-title"><span style="float: left;">منتج في عربة التسوق</span> <span>{{$prodsCount}}</span></h5>
                        @if($prodsCount == 0)
                        
                        <div class="noProd" style="margin-top: 10px;">عفوا.. لاتوجد منتجات في سلة المشتريات</div>
                        @elseif($prodsCount > 0)
                        <div class="cart-block-list">
                            <ul>
                            	<?php $total = 0;?>
                            	@foreach($prods as $prod)
                                <li class="product-info productItem" rel="{{$prod->id}}" data="{{\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $prod->id])->first()->image}}">
                                    <div class="p-left">
                                        <a style="cursor: pointer;position: relative;" class="remove_link remove" rel="cart"></a>
                                        <a href="/product/{{\App\third::slug($prod->id)}}">
                                        <img class="img-responsive" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $prod->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $prod->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" alt="{{$prod->title_ar}}">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name"><a href="/product/{{\App\third::slug($prod->id)}}">{{$prod->title_ar}}</a></p>
                                        <p class="p-rice"><span class="currency" style="margin-top: 4px;">{{$currency}}</span> {{$prod->price}} </p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>
                                <?php $total += $prod->price;?>
                                @endforeach
                                <!--<li class="product-info">
                                    <div class="p-left">
                                        <a href="#" class="remove_link"></a>
                                        <a href="#">
                                        <img class="img-responsive" src="{{ asset('data/product-s5-100x122.jpg') }}" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">Donec Ac Tempus</p>
                                        <p class="p-rice">61,19 €</p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>-->
                            </ul>
                        </div>
                        <div class="toal-cart">
                            <span>المجموع</span>
                            <span class="toal-price pull-right"><span class="currency" style="margin-top: 4px;">{{$currency}}</span> {{$total}}</span>
                        </div>
                        <div class="cart-buttons">
                            <a href="/cart" class="btn-check-out">اكمال الشراء</a>
                        </div>
                        
                        @endif
                    </div>
                </div>