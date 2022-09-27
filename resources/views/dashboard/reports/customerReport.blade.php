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
                                <img src="{{asset('assets/images/ico/report32.png')}}" />
                                {{ 'تقرير المشتركين' }}
                            </h4>
                        </div>

                        <div class="card-body">
                            <form id="formDataaa" onsubmit="return false">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{"المنطقة"}}
                                                        </span>
                                                    </div>
                                                    <select id="HoodCD" class="form-control" name="HoodCD">
                                                        <option value="-1">{{"الكل"}}</option>
                                                        @foreach($regions as $sub)
                                                        <option value="{{ $sub->id }}"
                                                        >{{ $sub->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-12 ">
                                            <div class="form-group" >
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{"القسم"}}
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="DeptCD" id="DeptCD">
                                                        <option value="0">{{"-- الكل --"}}</option>
                                                        <option value="1">الكهرباء</option>
                                                        <option value="2">المياه</option>
                                                        <option value="3">تنظيم و بناء</option>
                                                        <option value="4"> رخص الحرف</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-12 ">
                                            <div class="form-group" >
                                                <div class="input-group w-s-87" >
                                                    <div class="input-group-prepend" style="height: 38px !important;">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{"نوع الأشتراك"}}
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="subType" id="subType">
                                                        <option value="0">{{"-- الكل --"}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{"عدد الإشتراكات"}}
                                                        </span>
                                                    </div>

                                                    <input type="text" id="cntrCnt" class="form-control" placeholder="" name="cntrCnt" style=" height:38px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-12">
                                            <div class="form-group" >
                                                <div class="input-group w-s-87" >
                                                    <div class="input-group-prepend" >
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{"المهنة"}}
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="proffCd" id="proffCd">
                                                        <option value="0">{{"-- الكل --"}}</option>
                                                        @foreach($job as $sub)
                                                            <option value="{{ $sub->id }}"
                                                            >{{ $sub->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2 col-md-6" style="position: relative; right: 45%">
                                            <div class="form-group">
                                                <button type="button" onclick="StartSearch()" class="btn btn-primary addBtn"
                                                        id="save">
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
                </div>

            </div>
        </section>
    </div>
    <!---------------------------------------table style--------------------------------------------------->
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
    <!---------------------------------------table-------------------------------------------------->
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
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right"
                                           class="detailsTB table wtbl">
                                        <thead>
                                        <tr style="text-align:center !important;background: #00A3E8;">
                                            <th width="50px">
                                                #
                                            </th>
                                            <th class="col1">
                                                {{ 'اسم المشترك' }}
                                            </th>
                                            <th class="col2">
                                                {{ 'العنوان' }}
                                            </th>
                                            <th class="col3">
                                                {{ 'القسم' }}
                                            </th>
                                            <th class="col4">
                                                {{ 'الاشتراكات' }}
                                            </th>
                                            <th class="col5">
                                                {{ 'نوع الأِشتراك' }}
                                            </th>
                                            <th class="col6">
                                                {{ 'المهنة' }}
                                            </th>
                                            {{-- <th class="col6">
                                                {{ 'الدورات التدريبية' }}
                                            </th>
                                            <th class="col7">
                                                {{ 'تاريخ الانتساب' }}
                                            </th> --}}
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
        /////////////////////////////////////////change select of sub-type//////////////////////////////////////////////
        $(document).ready(function () {
            $("#subType").html("<option value='0'>اختر القسم</option>")
            $("#DeptCD").change(function () {
                var val = $(this).val();
                        if(val == "0"){
                    $("#subType").html("<option value='0'>اختر القسم</option>");
                    }
                    else if (val == "1") {
                    $("#subType").html( "<option value='0'>الكل</option>"+
                                        "@foreach($use_elec as $sub)"+
                                        "<option value='{{$sub->id}}'>{{$sub->name}}</option>"+
                                        "@endforeach"
                    );
                } else if (val == "2") {
                    $("#subType").html("<option value='0'>الكل</option>"+
                                       "@foreach($use_water as $sub)"+
                                       "<option value='{{$sub->id}}'>{{$sub->name}}</option>"+
                                       "@endforeach"
                    );
                } else if (val == "3") {
                    $("#subType").html("<option value='0'>الكل</option>"+
                                       "@foreach($use_desc as $sub)"+
                                       "<option value='{{$sub->id}}'>{{$sub->name}}</option>"+
                                       "@endforeach"
                    );
                }
            });
        });
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
        
        /////////////////////////////////////////////// TABLE SEARCH////////////////////////////////////////////////////
        function StartSearch() {
            $('.loader').removeClass('hide');
            if ($.fn.DataTable.isDataTable('.wtbl')) {
                $(".wtbl").dataTable().fnDestroy();
                $('#recListaa').empty();
            }
            
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            let region = $("#HoodCD").val();
            let job = $("#proffCd").val();
            let dept = $("#DeptCD").val();
            let subsCount = $("#cntrCnt").val();
            let subType = $("#subType").val();
            
            table=$('.wtbl').DataTable({
            processing:true,
            serverSide:true,
            info:true,
            
            ajax: {
                url: '{{ route('subscriberReport') }}',
                data: function (d) {
                    d.region=region;
                    d.job=job;
                    d.dept=dept;
                    d.subsCount=subsCount;
                    d.subType =subType;
                }
            },
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                
                {data:'user_name'},

                ///////////////////////////////////////////////////////////////////
                {
                    data:null, 
                        render:function(data,row,type){
                            if(data.user_region!=null)
                                return data.user_region.name;
                            else
                                return '';
                        },
                    name:'user_region.name',
                    
                },
                ////////////////////////////////////////////////////////////////////
                { 
                        data:null, 
                        render:function(data,row,type){
                            dept=''
                            if($( "#DeptCD" ).val()==0)
                            {
                                dept+='الكهرباء'
                                +'<br>'+
                                'المياه'
                                +'<br>'+
                                'التنظيم والبناء'
                                +'<br>'
                            }else if($( "#DeptCD" ).val()==1){
                                dept+='الكهرباء'
                            }else if($( "#DeptCD" ).val()==2){
                                dept+='المياه'
                            }else if($( "#DeptCD" ).val()==3){
                                dept+='التنظيم والبناء'
                            }
                            // dept=$( "#DeptCD option:selected" ).text();
                            return dept;
                        },
                        name:'null',
                        searchable: false
                },
                
                {
                    data:null, 
                        render:function(data,row,type){
                            if($( "#DeptCD" ).val()==0)
                            {
                                return  data.elec_count+'<br>'+data.water_count+'<br>'+data.lic_count+'<br>';  
                            }else if($( "#DeptCD" ).val()==1){
                                 return  data.elec_count;
                            }else if($( "#DeptCD" ).val()==2){
                                 return  data.water_count;
                            }else if($( "#DeptCD" ).val()==3){
                                 return  data.lic_count;
                            }else{
                                return '';
                            }
                        },
                    name:'null',
                    searchable: false
                    
                },
                {
                    data:null,
                    render:function(data,row,type){
                        if(data.user_subType!=null)
                            return data.user_subType.name;
                        else if(data.lic_subType!=null)
                            return data.lic_subType.use_desc;
                        else
                            return '';
                    },
                    name:'user_subType.name',
                    use_desc:'lic_subType.use_desc',
                },
                {
                    data:null, 
                        render:function(data,row,type){
                            if(data.user_job!=null)
                                return data.user_job.name;
                            else
                                return '';
                        },
                    name:'user_job.name',
                    
                },
                
                
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