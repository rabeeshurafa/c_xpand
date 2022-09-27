<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
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
        }
    }
</style>
<?php /* $currTicket=$ticket[0];*/?>
<form method="post" id="rpFrm">
    
        <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:0px;">
            <tr style="background-color: #FFFFFF;">
                <td style="padding:0px; margin:0px;text-align: center;">
                    <?php /* $this->load->view('services/hdrNew');*/?>
                    <img class="" alt="modern admin logo" src="{{$setting->logo}}" width="100%" style="max-width:100%;display:block;">
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%"style="margin-top: -40px;">
            <tr>
                <td width="50%" align="right">
                    <h6 style="font-size:16pt;font-weight:bold;">رقم الطلب :
                        (<?php /* echo $currTicket->pk_i_id; */?>)</h6>
                </td>
                <td width="50%" align="left">
                        <h6 style="font-size:16pt;font-weight:bold;">تاريخ الطلب:
                        <?php /* echo date('d/m/Y',strtotime($currTicket->dt_created_at )); */?></h6>
                </td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <td colspan="2" style="padding:0px; margin:0px;text-align: center;">
                    <h2 style='font-size:20pt; font-weight:bold;'>
                <?php /* echo "طلب ".$title; if($currTicket->fk_i_dept_id!=8){ if($currTicket->related_ticket==3){*/?> (<?php /* echo $currTicket->capacity==1?'1 فاز':'3 فاز - '. $currTicket->ampere.' أمبير' */?>)<?php /* }}*/?>
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
                            <?php /* echo $customer[0]->CutomerNo; */?>
                        </h6>
                    </label>
                </td>
                <td width="50%" align="left">
                    <table cellpadding="5" cellspacing="0" width="70%" align="left" >      
                        <tr>
                            <td style="border-left: 0px solid #000000;font-size:18pt;">
                                <h6 style='font-size:20pt; font-weight:bold;'>
                        رقم
                        <?php /* if($currTicket->fk_i_dept_id!=8) 
                        echo "اشتراك الكهرباء";
                        else 
                        echo "اشتراك المياه"*/?>:
                        </h6>
                            </td>
                            <td width="100px" >
                            
                                <input class="lblDepts lblDept31" name="input19" id="input19" style="font-size:20pt; font-weight:bold;width:100px" value="<?php /* echo $currTicket->CntrNo ; */?>" />
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
                    <?php /* echo $currTicket->customer_name */?>
                </td>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    رقم الهوية:
                    <?php /* echo $customer[0]->NationalID; */?>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    العنوان:
                </td>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    <?php /* echo $currTicket->AddressDetailsAR */?>
                </td>
                <td style="border: 1px solid #000000;font-size:18pt; width:50%">
                    رقم الهاتف:
                    <?php /* echo $customer[0]->MobileNo1; */?>
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
                    <?php /* echo $title; if($currTicket->fk_i_dept_id!=8){ 
                    if($currTicket->related_ticket==3){
                    echo $currTicket->capacity==1?'
                    1 فاز':'3 فاز - ';
                    echo $currTicket->ampere.' أمبير'; }}*/?>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                    نوع الترخيص:
                    <input class="lblDepts lblDept4" name="input1" id="input1" />
                </td>
                <td rowspan="8"style="width:50%;border: 1px solid #000000;font-size:18pt;padding: 0px; vertical-align:top">
                    <table cellpadding="1" cellspacing="0" width="100%" >
                        <tr>
                            <th style="border: 1px solid #000000;font-size:18pt; text-align:center;">
                                البيان
                            </th>
                            <th style="border: 1px solid #000000;font-size:18pt; text-align:center;width:30%">
                                المبلغ بالشيكل
                            </th>
                        </tr>     
                        <?php /*
                        $total=0;
                        $json_fees=json_decode($ticket[0]->json_fees);
                        $i=($currTicket->capacity==1?0:8);
                        $endRec=$currTicket->capacity==1?7:15;
                        foreach($json_fees as $key => $value){
                            if(strlen($key)>0){
                            */?>
                            <tr>
                                <td style="border: 1px solid #000000;font-size:18pt; text-align:center;">
                                    <input type="checkbox" style="display: none;" checked="" name="feesName[]" class="condition" value="<?php /* echo $i */?>"> 
                                    <input type="text" style="display: none;" class="form-control FessVals" id="feestxt<?php /* echo $i;  */?>" name="feestxt<?php /* echo $i;  */?>" value="<?php /* echo $key;  */?>"> 
                                                                        
                                    <?php /* echo  $key */?>
                                </td>
                                <td style="border: 1px solid #000000;font-size:18pt;font-weight:bold; text-align:center;">
                                    <input type="number" name="feesValue<?php /* echo $i;  */?>" id="feesValue<?php /* echo $i; $i++; */?>" style="width:100px" width="100px" class="FessVals lblDepts lblDept31 lblDept7" value="<?php /* echo $value */?>"> 
                                                                        
                                </td>
                            </tr>
                            <?php /* 
                                $total+=$value;
                            }
                        }
                        */?>
                        <tr>
                            <td style="border: 1px solid #000000;font-size:20pt;font-weight:bold; text-align:center;">
                                المبلغ المطلوب للدفع
                            </td>
                            <td style="border: 1px solid #000000;font-size:20pt;font-weight:bold; text-align:center;" id="total">
                                <?php /* echo  $total */?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000000;font-size:18pt;">
                رقم الرخصة:
                
                    <input class="lblDepts lblDept4" name="input2" id="input2" />
                </td>
            </tr>
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
                قسم 
                
                        <?php /* if($currTicket->fk_i_dept_id!=8) 
                        echo "الكهرباء";
                        else 
                        echo "المياه"*/?>
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
        
        <input type="hidden" name="lastRec" id="lastRec" value="18" />
        <input type="hidden" name="pk_i_id" id="pk_i_id" value="<?php /* echo $currTicket->pk_i_id*/?>" />
        <input type="hidden" name="related_ticket" id="related_ticket" value="<?php /* echo $currTicket->related_ticket*/?>" />
