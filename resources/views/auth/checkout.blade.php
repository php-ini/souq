@extends('layouts.default')
@section('content')


<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">بوروروم</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">شراء المنتجات</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">حجز المنتجات</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content checkout-page">
        	@if(count($cart) == 0)
        	<div class="noway" style="display: block; text-align: center; height: 120px;">- عفوا لاتوجد منتجات في عربة التسوق للشراء .. من فضلك قم باختيار المنتجات أولا <a href="/">رجوع</a>-</div>
        	
        	@else
        	
        	
        	{!! Form::open(array('url' => 'checkout', 'method' => 'PUT', 'name'=>'addressForm')) !!}
        	<h3 class="checkout-sep">العناوين</h3>
        	
            <div class="box-border addresses">
                <ul>

                    <li class="row" style="direction: rtl;">
                        
                        
                        <div class="col-sm-6">
                            
                            @foreach(\App\address::where('member_id', Auth::user()->id)->orderBy('id', 'desc')->get() as $address)
                            <li>
		                        <label for="radio_button_{{$address->id}}"><input type="radio" value="{{$address->id}}" name="addressRadio" id="radio_button_{{$address->id}}"> {{ $address->address}}</label>
		                    </li>
                            @endforeach
                            <li>
		                        <label for="radio_button_0"><input class="radioNew" type="radio" checked value="-" name="addressRadio" id="radio_button_0">عنوان جديد</label>
		                    </li>
                        </div><!--/ [col] -->
                    </li>
               </ul>
                   
             </div>
                        
                        
        	
        	
        	
        	<div class="addressDiv">
        	<h3 class="checkout-sep">بيانات عنوان الشحن</h3>
            <div class="box-border" style="">
                <ul>
                                    
                    

                    <li class="row" style="direction: rtl;">
                        
                        <div class="col-sm-6">
                            
                            <label for="company_name_1">الدولة</label>
                            <!--<input class="input form-control" type="text" name="" id="company_name_1">-->
							<select name="country" class="countries input form-control" id="countryId">
							<option value="">اختر الدولة</option>
							</select>
                        </div><!--/ [col] -->
						
						
						<div class="col-sm-6">
                            
                            <label for="email_address_1" class="required">المحافظة</label>
                            <!--<input class="input form-control" type="text" name="" id="email_address_1">-->
							<select name="state" class="states input form-control" id="stateId">
							<option value="">اختر المحافظة</option>
							</select>
                        </div><!--/ [col] -->


                    </li><!--/ .row -->
					
					
					<li class="row" >

                        <div class="col-sm-6" style="float: right;">

                            <label for="address_1" class="required">المدينة</label>
                            <!--<input class="input form-control" type="text" name="" id="address_1">-->
													
				
							<select name="city" class="cities input form-control" id="cityId">
							<option value="">اختر المدينة</option>
							</select>

