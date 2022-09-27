@extends('layouts.admin')

@section('search')

<li class="dropdown dropdown-language nav-item hideMob">

            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">

          </li>

@endsection

@section('content')
<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
    padding: 2px 6px !important;
    margin-top: 0 !important;
    background-color: #1E9FF2!important;
    border-color: #1E9FF2 !important;
    color: #FFFFFF;
    margin-left: 8px !important;
    margin-bottom: 2px;
}
.preW{
    width:40%!important;
}
.select2-container--default
{
    width:60%!important;
}
</style>


<section class="horizontal-grid" id="horizontal-grid">

<form id="ajaxform">

    <div class="row white-row">

        <div class="col-sm-12 col-md-6">

            <div class="card rightSide">

                <div class="card-header">

                    <h4 class="card-title"><img src="https://db.expand.ps/images/sponsor.png">

                    {{trans('admin.org_info')}}

                    </h4>



                    <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">

                    {{trans('admin.org_status')}}

                    </div>

                    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">

                            <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">

                        </div>

                </div>

                <div class="card-content collapse show">

                    <div class="card-body" style="padding-bottom: 0px;">

                        <div class="form-body">

                            <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="form-group">

                                        <div class="input-group w-s-87">

                                            @if($type == 'orginzation')

                                            <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                            {{trans('admin.orgnization_name')}}

                                            </span>

                                            </div>

                                            <input type="text" id="SponsorName"

                                            class="form-control alphaFeild ac ui-autocomplete-input"

                                             placeholder=" {{trans('admin.orgnization_name')}} "

                                              name="SponsorName" autocomplete="off">

                                              @elseif($type == 'enginering')

                                              <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                            {{trans('admin.enginer_office')}}

                                            </span>

                                            </div>

                                            <input type="text" id="SponsorName"

                                            class="form-control alphaFeild ac ui-autocomplete-input"

                                             placeholder=" {{trans('admin.enginer_office')}} "

                                              name="SponsorName" autocomplete="off">

                                              @elseif($type == 'banks')

                                              <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                            {{trans('admin.bank_name')}}

                                            </span>

                                            </div>

                                            <input type="text" id="SponsorName"

                                            class="form-control alphaFeild ac ui-autocomplete-input"

                                             placeholder=" {{trans('admin.bank_name')}} "

                                              name="SponsorName" autocomplete="off">



                                              @elseif($type == 'space')

                                              <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                            {{trans('admin.space_office')}}

                                            </span>

                                            </div>

                                            <input type="text" id="SponsorName"

                                            class="form-control alphaFeild ac ui-autocomplete-input"

                                             placeholder=" {{trans('admin.space_office')}} "

                                              name="SponsorName" autocomplete="off">

                                              @elseif($type == 'suppliers')

                                              <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                            {{trans('admin.supplier_name')}}

                                            </span>

                                            </div>

                                            <input type="text" id="SponsorName"

                                            class="form-control alphaFeild ac ui-autocomplete-input"

                                             placeholder=" {{trans('admin.supplier_name')}} "

                                              name="SponsorName" autocomplete="off">



                                              @endif





                                              </div>



                                              <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>



                                            <input type="hidden" id="orgnization_id" name="orgnization_id" value="">

                                            <input type="hidden" id="type" name="type" value="{{$type}}">



                                    </div>

                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="form-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                            {{trans('admin.ZIP_code')}}

                                            </span>

                                            </div>

                                            <input type="text" id="LisenceNo" class="form-control " placeholder=" {{trans('admin.ZIP_code')}} " name="LisenceNo">



                                            <div class="input-group-append hide hidden-xs hidden-sm">

                                                <span class="input-group-text input-group-text2" style="color:#ffffff">

                                                    <i class="fa fa-external-link"></i>

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="form-group">

                                        <div class="input-group w-s-87 ">

                                            <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon1">

                {{trans('admin.manager')}}                             </span>

                                            </div>

                                            <input type="text" id="personInCharge" class="form-control alphaFeild" placeholder="{{trans('admin.manager')}}" name="personInCharge">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="input-group width106">

                                        <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1">

                                        {{trans('admin.job_title')}}

                                        </span>

                                        </div>

                                        <select type="text" id="PositionID" name="PositionID" class="form-control PositionID">

                                            <option value="0"> -- {{trans('admin.select')}} --</option>

                                            @foreach($jobTitle as $job)

                                            <option value="{{$job->id}}"> {{$job->name}}   </option>

                                            @endforeach

                                    </select>

                                        <div class="input-group-append" onclick="ShowConstantModal(83,'PositionID','المسمى الوظيفي')">

                                        <span class="input-group-text input-group-text2">

                                            <i class="fa fa-external-link"></i>

                                        </span>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="row">

                                        <div class="col-lg-6 col-md-12 pr-s-12 pr-0">

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                    <span class="input-group-text input-group-text1" id="basic-addon1">

                                                        <img src="https://db.expand.ps/images/jawwal35.png">

                                                    </span>

                                                    </div>

                                                    <input type="text" id="MobileNo1" maxlength="10" name="MobileNo1" class="form-control noleft numFeild" placeholder="0590000000" aria-describedby="basic-addon1">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-12">

                                            <div class="form-group">

                                                <div class="input-group w-s-87 width89">

                                                    <div class="input-group-prepend">

                                                    <span class="input-group-text input-group-text1" id="basic-addon1">

                                                        <img src="https://db.expand.ps/images/w35.png" style="max-width: 35px;">

                                                    </span>

                                                    </div>

                                                    <input type="text" id="MobileNo2" maxlength="10" name="MobileNo2" class="form-control noleft numFeild" placeholder="0560000000" aria-describedby="basic-addon1" style="margin-left: 12px;">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="form-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                            <span class="input-group-text input-group-text1" id="basic-addon1">

                                                <img src="https://db.expand.ps/images/fax35.png">

                                            </span>

                                            </div>

                                            <input type="text" id="faxNo" name="faxNo" maxlength="9" class="form-control noleft numFeild" placeholder="000000000" aria-describedby="basic-addon1" >



                                            <div class="input-group-append hide hidden-xs hidden-sm">

                                    <span class="input-group-text input-group-text2" style="color:#ffffff">

                                        <i class="fa fa-external-link"></i>

                                    </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>

                            <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="form-group">

                                        <div class="input-group w-s-87">

                                            <div class="input-group-prepend">

                                            <span class="input-group-text input-group-text1" id="basic-addon1">

                                                <img src="https://db.expand.ps/images/mailico35.jpg" style="max-width: 35px;">

                                            </span>

                                            </div>

                                            <input type="email" id="EmailAddress" name="EmailAddress" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))" class="form-control noleft" placeholder="Example@domain.com">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="form-group" style="">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                    <span class="input-group-text input-group-text1" id="basic-addon1">

                    <img src="https://db.expand.ps/images/call-pinar35.png">

                    </span>

                                            </div>

                                            <input type="text" id="phone1" name="phone1" maxlength="9" class="form-control noleft numFeild" placeholder="000000000" aria-describedby="basic-addon1">

                                        </div>

                                    </div>

                                </div>

                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 pr-s-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width:98% !important">
                                            <div class="input-group-prepend preW">
                                                <span class="input-group-text" id="basic-addon1"style=" width: 100%;">
                                                   {{trans('admin.permission_org_archive')}}  
                                                </span>
                                            </div>
                                            <select id="allowed_emp" name="allowed_emp[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:70%;">
                                                <?php 
                                                if(isset($admins) && !empty($admins) && count($admins) > 0){ ?>
                                                    <?php foreach ($admins as $key => $value){ ?>
                                                        <option value="<?php echo $value->id; ?>" > <?php echo $value->nick_name; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
							</div>

                            <div class="row hide">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12 w-s-87 mt-s-6">

                                    <div class="form-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                        <span class="input-group-text input-group-text1" id="basic-addon1">

                <img src="https://db.expand.ps/images/110.jpg" style="max-width: 35px;">

                                        </span>

                                            </div>

                                            <input type="text" id="website" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))" name="website" class="form-control noleft" placeholder="wwww.example.com">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="form-group" style="">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                    <span class="input-group-text input-group-text1" id="basic-addon1">

                    <img src="https://db.expand.ps/images/call-pinar35.png">

                    </span>

                                            </div>

                                            <input type="text" id="phone2" maxlength="9" name="phone2" class="form-control noleft numFeild" placeholder="000000000" aria-describedby="basic-addon1">

                                        </div>

                                    </div>

                                </div>



                            </div>



                            <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">المستخدم معطل</div>



                        </div>

                    </div>

                </div>
                @if($type == 'orginzation')
                    @can('orginzation_archives')
                    <div class="card-header" style="padding-top:0px;">
    
                            <h4 class="card-title">
    
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32">
    
                                {{trans('admin.archieve')}}
    
                            </h4>
    
                            <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->
    
                            <div class="heading-elements" style="display: none">
    
                                <ul class="list-inline mb-0">
    
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
    
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
    
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
    
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
    
                                </ul>
    
                            </div>
    
    
    
                        </div>
                    <div class="card-content collapse show">
    
                        <div class="card-body" style="padding-bottom: 0px;">
    
                            <div class="row" style="text-align: center">
    
                                    <div class="col-md-2 w-s-50" style="padding: 0px;">
    
                                        <div class="form-group">
    
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="cursor:pointer">
    
                                            <div class="form-group">
    
                                                <a onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}
    
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                        </div>
    
                    </div>
                    @endcan
                @elseif($type == 'enginering')
                    @can('enginering_archives')
                    <div class="card-header" style="padding-top:0px;">
    
                            <h4 class="card-title">
    
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32">
    
                                {{trans('admin.archieve')}}
    
                            </h4>
    
                            <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->
    
                            <div class="heading-elements" style="display: none">
    
                                <ul class="list-inline mb-0">
    
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
    
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
    
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
    
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
    
                                </ul>
    
                            </div>
    
    
    
                        </div>
                    <div class="card-content collapse show">
    
                        <div class="card-body" style="padding-bottom: 0px;">
    
                            <div class="row" style="text-align: center">
    
                                    <div class="col-md-2 w-s-50" style="padding: 0px;">
    
                                        <div class="form-group">
    
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="cursor:pointer">
    
                                            <div class="form-group">
    
                                                <a onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}
    
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                        </div>
    
                    </div>
                    @endcan
                @elseif($type == 'banks')
                    @can('banks_archives')
                    <div class="card-header" style="padding-top:0px;">
    
                            <h4 class="card-title">
    
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32">
    
                                {{trans('admin.archieve')}}
    
                            </h4>
    
                            <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->
    
                            <div class="heading-elements" style="display: none">
    
                                <ul class="list-inline mb-0">
    
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
    
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
    
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
    
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
    
                                </ul>
    
                            </div>
    
    
    
                        </div>
                    <div class="card-content collapse show">
    
                        <div class="card-body" style="padding-bottom: 0px;">
    
                            <div class="row" style="text-align: center">
    
                                    <div class="col-md-2 w-s-50" style="padding: 0px;">
    
                                        <div class="form-group">
    
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="cursor:pointer">
    
                                            <div class="form-group">
    
                                                <a onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}
    
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                        </div>
    
                    </div>
                    @endcan
                @elseif($type == 'space')
                    @can('space_archives')
                    <div class="card-header" style="padding-top:0px;">
        
                            <h4 class="card-title">
        
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32">
        
                                {{trans('admin.archieve')}}
        
                            </h4>
        
                            <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->
        
                            <div class="heading-elements" style="display: none">
        
                                <ul class="list-inline mb-0">
        
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
        
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
        
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
        
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
        
                                </ul>
        
                            </div>
        
        
        
                        </div>
                    <div class="card-content collapse show">
        
                        <div class="card-body" style="padding-bottom: 0px;">
        
                            <div class="row" style="text-align: center">
        
                                    <div class="col-md-2 w-s-50" style="padding: 0px;">
        
                                        <div class="form-group">
        
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="cursor:pointer">
        
                                            <div class="form-group">
        
                                                <a onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}
        
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
        
                                            </div>
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                        </div>
        
                    </div>
                    @endcan
                @elseif($type == 'suppliers')
                    @can('suppliers_archives')
                    <div class="card-header" style="padding-top:0px;">
    
                            <h4 class="card-title">
    
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32">
    
                                {{trans('admin.archieve')}}
    
                            </h4>
    
                            <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->
    
                            <div class="heading-elements" style="display: none">
    
                                <ul class="list-inline mb-0">
    
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
    
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
    
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
    
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
    
                                </ul>
    
                            </div>
    
    
    
                        </div>
                    <div class="card-content collapse show">
    
                        <div class="card-body" style="padding-bottom: 0px;">
    
                            <div class="row" style="text-align: center">
    
                                    <div class="col-md-2 w-s-50" style="padding: 0px;">
    
                                        <div class="form-group">
    
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="cursor:pointer">
    
                                            <div class="form-group">
    
                                                <a onclick="$('#ArchModalName').html($('.ac').val());$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}
    
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                        </div>
    
                    </div>
                    @endcan
                @endif
                
                

            </div>

        </div>

        <div class="col-sm-12 col-md-6">

            <div class="card leftSide" style="min-height:532.375px">

            <div class="card-header">

                <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>

            </div>

                    <div class="card-content collapse show">

                        <div class="card-body">

                        @include('dashboard.component.address')







                            <div class="form-actions" style="border-top:0px;">

                                <div class="text-right">
                                    @can('edit_model')
                                    <button id="editBtn" style="display:none" class="btn btn-primary save-data">تعديل<i class="ft-thumbs-up position-right"></i></button>
                                    @endcan
                                    <button id="saveBtn" class="btn btn-primary save-data">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>

                                    <button type="reset" onclick="redirectURL('linkIcon1-tab1')" class="btn btn-warning  reset-data"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

        </div>

    </div>

