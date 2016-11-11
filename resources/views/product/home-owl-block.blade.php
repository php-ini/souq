<div class="category-featured">
	<?php $owlname = \App\first::where('id',$first_id)->first()->title;?>
            <nav class="navbar nav-menu nav-menu-{{$owlcolor}} show-brand">
              <div class="container">
              	<?php
              	$icon[8] = 'fa-fire';
              	$icon[6] = 'fa-mobile';
              	$icon[10] = 'fa-heart-o';
              	$icon[5] = 'fa-key';
              	$icon[2] = 'fa-plug';
              	$icon[11] = 'fa-flask';
              	$icon[12] = 'fa-bell-o';
              	?>
                <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-brand"><a href="#"><span  class="fa {{$icon[$first_id]}} fa-2x"></span>
                  	<!--<img alt="{{$owlname}}" src="{{ asset('data/' . strtolower(\App\first::where('id',$first_id)->first()->title) . '.png') }}" />-->
                  	{{\App\first::where('id',$first_id)->first()->title_ar}}</a></div>
                  <span class="toggle-menu"></span>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a data-toggle="tab" href="#{{$owlname}}-1">الاعلى مبيعا</a></li>
                    <li><a data-toggle="tab" href="#{{$owlname}}-2">الاكثر مشاهدة</a></li>
                    <?php $i = 3;?>
                    @foreach(\App\second::where('pid', $first_id)->take(5)->get() as $second)
                    @if($second->thirds->count() > 0)
                    	<li><a data-toggle="tab" href="#{{$owlname}}-{{$i}}">{{$second->title_ar}}</a></li>
                    	<?php $i++;?>
                    @endif
                    @endforeach
                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
              <div id="elevator-{{$elevator}}" class="floor-elevator">
                    <a href="#elevator-{{$elevator - 1}}" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#elevator-{{$elevator + 1}}" class="btn-elevator down fa fa-angle-down"></a>
              </div>
            </nav>
            <div class="category-banner">
                <div class="col-sm-6 banner">
                	<a href="#"><img alt="ads2" onerror="arguments[0].currentTarget.style.display='none';" class="img-responsive" src="{{ asset('side/' . strtolower($owlname) .'-1.jpg') }}" /></a>
                    <!--<a href="#"><img alt="ads2" class="img-responsive" src="{{ asset('data/ads2.jpg') }}" /></a>-->
                </div>
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" onerror="arguments[0].currentTarget.style.display='none';" class="img-responsive" src="{{ asset('side/' . strtolower($owlname) .'-2.jpg') }}" /></a>
                    <!--<a href="#"><img alt="ads2" class="img-responsive" src="{{ asset('data/ads3.jpg') }}" /></a>-->
                </div>
           </div>
           <div class="product-featured clearfix">
                <div class="banner-featured">
                    <div class="featured-text"><span>featured</span></div>
                    <div class="banner-img">
                        <a href="#"><img class="" alt="Featurered 1" src="{{ asset('images/' . strtolower(\App\first::where('id',$first_id)->first()->title) . '.jpg') }}" /></a>
                    </div>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container">
                            <!-- tab product -->
                            <div class="tab-panel active" id="{{$owlname}}-1">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":4}}'>
                                    @foreach(\App\third::where('pid', $first_id)->orderBy('price', 'desc')->take(15)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="{{$owlname}}-2">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":4}}'>
                                    @foreach(\App\third::where('pid', $first_id)->orderBy('views', 'desc')->take(15)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach
                                </ul>
                            </div>

                            <?php $i = 3;?>
		                    @foreach(\App\second::where('pid', $first_id)->take(5)->get() as $second)
		                    @if($second->thirds->count() > 0)
                            <div class="tab-panel" id="{{$owlname}}-{{$i}}">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":3},"1000":{"items":4}}'>
                                    @foreach(\App\third::where(['sid'=>$second->id])->orderBy('views', 'desc')->take(15)->get() as $one)
                                    @include('product.owl-one')
                                    @endforeach
                                </ul>
                            </div>
                            <?php $i++;?>
		                    @endif
		                    @endforeach
                        </div>


                    </div>
                </div>
           </div>
        </div>
