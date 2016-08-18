@extends('layouts.default')
@section('content')

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Contact</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Contact Us</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-subheading">CONTACT FORM</h3>
                    <div class="contact-form-box">
                        <div class="form-selector">
                            <label>Subject Heading</label>
                            <select class="form-control input-sm" id="subject">
                                <option value="Customer service">Customer service</option>
                                <option value="Webmaster">Webmaster</option>
                            </select>
                        </div>
                        <div class="form-selector">
                            <label>Email address</label>
                            <input type="text" class="form-control input-sm" id="email" />
                        </div>
                        <div class="form-selector">
                            <label>Order reference</label>
                            <input type="text" class="form-control input-sm" id="order_reference" />
                        </div>
                        <div class="form-selector">
                            <label>Message</label>
                            <textarea class="form-control input-sm" rows="10" id="message"></textarea>
                        </div>
                        <div class="form-selector">
                            <button id="btn-send-contact" class="btn">Send</button>
                        </div>
                    </div>
                </div>
                {!! \DB::table('contact')->where('id', 1)->first()->description_ar !!}
            </div>
        </div>
    </div>
</div>

@endsection