</form>

</section>

<?php 
$types=$type; $type="org";

?>

@include('dashboard.component.orgnization_archive')

@include('dashboard.component.fetch_table')

<?php $type=$types;?>

@stop

@section('script')

<script>

$('.reset-data').click(function(event){

    $("#msgStatic").html("(0)");



});

$( function() {

    let type = $("input[name=type]").val();

    $( ".ac" ).autocomplete({

		source:  function (request, response) {

            $.ajax({

                    type: "get",

                    url:"orginzation_auto_complete",

                    data: {request, type},

                    success: response,

                    dataType: 'json'

                });

                },



		minLength: 1,



        select: function( event, ui ) {

            let orginzation_id = ui.item.id;

            update(orginzation_id);

//             $.ajax({

//             type: 'get', // the method (could be GET btw)

//             url: "orgnization_info",

//             data: {

//                 orginzation_id: orginzation_id,

//             },

//             success:function(response){

//             $('#orgnization_id').val(response.info.id);

//             $('#SponsorName').val(response.info.name);

//             $('#MobileNo1').val(response.info.phone_one);

//             $('#MobileNo2').val(response.info.phone_two);

//             $('#LisenceNo').val(response.info.zepe_code);

//             $('#EmailAddress').val(response.info.email);

//             $('#faxNo').val(response.info.fax);

//             $('#personInCharge').val(response.info.manager_name);

//             $('#phone1').val(response.info.whatsapp_one);

//             $('#phone2').val(response.info.whatsapp_two);

//             $('#website').val(response.info.website);

//             $("#msgStatic").html("("+response.ArchiveCount+")");

//             drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,

//                 response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount

//                 ,response.licFileArchiveCount

//                 ,response.licArchiveCount,response.copyToCount,response.linkToCount);

//             $("select#PositionID option")

//                  .each(function() { this.selected = (this.text == response.job_title);

//             });

//             $('#AddressDetails').val(response.details);

//             $('#Note').val(response.notes);

//             $("select#CityID option")

//                  .each(function() { this.selected = (this.text == response.city);

//             });

//             $("select#area_data option")

//                  .each(function() { this.selected = (this.text == response.area);

//             });

//             $("select#region_data option")

//                  .each(function() { this.selected = (this.text == response.region);

//             });

// 			},

// 			});

        }

	});

} );

