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
                            <img src="{{ $image_url.$first->image }}" alt="{{$first->title_ar}}" class="hot-cate-img img-responsive" />
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
                        
                        
                    </ul>
                </div>
            </div> <!-- /.cate-box -->
            @endforeach
             
            
                                                               
        </div> <!-- /#hot-categories -->
        
    </div> <!-- /.container -->
</div>

@endsection
