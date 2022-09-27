<?php $fcmdomain=$_SERVER['SERVER_NAME']; 
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">

<head>

	

<script src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">

  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">

  <meta name="author" content="PIXINVENT">

  <title>{{$setting->name_ar}} - Expand</title>

  <!-- <link rel="apple-touch-icon" href="{{asset('assets/images/ico/apple-icon-120.png')}}">

  <link rel="shortcut icon" type="image/x-icon" href="{{$setting->logo}}"> -->

  <link rel="apple-touch-icon" href="{{asset('storage/favicon.ico')}}">

  <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/favicon.ico')}}">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"

  rel="stylesheet">

  <!--<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"rel="stylesheet">-->

  <!-- BEGIN VENDOR CSS-->

  

  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css"  />-->

  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/js/all.min.js"></script>-->



  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/line-awesome/css/line-awesome.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/weather-icons/climacons.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/meteocons/style.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/morris.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/chartist.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">



@if(app() -> getLocale() === 'ar')



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

  <!-- END Custom CSS-->



@elseif(app() -> getLocale() === 'en')

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors.css')}}">



  <!-- END VENDOR CSS-->

  <!-- BEGIN MODERN CSS-->

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}">

  <!-- END MODERN CSS-->

  <!-- BEGIN Page Level CSS-->

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/horizontal-menu.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-gradient.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/simple-line-icons/style.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-gradient.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/timeline.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/dashboard-ecommerce.css')}}">

  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/select2/css/select2.min.css">

  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/select2/css/select2-bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/vendors/css/forms/selects/select2.min.css">

  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/css-rtl/core/colors/palette-tooltip.css">

 

  <!-- END Page Level CSS-->

  <!-- BEGIN Custom CSS-->

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

  <!-- END Custom CSS-->

@endif

 



