@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
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

    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="ticketFrm" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">

                <div class="col-sm-12 col-md-6">
                    <div class="card leftSide">
                        @include('dashboard.component.ticketHeader',['ticketInfo'=>$ticketInfo])
                        <div class="card-content collapse show">
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="form-body">

                                    @include('dashboard.includes.wasel')
                                    
                                    <input type="hidden" name="subscriptionID" id="subscriptionID">
                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                    <input type="hidden" id="app_type"  name="app_type" value="3">
                                    <input type="hidden" id="subscriber_id" name="subscriber_id" value="0">
                                    <input type="hidden" id="subscriber_id1" name="subscriber_id1">
                                    <input type="hidden" id="AreaID" name="AreaID" value="0">
                                    <input type="hidden" id="subscriptionType" name="subscriptionType" value="0">
                                    <div class="row" style="position: relative;">
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم المالك' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="subscriber_name"
                                                        class="form-control numFeild ac10" placeholder="{{ 'اسم المالك' }}"
                                                        name="subscriber_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-left: 48px;">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 97% !important; ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                                            <img id="mobImg" src="https://db.expand.ps/images/jawwal35.png">
                                                        </span>
                                                    </div>
                                                    <input type="text" id="MobileNo" maxlength="10" name="MobileNo"
                                                        class="form-control noleft numFeild" placeholder="0590000000"
                                                        aria-describedby="basic-addon1"
                                                        onblur="$('#username').val($(this).val())">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-label"
                                                        style="color: #ff9149;"><b>{{ 'مقدم الطلب' }}</b>:</label>
                                                    <div class="col-sm-12 col-md-8">
                                                        <label for="radio-3">{{"المالك"}} </label>
                                                        <input
                                                            type="radio" name="Applicanttype[]" checked="" id="radio-3"
                                                            class="jui-radio-buttons" value="1"
                                                            onclick="$('.Acting').hide();">
                                                        <label for="radio-4">{{"ممثل عنه"}} </label>
                                                        <input
                                                            type="radio" name="Applicanttype[]" id="radio-4"
                                                            class="jui-radio-buttons" value="2"
                                                            onclick="$('.Acting').show();">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row Acting" style="position: relative; display: none;" id="Acting">
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'مقدم الطلب' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="subscriber_name1"
                                                        class="form-control numFeild" placeholder="{{ 'مقدم الطلب' }}"
                                                        name="subscriber_name1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-left: 48px;">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 97% !important; ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                                            <img id="mobImg1" src="https://db.expand.ps/images/jawwal35.png">
                                                        </span>
                                                    </div>
                                                    <input type="text" id="MobileNo1" maxlength="10" name="MobileNo1"
                                                        class="form-control noleft numFeild" placeholder="0590000000"
                                                        aria-describedby="basic-addon1"
                                                        onblur="$('#username').val($(this).val())">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('dashboard.includes.costs',['ticketInfo'=>$ticketInfo,'department'=>$department])
                        <div class="row">
                            <div class="col-md attachs-section"
                                style="margin-left: 25px !important; margin-right: 25px !important;">
                                <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
                                <span class="attach-header">{{ 'مرفقات' }}
                                    <span id="attach-required">{{ '*' }}</span>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <table width="100%" class="detailsTB table archTbl" name="Education"
                                id="Education">
                               
                                <tbody id="requieredAttatch" style="border: hidden">
                                    <tr>
                                        <td class="col-md-1">
                                            <input type="checkbox" value="0" name="attachReceive[]" class="condition">
                                        </td>
                                        <td class="col-md-10" id="plusRequieredAttach" style="text-align: center!important;" >
                                            <input class="form-control attatchName"  type="text" name="attatchName[]"  value="{{ 'اثبات ملكية' }}">
                                        </td>
                                        <td  >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-1">
                                            <input type="checkbox" value="1" name="attachReceive[]" class="condition">
                                        </td>
                                        <td class="col-md-10" id="plusRequieredAttach" style="text-align: center!important;" >
                                            <input class="form-control attatchName"  type="text" name="attatchName[]"  value="{{'مخطط مساحة مصدق من مساح مرخص وموقع من المجاورين'}}">
                                        </td>
                                        <td onclick="$(this).parent().remove()" >
                                            <i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-1">
                                            <input type="checkbox" value="2" name="attachReceive[]" class="condition">
                                        </td>
                                        <td class="col-md-10" id="plusRequieredAttach" style="text-align: center!important;" >
                                            <input class="form-control attatchName"  type="text" name="attatchName[]">
                                        </td>
                                        <td onclick="$(this).parent().remove()" >
                                            <i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>
                                        </td>
                                    </tr>
                                </tbody>
                                <input type="hidden" value="3" name="attachReceive1N" id="attachReceive1N">
                            </table>

                        </div>

                        {{--<h4 style="font-family: Helvetica,Arial, sans-serif !important; color: #1E9FF2; padding-right: 10px">
                            {{"المرفقات المستلمة"}}
                        </h4>--}}
                        
                        
                        @include('dashboard.includes.attachment')
                    </div>
                </div>
                @include('dashboard.includes.forward')
            </div>
            </div>




        </form>
    </section>

    @include('dashboard.component.fetch_Task_table')
    @include('dashboard.component.ticket_config',['ticketInfo'=>$ticketInfo,'department'=>$department])
    @include('dashboard.component.tasks_table')


