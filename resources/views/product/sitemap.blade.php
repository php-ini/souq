@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="page-top">
    <div class="container">
        <div class="row">
            
            
        </div>
    </div>
</div>






<div id="content-wrap">
    <div class="container">
        <div id="hot-categories" class="row">
            <div class="col-sm-12 group-title-box">
                <h2 class="group-title ">
                    <span>اقسام الموقع</span>
                </h2>
            </div>
            
            @foreach(\App\first::orderBy('id', 'desc')->get() as $first)
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">{{$first->title_ar}}</p>
                        </div>
                        <a href="/category/{{\App\first::slug($first->id)}}" class="cate-link link-active" data-ac="flipInX" ><span>تسوق الان</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ $image_url.$first->image }}" alt="{{$first->title_ar}}" class="hot-cate-img" />
                        </a>
                    </div>
                    
                </div>
                <div class="cate-content">
                    <ul>
                    	<?php $count = 1;?>
                    	@foreach($first->seconds as $second)
                    	@if($count <= 500)
                        <li><a href="/products/{{\App\second::slug($second->id)}}">{{$second->title_ar}}</a></li>
                        @endif
                        <?php $count++;?>
                        @endforeach
                        
                        <!--
                        <li><a href="#">Headphone, Headset</a></li>
                        <li><a href="#">Home Audio</a></li>
                        <li><a href="#">Mp3 Player Accessories</a></li>-->
                    </ul>
                </div>
            </div> <!-- /.cate-box -->
            @endforeach
            <!--<div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Sport & Outdoors</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product2.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Golf Supplies</a></li>
                        <li><a href="#">Outdoor & Traveling Supplies</a></li>
                        <li><a href="#">Camping & Hiking</a></li>
                        <li><a href="#">Fishing</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Fashion</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product3.png') }}" alt="Electronics" class="hot-cate-img"/>
                        </a>
                    </div>
                    
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Batteries & Chargers</a></li>
                        <li><a href="#">Headphone, Headset</a></li>
                        <li><a href="#">Home Audio</a></li>
                        <li><a href="#">Mp3 Player Accessories</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Health & Beauty</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product4.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                    
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Bath & Body</a></li>
                        <li><a href="#">Shaving & Hair Removal</a></li>
                        <li><a href="#">Fragrances</a></li>
                        <li><a href="#">Salon & Spa Equipment</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Jewelry & Watches</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product5.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Men Watches</a></li>
                        <li><a href="#">Wedding Rings</a></li>
                        <li><a href="#">Earring</a></li>
                        <li><a href="#">Necklaces</a></li>
                    </ul>
                </div>
            </div> 
            
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Digital</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product6.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Accessories for iPhone</a></li>
                        <li><a href="#">Accessories for iPad</a></li>
                        <li><a href="#">Accessories for Tablet PC</a></li>
                        <li><a href="#">Tablet PC</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Furniture</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product7.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                    
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Batteries & Chargers</a></li>
                        <li><a href="#">Headphone, Headset</a></li>
                        <li><a href="#">Home Audio</a></li>
                        <li><a href="#">Mp3 Player Accessories</a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">Toys & Hobbies</p>
                        </div>
                        <a href="" class="cate-link" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{ asset('data/cate-product8.png') }}" alt="Electronics" class="hot-cate-img" />
                        </a>
                    </div>
                </div>
                <div class="cate-content">
                    <ul>
                        <li><a href="#">Walkera</a></li>
                        <li><a href="#">Fpv System & Parts</a></li>
                        <li><a href="#">RC Cars & Parts</a></li>
                        <li><a href="#">Helicopters & Part</a></li>
                    </ul>
                </div>
            </div>--><!-- /.cate-box -->    
            
                                                               
        </div> <!-- /#hot-categories -->
        
    </div> <!-- /.container -->
</div>

@endsection