<style>

	.progress { position:relative; width:100%; 

    height: 20px;  display:none;}

	.bar { background-color: #b5076f; width:0%; height:20px; }

	.percent { position:absolute; display:inline-block; left:50%; color: #040608;}

	.fa-external-link{

	    font-size: 24px;

	}

	html body .content{

	    padding: 15px;

	}

	.tooltip{

	    /*width:800px !important;*/

	}

</style>

</head>

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded"

data-open="click" data-menu="horizontal-menu" data-col="2-columns">

<!-- fixed-top-->

<!-- modals -->

<style>
.pace{
        display:none;
    }
  .modal-header{

      background-color: #0073AA;

  }

  .modal-title{

      color:#ffffff;

  }

  .hide{

      display:none;

  }
  .inputD
    {
        width:97%!important;
    }
    .input-group{
        width: 91% !important;
    }
    .des-p-l22{
        padding-left: 22px;
    }
    .hidedesc{
        display:none;
    }
    .notseen{
        background-color: #DCF8C6!important;
    }
    #tag_pic{
        display:none;
    }
    ol li::marker{
        color:#1E9FF2
    }
    .addressmob{
        width:95%!important;
    }
    .subscribermob{
        width:95%!important;
    }
    .pl7mob{
        width:100%;
    }
    .entermob{
        max-width: 40%!important;
    }
    .addressinputmob{
        width:97%!important;
    }
    .piceDiv {
            padding-left:10px;;
        }
    .widthsub{
        width:96%!important;
    }
    .widthmail{
        width:93%!important;
    }
    .widthRegion{
        width:100%!important;
    }
    .formnoleft{
        padding-left: 0!important;
    }
    .hidedesc-inline{
          display:none;
      }
      .w-96{
          width:96%!important;
      }
   @media (max-width: 767.98px){
      #tag_pic{
        display:inline-block;
    }
      .hidedesc{
        display:inline-block;
    }
    .piceDiv {
            padding-left: 15px;
        }
    .w-iconmob{
        width:50%;
    }
    
    
    .rightSide{
        height:300px!important;
        max-height:330px!important;
        min-height:310px!important;
    }
    .btnArea{
        margin-top:25px!important;
    }
      .des-p-l22{
        padding-left: 14px!important;
    }
    .dropdown-item{
        font-size: 14pt!important;
    }
    .w-76-mob{
        width:50%!important;
    }
    .dropmob{
        display:inline;
        margin-bottom:15px;
        margin-top: 62px;
        margin-right:20px;
    }
    .searchmob{
        max-width:276px!important;
        width:255px;
        display:inline;
        margin-right:3%!important;
    }
    .linkmailmob{
        padding: 0.8rem 0.25rem!important;
    }
    .menumob1{
        width:300px!important;
        right: auto!important;
    }
    
    .prependmob{
        width:22%!important;
    }
    .prependmob1{
        width:26%!important;
    }
    #cke_15{
        display:none;
    }
    #cke_17{
        display:none;
    }
    #cke_20{
        display:none;
    }
    #cke_46{
        display:none;
    }
    #cke_53{
        display:none;
    }
    #cke_52{
        display:none;
    }
    #cke_50{
        display:inline;
    }
    #cke_49{
        display:inline;
    }
    .email-app-options{
        padding: 23px 0px 23px 0;
    }
    .messagemob{
        margin-top: 20px;
    }
    #cke_28{
        display:inline;
    }
    #cke_32{
        display:none;
    }
    #cke_33{
        display:none;
    }
    #cke_13{
        display:none;
    }
    #cke_31{
        display:none;
    }
    #cke_14{
        display:none;
    }
    #cke_34{
        display:none;
    }
    .docmob{
        width:96%!important;
    }
    .menumob{
        width:300px!important;
        right: auto!important;
        top:auto!important;
    }
    .posmob{
        margin-right: 15px!important;
    }
    .infoAvataronmob{
        width:100%!important;
    }
    .imagemob{
        width:12%;
    }
    .Avataronmob{
            padding-right: 40px!important;
            width: 87%!important;
            margin-top: 10px;
    }
    .avatar-onlineonmob{
        height:50px!important;
    }
    .pl15-mob{
        padding-left:15px!important;
    }
    .mr-15mob{
        margin-right: 15px;
    }
    .poselecmob{
        width: 30%;
    }
    .poselecmob{
        width: 30%;
    }
    .onmobatt{
        width:25%!important;
        display:inline;
    }
    .notimob{
        width: 50vh;
    }
    .navmob{
        height: 140px!important;
    }
    .navhmob{
            margin-bottom: 40px;
    }
    .messagelist{
        overflow: scroll;
        max-width:350px;
    }
    .inmob{
        width:9%!important;
    }
    .appmainmob{
        margin-top: 72px;
    }
    .SubPage{
        margin-top:0;
    }
    .contentonmob{
        padding:.7rem!important;
    }
    .tablescroll{
        overflow: scroll;
        max-width:350px;
        padding-right:0!important;
    }
    .w-100{
        width:100px!important;
    }
    .fontMob{
    font-size: 14pt;
    padding-bottom:10px;
      }
      .paddzeromob{
        padding-right:10px!important;
        padding-left:17px!important;

      }
      .hidedesc-inline{
          display:inline;
      }
      .infoAvatar{
          padding-right:0px!important;
      }
      .hidemob{
          display:none;
      }
      .olmob{
          padding-right:10px!important;
      }
    .paddmob{
        margin-bottom:10px!important;
        margin-right:7px;
    }
    .paddformmob{
        margin-bottom:10px!important;
        margin-right:15px;
    }
    .select2-container{
        width:78%!important;
    }
    .entermob{
        max-width:100%!important;
        
    }
    .textmob{
        height: 60px;
    }
    .w-80mob{
        width:82%!important;
    }
    .attmob{
        width:70%!important;
    }
    .attdocmob{
        width:10%!important;
        padding-left: 30px;
    }
    .attdocmob1{
        width:10%!important;
    }
    .feestextmob{
        width:70%!important;
        padding-left:3px;
    }
    .feesnummob{
        width:30%!important;
        padding-right:3px;
    }
    .feestotalmob{
        width:30%!important;
        padding:0;
        
    }
    .feestotalnummob{
        width:70%!important;
        padding-right:0;
    }
    .mailmobheader{
        margin-right:0!important;
        margin-left:0!important;
        padding-right:0!important;
        padding-left:0!important;
    }
    .empimgmob{
        max-height:52px!important;
    }
    .attdelmob{
        width:10%!important;
    }
    .app_status{
        font-size:10pt!important;
    }
    .onmobile{
        padding-right:0px!important;
        padding-left:0px!important;

    }
    .searchmailmob{
            margin-top: 62px!important;
    }
    .color-mob{
        color: #acb0b4
    }
    .leftSide{
            padding-right: 20px!important;
            padding-left: 20px!important;
    }
    .pl7mob{
        padding-left: 7px;
        width: 110%;
    }
    .status{
            width: 94%!important;
    }
    .taginfomob{
        width:40%!important;
        
    }
    .exonmobile{
        width:98%!important;
    }
    .input-group{
        width:98%!important;
    }
    .w-91{
        width:89%!important;
    }
    .checkCop{
        margin-right: 10px;
    }
    .inputD
    {
        width:93%!important;
    }
    .colMob{
        padding:0!important;
    }
  }

  .lds-dual-ring {

display: inline-block;

width: 80px;

height: 80px;

}

.lds-dual-ring:after {

content: " ";

display: block;

width: 64px;

height: 64px;

margin: 8px;

border-radius: 50%;

border: 6px solid #fff;

border-color: #0084FF transparent #0084FF transparent;

animation: lds-dual-ring 1.2s linear infinite;

}

@keyframes lds-dual-ring {

0% {

  transform: rotate(0deg);

}

100% {

  transform: rotate(360deg);

}

}

th{

  background-color:#0073AA; 

}

</style>



<style>

    .attach-text{

        color:#000000;

            font-size: 14px;

    }

</style>
<script>realPath='{{route('admin.dashboard')}}/'</script>
<div class="modal fade text-left" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

	<div class="modal-dialog entermob"  role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel1">إرسالة رسالة نصية قصيرة</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body">

				<div class="form-body">

                    <form id="SMSFormData" >

                        <table width="100%" class="detailsTB table engTbl">

        						<tr>

        							<td>
                                            أدخل رقم الموبايل
        							</td>
        						</tr>
        						<tr>

        							<td>

        							    <input type="text" name="smsNo" id="smsNo" class="form-control"  />

        							</td>

        						</tr>

        						<tr>

        							<td>

        							    أدخل نص الرسالة

        							</td>

        						

        						</tr>

        						

        						<tr>

        							<td>
                                        <textarea type="text" id="smsText" class="form-control"
                                        value="" name="smsText" style="height: 60px;"></textarea>

        							</td>

        						</tr>

        						

        						<tr>

        							<td colspan="4" style="text-align: center!important;">

        							    <button type="button" class="btn btn-primary text-center" id="" style="" onclick="sendSMS()">

        							    إرسال    

        							    </button>

        							</td>

        						</tr>

        					</table>

					</form>

				</div>

			</div>

		</div>

	</div>

