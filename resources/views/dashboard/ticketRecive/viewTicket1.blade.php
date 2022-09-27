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

@if($ticket->app_type==1)
<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="lastRec" id="lastRec" value="4">
        <div class="form-group" style="margin-bottom: 0rem!important;">
            <div class="input-group" style="width:100%!important;">
                <div class="input-group-prepend">
                <label class="form-label " style="color: #ff9149; font-weight:bold">القدرة</label>
                </div>
                <div class="col-sm-12 col-md-3">
                    <input type="radio" {{ $readonly?"readonly":"" }}  name="phase[]"  {{ $ticket->phase==1?'checked':"" }} id="radio-1" class="jui-radio-buttons" value="1" onclick="drawCosts1();">
                   
                    <label for="radio-1">1 فاز</label>
                    <input type="radio" {{ $readonly?"readonly":"" }} name="phase[]" {{ $ticket->phase==2?'checked':"" }} id="radio-2" class="jui-radio-buttons" value="2" onclick="drawCosts2();">
                 <label for="radio-2">3 فاز</label></div>
                <div class="col-sm-12 col-md-3"    style="padding-bottom: 15px;" >
                    <div class="float-left">
                        <input type="number" class="form-control numFeild" {{ $readonly?"readonly":"" }} style="width:60px;"  name="inAmper" id="inAmper" value="{{ $ticket->inAmper }}" placeholder="30 أمبير">
                    </div> &nbsp;
                    <label for="radio-1"> &nbsp; أمبير</label>
                </div>
            </div>
        </div>
    </div>
    


</div>
@endif
<div class="row exonmobile hidemob">
    <div class="col-md-7">
        <div class="form-group">
            <div class="input-group" style="">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">نوع
                        الإشتراك</span>
                </div>
                <select id="subscriptionType" {{ $readonly?"readonly":"" }} name="subscriptionType"
                    class="form-control">
                    @foreach($helpers['subsList'] as $sub)
                    <option value="{{ $sub->id }}" {{ $ticket->subscription_type==$sub->id?'selected':"" }}>{{ $sub->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append" onclick="ShowConstantModal(39,'subscriptionType','نوع اشتراك مياه')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="subscriptionID" id="subscriptionID">
@include('dashboard.includes.subscriber_rec')

    <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticket->dept_id}}">
    <input type="hidden" id="app_type"  name="app_type" value="{{$ticket->app_type}}">

@include('dashboard.includes.regionsTemplate_rec')

<div class="row hidemob">
    <div class="col-md-12">

        <div class="form-group">
            <div class="input-group">
                <label class="form-label" style="color: #ff9149; font-weight:bold">
                    {{ 'نوع الملكية' }}
                </label>
                <div class="col-sm-12 col-md-8">
                    <input {{ $readonly?"readonly":"" }}
                        onchange="if($(this).prop('checked'))$('.attach-required').hide()"
                        type="radio" name="Ownership[]" {{ $ticket->ownership_type==1?"checked":"" }} id="radio-3"
                        class="jui-radio-buttons" value="1"
                        onclick="$('.ownertypes').hide();$('.owner').show();">
                    <label for="radio-3">{{ 'ملك' }} </label>
                    <input {{ $readonly?"readonly":"" }}
                        onchange="if($(this).prop('checked'))$('.attach-required').show()"
                        type="radio" name="Ownership[]" id="radio-4"
                        class="jui-radio-buttons" value="2" {{ $ticket->ownership_type==2?"checked":"" }}
                        onclick="$('.ownertypes').hide();$('.rent').show();">
                    <label for="radio-4">{{ 'إيجار' }} </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7 ownertypes rent hidemob"  style="{{ $ticket->ownership_type==1?'display: none':'' }}">
        <div class="form-group">
            <div class="input-group inputD2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'اسم المالك' }}
                    </span>
                </div>
                <input type="text" id="OwnerName" {{ $readonly?"readonly":"" }}
                    class="form-control ac10 ui-autocomplete-input" value="{{ $ticket->owner_name }}" name="OwnerName" style="height: 35px;"
                    autocomplete="off">
                <input type="hidden" id="SubscriberID1" name="SubscriberID1" value="{{ $ticket->owner_id }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group licNoGroup" {{ $readonly?"readonly":"" }}
                >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم الرخصة' }}
                    </span>
                </div>
                <input type="text" id="LicenceNo" {{ $readonly?"readonly":"" }} class="form-control" 
                 value="{{ $ticket->LicenceNo }}" name="LicenceNo" style="height: 35px;">
                <input type="hidden" id="licNo" name="licNo">
            </div>
        </div>
    </div>
</div>
<script>
function drawCosts1(){
    $('.vasChange').html('');
    var costrows='';
    <?php $sum=0; if($helpers['fees']!=null){?>
    
    if('{{$helpers['fees'][0]->fees_json}}'!='' &&'{{$helpers['fees'][0]->fees_json}}'!=null){
        <?php $arr=json_decode($helpers['fees'][0]->fees_json); 
        foreach($arr as $cost){
        ?>
        <?php 
            if($cost->feesValue=='')
                $cost->feesValue=0;
            $sum+=$cost->feesValue*1; 
            ?>
        costrows+=`<li style="font-size: 17px !important;color:#000000">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" name="feesText[]" class="form-control feesText"  value="{{ $cost->feesText}}">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="feesValue[]" class="form-control FessVals" value="{{ $cost->feesValue*1}}" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                    </div>
                </div>
            </li>`
        <?php }?>
        
    }
    <?php }?>
    $('.vasChange').append(costrows);
    $('#total').val({{$sum}});
}
function drawCosts2(){
    $('.vasChange').html('');
    var costrows='';
    <?php $sum=0; if($helpers['fees2']!=null){?>
    if('{{$helpers['fees2'][0]->fees_json}}'!='' &&'{{$helpers['fees2'][0]->fees_json}}'!=null){
        <?php $arr=json_decode($helpers['fees2'][0]->fees_json); 
        foreach($arr as $cost){
        ?>
        <?php 
            if($cost->feesValue=='')
                $cost->feesValue=0;
            $sum+=$cost->feesValue*1; 
            ?>
        costrows+=`<li style="font-size: 17px !important;color:#000000">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" name="feesText[]" class="form-control feesText"  value="{{ $cost->feesText}}">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="feesValue[]" class="form-control FessVals" value="{{ $cost->feesValue*1}}" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                    </div>
                </div>
            </li>`
        <?php }?>
        
    }
    <?php }?>
    $('.vasChange').append(costrows);
    $('#total').val({{$sum}});
}
</script>