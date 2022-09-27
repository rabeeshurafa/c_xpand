@extends('layouts.admin')
@section('content')

<link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css"/>

<script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

<section class="horizontal-grid " id="horizontal-grid">

<form method="post" id="setting_form" enctype="multipart/form-data">
        @csrf
                <div class="row white-row">

                    <div class="col-sm-12 col-md-6">
                        <div class="card leftSide">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                                    {{trans('admin.volunteer_info')}}
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
                                                                    {{trans('admin.volunteer_name')}}
                                                                    </span>
                                                                </div>
                                                                <input type="text" id="Name"
                                                                class="form-control alphaFeild ac ui-autocomplete-input"
                                                                 placeholder="{{trans('admin.volunteer_name')}}" name="Name" autocomplete="off">
                                                                 </div>
                                                                 <div id="auto-complete-barcode" class="divKayUP barcode-suggestion ">
                                                                 </div>
                                                                </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="volunteer_id" id="volunteer_id" >
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="padding-right: 0px !important;">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.birthdate')}}
                                                                    </span>
                                                                </div>
                                                                <input id="Birthdate" name="Birthdate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="text-align: center;">
                                                <img id="userProfileImg" src="https://db.expand.ps/images/user.png" style="max-height: 100px; cursor:pointer" onclick="document.getElementById('imgPic').click(); return false">
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

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('admin.nick_name')}}
                                                            </span>
                                                        </div>
                                                        <input id="NickName" name="NickName"   class="form-control alphaFeild" placeholder="{{trans('admin.nick_name')}}" aria-describedby="basic-addon1">
                                                        {{-- <div class="input-group-append">
                                                            <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-external-link"></i>
                                                            </span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4" >
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
                                            </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.blood_type')}}                                                            </span>
                                                        </div>
                                                        {{-- <input type="text" id="BloodType" name="BloodType" class="form-control numFeild" placeholder="Ex. +A"> --}}
                                                        <select type="text" id="BloodType" name="BloodType" class="form-control">
                                                            <option value=""> اختر </option>
                                                            <option value="0">  {{'A+'}} </option>
                                                            <option value="1">  {{'A-'}} </option>
                                                            <option value="2">  {{'B+'}} </option>
                                                            <option value="3">  {{'B-'}} </option>
                                                            <option value="4">  {{'O+'}} </option>
                                                            <option value="5">  {{'O-'}} </option>
                                                            <option value="6">  {{'AB+'}} </option>
                                                            <option value="7">  {{'AB-'}} </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                {{trans('admin.marital_status')}}
                                                             </span>
                                                        </div>
                                                        <select type="text" id="MaritalStatus" name="MaritalStatus" class="form-control">
                                                            <option> اختر </option>
                                                            <option value="0">  {{'اعزب'}} </option>
                                                            <option value="1">  {{'متزوج'}} </option>
                                                            <option value="2">  {{'ارمل'}} </option>
                                                            <option value="3">  {{'مطلق'}} </option>
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

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('admin.joining_date')}}
                                                            </span>
                                                        </div>
                                                        <input id="JoiningDate" name="JoiningDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                                        <div class="input-group-append" style="visibility: hidden">
                                                            <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-external-link" style="color: #ffffff"></i>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.depat')}}
                                                               </span>
                                                    </div>
                                                    <select type="text" id="DepartmentID" name="DepartmentID" class="form-control" onchange="getDeptInfo($(this).val(),DirectManager)">
                                                        <option> اختر </option>
                                                        <option value="0">  {{trans('admin.without')}} </option>

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
                                        <div class="col-md-6" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            التخصص
                                                        </span>
                                                    </div>
                                                    <select type="text" id="Position" name="Position" class="form-control" placeholder="internal phone">
                                                        <option> اختر </option>
                                                        <option value="0">  {{trans('admin.without')}} </option>
                                                        @foreach($jobTitle as $title)
                                                        <option value="{{$title->id}}">  {{$title->name}}  </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(17,'Position','Position')">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6" style="padding-left: 40px">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" style="height: 38px;" >
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.email')}}
                                                        </span>
                                                    </div>
                                                    <input type="email" id="EmailAddress" name="EmailAddress" class="form-control" placeholder="user@domian.com" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))" >
                                                    <div class="input-group-append">
                                                    <span class="input-group-text input-group-text2">
                                                        <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                    </span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع الترخيص
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="DrivingLicense" id="DrivingLicense">
                                                                @foreach($license_type as $license)
                                                                <option value="{{$license->id}}"> {{$license->name}}   </option>
                                                                @endforeach
                                                    </select>

                                                    <div class="input-group-append" onclick="QuickAdd(16,'BuildingTypeData','نوع الترخيص')" style="cursor:pointer;max-width: 15px;
                                                    margin-left: 0px !important;
                                                    padding-left: 0px !important;
                                                    padding-right: 0px !important;
                                                    margin-right:15px;
                                                     ">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-md-6" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.driving_license')}}
                                                        </span>
                                                    </div>
                                                    <select type="text" id="DrivingLicense" name="DrivingLicense" class="form-control" >
                                                        <option> اختر </option>
                                                        {{-- <option value="0">  {{trans('admin.without')}} </option> --}}
                                                        @foreach($licenseType as $license)
                                                        <option value="{{$license->id}}" @if($license->id==9) {{ 'selected' }} @endif>  {{$license->name}}  </option>
                                                        @endforeach
                                                    </select>

                                                    <div class="input-group-append" onclick="QuickAdd(100,'DrivingLicense','license type')">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <table width="100%" class="detailsTB table archTbl" name="Education" id="Education">
                                                          <thead>
                                                              <tr>
                                                                  <th class="col-md-4" style="text-align: center!important;">{{trans('admin.educational_attainment')}} </th>
                                                                  <th class="col-md-4" style="text-align: center!important;">{{trans('admin.educational_institution')}} </th>
                                                                  <th class="col-md-3" style="text-align: center!important;">{{trans('admin.graduation_date')}} </th>
                                                                  <th width="20px">
                                                                    <i class="fa fa-plus-circle" id="plusElement2" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: aliceblue;font-size: 15pt;"></i>
                                                                  </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody id="msgRList2">
                                                            {{-- <tr>
                                                                <td width="80px">
                                                                    <input  class="form-control" type="text" name="education[]" >
                                                                    </td>
                                                                <td width="80px" >
                                                                    <input class="form-control"  type="text" name="institution1[]">
                                                                     </td>
                                                                <td width="80px" >
                                                                    <input  class="form-control" type="text" name="graduation_date[]">
                                                                </td>
                                                                <td>
                                                                    <i class="fa fa-plus-circle" id="plusElement2" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: #1E9FF2;font-size: 15pt;"></i>
                                                                </td>
                                                            </tr> --}}
                                                          </tbody>
                                                      </table>

                                                      </div>

                                            <div class="col-md-12" >
                                            <table width="100%" class="detailsTB table archTbl" name="Courses" id="Courses">
                                                          <thead >
                                                              <tr>
                                                                  <th class="col-md-4" style="text-align: center!important;" >{{trans('admin.trining_course')}} </th>
                                                                  <th class="col-md-4" style="text-align: center!important;">{{trans('admin.course_institution')}} </th>
                                                                  <th class="col-md-3" style="text-align: center!important;">{{trans('admin.course_completion_date')}} </th>
                                                                  <th width="20px">
                                                                    <i class="fa fa-plus-circle" id="plusElement3" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: aliceblue;font-size: 15pt;">

                                                                    </i>
                                                                  </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody id="msgRList3">
                                                            {{-- <tr>
                                                                <td width="80px">
                                                                    <input  class="form-control" type="text" name="courses[]" value="testtest">
                                                                    </td>
                                                                <td width="80px" >
                                                                    <input class="form-control" type="text" name="institution2[]" >
                                                                     </td>
                                                                <td width="60px" >
                                                                    <input  class="form-control" type="text" name="completion_date[]">
                                                                </td>
                                                                <td>
                                                                    <i class="fa fa-plus-circle" id="plusElement3" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: #1E9FF2;font-size: 15pt;">

                                                                    </i>
                                                                </td>
                                                            </tr> --}}

                                                          </tbody>
                                                      </table>

                                                      </div>

                                        {{-- <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.Task_Checker')}}
                                                            </span>
                                                    </div>
                                                    <select type="text" id="DirectManager" name="DirectManager" class="form-control" placeholder="internal phone">
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
                                        </div> --}}
                                        {{-- <div class="col-md-5" style="padding-right: 0px;">
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
                                        </div> --}}
                                    </div>

                                </div>
                            </div>



                            {{-- <div class="card-header hide" style="padding-top:0px;">
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
                            </div> --}}
                            {{-- <div class="card-content collapse hide">
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
                            </div> --}}
                            {{-- <div class="card-header" style="padding-top:0px;">
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
                            </div> --}}
                            {{-- <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" name="customCheck" id="customCheck2" onclick="$('#userlogin').toggle()">
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
														<input id="password" name="password" class="form-control" placeholder="{{trans('admin.password')}}" value="">
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
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-12">
            <div class="card rightSide" style="min-height:677px">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                    @include('dashboard.component.address')

                    <div class="card-header" style="padding-top:0px;">

                        <h4 class="card-title"> <img src="https://db.expand.ps/images/msg.png" width="32"

                                height="32"> {{ 'الأرشيف' }} </h4>

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
                                        <img src="{{ asset('assets/images/ico/msg.png') }}"
                                            onclick="$('#ArchModalName').html($('.ac').val());$('#CertModal').modal('show');" style="cursor:pointer">
                                        <div class="form-group">
                                            <a onclick="$('#msgModal').modal('show')"
                                                style="color:#000000">{{ trans('admin.archieve') }}
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
						{{-- <div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title" style="padding-bottom: 10px !important;padding-top: 5px;">
										<i class="fa fa-key" style="color:#4267B2"></i> &nbsp;قائمة الصلاحيات									</h4>
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
								<div class="card-content collapse show" >
									<div class="card-body" style="padding-bottom: 0px;">
										<div class="form-body">

											<div class="row">
												<div class="col-md-12" >
												<div class="form-group">
													<input type="hidden" id="pk_i_id" name="pk_i_id" value="1" />
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
						</div> --}}
					</div>
                        <div class="form-actions" style="border-top:0px; padding-bottom:44px;">
                            <div class="text-right">
                                @can('edit_model')
                                <button type="submit" id="editBtn" style="display:none" class="btn btn-primary save-data">تعديل<i class="ft-thumbs-up position-right"></i></button>
                                @endcan
                                <button type="submit" class="btn btn-primary" id="saveBtn">{{trans('admin.save')}}  <i class="ft-thumbs-up position-right"></i></button>
                                
                                <button type="reset" onclick="resetFunction(); $('#msgRList2').html(''); $('#msgRList3').html('');" class="btn btn-warning"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </form>
</section>

@include('dashboard.component.fetch_table');
@include('dashboard.component.archive_table')

@stop
@section('script')

<script>



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
							$("#errMsg").text(data.status.msg);
						}
						$(".loader").addClass('hide');
					},
					error:function(){
						$(".alert-success").hide();
						$(".alert-danger").show();
						$(".loader").addClass('hide');
					},
					cache: false,
					contentType: false,
					processData: false
				});
}
//     $(document).ready(function (){
//         $('#my_multi_select2').multiSelect({
//               selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>موظفون خارج المجموعة</b></div>",
//   selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>موظفون داخل المجموعة </b></div>"
//       });
//     })