</div>



<div class="loader hide " style="z-index: 10000;">

    

	<div class="lds-dual-ring"></div>

</div>

<!-- <div class="alert alert-danger mb-2 hide" style="bottom: 50%; " onclick="$(this).toggle()" style="cursor:pointer" role="alert">

  <span id="errMsg"></span>

</div>

<div class="alert alert-success mb-2 hide" style="bottom: 50%; " onclick="$(this).toggle()" style="cursor:pointer" role="alert">

  <span id="succMsg"></span>

</div>

 -->



<!-- begin header -->

@include('dashboard.includes.header')

<!-- end header -->

<!-- begin sidebar -->

@include('dashboard.includes.navbar')

<!-- end sidebar -->

@if ($type=='mailPage')

@yield('content')

@else

<div class="app-content content appmainmob">

    @if ($type=='intro')

  <div class="content-wrapper onmobile contentonmob" style="

    display: block;

    background-color: #ffffff;

    min-height: 700px;

">

      @else 

  <div class="content-wrapper onmobile contentonmob" style="

    display: block;

">

    @endif

@yield('content')

  </div>

</div>

@endif

<!-- begin footer html -->

@include('dashboard.includes.footer')



<!-- end footer -->

<!-- modals -->

<div class="modal fade text-left" id="QuickAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"

aria-hidden="true">

	<div class="modal-dialog modal-dialog2" role="document">

	  <div class="modal-content">

		<div class="modal-header modal-header2">

		  <h4 class="modal-title" id="myModalLabel1" style="color: #ffffff;"><span id="ModalTitle"></span></h4>

		  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">

			<span aria-hidden="true">&times;</span>

		  </button>

		</div>

		<div class="modal-body">

		  <div class="form-body">

			<div class="form-group">

				<div class="input-group" style="max-height: 200px; overflow: auto;">

					<table style="width:100%" class="detailsTB table">

						<tr>

							<th scope="col">#</th>

							<th scope="col">العنوان</th>

							<th scope="col"></th>

						</tr>

						<tbody id="subTaskpop">



						</tbody>

					</table>

				</div>

			</div>

			<div class="form-group" style="color:#EB844C">

				New <span id="ModalTitle1"></span>: 

			</div>

			<form method="post" id="store-modal" >

                @csrf

			<div class="form-group">



			  <input type="text" id="s_name_ar1" class="form-control" placeholder="" name="s_name_ar1">

			  <input type="hidden" id="s_name_en1" class="form-control" placeholder="" name="s_name_en1">

			  <input type="hidden" id="fk_i_constant_id1" class="form-control" placeholder="Label (En)" name="fk_i_constant_id1">

			  <input type="hidden" id="fk_i_constantdet_id1" class="form-control" placeholder="Label (En)" name="fk_i_constantdet_id1">

			  <input type="hidden" id="pj_i_id" class="form-control" placeholder="Label (En)" name="pj_i_id">

			  <input type="hidden" id="contid" class="form-control" placeholder="Label (En)" name="contid">

			  <input type="hidden" id="ctrlToRefresh" class="form-control" placeholder="Label (En)" name="ctrlToRefresh">

		  </div>

		  <div class="form-group" style="text-align:center">

			  <button type="submit" class="btn btn-info modalBtn" >حفظ</button>

			  </div>

		</form>

		  </div>

		</div>

	  </div>

	</div>

</div>

<script>
var print = false; 
function printFunction(){
     print = true;
     $('#ticketFrm').submit()
    }
