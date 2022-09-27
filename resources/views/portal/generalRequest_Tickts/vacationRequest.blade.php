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

        .tdborder {
            padding: 1px !important;
            padding-right: 5px !important;
            border: 1px solid #000000;
        }

        .thborder {
            background-color: #0073AA;
            border: 1px solid #000000;
            color: #ffffff;
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم الموظف' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="subscriber_name" 
                                                        class="form-control numFeild" placeholder="{{ 'اسم الموظف' }}"
                                                        name="subscriber_name">
                                                    <input type="hidden" id="subscriber_id"  name="subscriber_id" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'نوع الإجازة' }}
                                                        </span>
                                                    </div>
                                                    <select class="form-control vac_type" name="vac_type" id="vac_type">
                                                        <option value="">{{ 'نوع الاجازة' }} </option>
                                                        @foreach($vacTypes as $vacType)
                                                            <option value="{{$vacType->id}}">{{$vacType->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="vac_day_no"  name="vac_day_no" value="0">
                                    <input type="hidden" id="app_type"  name="app_type" value="5">
                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'تاريخ البدء' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="start_date" onblur="calcDuration()"
                                                        value="<?php echo date('d/m/Y')?>"
                                                        data-mask="00/00/0000" 
                                                        class="form-control pickadate-arrow singledate  picker__input picker__input--active"
                                                        placeholder="dd/mm/yyyy" name="start_date" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'تاريخ الإنتهاء' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" onblur="calcDuration()" value="<?php echo date('d/m/Y')?>"
                                                        id="end_date" data-mask="00/00/0000" 
                                                        class="form-control"
                                                        placeholder="dd/mm/yyyy" name="end_date" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'عدد ايام الاجازة' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" readonly value=""
                                                        id="vac_day" class="form-control"
                                                        placeholder="" name="vac_day" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pl7mob" >
                                        <div class="col-lg-12 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group paddmob">
                                                <table style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <th class="thborder" style="text-align: center">
                                                                {{ 'النوع' }}
                                                            </th>
                                                            <th class="thborder" style="text-align: center">
                                                                {{ 'رصيد' }}
                                                            </th>
                                                            <th class="thborder" style="text-align: center">
                                                                {{ 'مستنفذ' }}
                                                            </th>
                                                            <th class="thborder" style="text-align: center">
                                                                {{ 'متبقي' }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="thborder" style="text-align: center">
                                                                {{ 'سنوية' }}
                                                            </th>
                                                            <td class="tdborder" style="text-align: center" id="r_balance">0</td>
                                                            <td class="tdborder" style="text-align: center" id="r_spent">0</td>
                                                            <td class="tdborder" style="text-align: center" id="r_remain">0</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="thborder" style="text-align: center">
                                                                {{ 'طارئة' }}
                                                            </th>
                                                            <td class="tdborder" style="text-align: center" id="u_balance">0</td>
                                                            <td class="tdborder" style="text-align: center" id="u_spent">0</td>
                                                            <td class="tdborder" style="text-align: center" id="u_remain">0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @include('portal.includes.maldesc_ticket',['name_maldesc'=>'سبب الاجازة'])
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            </div>




        </form>
    </section>


<script>
    
    $(document).ready(function () {
    
    $( "#subscriber_name" ).autocomplete({
		source:'emp_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#subscriber_id").val(ui.item.id)
            drawVac(ui.item.id);
            getArchive(ui.item.id);
		}
	});
	
	function getArchive($id)
    {           

    let emp_id = $id;
    $.ajax({
        type: 'get', // the method (could be GET btw)
        url: "emp_info",
        data: {
            emp_id: emp_id,
        },
        success:function(response){
            if (response.status!=false) {
                
                @can('empContractArchive')    
                getContractArchive(response.info.id,response.contractArchiveCount);
                // $archiveCount+=response.contractArchiveCount;
                @endcan
                
                @can('empOutArchive')
                getOutArchive(response.info.id,response.outArchiveCount);
                // $archiveCount+=response.outArchiveCount;
                @endcan
                
                @can('empInArchive')
                getInArchive(response.info.id,response.inArchiveCount);
                // $archiveCount+=response.inArchiveCount;
                @endcan
                
                @can('empOtherArchive')
                getOtherArchive(response.info.id,response.otherArchiveCount);
                // $archiveCount+=response.otherArchiveCount;
                @endcan
                
                @can('empCopyArchive')
                getCopyArchive(response.info.id,response.copyToCount);
                // $archiveCount+=response.copyToCount;
                @endcan
                
                @can('empJalArchive') 
                getJalArchive(response.info.id,response.linkToCount);
                // $archiveCount+=response.linkToCount;
                @endcan
                    
                
            }else{
                // window.location = "{{route('deptNotAllowed')}}";
            }
        },
    });
}
   
    $('#ticketFrm').submit(function(e) {
         e.preventDefault();
        if(!calcDuration())
        {
            return false;
        }
            $(".loader").removeClass('hide');

    $( "#subscriber_name" ).removeClass( "error" );
    $( "#subscriber_id" ).removeClass( "error" );
    $( "#desc" ).removeClass( "error" );
    $( "#vac_type" ).removeClass( "error" );
      let formData = new FormData(this);
      $.ajax({
          type:'POST',
          url: "saveTicket32",
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
				// if(print==true){
    //             self.location=`{{ route('admin.dashboard') }}/printTicket/${response.app_id}/${response.app_type}`
    //             print=false;
				// }
    //             writeUserData('viewTicket/'+response.app_id+'/'+response.app_type)
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
            if(response.responseJSON.errors.desc){
                $( "#desc" ).addClass( "error" );
                $( "#desc" ).get(0).setCustomValidity('أدخل سبب الاجازة ');
                $( "#desc" ).on('blur',function(){
                    this.setCustomValidity('')
                })
            }
            if(response.responseJSON.errors.vac_type){
                $( "#vac_type" ).addClass( "error" );
                $( "#vac_type" ).get(0).setCustomValidity('يرجى اختيار نوع الاجازة ');
                $( "#vac_type" ).on('input',function(){
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
    
     calcDuration();
    function calcDuration(){
        twoDatesArr= new Array();
        twoDatesArr[0]= $('#start_date').val();
        twoDatesArr[1]= $('#end_date').val();
        


        d1Arr=twoDatesArr[0].split('/')
        d2Arr=twoDatesArr[1].split('/')
        d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
        d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
        if(d1Date>d2Date){
                    alert('تاريخ النهاية اقل من البداية')
            $("#vac_day").val('تاريخ النهاية اقل من البداية');
            return false;
        }
        console.log(d1Arr>d2Arr)
        var diff = Math.abs(d2Date - d1Date);
        diffinyear=diff/(24*60*60*1000*30*12);
        diffinmonth=diff/(24*60*60*1000*30);
        diffinday=diff/(24*60*60*1000);
        month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
        day=Math.floor(diffinday)-(Math.floor(diffinmonth)*30)+1
        txt='';
        txt1='';
        strr='';
        if(Math.floor(diffinyear)>0)
            txt=Math.floor(diffinyear)+' سنة'

        if(Math.floor(month1)>0)
            txt1=Math.floor(month1)+' شهر, '
        if(txt.length>0) {
            strr = txt
            if(txt1.length>0)
                strr+=', '+txt1
            else
                strr+=', 0 شهر, '
        }
        else {
            if(txt1.length>0)
                strr+=txt1

        }
        $("#vac_day_no").val(Math.floor(day));
        $("#vac_day").val((strr+Math.floor(day)+' يوم'));
        //console.log(d2Date-d1Date);
        return true;
        console.log(diffinyear,diffinmonth,diffinday);
    }
</script>
@stop