</form>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".lblDepts").attr("readonly","")
        $(".lblDept<?php /* echo $userdata->DepartmentID*/?>").removeAttr("readonly")
       
    })

    $(document).ready(function(){
        
        
<?php /* foreach($appInput as $key=>$value){
    */?>
    $("#<?php /* echo $key*/?>").val('<?php /* echo preg_replace( "/\r|\n/",'.',$value)*/?>')
    <?php /* 
} */?>
        $(".lblDepts").on('change blur keypress keyup',function(){
            var formData = new FormData($("#rpFrm")[0]);
        $.ajax({
            url: '<?php /* echo base_url()*/?>services/C_print/addRptJson',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
            },
            error:function(){
            },
                cache: false,
                contentType: false,
                processData: false
        });
            
        })
        $("#input9").on('change blur keypress keyup',function(){
            var formData = new FormData($("#rpFrm")[0]);
        $.ajax({
            url: '<?php /* echo base_url()*/?>services/C_print/addRptJson',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
            },
            error:function(){
            },
                cache: false,
                contentType: false,
                processData: false
        });
            
        })
    })
    $(document).ready(function(){
    $("#input19").on('change blur keyup',function(){
        var formData = {'pk_i_id':<?php /* echo $currTicket->pk_i_id*/?>,'startid':0};
        
            <?php /*  
            $i=($currTicket->capacity==1?0:8); */?>
        var formData = {'pk_i_id':<?php /* echo $currTicket->pk_i_id*/?>,'startid':<?php /* echo $i */?>};
        <?php /*  
            $json_fees=json_decode($ticket[0]->json_fees);
            foreach($json_fees as $key => $value){*/?>
        formData['feesValue<?php /* echo $i*/?>']=$("#feesValue<?php /* echo $i*/?>").val();
        formData['feestxt<?php /* echo $i*/?>']=$("#feestxt<?php /* echo $i*/?>").val();
        <?php /* $i++;}*/?>
        formData['CntrNo']=$("#input19").val();
        formData['tbl']=3;
        formData['step']=<?php /* echo $i */?>;
        $.ajax({
            url: '<?php /* echo base_url()*/?>services/ticket/updateFees',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                alert('تمت العملية بنجاح')
                self.location='/';
            },
            error:function(){
            },
        });
            
        })
        $(".FessVals").on('change blur keyup',function(){
            var total=0;
            $(".FessVals").each(function( index ) {
                if($.isNumeric($( this ).val())){
                    total+= parseInt($( this ).val() );
                    //console.log(total,$( this ).val())
                }
            });

        console.log(total)
        $("#total").html(total)
            <?php /*  
            $i=($currTicket->capacity==1?0:8); */?>
        var formData = {'pk_i_id':<?php /* echo $currTicket->pk_i_id*/?>,'startid':<?php /* echo $i */?>};
        <?php /*  for($j=$i;$j<$i+8;$j++){*/?>
        formData['feesValue<?php /* echo $j*/?>']=$("#feesValue<?php /* echo $j*/?>").val();
        formData['feestxt<?php /* echo $j*/?>']=$("#feestxt<?php /* echo $j*/?>").val();
        total+=parseInt(formData['feesValue<?php /* echo $j*/?>']);
        <?php /* }*/?>
        formData['tbl']=3;
        formData['step']=7;
        $.ajax({
            url: '<?php /* echo base_url()*/?>services/ticket/updateFees',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
            },
            error:function(){
            },
        });
            
        })
    })
</script>
