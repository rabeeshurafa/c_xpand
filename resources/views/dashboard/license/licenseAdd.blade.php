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
    .input-group {
        width: 100% !important;
    }


</style>

<div class="content-body">

    <section id="hidden-label-form-layouts">

    <form method="post" id="formDataaa" enctype="multipart/form-data">

        @csrf



        <div class="row white-row" >

            <div class="col-sm-12">
                <div class="card leftSide">
                    <div class="card-header">
                        <h4 class="card-title">
                            <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                            رخص البناء / ملف الترخيص
                        </h4>
                        <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">
                            الحالة
                        </div>
                        <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
                            <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked/>
                        </div>
                    </div>



                    <div class="card-content collapse show" >

                        <div class="card-body" style="padding-bottom: 0px;">

                            <div class="form-body" >

                                <div class="row">

                                    <div class="col-lg-4 col-md-12 pr-0 pr-s-12" style="max-width: 21% !important;"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87" style="width: 100%" >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">اسم المشترك</span>
                                                </div>
                                                <input type="text" id="customerName" class="form-control alphaFeild ac cust customerName" placeholder="اسم المشترك" name="customerName">
                                                <input type="hidden" id="customerId" name="customerId">
                                                <input type="hidden" id="licenseId" name="licenseId">
                                                <input type="hidden" id="customerType" name="customerType">
                                                <input type="hidden" id="pk_i_id" name="pk_i_id" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12" style="padding-right: 2%" >
                                        <div class="form-group">
                                            <div class="input-group w-s-87" >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">رقم ملف الترخيص</span>
                                                </div>
                                                <input type="text" id="fileNo" class="form-control alphaFeild ac" placeholder="رقم ملف الترخيص" name="fileNo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12" style="padding-right: 2%"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">تاريخ فتح الملف</span>
                                                </div>
                                                <input type="text" id="license_date" name="license_date" data-mask="00/00/0000" maxlength="10" class="form-control alphaFeild ac" placeholder="00/00/0000" autocomplete="off">
                                                {{-- <input type="text" id="floorNo" class="form-control alphaFeild ac" placeholder="عدد الطوابق" name="floorNo"> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12" style="padding-right: 2%">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                {{"المنطقة"}}
                                            </span>
                                                </div>
                                                <select id="region" class="form-control" name="region">
                                                    <option value="">{{"الكل"}}</option>
                                                    @foreach($regions as $sub)
                                                        <option value="{{ $sub->id }}" @if(isset($ticket))
                                                            {{$ticket->region == $sub->id ? 'selected': ''}} @endif>{{ $sub->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append col-2 hidemob " onclick="ShowAddressModal({{$town_id}},'region_id','الحي')" style=" margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;">
                                                    <span class="input-group-text input-group-text2">
                                                        <i class="fa fa-external-link"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12" style="padding-right: 2%" >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        رقم الرخصة
                                                    </span>
                                                </div>
                                                <input type="text" id="licNo" class="form-control alphaFeild ac" placeholder="رقم الرخصة" name="licNo">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            

                                    <table style="width:100%; margin-top: -10px;" class="detailsTB table engTbl">

                                        <tbody>

                                        <tr>

                                            <th scope="col">تاريخ جلسة التنظيم</th>

                                            <th scope="col">رقم جلسة التنظيم </th>
                                            
                                            <th scope="col">تاريخ الاصدار</th>
                                            
                                            <th scope="col">رقم القطعة </th>
                                            
                                            <th scope="col">رقم الحوض </th>

                                            <th scope="col">مساحة البناء المرخصة</th>

                                            <th scope="col">الغاية من الأستعمال</th>

                                            <th scope="col" style="" >رسوم الترخيص</th>

                                            <th scope="col" style="" >المدفوع</th>

                                            <th scope="col" style="" >الباقى</th>

                                        </tr>
                                        
                                        <tr>

                                            <td width="60px;" style="border:none" >

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>
                                                        <input type="text" id="bSeatDateList" name="bSeatDateList" data-mask="00/00/0000" maxlength="10" class="form-control alphaFeild ac" placeholder="00/00/0000" autocomplete="off">
                                                        {{--<input type="text" id="peiceNo" class="form-control" placeholder="رقم القطعة مالية"  name="peiceNo" >--}}

                                                    </div>

                                                </div>

                                            </td>
                                            
                                            <td width="60px;" style="border:none">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>
                                                        <input type="text" id="bSeatNoList" name="bSeatNoList"   class="form-control alphaFeild" placeholder="0000" autocomplete="off">
                                                        {{--<input type="text" id="hodNo" class="form-control" placeholder="رقم الحوض مالية"  name="hodNo" >--}}

                                                    </div>

                                                </div>

                                            </td>
                                            
                                            <td width="90px;">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="releas_date" name="releas_date" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" placeholder="00/00/0000" autocomplete="off">

                                                    </div>

                                                </div>

                                            </td> 
                                          
                                            <td width="110px;" style="border:none">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="peiceNo" class="form-control" placeholder="رقم القطعة"  name="peiceNo" >

                                                    </div>

                                                </div>

                                            </td>

                                            
                                            <td width="60px;" style="border:none">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="hodNo" class="form-control" placeholder="رقم الحوض"  name="hodNo" >

                                                    </div>

                                                </div>

                                            </td>

                                            <td width="60px;" style="border:none">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="licenseArea" class="form-control" placeholder="مساحة البناء المرخصة"  name="licenseArea" >

                                                    </div>

                                                </div>

                                            </td>
                                            
                                            <td width="180px;" style="border:none">


                                                    <div class="form-group">
                                                        <div class="input-group w-s-87">
                                                            <div class="input-group-prepend" style="width: 100%">
                                                                <select class="form-control ac use_desc" id="use_desc" name="use_desc" >
                                                                    @foreach($use_desc as $desc)
                                                                    <option value = "{{$desc->id}}">{{$desc->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="input-group-append col-2 hidemob " onclick="ShowConstantModal(6214,'use_desc','الغاية من الأستعمال')" style=" margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;">
                                                                <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-external-link"></i>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </td>

                                            <td width="100px;" style="border:none">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="fees" class="form-control" placeholder="رسوم الترخيص"  name="fees" >

                                                    </div>

                                                </div>

                                            </td>
                                            <td width="100px;" style="border:none">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="paid_up" class="form-control" placeholder="المدفوع"  name="paid_up" >

                                                    </div>

                                                </div>

                                            </td>

                                            <td width="100px;" style="border:none">

                                                <div class="form-group">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="rest" class="form-control" placeholder="الباقى"  name="rest" >

                                                    </div>

                                                </div>

                                            </td>

                                        </tr>
                                        <tr >
                                            <td colspan="10" style="border:none">
                                                <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="   padding-right: 0px" >
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                           <span class="input-group-text" id="basic-addon1">
                                                                    الغاية من الأستعمال
                                                           </span>
                                                        </div>
                                                        <input type="text" id="building_desc" class="form-control" placeholder="اوصاف البناء"  name="building_desc" >
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="padding-right: 0" >
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87" style="width: 100% !important;">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    ملاحظات
                                                                </span>
                                                            </div>
                                                            <input type="text" id="notes" class="form-control alphaFeild ac " placeholder="ملاحظات" name="notes">
                                                        </div>
                                                    </div>
                                                </div>


                                                {{-- <div class="form-group">

                                                    <div class="input-group" style="width: 100% !important">

                                                        <div class="input-group-prepend">

                                                        </div>

                                                        <input type="text" id="notes" class="form-control" placeholder="ملاحظات"  name="notes" >

                                                    </div>

                                                </div> --}}

                                            </td>
                                        </tr>
                                        </tbody>

                                    </table>

                                

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="text-align: center;">

                                        <div class="form-group">

                                            <button id="save" type="submit" class="btn btn-info">

                                            حفظ

                                            </button>

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

</div>

<input type="hidden" id="type" name="type" value="">

<div class="content-body resultTblaa">

    <div class="row">

            <div class="col-xl-12 col-lg-12">

                <div class="card">

                    <div class="card-header" style="direction: rtl;">

                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" /> 

                            رخص البناء  

                        </h4>

                    </div>

                    <div class="card-body">

                        <div class="form-body">

                            <div class="row" id="resultTblaa">

                                <div class="col-xl-12 col-lg-12">

                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">

                                        <thead>

                                            <tr>

                                                <th  style="width:10px">

                                                   #

                                                </th>

                                                <th  style="width: 16%;">

                                                    {{trans('admin.subscriber_name')}}

                                                </th>
                                                <th style="width: 10%;">رقم الملف</th>
                                                <th style="width: 10%;">تاريخ فتح الملف</th>
                                                <th style="width: 8%;">رقم الرخصة</th>

                                                <th style="width: 7%;">رقم القطعة</th>

                                                <th style="width: 9%;">رقم الحوض</th>

                                                <th style="width: 10%;">المساحة المرخصة</th>

                                                <th style="width: 10%;">اوصاف البناء</th>

                                                <th style="width: 10%"></th>

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

@section('script')

<script>



$('#formDataaa').submit(function(e) {

    if($('#customerId').val()==0){
        $( ".customerName" ).addClass( "error" );
        return false;
    }

    $(".loader").removeClass('hide');
     e.preventDefault();
    let formData = new FormData(this);
    $( "#customerName" ).removeClass( "error" );

    $( "#licNo" ).removeClass( "error" );
    $( "#fileNo" ).removeClass( "error" );

      

       



       $.ajax({

          type:'POST',

          url: "store_license",

           data: formData,

           contentType: false,

           processData: false,

           success: (response) => {
            $(".loader").addClass('hide');
            
            if(response.status){
             $('.wtbl').DataTable().ajax.reload();
             $( "#customerId" ).val('');
             $( "#customerType" ).val('');
             $( "#licenseId" ).val('');
             console.log(response);

             if (response) {

                Swal.fire({

				position: 'top-center',

				icon: 'success',

				title: '{{trans('admin.data_added')}}',

				showConfirmButton: false,

				timer: 1500

				})

               this.reset();

             }
            }
            else{
            Swal.fire({

				position: 'top-center',

				icon: 'error',

				title: '{{trans('admin.error_save')}}',

				showConfirmButton: false,

				timer: 1500

				})

				
                if(response.errors.fileNo){
                    confirm('رقم ملف الترخيص مكرر');
                    $( "#fileNo" ).addClass( "error" );
                }
                if(response.errors.licNo){
                    confirm('رقم الرخصة مكرر');
                    $( "#licNo" ).addClass( "error" );
                }
            }
              

           },

           error: function(response){

            $(".loader").addClass('hide');
            if(response.responseJSON.errors.fileNo){
            //   confirm('test');
                $( "#fileNo" ).addClass( "error" );
            }
            if(response.responseJSON.errors.licNo){
                $( "#licNo" ).addClass( "error" );
            }


            Swal.fire({

				position: 'top-center',

				icon: 'error',

				title: '{{trans('admin.error_save')}}',

				showConfirmButton: false,

				timer: 1500

				})



           }

       });

  });





    $( function(){

        var table = $('.wtbl').DataTable({

            ajax:"{{ route('license_info_all') }}",

            columns:[

                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},

                    {

                        data: null, 

                        render:function(data,row,type){

                            $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}/subscribers?id='+data.user_id+'">'+data.name+'</a>';

                                return $actionBtn;

                        },

                        name:'name',

                    

                    },
                    {
                    data: null, 
                    render:function(data,row,type){
                        if(data.notes!=null){
                            $notes=data.notes;
                            $actionBtn = '<a data-toggle="tooltip" data-placement="top" data-original-title="'
                            +  $notes  
                            +  '" target="_blank">'+data.fileNo+  '</a>';
                            
                            return $actionBtn;
                            
                        }else{
                            $actionBtn = '<a target="_blank">'+(data.fileNo??'')+  '</a>';
                            return $actionBtn;
                        }
                    },
                    name:'name',
                
                    },
                    {data:'license_date'},
                    {data:'licNo',name:'licNo'},

                    {data:'peiceNo',name:'peiceNo'},

                    {data:'hodNo'},

                    {data:'licenseArea'},

                    {data:'building_desc'},

                    {

                    data: null, 

                    render:function(data,row,type){
                            $actionBtn ='<div style="float: left;">';
                            $actionBtn += '<a  onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                            $actionBtn += '<a  onclick="delete_lic('+data.id+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                                $actionBtn += '</div>'
                                return $actionBtn;

                        },

                        name:'name',

                    },

                    // {data:'job_title_name' ,name:'job_titles.name'},

                ],

                        dom: 'Bfltip',

                        buttons: [

                            {

                                extend: 'excel',

                                tag: 'img',

                                title:'',

                                attr:  {

                                    title: 'excel',

                                    src:'{{asset('assets/images/ico/excel.png')}}',

                                    style: 'cursor:pointer;height: 40px;',

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
                table.buttons().container().appendTo($('.datatable_header'));
                table.on( 'draw.dt', function () {
                    setTimeout(function(){
                        $(".attach-text").each(function(){
                            $(this).html($(this).html().substring(0, 18))
                        })
                        $('a').on('mouseenter', function() {
                            $(this).tooltip('show');
                        });
                    },500)
                } );


    });

$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   

  $( function() {

      

    $( ".cust_auto" ).autocomplete({

		source: 'Linence_auto_complete',

		minLength: 1,

		

        select: function( event, ui ) {

           

            var currentIndex=$("input[name^=copyToID]").length -1;

            $('input[name="copyToID[]"]').eq(currentIndex).val(ui.item.id);

            $('input[name="copyToCustomer[]"]').eq(currentIndex).val(ui.item.name);

            $('input[name="copyToType[]"]').eq(currentIndex).val(ui.item.model);

        }

	});

});

$( function() {

    $( ".cust" ).autocomplete({

		source: 'Linence_auto_complete',

		minLength: 1,

		

        select: function( event, ui ) {

            console.log(ui.item);

            $('#customerName').val(ui.item.name);

            $('#customerId').val(ui.item.id);

            $('#customerType').val(ui.item.model);

           }

	    });

    });

    function update($id)

{

    

    let license_id = $id;

    $.ajax({

    type: 'get', // the method (could be GET btw)

    url: "license_info",



        data: {

            license_id: license_id,

        },

        success:function(response){

        $('#save').text("تعديل");

        $('#customerId').val(response.info.user_id);

        $('#licenseId').val(response.info.id);

        $('#customerName').val(response.user.name);

        $("#peiceNo").val(response.info.peiceNo);

        // $("#peiceNoTabo").val(response.info.peiceNoTabo);

        $("#hodNo").val(response.info.hodNo);

        $("#licenseArea").val(response.info.licenseArea);

        // $("#floorNo").val(response.info.floorNo);

        // $("#tapoHodNo").val(response.info.hod_tapo_No);

        $("#site").val(response.info.site);
        
        $("#fees").val(response.info.fees);

        $("#paid_up").val(response.info.paid_up);

        $("#rest").val(response.info.rest);
        
        // $("#allArea").val(response.info.allArea);

        $("#building_desc").val(response.info.building_desc);

        $("#licNo").val(response.info.licNo);

        $("#fileNo").val(response.info.fileNo);

        $("#use_desc").val(response.info.use_desc);

        $("#notes").val(response.info.notes);
        
        $("#bSeatNoList").val(response.info.bSeatNoList);

        $("#region").val(response.info.region);

        /////////////////////////////////////////////////
        let date=(response.info.license_date)

        dates=""

        if(date){

        dates=date.split("-");

        dates = dates[2]+'/'+dates[1]+'/'+dates[0];
            
        }

        $("#license_date").val(dates);
        /////////////////////////////////////////////////
        let bSeatDateList=(response.info.bSeatDateList)

        dates=""

        if(bSeatDateList){

        dates=bSeatDateList.split("-");

        dates = dates[2]+'/'+dates[1]+'/'+dates[0];
            
        }

        $("#bSeatDateList").val(dates);
        /////////////////////////////////////////////////
        let releas_date=(response.info.releas_date)

        dates=""

        if(releas_date){

        dates=releas_date.split("-");

        dates = dates[2]+'/'+dates[1]+'/'+dates[0];
            
        }

        $("#releas_date").val(dates);
        /////////////////////////////////////////////////
        window.scroll(0,0);
        },

    });

}
function delete_lic($id) {
    if(confirm('هل انت متاكد من حذف الرخصة؟ لن يمكنك استرجاعها فيما بعد')){
    let lic_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "lic_delete",

        data: {

            lic_id: lic_id,
            _token: _token,
        },

        success: function(response) {

            $(".loader").addClass('hide');

            $('.wtbl').DataTable().ajax.reload();

            // setTimeout(function(){

            //     $(".alert-success").addClass("hide");

            // },2000)

            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تم الحذف بنجاح',

                showConfirmButton: false,

                timer: 1500

            })

            $("#ajaxform")[0].reset();

        },

        error: function(response) {

            $(".loader").addClass('hide');

            Swal.fire({

                position: 'top-center',

                icon: 'error',

                title: 'خطأ فى عملية الحذف',

                showConfirmButton: false,

                timer: 1500

            })

            $("#formDataNameAR").on('keyup', function(e) {

                if ($(this).val().length > 0) {

                    $("#formDataNameAR").removeClass("error");

                }

            });

            if (response.responseJSON.errors.formDataNameAR) {

                $("#formDataNameAR").addClass("error");

            }

        }

    });
    return true;
    }
    return false;
}
</script>

@endsection

@endsection

