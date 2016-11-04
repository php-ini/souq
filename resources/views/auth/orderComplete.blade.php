@extends('layouts.default')
@section('content')


<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">بوروروم</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">تم حجز المشتريات</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <!--<h2 class="page-heading no-line">
            <span class="page-heading-title2">Order Summary</span>
        </h2>-->
        <!-- ../page heading-->
        <div class="page-content page-order">
            <!--<ul class="step">
                <li class="current-step"><span>01. Summary</span></li>
                <li><span>02. Sign in</span></li>
                <li><span>03. Address</span></li>
                <li><span>04. Shipping</span></li>
                <li><span>05. Payment</span></li>
            </ul>-->
            <!--<div class="heading-counter warning">Your shopping cart contains:
                <span>1 Product</span>
            </div>-->
            
            @if (session('message'))
			    <div class="alert alert-success">
			        {{ session('message') }}
			    </div>
			@endif
		
            
            <h3 class="checkout-sep">مراجعة المنتجات</h3>
            <div class="box-border">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">المنتج</th>
                            <th>الوصف</th>
                            <th>حالة الطلب</th>
                            <th>سعر المنتج</th>
                            <th>الكمية</th>
                            <th>المجموع</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $total = \DB::table('settings')->where('name', 'Delivery Fees')->first()->value;
                    	$firstTotal = 0;
                    	?>
                    	@foreach($order->orderlines as $one)
                    	
                    	<?php $firstTotal += $one->total_price;?>
                        <tr class="productItem" >
                            <td class="cart_product">
                                <a href="/product/{{\App\third::slug($one->product->id)}}">
                                        <img class="img-responsive" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->product->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->product->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="/product/{{\App\third::slug($one->product->id)}}">{{ $one->product->title_ar}}</a></p>
                                <small class="cart_ref">SKU : #{{ $one->product->code}}</small><br>
                                
                                
                                @if(isset($one->color->title))
                                <div class="form-option">
                                
                                    <div class="attributes">
                                        <div class="attribute-label">اللون:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                
                                                
                                                <label><li style="background: {{$one->color->title}}; display: inline-block;width: 20px; height: 20px;border: 1px solid #eee;margin-left: -10px;"></li>{{$one->color->title_ar}}</label>
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endif
                                <br>   
                                
                                
                                @if(isset($one->size_->title))
                                <div class="form-option">
                                
                                    <div class="attributes">
                                        <div class="attribute-label">المقاس:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                
                                                
                                                <label>{{$one->size_->title_ar}}</label>
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endif
                                
                                
                            </td>
                            <td class="cart_avail"><span class="label label-success">
                            	<?php $status = \Config::get('site.order.status');?>
                            	{{$status[$order->status]}}
                            </span></td>
                            
                            <td class="" style="direction: rtl;">{{ $one->unit_price }} ريال سعودي</td>
                            <td class="qty">
                                <label>{{$one->qty}}</label>
                                
                            </td>
                            <td class="" style="direction: rtl;">
                                <span class="oneTotal">{{ $one->total_price }}</span> ريال سعودي
                            </td>
                            
                        </tr>
                        @endforeach
                        
                        
                        
                    </tbody>
                    <tfoot>
                    	<tr>
                            <td colspan="2" rowspan="3"></td>
                            <td colspan="2" class="delivery" style="direction: rtl;">مجموع المنتجات</td>
                            <td colspan="2" style="direction: rtl;"><span class="firstTotal">{{$firstTotal}}</span> ريال سعودي</td>
                        </tr>
                        <tr>
                            
                            <td colspan="2" class="delivery" style="direction: rtl;">+ مصاريف توصيل</td>
                            <td colspan="2" style="direction: rtl;"><span class="delivery_fees">{{$order->delivery_fees}}</span> ريال سعودي</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>المجموع</strong></td>
                            <td colspan="2" style="direction: rtl;"><strong class="total_price">{{ $order->price }}</strong> ريال سعودي </td>
                        </tr>
                    </tfoot>    
                </table>
                <a href="/"><button type="button" class="button pull-right" onsubmit="">الصفحة الرئيسية</button></a>
            </div>
            
            
            
            
            
            
        </div>
    </div>
</div>



@endsection