$archiveCount=0;

function suppArchive($contractArchiveCount,$outArchiveCount,$inArchiveCount,$copyToCount,$jalArchiveCount,$otherArchiveCount,$financeArchiveCount,$certCount,$id){
       
    @can('suppcontractArchive')
    getContractArchive($id,$contractArchiveCount);
    $archiveCount+=$contractArchiveCount;
    @endcan
    
    @can('suppOutArchive')
    getOutArchive($id,$outArchiveCount);
    $archiveCount+=$outArchiveCount;
    @endcan
    
    getCert($id,$certCount);
    $archiveCount+=$certCount;
    
    @can('suppInArchive')
    getInArchive($id,$inArchiveCount);
    $archiveCount+=$inArchiveCount;
    @endcan
    
    @can('suppCopyArchive')
    getCopyArchive($id,$copyToCount);
    $archiveCount+=$copyToCount;
    @endcan
    
    @can('suppJalArchive')
    getJalArchive($id,$jalArchiveCount);
    $archiveCount+=$jalArchiveCount;
    @endcan
    
    @can('suppOtherArchive')
    getOtherArchive($id,$otherArchiveCount);
    $archiveCount+=$otherArchiveCount;
    @endcan
    
    @can('finaceArchive')
    getFinanceArchive($id,$financeArchiveCount);
    $archiveCount+=$financeArchiveCount;
    @endcan
} 

