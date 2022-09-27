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
        .input-group {
            width: 100% !important;
        }
    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="ticketFrm" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">

                <div class="col-sm-12 col-lg-6 col-md-12">
                            <div class="card">
                                @include('dashboard.component.ticketHeader',['ticketInfo'=>$ticketInfo])
                                <div class="card-content collapse show" >
                                    <div class="card-body" style="padding-bottom: 0px;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-12 pr-s-12" style="">
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87 mt-s-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                  اسم مقدم الطلب
                                                                </span>
                                                            </div>
                                                            <input required type="text" id="subscriber_name" class="form-control alphaFeild ccac" 
                                                            value="" name="subscriber_name" 
                                                              aria-required="true" aria-invalid="false">
                                                            <input type="hidden" id="app_type"  name="app_type" value="4">
                                                            <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                                            <input type="hidden" id="app_no"  name="app_no" value="{{$app_no}}">
                                                            <input type="hidden" id="portal_id"  name="portal_id" 
                                                            @if(isset($ticket)) 
                                                                value="{{$ticket->id}}"
                                                            @else 
                                                                value="0"
                                                            @endif>
                                                            <input type="hidden" id="subscriber_id" name="subscriber_id" value="0" >
                                                            <input type="hidden" name="subscriptionID" id="subscriptionID">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                      رقم الهوية
                                                    </span>
                                                        </div>
                                                        <input required type="text" id="national_id" maxlength="9" minlength="9" class="form-control" value="" name="national_id"   aria-required="true" aria-invalid="false">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-lg-7 col-md-5 pr-s-12">
                                                        <div class="form-group">
                                                            <div class="input-group w-s-87 mt-s-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">اختر القسم</span>
                                                                </div>
                                                                <select type="text" id="AssDeptID" name="AssDeptID"
                                                                    class="form-control myselect2" aria-invalid="false"
                                                                    onchange="ShowDeptEmp()">
                                                                    <option disabled="" selected=""> -- اختيار القسم -- </option>
                                                                    @foreach ($department as $dept)
                                                                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-6 pr-s-12">
                                                        <div class="form-group">
                                                            <div class="input-group w-s-87 mt-s-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">اختر الموظف</span>
                                                                </div>
                                                                @if($ticketInfo->emp_to_receive>0 && $ticketInfo->single_receive==2)
                                                                    @foreach ($employees as $emp)
                                                                    @if($ticketInfo->emp_to_receive== $emp->id )
                                                                    <input class="form-control" readonly value="{{$emp->nick_name}}">
                                                                    <input class="form-control" type="hidden" id="Assigned2ID" dept="{{$emp->department_id}}" name="AssignedToID" value="{{$emp->id}}">
                                                                    @endif
                                                                    @endforeach
                                                                @else
                                                                <select type="text" id="Assigned2ID" name="AssignedToID"
                                                                    class="form-control myselect2" aria-invalid="false" >
                                                                    <option disabled="" selected=""> -- اختيار الموظف -- </option>
                                                                    @foreach ($employees as $emp)
                                                                    <option class="allDept hide dept{{$emp->department_id}}" value="{{$emp->id}}" dept="{{$emp->department_id}}" {{($ticketInfo->emp_to_receive==$emp->id?"selected":"")}}>{{$emp->nick_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header hide">
                                    <h4 class="card-title">تفاصيل التعهد</h4>
                                    <!-- <a class="heading-elements-toggle">
                                        <i class="ft-align-justify font-medium-3"></i></a> -->

                                </div>
                                
                                <div class="card-header">
                                    <h4 class="card-title"> 
                                        مركز خدمات الجمهور
                                    </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              توقيع قسم الكمبيوتر	
                                                            </span>
                                                        </div>
                                                        <input  type="text" id="input1" class="form-control" name="input1"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              ديون الكهرباء	
                                                            </span>
                                                        </div>
                                                        <input  type="text" id="input2" class="form-control" name="input2"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              ديون المياه	
                                                            </span>
                                                        </div>
                                                        <input  type="text" id="input3" class="form-control" name="input3"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              ديون الحرف و الصناعات	
                                                            </span>
                                                        </div>
                                                        <input  type="text" id="input4" class="form-control" name="input4"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              شهادة بلدية	
                                                            </span>
                                                        </div>
                                                        <input  type="text" id="input5" class="form-control" name="input5"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              خدمات الجمهور	
                                                            </span>
                                                        </div>
                                                        <input  type="text" id="input6" class="form-control" name="input6"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              توقيع المدير المالي 	
                                                            </span>
                                                        </div>
                                                        <input   type="text" id="input14" class="form-control" name="input14"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-header">
                                    <h4 class="card-title"> 
                                        قسم الهندسة
                                    </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              الاسم
                                                            </span>
                                                        </div>
                                                        <input  type="text" id="input7" class="form-control" name="input7"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              نوع المعاملة	
                                                            </span>
                                                        </div>
                                                        <select  type="text" id="input8" class="form-control" name="input8"   onchange="copyToPrint(this)">
                                                            <option value=""> -- اختر --</option>
                                                            <option value="يتصرف">يتصرف</option>
                                                            <option value="يملك">يملك</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              رقم القطعة	
                                                            </span>
                                                        </div>
                                                        <input   type="text" id="input9" class="form-control" name="input9"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              رقم الحوض	
                                                            </span>
                                                        </div>
                                                        <input   type="text" id="input10" class="form-control" name="input10"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              رقم الموقع	
                                                            </span>
                                                        </div>
                                                        <input   type="text" id="input11" class="form-control" name="input11"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              توقيع قسم الهندسة	
                                                            </span>
                                                        </div>
                                                        <input   type="text" id="input12" class="form-control" name="input12"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87 mt-s-6">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                              خدمات الجمهور	
                                                            </span>
                                                        </div>
                                                        <input   type="text" id="input13" class="form-control" name="input13"   onkeyup="copyToPrint(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 col-md-12">
                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">براءة ذمة داخلية</h4>
                                    <!-- <a class="heading-elements-toggle">
                                        <i class="ft-align-justify font-medium-3"></i></a> -->

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div id="forPrint">
                                            <table width="100%"  style="color: black; font: 12px;direction:rtl">
                                                <tr style=" height: 60px !important; background-color: #FFFFFF;">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td width="34%" align="center" colspan="3">
                                                        <h3 id="benefitside" style="font-family: Helvetica,Arial, sans-serif !important;">مركز خدمات الجمهور</h3>
                                                        <h2><u style="display: inline; font-family: Helvetica,Arial, sans-serif !important;">
                                                            نموذج براءة ذمة داخلية
                                                        </u></h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">
                                                            <h2 style="display: inline; font-family: Helvetica,Arial, sans-serif !important;">
                                                                مركز خدمات الجمهور
                                                            </h2>
                                                    </td>
                                                </tr>
                                                <tr class="blank_row">
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="direction: rtl;" id="fullBody" padding="5px">
                                                        <table style="width:100%; border:1px solid #000000">
                                                            <tr>
                                                                <th align="center" style="background-color: white;width:25%; border:1px solid #000000; padding:5px; text-align:center;">
                                                                    الاسم
                                                                </th>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    <b id="citizenName"></b>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    توقيع قسم الكمبيوتر
                                                                </th>
                                                                <td align="right"  style="border:1px solid #000000; padding:5px;" id="lbl1">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    ديون الكهرباء
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    ديون المياه
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl3">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;background-color: white;border:1px solid #000000; padding:5px;">
                                                                    ديون الحرف و الصناعات
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl4">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    شهادة بلدية
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl5">
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    خدمات الجمهور
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl6">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    توقيع المدير المالي 
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl14">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">
                                                            <h2 style="display: inline; font-family: Helvetica,Arial, sans-serif !important;" >
                                                                قسم الهندسة
                                                            </h2>
                                                    </td>
                                                </tr>
                                                <tr class="blank_row">
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="direction: rtl;" id="fullBody" padding="5px">
                                                        <table style="width:100%; border:1px solid #000000">
                                                            <tr>
                                                                <th align="center" style="background-color: white;width:25%; border:1px solid #000000; padding:5px; text-align:center;">
                                                                    الاسم
                                                                </th>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;" id="lbl7">
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    رقم القطعة      
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl9">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    رقم الحوض
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl10">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    الموقع
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl11">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;background-color: white;border:1px solid #000000; padding:5px;">
                                                                    نوع المعاملة
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl8">
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    توقيع قسم الهندسة
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl12">
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                                                    خدمات الجمهور
                                                                </th>
                                                                <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl13">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr class="blank_row">
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr class="blank_row" style=" height: 20px !important; background-color: #FFFFFF;">
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr class="blank_row" style=" height: 20px !important; background-color: #FFFFFF;">
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 33%"></td>
                                                    <td style="width: 33%">
                                                    </td>
                                                    <td style="width: 33%; text-align:center">
                                                        مدير خدمات الجمهور
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>


                                        <div class="form-actions" style="border-top:0px; padding-bottom:0px; padding-top: 0px; margin-top: 0px;">
                                            <div class="text-right btnArea">
                                                <button type="submit" class="btn btn-primary" id="saveBtn">
                                                    <i class="la la-check-square-o"></i>{{ 'ارسال' }}</button>
                                                    <a class="btn btn-warning la la-check-square-o hidemob" id="saveBtnSend" style="color: #fff;"
                                                    onclick="printFunction();">{{ 'إرسال وطباعة' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            </div>




        </form>
    </section>

    
    @include('dashboard.component.ticket_config',['ticketInfo'=>$ticketInfo,'department'=>$department])
    @include('dashboard.component.tasks_table')
    @include('dashboard.component.fetch_Task_table')
<script>

    function copyToPrint(ctrl)
    {
        for(i=0;i<=14;i++)
        $("#lbl"+i).html($('#input'+i).val())
        
    }

$(document).ready(function () {

    $( "#subscriber_name" ).autocomplete({
		source:'subscribe_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#subscriber_id").val(ui.item.id)
            getFullData(ui.item.id)
            if( {{$ticketInfo->apps_btn}}==1)
                getSubscriberTasks(ui.item.id)
		}
	});
	
    

    $('#ticketFrm').submit(function(e) {
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
       e.preventDefault();
        $( "#subscriber_name" ).removeClass( "error" );
        $( "#subscriber_id" ).removeClass( "error" );
        $( "#MobileNo" ).removeClass( "error" );
        $( "#AreaID" ).removeClass( "error" );

       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: "saveTicket36",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
               $(".form-actions").removeClass('hide');
            // $('.wtbl').DataTable().ajax.reload();  
            // console.log('response');
             if (response.success!=null) {
                $(".loader").addClass('hide');
			    Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
				
				writeUserData('viewTicket/'+response.app_id+'/'+response.app_type)
                if(print==true){
                let url=`{{ route('admin.dashboard') }}/printTicket/${response.app_id}/${response.app_type}`
                window.open(url, '_blank');
                print=false;
				}
				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
               this.reset();
				
    //         if(print==true){
    //             self.location=`{{ route('admin.dashboard') }}/printTicket/${response.app_id}/${response.app_type}`
    //             print=false;
				// }
    //             writeUserData('viewTicket/'+response.app_id+'/'+response.app_type)
    //     				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
    //           this.reset();
             }else{
                 console.log(response.error);
                 if(response.error=='no_nationalID'){
                     
                    $("#national_id").addClass('error');
                    Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: 'أدخل رقم الهوية',
    				showConfirmButton: true,
    				timer: 2000
    				})
                    $(".loader").addClass('hide');
    				return false;
                 }
                 if(response.error=='no_attatch'){
                     
                     $(".attachName").addClass('error');
                     Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: 'أدخل المرفقات',
    				showConfirmButton: true,
    				timer: 2000
    				})
                    $(".loader").addClass('hide');
    				return false;
                 }
                 $(".loader").addClass('hide');

    			Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: '{{trans('admin.error_save')}}',
    				showConfirmButton: false,
    				timer: 1500
    				})
                 }
             //location.reload();

           },
            error: function(response){
            $(".loader").addClass('hide');
            $(".form-actions").removeClass('hide');
			if(response.responseJSON.errors.subscriber_name){
                $( "#subscriber_name" ).addClass( "error" );
                $( "#subscriber_name" ).get(0).setCustomValidity('أدخل اسم معرف مسبقا ');
                $( "#subscriber_name" ).on('input',function(){
                    this.setCustomValidity('')
                })
            }
            if(response.responseJSON.errors.subscriber_id){
                $( "#subscriber_name" ).addClass( "error" );
                $( "#subscriber_name" ).get(0).setCustomValidity('أدخل اسم معرف مسبقا ');
                $( "#subscriber_name" ).on('input',function(){
                    this.setCustomValidity('')
                })
            }
            if(response.responseJSON.errors.AreaID){
                $( "#AreaID" ).addClass( "error" );
                $( "#AreaID" ).get(0).setCustomValidity('يرجى اختيار المنطقة ');
                $( "#AreaID" ).on('blur',function(){
                    this.setCustomValidity('')
                })
            }
			Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: 'يرجى تعبئة الحقول الاجبارية',
				showConfirmButton: false,
				timer: 1500
				})
           }
       });
  });
});

    function PrintForm(customer_name,national_id,input1,
input2,
input3,
input4,
input5,
input6,
input7,
input8,
input9,
input10,
input11,
input12,
input13,
input14,){
        // console.log($ticket)
        
        var print=`<div id="forPrint">
                    <table width="100%"  style="color: black; font: 12px;direction:rtl">
                        <tr style=" height: 50px !important; background-color: #FFFFFF;">
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="34%" align="center" colspan="3">
                                <h3 id="benefitside" style="font-family: Helvetica,Arial, sans-serif !important;">مركز خدمات الجمهور</h3>
                                <h2><u style="display: inline; font-family: Helvetica,Arial, sans-serif !important;">
                                    نموذج براءة ذمة داخلية
                                </u></h2>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                    <h2 style="display: inline; font-family: Helvetica,Arial, sans-serif !important;">
                                        مركز خدمات الجمهور
                                    </h2>
                            </td>
                        </tr>
                        <tr class="blank_row">
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center" style="direction: rtl;" id="fullBody" padding="5px">
                                <table style="width:100%; border:1px solid #000000">
                                    <tr>
                                        <th align="center" style="background-color: white;width:25%; border:1px solid #000000; padding:5px; text-align:center;">
                                            الاسم
                                        </th>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            <b id="citizenName">${customer_name}</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            توقيع قسم الكمبيوتر
                                        </th>
                                        <td align="right"  style="border:1px solid #000000; padding:5px;" id="lbl1">
                                            ${input1}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            ديون الكهرباء
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl2">
                                            ${input2}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            ديون المياه
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl3">
                                            ${input3}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;background-color: white;border:1px solid #000000; padding:5px;">
                                            ديون الحرف و الصناعات
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl4">
                                            ${input4}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            شهادة بلدية
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl5">
                                            ${input5}
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            خدمات الجمهور
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl6">
                                            ${input6}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            توقيع المدير المالي 
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl14">
                                            ${input14}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                    <h2 style="display: inline; font-family: Helvetica,Arial, sans-serif !important;" >
                                        قسم الهندسة
                                    </h2>
                            </td>
                        </tr>
                        <tr class="blank_row">
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center" style="direction: rtl;" id="fullBody" padding="5px">
                                <table style="width:100%; border:1px solid #000000">
                                    <tr>
                                        <th align="center" style="background-color: white;width:25%; border:1px solid #000000; padding:5px; text-align:center;">
                                            الاسم
                                        </th>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;" id="lbl7">
                                            ${input7}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            رقم القطعة      
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl9">
                                            ${input9}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            رقم الحوض
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl10">
                                            ${input10}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            الموقع
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl11">
                                            ${input11}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;background-color: white;border:1px solid #000000; padding:5px;">
                                            نوع المعاملة
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl8">
                                            ${input8}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            توقيع قسم الهندسة
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl12">
                                            ${input12}
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th align="right" style="background-color: white;border:1px solid #000000; padding:5px;">
                                            خدمات الجمهور
                                        </th>
                                        <td align="right" style="border:1px solid #000000; padding:5px;" id="lbl13">
                                            ${input13}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="blank_row">
                            <td colspan="3"></td>
                        </tr>
                        <tr class="blank_row" style=" height: 20px !important; background-color: #FFFFFF;">
                            <td colspan="3"></td>
                        </tr>
                        <tr class="blank_row" style=" height: 20px !important; background-color: #FFFFFF;">
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td style="width: 33%"></td>
                            <td style="width: 33%">
                            </td>
                            <td style="width: 33%; text-align:center">
                                مدير خدمات الجمهور
                            </td>
                        </tr>
                    </table>
                </div>`;
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');
    
    

            mywindow.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">');
            mywindow.document.write('</head><body style="padding-top: 150px; line-height: 24; font-size: 14px;" >');

            mywindow.document.write(print);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
    }
    
    function ShowDeptEmp(){
        dept=$("#AssDeptID").val()
        $(".allDept").addClass("hide");
        $(".dept"+dept).removeClass("hide");
        
    }
    
    
    @if($ticketInfo->emp_to_receive>0 && $ticketInfo->single_receive==1)
        $(document).ready(function(){
            $("#AssDeptID").val($("#Assigned2ID option:selected").attr("dept"))
            ShowDeptEmp()
        })
    @elseif($ticketInfo->emp_to_receive>0 && $ticketInfo->single_receive==2)
        $(document).ready(function(){
            $("#AssDeptID").val($("#Assigned2ID").attr("dept"))
        })
    @endif;

