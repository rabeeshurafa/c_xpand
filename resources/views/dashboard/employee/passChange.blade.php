@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input readonly  id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
<style>
    .dt-buttons {
    text-align: left;
    display: inline;
    float: left;
    position: relative;
    bottom: 10px;
    margin-right: 10px;
}
</style>
<link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css"/>

<script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

<section class="horizontal-grid " id="horizontal-grid">

<form method="post" id="setting_form" enctype="multipart/form-data">
        @csrf
                <div class="row white-row">

                    <div class="col-sm-12 col-lg-6 col-md-12">
                        <div class="card leftSide">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                                    {{trans('admin.emp_info')}}
                                     </h4>
                                <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">
                                {{trans('admin.status')}}
                                </div>
                                <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
                                        <input readonly  type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">
                                    </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body" style="padding-bottom: 0px;">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="input-group" style="width: 98% !important;">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.emp_name')}}
                                                                    </span>
                                                                </div>
                                                                <input readonly  type="text" id="Name"
                                                                class="form-control alphaFeild ac ui-autocomplete-input"
                                                                 placeholder="{{trans('admin.emp_name')}}" name="Name" autocomplete="off">
                                                                 </div>
                                                                 <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>
                                                                </div>


                                                    </div>
                                                </div>
                                                <input readonly  type="hidden" name="employee_id" id="employee_id" >
                                                <div class="row" style="position: relative;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.emp_id')}}
                                                                    </span>
                                                                </div>
                                                                <input readonly  readonly  type="text" id="NationalID" maxlength="9" class="form-control numFeild"
                                                                placeholder="{{trans('admin.emp_id')}}" name="NationalID" onblur="$('#password').val($(this).val())">
                                                                <input readonly  type="hidden" id="emp_id" name="emp_id" value="0">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="padding-right: 0px !important;">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.job_num')}}
                                                                    </span>
                                                                </div>
                                                                <input readonly  type="text" id="JobNumber" class="form-control"
                                                                placeholder="{{trans('admin.job_num')}}" name="JobNumber">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="text-align: center;">
                                                <img id="userProfileImg" src="{{ asset('assets/images/ico/user.png') }}" style="max-height: 100px; cursor:pointer" onclick="document.getElementById('imgPic').click(); return false">
                                                <input readonly  type="file" class="form-control-file" id="imgPic" name="imgPic" style="display: none" onchange="doUploadPic()" aria-invalid="false">
                                                <input readonly  type="hidden" id="userimgpath" name="userimgpath">
                                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                <img src="https://db.expand.ps/images/jawwal35.png">
                                                            </span>
                                                        </div>
                                                        <input readonly  type="text" id="MobileNo1" maxlength="10" name="MobileNo1" class="form-control noleft numFeild" placeholder="0590000000" aria-describedby="basic-addon1" onblur="$('#username').val($(this).val())">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="padding-right: 0px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                <img src="https://db.expand.ps/images/w35.png">
                                                            </span>
                                                        </div>
                                                        <input readonly  type="text" id="MobileNo2" maxlength="10" name="MobileNo2" class="form-control noleft numFeild" placeholder="0560000000" aria-describedby="basic-addon1" onblur="$('#username').val().length>0?'':$('#username').val($(this).val())">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="padding-right: 0px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" title="NickName" id="basic-addon1">
                                                            {{trans('admin.nick_name')}}
                                                            </span>
                                                        </div>
                                                        <input readonly  type="text" id="NickName" name="NickName" class="form-control alphaFeild" placeholder="{{trans('admin.nick_name')}}" aria-describedby="basic-addon1">
														<div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt"></i>
                                                        </span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.Internal_Phone')}}                                                            </span>
                                                        </div>
                                                        <input readonly  type="text" id="InternalPhone" name="InternalPhone" class="form-control numFeild" placeholder="Ex. 123">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8" style="padding-right: 0px;">
                                                <div class="form-group">
                                                    <div class="input-group" style="width: 98% !important;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.email')}}
                                                            </span>
                                                        </div>
                                                        <input readonly  type="email" id="EmailAddress" name="EmailAddress" class="form-control" placeholder="user@domian.com" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))"><div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="EnabledItem" style="padding:5px; direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>

                                    </div>
                                </div>
                            </div>


                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title"><img src="https://db.expand.ps/images/workHrs.png" width="32" height="32">
                                {{trans('admin.working_info')}}
                            </h4>

                                <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>

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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.depat')}}                                                             </span>
                                                    </div>
                                                    <select disabled="disabled" type="text" id="DepartmentID" name="DepartmentID" class="form-control" onchange="getDeptInfo($(this).val(),DirectManager)">
                                                        <option> اختر </option>
                                                        <option value="">  {{trans('admin.without')}} </option>

                                                        


                                                    </select>
                                                    <div class="input-group-append" style="visibility: hidden;">
                                                        <span class="input-group-text input-group-text2">
                                                            <a href="https://db.expand.ps/addDepartment" target="_blank">
															<i class="fa fa-external-link"></i>
															</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.job_title')}}                                                              </span>
                                                    </div>
                                                    <select disabled="disabled"  type="text" id="Position" name="Position" class="form-control Position" placeholder="internal phone">
                                                        <option> اختر </option>
                                                       
                                                    </select>

                                                    <div class="input-group-append" onclick="ShowConstantModal(65,'Position','المسمى الوظيفي')">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.Task_Checker')}}
                                                            </span>
                                                    </div>
                                                    <select disabled="disabled"  type="text" id="DirectManager" name="DirectManager" class="form-control" placeholder="internal phone">
                                                        <option>  {{trans('admin.Task_Checker')}} </option>
                                                        <option value="">  {{trans('admin.without')}} </option>
                                                        
                                                    </select>
                                                    <div class="input-group-append" style="visibility: hidden;">
                                                        <span class="input-group-text input-group-text2">
                                                            <a href="https://db.expand.ps/addDepartment" target="_blank">
															<i class="fa fa-external-link"></i>
															</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            تاريخ التعيين
                                                        </span>
                                                    </div>
                                                    <input readonly  id="HiringDate" name="HiringDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                                    <div class="input-group-append" style="visibility: hidden">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.JobType')}}
                                                        </span>
                                                    </div>
                                                  <?php  $types=$type;  ?>
                                                    <select disabled="disabled"  id="JobType" name="JobType" type="text" class="form-control JobType">
                                                        <option> اختر </option>
                                                        
                                                    </select>

                                                    <div class="input-group-append" onclick="ShowConstantModal(66,'JobType','نوع الوظيفة')">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px;padding-left: 0px;">
                                            <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.Salary')}}
                                                            </span>
                                                            </div>
                                                            <input readonly  id="Salary" name="Salary" class="form-control numFeild " placeholder="00.00" style="    border-radius: 0rem !important;width: 30%;">
                                                            <select disabled="disabled"  id="CurrencyID" name="CurrencyID" type="text" class="form-control" style="width: 85px;margin-left: 6%;">
                                                                <option> - </option>
                                                                <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>
                                                                <option value="dollar"> {{trans('admin.dollar')}} </option>
                                                                <option value="dinar">{{trans('admin.dinar')}}  </option>
                                                                <option value="euro">{{trans('admin.euro')}}  </option>
                                                            </select>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card-header hide" style="padding-top:0px;">
                                <h4 class="card-title"><img src="https://db.expand.ps/images/workHrs.png" width="32" height="32">
                                {{trans('admin.Holiday_info')}}
                                 </h4>

                                <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>

                                <div class="heading-elements" style="display: none">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse hide">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.year')}}
                                                        </span>
                                                    </div>
                                                    <input readonly  id="vac_year" name="vac_year" maxlength="4" class="form-control valid" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.vac_annual')}}

                                                        </span>
                                                    </div>
                                                    <input readonly  id="vac_annual" name="vac_annual" maxlength="2" class="form-control valid" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.emr_blanace')}}

                                                        </span>
                                                    </div>
                                                    <input readonly  id="emr_blanace" name="emr_blanace" maxlength="2" class="form-control valid" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @can('my_account')
                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title"><i class="fa fa-key"></i>
                                {{trans('admin.user_info')}}
                                </h4>
                                <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>
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
                                <div class="card-body">
                                    <div class="row" style="display: none">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input readonly  type="checkbox" checked class="custom-control-input" name="customCheck" id="customCheck2" onchange="$('#userlogin').toggle()">
                                                    <label class="custom-control-label" for="customCheck2">
                                                    {{trans('admin.has_account')}}

                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.permissions')}}

                                                            </span>
                                                    </div>
                                                    <select id="userGroup" name="userGroup" type="text" class="form-control" multiple>
                                                        @foreach (config('global.permissions') as $name => $value)
                                                         <option value="{{$value}}"> {{$value}} </option>
                                                        @endforeach

                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    

                                    <div class="row" id="userlogin">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.user_name')}}
                                                            </span>
                                                        </div>
														<input  id="username" name="username" class="form-control" placeholder="{{trans('admin.user_name')}}">
														<div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.password')}}
                                                            </span>
                                                        </div>
														<input  type="text" id="password" name="password" class="form-control" placeholder="{{trans('admin.password')}}" value="">
														<div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
													</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-12">
            <div class="card rightSide" style="min-height:500.75px">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                    @include('dashboard.component.address')
                    <div class="card-header" style="padding-top:0px;">
                        <h4 class="card-title">
                            <img src="{{ asset('assets/images/ico/msg.png') }}" width="32" height="32">
                        الأرشيف
                        </h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body" style="padding-bottom: 0px;">
                            <div class="row" style="text-align: center">
                                    <div class="col-md-2 w-s-50" style="padding: 0px;">
                                        <div class="form-group">
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('#Name').val());$('#msgModal').modal('show')" style="cursor:pointer">
                                            <div class="form-group">
                                                <a onclick="$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>


					</div>

                        <div class="form-actions" style="border-top:0px; padding-bottom:44px;">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="saveBtn">{{trans('admin.save')}}  <i class="ft-thumbs-up position-right"></i></button>
                                <button type="reset" onclick="resetFunction()" class="btn btn-warning"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
