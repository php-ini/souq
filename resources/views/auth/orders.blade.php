@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">بوروروم</a>
            
            
            
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">مشترياتي</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
         
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9 col-sm-push-3" id="center_column">
                
                <!-- ./category-slider -->

                <!-- category short-description -->
                <div class="cat-short-desc">
                    <div class="desc-text text-left">
                        <p>
                         قائمة المشتريات التي تمت من خلال الموقع في الفترة السابقة
                        </p>
                    </div>
                    
                    
                    
                    
                </div>
                <!-- ./category short-description -->
                

                
                
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list" style="z-index: 2 !important;">
                    <h2 class="page-heading">
                        <span class="page-heading-title">قائمة مشترياتي</span>
                    </h2>
                    
                    @if(count($orders) > 0) 
                    <div class="table-responsive">
					  <table class="table table-striped table-hover">
					  	<thead>
					    <tr>
					    	<th>رقم الطلب</th>
					    	<th>المبلغ الاجمالي</th>
					    	<th>عدد المنتجات</th>
					    	<th>حالة الطلب</th>
					    	<th>تاريخ الطلب</th>
					    	<th></th>
					    	
				    	</tr>
				    	</thead>
				    	<tbody>
					    	<?php $status = \Config::get('site.order.status');?>
					    	@foreach($orders as $order)
					    		<tr>
					    			<td>{{ $order->id }}</td>
					    			<td>{{ $order->price }}</td>
					    			<td>{{ $order->qty }}</td>
					    			<td class="cart_avail"><span class="label label-success">
                                             {{ $status[$order->status] }}</span></td>
					    			<td>{{ $order->created_at }}</td>
					    			<td><a href="orderComplete/{{ $order->id}}"><button class="btn btn-warning">عرض الطلب</button></a></td>
					    		</tr>
					    	@endforeach
				    	</tbody>
					  </table>
					</div>
					
					@else
					<div style="text-align: center; margin: 45px;">
					
					- عفوا لايوجد مشتريات في حسابك حتى الان -
					</div>
					@endif
					
					
                </div>
                
                <ul class="pagination">  {!! $orders->render() !!}</ul>
                <!-- ./view-product-list-->
                
                
                
                
                

            </div>
            <!-- ./ Center colunm -->
               <!-- Left colunm -->
            @include('layouts.sidebar')
            <!-- ./left colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>




<style>
	.pagination>li {
    direction: rtl;
    float: right;
}
</style>

@endsection