function orgArchive($contractArchiveCount,$outArchiveCount,$inArchiveCount,$copyToCount,$jalArchiveCount,$otherArchiveCount,$certCount,$id){
       
    @can('orgcontractArchive')
    getContractArchive($id,$contractArchiveCount);
    $archiveCount+=$contractArchiveCount;
    @endcan
    
    @can('orgOutArchive')
    getOutArchive($id,$outArchiveCount);
    $archiveCount+=$outArchiveCount;
    @endcan
    
    getCert($id,$certCount);
    $archiveCount+=$certCount;
    
    @can('orgInArchive')
    getInArchive($id,$inArchiveCount);
    $archiveCount+=$inArchiveCount;
    @endcan
    
    @can('orgCopyArchive')
    getCopyArchive($id,$copyToCount);
    $archiveCount+=$copyToCount;
    @endcan
    
    @can('orgJalArchive')
    getJalArchive($id,$jalArchiveCount);
    $archiveCount+=$jalArchiveCount;
    @endcan
    
    @can('orgOtherArchive')
    getOtherArchive($id,$otherArchiveCount);
    $archiveCount+=$otherArchiveCount;
    @endcan
    
} 

function bankArchive($contractArchiveCount,$outArchiveCount,$inArchiveCount,$copyToCount,$jalArchiveCount,$otherArchiveCount,$certCount,$id){
       
    @can('bankcontractArchive')
    getContractArchive($id,$contractArchiveCount);
    $archiveCount+=$contractArchiveCount;
    @endcan
    
    @can('bankOutArchive')
    getOutArchive($id,$outArchiveCount);
    $archiveCount+=$outArchiveCount;
    @endcan
    
    getCert($id,$certCount);
    $archiveCount+=$certCount;
    
    @can('bankInArchive')
    getInArchive($id,$inArchiveCount);
    $archiveCount+=$inArchiveCount;
    @endcan
    
    @can('bankCopyArchive')
    getCopyArchive($id,$copyToCount);
    $archiveCount+=$copyToCount;
    @endcan
    
    @can('bankJalArchive')
    getJalArchive($id,$jalArchiveCount);
    $archiveCount+=$jalArchiveCount;
    @endcan
    
    @can('bankOtherArchive')
    getOtherArchive($id,$otherArchiveCount);
    $archiveCount+=$otherArchiveCount;
    @endcan
    
} 

