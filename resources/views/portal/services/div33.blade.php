<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<?php /*

$arrDays=array(
    'Saturday'=>'السبت',
    'Sunday'=>'الأحد',
    'Monday'=>'الإثنين',
    'Tuesday'=>'الثلاثاء',
    'Wednesday'=>'الأربعاء',
    'Thursday'=>'الخميس',
    'Friday'=>'الجمعة',
);*/?>
<style>
    h1,h2{
        margin:0px;
    }
    td{
        height:40px;
        font-size:16pt;
    }
    b{
        font-size:18pt;
    }
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
    input[type=text]
    {
            height: 35px;

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
    <?php /* $currTicket=$ticket[0];*/?>

    <?php /*
    //print_r($currTicket);
    */?>
    
    <?php /* //print_r($appInput);*/?>
<form method="post" id="rpFrm" dir="rtl">
<div class="row" id="forPrint">
    <table  style="width: 100%;margin-top:10px;direction: rtl;">
            <tr>
                <td colspan="2" style="text-align:center">
                    
                    <h1 style="text-decoration:underline;">
                       <b>     نموذج طلب اجازة    </b>
                    </h1>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;padding-top: 15px;">
                    <b>
                        تاريخ طلب الإجازة :
                    </b>
                    <?php /* echo date('d/m/Y',strtotime($currTicket->ticket_created_at))*/?>
                </td>
               
            </tr>
    </table>        
        <table class="table table-bordered" style="width: 100%;margin-top:30px;direction: rtl;">
                <tr>
                    <td width="15%" style="text-align:center">
                        <b>
                            مقدم الطلب:
                        </b>
                        
                    </td>
                    <td width="15%"><?php /* echo $currTicket->s_name_ar*/?></td>
                    <td width="15%" style="text-align:center">
                        <b>
                            القسم:
                        </b>
                        
                    </td>
                    <td width="15%" > <?php /* echo $currTicket->deptName*/?> </td>
                    <td width="15%" style="text-align:center">
                        <b>
                            المسمى الوظيفي:
                        </b>
                        
                    </td>
                    <td width="15%"> <?php /* echo $currTicket->deptName*/?> </td>
                </tr>
               <tr>
                    <td width="20%" style="text-align:center">
                        <b>
                        القائم بالعمل اثناء الاجازة (البديل)
                        </b>
                    </td>
                    <td colspan="2">
                         <input style="display:inline;" type="text" value="<?php /* */?>" id="newEmp"  class="form-control " placeholder="الموظف البديل " name="newEmp">
                     </td>
                    <td width="15%" style="text-align:center">
                        <b>
                            مدة الاجازة المطلوبة
                        </b>
                    </td>
                    <td colspan="2"> 
                        <span >
                        <span> من : </span>
                        <input style="width: 33%;display: inline;" type="text" readonly disable id="period1"onblur="calcDuration()" value="<?php /* echo date('d/m/Y',strtotime($currTicket->dt_start_at))*/?>" class="form-control pickadate-arrow singledate  picker__input picker__input--active" placeholder="تاريخ البدء" name="startDate">
                        </span>
                        <span >
                        <span> الى : </span>
                        <input style="width: 33%;display: inline;" readonly disable type="text"onblur="calcDuration()" value="<?php /* echo date('d/m/Y',strtotime($currTicket->dt_end_at))*/?>" id="period2" class="form-control pickadate-arrow singledate  picker__input picker__input--active" placeholder="تاريخ الإنتهاء " name="endDate">
                         </span>
                         <span class="form-group res"></span>
                    </td>
                </tr>
        </table>
        <table style="margin-top: 10px; direction: rtl;width: 100%; padding-bottom: 0px;">
            <td>
            <h1 ><b> الاجازة المطلوبة :</b></h1>
            </td>
        </table>
        <table class="table table-bordered" style="width: 100%;direction: rtl;">
            <tr>
                <td style="width:20px text-align:center" ><span><input name="holidayReason" id="holidayReason1" value="1" type="checkbox" class="checkboxtext"></span></td>
                <td>سنوية</td>
                <td style="width:20px" ><span><input type="checkbox" name="holidayReason" id="holidayReason2" value="2" class="checkboxtext"></span></td>
                <td>العارضة</td>
                <td style="width:20px" ><span><input type="checkbox" name="holidayReason" id="holidayReason3" value="3" class="checkboxtext"></span></td>
                <td>الامومة والولادة</td>
                <td style="width:20px" ><span><input type="checkbox" name="holidayReason" id="holidayReason4" value="4" class="checkboxtext"></span></td>
                <td>اجازة بدون مرتب</td>
            </tr>
            <tr>
                <td style="width:20px" ><span><input type="checkbox" name="holidayReason" id="holidayReason5" value="5" class="checkboxtext"></span></td>
                <td>مرضية</td>
                <td style="width:20px" ><span><input type="checkbox" name="holidayReason" id="holidayReason6" value="6" class="checkboxtext"></span></td>
                <td>الدراسية</td>
                <td style="width:20px" ><span><input type="checkbox" name="holidayReason" id="holidayReason7" value="7" class="checkboxtext"></span></td>
                <td>حج </td>
                <td style="width:20px" ><span><input type="checkbox" name="holidayReason" id="holidayReason8" value="8" class="checkboxtext"></span></td>
                <td>اخرى </td>
            </tr>
            <!--<tr>-->
            <!--    <td colspan="2" style="text-align:center"> تاريخ الاجازة :</td>-->
            <!--    <td> من </td>-->
            <!--    <td colspan="3"> </td>-->
            <!--    <td> الى </td>-->
            <!--    <td></td>-->
            <!--</tr>-->
        </table>
        <table  width="100%" style="margin-top:20px;direction: rtl;">
                <tr>
                    <td  style="text-align:right;">
                          سبب الاجازة :  
                          <?php /* echo $currTicket->malDesc*/?>
                            </td>
                </tr>
               <tr width="100%">
                    <td  width="50%" style="text-align:right">
                         <label for="holidayAddress">عنوان الموظف خلال فترة الاجازة</label>
                         <input style="display:inline;width:50%" type="text" value="<?php /* */?>" id="holidayAddress" class="form-control " placeholder="أدخل عنوان الموظف " name="holidayAddress">
                    </td>
                    <td width="50%">
                            <label for="phone"> هاتف الموظف خلال الاجازة</label>
    
                         <input style="display:inline;width:50%" type="text" value="<?php /* */?>" id="phone" maxlength="10" class="form-control numFeild" placeholder="أدخل رقم الهاتف " name="phone">
                     </td>
                </tr>
        </table>
        <!--<table style="margin-top: 20px; direction: rtl;width: 100%;">-->
        <!--    <td  width="50%" style="text-align:right;padding-top:20px ;">-->
        <!--         <label for="holidayAddress">ملاحظات المسؤول المباشر : </label>-->
        <!--         <input style="display:inline;width:50%" type="text" value="<?php /* */?>" id="notes"  class="form-control " placeholder="ملاحظات المسؤول " name="notes">-->
        <!--    </td>-->
            <!--<td style="padding:20px;text-align:left">-->
            <!--<h1 > توقيع الموظف : ..................................... </h1>-->
            <!--</td>-->
        <!--</table>-->
        
        <!--<table class="table table-bordered" style="width: 100%;margin-top:20px;direction: rtl;">-->
        <!--        <tr>-->
        <!--            <td width="25%" style="text-align:center">-->
        <!--                <b>-->
        <!--                    رصيد الاجازات السابق:-->
        <!--                </b>-->
                        
        <!--            </td>-->
        <!--            <td id="r_remain" width="25%"> </td>-->
        <!--            <td width="25%" style="text-align:center">-->
        <!--                <b>-->
        <!--                    رصيد الاجازات بعد الموافقة:-->
        <!--                </b>-->
                        
        <!--            </td>-->
        <!--            <td width="25%" >  </td>-->
        <!--        </tr>-->
        <!--</table>-->
        <table width="100%" style="margin: -5px; padding-top: 30px; margin-top: 30px;" align="center"cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3" style="vertical-align:center">
                <span style="    margin: 5px; float: right; background: #ffffff; padding-left: 10px; padding-right: 10px; font-size: 20pt !important;">
                    الاجازات للموظف
                </span>
                <hr style="border: solid 2px #000000">
            </td>
        </tr>
        </table>
        <div class="row" style="width: 100% !important; padding-top:20px">
            <div class="col-lg-12 col-md-12 pr-0 pr-s-12">
                <div class="form-group">
                    <table style="width:100%">
                        
                        <tr>
                            <th>
                                النوع
                            </th>
                            <th>
                                رصيد
                            </th>
                            <th>
                                مستنفذ
                            </th>
                            <th>
                                متبقي
                            </th>
                        </tr>
                        <tr>
                            <th>
                                سنوية
                            </th>
                            <td id="r_balance">
                                
                            </td>
                            <td id="r_spent">
                                
                            </td>
                            <td id="r_remain">
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                طارئة
                            </th>
                            <td id="u_balance">
                                
                            </td>
                            <td id="u_spent">
                                
                            </td>
                            <td id="u_remain">
                                
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <!--<table class="table table-bordered" style="width: 100%;direction: rtl;">-->
        <!--        <tr>-->
        <!--            <th rowspan="5" style="text-align:center; padding-top:130px;position:relative">-->
        <!--                <b>-->
        <!--                    رئيس المجلس-->
        <!--                </b>-->
        <!--            </th>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td  style="text-align:right;width:80%; padding-top:30px">-->
        <!--            <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    تم الموافقة عليها -->
        <!--            </td>-->
        <!--        </tr>-->
                
        <!--        <tr>-->
        <!--            <td  style="text-align:right;width:80%; padding-top:30px">-->
        <!--            <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    تم رفضها , بسبب  ................................................................................................  -->
        <!--            </td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td  style="text-align:right;width:80%; padding-top:30px">-->
        <!--            <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    الاسم : ............................................................................................................ -->
        <!--            </td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td  style="text-align:right;width:80%; padding-top:30px">-->
        <!--            <span style="padding-right:10px;padding-left:10px;"><input type="checkbox" class="checkboxtext"></span>    التوقيع : ......................................................................................................... -->
        <!--            </td>-->
        <!--        </tr>-->
        <!--</table>-->
        <!--<table style="margin-top: 10px; direction: rtl;width: 100%;">-->
        <!--    <td style="text-align:right">-->
        <!--    <h1>ملاحظة : فيما عدا الإجازة المرضية، يجب تقديم الطلب قبل بدء الإجازة بيومين.</h1>-->
        <!--    </td>-->
        <!--</table>-->
    <table width="100%" style="margin: -5px; padding-top: 30px;" align="center"cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3" style="vertical-align:center">
                <span style="    margin: 5px; float: right; background: #ffffff; padding-left: 10px; padding-right: 10px; font-size: 20pt !important;">
                    الردود على الطلب
                </span>
                <hr style="border: solid 2px #000000">
            </td>
        </tr>
        <tr>
            <td colspan="3" style=>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="3" >
<?php /* //var_dump($ticketHistory); */?>

    <?php /* 
    //var_dump($ticketHistory);
    $vvvv=0;
    $last_reciver=0;
    $is_close=0;
    $last_trans=0;
    $last_trans1=0;
    foreach ($ticketHistory as $row){
        if($row->replay_type=='t'){
            //var_dump($row);
            if($row->trans_id>$last_trans1)
                $last_trans1=$row->trans_id;
            $last_reciver=$row->fk_i_reciver_id;
            if($row->i_trans_state>0 && $is_close==0){
                $last_trans=$row->trans_id;
            }
            if($is_close<$row->i_trans_state)
                $is_close=$row->i_trans_state;
            $transTicket=$row;
        }
        */?>
        <div class="card-body">
            <?php /* 
                $vvvv++;
                
                if($vvvv==1){
                    //var_dump($row);
            //*/?>
            <div class="row" style="background-color: #ffffff; margin-left: 15px; margin-right: 15px;">
                <div class="col-sm-12 col-md-3 marginrightminus30 infoAvatar">
                    <a style="color:#385898;font-weight: 600;"><?php /*  echo $row->sender_nickname*/?></a>
                    <br />
                    <time class="fs14" style="color:#616770; ">
                        التاريخ:
                        <?php /* 
                        echo date('d/m/Y',strtotime($row->trans_created_at))."<br /> الساعة: ";
                        echo date('H:i',strtotime($row->trans_created_at));
                        */?>
                    </time>
                </div>
                <div class="col-sm-12 col-md-9 marginrightminus30">
                    <h5><time style="font-family: Helvetica, Arial, sans-serif !important;; color:#000000; font-size: 22px !important;">
                    <?php /* if($vvvv==1){
                    */?>
                        
                        تم إنشاء الطلب بواسطة:
                        <b><?php /*  echo $row->sender_nickname;
                        $orgSender=$row->fk_i_sender_id;
                        */?> </b>
                    <?php /* } */?></time>
                    </h5>
                    <h6><time style="font-family: Helvetica, Arial, sans-serif !important;; color:#000000;font-size: 22px !important;">
                    <?php /* if(strlen($row->s_note)>0){*/?>
                        <p><b style="color:#5599FE">ملاحظات: </b><?php /* echo $row->s_note*/?></time></p>
                    <?php /* }*/?>
                    </h6>
                </div>
                <?php /* if(sizeof($row->Compainian)>0){
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>uploads/a32.png" style="height: 32px;" />
                        المشاركين بالمهمة
                    </h5>
                    <div class="row">
                        <?php /* foreach($row->Compainian as $subRow){
                        if($subRow->i_comp_tag==1 ){*/?>
                        <div class="col-sm-12 col-md-2" style="text-align: center;">
                            <span class="avatar" style="width: 60px;">
                                <img src="<?php /* echo base_url()*/?>uploads/<?php /* echo $subRow->ImagePath*/?>" style="height: 60px;border: 1px solid #c7c7c7;padding: 2px;"/>
                                <br />
                                <span><?php /* echo $subRow->nickname */?></span>
                            </span>
                        </div>
                        <?php /* 
                        }}*/?>
                    </div>
                </div>
                <?php /* } */?>
                <?php /* 
                //var_dump($row->TakenProduct);
                if(sizeof($row->TakenProduct)>0){
                    
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>uploads/a12.png" style="height: 32px;" />
                        قطع للإستخدام
                    </h5>
                    <div class="row">
                        <div class="col-md-1" >
                            
                        </div>
                        <div class="col-sm-12 col-md-10" style="text-align: center;">
                            <table style="width:100%; margin-top: -10px;" class="detailsTB table">
								<tbody>
								    <tr>
    									<th scope="col">#</th>
    									<th scope="col">قطع الغيار</th>
    									<th scope="col">الرقم التسلسلي</th>
    									<th scope="col">الكمية</th>
    								</tr>
								</tbody>
								<tbody id="currEmp">
                                    <?php /* $i=1;
                                    foreach($row->TakenProduct as $subRow){
                                    if($subRow->i_type==1){*/?>
								    <tr>
								        <td><?php /* echo $i; $i++; */?></td>
								        <td><?php /* echo $subRow->ProductName*/?>     </td>
								        <td><?php /* echo $subRow->Parcode*/?>     </td>
								        <td><?php /* echo $subRow->i_quantity*/?>     </td>
							        </tr>
                                    <?php /* }}*/?>
						        </tbody>
							</table>
                        </div>
                        <div class="col-md-1" >
                            
                        </div>
                    </div>
                </div>
                <?php /* } */?>
                <?php /* 
                //var_dump($row->TakenProduct);
                if(sizeof($row->TakenProduct)>0){
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>uploads/a22.png" style="height: 32px;" />
                        قطع مرجعة
                    </h5>
                    <div class="row">
                        <div class="col-md-1" >
                            
                        </div>
                        <div class="col-sm-12 col-md-10" style="text-align: center;">
                            <table style="width:100%; margin-top: -10px;" class="detailsTB table">
								<tbody>
								    <tr>
    									<th scope="col">#</th>
    									<th scope="col">قطع الغيار</th>
    									<th scope="col">الرقم التسلسلي</th>
    									<th scope="col">الكمية</th>
    								</tr>
								</tbody>
								<tbody id="currEmp">
                                    <?php /* $i=1;
                                    foreach($row->TakenProduct as $subRow){
                                    if($subRow->i_type==2){*/?>
								    <tr>
								        <td><?php /* echo $i; $i++; */?></td>
								        <td><?php /* echo $subRow->ProductName*/?>     </td>
								        <td><?php /* echo $subRow->Parcode*/?>     </td>
								        <td><?php /* echo $subRow->i_quantity*/?>     </td>
							        </tr>
                                    <?php /* }}*/?>
						        </tbody>
							</table>
                        </div>
                        <div class="col-md-1" >
                            
                        </div>
                    </div>
                </div>
                <?php /* } */?>
                <?php /* if(sizeof($row->attach)>0){
                    $attachData=$row->attach;
                    //var_dump($attachData);
                */?>
                <?php /*
                    $imgArr=array();
                    $filesArr=array();
                    $linksArr=array();
                    //pdf|doc|docx|png|jpg|gif|jpeg
                    foreach($attachData as $rowAttach){
                        if (preg_match('/\d+\.jpg$/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.png/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.gif/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.jpeg/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.pdf/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.doc/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.docx/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.ppt/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.pptx/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.xls/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.xlsx/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.txt/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else {
                            array_push($linksArr,$rowAttach);
                        }
                    }
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>images/upload.png" style="height: 32px;" />
                        المرفقات
                    </h5>
                    <div class="row formDataImagesArea2">
                        <?php /* foreach($imgArr as $row1){*/?>
                            <div  class="col-sm-2" >
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="group1 cboxElement" style="color: #74798D;display: inline-block;" href="<?php /* echo base_url()*/?>uploads/<?php /* echo $row1->AttachServerName */?>" >
                                            <img src="<?php /* echo base_url()*/?>uploads/<?php /* echo $row1->AttachServerName */?>" title="<?php /* echo $row1->AttachName */?>" id="imgSlider" width="75px" height="75px"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php /* }*/?>
                    </div>
                    <div class="row formDataFilesArea2" style="margin-left: 0px;">
                        <?php /* foreach($filesArr as $row1){*/?>
                            <div id="attach" class="attach col-sm-6">
                                <span class="attach-text"><a href="<?php /* echo base_url()*/?>uploads/<?php /* echo $row1->AttachServerName */?>" target="_blank"><?php /* echo $row1->AttachName */?></a></span>
                                <a class="attach-close" style="color: #74798D" onclick="$(this).parent().remove()">×</a>
                                <input type="hidden" id="'+formDataStr+'imgUploads[]" name="formDataimgUploads[]" value="<?php /* echo $row1->AttachServerName */?>">
                                <input type="hidden" id="formDataorgNameList[]" name="formDataorgNameList[]" value="<?php /* echo $row1->AttachName */?>">
                            </div>
                        <?php /* }*/?>
                    </div>
                </div>
                <?php /* } */?>
            </div>
            <?php /* }else{
                    */?>
            <div class="row" style="background-color: #ffffff;margin-left: 15px; margin-right: 15px;">
                <div class="col-sm-12 col-md-3 marginrightminus30 infoAvatar">
                    <a style="color:#385898;font-weight: 600;"><?php /*  echo $row->sender_nickname*/?></a>
                    <br />
                    <time class="fs14" style="color:#616770;">
                        التاريخ:
                        <?php /* 
                        echo date('d/m/Y',strtotime($row->trans_created_at))."<br /> الساعة: ";
                        echo date('H:i',strtotime($row->trans_created_at));
                        */?>
                    </time>
                </div>
                <div class="col-sm-12 col-md-9 marginrightminus30">
                    <h5>
                        <time style="font-family: Helvetica, Arial, sans-serif !important; color:#000000;font-size: 22px !important;">
                    <?php /* if($vvvv==1){
                    */?>
                        تم إنشاء الطلب بواسطة: 
                        <b> <?php /*  echo $row->sender_nickname;
                        $orgSender=$row->fk_i_sender_id;*/?> </b>
                    <?php /* } */?>
                        </time>
                    </h5>
                    <h6>
                        <time style="font-family: Helvetica, Arial, sans-serif !important; color:#000000;font-size: 22px !important; ">
                            
                    <?php /* if(strlen($row->s_note)+strlen($row->s_response)==0){
                        if($row->i_trans_state==0){*/?>
                        تم تحويل الطلب فقط
                    <?php /* }
                        else if($row->i_trans_state==1){ echo "تم إغلاق الطلب";}
                        else 
                        {
                            if($row->replay_type=='r')
                            echo strlen($row->s_response)==0?"تم تدقيق الإغلاق":$row->s_response;
                            else
                            echo 'تم تحويل الطلب فقط';
                        }
                        
                        //echo $row->s_response;
                    }
                    else {
                            
                                if(strlen($row->s_response)>0){ */?>
                                    <?php /* echo $row->s_response*/?>
                                <?php /* } 
                                
                            
                        if(strlen($row->s_note)>0){
                            */?><?php /* //echo $row->s_response."<br >";
                        */?>
                            <b style="color:#5599FE">ملاحظات: </b><?php /* echo $row->s_note*/?>
                        <?php /*
                        }else if($row->replay_type=='t' && strlen($row->s_response)==0){
                                echo 'تم تحويل الطلب فقط';
                        }
                    }
                    
                    //echo $row->pk_i_id;*/?>
                        </time>
                    </h6>
                </div>
                <?php /* if(sizeof($row->Compainian)>0){
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>uploads/a32.png" style="height: 32px;" />
                        المشاركين بالمهمة
                    </h5>
                    <div class="row">
                        <?php /* foreach($row->Compainian as $subRow){*/?>
                        <div class="col-sm-12 col-md-2" style="text-align: center;">
                            <span class="avatar" style="width: 60px;">
                                <img src="<?php /* echo base_url()*/?>uploads/<?php /* echo $subRow->ImagePath*/?>" style="height: 60px;border: 1px solid #c7c7c7;padding: 2px;"/>
                                <br />
                                <span><?php /* echo $subRow->nickname */?></span>
                            </span>
                        </div>
                        <?php /* }*/?>
                    </div>
                </div>
                <?php /* } */?>
                <?php /* 
                //var_dump($row->TakenProduct);
                if(sizeof($row->TakenProduct)>0){
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>uploads/a12.png" style="height: 32px;" />
                        قطع للإستخدام
                    </h5>
                    <div class="row">
                        <div class="col-md-1" >
                            
                        </div>
                        <div class="col-sm-12 col-md-10" style="text-align: center;">
                            <table style="width:100%; margin-top: -10px;" class="detailsTB table">
								<tbody>
								    <tr>
    									<th scope="col">#</th>
    									<th scope="col">قطع الغيار</th>
    									<th scope="col">الرقم التسلسلي</th>
    									<th scope="col">الكمية</th>
    								</tr>
								</tbody>
								<tbody id="currEmp">
                                    <?php /* $i=1;
                                    foreach($row->TakenProduct as $subRow){*/?>
								    <tr>
								        <td><?php /* echo $i; $i++; */?></td>
								        <td><?php /* echo $subRow->ProductName*/?>     </td>
								        <td><?php /* echo $subRow->Parcode*/?>     </td>
								        <td><?php /* echo $subRow->i_quantity*/?>     </td>
							        </tr>
                                    <?php /* }*/?>
						        </tbody>
							</table>
                        </div>
                        <div class="col-md-1" >
                            
                        </div>
                    </div>
                </div>
                <?php /* } */?>
                <?php /* 
                //var_dump($row->TakenProduct);
                if(sizeof($row->TakenProduct)>0){
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>uploads/a22.png" style="height: 32px;" />
                        قطع مرجعة
                    </h5>
                    <div class="row">
                        <div class="col-md-1" >
                            
                        </div>
                        <div class="col-sm-12 col-md-10" style="text-align: center;">
                            <table style="width:100%; margin-top: -10px;" class="detailsTB table">
								<tbody>
								    <tr>
    									<th scope="col">#</th>
    									<th scope="col">قطع الغيار</th>
    									<th scope="col">الرقم التسلسلي</th>
    									<th scope="col">الكمية</th>
    								</tr>
								</tbody>
								<tbody id="currEmp">
                                    <?php /* $i=1;
                                    foreach($row->TakenProduct as $subRow){*/?>
								    <tr>
								        <td><?php /* echo $i; $i++; */?></td>
								        <td><?php /* echo $subRow->ProductName*/?>     </td>
								        <td><?php /* echo $subRow->Parcode*/?>     </td>
								        <td><?php /* echo $subRow->i_quantity*/?>     </td>
							        </tr>
                                    <?php /* }*/?>
						        </tbody>
							</table>
                        </div>
                        <div class="col-md-1" >
                            
                        </div>
                    </div>
                </div>
                <?php /* } */?>
                <?php /* if(sizeof($row->attach)>0){
                    $attachData=$row->attach;
                    
                */?>
                <?php /*
                    $imgArr=array();
                    $filesArr=array();
                    $linksArr=array();
                    //pdf|doc|docx|png|jpg|gif|jpeg
                    foreach($attachData as $rowAttach){
                        if (preg_match('/\d+\.jpg$/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.png/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.gif/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.jpeg/', $rowAttach->AttachServerName)) {
                            array_push($imgArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.pdf/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.doc/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.docx/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.ppt/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.pptx/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.xls/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.xlsx/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else if (preg_match('/\d+\.txt/', $rowAttach->AttachServerName)) {
                            array_push($filesArr,$rowAttach);
                        }
                        else {
                            array_push($linksArr,$rowAttach);
                        }
                    }
                */?>
                <div class="col-sm-12 col-md-12">
                    <h5 class="col-md attachs-section"  style="color:#385898;font-weight: 600;">
                        <img src="<?php /* echo base_url()*/?>images/upload.png" style="height: 32px;" />
                        المرفقات
                    </h5>
                    <div class="row formDataImagesArea2">
                        <?php /* foreach($imgArr as $row1){*/?>
                            <div  class="col-sm-2" id="i<?php /* echo $row1->ID */?>">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="group1 cboxElement" style="color: #74798D;display: inline-block;" href="<?php /* echo base_url()*/?>uploads/<?php /* echo $row1->AttachServerName */?>" >
                                            <img src="<?php /* echo base_url()*/?>uploads/<?php /* echo $row1->AttachServerName */?>" title="<?php /* echo $row1->AttachName */?>" id="imgSlider<?php /* echo $row1->ID */?>" width="75px" height="75px"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php /* }*/?>
                    </div>
                    <div class="row formDataFilesArea2" style="margin-left: 0px;">
                        <?php /* foreach($filesArr as $row1){*/?>
                            <div id="attach" class="attach col-sm-6">
                                <span class="attach-text"><a href="<?php /* echo base_url()*/?>uploads/<?php /* echo $row1->AttachServerName */?>" target="_blank"><?php /* echo $row1->AttachName */?></a></span>
                                <a class="attach-close" style="color: #74798D" onclick="$(this).parent().remove()">×</a>
                                <input type="hidden" id="'+formDataStr+'imgUploads[]" name="formDataimgUploads[]" value="<?php /* echo $row1->AttachServerName */?>">
                                <input type="hidden" id="formDataorgNameList[]" name="formDataorgNameList[]" value="<?php /* echo $row1->AttachName */?>">
                            </div>
                        <?php /* }*/?>
                    </div>
                </div>
                <?php /* } */?>
            </div>
                    <?php /* 
            }*/?>
        </div>
        <div class="card-body" style="padding-top: 0;padding-bottom: 0rem; border-bottom: 1px solid #000000">
        </div>
        <?php /*
    }
    */?>
            </td>
        </tr>
    </table>

    
</div>
        <input type="hidden" name="pk_i_id" id="pk_i_id" value="<?php /* echo $currTicket->pk_i_id*/?>" />
        <input type="hidden" name="EmployeeID" id="EmployeeID" value="<?php /* echo $userdata->pk_i_id */?>"> />

        <button type="button" class="hidePrint" style="position: fixed;bottom: 40px;left: 20px;" >
            <img src="/uploads/s1.jpg" id="makeResponse" height="32px" style="cursor: pointer" onclick="ManualSave()">
        </button>
</form>
<script>
    function ManualSave(){
        var formData = new FormData($("#rpFrm")[0]);
            $.ajax({
                url: '<?php /* echo base_url()*/?>services/C_print/addRptJson4',
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
        $('input[name="holidayReason"]').on('change', function() {
           $('input[name="holidayReason"]').not(this).prop('checked', false);
        });
    function calcDuration(){
        twoDatesArr= new Array();
        twoDatesArr[0]= '<?php /* echo date('d/m/Y',strtotime($currTicket->dt_start_at))*/?>';
        twoDatesArr[1]= '<?php /* echo date('d/m/Y',strtotime($currTicket->dt_end_at))*/?>';
        


        d1Arr=twoDatesArr[0].split('/')
        d2Arr=twoDatesArr[1].split('/')
        d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
        d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
        if(d1Date>d2Date){
            alert('تاريخ النهاية اقل من البداية')
            return;
        }
        var diff = Math.abs(d2Date - d1Date);
        diffinyear=diff/(24*60*60*1000*30*12);
        diffinmonth=diff/(24*60*60*1000*30);
        diffinday=diff/(24*60*60*1000);
        month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
        day=Math.floor(diffinday)-(Math.floor(diffinmonth)*30)+1
        txt='';
        txt1='';
        strr='';
        if(Math.floor(diffinyear)>0)
            txt=Math.floor(diffinyear)+' سنة'

        if(Math.floor(month1)>0)
            txt1=Math.floor(month1)+' شهر, '
        if(txt.length>0) {
            strr = txt
            if(txt1.length>0)
                strr+=', '+txt1
            else
                strr+=', 0 شهر, '
        }
        else {
            if(txt1.length>0)
                strr+=txt1

        }
        $(".res").text(strr+Math.floor(day)+' يوم');
        //console.log(d2Date-d1Date);
        console.log(diffinyear,diffinmonth,diffinday);
    }
   
    
            $(document).ready(function(){
            <?php /* foreach($appInput[0] as $key=>$value){
                if($key == 'holidayReason')
                {
                */?>
                $("#<?php /* echo $key*/?><?php /* echo $value */?>").prop('checked', true);
                <?php /* } else {*/?>
                $("#<?php /* echo $key*/?>").val('<?php /* echo $value */?>')
                <?php /* }
            } */?>
            
            calcDuration();
            });
            
    function calcBalance(){
        
    var formData = new FormData($("#rpFrm")[0]);
        $.ajax({
            url: "<?php /* echo base_url()*/?>"+'c_emp/calcVac',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                console.log(data);
                    vac_annual=0;
                    vac_argent=0;
                if(data.emp.length>0){
                    vac_year=data.emp[0].vac_year;
                    if(vac_year==<?php /* echo date('Y')*/?>){
                        vac_annual=data.emp[0].vac_annual;
                        vac_argent=data.emp[0].vac_argent;
                    }
                }
                    vac_spent_annual=0;
                    vac_spent_argent=0;
                for(i=0;i<data.r_vac.length;i++){
                    vac_spent_annual+=parseInt(data.r_vac[i].dur)+1;
                }
                    $("#r_balance").html(vac_annual)
                    $("#r_spent").html(vac_spent_annual)
                    $("#r_remain").html(vac_annual-vac_spent_annual)
                    
                for(i=0;i<data.u_vac.length;i++){
                    vac_spent_argent+=parseInt(data.u_vac[i].dur)+1;
                }
                    $("#u_balance").html(vac_argent)
                    $("#u_spent").html(vac_spent_argent)
                    $("#u_remain").html(vac_argent-vac_spent_argent)
            },
            error:function(){
                /*$(".alert-success").addClass("hide");
                 $(".alert-danger").removeClass('hide');
                 $("#errMsg").text(data.status.msg)
                 $(".loader").addClass('hide');
                 $(".form-actions").removeClass('hide');*/
            },
            cache: false,
             contentType: false,
             processData: false
        });
    }
    $(document).ready(function(){
        calcBalance()
    })

</script>
    