function noti()
{           
    $.ajax({
        type: 'get', // the method (could be GET btw)
        url: "{{ route('get_noti') }}",
        success:function(response){
            if(response.copyTo)
            {
                var typeArray = { "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'}; 
                var baseUrl = '{{ route('admin.dashboard') }}/';
                $('.setAllAsRead').html(response.CopyToCount)
                let cc="#F2F3F5"
                for(let i=0;i<response.copyTo.length;i++)
                {
                    if(response.copyTo[i].model_id!=null){
                        var timestamp = response.copyTo[i].archive.created_at;
                        var date = new Date(timestamp);
                        
                        date_str = 'بتاريخ :'+date.getDate()+
                                  "/"+(date.getMonth()+1)+
                                  "/"+date.getFullYear()+
                                  " الساعة: "+
                                  " "+date.getHours()+
                                  ":"+date.getMinutes()+
                                  ":"+date.getSeconds();
                          var attach='';
                        if(response.copyTo[i].archive.files.length>0){
                            let row ='';
                            
                            var j=0;
        
                            for(j=0;j<response.copyTo[i].archive.files.length;j++){
        
                                shortCutName=response.copyTo[i].archive.files[j].real_name;
        
                                urlfile='{{ asset('') }}';
        
                                urlfile+=response.copyTo[i].archive.files[j].url;
        
                                if(response.copyTo[i].archive.files[j].extension=="jpg"||response.copyTo[i].archive.files[j].extension=="png"||response.copyTo[i].archive.files[j].extension=="jfif")
        
                                fileimage='{{ asset('assets/images/ico/image.png') }}';
        
                                else if(response.copyTo[i].archive.files[j].extension=="pdf")
        
                                fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                else if(response.copyTo[i].archive.files[j].extension=="doc")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(response.copyTo[i].archive.files[j].extension=="excel"||response.copyTo[i].archive.files[j].extension=="xsc")
        
                                fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
        
                                else
        
                                fileimage='{{ asset('assets/images/ico/file.png') }}';
        
                                    shortCutName=shortCutName.substring(0, 20);
        
                                    attach+='<div id="attach" class=" col-sm-3 col-md-6 onmobatt">' +
        
                                        '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
        
                                        +'    '
        
                                        +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><span class="attach-text hidemob">'+shortCutName+'</span><img style="width: 20px;"src="'+fileimage+'"></a>'
        
                                        +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
        
                                        +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
        
                                        +'    </div>'
        
                                        +'  </div>' ;
                            }
        
                            row += attach;
                            // ${typeArray[response.copyTo[i].archive.type]}
                        }
                        var noti_template=`<div class="media" ${(response.copyTo[i].is_seen==0)?`style="background-color:${cc}" `:''}>
                          <div class="media-body">
                          <div class="row" >
                            <a style="margin-bottom: 15px;" class=" col-10" href="${baseUrl+response.copyTo[i].archive.url+'?id='+response.copyTo[i].archive.id}" onclick="seen_noti(${response.copyTo[i].id})">
                                <h3 class="media-heading">${response.copyTo[i].archive.title}</h3>
                                <p class="notification-text notimob font-small-5 text-muted"><span style="color: #0C84D1;">
                                تمت اضافة ارشيف 
                                ${(response.copyTo[i].archive.name&&response.copyTo[i].archive.name!="")?`على ${response.copyTo[i].archive.name}`:''}
                                من قبل ${response.copyTo[i].archive.admin.nick_name}
                                </span></p>
                                <small>
                                  <time class="media-meta" style="color:#000;">${date_str}</time>&nbsp;
                                </small>
                            </a>
                            <div class="col-2" style="text-align:left;cursor: pointer;" onclick="noti_delete(${response.copyTo[i].id})"><i style="color:#ffffff; padding:5px;" class="fa fa-times bg-red"></i></div>
                               
                                ${attach}
                                
                        </div>
                        
                          </div>
                          
                        </div>`;
                        $('.noti_list').append(noti_template);
                    }else{
                        var timestamp = response.copyTo[i].created_at;
                        var date = new Date(timestamp);
                        taskname=response.copyTo[i].ticket_config.ticket_name;
                        if(response.copyTo[i].app_no==23){
                            taskname=response.copyTo[i].taskName;
                        }
                        date_str = 'بتاريخ :'+date.getDate()+
                                  "/"+(date.getMonth()+1)+
                                  "/"+date.getFullYear()+
                                  " الساعة: "+
                                  " "+date.getHours()+
                                  ":"+date.getMinutes()+
                                  ":"+date.getSeconds();
                                //   ${baseUrl+response.copyTo[i].archive.url+'?id='+response.copyTo[i].id}
                        var noti_template=`<div class="media" ${(response.copyTo[i].is_seen==0)?`style="background-color:${cc}" `:''}>
                          <div class="media-body">
                          <div class="row" >
                            <a style="margin-bottom: 15px;" class=" col-10" href="{{route('admin.dashboard')}}/viewTicketPortal/${response.copyTo[i].id}" onclick="seen_noti(${response.copyTo[i].id})">
                                <h3 class="media-heading">${taskname}</h3>
                                <p class="notification-text font-small-5 text-muted"><span style="color: #0C84D1;">
                                تمت اضافة طلب
                                من قبل ${response.copyTo[i].customer_name}
                                </span></p>
                                <small>
                                  <time class="media-meta" style="color:#000;">${date_str}</time>&nbsp;
                                </small>
                            </a>
                            <div class="col-2" style="text-align:left;cursor: pointer;" onclick="noti_delete(${response.copyTo[i].id})"><i style="color:#ffffff; padding:5px;" class="fa fa-times bg-red"></i></div>
                               
                        </div>
                        
                          </div>
                          
                        </div>`;
                        $('.noti_list').append(noti_template);
                        
                    }
                }
            }
        },
    });
}
noti();
function noti_delete(id)
{   if(confirm('هل انت متاكد من حذف الاشعار؟ لن يمكنك استرجاعه')){
        $.ajax({
        type: 'get', // the method (could be GET btw)
        url: "noti_delete",
        data: {
        c_id: id,
                },
        success:function(response){
                $('.noti_list').html('');
                noti();
                },
                });
            
        return true;
    }
    return false;
}
function seen_noti(id)
{           
    $.ajax({
    type: 'get', // the method (could be GET btw)
    url: "noti_seen",
    data: {

                    c_id: id,

            },
    success:function(response){
        console.log('s')
            },
            });
}
function drawVac($id) {

    let emp_id = $id;
    $.ajax({

        type: 'get',

        // the method (could be GET btw) 

        url: 'getVacForEmployee/'+emp_id,
        success: function(response) {
           
            if (response.success=='getData') {
                $('#r_balance').html(response.infoVac.balance)
                $('#r_spent').html(response.infoVac.balance_done)
                $('#r_remain').html(response.infoVac.restB)
                $('#u_balance').html(response.infoVac.emergency)
                $('#u_spent').html(response.infoVac.emergency_done)
                $('#u_remain').html(response.infoVac.restE)
            }else{
                
            }
        },

    });

}
$('#store-modal').submit(function(e) {

	$(".loader").removeClass('hide');

	contid=$("#contid").val();

	if(contid == 33){

		fillIn = 'area_data';

	}else if(contid == 77){

		fillIn = 'region_data';

	}else{

		fillIn=$("#ctrlToRefresh").val();

	}

       e.preventDefault();

	   $( "#NationalID" ).removeClass( "error" );

       let formData = new FormData(this);

       $.ajax({

          type:'POST',

          url: "store_model",

           data: formData,

           contentType: false,

           processData: false,

           success: function (data) {

			$(".loader").addClass('hide');

				if (data) {

						$("#" + fillIn).append(new Option(data.name, data.id));

				}

				$(".loader").addClass('hide');

						//$(".form-actions").removeClass('hide');

						$("#s_name_ar1").val('')

						$("#QuickAdd").modal('hide');

           },

           error: function(response){

			$(".loader").addClass('hide');

            if(response.responseJSON.errors.s_name_ar1){

                $( "#s_name_ar1" ).addClass( "error" );

            }

          

           }

       });

  });

  

  </script>

<div class="row hideMob" id="tag_id" style="display:none; margin-right: 10px; margin-left: 5px;"> 

	<div class="col-md-12">

		<div class="form-group">

			<div class="input-group" style="width:99% !important;">

			    <div class="input-group-prepend">

					<span class="input-grojkup-text" id="basic-addon1">

					    نسخة إلى

					</span>

				</div>

				<select id="tags" name="tags[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:100%;height: 35px;">

                    <?php $employees=array();

                    if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>

                        <?php foreach ($employees as $key => $value){ ?>

                            <option value="<?php echo $value->pk_i_id; ?>"><?php echo $value->nickname; ?></option>

                        <?php } ?>

                    <?php } ?>

                </select>

		    </div>

	    </div>

    </div>

