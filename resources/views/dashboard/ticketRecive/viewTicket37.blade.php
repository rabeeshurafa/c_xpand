<?php $readonly=true; ?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif

<style>
    /*.padd0left{*/
    /*    padding-left:0px !important;*/
    /*}*/
    /*.des-p-l22{*/
    /*    padding-left:0px !important;*/
    /*}*/
    /*.width95{*/
    /*    width:95% !important;*/
    /*}*/
    /*.width100{*/
    /*    width:100% !important;*/
    /*}*/
</style>

@if($ticket->receipt_no!=null && $ticket->receipt_no!=0)


<div class="row hidemob">
    <div class="col-lg-4 col-md-12 pr-s-12">
        <div class="form-group">
            <div class="input-group" >
                <div class="input-group-prepend">
                  <span class="input-group-text " id="basic-addon1">
                    رقم الوصل
                  </span>
                </div>
                <input type="text" id="ReciptNo" {{ $readonly?"readonly":"" }} value="{{ $ticket->receipt_no }}" name="ReciptNo" class="form-control" placeholder="0000000" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12">
        <div class="form-group">
            <div class="input-group" style="width: 161px !important;">
                <div class="input-group-prepend">
                  <span class="input-group-text " id="basic-addon1" style="height: 33px !important;">
                     المبلغ
                  </span>
                </div>
                <input type="text"  id="AmountInNIS" {{ $readonly?"readonly":"" }} name="AmountInNIS" class="form-control numFeild"  style="height: 33px !important;"  value="{{ $ticket->amount }}">
                <select id="CurrencyID" {{ $readonly?"readonly":"" }} name="CurrencyID" type="text" class="form-control valid" style="height: 33px !important;" aria-invalid="false">
                    <option value="26"  {{ $ticket->currency==26?'selected':"" }}> شيكل </option>
                    <option value="28"  {{ $ticket->currency==28?'selected':"" }}> دينار </option>
                    <option value="27"  {{ $ticket->currency==27?'selected':"" }}> دولار </option>
                    <option value="31"  {{ $ticket->currency==31?'selected':"" }}> يورو </option>
                </select>
                <div class="input-group-append hidden-xs hidden-sm">
                    <div class="input-group-append" onclick="QuickAdd(30,'ownType','Own type')">
                        <span class="input-group-text input-group-text2">
                            <i class="fa fa-external-link"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<input type="hidden" id="app_type"  name="app_type" value="{{$ticket->app_type}}">
<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticket->dept_id}}">

<div class="row">
    <div class="col-md-6">
        <div class="form-group paddmob">
            <div class="input-group" style="width: 100% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'اسم المركبة' }}
                    </span>
                </div>
                <input type="text" id="vehicle_name" {{ $readonly?"readonly":"" }}
                    class="form-control numFeild"  placeholder="{{ 'اسم المركبة' }}"
                    name="vehicle_name" value="{{ $ticket->customer_name }}" >
                <input type="hidden" id="vehicle_id"  name="vehicle_id" value="{{ $ticket->customer_id }}" >
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group paddmob">
            <div class="input-group w-96">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم المركبة' }}
                    </span>
                </div>
                <input type="text" id="vehicle_no"  {{ $readonly?"readonly":"" }}
                    class="form-control numFeild" placeholder="{{ 'رقم المركبة' }}"
                    name="vehicle_no" value="{{ $ticket->vehicle_no }}">
            </div>
        </div>
    </div>
</div>


@include('dashboard.ticketRecive.maldesc',['name_maldesc'=>'وصف الصيانة المطلوبة'])
