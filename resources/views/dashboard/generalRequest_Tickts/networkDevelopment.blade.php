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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'نوع الصيانة' }}
                                                        </span>
                                                    </div>
                                                    <select class="form-control networkType" name="networkType" id="networkType">
                                                        <option value="">{{ 'نوع الصيانة' }} </option>
                                                        @foreach($networkTypes as $networkType)
                                                        <option value="{{ $networkType->id }}">{{ $networkType->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append hideMob"
                                                        onclick="ShowConstantModal(6058,'networkType','نوع الصيانة')">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="app_type"  name="app_type" value="5">
                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                    @include('dashboard.includes.maldesc_ticket',['name_maldesc'=>'وصف الصيانة'])

                                    @include('dashboard.includes.regionsTemplate')
                                </div>
                            </div>

                        </div>

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



<script>
$(document).ready(function () {



//     $( "#subscriber_name" ).autocomplete({
// 		source:'subscribe_auto_complete',
// 		minLength: 1,
//         select: function( event, ui ) {
//             $("#subscriber_id").val(ui.item.id)
//             getFullData(ui.item.id)
// 		}
// 	});
    


    $('#ticketFrm').submit(function(e) {
        e.preventDefault();
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
    // $( "#subscriber_name" ).removeClass( "error" );
    // $( "#subscriber_id" ).removeClass( "error" );
    // $( "#MobileNo" ).removeClass( "error" );
    $( "#AreaID" ).removeClass( "error" );
    // $( "#Address" ).removeClass( "error" );
    $( "#subscriptionType" ).removeClass( "error" );
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: "saveTicket30",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
               $(".form-actions").removeClass('hide');
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
</script>
@stop