</div>

<span onclick="ShowConstantModal(1,'CurrencyID','title')" style="display:none">Test</span>

@include('layouts.popup')
@include('layouts.addresspopup')
<div class="modal fade text-left" id="addLingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"

	 aria-hidden="true">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel1">إضافة رابط</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body">

				<div class="form-body">

					<div class="form-group">

						<div class="input-group">

							<div class="input-group-prepend">

					<span class="input-group-text" id="basic-addon1">

						العنوان:

					</span>

							</div>

							<input type="text" id="URLTxt" class="form-control" placeholder="Label (Ar)" name="URLTxt">

							<input type="hidden" id="URLForm" class="form-control" placeholder="Label (Ar)" name="URLForm">

						</div>

					</div>

					<div class="form-group">

						<div class="input-group">

							<div class="input-group-prepend">

					<span class="input-group-text" id="basic-addon1">

						الرابط:

					</span>

							</div>

							<input type="text" id="URLref" class="form-control" placeholder="Label (En)" name="URLref">

						</div>

					</div>

				</div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>

				<button type="button" class="btn btn-outline-primary" onclick="addUrlToList('formData')">حفظ</button>

			</div>

		</div>

	</div>

</div>





<div class="modal fade text-left" id="getCompainByTiket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"

	 aria-hidden="true">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel1">الموظفين   </h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body">

				<div class="form-body" id="compainList">

					<div class="form-group">



					</div>

				</div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>

			</div>

		</div>

	</div>

</div>

<script src="{{asset('assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

  <!-- BEGIN VENDOR JS-->

  <!-- BEGIN PAGE VENDOR JS-->

  @yield('script')

  <script type="text/javascript" src="{{asset('assets/vendors/js/ui/jquery.sticky.js')}}"></script>

  <!--<script src="{{asset('assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}"

  type="text/javascript"></script>-->

  <script src="{{asset('assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>

  <!-- <script src="{{asset('assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script> -->

  <script src="{{asset('assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>

  <!-- END PAGE VENDOR JS-->

  <!-- BEGIN MODERN JS-->

  <script src="{{asset('assets/js/scripts/ui/jquery.mask.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/js/scripts/ui/jquery-ui/jquery.colorbox-min.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/js/scripts/ui/jquery-ui/jquery-ui.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/js/core/app-menu.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/js/core/app.js')}}" type="text/javascript"></script>

  <script src="{{asset('assets/js/scripts/customizer.js')}}" type="text/javascript"></script>

  <script src="https://template.expand.ps/app-assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- END MODERN JS-->

  <!-- BEGIN PAGE LEVEL JS-->

  <!-- <script src="{{asset('assets/js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script> -->

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.0/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/fh-3.1.9/r-2.2.9/sp-1.4.0/datatables.min.js"></script>

    <script type="text/javascript" src="https://template.expand.ps/app-assets/vendors/js/ui/jquery.sticky.js"></script>

  <script src="https://template.expand.ps/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>

  <script src="https://template.expand.ps/app-assets/js/scripts/tooltip/tooltip.js" type="text/javascript"></script>

  <script src="https://template.expand.ps/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

<script>



// the selection for menu search



$( function() {

    $( ".full_search" ).autocomplete({

		source:"{{route('search')}}",

		minLength: 1,

		





		

        select: function( event, ui ) {

			var id = ui.item.id;

			var url = '{{ route('admin.dashboard') }}/'+ui.item.url;

			var fullUrl = url+'?id'+'='+id;

		    $(location).attr('href', fullUrl)

		}

	});

});





