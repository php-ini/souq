@extends('layouts.default')
@section('content')



<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">انشئ حساب جديد</span>
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
                        <h3>اشتراك جديد</h3>
                        
                        
                        <form method="POST" action="/register">
    					{!! csrf_field() !!}
    					
    					
    					
					    @if (count($errors) > 0)
					    	<div class="alert alert-danger">
					        <ul class="nav ">
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					        </div>
					    @endif
    					
    					
                        <div class="input-group">
                        	
						  <span class="input-group-addon" id="basic-addon1">الاسم الاول</span>
						  <input name="fname" type="text" value="{{ old('fname') }}" class="form-control" placeholder="الاسم الاول" aria-describedby="basic-addon1">
						  {!! $errors->first('fname', '<p class="help-block">:message</p>') !!}
						  
						</div>
						
						<div class="input-group">
                        	
						  <span class="input-group-addon" id="basic-addon1">الاسم الاخير</span>
						  <input name="lname" type="text" value="{{ old('lname') }}" class="form-control" placeholder="الاسم الاخير" aria-describedby="basic-addon1">
						  {!! $errors->first('lname', '<p class="help-block">:message</p>') !!}
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >الجنس</span>
						  <select style="text-indent: 49%;" name="gender" class="form-control">
						  	<option value"1">ذكر</option>
						  	<option value"2">انثى</option>
						  </select>
						</div>
						
                        
                        <div class="input-group">
						  <span class="input-group-addon" >اسم المستخدم</span>
						  <input name="username" type="text" value="{{ old('username') }}" placeholder="اسم المستخدم" class="form-control" id="basic-url">
						  {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
						</div>
                        
                        <div class="input-group">
                        	
						  <span class="input-group-addon" id="basic-addon1">البريد الالكتروني</span>
						  <input name="email" type="text" value="{{ old('email') }}" class="form-control" placeholder="البريد الالكتروني" aria-describedby="basic-addon1">
						  {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
						</div>
						
						<!--<div class="input-group">
                        	
						  <span class="input-group-addon" id="basic-addon1">تأكيد البريد الالكتروني</span>
						  <input name="email_confirm" type="text" class="form-control" placeholder="تأكيد البريد الالكتروني" aria-describedby="basic-addon1">
						</div>-->
						
						
						
						<label for="basic-url"></label>
						<div class="input-group">
						  <span class="input-group-addon" >كلمة المرور</span>
						  <input name="password" type="password" placeholder="كلمة المرور" class="form-control" id="basic-url">
						  {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >تأكيد كلمة المرور</span>
						  <input name="password_confirmation" type="password" placeholder="تأكيد كلمة المرور" class="form-control" id="basic-url">
						  {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
						</div>
						
						
						
						<div class="input-group">
						  <span class="input-group-addon" >العنوان</span>
						  <input name="address" type="text" value="{{ old('address') }}" class="form-control" placeholder="العنوان" id="basic-url">
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >التليفون</span>
						  <input name="phone" type="text" value="{{ old('phone') }}" class="form-control" placeholder="التليفون" id="basic-url">
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >الموبايل</span>
						  <input name="mobile" type="text" value="{{ old('mobile') }}" class="form-control" placeholder="الموبايل" id="basic-url">
						</div>


                        <button type="submit" class="button"><i class="fa fa-lock"></i> انشئ الحساب</button>
                        
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
	.input-group{
		display: inline;
	}
	input, select option{
		text-align: center;
	}
	.help-block{
		color: red;
	}
</style>

@endsection