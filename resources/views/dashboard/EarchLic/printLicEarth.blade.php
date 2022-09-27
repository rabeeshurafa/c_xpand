<style>
    h1,h2{
        margin:0px;
    }
</style>

<div  style="padding-top:200px;"> </div>
    <?php //$this->load->view('services/hdr'); ?>
    <hr style="border: 2px solid #000000; display:none" />
<div id="forPrint">
   <table width="100%" dir="rtl" style="padding-top:30px;display:none">
      <tbody>
         <tr>
            <th colspan="5">
               <h2 style="font-size: 18px !important;font-weight: bold;">
               شهادة تسجيل  اراضي لاغراض للتسوية								

               </h2>
            </th>
         </tr>
      </tbody>
    </table>
   <table width="100%" dir="rtl" style="padding-top:15px;">
      <tbody>
         <tr>
            <td width="33%">التاريخ: 
            <?php echo date('d/m/Y',strtotime($res->date)) ?></td>
            <td width="34%"></td>
            <td width="33%">وصول دفع رقم: <?php echo $res->wasl_no ?> </td>
         </tr>
         <tr>
            <td width="33%">الرقم: <?php echo $res->cert_no ?>  </td>
            <td width="34%"></td>
            <td width="33%">المساحة م2:
                 <?php echo $res->area ?>
            </td>
         </tr>
         <tr>
            <td width="33%">اسم المشروع: 
                 <?php echo $res->proj_name ?></td>
            <td width="34%"></td>
            <td width="33%">رسوم شهادة التسجيل (شيكل): 
                 <?php echo $res->cert_cost ?></td>
         </tr>
         <tr>
            <td width="33%">الممول:
                 <?php echo $res->sponser_name ?></td>
            <td width="34%"></td>
            <td width="33%">المبلغ المطلوب للدفع: 
                 <?php echo $res->total ?></td>
         </tr>
      </tbody>
   </table>
   <table width="100%" dir="rtl" style="padding-top:15px;">
      <tbody>
         <tr>
            <th colspan="5">
               <h2 style="font-size: 18px !important;font-weight: bold;">تشهد بلدية اذنا بان قطعة الارض وحسب سجلات البلدية التالية هي ملك وبتصرف التالية اسمائهم :  								</h2>
            </th>
         </tr>
         <tr></tr>
         <tr>
            <th scope="col" width="50px" style="background-color: #e7e7e7; border: 1px solid #000000;">#</th>
            <th scope="col" width="200px" style="background-color: #e7e7e7; border: 1px solid #000000;">الاسم</th>
            <th scope="col" width="70px" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم الحوض</th>
            <th scope="col" width="70px" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم القطعة</th>
            <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;"></th>
         </tr>
         
         <?php if(sizeof($res->user_name)==0){
             ?>
         <tr>
            <td colspan="5" style="border: 1px solid #000000;">
               <h2 style="font-size: 18px !important;font-weight: bold;"> لا يوجد إدخالات</h2>
            </td>
         </tr>
             <?php 
         }else {
             
         for($i=0; $i< sizeof($res->user_name) ; $i++ ){
         if($res->user_name[$i] != null){
         ?>
         
             <tr>
                <td style="border: 1px solid #000000;">
                    <?php echo ($i+1); ?>
                </td>
                <td style="border: 1px solid #000000;">
                    <?php echo $res->user_name[$i] ?>
                </td>
                <td style="border: 1px solid #000000;">
                    <?php echo $res->hod_no[$i] ?>
                </td>
                <td style="border: 1px solid #000000;">
                    <?php echo $res->pice_no[$i] ?>
                </td>
                <td style="border: 1px solid #000000;">
                    <?php echo $res->notes1[$i] ?>
                </td>
             </tr>
         <?php 
                }
            }
         }?>
      </tbody>
   </table>
   <table width="100%" dir="rtl" style="padding-top:15px;">
      <tbody>
         <tr>
            <th colspan="8">
               <h2 style="font-size: 18px !important;font-weight: bold;">وقد اعطيت هذه الشهادة بناءا على طلب المدعيين بقطعة الارض لاغراض اعمال تسوية الاراضي وهم :								</h2>
            </th>
         </tr>
         <tr></tr>
         <tr>
            <th scope="col" width="50px" style="background-color: #e7e7e7; border: 1px solid #000000;">#</th>
            <th scope="col" width="200px" style="background-color: #e7e7e7; border: 1px solid #000000;">اسم المدعي</th>
            <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم الهوية</th>
            <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم الحوض<br>حسب سجلات<br>التسوية</th>
            <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم قطعة<br>حسب سجلات<br>التسوية</th>
            <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">مساحة القطعة م²</th>
            <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">اسم المنطقة	</th>
            <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">ملاحظات</th>
         </tr>
         
         
         <?php if(sizeof($res->user_name)==0){
             ?>
         <tr>
            <td colspan="8" style="border: 1px solid #000000;">
               <h2 style="font-size: 18px !important;font-weight: bold;"> لا يوجد إدخالات</h2>
            </td>
         </tr>
             <?php 
         }else {
         for($i=0; $i< sizeof($res->user_name) ; $i++ ){
         if($res->user_name[$i] != null){?>
         <tr>
            <td style="border: 1px solid #000000;">
                <?php echo ($i+1) ?>
            </td>
            <td style="border: 1px solid #000000;">
                <?php echo $res->user_name[$i] ?>
            </td>
            <td style="border: 1px solid #000000;">
                <?php echo $res->user_national[$i] ?>
            </td>
            
            <td style="border: 1px solid #000000;text-align: center;" >
                <?php echo $res->hod_no[$i] ?>
            </td>
            <td style="border: 1px solid #000000;text-align: center;" >
                <?php echo $res->pice_no[$i] ?>
            </td>
            <td style="border: 1px solid #000000;text-align: center;" >
                <?php echo $res->area ?>
            </td>
            <td style="border: 1px solid #000000;text-align: center;" >
                <?php echo $res->area_name ?>
            </td>
            <td style="border: 1px solid #000000;">
                <?php echo $res->notes2[$i] ?>
            </td>
         </tr>
         <?php 
                }
            }
         }?>
            
      </tbody>
   </table>
   <div class="row"  style="padding-top:15px;">
      <div class="col-sm-12" style="text-align:right">ملاحظة : ان تسجيل الادعاء بمساحة معينة في هذه الشهادة لا يعني بالضرورة صدور سند تسجيل الارض (الطابو) بنفس المساحة حيث ان هذه المساحة قابلة للنقصان نتيجة اقتطاع حرم طريق او وجود طريق مقترحة</div>
   </div>
</div>
    <hr style="border: 2px solid #000000" /> 
    <div style="text-align:center; padding-top:20px">
        <h2>
            مركز خدمات الجمهور
        </h2>
    </div>
    <?php //$this->load->view('services/footer'); ?>
                 
    