function officeArchive($contractArchiveCount,$outArchiveCount,$inArchiveCount,$copyToCount,$jalArchiveCount,$otherArchiveCount,$certCount,$id){
       
    @can('officecontractArchive')
    getContractArchive($id,$contractArchiveCount);
    $archiveCount+=$contractArchiveCount;
    @endcan
    
    @can('officeOutArchive')
    getOutArchive($id,$outArchiveCount);
    $archiveCount+=$outArchiveCount;
    @endcan
    
    getCert($id,$certCount);
    $archiveCount+=$certCount;
    
    @can('officeInArchive')
    getInArchive($id,$inArchiveCount);
    $archiveCount+=$inArchiveCount;
    @endcan
    
    @can('officeCopyArchive')
    getCopyArchive($id,$copyToCount);
    $archiveCount+=$copyToCount;
    @endcan
    
    @can('officeJalArchive')
    getJalArchive($id,$jalArchiveCount);
    $archiveCount+=$jalArchiveCount;
    @endcan
    
    @can('officeOtherArchive')
    getOtherArchive($id,$otherArchiveCount);
    $archiveCount+=$otherArchiveCount;
    @endcan
    
} 


function update($id)

{

    let orginzation_id = $id;

    $('#saveBtn').css('display','none');
    $('#editBtn').css('display','inline-block');

    $.ajax({

        type: 'get', // the method (could be GET btw)

        url: "orgnization_info",

        data: {

            orginzation_id: orginzation_id,

        },

        success:function(response){
            
            if (response.status!=false) {
                
                $('#allowed_emp').val(''); 
                
                // console.log(response);
                if( $('#type').val()=='suppliers'){
                    suppArchive(response.contractArchiveCount,response.outArchiveCount,response.inArchiveCount,response.copyToCount,response.jalArchiveCount,response.otherArchiveCount,response.financeArchiveCount,response.certCount,response.info.id);
                }else if( $('#type').val()=='orginzation'){
                    orgArchive(response.contractArchiveCount,response.outArchiveCount,response.inArchiveCount,response.copyToCount,response.jalArchiveCount,response.otherArchiveCount,response.certCount,response.info.id);
                }else if( $('#type').val()=='banks'){
                    bankArchive(response.contractArchiveCount,response.outArchiveCount,response.inArchiveCount,response.copyToCount,response.jalArchiveCount,response.otherArchiveCount,response.certCount,response.info.id);
                } else {
                    officeArchive(response.contractArchiveCount,response.outArchiveCount,response.inArchiveCount,response.copyToCount,response.jalArchiveCount,response.otherArchiveCount,response.certCount,response.info.id);
                }
                
                $('#orgnization_id').val(response.info.id);
    
                $('#SponsorName').val(response.info.name);
    
                $('#MobileNo1').val(response.info.phone_one);
    
                $('#MobileNo2').val(response.info.phone_two);
    
                $('#LisenceNo').val(response.info.zepe_code);
    
                $('#EmailAddress').val(response.info.email);
    
                $('#faxNo').val(response.info.fax);
    
                $('#personInCharge').val(response.info.manager_name);
    
                $('#phone1').val(response.info.whatsapp_one);
    
                $('#phone2').val(response.info.whatsapp_two);
    
                $('#website').val(response.info.website);
    
                $("#msgStatic").html("("+$archiveCount+")");
                
                $('.select2-selection__rendered').html('');
                    
                    
                if(response.allowedEmp!=null){
                    $("#allowed_emp").html('');
                    for($i=0 ; $i<response.allAdmin.length ; $i++){
                            $selected=0;
                        for($c=0 ;$c<response.allowedEmp.length; $c++){
                            
                            if(response.allowedEmp[$c] == response.allAdmin[$i].id){
                                $selected=1;
                               $("#allowed_emp").append('<option value="'+response.allAdmin[$i].id+'" selected >'+ response.allAdmin[$i].nick_name +'</option>');
                            //   console.log(response.allAdmin[$i].id+'selected');
                               break;
                            }
                            
                        }
                        if($selected==0){
                            $("#allowed_emp").append('<option value="'+response.allAdmin[$i].id+'">'+ response.allAdmin[$i].nick_name +'</option>');
                        }
                        
                    }
                }
                
                // drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
    
                //     response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
    
                //     ,response.licFileArchiveCount
    
                //     ,response.licArchiveCount,response.copyToCount,response.linkToCount,response.contractArchiveCount);
    
                $("select#PositionID option")
    
                     .each(function() { this.selected = (this.text == response.job_title);
    
                });
    
                $('#AddressDetails').val(response.details);
    
                $('#Note').val(response.notes);
                // $("city_id").val(response.info.city_id);
                // $("#city_id").trigger("change");

                // $("town_id").val(response.info.town_id);
                // $("#town_id").trigger("change");
                // $("region_id").val(response.info.region_id);
                drawAddress(response.info.city_id,response.info.town_id,response.info.region_id);
                // $("select#CityID option")
    
                //      .each(function() { this.selected = (this.text == response.city);
    
                // });
    
                // $("select#area_data option")
    
                //      .each(function() { this.selected = (this.text == response.area);
    
                // });
    
                // $("select#region_data option")
    
                //      .each(function() { this.selected = (this.text == response.region);
    
                // });
    
                window.scrollTo(0, 0);
                
            }else{
                window.location = "{{route('deptNotAllowed')}}";
            }
        

		},

	});

}

