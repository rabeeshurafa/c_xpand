<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
        font-size:20pt;
    }
    div{
        padding:10px;
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
        .
            .input-group {
                width: 99% !important;
            }
            .marginrightminus30 {
                margin-right: 0px;
            }
        
    }
    .footerLine{
        width:100%;
        text-align:center;
        margin-top:10%;
    }
</style>
<?php /* $currTicket=$ticket[0];*/?>
<pre>
    <?php /* //print_r( $currTicket); */?>
</pre>
<div>
                <div width="50%" align="right">
                    
                    <h6 style="font-size:16pt;font-weight:bold;">رقم الطلب :
                        (<?php /* echo $currTicket->pk_i_id; */?>)</h6>
                </div>
                <?php /* if($currTicket->related_ticket==14){ */?>
                <div width="50%" align="right">
                        <h6 style="font-size:16pt;font-weight:bold;">تاريخ الطلب:
                        <?php /* echo date('d/m/Y',strtotime($currTicket->ticket_created_at )); */?></h6>
                </div>
                <?php /* } else {*/?>
                <div width="50%" align="right">
                        <h6 style="font-size:16pt;font-weight:bold;">تاريخ الطلب:
                        <?php /* echo date('d/m/Y',strtotime($currTicket->dt_created_at )); */?></h6>
                </div>
                <?php /* }*/?>
            </div>
<form method="post" id="rpFrm" dir="rtl" style="margin-top:120px">
        <div class="row">
            
        <h1 class="col-sm-12 " style="text-align:center"> وصل استلام </h1>
        </div>
        
        <div class="row">
        <b> مقدم الطلب : </b>
        <span>
             <?php /* if($currTicket->related_ticket==14) {echo $currTicket->s_connected_with;} else{*/?>
            <?php /* echo  $currTicket->customer_name;}*/?>
            </span>
        </div>
        
        <div class="row">
            
            <b> عنوانه : / </b>
            <input name="address" id="address">
        </div>
        <div class="row">
        <b> رقم الهوية : </b>
            <?php /* echo($currTicket->nationalId);*/?>
        </div>
         <div class="row">
        <b> الجوال : </b>
            <?php /* echo($currTicket->s_mobile);*/?>
        </div>
        <div class="row">
        <b> موضوع الطلب :  </b>
            <?php /* if($currTicket->related_ticket==14) {echo $currTicket->app_type_txt;} else{*/?>
            <?php /* echo($title);}*/?>
        </div>
        
        <hr>
        
        <div class="row">
                <b> مختصر نص الطلب : </b>        
                <div class="col">
                    <textarea rows="5" style="width:100%; font-size:18px;" name="notes" id="notes"><?php /* echo $currTicket->s_content */?></textarea>
                </div>
        </div>
        
        <div class="row my-3">
            
            <b class="col" style="text-align:left"> توقيع مقدم الطلب  </b>
            
        </div>
        
         <div class="row hide">
            
        <h1 class="col-sm-12 hide" style="text-align:center">   </h1>
        </div>
        
        <input type="hidden" name="pk_i_id" id="pk_i_id" value="<?php /* echo $currTicket->pk_i_id*/?>" />
        <input type="hidden" name="related_ticket" id="related_ticket" value="<?php /* echo $currTicket->related_ticket*/?>" />
        <button type="button" class="hidePrint" style="position: fixed;bottom: 0px;left: 0px;" >
            <img src="/uploads/s1.jpg" id="makeResponse" height="32px" style="cursor: pointer" onclick="ManualSave()">
        </button>
        
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
       
    })
function ManualSave(){
    var formData = new FormData($("#rpFrm")[0]);
    console.log(($("#rpFrm")[0]));
        $.ajax({
            url: '<?php /* echo base_url()*/?>services/C_print/addRptJson3',
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

</script>