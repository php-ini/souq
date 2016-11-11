@extends('layouts.default')
@section('content')

<?php //echo \Request::route()->getName();?>

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">بوروروم</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $about->title_ar }}</span>
        </div>
        <!-- ./breadcrumb -->
        
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column" style="float: right;">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">اقسام</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <li @if(\Request::route()->getName() == "about") class="active"@endif><span></span><a href="/about">عن الموقع</a></li>
                                    <li @if(\Request::route()->getName() == "delivery") class="active"@endif><span></span><a href="/delivery">معلومات التوصيل</a></li>
                                    <li @if(\Request::route()->getName() == "privacy") class="active"@endif><span></span><a href="/privacy">سياسة الخصوصية</a></li>
                                    <li @if(\Request::route()->getName() == "terms") class="active"@endif><span></span><a href="/terms">الشروط والاحكام</a></li>
                                    <li @if(\Request::route()->getName() == "returns") class="active"@endif><span></span><a href="/returns">سياسة الاسترجاع</a></li>
                                    <li @if(\Request::route()->getName() == "careers") class="active"@endif><span></span><a href="/careers">وظائف متاحة</a></li>
                                    <li @if(\Request::route()->getName() == "sellers_rules") class="active"@endif><span></span><a href="/sellers_rules">شروط واحكام البائع</a></li>
                                    <li @if(\Request::route()->getName() == "selling_fees") class="active"@endif><span></span><a href="/selling_fees">رسوم البيع</a></li>
                                    <li @if(\Request::route()->getName() == "contact") class="active"@endif><span></span><a href="/contact">اتصل بنا</a></li>
                                    <!--<li><span></span><a href="/FAQ">FAQ</a></li>
                                    <li><span></span><a href="#">Site Map</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- Banner silebar -->
                <div class="block left-module">
                    <div class="banner-opacity">
                        <a href="#"><img src="http://www.spitthatoutthebook.com/wp-content/uploads/2012/10/Screen-shot-2014-02-16-at-10.08.13-AM.png" alt="ads-banner"></a>
                    </div>
                </div>
                <!-- ./Banner silebar -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- page heading-->
                <h2 class="page-heading">
                    <span class="page-heading-title2">{{$about->title_ar}}</span>
                </h2>
                <!-- Content page -->
                <div class="content-text clearfix">

                    <img src="@if(\App\image::where(['type' => \Request::route()->getName(), 'status' => 1])->count()){{ $image_url . \App\image::where(['type' => \Request::route()->getName(), 'status' => 1])->first()->image}}@endif" class="alignleft" width="310" alt="">

                    <p>{!! $about->description_ar !!}</p>

                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->




@endsection