<?php  $type=$types;  ?>
@include('dashboard.component.inner_employee_archive')
            </div>
        </div>




  </form>
</section>


@stop
@section('script')

<script>

    function resetFunction(){
        $('#msgStatic').html('(0)');
        $('#userProfileImg').attr('src','{{ asset('assets/images/ico/user.png') }}')
        $("#my_multi_select3").multiSelect("destroy").children().removeAttr('selected')
        $("#my_multi_select3").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      })
        $("#my_multi_select").multiSelect("destroy").children().removeAttr('selected')
        $("#my_multi_select").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      })


                $('#salahiat').hide()
    }


function SavePer(){
    var formData = new FormData($("#formData")[0]);
				$.ajax({
					url: realPath+'UpdateGroupFunction',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){
							$(".alert-danger").hide();
							$(".alert-success").show();
							$("#succMsg").text(data.status.msg)
							//self.location=document.URL;
						}
						else {
							$(".alert-success").hide();
							$(".alert-danger").show();
							$("#errMsg").text(data.status.msg)
						}
						$(".loader").addClass('hide');
					},
					error:function(){
						$(".alert-success").hide();
						$(".alert-danger").show();
						$("#errMsg").text(data.status.msg)
						$(".loader").addClass('hide');
					},
					cache: false,
					contentType: false,
					processData: false
				});
}
    $(document).ready(function (){
        
        $('#my_multi_select2').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>البنود الغير متاحة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>البنود المتاحة</b></div>"
      });
    })


    $(document).ready(function (){
        $('#my_multi_select3').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      });
        $('#my_multi_select').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      });
    })