//     $(document).ready(function (){
//         $('#my_multi_select3').multiSelect({
//               selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
//   selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
//       });
//     })
</script>




	<script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
	<!--<script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
    -->
<script>



function resetFunction(){
        // $('#msgStatic').html('(0)');
        $('#userProfileImg').attr('src','{{ asset('assets/images/ico/user.png') }}')
    }

$( function() {
    $( ".ac" ).autocomplete({
		source: 'volunteer_auto_complete',
		minLength: 2,

        select: function( event, ui ) {
            let volunteer_id = ui.item.id
            $('#saveBtn').css('display','none');
            $('#editBtn').css('display','inline-block');
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "volunteer_info",
            data: {
                volunteer_id: volunteer_id,
            },
            success:function(response){
            $('#volunteer_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#Birthdate').val(response.info.birthdate);
            $('#JobNumber').val(response.info.job_Number);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            // $('#BloodType').val(response.info.blood_type);
            $('#NickName').val(response.info.nick_name);
            $('#JoiningDate').val(response.info.joining_date);
            $('#username').val(response.info.username);
            $('#AddressDetails').val(response.address.details);
            $('#Note').val(response.address.notes);
            $("select#BloodType option").each(
                function() { this.selected = (this.text == response.info.blood_type);
            });
            $("select#MaritalStatus option").each(
                function() { this.selected = (this.text == response.info.marital_status);
            });
            $('#EmailAddress').val(response.info.email);
            $('#userProfileImg').attr('src', response.info.image);
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.info.department_id);
            });
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.info.job_title_id);
            });
            $("select#DrivingLicense option")
                 .each(function() { this.selected = (this.text == response.info.license_types_id);
            });
            $("#msgStatic").html(response.ArchiveCount);
                            drawTablesArchive(response.Archive, response.copyTo, response
                                .ArchiveLic, response.jalArchive,
                                response.outArchiveCount, response.inArchiveCount,
                                response.otherArchiveCount, response
                                .licFileArchiveCount, response.licArchiveCount, response
                                .copyToCount, response.linkToCount);

            var len = response.cources.length;
            //manualy empty tabls content//////
            $('#msgRList2').html('');
            $('#msgRList3').html('');
            //////////////////////////////////
        for(var i=0; i<len; i++){
			    var index = i+1;

                var name = response.cources[i].name;
                var institution = response.cources[i].institution;
                var completion_date = response.cources[i].completion_date;
                if (response.cources[i].type=="course") {
                    var coursesList =
                    '<tr>'+
                        '<td class="col-md-4">'+
                             '<input  class="form-control" type="text" name="courses[]" value="'+name+'">' +
                        '</td>'+

                        '<td class="col-md-4">'+
                            '<input  class="form-control" type="text" name="institution2[]" value="'+institution+'">'+
                        '</td>'+

                        '<td class="col-md-3">'+
                            '<input  class="form-control" type="text" name="completion_date[]" value="'+completion_date+'">'+
                        '</td>'+

                        '<td onclick="$(this).parent().remove()" >'+
                            '<i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'+
                        '</td>'+
                    '</tr>'
                    $("#msgRList3").append(coursesList);
                } else {
                    var coursesList =
                    '<tr>'+
                        '<td class="col-md-4">'+
                            '<input  class="form-control" type="text" name="education[]" value="'+name+'">' +
                        '</td>'+

                        '<td class="col-md-4">'+
                            '<input  class="form-control" type="text" name="institution1[]" value="'+institution+'">'+
                        '</td>'+

                        '<td class="col-md-3">'+
                            '<input  class="form-control" type="text" name="graduation_date[]" value="'+completion_date+'">'+
                        '</td>'+

                        '<td onclick="$(this).parent().remove()" >'+
                            '  <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'+
                        '</td>'+
                    '</tr>'
                    $("#msgRList2").append(coursesList);
                }

            }

            $("select#CityID option")
                 .each(function() { this.selected = (this.text == response.city);
            });
            $("select#area_data option")
                 .each(function() { this.selected = (this.text == response.area);
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.text == response.region);
            });
                    },
                    });
        }
	});
} );

