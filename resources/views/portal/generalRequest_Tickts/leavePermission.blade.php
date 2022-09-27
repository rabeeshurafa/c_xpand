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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'نوع المغادرة' }}
                                                        </span>
                                                    </div>
                                                    <select class="form-control vac_type" name="vac_type" id="vac_type">
                                                        <option value="">{{ 'نوع المغادرة' }} </option>
                                                        @foreach($vacTypes as $vacType)
                                                            <option value="{{$vacType->id}}">{{$vacType->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="app_type"  name="app_type" value="5">
                                    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم الموظف' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="subscriber_name" 
                                                        class="form-control alphaFeild cac ui-autocomplete-input"
                                                        name="subscriber_name" autocomplete="off">
                                                    <input type="hidden" name="subscriber_id" id="subscriber_id"
                                                        class="form-control alphaFeild cac ui-autocomplete-input" value="0"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'تاريخ اليوم' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="date" maxlength="10" data-mask="00/00/0000" 
                                                    name="date" class="form-control singledate " placeholder="dd/mm/yyyy" 
                                                    aria-describedby="basic-addon1" aria-invalid="false" 
                                                    value="<?php echo date('d/m/Y')?>" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3" >
                                            <div class="form-group paddmob">
                                                <div class="input-group w-s-87 mt-s-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'وقت الخروج' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="start" onblur="calcDuration()"
                                                        data-mask="00:00" 
                                                        class="form-control "
                                                        placeholder="hh:mm" name="start" maxlength="5" value="<?php echo date("h:i")?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'وقت العودة' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" onblur="calcDuration()" value="14:00"
                                                        id="endDior" data-mask="00:00" 
                                                        class="form-control "
                                                        placeholder="hh:mm" name="endDior" maxlength="5">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group paddmob">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'المدة الزمنية للمغادرة' }}
                                                        </span>
                                                    </div>
                                                    <input type="text"  
                                                        id="totalPeriod"
                                                        class="form-control "
                                                        placeholder="hh:mm" name="totalPeriod" maxlength="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @include('portal.includes.maldesc_ticket',['name_maldesc'=>'سبب الخروج'])

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
calcDuration();
$(document).ready(function () {
  

    $( "#subscriber_name" ).autocomplete({
		source:'emp_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#subscriber_id").val(ui.item.id);
            getArchive(ui.item.id);
		}
	});
   
    $('#ticketFrm').submit(function(e) {
         e.preventDefault();
        $(".loader").removeClass('hide');
        
    $( "#subscriber_name" ).removeClass( "error" );
    $( "#subscriber_id" ).removeClass( "error" );
    $( "#desc" ).removeClass( "error" );
    $( "#vac_type" ).removeClass( "error" );
      let formData = new FormData(this);
      $.ajax({
          type:'POST',
          url: "saveTicket28",
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
            if(response.responseJSON.errors.malDesc){
                $( "#malDesc" ).addClass( "error" );
                $( "#malDesc" ).get(0).setCustomValidity('أدخل سبب المغادرة ');
                $( "#malDesc" ).on('blur',function(){
                    this.setCustomValidity('')
                })
            }
            if(response.responseJSON.errors.vac_type){
                $( "#vac_type" ).addClass( "error" );
                $( "#vac_type" ).get(0).setCustomValidity('يرجى اختيار نوع المغادرة ');
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

function calcDuration(){
    compareDate1=new Date(('10/10/2010 '+ $('#start').val()+':00'));
    compareDate2=new Date(('10/10/2010 '+ $('#endDior').val()+':00'));

    var diff = Math.abs(compareDate2 - compareDate1)/(1000 * 3600);
    diffSplit=diff.toString().split('.');
    hours=diffSplit[0];
    min=((diffSplit.length>1) ? (diffSplit[1]*60):'00');
    
    finalTime=hours+':'+min.toString().substring(0,2);
    
    $('#totalPeriod').val(finalTime);

}
</script>
@stop

