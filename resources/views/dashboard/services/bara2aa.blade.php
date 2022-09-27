<body style="margin:0px; padding: 0px ">
    
<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
    }
        input,textarea{
            font-size:14pt;
        }
    @media print{
        input,textarea{
            border:0px solid #ffffff;
            font-size:18pt;
            width:100px;
        }
        textarea{
            width:100%;
        }
    }
</style>
<?php /* //var_dump($customer)*/?>
<form method="post" id="rpFrm">
<div id="forPrint">
    <table width="100%" style="color: black; font: 12px;direction:rtl">
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td colspan="3" style="padding:0px; margin:0px;text-align: center;">
                    <?php /* $this->load->view('services/hdrNew');*/?>
                </td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <td>
                    الرقم:
                    <span id="certSerial">
                        <?php /* echo $cert[0]->serial_per_year */?>
                    </span>
                    
                </td>
                <td></td>
                <td align="left">
                    التاريخ
                <span id="certDate"><?php /* echo date('d/m/Y',strtotime($cert[0]->dt_created_at)); */?></span>
                </td>
        </tr>
        <tr>
            <td width="34%" align="center" colspan="3">
                <h2><u style="font-size:15pt !important;font-weight:bold;display: inline; font-family: Helvetica,Arial, sans-serif !important;">
                طلب براءة ذمة مالية
                </u></h2>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right" style="line-height: 30px;font-size:15pt !important;font-weight:bold;">
                    حضرة السادة بلدية -- المحترمون
                    <br>
                    تحية طيبة و بعد
                    <br>
                    الموضوع: طلب براءة ذمة مالية
                    <br>
                    اتقدم بهذا الطلب للحصول على براءة ذمة مالية من بلدية -- وذلك عن:
                    <br>
                    
            </td>
        </tr>
        <tr class="blank_row">
            <td colspan="3">
                <table style="width:100%; text-align:right;" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            اسم المكلف:
                            <?php /* echo $customer[0]->s_name_ar; */?>
                            <span id="certName"></span>
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            رقم المكلف:
                            <?php /* 
                            echo $customer[0]->CutomerNo; */?>
                            <span id="certCustNo"></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            رقم الهوية:
                            <?php /* echo $customer[0]->CustomerNo; */?>
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            رقم الجوال:
                            <?php /* echo $customer[0]->MobileNo1; */?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            إشتراكات الكهرباء:
                            <span id="certElecCntr">
                                <?php /* foreach($electricitySubscription as $row){
                                echo $row->subscription_no.',';
                                }*/?>
                            </span>
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            اشتراكات المياه:
                            <span id="certWaterCntr">
                                <?php /* foreach($waterSubscription as $row){
                                echo $row->subscription_no.',';
                                }*/?>
                                </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14pt;border:1px solid #000000; padding:5px; text-align:right;" colspan="2">
                           المستندات المرفقة: صورة هوية المكلف, رخصة بناء العقار إن وجد, سندات قبض بالرسوم المستحقة.
                           <br>
                           هذه الشهادة سارية المفعول حتى تاريخ  
                           31/12/<?php /* echo date('Y'); */?>
                           وذلك بناء على الرسوم المستحقة على المكلف.
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                                        رسوم تحسين و تطوير:
                                    </td>
                                    <td>
                                        <input name="input1" id="input1" class="lblDepts lblDept31" style="" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                                        رسوم مسقفات:                                        
                                    </td>
                                    <td>
                                        <input name="input2" id="input2" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                                        رسوم حرف وصناعات:
                                    </td>
                                    <td>
                                        <input name="input3" id="input3" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                            رسوم مخالفات أو غرامات:
                                    </td>
                                    <td>
                            <input name="input4" id="input4" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                            ديون كهرباء:
                                    </td>
                                    <td>
                            <input name="input5" id="input5" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                            ديون مياه:
                                    </td>
                                    <td>
                            <input name="input6" id="input6" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                            رسوم مساهمات طرق:
                                    </td>
                                    <td>
                            <input name="input7" id="input7" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                            رسوم مساهمات جدران استنادية:
                                    </td>
                                    <td>
                            <input name="input8" id="input/" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;" colspan="2">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:16pt !important;font-weight:bold;width: 200px;">
                           رسوم رخص البناء:
                                    </td>
                                    <td>
                            <input name="input9" id="input9" class="lblDepts lblDept31" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right; min-height:90px;" colspan="2">
                                ملاحظات
                                <span id="notes">
                            <input name="input10" id="input10" class="lblDepts lblDept31"style="width: 100%;" />
                                </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14pt;border:1px solid #000000; padding:5px; text-align:right;" colspan="2">
                            علما بأن: 
                            <ul>
                                <li>
                                    رسوم النفايات وإنارة الشوارع وصيانة شبكة الكهرباء يتم تسديدها بشكل دوري على فاتورة كهرباء الدفع المسبق.
                                </li>
                                <li>
                                    رسوم صيانة شبكة المياه تسدد بشكل دوري على فاتورة مياه الدفع المسبق.
                                </li>
                                <li>
                                    براءة الذمة لاتشمل الرسوم و الديون التي يتم تسديدها على فاتورة كهرباء الدفع المسبق.
                                </li>
                                <li>
                                    من حق البلدية إضافة أو تعديل أو إلغاؤ أي رسم في حال وجود خطأ.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;" width="50%">
                            المطلوب للدفع:
                            <input name="input11" id="input11" class="lblDepts lblDept31" />
                        </td>
                        <td style="font-size:16pt !important;font-weight:bold;border:1px solid #000000; padding:5px; text-align:right;">
                            رقم سند القبض:
                            <input name="input12" id="input12" class="lblDepts lblDept31" />
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table style="width:100%;margin-top:20px">
                    <tbody>
                        <tr>
                            <td style="font-size:16pt !important;font-weight:bold;width:33%;text-align:center">
                                مصادقة قسم الهندسة و المشاريع
                                <br />
                                <textarea name="input13" rows="2" id="input13" class="lblDepts lblDept4"style="width: 100%;"></textarea>
                                    <hr style="border-top: dotted #000000 1px;margin-top: 30px;">
                            </td>
                            <td style="font-size:16pt !important;font-weight:bold;width:34%;text-align:center">
                                مصادقة قسم الشؤون الإدارية
                                <br />
                                <textarea name="input14" rows="2" id="input14" class="lblDepts lblDept37"style="width: 100%;" ></textarea>
                                
                                    <hr style="border-top: dotted #000000 1px;margin-top: 30px;">
                            </td>
                            <td style="font-size:16pt !important;font-weight:bold;width:33%;text-align:center">
                                مصادقة الشؤون المالية والإدارية
                                <br />
                                <textarea name="input15" rows="2" id="input15" class="lblDepts lblDept31"style="width: 100%;" ></textarea>
                                    <hr style="border-top: dotted #000000 1px;margin-top: 30px;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
    </table>
</div>

                                <input type="hidden" name="lastRec" id="lastRec" value="15" />
                                <input type="hidden" name="pk_i_id" id="pk_i_id" value="<?php /* echo $cert[0]->pk_i_id*/?>" />
                                <input type="hidden" name="related_ticket" id="related_ticket" value="<?php /* echo $ticket->related_ticket*/?>" />
                                <textarea style="display:none" name="msgContent1" id="msgContent1" ></textarea>
</form>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".lblDepts").attr("readonly","")
        $(".lblDept<?php /* echo $userdata->DepartmentID*/?>").removeAttr("readonly")
       
    })

    $(document).ready(function(){
        
<?php /* foreach($appInput as $key=>$value){
    */?>
    $("#<?php /* echo $key*/?>").val('<?php /* echo $value*/?>')
    <?php /* 
} */?>
        $(".lblDepts").on('change',function(){
            
	      $("#msgContent1").val($("#forPrint").html())
            var formData = new FormData($("#rpFrm")[0]);
        $.ajax({
            url: '<?php /* echo base_url()*/?>services/C_print/addToCert',
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
</script>