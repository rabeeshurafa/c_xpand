<?php $readonly=true; ?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif

@include('dashboard.includes.wasel_rec')

<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
<input type="hidden" id="app_type"  name="app_type" value="3">


<input type="hidden" name="subscriptionID" id="subscriptionID">

@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')
<div class="row">
                                        
    <div class="col-md-6" >
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
    <div class="col-md-5 piceDiv">
        <div class="form-group paddmob">
            <div class="input-group" >
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