<script>
    $(document).ready(function() {
        
        $("#requieredAttatch").on("blur keypress", "#plusRequieredAttach",function() {
            if($(".attatchName").last().val().length>0){
                lastC1=$("#attachReceive1N").val();
                $("#requieredAttatch").append('' 
                +'<tr>'
                +    '<td class="col-md-1">'
                +        '<input type="checkbox" value="'+lastC1+'" name="attachReceive[]"  class="condition">'
                +    '</td>'
                +    '<td class="col-md-10" id="plusRequieredAttach" style="text-align: center!important;" >'
                +        '<input class="form-control attatchName"  type="text" name="attatchName[]"  >'
                +    '</td>'
                +    '<td onclick="$(this).parent().remove()" >'
                +        '<i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor:pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
                +    '</td>'
                +'</tr>'
                );
                $("#attachReceive1N").val(++lastC1);
            }
        });

    });
    
    $(document).ready(function () {

    $( "#subscriber_name1" ).autocomplete({
		source:'subscribe_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#subscriber_id1").val(ui.item.id)
            // getFullData(ui.item.id)
            srch=ui.item.phone_one==null?(ui.item.phone_two==null?'':ui.item.phone_two):ui.item.phone_one
                if(srch.search("056")>=0)
                    $('#mobImg1').attr('src','{{asset('assets/images/w35.png')}}');
                else
                    $('#mobImg1').attr('src','{{asset('assets/images/jawwal35.png')}}');
                $('#MobileNo1').val(ui.item.phone_one==null?(ui.item.phone_two==null?'':ui.item.phone_two):ui.item.phone_one)
		}
	});
    $( ".ac10" ).autocomplete({
		source:'subscribe_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#subscriber_id").val(ui.item.id)
            getFullData(ui.item.id)
            // srch=ui.item.phone_one==null?(ui.item.phone_two==null?'':ui.item.phone_two):ui.item.phone_one
            //     if(srch.search("056")>=0)
            //         $('#mobImg').attr('src','{{asset('assets/images/w35.png')}}');
            //     else
            //         $('#mobImg').attr('src','{{asset('assets/images/jawwal35.png')}}');
            //     $('#MobileNo').val(ui.item.phone_one==null?(ui.item.phone_two==null?'':ui.item.phone_two):ui.item.phone_one)
            
            if( {{$ticketInfo->apps_btn}}==1)
                getSubscriberTasks(ui.item.id)
		}
	});


    $('#ticketFrm').submit(function(e) {
        $(".loader").removeClass('hide');

       e.preventDefault();
       $( "#subscriber_name" ).removeClass( "error" );
        $( "#subscriber_id" ).removeClass( "error" );
        $( "#MobileNo" ).removeClass( "error" );
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: "saveTicket21",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $('.wtbl').DataTable().ajax.reload();  
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
				
//             if(print==true){
//                 self.location=`{{ route('admin.dashboard') }}/printTicket/${response.app_id}/${response.app_type}`
//                 print=false;
// 				}
// writeUserData('viewTicket/'+response.app_id+'/'+response.app_type)
//         				setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
//               this.reset();
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

			if(response.responseJSON.errors.subscriber_name){
                $( "#subscriber_name" ).addClass( "error" );
                $( "#subscriber_name" ).get(0).setCustomValidity('أدخل اسم معرف مسبقا ');
                $( "#subscriber_name" ).on('input',function(){
                    this.setCustomValidity('')
                })
            }
            if(response.responseJSON.errors.subscriber_id){
                $( "#subscriber_id" ).addClass( "error" );
                $( "#subscriber_name" ).get(0).setCustomValidity('أدخل اسم معرف مسبقا ');
                $( "#subscriber_name" ).on('input',function(){
                    this.setCustomValidity('')
                })
            }
            if(response.responseJSON.errors.MobileNo){
                $( "#MobileNo" ).addClass( "error" );
                $( "#MobileNo" ).get(0).setCustomValidity('أدخل رقم جوال ');
                $( "#MobileNo" ).on('blur',function(){
                    this.setCustomValidity('')
                })
            }
            
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
                console.log(response.errorList.length)
                if(response.errorList.length==0){
                    $(".btnArea").removeClass("hide");
                    //$(".errArea").addClass("hide");
                }
                else
                {
                    
                        $(".btnArea").addClass("hide");
                        //$(".errArea").removeClass("hide");
                        err='هل تريد المتابعة رغم الأخطاء التالية'
                        +'<ul>'
                    for(i=0;i<response.errorList.length;i++)
                        err+="<li>"+response.errorList[i]+"</li>";
                        err+='<ul>'
                        Swal.fire({
                          title: err,//'Do you want to save the changes?',
                          showDenyButton: true,
                          showCancelButton: true,
                          confirmButtonText: 'Save',
                          denyButtonText: `Don't save`,
                        }).then((result) => {
                          /* Read more about isConfirmed, isDenied below */
                          if (result.isConfirmed) {
                            Swal.fire('Saved!', '', 'success')
                          } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                          }
                        })
                }
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
                if($tickets[i]['0']['app_type']==4 || $tickets[i]['0']['app_type']==5){
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