</script>




	<script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
	<!--<script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
    -->
<script>

var arrKey=new Array();
var arrVal=new Array();
$( function() {
    $( ".ac" ).autocomplete({
		source: 'emp_auto_complete',
		minLength: 2,

        select: function( event, ui ) {
            update(ui.item.id);
        }
	});
} );

<?php
$i=0;
foreach(config('global.permissions') as $name => $value)
{?>
	arrKey[<?php echo $i?>]='{{$name}}'
	arrVal[<?php echo $i?>]="@lang('admin.'.$name)"
	<?php  $i++; ?>
<?php }?>


update({{Auth()->user()->id}});

function update($id)
{           
            $('#saveBtn').text("تعديل");
    let emp_id = $id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "emp_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
            
            $('#allowed_emp').val(''); 
                $archiveCount=0;    
                
                getContractArchive(response.info.id,response.contractArchiveCount);
                $archiveCount+=response.contractArchiveCount;
                
                
                getOutArchive(response.info.id,response.outArchiveCount);
                $archiveCount+=response.outArchiveCount;
                
                
                getInArchive(response.info.id,response.inArchiveCount);
                $archiveCount+=response.inArchiveCount;
                
                
                getOtherArchive(response.info.id,response.otherArchiveCount);
                $archiveCount+=response.otherArchiveCount;
                
                
                getCopyArchive(response.info.id,response.copyToCount);
                $archiveCount+=response.copyToCount;
                
                
                getJalArchive(response.info.id,response.linkToCount);
                $archiveCount+=response.linkToCount;
                    
                
            $('#salahiat').show()
            $('#employee_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#JobNumber').val(response.info.job_Number);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#NickName').val(response.info.nick_name);
            $('#InternalPhone').val(response.info.InternalPhone);
            $('#EmailAddress').val(response.info.email);
            $("#DepartmentID").val(response.info.department_id);
            if(response.info.image != 'https://expand-archive.com/expand_repo/public'/*window.location.origin*/){
                $('#userProfileImg').attr('src', response.info.image);
            }else{
                $('#userProfileImg').attr('src', '{{asset("assets/images/ico/user.png")}}');
            }
            if(response.info.status == 'on'){
                $('#customCheck2').prop('checked', true);
            }
            $("#msgStatic").html(response.ArchiveCount);
            // drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
            //     response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
            //     ,response.licFileArchiveCount
            //     ,response.licArchiveCount,response.copyToCount,response.linkToCount);
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.job_title);
            });
            $("select#JobType option")
                 .each(function() { this.selected = (this.text == response.job_type);
            });

            $("select#DirectManager option")
                 .each(function() { this.selected = (this.text == response.DirectManager);
            });
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.department_id);
            });
            $("select#CurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency);
            });
            $('#HiringDate').val(response.info.start_date);
            $('#Salary').val(response.info.salary);
            $('#vac_year').val(response.info.year);
            $('#vac_annual').val(response.info.balance);
            $('#emr_blanace').val(response.info.emergency);
            $('#username').val(response.info.username);
            $('#password').val(response.info.curr_pass);
            $('#AddressDetails').val(response.info.info);
            $('#Note').val(response.info.notes);
            $("select#CityID").val(response.info.city_id)
            $("select#area_data").val(response.info.area_id)
            $("select#area_data").trigger('change')
            $("select#region_data").val(response.info.region_id)
            // console.log(response.per)

            $("#ana").html()
            
            ctrl=response.per;
            $("#ana").html(ctrl)
            $("#my_multi_select2").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
              selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
            }); 
                  
            // $('#employee_id').val(response.info.id);
            // $('#Name').val(response.info.name);
            // $('#NationalID').val(response.info.identification);
            // $('#JobNumber').val(response.info.job_Number);
            // if(response.info.status == 'on'){
            //     $('#customCheck2').prop('checked', true);
            // }
            // $('#MobileNo1').val(response.info.phone_one);
            // $('#MobileNo2').val(response.info.phone_two);
            // $('#NickName').val(response.info.nick_name);
            // $('#InternalPhone').val(response.info.InternalPhone);
            // $('#EmailAddress').val(response.info.email);
            // $("#DepartmentID").val(response.info.department_id);
            // $('#userProfileImg').attr('src', response.info.image);
            // $("#msgStatic").html(response.ArchiveCount);
            // drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
            //     response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
            //     ,response.licFileArchiveCount
            //     ,response.licArchiveCount,response.copyToCount,response.linkToCount);
            // $("select#Position option")
            //      .each(function() { this.selected = (this.text == response.job_title);
            // });
            // $("select#JobType option")
            //      .each(function() { this.selected = (this.text == response.job_type);
            // });

            // $("select#DirectManager option")
            //      .each(function() { this.selected = (this.text == response.DirectManager);
            // });
            // $("select#DepartmentID option")
            //      .each(function() { this.selected = (this.text == response.department_id);
            // });
            // $("select#CurrencyID option")
            //      .each(function() { this.selected = (this.text == response.Currency);
            // });
            // $('#HiringDate').val(response.info.start_date);
            // $('#Salary').val(response.info.salary);
            // $('#vac_year').val(response.details.year);
            // $('#vac_annual').val(response.details.balance);
            // $('#emr_blanace').val(response.details.emergency);
            // $('#username').val(response.info.username);
            // $('#password').val(response.info.curr_pass);
            // $('#AddressDetails').val(response.info.details);
            // $('#Note').val(response.info.notes);
            // $("select#CityID").val(response.info.city_id)
            // $("select#area_data").val(response.info.area_id)
            // $("select#area_data").trigger('change')
            // $("select#region_data").val(response.info.region_id)
            // /*
            // $("select#CityID option")
            //      .each(function() { this.selected = (this.text == response.city);
            // });
            // $("select#TownID option")
            //      .each(function() { this.selected = (this.text == response.area);
            // });
            // $("select#region_data option")
            //      .each(function() { this.selected = (this.text == response.region);
            // });*/

            // $("#ana").html()
            
            // ctrl=response.per;
            // $("#ana").html(ctrl)
            // $("#my_multi_select2").multiSelect({
            //   selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
            //     selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
            // });
            window.scrollTo(0, 0);
                    },
                    });
}

