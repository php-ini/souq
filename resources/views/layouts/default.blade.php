<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/jquery.bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/owl.carousel/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/fancyBox/jquery.fancybox.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <style>
    	/*@import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
		.droid-arabic-kufi{font-family: 'Droid Arabic Kufi', serif;}*/
		body{
			/*font-family: 'droid-arabic-kufi', sans-serif;*/
			font-family: tahoma;
		}
		.currency{
			float: left;
		    margin-right: 0px;
		    font-size: 12px;
		    margin-top: 0px;
		}
		.price{
    		display: inherit;
		}
		.popular-tabs .product-list li{
			height: 320px;
		}
		.product-list li .left-block img{
			max-height: 210px;
			min-height: 210px;
		}
		.brand{
			color: #999;
		}
		
		.product-list li .product-name {
		    text-align: center;
		    direction: rtl;
		    min-height: 20px;
		}
		
	.product-name .brand img{
		display: inline;
		width: 40px;
		max-height: 20px;
		
	}
	.product-name .brand img:hover{
		display: inline;
		width: 40px;
		max-height: 20px;
	}
    </style>
    
    
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery-1.11.2.min.js') }}"></script>
    
    
    
    <title>{{ \App\settings::where('name', 'title')->first()->value }}</title>
</head>
<body class="home">
<!-- TOP BANNER -->
<!--<div id="top-banner" class="top-banner">
    <div class="bg-overlay"></div>
    <div class="container">
        <h1>Special Offer!</h1>
        <h2>Additional 40% OFF For Men & Women Clothings</h2>
        <span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>
        <span class="btn-close"></span>
    </div>
</div>-->

@include('layouts.header')

@yield('content')

@include('layouts.footer')

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->

<script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/jquery.bxslider/jquery.bxslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/owl.carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/jquery.countdown/jquery.countdown.min.js') }}"></script>
<script type="text/javascript" src="{{asset('lib/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.actual.min.js') }}"></script>
<!-- COUNTDOWN -->
@if(\Request::route()->getName() != 'homePage')
<script type="text/javascript" src="{{asset('lib/countdown/jquery.plugin.js') }}"></script>
<script type="text/javascript" src="{{asset('lib/countdown/jquery.countdown.js') }}"></script>
<!-- ./COUNTDOWN -->
@endif
<script type="text/javascript" src="{{ asset('lib/fancyBox/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/theme-script.js') }}"></script>

<script>
$(document).ready(function(){
// $("img").error(function () {
  // $(this).unbind("error").attr("src", "{{asset('images/not_found.jpg')}}");
// });

	$(".home-page").on('click', function(){
		// if(!$(this).closest("#nav-top-menu").hasClass("nav-ontop"))
			//$(".vertical-menu-content").slideToggle();
	});
	
	// Products sort type
	$(".sort_type").on('click', function(){
		if($(this).hasClass("fa-sort-alpha-asc")){
			$(this).removeClass("fa-sort-alpha-asc");
			$(this).addClass("fa-sort-alpha-desc");
		}else{
			$(this).removeClass("fa-sort-alpha-desc");
			$(this).addClass("fa-sort-alpha-asc");
		}
	});
	

});


</script>
</body>
</html>
