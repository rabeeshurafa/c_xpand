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
            <div class="input-group" >
                
                <div class="input-group-prepend posmob"> <!--posmob-->
                <label class="form-label " style="color: #ff9149; font-weight:bold">القدرة</label>
                </div>
                <div class="col-sm-3 poselecmob">
                    <input type="radio" {{ $readonly?"readonly":"" }} name="phase[]" {{ $ticket->phase==1?' class=hidemob jui-radio-buttons checked ':' class=hidemob jui-radio-buttons  ' }} id="radio-1"  value="1" onclick="">
                    <label {{ $ticket->phase==1?'':"class=hidemob" }} for="radio-1">1 فاز</label>
                    <input type="radio" {{ $readonly?"readonly":"" }} name="phase[]" {{ $ticket->phase==2?' class=hidemob jui-radio-buttons checked ':' class=hidemob jui-radio-buttons  ' }} id="radio-2"  value="2" onclick="">
                    <label {{ $ticket->phase==2?'':"class=hidemob" }} for="radio-2">3 فاز</label>
                 </div>
                <div class="col-sm-6 col-md-3"    style="padding-bottom: 15px;" >
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

<input type="hidden" name="subscriptionID" id="subscriptionID">
                <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticket->dept_id}}">
                <input type="hidden" id="app_type"  name="app_type" value="{{$ticket->app_type}}">

@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')


<div class="row">
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    عدد الأيام
                    </span>
                </div>
                <input type="number" {{ $readonly?"readonly":"" }} id="i_days" required class="form-control" value="{{ $ticket->i_days }}" name="i_days" onchange="" >

            </div>
        </div>
    </div>
</div>