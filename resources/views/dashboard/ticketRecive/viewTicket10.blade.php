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
<div class="row">
@if($ticket->app_type==1)
        <input type="hidden" name="lastRec" id="lastRec" value="4">

    <div class="input-group-prepend posmob"> <!--posmob-->
    <label class="form-label " style="color: #ff9149; font-weight:bold">القدرة</label>
    </div>
    <div class="col-sm-3 poselecmob">
        <input type="radio" {{ $readonly?"readonly":"" }} name="phase[]" {{ $ticket->phase==1?' class=hidemob jui-radio-buttons checked ':' class=hidemob jui-radio-buttons  ' }} id="radio-1"  value="1" onclick="">
        <label {{ $ticket->phase==1?'':"class=hidemob" }} for="radio-1">1 فاز</label>
        <input type="radio" {{ $readonly?"readonly":"" }} name="phase[]" {{ $ticket->phase==2?' class=hidemob jui-radio-buttons checked ':' class=hidemob jui-radio-buttons  ' }} id="radio-2"  value="2" onclick="">
        <label {{ $ticket->phase==2?'':"class=hidemob" }} for="radio-2">3 فاز</label>
     </div>
    <div class="col-sm-8">
        <div class="form-group">
            <div class="input-group">
                <label class="form-label" style="color: #ff9149; font-weight:bold">
                    {{ 'طبيعة النقل' }}
                </label>
                <div class=" col-md-10 w-76-mob">
                    <input type="radio" name="pos" {{ $ticket->pos==1?'class=hidemob checked':"class=hidemob" }} checked="" id="pos-1"
                         value="1" onclick="">
                    <label {{ $ticket->pos==1?'':"class=hidemob" }} for="radio-1">{{ 'ضمن البناء' }}</label>
                    <input type="radio" name="pos" {{ $ticket->pos==2?'class=hidemob checked':"class=hidemob" }} id="pos-2"
                        value="2" onclick="">
                    <label {{ $ticket->pos==2?'':"class=hidemob" }}  for="radio-2">{{ 'خارج البناء' }}</label>
                </div>
            </div>
        </div>
    </div>
@endif
@if($ticket->app_type==2)
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group">
                <label class="form-label " style="color: #ff9149; font-weight:bold">
                    {{ 'طبيعة النقل' }}
                </label>
                <div class="col-sm-7 col-md-5 w-76-mob">
                    <input type="radio" name="pos" {{ $ticket->pos==1?'checked':"" }} checked="" id="pos-1"
                        class="jui-radio-buttons" value="1" onclick="">
                    <label for="radio-1">{{ 'ضمن البناء' }}</label>
                    <input type="radio" name="pos" {{ $ticket->pos==2?'checked':"" }} id="pos-2"
                        class="jui-radio-buttons" value="2" onclick="">
                    <label for="radio-2">{{ 'خارج البناء' }}</label>
                </div>
            </div>
        </div>
    </div>
@endif
</div>
                        <input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
                        <input type="hidden" id="app_type"  name="app_type" value="{{$ticket->app_type}}">
@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')
@include('dashboard.ticketRecive.subscription')

 <div class="row">
    <div class="col-md attachs-section">
        <img class="hidemob" src="https://db.expand.ps/images/google35.png" width="40" height="40">
        <span class="attach-header">{{ 'المكان الجديد' }}</span>
    </div>
</div>


    <div class="row">
        <div class="col-sm-12 des-p-l22">
            <div class="form-group paddmob">
                <div class="input-group licNoGroup" id="licGroup">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        {{"رقم الرخصة"}}
                        </span>
                    </div>
                    <input type="text" id="licNo" name="licNo" class="form-control valid" {{ $readonly?"readonly":"" }} value="{{($ticket->license->licNo??'')}}" placeholder="" autocomplete="off">
                    
                </div>
            </div>
        </div>
    </div>

@include('dashboard.ticketRecive.regionsTemplate_rec1')
