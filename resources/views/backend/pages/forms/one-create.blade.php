<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Multi Step Form</title>
    <style>
        body{
          background: #eaeaea;
        }

        form{
          background: #ffffff;
          margin: 100px auto;
          padding: 15px 40px 40px 40px;
          width: 70%;
        }

        .tab p{
          font-size: 20px;
          margin: 0 0 10px 0;
        }

        input{
          margin: 10px 0;
          padding: 10px;
          box-sizing: border-box;
          width: 100%;
          font-size: 17px;
          border: 1px solid #aaaaaa;
        }

        .index-btn-wrapper{
          display: flex;
        }

        .index-btn{
          margin: 20px 15px 0 0;
          background: #04AA6D;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          cursor: pointer;
          transition: 0.3s;
        }

        .index-btn:hover{
          opacity: 0.8;
        }

        .step{
          height: 30px;
          width: 30px;
          line-height: 30px;
          margin: 0 2px;
          color: white;
          background: green;
          border-radius: 50%;
          display: inline-block;
          opacity: 0.25;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <form id="myForm" action="" method="post" autocomplete = "off">
      <h1 align = center>Register</h1>

      <div style="text-align:center;">
        <span class="step" id = "step-1">1</span>
        <span class="step" id = "step-2">2</span>
        <span class="step" id = "step-3">3</span>
        <span class="step" id = "step-4">4</span>
      </div>

      <div class="tab" id = "tab-1">
        <p>Name:</p>
        <input type = "text" placeholder="First Name" name="firstname">
        <input type = "text" placeholder="Last Name" name="lastname">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(1, 2);">Next</div>
        </div>
      </div>

      <div class="tab" id="tab-2">
        <p>Contact Info:</p>
        <input type = "text" placeholder="Email" name="email">
        <input type = "text" placeholder="Phone" name="phone">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(2, 1);">Previous</div>
          <div class="index-btn" onclick="run(2, 3);">Next</div>
        </div>
      </div>

      <div class="tab" id="tab-3">
        <p>Birthday:</p>
        <input type = "text" placeholder="dd" name="dd">
        <input type = "text" placeholder="mm" name="mm">
        <input type = "text" placeholder="yy" name="yy">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(3, 2);">Previous</div>
          <div class="index-btn" onclick="run(3, 4);">Next</div>
        </div>
      </div>

      <div class="tab" id="tab-4">
        <p>Login Info:</p>
        <input type = "text" placeholder="Username" name="username">
        <input type = "password" placeholder="Password" name="password">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(4, 3);">Previous</div>
          <div class="index-btn" onclick="run(4, 5);">Next</div>
        </div>
      </div>

      <div class="tab" id="tab-5">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(5, 4);">Previous</div>
          <button class = "index-btn" type="submit" name="submit" style = "background: blue;">Submit</button>
        </div>
      </div>
    </form>

    <script>
      // Default tab
      $(".tab").css("display", "none");
      $("#tab-1").css("display", "block");

      function run(hideTab, showTab){
        if(hideTab < showTab){ // If not press previous button
          // Validation if press next button
          var currentTab = 0;
          x = $('#tab-'+hideTab);
          y = $(x).find("input")
          for (i = 0; i < y.length; i++){
            if (y[i].value == ""){
              $(y[i]).css("background", "#ffdddd");
              return false;
            }
          }
        }

        // Progress bar
        for (i = 1; i < showTab; i++){
          $("#step-"+i).css("opacity", "1");
        }

        // Switch tab
        $("#tab-"+hideTab).css("display", "none");
        $("#tab-"+showTab).css("display", "block");
        $("input").css("background", "#fff");
      }
    </script>
  </body>
</html>

{{-- @extends('backend.layouts.master')

@section('title')
{{ $title }}
@endsection

@section('styles')
    <style>
        section {
            padding-top: 100px;
        }
        .form-section {
            padding-left: 15px;
            display: none;
        }
        .form-section.current {
            display: inherit;
        }
        .btn-info, .btn.btn-success {
            margin-top: 10px;
        }
        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('permissions.index')}}">All Permissions</a></li>
                            <li class="breadcrumb-item active">Create Multistem Form</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Multistem Form</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header text-white bg-info">
                                <h5>Multi step form</h5>
                            </div>
                            <div class="card-body">
                                <form class="contact-form">
                                    @csrf
                                    @include('backend.pages.forms.partials._form', ['buttonText' => __("Create")])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/js/parsley.min.js') }}"></script>
    <script>
        $(function(){
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }

            function curIndex()
            {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click(function() {
                $('contact-form').parsley().whenValidate({
                    group:'block-'+ curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });

            $sections.each(function(index,section) {
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });

            navigateTo(0);
        });
    </script>
@endsection --}}