// $("#CityID").change(function () {

//         $("#area_data").empty();

//         var val = $(this).val();



// $.ajax({

//   type: 'post', // the method (could be GET btw)

//   url: "state",

//   data: {

//         val: val,

//         _token: '{{csrf_token()}}',

//   },

//   success:function(response){

//         var len = response.length;

//         for(var i=0; i<len; i++){

//                 var name = response[i].name;

//                 var id = response[i].id;

//                     var state_details = '<option value="'+id +'">'

//                     +name+' </option>'

//                     $("#area_data").append(state_details);

//             }

//          },

//         });

//     });



//     $("#area_data").change(function () {

//         $("#region_data").empty();

//         var val = $(this).val();



// $.ajax({

//   type: 'post', // the method (could be GET btw)

//   url: "area",

//   data: {

//         val: val,

//         _token: '{{csrf_token()}}',

//   },

//   success:function(response){

//         var len = response.length;

//         for(var i=0; i<len; i++){

//                 var name = response[i].name;

//                 var id = response[i].id;

//                     var region_details = '<option value="'+id +'">'

//                     +name+' </option>'

//                     $("#region_data").append(region_details);

//             }

//          },

//         });

//     });







    $(".save-data").click(function(event){

    $(".loader").removeClass('hide');

    $( "#SponsorName" ).removeClass( "error" );

      event.preventDefault();



      let SponsorName = $("input[name=SponsorName]").val();

      let orgnization_id = $("input[name=orgnization_id]").val();

      let type = $("input[name=type]").val();

      let LisenceNo = $("input[name=LisenceNo]").val();

      let personInCharge = $("input[name=personInCharge]").val();

      let MobileNo1 = $("input[name=MobileNo1]").val();

      let MobileNo2 = $("input[name=MobileNo2]").val();

      let faxNo = $("input[name=faxNo]").val();

      let EmailAddress = $("input[name=EmailAddress]").val();

      let phone1 = $("input[name=phone1]").val();

      let website = $("input[name=website]").val();

      let phone2 = $("input[name=phone2]").val();

      var PositionID = $('#PositionID').find(":selected").val();

        var city_id = $('#city_id').val();
      var town_id = $('#town_id').val();
      var region_id = $('#region_id').val();

      var AddressDetails = $('#AddressDetails').val();

      var Note = $('#Note').val();

      var _token ='{{csrf_token()}}';

      let allowedEmp=$('#allowed_emp').val();

      $.ajax({

        url: "store_orginzation",

        type:"POST",

        data:{

            SponsorName:SponsorName,

            orgnization_id:orgnization_id,

            MobileNo1:MobileNo1,

            MobileNo2:MobileNo2,

            LisenceNo:LisenceNo,

            personInCharge:personInCharge,

            faxNo:faxNo,

            EmailAddress:EmailAddress,

            phone1:phone1,

            website:website,

            phone2:phone2,

            type,type,

            PositionID:PositionID,

            city_id:city_id,
            town_id:town_id,
            region_id:region_id,

            AddressDetails:AddressDetails,

            Note:Note,
            
            allowedEmp:allowedEmp,

            _token: _token ,

         },



        success:function(response){

            $('.success_alert').css('visibility', 'visible');

            $('#allowed_emp').val('');
            
            $('.select2-selection__rendered').html('');

            setTimeout(function() {

                $('.wtbl').DataTable().ajax.reload();

            $('.success_alert').fadeOut();

            }, 3000 );

            $(".loader").addClass('hide');

			Swal.fire({

				position: 'top-center',

				icon: 'success',

				title: '{{trans('admin.data_added')}}',

				showConfirmButton: false,

				timer: 1500

				})



            $("#ajaxform")[0].reset();



        },

        error: function(response) {

            $(".loader").addClass('hide');

            $("#SponsorName").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#SponsorName" ).removeClass( "error" );

                    }

                });

            if(response.responseJSON.errors.SponsorName){

                $( "#SponsorName" ).addClass( "error" );

            }

            Swal.fire({

				position: 'top-center',

				icon: 'error',

				title: '{{trans('admin.error_save')}}',

				showConfirmButton: false,

				timer: 1500

				})

           }



       });

  });

  function delete_org($id) {
    if(confirm('هل انت متاكد من حذف المؤسسة؟ لن يمكنك استرجاعها فيما بعد')){
    let org_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "org_delete",

        data: {

            org_id: org_id,
            _token: _token,
        },

        success: function(response) {

            $(".loader").addClass('hide');

            $('.wtbl').DataTable().ajax.reload();

            // setTimeout(function(){

            //     $(".alert-success").addClass("hide");

            // },2000)

            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تم الحذف بنجاح',

                showConfirmButton: false,

                timer: 1500

            })

            //$("#ajaxform")[0].reset();

        },

        error: function(response) {

            $(".loader").addClass('hide');

            Swal.fire({

                position: 'top-center',

                icon: 'error',

                title: 'خطأ فى عملية الحذف',

                showConfirmButton: false,

                timer: 1500

            })

            $("#formDataNameAR").on('keyup', function(e) {

                if ($(this).val().length > 0) {

                    $("#formDataNameAR").removeClass("error");

                }

            });

            if (response.responseJSON.errors.formDataNameAR) {

                $("#formDataNameAR").addClass("error");

            }

        }

    });
    return true;
    }
    return false;
}

</script>

@endsection

