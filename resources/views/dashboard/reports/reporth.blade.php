@extends('layouts.admin')
@section('search')
    <li class="dropdown dropdown-language nav-item hideMob">
        <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
    </li>
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css"/>
<script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css"/>
<script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>
<div class="app-content content appmainmob">

<style>
    table th{
        color: white;
    }
    .col1{
        width: 10%;
    }
    .col2{
        width: 35%;
    }
    .col3{
        width: 5%;
    }
    .col4{
        width: 5%;
    }
    .col5{
        width: 18%;
    }
    .col6{
       width: 20%;
    }
    .dt-buttons
    {
        text-align: left;
        display: inline;
        float: left;
        position: relative;
        bottom: 10px;
        margin-right: 10px;
        margin-bottom: 0 !important;
    }

</style>

<section class="horizontal-grid " id="horizontal-grid" style="display: block;">

        <div class="content-body">
            <section id="hidden-label-form-layouts">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                       <form method="post" id="formDataaa" enctype="multipart/form-data">
                                @csrf
                              <div class="card">
                             <div class="card-header">
                                <h4 class="card-title">
                                    <img src="http://t.expand.ps/expand_repov1/public/assets/images/ico/report32.png">
                                    تقرير العمل اليومي
                                </h4>
                             </div>
                             <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-4 ">
                                                <div class="form-group">
                                                    <div class="input-group width99 width98rtl widthsub" style="">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">اسم الموظف</span>
                                                        </div>
                                                        <input type="text" id="formDataNameAR" class="form-control alphaFeild ac ui-autocomplete-input" placeholder="ابدا بالكتابة لعرض محاور البحث" name="formDataNameAR" autocomplete="off">
                                                    </div>
                                                    <div id="auto-complete-barcode" class="divKayUP barcode-suggestion ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">من تاريخ</span>
                                                        </div>
                                                        <input type="text" id="from" maxlength="10" data-mask="00/00/0000" name="date" class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                           <span class="input-group-text" id="basic-addon1">الى تاريخ</span>
                                                        </div>
                                                        <input type="text" id="from1" maxlength="10" data-mask="00/00/0000" name="datee" class="form-control singledate " placeholder="dd/mm/yyyy"  aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 ">
                                                <div class="form-group">
                                                    <div class="input-group width99 width98rtl widthsub" style="">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">اسم المستفيد</span>
                                                        </div>
                                                        <input type="text" id="formDataNameAM" class="form-control alphaFeild ap ui-autocomplete-input" placeholder="ابدا بالكتابة لعرض محاور البحث" name="formDataNameAR" autocomplete="off">
                                                    </div>
                                                    <div id="auto-complete-barcode" class="divKayUP barcode-suggestion ">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="mostfeed">
                                    </div>
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <!---------------------------------------table 1 card 1--------------------------------------------------------->
                                  
                                        <div class="row">
                                            <div class="col-lg-2 col-md-6" style="position: relative; right: 45%">
                                              <div class="form-group">
                                               <button type="button" onclick="search()" class="btn btn-primary addBtn" id="save">
                                                   {{"بحث"}}
                                                   <i class="ft-search"></i>
                                               </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>
            </section>
        </div>
        <!---------------------------------------table 2 style---------------------------------------------------------->
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
                margin-bottom: 20px;
                text-align: left;

            }

        </style>
        <!---------------------------------------table 2 card 2--------------------------------------------------------->

        <div class="content-body resultTblaa">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="direction: rtl;">
                            <h4 class="card-title"><img src="{{ asset('assets/images/ico/report32.png') }}"/>{{ trans('أعمال الأيام السابقة') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row" id="resultTblaa">
                                    <div class="col-xl-12 col-lg-12">

                                        <table class="detailsTB table wtbl" style="width:100%; margin-top: -10px;direction:rtl;text-align:right" >
                                            <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">#</th>
                                                <th class="col1">{{ 'التاريخ' }}</th>
                                                <th class="col2">{{ 'العمل' }}</th>
                                                <th class="col3">{{ 'من الساعة' }}</th>
                                                <th class="col4">{{ 'الى الساعة' }}</th>
                                                <th class="col5">{{ ' المستفيدين' }}</th>
                                                <th class="col6">{{ 'ملاحظات' }}</th>
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

<script>
    
    $(function() {
        $(".ac").autocomplete({
            source: 'emp_auto_complete',
            minLength: 1,
            select: function(event, ui) {
                // let subscribe_name = (ui.item.id)
                // update(subscribe_name);
            }
        });
    });
    $(function() {
        $(".ap").autocomplete({
            source: 'archive_auto_complete',
            minLength: 1,
            select: function(event, ui) {
                // let subscribe_name = (ui.item.id)
                // update(subscribe_name);
            }
        });
    });
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(function() {
        var table = $('.wtbl').DataTable({
            "language": {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر MENU مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار START إلى END من أصل TOTAL مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع MAX مُدخل)",
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
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function calcDuration(t1, t2) {
        compareDate1 = new Date(('10/10/2010 ' + t1 + ':00'));
        compareDate2 = new Date(('10/10/2010 ' + t2 + ':00'));
        var diff = Math.abs(compareDate2 - compareDate1) / (1000 * 3600);
        diffSplit = diff.toString().split('.');
        hours = diffSplit[0];
        min = ((diffSplit.length > 1) ? (diffSplit[1] * 60) : '00');
        finalTime = hours + ':' + min.toString().substring(0, 2)+':00';
        return finalTime;
    }
    function addTimes(times = []) {
        const z = (n) => (n < 10 ? '0' : '') + n;
        let hour = 0
        let minute = 0
        let second = 0
        for (const time of times) {
            console.log(time);
            const splited = time.split(':');
            hour += parseInt(splited[0]);
            minute += parseInt(splited[1])
            second += parseInt(splited[2])
        }
        const seconds = second % 60
        const minutes = parseInt(minute % 60) + parseInt(second / 60)
        const hours = hour + parseInt(minute / 60)
        return z(hours) + ':' + z(minutes) + ':' + z(seconds)
    }

    /////////////////////////////////////////////// TABLE SEARCH 2////////////////////////////////////////////////////
    $(document).ready(function (){
        $('.loader').removeClass('hide');
        if ($.fn.DataTable.isDataTable('.wtbl')) {
            $(".wtbl").dataTable().fnDestroy();
            $('#recListaa').empty();
        }
        table=$('.wtbl').DataTable({
            ajax: {
                url: 'showReport',
                type:'get',
                data: function (d) {}
            },
            columns:[
                { data:'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                { data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+(data.id??'')+')">'+(data.date??'')+'</a>';
                        return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:null,
                    render:function(data,row,type){
                       let workarr = data.work;
                       var s="";
                        var i;
                       for(i=0;i<workarr.length;i++){
                           if(workarr[i]!='' && workarr[i]!= null){
                            s+=workarr[i]+'</br>'; 
                           }
                       }
                       return s;
                    },
                   name:'name',   
                },
                {data:null,
                    render:function(data,row,type){
                       let time = data.fromTime;
                       var s="";
                        var i;
                       for(i=0;i<time.length;i++){
                           if(time[i]!='' && time[i]!= null){
                            s+=time[i]+'</br>';
                           }
                       }
                       return s;
                    },
                   name:'s',
                },
                {data:null,
                    render:function(data,row,type){
                       let time = data.toTime;
                       var s="";
                        var i;
                       for(i=0;i<time.length;i++){
                           if(time[i]!='' && time[i]!= null){
                            s+=time[i]+'</br>';
                           }
                       }
                       return s;
                    },
                   name:'s',
                    
                },
                {data:null,//null,
                    render:function(data,row,type){
                       let workarr = data.most;
                       var s="";
                        var i;
                       for(i=0;i<workarr.length;i++){
                           if(workarr[i]!='' && workarr[i]!= null){
                            s+=workarr[i]+'</br>'; 
                           }
                       }
                       return s;
                    },
                   name:'name',
                },
                {data:null,
                    render:function(data,row,type){
                       let workarr = data.note;
                       var s="";
                        var i;
                       for(i=0;i<workarr.length;i++){
                           if(workarr[i]!='' && workarr[i]!= null){
                            s+=workarr[i]; 
                           }
                       }
                       return s;
                    },
                   name:'name',
                }
            ],
            /////////////////////////////////////////////////////////////////////////////////
            dom: 'Bflrtip',
            buttons: [
                {
                    extend: 'excel',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'excel',
                        src:'http://t.expand.ps/expand_repov1/public/assets/images/ico/excel.png',
                        style: 'cursor:pointer;display:inline;height: 40px; padding-top: 4px;',
                    },

                },
                {
                    extend: 'print',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'print',
                        src:'http://t.expand.ps/expand_repov1/public/assets/images/ico/Printer.png ',
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
        $('.loader').addClass('hide');
    })
////////////////////////////////////////////////////////////////////////////
function search() {
        $('.loader').removeClass('hide');
            if ($.fn.DataTable.isDataTable('.wtbl')) {
                $(".wtbl").dataTable().fnDestroy();
                $('#recListaa').empty();
            }  
            let mostfeed = $("#mostfeed").val();
            let name =  $("#formDataNameAR").val();
            let most =  $("#formDataNameAM").val();
            let date1 = $("#from").val();
            let date2 = $("#from1").val();
            table=$('.wtbl').DataTable({
            processing:true,
            serverSide:true,
            info:true,
            
            ajax: {
                url: 'searchReport',
                type:'get',
                data: function (d) {
                    d.ben=mostfeed;
                    d.name=name;
                    d.mostt=most;
                    d.from=date1;
                    d.to=date2;
                }
            },
            columns:[
                { data:'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                { data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+(data.id??'')+')">'+(data.date??'')+'</a>';
                        return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:null,
                    render:function(data,row,type){
                       let workarr = data.work;
                       var s="";
                        var i;
                       for(i=0;i<workarr.length;i++){
                           if(workarr[i]!='' && workarr[i]!= null){
                            s+=workarr[i]+'</br>'; 
                           }
                       }
                       return s;
                    },
                   name:'name',   
                },
                {data:null,
                    render:function(data,row,type){
                       let time = data.fromTime;
                       var s="";
                        var i;
                       for(i=0;i<time.length;i++){
                           if(time[i]!='' && time[i]!= null){
                            s+=time[i]+'</br>';
                           }
                       }
                       return s;
                    },
                   name:'s',
                },
                {data:null,
                    render:function(data,row,type){
                       let time = data.toTime;
                       var s="";
                        var i;
                       for(i=0;i<time.length;i++){
                           if(time[i]!='' && time[i]!= null){
                            s+=time[i]+'</br>';
                           }
                       }
                       return s;
                    },
                   name:'s',
                    
                },
                {data:null,//null,
                    render:function(data,row,type){
                       let workarr = data.most;
                       var s="";
                        var i;
                       for(i=0;i<workarr.length;i++){
                           if(workarr[i]!='' && workarr[i]!= null){
                            s+=workarr[i]+'</br>'; 
                           }
                       }
                       return s;
                    },
                   name:'name',
                },
                {data:null,
                    render:function(data,row,type){
                       let workarr = data.note;
                       var s="";
                        var i;
                       for(i=0;i<workarr.length;i++){
                           if(workarr[i]!='' && workarr[i]!= null){
                            s+=workarr[i]; 
                           }
                       }
                       return s;
                    },
                   name:'name',
                }  
            ],
            /////////////////////////////////////////////////////////////////////////////////
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
        $('.loader').addClass('hide');
    }
    

</script>
@endsection