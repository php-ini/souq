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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery-1.11.2.min.js') }}"></script>
    
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    

    <style>
.homeslider{ visibility:hidden; }
  /* @font-face kit by Fonts2u (http://www.fonts2u.com) */ @font-face {font-family:"GE SS Two Light";src:url("../fonts/GE_SS_Two_Light.eot?")
 format("eot"),url("../fonts/GE_SS_Two_Light.woff") format("woff"),url("../fonts/GE_SS_Two_Light.ttf")
 format("truetype"),url("../fonts/GE_SS_Two_Light.svg#GESSTwoLight-Light")
 format("svg");font-weight:normal;font-style:normal;}


    </style>






    <title>{{ \App\settings::where('name', 'title')->first()->value }}</title>


<meta name="description" content="{{ \App\settings::where('id', 9)->first()->value }}">
<meta name="keywords" content="{{ \App\settings::where('id', 14)->first()->value }}">



<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


</head>
<body class="home">
<!-- TOP BANNER -->


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
<script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uisearch.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>

<script>
 new UISearch( document.getElementById( 'sb-search' ) );
</script>
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
<script>
$(document).ready(function(){
    $(".top-searches img").click(function(){
        $(".top-searches input").toggle(500);
    });
});
</script>
<script>
$(document).ready(function(){
    $(".top-carts img").hover(function(){
        $(".new-cart").toggle(500)
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(".collapse-img img").click(function(){
        $(".collapse-top").toggle(500)
    });
});
</script>
</script>
<script type="text/javascript">
$(document).ready(function() {
	@if(\Request::route()->getName() == "homePage")
	
	
document.getElementsByClassName("homeslider")[0].style.visibility = "visible";
@endif

});
</script>
</body>
</html>
