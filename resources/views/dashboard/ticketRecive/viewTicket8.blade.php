<?php $readonly=true; ?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif
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

@include('dashboard.includes.subscriber_rec')
<div class="row">
    <div class="col-md-12">

        <div class="form-group">
            <div class="input-group">
                <label class="form-label"
                    style="color: #ff9149;"><b>{{ 'مقدم الطلب' }}</b>:</label>
                <div class="col-sm-12 col-md-8">
                    <label for="radio-3">{{"المالك"}} </label>
                    <input
                        type="radio" name="Applicanttype" id="radio-3" {{ $ticket->Applicanttype==1?'checked':'' }}
                        class="jui-radio-buttons" value="1"
                        onclick="$('.Acting').hide();">
                    <label for="radio-4">{{"ممثل عنه"}} </label>
                    <input
                        type="radio" name="Applicanttype" id="radio-4" {{ $ticket->Applicanttype==2?'checked':'' }} 
                        class="jui-radio-buttons" value="2"
                        onclick="$('.Acting').show();">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row Acting" style="position: relative; display: none;" id="Acting">
    <div class="col-md-7">
        <div class="form-group paddmob">
            <div class="input-group subscribermob">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'مقدم الطلب' }}
                    </span>
                </div>
                <input type="text" id="subscriber_name2" {{ $readonly?"readonly":"" }} value="{{ $ticket->customer_name2 }}"
                    class="form-control" placeholder="{{ 'مقدم الطلب' }}"
                    name="subscriber_name2">
                <input type="hidden" id="subscriber_id2" name="subscriber_id2" value="{{ $ticket->customer_id2 }}">
            </div>
        </div>
    </div>
    <div class="col-md-4" >
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                        <img id="mobImg2" src="https://db.expand.ps/images/jawwal35.png"  >
                    </span>
                </div>
                <input type="text" id="MobileNo2" {{ $readonly?"readonly":"" }} value="{{ $ticket->customer_mobile2 }}" maxlength="10" name="MobileNo2"
                    class="form-control noleft numFeild" placeholder="0590000000"
                    aria-describedby="basic-addon1"
                    onblur="$('#username').val($(this).val())">
            </div>
        </div>
    </div>
</div>
@include('dashboard.includes.regionsTemplate_rec')
@include('dashboard.ticketRecive.subscription')
 <div class="row">
    <div class="col-md attachs-section">
        <img src="https://db.expand.ps/images/personal-information.png" width="40" height="40">
        <span class="attach-header">{{ 'المالك الجديد' }}</span>
    </div>
</div>
@include('dashboard.ticketRecive.subscriber_rec1')
@include('dashboard.ticketRecive.regionsTemplate_rec1')