$( function() {

    $( ".home_search" ).autocomplete({

		source:'search',

		minLength: 1,



        select: function( event, ui ) {

			var id = ui.item.id;

			var url = ui.item.url;

			var fullUrl ='admin/'+url+'?id'+'='+id;

		    $(location).attr('href', fullUrl)

		}

	});

});



  function QuickAdd(contid,ctrl,title){

return;

$(".loader").removeClass('hide');

//$(".form-actions").addClass('hide');



DrawTable(contid)

$("#fk_i_constant_id1").val(contid);

$("#ctrlToRefresh").val(ctrl);

$("#contid").val(contid);

$("#ModalTitle").html(title);

$("#ModalTitle1").html(title);

$("#QuickAdd").modal('show');



$(".loader").addClass('hide');

}

function doUploadPic(){

	$.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $(".loader").removeClass('hide');

        $(".form-actions").addClass('hide');

        var formData = new FormData($("#setting_form")[0]);

        $.ajax({



            url: 'uploadPic',

            type: 'POST',

            data: formData,

            dataType:"json",

            async: true,

            success: function (data) {

                if(data){
                    console.log(data);
                    $(".alert-danger").addClass("hide");

                    $(".alert-success").removeClass('hide');

                    //$("#userProfileImg").attr('src', window.location.origin+'/'+data.url);


                    if(data.Input=='imgPic')
					{
					    $("#userProfileImg").attr('src', "{{ asset('') }}"+data.file.url);

                        $("#userimgpath").val(data.file.url);
    
                        $("#file_id").val(data.file.id);
    
                        $("#userimgpath").trigger('change')
					}
                    else if(data.Input=='header_img')
                    {
                        
                        $("#userHeaderImg").attr('src', "{{ asset('') }}"+data.file.url);

                        $("#header_img").val(data.file.url);
    
                        $("#file_id").val(data.file.id);
    
                        $("#header_img").trigger('change')
                    }
                    else if(data.Input=='footer_img')
                    {
                        
                        $("#userFooterImg").attr('src', "{{ asset('') }}"+data.file.url);

                        $("#footer_img").val(data.file.url);
    
                        $("#file_id").val(data.file.id);
    
                        $("#footer_img").trigger('change')
                    }

                    setTimeout(function(){

                        $(".alert-danger").addClass("hide");

                        $(".alert-success").addClass("hide");

                    },2000)

                }

                else {

                    $(".alert-success").addClass("hide");

                    $(".alert-danger").removeClass('hide');

                    $("#errMsg").text(data.status.msg)

                }

                $(".loader").addClass('hide');

                $(".form-actions").removeClass('hide');

            },

            error:function(){

                $(".alert-success").addClass("hide");

                $(".alert-danger").removeClass('hide');

                $("#errMsg").text(data.status.msg)

                $(".loader").addClass('hide');

                $(".form-actions").removeClass('hide');

            },

            cache: false,

            contentType: false,

            processData: false

        });

    }

function doUploadAttach(formDataStr)

    {

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')

            }

        });

        $(".loader").removeClass('hide');

        $(".form-actions").addClass('hide');

        var formData = new FormData($("#"+formDataStr)[0]);

        $.ajax({

            url: 'uploadAttach',

            type: 'POST',

            data: formData,

            dataType:"json",

            async: true,

            success: function (data) {

                row='';

                console.log(data.all_files);

                if(data.all_files){

                    var j=0;

                    for(j=0;j<data.all_files.length;j++){

                shortCutName=data.all_files[j].real_name;

                shortCutID=data.all_files[j].id;

                        urlfile='{{ asset('') }}';

                        console.log(urlfile);

                        urlfile+=data.all_files[j].url;

                        console.log(urlfile);

                            shortCutName=shortCutName.substring(0, 40)

                            row+='<div id="attach" class=" col-lg-12 ">' +

                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'

                                +'    <span class="attach-text">'+shortCutName+'</span>'

                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><i class="fa fa-eye"></i></a>'

                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'

                                +'      <input type="hidden" id="'+formDataStr+'imgUploads[]" name="'+formDataStr+'imgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="'+formDataStr+'orgNameList[]" name="'+formDataStr+'orgNameList[]" value="'+shortCutName+'">'

								+'             <input type="hidden" id="'+formDataStr+'orgIdList[]" name="'+formDataStr+'orgIdList[]" value="'+shortCutID+'">'

							    +'    </div>'

                                +'  </div>' +

                                '</div>'

                    }

                    $(".alert-danger").addClass("hide");

                    $(".alert-success").removeClass('hide');

        $("."+formDataStr+"FilesArea").append(row)

                    $(".loader").addClass('hide');

                    //document.getElementById(""+formDataStr+"upload-file[]").value="";

                    $(".group1").colorbox({rel:'group1'});

                    setTimeout(function(){

                        $(".alert-danger").addClass("hide");

                        $(".alert-success").addClass("hide");

                    },2000)

                }

                else {

                    $(".alert-success").addClass("hide");

                    $(".alert-danger").removeClass('hide');

                }

                $(".loader").addClass('hide');

                $(".form-actions").removeClass('hide');

            },

            error:function(){

                $(".alert-success").addClass("hide");

                $(".alert-danger").removeClass('hide');

                $(".loader").addClass('hide');

                $(".form-actions").removeClass('hide');

            },

            cache: false,

            contentType: false,

            processData: false

        });

    }

