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

<div class="content-body">

    <section id="hidden-label-form-layouts">

    <form method="post" id="formDataaa" enctype="multipart/form-data">

        @csrf



        <section class="horizontal-grid" id="horizontal-grid"   >

                    <div class="row white-row"  >

                        <div class="col-sm-12">

                            <div class="card leftSide">

                                <div class="card-header">

                                    <h4 class="card-title">

                                        <img src="	https://t.expand.ps/expand_repov1/public/assets/images/light.png" width="32" height="32">

                                         اضافة اشتراك كهرباء 

                                    </h4>

                                    <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">

                                        الحالة

                                    </div>

                                    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">

                                        <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked/>

                                    </div>

                                </div>



                                <div class="card-content collapse show" >

                                    <div class="card-body" style="padding-bottom: 0;">

                                        <div class="form-body" >

                                            <div class="row" >

                                                <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87">
                                                            <div class="input-group-prepend">

                                                                <span class="input-group-text" id="basic-addon1">

                                                                     اسم المشترك

                                                                </span>

                                                            </div>

                                                            <input type="text" id="customerName" class="form-control alphaFeild cust" placeholder="اسم المشترك" name="customerName"
                                                            @if(isset($ticket))
                                                            value="{{$ticket->customer_name}}"
                                                            @endif>

                                                            <input type="hidden" id="customerId" name="customerId"
                                                            @if(isset($ticket))
                                                            value="{{$ticket->customer_id}}"
                                                            @endif>
                                                            <input type="hidden" id="app_id" name="app_id"
                                                            @if(isset($ticket))
                                                            value="{{$ticket->id}}"@else value="0"
                                                            @endif>

                                                            <input type="hidden" id="elecId" name="elecId">

                                                            <input type="hidden" id="customerType" name="customerType">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-12" style="padding: 0">
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

                                                <div class="col-lg-2 col-md-12 pr-0 pr-s-12">

                                                    <div class="form-group">

                                                        <div class="input-group w-s-87">

                                                            <div class="input-group-prepend">

                                                                <span class="input-group-text" id="basic-addon1">

                                                                    رقم رخصة البناء

                                                                </span>

                                                            </div>

                                                            <select id="licNo" name="licNo" class="form-control">

                                                                <option value="0">-</option>

                                                            </select>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87">

                                                            <div class="input-group-prepend">

                                                                <span class="input-group-text" id="basic-addon1">

                                                                    رقم الإشتراك

                                                                </span>

                                                            </div>

                                                            <input id="subscription_no" name="subscription_no" class="form-control" type="text"  aria-invalid="false" 
                                                            @if(isset($ticket))
                                                            value="{{$ticket->LicenceNo}}"
                                                            @endif>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-12 pr-0 pr-s-12">

                                                    <div class="form-group">

                                                        <div class="input-group w-s-87">

                                                            <div class="input-group-prepend">

                                                                <span class="input-group-text" id="basic-addon1">

                                                                    نوع الإشتراك

                                                                </span>

                                                            </div>

                                                            <select id="subscription_Type" name="subscription_Type" class="form-control subscription_Type">

                                                                <option value="0">-</option>

                                                                @foreach($subscription_TypeData as $subscription_Type)

                                                                <option value="{{$subscription_Type->id}}" @if(isset($ticket))
                                                                        {{$ticket->subscription_type == $subscription_Type->id ? 'selected': 'hhh'}} @endif> {{$subscription_Type->name}}   </option>

                                                                @endforeach

                                                            </select>

                                                            <div class="input-group-append" onclick="ShowConstantModal(6032,'subscription_Type','نوع الإشتراك')" style="cursor:pointer;margin-left: 0px !important;">

                                                                <span class="input-group-text input-group-text2">

                                                                    <i class="fa fa-external-link"></i>

                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="col-sm-12">

                                                    <div class="form-group">

                                                        <table style="width:100%; margin-top: -10px; " class="detailsTB table etbl">

                                                            <tr>

                                                                <th scope="col">رقم طلب الإشتراك</th>

                                                                <th scope="col">رقم العداد</th>

                                                                <th scope="col">نوع العداد</th>

                                                                <th scope="col">قدرة العداد</th>

                                                                <th scope="col">أمبير</th>

                                                                <th scope="col">آلية الدفع</th>

                                                                <th scope="col" class="countval hide" style="">القراءة الحالية</th>

                                                                <th scope="col">رقم العامود </th>
                                                                
                                                                <th scope="col">رقم / اسم المحول </th>

                                                                <th scope="col">تاريخ الأشتراك</th>

                                                            </tr>

                                                            <tr  id="formDatamasterElecRec">

                                                                <td width="150px;" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <input id="app_no" name="app_no" class="form-control" type="text"  aria-invalid="false" 
                                                                            @if(isset($ticket))
                                                                            value="{{$ticket->app_no}}"
                                                                            @endif>

                                                                        </div>

                                                                    </div>

                                                                </td>

                                                                <td width="200px;" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <input id="counter_no" name="counter_no" class="form-control" type="text"  aria-invalid="false" >

                                                                        </div>

                                                                    </div>

                                                                </td>

                                                                <td width="200px;" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <div class="input-group-prepend">

                                                                                <span class="input-group-text input-group-text1" id="basic-addon1">

                                                                                    <img src="https://db.expand.ps/images/counter35.png" style=" height: 32px">

                                                                                </span>

                                                                            </div>

                                                                            <select id="counter_Type" name="counter_Type" class="form-control noleft counter_Type">

                                                                                <option value="0">-</option>

                                                                                @foreach($counter_TypeData as $counter_Type)

                                                                                <option value="{{$counter_Type->id}}"> {{$counter_Type->name}}   </option>

                                                                                @endforeach

                                                                            </select>

                                                                            

                                                                            <div class="input-group-append"  onclick="ShowConstantModal(26,'counter_Type','نوع العداد')" style="cursor:pointer;margin-left: 0px !important;">

                                                                                <span class="input-group-text input-group-text2">

                                                                                    <i class="fa fa-external-link"></i>

                                                                                </span>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </td>

                                                                <td width="155px;" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <div class="input-group-prepend">

                                                                                <span class="input-group-text input-group-text1" id="basic-addon1">

                                                                                    <img src="https://db.expand.ps/images/capacity35.png" style=" height: 32px" />

                                                                                </span>

                                                                            </div>

                                                                            <select id="vasType" name="vasType" class="form-control noleft vasType">

                                                                                <option  value="0">-</option>

                                                                                @foreach($vasTypeData as $vasType)

                                                                                <option  value="{{$vasType->id}}" @if(isset($ticket)){{($ticket->phase == 2 && $vasType->id==36)? 'selected':( ($ticket->phase == 1 && $vasType->id==35) ?'selected':'' )}}   @endif> {{$vasType->name}}   </option>

                                                                                @endforeach

                                                                            </select>

                                                                            

                                                                            <div class="input-group-append"   onclick="ShowConstantModal(29,'vasType','قدرة العداد')"  style="cursor:pointer;margin-left: 0px !important;">

                                                                                <span class="input-group-text input-group-text2">

                                                                                    <i class="fa fa-external-link"></i>

                                                                                </span>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </td>

                                                                <td width="60px;" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <div class="input-group-prepend">

                                                                                <span class="input-group-text input-group-text1" id="basic-addon1">

                                                                                    A

                                                                                </span>

                                                                            </div>

                                                                            <input id="dataAmper" name="dataAmper" class="form-control noleft numFeild" @if(isset($ticket))
                                                                            value="{{$ticket->inAmper}}"
                                                                            @else
                                                                            value="32"
                                                                            @endif>

                                                                        </div>

                                                                    </div>

                                                                </td>

                                                                <td width="200px;" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <div class="input-group-prepend">

                                                                                <span class="input-group-text input-group-text1" id="basic-addon1">

                                                                                    <img src="https://db.expand.ps/images/card35.png" style=" height: 32px" />

                                                                                </span>

                                                                            </div>

                                                                            <select id="payType" name="payType" class="form-control noleft payType" onchange="if (this.selectedIndex) showCountval(this.value);">

                                                                                <option  value="0">-</option>

                                                                                @foreach($payTypeData as $payType)

                                                                                <option  value="{{$payType->id}}">
                                                                                    {{$payType->name}}  
                                                                                    </option>

                                                                                @endforeach

                                                                            </select>

                                                                            

                                                                            <div class="input-group-append"  onclick="ShowConstantModal(32,'payType','الية الدفع ')" style="cursor:pointer;margin-left: 0px !important;">

                                                                                <span class="input-group-text input-group-text2">

                                                                                    <i class="fa fa-external-link"></i>

                                                                                </span>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </td>

                                                                <td width="100px" class="countval hide" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group" style="width: 100% !important;">

                                                                            <input type="text" id="currentCount" name="currentCount" class="form-control" placeholder="القراءة الحالية">

                                                                        </div>

                                                                    </div>

                                                                </td>
                                                                <td width="100px" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group" style="width: 100% !important;">

                                                                            <input type="text" id="poleNo" name="poleNo" class="form-control" placeholder="رقم العامود">

                                                                        </div>

                                                                    </div>

                                                                </td>
                                                                <td width="300px" style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <div class="input-group-prepend">

                                                                                <span class="input-group-text input-group-text1" id="basic-addon1">

                                                                                    رقم /اسم المحول

                                                                                </span>

                                                                            </div>

                                                                            <select id="converterNo" name="converterNo" class="form-control noleft converterNo">

                                                                                <option  value="0">-</option>

                                                                                @foreach($converterNos as $converterNo)

                                                                                <option  value="{{$converterNo->id}}">
                                                                                    {{$converterNo->name}}  
                                                                                    </option>

                                                                                @endforeach

                                                                            </select>

                                                                            

                                                                            <div class="input-group-append"  onclick="ShowConstantModal(6208,'converterNo','رقم / اسم المحول')" style="cursor:pointer;margin-left: 0px !important;">

                                                                                <span class="input-group-text input-group-text2">

                                                                                    <i class="fa fa-external-link"></i>

                                                                                </span>

                                                                            </div>

                                                                        </div>

                                                                    </div>


                                                                </td>

                                                                <td style="border:none">

                                                                    <div class="form-group">

                                                                        <div class="input-group" style="width: 98.7% !important;">
                                                                            <input id="subscription_date" name="subscription_date" data-mask="00/00/0000" class="form-control eng-sm singledate valid " type="text"  aria-invalid="false" >

                                                                        </div>

                                                                    </div>

                                                                </td>

                                                            </tr>
                                                            <tr >
                                                                <td colspan="10" style="border:none">

                                                                    <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="padding-right: 0px" >

                                                                        <div class="form-group">

                                                                            <div class="input-group w-s-87" style="width: 99.5% !important;">

                                                                                <div class="input-group-prepend">

                                                                                    <span class="input-group-text" id="basic-addon1">

                                                                                        وصف مكان الشتراك

                                                                                    </span>

                                                                                </div>
                                                                                <input type="text" id="placeDesc" name="placeDesc" class="form-control" placeholder="وصف مكان الإشتراك">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td colspan="10" style="border:none">
                    
                                                                    <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="padding-right: 0px" >
                    
                                                                        <div class="form-group">
                                
                                                                            <div class="input-group w-s-87" style="width: 99.5% !important;">
                                
                                                                                <div class="input-group-prepend">
                                
                                                                                    <span class="input-group-text" id="basic-addon1">
                                
                                                                                        ملاحظات
                                
                                                                                    </span>
                                
                                                                                </div>
                                
                                                                                <input type="text" id="notes" class="form-control alphaFeild ac " placeholder="ملاحظات" name="notes">
                                
                                
                                                                            </div>
                                
                                                                        </div>
                                
                                                                    </div>
                    
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="text-align: center;">

                                                    <div class="form-group">

                                                        <button type="submit" id="saveBtn" class="btn btn-info">

                                                        إضافة الإشتراك

                                                        </button>
                                                        <button id="editBtn" type="submit" class="btn btn-info hide">

                                                           تعديل الاشتراك
                    
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

                </section>



      </form>

    </section>

