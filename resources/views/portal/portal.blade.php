<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">

<head>

	
<script src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$setting->name_ar}} - Expand</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/line-awesome/css/line-awesome.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    
      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>-->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/responsev.css')}}">
      <link rel="apple-touch-icon" href="{{asset('storage/favicon.ico')}}">

  <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/favicon.ico')}}">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/vendors.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/app.css')}}">
    
    <!-- END MODERN CSS-->
    
    <!-- BEGIN Page Level CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/core/menu/menu-types/horizontal-menu.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/core/colors/palette-gradient.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/simple-line-icons/style.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/pages/timeline.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/pages/dashboard-ecommerce.css')}}">
    
    <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/css-rtl/core/colors/palette-tooltip.css">
    
    <!-- END Page Level CSS-->
    
    <!-- BEGIN Custom CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/custom-rtl.css')}}">

<style>
@media (max-width: 767.98px){
    
    .app-content{
    max-width: 350px;
    margin: auto;
    }
    .footer{
        margin-top:2vh!important;
    }
}
</style>
</head>
<body>
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center navmob" style="height: 85px!important;">
    <div class="navbar-wrapper" style="width:100%;height:100%">
        <div class="navbar-header ">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item" style="margin:auto">
                    <a class="navbar-brand" style="padding: 0px;padding-left:20px;" href="{{ route('portal') }}">
                        <img class="" alt="modern admin logo" src="{{$setting->logo}}" style="height:64px !important;margin-top: 7px;"  title="" >
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="app-content content appmainmob">
     <div class="content-wrapper onmobile contentonmob" style="display: block;margin-top: 20px;">
      <div class="content-header row">
      </div>
      <div class="content-body">
                @yield('content')
                <div class="card-footer bg-transparent footer" style="margin-top: 30vh;">
                    <div class="row">
                        <p class="text-muted text-center col-12 py-1" style="direction:rtl">
                             حقوق الملكية © 2022
                        <a class="text-bold-800 grey darken-2" href="https://expand.ps/water/index.php/test" target="_blank">EXPAND </a>, All rights reserved. </p>
                      
                    </div>
                </div>
      </div>
    </div>
</div>

<script src="{{asset('assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
@yield('script')

<!--<script src="https://template.expand.ps/app-assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>-->

<!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
  <script src="{{asset('assets/js/scripts/ui/jquery.mask.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/js/scripts/ui/jquery-ui/jquery.colorbox-min.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/js/scripts/ui/jquery-ui/jquery-ui.js')}}" type="text/javascript"></script>

  <!--<script src="{{asset('assets/js/core/app-menu.js')}}" type="text/javascript"></script>-->

  <!--<script src="{{asset('assets/js/core/app.js')}}" type="text/javascript"></script>-->

  <!--<script src="{{asset('assets/js/scripts/customizer.js')}}" type="text/javascript"></script>-->

  <script src="https://template.expand.ps/app-assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--<script src="{{asset('assets/js/scripts/ui/jquery.mask.js')}}" type="text/javascript"></script>-->
    
    <!--<script src="{{asset('assets/js/scripts/ui/jquery-ui/jquery.colorbox-min.js')}}" type="text/javascript"></script>-->
    
    <script src="{{asset('assets/js/scripts/ui/jquery-ui/jquery-ui.js')}}" type="text/javascript"></script>


    <script type="text/javascript" src="https://template.expand.ps/app-assets/vendors/js/ui/jquery.sticky.js"></script>

  <script src="https://template.expand.ps/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>

  <script src="https://template.expand.ps/app-assets/js/scripts/tooltip/tooltip.js" type="text/javascript"></script>

  <!--<script src="https://template.expand.ps/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>-->


</body>