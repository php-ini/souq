<!-- HEADER -->
<?php $url = 'http://www.perfectteamwork.com/';?>

<div id="header" class="header">
    <div class="top-header">
        <div class="container">
         <ul class="nav nav-pills nav-stacked pull-left">
          <li class="active"><a href="#">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu 1
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Submenu 1-1</a></li>
              <li><a href="#">Submenu 1-2</a></li>
              <li><a href="#">Submenu 1-3</a></li>
            </ul>
          </li>
          <li><a href="#">Menu 2</a></li>
          <li><a href="#">Menu 3</a></li>
        </ul>
            <div class="nav-top-links">
                <!-- <a class="first-item" href="#"><img alt="phone" src="{{ asset('images/phone.png') }}" /><span class="price">00-62-658-658</span></a> -->
                <a href="/contact"><img alt="email" src="{{ asset('images/email.png') }}" style="direction: rtl;" />ارسل لنا رسالة !</a>
            </div>
            <!--  -->
            <div class="currency hidden-xs hidden-sm hidden-md hidden-lg">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">ريال سعودي</a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">ريال سعودي</a></li>
                        <!--<li><a href="#">دولار امريكي</a></li>-->
                      </ul>
                </div>
            </div>
            <div class="language hidden-sm hidden-md hidden-lg hidden-xs">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                      <img alt="email" src="{{ asset('images/ar.png') }}" />العربية

                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><img alt="email" src="{{ asset('images/ar.png') }}" />العربية</a></li>
                        <!--<li><a href="#"><img alt="email" src="{{ asset('images/en.jpg') }}" />English</a></li>-->
                    </ul>
                </div>
            </div>

            <div class="social-link social-top hidden-xs hidden-md" style="display: inline;">
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
                <a href="#">المدونة</a>

            </div>
            <div class="mobile-logo hidden-sm hidden-lg">
               <a href="http://www.pororom.com">
                <img alt="pororom" src="{{ asset('images/logo-mobile.png') }}" />
               </a>
              </div>

              <div class="top-carts hidden-sm hidden-lg pull-right"">
            	<img alt="Kute Shop" src="{{ asset('images/top-carts.png') }}" />

            	<input type="text" name="lname" value="لا يوجد سابقة مشتريات" style="display:none;">
            </div>
            <div class="top-searches hidden-sm hidden-lg pull-right">
              <span class="notify notify-left">0</span>
            	<img alt="Kute Shop" src="{{ asset('images/top-searches.png') }}" />
              <br/>
            	<input type="text" name="lname"  style="display:none;">
            </div>
            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                  @if(\Auth::check())
                  <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>مرحبا ، {{\Auth::user()->fname}}</span></a>
                  @else
                  <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <span>حسابي</span>
                  </a>
                  @endif


                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        @if(!\Auth::check())
                        <li><a href="#" onclick="document.location='/login';">تسجيل الدخول</a></li>
                        @else
                        <li><a style="direction: rtl;" href="#" onclick="document.location='/profile';">تفاصيل الحساب ({{ \Auth::user()->fname }})</a></li>
                        <li><a style="direction: rtl;" href="#" onclick="document.location='/myOrders';">قائمة المشتريات</a></li>
                        <li><a style="direction: rtl;" href="#" onclick="document.location='/myAddress';">عناوين الشحن</a></li>
                        @endif
                        <li><a href="#" onclick="document.location='/compare';">مقارنة المنتجات</a></li>
                        <li><a href="#" onclick="document.location='/wishlist';">قائمة التمنيات</a></li>
                        @if(\Auth::check())
                          <li><a href="#" onclick="document.location='/logout';">تسجيل الخروج</a></li>
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
            <div class="col-xs-12 col-sm-3 logo hidden-xs">
                <a href="/"><img alt="Kute Shop" src="{{ asset('images/logo2.png') }}" /></a>
            </div>
            <div class="col-xs-6 col-sm-7 header-search-box hidden-xs">
                <form class="form-inline">
                      <div class="form-group form-category">
                        <select class="select-category">
                            <option value="2">جميع الاقسام</option>
                            @foreach(\App\first::orderBy('id', 'desc')->get() as $first)
                            	<option value="{{ $first->id }}">{{ $first->title_ar }}</option>
                        	@endforeach

                        </select>
                      </div>
                      <div class="form-group input-serach hidden-xs">
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



            <div id="cart-block" class="col-xs-6 col-sm-2 shopping-cart-box hidden-xs">

                @include('layouts.cart')
            </div>
        </div>

    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu hidden-xs">
        <div class="container">
            <div class="row">

                @include("layouts.header_left_menu")




                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">القائمة الرئيسية</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">


                                    <li><a href="/">الرئيسية</a></li>
                                    @foreach(\App\first::orderBy('id', 'desc')->get() as $first)
                                    <?php //echo "<pre>";print_r($first->seconds->toArray());exit;?>
                                    <li class="dropdown">
                                        <a href="/category/{{\App\first::slug($first->id)}}" class="dropdown-toggle" data-toggle="dropdown">{{$first->title_ar}}</a>
                                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                                        	<?php $round = 0;$sector = 0;?>

                                            <li class="block-container col-sm-3">
	                                                <ul class="block">



                                                    <?php $group = 0;
                                                    $total = (\DB::table('secondlevel')->where('pid', $first->id)->orderBy('group_id')->count());
                                                    $break = ceil($total / 4);

                                                    ?>
                                                    <?php //echo "count = ".$total . " -- break = " . $break;?>

                                                    @foreach(\App\second::where('pid', $first->id)->orderBy('group_id')->get() as $second)
                                                    <?php $round++;?>
                                                    @if($round == 1)
                                                    <li class="img_container">
	                                                        <a href="#">
	                                                            <img class="img-responsive" src="{{ $url . $second->image }}" title="{{$second->group->title_ar}}" alt="{{$second->title_ar}}">
	                                                        </a>
	                                                    </li>
                                                    @endif



                                                    @if($group != $second->group_id)
                                                    <?php $group = $second->group_id;?>
                                                    <li class="link_container group_header">
	                                                        <a href="/group/{{str_replace(" ","-",$second->group->title) .'-'. $second->id}}"> {{\DB::table('groups')->where('id', $second->group_id)->first()->title_ar}} </a>
	                                                    </li>


	                                                @endif





                                                    <li class="link_container"><a href="/products/{{\App\second::slug($second->id)}}"> {{$second->title_ar}}</a></li>

		                                            @if($round % $break == 0)
		                                            </ul>
		                                            </li>

		                                            <li class="block-container col-sm-3">
		                                                <ul class="block">

                                                    <?php $round = 0;?>
                                                    @endif


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
              <span class="notify notify-left" style="top:-4px; left:0px;">0</span>
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>
