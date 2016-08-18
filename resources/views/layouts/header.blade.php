<!-- HEADER -->
<?php $url = 'http://www.perfectteamwork.com/';?>

<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="{{ asset('images/phone.png') }}" />00-62-658-658</a>
                <a href="#"><img alt="email" src="{{ asset('images/email.png') }}" style="direction: rtl;" />ارسل لنا رسالة !</a>
            </div>
            <div class="currency ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">ريال سعودي</a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">ريال سعودي</a></li>
                        <li><a href="#">دولار امريكي</a></li>
                      </ul>
                </div>
            </div>
            <div class="language ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                      <img alt="email" src="{{ asset('images/ar.png') }}" />العربية
                      
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><img alt="email" src="{{ asset('images/ar.png') }}" />العربية</a></li>
                        <li><a href="#"><img alt="email" src="{{ asset('images/en.jpg') }}" />English</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="social-link social-top" style="display: inline;">
	            <a href="{{\App\settings::where('id', 3)->first()->value}}"><i class="fa fa-facebook"></i></a>
	            
	            <a href="{{\App\settings::where('id', 4)->first()->value}}"><i class="fa fa-twitter"></i></a>
	            <a href="{{\App\settings::where('id', 5)->first()->value}}"><i class="fa fa-youtube" style="background: #b31217;"></i></a>
	            <a href="{{\App\settings::where('id', 6)->first()->value}}"><i class="fa fa-google-plus"></i></a>
	        </div>
            
            <style>
            	.social-link .fa{
            		width: 25px;
            	}
            </style>
            
            <div class="support-link">
                <a href="/about">عن الموقع</a>
                <a href="#">الدعم الفني</a>
                @if(\Auth::check())
                <a href="/profile" style="float: left; direction: rtl;">مرحبا ، {{\Auth::user()->fname}}</a>
                @endif
            </div>

            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>حسابي</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        @if(!\Auth::check())
                        <li><a href="/login">تسجيل الدخول</a></li>
                        @else
                        <li><a style="direction: rtl;" href="/profile">تفاصيل الحساب ({{ \Auth::user()->username }})</a></li>
                        @endif
                        <li><a href="/compare">مقارنة المنتجات</a></li>
                        <li><a href="/wishlist">قائمة التمنيات</a></li>
                        @if(\Auth::check())
                        	<li><a href="/logout">تسجيل الخروج</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="/"><img alt="Kute Shop" src="{{ asset('images/logo.png') }}" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
                <form class="form-inline">
                      <div class="form-group form-category">
                        <select class="select-category">
                            <option value="2">جميع الاقسام</option>
                            @foreach(\App\first::orderBy('id', 'desc')->get() as $first)
                            	<option value="{{ $first->id }}">{{ $first->title_ar }}</option>
                        	@endforeach
                            <!--<option value="1">Men</option>
                            <option value="2">Women</option>-->
                        </select>
                      </div>
                      <div class="form-group input-serach">
                        <input type="text" onkeypress="return move(event, this);" id="keyword" name="keyword"  placeholder="ادخل كلمات البحث ...">
                      </div>
                      <button type="button" onclick="return search();" class="pull-right btn-search" title="ابحث"></button>
                </form>
            </div>
            
            
            <script>
    function move(e, here) {
        if (e.keyCode == 13) {
            search();
            return false;
        }
    }
// Arrange the search URL and go to it
    function search() {
        var keyword = $("#keyword").val();
        if (keyword == ""){
            alert("من فضلك ادخل كلمة للبحث عنها");
            return false;
        }else{
            return location.href = '/search/' + keyword;
           }
           alert('sss');
           return false;
    }
    
