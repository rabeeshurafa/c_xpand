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

    <!-- Hidden label form layout section start -->

    <div class="content-body">
        <section id="hidden-label-form-layouts">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/report32.png">  تقرير القراءات  </h4>
                        </div>
                        <div class="card-body">
                            <form id="formDataaa" onsubmit="return false">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع الأرشيف
                                                        </span>
                                                    </div>
                                                    <select name="OrgType" id="OrgType" class="form-control">
                                                        <option value="8">مياه</option>
                                                        <option value="7">كهرباء</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            من تاريخ
                                                        </span>
                                                    </div>
                                                    <input type="text" id="frmDate" name="frmDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="01/11/2021" placeholder="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            حتى تاريخ
                                                        </span>
                                                    </div>
                                                    <input type="text" id="toDate" name="toDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="11/11/2021" placeholder="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align:center">
                                        <button type="button" class="btn btn-primary" id="" style="" onclick="GetMasterArch()">
                                        بحث
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- // Hidden label form layout section end -->

</div>



<input type="hidden" id="type" name="type" value="{{$type}}">

<div class="content-body resultTblaa">

    <div class="row">

            <div class="col-xl-12 col-lg-12">

               

                <div class="card">

                    <div class="card-header" style="direction: rtl;">

                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" /> 

                            {{ trans('archive.search_result') }}</h4>

                    </div>

                   

                    <div class="card-body">

                        <div class="form-body">

                            <div class="row" id="resultTblaa">

                                <div class="col-xl-12 col-lg-12">

                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">

                                        <thead>

                                            <tr>

                                                <th  >

                                                    #

                                                </th>

                                                <th  style="width: 10%;">

                                                    المشترك

                                                </th>

                                                <th >

                                                    تاريخ القراءة السابقة

                                                </th>

                                                <th >

                                                    القراءة السابقة

                                                </th>

                                                <th >

                                                    القراءة الحالية

                                                </th>
                                                <th >

                                                    تاريخ القراءة الحالية

                                                </th>
                                                <th >

                                                    الاستهلاك

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

@endsection

@section('script')

<script>    

        

    $( function(){

        var table = $('.wtbl').DataTable({

                        dom: 'Bfltip',

                        buttons: [

                            {

                                extend: 'excel',

                                tag: 'img',

                                title:'',

                                attr:  {

                                    title: 'excel',

                                    src:'{{asset('assets/images/ico/excel.png')}}',

                                    style: 'cursor:pointer;',

                                },

                            },

                            {

                                extend: 'print',

                                tag: 'img',

                                title:'',

                                attr:  {

                                    title: 'print',

                                    src:'{{asset('assets/images/ico/Printer.png')}} ',

                                    style: 'cursor:pointer;height: 32px;',

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

            

    });

    function search(){

        if ( $.fn.DataTable.isDataTable( '.wtbl' ) ) {

        $(".wtbl").dataTable().fnDestroy();

        $('#recListaa').empty();

        }

        var table=$('.wtbl').DataTable({

                processing:true,

                serverSide:true,

                info:true,

                ajax: {

                    url: '{{ route('jobLic_reports') }}',

                    data: function (d) {

                        d.name = $("#customerName").val();

                        d.customerId = $("#customerid").val();

                    }

                },

                fixedHeader: true,

                columns:[

                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},

                {

                    data: null, 

                    render:function(data,row,type){

                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';

                            return $actionBtn;

                    },

                    name:'name',

                

                },

                {data:'trade_name'},

                {data:'license_number'},

                {data:'license_ratings_name',name:'license_ratings.name'},

                // {data:'start_date'},

                // {data:'expiry_ate'},

                // {data:'status'},

                // {

                //     data: null,

                    

                //     render:function(data,row,type){

                //         if(data.files.length>0){ 

                //             var i=1;

                //             $actionBtn="<div class='row' style='margin-left:0px;'>";

                //             data.files.forEach(file => {

                //                 shortCutName=file.real_name;

                //                 shortCutName=shortCutName.substring(0, 20);

                //                 urlfile='{{ asset('') }}';

                //                 urlfile+=file.url;

                //                 if(file.extension=="jpg"||file.extension=="png")

                //                 fileimage='{{ asset('assets/images/ico/image.png') }}';

                //                 else if(file.extension=="pdf")

                //                 fileimage='{{ asset('assets/images/ico/pdf.png') }}';

                //                 else if(file.extension=="excel"||file.extension=="xsc")

                //                 fileimage='{{ asset('assets/images/ico/excellogo.png') }}';

                //                 else

                //                 fileimage='{{ asset('assets/images/ico/file.png') }}';

                //                 $actionBtn += '<div id="attach" class=" col-sm-6 ">'

                //                     +'<div class="attach">'

                //                        +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'

                //                         +'  <span class="attach-text">'+shortCutName+'</span>'



                //                         +'    <img style="width: 20px;"src="'+fileimage+'"></a>'

                //                     +'</div>'

                //                     +'</div>'; 

                //             });

                //             $actionBtn += '</div>';

                //             return $actionBtn;

                //         }

                //         else{return '';}

                //     },

                //     name:'fileIDS',                    

                // },

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

                        style: 'cursor:pointer;display:inline',

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

            table.buttons().container().appendTo($('.datatable_header'));





    }

        function calcDuration(str){

            twoDatesArr= new Array();

            twoDatesArr[0]= $('#period1').val();

            twoDatesArr[1]= $('#period2').val();

            

    

    

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

            console.log(diffinyear,diffinmonth,diffinday);

        }

        $( function() {

    $( ".ac" ).autocomplete({

		source: 'subscribe_auto_complete',

		minLength: 1,

		

        select: function( event, ui ) {

            let subscribe_id = (ui.item.id)

            $("#customerid").val(ui.item.id);

            $("#customerName").val(ui.item.label);

            

        }

	});

} );



    </script>

@endsection