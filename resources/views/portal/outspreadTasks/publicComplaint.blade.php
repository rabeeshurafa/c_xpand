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

                                    <input type="hidden" name="subscriptionID" id="subscriptionID">
                                    <div class="row" style="position: relative;">
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم المشتكى' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="subscriber_name"
                                                        class="form-control numFeild" placeholder="{{ 'اسم المشتكى' }}"
                                                        name="subscriber_name">
                                                    <input type="hidden" id="subscriber_id" name="subscriber_id" value="0">
                                                    <input type="hidden" name="subscriptionID" id="subscriptionID">
                                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                                    <input type="hidden" id="app_type"  name="app_type" value="4">
                                                    <input type="hidden" id="rec_id"  name="rec_id" value="{{$ticketInfo->emp_to_access_portal}}">
                                                    <input type="hidden" id="app_no"  name="app_no" value="{{$app_no}}">
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
                                </div>
                            </div>
                        </div>

                        <div class="row mobRow" style="padding-right: 10px; padding-left: 10px">

                            <div class="col-md attachs-section">

                                {{-- <i class="fa fa-users"></i> --}}

                                <span class="attach-header"> {{ 'محتوى المشكلة' }}</span>

                            </div>

                        </div>

                        <div class="row" style="padding-right: 20px; padding-left: 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group" style="width: 100% !important;">
                                        <textarea type="text" id="malDesc" class="form-control"
                                            placeholder="ضع نص المشكلة هنا" name="malDesc"
                                            style="width:100% ; border-radius:5px !important;height: 100px;"
                                            aria-invalid="false"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('portal.includes.forward') 
                    </div>
                </div>
            </div>
            </div>




        </form>
    </section>




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


    $('#ticketFrm').submit(function(e) {
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide'); 
       e.preventDefault();
       $( "#subscriber_name" ).removeClass( "error" );
        $( "#subscriber_id" ).removeClass( "error" );
        $( "#MobileNo" ).removeClass( "error" );
        $( "#malDesc" ).removeClass( "error" );
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: '{{route("portal_saveTicket24")}}',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".form-actions").removeClass('hide');   
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

				// setTimeout(function(){self.location='{{asset('/ar/admin')}}'},1500)
               this.reset();

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
            if(response.responseJSON.errors.malDesc){
                $( "#malDesc" ).addClass( "error" );
                $( "#malDesc" ).get(0).setCustomValidity('يرجى ادخال محتوى المشكلة  ');
                $( "#malDesc" ).on('input',function(){
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
                }
                else
                {
                    
                       
                }
                
                
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


</script>
@stop

