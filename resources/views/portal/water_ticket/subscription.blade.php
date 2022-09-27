@extends('portal.portal')
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
        
        .phoneDiv  {
            padding-left: 0px;
        }
    </style>

    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="ticketFrm" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">

                <div class="col-sm-12 col-md-12">
                    <div class="card leftSide">
                        @include('portal.includes.ticketHeader')
                        <div class="card-content collapse show">
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="form-body">
                                    <div class="row exonmobile">
                                        <div class="col-md-8 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group " style="width: 79.5% !important">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">نوع
                                                            الإشتراك</span>
                                                    </div>
                                                    <select id="subscriptionType" name="subscriptionType" 
=                                                        class="form-control subscriptionType" >
                                                        <option value="">-- يرجى اختيار نوع الاشتراك --</option>
                                                        @foreach($subsList as $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--<div class="input-group-append" onclick="ShowConstantModal(39,'subscriptionType','نوع اشتراك مياه')">-->
                                                    <!--    <span class="input-group-text input-group-text2">-->
                                                    <!--        <i class="fa fa-external-link"></i>-->
                                                    <!--    </span>-->
                                                    <!--</div>-->
                                                </div>
                                        </div>

                                    </div>


                                </div>

                                    <input type="hidden" name="subscriptionID" id="subscriptionID">
                                    @include('portal.includes.subscriber')
                                    <input type="hidden" id="app_type"  name="app_type" value="2">
                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                    <input type="hidden" id="app_no"  name="app_no" value="{{$app_no}}">
                                    <input type="hidden" id="rec_id"  name="rec_id" value="{{$ticketInfo->emp_to_access_portal}}">
                                    @include('portal.includes.regionsTemplate')

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-label" style="color: #ff9149; font-weight:bold">
                                                        {{ 'نوع الملكية' }}
                                                    </label>
                                                    <div class="col-sm-12 col-md-8">
                                                        <label for="radio-3">{{ 'ملك' }} </label>
                                                        <input
                                                            onchange="if($(this).prop('checked'))$('.attach-required').hide()"
                                                            type="radio" name="Ownership[]" checked="" id="radio-3"
                                                            class="jui-radio-buttons" value="1"
                                                            onclick="$('.ownertypes').hide();$('.owner').show();">
                                                        <label for="radio-4">{{ 'إيجار' }} </label>
                                                        <input
                                                            onchange="if($(this).prop('checked'))$('.attach-required').show()"
                                                            type="radio" name="Ownership[]" id="radio-4"
                                                            class="jui-radio-buttons" value="2"
                                                            onclick="$('.ownertypes').hide();$('.rent').show();">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-7 ownertypes rent" style="display: none;">
                                            <div class="form-group">
                                                <div class="input-group" style="width:99% !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم المالك' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="subscriber_name1"
                                                        class="form-control ac10 ui-autocomplete-input"
                                                        placeholder="اسم المالك" name="subscriber_name1" style="height: 35px;"
                                                        autocomplete="off">
                                                    <input type="hidden" id="subscriber_id1" name="subscriber_id1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group licNoGroup"
                                                    style="width:99% !important; padding-left: 5px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'رقم الرخصة' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="LicenceNo" class="form-control" 
                                                        placeholder="رقم الرخصة" name="LicenceNo" style="height: 35px;">
                                                    <input type="hidden" id="licNo" name="licNo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @include('portal.includes.forward')
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>




        </form>
    </section>
  
@endsection
  
@section('script')
    <script>
$(document).ready(function () {



    $( "#subscriber_name" ).autocomplete({
		source:'{{route("portal_auto_complete")}}',
		minLength: 1,
        select: function( event, ui ) {
            $("#subscriber_id").val(ui.item.id)
            getFullData(ui.item.id)
		}
	});
    $( ".ac10" ).autocomplete({
		source:'{{route("portal_auto_complete")}}',
		minLength: 1,
        select: function( event, ui ) {
            $("#subscriber_id1").val(ui.item.id)
		}
	});

    $('#ticketFrm').submit(function(e) {
        e.preventDefault();
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide'); 
    $( "#subscriber_name" ).removeClass( "error" );
    $( "#subscriber_id" ).removeClass( "error" );
    $( "#MobileNo" ).removeClass( "error" );
    $( "#AreaID" ).removeClass( "error" );
    // $( "#Address" ).removeClass( "error" );
    $( "#subscriptionType" ).removeClass( "error" );
      let formData = new FormData(this);
      $.ajax({
          type:'POST',
          url: '{{route("portal_saveTicket1")}}',
          data: formData,
          contentType: false,
          processData: false,
          success: (response) => {
              $(".form-actions").removeClass('hide'); 
            console.log('response');
             if (response.success!=null) {
                $(".loader").addClass('hide');
			Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
				

				// setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
              this.reset();
				

             }else{
                 console.log(response.error);
                 
                 $(".loader").addClass('hide');

    			Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: '{{trans('admin.error_save')}}',
    				showConfirmButton: false,
    				timer: 1500
    				})
                 }

          },
          error: function(response){
            $(".loader").addClass('hide');
            $(".form-actions").removeClass('hide'); 
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
            if(response.responseJSON.errors.AreaID){
                $( "#AreaID" ).addClass( "error" );
                $( "#AreaID" ).get(0).setCustomValidity('يرجى اختيار منطقة ');
                $( "#AreaID" ).on('input',function(){
                    this.setCustomValidity('')
                })
            }
            // if(response.responseJSON.errors.Address){
            //     $( "#Address" ).addClass( "error" );
            // }
            if(response.responseJSON.errors.subscriptionType){
                $( "#subscriptionType" ).addClass( "error" );
                $( "#subscriptionType" ).get(0).setCustomValidity('يرجى اختيار نوع الاشتراك  ');
                $( "#subscriptionType" ).on('input',function(){
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
          url: '{{route("portal_appCustomer")}}',
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
                    
                    //     $(".btnArea").addClass("hide");
                    //     //$(".errArea").removeClass("hide");
                    //     err='هل تريد المتابعة رغم الأخطاء التالية'
                    //     +'<ul>'
                    // for(i=0;i<response.errorList.length;i++)
                    //     err+="<li>"+response.errorList[i]+"</li>";
                    //     err+='<ul>'
                    //     Swal.fire({
                    //       title: err,//'Do you want to save the changes?',
                    //       showDenyButton: true,
                    //       showCancelButton: true,
                    //       confirmButtonText: 'Save',
                    //       denyButtonText: `Don't save`,
                    //     }).then((result) => {
                    //       /* Read more about isConfirmed, isDenied below */
                    //       if (result.isConfirmed) {
                    //         Swal.fire('Saved!', '', 'success')
                    //       } else if (result.isDenied) {
                    //         Swal.fire('Changes are not saved', '', 'info')
                    //       }
                    //     })
                }
                
                
                
             }

          },
          error: function(response){
            $(".loader").addClass('hide');

			Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: 'خطاء بالنظام',
				showConfirmButton: false,
				timer: 1500
				})
          }
      });
}

        
    </script>
@stop

