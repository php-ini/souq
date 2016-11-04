


<script>
	$(document).on('click', ".add", function(){
		var type = $(this).attr('rel');
		var productId = $(this).closest(".productItem").attr('rel');
		var here = $(this);
		
		$.post( "/addTo", { productId: productId, type: type, '_token': $("input[name='_token']").val() })
		  .done(function( data ) {
		    // alert( "Data Loaded: " + data );
		    if(data.status == "success"){
		    	// alert(type);
		    	if(type == "wish")here.closest(".productItem").css({'border': '1px solid coral'});
		    	if(type == "compare")here.closest(".productItem").css({'border': '1px solid cornflowerblue'});
		    	if(type == "cart"){
		    		here.closest(".productItem").css({'border': '1px solid darkgreen'});
		    		$.post( "/getCart", { '_token': $("input[name='_token']").val() })
		  			.done(function( data2 ) {
		  				$("#cart-block").html(data2);
		  			});
		    	}
		    	
		    }
		  });
	});
	
	
	$(document).on('click', ".remove", function(){
		var type = 'cart';
		var productId = $(this).closest(".productItem").attr('rel');
		var here = $(this);
		
		$.post( "/remove", {productId: productId, type: type, '_token': $("input[name='_token']").val() })
		  .done(function( data ) {
		    // alert( "Data Loaded: " + data );
		    if(data.status == "success"){
		    	
	    		$.post( "/getCart", { '_token': $("input[name='_token']").val() })
	  			.done(function( data2 ) {
	  				$("#cart-block").html(data2);
	  			});
		    	
		    	
		    }
		  });
	});
	
	
</script>
<!-- Footer -->
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="#"><img src="{{ asset('images/logo2.png') }}" alt="بوروروم دوت كوم" /></a>
                        <div id="address-list">
                            <div class="tit-name">العنوان:</div>
                            <div class="tit-contain">شارع محمد احمد - الدمام - المملكة العربية السعوية</div>
                            <div class="tit-name">هاتف:</div>
                            <div class="tit-contain">+00 123 456 789</div>
                            <div class="tit-name">البريد الالكتروني:</div>
                            <div class="tit-contain">info@pororom.com</div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4 col-xs-6">
                            <div class="introduce-title">التسوق</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="http://www.pororom.com/blog">المدونة</a></li>
                                <li><a href="/about">عن الموقع</a></li>
                                <li><a href="/delivery">معلومات التوصيل</a></li>
                                <li><a href="/privacy">سياسة الخصوصية</a></li>
                                <li><a href="/terms">الشروط والاحكام</a></li>
                                <li><a href="/contact">اتصل بنا</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="introduce-title">حسابي</div>
                            <ul id = "introduce-Account" class="introduce-list">
                                <li><a href="/myOrders">قائمة طلبياتي</a></li>
                                <li><a href="/wishlist">منتجاتي المفضلة</a></li>
                                
                                <li><a href="/myOrders">سجل المشتريات</a></li>
                                <li><a href="/compare">مقارنة المنتجات</a></li>
                                
                                
                                 
                            </ul>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="introduce-title">بيع منتجاتك</div>
                            <ul id = "introduce-support"  class="introduce-list">
                                <li><a href="/#">ابدا البيع</a></li>
                                <li><a href="/#">شروط واحكام البائع</a></li>
                                <li><a href="/#">رسوم البيع</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box">
                        <div class="introduce-title">القائمة البريدية</div>
                        <div class="input-group" id="mail-box">
                          <input type="text" class="newsletter" placeholder="ادخل بريدك الالكتروني .."/>
                          <span class="input-group-btn">
                            <button class="btn btn-default" id="newsletterButton" type="button">ارسال</button>
                          </span>
                        </div><!-- /input-group -->
                        
                        
                        
                        <script>
                        
                        function validateEmail(email) 
{
						    var re = /\S+@\S+\.\S+/;
						    return re.test(email);
						}
						
                        $("#newsletterButton").on('click', function(){
                        	
                        	var newsletter = $(".newsletter").val();
                        	
                        	if(validateEmail(newsletter)){
                        		
	                        	$.post( "/newsletter", { newsletter: newsletter,'_token': $("input[name='_token']").val()})
								    .done(function( data ) {
								    if(data.status  == "success"){
								    	alert( "تم ادخال البريد الالكتروني .. شكرا لاشتراكك في القائمة البريدية ");
								    }else{
								    	alert( "هذا البريد الالكتروني مسجل لدينا من قبل .");
								    }
								    
								});
							}else{
								alert("من فضلك قم بأدخال بريدك الالكتروني الصحيح..");
							}
                       });
                        	
                        	
                        </script>
                        
                        <div class="introduce-title">تواصل معنا</div>
                        <div class="social-link">
                            <!--<a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>-->
                            
                            
                            <a href="{{\App\settings::where('id', 3)->first()->value}}"><i class="fa fa-facebook"></i></a>
				            <a href="{{\App\settings::where('id', 4)->first()->value}}"><i class="fa fa-twitter"></i></a>
				            <a href="{{\App\settings::where('id', 5)->first()->value}}"><i class="fa fa-youtube" style="background: #b31217;"></i></a>
				            <a href="{{\App\settings::where('id', 6)->first()->value}}"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div><!-- /#introduce-box -->
        
            <!-- #trademark-box -->
            <div id="trademark-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-list">
                        <li id="payment-methods">طرق الدفع المتاحة</li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-ups.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-qiwi.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-wu.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-cn.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-visa.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-mc.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-ems.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-dhl.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-fe.jpg') }}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('data/trademark-wm.jpg') }}"  alt="ups"/></a>
                        </li>
                    </ul> 
                </div>
            </div> <!-- /#trademark-box -->
            
            
            
            <p class="text-center">{{\DB::table('settings')->where('id', 7)->first()->value }}</p>
        </div> 
</footer>
 