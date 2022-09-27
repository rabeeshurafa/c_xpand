<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
        direction :rtl;
    }
    .attachs-body{
        margin-top:25px;
    }
    /*input{*/
    /*    font-size:20pt!important;*/
    /*}*/
    @media print{
        input,textarea{
            border:0px solid #ffffff;
        }
        textarea{
            width:100%;
        }
        .hideprint{
            display:none;
        }
        
        body{
            margin:0px;
        }
    }
    .response{
            position: fixed;
            bottom: 50%;
            left: 40px;
        }
    /*body,td,th,span,h1,h2,h3,h4,h5,h6{*/
    /*    font-family:"Times New Roman";*/
    /*    color:#000000;*/
    /*    font-size:16pt;*/
    /*    direction :rtl;*/
    /*}*/
    /*td{*/
    /*   padding:3px !important;*/
    /*   align-text:center;*/
    /*}*/
    /*.w5{*/
    /*    width:100% !important;*/
    /*}*/
    /*input,textarea{*/
    /*    width:100% !important;*/
    /*}*/
    /*div{*/
    /*    padding:3x;*/
    /*}*/
    /*.ticket_name{*/
    /*        font-size:20pt!important;*/
    /*    }*/
    /*    .response{*/
    /*        position: fixed;*/
    /*        bottom: 50%;*/
    /*        left: 40px;*/
    /*    }*/
    /*@media print{*/
    /*    input,textarea{*/
    /*        border:0px solid #ffffff;*/
    /*        padding:0px;*/

    /*    }*/
    /*    .hideprint{*/
    /*        display:none;*/
    /*    }*/
    /*    textarea{*/
    /*        width:100%;*/
    /*    }*/
    /*    thead{*/
    /*                display: table-row-group;*/
    /*    }*/
    /*    body{*/
    /*        margin:0px;*/
    /*        direction:rtl;*/
    /*    }*/
    /*    .form-check-input{*/
    /*    position:relative;*/
    /*    margin-right:-0.25rem;!important*/
    /*    }*/
    /*    .form-control input{*/
    /*        background-color: #e9ecef!important;*/
    /*        opacity: 1!important;*/
    /*    }*/
    /*    body,td,th,span,h1,h2,h3,h4,h5,h6,input,li{*/
    /*        font-family:"Times New Roman";*/
    /*        color:#000000!important;*/
    /*        font-size:18pt!important;*/
    /*    }*/
    /*    td{*/
    /*        padding: 10px !important;*/
    /*    }*/
    /*    .ticket_name{*/
    /*        font-size:25pt!important;*/
    /*    }*/
    /*    .input-group {*/
    /*        width: 99% !important;*/
    /*    }*/
    /*    .marginrightminus30 {*/
    /*        margin-right: 0px;*/
    /*    }*/
        
    /*}*/
    /*span{*/
    /*        margin-right: 20px;*/
    /*}*/
    /*.m5{*/
    /*    margin-right:5px!important;*/
    /*}*/
    /*.footerLine{*/
    /*    width:100%;*/
    /*    text-align:center;*/
    /*    margin-top:10%;*/
    /*}*/
