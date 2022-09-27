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

    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="ticketFrm" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">
                <div class="col-sm-12 col-lg-7 col-md-7">
                    <div class="card  leftSide" style="min-height:480px">
                        {{-- <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/purchase.png" width="32" height="32">
                                {{ 'مطالبة مالية' }}
                            </h4>
                        </div> --}}
                        @include('dashboard.component.ticketHeader',['ticketInfo'=>$ticketInfo])
                        <input type="hidden" id="app_type"  name="app_type" value="6">
                        <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                        <div class="card-content collapse show">
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-7 ">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'المستفيد' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="subscriber_name"
                                                        class="form-control numFeild" placeholder="{{ 'المستفيد' }}"
                                                        name="subscriber_name">
                                                    <input type="hidden" id="subscriber_id"  name="subscriber_id" value="0">
                                                    <input type="hidden" id="subscriber_model"  name="subscriber_model" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5" >
                                            <div class="form-group paddmob">
                                                <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                                            <img id="mobImg" src="https://db.expand.ps/images/jawwal35.png">
                                                        </span>
                                                    </div>
                                                    <input type="text" id="MobileNo"  maxlength="10" name="MobileNo"
                                                        class="form-control noleft numFeild" placeholder="0590000000"
                                                        aria-describedby="basic-addon1"
                                                        onblur="$('#username').val($(this).val())">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-7">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'وذلك عن' }}
                                                        </span>
                                                    </div>
                                                    <select class="form-control fin_desc" name="fin_desc" id="fin_desc">
                                                         <!--onchange="$('#AddressDetailsAR2').val($('#fin_desc option:selected').text())"-->
                                                        <option value="">{{"-- إختر --"}}</option>
                                                        @foreach($fin_desc_list as $fine_desc)
                                                        <option value="{{$fine_desc->id}}"> {{$fine_desc->name}}   </option>
                                                        @endforeach
                                                    </select>

                                                    <div class="input-group-append hidemob" onclick="ShowConstantModal(6073,'fin_desc','وصف المطالبة المالية')" style="cursor:pointer">

                                                        <span class="input-group-text input-group-text2">

                                                            <i class="fa fa-external-link"></i>

                                                        </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group paddmob">
                                                <div class="input-group" style="width: 240px;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text " id="basic-addon1">
                                                            {{ 'المبلغ' }}
                                                        </span>
                                                    </div>
                                                    <input id="AmountInNIS1" name="AmountInNIS1" class="form-control numFeild "
                                                        placeholder="00.00" style="border-radius: 0rem !important;">
                                                    <select class="form-control" name="CurrencyID1" id="CurrencyID1">
                                                        <option value="1" selected="">{{ 'شيكل' }}</option>
                                                        <option value="2">{{ 'دولار' }}</option>
                                                        <option value="3">{{ 'دينار' }}</option>
                                                        <option value="4">{{ 'يورو' }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    @include('dashboard.includes.orders')
                                    

                                </div>
                            </div>
                        </div>
                        @include('dashboard.includes.attachment')
                    </div>
                </div>

                @include('dashboard.includes.forward')

            </div>

            <div class="content-body resultTblaa">
                <div class="row">

                        <div class="col-xl-12 col-lg-12">
            
                            <div class="card">
            
                                <div class="card-header" style="direction: rtl;">
            
                                    <h4 class="card-title">
                                        <img src="https://t.expand.ps/expand_repov1/public/assets/images/purchase.png" width="32" height="32">
                                        أرشيف المطالبات 
                                    </h4>
                                </div>
            
                                <div class="card-body">
            
                                    <div class="form-body">
            
                                        <div class="row" id="resultTblaa">
            
                                            <div class="col-xl-12 col-lg-12">
            
                                                <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
            
                                                    <thead>
            
                                                        <tr>
            
                                                            <th >#</th>
                                                            <th> تاريخ الطلب  </th>
                                                            
                                                            <th > {{"المستفيد"}} </th>
            
                                                            <th > {{"المبلغ"}}  </th>
            
                                                            <th > {{"و ذلك عن"}}  </th>
            
                                                            <th > {{"الموظف"}}  </th>
            
                                                            <th > حالة الطلب  </th>
            
                                                            <th > {{"طباعة الطلب"}}  </th>
            
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
        </form>
    </section>

    {{-- @include('dashboard.component.fetch_table'); --}}
    @include('dashboard.component.ticket_config',['ticketInfo'=>$ticketInfo,'department'=>$department])

    @include('dashboard.component.tasks_table')

    {{-- <script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"
        type="text/javascript"></script> --}}
    {{-- <script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript">

    </script> --}}
<script>
     $( function(){

        var table = $('.wtbl').DataTable({

            ajax:"{{ route('financial_info_all') }}",

            columns:[

                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},

                    {
                        data: null,
                        render:function(data,row,type){
                                                    $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                                $actionBtn = `<div>${$date}</div>`;
                                    return $actionBtn;
                        },
                    },
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/viewTicket/${data.id}/34' style="margin-right:17px;" target="_blank"> ${data.customer_name} </a>`;
                                    return $actionBtn;
                        },
                        name:'customer_name'
                    },
                    {
                        data: null,
                        render:function(data,row,type){
                            $CurrencyList=[];
                            $CurrencyList[1]="شيكل";
                            $CurrencyList[2]="دولار";
                            $CurrencyList[3]="دينار";
                            $CurrencyList[4]="يورو";
                                $actionBtn = `<div>${data.AmountInNIS1} ${$CurrencyList[data.CurrencyID1]}</div>`;
                                    return $actionBtn;
                        },
                        name:'AmountInNIS1'
                    },
                    {data:'fin_desc_name',name:'t_constant.name'},

                    {data:'created_by_name',name:'admins.name'},

                    {
                        data: null,
                        render:function(data,row,type){
                            $appStatusList=[];
                            $appStatusList[1]="مفتوح";
                            $appStatusList[5002]="مفتوح";
                            $appStatusList[6006]="تحت المتابعة";
                            $appStatusList[6010]="مقبول";
                            $appStatusList[5003]="مغلق";
                                $actionBtn = `<div>${$appStatusList[data.ticket_status]}</div>`;
                                    return $actionBtn;
                        },
                    },
                    
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/34?flag=0' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
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
    $(document).ready(function () {

        $( "#subscriber_name" ).autocomplete({
    		source:'archive_auto_complete',
    		minLength: 1,
            select: function( event, ui ) {
                $("#subscriber_id").val(ui.item.id)
                $("#subscriber_model").val(ui.item.model)
                getFullData(ui.item.id)
                
                if( {{$ticketInfo->apps_btn}}==1)
                getSubscriberTasks(ui.item.id)
    		}
	    });
        $( ".ac" ).autocomplete({
    		source:'sparePart_auto_complete',
    		minLength: 1,
            select: function( event, ui ) {
    		}
	    });
    


        $('#ticketFrm').submit(function(e) {
            e.preventDefault();
            $(".loader").removeClass('hide');
            
        // $( "#subscriber_name" ).removeClass( "error" );
        // $( "#subscriber_id" ).removeClass( "error" );
        // $( "#MobileNo" ).removeClass( "error" );
        $( "#AreaID" ).removeClass( "error" );
        // $( "#Address" ).removeClass( "error" );
        $( "#subscriptionType" ).removeClass( "error" );
           let formData = new FormData(this);
           $.ajax({
              type:'POST',
              url: "saveTicket34",
               data: formData,
               contentType: false,
               processData: false,
               success: (response) => {
                // $('.wtbl').DataTable().ajax.reload();  
                // console.log('response');
                 if (response.success!=null) {
                    $(".loader").addClass('hide');
    			Swal.fire({
    				position: 'top-center',
    				icon: 'success',
    				title: '{{trans('admin.data_added')}}',
    				showConfirmButton: false,
    				timer: 1500
    				})
    				writeUserData('viewTicket/'+response.app_id+'/'+response.app_type)
                    if(print==true){
                    let url=`{{ route('admin.dashboard') }}/printTicket/${response.app_id}/${response.app_type}`
                    window.open(url, '_blank');
                    print=false;
    				}
    				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
                   this.reset();
        //         if(print==true){
        //             self.location=`{{ route('admin.dashboard') }}/printTicket/${response.app_id}/${response.app_type}`
        //             print=false;
    				// }
        //             if(writeUserData('viewTicket/'+response.app_id+'/'+response.app_type))
        //     				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
        //           this.reset();
                 }else{
                     console.log(response.error);
                     if(response.error=='no_attatch'){
                         
                        $(".attachName").addClass('error');
                        Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: 'أدخل المرفقات',
        				showConfirmButton: true,
        				timer: 2000
        				})
                        $(".loader").addClass('hide');
        				return false;
                     }
                     $(".loader").addClass('hide');
    
        			Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: '{{trans('admin.error_save')}}',
        				showConfirmButton: false,
        				timer: 1500
        				})
                     }
                 //location.reload();
    
               },
               error: function(response){
                $(".loader").addClass('hide');
                
    // 			if(response.responseJSON.errors.subscriber_name){
    //                 $( "#subscriber_name" ).addClass( "error" );
    //                 $( "#subscriber_name" ).get(0).setCustomValidity('أدخل اسم معرف مسبقا ');
    //                 $( "#subscriber_name" ).on('input',function(){
    //                     this.setCustomValidity('')
    //                 })
    //             }
    //             if(response.responseJSON.errors.subscriber_id){
    //                 $( "#subscriber_id" ).addClass( "error" );
    //                 $( "#subscriber_name" ).get(0).setCustomValidity('أدخل اسم معرف مسبقا ');
    //                 $( "#subscriber_name" ).on('input',function(){
    //                     this.setCustomValidity('')
    //                 })
    //             }
    //             if(response.responseJSON.errors.MobileNo){
    //                 $( "#MobileNo" ).addClass( "error" );
    //                 $( "#MobileNo" ).get(0).setCustomValidity('أدخل رقم جوال ');
    //                 $( "#MobileNo" ).on('blur',function(){
    //                     this.setCustomValidity('')
    //                 })
    //             }
                // if(response.responseJSON.errors.AreaID){
                //     $( "#AreaID" ).addClass( "error" );
                //     $( "#AreaID" ).get(0).setCustomValidity('يرجى اختيار منطقة ');
                //     $( "#AreaID" ).on('input',function(){
                //         this.setCustomValidity('')
                //     })
                // }
                // if(response.responseJSON.errors.Address){
                //     $( "#Address" ).addClass( "error" );
                // }
                
    
    			Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: 'يرجى تعبئة الحقول الاجبارية',
    				showConfirmButton: false,
    				timer: 1500
    				})
    			
               }
           });
      });
    });
    
    function getSubscriberTasks(id){
    
        let subscribe_id = id;

            $.ajax({

                type: 'get',

                url: "subscriber_tasks",

                data: {

                    subscribe_id: subscribe_id,

                },

                success: function(response) {
                   
                    if (response.status!=false) {  
                        
                        drawtasks(response.tikets);
                        
                    }else{
                        Swal.fire({

            				position: 'top-center',
            
            				icon: 'error',
            
            				title: 'لايوجد طلبات لهاذا المواطن',
            
            				showConfirmButton: false,
            
            				timer: 1500
        
        				})
                    }
                },

            });
    
}
    
    function getFullData(id){
    
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')

            }

        });
    formData={'id':id}
       $.ajax({
          type:'POST',
          url: "appCustomer",
           data: formData,
           /*contentType: false,
           processData: false,*/
           success: (response) => {
             if (response) {
                 srch=response.phone_one==null?(response.phone_two==null?'':response.phone_two):response.phone_one
                if(srch.search("056")>=0)
                    $('#mobImg').attr('src','{{asset('assets/images/w35.png')}}');
                else
                    $('#mobImg').attr('src','{{asset('assets/images/jawwal35.png')}}');
                $('#MobileNo').val(response.phone_one==null?(response.phone_two==null?'':response.phone_two):response.phone_one)
                $(".loader").addClass('hide');
                
                getCert(response.id,response.archive.certCount);
                @can('subscriberContractArchive')    
                getContractArchive(response.id,response.archive.contractArchiveCount);
                @endcan
                
                @can('subscriberLicArchive')    
                getLicArchive(response.id,response.archive.licArchiveCount);
                @endcan
                
                @can('subscriberOutArchive')
                getOutArchive(response.id,response.archive.outArchiveCount);
                @endcan
                
                @can('subscriberInArchive')
                getInArchive(response.id,response.archive.inArchiveCount);
                @endcan
                
                @can('subscriberOtherArchive')
                getOtherArchive(response.id,response.archive.otherArchiveCount);
                @endcan
                
                @can('subscriberCopyArchive')
                getCopyArchive(response.id,response.archive.copyToCount);
                @endcan
                
                @can('subscriberJalArchive') 
                getJalArchive(response.id,response.archive.linkToCount);
                @endcan
             }

           },
           error: function(response){
            $(".loader").addClass('hide');

			Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: '{{trans('admin.error_save')}}',
				showConfirmButton: false,
				timer: 1500
				})
           }
       });
}
    
    window.globalCounter = 2;
    $(document).ready(function () {
        
        
        
        
        $("#mytbody").on("input","#price", function () {
            if($(".price").last().val().length>0){
                var data = '<tr><td class="col-sm-4 " style="width: 5%; border: none;">' 
                + window.globalCounter 
                + '</td><td class="col-sm-4" style="width: 50%; border: none;">'
                +'<input type="text" class="form-control ac" name="itemname[]"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control" name="quantity[]" oninput="CalculateColumns(\'myTable\',\'price[]\',\'quantity[]\',\'total[]\',\'totalamount\')"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control" name="types[]"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control price" id="price" name="price[]" oninput="CalculateColumns(\'myTable\',\'price[]\',\'quantity[]\',\'total[]\',\'totalamount\')"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control" name="total[]"/>'
                +'</td><td style=" border: none;"><i id="delete" class="fa fa-trash" style="color:#1E9FF2;padding-top: 9px;"></i></td></tr>';
                $("#mytbody").append(data);
                window.globalCounter++;
                
                $( ".ac" ).autocomplete({
            		source:'sparePart_info',
            		minLength: 1,
                    select: function( event, ui ) {
            		}
    	        });
    	        
                if(window.globalCounter>=7){
                    $(".leftSide").removeAttr("style");
                }
            }
        });

        $("#mytbody").on("click", "#delete", function (ev) {
            var $currentTableRow = $(ev.currentTarget).parents('tr')[0];
            $currentTableRow.remove();
            CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount');
            window.globalCounter--;

            $("#mytbody").find('tr').each(function (index) {
                var firstTDDomEl = $(this).find('td')[0];
                var $firstTDJQObject = $(firstTDDomEl);
                $firstTDJQObject.text(index + 1);
            });
        });


    });    

    function CalculateColumns(ContainerID, Col1, Col2, Col3, GrandTotalID) {
        if( typeof ContainerID == 'string' ) var ContainerID = document.getElementById( ContainerID );

        var arrCol1 = new Array();
        var arrCol2 = new Array();
        var arrCol3 = new Array();
        var GrandTotal = 0;
        var ContainerIDElements = new Array( 'input');
        //var ContainerIDElements = new Array('input', 'textarea', 'select');

        for( var i = 0; i < ContainerIDElements.length; i++ ){
            els = ContainerID.getElementsByTagName( ContainerIDElements[i] );
            for( var j = 0; j < els.length; j++ ){
                if(els[j].name == Col1) arrCol1.push(els[j]);
                if(els[j].name == Col2) arrCol2.push(els[j]);
                if(els[j].name == Col3) arrCol3.push(els[j]);
            }
        }

        for( var j = 0; j < arrCol1.length; j++ ) {
           if((Number(arrCol1[j].value)>0) && (Number(arrCol2[j].value)>0)) {
               arrCol3[j].value = Number(arrCol1[j].value) * Number(arrCol2[j].value);
               GrandTotal += Number(arrCol3[j].value);
           }
        }

        document.getElementById(GrandTotalID).value = GrandTotal;
    } // CalculateColumns
    
     $(function() {
            var table = $('.tasktbl1').DataTable({
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
        $(function() {
            var table = $('.tasktbl2').DataTable({
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
        $(function() {
            var table = $('.tasktbl3').DataTable({
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
        $(function() {
            var table = $('.tasktbl4').DataTable({
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

        function drawtasks($tickets){
            
            if ( $.fn.DataTable.isDataTable( '.tasktbl1' ) ) {
        
                $(".tasktbl1").dataTable().fnDestroy();
        
                $('#cMyTask1').empty();
        
            }
            if ( $.fn.DataTable.isDataTable( '.tasktbl2' ) ) {
        
                $(".tasktbl2").dataTable().fnDestroy();
        
                $('#cMyTask2').empty();
        
            }
            if ( $.fn.DataTable.isDataTable( '.tasktbl3' ) ) {
        
                $(".tasktbl3").dataTable().fnDestroy();
        
                $('#cMyTask3').empty();
        
            }
            if ( $.fn.DataTable.isDataTable( '.tasktbl4' ) ) {
        
                $(".tasktbl4").dataTable().fnDestroy();
        
                $('#cMyTask4').empty();
        
            }
            
            engCount=0;
            waterCount=0;
            elecCount=0;
            otherCount=0;
            
            for(i=0 ; i<$tickets.length ; i++){
                taskRow='';
                link= '/admin/viewTicket/'+$tickets[i]['trans']['ticket_id']+'/'+$tickets[i]['trans']['related'];
                if($tickets[i]['0']['app_type']==1){
                    elecCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+elecCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['trans']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
    					+'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>'
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask2').append(taskRow);
		        }
                if($tickets[i]['0']['app_type']==2){
                    waterCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+waterCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['trans']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
                        +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>'  
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask3').append(taskRow);
		        }
                if($tickets[i]['0']['app_type']==3){
                    engCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+engCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['trans']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
                        +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>' 
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask1').append(taskRow);
		        }
                if($tickets[i]['0']['app_type']==4){
                    otherCount++;
                    taskRow+= '<tr style="text-align:center">'
                
    					+'<td >'+otherCount+'</td>'
    
    					+'<td>'
                        +$tickets[i]['trans']['nick_name']        
    					+'</td>'
    					
    					+'<td>'
                        +'<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                            +'<span class="hideMob" >'+ $tickets[i]['config']['ticket_name'] +' ('+$tickets[i]['0']['app_no'] +')' +'</span>'
                        +'</a>' 
    					+'</td>'
    
    					+'<td>'
                        +$tickets[i]['0']['created_at'].substring(0,10) +'&nbsp;&nbsp;&nbsp;'+$tickets[i]['0']['created_at'].substring(11,16)
    					+'</td>'
    
    					+'<td>'
                        +($tickets[i]['trans']['s_note'] ??'')
    					+'</td>'
    
    		            +'</tr>'
    		        $('#cMyTask4').append(taskRow);
		        }
            }
            
            $('#ctabCnt1').html(engCount);
            $('#ctabCnt2').html(elecCount);
            $('#ctabCnt3').html(waterCount);
            $('#ctabCnt4').html(otherCount);
            
            $('.tasktbl1').DataTable({
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
            $('.tasktbl2').DataTable({
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
            $('.tasktbl3').DataTable({
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
            $('.tasktbl4').DataTable({
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
            
        }
        
</script>
@stop
@section('script')

@endsection
