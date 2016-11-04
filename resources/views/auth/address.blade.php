@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">Home</a>
            
            
            
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">مشترياتي</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
           
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9 col-sm-push-3" id="center_column">
                
                <!-- ./category-slider -->
				@if (session('message'))
				<div class="alert alert-success">
				  <strong>تم!</strong> {{ session('message') }}
				</div>
				
				@endif
                <!-- category short-description -->
                <div class="cat-short-desc">
                    <div class="desc-text text-left">
                        <p>
                         قائمة العناوين التي قمت بأدخالها اثناء طلب المنتجات من الموقع
                        </p>
                    </div>
                    
                    
                    
                    
                </div>
                <!-- ./category short-description -->
                

                
                
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list" style="z-index: 2 !important;">
                    <h2 class="page-heading">
                        <span class="page-heading-title">قائمة العناوين الخاصة بي</span>
                    </h2>
                    
                    <div class="table-responsive">
					  <table class="table table-striped table-hover">
					  	<thead>
					    <tr>
					    	<th>رقم العنوان</th>
					    	<th>الدولة</th>
					    	<th>المقاطعة</th>
					    	<th>المدينة</th>
					    	<th>العنوان</th>
					    	<th>التليفون</th>
					    	<th>الموبايل</th>
					    	
				    	</tr>
				    	</thead>
				    	<tbody>
					    	
					    	@foreach($addresses as $address)
					    		<tr>
					    			<td>{{ $address->id }}</td>
					    			<td>{{ $address->country['name'] }}</td>
					    			<td>{{ $address->state['name'] }}</td>
					    			<td>{{ $address->city['name'] }}</td>
					    			<td>{{ $address->address }}</td>
					    			<td>{{ $address->tel }}</td>
					    			<td>{{ $address->mobile }}</td>
					    			
					    			<td>
    				{!! Form::open(array('route' => array('addressDelete', $address->id), 'method' => 'DELETE', 'onsubmit'=>"return confirm('Are you sure you want to delete this ?')")) !!}
				        <button type="submit" class="btn btn-danger btn-mini">حذف</button>
				    {!! Form::close() !!}
					    			</td>
					    		</tr>
					    	@endforeach
				    	</tbody>
					  </table>
					</div>
                </div>
                
                <ul class="pagination">  {!! $addresses->render() !!}</ul>
                <!-- ./view-product-list-->
                
                
                
                
                

            </div>
             <!-- Left colunm -->
            @include('layouts.sidebar')
            <!-- ./left colunm -->
            <!-- ./ Center colunm -->
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