</style>
<body>
<form method="post" id="rpFrm">
    
        <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:0px;">
            <tr style="background-color: #FFFFFF;">
                <td style="padding:0px; margin:0px;text-align: center;">
                <img src="{{$setting->header_img}}" style="width:87%!important" />
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%"style="margin-top: 40px;">
            <tr>
                <td width="50%" align="right">
                    <h6 style="font-size:16pt;font-weight:bold;">رقم الطلب :
                    {{$ticket->app_no}}
                    </h6>
                </td>
                <td width="50%" align="left">
                    <h6 style="font-size:16pt;font-weight:bold;">تاريخ الطلب:
                    <?php echo date('d/m/Y',strtotime($ticket->created_at )); ?>
                    </h6>
                </td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <td colspan="2" style="padding:0px; margin:0px;text-align: center;">
                    <h2 style='font-size:20pt; font-weight:bold;'>
                        {{$config->ticket_name}}
                    </h2>
                </td>
            </tr>
        </table>
            
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="50%" align="right">
                    <label class="form-label col-sm-12 col-md-12" style="text-align:right; ">
                        <h6 style='font-size:20pt; font-weight:bold;  '>
                            رقم المكلف:
                            &nbsp;
                        </h6>
                    </label>
                </td>
                <td width="50%" align="left">
                    <table cellpadding="5" cellspacing="0" width="70%" align="left" >      
                        <tr>
                            <td style="border-left: 0px solid #000000;font-size:18pt;">
                                <h6 style='font-size:20pt; font-weight:bold;'>
                                    رقم
                                    {{$config->ticket_name}}
                                </h6>
                            </td>
                            <td width="100px" >
                            
                                <input class="lblDepts lblDept31" name="input19" id="input19" style="font-size:20pt; font-weight:bold;width:100px" value="<?php // echo $currTicket->CntrNo ; ?>" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        
        <table cellpadding="3" cellspacing="0" width="100%">
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt; width:15%">
                    مقدم الطلب:
                </td>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    {{$ticket->customer_name}}
                </td>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    رقم الهوية:
                    {{$ticket->national_id}}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    العنوان:
                </td>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    {{$ticket->address}}
                </td>
                <td style="border: 1px solid #000000;font-size:18pt; width:50%">
                    رقم الهاتف:
                    {{$ticket->customer_mobile}}
                </td>
            </tr>
        </table>
        <table cellpadding="2" cellspacing="0" width="100%" dir="rtl">
            <tr>
                <td  style="border: 1px solid #000000;font-size:20pt; font-weight:bold; text-align:center;">
                    قسم الهندسة والمشاريع
                </td>
                <td style="border: 1px solid #000000;font-size:20pt; font-weight:bold; text-align:center;">
                    بيان رسوم 
                    {{$config->ticket_name}}
                    @if($ticket->app_type == 1)
                    {{$ticket->phase == 1 ? '1 فاز' : '3 فاز'}}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    نوع الترخيص:
                    <input class="lblDepts lblDept4" name="input1" id="input1" />
                </td>
                <td rowspan="8"style="width:50%;border: 1px solid #000000;font-size:18pt;padding: 0px; vertical-align:top">
                    <table cellpadding="1" cellspacing="0" width="100%" >
                        <!--<tr>-->
                        <!--    <th style="border: 1px solid #000000;font-size:18pt; text-align:center;">-->
                        <!--        البيان-->
                        <!--    </th>-->
                        <!--    <th style="border: 1px solid #000000;font-size:18pt; text-align:center;width:30%">-->
                        <!--        المبلغ بالشيكل-->
                        <!--    </th>-->
                        <!--</tr>     -->

                        @if($config->has_price_list==1)
                                    <div class="row attachs-body">
                                        <div class="form-group col-12 mb-2">
    
                                                <?php $total=0; 
                                                $arr=json_decode($ticket->fees_json);
                                                $arr=is_array($arr)?$arr:array();?>
                                            <ol class="vasType 1vas addRec olmob">
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
                                                                <input type="text" {{ false?"readonly":"" }} name="feesText[]" class="form-control feesText" value="{{ $fee->feesText}}">
                                                            </div>
                                                            <div class="col-sm-3 feesnummob">
                                                                <input type="number"{{ false?"readonly":"" }} name="feesValue[]" class="form-control FessVals" value="{{ $fee->feesValue*1}}" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php $total+=$fee->feesValue; ?>
                                                    @endforeach
                                                <?php } ?>
                                                @if(!false)
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
                        <!--<tr>-->
                        <!--    <td style="border: 1px solid #000000;font-size:20pt;font-weight:bold; text-align:center;">-->
                        <!--        المبلغ المطلوب للدفع-->
                        <!--    </td>-->
                        <!--    <td style="border: 1px solid #000000;font-size:20pt;font-weight:bold; text-align:center;" id="total">-->

                        <!--    </td>-->
                        <!--</tr>-->
                    </table>
                </td>
            </tr>
            <div>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    رقم الرخصة:
                    <input class="lblDepts lblDept4" name="input2" id="input2" />
                </td>
            </div>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                المساحة الكلية (متر مربع):
                    <input class="lblDepts lblDept4" name="input3" id="input3" />
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:20pt;font-weight:bold;">
                مصادقة المهندس:
                    <input class="lblDepts lblDept4" name="input4" id="input4" />
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:20pt; font-weight:bold; text-align:center;">
                {{$ticket->app_type == 1 ?'قسم الكهرباء':'قسم المياه'}}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                تاريخ الكشف:
                    <input class="lblDepts lblDept7" name="input5" id="input5" placeholder="dd/mm/yyyy" />
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                تاريخ التركيب:
                    <input class="lblDepts lblDept7" name="input6" id="input6" />
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                الموقع والمحطة:
                    <input class="lblDepts lblDept7" name="input7" id="input7" />
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    <textarea rows="1" class="lblDepts lblDept7"style="width: 95%;height: 100%;" name="input8" id="input8" placeholder="ملاحظات" ></textarea>
                </td>
                <td rowspan="3" style="border: 1px solid #000000;font-size:18pt;"valign="top">
                    <textarea  class="" name="input9" id="input9" style="width: 95%;" rows="4" placeholder="ملاحظات" ></textarea>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:20pt; font-weight:bold;">
                    مصادقة المهندس:
                    <textarea rows="1" class="lblDepts lblDept7" name="input10" id="input10" ></textarea>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:20pt; font-weight:bold; text-align:center;">
                    الشؤون المالية والإدارية
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt; "valign="top">
                    <textarea  class="lblDepts lblDept37 lblDept31" name="input11" id="input11" style="width: 95%;" rows="4" placeholder="ملاحظات"></textarea>
                </td>
                <td rowspan="3" style="padding:0;border: 0px solid #000000;font-size:18pt; ">
                    <table cellpadding="2" cellspacing="0" width="100%" >
                        <tr>
                            <td colspan="2" style="border: 1px solid #000000;font-size:20pt;font-weight:bold; text-align:center;">
                                بيان تسديد الرسوم
                            </td>
                        </tr>     
                        <tr>
                            <td style="border: 1px solid #000000;font-size:20pt;font-weight:bold;">
                                مجموع المبالغ المسددة
                            </td>
                            <td style="border: 1px solid #000000;font-size:18pt; text-align:center;">
                                <input class="lblDepts lblDept31" name="input12" id="input12" style="width:33%" />
                            </td>
                        </tr>     
                        <tr>
                            <td colspan="2" style="border: 1px solid #000000;font-size:18pt;">
                                <textarea rows="2" class="lblDepts lblDept31" style="width:100%" name="input13" id="input13" placeholder="ملاحظات" ></textarea>
                            </td>
                        </tr>       
                        <tr>
                            <td style="border: 1px solid #000000;font-size:18pt;">
                                مجموع المبالغ الغير مسددة
                            </td>
                            <td style="border: 1px solid #000000;font-size:18pt; text-align:center; width:33%">
                                <input class="lblDepts lblDept31" name="input14" id="input14" style="width:100px" />
                            </td>
                        </tr>      
                        <tr>
                            <td style="border: 1px solid #000000;font-size:18pt;">
                                رسوم وعمولات
                            </td>
                            <td style="border: 1px solid #000000;font-size:18pt; text-align:center; width:33%">
                                <input class="lblDepts lblDept31" name="input15" id="input15" style=" width:100px" />
                            </td>
                        </tr>    
                        <tr>
                            <td style="border: 1px solid #000000;font-size:20pt; font-weight:bold;">
                                مجموع المبالغ المتبقية للدفع
                            </td>
                            <td style="border: 1px solid #000000;font-size:18pt; text-align:center; width:33%">
                                <input class="lblDepts lblDept31" name="input17" id="input17" style=" width:100px" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:20pt; font-weight:bold;">
                    مصادقة المحاسب:
                                <input class="lblDepts lblDept31" name="input18" id="input18"  />
                
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:20pt; font-weight:bold;">
                    مصادقة الشؤون الإدارية:
                                <input class="lblDepts lblDept37" name="input16" id="input16" />
                </td>
            </tr>
        </table>
        <table cellspacing="0" width="100%" style="margin-top: 25px;" >      
                        <tr>
                            <td style="border: 0px solid #000000;font-size:18pt; font-weight:bold;">
                                
                            </td>
                            <td style="border: 0px solid #000000;font-size:20pt; font-weight:bold; width:50%">
                                مصادقة رئيس البلدية
                            </td>
                        </tr>      
                        <tr>
                            <td style="border-bottom: 0px dashed #000000;font-size:18pt; font-weight:bold;">
                            
                            </td>
                            <td style="border-bottom: 1px dashed #000000;font-size:18pt; font-weight:bold; width:50%">
                            &nbsp;
                            </td>
                        </tr>
                    </table>
        

        <button class=" btn btn-info hideprint" style="position: fixed;bottom: 50%;left: 140px;" onclick="ManualSave()" type="button" >
           <img src="https://db.expand.ps/images/printer.jpeg" height="32px" style="cursor: pointer" >
           حفظ ما تم عمله
        </button>
        <button class=" btn btn-info response hideprint" onclick="window.print()"type="button" >
           <img src="https://db.expand.ps/images/printer.jpeg" height="32px" style="cursor: pointer" >
           طباعة
        </button>
        
        <input type="hidden" name="lastRec" id="lastRec" value="19" />
        <input type="hidden" name="id" id="id" value="{{($ticketData->id??0)}}" />
        <input type="hidden" name="ticket_id" id="ticket_id" value="{{($ticket->id??0)}}" />
        <input type="hidden" name="related_ticket" id="related_ticket" value="{{$config->ticket_no}}" />
