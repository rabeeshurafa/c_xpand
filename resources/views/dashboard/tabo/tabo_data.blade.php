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

        .detailsTB th {
            color: #ffffff !important;
        }

    </style>

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
    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="setting_form" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">

                <div class="col-sm-12">

                    <div class="card  leftSide">

                        <div class="card-header">

                            <h4 class="card-title">
                                {{-- <i class="fas fa-charging-station"></i> --}}
                                 بيانات اراضي الطابو
                                <a class="btn btn-primary " style="background-color: #00a3e8!important; float:left;"
                                    data-toggle="modal" data-target="#addNew">
                                    اضافة شخص جديد
                                </a>
                            </h4>


                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body" style="padding-bottom: 0px;">

                                <div class="form-body">
                                    <div class="row" id="resultTblaa">
                                        <div class="col-xl-12 col-lg-12 details">
                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right"
                                                class="detailsTB table wtbl">
                                                <thead>
                                                    <tr style="text-align:center !important;background: #00A3E8;">
                                                        <th width="10px">
                                                            #
                                                        </th>
                                                         <th class="col1" width="300px">
                                                            {{ 'الاسم' }}
                                                        </th>
                                                        <th class="col2" width="150px">
                                                            {{ 'الحوض' }}
                                                        </th>
                                                        <th class="col3" width="150px">
                                                            {{ 'رقم القطعة المؤقت' }}
                                                        </th>
                                                        <th class="col4" width="150px">
                                                            {{ 'رقم القطعة النهائي' }}
                                                        </th>
                                                        <th class="col5" width="150px">
                                                            {{ 'المساحة' }}
                                                        </th>
                                                        <th class="col6" width="300px">
                                                            {{ 'حركات' }}
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
            </div>




        </form>
    </section>


        <div class="modal fade text-left" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew"aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:600px!important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">اضافة شخص جديد </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <form id="addNewForm" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    أدخل اسم الشخص الرباعي
                                                </span>
                                            </div>
                                            <input type="text" id="NameAR" class="form-control alphaFeild" placeholder="اسم الشخص " name="NameAR">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                 رقم الهوية
                                                </span>
                                            </div>
                                            <input type="text" value="0" id="nationality" maxlength="9" class="form-control numFeild" placeholder="أدخل رقم الهوية " name="nationality">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                 رقم الهاتف
                                                </span>
                                            </div>
                                            <input type="text" value="0" id="phone" maxlength="10" class="form-control numFeild" placeholder="أدخل رقم الهاتف " name="phone">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    أدخل رقم القطعة المؤقت
                                                </span>
                                            </div>
                                            <input type="text" value="0" id="partTemp" class="form-control" placeholder="رقم القطعة المؤقت " name="partTemp">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    أدخل رقم القطعة النهائي
                                                </span>
                                            </div>
                                            <input type="text" value="0" id="partFinal" class="form-control" placeholder="رقم القطعة النهائي " name="partFinal">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    اختر الحوض
                                                </span>
                                            </div>
                                               
                                            <select type="text" name="hodId" id="hodId" class="form-control">
                                                <option value="">-- اختر الحوض --</option>
                                                                                                <option value="1">ظهرة عوليم (5) </option>
                                                                                                <option value="2">ابو الشافط (7) </option>
                                                                                                <option value="3">سهل الغرس (38) </option>
                                                                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    أدخل رقم الحي
                                                </span>
                                            </div>
                                            <input type="text" value="0" id="areaName" class="form-control" placeholder="ادخل رقم الحي .. اذا كان الحوض يحتوي على حي واحد فقط ادخل 0 " name="areaName">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    أدخل مساحة القطعة
                                                </span>
                                            </div>
                                            <input type="text" value="0" id="area" class="form-control" placeholder="ادخل مساحة القطعة بالمتر المربع " name="area">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    الملاحظات على القطعة
                                                </span>
                                            </div>
                                            <input type="text" value="0" id="notes" class="form-control" placeholder="اذا كان هناك ملاحظات هلى هذه القطعة ... ادخلها هنا " name="notes">
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row" style="    text-align: center;">
                                <div class="form-group col-md-4 mb-2">
                                </div>
                                <div class="form-group col-md-2 mb-2">
                                    <button type="button" class="btn btn-primary" onclick="addNewTabo()">
                                        اضافة
                                    </button>
                                </div>
                                <div class="form-group col-md-2 mb-2">
                                    <button type="button" class="btn btn-primary">
                                         اغلاق
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(function() {
        $('.wtbl').DataTable({
            ajax:"{{ route('taboData') }}",
            columns:[

                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    
                    {data:'owner_name'},
                    {data:'excel_id',name:'excel_id'},
                    {data:'temp_no',name:'temp_no'},
                    {data:'final_no'},
                    {data:'area'},
                    {
                    data: null, 
                    render:function(data,row,type){
                           $actionBtn =`<a class="btn btn-success pay col-2" data="1" style=" background-color: #FF4961!important" href="/tabo/printTabo1/${data.id}" target="_blank">
                               مدفوع                                                           </a>
                           <a class="btn btn-primary col-2" style="background-color: #00a3e8!important;" href="/tabo/printTabo2/${data.id}" target="_blank">
                               كوشان
                           </a>
                           <a class="btn btn-success col-2" href="/tabo/printTabo3/${data.id}" target="_blank">
                               صفقة
                           </a>
                           <a class="btn btn-primary col-2" style="background-color: #00a3e8!important;" href="/tabo/printTabo4/${data.id}" target="_blank">
                               تصرف
                           </a>
                           <a class="btn btn-success col-2" style="color:#FFF;" onclick="update(${data.id});">
                                    تعديل
                            </a>`;
                            // $actionBtn ='<div style="float: left;">';
                            // $actionBtn += '<a  onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                            // $actionBtn += '<a  onclick="delete_lic('+data.id+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            //     $actionBtn += '</div>'
                                return $actionBtn;
                        },
                        name:'name',
                    },
                ],
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
    })
    function addNewTabo (){
       let formData = new FormData($("#addNewForm")[0]);
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".loader").removeClass('hide');
       $.ajax({
          type:'POST',
          url: "{{route('saveNewData')}}",
          dataType:"json",
         async: true,
           data: formData,
           success: (response) => {
            $('.wtbl').DataTable().ajax.reload();  
            console.log('response');
                if(response)
                {
			    Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
                
                }
				else
				{
        			Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: '{{trans('admin.error_save')}}',
    				showConfirmButton: false,
    				timer: 1500
    				})
				}
              $(".loader").addClass('hide');

             },
             cache: false,
            contentType: false,
            processData: false
        });
    }
    </script>

@endsection
