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

@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')

<div class="row">
    <div class="col-md-4">

        <div class="form-group">

            <div class="input-group" style="width: 168px  !important;">

                <div class="input-group-prepend">

                  <span class="input-group-text " id="basic-addon1" style="height: 38px !important;">

                     المبلغ

                  </span>

                </div>

                <input type="text" value="{{ $ticket->money }}" id="money" {{ $readonly?"readonly":"" }}
                    class="form-control alphaFeild"
                     name="money" autocomplete="off" placeholder="00000">

                <select id="CurrencyID1" {{ $readonly?"readonly":"" }} name="CurrencyID1" type="text" class="form-control valid" style="margin-left: 15px;height: 38px !important;" aria-invalid="false">

                    <option value="26" {{ $ticket->currency1==26?'selected':"" }}> شيكل </option>

                    <option value="28" {{ $ticket->currency1==28?'selected':"" }}> دينار </option>

                    <option value="27" {{ $ticket->currency1==27?'selected':"" }}> دولار </option>

                    <option value="31" {{ $ticket->currency1==31?'selected':"" }}> يورو </option>

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
    <div class="col-md-8" >
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'المبلغ بالحروف' }}
                    </span>
                </div>
                <input type="text" {{ $readonly?"readonly":"" }} value="{{ $ticket->money_text }}" id="moneyText" class="form-control"  name="moneyText">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'وذلك عن' }}
                    </span>
                </div>
                <textarea type="text" {{ $readonly?"readonly":"" }} id="payfor" class="form-control"
                    placeholder="" name="payfor" style="height: 70px;"> {{ $ticket->payfor }} </textarea>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/Tafqeet.js')}}"></script>

<script>
$(document).ready(function(){
        $("#money").on('change',function(){
        let money = $("#money").val()
        $("#moneyText").val(tafqeet (+money)+' شيكل')

        });
    })

    
</script>