</form>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
function calcTotal() {
        total = 0;
        $(".FessVals").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#total').val(total)

    }
    var lastCntr = 3;
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
    $(document).ready(function(){
        $(".lblDepts").attr("readonly","")
        $(".lblDept<?php echo Auth()->user()->department_id?>").removeAttr("readonly")
       
    })
    
    function ManualSave(){
        var formData = new FormData($("#rpFrm")[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
                    'ContentType': 'application/json'
                }
            });
            $.ajax({
                url: '{{route('saveEditTicket')}}',
                type: 'POST',
                data: formData,
                dataType:"json",
                async: true,
                success: function (data) {
                    if(data!=0){
                        alert('تمت عملية الحفظ')
                        $('#id').val(data) 
                    }else{
                        alert('خطاء في الحفظ')
                    }
                   
                },
                error:function(){
                    alert('خطاء في الحفظ')
                },
                    cache: false,
                    contentType: false,
                    processData: false
            });
    }


    $(document).ready(function(){
            
            
        <?php foreach($dataInput as $key=>$value){
            ?>
            $("#<?php echo $key?>").val('<?php echo preg_replace( "/\r|\n/",'.',$value)?>')
            <?php 
        } ?>
        // $(".lblDepts").on('change blur keypress keyup',function(){
        //     var formData = new FormData($("#rpFrm")[0]);
        // $.ajax({
        //     url: '<?php //echo base_url()?>services/C_print/addRptJson',
        //     type: 'POST',
        //     data: formData,
        //     dataType:"json",
        //     async: true,
        //     success: function (data) {
        //     },
        //     error:function(){
        //     },
        //         cache: false,
        //         contentType: false,
        //         processData: false
        // });
            
        // })
        // $("#input9").on('change blur keypress keyup',function(){
        //     var formData = new FormData($("#rpFrm")[0]);
        // $.ajax({
        //     url: '<?php //echo base_url()?>services/C_print/addRptJson',
        //     type: 'POST',
        //     data: formData,
        //     dataType:"json",
        //     async: true,
        //     success: function (data) {
        //     },
        //     error:function(){
        //     },
        //         cache: false,
        //         contentType: false,
        //         processData: false
        // });
            
        // })
    })
    
    
</script>
