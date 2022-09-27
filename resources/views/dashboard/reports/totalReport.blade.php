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
                                {{ 'تقرير الطلبات على النظام' }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <form id="formDataaa" onsubmit="return false">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم المستفيد' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="customerName"
                                                        class="form-control cust ui-autocomplete-input"
                                                        placeholder="ابدأ بالكتابة لعرض محاور البحث" name="customerName"
                                                        autocomplete="off" onchange="emptyId();">
                                                    <input type="hidden" id="customerid" name="customerid" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'حالة المهمة.' }}
                                                        </span>
                                                    </div>
                                                    <select id="TaskState" class="form-control" name="TaskState">
                                                        <option value="1">{{ 'الكل' }}</option>
                                                        @foreach ($ticketStatuses as $ticketStatuse)
                                                            <option value="{{$ticketStatuse->id}}">{{ $ticketStatuse->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ ' من تاريخ.' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="from" maxlength="10" data-mask="00/00/0000" name="from" class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y', strtotime(date('Y-m-d') . " -30 days"))?>" autocomplete="off" onblur="calcDuration()">

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
                                                    <input type="text" id="to" maxlength="10" data-mask="00/00/0000" name="to" class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group res">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم القسم' }}
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="Deptid" id="Deptid">
                                                        <option value="0">{{ '-- الكل --' }}</option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{$department->id}}">{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم الموظف.' }}
                                                        </span>
                                                    </div>

                                                    <select class="form-control" name="empid" id="empid">
                                                        <option value="0">{{ '-- الكل --' }}</option>
                                                        @foreach ($admins as $admin)
                                                            <option value="{{$admin->id}}">{{ $admin->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <button type="button" onclick="search()" class="btn btn-primary addBtn"
                                                    id="save">
                                                    {{ 'بحث' }}
                                                    <i class="ft-search"></i>
                                                </button>
                                            </div>
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
            /*margin-bottom: 20px;*/
            text-align: left;

        }
        .recList>tr>td{
            font-size:12px;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            padding-bottom: 5px !important;
        }
        .dataTables_filter{
            margin-top:-15px;
        }
        .even{
            background-color:#D7EDF9 !important;
        }
        .dt-buttons
        {
            text-align: left;
            display: inline;
            float: left;
            position: relative;
            bottom: 10px;
            margin-right: 10px;
        }

</style>

    {{-- <input type="hidden" id="type" name="type" value="{{ $type }}"> --}}
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
                                                <td scope="col" style="border-top: 0px;text-align: right;width:150px">
                                                    {{"المستفيد"}}
                                                </td>
                                                <td scope="col" id="repCusName"
                                                    style="border-top: 0px;text-align: right; font-family: Arial, sans-serif !important;">
                                                    
                                                </td>
                                                <td scope="col" style="border-top: 0px;text-align: right;width:150px">
                                                    {{"القسم"}}
                                                </td>
                                                <td scope="col" id="repDeptName"
                                                    style="border-top: 0px;text-align: right; font-family: Arial, sans-serif !important;">
                                                   
                                                </td>
                                                <td scope="col" style="border-top: 0px;text-align: right;width:150px">
                                                    {{"حالة المهمة"}}
                                                </td>
                                                <td scope="col" id="repTaskName"
                                                    style="border-top: 0px;text-align: right; font-family: Arial, sans-serif !important;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" style="text-align: right">
                                                    {{"الفترة"}}

                                                </td>
                                                <td scope="col" id="repPeriod"
                                                    style="text-align: right; font-family: Arial, sans-serif !important;">
                                               </td>
                                                <td scope="col" style="text-align: right">
                                                    {{"الموظف"}}
                                                </td>
                                                <td scope="col" id="repEmpName"
                                                    style="text-align: right; font-family: Arial, sans-serif !important;">{{"--
                                                    الكل --"}}</td>
                                                <td scope="col" style="text-align: right">
                                                    {{"عدد المهام"}}
                                                </td>
                                                <td scope="col" id="repTaskNum"
                                                    style="text-align: right; font-family: Arial, sans-serif !important;">
                                                    
                                               </td>
                                            </tr>
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
    function emptyId(){
        if($('#customerName').val().length<1)
        $('#customerid').val('0');
    }
        
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
        
        $(document).ready(function () {
            $( ".cust" ).autocomplete({
        		source:'subscribe_auto_complete',
        		minLength: 1,
                select: function( event, ui ) {
                    $("#customerid").val(ui.item.id)
        		}
    	    });
        });
        
        function calcDuration(str){
            twoDatesArr= new Array();
            twoDatesArr[0]= $('#from').val();
            twoDatesArr[1]= $('#to').val();
            


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

        function search() {
            $(".loader").removeClass('hide');
            // $('#recListaa').html('');
            // var table = $('.wtbl').DataTable();
            // table.destroy();
            if ( $.fn.DataTable.isDataTable( '.wtbl' ) ) {
        
                $(".wtbl").dataTable().fnDestroy();
        
                $('#recListaa').empty();
        
            }
            let customerid = $("#customerid").val();
            let taskState = $("#TaskState").val();
            let from = $("#from").val();
            let to = $("#to").val();
            let Deptid = $("#Deptid").val();
            let empid = $("#empid").val();
            $.ajax({
                type: 'get', // the method (could be GET btw)
                url: "newSearchTasks",

                data: {
                    customerid: customerid,
                    taskState: taskState,
                    from: from,
                    to:to,
                    Deptid: Deptid,
                    empid: empid,
                },
                success: function(response) {
                    $(".loader").addClass('hide');
                    
                    let customerName = $("#customerName").val()==''?'الكل':$("#customerName").val();
                    // let taskState = $("#TaskState").val();
                    // let from = $("#from").val();
                    // let to = $("#to").val();
                    // let Deptid = $("#Deptid").val();
                    // let empid = $("#empid").val();
                    Period=' من '+$('#from').val()+' إلى '+ $('#to').val();
                    $('#repCusName').html('');
                    $('#repDeptName').html('');
                    $('#repTaskNum').html('');
                    $('#repPeriod').html('');
                    $('#repTaskName').html('');
                    
                    $('#repCusName').append(customerName);
                    $('#repTaskNum').append(response.length);
                    $('#repPeriod').append(Period);
                    
                    $('#repTaskName').append((response[0]['taskState']==null?'الكل':response[0]['taskState']['name']));
                    $('#repDeptName').append((response[0]['dept']==null?'الكل':response[0]['dept']['name']));
                    
                    $row="";
                    if(response[0]=='false')
                    {
                        Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: 'عفوا لا يمكنك اصدار تقارير المهام',
        				showConfirmButton: false,
        				timer: 1500
        				})
                    }
                    for(i=0 ; i< response.length;i++ ){
                        if(response[i].active_trans!=null){
                            link= '/admin/viewTicket/'+response[i].id+'/'+response[i].active_trans.related;
                           
                            $rowDateTime=response[i].created_at.split('T');
                            $rowDate=$rowDateTime[0].split('-');
                            $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            $time=$rowDateTime[1].substring(0, 5);
                            // console.log($rowDate);
                            
                            $date2='';
                            $time2='';
                            totaldior='';
                            if(response[i].ticket_status!=null && response[i].ticket_status.id==5003){
                                $rowDateTime2=response[i].active_trans.created_at.split('T');
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
                                // if(d1Date>d2Date){
                                    // alert('تاريخ النهاية اقل من البداية')
                                    //$('#from').val()=$('#to').val();
                                    // return;
                                // }
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
                            
                            status='مفتوح';
                            color='green';
                            statusID=0;
                            if(response[i].ticket_status != null){
                                if(response[i].ticket_status.id==5003){
                                    color='red';
                                    status='مغلق';
                                    statusID=5003;
                                }
                            }
                            
                            taskname='__';
                            if(response[i].TicketConfig!=null){
                                taskname= response[i].TicketConfig.ticket_name+' ('+response[i].app_no+')';
                            }
                            
                            customername='';
                            if(response[i].TicketConfig.ticket_no==31 || response[i].TicketConfig.ticket_no==33){
                                customername=response[i].admin.nick_name;
                            }else{
                                customername=(response[i].customer_name??'');
                            }
    
                            $row+='<tr style="text-align:center">'
                                +'<td width="50px">'
                                    +(i+1)
                                +'</td>'
                                +'<td >'
                                    +customername
                                +'</td>'
                                +'<td >'
                                    +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                    +(statusID==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px">'
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
                                    +((response[i].admin2!=null)?response[i].admin2.nick_name:'')
                                +'</td>'
                                +'<td >'
                                    +$date+'  &nbsp; '+$time
                                +'</td>'
                                +'<td >'
                                + ( statusID==5003? ($date2+'  &nbsp; '+$time2):'')
                                +'</td>'
                                +'<td >'
                                + totaldior
                                +'</td>'
                            +'</tr>'
                            
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
    </script>
@endsection