$("#CityID").change(function () {
        $("#area_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "state",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var state_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#area_data").append(state_details);
            }
         },
        });
    });

    $("#area_data").change(function () {
        $("#region_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "area",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var region_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#region_data").append(region_details);
            }
         },
        });
    });


    $('#setting_form').submit(function(e) {
        $(".loader").removeClass('hide');
        
       e.preventDefault();
       if($("#password").val())
       {
           
       }
       let formData = new FormData(this);
            $( "#Name" ).removeClass( "error" );
            $( "#NationalID" ).removeClass( "error" );
            $( "#NickName" ).removeClass( "error" );
            $( "#DepartmentID" ).removeClass( "error" );
            $( "#Position" ).removeClass( "error" );
            $( "#HiringDate" ).removeClass( "error" );
            $( "#DirectManager" ).removeClass( "error" );
            $( "#JobType" ).removeClass( "error" );
            $( "#MobileNo1" ).removeClass( "error" );

       $.ajax({
          type:'POST',
          url: "changePassword",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".loader").addClass('hide');
                window.open("{{route('admin.logout')}}","_self");
            $('.wtbl').DataTable().ajax.reload();
             if (response) {
                $(".loader").addClass('hide');
			Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
            $('#userProfileImg').attr('src', '{{asset('assets/images/ico/user.png')}}');

               this.reset();
             }
           },
           error: function(response){
            $(".loader").addClass('hide');
            

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




$(document).ready(function () {

            $("#my_multi_select1").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>البنود الغير متاحة</b></div>",
              selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>البنود المتاحة</b></di>"
            });
            
            $("#my_multi_select2").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
              selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
            });    
});
</script>
@endsection