<script src="/js/location.js"></script>



                        </div><!--/ [col] -->

                    </li><!--/ .row -->
                    
                    
                    
                    <li class="row">

                        <div class="col-xs-12">

                            <label for="address" class="required">العنوان</label>
                            <input class="input form-control" type="text" name="address" id="address_1">

                        </div><!--/ [col] -->

                    </li><!--/ .row -->

                    

                    

                    <li class="row">

                        <div class="col-sm-6">

                            <label for="telephone_1" class="required">تليفون</label>
                            <input class="input form-control" type="text" name="tel" id="telephone_1">

                        </div><!--/ [col] -->

                        <div class="col-sm-6">

                            <label for="fax_1">موبايل</label>
                            <input class="input form-control" type="text" name="mobile" id="fax_1">

                        </div><!--/ [col] -->

                    </li><!--/ .row -->

                </ul>
                
            </div>
            
        </div>
            
            
            
            
            
            
            
            
            
            <h3 class="checkout-sep">بيانات الدفع</h3>
            <div class="box-border">
                <ul>
                	<li>
            
                        <label for="radio_button_6"><input type="radio" name="pay" value="delivery" checked id="radio_button_6"> الدفع عند الاستلام</label>
                    </li>
                    
                    <li>
                        <label for="radio_button_5"><input type="radio" disabled="disabled" value="credit" name="pay" id="radio_button_5"> الدفع اون لاين</label>
                    </li>
					
					
					<li>
                        <label for="radio_button_5"><input type="radio" disabled="disabled" value="raghy" name="pay" id="radio_button_5"> تحويل بنكي</label>
                    </li>
                    
                    
                    

                </ul>
                
            </div>
            
            
            
            
            
        	<h3 class="checkout-sep">مراجعة المنتجات</h3>
            <div class="box-border">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">المنتج</th>
                            <th>الوصف</th>
                            <th>Avail.</th>
                            <th>سعر المنتج</th>
                            <th>سعر شحن القطعة الواحدة</th>
                            <th>الكمية</th>
                            <th>المجموع</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $total = 0;//\DB::table('settings')->where('name', 'Delivery Fees')->first()->value;
                    	$firstTotal = 0;
						$shipFees = 0;
                    	?>
                    	@foreach($products as $one)
                    	<?php $total += $one->price;
                    	$firstTotal += $one->price;
						$shipFees += $one->ship_fees;
                    	?>
                    	<input type="hidden" name="product[]" value="{{ $one->id }}" />
                        <tr class="productItem" rel="{{ $one->id }}" data={{$one->price}}>
                            <td class="cart_product">
                                <a href="/product/{{\App\third::slug($one->id)}}">
                                        <img class="img-responsive" src="@if(\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->count() > 0){{ $image_url.\App\image::where(['type' =>'third', 'status'=>1, 'pid' => $one->id])->first()->image }}
                                                @else{{asset('images/not_found.jpg')}}@endif" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="/product/{{\App\third::slug($one->id)}}">{{ $one->title_ar}}</a></p>
                                <small class="cart_ref">SKU : #{{ $one->code}}</small><br>
                                
                                <div class="form-option">
                                @if(count($one->colors) > 0)
                                    <div class="attributes">
                                        <div class="attribute-label">Color:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                @foreach($one->colors as $color)
                                                
                                                <label><input type="radio"  class="color" name="prod-{{$one->id}}-color" value="{{$color->color->id}}"><li style="background: {{$color->color->title}}; display: inline-block;width: 20px; height: 20px;border: 1px solid #eee;margin-left: -10px;"></li>{{$color->color->title_ar}}</label>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                
                                <br>   
                                
                                <div class="form-option">
                                @if(count($one->sizes) > 0)
                                    <div class="attributes">
                                        <div class="attribute-label">Size:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                @foreach($one->sizes as $size)
                                                
                                                <label><input type="radio"  class="size" name="prod-{{$one->id}}-size" value="{{$size->size->id}}">{{$size->size->title_ar}}</label>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                
                                
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="" style="direction: rtl;">{{ $one->price }} ريال سعودي</td>
                            
                            <td>
                            	<span class="oneShip" rel="{{$one->ship_fees}}">{{$one->ship_fees}}</span>
                            </td>
                            
                            <td class="qty">
                                <input class="form-control input-sm" type="number" name="qty-{{$one->id}}" max="{{$one->qty}}" min="1" value="1">
                                <a href="#" onclick="return increase($(this));"><i class="fa fa-caret-up"></i></a>
                                <a href="#" onclick="return decrease($(this));"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td class="" style="direction: rtl;">
                                <span class="oneTotal">{{ $one->price }}</span> ريال
                                
                            </td>
                            
                            <td class="action">
                                <a style="cursor: pointer;" class="remove"><span>حذف المنتج</span></a>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        <script>
                        
                        	$(document).on("click", ".remove", function(){
                        		$(this).closest(".productItem").fadeOut();
                        		
                        		
                        		
                        		$("[name=address]").click(function(){
						            if($(this).val() == '-'){
						            	$(".addressDiv").show();
						            }else{
						            	$(".addressDiv").hide();
						            }
						    	});
                        		
                        	});
                        
                        	function increase(here){
                        		var val = here.closest(".qty").find(".input-sm").val();
                        		var max = here.closest(".qty").find(".input-sm").attr('max');
                        		// alert(val);
                        		if(parseInt(val) >= 1 && val < max){
                        		here.closest(".qty").find(".input-sm").val((parseInt(val) + 1));
                        		update_one_price(here);
                        		}else{
                        			alert("عذرا لاتوجد كمية كافية من هذا المنتج");
                        		}
                        		return false;
                        	}
                        	function decrease(here){
                        		var val = here.closest(".qty").find(".input-sm").val();
                        		if(parseInt(val) > 1 ){
                        		here.closest(".qty").find(".input-sm").val(val - 1);
                        		update_one_price(here);
                        		
                        		}else if(parseInt(val) == 1){
                        			alert("عفوا لايمكن ان تكون كمية المنتج بصفر");
                        		}else{
                        			alert("عذرا لاتوجد كمية كافية من هذا المنتج");
                        		}
                        		return false;
                        	}
                        	
                        	
                        	function update_one_price(here){
                        		var rel = here.closest(".productItem").attr("rel");
                        		var price = parseInt(here.closest(".productItem").attr("data"));
                        		var qty = parseInt(here.closest(".qty").find(".input-sm").val());
                        		var ship = parseInt(here.closest(".productItem").find(".oneShip").html());
                        		here.closest(".productItem").find(".oneShip").attr('rel',(ship * qty));
                        		// alert(price);
                        		here.closest(".productItem").find(".oneTotal").html((price * qty));
                        		
                        		update_total();
                        	}
                        	
                        	function update_total(){
                        		var total = 0;
                        		var ship = 0;
                        		$(".oneTotal").each(function(){
                        			var one = $(this).html();
                        			total += parseInt(one);
                        			
                        		});
                        		$(".oneShip").each(function(){
                        			ship += parseInt($(this).attr('rel'));
                        		});
                        		
                        		$(".delivery_fees").html(ship);
                        		var delivery = parseInt($(".delivery_fees").html());
                        		$(".total_price").html(total + delivery);
                        		$(".firstTotal").html(total);
                        	}
                        </script>
                        
                    </tbody>
                    <tfoot>
                    	<tr>
                            <td colspan="3" rowspan="3"></td>
                            <td colspan="2" class="delivery" style="direction: rtl;">مجموع المنتجات</td>
                            <td colspan="2" style="direction: rtl;"><span class="firstTotal">{{$firstTotal}}</span> ريال سعودي</td>
                        </tr>
                        <tr>
                            
                            <td colspan="2" class="delivery" style="direction: rtl;">+ مصاريف توصيل</td>
                            <td colspan="2" style="direction: rtl;"><span class="delivery_fees">{{$shipFees}}</span> ريال سعودي</td>
                        </tr>
                        <tr>
                        	
                            <td colspan="2"><strong>المجموع النهائي</strong></td>
                            <td colspan="2" style="direction: rtl;"><strong class="total_price">{{ $total + $shipFees }}</strong> ريال سعودي </td>
                        </tr>
                    </tfoot>    
                </table>
                <button type="submit" class="button pull-right" onsubmit="">اتمام الشراء</button>
            </div>
        	
        	
        	
        	
        	{!! Form::close() !!}
            
            
            <script>
            	
            	// var check = $("input[name='address']:checked").val();
            	$('input[type=radio][name=addressRadio]').change(function() {
            		// alert(this.value);
			        if(this.value == '-'){
	            		$(".addressDiv").show();
	            	}else{
	            		$(".addressDiv").hide();
	            	}
			    });
            	
            	
            	
        		$("form[name='addressForm']").on("submit", function(e){
        			
        			validate(e);
        		});
            	
            	
            	
            	function validate(e){
            		var addressRadio = $("input[name='addressRadio']:checked").val();
            		
        			if(addressRadio == '-'){
        				
        				var city = $("input[name='city']").val();
        				var country = $("input[name='country']").val();
        				var state = $("input[name='state']").val();
        				var address = $("input[name='address']").val();
        				var tel = $("input[name='tel']").val();
        				var mobile = $("input[name='mobile']").val();
        				
        				if( state == "" || country == "" || address == "" || tel == "" || mobile == ""){
        					alert("من فضلك قم بأكمال كل الحقول المطلوبة لأتمام عملية الشراء");
        					e.preventDefault();
        					return false;
        				}
        				
        			}
        			
        			
        			$("input[name='product[]']").each(function(){
        				var product = $(this).val();
        				// alert(product);
        				var color = $("input[name='prod-"+ product + "-color']:checked").val();
        				var size = $("input[name='prod-"+ product + "-size']:checked").val();
        				// alert(color + "--" + size);
        				if(color == "" || typeof color === 'undefined'){
        					alert("من فضلك قم باختيار الوان المنتجات التي ترغب في شرائها");
        					e.preventDefault();
        					return false;
        				}/*else if(typeof color === 'undefined'){
        					// alert('color: '+color);
        				}*/
        				
        				if(size == "" || typeof size === 'undefined'){
        					alert("من فضلك قم باختيار مقاسات المنتجات التي ترغب في شرائها");
        					e.preventDefault();
        					return false;
        				}/*else if(typeof size === 'undefined'){
        					// alert('size: '+size);
        				}*/
        				
        				
        			});
        			
        			/**
        			$(".color").each(function(){
        				if(!$(this).is(":checked")){
        					alert("من فضلك قم باختيار الوان المنتجات التي ترغب في شرائها");
        					e.preventDefault();
        					return false;
        				}
        			});
        			
        			$(".color").each(function(){
        				if(!$(this).is(":checked")){
        					alert("من فضلك قم باختيار مقاسات المنتجات التي ترغب في شرائها");
        					e.preventDefault();
        					return false;
        				}
        			});
        			*/
        			
            	}
            </script>
            
            
            @endif
        </div>
    </div>
</div>
<!-- ./page wapper-->












@endsection