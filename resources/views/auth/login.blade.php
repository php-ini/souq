@extends('layouts.default')
@section('content')



<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">تسجيل الدخول</span>
        </div>
        <!-- ./breadcrumb -->
        
        
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">الاعضاء</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
                <!--<div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>انشئ حساب</h3>
                        <p>من فضلط ادخل بريدك الالكتروني</p>
                        <label for="email">البريد الالكتروني</label>
                        <input id="email" name="email" type="text" class="form-control">
                        
                        
                        <button class="button"><i class="fa fa-user"></i> انشئ الحساب</button>
                    </div>
                </div>-->
                
                
                
                <div class="col-sm-12">
                    <div class="box-authentication" style="text-align: center">
                        <h3>عضو مسجل من قبل ؟</h3>
                        
                        <form method="POST" action="/login">
    					{!! csrf_field() !!}
    					
    					
					    @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
				       </div>
					    @endif
					    
                        <div class="input-group">
                        	
						  
						  <input name="email" type="text" class="form-control" placeholder="Email Address" aria-describedby="basic-addon1">
						  <span class="input-group-addon" id="basic-addon1">البريد الالكتروني</span>
						</div>
						
						
						
						
						<label for="basic-url"></label>
						<div class="input-group">
						  
						  <input name="password" type="password" class="form-control" id="basic-url">
						  <span class="input-group-addon" >كلمة المرور</span>
						</div>
						
						<br>
						
						<div class="input-group" style="width: 150px;float: right;">
					      <span class="input-group-addon">
					        <input type="checkbox" name="remember"  aria-label="تذكرني"> حفظ كلمة المرور
					      </span>
					      
					    </div>
					    
					    <br>
                        <button class="btn btn-default" ><a href="/register">انشئ حساب جديد</a></button>
                        <button type="submit" class="button"><i class="fa fa-lock"></i> تسجيل الدخول</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection