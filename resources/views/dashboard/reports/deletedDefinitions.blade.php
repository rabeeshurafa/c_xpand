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
                               {{'تقرير حذف التعريفات'}}
                            </h4>
                        </div>
                        <div class="form-body">
                            <div class="row" style="padding-right: 20px">
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
                                <div class="col-lg-3 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <button type="submit" class="btn btn-primary" name="rep" onclick="search();">
                                                {{"بحث"}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
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
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right"
                                        class="detailsTB table wtbl">
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px">
                                                    #
                                                </th>
                                                <th width="150px">
                                                    {{ 'الموظف' }}
                                                </th>
                                                <th width="150px">
                                                    {{ 'الوقت والتاريخ' }}
                                                </th>
                                                <th width="150px">
                                                    {{ 'الاسم' }}
                                                </th>
                                                <th width="170px">
                                                    {{ 'النوع' }}
                                                </th>
                                                <!--<th width="200px">-->
                                                <!--    {{ 'مرتبط ب' }}-->
                                                <!--</th>-->
                                                <!--<th width="200px">-->
                                                <!--    {{ 'نسخة إلى' }}-->
                                                <!--</th>-->
                                                <!--<th  width="200px">-->
                                                <!--    {{ 'المرفقات' }}-->
                                                <!--</th>-->
                                                <th  width="10px">
                                                    {{ 'استعادة' }}
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
        // function ShowTypes(){
        //         $(".lblNo").text('رقم الأرشيف')
        //         $(".lblName").text('مرتبط بـ')
        //         $(".divType").hide()
        //         $(".divBuildType").hide()
        //         $(".col1").text('العنوان')
        //         $(".col2").text('النوع')
        //         $(".col3").text('الرقم')
        //         $(".col4").text('مرتبط بــ')
        //         $(".col5").text('تاريخ الإرسال')
        //     if($('#OrgType').find(":selected").val()=="munArchive")
        //         $(".ShowTypes").show()

        //     else if($('#OrgType').find(":selected").val()=="licArchive"||($('#OrgType').find(":selected").val()=="licFileArchive")){
        //         $(".ShowTypes").hide()
        //         $(".lblNo").text('رقم الرخصة')
        //         $(".lblName").text('اختر المشترك')
        //         $(".divType").show()
        //         $(".divBuildType").show()
        //         $(".col1").text('نوع الترخيص')
        //         $(".col2").text('نوع البناء')
        //         $(".col3").text('رقم الرخصة')
        //         $(".col4").text('اسم صاحب الرخصة')
        //         $(".col5").text('تاريخ الإدخال')
        //     }
        //     else
        //         $(".ShowTypes").hide()

        // }

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
            $(".loader").removeClass('hide');
            $.ajax({
                type: 'get', // the method (could be GET btw)
                url: "deletedDefinitions",

                data: {
                    from: from,
                    to: to,
                },
                success: function(response) {
                    $(".loader").addClass('hide');
                    var c = 1;
                    // console.log(response.data);
                        response.data.forEach(elem => {
                            $date='';
                            // elem.created_at.substring(11,19)+' - '+
                            $date=elem.updated_at.substring(8,10)+'/'+elem.updated_at.substring(7,5)+'/'+elem.updated_at.substring(4,0);

                            $row = "<tr>" +
                                "<td>" + c + "</td>" +
                                "<td>" + (elem.deleted_by.nick_name??'') + "</td>" +

                                "<td>" + $date + "</td>"+
                                "<td>" + (elem.name??'') + "</td>" ;

                            if(elem.model=='App\\Models\\Admin'){
                                $row+= "<td>" + 'موظف' + "</td>" 
                                    + "<td>"
                                    +'<a  style="margin-right:17px;" onclick="admin_recovery('+elem.id+');" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                    +"</td>" ;
                            }else if(elem.model=='App\\Models\\Department'){
                                $row+= "<td>" + 'قسم' + "</td>" 
                                    + "<td>"
                                    +'<a  style="margin-right:17px;" onclick="dept_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                    +"</td>" ;
                            }else if(elem.model=='App\\Models\\User'){
                                $row+= "<td>" + 'مواطن' + "</td>" 
                                    + "<td>"
                                    +'<a  style="margin-right:17px;" onclick="user_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                    +"</td>" ;
                            }else if(elem.model=='App\\Models\\Vehicle'){
                                $row+= "<td>" + 'مركبة' + "</td>" 
                                    + "<td>"
                                    +'<a style="margin-right:17px;" onclick="vehicle_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                    +"</td>" ;
                            }else if(elem.model=='App\\Models\\Equpment'){
                                $row+= "<td>" + 'اجهزة ومعدات' + "</td>"
                                    + "<td>"
                                    +'<a  style="margin-right:17px;" onclick="equpment_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                    +"</td>" ;
                            }else if(elem.model=='App\\Models\\Project'){
                                $row+= "<td>" + 'مشروع' + "</td>"
                                    + "<td>"
                                    +'<a  style="margin-right:17px;" onclick="project_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                    +"</td>" ;
                            }else if(elem.model=='App\\Models\\SpecialAsset'){
                                if(elem.url=='Gardens_lands'){
                                    $row+= "<td>" + 'أراضى وحدائق' + "</td>" ;
                                }else if(elem.url=='buildings'){
                                    $row+= "<td>" + 'مبانى' + "</td>" ;
                                    
                                }else{
                                    $row+= "<td>" + 'مستودعات' + "</td>" ;
                                }
                                $row+= "<td>"
                                    +'<a  style="margin-right:17px;" onclick="specialAsset_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                    +"</td>" ;
                                
                            }else if(elem.model=='App\\Models\\Orgnization'){
                                if(elem.org_type=='orginzation'){
                                    $row+= "<td>" + 'مؤسسة' + "</td>" ;
                                }else if(elem.org_type=='suppliers'){
                                    $row+= "<td>" + 'مورد' + "</td>" ;
                                }else if(elem.org_type=='space'){
                                    $row+= "<td>" + 'مكتب مساحة' + "</td>" ;
                                }else if(elem.org_type=='enginering'){
                                    $row+= "<td>" + 'مكتب هندسي' + "</td>" ;
                                }else{
                                    $row+= "<td>" + 'بنك' + "</td>" ;
                                    
                                }
                                
                                $row+= "<td>"
                                +'<a  style="margin-right:17px;" onclick="orgnization_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                +"</td>" ;
                                
                            }else if(elem.url=='sparePart'){
                                $row+= "<td>" + 'قطع غيار' + "</td>" ;
                                $row+= "<td>"
                                +'<a style="margin-right:17px;" onclick="sparepart_recovery('+elem.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                +"</td>" ;
                            }else{
                                $row+= "<td>" + 'بدون تصنيف' + "</td>" ;
                                $row+= "<td>"
                                +'<a style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-refresh"></i> </a>'
                                +"</td>" ;
                            }
                           
                            
                            $row += "</tr>";
                            $('#recListaa').append($row)
                            c++;
                        });
                  
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
            });

        }

        function admin_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreAdmin",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }
        
        function dept_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreDepartment",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

        function user_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreUser",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

        function equpment_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreEqupment",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

        function vehicle_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreVehicle",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

        function specialAsset_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreSpecialAsset",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

        function sparepart_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreSparepart",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

        function project_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreProject",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

        function orgnization_recovery($id) {
            $(".loader").removeClass('hide');
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "restoreOrgnization",

                data: {

                    id: id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');
                    search();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: 'تم استرجاع البيانات بنجاح',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    // $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                }

            });
            // return true;
        }

    </script>
@endsection
