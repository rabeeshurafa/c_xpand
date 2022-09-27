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
                                    <div class="row hide">
                                        <div class="col-md-7" >
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'التاريخ' }}
                                                        </span>
                                                    </div>
                                                <input type="text" id="date_buy" name="date_buy" data-mask="00/00/0000" maxlength="10" class="form-control" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="app_type"  name="app_type" value="5">
                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                    <div class="row">                                       
                                        <div class="col-md-12 tablescroll">
                                            <table id="myTable" class="detailsTB responsive table order-list" style="padding: 0.75rem 2rem;">
                                                <colgroup>
                                                   <col span="1" style="width: 3%;">
                                                   <col span="1" style="width: 25%;">
                                                   <col span="1" style="width: 14%;">
                                                   <col span="1" style="width: 20%;">
                                                   <col span="1" style="width: 3%;">
                                                </colgroup>
                                    
                                                <thead>
                                                    <tr>
                                                        <th class="" scope="col">
                                                            {{ 'رقم' }}
                                                        </th>
                                                        <th style="padding: 0.75rem 5rem;" scope="col" class="" style="text-align: -webkit-center;color: white;">
                                                            {{ 'البيان' }}
                                                        </th>
                                                        <th style="padding: 0.75rem 1.5rem;" scope="col" class="" style="text-align: -webkit-center;color: white;">
                                                            {{ 'الكمية' }}
                                                        </th>
                                                        <th style="padding: 0.75rem 2rem;" scope="col" class="" style="text-align: -webkit-center;color: white;">
                                                            {{ 'الوحدة' }}
                                                        </th>
                                                        <th style="padding: 0.75rem 1.5rem;" class="hidemob" scope="col" class="hidemob"></th>
                                            
                                                    </tr>
                                                </thead>
                                                <tbody id="mytbody">
                                                    <tr>
                                                        <td class="col-sm-4 " style="width: 5%; border: none;">
                                                            1
                                                        </td>
                                                        <td class="col-sm-4" style="width: 35%;  border: none;">
                                                            <input type="text" name="itemname[]" id="itemname" class="form-control ac " />
                                                        </td>
                                                        <td class="col-sm-4" style="width: 15%; border: none;">
                                                            <input type="text" id="quantity" name="quantity[]"  class="form-control quantity" />
                                                        </td>
                                                        <td class="col-sm-4" style="width: 15%; border: none;">
                                                            <input type="text" name="types[]"  class="form-control" />
                                                        </td>
                                                        <td class="col-sm-2" style="width: 5%; border: none;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    
                                        </div>
                                    </div>
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
window.globalCounter = 2;
$(document).ready(function () {
    
        $("#mytbody").on("input","#quantity", function () {
            if($(".quantity").last().val().length>0){
                var data = '<tr><td class="col-sm-4 " style="width: 5%; border: none;">' 
                + window.globalCounter 
                + '</td><td class="col-sm-4" style="width: 50%; border: none;">'
                +'<input type="text" class="form-control ac itemname" name="itemname[]"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control quantity" id="quantity" name="quantity[]" />'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control" name="types[]"/>'
                +'</td>'
                +'<td style=" border: none;"><i id="delete" class="fa fa-trash" style="color:#1E9FF2;padding-top: 9px;"></i></td></tr>';
                $("#mytbody").append(data);
                window.globalCounter++;
                
                $( ".ac" ).autocomplete({
            		source:'sparePart_auto_complete',
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
            // CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount');
            window.globalCounter--;

            $("#mytbody").find('tr').each(function (index) {
                var firstTDDomEl = $(this).find('td')[0];
                var $firstTDJQObject = $(firstTDDomEl);
                $firstTDJQObject.text(index + 1);
            });
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
              url: "saveTicket33",
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
</script>
@stop
