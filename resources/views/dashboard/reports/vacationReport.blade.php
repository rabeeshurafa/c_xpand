@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection

@section('content')
<style>
    .detailsTB th{
        color:#ffffff;
    }
      .detailsTB th,.detailsTB td{
        text-align:right !important;
        
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
    <div class="content-body">
        <section id="hidden-label-form-layouts">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                               {{'تقرير الاجازات والمغادرات '}}
                            </h4>
                        </div>
                        <div class="form-body">
                            <div class="row" style="padding-right: 20px">
                                
                                <div class="col-lg-3 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87" style="width:100% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    اسم الموظف
                                                </span>
                                            </div>
                                            <input type="text" id="Name" class="form-control alphaFeild ac ui-autocomplete-input" placeholder="اسم الموظف" name="Name" autocomplete="off">
                                            <input type="hidden" name="emp_id" id="emp_id" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    نوع الطلب
                                                </span>
                                            </div>
                                            <select type="text" id="vacType" name="vacType" style="height: 34px !important;" class="form-control">
                                                <option value="1"> الكل </option>
                                                <option value="2"> اجازة </option>
                                                <option value="3"> مغادرة </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{"من تاريخ"}}
                                                </span>
                                            </div>
                                            <input type="text" id="from" maxlength="10" data-mask="00/00/0000" name="from" class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{"الى تاريخ"}}
                                                </span>
                                            </div>
                                            <input type="text" id="to" maxlength="10" data-mask="00/00/0000" name="to" class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <button type="submit" class="btn btn-primary" name="rep" onclick="search();">
                                                {{"بحث"}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                        <div class="form-group res">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <style>
        .detailsTB th{
            color:#ffffff;
        }
          .detailsTB th,.detailsTB td{
            text-align:right !important;
            
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
        margin-bottom: 20px;
        text-align: left;
        
    }
    
    </style>

    <input type="hidden" id="type" name="type" value="{{ $type }}">
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
                                <div class="col-xl-12 col-lg-12 details">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right"
                                        class="detailsTB table wtbl">
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="3%">
                                                    #
                                                </th>
                                                 <th class="col1" width="10%">
                                                    نوع الطلب
                                                </th>
                                                <th class="col2" width="15%">
                                                    حالة الطلب
                                                </th>
                                                <th class="col3" width="10%">
                                                    الموظف المسئول
                                                </th>
                                                <th class="col3" width="30%">
                                                    سبب الاجازة / المغادرة 
                                                </th>
                                                <th class="col4" width="10%">
                                                    تاريخ البدء
                                                </th>
                                                <th class="col5" width="10%">
                                                    تاريخ الانتهاء
                                                </th>
                                                <th class="col6" width="8%">
                                                    الفترة
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
    $appStatusList=[];
        $appStatusList[1]="مفتوح";
        $appStatusList[5002]="مفتوح";
        $appStatusList[6006]="تحت المتابعة";
        $appStatusList[6010]="مقبول";
        $appStatusList[5003]="مغلق";
        $appStatusList[6007]="قيد الكشف الفني";
        $appStatusList[6009]="تست";
        $appStatusList[135]="مرفوض";
        
    $( function() {
        $( ".ac" ).autocomplete({
    		source: 'emp_auto_complete',
    		minLength: 2,
    
            select: function( event, ui ) {
                $('#emp_id').val(ui.item.id);
            }
    	});
    } );
    
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

    calcDuration();

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
            if ($.fn.DataTable.isDataTable('.wtbl')) {
                $(".wtbl").dataTable().fnDestroy();
                $('#recListaa').empty();
            }
            let from = $("#from").val();
            let to = $("#to").val();
            let emp_id = $("#emp_id").val();
            let vacType = $("#vacType").val();
            table=$('.wtbl').DataTable({
            processing:true,
            serverSide:true,
            info:true,
            
            ajax: {
                url: '{{ route('vacationsReport') }}',
                data: function (d) {
                    d.from = from;
                    d.to = to;
                    d.emp_id = emp_id;
                    d.vacType = vacType;
                }
            },
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data:null, 
                        render:function(data,row,type){
                            if(data.vac_name!=null)
                                return data.vac_name;
                            else
                                return data.leave_name;
                        },
                    name:'t_constant.name',
                    
                },
                { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            // link= '/admin/viewTicket/'+data.id+'/'+11;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                },
                {data:'customer_name'},
                {data:'malDesc'},
                {
                    data:null, 
                        render:function(data,row,type){
                            if(data.vac_name!=null)
                                return data.start_date;
                            else
                                return data.start;
                        },
                    name:'null',
                    
                },
                {
                    data:null, 
                        render:function(data,row,type){
                            if(data.vac_name!=null)
                                return data.end_date;
                            else
                                return data.end_dior;
                        },
                    name:'null',
                    
                },
                {
                    data:null, 
                        render:function(data,row,type){
                            if(data.vac_name!=null)
                                return data.vac_day;
                            else
                                return data.period;
                        },
                    name:'null',
                    
                },
                
                
            ],
            dom: 'Bflrtip',
            buttons: [
                {
                    extend: 'excel',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'excel',
                        src:'{{asset('assets/images/ico/excel.png')}}',
                        style: 'cursor:pointer;display:inline;height: 40px; padding-top: 4px;',
                    },

                },
                {
                    extend: 'print',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'print',
                        src:'{{asset('assets/images/ico/Printer.png')}} ',
                        style: 'cursor:pointer;height: 32px;display:inline',
                        class:"fa fa-print"
                    },
                    customize: function ( win ) {
                  
 
                    $(win.document.body).find( 'table' ).find('tbody')
                        .css( 'font-size', '20pt' );
                    }
                },
                ],
                

            
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
    
        });
            
        }
        
    </script>
@endsection
