<style>
    h1,h2{
        margin:0px;
    }
    
@media print {
  .divFooter {
      width:100%;
    position: fixed;
    bottom: 0;
}
}
</style>
<?php //dd($res)//var_dump($ticket[0]); ?>
<div class="row" id="forPrint" style="">
    <!-- header -->
    <table width="100%"  style="color: black;direction:rtl; padding-bottom:20px;">
        <tr style="background-color: #FFFFFF;">
            <td colspan="3">
                <img src="{{$setting->header_img}}" width="100%" style="max-width:100%">
            </td>
        </tr>
    </table>
    <hr style="border: 2px solid #000000; display:none;" />
    <div>
        <table style="width: 100%; margin-top:10px; line-height:62px ">
        <tr>
            <td colspan="2" style="text-align:right;font-size: 14pt; ">
                <b>
                    التاريخ :
                </b>
                <?php echo date('Y/m/d')?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;padding-top:0px;">
                <h1>
                    <span style="border-bottom: 3px solid #000000;font-size: 16pt;  font-weight: bold">
                    قـــرار جلســــــــة 
                    </span>
                </h1>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right;direction: rtl;padding-top:0px;padding-right:40px;font-size: 16pt; font-weight: bold">
                الموضوع:
                <?php echo $res->title?><br />
            </td>
        </tr>
        <?php if($res->connected_to_txt!=null){?>
        <tr>
            <td colspan="2" style="text-align:right;direction: rtl;padding-top:0px;padding-right:40px;font-size: 16pt;">
                مقدم الطلب:
                <?php echo $res->connected_to_txt==null?'':$res->connected_to_txt?><br />
            </td>
        </tr>
        <?php }?>
        <tr>
            <td colspan="2" style="text-align:right;direction: rtl;padding-top:0px;padding-right:40px;font-size: 16pt;">
                قرر 
                <?php echo $res->AgendaDetail->AgendaExtention->name?>
                في جلسته رقم
                (<?php echo $res->AgendaDetail->agenda_number?> )
                والمنعقدة بتاريخ
                
                <?php echo $res->AgendaDetail->agenda_date?>
                ما يلي
                 :
                <div style=" text-align: right;padding-right:0px">
                <?php echo strlen($res->descision)>0 ?$res->descision:'لم يتخذ قرار' ;?>
</div>

            </td>
        </tr>
        <tr>
            <td style="font-size: 16pt;  width: 50%;text-align:center; vertical-align:top; font-weight: bold;    line-height: 25px;">
                <?php echo $res->AgendaDetail->AgendaExtention->Admin?$res->AgendaDetail->AgendaExtention->Admin->name:''?>
                
<br />
<br />
                <?php echo $res->AgendaDetail->AgendaExtention->signature_jobtitle?$res->AgendaDetail->AgendaExtention->signature_jobtitle:'' ?>

</b>
            </td>
            <td style="font-size: 20px;text-align:center">
                

            </td>
        </tr>
    </table>
    </div>
    <table  width="100%" class="footerLine" style="border:0px solid #ffffff; margin-bottom:20px;position:absolute;bottom: 0;">
        <tr>
            <td style="border:0px solid #ffffff;">
                <img src="{{$setting->footer_img}}" width="100%">
            </td>
        </tr>
    </table>
</div>
                                                            
<script>
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">');
    mywindow.document.write('</head><body style="padding-top: 150px; line-height: 24; font-size: 14px;" >');
    
    mywindow.document.write(document.getElementById("forPrint").innerHTML);
    mywindow.document.write("<img src='https://chart.googleapis.com/chart?cht=qr&chl=https://stage.expand.ps/viewCert/"+data.id1+"&chs=180x180&choe=UTF-8&chld=L|2' alt=''>");
    mywindow.document.write('</body></html>');
    
    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/
</script>
    