@extends('layouts.login')

@section('content')
<!--begin::Web font -->
<script src="{{asset('assets/js/webfont.js.download')}}"></script>
<link rel="stylesheet" href="{{asset('assets/css')}}" media="all">
<script>
    WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!--end::Web font -->

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/intro.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.bundle.css')}}">
<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
            <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
                <div class="m-stack m-stack--hor m-stack--desktop">
                    <div class="m-stack__item m-stack__item--fluid">
                        <div class="m-login__wrapper">
                            <div class="m-login__logo">
                                <a href="">
                                    <img src="{{asset('assets/images/backgrounds/intro.png')}}" height="65px">
                                </a>
                            </div>
                            <div class="m-login__signin">
                                <div class="m-login__head">
                                    <h3 class="m-login__title">
                                        أهلا بكم في نظام الإرشيف الإلكتروني
                                   </h3>
                                </div>
                                <form class="m-login__form m-form" action="{{route('admin.post.login')}}" method="post"
                                novalidate>
                                @csrf
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input" style="text-align: right;" value="" id="email" type="text" placeholder="اسم المستخدم" name="email" autocomplete="off">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input m-login__form-input--last" id="user-password" style="text-align: right;" type="Password" placeholder="كلمة المرور" name="password">
                                        @error('Password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="row m-login__form-sub">
                                        <div class="col m--align-left">
                                            <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                                نسيت كلمة المرور    
                                            </a>
                                        </div>
                                        <!-- <div class="col m--align-right">
                                            <label class="m-checkbox m-checkbox--focus">
                                                تذكرني
                                                <input type="checkbox" name="remember_me" id="remember-me"
                                                class="chk-remember"> 
                                                
                                                <span>
                                                    
                                                </span>
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="m-login__form-action">
                                        <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" style="    font-size: 16px;font-weight: bold;">
                                            تسجيل دخول
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url({{asset('assets/images/backgrounds/bg-4.jpg')}})">
                <div class="m-grid__item" style="width:100%; text-align:center">
                    <h1 class="m-login__title" style="color:#ffffff">E-Archive System</h1>
                    <h2 class="m-login__title" style="color:#ffffff">
                        الإرشيف الإلكتروني
                    </h2>
                    <p class="m-login__msg" style="display: none">
                        Lorem ipsum dolor sit amet, coectetuer adipiscing<br>elit sed diam nonummy et nibh euismod
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
   
    @stop
