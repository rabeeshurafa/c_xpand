@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')

    <div class="content-body">
        <section id="hidden-label-form-layouts">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="{{ asset('assets/images/ico/report32.png') }}" />
                                التقرير الطلبات التفصيلى
                            </h4>
                        </div>
                        <div class="card-body">
                            <form id="ticketFrm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'من تاريخ.' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="from" maxlength="10" data-mask="00/00/0000" name="from" 
                                                    class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" 
                                                    aria-invalid="false" value="<?php echo '01/01/'.date('Y')?>" autocomplete="off" onblur="calcDuration()">
                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'حتى تاريخ.' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="to" maxlength="10" data-mask="00/00/0000" name="to" 
                                                    class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" 
                                                    aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group res">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <button type="button" onclick="search()" class="btn btn-primary addBtn"
                                                    id="save">
                                                    بحث
                                                    <i class="ft-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <span class="input-group-text" id="basic-addon1" style="height: 35px">
                                                قسم الكهرباء </span>
                                            <li>
                                                <input type="checkbox"  class="ticketType" name="ticketType[]" value="1_1">
 
                                                طلب اشتراك كهرباء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_2">
 
                                                  عطل كهرباء لمشترك
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_4">
 
                                                  عطل كهرباء عام
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_5">
 
                                                  فحص عداد كهرباء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_6">
 
                                                  فصل خط كهرباء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_7">
 
                                                  إعادة وصل خط كهرباء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_8">
 
                                                  تنازل عن اشتراك كهرباء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_9">
 
                                                قراءة عداد كهرباء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_10">
 
                                                   نقل عداد كهرباء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_11">
 
                                                  نقل ذمة مالية كهرباء 
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_12">
 
                                                نقل عامود كهرباء / كابل
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_13">
 
                                                  رفع قدرة العداد (زيادة أمبيرات)
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_14">
 
                                                  اصلاح / تركيب وحدات انارة   
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_15">
 
                                                 ربط خلايا شمسية
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_16">
 
                                                   لوحة عرس (اشتراك مؤقت)
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_17">
 
                                                   طلب تحويل من 1 فاز إلى 3 فاز
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="1_3">
 
                                                   اذن اشغال عقار كهرباء
                                            </li>
                                            
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <span class="input-group-text" id="basic-addon1" style="height: 35px">
                                                قسم المياه </span>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_1">
 
                                                طلب اشتراك مياه
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_2">
 
                                                  عطل مياه لمشترك
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_4">
 
                                                  عطل مياه عام
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_5">
 
                                                  فحص عداد مياه
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_6">
 
                                                  فصل خط مياه
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_7">
 
                                                  إعادة وصل خط مياه
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_8">
 
                                                  تنازل عن اشتراك مياه
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_9">
 
                                                تغيير عداد مياه
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_10">
 
                                                   نقل عداد مياه
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_11">
 
                                                  نقل ذمة مالية مياه 
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="2_3">
 
                                                   اذن اشغال عقار كهرباء
                                            </li>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <span class="input-group-text" id="basic-addon1" style="height: 35px">
                                                الدائرة الهندسية </span>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="3_20">
 
                                                طلب استقامة
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="3_19">
 
                                                فتح ملف ترخيص
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="3_18">
 
                                                طلب ترخيص بناء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="3_21">
 
                                                طلب مخطط موقع
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="3_22">
 
                                                 مصادقة مخططات هندسية
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="3_26">
 
                                                   طلب استرداد تأمين رخصة بناء
                                            </li>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <span class="input-group-text" id="basic-addon1" style="height: 35px">
                                                {{ 'طلبات متفرقة' }} </span>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="4_23">
 
                                                مهام متفرقة
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="4_24">
 
                                                شكوى عامة 
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="4_25">
 
                                                 شكوى ضد مواطن
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="4_27">
 
                                                 طلب براءة ذمة
                                            </li>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <span class="input-group-text" id="basic-addon1" style="height: 35px">
                                                الطلبات الداخلية </span>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="5_32">
                                                  طلب اجازة
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="5_28">
 
                                                  اذن خروج
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="5_29">
 
                                                   طلب تحصيل
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="5_33">
 
                                                    اذن اخراج مواد
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="5_31">
 
                                                اذن شراء
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="ticketType[]" value="5_30">
                                                 صيانه عامه
                                            </li>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <span class="input-group-text" id="basic-addon1" style="height: 35px">
                                                الشهادات
                                            </span>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="cirtType1" value="farfromcenter1">
                                                الشهادات
                                            </li>
                                            <li>
                                                <input type="checkbox" class="ticketType" name="cirtType2" value="farfromcenter2">
                                                مراسلات خارجية 
                                            </li>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <style>
        .detailsTB th {
            color: #ffffff;
        }

        .detailsTB th,
        .detailsTB td {
            text-align: right !important;

        }

        .recList>tr>td {
            font-size: 12px;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding-bottom: 5px !important;
        }

        .dataTables_filter {
            margin-top: -15px;
        }

        .even {
            background-color: #D7EDF9 !important;
        }

        .dt-buttons {
            text-align: left;
            display: inline;
            float: left;
            position: relative;
            bottom: 10px;
            margin-right: 10px;
        }
    </style>

    <div class="content-body resultTblaa">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="{{ asset('assets/images/ico/report32.png') }}" />
                            {{ trans('archive.search_result') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;" class="detailsTB table">
                                        <tbody>
                                            <tr>
                                                <th scope="col" style="text-align: right;background-color: #ffffff !important; color:#000000 !important;" >
                                                    {{"الفترة"}}
                                                </th>
                                                <td scope="col" id="repPeriod"
                                                    style="text-align: right; font-family: Arial, sans-serif !important; border-top: none;">
                                                   </td>
                                                <th scope="col" style="text-align: right;background-color: #ffffff !important; color:#000000 !important;">
                                                    {{"عدد المهام"}}
                                                </th>
                                                <td scope="col" id="repTaskNum"
                                                    style="text-align: right; font-family: Arial, sans-serif !important;border-top: none;">
                                                    </td>
                                            </tr>
                                           {{-- <tr>
                                                <th scope="col" style="text-align: right;width:150px;background-color: #ffffff !important; color:#000000 !important;">
                                                    {{"المهام"}}
                                                </th>
                                                <td colspan="3" scope="col" id="repCusName"
                                                    style="border-top: 0px;text-align: right; font-family: Arial, sans-serif !important; ">
                                                   </td>
                                            </tr>--}}
                                        </tbody>

                                    </table>
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right"
                                        class="detailsTB table wtbl">
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="20px">
                                                    #
                                                </th>
                                                <th class="col1" style="width:170px !important">
                                                    {{ 'المستفيد' }}
                                                </th>
                                                <th class="col2" style="width:120px !important">
                                                    {{ 'نوع الطلب' }}
                                                </th>
                                                <th class="col3" style="width:50px !important">
                                                    {{ 'حالة الطلب' }}
                                                </th>
                                                <th class="col4" style="width:150px !important">
                                                    {{ 'الموظف المسؤول' }}
                                                </th>
                                                <th class="col5" style="width:180px !important">
                                                    {{ 'البدء' }}
                                                </th>
                                                <th class="col6" style="width:180px !important">
                                                    {{ 'الانتهاء' }}
                                                </th>
                                                <th class="col7" style="width:200px !important">
                                                    {{ 'الفترة' }}
                                                </th>
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

    <script>
        calcDuration();
        
        $(function() {
            var table = $('.wtbl').DataTable({
                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                }
            });
        });

        function search() {
            $(".loader").removeClass('hide');
            if ($.fn.DataTable.isDataTable('.wtbl')) {
                $(".wtbl").dataTable().fnDestroy();
                $('#recListaa').empty();
            }

            var formDataaa = new FormData($("#ticketFrm")[0]);
            // console.log(formDataaa);
            $.ajax({
                type: 'post', // the method (could be GET btw)
                url: "searchByTask",
                data: formDataaa,
                contentType: false,
                processData: false,
                
                success: function(response) {
                    $(".loader").addClass('hide');
                    $row='';
                    
                    Period='&nbsp; من &nbsp;'+$('#from').val()+'&nbsp; إلى &nbsp;'+ $('#to').val();
                    // $('#repCusName').html('');
                    // $('#repDeptName').html('');
                    $('#repTaskNum').html('');
                    $('#repPeriod').html('');
                    // $('#repTaskName').html('');
                    
                    // $('#repCusName').append(customerName);
                    $('#repTaskNum').append(response.length);
                    $('#repPeriod').append(Period);
                    
                    for($i=0 ; $i< response.length;$i++ ){
                        
                        
                        if(response[$i]['trans']!=null){
                            link= '/admin/viewTicket/'+response[$i]['trans']['ticket_id']+'/'+response[$i]['trans']['related'];
                            console.log(response);
                            $rowDateTime=response[$i]['0']['created_at'].split(' ');
                            $rowDate=$rowDateTime[0].split('-');
                            $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            $time=$rowDateTime[1].substring(0, 5);
                           
                            $date2='';
                            $time2='';
                            totaldior='';
                            if(response[$i]['0']['ticket_status']==5003){
                                $rowDateTime2=response[$i]['trans']['created_at'].split(' ');
                                $rowDate2=$rowDateTime2[0].split('-');
                                $date2=$rowDate2[2]+'/'+$rowDate2[1]+'/'+$rowDate2[0];
                                $time2=$rowDateTime2[1].substring(0, 5);
                                
                                twoDatesArr= new Array();
                                twoDatesArr[0]= $date;
                                twoDatesArr[1]= $date2;
                                d1Arr=twoDatesArr[0].split('/')
                                d2Arr=twoDatesArr[1].split('/')
                                
                                // console.log(twoDatesArr);
                                
                                d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
                                d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
                                if(d1Date>d2Date){
                                    alert('تاريخ النهاية اقل من البداية')
                                    //$('#from').val()=$('#to').val();
                                    return;
                                }
                                var diff = Math.abs(d2Date - d1Date);
                                diffinyear=diff/(24*60*60*1000*30*12);
                                diffinmonth=diff/(24*60*60*1000*30);
                                diffinday=diff/(24*60*60*1000);
                                month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
                                day=Math.floor(diffinday)-(Math.floor(diffinmonth)*30)
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
                                
                                compareDate1=new Date(('10/10/2010 '+ $time+':00'));
                                compareDate2=new Date(('10/10/2010 '+ $time2+':00'));
                            
                                var diff = Math.abs(compareDate2 - compareDate1)/(1000 * 3600);
                                diffSplit=diff.toString().split('.');
                                hours=diffSplit[0];
                                min=((diffSplit.length>1) ? (diffSplit[1]*60):'00');
                                
                                finalTime=hours+':'+min.toString().substring(0,2);
                                
                                
                                temp=(strr+Math.floor(day)+'&nbsp;&nbsp;'+'يوم');
                                totaldior=finalTime+'&nbsp;&nbsp;'+'ساعة و'+'&nbsp;&nbsp;'+temp;
                            }
                            
                            taskname='';
                            if(response[$i]['tiketName']!=null){
                                taskname= response[$i]['tiketName']['name']+' ('+response[$i]['0']['app_no']+')';
                            }else{
                                taskname= response[$i]['config']['ticket_name']+' ('+response[$i]['0']['app_no']+')';
                            }
                            
                            color='green';
                            if((response[$i]['response'].length)>0){
                                last=response[$i]['response'].length-1;
                                status=response[$i]['response'][last]['name'];
                                if(response[$i]['0']['ticket_status']==5003){
                                    color='red';
                                    status='مغلق';
                                }
                            }
                            
                            status='مفتوح';
                            color='green';
                            if((response[$i]['response'].length)>0){
                                last=response[$i]['response'].length-1;
                                status=response[$i]['response'][last]['name'];
                                if(response[$i]['0']['ticket_status']==5003){
                                    color='red';
                                    status='مغلق';
                                }
                            }
                            $name = response[$i]['0']['customer_name']?response[$i]['0']['customer_name']: '';
                            
                            $row+='<tr style="text-align:center">'
                                +'<td width="50px">'
                                    +($i+1)
                                +'</td>'
                                +'<td >'
                                    +$name
                                +'</td>'
                                +'<td >'
                                    +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                        +(response[$i]['0']['ticket_status']==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px">'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">')
                                        +'<span class="hideMob" >'+ taskname +'</span>'
                                    +'</a>'
                                    
                                +'</td>'
                                +'<td style="color:'+color+';">'
                                    // +(response[$i]['0']['ticket_status']==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px">':'')
                                    // +'  &nbsp; '
                                    // +'  &nbsp; '
                                    +status
                                +'</td>'
                                +'<td >'
                                    +response[$i]['trans']['nick_name'] 
                                +'</td>'
                                +'<td >'
                                    +$date+'  &nbsp; '+$time
                                +'</td>'
                                +'<td >'
                                + ( response[$i]['0']['ticket_status']==5003? ($date2+'  &nbsp; '+$time2):'')
                                +'</td>'
                                +'<td >'
                                +totaldior
                                +'</td>'
                            +'</tr>'
                        }
                        else{
                            $rowDateTime=response[$i]['created_at'].split('T');
                            $rowDate=$rowDateTime[0].split('-');
                            $date=$rowDate[0]+'/'+$rowDate[1]+'/'+$rowDate[2];
                            $time=$rowDateTime[1].substring(0, 5);
                            certname='إصدار شهادة';
                            if(response[$i]['e_type']==1){
                                link= '/admin/cert?id='+response[$i]['pk_i_id'];  
                            }else if(response[$i]['e_type']==2){
                                link= '/admin/sendOut?id='+response[$i]['pk_i_id'];  
                                 certname='مراسلات خارجية';
                            }
                            
                            
                            // https://t.expand.ps/expand_repov1/public/ar/admin/cert?id=12
                            $row+='<tr style="text-align:center">'
                                +'<td width="50px">'
                                    +($i+1)
                                +'</td>'
                                +'<td >'
                                    +((response[$i]['e_type']==1)?response[$i]['citizen_name']?response[$i]['citizen_name']:'':response[$i]['benefitS']?response[$i]['benefitS']:'')
                                +'</td>'
                                +'<td >'
                                    +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                        +'<span class="hideMob" >'
                                        +((response[$i]['e_type']==1)? response[$i]['cer_name']:certname)
                                        +'</span>'
                                    +'</a>'
                                    
                                +'</td>'
                                +'<td >'
                                    +response[$i]['admin']['nick_name'] 
                                +'</td>'
                                +'<td >'
                                    +$date+'  &nbsp; '+$time
                                +'</td>'
                                +'<td >'
                                    
                                +'</td>'
                                // +'<td >'
                                    
                                // +'</td>'
                            +'</tr>'
                            // counter++;
                        }
                    }
                    $('#recListaa').append($row);
                    $('.wtbl').DataTable({
                        dom: 'Bfltip',
                        buttons: [{
                                extend: 'excel',
                                tag: 'img',
                                title: '',
                                attr: {
                                    title: 'excel',
                                    src: '{{ asset('assets/images/ico/excel.png') }}',
                                    style: 'cursor:pointer;height: 32px;',
                                },

                            },
                            {
                                extend: 'print',
                                tag: 'img',
                                title: '',
                                attr: {
                                    title: 'print',
                                    src: '{{ asset('assets/images/ico/Printer.png') }} ',
                                    style: 'cursor:pointer;height: 32px;',
                                    class: "fa fa-print"
                                },
                                customize: function(win) {


                                    $(win.document.body).find('table').find('tbody')
                                        .css('font-size', '20pt');
                                }
                            },
                        ],

                        "language": {
                            "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                            "sLoadingRecords": "جارٍ التحميل...",
                            "sProcessing": "جارٍ التحميل...",
                            "sLengthMenu": "أظهر _MENU_ مدخلات",
                            "sZeroRecords": "لم يعثر على أية سجلات",
                            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                            "sInfoPostFix": "",
                            "sSearch": "ابحث:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "الأول",
                                "sPrevious": "السابق",
                                "sNext": "التالي",
                                "sLast": "الأخير"
                            },
                            "oAria": {
                                "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                                "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                            }
                        }
                    });
                },
                error: function(response){
                $(".loader").addClass('hide');
    
        			Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: 'خطاء فى عملية البحث',
        				showConfirmButton: false,
        				timer: 1500
        				})
               }
            });

        }
        
        function calcDuration(str){
            
            twoDatesArr= new Array();
            twoDatesArr[0]= $('#from').val();
            twoDatesArr[1]= $('#to').val();
            
            // console.log(twoDatesArr);
            d1Arr=twoDatesArr[0].split('/')
            d2Arr=twoDatesArr[1].split('/')
            d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
            d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
            if(d1Date>d2Date){
                alert('تاريخ النهاية اقل من البداية')
                //$('#from').val()=$('#to').val();
                return;
            }
            var diff = Math.abs(d2Date - d1Date);
            diffinyear=diff/(24*60*60*1000*30*12);
            diffinmonth=diff/(24*60*60*1000*30);
            diffinday=diff/(24*60*60*1000);
            month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
            day=Math.floor(diffinday)-(Math.floor(diffinmonth)*30)
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
            $(".res").text(strr+Math.floor(day)+'يوم');
            //console.log(d2Date-d1Date);
            // console.log(diffinyear,diffinmonth,diffinday);
        }
    </script>
@endsection
