@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">بوروروم</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">مقارنة المنتجات</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">مقارنة المنتجات</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
        	@if(count($products) > 0)
            <table class="table table-bordered table-compare">
                <tr>
                    <td class="compare-label">Product Image</td>
                    @foreach($products as $one)
                    <td>
                        <a href="/product/{{\App\third::slug($one->id)}}"><img class="img-responsive" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" onerror="this.src='{{asset('images/not_found.jpg')}}';" alt="Product"></a>
                    </td>
                    @endforeach
                    <!--
                    <td>
                        <a href="#"><img src="assets/data/p42.jpg" alt="Product"></a>
                    </td>
                    <td>
                        <a href="#"><img src="assets/data/p41.jpg" alt="Product"></a>
                    </td>
                    -->
                </tr>
                <tr>
                    <td class="compare-label">Product Name</td>
                    @foreach($products as $one)
                    <td>
                        <a href="/product/{{\App\third::slug($one->id)}}">{{$one->title_ar}}</a>
                    </td>
                    @endforeach
                    <!--
                    <td>
                        <a href="#">Perfomax</a>
                    </td>
                    <td>
                        <a href="#">Perfomax</a>
                    </td>-->
                </tr>
                <tr>
                    <td class="compare-label">Rating</td>
                    @foreach($products as $one)
                    <td>
                        <div class="product-star">
                            @for($s=1; $s<=5; $s++)
                        	@if($one->stars >= $s)
                        	<i class="fa fa-star"></i>
                        	@else
                        	<i class="fa fa-star-o"></i>
                        	@endif
                        	@endfor
                        </div>
                    </td>
                    @endforeach
                    <!--
                    <td>
                        <div class="product-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(3 Reviews)</span>
                        </div>
                    </td>
                    <td>
                        <div class="product-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(3 Reviews)</span>
                        </div>
                    </td>
                    -->
                </tr>
                <tr>
                    <td class="compare-label">Price</td>
                    @foreach($products as $one)
                    <td class=""><span class="currency" style="margin-top: 4px;">{{$currency}}</span> {{$one->price}} 
                                        @if($one->price_before != 0 && $one->price_before != "")
                                        <span class="price old-price" style="text-decoration: line-through"><span class="currency">{{$currency}}</span> {{$one->price_before}}</span>
                                        @endif</td>
                    @endforeach
                    <!--
                    <td class="price">$21</td>
                    <td class="price">$20.5</td>
                    -->
                </tr>
                <tr>
                    <td class="compare-label">Description</td>
                    @foreach($products as $one)
                    <td>{!! $one->description_ar !!}</td>
                    @endforeach
                    <!--
                    <td>Printed evening dress with straight sleeves with black thin waist belt and ruffled linings.</td>
                    <td>Printed evening dress with straight sleeves with black thin waist belt and ruffled linings.</td>
                    -->
                </tr>
                <tr>
                    <td class="compare-label">Manufacturer</td>
                    @foreach($products as $one)
                    <td>{!! $one->brandz->title_ar !!}</td>
                    @endforeach
                    <!--
                    <td>Nakia</td>
                    <td>Gola</td>
                    -->
                </tr>
                <tr>
                	<?php
                    $avail[0] = "غير متوفر";
					$avail[1] = "متوفر حاليا";
					?>
                	<td class="compare-label">Availability</td>
                	@foreach($products as $one)
                    <td class="instock">{{ $avail[$one->available]}}</td>
                    @endforeach
                    <!--
                    <td class="outofstock">Out of stock</td>
                    <td class="instock">Instock (20 items)</td>
                    -->
                </tr>
                <!--<tr>
                    <td class="compare-label">SKU</td>
                    <td>#873289</td>
                    <td>#874389</td>
                    <td>#874389</td>
                </tr>-->
                <tr>
                    <td class="compare-label">Size</td>
                    @foreach($products as $one)
                    <?php $com = "";?>
                    <td>@foreach(\App\third_size::where('product_id', $one->id)->get() as $size)
                    	{{$com . $size->size->title_ar}}
                    	<?php $com = ' - ';?>
                    	@endforeach</td>
                    @endforeach
                    <!--
                    <td>XL</td>
                    <td>XS</td>-->
                </tr>
                <tr>
                    <td class="compare-label">Color</td>
                    @foreach($products as $one)
                    <?php $com = "";?>
                    <td>@foreach(\App\third_color::where('product_id', $one->id)->get() as $color)
                    	{{$com . $color->color->title_ar}}
                    	<?php $com = ' - ';?>
                    	@endforeach</td>
                    @endforeach
                    
                    <!--
                    <td>Blue</td>
                    <td>Blue</td>
                    -->
                </tr>
                <!--<tr>
                    <td class="compare-label">Weight</td>
                    <td>0.3kg</td>
                    <td>0.3kg</td>
                    <td>0.3kg</td>
                </tr>
                <tr>
                    <td class="compare-label">Dimensions</td>
                    <td>40x20x72cm</td>
                    <td>40x20x72cm</td>
                    <td>40x20x72cm</td>
                </tr>-->
                <tr>
                    <td class="compare-label">Action</td>
                    @foreach($products as $one)
                    <td class="action productItem" rel="{{$one->id}}">
                        <button class="add-cart button button-sm add" rel="cart">اضف الى سلة المشتريات</button>
                        <!--<button class="button button-sm"><i class="fa fa-heart-o"></i></button>
                        <button class="button button-sm"><i class="fa fa-close"></i></button>-->
                    </td>
                    @endforeach
                    <!--
                    <td class="action">
                        <button class="add-cart button button-sm">Add to cart</button>
                        <button class="button button-sm"><i class="fa fa-heart-o"></i></button>
                        <button class="button button-sm"><i class="fa fa-close"></i></button>
                    </td>
                    <td class="action">
                        <button class="add-cart button button-sm">Add to cart</button>
                        <button class="button button-sm"><i class="fa fa-heart-o"></i></button>
                        <button class="button button-sm"><i class="fa fa-close"></i></button>
                    </td>
                    -->
                </tr>
            </table>
            @else
            <div>عفوا .. لا توجد منتجات للمقارنة برجاء اختيار المنتجات </div>
            @endif
        </div>
    </div>
</div>

@endsection