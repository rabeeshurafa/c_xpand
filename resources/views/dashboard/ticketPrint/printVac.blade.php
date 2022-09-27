<?php $readonly=true; ?>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/custom-rtl.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
        font-size:16pt;
    }
    div{
        padding:3x;
    }
    .ticket_name{
            font-size:20pt!important;
        }
        .response{
            position: fixed;
            bottom: 50%;
            left: 40px;
        }
    @media print{
        input,textarea{
            border:0px solid #ffffff;
        }
        .hideprint{
            display:none;
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
        body,td,th,span,h1,h2,h3,h4,h5,h6{
            font-family:"Times New Roman";
            color:#000000!important;
            font-size:16pt;
        }
        .ticket_name{
            font-size:25pt!important;
        }
            .input-group {
                width: 99% !important;
            }
            .marginrightminus30 {
                margin-right: 0px;
            }
        
    }
    span{
            margin-right: 3px;
    }
    .m5{
        margin-right:5px!important;
    }
    .footerLine{
        width:100%;
        text-align:center;
        margin-top:10%;
    }
    .table th, .table td {
        padding: 0.75rem !important;
            vertical-align: inherit;
        border-top: 1px solid #626E82;
    }
    td {
        height: 40px;
        font-size: 16pt !important;
    }
    b {
        font-size: 18pt !important;
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #626E82;
    }
    .checkboxtext {
        font-size: 110%;
        display: inline;
    }
    h1, .h1 {
        font-size: 2rem;
    }
</style>
<style>
    input[type=checkbox]
    {
      /* Double-sized Checkboxes */
      -ms-transform: scale(2); /* IE */
      -moz-transform: scale(2); /* FF */
      -webkit-transform: scale(2); /* Safari and Chrome */
      -o-transform: scale(2); /* Opera */
      transform: scale(2);
      padding: 10px;
    }
    
    /* Might want to wrap a span around your checkbox text */
    .checkboxtext
    {
      /* Checkbox text */
      font-size: 110%;
      display: inline;
    }
</style>

<!--<div>-->
<!--    <span width="50%" align="right">-->
        
<!--    </span>-->
<!--    <span width="50%" align="right">-->
<!--            <h6 style="margin-top:10px;font-size:16pt;font-weight:bold;">تاريخ الطلب :-->
<!--            <?php //echo date('d/m/Y',strtotime($ticket->created_at )); ?>-->
<!--            </h6>-->
<!--    </span>-->

<!--</div>-->

<img src="{{$setting->header_img}}" width="100%" style="max-width:100%">
<form method="post" id="rpFrm" dir="rtl" style="min-height:950px;padding-top: 10px;">
    
    <div class="row" style="text-align:center">
        <div class="col-12" style="text-align:center">
            <h1 class=" " style="text-align:center;font-weight: bold;display:inline; text-decoration:underline;">
                
                     نموذج طلب اجازة   
            </h1>
        </div>
    </div>
    <div class="row" style="padding-right: 48px;">
        <div class="col-6" style="text-align:right" >
            
                <span style="margin-top:10px;font-size: 16pt;" align="right">
                    <b style="margin-top:10px;font-size: 18pt !important;font-weight: bolder;">
                        تاريخ طلب الاجازة :
                    </b>
                    
                    <?php echo date('d/m/Y',strtotime($ticket->created_at )); ?>
                </span>
        
        </div>
    </div>
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table class="table table-bordered" style="width: 100%;margin-top:30px;direction: rtl;">
            <tbody>
                <tr>
                    <td style="text-align:center">
                        <b>
                            مقدم الطلب:
                        </b>
                        
                    </td>
                    <td width="70%">Expand</td>
                </tr>
                <tr>
                    <td style="text-align:center">
                        <b>
                            القسم:
                        </b>
                        
                    </td>
                    <td width="70%"> {{$deptname->name}}  </td>
                </tr>
               <tr>
                    <td style="text-align:center">
                        <b>
                        القائم بالعمل اثناء الاجازة (البديل)
                        </b>
                    </td>
                    <td width="70%"> </td>
                </tr>
            </tbody>
        </table>
    </div> 
    
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table style="margin-top: 10px; direction: rtl;width: 100%; padding-bottom: 0px;">
            <tbody>
                <tr>
                    <td>
                        <h1>
                            <b> الاجازة المطلوبة :</b>
                        </h1>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> 
    
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table class="table table-bordered" style="width: 100%;direction: rtl;">
            <tbody><tr>
                <td style="width:20px text-align:center"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>سنوية</td>
                <td style="width:20px"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>العارضة</td>
                <td style="width:20px"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>الامومة والولادة</td>
                <td style="width:20px"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>اجازة بدون مرتب</td>
            </tr>
            <tr>
                <td style="width:20px"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>مرضية</td>
                <td style="width:20px"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>الدراسية</td>
                <td style="width:20px"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>حج </td>
                <td style="width:20px"><span><input type="checkbox" class="checkboxtext"></span></td>
                <td>اخرى </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center"> تاريخ الاجازة :</td>
                <td> من </td>
                <td>{{$ticket->start_date}} </td>
                <td> الى </td>
                <td>{{$ticket->end_date}}</td>
                <td> المدة </td>
                <td>{{$ticket->vac_day}}</td>
            </tr>
        </tbody></table>
    </div>
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table style="width: 100%;margin-top:20px;direction: rtl;">
                <tbody><tr width="100%;">
                    <td style="text-align:right; ">
                          رصيد الاجازات :
                          {{$vac['balance']}}
                    </td>
                    <td style="text-align:right; ">
                          رصيد الاجازات بعد هذه الاجازة :
                          {{$vac['restB']}}
                    </td>
                </tr>
               
        </tbody></table>
    </div>
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table style="width: 100%;margin-top:20px;direction: rtl;">
                <tbody><tr width="100%;">
                    <td style="text-align:right; width:100%;">
                          سبب الاجازة: ...............................................................................................................................................
                            </td>
                </tr>
               <tr width="100%">
                    <td style="text-align:right; width:100%; padding-top:20px ;">
                          عنوان الموظف خلال فترة الاجازة: .......................................................................................................................
                            </td>
                </tr>
        </tbody></table>
    </div>
    
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table style="margin-top: 20px; direction: rtl;width: 100%;">
            <tbody><tr><td style="padding:20px;text-align:left">
            <h1> توقيع الموظف : ..................................... </h1>
            </td>
        </tr></tbody></table>
    </div>
    
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table class="table table-bordered" style="width: 100%;margin-top:20px;direction: rtl;">
                <tbody><tr>
                    <td style="text-align:right;width:15%; padding-top:30px">
                        <b>
                            قسم الشؤون:
                        </b>
                    </td>
                    <td width="70%" style="padding-top:30px"> موافقة الشؤون المالية والادارية : ....................................................................................... </td>
                </tr>
                <tr>
                    <td style="text-align:right;width:15%; padding-top:30px">
                        <b>
                            المالية والادارية:
                        </b>
                    </td>
                    <td width="70%" style="padding-top:30px"> ملاحظات رئيس قسم الشؤون المالية والادارية : .................................................................... </td>
                </tr>
        </tbody></table>
    </div>
    
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table class="table table-bordered" style="width: 100%;direction: rtl;">
                <tbody><tr>
                    <th rowspan="5" style="text-align:center; padding-top:130px;position:relative">
                        <b>
                            رئيس البلدية
                        </b>
                    </th>
                </tr>
                <tr>
                    <td style="text-align:right;width:80%; padding-top:30px">
                    <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    تم الموافقة عليها 
                    </td>
                </tr>
                
                <tr>
                    <td style="text-align:right;width:80%; padding-top:30px">
                    <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    تم رفضها , بسبب  ................................................................................................  
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right;width:80%; padding-top:30px">
                    <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    الاسم : ............................................................................................................ 
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right;width:80%; padding-top:30px">
                    <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    التوقيع : ......................................................................................................... 
                    </td>
                </tr>
        </tbody></table>
    </div>
    
    <div class="row" style=" padding-left: 60px;padding-right: 60px;">
        <table style="margin-top: 10px; direction: rtl;width: 100%;">
            <tbody><tr><td style="text-align:right">
            <h1>ملاحظة : فيما عدا الإجازة المرضية، يجب تقديم الطلب قبل بدء الإجازة بيومين.</h1>
            </td>
        </tr></tbody></table>
    </div>
    <div class="footerLine hide">
        
        <hr style="border: 2px solid #000000">
        <table style="width: 100%">
            <tbody><tr>
                <td style="text-align:center; font-weight:bold; font-size:16px;">
                    هاتف
                    : 
                    <span style="direction: rtl">092527030</span>
                                                    فاكس
                    : 
                    092527030                            </td>
            </tr>
        </tbody></table>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/Tafqeet.js')}}"></script>