</script>

            
            
            <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                
                @include('layouts.cart')
            </div>
        </div>
        
    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                
                @include("layouts.header_left_menu")
                <!--
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">الأقسام الرئيسية</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                        <div class="vertical-menu-content is-home">
                            <ul class="vertical-menu-list">
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/1.png') }}">Electronics</a></li>
                                <li>
                                    <a class="parent" href="category2.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/2.png') }}">Sports &amp; Outdoors</a>
                                    <div class="vertical-dropdown-menu">
                                        <div class="vertical-groups col-sm-12">
                                            <div class="mega-group col-sm-4">
                                                <h4 class="mega-group-header"><span>Tennis</span></h4>
                                                <ul class="group-link-default">
                                                    <li><a href="#">Tennis</a></li>
                                                    <li><a href="#">Coats &amp; Jackets</a></li>
                                                    <li><a href="#">Blouses &amp; Shirts</a></li>
                                                    <li><a href="#">Tops &amp; Tees</a></li>
                                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                    <li><a href="#">Intimates</a></li>
                                                </ul>
                                            </div>
                                            <div class="mega-group col-sm-4">
                                                <h4 class="mega-group-header"><span>Swimming</span></h4>
                                                <ul class="group-link-default">
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Coats &amp; Jackets</a></li>
                                                    <li><a href="#">Blouses &amp; Shirts</a></li>
                                                    <li><a href="#">Tops &amp; Tees</a></li>
                                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                    <li><a href="#">Intimates</a></li>
                                                </ul>
                                            </div>
                                            <div class="mega-group col-sm-4">
                                                <h4 class="mega-group-header"><span>Shoes</span></h4>
                                                <ul class="group-link-default">
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Coats &amp; Jackets</a></li>
                                                    <li><a href="#">Blouses &amp; Shirts</a></li>
                                                    <li><a href="#">Tops &amp; Tees</a></li>
                                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                    <li><a href="#">Intimates</a></li>
                                                </ul>
                                            </div>
                                            <div class="mega-custom-html col-sm-12">
                                                <a href="#"><img src="{{ asset('data/banner-megamenu.jpg') }}" alt="Banner"></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/3.png') }}">Smartphone &amp; Tablets</a></li>
                                <li><a href="category2.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/4.png') }}">Health &amp; Beauty Bags</a></li>
                                <li>
                                    <a class="parent" href="category.html">
                                    <img class="icon-menu" alt="Funky roots" src="{{ asset('data/5.png') }}">Shoes &amp; Accessories</a>
                                    <div class="vertical-dropdown-menu">
                                            <div class="vertical-groups col-sm-12">
                                                <div class="mega-group col-sm-12">
                                                    <h4 class="mega-group-header"><span>Special products</span></h4>
                                                    <div class="row mega-products">
                                                        <div class="col-sm-3 mega-product">
                                                            <div class="product-avatar">
                                                                <a href="#"><img src="{{ asset('data/p10.jpg') }}" alt="product1"></a>
                                                            </div>
                                                            <div class="product-name">
                                                                <a href="#">Fashion hand bag</a>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="new-price">$38</div>
                                                                <div class="old-price">$45</div>
                                                            </div>
                                                            <div class="product-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 mega-product">
                                                            <div class="product-avatar">
                                                                <a href="#"><img src="{{ asset('data/p11.jpg') }}" alt="product1"></a>
                                                            </div>
                                                            <div class="product-name">
                                                                <a href="#">Fashion hand bag</a>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="new-price">$38</div>
                                                                <div class="old-price">$45</div>
                                                            </div>
                                                            <div class="product-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 mega-product">
                                                            <div class="product-avatar">
                                                                <a href="#"><img src="{{ asset('data/p12.jpg') }}" alt="product1"></a>
                                                            </div>
                                                            <div class="product-name">
                                                                <a href="#">Fashion hand bag</a>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="new-price">$38</div>
                                                                <div class="old-price">$45</div>
                                                            </div>
                                                            <div class="product-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 mega-product">
                                                            <div class="product-avatar">
                                                                <a href="#"><img src="{{ asset('data/p13.jpg') }}" alt="product1"></a>
                                                            </div>
                                                            <div class="product-name">
                                                                <a href="#">Fashion hand bag</a>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="new-price">$38</div>
                                                                <div class="old-price">$45</div>
                                                            </div>
                                                            <div class="product-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/6.png') }}">Toys &amp; Hobbies</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/7.png') }}">Computers &amp; Networking</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/8.png') }}">Laptops &amp; Accessories</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/9.png') }}">Jewelry &amp; Watches</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/10.png') }}">Flashlights &amp; Lamps</a></li>
                                <li>
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="{{ asset('data/11.png') }}">
                                        Cameras &amp; Photo
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="{{ asset('data/5.png') }}">
                                        Television
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="{{ asset('data/7.png') }}">Computers &amp; Networking
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="{{ asset('data/6.png') }}">
                                        Toys &amp; Hobbies
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                <a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{ asset('data/9.png') }}">Jewelry &amp; Watches</a></li>
                            </ul>
                            <div class="all-category"><span class="open-cate">All Categories</span></div>
                        </div>
                    </div>
                </div>
                -->
                
                
                
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <!--<li class="active dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Home</a>
                                        <ul class="dropdown-menu container-fluid">
                                            <li class="block-container">
                                                <ul class="block">
                                                    <li class="link_container"><a href="index.html">Home Style 1</a></li>
                                                    <li class="link_container"><a href="index2.html">Home Style 2</a></li>
                                                    <li class="link_container"><a href="index3.html">Home Style 3</a></li>
                                                    <li class="link_container"><a href="index4.html">Home Style 4</a></li>
                                                    <li class="link_container"><a href="index5.html">Home Style 5</a></li>
                                                    <li class="link_container"><a href="index6.html">Home Style 6</a></li>
                                                    <li class="link_container"><a href="index7.html">Home Style 7</a></li>
                                                    <li class="link_container"><a href="index8.html">Home Style 8</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li><a href="/">الرئيسية</a></li>
                                    @foreach(\App\first::orderBy('id', 'desc')->get() as $first)
                                    <?php //echo "<pre>";print_r($first->seconds->toArray());exit;?>
                                    <li class="dropdown">
                                        <a href="/category/{{\App\first::slug($first->id)}}" class="dropdown-toggle" data-toggle="dropdown">{{$first->title_ar}}</a>
                                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                                        	<?php $round = 1;$sector = 0;?>
                                        	
                                            <li class="block-container col-sm-3">
	                                                <ul class="block">
                                                    
                                                    <?php $group = 0;
                                                    $total = (\DB::table('secondlevel')->where('pid', $first->id)->orderBy('group_id')->count() + (\DB::table('secondlevel')->where('pid', $first->id)->groupBy('group_id')->count() * 1));
                                                    $break = ceil($total / 5);
													
                                                    ?>
                                                    <?php //echo "count = ".$total . " -- break = " . $break;?>
                                                    
                                                    @foreach(\App\second::where('pid', $first->id)->orderBy('group_id')->get() as $second)
                                                    
                                                    @if($group != $second->group_id)
                                                    <?php $group = $second->group_id;?>
                                                    
	                                                    <li class="img_container">
	                                                        <a href="#">
	                                                            <img class="img-responsive" src="{{ $url . $second->image }}" title="{{$second->group->title_ar}}" alt="{{$second->title_ar}}">
	                                                        </a>
	                                                    </li>
	                                                    
	                                                    
	                                                    <li class="link_container group_header">
	                                                        <a href="/group/{{str_replace(" ","-",$second->group->title) .'-'. $second->id}}"> {{$round}} - {{\DB::table('groups')->where('id', $second->group_id)->first()->title_ar}} </a>
	                                                    </li>
	                                                    @if(($round % $break) === 0)
		                                            </ul>
		                                            </li>
		                                            
		                                            <li class="block-container col-sm-3">
		                                                <ul class="block">
		                                                	
                                                    {{-- */$sector++;/* --}}
                                                    @endif
                                                    <?php $round++;?>
                                                    @endif
                                                    <li class="link_container"><a href="/products/{{\App\second::slug($second->id)}}">{{$round}} - {{$second->title_ar}}</a></li>
                                                    
		                                            @if(($round % $break) === 0)
		                                            </ul>
		                                            </li>
		                                            
		                                            <li class="block-container col-sm-3">
		                                                <ul class="block">
		                                                	<?php //echo "count = ".$total . " -- break = " . $break;?>
		                                                	
                                                    {{-- */$sector++;/* --}}
                                                    @endif
                                                    {{-- */$round++;/* --}}
                                                    
		                                            @endforeach
		                                            
		                                            
		                                            </ul>
		                                            </li>
		                                    
                                        </ul>
                                    </li>
                                    
                                    @endforeach
                                    
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>


<!-- end header -->