</div>

<input type="hidden" id="type" name="type" value="">

<div class="content-body resultTblaa">

    <div class="row">

            <div class="col-xl-12 col-lg-12">

                <div class="card">

                    <div class="card-header" style="direction: rtl;">

                        <h4 class="card-title"><img src="https://t.expand.ps/expand_repov1/public/assets/images/light.png" style="height: 32px;"/> 

                            اشتراكات الكهرباء  

                        </h4>

                    </div>

                    <div class="card-body">

                        <div class="form-body">

                            <div class="row" id="resultTblaa">

                                <div class="col-xl-12 col-lg-12">

                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">

                                        <thead>

                                            <tr>

                                                <th  >

                                                   #

                                                </th>

                                                <th  >

                                                    {{trans('admin.subscriber_name')}}

                                                </th>

                                                <th > رقم رخصة البناء </th>

                                                <th >رقم الإشتراك</th>

                                                <th >نوع الإشتراك</th>

                                                {{--<th >تاريخ الإشتراك</th>--}}

                                                {{--<th >رقم العداد</th>--}}

                                                {{--<th >رقم طلب الإشتراك</th>--}}

                                                <th >نوع العداد</th>

                                                <th >قدرة العداد</th>

                                                <th >أمبير</th>

                                                <th >آلية الدفع</th>

                                                <th >وصف مكان الإشتراك</th>
                                                <th style="width: 125"></th>

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

    $(".loader").removeClass('hide');
    $('#saveBtn').addClass('hide');
    $('#editBtn').addClass('hide');
    $( "#customerName" ).removeClass( "error" );
    $( "#subscription_no" ).removeClass( "error" );
    $( "#licNo" ).removeClass( "error" );

       e.preventDefault();

       let formData = new FormData(this);



       $.ajax({

          type:'POST',

          url: '{{route("store_elec")}}',

           data: formData,

           contentType: false,

           processData: false,

           success: (response) => {

            
            $('#saveBtn').removeClass('hide');
            $(".loader").addClass('hide');
            if(response.status){
                $('#editBtn').addClass('hide');
                $('#licNo').empty();
                $('.wtbl').DataTable().ajax.reload();
    
                 console.log(response);
    
                 if (response) {
    
                    Swal.fire({
    
    				position: 'top-center',
    
    				icon: 'success',
    
    				title: '{{trans('admin.data_added')}}',
    
    				showConfirmButton: false,
    
    				timer: 1500
    
    				})
    				if($('#app_id').val()!=0)
                        setTimeout(function(){self.location='{{route("elec")}}'},1500)
                   this.reset();
    
                 }

            } else{
                 Swal.fire({

    				position: 'top-center',
    
    				icon: 'error',
    
    				title: '{{trans('admin.error_save')}}',
    
    				showConfirmButton: false,
    
    				timer: 1500

				})
				
                if(response.errors.subscription_no){
                    confirm('رقم الإشتراك مكرر');
                    $( "#subscription_no" ).addClass( "error" );
                }
            }
                

           },

           error: function(response){

            $(".loader").addClass('hide');

                $('#saveBtn').removeClass('hide');
                $('#editBtn').addClass('hide');
                if(response.responseJSON.errors.customerId){
                    $( "#customerName" ).addClass( "error" );
                }
                if(response.responseJSON.errors.customerName){
                    $( "#customerName" ).addClass( "error" );
                }
                if(response.responseJSON.errors.subscription_no){
                    $( "#subscription_no" ).addClass( "error" );
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

            ajax:"{{ route('elec_info_all') }}",

            columns:[

                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},

                    {

                        data: null, 

                        render:function(data,row,type){

                            $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}/subscribers?id='+data.user_id+'">'+data.user_name+'</a>';

                                return $actionBtn;

                        },

                        name:'name',

                    

                    },

                    {data:'licNo1',name:'licenses.licNo'},

                    {data:'subscription_no',name:'subscription_no'},

                    {data:'subscription_Type_name'},

                    // {data:'subscription_date'},

                    // {data:'counter_no'},

                    // {data:'app_no'},

                    {data:'counter_Type_name'},

                    {data:'vasType_name'},

                    {data:'dataAmper'},

                    {data:'payType_name'},

                    {data:'placeDesc'},
                    {
                        data: null,
                        render:function(data,row,type){
                                // $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                                // $actionBtn = '<a onclick="delete_elec('+data.id+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                                //     return $actionBtn;
                                    
                            $actionBtn ='<div style="float: left;">';
                            @can('edit_elecSubs')
                            $actionBtn += '<a  onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                            @endcan
                            @can('delete_elecSubs')
                            $actionBtn += '<a  onclick="delete_elec('+data.id+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            @endcan 
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

                                    style: 'cursor:pointer;height: 32px;',

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

$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   

  $( function() {

      

    $( ".cust_auto" ).autocomplete({

		source: '{{route("Linence_auto_complete")}}',

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

		source: '{{route("Linence_auto_complete")}}',

		minLength: 1,

		

        select: function( event, ui ) {

            console.log(ui.item);

            $('#customerName').val(ui.item.name);

            $('#customerId').val(ui.item.id);

            $('#customerType').val(ui.item.model);

            

            getLicUser(ui.item.id);

           }

	    });

    });

    

    function update($id)

{

    

    let elec_id = $id;

    $.ajax({

    type: 'get', // the method (could be GET btw)

    url: '{{route("elec_info")}}',



        data: {

            elec_id: elec_id,

        },

        success:function(response){
            $('#saveBtn').addClass('hide');
            $('#editBtn').removeClass('hide');
            
            getLicUser(response.info.user_id);

        $('#customerId').val(response.info.user_id);

        $('#customerName').val(response.info.user_name);

        $('#elecId').val(response.info.id);

        $('#licNo').val(response.info.licNo);

        $("#subscription_no").val(response.info.subscription_no);

        $("#subscription_Type").val(response.info.subscription_Type);

        $("#vasType").val(response.info.vasType);

        $("#app_no").val(response.info.app_no);

        $("#counter_no").val(response.info.counter_no);

        $("#counter_Type").val(response.info.counter_Type);
        
        $("#poleNo").val(response.info.poleNo);
        
        $("#converterNo").val(response.info.converterNo);
        
        $("#notes").val(response.info.notes);

        $("#region").val(response.info.region);

        let date=(response.info.subscription_date)

        dates=""

        if(date){

        dates=date.split("-");

        dates = dates[2]+'/'+dates[1]+'/'+dates[0];}

        $("#subscription_date").val(dates);

        $("#dataAmper").val(response.info.dataAmper);

        $("#payType").val(response.info.payType);

        $("#placeDesc").val(response.info.placeDesc);
        
        window.scrollTo(0, 0);
        },

    });

}

function getLicUser($id)

    {

        $('#licNo').empty();

        let subscriber_id = $id;

                $.ajax({

                type: 'get', // the method (could be GET btw)

                url: '{{route("license_info_byUser")}}',

            

                    data: {

                        subscriber_id: subscriber_id,

                    },

                    success:function(response){

                        template=""

                        count = 0;

                        if(response.info.length>0)

                        {

                            response.info.forEach(licence => {

                                count++;

                                

                                   template +='<option value="'+licence.id+'"> '+licence.licNo+'</option>'

                            

                            });

                    $('#licNo').append(template);

                        }

                    },

                });

    }

    function delete_elec($id) {
        if(confirm('هل انت متاكد من حذف الاشتراك؟ لن يمكنك استرجاعها فيما بعد')){
        let elec_id = $id;
        var _token = '{{ csrf_token() }}';
        $.ajax({

            type: 'post',

            // the method (could be GET btw)

            url: '{{route("elec_delete")}}',

            data: {

                elec_id: elec_id,
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

    function showCountval($payType){
        
        if($payType=='38')
        {
            $('.countval').removeClass('hide');
        }else{
            $('.countval').addClass('hide');
        }
        
        console.log($payType);
    }
</script>

@endsection

@endsection

