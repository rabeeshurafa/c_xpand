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

<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
<input type="hidden" id="app_type"  name="app_type" value="5">


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
                <select {{ $readonly?"readonly":"" }} class="form-control vac_type" name="vac_type" id="vac_type">
                    <option value="">{{ 'نوع المغادرة' }} </option>
                    @foreach($helpers['vacTypes'] as $vacType)
                        <option value="{{$vacType->id}}" {{ $ticket->leave_type==$vacType->id?'selected':"" }}>{{$vacType->name}} </option>
                    @endforeach
                </select>
                <div class="input-group-append hideMob"
                    onclick="ShowConstantModal(6055,'vac_type','نوع المغادرة')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    class="form-control alphaFeild cac ui-autocomplete-input"
                    name="subscriber_name" readonly autocomplete="off" value="{{ $ticket->customer_name }}">
                <input type="hidden" name="subscriber_id" id="subscriber_id"
                    class="form-control alphaFeild cac ui-autocomplete-input" value="{{ $ticket->customer_id }}"
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
                <input {{ $readonly?"readonly":"" }} type="text" id="date" maxlength="10" data-mask="00/00/0000" 
                name="date" class="form-control singledate " placeholder="dd/mm/yyyy" 
                aria-describedby="basic-addon1" aria-invalid="false" 
                value="{{ $ticket->leave_date }}" autocomplete="off">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4" >
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'وقت الخروج' }}
                    </span>
                </div>
                <input {{ $readonly?"readonly":"" }} type="text" id="start" onblur="calcDuration()"
                    data-mask="00:00" 
                    class="form-control "
                    placeholder="hh:mm" name="start" maxlength="5" value="{{ $ticket->start }}">
            </div>
        </div>
    </div>
    <div class="col-md-4" >
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'وقت العودة' }}
                    </span>
                </div>
                <input type="text" onblur="calcDuration()" value="{{ $ticket->end_dior }}"
                    id="endDior" data-mask="00:00" 
                    class="form-control " {{ $readonly?"readonly":"" }}
                    placeholder="hh:mm" name="endDior" maxlength="5">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'المدة الزمنية للمغادرة' }}
                    </span>
                </div>
                <input type="text"  
                    id="totalPeriod"
                    class="form-control " {{ $readonly?"readonly":"" }} value="{{ $ticket->period }}"
                    placeholder="hh:mm" name="totalPeriod" maxlength="5">
            </div>
        </div>
    </div>
</div>
@include('dashboard.ticketRecive.maldesc',['name_maldesc'=>'سبب المغادرة'])



<script>

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


