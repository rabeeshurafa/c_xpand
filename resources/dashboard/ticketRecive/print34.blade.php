
<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
    }
     td{
               padding:3px !important;
               align-text:center;
           }
    .w5{
            width:100% !important;
        }
     input,textarea{
            width:100% !important;
            
        }
    @media print{
        input,textarea{
            border:0px solid #ffffff;
            padding:0px;
        }
        .hidePrint{
            display:none;
        }
          
        
        textarea{
            width:100%;
        }
        body{
            margin:0px;
        }
    }
</style>
<?php $currTicket=$ticket[0];?>
<pre>
<?php //var_dump($currTicket);?>
</pre>
<form method="post" id="rpFrm" dir="rtl">
    
        <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:0px;">
            <tr style="background-color: #FFFFFF;">
                <td style="padding:0px; margin:0px;text-align: center;">
                    <?php //$this->load->view('services/hdrNew');?>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%"style="margin-top: 40px;">
            <tr>
                <td width="50%" align="right">
                        <h6 style="font-size:16pt;font-weight:bold;">التاريخ : 
                        <?php echo date('d/m/Y',strtotime($currTicket->dt_created_at )); ?></h6>
                        <h6 style="font-size:16pt;font-weight:bold;">
                     يرجى الموافقة على طلب صرف مبلغ : </h6>
                </td>
            
                <td width="50%">
                        <h6 style="font-size:16pt;font-weight:bold;text-decoration:underline;"> مطالبة مالية </h6>
                        <h6 style="font-size:16pt;font-weight:bold;">
                        <?php echo $currTicket->totalamount; ?>
                        <?php echo $currTicket->curr_name; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        المبلغ بالحروف:
                        (<span id="amountInAlpha"></span><?php echo $currTicket->curr_name; ?>
                        &nbsp; فقط لا غير)</h6>
                </td>
            </tr>
            </table>
            
        <table cellpadding="0" cellspacing="0" width="100%">
        <?php /*    <tr>
                <td width="50%" align="right">
                    <label class="form-label col-sm-12 col-md-12" style="text-align:right; ">
                        <h6 style='font-size:20pt; font-weight:bold;  '>
                            رقم المكلف:
                            &nbsp;
                            <?php echo $customer[0]->CutomerNo; ?>
                        </h6>
                    </label>
                </td>
                <td width="50%" align="left">
                    <table cellpadding="5" cellspacing="0" width="70%" align="left" >      
                        <tr>
                            <td style="border-left: 0px solid #000000;font-size:18pt;">
                                <h6 style='font-size:20pt; font-weight:bold;'>
                        رقم
                        <?php if($currTicket->fk_i_dept_id!=8) 
                        echo "اشتراك الكهرباء";
                        else 
                        echo "اشتراك المياه"?>:
                        </h6>
                            </td>
                            <td width="100px" >
                            
                                <input class="lblDepts lblDept31" name="input19" id="input19" style="font-size:20pt; font-weight:bold;width:100px" value="<?php echo $currTicket->CntrNo ; ?>" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> */?>
        </table>
        
        <table cellpadding="3" cellspacing="0" width="100%">
            <tr>
                <td style="font-size:18pt; width:15%">
                    لامر السادة / السيد:
                </td>
                <td style="font-size:18pt;">
                    <?php echo $currTicket->SupplierName ?>
                </td>
                
            </tr>
            <tr>
                <td style="font-size:18pt;" align="right">
                    وذلك عن الاعمال التالية:
                </td>
            </tr>
        </table>
        
        
        <input type="hidden" name="pid" value='<?php echo $currTicket->pk_i_id ?>'>
        <table  class="table table-bordered" cellpadding="0" cellspacing="0" width="100%" table-borderd>
            <thead>
                <tr>
                    <th style=" width:10% !important;">البند</th>
                    <th style=" width:25% !important;">البيان</th>
                    <th style=" width:10% !important;">الوحدة</th>
                    <th style=" width:10% !important;">الكمية</th>
                    <th style=" width:10% !important;">سعر الوحدة </th>
                    <th style=" width:10% !important;">المبلغ الاجمالي</th>
                </tr>
            </thead>
            <tbody class="addRec">
                <button type="button" class=" btn btn-primary hidePrint" style="position: fixed;bottom: 0px;right: 0px;" height="32px" style="cursor: pointer" onclick="addExtraRow()">
                    اضافة سطر جديد
                </button>
                <tr>
                    <td>1</td>
                    <td>
                        <input class=" " name="material1" id="material1" value="<?php echo $currTicket->note1 ?>" />
                    </td>
                    <td><input class="  w5" name="unit1" id="unit1" value=" مقطوع " /></td>
                    <td><input class="  w5 size" name="size1" id="size1" onchange="calcTotal();calcTotals();" value="1" /></td>
                    <td><input class="  w5 priceunit" onchange="calcTotal();calcTotals();" value="<?php echo $currTicket->totalamount ?>" name="priceunit1" id="priceunit1" /></td>
                    <td><input class="  w5 total" readonly onchange="calcTotals()"  name="total1" id="total1" /></td>
                </tr>
                
          </tbody>
          <tbody>
                <tr >
                    <td colspan="5" style="text-align:center"> المجموع </td>
                    <td><input readonly class="  w5 total"  name="total" id="total" /></td>
                </tr>
          </tbody>
         
        </table>
        <div class="row " style="text-align:center; margin-top:50px">
            <div class= "col" style="text-align:center; margin-top:50px"><b> توقيع المحاسب ................................................ </b></div>
            <div class= "col"  style="text-align:center; margin-top:50px"><b> توقيع رئيس البلدية ..............................................</b></div>
        </div>
        <div class="row">
            <div class= "col" style="text-align:center; margin-top:50px"><b> توقيع اللجنة المالية ................................................</b></div>
            <div class= "col"  style="text-align:center; margin-top:50px"><b>توقيع المستفيد ...............................................</b> </div>
        </div>
        <input type="hidden" name="lastRec" id="lastRec" value="2" />
        <input type="hidden" name="pk_i_id" id="pk_i_id" value="<?php echo $currTicket->pk_i_id?>" />
        <input type="hidden" name="related_ticket" id="related_ticket" value="<?php echo $currTicket->related_ticket?>" />
        <button type="button" class="hidePrint" style="position: fixed;bottom: 0px;left: 0px;" >
            <img src="/uploads/s1.jpg" id="makeResponse" height="32px" style="cursor: pointer" onclick="ManualSave()">
        </button>
