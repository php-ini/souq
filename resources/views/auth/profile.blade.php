@extends('layouts.default')
@section('content')



<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">بيانات الحساب</span>
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
                        <h3>بيانات الحساب</h3>
                        
                        
                        <form method="POST" action="/profile">
    					{!! csrf_field() !!}
    					
    					@if(Session::has('message'))
     
					     <div class="alert alert-success alert-dismissable">
					                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					                                {{ ucwords(Session::get('message')) }} 
					                            </div>
					      @endif
    					
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
						  <input name="fname" type="text" value="{{ $user->fname }}" class="form-control" placeholder="الاسم الاول" aria-describedby="basic-addon1">
						</div>
						
						<div class="input-group">
                        	
						  <span class="input-group-addon" id="basic-addon1">الاسم الاخير</span>
						  <input name="lname" type="text" value="{{ $user->lname }}" class="form-control" placeholder="الاسم الاخير" aria-describedby="basic-addon1">
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >الجنس</span>
						  <select name="gender" class="form-control">
						  	<option value"1" @if($user->gender == 1) selected="selected" @endif>ذكر</option>
						  	<option value"2" @if($user->gender == 2) selected="selected" @endif>انثى</option>
						  </select>
						</div>
						
                        
                        <div class="input-group">
						  <span class="input-group-addon" >اسم المستخدم</span>
						  <input name="username" type="text" disabled="disabled" value="{{ $user->username }}" placeholder="اسم المستخدم" class="form-control" id="basic-url">
						</div>
                        
                        <div class="input-group">
                        	
						  <span class="input-group-addon" id="basic-addon1">البريد الالكتروني</span>
						  <input name="email" type="text" value="{{ $user->email }}" class="form-control" placeholder="البريد الالكتروني" aria-describedby="basic-addon1">
						</div>
						
						
						
						<label for="basic-url"></label>
						<div class="input-group">
						  <span class="input-group-addon" >كلمة المرور</span>
						  <input name="password" type="password" placeholder="كلمة المرور" class="form-control" id="basic-url">
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >تأكيد كلمة المرور</span>
						  <input name="password_confirmation" type="password" placeholder="تأكيد كلمة المرور" class="form-control" id="basic-url">
						</div>
						
						
						
						<div class="input-group">
						  <span class="input-group-addon" >العنوان</span>
						  <input name="address" type="text" value="{{ $user->address }}" class="form-control" placeholder="العنوان" id="basic-url">
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >التليفون</span>
						  <input name="phone" type="text" value="{{ $user->phone }}" class="form-control" placeholder="التليفون" id="basic-url">
						</div>
						
						<div class="input-group">
						  <span class="input-group-addon" >الموبايل</span>
						  <input name="mobile" type="text" value="{{ $user->mobile }}" class="form-control" placeholder="الموبايل" id="basic-url">
						</div>


                        <button type="submit" class="button"><i class="fa fa-lock"></i> حفظ</button>
                        
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
	.input-group{
		/*display: inline;*/
		margin-bottom:10px;
	}
	input, select option{
		/*text-align: center;*/
	}
</style>

@endsection