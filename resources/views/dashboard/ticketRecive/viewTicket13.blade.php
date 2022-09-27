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

<!------------------------->
                        <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                        <input type="hidden" id="app_type"  name="app_type" value="{{$ticket->app_type}}">

@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')
@include('dashboard.ticketRecive.subscription')

<div class="row">

    <div class="col-md attachs-section">

        <i class="fas fa-charging-station"></i>

        <span class="attach-header">إعدادت رفع القدرة</span>

    </div>

</div>

<div class="row upVas">
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group licNoGroup" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    القدرة الحالية
                    </span>
                </div>
                <select id="CurrVas" {{ $readonly?"readonly":"" }} name="CurrVas" class="form-control valid" aria-invalid="false" onchange="changeVasTitle();">
                        <option value="42" {{ $ticket->CurrVas==42?'selected':'' }} >1 فاز</option>
                        <option value="43" {{ $ticket->CurrVas==43?'selected':'' }}>3 فاز</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group licNoGroup" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    الأمبيرات الحالية
                    </span>
                </div>
                <input type="number" id="CurrAmpere" {{ $readonly?"readonly":"" }} name="CurrAmpere" class="form-control numFeild" value="{{ $ticket->CurrAmpere }}" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group licNoGroup" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    الأمبيرات الجديدة
                    </span>
                </div>
                <input type="number" id="NewAmpere" {{ $readonly?"readonly":"" }} name="NewAmpere" class="form-control numFeild NewAmpere" value="{{ $ticket->NewAmpere }}" onblur="calcAmpereCost()" onchange="calcAmpereCost()">
            </div>
        </div>
    </div>
</div>

<!-------------------------->