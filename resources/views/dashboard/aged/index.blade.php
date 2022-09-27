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

                    <div class="col-sm-12 col-md-6">
                        <div class="card leftSide">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                                    {{'بيانات المسن'}}
                                 </h4>
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
                                                                    {{'اسم المسن'}}
                                                                    </span>
                                                                </div>
                                                                <input type="text" id="Name"
                                                                class="form-control alphaFeild ac ui-autocomplete-input"
                                                                 placeholder="اسم المسن" name="Name" autocomplete="off">
                                                            </div>
                                                                <div id="auto-complete-barcode" class="divKayUP barcode-suggestion ">
                                                                 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <input type="hidden" name="aged_id" id="aged_id" value="">
                                                
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
                                                                <img src="https://db.expand.ps/images/call-pinar35.png">
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
                                                                {{'تاريخ الدخول'}}
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
                                            
                                            <div class="col-md-4" style="padding-left:0px; padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-10" style="padding-left:0px;">
                                                    <div class="input-group" >
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('admin.city')}}
                                                            </span>
                                                        </div>  
                                                        <select id="CityID" name="CityID" type="text" class="form-control">
                                                            <option value=""> -- {{trans('admin.city')}} --</option>     
                                                            @foreach($city as $cit)
                                                                <option  value="{{$cit->id}}" {{$address->city_id==$cit->id?"selected":"" }} >  {{$cit->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <div class="input-group-append col-2" onclick="QuickAdd(10,'CityID','City')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4" style="padding-left:0px;">
                                                <div class="row">
                                                    <div class="form-group col-10" style="padding-left:0px;margin-left: -5px;">
                                                        <div class="input-group" >
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.state')}}
                                                                </span>
                                                            </div>  
                                                        <select id="area_data" name="TownID" type="text" class="form-control">
                                                            <option value=""> -- {{trans('admin.state')}} -- </option>
                                                            @foreach($area as $cit)
                                                                @if($address->city_id==$cit->city_id)
                                                                    <option  value="{{$cit->id}}"  {{$address->area_id==$cit->id?"selected":"" }}>  {{$cit->name}} </option>
                                                                @endif;
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <div class="input-group-append col-2" onclick="QuickAdd(33,$('#CityID').find(':selected').val(),'Area')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title"><img src="https://db.expand.ps/images/workHrs.png" width="32" height="32">
                                    {{'بيانات'}}
                                </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-lg-6 col-md-12">

                                            <div class="form-group">
                                    
                                                <div class="input-group" style="width: 86% !important;">
                                    
                                                    <div class="input-group-prepend">
                                    
                                                      <span class="input-group-text " id="basic-addon1" style="">
                                    
                                                         القسط الشهرى
                                    
                                                      </span>
                                    
                                                    </div>
                                    
                                                    <input type="text"  id="AmountInNIS" name="AmountInNIS" class="form-control numFeild" placeholder="000" aria-describedby="basic-addon1" style="">
                                    
                                                    <select id="CurrencyID" name="CurrencyID" type="text" class="form-control valid Currency" style="" aria-invalid="false">
                                    
                                                        <option value="26" selected=""> شيكل </option>
                                    
                                                        <option value="28"> دينار </option>
                                    
                                                        <option value="27"> دولار </option>
                                    
                                                        <option value="31"> يورو </option>
                                    
                                                    </select>
                                    
                                                </div>
                                        
                                            </div>
                                    
                                        </div>
                                        
                                        <div class="col-md-6" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            الجهة الممولة
                                                        </span>
                                                    </div>
                                                    <select type="text" id="sponser" name="sponser" class="form-control sponser" placeholder="internal phone">
                                                        <option value=""> اختر </option>
                                                        @foreach($sponser as $spons)
                                                        <option value="{{$spons->id}}"> {{$spons->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" onclick="ShowConstantModal(107,'sponser','الجهة الممولة')">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title">
                                     <img src="{{ asset('assets/images/ico/kindred.png') }}" width="40" height="40">
                                    {{'الاقارب'}}
                                </h4>
                            </div>
        
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-12" >
                                            <table width="100%" class="detailsTB table archTbl" name="kindred" id="kindred">
                                                <thead>
                                                    {{-- <tr style="">
                                                        <th class="" colspan="4" style="text-align: center!important; color: white;">
                                                            الأقارب
                                                        </th>
                                                    </tr> --}}
                                                    <tr>
                                                        <th width="20px" style="background:#1D9CED;">
                                                        </th>
                                                        <th class="col-md-4" style="text-align: center!important; color: white;background:#1D9CED;">
                                                            الاسم
                                                        </th>
                                                        <th class="col-md-4" style="text-align: center!important; color: white; background:#1D9CED;">
                                                            رقم الهاتف
                                                        </th>
                                                        <th class="col-md-3" style="text-align: center!important; color: white; background:#1D9CED;">
                                                            صلة القرابة
                                                        </th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody id="kindredlst">
                                                        <tr>
                                                            <td width="20px" style="border:hidden; color:#1D9CED;">
                                                                1
                                                            </td>
                                                            <td class="col-md-4" style="border:hidden;">
                                                                <input  class="form-control selectFullCorner" type="text" name="name[]" >
                                                            </td>
                                                            <td class="col-md-4" style="border:hidden;">
                                                                <input class="form-control selectFullCorner"  type="text" name="phone[]">
                                                            </td>
                                                            <td class="col-md-3" style="border:hidden;">
                                                                <input  class="form-control selectFullCorner" onfocus="addNewRow();" type="text" name="kinderedType[]">
                                                            </td>
                                                            <td width="20px" style="border:hidden;">
                                                                {{--<i class="fa fa-trash" id="plusElement2" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: #1E9FF2;font-size: 15pt;"></i>--}}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
        
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title"> <img src="https://db.expand.ps/images/detalies.png" width="32"
                                        height="32"> {{ 'تفاصيل المسن' }} </h4>
                            </div>
        
                            <div class="card-content collapse show">
                                <div class="card-body">
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
                                    <div class="row hide">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 98% !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{'ملاحظات'}}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="notes"
                                                    class="form-control alphaFeild "
                                                     placeholder="ملاحظات" name="notes" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    

                    

                    <div class="col-sm-12 col-lg-6 col-md-12">
                        <div class="card rightSide" style="min-height:677px">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <img src="{{ asset('assets/images/ico/Insurance.png') }}" width="32" height="32">
                                    معلومات التأمين الصحى
                                </h4>
                            </div>
                            
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                            
                                        <div class="col-md-12" >
                                            <table width="100%" class="detailsTB table archTbl" name="healthInsurance" id="healthInsurance">
                                                <thead>
                                                    {{-- <tr style="">
                                                        <th class="" colspan="4" style="text-align: center!important; color: white;">
                                                            معلومات التأمين الصحى
                                                        </th>
                                                    </tr> --}}
                                                    <tr>
                                                        <th class="col-md-3"  style="text-align: center!important; color: white;background:#1D9CED;">
                                                            الجهة المصدرة
                                                        </th>
                                                        <th class="col-md-3" style="text-align: center!important; color: white;background:#1D9CED;">
                                                            تاريخ البداية
                                                        </th>
                                                        <th class="col-md-3" style="text-align: center!important; color: white;background:#1D9CED;">
                                                            تاريخ النهاية 
                                                        </th>
                                                        <th class="col-md-3" style="text-align: center!important; color: white;background:#1D9CED;">
                                                            رقم التأمين 
                                                        </th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody id="healthInsuranceLst">
                                                        <tr>
                                                            <td class="col-md-3" style="border:hidden;">
                                                                <input  class="form-control selectFullCorner" type="text" id="issuer" name="issuer" >
                                                            </td>
                                                            <td class="col-md-3" style="border:hidden;">
                                                                <input  class="form-control selectFullCorner" data-mask="00/00/0000" maxlength="10"  placeholder="dd/mm/yyyy" id="insuranceStart" name="insuranceStart" >
                                                            </td>
                                                            <td class="col-md-3" style="border:hidden;">
                                                                <input class="form-control selectFullCorner" data-mask="00/00/0000" maxlength="10"  placeholder="dd/mm/yyyy"  type="text" id="insuranceEnd" name="insuranceEnd">
                                                            </td>
                                                            <td class="col-md-3" style="border:hidden;">
                                                                <input  class="form-control selectFullCorner" onfocus="" type="text" id="issuerNum" name="issuerNum">
                                                            </td>
                                                            <td width="20px" style="border:hidden;">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>

                                        </div>

                                    </div>
            					</div>

                                <div class="card-header" style="padding-top:0px;">
                                    <h4 class="card-title">
                                        <img src="{{ asset('assets/images/ico/somatic.png') }}" width="32" height="32">
                                        {{'الأمراض الجسدية'}}
                                    </h4>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                        
                                            <div class="col-md-12" >
                                                <table width="100%" class="detailsTB table archTbl" name="somaticDiseases" id="somaticDiseases">
                                                    <thead>
                                                        {{-- <tr style="">
                                                            <th class="" colspan="4" style="text-align: center!important; color: white;">
                                                                الأمراض الجسدية  
                                                            </th>
                                                        </tr> --}}
                                                        <tr>
                                                            <th class="col-md-3" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                اسم المرض 
                                                            </th>
                                                            <th class="col-md-2" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                منذ 
                                                            </th>
                                                            <th class="col-md-3" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                الطبيب للمراجعة  
                                                            </th>
                                                            <th class="col-md-4" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                العلاج  
                                                            </th>
                                                            
                                                        </tr>
                                                        </thead>
                                                        <tbody id="somaticDiseasesLst">
                                                             <tr>
                                                                <td class="col-md-3" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" type="text" name="DiseasesName[]" >
                                                                    <select type="text" id="DiseasesName[]" name="DiseasesName[]" class="form-control DiseasesName" placeholder="internal phone">
                                                                        <option value=""> اختر </option>
                                                                       {{-- @foreach($sponser as $spons)
                                                                        <option value="{{$spons->id}}"> {{$spons->name}} </option>
                                                                        @endforeach--}}
                                                                    </select>
                                                                    <div class="input-group-append" onclick="ShowConstantModal(107,'DiseasesName','اسم المرض')">
                                                                        <span class="input-group-text input-group-text2">
                                                                            <i class="fa fa-external-link"></i>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td class="col-md-2" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" type="text" name="Diseasesfrom[]" >
                                                                </td>
                                                                <td class="col-md-3" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" type="text" name="doctor1[]" >
                                                                </td>
                                                                <td class="col-md-4" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" onfocus="addNewDiseases()" type="text" name="treatment1[]">
                                                                </td>
                                                                
                                                                <td width="20px" style="border:hidden;">
                                                                   
                                                                </td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                  </table>
    
                                              </div>
    
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header" style="padding-top:0px;">
                                    <h4 class="card-title">
                                        <img src="{{ asset('assets/images/ico/mental.png') }}" width="32" height="32">
                                        {{'الأمراض النفسية'}}
                                    </h4>
                                </div>

                                <div class="card-content collapse show">
                                
                                    <div class="card-body">
                                        <div class="row">
                                        
                                            <div class="col-md-12" >
                                                <table width="100%" class="detailsTB table archTbl" name="mentalIllness" id="mentalIllness">
                                                    <thead>
                                                        {{-- <tr style="">
                                                            <th class="" colspan="4" style="text-align: center!important; color: white; background:#1D9CED;">
                                                                الأمراض النفسية  
                                                            </th>
                                                        </tr> --}}
                                                        <tr>
                                                            <th class="col-md-3" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                اسم المرض 
                                                            </th>
                                                            <th class="col-md-2" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                منذ 
                                                            </th>
                                                            <th class="col-md-3" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                الطبيب للمراجعة  
                                                            </th>
                                                            <th class="col-md-4" style="text-align: center!important; color: white;background:#1D9CED;">
                                                                العلاج  
                                                            </th>
                                                            
                                                        </tr>
                                                        </thead>
                                                        <tbody id="mentalIllnessLst">
                                                            <tr>
                                                                <td class="col-md-3" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" type="text" name="mentalName[]" >
                                                                </td>
                                                                <td class="col-md-2" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" type="text" name="mentalfrom[]" >
                                                                </td>
                                                                <td class="col-md-3" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" type="text" name="doctor2[]" >
                                                                </td>
                                                                <td class="col-md-4" style="border:hidden;">
                                                                    <input  class="form-control selectFullCorner" onfocus="addNewmental();" type="text" name="treatment2[]">
                                                                </td>
                                                                
                                                                <td width="20px" style="border:hidden;">
                                                                
                                                                </td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                  </table>
    
                                              </div>
    
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions" style="border-top:0px; padding-bottom:44px;">
                                    <div class="text-right">
                                        <button type="submit" style="border-color: #1D9CED !important; background-color: #1D9CED !important;" class="btn btn-primary" id="saveBtn">
                                            {{trans('admin.save')}}  
                                            <i class="ft-thumbs-up position-right"></i>
                                        </button>
                                        <button id="editBtn" style="display:none;" class="btn btn-primary save-data">

                                            تعديل
    
                                            <i class="ft-thumbs-up position-right"></i>

                                        </button> 
                                        <button type="reset" onclick="resetFunction();" class="btn btn-warning">
                                            {{trans('assets.reset')}} 
                                            <i class="ft-refresh-cw position-right"></i>
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="padding: 0px">
                    @include('dashboard.component.fetch_table')
                </div>
            </div>

    </form>
</section>

{{--@include('dashboard.component.archive_table')--}}

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

</script>




	<script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>

<script>

    window.globalCounter = 2;

    function resetFunction(){
            // $('#msgStatic').html('(0)');
            $("#mentalIllnessLst").html('');
            $("#somaticDiseasesLst").html('');
            $('#kindredlst').html('');
            $('#aged_id').val('');
            initMentalTable();
            initSomaticTable();
            initkindredTable();
            $('#userProfileImg').attr('src','https://db.expand.ps/images/user.png')
    }
    
    
    $( function() {
        $( ".ac" ).autocomplete({
    		source: 'aged_auto_complete',
    		minLength: 2,
    
            select: function( event, ui ) {
                let aged_id = ui.item.id
                update(aged_id);
            }
    	});
    } );

    function initMentalTable(){
        var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                + '<input  class="form-control selectFullCorner" type="text" name="mentalName[]" >'
                + '</td>'
                +'<td class="col-md-2" style="border:hidden;">'
                +'<input  class="form-control selectFullCorner" type="text" name="mentalfrom[]" >'
                +'</td>'
                +'<td class="col-md-3" style="border:hidden;">'
                +'<input class="form-control selectFullCorner"  type="text" name="doctor2[]">'
                +'</td><td class="col-md-4" style="border:hidden;">'
                +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewmental();" name="treatment2[]">'
                +'</td><td style="border:hidden;" onclick="">'
                +'</td></tr>';
                        
        $("#mentalIllnessLst").append(data);
    }

    function initSomaticTable(){
        var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                + '<input  class="form-control selectFullCorner" type="text" name="DiseasesName[]" >'
                + '</td>'
                +'<td class="col-md-2" style="border:hidden;">'
                +'<input  class="form-control selectFullCorner" type="text" name="Diseasesfrom[]" >'
                +'</td>'
                +'<td class="col-md-3" style="border:hidden;">'
                +'<input class="form-control selectFullCorner"  type="text" name="doctor1[]">'
                +'</td><td class="col-md-4" style="border:hidden;">'
                +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewDiseases();" name="treatment1[]">'
                +'</td><td style="border:hidden;" onclick="">'
                +'</td></tr>';
                    
                $("#somaticDiseasesLst").append(data);
    }

    function initkindredTable(){
        var coursesList ='<tr><td width="20px" style="border:hidden; color:#1D9CED;">' 
                        + '1'
                        + '</td><td class="col-md-4" style="border:hidden;">'
                        +'<input  class="form-control selectFullCorner" type="text" name="name[]">'
                        +'</td><td class="col-md-4" style="border:hidden;">'
                        +'<input class="form-control selectFullCorner"  type="text" name="phone[]">'
                        +'</td><td class="col-md-3" style="border:hidden;">'
                        +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewRow();" name="kinderedType[]">'
                        +'</td><td style="border:hidden;">'
                        +'</td></tr>';
        $("#kindredlst").append(coursesList);
    }
    
    function update($id)
    {
        $('#saveBtn').css('display','none');
        $('#editBtn').css('display','inline-block');
        let aged_id = $id;
        $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "aged_info",
            data: {
                aged_id: aged_id,
            },
            success:function(response){
                // console.log(response);
                    
                $('#aged_id').val(response.info.id);
                $('#Name').val(response.info.name);
                $('#NationalID').val(response.info.national_id);
                // Birthdate
                Birthdate='';
                if(response.info.birth_date!=null && response.info.birth_date!=''){
                    rowdate=response.info.birth_date.split('-');
                    Birthdate=rowdate[2]+'/'+rowdate[1]+'/'+rowdate[0];
                }
                
                $('#Birthdate').val(Birthdate);
                
                $('#MobileNo1').val(response.info.phone);
                $('#BloodType').val(response.info.blood_type);
                $('#MaritalStatus').val(response.info.marital_status);
                $('#CityID').val(response.info.city);
                // $('#CityID').trigger('change');
                getAreas(response.info.city,response.info.area)
                $('#AmountInNIS').val(response.info.cost);
                $('#CurrencyID').val(response.info.curr);
                $('#sponser').val(response.info.sponser);
                $('#issuer').val(response.info.issuer);
                $('#issuerNum').val(response.info.issuerNum);
                console.log(response.info.image);
                if(response.info.image != 'https://t.expand.ps/expand_repov1/public'){
                    console.log(response.info.image);
                    console.log('error');
                    $('#userProfileImg').attr('src', response.info.image);
                }else{
                    console.log('go');
                    $('#userProfileImg').attr('src', 'https://db.expand.ps/images/user.png');
                }
                insuranceEnd='';
                if(response.info.insurance_end!=null && response.info.insurance_end!=''){
                    rowdate=response.info.insurance_end.split('-');
                    insuranceEnd=rowdate[2]+'/'+rowdate[1]+'/'+rowdate[0];
                }
                $('#insuranceEnd').val(insuranceEnd);
                
                insuranceStart='';
                if(response.info.insurance_start!=null && response.info.insurance_start!=''){
                    rowdate=response.info.insurance_start.split('-');
                    insuranceStart=rowdate[2]+'/'+rowdate[1]+'/'+rowdate[0];
                }
                $('#insuranceStart').val(insuranceStart);
                
                enterDate='';
                if(response.info.enter_date!=null && response.info.enter_date!=''){
                    rowdate=response.info.enter_date.split('-');
                    enterDate=rowdate[2]+'/'+rowdate[1]+'/'+rowdate[0];
                }
                
                $('#JoiningDate').val(enterDate);
                $('#notes').val(response.info.notes);
                
                var len = response.info.kindred_name.length;
                
                if(len>0){
                $('#kindredlst').html('');
                }
                
                for(var i=0; i<len; i++){
                    var name = response.info.kindred_name[i];
                    var phone = response.info.kindred_phone[i];
                    var Type = response.info.kindred_kinderedType[i];
                    
                    if (i!=0) {
                        var coursesList ='<tr><td width="20px" style="border:hidden; color:#1D9CED;">' 
                        + (i+1) 
                        + '</td><td class="col-md-4" style="border:hidden;">'
                        +'<input  class="form-control selectFullCorner" type="text" name="name[]" value="'+(name??'')+'">'
                        +'</td><td class="col-md-4" style="border:hidden;">'
                        +'<input class="form-control selectFullCorner"  type="text" name="phone[]" value="'+(phone??'')+'">'
                        +'</td><td class="col-md-3" style="border:hidden;">'
                        +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewRow();" name="kinderedType[]" value="'+(Type??'')+'">'
                        +'</td><td style="border:hidden;">'
                        +'<i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i></td></tr>';
                        $("#kindredlst").append(coursesList);
                    } else {
                        var coursesList ='<tr><td width="20px" style="border:hidden; color:#1D9CED;">' 
                        + (i+1)
                        + '</td><td class="col-md-4" style="border:hidden;">'
                        +'<input  class="form-control selectFullCorner" type="text" name="name[]" value="'+(name??'')+'">'
                        +'</td><td class="col-md-4" style="border:hidden;">'
                        +'<input class="form-control selectFullCorner"  type="text" name="phone[]" value="'+(phone??'')+'">'
                        +'</td><td class="col-md-3" style="border:hidden;">'
                        +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewRow();" name="kinderedType[]" value="'+(Type??'')+'">'
                        +'</td><td style="border:hidden;">'
                        +'</td></tr>';
                        $("#kindredlst").append(coursesList);
                    }
                    
                }
                
                var len2 = response.info.illness.length;
                //manualy empty tabls content//////
                
                $('#mentalIllnessLst').html('');
                $('#somaticDiseasesLst').html('');
                
                var hasSomatic=0;
                var hasMental=0;
                //////////////////////////////////
                for(var i=0; i<len2; i++){
                    
                    var name = response.info.illness[i].name;
                    var since = response.info.illness[i].since;
                    var doctor = response.info.illness[i].doctor;
                    var medicine = response.info.illness[i].medicine;
                    
                    if (response.info.illness[i].type=="1") {
                        
                        if(hasSomatic!=0){
                            var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                            + '<input  class="form-control selectFullCorner" type="text" name="DiseasesName[]" value="'+(name??'')+'">'
                            + '</td>'
                            +'<td class="col-md-2" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner" type="text" name="Diseasesfrom[]" value="'+(since??'')+'">'
                            +'</td>'
                            +'<td class="col-md-3" style="border:hidden;">'
                            +'<input class="form-control selectFullCorner"  type="text" name="doctor1[]" value="'+(doctor??'')+'">'
                            +'</td><td class="col-md-4" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewDiseases();" name="treatment1[]" value="'+(medicine??'')+'">'
                            +'</td><td style="border:hidden;" onclick="$(this).parent().remove()">'
                            +'<i class="fa fa-trash" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
                            +'</td></tr>';
                            
                            $("#somaticDiseasesLst").append(data);
                        }else{
                            
                            hasSomatic=1;
                            var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                            + '<input  class="form-control selectFullCorner" type="text" name="DiseasesName[]" value="'+(name??'')+'">'
                            + '</td>'
                            +'<td class="col-md-2" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner" type="text" name="Diseasesfrom[]" value="'+(since??'')+'">'
                            +'</td>'
                            +'<td class="col-md-3" style="border:hidden;">'
                            +'<input class="form-control selectFullCorner"  type="text" name="doctor1[]" value="'+(doctor??'')+'">'
                            +'</td><td class="col-md-4" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewDiseases();" name="treatment1[]" value="'+(medicine??'')+'">'
                            +'</td><td style="border:hidden;" onclick="">'
                            +'</td></tr>';
                            
                            $("#somaticDiseasesLst").append(data);
                        }
                    } else {
                        if(hasMental!=0){
                            var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                            + '<input  class="form-control selectFullCorner" type="text" name="mentalName[]" value="'+(name??'')+'">'
                            + '</td>'
                            +'<td class="col-md-2" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner" type="text" name="mentalfrom[]" value="'+(since??'')+'">'
                            +'</td>'
                            +'<td class="col-md-3" style="border:hidden;">'
                            +'<input class="form-control selectFullCorner"  type="text" name="doctor2[]" value="'+(doctor??'')+'">'
                            +'</td><td class="col-md-4" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewmental();" name="treatment2[]" value="'+(medicine??'')+'">'
                            +'</td><td style="border:hidden;" onclick="$(this).parent().remove()">'
                            +'<i class="fa fa-trash" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
                            +'</td></tr>';
                            
                            $("#mentalIllnessLst").append(data);
                        }else{
                            hasMental=1;
                            var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                            + '<input  class="form-control selectFullCorner" type="text" name="mentalName[]" value="'+(name??'')+'">'
                            + '</td>'
                            +'<td class="col-md-2" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner" type="text" name="mentalfrom[]" value="'+(since??'')+'">'
                            +'</td>'
                            +'<td class="col-md-3" style="border:hidden;">'
                            +'<input class="form-control selectFullCorner"  type="text" name="doctor2[]" value="'+(doctor??'')+'">'
                            +'</td><td class="col-md-4" style="border:hidden;">'
                            +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewmental();" name="treatment2[]" value="'+(medicine??'')+'">'
                            +'</td><td style="border:hidden;" onclick="">'
                            +'</td></tr>';
                            
                            $("#mentalIllnessLst").append(data);
                        }
                    }
    
                }
                    
                if(hasSomatic==0){
                    var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                    + '<input  class="form-control selectFullCorner" type="text" name="DiseasesName[]" >'
                    + '</td>'
                    +'<td class="col-md-2" style="border:hidden;">'
                    +'<input  class="form-control selectFullCorner" type="text" name="Diseasesfrom[]" >'
                    +'</td>'
                    +'<td class="col-md-3" style="border:hidden;">'
                    +'<input class="form-control selectFullCorner"  type="text" name="doctor1[]">'
                    +'</td><td class="col-md-4" style="border:hidden;">'
                    +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewDiseases();" name="treatment1[]">'
                    +'</td><td style="border:hidden;" onclick="">'
                    +'</td></tr>';
                    
                    $("#somaticDiseasesLst").append(data);
                }
                if(hasMental==0){
                    var data = '<tr><td class="col-md-3" style="border:hidden;">' 
                    + '<input  class="form-control selectFullCorner" type="text" name="mentalName[]" >'
                    + '</td>'
                    +'<td class="col-md-2" style="border:hidden;">'
                    +'<input  class="form-control selectFullCorner" type="text" name="mentalfrom[]" >'
                    +'</td>'
                    +'<td class="col-md-3" style="border:hidden;">'
                    +'<input class="form-control selectFullCorner"  type="text" name="doctor2[]">'
                    +'</td><td class="col-md-4" style="border:hidden;">'
                    +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewmental();" name="treatment2[]">'
                    +'</td><td style="border:hidden;" onclick="">'
                    +'</td></tr>';
                    
                    $("#mentalIllnessLst").append(data);
                }
                
                window.scrollTo(0, 0);
            },
        });
    }

    function getAreas(val,area_id){
        $("#area_data").empty();
        var val = val;
    
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
                $('#area_data').val(area_id);
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
    
    $('#setting_form').submit(function(e) {
            e.preventDefault();
            $(".loader").removeClass('hide');
            $('#saveBtn').addClass('hide');
            $('#editBtn').addClass('hide');          
           let formData = new FormData(this);
                $( "#Name" ).removeClass( "error" );
                $( "#NationalID" ).removeClass( "error" );
                $( "#Birthdate" ).removeClass( "error" );
                $( "#JoiningDate" ).removeClass( "error" );
                //$( "#DepartmentID" ).removeClass( "error" );
    
    
           $.ajax({
                type:'POST',
                url: "store_aged",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                $('.wtbl').DataTable().ajax.reload();
                $('#saveBtn').removeClass('hide');
                $('#editBtn').removeClass('hide');    
                if (response) {
                    $(".loader").addClass('hide');
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{trans('admin.data_added')}}',
                        showConfirmButton: false,
                        timer: 1500
    				})
    				// $('#somaticDiseasesLst').html('');
                    // $('#mentalIllnessLst').html('');
                    //manualy empty tabls content//////
                    // $('#msgRList2').html('');
                    // $('#msgRList3').html('');
                    //////////////////////////////////
                   this.reset();
                   resetFunction();
                 }
                //  $('#userProfileImg').attr('src', window.location.origin+'/assets/images/ico/user.png');
               },
               error: function(response){
               $(".loader").addClass('hide');
                $('#saveBtn').removeClass('hide');
                $('#editBtn').removeClass('hide');   
                //   console.log(response);
                if(response.responseJSON.errors.Name){
                    $( "#Name" ).addClass( "error" );
                }
                if(response.responseJSON.errors.NationalID){
                    $( "#NationalID" ).addClass( "error" );
                }
                if(response.responseJSON.errors.JoiningDate){
                    $( "#JoiningDate" ).addClass( "error" );
                }
                if(response.responseJSON.errors.Birthdate){
                    $( "#Birthdate" ).addClass( "error" );
                }
                // 
                if(response.responseJSON.errors.Name || response.responseJSON.errors.NationalID|| response.responseJSON.errors.JoiningDate|| response.responseJSON.errors.Birthdate){
                	Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: 'يرجى تعبئة الحقول الإجبارية',
        				showConfirmButton: false,
        				timer: 1500
        				})
                }else{
        			Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: '{{trans('admin.error_save')}}',
        				showConfirmButton: false,
        				timer: 1500
        				})
                }
               }
           });
      });
    
    
    
    function addNewRow(){
        var data = '<tr><td width="20px" style="border:hidden; color:#1D9CED;">' 
        + window.globalCounter 
        + '</td><td class="col-md-4" style="border:hidden;"><input  class="form-control selectFullCorner" type="text" name="name[]" ></td><td class="col-md-4" style="border:hidden;"><input class="form-control selectFullCorner"  type="text" name="phone[]"></td><td class="col-md-3" style="border:hidden;"><input  class="form-control selectFullCorner add" type="text" onfocus="addNewRow();" name="kinderedType[]"></td><td style="border:hidden;"> <i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i></td></tr>';
        $("#kindredlst").append(data);
        window.globalCounter++;
        
                // if(window.globalCounter>=7){
                //     $(".leftSide").removeAttr("style");
                // }
    }
    
    function addNewmental(){
        var data = '<tr><td class="col-md-3" style="border:hidden;">' 
        + '<input  class="form-control selectFullCorner" type="text" name="mentalName[]" >'
        + '</td>'
        +'<td class="col-md-2" style="border:hidden;">'
        +'<input  class="form-control selectFullCorner" type="text" name="mentalfrom[]" >'
        +'</td>'
        +'<td class="col-md-3" style="border:hidden;">'
        +'<input class="form-control selectFullCorner"  type="text" name="doctor2[]">'
        +'</td><td class="col-md-4" style="border:hidden;">'
        +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewmental();" name="treatment2[]">'
        +'</td><td style="border:hidden;" onclick="$(this).parent().remove()">'
        +'<i class="fa fa-trash" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
        +'</td></tr>';
        
        $("#mentalIllnessLst").append(data);
    }
    
    function addNewDiseases(){
        var data = '<tr><td class="col-md-3" style="border:hidden;">' 
        + '<input  class="form-control selectFullCorner" type="text" name="DiseasesName[]" >'
        + '</td>'
        +'<td class="col-md-2" style="border:hidden;">'
        +'<input  class="form-control selectFullCorner" type="text" name="Diseasesfrom[]" >'
        +'</td>'
        +'<td class="col-md-3" style="border:hidden;">'
        +'<input class="form-control selectFullCorner"  type="text" name="doctor1[]">'
        +'</td><td class="col-md-4" style="border:hidden;">'
        +'<input  class="form-control selectFullCorner add" type="text" onfocus="addNewDiseases();" name="treatment1[]">'
        +'</td><td style="border:hidden;" onclick="$(this).parent().remove()">'
        +'<i class="fa fa-trash" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
        +'</td></tr>';
        
        $("#somaticDiseasesLst").append(data);
    }
    
    $(document).ready(function () {

        $("#kindredlst").on("click", "#delete", function (ev) {
            var $currentTableRow = $(ev.currentTarget).parents('tr')[0];
            $currentTableRow.remove();
            //CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount');
            window.globalCounter--;

            $("#kindredlst").find('tr').each(function (index) {
                var firstTDDomEl = $(this).find('td')[0];
                var $firstTDJQObject = $(firstTDDomEl);
                $firstTDJQObject.text(index + 1);
            });
        });


    });

    function delete_aged($id) {
            if(confirm('هل انت متاكد من حذف المسن؟ لن يمكنك استرجاعه فيما بعد')){
            let aged_id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "aged_delete",
                
                data: {

                    aged_id: aged_id,
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

                        title: '{{ trans('admin.data_added') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

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

