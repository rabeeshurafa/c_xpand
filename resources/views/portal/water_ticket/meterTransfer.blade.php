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

        .detailsTB th {
            color: #ffffff !important;
        }

        .attachs-section {
            color: #2C303B;
            line-height: 2.5rem;
            margin-bottom: 20px;
            margin-left: 25px;
            margin-right: 25px;
            border-bottom: 1px solid #2C303B;
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-label " style="color: #ff9149; font-weight:bold">
                                                        {{ 'طبيعة النقل' }}
                                                    </label>
                                                    <div class="col-sm-12 col-md-5">
                                                        <input type="radio" name="pos" checked="" id="pos-1"
                                                            class="jui-radio-buttons" value="1" onclick="">
                                                        <label for="radio-1">{{ 'ضمن البناء' }}</label>
                                                        <input type="radio" name="pos" id="pos-2"
                                                            class="jui-radio-buttons" value="2" onclick="">
                                                        <label for="radio-2">{{ 'خارج البناء' }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @include('portal.includes.subscriber')
                                    <input type="hidden" id="app_type"  name="app_type" value="2">
                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                    <input type="hidden" id="app_no"  name="app_no" value="{{$app_no}}">
                                    <input type="hidden" id="rec_id"  name="rec_id" value="{{$ticketInfo->emp_to_access_portal}}">
                                    @include('portal.includes.regionsTemplate')

                                    <div class="row mobRow">
                                        <div class="col-md-12">
                                            <h5 class="sub-head" style="color:#ff9149;margin-top:20px">
                                                <b>
                                                    {{ 'بيانات الإشتراك' }}
                                                </b>
                                            </h5>

                                            <table class="detailsTB table" style="margin-left: 15px;">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">
                                                            {{ '#' }}
                                                        </th>
                                                        <th scope="col">
                                                            {{ 'رقم الإشتراك' }}
                                                        </th>
                                                        <th scope="col" class="hideMob"
                                                            style="text-align: -webkit-center;">
                                                            {{ 'العداد' }}
                                                        </th>
                                                        <th scope="col" style="text-align: -webkit-center;">
                                                            {{ 'وصف مكان العداد' }}
                                                        </th>
                                                        <th scope="col"></th>

                                                    </tr>
                                                </tbody>
                                                <tbody id="recList">

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md attachs-section">
                                <img src="https://db.expand.ps/images/google35.png" width="40" height="40">
                                <span class="attach-header">{{ 'المكان الجديد' }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group" style="padding-right: 25px;">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group licNoGroup" id="licGroup" style="width: 93% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                {{"رقم الرخصة"}}
                                                </span>
                                            </div>
                                            <input type="text" id="licNo" name="licNo" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                المنطقة
                                                </span>
                                            </div>
                                            <select id="AreaID1" name="AreaID1" type="text" style="height: 36px !important" class="form-control">
                                                <option value=""> -- اختر --</option>
                                                 @foreach($region as $sub)
                                                <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7" style="padding-left: 7px">
                                    <div class="form-group">
                                        <div class="input-group" style="width:100% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{ 'العنوان بالتفصيل' }}
                                                </span>
                                            </div>
                                            <textarea type="text" id="Address1" class="form-control"
                                                placeholder="العنوان بالتفصيل" name="Address1"
                                                style="height: 35px;"></textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 " style="padding-right: 0px;" >
                                    <a id="customer_location" href="https://www.google.com/maps/place/%D8%A8%D9%8A%D8%AA%D8%A7+%D8%A7%D9%84%D9%81%D9%88%D9%82%D8%A7%E2%80%AD/@32.1413383,35.2890394,14z/data=!3m1!4b1!4m5!3m4!1s0x151cde8e09aea509:0x5f1f34e632ceeef1!8m2!3d32.14134!4d35.286399" target="_blank">
                                        <img src="https://db.expand.ps/images/google35.png" style="    margin-left: -5px;;width:32px;height:32px;border-radius: 5px;"></a>
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
            
            subscriber_id=ui.item.id;
            
            $.ajax({

            type: 'get', // the method (could be GET btw)
            
            url: '{{route("license_info_byUser")}}',
                data: {
            
                    subscriber_id: subscriber_id,
            
                },
                success:function(response){
            
                    template=""
            
                    count = 0;
            
                    $('#licNo').remove('');
            
                    if(response.info.length>0)
            
                    {
            
                        template += '<select  class="form-control" name="licNo" id="licNo">'
            
                        template +='<option value="0">-- اختر --</option>'
            
                        response.info.forEach(licence => {
            
                            count++;
            
                              template +='<option value="'+licence.id+'"> '+(licence.licNo??'بدون')+'</option>'
            
            
                        });
                        template +='</select>'
            
                    }else {
            
                        template += '<input type="text" id="licNo" name="licNo" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">'
            
                    }
            
                $('#licGroup').append(template);
            
            
            
                },
            
            });
		}
	});
	
    
	
    $('#ticketFrm').submit(function(e) {
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide'); 
      e.preventDefault();
      $( "#subscriber_name" ).removeClass( "error" );
        $( "#subscriber_id" ).removeClass( "error" );
        $( "#MobileNo" ).removeClass( "error" );
        $( "#AreaID" ).removeClass( "error" );
        $( "#AreaID1" ).removeClass( "error" );
      let formData = new FormData(this);
      $.ajax({
          type:'POST',
          url: '{{route("portal_saveTicket10")}}',
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
            if(response.responseJSON.errors.AreaID1){
                $( "#AreaID1" ).addClass( "error" );
                $( "#AreaID1" ).get(0).setCustomValidity('يرجى اختيار منطقة ');
                $( "#AreaID1" ).on('input',function(){
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
                if(response.water!=null){
                     var len = response.water.length;
                     $row='';
                    for(var i=0; i<len; i++){
                      $row+= 
                        '<tr id="memRow1">'+
                        '<td style="color:#1E9FF2">'+(i+1)+'</td> '+
                        '<td>'+
                            (response.water[i].subscription_no??'')+
                            '<input type="hidden" name="SubscribtionIdList[]" value="'+response.water[i].id+'"><input type="text" class="form-control form-control1 numFeild hide" name="SubscribtionNumList[]" value="'+(response.water[i].subscription_no??'')+'">'+
                        '</td>'+
                        '<td class="hideMob" style="text-align: -webkit-center;">'+
                            (response.water[i].counter==null?'':response.water[i].counter.name)+
                            '<input type="text" class="form-control form-control1 alphaFeild hide" name="CounterTypeList[]" value="'+(response.water[i].counter==null?'':response.water[i].counter.name)+'">'+
                        '</td>'+
                        '<td style="text-align: -webkit-center;">'+
                            (response.water[i].placeDesc??'')+
                            '<input type="text" class="form-control form-control1   hide" name="CapacityList[]" value="'+(response.water[i].placeDesc??'')+'">'+
                        '</td>'+
                        '<td>'+
                                '<input type="radio" id="counters" name="counters" checked="" value="'+response.water[i].id+'" onclick="">'+
                        '</td>'+
                        '</tr>';
                    }
                    $("#recList").append($row);
                    
                }
                
                if(response.water.length!=0){
                    $("#saveBtn").removeClass("hide");
                    $("#saveBtnSend").removeClass("hide");
                    //$(".errArea").addClass("hide");
                }
                else
                {
                    
                        $("#saveBtn").addClass("hide");
                        $("#saveBtnSend").addClass("hide");
                        $("#recList").html('');
                        //$(".errArea").removeClass("hide");
                        Swal.fire({
            				position: 'top-center',
            				icon: 'error',
            				title: 'لا يمكن تقديم الطلب لعدم وجود اشتراك معرف في النظام',
            				showConfirmButton: true,
            				})
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