function DrawTable(id){

	var formData = {

		'pk_i_id':id,

		_token: '{{csrf_token()}}',

	};



	$.ajax({

		url:'getConstantChildren',

		type: 'POST',

		data: formData,

		dataType:"json",

		async: true,

		success: function (data) {

			i=1;

			row='';

			for(j=0; j<data['data'].length;j++) {

				row += '<tr>'

					+ '<td width="20px">'

					+ i

					+ '</td>'

					+ '<td>'

					+ data['data'][j].name

					+ '</td>'

					+ '<td width="40px">'

					+ '<i class="fa fa-edit" id="trash" aria-hidden="true" style="color:#1E9FF2;padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="editConstant('+data['data'][j].id+',\''+data['data'][j].name+'\',\''+data['pj_i_id']+'\')"></i>'

					+ '<i class="fa fa-trash" id="trash" aria-hidden="true" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="deleteConstant('+data['data'][j].id+')"></i>'

					+ '</td>'

					+ '</tr>'

				i++

			}



			$("#subTaskpop").html(row);

		},

		error:function(){

			$(".alert-success").addClass("hide");

			// $(".alert-danger").removeClass('hide');

			$("#errMsg").text(data.status.msg)

			$(".loader").addClass('hide');

			//$(".form-actions").removeClass('hide');

		},

		/*cache: false,

		 contentType: false,

		 processData: false*/

	});

}

function editConstant(id,title,pj_i_id){

	console.log(id,title,pj_i_id);

	$("#s_name_ar1").val(title);

	$("#pj_i_id").val(pj_i_id);

	$("#fk_i_constantdet_id1").val(id);



	$(".modalBtn").text('update')

}

function deleteConstant(id){

	//deleteSubConstant

	fillIn=$("#ctrlToRefresh").val();

	if(!confirm('Are you sure you want to delete this record?'))

		return

	var formData = {

		'pk_i_id': id,

		'fk_i_constant_id': $("#fk_i_constant_id1").val(),

		_token: '{{csrf_token()}}',



	};

	console.log(formData);

	$.ajax({

		url:  'deleteSubConstant',

		type: 'POST',

		data: formData,

		dataType: "json",

		async: true,

		success: function (data) {

			location.reload();

			$("#" + fillIn).html(new Option(" Select ", ''));

			if (data.constList.length > 0) {

				for (i = 0; i < data.constList.length; i++)

					$("#" + fillIn).append(new Option(data.constList[i].s_name_ar, data.constList[i].pk_i_id));

			}

			else {

				//$("#"+fillIn).append(new Option(data.constList[0].s_name_ar, data.currNode[0].pk_i_id));

			}



			$(".loader").addClass('hide');



			//$("#QuickAdd").modal('hide');

			DrawTable($("#fk_i_constant_id1").val())

			$("#fk_i_constantdet_id1").val('0')

		},

		error: function () {

			$(".alert-success").addClass("hide");

			$(".alert-danger").removeClass('hide');

			// $("#errMsg").text(data.status.msg)

			$(".loader").addClass('hide');

		},

		/*cache: false,

		 contentType: false,

		 processData: false*/

	});

}	

  $(document).ready(function() {

      

	$(".select2").select2();

    

  //$(".sticky-wrapper").css("display", "none");

  $("#nav_hover").click(function() {



   /* if ( $('#nav_expanded_nav').css('display') == 'none' || $('#nav_expanded_nav').css("visibility") == "hidden"){

             // $("#nav_expanded_nav").css("display", "block");

              //$("#nav_expanded_nav").css("visibility", "visible");

              //$(".sticky-wrapper").css("display", "block");

              //$(".sticky-wrapper").css("height", "70px");



    }else{

            //  $("#nav_expanded_nav").css("display", "none");

              //$("#nav_expanded_nav").css("visibility", "hidden");

              //$(".sticky-wrapper").css("display", "none");

    } */

     

  });




leftSide=$(".leftSide").height()

		rightSide=$(".rightSide").height()



		setTimeout(function() {

		    if(screen.width>600){

			if (leftSide > rightSide)

				$(".rightSide").attr("style", "min-height:" + ($(".leftSide").height() + "px"))

			else

				$(".leftSide").attr("style", "min-height:" + ($(".rightSide").height() + "px"))

			

			$(".selectize-input .item").html('')

		    }

			

		},1000)

		$(".select2").attr('style','width:90%');

		$("#emp_to_close_json").next().attr('style','width:70%');
		$("#emp_to_close_json").prev().attr('style','width:30%');
		$("#emp_to_revoke_json").next().attr('style','width:70%');
		$("#emp_to_revoke_json").prev().attr('style','width:30%');
		$("#emp_to_update_json").next().attr('style','width:70%');
		$("#emp_to_update_json").prev().attr('style','width:30%');
// 		$("#allowed_emp").next().attr('style','width:58% !important');
// 		$("#allowed_emp").prev().attr('style','width:40% !important');
		$("#emp_to_reopen_ticket").next().attr('style','width:70%');
		$("#emp_to_reopen_ticket").prev().attr('style','width:30%');
		$("#emp_to_report_ticket").next().attr('style','width:70%');
		$("#emp_to_report_ticket").prev().attr('style','width:30%');
		$("#emp_to_tag_ticket").next().attr('style','width:70%');
		$("#emp_to_tag_ticket").prev().attr('style','width:30%');
        $("#emp_to_access_portal").next().attr('style','width:60%');
		$("#emp_to_access_portal").prev().attr('style','width:40%');
		

});

		

