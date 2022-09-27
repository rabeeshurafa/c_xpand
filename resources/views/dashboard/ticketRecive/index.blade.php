@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
<?php $readonly=true; 
?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif
<?php $arrDays=array(
    'Saturday'=>'السبت',
    'Sunday'=>'الأحد',
    'Monday'=>'الإثنين',
    'Tuesday'=>'الثلاثاء',
    'Wednesday'=>'الأربعاء',
    'Thursday'=>'الخميس',
    'Friday'=>'الجمعة',
);?>

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

    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">
            @csrf
            <div class="row white-row">
                @if($config[0]->ticket_no==34||$config[0]->ticket_no==31||$config[0]->ticket_no==33)
                <div class="col-sm-12 col-md-7">
                @elseif($config[0]->ticket_no==19)
                <div class="col-sm-12 col-md-6">
                @else
                <div class="col-sm-12 col-md-5">
                @endif
                    <div class="card leftSide">
                        <form method="post" id="ticketFrm" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <div class="row" style="margin-right: 15px;">
                                    <span class="hidemob" style=" margin-left:10px;padding-top: 7px;">
                                    @if($config[0]->ticket_no==32)
                                    <img class="hidemob" src="https://t.expand.ps/expand_repov1/public/assets/images/exit.png" width="32" height="32">
                                    @elseif($config[0]->ticket_no==34)
                                    <img src="https://t.expand.ps/expand_repov1/public/assets/images/purchase.png" width="32" height="32">
                                    @else
                                    <img class="hidemob" src="{{  asset('assets/images/'.$config[0]->ticket_ico)}}" width="32" height="32">
                                    @endif
                                    </span>
                                    <span>
                                        <span class="ticket_name fontMob">{{ $config[0]->ticket_name }}</span>
                                    
                                    
                                        <span class="hidemob"> (رقم: {{$ticket->app_no}})</span>
                                        <time style="font-size:10pt;display:block;padding-top:10px" class="fs14"><?php echo $arrDays[date('l',strtotime($ticket->created_at))].' '.date('Y/m/d - H:i',strtotime($ticket->created_at)); ?></time>
                                        
                                    </span>
                                    <span style="margin-right: 30px;">
                                        <a class="hidedesc" onclick="ShowSMSModal('smsModal')">
                                            <img style="width: 55px;" src="https://template.expand.ps/images/mob32.png">
                                        </a>
                                        @can('taskCitizenArchive')
                                            @if( $config[0]->show_archive==1)
                                            <img src="https://db.expand.ps/images/msg.png" 
                                            class="hidemob" onclick="$('#msgModal').modal('show');$('#ArchModalName').html($('#subscriber_name').val());" style="cursor:pointer;float:left;margin-top:5px;width:32px;height:32px;margin-left: 20px;">
                                            @endif
                                        @endcan
                                        @can('taskCitizenJob')
                                            @if( $config[0]->joblic_btn==1)
                                            <img src="https://db.expand.ps/images/ico6.jpg" 
                                            onclick="" class="hidemob" style="cursor:pointer;float:left;margin-top:5px;width:32px;height:32px;margin-left: 20px;">
                                            @endif
                                        @endcan
                                        @if( $config[0]->apps_btn==1)
                                        <img src="https://db.expand.ps/images/rep.png" 
                                        onclick="$('#AppModal1').modal('show');$('#repName').html($('#subscriber_name').val());" class="hidemob" style="cursor:pointer;float:left;margin-top:5px;width:32px;height:32px;margin-left: 20px;">
                                        @endif
                                    </span>
                                    </div>
                                    <input type="hidden" id="app_id" name="app_id" value="{{ $ticket->id }}">
                                    <input type="hidden" id="app_type" name="app_type" value="{{ $app_type }}">
                                </h4>
                            </div>
                            <input type="hidden" name="tiketName" id="tiketName" value="{{ $config[0]->ticket_name }}">
                            <input type="hidden" name="tiketAppNo" id="tiketAppNo" value="({{ $ticket->app_no }})">
                            <input type="hidden" name="tiketrelated" id="tiketrelated" value="{{ $config[0]->ticket_no }}">
                            <div class="card-content">
                                <div class="card-body">
                                
                                     @php
                                     $path='dashboard.ticketRecive.viewTicket'.$config[0]->ticket_no
                                     @endphp
                                     @include( $path,['ticketInfo'=>$config[0],'ticket'=>$ticket])
                                    
                                    @if($config[0]->has_debt_list==1)
                                        <div class="row">
                                            <div class="col-md attachs-section" style="margin-left: 25px; margin-right: 25px;">
                                                <img src="{{ asset('assets/images/ico/cost.png') }}" width="40" height="40">
                                                <span class="cost-header" style="font-size: 20px;">{{ 'ديون سابقه' }}
                                        
                                                </span>
                                        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card-body">
                                               <div class="form-group col-md-12 tablescroll">
                                                <table class="detailsTB table" style="margin-left: 15px;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                {{ '' }}
                                                            </th>
                                                            <th scope="col" class=" col-md-2 col-sm-4" style="text-align: -webkit-center;color: white;">
                                                                {{ 'البند' }}
                                                            </th>
                                                            <th scope="col" class=" col-md-2 col-sm-4" style="text-align: -webkit-center;color: white;">
                                                                {{ 'المبغ المستحق' }}
                                                            </th>
                                                            <th scope="col" class=" col-md-2" style="text-align: -webkit-center;color: white;">
                                                                {{ 'المبلغ المدفوع' }}
                                                            </th>
                                                            <th scope="col" class="hidemob col-md-2" style="text-align: -webkit-center;color: white;">
                                                                {{ 'رقم الوصل' }}
                                                            </th>
                                                            <th scope="col" class=" col-md-3 col-sm-4" style="text-align: -webkit-center;color: white;">
                                                                {{ 'الموظف' }}
                                                            </th>
                                                            <th scope="col"></th>
                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody id="debtList">
                                                        <?php $total=0; 
                                                        $arr=json_decode($ticket->debt_json);
                                                        $arr=is_array($arr)?$arr:array();?>
                                                        <?php if(sizeof($arr)>0){ $i=1;?>
                                                        @foreach($arr as $debt)
                                                            <tr class=>
                                                            <td style="color:#1E9FF2">{{$i++}}</td> 
                                                            <td>
                                                                <input {{ $readonly?"readonly":"" }} type="text" class="w-100 form-control debtname" name="debtname[]" value="{{$debt->debtName}}">
                                                            </td>
                                                            <td class="" style="text-align: -webkit-center;">
                                                                <input {{ $readonly?"readonly":"" }} type="number" class=" form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="{{$debt->debtValue}}">
                                                            </td>
                                                            <td class="" style="text-align: -webkit-center;">
                                                                <?php if(isset($debt->debtPayed)){ ?>
                                                                <input type="number" {{ $readonly?"readonly":"" }} class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="{{$debt->debtPayed}}">
                                                                <?php } else{?>
                                                                <input type="number" {{ $readonly?"readonly":"" }} class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                                                                <?php } ?>
                                                            </td>
                                                            <td class="hidemob" style="text-align: -webkit-center;">
                                                                <?php if(isset($debt->debtVoucher)) {?>
                                                                <input type="text" {{ $readonly?"readonly":"" }} class=" form-control alphaFeild"  name="debtVoucher[]" value="{{$debt->debtVoucher}}">
                                                                <?php } else{?>
                                                                <input type="text" {{ $readonly?"readonly":"" }} class=" form-control alphaFeild"  name="debtVoucher[]" value="">
                                                                <?php } ?>
                                                            </td>
                                                            <td style="text-align: -webkit-center;">
                                                                <input type="text" {{ $readonly?"readonly":"" }} class="w-100 form-control debtEmp" onclick="addDebt();" name="debtEmp[]" value="{{$debt->debtEmp}}">
                                                                <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <?php }else{ ?>
                                                        <tr>
                                                            <td style="color:#1E9FF2">1</td> 
                                                            <td>
                                                                <input {{ $readonly?"readonly":"" }} type="text" class="w-100 form-control debtname" name="debtname[]" value="">
                                                            </td>
                                                            <td class="" style="text-align: -webkit-center;">
                                                                <input {{ $readonly?"readonly":"" }} type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                                                            </td>
                                                            <td class="" style="text-align: -webkit-center;">
                                                                <?php if(isset($debt->debtPayed)){ ?>
                                                                <input type="number" {{ $readonly?"readonly":"" }} class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                                                                <?php } else{?>
                                                                <input type="number" {{ $readonly?"readonly":"" }} class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                                                                <?php } ?>
                                                            </td>
                                                            <td class="hidemob" style="text-align: -webkit-center;">
                                                                <input type="text" {{ $readonly?"readonly":"" }} class="form-control alphaFeild"  name="debtVoucher[]" value="">
                                                            </td>
                                                            <td style="text-align: -webkit-center;">
                                                                <input type="text" {{ $readonly?"readonly":"" }} class="w-100 form-control debtEmp" onclick="addDebt();" name="debtEmp[]" value="">
                                                                <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tbody id="debtTotalList">
                                                        <tr>
                                                            <td style="color:#1E9FF2"></td> 
                                                            <td style="text-align: left;">
                                                                {{'المجموع الكلى'}}
                                                            </td>
                                                            <td class="" style="text-align: -webkit-center;">
                                                                <input type="number"{{ $readonly?"readonly":"" }} class="form-control alphaFeild" id="debtTotal"  onblur="calcDebtrest();" name="debtTotal" value="{{$ticket->debt_total}}">
                                                            </td>
                                                            <td style="text-align: -webkit-center;">
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#1E9FF2"></td> 
                                                            <td style="text-align: left;">
                                                                {{'المبلغ المدفوع'}}
                                                            </td>
                                                            <td class="" style="text-align: -webkit-center;">
                                                                <input type="number"{{ $readonly?"readonly":"" }} class="form-control alphaFeild"  onblur="calcDebtrest();" id="payment" name="payment" value="{{$ticket->payment}}">
                                                            </td>
                                                            <td style="text-align: -webkit-center;">
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#1E9FF2"></td> 
                                                            <td style="text-align: left;">
                                                                {{'الباقى'}}
                                                            </td>
                                                            <td class="" style="text-align: -webkit-center;">
                                                                <input type="number"{{ $readonly?"readonly":"" }} class="form-control alphaFeild rest" id="rest" name="rest" value="{{$ticket->rest}}">
                                                            </td>
                                                            
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> 
                                            </div>
                                            
                                        </div>
                                    @endif
                                     
                                    @if($config[0]->has_price_list==1)
                                    <div class="row" style=" ">
                                        <div class="col-md attachs-section" >
                                            <img src="{{asset('assets/images/ico/cost.png')}}" width="40" height="40">
                                            <span class="cost-header" style="font-size: 20px;">التكاليف
                                    
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row attachs-body">
                                        <div class="form-group col-12 mb-2">
    
                                                <?php $total=0; 
                                                $arr=json_decode($ticket->fees_json);
                                                $arr=is_array($arr)?$arr:array();?>
                                            <ol class="vasType 1vas addRec vasChange olmob">
                                                @if($config[0]->ticket_no==13)
                                                <li style="font-size: 17px !important;color:#000000">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group" style="margin-bottom: 0px;">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">
                                                                            {{ 'عدد الامبيرات' }}
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" readonly id="ampereCount" name="ampereCount" class="form-control"  value="{{$ticket->NewAmpere}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group" style="margin-bottom: 0px;">
                                                                <div class="input-group" style="width: 100% !important;">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text vasTitle" id="basic-addon1" >
                                                                            @if($ticket->CurrVas==43)
                                                                            سعر الامبير 3 فاز
                                                                            @else
                                                                             سعر الامبير 1 فاز
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="ampereCost" id="ampereCost" class="form-control feesText"  value="{{$ticket->ampere_cost}}" onblur="calcAmpereCost()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3" style="margin-bottom: 0px;">
                                                            <input type="number" readonly name="ampereTotalCost" id="ampereTotalCost" class="form-control FessVals" value="{{$ticket->total_cost}}">
                                                        </div>
                                                    </div>
                                                </li>
                                                @endif
                                                 <?php 
                                                if(sizeof($arr)>0){?>
                                                    @foreach($arr as $fee)
                                                    <?php 
                                                        
                                                        if($fee->feesValue==''||$fee->feesValue==null)
                                                            $fee->feesValue=0; 
                                                        ?>
                                                    <li style="font-size: 17px !important;color:#000000">
                                                        <div class="row">
                                                            <div class="col-sm-8 feestextmob">
                                                                <input type="text" {{ $readonly?"readonly":"" }} name="feesText[]" class="form-control feesText" value="{{ $fee->feesText}}">
                                                            </div>
                                                            <div class="col-sm-3 feesnummob">
                                                                <input type="number"{{ $readonly?"readonly":"" }} name="feesValue[]" class="form-control FessVals" value="{{ $fee->feesValue*1}}" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php $total+=$fee->feesValue; ?>
                                                    @endforeach
                                                <?php } ?>
                                                @if(!$readonly)
                                                <li style="font-size: 17px !important;color:#000000">
                                                    <div class="row">
                                                        <div class="col-sm-8 feestextmob">
                                                            <input type="text" name="feesText[]" class="form-control feesText"
                                                                value="">
                                                        </div>
                                                        <div class="col-sm-3 feesnummob">
                                                            <input type="number" name="feesValue[]" class="form-control FessVals" value="0" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                                                        </div>
                                                    </div>
                                                </li>
                                                @endif
                                            </ol>
                                    
                                            <ol class="vasType 1vas olmob" style="list-style-type: none;">
                                                <li style="font-size: 17px !important;color:#000000">
                                                    <div class="row">
                                                        <div class="col-sm-8 feestextmob">
                                                            الإجمالي
                                                        </div>
                                                        <div class="col-sm-3 feesnummob">
                                                            <input type="number" id="total" disabled="" name="total" class="form-control" value="{{$total}}">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                    @endif
                                    @if($config[0]->has_attach==1)
                                    <div class="row" style=" ">
            
                                        <div class="col-md attachs-section">
            
                                            <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
            
                                            <span class="attach-header">{{ 'مرفقات' }}
            
                                                <span id="attach-required">*</span>
            
                                            </span>
            
                                        </div>
            
                                    </div>
            
                                    <div class="row attachs-body">
            
                                        <div class="form-group col-12 mb-2">
                                            <ol class="olmob addAttatch" ><?php $i=1;
                                                $arr=json_decode($ticket->fees_json);
                                                $arr=is_array($ticket->Files)?$ticket->Files:array(); ?>
                                                @foreach($arr as $file)
                                                <li style="font-size: 17px !important;color:#000000">
                                                    <div class="row">
                                                        <div class="col-sm-5 attmob" >
                                                            <input type="text" reuired="" id="attachName[]" name="attachName[]" class="form-control attachName" value="{{$file->attachName}}">
                                                        </div>
                                                        <div class="attdocmob col-sm-5 attach_row_{{$i}}" >
                                                            <div id="attach" class=" col-sm-12 ">
                                                                <div class="attach"> 
                                                                    <a class="attach-close1" href="{{asset($file->Files[0]->url)}}" style="color: #74798D; float:left;" 
                                                                    target="_blank">  
                                                                        <span class="attach-text hidemob">{{ substr($file->Files[0]->real_name,0,15)}}</span>    
                                                                        <img style="width: 20px;" src="https://t.expand.ps/expand_repov1/public/assets/images/ico/image.png">
                                                                    </a>
                                                                    <input type="hidden" id="attach_ids[]" name="attach_ids[]" value="{{$file->attach_ids}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(!$readonly)
                                                        <div class="col-sm-1 attdelmob">
                                                            <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; " onclick="$(this).parent().parent().parent().remove()"></i>
                                                        </div> 
                                                        @endif
                                                    </div> 
                                                </li>
                                                <?php $i++;?>
                                                @endforeach
                                                
                                                @if(!$readonly)
                                                <li style="font-size: 17px !important;color:#000000">
                                                    <div class="row">
                                                        <div class="col-sm-5 attmob">
                                                            <input type="text" id="attachName[]" name="attachName[]" class="form-control attachName" placeholder="أخل اسم المرفق"
                                                             {{$config[0]->force_attach==1?"reuired":"" }}   value="">
                                                        </div>
                                                        <div class="col-sm-5 attach_row_{{$i}} attdocmob1">
                                                            
                                                        </div>
                                                        <div class="col-sm-2 attdelmob">
                                                            <img src="{{ asset('assets/images/ico/upload.png') }}" width="40"
                                                                height="40" style="cursor:pointer"
                                                                onclick="$('#currFile').val({{$i}});$('#attachfile').trigger('click');">
                                                        </div>
                                                    </div>
                                                </li>
                                                @endif
                                            </ol>
            
                                        </div>
            
                                    </div>
                                    @endif
                                    @if(!$readonly)
                                    <div class="form-actions" style="border-top:0px;">
                                        <div class="text-right">
                                            <button type="submit" id="editBtn" class="btn btn-primary">
                                                تعديل
                                                <i class="ft-thumbs-up position-right"></i>
                                            </button>
    
                                        </div>
        
                                    </div>
                                    @endif
                                </div> 
                            </div> 
    
                            <input type="hidden" id="currFile" name="currFile">
                            <input type="file" style="display:none" id="attachfile" name="attachfile" onchange="startUpload('ticketFrm')">
                        </form>
                    </div>
                </div>
                @if($config[0]->ticket_no==34||$config[0]->ticket_no==31||$config[0]->ticket_no==33)
                <div class="col-sm-12 col-md-5">
                @elseif($config[0]->ticket_no==19)
                <div class="col-sm-12 col-md-6">
                @else
                <div class="col-sm-12 col-md-7">
                @endif
                    <div id="leftSideREsponse">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title hideMob"
                                    style="padding: 1px 15px;  border-bottom: 1px solid #2c303b; ">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: left;">
                                            @if($config[0]->ticket_no==1)
                                            <a style="padding: .5rem 1rem;" href="{{url('ar/admin/editPrint/'.$ticket->id.'/'.$ticket->history[0]->related)}}" class="btn btn-info" target="_blank">
                                                تحرير وطباعة الطلب
                                            </a>
                                            @endif
                                            <!--<a class="btn btn-info" style="padding: .5rem 1rem;" href="{{url('ar/admin/printBar2aa/'.$ticket->id.'/'.$ticket->history[0]->related)}}" target="_blank">-->
                                            <!--    تحرير و طباعة براءة  الذمة-->
                                            <!--</a>-->
                                            <a href="{{url('ar/admin/printTicket/'.$ticket->id.'/'.$ticket->history[0]->related)}}" target="_blank">
                                                <img src="https://template.expand.ps/images/printer.jpeg" style="height: 32px;">
                                            </a>
                                            <a onclick="ShowSMSModal('smsModal')">
                                                <img src="https://template.expand.ps/images/mob32.png">
                                            </a>
                                            <a style="display:none" onclick="$('.frmContent').html($('#citizenFormData'));$('#citizenModal').modal('show');$('#citizenFormData').show();">
                                                <img src="https://template.expand.ps/images/Email40.png">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="responseList">
                            <?php 
                            $numberOf_ticket=count($ticket->history);
                            //$lastReciver=$ticket->history[0]->sender_id ;  
                            $tagArr=array() ; 
                            $lastTicket=array(); 
                            $i=0;?>
                           
                            @foreach($ticket->history as $rowTicket)
                           <?php
                           
                           if($rowTicket->recive_type==1) 
                                    $lastReciver=$rowTicket->reciver_id;
                                if(in_array($rowTicket->recive_type,array(1,2))) 
                                    $lastTicket=$rowTicket;
                            ?>
                            <div class="card-content collpase show ResponseList">
                                <div class="card-body">
                                    <div class="row mr-15mob"
                                        style="background-color: #ffffff; margin-bottom:20px;margin-left: 15px;">
                                        <div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">
                                            <span class="avatar" style="width: 60px;">
                                                <img src="{{ $rowTicket->sender_image }}"
                                                    style="border: 1px solid #c7c7c7;padding: 2px; max-height:60px;">
                                            </span>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-3 marginrightminus15  infoAvatar">
                                            <a style="color:#385898;font-weight: 600;">{{ $rowTicket->sender_name }}</a>
                                            <br>
                                            <time class="fs14">
                                                {{ date('d/m/Y',strtotime($rowTicket->created_at)) }}
                                                <br>
                                                {{ date('H:i',strtotime($rowTicket->created_at)) }} 
                                                </time>
                                        </div>
                                        <div class="col-sm-12 col-md-7 marginrightminus30">
                                            <?php if($i==0){ $i++ ?>
                                            <h5 style="margin-right:40px">
                                                <time style="font-family:Arial !important; color:#000000; font-size: 17px !important;font-weight: 500;">

                                                    {{"تم إنشاء الطلب بواسطة:"}}
                                                    <b>{{ $rowTicket->sender_name }} </b>
                                                </time>
                                            </h5>
                                            <?php 
                                            if(strlen(trim($rowTicket->trans_note))+strlen(trim($rowTicket->s_note))>0){
                                            ?>
                                            <br />
                                            <p style="margin-right: 45px;">
                                            <?php echo$rowTicket->trans_note.'<b style="color:#5599FE">ملاحظات: </b>'.$rowTicket->s_note?>   </p>
                                            <?php }
                                                
                                            }else{ 
                                            //var_dump($rowTicket);?><h5>
                                                <time style="font-family:Arial!important; color:#000000; font-size: 17px !important;font-weight: 500;">
                                                    <?php  echo $rowTicket->s_note ?>
                                                    <?php 
                                if(in_array($rowTicket->recive_type,array(1,2))) 
                                echo strlen(trim($rowTicket->trans_note))>0?'<br /><b style="color:#5599FE">ملاحظات: </b>'.$rowTicket->trans_note:''?>
                                                </time>
                                            </h5>
                                                <?php }
                                                ?>
                                        </div>
                                        
                                        <?php $arr=is_array($rowTicket->Files)?$rowTicket->Files:array();?>
                                        @foreach($arr as $file)
                                        @if(sizeof($file->Files)>0)
                                        
                                        <div class="col-sm-4 attach_row11_{{$i}}">
                                            <div id="attach" class=" col-sm-12 ">
                                                <div class="attach"> 
                                                    <a class="attach-close1" href="{{asset($file->Files[0]->url)}}" style="color: #74798D; float:left;" 
                                                    target="_blank">  
                                                        <span class="attach-text">{{ substr($file->attachName,0,40)}}</span>    
                                                        <img style="width: 20px;" src="https://t.expand.ps/expand_repov1/public/assets/images/ico/image.png">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                                
                                        <?php $i++;?>
                                        @endforeach
                                    </div>
                                    <?php if(sizeof($rowTicket->taged)>0){?>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12" >
                                            <h5 class="col-md atta chs-section" style="text-align: center;color:#385898;font-weight: 600;">
                                                {{--<img src="https://db.expand.ps/images/a32.png" style="height: 32px;">--}}
                                                المشاركين بالطلب
                                            </h5>
                                            <div class="row justify-content-md-center" >
                                                @foreach($rowTicket->taged as $row)
                                                <?php $tagArr[]=$row->id; ?>
                                                <div class="col-md-2 taginfomob" style="text-align: center">
                                                    <span class="avatar" style="width: 35px;">
                                                        <img src="{{$row->image}}" style="height: 35px;">
                                                        <br>
                                                        <span>{{$row->nick_name}}</span>
                                                    </span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>  
                                    </div>
                                    <?php }?>
                                
                                </div>
                                <div class="card-body"
                                    style="background-color: #F4F5FA; min-height:15px;padding-top: 0;padding-bottom: 0rem;">
                                </div>
                            </div>
                            @endforeach
                            </div>
                            @if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_revoke_json))&&!($lastReciver==Auth()->user()->id))
                                <div class="card-content collpase show ResponseList">
                                    <div class="card-body">
                                        <div class="row"
                                            style="background-color: #ffffff; margin-bottom:20px;    margin-left: 15px;margin-right: 15px;">
                                            <div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">
                                                <span class="avatar" style="width: 60px;">
                                                    <img src="{{ $lastTicket->receive_image }}"
                                                        style="border: 1px solid #c7c7c7;padding: 2px; max-height:60px;">
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-3 marginrightminus30 infoAvatar">
                                                <a style="color:#385898;font-weight: 600;">{{ $lastTicket->receive_name }}</a>
                                                <br>
                                                <time class="fs14">
                                                    {{ date('d/m/Y',strtotime($lastTicket->created_at)) }}
                                                    <br>
                                                    {{ date('H:i',strtotime($lastTicket->created_at)) }} </time>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-7 marginrightminus30">
                                                <h5>

                                                    <time style="font-family:Arial !important;; color:#000000; font-size: 17px !important;font-weight: 500;">
                                                       
                                                    </time>
                                                </h5> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body"
                                        style="background-color: #F4F5FA; min-height:15px;padding-top: 0;padding-bottom: 0rem;">
                                    </div>
                                </div>
                            @endif
                            <?php 
                            
                            $emp_to_reopen_ticket=json_decode($config[0]->emp_to_reopen_ticket); 
                            $emp_to_revoke_json=json_decode($config[0]->emp_to_revoke_json); 
                            $emp_to_close_json=json_decode($config[0]->emp_to_close_json); 
                            ?>
                            <!-- Not closed -->
                            @if($ticket->ticket_status<>5003) 
                                @if($lastReciver==Auth()->user()->id || in_array(Auth()->user()->id,$tagArr) || in_array(Auth()->user()->id,$emp_to_revoke_json))
                                <form onsubmit="return false" id="formData" class="frm1" method="post" style=" margin-left: 15px; margin-right: 15px;">
                                    <div class="form-control" style="background-color: #ffffff; margin-bottom:20px; border:0px solid #000000 !important">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">
                                                <span class="avatar" style="width: 60px;">
                                                    <img src="{{Auth()->user()->image}}" style="max-height: 60px;border: 1px solid #c7c7c7;padding: 2px;">
                                                    <input name="trans_id" type="hidden" value="{{$ticket->active_trans  }}">
                                                    <input name="ticket_id" type="hidden" value="{{$ticket->id  }}">
                                                    <input name="app_type" type="hidden" value="{{$ticket->ticket_type  }}">
                                                    
                                                    <input type="hidden" name="tiketName" id="tiketName" value="{{ $config[0]->ticket_name }}">
                                                    <input type="hidden" name="tiketAppNo" id="tiketAppNo" value="({{ $ticket->app_no }})">
                                                    <input type="hidden" name="tiketrelated" id="tiketrelated" value="{{ $config[0]->ticket_no }}">
                                                    <input type="hidden" name="subscriberName1" id="subscriberName1" value="{{ $ticket->customer_name }}">
                                                    <input type="hidden" name="subscriberId1" id="subscriberId1" value="{{ $ticket->customer_id }}">
                                                    
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-10 marginrightminus15 infoAvatar">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <a style="color:#385898;font-weight: 600;">{{Auth()->user()->nick_name}}</a>
                                                    </div>
                                                    
                                                    <div class="col-sm-7">
                                                        <div class="form-group status">
                                                            <div class="input-group">
                                                                @if($lastReciver==Auth()->user()->id)
                                                                <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">
                                                                            حالة الطلب
                                                                        </span>
                                                                </div>
                                                                <select type="text" id="app_status" name="app_status" class="app_status form-control" onchange="$('#app_status1').val($(this).val())">
                                                                    <option value="5002">  تغيير حالة الطلب  </option>
                                                                    @foreach ($helpers['appStatus'] as $row)
                                                                    <option value="{{$row->id}}"> {{$row->name}} </option>
                                                                    @endforeach
                            									</select>
                                                                <div class="input-group-append ">
                                                                    <span class="input-group-text input-group-text2 hidemob" onclick="ShowConstantModal(5001,'app_status','حالة الطلب')">
                                                                        <i class="fa fa-external-link"></i>
                                                                    </span>
                                                                    
                                                                    <img src="https://db.expand.ps/images/upload.png"  height="35" onclick="$('.repAttach').toggle();$('.repAttach1').toggle()">
                                                                </div>
                                                                @else
                                                                    <img src="https://db.expand.ps/images/upload.png" style="margin-right: auto;" height="35" onclick="$('.repAttach').toggle();$('.repAttach1').toggle()">
                                                                @endif
                                                                <input type="hidden" id="app_status1" name="app_status1" value="5002">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <textarea type="text" id="details" name="details" class="form-control" placeholder="أدخل ما تم عمله هنا" rows="3" aria-invalid="false" style="border: none!important;box-shadow: none; text-align: right;"></textarea>
                                                
                                                    <input type="hidden" id="details1" name="details1">
                                                </div>
                                            </div>
                                        </div>
                                        @include('dashboard.includes.attachment1')
                                        <div class="row" style="padding-top:45px; text-align: center;width:100%">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    
                                                                </div>
                                                                <div class="col-md-3" style="color:#000000; width:33%;">
                                                                    <img src="https://doc.expand.ps/uploads/s1.jpg?>" id="makeResponse" height="32px" style="cursor: pointer" onclick="CloseApp(this);">
                                                                        <br>
                                                                    <spna class="saveRmob">حفظ ما تم عملة</spna>



                                                                </div>
                                                                
                                                                @if($lastReciver==Auth()->user()->id|| in_array(Auth()->user()->id,$emp_to_revoke_json))
                                                                <div class="col-md-3" style="color:#000000; width:33%;">
                                                                    <img src="https://doc.expand.ps/uploads/s4.jpg" height="32px" onclick="$('#forwordTo').toggle();$('html, body').animate({scrollTop:$(document).height()}, 'slow');">
                                                                    <br>
                                                                    <spna class="sendRmob">تحويل إلى موظف</spna>
                                                                </div>
                                                                @if(in_array(Auth()->user()->id,$emp_to_close_json))
                                                                    @if($lastTicket->related!=32)
                                                                    <div class="col-md-4" style="color:#000000; width:33%;">
                                                                        <input type="hidden" name="dept" value="8">
                                                                        <img src="https://doc.expand.ps/uploads/s3.jpg" height="32px" onclick="$('#app_status1').val(5003);CloseApp(this)">
                                                                        <br>
                                                                    <spna class="closeRmob">إغلاق الطلب بشكل نهائي</span>
                                                                    </div>
                                                                    @else
                                                                    <div class="col-md-3" style="color:#000000;">
                                                                        <input type="hidden" name="dept" value="8">
                                                                        <img src="https://doc.expand.ps/uploads/s3.jpg" height="32px" onclick="closeVac(<?php echo $lastTicket->ticket_id?>,<?php echo $lastTicket->related ?>,1);">
                                                                        <br>
                                                                            موافقة واغلاق   
                                                                    </div>
                                                                    <div class="col-md-2" style="color:#000000;">
                                                                        <input type="hidden" name="dept" value="8">
                                                                        <img src="https://template.expand.ps/app-assets/images/rejectClose.jpg" height="40px" onclick="closeVac(<?php echo $lastTicket->ticket_id?>,<?php echo $lastTicket->related ?>,0);">
                                                                        <br>
                                                                            رفض واغلاق   
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                                <div class="col-md-1">
                                                                    
                                                                </div>
                                                                @endif
                                                            </div>
                                            
                                                            
                                                        </div>
                                                    </div>
                            
                                            </div>
                                    </div>
                                </form>
                                <form onsubmit="return false" class="form frm2" method="post" id="forwordTo" style="margin-left: 15px; margin-right: 15px;display: none">
                                        <input name="trans_id" type="hidden" value="{{$ticket->active_trans  }}">
                                        <input name="ticket_id" type="hidden" value="{{$ticket->id  }}">
                                        <input name="app_type" type="hidden" value="{{$app_type  }}">
                                        <input name="related" type="hidden" value="{{$ticket->history[0]->related  }}">
                                        <div class="attachCopy" style="display:none"></div>
                                        <textarea style="display:none" name="s_response" id="frm2details"></textarea>
    
                                        <div class="row mobRow">
                                                <div class="col-lg-6 col-md-5 pr-s-12">
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87 mt-s-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{"اختر القسم"}}</span>
                                                            </div>
                                                            <select type="text" id="AssDeptID" name="AssDeptID"
                                                                class="form-control myselect2" aria-invalid="false"
                                                                onchange="ShowDeptEmp()">
                                                                <option disabled="" selected=""> -- اختيار القسم -- </option>
                                                                @foreach ($helpers['department'] as $dept)
                                                                <option value="{{$dept->id}}">{{$dept->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                function ShowDeptEmp() {
                                                                    dept = $("#AssDeptID").val()
                                                                    $(".allDept").addClass("hide");
                                                                    $(".dept" + dept).removeClass("hide");
    
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-6 col-md-6 pr-s-12">
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87 mt-s-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{"اختر الموظف"}}</span>
                                                            </div>
                                                            
                                                            <select type="text" id="Assigned2ID"  name="AssignedToID"
                                                                class="form-control myselect2" aria-invalid="false">
                                                                <option disabled="" selected=""> -- اختيار الموظف -- </option>
                                                                @foreach ($employees as $emp)
                                                                <option class="allDept hide dept{{$emp->department_id}}"  value="{{$emp->id}}" dept="{{$emp->department_id}}" >{{$emp->nick_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <!--<input type="text" id="SubscriberName" class="form-control  alphaFeild" placeholder="Subscriber Name " name="SubscriberName">-->
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
    
                                        <style>
                                            .Priority {
                                                padding: 0;
                                                position: relative;
                                                left: 0;
                                                line-height: 39px;
                                                float: left;
                                            }
    
                                            .rate {
                                                width: auto;
                                                position: relative;
                                                float: left;
                                                height: 40px;
                                                margin-top: -3px;
                                            }
    
                                            .Photo {
                                                position: relative;
                                                top: 0;
                                                float: left;
                                                right: 0;
                                            }
    
                                            .onoffswitch {
                                                float: left;
                                                margin-top: 10px;
                                                width: 60px;
                                            }
    
                                            .onoffswitch-switch {
                                                margin-top: -2px;
                                                left: 0;
                                            }
    
                                            .onoffswitch-inner:before {
                                                text-align: center;
                                            }
    
    
                                            .onoffswitch-switch {
                                                margin-top: 4px;
                                                height: 18px;
                                                width: 18px;
                                            }
    
                                            .rate:not(:checked)>label {
                                                font-size: 30px !important;
                                            }
    
                                        </style>
    
    
                                        <div class="row hideMob" style="margin-top: 1.2%;">
                                            <div class="form-group col-md-3 mb-2"> </div>
                                            <div id="static24Clock" style="display:block;"
                                                class="form-group image-responsive col-md-6 mb-2">
                                                <img src="https://db.expand.ps/images/24-hours-active-1-766936.png"
                                                    style="margin-right: 25%;" alt="24 hours">
    
                                                <input
                                                    style="border:0px solid #fff;position: relative;bottom: -43px;width: 39px;right: -34px;text-align: right;font-size: 32px !important;color: #347ABD;padding: 0px;font-weight: bold;"
                                                    placeholder="00" id="restHrs">
                                            </div>
                                            <div id="staticClock" style="display:none;" class="form-group col-md-6 mb-2">
                                                <img src="https://db.expand.ps/images/clock.png" width="15%"
                                                    style="padding-top:5px;float: left;margin-left: 5%;">
                                                <table width="80%" align="left">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%" align="right"><input type="text" id="hourNumber"
                                                                    class="form-control" name="hourNumber" value="48"
                                                                    style="background: transparent; border: none; -webkit-box-shadow: none; box-shadow: none; border-radius: 0; text-align:center; font-size:20pt !important; font-weight:bold; color:red">
                                                            </td>
                                                            <td width="50%" align="left"><span
                                                                    style="font-size:20pt; font-weight:bold; color:red">ساعة</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
    
                                        <div class="row hideMob" style="margin-top: -10px;">
                                            <div class="form-group col-md-3 mb-2"></div>
                                            <div class="form-group col-md-6 mb-2 text-center">
                                                <div style="display: inline-block;">
                                                    <div class="rate">
                                                        <input type="radio" id="star5" name="rate" value="5">
                                                        <label for="star5" title="5">{{"5 stars"}}</label>
                                                        <input type="radio" id="star4" name="rate" value="4">
                                                        <label for="star4" title="4">{{"4 stars"}}</label>
                                                        <input type="radio" id="star3" name="rate" value="3">
                                                        <label for="star3" title="3">{{"3 stars"}}</label>
                                                        <input type="radio" id="star2" name="rate" value="2">
                                                        <label for="star2" title="2">{{"2 stars"}}</label>
                                                        <input type="radio" id="star1" name="rate" value="1">
                                                        <label for="star1" title="1">{{"1 star"}}</label>
                                                    </div>
                                                    <span class="Priority">{{"الأهمية:"}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row hideMob" style="margin-top: -10px;">
    
                                            <div class="form-group col-md-12" style="text-align:center">
                                                <span class="" style="margin: 3px;color:#1e9ff2">&nbsp;</span>
                                                <span class="" title="Force an image" style="margin: 3px;color:#1e9ff2"
                                                    onclick="ChangeState1($(this))">
                                                    <input type="hidden" name="enablePhoto" value="0" id="enablePhoto1">
                                                    <img src="https://db.expand.ps/images/c1.png" id="enablePhotoImg1"
                                                        style=" margin-bottom: 13px;">
                                                </span>
                                                <span class="" title="Recive Notification" style="margin: 3px;color:#1e9ff2"
                                                    onclick="ChangeState($(this))">
                                                    <input type="hidden" id="hasNotify" name="hasNotify" value="0">
                                                    <i class="fa fa-bell fa-2x"></i>
                                                </span>
                                                <span title="Tag Employee" style="margin: 3px; color:#1e9ff2;">
                                                    <a onclick="$('#tag_id').toggle()">
                                                        <i class="fa fa-user-plus fa-2x"></i>
                                                    </a>
                                                </span>
    
                                                <span title="Select vehicle" style="margin: 3px; color:#1e9ff2; display:none">
                                                    <a href="#vehicle-popup" alt="Choose Your Vehicle"
                                                        title="Choose Your Vehicle">
                                                        <i class="fa fa-car-side fa-2x"></i>
                                                    </a>
                                                </span>
                                                <span title="Pick tools" style="     margin: 3px;color:#1e9ff2; display:none">
                                                    <a onclick="showCart();">
                                                        <i class="fa fa-shopping-cart fa-2x"></i></a>
                                                </span>
    
                                                <span title="Returned tools after"
                                                    style="margin: 3px;color:#1e9ff2; display:none">
                                                    <a onclick="showReturn();">
                                                        <img style="    height: 34px;     margin-bottom: 13px; width: 34px;"
                                                            src="https://db.expand.ps/images/icon/icons8-return-48.png">
                                                    </a> </span>
    
                                            </div>
    
    
    
                                        </div>
    
                                        <div class="row " id="tag_id" style="height: 60px;display:none">
                                            <div class="col-md-12">
                                                <div class="form-group paddformmob">
                                                <div class="input-group"
                                                    style="height: 40px !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">{{"نسخة إلى"}}</span>
                                                    </div>
                                                    <select id="tags" name="tags[]"
                                                        class="select2 form-control select2-hidden-accessible" multiple=""
                                                        data-toggle="select" style="width:100%;"
                                                        data-select2-id="select2-data-tags" tabindex="-1" aria-hidden="true">
                                                        @foreach ($employees as $emp)
                                                        <option value="{{$emp->id}}">{{$emp->nick_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <div class="form-group paddformmob">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                ملاحظات
                                                            </span>
                                                        </div>
                                                        <textarea type="text" id="note" class="form-control"
                                                            placeholder="أدخل ملاحظاتك" name="note"
                                                            style="height: 35px;"></textarea>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="row" style="    text-align: center;">
                                            <div class="form-group col-md-5 mb-2">
                                                
                                            </div>
                                            <div class="form-group col-md-2 mb-2">
                                                <div class="col-12">
                                                <span id="tag_pic" title="Tag Employee" style="margin: 3px; color:#1e9ff2;position:absolute!important;right: 21px!important;">
                                                    <a onclick="$('#tag_id').toggle()">
                                                        <i class="fa fa-user-plus fa-2x"></i>
                                                    </a>
                                                </span>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="SaveReplay()">
                                                    <i class="la la-check-square-o"></i> إرسال
                                                </button>
                                                </div>
                                            </div>
                                        </div>
    
    
                                    </form>
                                
                                @else
                                
                                <div class="card-content collpase show ResponseList">
                                    <div class="card-body">
                                        <div class="row"
                                            style="background-color: #ffffff; margin-bottom:20px;    margin-left: 15px;margin-right: 15px;">
                                            <div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">
                                                <span class="avatar" style="width: 60px;">
                                                    <img src="{{ $lastTicket->receive_image }}"
                                                        style="border: 1px solid #c7c7c7;padding: 2px; max-height:60px;">
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-3 marginrightminus30 infoAvatar">
                                                <a style="color:#385898;font-weight: 600;">{{ $lastTicket->receive_name }}</a>
                                                <br>
                                                <time class="fs14">
                                                    {{ date('d/m/Y',strtotime($lastTicket->created_at)) }}
                                                    <br>
                                                    {{ date('H:i',strtotime($lastTicket->created_at)) }} </time>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-7 marginrightminus30">
                                                <h5>
                                                    @if($numberOf_ticket<=1)
                                                    <a class="btn btn-primary" onclick="deleteTicket(<?php echo $lastTicket->ticket_id?>,<?php echo $lastTicket->related ?>);">حذف الطلب </a>
                                                    @endif
                                                    
                                                    <time style="font-family:Arial!important; color:#000000; font-size: 17px !important;font-weight: 500;">
                                                       
                                                    </time>
                                                </h5> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body"
                                        style="background-color: #F4F5FA; min-height:15px;padding-top: 0;padding-bottom: 0rem;">
                                    </div>
                                </div>
                                @endif
                            @elseif(is_array($emp_to_reopen_ticket) && in_array(Auth()->user()->id,$emp_to_reopen_ticket))
                             
                                <form onsubmit="return false" id="formData" class="frm1" method="post" style=" margin-left: 15px; margin-right: 15px;">
                                    <div class="form-control" style="background-color: #ffffff; margin-bottom:20px; border:0px solid #000000 !important">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">
                                                <span class="avatar" style="width: 60px;">
                                                    <img src="{{Auth()->user()->image}}" style="max-height: 60px;border: 1px solid #c7c7c7;padding: 2px;">
                                                    <input name="trans_id" type="hidden" value="{{$ticket->active_trans  }}">
                                                    <input name="ticket_id" type="hidden" value="{{$ticket->id  }}">
                                                    <input name="app_type" type="hidden" value="{{$ticket->ticket_type  }}">
                                                    
                                                    <input type="hidden" name="tiketName" id="tiketName" value="{{ $config[0]->ticket_name }}">
                                                    <input type="hidden" name="tiketAppNo" id="tiketAppNo" value="({{ $ticket->app_no }})">
                                                    <input type="hidden" name="tiketrelated" id="tiketrelated" value="{{ $config[0]->ticket_no }}">
                                                    <input type="hidden" name="subscriberName1" id="subscriberName1" value="{{ $ticket->customer_name }}">
                                                    <input type="hidden" name="subscriberId1" id="subscriberId1" value="{{ $ticket->customer_id }}">
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-10 marginrightminus15 infoAvatar">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <a style="color:#385898;font-weight: 600;">{{Auth()->user()->nick_name}}</a>
                                                    </div>
                                                    
                                                    <div class="col-sm-7">
                                                        <div class="form-group status">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">
                                                                            حالة الطلب
                                                                        </span>
                                                                </div>
                                                                <select type="text" id="app_status" name="app_status" class="app_status form-control" onchange="$('#app_status1').val($(this).val())">
                                                                    <option value="5002"> تغيير حالة الطلب  </option>
                                                                    @foreach ($helpers['appStatus'] as $row)
                                                                    <option value="{{$row->id}}"> {{$row->name}} </option>
                                                                    @endforeach
                            									</select>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text input-group-text2 hidemob" onclick="ShowConstantModal(5001,'app_status','حالة الطلب')">
                                                                        <i class="fa fa-external-link"></i>
                                                                    </span>
                                                                    
                                                                    <img src="https://db.expand.ps/images/upload.png"  height="35" onclick="$('.repAttach').toggle();$('.repAttach1').toggle()">
                                                                </div>
                                                                <input type="hidden" id="app_status1" name="app_status1" value="5002">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <textarea type="text" id="details" name="details" class="form-control" placeholder="سيتم إعادة فتح التكت بناء على النص هنا" rows="3" aria-invalid="false" style="border: none!important;box-shadow: none; text-align: right;"></textarea>
                                                
                                                    <input type="hidden" id="details1" name="details1">
                                                </div>
                                            </div>
                                        </div>
                                        @include('dashboard.includes.attachment1')
                                        <div class="row" style="padding-top:45px; text-align: center;width:100%">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    
                                                                </div>
                                                                <div class="col-md-3" style="color:#000000; width:33%;">
                                                                    <img src="https://doc.expand.ps/uploads/s1.jpg?>" id="makeResponse" height="32px" style="cursor: pointer" onclick="CloseApp(this);">
                                                                        <br>
                                                                        <spna class="saveRmob">حفظ ما تم عملة</spna>
                                                                </div>
                                                                
                                                                <div class="col-md-3" style="color:#000000; width:33%;">
                                                                    <img src="https://doc.expand.ps/uploads/s4.jpg" height="32px" onclick="$('#forwordTo').show();$('html, body').animate({scrollTop:$(document).height()}, 'slow');">
                                                                    <br>
                                                                    <spna class="sendRmob">تحويل إلى موظف</spna>
                                                                </div>
                                                                <div class="col-md-4" style="color:#000000; width:33%;">
                                                                    <input type="hidden" name="dept" value="8">
                                                                    <img src="https://doc.expand.ps/uploads/s3.jpg" height="32px" onclick="$('#app_status1').val(5003);CloseApp(this)">
                                                                    <br>
                                                                    <spna class="closeRmob">إغلاق الطلب بشكل نهائي</span>
                                                                </div>
                                                                
                                                                <div class="col-md-1">
                                                                    
                                                                </div>
                                                            </div>
                                                    
                                                            &nbsp;
                                                            &nbsp;
                                                            
                                                            
                                                            &nbsp;
                                                            &nbsp;
                                                            
                                                            
                                                        </div>
                                                    </div>
                            
                                            </div>
                                    </div>
                                </form> 
                                <form onsubmit="return false" class="form frm2" method="post" id="forwordTo" style="margin-left: 15px; margin-right: 15px;display: none">
                                        <input name="trans_id" type="hidden" value="{{$ticket->active_trans  }}">
                                        <input name="ticket_id" type="hidden" value="{{$ticket->id  }}">
                                        <input name="app_type" type="hidden" value="{{$app_type  }}">
                                        <input name="related" type="hidden" value="{{$ticket->history[0]->related  }}">
                                        <div class="attachCopy" style="display:none"></div>
                                        <textarea style="display:none" name="s_response" id="frm2details"></textarea>
    
                                        <div class="row mobRow">
                                                <div class="col-lg-6 col-md-5 pr-s-12">
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87 mt-s-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{"اختر القسم"}}</span>
                                                            </div>
                                                            <select type="text" id="AssDeptID" name="AssDeptID"
                                                                class="form-control myselect2" aria-invalid="false"
                                                                onchange="ShowDeptEmp()">
                                                                <option disabled="" selected=""> -- اختيار القسم -- </option>
                                                                @foreach ($helpers['department'] as $dept)
                                                                <option value="{{$dept->id}}">{{$dept->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                function ShowDeptEmp() {
                                                                    dept = $("#AssDeptID").val()
                                                                    $(".allDept").addClass("hide");
                                                                    $(".dept" + dept).removeClass("hide");
    
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-6 col-md-6 pr-s-12">
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87 mt-s-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{"اختر الموظف"}}</span>
                                                            </div>
                                                            
                                                            <select type="text" id="Assigned2ID"  name="AssignedToID"
                                                                class="form-control myselect2" aria-invalid="false">
                                                                <option disabled="" selected=""> -- اختيار الموظف -- </option>
                                                                @foreach ($employees as $emp)
                                                                <option class="allDept hide dept{{$emp->department_id}}"  value="{{$emp->id}}" dept="{{$emp->department_id}}" >{{$emp->nick_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <!--<input type="text" id="SubscriberName" class="form-control  alphaFeild" placeholder="Subscriber Name " name="SubscriberName">-->
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
    
                                        <style>
                                            .Priority {
                                                padding: 0;
                                                position: relative;
                                                left: 0;
                                                line-height: 39px;
                                                float: left;
                                            }
    
                                            .rate {
                                                width: auto;
                                                position: relative;
                                                float: left;
                                                height: 40px;
                                                margin-top: -3px;
                                            }
    
                                            .Photo {
                                                position: relative;
                                                top: 0;
                                                float: left;
                                                right: 0;
                                            }
    
                                            .onoffswitch {
                                                float: left;
                                                margin-top: 10px;
                                                width: 60px;
                                            }
    
                                            .onoffswitch-switch {
                                                margin-top: -2px;
                                                left: 0;
                                            }
    
                                            .onoffswitch-inner:before {
                                                text-align: center;
                                            }
    
    
                                            .onoffswitch-switch {
                                                margin-top: 4px;
                                                height: 18px;
                                                width: 18px;
                                            }
    
                                            .rate:not(:checked)>label {
                                                font-size: 30px !important;
                                            }
    
                                        </style>
    
    
                                        <div class="row hideMob" style="margin-top: 1.2%;">
                                            <div class="form-group col-md-3 mb-2"> </div>
                                            <div id="static24Clock" style="display:block;"
                                                class="form-group image-responsive col-md-6 mb-2">
                                                <img src="https://db.expand.ps/images/24-hours-active-1-766936.png"
                                                    style="margin-right: 25%;" alt="24 hours">
    
                                                <input
                                                    style="border:0px solid #fff;position: relative;bottom: -43px;width: 39px;right: -34px;text-align: right;font-size: 32px !important;color: #347ABD;padding: 0px;font-weight: bold;"
                                                    placeholder="00" id="restHrs">
                                            </div>
                                            <div id="staticClock" style="display:none;" class="form-group col-md-6 mb-2">
                                                <img src="https://db.expand.ps/images/clock.png" width="15%"
                                                    style="padding-top:5px;float: left;margin-left: 5%;">
                                                <table width="80%" align="left">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%" align="right"><input type="text" id="hourNumber"
                                                                    class="form-control" name="hourNumber" value="48"
                                                                    style="background: transparent; border: none; -webkit-box-shadow: none; box-shadow: none; border-radius: 0; text-align:center; font-size:20pt !important; font-weight:bold; color:red">
                                                            </td>
                                                            <td width="50%" align="left"><span
                                                                    style="font-size:20pt; font-weight:bold; color:red">ساعة</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
    
                                        <div class="row hideMob" style="margin-top: -10px;">
                                            <div class="form-group col-md-3 mb-2"></div>
                                            <div class="form-group col-md-6 mb-2 text-center">
                                                <div style="display: inline-block;">
                                                    <div class="rate">
                                                        <input type="radio" id="star5" name="rate" value="5">
                                                        <label for="star5" title="5">{{"5 stars"}}</label>
                                                        <input type="radio" id="star4" name="rate" value="4">
                                                        <label for="star4" title="4">{{"4 stars"}}</label>
                                                        <input type="radio" id="star3" name="rate" value="3">
                                                        <label for="star3" title="3">{{"3 stars"}}</label>
                                                        <input type="radio" id="star2" name="rate" value="2">
                                                        <label for="star2" title="2">{{"2 stars"}}</label>
                                                        <input type="radio" id="star1" name="rate" value="1">
                                                        <label for="star1" title="1">{{"1 star"}}</label>
                                                    </div>
                                                    <span class="Priority">{{"الأهمية:"}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
    
                                            <div class="form-group col-md-12" style="text-align:center">
                                                <span class="hideMob" style="margin: 3px;color:#1e9ff2">&nbsp;</span>
                                                <span title="Force an image" class="hideMob" style="margin: 3px;color:#1e9ff2"
                                                    onclick="ChangeState1($(this))">
                                                    <input type="hidden" name="enablePhoto" value="0" id="enablePhoto1">
                                                    <img src="https://db.expand.ps/images/c1.png" id="enablePhotoImg1"
                                                        style=" margin-bottom: 13px;">
                                                </span>
                                                <span title="Recive Notification" class="hideMob" style="margin: 3px;color:#1e9ff2"
                                                    onclick="ChangeState($(this))">
                                                    <input type="hidden" id="hasNotify" name="hasNotify" value="0">
                                                    <i class="fa fa-bell fa-2x"></i>
                                                </span>
                                                <span title="Tag Employee" style="margin: 3px; color:#1e9ff2;">
                                                    <a onclick="$('#tag_id').toggle()">
                                                        <i class="fa fa-user-plus fa-2x"></i>
                                                    </a>
                                                </span>
    
                                                <span title="Select vehicle" style="margin: 3px; color:#1e9ff2; display:none">
                                                    <a href="#vehicle-popup" alt="Choose Your Vehicle"
                                                        title="Choose Your Vehicle">
                                                        <i class="fa fa-car-side fa-2x"></i>
                                                    </a>
                                                </span>
                                                <span title="Pick tools" style="     margin: 3px;color:#1e9ff2; display:none">
                                                    <a onclick="showCart();">
                                                        <i class="fa fa-shopping-cart fa-2x"></i></a>
                                                </span>
    
                                                <span title="Returned tools after"
                                                    style="margin: 3px;color:#1e9ff2; display:none">
                                                    <a onclick="showReturn();">
                                                        <img style="    height: 34px;     margin-bottom: 13px; width: 34px;"
                                                            src="https://db.expand.ps/images/icon/icons8-return-48.png">
                                                    </a> </span>
    
                                            </div>
    
    
    
                                        </div>
    
                                        <div class="row " id="tag_id" style="height: 60px;display:none">
                                            <div class="col-md-12">
                                                <div class="form-group paddformmob">
                                                <div class="input-group"
                                                    style="height: 40px !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">{{"نسخة إلى"}}</span>
                                                    </div>
                                                    <select id="tags" name="tags[]"
                                                        class="select2 form-control select2-hidden-accessible" multiple=""
                                                        data-toggle="select" style="width:100%;"
                                                        data-select2-id="select2-data-tags" tabindex="-1" aria-hidden="true">
                                                        @foreach ($employees as $emp)
                                                        <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                ملاحظات
                                                            </span>
                                                        </div>
                                                        <textarea type="text" id="note" class="form-control"
                                                            placeholder="أدخل ملاحظاتك" name="note"
                                                            style="height: 35px;"></textarea>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row" style="    text-align: center;">
                                            <div class="form-group col-md-5 mb-2">
                                            </div>
                                            <div class="form-group col-md-2 mb-2">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="SaveReplay()">
                                                    <i class="la la-check-square-o"></i> إرسال
                                                </button>
                                            </div>
                                        </div>
    
    
                                    </form>
                               
                                
                            @endif
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
            </div>
    </section>
    
<div class="modal fade text-left" id="ticketSMSModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog" STYLE="max-width: 40%!important;"  role="document">
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
    							    <input type="text" name="ticketSMSNo" id="ticketSMSNo" class="form-control"  />
    							    <input type="text" name="reciver_name" id="reciver_name" class="form-control"  />
    							    <input type="text" name="SMSapp_id" id="SMSapp_id" class="form-control"  />
    							    <input type="text" name="app_type" id="app_type" class="form-control"  />
    							</td>
    						</tr>
    						<tr>
    							<td>
    							    أدخل نص الرسالة
    							</td>
    						</tr>
    						<tr>
    							<td>
    							    <input type="text" name="smsText" id="smsText" class="form-control" />
    							</td>
    						</tr>
    						<tr>
    							<td colspan="4" style="text-align: center;">
    							    <button type="button" class="btn btn-primary" id="" style="" onclick="sendSMS()">
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

    @include('dashboard.component.tasks_table')
    
    @if( $config[0]->ticket_no==32||$config[0]->ticket_no==28)
    @include('dashboard.component.employee_archive')
    @else
    @include('dashboard.component.subscribe_archive')
    @endif
    
    {{--
<div class="row" style="direction: ltr;">
    <pre style="direction: ltr; text-align: left">
        <?php print_r($ticket->subscription); ?> 
    </pre>  
</div>    
--}}

@stop
@section('script')


    {{-- <script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"
        type="text/javascript"></script> --}}
    {{-- <script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript">

    </script> --}}
  
<script>

function changeVasTitle(){
    if($('#CurrVas').val()==42) {
        $('.vasTitle').text('سعر الامبير 1 فاز');
        $('#ampereCost').val('{{$ticket->ampereCost1Vas}}');
    }else{
        $('.vasTitle').text('سعر الامبير 3 فاز');
        $('#ampereCost').val('{{$ticket->ampereCost3Vas}}');
    }
    calcAmpereCost();
}

function calcAmpereCost(){
    NewAmpere=$('#NewAmpere').val();
    $('#ampereCount').val(NewAmpere);
    
   ampereTotalCost= $('#ampereCost').val()*NewAmpere;
   $('#ampereTotalCost').val(ampereTotalCost);
   
   calcTotal();
}

        @if($config[0]->ticket_no==8)
        Applicanttype=1;
        Applicanttype=('{{ $ticket->Applicanttype}}');
        {
            if('{{ $ticket->Applicanttype}}'==2)
            $('.Acting').show();
        }
        @endif

    if( {{$config[0]->ticket_no}}==32||{{$config[0]->ticket_no}}==28)
        getempArchive($('#subscriber_id').val());
    else
        getsubscriperArchive($('#subscriber_id').val());

	function getsubscriperArchive($id) {

            let subscribe_id = $id;

            $.ajax({

                type: 'get',

                // the method (could be GET btw) 

                url: "{{route('subscribe_info')}}",

                data: {

                    subscribe_id: subscribe_id,

                },

                success: function(response) {
                   
                    if (response.status!=false) {  

                        @can('subscriberContractArchive')    
                        getContractArchive(response.info.id,response.contractArchiveCount);
                        // $archiveCount+=response.contractArchiveCount;
                        @endcan
                        
                        @can('subscriberLicArchive')    
                        getLicArchive(response.info.id,response.licArchiveCount);
                        // $archiveCount+=response.licArchiveCount;
                        @endcan
                        
                        @can('subscriberOutArchive')
                        getOutArchive(response.info.id,response.outArchiveCount);
                        // $archiveCount+=response.outArchiveCount;
                        @endcan
                        
                        @can('subscriberInArchive')
                        getInArchive(response.info.id,response.inArchiveCount);
                        // $archiveCount+=response.inArchiveCount;
                        @endcan
                        
                        getCert(response.info.id,response.certCount);
                        // $archiveCount+=response.certCount;
                        
                        @can('subscriberOtherArchive')
                        getOtherArchive(response.info.id,response.otherArchiveCount);
                        // $archiveCount+=response.otherArchiveCount;
                        @endcan
                        
                        @can('subscriberCopyArchive')
                        getCopyArchive(response.info.id,response.copyToCount);
                        // $archiveCount+=response.copyToCount;
                        @endcan
                        
                        @can('subscriberJalArchive') 
                        getJalArchive(response.info.id,response.linkToCount);
                        // $archiveCount+=response.linkToCount;
                        @endcan
    
                       
                        
                    }else{
                        // window.location = "{{route('deptNotAllowed')}}";
                    }
                },

            });

        }
	
	function getempArchive($id)
    {           

    let emp_id = $id;
    $.ajax({
        type: 'get', // the method (could be GET btw)
        url: "{{route('emp_info')}}",
        data: {
            emp_id: emp_id,
        },
        success:function(response){
            if (response.status!=false) {
                
                @can('empContractArchive')    
                getContractArchive(response.info.id,response.contractArchiveCount);
                // $archiveCount+=response.contractArchiveCount;
                @endcan
                
                @can('empOutArchive')
                getOutArchive(response.info.id,response.outArchiveCount);
                // $archiveCount+=response.outArchiveCount;
                @endcan
                
                @can('empInArchive')
                getInArchive(response.info.id,response.inArchiveCount);
                // $archiveCount+=response.inArchiveCount;
                @endcan
                
                @can('empOtherArchive')
                getOtherArchive(response.info.id,response.otherArchiveCount);
                // $archiveCount+=response.otherArchiveCount;
                @endcan
                
                @can('empCopyArchive')
                getCopyArchive(response.info.id,response.copyToCount);
                // $archiveCount+=response.copyToCount;
                @endcan
                
                @can('empJalArchive') 
                getJalArchive(response.info.id,response.linkToCount);
                // $archiveCount+=response.linkToCount;
                @endcan
                    
                
            }else{
                // window.location = "{{route('deptNotAllowed')}}";
            }
        },
    });
}


if( {{$config[0]->apps_btn}}==1)
    getSubscriberTasks($('#subscriber_id').val());
    
function getSubscriberTasks(id){
    
        let subscribe_id = id;

            $.ajax({

                type: 'get',
                
                url: "{{route('subscriber_tasks')}}",

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
/////////////////////////for Production////////////////////////////////////////////////

smstext='';
function sendSMS(){
    // $('.loader').show()
    if($('#smsText').val().length==0){
        $('#smsText').addClass('error');
        return;
    }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
                'ContentType': 'application/json'
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData={
                'smsText':$('#smsText').val(),
                'smsNo':$('#smsNo').val(),
                'subscriber_name':$('#subscriber_name').val(),
                'ticket_id':$('#app_id').val(),
                'ticketNo':$('#tiketrelated').val(),
                'app_type':$('#app_type').val(),
            }
        $.ajax({
            type: "post",
            url: "{{route('directAddSmsLog')}}",
            ContentType: 'application/json',
            data: formData,
            dataType:'json',
            success: function (data) {
                if(data.smsStatus=='1001'){
                    Swal.fire(
                      'تم ارسال رسالة نصية ',
                      'success'
                    )
                    let text = $('#smsText').val();
                    let no= $('#smsNo').val();
                    
                    
                    $("#details").val(`تم ارسال رسالة نصية الى الرقم : ${no} <br>  ${text} `)
                    smstext=`تم ارسال رسالة نصية الى الرقم : ${no} <br>  ${text} `;
                    
                    var d=new Date();
                    $('#responseList').append('<div class="card-content collpase show ResponseList">'
                                +'<div class="card-body">'
                                +'    <div class="row" style="background-color: #ffffff; margin-bottom:20px;    margin-left: 15px;">'
                                +'        <div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">'
                               +'             <span class="avatar" style="width: 60px;">'
                                +'                <img src="{{Auth()->user()->image}}" style="border: 1px solid #c7c7c7;padding: 2px; max-height:60px;">'
                                +'            </span>'
                                +'        </div>'
                                +'        <div class="col-sm-12 col-md-3 marginrightminus15  infoAvatar">'
                                +'            <a style="color:#385898;font-weight: 600;">{{Auth()->user()->nick_name}}</a>'
                                +'            <br>'
                                +'            <time class="fs14">'
                                +'               '+(d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear())
                                +'                <br>'
                                +'                '+(d.getHours()+':'+d.getMinutes())+' </time>'
                                +'        </div>'
                                +'        <div class="col-sm-12 col-md-7 marginrightminus30">'
                                 +'<h5>'
                                +'                <time style="font-family:Arial !important; color:#000000; font-size: 17px !important;font-weight: 500;">'
                                 +''+smstext
                                 +'               </time>'
                                 +'           </h5>'
                                +' </div>'
                                +'    </div>'
                                +'</div>'
                                +'<div class="card-body" style="background-color: #F4F5FA; min-height:15px;padding-top: 0;padding-bottom: 0rem;">'
                                +'</div>'
                           +' </div>');
                    
                    $("#smsModal").modal('hide')
                    $('#smsText').val(' ');
                    $('#smsNo').val(' ')
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                }else{
                    Swal.fire({
        				position: 'top-center',
        				icon: 'success',
        				title: 'خطأ',
        				showConfirmButton: false,
        				timer: 1500
        				});
        				return false;
                }
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
            },
            error:function(){
                return false;
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
                $(".loader").addClass('hide');
            },
        });
}

//////////////////////////////////////////////////////////////////////////////////////
 if (window.matchMedia('(max-width: 767px)').matches) {
        $('.saveRmob').html('حفظ');
        $('.sendRmob').html('تحويل');
        $('.closeRmob').html('اغلاق');
}
function CloseApp(ctrl=''){
    
    if($(".frm1 #app_status1").val()==5003){
        Swal.fire({
          title: 'هل انت متأكد من اغلاق الطلب بشكل نهائى؟',
          text: "",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'نعم',
          cancelButtonText: 'لا',
        }).then((result) => {
          if (result.isConfirmed) {
                addAction(ctrl ='')
                
                
          }else if (result.dismiss === Swal.DismissReason.cancel) {
            return false;
          }
        })
    }
    if($(".frm1 #app_status1").val()!=5003)
        addAction(ctrl ='')
    
}
function addAction(ctrl ='',accepted=0){
    if(/*$(".frm1 #app_status1").val()=='5002' &&*/ $("#details").val().length==0)
        {
            Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: 'الرجاء كتابة رد قبل عمل حفظ',
    				showConfirmButton: false,
    				timer: 1500
    				});
    				return;
        }
    if(ctrl!='')
        $(ctrl).hide()
        
            if($(".frm1 #app_status1").val()!=5002){
                if(accepted==0 && $('#tiketrelated').val()!=32)
                    $("#details1").val('<br /> تم تغيير حالة الطلب إلى: '+
                        ($(".frm1 #app_status1").val()==5003?'إغلاق نهائي':$(".frm1 #app_status option:selected").text() ) );
                else if(accepted==0 && $('#tiketrelated').val()==32)
                    $("#details1").val('<br /> تم تغيير حالة الطلب الى رفض و: '+
                        ($(".frm1 #app_status1").val()==5003?'إغلاق نهائي':$(".frm1 #app_status option:selected").text() ));
                else
                    $("#details1").val('<br /> تم تغيير حالة الطلب الى موافقة و: '+
                        ($(".frm1 #app_status1").val()==5003?'إغلاق نهائي':$(".frm1 #app_status option:selected").text() ));
            }
                txt=$(".frm1 #app_status1").val()==5002 || $(".frm1 #app_status1").val()==5003?'':'<br />'+$("#details1").val()
    $('.loader').show()
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($(".frm1")[0]);
        $.ajax({
            url: '{{url('ar/admin/addReplay')}}',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                attachRow='';
                $(".attachName1").each(function(){
                    if($(this).val().length>0){
                        // console.log($(this).parent().next().children().first().children().first().children().first().children().first().html($(this).val()))
                        attachRow+='<div class="col-sm-6">'+$(this).parent().next().children().first().html()+'</div>';
                        console.log($(this).parent().next().children().first().html() + '    '+$(this));
                        $(this).parent().next().children().first().html(' ')
                    }
                });
                resetAttach()
                var d=new Date();
                $('#responseList').append('<div class="card-content collpase show ResponseList">'
                                +'<div class="card-body">'
                                +'    <div class="row" style="background-color: #ffffff; margin-bottom:20px;    margin-left: 15px;">'
                                +'        <div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">'
                               +'             <span class="avatar" style="width: 60px;">'
                                +'                <img src="{{Auth()->user()->image}}" style="border: 1px solid #c7c7c7;padding: 2px; max-height:60px;">'
                                +'            </span>'
                                +'        </div>'
                                +'        <div class="col-sm-12 col-md-3 marginrightminus15  infoAvatar">'
                                +'            <a style="color:#385898;font-weight: 600;">{{Auth()->user()->nick_name}}</a>'
                                +'            <br>'
                                +'            <time class="fs14">'
                                +'               '+(d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear())
                                +'                <br>'
                                +'                '+(d.getHours()+':'+d.getMinutes())+' </time>'
                                +'        </div>'
                                +'        <div class="col-sm-12 col-md-7 marginrightminus30">'
                                 +'<h5>'
                                +'                <time style="font-family:Arial !important; color:#000000; font-size: 17px !important;font-weight: 500;">'
                                 +''+$(".frm1 #details").val()+txt
                                 +'               </time>'
                                 +'           </h5>'
                                +' </div>' +attachRow 
                                +'    </div>'
                                +'</div>'
                                +'<div class="card-body" style="background-color: #F4F5FA; min-height:15px;padding-top: 0;padding-bottom: 0rem;">'
                                +'</div>'
                           +' </div>');
                if( $('#app_status1').val()==5003){
                  Swal.fire({
    				position: 'top-center',
    				icon: 'success',
    				title: 'تم إغلاق الطلب بنجاح',
    				showConfirmButton: false,
    				timer: 1500
    				});
    				if(data.app_type==1){
        				Swal.fire({
                          title: 'هل تريد اضافة الاشتراك للمواطن؟',
                          text: "",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'نعم',
                          cancelButtonText: 'لا',
                        }).then((result) => {
                          if (result.isConfirmed) {
                              
                                writeUserForward('viewTicket/'+data.app_id+'/'+data.app_type);
                				$('.frm2').trigger('reset');
                                $('.loader').hide()
                				setTimeout(function(){self.location='{{asset('/ar/admin')}}'+'/addSubscription'+'/'+data.app_id+'/'+data.app_type},1500)
                                
                          }else if (result.dismiss === Swal.DismissReason.cancel) {
                            writeUserForward('viewTicket/'+data.app_id+'/'+data.app_type);
            				$('.frm2').trigger('reset');
                            $('.loader').hide()
            				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
                          }
                       
                        })
    				}else{
    				
        				writeUserForward('viewTicket/'+data.app_id+'/'+data.app_type);
        				$('.frm2').trigger('reset');
                        $('.loader').hide()
        				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
    				    
    				}
                }	
				else{
                Swal.fire({
        				position: 'top-center',
        				icon: 'success',
        				title: 'تم حفظ البيانات بنجاح',
        				showConfirmButton: false,
        				timer: 1500
        				})
				    
				}
        				writeRespondApp('viewTicket/'+data.app_id+'/'+data.app_type, ''+data.receiverid+'',txt)
        				$('.frm1').trigger('reset');
        				$("#details1").val('');
        				// setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
            	if(ctrl!='')
                $(ctrl).show()
    $('.loader').hide()
                
            },
            error:function(){
                if(ctrl!='')
                    $(ctrl).show()
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
    $('.loader').hide()
            },
            cache: false,
            contentType: false,
            processData: false
        });
}

function deleteTicket($id,$related){
    Swal.fire({
      title: 'تأكيد حذف',
      text: "هل تريد بالتأكيد حذف الطلب, لا يمكن التراجع عن عملية الحذف",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'تأكيد الحذف',
      cancelButtonText: 'إلغاء الأمر'
    }).then((result) => {
    if (result.isConfirmed) {
        $('.loader').show()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
                'ContentType': 'application/json'
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData={
                "related":$related,
                "ticket_id" : $id,
            }
        console.log('{{route('TicketDel')}}')
        $.ajax({
            type: "put",
            url: "{{route('TicketDel')}}",
            ContentType: 'application/json',
            data: formData,
            dataType:'json',
            success: function (data) {
                if(data.success){
                
            Swal.fire(
              'تم الحذف',
              'تم حذف الطلب بنجاح.',
              'success'
            )
        				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
                }
                else
                {
                    Swal.fire({
        				position: 'top-center',
        				icon: 'success',
        				title: 'خطأ',
        				showConfirmButton: false,
        				timer: 1500
        				})
                }
                    $('.loader').hide()
            },
            error:function(){
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
    $('.loader').hide()
            },
            /*cache: false,
            contentType: false,
            processData: false*/
        });
  }
    })
}
function closeVac($id,$related,$status)
{
    if($status==0)
    {
        $('#app_status1').val(5003);
        CloseApp(this);
        return true;
    }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
                'ContentType': 'application/json'
            }
        });
        
        if($status==1){
            Swal.fire({
              title: 'هل انت متأكد من اغلاق الطلب والموافقة ؟',
              text: "",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'نعم',
              cancelButtonText: 'لا',
            }).then((result) => {
                if (result.isConfirmed) {
                  
                    $(".loader").removeClass('hide');
                    $(".form-actions").addClass('hide');
                    var formData={
                            "related":$related,
                            "ticket_id" : $id,
                        }
                    $.ajax({
                        type: "put",
                        url: "{{route('updateVac')}}",
                        ContentType: 'application/json',
                        data: formData,
                        dataType:'json',
                        success: function (data) {
                            if(data.success){
                                
                                Swal.fire(
                                  'تم خصم الاجازة',
                                  'success'
                                )
                                
                                $('#app_status1').val(5003);
                                addAction(this,1);
                			    setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
                            }
                            else
                            {
                                Swal.fire({
                    				position: 'top-center',
                    				icon: 'success',
                    				title: 'خطأ',
                    				showConfirmButton: false,
                    				timer: 1500
                    				});
                    				return false;
                            }
                                $('.loader').hide()
                        },
                        error:function(){
                            return false;
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $(".loader").addClass('hide');
                            $(".form-actions").removeClass('hide');
                            $('.loader').hide()
                        },
                    });
                    
                    
                    
              }else if (result.dismiss === Swal.DismissReason.cancel) {
                return false;
              }
            })
        }
        
        
}
function SaveReplay(){
    $(".frm1 .attachName1").each(function(){
        $(".frm2 .attachCopy").append('<input type="hidden" name="attachName1[]" value="'+$(this).val()+'">')
        $(".frm2 .attachCopy").append('<input type="hidden" name="attach_ids[]" value="'+$(this).parent().next().children().first().children().first().children().first().next().val()+'">')
    });
    $("#frm2details").val($(".frm1 #details").val());
    $('.loader').show()
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($(".frm2")[0]);
        
    //     $(".frm1 #attach_ids").each(function(){
    //         console.log($(this).val())
    //         console.log('__________________________')
    //         console.log($(this))
    //     })

    //     var attach_ids = $("input[name='attach_ids[]']")
    //           .map(function(){return $(this).val();}).get();
         
    //     for(i =0 ; i<attach_ids.length ;i++) { 
    //         formData.append('attach_ids[]',attach_ids[i]) 
    //     }
        
    //     var attachName1 = $("input[name='attachName1[]']")
    //           .map(function(){return $(this).val();}).get();
              
    //   for(i =0 ; i<attachName1.length ;i++) { 
    //         formData.append('attachName1[]',attachName1[i]) 
    //     }
        
        // console.log(formData.getAll('attachName1'));
        
        $.ajax({
            url: '{{url('ar/admin/addTrans')}}',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                
                Swal.fire({
        				position: 'top-center',
        				icon: 'success',
        				title: 'تم التحويل بنجاح',
        				showConfirmButton: false,
        				timer: 1500
        				})
     writeUserForward('viewTicket/'+data.app_id+'/'+data.app_type)
        				$('.frm2').trigger('reset');
    $('.loader').hide()
        				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
        				//setTimeout(function(){self.location='{{url('ar/admin/')}}'},1200)
                
            },
            error:function(){
    $(ctrl).show()
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
    $('.loader').hide()
            },
            cache: false,
            contentType: false,
            processData: false
        });
}

attach_index={{ sizeof($ticket->Files)}};
    function addNewAttatch() {
        // if($(".attachName").last().val().length>0){
            var row = '<li style="font-size: 17px !important;color:#000000">' +
                '<div class="row">' +
                '<div class="col-sm-5 attmob">' +
                '<input type="text" {{$config[0]->force_attach==1?"reuired":"" }} id="attachName[]" name="attachName[]" class="form-control attachName">' +
                '</div>' +
                '<div class="attdocmob col-sm-5 attach_row_'+attach_index+'">' +
                //'<input type="text" name="feesValue2" class="form-control" disabled="disabled">' +
                '</div>' +
                '<div class="col-sm-2 attdelmob">' +
                '<img src="{{ asset('assets/images/ico/upload.png') }}" width="40" height="40" style="cursor:pointer" onclick="$(\'#currFile\').val('+attach_index+');$(\'#attachfile\').trigger(\'click\'); addNewAttatch(); return false">' +
                
                '<i class="attdelmob fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; " onclick="$(this).parent().parent().parent().remove()"></i>'+
                '</div>' +
                ' </div>' +
               
                ' </li>'
                attach_index++
            $(".addAttatch").append(row)
        // }
    }
    
    
function startUpload(formDataStr)
    {
        id=$("#currFile").val()
        // $('#feesText'+id).val($('#attachfile').val().split('\\').pop())
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($("#"+formDataStr)[0]);
        $.ajax({
            url: '{{url('ar/admin/uploadTicketAttach')}}',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                row='';
                console.log(data.all_files);
                if(data.all_files){
                    addNewAttatch()
                    var j=0;
                    $actionBtn='';
                    for(j=0;j<data.all_files.length;j++){
                        $(".attach_row_"+id).html('')
                        file=data.all_files[j]
                        shortCutName=data.all_files[j].real_name;
                        shortCutID=data.all_files[j].id;
                        urlfile='{{asset('')}}';
                        console.log(urlfile);
                        urlfile+=data.all_files[j].url;
                        console.log(urlfile);
                         shortCutName=file.real_name;
                                shortCutName=shortCutName.substring(0, 15);
                                urlfile='{{asset('')}}';
                                urlfile+=file.url;
                                if(file.extension=="jpg"||file.extension=="png")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/image.png';
                                else if(file.extension=="pdf")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/pdf.png';
                                else if(file.extension=="doc")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(file.extension=="excel"||file.extension=="xsc")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/excellogo.png';
                                else
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/file.png';
                                $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                    +'<div class="attach">'                                        
                                      +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'  <span class="attach-text ">'+shortCutName+'</span>'
                                        +'    <img style="width: 20px;"src="'+fileimage+'">'
                                        +'</a>'
                                        +'<input type="hidden" id="attach_ids[]" name="attach_ids[]" value="'+file.id+'">'
                                    +'</div>'
                                    +'</div>'; 
                            $actionBtn += '</div>';
                    }
                    $(".alert-danger").addClass("hide");
                    $(".alert-success").removeClass('hide');
                    $(".attach_row_"+id).append($actionBtn)
                    $(".loader").addClass('hide');
                    
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
</script>  
<script>
    var lastCntr = 3;

    function calcTotal() {
        total = 0;
        $(".FessVals").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#total').val(total)

    }

    function addExtraRow() {
        if($(".feesText").last().val().length>0){
            var row = '<li style="font-size: 17px !important;color:#000000"><div class="row">' +
                '<div class="col-sm-8 feestextmob ">' +
                '<input type="text" onblur="addExtraRow()" class="form-control feesText" name="feesText[]" value=""> ' +
                '</div>' +
                '<div class="col-sm-3 feesnummob ">' +
                '<input type="number" name="feesValue[]" id="feesValue[]" class="form-control FessVals"onblur="calcTotal()" onchange="calcTotal()"> ' +
                '</div>' +
                '</div></li>'
            lastCntr++
            $(".addRec").append(row)
            setTimeout(function(){$(".feesText").last().focus},900)
            
        }
    }
    
    $(document).ready(function () {
            

        $( ".debtEmp" ).autocomplete({
    		source:'{{route('emp_auto_complete')}}',
    		minLength: 1,
            select: function( event, ui ) {
                // var currentIndex=$("input[name^=debtEmpID]").length -1;
                // $('input[name="debtEmpID[]"]').eq(currentIndex).val(ui.item.id);
    		}
    	});
    });
    function calcDebtTotal() {
        
        total = 0;
        $(".debtValue").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#debtTotal').val(total)

    }
    function calcDebtrest() {
        
        $res = 0;
          $res=$('#debtTotal').val()-$("#payment").val();
        $('.rest').val($res);

    }
    function calcDebtPayed() {
        
        total = 0;
        $(".debtPayed").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#payment').val(total);
        $res = 0;
        $res =parseInt($('#debtTotal').val())- parseInt($('#payment').val());
        $('.rest').val($res);

    }
    function addDebt(){
        row='';
        if($(".debtname").last().val().length>0){
            row+='<tr>'
                +'<td style="color:#1E9FF2"></td>' 
                +'<td>'
                +'<input type="text" class="form-control alphaFeild debtname" name="debtname[]">'
                +'</td>'
                +'<td class="hideMob" style="text-align: -webkit-center;">'
                +'<input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">'
                +'</td>'
                +'<td class="hideMob" style="text-align: -webkit-center;">'
                +'<input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">'
                +'</td>'
                +'<td class="hideMob" style="text-align: -webkit-center;">'
                +'<input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">'
                +'</td>'
                +'<td style="text-align: -webkit-center;">'
                +'<input type="text" class="form-control debtEmp" onclick="addDebt();" name="debtEmp[]">'
                +'<input type="hidden" class="form-control"  name="debtEmpID[]" value="">'
                +'</td>'
                +'<td>'
                +'<a class="remove-btn" onclick="$(this).parent().parent().remove(); calcDebtTotal();" >'
                +'<i class="fa fa-trash" style="color:#1E9FF2;"></i>'
                +'</a>'
                +'</td>'
                +'</tr>';
            $("#debtList").append(row);
            
            $( ".debtEmp" ).autocomplete({
        		source:'{{route('emp_auto_complete')}}',
        		minLength: 1,
                select: function( event, ui ) {
                    // var currentIndex=$("input[name^=debtEmpID]").length -1;
                    // $('input[name="debtEmpID[]"]').eq(currentIndex).val(ui.item.id);
        		}
        	});
        }
    }
    
</script>
    <script>

        
        function ShowSMSModal(modalName){
            // $('input').each(function(){
                var string = $('#MobileNo').val();
                var result = string.match(/\d{10}/i);
                if(result !=null){
                    $("#smsNo").val(result)
                    //break;
                }
            // })
            
            
            $("#smsModal").modal('show')
        }
        $(document).ready(function(){
            
            
            $('#ticketFrm').submit(function(e) {
                $(".loader").removeClass('hide');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
            }
        });
               e.preventDefault();
               let formData = new FormData(this);
               $.ajax({
                  type:'POST',
                  url: '{{url('ar/admin/saveTicket'.$config[0]->ticket_no)}}',
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
        
                       //this.reset();
                     }
                     //location.reload();
        
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
        })
    </script>

@endsection
