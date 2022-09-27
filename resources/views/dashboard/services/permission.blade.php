@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')

    <style>
        /* The Modal (background) */
        .modal1 {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content1 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            /*   float: right; */
            font-size: 28px;
            font-weight: bold;
            margin-left: auto;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .rate:not(:checked)>label {
            font-size: 30px !important;
        }

        .rate {
            width: auto;
            position: relative;
            float: left;
            height: 40px;
            margin-top: -3px;
        }

        .Priority {
            padding: 0;
            position: relative;
            left: 0;
            line-height: 39px;
            float: left;
        }

        .fa-2x {
            font-size: 24px !important;
        }
        .form-check-input {
    position: relative;
    margin-right: 0;
}

    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="setting_form" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">

                <div class="col-sm-12 col-md-7">
                    <div class="card leftSide">
                        @include('dashboard.component.ticketHeader',['ticketInfo'=>$ticketInfo])
                        <div class="card-content collapse show">
                            
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="form-body">
                                    @include('dashboard.includes.wasel')
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="hidden" name="lastRec" id="lastRec" value="4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-label " style="color: #ff9149; font-weight:bold">نوع الإشتراك</label>
                                                    <div class="col-md-5">
                                                        <input type="radio" name="phase[]" checked="" id="radio-1" class="jui-radio-buttons"
                                                            value="1"
                                                            onclick="drawList();calcTotal();$('.phaseType').hide();$('#inAmper').val(32)">
                        
                                                        <label for="radio-1">1 فاز</label>
                                                        <input type="radio" name="phase[]" id="radio-2" class="jui-radio-buttons" value="2"
                                                            onclick="drawList();calcTotal();$('.3vas').show();$('#inAmper').val(32)">
                                                        <label for="radio-2">3 فاز</label>
                                                    </div>
                                                    <div class=" col-md-4" style="padding-left: 0px; padding-right: 10px;width:60px;">
                                                        <div class="float-left">
                                                            <input type="number" class="form-control numFeild" style="width:60px;"
                                                                name="inAmper" id="inAmper" value="32" placeholder="30 أمبير">
                                                        </div> &nbsp;
                                                        <label for="radio-1"> &nbsp; أمبير</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                                            <img src="https://db.expand.ps/images/counter35.png" style=" height: 32px">
                                                        </span>
                                                    </div>
                        
                                                    <select id="formDatacounterType" name="formDatacounterTypeList" class="form-control noleft">
                                                        <option value="0"> اختر نوع الإشتراك</option>
                                                        <option value="40">منزلي 1 فاز </option>
                                                        <option value="41">تجاري</option>
                                                        <option value="216">صناعي</option>
                                                        <option value="2121">زراعي</option>
                                                        <option value="2214">مؤقت</option>
                                                        <option value="2249">منزلي 3 فاز </option>
                                                        <option value="2253">تجاري 3 فاز</option>
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(11,'formDatacounterType','نوع الإشتراك')"
                                                        style="cursor:pointer;margin-left: 0px !important;">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                                    {{-- <div class="row hide">
                                        <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 240px;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text " id="basic-addon1">
                                                            رقم الوصل
                                                        </span>
                                                    </div>
                                                    <input type="text" id="ReciptNo" name="ReciptNo" class="form-control"
                                                        placeholder="0000000" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 161px !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text " id="basic-addon1">
                                                            المبلغ بالشيكل
                                                        </span>
                                                    </div>
                                                    <input type="text" id="AmountInNIS" name="AmountInNIS" class="form-control numFeild"
                                                        placeholder="000 NIS" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12 pr-s-12" style="">
                                            <div class="form-group">
                                                <div class="input-group w-s-87 mt-s-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            مقدم الطلب
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="SubscriberID" id="SubscriberID">
                                                    <input type="hidden" name="SubscriberType" id="SubscriberType">
                                                    <input type="hidden" name="SubscriberFullName" id="SubscriberFullName">
                                                    <input type="hidden" name="d_lat" id="d_lat">
                                                    <input type="hidden" name="d_lng" id="d_lng">
                                                    <input type="text" id="formDataNameAR" required=""
                                                        class="form-control alphaFeild ac ui-autocomplete-input" placeholder="مقدم الطلب"
                                                        name="formDataNameAR" autocomplete="off">
                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-group" style="width: 240px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text1" id="basic-addon1">
                                                        <img id="mobImg" src="https://db.expand.ps/images/jawwal35.png">
                                                    </span>
                                                </div>
                                                <input type="text" id="PHnum1" required="" name="PHnum1" maxlength="10"
                                                    class="form-control noleft numFeild" placeholder="059000000"
                                                    aria-describedby="basic-addon1">
                        
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group licNoGroup" style="width:82.5% !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            رقم الرخصة
                                                        </span>
                                                    </div>
                                                    <input type="text" id="LicenceNo" class="form-control" required=""
                                                        placeholder="رقم الرخصة" name="LicenceNo" style="height: 35px;">
                                                    <input type="hidden" id="licNo" name="licNo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                        
                        
                        
                        
                                </div>
                                <div class="row business_container">
                        
                                    <div class="input-group mb-2 col-lg-6 col-md-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> موقع الطلب </span>
                                        </div>
                                        <div class="form-check-inline form-control">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="خارج الحدود" name="BusinessName"
                                                    id="bn1">خارج الحدود
                                            </label>
                                        </div>
                                        <div class="form-check-inline form-control">
                                            <label class="form-check-label">
                                                <input type="checkbox" checked="" class="form-check-input" value="داخل الحدود"
                                                    name="BusinessName" id="bn2">داخل الحدود
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text " id="basic-addon1">
                                                        رقم الحوض
                                                    </span>
                                                </div>
                                                <input type="text" required="" id="BasinNo" name="BasinNo" value="" class="form-control"
                                                    placeholder="  " aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text " id="basic-addon1">
                                                    رقم القطعة
                                                </span>
                                            </div>
                                            <input type="text" id="PieceNo" name="PieceNo" value="" class="form-control " placeholder="  "
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                        
                        
                                </div>
                        
                        
                                <div class="row">
                                    <!--<div class="col-md-11">
                                            <div class="form-group">
                                                <div class="input-group" style="width:99% !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        عنوان الاشتراك
                                                        </span>
                                                    </div>
                                                    <textarea type="text" id="AddressDetailsAR" required class="form-control" placeholder="العنوان بالتفصيل" name="AddressDetailsAR" style="height: 35px;"></textarea>
                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a id="googlelonglink"  href="https://www.google.com/maps?q=32.160959,35.3342497" target="_blank">
                                                <img src="https://y.expand.ps/images/google35.png" style="    max-height: 32px !important;"></a>
                                        </div> -->
                                    <div class="input-group mb-2 col-sm-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> وضعية البناء </span>
                                        </div>
                                        <div class="form-check-inline form-control">
                                            <label class="form-check-label">
                                                <input type="checkbox" checked="" id="tb1" name="typebuild" value=" بناء مقترح "
                                                    class="form-check-input">بناء مقترح
                        
                                            </label>
                                        </div>
                                        <div class="form-check-inline form-control">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="tb2" name="typebuild" value=" بناء قائم "
                                                    class="form-check-input">بناء قائم
                                            </label>
                                        </div>
                                        <div class="form-check-inline form-control">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="tb3" name="typebuild" value=" فوق بناء قائم"
                                                    class="form-check-input">فوق بناء قائم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="form">
                                    </div>
                                    <table class="table table-bordered mb-3 st" style="text-align:center">
                                        <thead>
                                            <tr>
                                                <th> أ </th>
                                                <th> ب </th>
                                                <th> ج </th>
                                                <th> تجارية </th>
                                                <th> زراعية </th>
                                                <th> صناعية </th>
                                                <th> قديمة </th>
                                                <th> اخرى </th>
                                                <th> ملاحظات </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                        
                                                <td><input checked="" name="typestate" id="typestate1" type="checkbox" class="form-check-input"
                                                        value="أ"></td>
                                                <td><input name="typestate" id="typestate2" type="checkbox" class="form-check-input" value="ب">
                                                </td>
                                                <td><input name="typestate" id="typestate3" type="checkbox" class="form-check-input" value="ج">
                                                </td>
                                                <td><input checked="" name="typebuildingt" id="typebuildingt1" type="checkbox"
                                                        class="form-check-input" value="تجارية"></td>
                                                <td><input name="typebuildingt" id="typebuildingt2" type="checkbox" class="form-check-input"
                                                        value="زراعية"></td>
                                                <td><input name="typebuildingt" id="typebuildingt3" type="checkbox" class="form-check-input"
                                                        value="صناعية"></td>
                                                <td><input name="typebuildingt" id="typebuildingt4" type="checkbox" class="form-check-input"
                                                        value="قديمة"></td>
                                                <input type="hidden" id="typebuilding" value="تجارية" name="typebuilding">
                                                <td style="max-width:50px;background-color:#fff;"><input type="text" name="typebuilding34"
                                                        id="typebuilding34" class="form-control" placeholder=" اخرى  "></td>
                                                <td style="max-width:300px"><input type="text" class="form-control" value="" name="buildnote"
                                                        id="buildnote" placeholder=" ملاحظات "></td>
                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="form">
                                        <div class="input-group">
                                            <label class="form-label" style="color: #ff9149; font-weight:bold">مشتملات العقار </label>
                                            <div class="col-sm-12 col-md-10">
                                                <input onchange="if($(this).prop('checked'))$('.rent2').hide()" type="radio" name="typeship"
                                                    value="العقار منفصل" checked="" id="radio-3" class="jui-radio-buttons">
                                                <label for="radio-3">العقار منفصل </label>
                                                <input onchange="if($(this).prop('checked'))$('.rent2').show()" type="radio" name="typeship"
                                                    value="العقار ضمن عمارة" id="radio-4" class="jui-radio-buttons">
                                                <label for="radio-4">العقار ضمن عمارة </label>
                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row rent2 hide">
                                    <table class="table table-bordered mb-3 st" style="text-align:center">
                                        <thead>
                                            <tr>
                                                <th> الرقم </th>
                                                <th> الوصف </th>
                                                <th> شقة </th>
                                                <th> مخزن </th>
                                                <th> مكتب </th>
                                                <th> طابق </th>
                                                <th> مطلع درج </th>
                                                <th> مصعد </th>
                                                <th> ملاحظات </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                        
                                                <td> 1. </td>
                                                <td> قائم </td>
                                                <td><input name="appart1" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="typeStore1" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="office1" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="floor1" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="stairs1" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="elev1" type="checkbox" class="form-check-input" value=""></td>
                                                <td style="max-width:60px"><input type="text" name="notes1" class="form-control"
                                                        placeholder=" ملاحظات "></td>
                        
                                            </tr>
                                            <tr>
                        
                                                <td> 2. </td>
                                                <td> مرخص غير قائم </td>
                                                <td><input name="appart2" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="typeStore2" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="office2" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="floor2" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="stairs2" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="elev2" type="checkbox" class="form-check-input" value=""></td>
                                                <td style="max-width:300px"><input type="text" name="notes2" class="form-control"
                                                        placeholder=" ملاحظات "></td>
                        
                                            </tr>
                                            <tr>
                        
                                                <td> 3. </td>
                                                <td> مستقبلي (غير مرخص) </td>
                                                <td><input name="appart3" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="typeStore3" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="office3" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="floor3" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="stairs3" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="elev3" type="checkbox" class="form-check-input" value=""></td>
                                                <td style="max-width:300px"><input type="text" name="notes3" class="form-control"
                                                        placeholder=" ملاحظات "></td>
                        
                                            </tr>
                                            <tr style="display:none">
                        
                                                <td> 4. </td>
                                                <td> المجموع </td>
                                                <td><input name="appart4" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="typeStore4" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="office4" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="floor4" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="stairs4" type="checkbox" class="form-check-input" value=""></td>
                                                <td><input name="elev4" type="checkbox" class="form-check-input" value=""></td>
                                                <td style="max-width:300px"><input type="text" name="notes4" class="form-control"
                                                        placeholder=" ملاحظات "></td>
                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--<div class="row">
                                        <div class="col-md-12 pr-s-12" style="">
                                            <div class="form-group">
                                                <div class="input-group w-s-87 mt-s-6">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                      ملاحظات قسم التنظيم
                                                    </span>
                                                    </div>
                        
                                                    <input type="text" id=""  required class="form-control" placeholder=" الملاحظات " name="">
                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                <div class="row ownertypes rent1 hide" style="display:none">
                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group" style="width:99% !important;">
                                                <input type="checkbox" class="hide" id="NoObjection" name="NoObjection">
                                                No- objection of the owner <span style="color:#ff0000">*</span> <span><i
                                                        class="fas fa-paperclip"
                                                        onclick="document.getElementById('Attach1').click();$('#fileName').val('attach1');return false"></i></span>
                                                <input type="file" id="Attach1" name="attach1" class="hide"
                                                    onchange="doUploadPic1('formData','attach1Img','attach1Path')">
                                                <img src="" id="attach1Img" style="width:30%">
                                                <input type="text" class="hide" id="attach1Path" name="attach1Path">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group licNoGroup222" style="width:99% !important;">
                        
                                                <input type="checkbox" class="hide" id="RentContract" name="RentContract">
                                                RentContract<span style="color:#ff0000">*</span><span><i class="fas fa-paperclip"
                                                        onclick="document.getElementById('Attach2').click(); $('#fileName').val('attach2');return false"></i></span>
                                                <input type="file" id="Attach2" name="attach2" class="hide"
                                                    onchange="doUploadPic1('formData','attach2Img','attach2Path')">
                                                <img src="" id="attach2Img" style="width:30%">
                                                <input type="text" class="hide" id="attach2Path" name="attach2Path">
                                                <input type="text" class="hide" id="fileName" name="fileName">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                        
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="form-label" style="color: #ff9149; font-weight:bold">نوع الملكية</label>
                                                <div class="col-sm-12 col-md-8">
                                                    <label for="radio-3">ملك </label>
                                                    <input onchange="if($(this).prop('checked'))$('.attach-required').hide()" type="radio"
                                                        name="Ownership[]" checked="" id="radio-3" class="jui-radio-buttons" value="1"
                                                        onclick="$('.ownertypes').hide();$('.owner').show();">
                                                    <label for="radio-4">إيجار </label>
                                                    <input onchange="if($(this).prop('checked'))$('.attach-required').show()" type="radio"
                                                        name="Ownership[]" id="radio-4" class="jui-radio-buttons" value="2"
                                                        onclick="$('.ownertypes').hide();$('.rent').show();">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row">
                        
                                    <div class="col-md-5 ownertypes rent" style="display:none">
                                        <div class="form-group">
                                            <div class="input-group" style="width:99% !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        اسم المالك
                                                    </span>
                                                </div>
                                                <input type="text" id="OwnerName" class="form-control ac10 ui-autocomplete-input"
                                                    placeholder="اسم المالك" name="OwnerName" style="height: 35px;" autocomplete="off">
                                                <input type="hidden" id="SubscriberID1" name="SubscriberID1">
                        
                                            </div>
                                        </div>
                                    </div>
                        
                        
                                    <!--<div class="row attachs-body">
                                        <div class="form-group col-12 mb-2">
                                            <ol class="vasType 1vas">
                        
                                            </ol>
                                            <ul class=" ">
                                                <li style="font-size: 17px !important;color:#000000">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <div class="col-sm-9">
                                                    المجموع
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="number" name="total" class="form-control" value="1800">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <input type="file" class="form-control-file" id="imgPic" name="imgPic" style="display: none" onchange="doUploadPic()">
                                            <input type="hidden" name="fromname" value="formData">
                                            <input type="file" class="form-control-file" id="formDataupload-file[]" multiple="" name="formDataUploadFile[]" onchange="doUploadAttach('formData')" style="display: none">
                                            <input type="file" class="form-control-file" id="formDataupload-image[]" multiple="" name="formDataUploadImage[]" onchange="doUploadAttach('formData')" accept="image/*" style="display: none">
                                            <div class="row formDataImagesArea">
                                            </div>
                                            <div class="row formDataFilesArea" style="margin-left: 0px;">
                                            </div>
                                            <div class="row formDataLinkArea" style="margin-left: 0px;">
                                            </div>
                                        </div>
                                    </div> -->
                        
                                </div>
                        
                            </div>
                            {{-- <div class="row">
                        
                                <div class="col-md attachs-section">
                                    <img src="https://y.expand.ps/images/upload.png" width="40" height="40">
                                    <span class="attach-header">المرفقات
                                        <span id="attach-required" class="attach-required">*</span>
                                        <span class="attach-icons">
                                            <a href="#" onclick="document.getElementById('formDataupload-file[]').click(); return false"
                                                class="attach-icon"><i class="fas fa-paperclip"></i></a>
                                            <a href="#" onclick="document.getElementById('formDataupload-image[]').click(); return false"
                                                class="attach-icon"><i class="far fa-image"></i></a>
                                            <a onclick="showLinkModal('formData')" class="attach-icon"><i class="fas fa-link"></i></a>
                                        </span>
                                    </span>
                                    <span class="attach-required" style="display: none">
                                        الرجاء إرفاق عقد الإيجار أو عدم ممانعة المالك
                                    </span>
                                </div>
                            </div> --}}
                        </div>
                        

                        @include('dashboard.includes.costs')
                        @include('dashboard.includes.attachment')

                    </div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="card rightSide" style="min-height:677px">
                        <div class="card-header">
                            <h4 class="card-title" style="padding-bottom: 10px;">
                                <img src="{{ asset('assets/images/ico/forwerd.png') }}" height="25px">
                                {{ 'تحويل الى' }}
                            </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body" style="padding-bottom: 0px !important">
                
                                <div class="row mobRow">
                                    <div class="col-lg-6 col-md-5 pr-s-12">
                                        <div class="form-group">
                                            <div class="input-group w-s-87 mt-s-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">اختر القسم</span>
                                                </div>
                                                <select type="text" id="AssDeptID" name="AssDeptID"
                                                    class="form-control myselect2" aria-invalid="false"
                                                    onchange="ShowDeptEmp()">
                                                    <option disabled="" selected=""> -- اختيار القسم -- </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="col-lg-6 col-md-6 pr-s-12" style="padding-bottom: 0px">
                                        <div class="form-group">
                                            <div class="input-group w-s-87 mt-s-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">اختر الموظف</span>
                                                </div>
                                                <select type="text" id="Assigned2ID" name="AssignedToID"
                                                    class="form-control myselect2" aria-invalid="false">
                                                    <option disabled="" selected=""> -- اختيار الموظف -- </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="row hideMob " style="margin-top: 1.2%;">
                                    <div class="form-group col-md-3 mb-2"> </div>
                                    <div id="static24Clock" style="display:block;"
                                        class="form-group image-responsive col-md-6 mb-2">
                                        <img src="https://db.expand.ps/images/24-hours-active-1-766936.png"
                                            style="margin-right:25%" alt="24 hours">
                
                                        <input
                                            style="border:0px solid #fff;position: relative;bottom: -43px;width: 59px;right: -34px;text-align: right;font-size: 32px !important;color: #347ABD;padding: 0px;font-weight: bold;"
                                            placeholder="00" id="restHrs" name="restHrs" onchange="changeHrs()">
                                    </div>
                
                                </div>
                
                                <div class="row hideMob" >
                                    <div class="form-group col-md-3 mb-2"></div>
                                    <div class="form-group col-md-6 mb-2 text-center" style="margin-bottom: 0px !important;">
                                        <div style="display: inline-block;">
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate" value="5">
                                                <label for="star5" title="5">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4">
                                                <label for="star4" title="4">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3">
                                                <label for="star3" title="3">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2">
                                                <label for="star2" title="2">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1">
                                                <label for="star1" title="1">1 star</label>
                                            </div>
                                            <span class="Priority">الأهمية:</span>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="row hideMob" style="margin-right: -30px;">
                
                                    <div class="form-group col-md-8 offset-md-3 mb-2 text-center1" style="margin-bottom: 0px !important">
                                        <span style="margin: 3px;color:#1e9ff2">&nbsp;</span>
                                        <span title="Tag Employee" style="margin: 3px; color:#1e9ff2">
                                            <a>
                                                <img src="{{asset('assets/images/add-user.png')}}" onclick="showtag();" style="margin-bottom: 13px; width: 26px;height: 26px;" />
                                            </a></span>
                                        <span title="Force an image" style="margin-right: 3px;color:#1e9ff2"
                                            onclick="ChangeState1($(this))">
                                            <input type="hidden" name="enablePhoto" value="0" id="enablePhoto">
                                            <img src="https://db.expand.ps/images/c1.png" id="enablePhotoImg"
                                                style=" margin-bottom: 13px;">
                                        </span>
                                        <span style="color:#1e9ff2">&nbsp;</span>
                                        <span title="Recive Notification" style="margin: 3px;color:#1e9ff2"
                                            onclick="ChangeState($(this))">
                                            <input type="hidden" id="hasNotify" name="hasNotify" value="0">
                                            <i class="fa fa-bell fa-2x"></i>
                                        </span>
                                        <span title="Select vehicle" style="margin-left: 3px; color:#1e9ff2">
                                            <a alt="Choose Your Vehicle" title="Choose Your Vehicle">
                                                <img src="{{asset('assets/images/car.png')}}"  style="margin-bottom: 8px; width: 30px;height: 30px;" />
                
                                            </a>
                                        </span>
                                        <span title="Pick tools" style="     margin: 3px;color:#1e9ff2">
                                            <a onclick="showCart();">
                                                <i class="fa fa-shopping-cart fa-2x"></i></a>
                                        </span>
                
                                        <span title="Returned tools after" style="margin: 3px;color:#1e9ff2">
                                            <a onclick="showReturn();">
                                                <img style="    height: 34px;     margin-bottom: 13px; width: 34px;"
                                                    src="https://db.expand.ps/images/icon/icons8-return-48.png">
                                            </a> </span>
                
                                    </div>
                
                
                
                                </div>
                
                                <div class="row hideMob tag_id" id="tag_id"
                                    style="display: none; margin-right: 10px; margin-left: 5px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group" style="width:99% !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-grojkup-text" id="basic-addon1">
                                                        نسخة إلى
                                                    </span>
                                                </div>
                                                <select id="tags" name="tags[]"
                                                    class="select2 form-control select2-hidden-accessible" multiple=""
                                                    data-toggle="select" style="width:100%;height: 35px;"
                                                    data-select2-id="select2-data-tags" tabindex="-1" aria-hidden="true">
                                                    <option value="6">{{ 'Expand' }}</option>
                                                    <option value="7">{{ 'منتصر ياسين' }}</option>
                                                    <option value="8">{{ 'صفاء ياسين' }}</option>
                                                    <option value="9">{{ 'عبد الله شريف' }}</option>
                                                    <option value="10">{{ 'شروق صالح' }} </option>
                                                </select>
                                                {{-- <span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-2-spte"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--multiple"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="-1" aria-disabled="false">
                                                            <ul class="select2-selection__rendered"
                                                                id="select2-tags-container"></ul><span
                                                                class="select2-search select2-search--inline"><textarea
                                                                    class="select2-search__field" type="search"
                                                                    tabindex="0" autocorrect="off" autocapitalize="none"
                                                                    spellcheck="false" role="searchbox"
                                                                    aria-autocomplete="list" autocomplete="off"
                                                                    aria-label="Search"
                                                                    aria-describedby="select2-tags-container" placeholder=""
                                                                    style="width: 0.75em;"></textarea></span>
                                                        </span></span><span class="dropdown-wrapper"
                                                        aria-hidden="true"></span></span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mobRow">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{ 'ملاحظات' }}
                                                    </span>
                                                </div>
                                                <textarea type="text" id="note" class="form-control"
                                                    placeholder="أدخل ملاحظاتك" name="note"
                                                    style="height: 35px;"></textarea>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                            </div>
                            <div class="form-actions" style="border-top:0px; padding-bottom:0px; padding-top: 0px;">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="saveBtn">
                                        <i class="la la-check-square-o"></i>{{ 'ارسال' }}</button>
                                        <a class="btn btn-warning la la-check-square-o" href="{{ route('receive') }}"
                                        onclick="resetFunction();">{{ 'إرسال وطباعة' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>




        </form>
    </section>

    {{-- @include('dashboard.component.fetch_table'); --}}
    @include('dashboard.component.ticket_config',['ticketInfo'=>$ticketInfo,'department'=>$department])

@stop
@section('script')


    {{-- <script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"
        type="text/javascript"></script> --}}
    {{-- <script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript">

    </script> --}}
    <script>
 function ShowConfigModal(bindTo) {

// $("#CitizenName").html($("#formDataNameAR").val())

$("#AppModal").modal('show')

}

var tag_idDisplayed = false;

    function showtag() {
        if (tag_idDisplayed == false) {
            $('.tag_id').show();
            tag_idDisplayed = true;
        } else {
            $('.tag_id').hide();
            tag_idDisplayed = false;
        }
    }
    </script>

@endsection
