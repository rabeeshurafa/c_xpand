@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')

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
                                        <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">
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
                                                                <input type="text" id="Name"
                                                                class="form-control alphaFeild ac ui-autocomplete-input"
                                                                 placeholder="{{trans('admin.emp_name')}}" name="Name" autocomplete="off">
                                                                 </div>
                                                                 <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>
                                                                </div>


                                                    </div>
                                                </div>
                                                <input type="hidden" name="employee_id" id="employee_id" >
                                                <div class="row" style="position: relative;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.emp_id')}}
                                                                    </span>
                                                                </div>
                                                                <input type="text" id="NationalID" maxlength="9" class="form-control numFeild"
                                                                placeholder="{{trans('admin.emp_id')}}" name="NationalID" onblur="$('#password').val($(this).val())">
                                                                <input type="hidden" id="emp_id" name="emp_id" value="0">

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
                                                                <input type="text" id="JobNumber" class="form-control"
                                                                placeholder="{{trans('admin.job_num')}}" name="JobNumber">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="text-align: center;">
                                                <img id="userProfileImg" src="{{ asset('assets/images/ico/user.png') }}" style="max-height: 100px; cursor:pointer" onclick="document.getElementById('imgPic').click(); return false">
                                                <input type="file" class="form-control-file" id="imgPic" name="imgPic" style="display: none" onchange="doUploadPic()" aria-invalid="false">
                                                <input type="hidden" id="userimgpath" name="userimgpath">
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
                                                        <input type="text" id="MobileNo1" maxlength="10" name="MobileNo1" class="form-control noleft numFeild" placeholder="0590000000" aria-describedby="basic-addon1" onblur="$('#username').val($(this).val())">
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
                                                        <input type="text" id="MobileNo2" maxlength="10" name="MobileNo2" class="form-control noleft numFeild" placeholder="0560000000" aria-describedby="basic-addon1" onblur="$('#username').val().length>0?'':$('#username').val($(this).val())">
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
                                                        <input type="text" id="NickName" name="NickName" class="form-control alphaFeild" placeholder="{{trans('admin.nick_name')}}" aria-describedby="basic-addon1">
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
                                                        <input type="text" id="InternalPhone" name="InternalPhone" class="form-control numFeild" placeholder="Ex. 123">
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
                                                        <input type="email" id="EmailAddress" name="EmailAddress" class="form-control" placeholder="user@domian.com" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))"><div class="input-group-append">
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
                                                    <select type="text" id="DepartmentID" name="DepartmentID" class="form-control" onchange="getDeptInfo($(this).val(),DirectManager)">
                                                        <option> اختر </option>
                                                        <option value="">  {{trans('admin.without')}} </option>

                                                        @foreach($departments as $department)
                                                        <option value="{{$department->id}}">  {{$department->name}} </option>
                                                        @endforeach


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
                                                    <select type="text" id="Position" name="Position" class="form-control" placeholder="internal phone">
                                                        <option> اختر </option>
                                                        <option value="">  {{trans('admin.without')}} </option>
                                                        @foreach($jobTitle as $title)
                                                        <option value="{{$title->id}}">  {{$title->name}}  </option>
                                                        @endforeach
                                                    </select>

                                                    <div class="input-group-append" onclick="QuickAdd(17,'Position','Profession')">
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
                                                    <select id="DirectManager" name="DirectManager" class="form-control">
                                                        <option>  {{trans('admin.Task_Checker')}} </option>
                                                        <option value="0">  {{trans('admin.without')}} </option>
                                                        @foreach($admin as $adm)
                                                        <option value="{{$adm->id}}"> {{$adm->name}}  </option>
                                                        @endforeach
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
                                                    <input id="HiringDate" name="HiringDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
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
                                                    <select id="JobType" name="JobType" type="text" class="form-control">
                                                        <option> اختر </option>
                                                        @foreach($jobType as $type)
                                                        <option value="{{$type->id}}"> {{$type->name}} </option>
                                                        @endforeach
                                                    </select>

                                                    <div class="input-group-append" onclick="QuickAdd(6,'JobType','Profession')">
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
                                                            <input id="Salary" name="Salary" class="form-control numFeild " placeholder="00.00" style="    border-radius: 0rem !important;width: 30%;">
                                                            <select id="CurrencyID" name="CurrencyID" type="text" class="form-control" style="width: 85px;margin-left: 6%;">
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
                                                    <input id="vac_year" name="vac_year" maxlength="4" class="form-control valid" placeholder="" value="">
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
                                                    <input id="vac_annual" name="vac_annual" maxlength="2" class="form-control valid" placeholder="" value="">
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
                                                    <input id="emr_blanace" name="emr_blanace" maxlength="2" class="form-control valid" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="customCheck" id="customCheck2" checked onchange="$('.loginData').toggle()">
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
                                    @can('account')

                                    <div class="row loginData" id="userlogin">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.user_name')}}
                                                            </span>
                                                        </div>
														<input id="username" name="username" class="form-control" placeholder="{{trans('admin.user_name')}}">
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
                                                        @if (Auth()->user()->id==74)
														<input type="text" id="password" name="password" class="form-control" placeholder="{{trans('admin.password')}}" value="">
														@else
														<input type="password" id="password" name="password" class="form-control" placeholder="{{trans('admin.password')}}" value="">
														@endif
														<div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
													</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-12">
            <div class="card rightSide" style="min-height:500.75px">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <!-- test here -->
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
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('.ac').val());$('#CertModal').modal('show')" style="cursor:pointer">
                                            <div class="form-group">
                                                <a onclick="$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @can('permissions')
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title" style="padding-bottom: 10px !important;padding-top: 5px;">
										<i class="fa fa-key" style="color:#4267B2"></i>
                                        <a onclick="$('#salahiat').toggle();">
                                            &nbsp;قائمة الصلاحيات
                                        </a>
                                    </h4>

                                        <a class="heading-elements-toggle">
									    <i class="ft-align-justify font-medium-3">

									    </i>
									</a>
									<div class="heading-elements">
										<a href="https://db.expand.ps/PerGroup" style="color:#4267B2;padding-top: 5px;font-size:25px !important;" title="عودة للصلاحيات">
										    <i class="fa fa-arrow-alt-circle-left"></i>
										</a>
									</div>
								</div>
								<div class="card-content collapse " id="salahiat">
									<div class="card-body" style="padding-bottom: 0px;">
										<div class="form-body">

											<div class="row">
												<div class="col-md-12" >
												<div class="form-group">
													<input type="hidden" id="pk_i_id" name="pk_i_id" value="1" />
													<div id="ana">
														<select multiple="multiple" class="multi-select" id="my_multi_select3" name="my_multi_select3[]">
															<optgroup label="نظام الصلاحيات"></optgroup>
                                                              @foreach(config('global.permissions') as $name => $value)
																<option value='{{$name}}'selected> @lang('admin.'.$name)
                                                                </option>
                                                             @endforeach
														</select>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    @endcan
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
@include('dashboard.component.archive_table');
@include('dashboard.component.fetch_table');
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
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>موظفون خارج المجموعة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>موظفون داخل المجموعة </b></div>"
      });
    })


    $(document).ready(function (){
        $('#my_multi_select3').multiSelect({
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
            let emp_id = ui.item.id
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "emp_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
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
            $("#password").val(response.info.curr_pass);
            $('#username').val(response.info.username);
            if(response.info.image != 'https://expand-archive.com/expand_repo/public'/*window.location.origin*/){
                $('#userProfileImg').attr('src', response.info.image);
            }else{
                $('#userProfileImg').attr('src', '{{asset("assets/images/ico/user.png")}}');
            }
            if(response.info.status == 'on'){
                $('#customCheck2').prop('checked', true);
            }
            $("#msgStatic").html(response.ArchiveCount);
            drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
                response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
                ,response.licFileArchiveCount
                ,response.licArchiveCount,response.copyToCount,response.linkToCount);
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
            if(response.details.length>0){
                $('#vac_year').val(response.details.year);
                $('#vac_annual').val(response.details.balance);
                $('#emr_blanace').val(response.details.emergency);
            }
            $('#AddressDetails').val(response.address.details);
            $('#Note').val(response.address.notes);
            $("select#CityID option")
                 .each(function() { this.selected = (this.text == response.city);
            });
            $("select#TownID option")
                 .each(function() { this.selected = (this.text == response.area);
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.text == response.region);
            });
            console.log(response.per)

            $("#ana").html()
            ctrl='<select multiple="multiple" class="multi-select" id="my_multi_select3" name="my_multi_select3[]">'
            for(srchKey=0;srchKey<arrKey.length;srchKey++){

                flage=false;
                for(i=0;i<response.per.length;i++)
                    if(response.per[i]==arrKey[srchKey]){
                        flage=true;
                    }
                    if(!flage)
                        ctrl+='<option value="'+arrKey[srchKey]+'">'+arrVal[srchKey]+'</option>'
                    else
                        ctrl+='<option value="'+arrKey[srchKey]+'" selected>'+arrVal[srchKey]+'</option>'
            }
            ctrl+='</select>';
            $("#ana").html(ctrl)
            $("#my_multi_select3").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      });
                    },
                    });
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
var res;
function update($id)
{
    let emp_id = $id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "emp_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
            $('#employee_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#JobNumber').val(response.info.job_Number);
            if(response.info.status == 'on'){
                $('#customCheck2').prop('checked', true);
            }
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#NickName').val(response.info.nick_name);
            $('#InternalPhone').val(response.info.InternalPhone);
            $('#EmailAddress').val(response.info.email);
            $("#DepartmentID").val(response.info.department_id);
            $('#userProfileImg').attr('src', response.info.image);
            $("#msgStatic").html(response.ArchiveCount);
            $("#password").val(response.info.curr_pass);
            drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
                response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
                ,response.licFileArchiveCount
                ,response.licArchiveCount,response.copyToCount,response.linkToCount);
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
            if(response.details.length>0){
                $('#vac_year').val(response.details.year);
                $('#vac_annual').val(response.details.balance);
                $('#emr_blanace').val(response.details.emergency);
            }
            $('#username').val(response.info.username);
            $('#AddressDetails').val(response.address.details);
            $('#Note').val(response.address.notes);
            $("select#CityID option")
                 .each(function() { this.selected = (this.value == response.address.city_id);
            });
            $("select#TownID option")
                 .each(function() { this.selected = (this.value == response.address.area_id);
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.value == response.address.region_id);
            });
            $("#CityID").trigger("change");
            $("#TownID").trigger("change");
            res=response;

            $("#ana").html()
            ctrl='<select multiple="multiple" class="multi-select" id="my_multi_select3" name="my_multi_select3[]">'
            for(srchKey=0;srchKey<arrKey.length;srchKey++){

                flage=false;
                for(i=0;i<response.per.length;i++)
                    if(response.per[i]==arrKey[srchKey]){
                        flage=true;
                    }
                    if(!flage)
                        ctrl+='<option value="'+arrKey[srchKey]+'">'+arrVal[srchKey]+'</option>'
                    else
                        ctrl+='<option value="'+arrKey[srchKey]+'" selected>'+arrVal[srchKey]+'</option>'
            }
            ctrl+='</select>';
            $("#ana").html(ctrl)
            $("#my_multi_select3").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
                selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
            });
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
            setTimeout(function(){$("#area_data").trigger("change")},200)
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
          url: "store_employee",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".loader").addClass('hide');

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

                $('#userProfileImg').attr('src', '{{asset("assets/images/ico/user.png")}}');
               this.reset();
             }
           },
           error: function(response){
            $(".loader").addClass('hide');

            $("#Name").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#Name" ).removeClass( "error" );
                    }
                });
                $("#NationalID").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NationalID" ).removeClass( "error" );
                    }
                });
                $("#NickName").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NickName" ).removeClass( "error" );
                    }
                });
                $("#DepartmentID").on('change', function (e) {
                        $( "#DepartmentID" ).removeClass( "error" );
                });
                $("#Position").on('change', function (e) {
                        $( "#Position" ).removeClass( "error" );
                });
                $("#JobType").on('change', function (e) {
                        $( "#JobType" ).removeClass( "error" );
                });
                $("#DirectManager").on('change', function (e) {
                        $( "#DirectManager" ).removeClass( "error" );
                });
                $("#MobileNo1").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#MobileNo1" ).removeClass( "error" );
                    }
                });
                $("#HiringDate").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#HiringDate" ).removeClass( "error" );
                    }
                });

            if(response.responseJSON.errors.Name){
                $( "#Name" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NationalID){
                $( "#NationalID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NickName){
                $( "#NickName" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DepartmentID){
                $( "#DepartmentID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.Position){
                $( "#Position" ).addClass( "error" );
            }
            if(response.responseJSON.errors.JobType){
                $( "#JobType" ).addClass( "error" );
            }
            if(response.responseJSON.errors.HiringDate){
                $( "#HiringDate" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DirectManager){
                $( "#DirectManager" ).addClass( "error" );
            }
            if(response.responseJSON.errors.MobileNo1){
                $( "#MobileNo1" ).addClass( "error" );
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




$(document).ready(function () {

            setTimeout(function(){
            $("#area_data").val(res.address.area_id)
            $("#region_data").val(res.address.region_id)
            console.log(res.address)
            },5000)
});
</script>
@endsection