function getFullData(id){
    
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')

            }

        });
    formData={'id':id}
       $.ajax({
          type:'POST',
          url: "appCustomer",
           data: formData,
           /*contentType: false,
           processData: false,*/
           success: (response) => {
             if (response) {
                 srch=response.phone_one==null?(response.phone_two==null?'':response.phone_two):response.phone_one
                if(srch.search("056")>=0)
                    $('#mobImg').attr('src','{{asset('assets/images/w35.png')}}');
                else
                    $('#mobImg').attr('src','{{asset('assets/images/jawwal35.png')}}');
                $('#MobileNo').val(response.phone_one==null?(response.phone_two==null?'':response.phone_two):response.phone_one)
                $('#national_id').val((response.national_id??''))
                $(".loader").addClass('hide');
                console.log(response.errorList.length)
                if(response.errorList.length==0){
                    $(".btnArea").removeClass("hide");
                    //$(".errArea").addClass("hide");
                }
                else
                {
                    
                    //     $(".btnArea").addClass("hide");
                    //     //$(".errArea").removeClass("hide");
                    //     err='هل تريد المتابعة رغم الأخطاء التالية'
                    //     +'<ul>'
                    // for(i=0;i<response.errorList.length;i++)
                    //     err+="<li>"+response.errorList[i]+"</li>";
                    //     err+='<ul>'
                    //     Swal.fire({
                    //       title: err,//'Do you want to save the changes?',
                    //       showDenyButton: true,
                    //       showCancelButton: true,
                    //       confirmButtonText: 'Save',
                    //       denyButtonText: `Don't save`,
                    //     }).then((result) => {
                    //       /* Read more about isConfirmed, isDenied below */
                    //       if (result.isConfirmed) {
                    //         Swal.fire('Saved!', '', 'success')
                    //       } else if (result.isDenied) {
                    //         Swal.fire('Changes are not saved', '', 'info')
                    //       }
                    //     })
                }
                // getCert(response.id,response.archive.certCount);
                // @can('subscriberContractArchive')    
                // getContractArchive(response.id,response.archive.contractArchiveCount);
                // @endcan
                
                // @can('subscriberLicArchive')    
                // getLicArchive(response.id,response.archive.licArchiveCount);
                // @endcan
                
                // @can('subscriberOutArchive')
                // getOutArchive(response.id,response.archive.outArchiveCount);
                // @endcan
                
                // @can('subscriberInArchive')
                // getInArchive(response.id,response.archive.inArchiveCount);
                // @endcan
                
                // @can('subscriberOtherArchive')
                // getOtherArchive(response.id,response.archive.otherArchiveCount);
                // @endcan
                
                // @can('subscriberCopyArchive')
                // getCopyArchive(response.id,response.archive.copyToCount);
                // @endcan
                
                // @can('subscriberJalArchive') 
                // getJalArchive(response.id,response.archive.linkToCount);
                // @endcan
                
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
}
function getSubscriberTasks(id){
    
        let subscribe_id = id;

            $.ajax({

                type: 'get',

                url: "subscriber_tasks",

                data: {

                    subscribe_id: subscribe_id,

                },

                success: function(response) {
                   
                    if (response.status!=false) {  
                        
                        drawtasks(response.tikets);
                        
                    }else{
                        Swal.fire({

            				position: 'top-center',
            
            				icon: 'error',
            
            				title: 'لايوجد طلبات لهاذا المواطن',
            
            				showConfirmButton: false,
            
            				timer: 1500
        
        				})
                    }
                },

            });
    
}

        $(function() {
            var table = $('.tasktbl1').DataTable({
                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
        });
        $(function() {
            var table = $('.tasktbl2').DataTable({
                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
        });
        $(function() {
            var table = $('.tasktbl3').DataTable({
                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
        });
        $(function() {
            var table = $('.tasktbl4').DataTable({
                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
        });

        function drawtasks($tickets){
            
            if ( $.fn.DataTable.isDataTable( '.tasktbl1' ) ) {
        
                $(".tasktbl1").dataTable().fnDestroy();
        
                $('#cMyTask1').empty();
        
            }
            if ( $.fn.DataTable.isDataTable( '.tasktbl2' ) ) {
        
                $(".tasktbl2").dataTable().fnDestroy();
        
                $('#cMyTask2').empty();
        
            }
            if ( $.fn.DataTable.isDataTable( '.tasktbl3' ) ) {
        
                $(".tasktbl3").dataTable().fnDestroy();
        
                $('#cMyTask3').empty();
        
            }
            if ( $.fn.DataTable.isDataTable( '.tasktbl4' ) ) {
        
                $(".tasktbl4").dataTable().fnDestroy();
        
                $('#cMyTask4').empty();
        
            }
            
            engCount=0;
            waterCount=0;
            elecCount=0;
            otherCount=0;
            
            for(i=0 ; i<$tickets.length ; i++){
                taskRow='';
                link= '/admin/viewTicket/'+$tickets[i]['trans']['ticket_id']+'/'+$tickets[i]['trans']['related'];
                if($tickets[i]['0']['app_type']==1){
                    elecCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+elecCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
    					+'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>'
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask2').append(taskRow);
		        }
                if($tickets[i]['0']['app_type']==2){
                    waterCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+waterCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
                        +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>'  
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask3').append(taskRow);
		        }
                if($tickets[i]['0']['app_type']==3){
                    engCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+engCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
                        +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>' 
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask1').append(taskRow);
		        }
                if($tickets[i]['0']['app_type']==4 || $tickets[i]['0']['app_type']==5){
                    otherCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+otherCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
                        +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>' 
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask4').append(taskRow);
		        }
            }
            
            $('#ctabCnt1').html(engCount);
            $('#ctabCnt2').html(elecCount);
            $('#ctabCnt3').html(waterCount);
            $('#ctabCnt4').html(otherCount);
            
            $('.tasktbl1').DataTable({
                dom: 'Bfltip',
                buttons: [{
                        extend: 'excel',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'excel',
                            src: '{{ asset('assets/images/ico/excel.png') }}',
                            style: 'cursor:pointer;height: 32px;',
                        },

                    },
                    {
                        extend: 'print',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'print',
                            src: '{{ asset('assets/images/ico/Printer.png') }} ',
                            style: 'cursor:pointer;height: 32px;',
                            class: "fa fa-print"
                        },
                        customize: function(win) {


                            $(win.document.body).find('table').find('tbody')
                                .css('font-size', '20pt');
                        }
                    },
                ],

                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
            $('.tasktbl2').DataTable({
                dom: 'Bfltip',
                buttons: [{
                        extend: 'excel',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'excel',
                            src: '{{ asset('assets/images/ico/excel.png') }}',
                            style: 'cursor:pointer;height: 32px;',
                        },

                    },
                    {
                        extend: 'print',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'print',
                            src: '{{ asset('assets/images/ico/Printer.png') }} ',
                            style: 'cursor:pointer;height: 32px;',
                            class: "fa fa-print"
                        },
                        customize: function(win) {


                            $(win.document.body).find('table').find('tbody')
                                .css('font-size', '20pt');
                        }
                    },
                ],

                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
            $('.tasktbl3').DataTable({
                dom: 'Bfltip',
                buttons: [{
                        extend: 'excel',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'excel',
                            src: '{{ asset('assets/images/ico/excel.png') }}',
                            style: 'cursor:pointer;height: 32px;',
                        },

                    },
                    {
                        extend: 'print',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'print',
                            src: '{{ asset('assets/images/ico/Printer.png') }} ',
                            style: 'cursor:pointer;height: 32px;',
                            class: "fa fa-print"
                        },
                        customize: function(win) {


                            $(win.document.body).find('table').find('tbody')
                                .css('font-size', '20pt');
                        }
                    },
                ],

                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
            $('.tasktbl4').DataTable({
                dom: 'Bfltip',
                buttons: [{
                        extend: 'excel',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'excel',
                            src: '{{ asset('assets/images/ico/excel.png') }}',
                            style: 'cursor:pointer;height: 32px;',
                        },

                    },
                    {
                        extend: 'print',
                        tag: 'img',
                        title: '',
                        attr: {
                            title: 'print',
                            src: '{{ asset('assets/images/ico/Printer.png') }} ',
                            style: 'cursor:pointer;height: 32px;',
                            class: "fa fa-print"
                        },
                        customize: function(win) {


                            $(win.document.body).find('table').find('tbody')
                                .css('font-size', '20pt');
                        }
                    },
                ],

                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
            
        }
</script>
@stop

