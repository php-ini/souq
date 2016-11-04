@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">بوروروم</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page"><a class="home" href="/category/{{\App\first::slug($second->first->id)}}" title="{{$second->first->title}}">{{$second->first->title_ar}}</a></span>
            
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{$second->title_ar}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9 col-sm-push-3" id="center_column">
                <!-- category-slider -->
                <div class="category-slider">
                    <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                        <li>
                            <img class="img-responsive" src="{{ $image_url . $second->image }}" alt="category-slider">
                        </li>
                        <li>
                            <img class="img-responsive" src="http://technology.nasa.gov/t2media/tops/img/TOP2-243/ARC-16372-1%20Computer-devices-Mobile-phone1425x780.jpg" alt="category-slider">
                        </li>
                    </ul>
                </div>
                <!-- ./category-slider -->

                <!-- category short-description -->
                <div class="cat-short-desc">
                    <div class="desc-text text-right">
                        <p>
                            {!! $second->description_ar !!}
                        </p>
                    </div>
                    
                    
                    
                    
                </div>
                <!-- ./category short-description -->
                
                <div class="sortPagiBar" style="z-index: 5 !important;display: block;position: relative;width: 90%;">
                    <div class="bottom-pagination">
                    	<nav>
                        {!! $products->appends(\Input::except('page'))->render() !!}
                        </nav>
                    </div>
                    
                    <div class="sort-product" style="margin-top: 0;">
                        <select name="sort">
                            <option value="date" @if($sort == "date")selected="selected" @endif>الأحدث</option>
                            <option value="price" @if($sort == "price")selected="selected" @endif>السعر</option>
                            <option value="stars" @if($sort == "stars")selected="selected" @endif>التقييم بالنجوم</option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-{{$sort_type}} sort_type"></i>
                        </div>
                    </div>
                </div>
                
                
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list" style="z-index: 2 !important;">
                    <h2 class="page-heading">
                        <span class="page-heading-title">{{$second->title_ar}}</span>
                    </h2>
                    <ul class="display-product-option" style="z-index: 6 !important;">
                        <li class="view-as-grid selected">
                            <span>شبكي</span>
                        </li>
                        <li class="view-as-list">
                            <span>قائمة</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                    	@foreach($products as $one)
                        @include('product.one-product')
                        
                        @endforeach
                        
                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                    	<nav>
                        {!! $products->appends(\Input::except('page'))->render() !!}
                        </nav>
                    </div>
                    
                    <div class="sort-product" style="margin-top: 0;">
                        <select name="sort">
                            <option value="date" @if($sort == "date")selected="selected" @endif>الأحدث</option>
                            <option value="price" @if($sort == "price")selected="selected" @endif>السعر</option>
                            <option value="stars" @if($sort == "stars")selected="selected" @endif>التقييم بالنجوم</option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-{{$sort_type}} sort_type"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
            
            
            <!-- Left colunm -->
            @include('layouts.sidebar')
            <!-- ./left colunm -->
            
        </div>
        <!-- ./row-->
    </div>
</div>

<script>
	$("select[name='sort']").on("change", function(){
		
		var sort = $(this).val();
		if($(".sort_type").hasClass("fa-sort-alpha-desc")){
			var sort_type = "desc";
		}else{
			var sort_type = "asc";
		}
		<?php
		// $test = strpos(\Request::fullUrl(), '?');
		// $actual = "http://".$_SERVER['HTTP_HOST'].'/products/' . $slug . "?";
		$actual = \Request::fullUrl();
		// $actual .= implode("&", \Input::except('sort'));
		$com = "";
		 foreach(\Input::except('sort') as $key => $val){
		 	$actual .= $com . $key . "=" . $val;
			 $com = "&";
		 }
		// $actual = preg_replace(array('~[0-9=]+[0-9]*~'), '', $actual);
		if(strpos($actual, "&sort=")){
		?>
		location.href = '{{ preg_replace('~[\&\?]sort=[a-z\-]+$~', '', $actual)}}' + '&sort=' + sort + "-" + sort_type;
		<?php }else{ ?>
		location.href = '{{ preg_replace('~[\&\?]sort=[a-z\-]+$~', '', $actual)}}' + '?sort=' + sort + "-" + sort_type;
		<?php } ?>
	});
	
</script>


<style>
	.pagination>li {
    direction: rtl;
    float: right;
}
</style>

@endsection