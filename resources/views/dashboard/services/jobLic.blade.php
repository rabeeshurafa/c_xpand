@extends('layouts.admin')
@section('content')

    <style>
        /* The Modal (background) */
        .modal1 {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content1 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            /*   float: right; */
            font-size: 28px;
            font-weight: bold;
            margin-left: auto;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .rate:not(:checked)>label {
            font-size: 30px !important;
        }

        .rate {
            width: auto;
            position: relative;
            float: left;
            height: 40px;
            margin-top: -3px;
        }

        .Priority {
            padding: 0;
            position: relative;
            left: 0;
            line-height: 39px;
            float: left;
        }

        .fa-2x {
            font-size: 24px !important;
        }
    td{
        font-size:14pt;
        height:40px;
    }
    u,li{
        font-weight: bold;
    }
    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="setting_form" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">
                <table style="width:100%" dir="rtl" id="for-print">
                    <!--<tr>-->
                    <!--    <td colspan="3" align="center">-->
                    <!--       <img src="https://y.expand.ps/images/ithnabnr.png" width="100%" style="max-width:100%">        </td>-->
                    <!--</tr>-->
                    
                    <!--<tr>-->
                    <!--    <td colspan="3" align="center">-->
                    <!--        <h2>-->
                    <!--            &nbsp;-->
                    <!--        </h2>-->
                    <!--    </td>-->
                    <!--</tr>-->
                    <tr>
                        <td colspan="3" align="center">
                            <h2>
                                (رخصة حرف و صناعات)
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                          <u>رقم الرخصة</u>
                             <?php //echo $list[0]->licNo ?> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            <u>اسم حامل الرخصة:</u>
                            <?php //echo $list[0]->customerName ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            <u>رقم الهوية:</u>
                            <?php //echo $list[0]->NationalID ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                          <u>  العنوان: </u>  اليامون
                            <?php //echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>الشارع/المنطقة:</u> ".$list[0]->s_name_ar ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                           <u> صنف الرخصة: </u>
                            <?php //echo $list[0]->cat_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            <u>نوع الحرفة أو الصناعة</u>
                           <?php //echo $list[0]->job_type_name ?>
                        </td>
                    </tr>
                    <!--<tr>-->
                    <!--    <td colspan="3" align="right">-->
                    <!--        <table style="width:100%">-->
                    <?php //foreach($list[0]->child as $row){?>
                    <!--            <tr>-->
                    <!--                <td style="width:50%">-->
                    <!--                    <u>رقم (الحد الرابع من التصنيف)-->
                                        </u><?php //echo $row->i_subcat_name ?>
                    <!--                </td>-->
                    <!--                <td>-->
                    <!--                    <u>الاسم</u>-->
                                        <?php //echo $row->i_cat_name ?>
                    <!--                </td>-->
                    <!--            </tr>-->
                    <?php //}?>
                    <!--        </table>-->
                    <!--    </td>-->
                    <!--</tr>-->
                    <tr>
                        <td colspan="3" align="right">
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        تاريخ الإصدار: 
                                        <u><?php //echo $list[0]->startAt ?></u>
                                    </td>
                                    <td>
                                        تاريخ الإنتهاء: 
                                        <u><?php //echo $list[0]->endAt ?></u>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        رقم الوصل: 
                                        <u><?php //echo $list[0]->receiptNo ?></u>
                                    </td>
                                    <td>
                                        تاريخ الوصل: 
                                        <u><?php //echo $list[0]->receiptDate ?></u>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                <!--    <tr>-->
                <!--        <td colspan="3" align="left">-->
                <!--            توقيع سلطة الترخيص-->
                <!--           <br /><br /><br />-->
                <!--        </td>-->
                <!--    </tr>-->
                <!--    <tr>-->
                <!--        <td colspan="3" align="left" style="padding-top:100px;">-->
                <!--          <hr style="border:2px solid #000000" />-->
                <!--        </td>-->
                <!--    </tr>-->
                    
                <!--    <tr>-->
                <!--        <td colspan="3" align="right">-->
                <!--            <b>الشروط:-->
                <!--            </b>-->
                <!--            <ul>-->
                <!--                <li>-->
                <!--يعمل بهذه الرخصة لمدة سنة واحدة تبدأ في أول نيسان من كل سنة وتنتهي في 31 آذار من السنة التي تليها.-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    لا يجوز تحويل الرخصة الى شخص آخر.-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    يجب عرض الرخصة في مكان بارز.-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </td>-->
                <!--    </tr>-->
                </table>
                <button type="button" class="hidePrint" style="position: fixed;left: 50px;">
                    <img src="https://db.expand.ps/images/printer.jpeg" id="makeResponse" height="32px" style="cursor: pointer" onclick="printData();">
                </button>
            </div>
            
        

        </form>
        
        <div class="content-body resultTblaa">
            <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="direction: rtl;">
                                <h4 class="card-title"><img src="https://db.expand.ps/images/images/report32.png" />  نتائج البحث</h4>
                                <div class="heading-elements1 heading-elements2" style>
                                    
                                                        <img src="https://db.expand.ps/images/images/printer.jpeg"  onclick="PrintDiv('resultTblaa')" class="fa fa-print" style="height: 32px;"/>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-body">
                                    <div class="row" id="resultTblaa">
                                        <div class="col-xl-12 col-lg-12">
                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                                <thead>
                                                    <tr style="text-align:center !important;background: #00A3E8;">
                                                        <th scope="col">
                                                            اسم المشترك    
                                                        </th>
                                                        <th scope="col">
                                                            الاسم التجاري
                                                        </th>
                                                        <th scope="col">نوع الحد</th>
                                                        <th scope="col" style="text-align: center !important;">
                                                        حالة الرخصة
                                                        </th>
                                                        <th scope="col" style="text-align: center !important;">
                                                            العنوان
                                                        </th>
                                                        <th scope="col" style="text-align: center !important;">تاريخ الإصدار</th>
                                                        <th scope="col" style="text-align: center !important;">تاريخ الإنتهاء</th>
                                                        <th scope="col" style="width:0px;"> </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="recListaa">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </section>

@stop
@section('script')
    <script>
function printData()
{
   var divToPrint=document.getElementById("for-print");
      console.log(divToPrint);

   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
$( function(){
            var table=$('.wtbl').DataTable({
        "language": {
            "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
            "sLoadingRecords": "جارٍ التحميل...",
            "sProcessing":   "جارٍ التحميل...",
            "sLengthMenu":   "أظهر _MENU_ مدخلات",
            "sZeroRecords":  "لم يعثر على أية سجلات",
            "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix":  "",
            "sSearch":       "ابحث:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "الأول",
                "sPrevious": "السابق",
                "sNext":     "التالي",
                "sLast":     "الأخير"
            },
            "oAria": {
                "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
            }
        }
    })
});
    </script>

@endsection
