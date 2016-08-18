@extends('layouts.default')
@section('content')



<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Authentication</span>
        </div>
        <!-- ./breadcrumb -->
        
        
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">الاعضاء</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
                
                
                
                
                <div class="col-sm-12">
                    <div class="box-authentication" style="text-align: center">
                        <h3>تم تسجيلك كعضو جديد في الموقع بنجاح ... الان تستطيع ان تطلب المنتجات التي تريد بسهولة</h3>
                        <a href="/login" >تسجيل الدخول</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection