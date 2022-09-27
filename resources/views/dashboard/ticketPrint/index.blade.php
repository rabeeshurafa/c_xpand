<?php $readonly=true; ?>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/custom-rtl.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
        font-size:20pt;
    }
    div{
        padding:3x;
    }
    @media print{
        input,textarea{
            border:0px solid #ffffff;
        }
        textarea{
            width:100%;
        }
        body{
            margin:0px;
            direction:rtl;
        }
        .hidePrint{
            display: none;
        }
    .form-check-input{
        position:relative;
        margin-right:-0.25rem;!important
        }
        .form-control input{
            background-color: #e9ecef!important;
            opacity: 1!important;
        }
        .
            .input-group {
                width: 99% !important;
            }
            .marginrightminus30 {
                margin-right: 0px;
            }
        
    }
    span{
            margin-right: 20px;
    }
    .footerLine{
        width:100%;
        text-align:center;
        margin-top:10%;
    }
    
</style>
<img src="{{$setting->header_img}}" width="100%" style="max-width:100%">
<!--<div>-->
<!--    <span width="50%" align="right">-->
        
<!--    </span>-->
<!--    <span width="50%" align="right">-->
<!--            <h6 style="margin-top:10px;font-size:16pt;font-weight:bold;">تاريخ الطلب :-->
<!--            <?php //echo date('d/m/Y',strtotime($ticket->created_at )); ?>-->
<!--            </h6>-->
<!--    </span>-->

<!--</div>-->


<form method="post" id="rpFrm" dir="rtl" style="min-height:950px;padding-top: 35px;">
        <div class="row" style="text-align:center">
            <div class="col-12" style="text-align:center">
                <h1 class=" " style="text-align:center;font-weight: bold;display:inline;">
                    
                    @if( $config[0]->ticket_no==23)
                        {{$helpers['ticketType']->name}}
                    @else
                        {{ $config[0]->ticket_name }}
                    @endif
                </h1>
                <span style="font-size:16pt;">رقم الطلب :
                    ({{$ticket->app_no}})  
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                @if( $config[0]->ticket_no==31)
                    <span style="margin-top:10px;font-size:16pt;" align="right">
                        تاريخ الطلب :
                        <?php echo $ticket->date_buy ; ?>
                    </span>
                @else
                    <span style="margin-top:10px;font-size:16pt;" align="right">
                        تاريخ الطلب :
                        <?php echo date('d/m/Y',strtotime($ticket->created_at )); ?>
                    </span>
                @endif
            
            
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                @if( $config[0]->ticket_no!=37)
                <span> مقدم الطلب : </span>
                @else
                <span> اسم المركبة  : </span>
                @endif
                
                <span>
                    {{ $ticket->customer_name }}
                </span>
            </div>
            @if( $config[0]->ticket_no!=37)
            <div class="col-6" style="text-align:right">
                
                <span> عنوانه : </span>
                <span>
                    {{ $ticket->region_name }} /
                    {{ $ticket->address }}  
                    
                </span>
            </div>
            @endif
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-6" style="text-align:right">
                @if( $config[0]->ticket_no!=37)
                <span> رقم الهوية : </span>
                @else
                <span> رقم المركبة : </span>
                @endif
                <span>{{$ticket->national}}</span>
            </div>
            @if( $config[0]->ticket_no!=37)
            <div class="col-6" style="text-align:right">
                <span> الجوال : </span>
               <span>{{ $ticket->customer_mobile }}</span>
            </div>
            @endif
        </div>
        
        @if( $config[0]->ticket_no==8)
        
            @if($ticket->Applicanttype==2)
            <div class="row" style="margin-bottom:10px;">
                <div class="col-6" style="text-align:right">
                    <span> ممثل عنه  : </span>
                    
                    <span>
                        {{ $ticket->customer_name2 }}
                    </span>
                </div>
                
                <div class="col-6" style="text-align:right">
                    
                    <span> رقم الهاتف : </span>
                    <span>
                        {{ $ticket->customer_mobile2 }} 
                        
                    </span>
                </div>
            </div>
            @endif    
        @endif  
        @if( $config[0]->ticket_no==37)
            <div class="row" style="margin-bottom:10px;">
                <div class="col-6" style="text-align:right">
                    <span> وصف الصيانة   : </span>
                    
                    <span>
                        {{ $ticket->malDesc }}
                    </span>
                </div>
            </div>  
        @endif  
        @if($config[0]->has_debt_list==1)
        <div class="row"style="margin-bottom:10px;" >
            <div class="col-md-12 attachs-section"  style="margin-left: 25px; margin-right: 25px;text-align: right;margin-bottom: 0;">
            </div>
        </div>
        <div class="row">
            <div class="row" style="width:50%">
                    <div class="card-body" style="padding:0;">
                       <div class="form-group col-md-12">
                        <table class="detailsTB table" style="margin-left: 15px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="border-top:0;">
                                        {{ '' }}
                                    </th>
                                    <th scope="col" class=" col-md-2 col-sm-4" style="border-top:0;text-align:center;font-size: 16pt;text-align: -webkit-center;">
                                        {{ 'البند' }}
                                    </th>
                                    <th scope="col" class=" col-md-2 col-sm-4" style="border-top:0;text-align:center;font-size: 16pt;text-align: -webkit-center;">
                                        {{ 'المبغ المستحق' }}
                                    </th>
                                    <th scope="col" class=" col-md-2" style="border-top:0;text-align:center;font-size: 16pt;text-align: -webkit-center;">
                                        {{ 'المبلغ المدفوع' }}
                                    </th>
                                    <th scope="col" class="hidemob col-md-2" style="border-top:0;text-align:center;font-size: 16pt;text-align: -webkit-center;">
                                        {{ 'رقم الوصل' }}
                                    </th>
                                    <th scope="col" class=" col-md-3 col-sm-4" style="border-top:0;text-align:center;font-size: 16pt;text-align: -webkit-center;">
                                        {{ 'الموظف' }}
                                    </th>
                                    <th scope="col" style="border-top:0;"></th>
                                </tr>
                            </thead>
                            <tbody id="debtList">
                                <?php $total=0; 
                                $arr=json_decode($ticket->debt_json);
                                $arr=is_array($arr)?$arr:array();?>
                                <?php if(sizeof($arr)>0){ $i=1;?>
                                @foreach($arr as $debt)
                                    <tr>
                                    <td style="color:#1E9FF2">{{$i++}}</td> 
                                    <td>
                                        <input {{ $readonly?"readonly":"" }} type="text" class="form-control" name="debtname[]" value="{{$debt->debtName}}">
                                    </td>
                                    <td class="hideMob" style="text-align: -webkit-center;">
                                        <input style="font-weight:bold;text-align:center;" {{ $readonly?"readonly":"" }} type="text" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="{{$debt->debtValue}}">
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
                                        <input style="text-align:center;" type="text" {{ $readonly?"readonly":"" }} class="form-control debtEmp" onclick="addDebt();" name="debtEmp[]" value="{{$debt->debtEmp}}">
                                        <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                <?php } ?>
                            </tbody>
                            <tbody id="debtTotalList">
                                <tr>
                                    <td style="color:#1E9FF2"></td> 
                                    <td style="text-align: left;">
                                        {{'المجموع الكلى'}}
                                    </td>
                                    <td class="hideMob" style="text-align: -webkit-center;">
                                        <input type="text" style="font-weight:bold;text-align:center;" {{ $readonly?"readonly":"" }} class="form-control alphaFeild" id="debtTotal" name="debtTotal" value="{{$ticket->debt_total}}">
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
                                    <td class="hideMob" style="text-align: -webkit-center;">
                                        <input type="text" style="font-weight:bold;text-align:center;" {{ $readonly?"readonly":"" }} class="form-control alphaFeild" name="payment" value="{{$ticket->payment}}">
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
                                    <td class="hideMob" style="text-align: -webkit-center;">
                                        <input type="text" style="font-weight:bold;text-align:center;" {{ $readonly?"readonly":"" }} class="form-control alphaFeild" name="rest" value="{{$ticket->rest}}">
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
                
            <div class="row attachs-body" style="width:50%">
                
                <div class="form-group col-12 mb-2" style="padding-top: 20px;">
                    <div class="col-12" style="text-align: center;font-size:20pt;">
                         <span style="text-align: center;font-size:20pt;">
                             التكاليف
                         </span> 
                         </div>
                        <?php $total=0; 
                        $arr=json_decode($ticket->fees_json);
                        $arr=is_array($arr)?$arr:array();?>
                    <ol class="vasType 1vas addRec">
                         <?php 
                        if(sizeof($arr)>0){?>
                            @foreach($arr as $fee)
                            <li style="font-size: 17px !important;color:#000000">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" {{ $readonly?"readonly":"" }} name="feesText[]" class="form-control feesText" value="{{ $fee->feesText}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number"{{ $readonly?"readonly":"" }} style="font-weight:bold;text-align:center;" name="feesValue[]" class="form-control FessVals" value="{{ $fee->feesValue*1}}" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                                    </div>
                                </div>
                            </li>
                            <?php $total+=$fee->feesValue; ?>
                            @endforeach
                        <?php } ?>
                    </ol>
            
                    <ol class="vasType 1vas " style="list-style-type: none;">
                        <li style="font-size: 17px !important;color:#000000">
                            <div class="row">
                                <div class="col-sm-8">
                                    الإجمالي
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" style="font-weight:bold;text-align:center;" id="total" disabled="" name="total" class="form-control" value="{{$total}}">
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    @endif
    <div class="row" >
        <div class="col-md-12 attachs-section"  style="margin-left: 25px; margin-right: 25px;text-align: right;margin-bottom: 0;right;margin-top: 25px;">

            <h2 class="cost-header " style="">{{ 'اجراءات الموظفين' }}
            </h2>
        </div>
    </div>
    <div id="responseList">
    <?php 
    $lastReciver=$ticket->history[0]->sender_id ;  
    $tagArr=array() ; 
    $lastTicket=array(); $i=0;?>
    @foreach($ticket->history as $rowTicket)
   <?php  
   if($rowTicket->recive_type==1) 
            $lastReciver=$rowTicket->reciver_id;
        if(in_array($rowTicket->recive_type,array(1,2))) 
            $lastTicket=$rowTicket;
    ?>
    
    <div class="card-content collpase show ResponseList">
        <div class="card-body" style="padding-bottom:0;">
            <div class="row"
                style="background-color: #ffffff; margin-left: 15px;margin-right: 15px;">
                <!--<div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">-->
                <!--    <span class="avatar" style="width: 60px;">-->
                <!--        <img src="{{ $rowTicket->sender_image }}"-->
                <!--            style="border: 1px solid #c7c7c7;padding: 2px; max-height:60px;">-->
                <!--    </span>-->
                <!--</div>-->
                <div class="col-sm-12 col-md-3 marginrightminus30 infoAvatar" style="text-align: right;">
                    <a style="color:#385898;font-weight: 600;">{{ $rowTicket->sender_name }}</a>
                    <br>
                    <time class="fs14">
                        {{ date('d/m/Y',strtotime($rowTicket->created_at)) }}
                        الساعة : 
                        {{ date('H:i',strtotime($rowTicket->created_at)) }} </time>
                </div>
                <div class="col-sm-12 col-md-8 marginrightminus30">
                    <?php if($i==0){ $i++ ?>
                    <h5 style="text-align: right;">
                        <time style="font-family: Helvetica, Arial, sans-serif !important;; color:#000000; font-size: 17px !important;font-weight: 500;">

                            {{"تم إنشاء الطلب بواسطة:"}}
                            <b>{{ $rowTicket->sender_name }} </b>
                        </time>
                    </h5>
                    <?php 
                    if(strlen(trim($rowTicket->trans_note))+strlen(trim($rowTicket->s_note))>0){
                    ?>
                    <br />
                    <p style="text-align: right;"><b style="color:#5599FE">ملاحظات: </b>
                    <?php echo $rowTicket->trans_note." ".$rowTicket->s_note?>   </p>
                    <?php }}else{ 
                    //var_dump($rowTicket);?><h5 style="text-align: right;">
                        <time style="font-family: Helvetica, Arial, sans-serif !important;; color:#000000; font-size: 17px !important;font-weight: 500;">
                            <?php  echo$rowTicket->s_note ?>
                            <?php 
        if(in_array($rowTicket->recive_type,array(1,2))) 
        echo strlen(trim($rowTicket->trans_note))>0?'<br />'.$rowTicket->trans_note:''?>
                        </time>
                    </h5>
                        <?php }
                        ?>
                </div>
                
                
            </div>
            
        </div>
        <div class="card-body"
            style="background-color: #F4F5FA; min-height:15px;padding-top: 0;padding-bottom: 0rem;">
        </div>
    </div>
    @endforeach
    </div>

</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