</script>
  <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
        userProile=0;
        $(document).ready(function(){
            userProile=$("#Assigned2ID").val();
        })
    function writeUserData(redirecURL) {
        
        userProile=$("#Assigned2ID").val();
        // console.log(userProile+'   '+ typeof(userProile));
        let tags=$('#tags').val()
        tags.unshift(userProile)
        senderName='<?php echo Auth()->user()->nick_name; ?>'
        tags.map((userId)=>{ 
            firebase.firestore().collection("Users").doc(userId).collection('notifications').add({
            data: 'قام '+senderName+' بإرسال طلب  '+ 
            $(".leftSide .card-title").children().first().next().text(),
            url: realPath+redirecURL,
            domain:'<?php echo $fcmdomain?>',
            type:"added"
        });
        })
        
        return true;
    }

    function writeUserForward(redirecURL) {
        
            userProile=''+$(".frm2 #Assigned2ID").val()+'';
        senderName='<?php echo Auth()->user()->nick_name; ?>'
        
        console.log(userProile,senderName,redirecURL)
        firebase.firestore().collection("Users").doc(userProile).collection('notifications').add({
            data: 'قام '+senderName+' بتحويل طلب '+ 
            $(".leftSide .card-title").children().first().next().text(),
            url: realPath+redirecURL,
            domain:'<?php echo $fcmdomain?>',
            type:"added"
        });
    }
    
    function writeRespondApp(redirecURL,userProile,str) {
        str='';
        console.log(redirecURL,userProile)
            //userProile=$("#Assigned2ID").val();
        senderName='<?php echo Auth()->user()->nick_name; ?>'
        firebase.firestore().collection("Users").doc(userProile).collection('notifications').add({
            data: 'قام '+senderName+' '+str +
            $(".leftSide .card-title").children().first().next().text(),
            url: realPath+redirecURL,
            domain:'<?php echo $fcmdomain?>',
            type:"added"
        });
    }
    
    const firebaseConfig = {
        apiKey: "AIzaSyAvvlz9UceU_DOIf83MKg7QtgqqiLwiDrI",
        authDomain: "expand.ps",
        databaseURL: "https://users.firebaseio.com",
        projectId: "expand-bcbbc",
        storageBucket: "expand-bcbbc.appspot.com",
        /*messagingSenderId: "",
        appId: ""*/
    };


    var user = "<?php echo Auth()->user()->id; ?>";
    firebase.initializeApp(firebaseConfig);
    firebase.firestore().collection("Users").doc(user).collection('notifications').onSnapshot(function (snapshot) {
        snapshot.docChanges().forEach(function (change) {
            if (change.type === "added") {
                if(change.doc.data().domain=='<?php echo $fcmdomain?>'){
                    firebase.firestore().collection("Users").doc(user).collection('notifications').doc(change.doc.id).delete();
                        /*loadNoti();
                        loadOutApp();*/
                        $('.myTaskTable').DataTable().ajax.reload(); 
                        
                        $('.myTaskTable').DataTable().on('init.dt', function() {
                            $(".odd").each(function(){
                                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                            });
                            $(".even").each(function(){
                                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                            });
                          })
                        $('.wtbl2').DataTable().ajax.reload();
                        $('.wtbl4').DataTable().ajax.reload();
                        $('.wtbl3').DataTable().ajax.reload();
                        // watingTaskTable.DataTable().ajax.reload(); 
                        // watingTaskTable.on('init.dt', function() {
                        //     $(".odd").each(function(){
                        //         $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                        //     });
                        //     $(".even").each(function(){
                        //         $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                        //     });
                        //     $(".nottes").each(function(){
                        //         $(this).html($(this).text());
                        //     });
                        //   })
                        // sentTaskTable.DataTable().ajax.reload(); 
                        // sentTaskTable.on('init.dt', function() {
                        //     $(".odd").each(function(){
                        //         $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                        //     });
                        //     $(".even").each(function(){
                        //         $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                        //     });
                        //     $(".nottes").each(function(){
                        //         $(this).html($(this).text());
                        //     });
                        //   })
                        
                        // tagedTaskTable.DataTable().ajax.reload(); 
                        // tagedTaskTable.on('init.dt', function() {
                        //     $(".odd").each(function(){
                        //         $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                        //     });
                        //     $(".even").each(function(){
                        //         $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                        //     });
                        //     $(".nottes").each(function(){
                        //         $(this).html($(this).text());
                        //     });
                        // })
                    Notification.requestPermission().then(function (permission) {
                      // If the user accepts, let's create a notification
                      if (permission === "granted") {
                        var notification = new Notification(change.doc.data().data);
                        notification.onclick = function(event) {
                          event.preventDefault(); // prevent the browser from focusing the Notification's tab
                          window.open(change.doc.data().url, '_blank');
                        }
                       // notification.onclick = function(){self.loction=change.doc.data().url};
                      }
                    });
                }
            }
        });

    });
    
    
    function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    //var notification = new Notification("Hi there!");
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        /*var notification = new Notification("Hi there!");
        notification.onclick = function(){self.loction='https://expand.ps'};*/
      }
    });
  }

  // At last, if the user has denied notifications, and you 
  // want to be respectful there is no need to bother them any more.
}

notifyMe();
</script>


  <!-- END PAGE LEVEL JS-->

</body>

</html>



