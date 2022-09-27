<?php $readonly=true; ?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif
@if($ticket->receipt_no!=null && $ticket->receipt_no!=0)
{{--<div class="row hidemob">
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
--}}
@endif

<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
<input type="hidden" id="app_type"  name="app_type" value="6">

<div class="row">
    <div class="col-md-8 pl15-mob" style="padding-left: 0px;">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'المستفيد' }}
                    </span>
                </div>
                <input readonly type="text" id="subscriber_name"
                    class="form-control numFeild" placeholder="{{ 'المستفيد' }}"
                    name="subscriber_name" value="{{ $ticket->customer_name }}">
                <input type="hidden" id="subscriber_id"  name="subscriber_id" value="{{ $ticket->customer_id }}">
                <input type="hidden" id="subscriber_model"  name="subscriber_model" value="{{ $ticket->subscriber_model }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                        <img id="mobImg" src="https://db.expand.ps/images/jawwal35.png">
                    </span>
                </div>
                <input type="text" {{ $readonly?"readonly":"" }} id="MobileNo" maxlength="10" name="MobileNo"
                        class="form-control noleft numFeild" value="{{ $ticket->customer_mobile }}">
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-8">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'وذلك عن' }}
                    </span>
                </div>
                <select {{ $readonly?"disabled":"" }} class="form-control fin_desc" name="fin_desc" id="fin_desc">
                     <!--onchange="$('#AddressDetailsAR2').val($('#fin_desc option:selected').text())"-->
                    <option value="">{{"-- إختر --"}}</option>
                    @foreach($helpers['fin_desc_list'] as $fine_desc)
                    <option {{($fine_desc->id==$ticket->fin_desc)?'selected':''}} value="{{$fine_desc->id}}"> {{$fine_desc->name}}   </option>
                    @endforeach
                </select>

                <div class="input-group-append hidemob" onclick="ShowConstantModal(6073,'fin_desc','وصف المطالبة المالية')" style="cursor:pointer">

                    <span class="input-group-text input-group-text2">

                        <i class="fa fa-external-link"></i>

                    </span>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group" style="width: 240px;">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'المبلغ' }}
                    </span>
                </div>
                <input id="AmountInNIS1" value="{{ $ticket->AmountInNIS1 }}" {{ $readonly?"readonly":"" }} name="AmountInNIS1" class="form-control numFeild "
                    placeholder="00.00" style="border-radius: 0rem !important;">
                <select {{ $readonly?"disabled":"" }} class="form-control" name="CurrencyID1" id="CurrencyID1">
                    <option value="1" selected="">{{ 'شيكل' }}</option>
                    <option value="2">{{ 'دولار' }}</option>
                    <option value="3">{{ 'دينار' }}</option>
                    <option value="4">{{ 'يورو' }}</option>
                </select>
            </div>
        </div>
    </div>

</div>
@include('dashboard.ticketRecive.orders_rec')




