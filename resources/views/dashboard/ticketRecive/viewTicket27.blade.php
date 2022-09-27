<?php $readonly=true; ?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif
@if($ticket->receipt_no!=null && $ticket->receipt_no!=0)
<div class="row">
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

<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
<input type="hidden" id="app_type"  name="app_type" value="4">


<input type="hidden" name="subscriptionID" id="subscriptionID">

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group" style="">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'الغاية' }}
                    </span>
                </div>
                <select id="reason" name="reason" type="text"
                    class="form-control valid reason" style="" {{ $readonly?"readonly":"" }} aria-invalid="false">
                    <option value="" selected=""> {{ 'اختر' }} </option>
                    @foreach($helpers['resonTypeList'] as $resonType)
                    <option value="{{ $resonType->id }}" {{ $ticket->reason==$resonType->id?'selected':"" }}>{{ $resonType->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append"onclick="ShowConstantModal(6033,'reason','الغاية')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;">
    <div class="col-md-7">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'مقدم الطلب' }}
                    </span>
                </div>
                <input type="text" id="subscriber_name" 
                    class="form-control numFeild" readonly name="subscriber_name" value="{{ $ticket->customer_name }}">
                <input type="hidden" id="subscriber_id" name="subscriber_id" value="{{ $ticket->customer_id }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="input-group" style="width: 97% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                        <img id="mobImg" src="https://db.expand.ps/images/jawwal35.png">
                    </span>
                </div>
                <input type="text" {{ $readonly?"readonly":"" }} id="MobileNo" maxlength="10" name="MobileNo"
                    class="form-control noleft numFeild" value="{{ $ticket->customer_mobile }}"
                    onblur="$('#username').val($(this).val())">
            </div>
        </div>
    </div>
</div>

@if($ticketInfo->show_nationalID == 1)
<div calss="row" style="position: relative; ">
    <div class="col-md-7" style="padding-right: 0px;">
        <div class="form-group paddmob">
            <div class="input-group subscribermob">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم الهوية' }}
                    </span>
                </div>
                <input type="text" id="national_id" 
                    class="form-control numFeild" placeholder="{{ 'رقم الهوية' }}"
                    
                    value="{{ $ticket->national_id }}"
                    {{ $readonly?"readonly":"" }}
                    
                    name="national_id">
                
            </div>
        </div>
    </div>
</div>
@endif




<script>

    
</script>