function update($id)
{   $('#saveBtn').css('display','none');
    $('#editBtn').css('display','inline-block');
    let volunteer_id = $id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "volunteer_info",
            data: {
                volunteer_id: volunteer_id,
            },
            success:function(response){
                $('#volunteer_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#Birthdate').val(response.info.birthdate);
            $('#JobNumber').val(response.info.job_Number);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            // $('#BloodType').val(response.info.blood_type);
            $('#NickName').val(response.info.nick_name);
            $('#JoiningDate').val(response.info.joining_date);
            $('#username').val(response.info.username);
            $('#AddressDetails').val(response.address.details);
            $('#Note').val(response.address.notes);
            $("select#BloodType option").each(
                function() { this.selected = (this.text == response.info.blood_type);
            });
            $("select#MaritalStatus option").each(
                function() { this.selected = (this.text == response.info.marital_status);
            });
            $('#EmailAddress').val(response.info.email);
            $('#userProfileImg').attr('src', response.info.image);
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.info.department_id);
            });
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.info.job_title_id);
            });
            $("select#DrivingLicense option")
                 .each(function() { this.selected = (this.text == response.info.license_types_id);
            });
            $("#msgStatic").html(response.ArchiveCount);
                            drawTablesArchive(response.Archive, response.copyTo, response
                                .ArchiveLic, response.jalArchive,
                                response.outArchiveCount, response.inArchiveCount,
                                response.otherArchiveCount, response
                                .licFileArchiveCount, response.licArchiveCount, response
                                .copyToCount, response.linkToCount);

            var len = response.cources.length;
            //manualy empty tabls content//////
            $('#msgRList2').html('');
            $('#msgRList3').html('');
            //////////////////////////////////
        for(var i=0; i<len; i++){
			    var index = i+1;

                var name = response.cources[i].name;
                var institution = response.cources[i].institution;
                var completion_date = response.cources[i].completion_date;
                if (response.cources[i].type=="course") {
                    var coursesList =
                    '<tr>'+
                        '<td class="col-md-4">'+
                             '<input  class="form-control" type="text" name="courses[]" value="'+name+'">' +
                        '</td>'+

                        '<td class="col-md-4">'+
                            '<input  class="form-control" type="text" name="institution2[]" value="'+institution+'">'+
                        '</td>'+

                        '<td class="col-md-3">'+
                            '<input  class="form-control" type="text" name="completion_date[]" value="'+completion_date+'">'+
                        '</td>'+

                        '<td onclick="$(this).parent().remove()" >'+
                            '<i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'+
                        '</td>'+
                    '</tr>'
                    $("#msgRList3").append(coursesList);
                } else {
                    var coursesList =
                    '<tr>'+
                        '<td class="col-md-4">'+
                            '<input  class="form-control" type="text" name="education[]" value="'+name+'">' +
                        '</td>'+

                        '<td class="col-md-4">'+
                            '<input  class="form-control" type="text" name="institution1[]" value="'+institution+'">'+
                        '</td>'+

                        '<td class="col-md-3">'+
                            '<input  class="form-control" type="text" name="graduation_date[]" value="'+completion_date+'">'+
                        '</td>'+

                        '<td onclick="$(this).parent().remove()" >'+
                            '  <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'+
                        '</td>'+
                    '</tr>'
                    $("#msgRList2").append(coursesList);
                }

            }

            $("select#CityID option")
                 .each(function() { this.selected = (this.text == response.city);
            });
            $("select#area_data option")
                 .each(function() { this.selected = (this.text == response.area);
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.text == response.region);
            });
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
       e.preventDefault();
       let formData = new FormData(this);
            $( "#Name" ).removeClass( "error" );
            $( "#NationalID" ).removeClass( "error" );
            $( "#NickName" ).removeClass( "error" );
            $( "#DepartmentID" ).removeClass( "error" );
            $( "#Position" ).removeClass( "error" );
            $( "#MobileNo1" ).removeClass( "error" );

       $.ajax({
          type:'POST',
          url: "store_volunteer",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
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
                //manualy empty tabls content//////
                $('#msgRList2').html('');
                $('#msgRList3').html('');
                //////////////////////////////////
               this.reset();
             }
             $('#userProfileImg').attr('src', window.location.origin+'/assets/images/ico/user.png');
           },
           error: function(response){
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




//      $(".save-data").click(function(event){
//         $(".loader").removeClass('hide');
//             $( "#Name" ).removeClass( "error" );
//             $( "#NationalID" ).removeClass( "error" );
//             $( "#NickName" ).removeClass( "error" );
//             $( "#DepartmentID" ).removeClass( "error" );
//             $( "#Position" ).removeClass( "error" );
//             $( "#HiringDate" ).removeClass( "error" );
//             $( "#DirectManager" ).removeClass( "error" );
//             $( "#JobType" ).removeClass( "error" );

//       event.preventDefault();

//       let Name = $("input[name=Name]").val();
//       let employee_id = $("input[name=employee_id]").val();
//       let NationalID = $("input[name=NationalID]").val();
//       let MobileNo1 = $("input[name=MobileNo1]").val();
//       let MobileNo2 = $("input[name=MobileNo2]").val();
//       let JobNumber = $("input[name=JobNumber]").val();
//       let NickName = $("input[name=NickName]").val();
//       let InternalPhone = $("input[name=InternalPhone]").val();
//       let EmailAddress = $("input[name=EmailAddress]").val();
//       var DepartmentID = $('#DepartmentID').find(":selected").val();
//       var Position = $('#Position').find(":selected").val();
//       var DirectManager = $('#DirectManager').find(":selected").val();
//       let HiringDate = $("input[name=HiringDate]").val();
//       var JobType = $('#JobType').find(":selected").val();
//       var CurrencyID = $('#CurrencyID').find(":selected").val();
//       let Salary = $("input[name=Salary]").val();
//       let vac_year = $("input[name=vac_year]").val();
//       let vac_annual = $("input[name=vac_annual]").val();
//       let emr_blanace = $("input[name=emr_blanace]").val();
//       var userGroup = $("#userGroup :selected").map(function(i, el) {
//     return $(el).val();
// }).get();
//       let username = $("input[name=username]").val();
//       let password = $("input[name=password]").val();
//       var CityID = $('#CityID').find(":selected").val();
//       var area_data = $('#area_data').find(":selected").val();
//       var region_data = $('#region_data').find(":selected").val();
//       var AddressDetails = $('#AddressDetails').val();
//       var Note = $('#Note').val();
//       var _token ='{{csrf_token()}}';

//       $.ajax({
//         url: "store_employee",
//         type:"POST",
//         data:{
//             Name:Name,
//             NationalID:NationalID,
//             MobileNo1:MobileNo1,
//             MobileNo2:MobileNo2,
//             JobNumber:JobNumber,
//             NickName:NickName,
//             InternalPhone:InternalPhone,
//             EmailAddress:EmailAddress,
//             DepartmentID:DepartmentID,
//             Position:Position,
//             CurrencyID:CurrencyID,
//             DirectManager:DirectManager,
//             HiringDate:HiringDate,
//             JobType:JobType,
//             Salary:Salary,
//             employee_id:employee_id,
//             vac_year:vac_year,
//             vac_annual:vac_annual,
//             emr_blanace:emr_blanace,
//             userGroup:userGroup,
//             username:username,
//             password:password,
//             CityID:CityID,
//             area_data:area_data,
//             region_data:region_data,
//             AddressDetails:AddressDetails,
//             Note:Note,
//             _token: _token ,
//          },

//         success:function(response){

//             $(".loader").addClass('hide');
//             $(".alert-success").removeClass('hide');
//             $("#succMsg").text('{{trans('admin.employee_added')}}')
//             setTimeout(function(){
//                 $(".alert-success").addClass("hide");
//             },2000)



//             $("#ajaxform")[0].reset();
//         },
//         error: function(response) {
//             $(".loader").addClass('hide');
//             $(".alert-success").addClass("hide");
// 			$(".alert-danger").removeClass('hide');
//             $("#errMsg").text('{{trans('admin.error_save')}}')
//             setTimeout(function(){
//                 $(".alert-danger").addClass("hide");
//             },2000)
//             if(response.responseJSON.errors.Name){
//                 $( "#Name" ).addClass( "error" );
//             }
//             if(response.responseJSON.errors.NationalID){
//                 $( "#NationalID" ).addClass( "error" );
//             }
//             if(response.responseJSON.errors.NickName){
//                 $( "#NickName" ).addClass( "error" );
//             }
//             if(response.responseJSON.errors.DepartmentID){
//                 $( "#DepartmentID" ).addClass( "error" );
//             }
//             if(response.responseJSON.errors.Position){
//                 $( "#Position" ).addClass( "error" );
//             }
//             if(response.responseJSON.errors.JobType){
//                 $( "#JobType" ).addClass( "error" );
//             }
//             if(response.responseJSON.errors.HiringDate){
//                 $( "#HiringDate" ).addClass( "error" );
//             }
//             if(response.responseJSON.errors.DirectManager){
//                 $( "#DirectManager" ).addClass( "error" );
//             }

//            }



//        });
//   });

/*
   $('#Position').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });

  $('#DepartmentID').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
  $('#DirectManager').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
  $('#JobType').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
*/



$(document).ready(function () {
    $('#plusElement2').click(function(){
            $("#msgRList2").append(''
                +'<tr>'
                + '<td class="col-md-4">'
                 +      ' <input  class="form-control" type="text" name="education[]">'
                  +     ' </td>'
                  +  '<td class="col-md-4" >'
                  +     '<input class="form-control" type="text" name="institution1[]" >'
                  +        '</td>'
                  + '<td class="col-md-3" >'
                  +  ' <input  class="form-control" type="text" name="graduation_date[]">'
                  + '</td>'
                  +'<td onclick="$(this).parent().remove()" >'
                  +'  <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
                  + '</td>'
                +' </tr>'
            );
        });
});

$(document).ready(function () {
    $('#plusElement3').click(function(){
            $("#msgRList3").append(''
                +'<tr>'
                + '<td class="col-md-4">'
                 +      ' <input  class="form-control"  type="text" name="courses[]">'
                  +     ' </td>'
                  +  '<td class="col-md-4" >'
                  +     '<input class="form-control"   type="text" name="institution2[]">'
                  +        '</td>'
                  + '<td class="col-md-3" >'
                  +  ' <input  class="form-control" type="text" name="completion_date[]">'
                  + '</td>'
                  +'<td onclick="$(this).parent().remove()" >'
                  +'  <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
                  + '</td>'
                +' </tr>'
            );
        });
});
</script>

@endsection





{{-- function update($id)
{
    let emp_id = $id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "volunteer_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
            $('#volunteer_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#JobNumber').val(response.info.job_Number);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#NickName').val(response.info.nick_name);
            $('#EmailAddress').val(response.info.email);
            $("#DepartmentID").val(response.info.department_id);
            $('#userProfileImg').attr('src', response.info.image);
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.job_title);
            });
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.department_id);
            });
            $('#username').val(response.info.username);
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
            if(response.info.image != 'https://expand-archive.com/expand_repo/public'/*window.location.origin*/){
                $('#userProfileImg').attr('src', response.info.image);
            }else{
                $('#userProfileImg').attr('src', '{{asset("assets/images/ico/user.png")}}');
            }

                    },
                    });
} --}}