</form>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>assets/js/Tafqeet.js"></script>

<script>
    var lastCntr=2;
            function addExtraRow(){
                var row='<tr>'+
                    '<td>'+lastCntr+'</td>'+
                    '<td><input class=" " name="material'+lastCntr+'" id="material'+lastCntr+'" /></td>'+
                    '<td><input class="  w5" name="unit'+lastCntr+'" value=" مقطوع "  id="unit'+lastCntr+'" /></td>'+
                    '<td><input class="  w5" onchange="calcTotal();calcTotals();" value="1" name="size'+lastCntr+'" id="size'+lastCntr+'" /></td>'+
                    '<td><input class="  w5" onchange="calcTotal();calcTotals();" name="priceunit'+lastCntr+'" id="priceunit'+lastCntr+'" /></td>'+
                    '<td><input class="  w5" onchange="calcTotals()" readonly name="total'+lastCntr+'" id="total'+lastCntr+'" /></td>'+
                '</tr>';
                lastCntr++
                $(".addRec").append(row)
                $('#lastRec').val(lastCntr);
            }
            
</script>
<script>
    $(document).ready(function(){
        //$(".lblDepts").attr("readonly","")
        <?php 
        
            $j=1; //var_dump($appInput);
        foreach($appInput as $row){
            if($j !=1)
                {
                   ?> addExtraRow();<?php
                }
            foreach($row as $key=>$value){
                
                echo "$(\"#$key$j\").val('$value');\n";
                
            }
            $j++;
        } ?>
        
        
                
                
       
    })
    function calcTotal(){
        total=0;
        end=$("#lastRec").val();
            for(i=1;i<end;i++)
                {
                    if($('input[name ="size'+i+'"]').val().length>0)
                        total+=parseInt($('input[name ="size'+i+'"]').val()*$('input[name ="priceunit'+i+'"]').val())
                    $('input[name ="total'+i+'"]').val(total);
                    total=0;
                }
    }
    function calcTotals(){
        totals=0;
        end=$("#lastRec").val();
            for(i=1;i<end;i++)
                {
                    if($('input[name ="total'+i+'"]').val().length>0)
                        totals+=parseInt($('input[name ="total'+i+'"]').val())
                   
                }
                 $('input[name ="total"]').val(totals);
    }
    
                $(document).ready(function(){
                    calcTotal();
                    calcTotals();
                })

    function ManualSave(){
    var formData = new FormData($("#rpFrm")[0]);
        $.ajax({
            url: '<?php echo base_url()?>services/C_print/addRptJson3',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                alert('تمت عملية الحفظ')
            },
            error:function(){
                alert('تمت عملية الحفظ')
            },
                cache: false,
                contentType: false,
                processData: false
        });
    }
    $(document).ready(function(){
        $("#amountInAlpha") .html(tafqeet (<?php echo $currTicket->totalamount; ?>))
        
<?php /*foreach($appInput as $key=>$value){
    ?>
    $("#<?php echo $key?>").val('<?php echo preg_replace( "/\r|\n/",'.',$value)?>')
    <?php 
} */?>
        <?php /*$(".lblDepts").on('change blur keypress keyup',function(){
            var formData = new FormData($("#rpFrm")[0]);
        $.ajax({
            url: '<?php echo base_url()?>services/C_print/addRptJson2',
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
            
        })*/?>
        
    })
   
</script>
