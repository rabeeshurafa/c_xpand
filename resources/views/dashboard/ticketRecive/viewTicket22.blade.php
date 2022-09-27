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
<input type="hidden" id="app_type"  name="app_type" value="3">


<input type="hidden" name="subscriptionID" id="subscriptionID">

@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')

<div class="row ">
    
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'اسم الموقع' }}
                    </span>
                </div>
                <input class="form-control" {{ $readonly?"readonly":"" }}  type="text" id="siteName" name="siteName"
                class="form-control noleft" placeholder="اسم الموقع"
                aria-describedby="basic-addon1" value="{{ $ticket->siteName }}">


            </div>
        </div>
    </div>
                                        
    <div class="col-md-4" >
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم الحوض' }}
                    </span>
                </div>
                <input {{ $readonly?"readonly":"" }} class="form-control" type="text" id="hodNo" name="hodNo"
                    class="form-control noleft" placeholder="رقم الحوض"
                    aria-describedby="basic-addon1" value="{{ $ticket->hodNo }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم القطعة' }}
                    </span>
                </div>
                <input {{ $readonly?"readonly":"" }} class="form-control" type="text" id="pieceNo" name="pieceNo"
                    class="form-control noleft" placeholder="رقم القطعة"
                    aria-describedby="basic-addon1" value="{{ $ticket->pieceNo }}">
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group paddmob">
            <div class="input-group" style=" ">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'نوع البناء' }}
                    </span>
                </div>
                <select {{ $readonly?"readonly":"" }} id="buildingType" name="buildingType" type="text"
                    class="form-control valid buildingType" aria-invalid="false">
                    <option value="0" selected=""> {{ '-- نوع البناء --' }} </option>
                    @foreach($helpers['buildingTypeList'] as $buildingType)
                    <option value="{{ $buildingType->id }}" {{ $ticket->buildingType==$buildingType->id?'selected':"" }}>{{ $buildingType->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append hidemob"onclick="ShowConstantModal(6016,'buildingType','نوع البناء')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group paddmob ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'مكتب المساحة' }}
                    </span>
                </div>
                <select {{ $readonly?"readonly":"" }} id="engOffice" name="engOffice" type="text"
                    class="form-control valid" aria-invalid="false">
                    <option value="0" selected=""> {{ 'اختر' }} </option>
                    @foreach($helpers['officeAreaList'] as $officeArea)
                    <option  value="{{ $officeArea->id }}" {{ $ticket->engOffice==$officeArea->id?'selected':"" }}>{{ $officeArea->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>

</div>
