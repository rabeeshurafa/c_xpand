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
<input type="hidden" id="app_type"  name="app_type" value="5">


<input type="hidden" name="subscriptionID" id="subscriptionID">


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
                        {{ 'نوع الإجازة' }}
                    </span>
                </div>
                <select {{ $readonly?"disabled":"" }} class="form-control vac_type" name="vac_type" id="vac_type">
                    <option value="">{{ 'نوع الاجازة' }} </option>
                    @foreach($helpers['vacTypes'] as $vacType)
                        <option value="{{$vacType->id}}" {{ $ticket->vac_type==$vacType->id?'selected':"" }}>{{$vacType->name}} </option>
                    @endforeach
                </select>
                 <div class="input-group-append hideMob"
                    onclick="ShowConstantModal(6060,'vac_type','نوع المغادرة')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'تاريخ البدء' }}
                    </span>
                </div>
                <input type="text" id="start_date" onblur="calcDuration()"
                    {{ $readonly?"readonly":"" }}  value="{{ $ticket->start_date }}"
                    data-mask="00/00/0000" 
                    class="form-control pickadate-arrow singledate  picker__input picker__input--active"
                    placeholder="dd/mm/yyyy" name="start_date" maxlength="10">
            </div>
        </div>
    </div>
    <div class="col-md-4" >
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'تاريخ الإنتهاء' }}
                    </span>
                </div>
                <input type="text" onblur="calcDuration()" {{ $readonly?"readonly":"" }}  value="{{ $ticket->end_date }}"
                    id="end_date" data-mask="00/00/0000" 
                    class="form-control"
                    placeholder="dd/mm/yyyy" name="end_date" maxlength="10">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'عدد ايام الاجازة' }}
                    </span>
                </div>
                <input type="text" readonly {{ $readonly?"readonly":"" }}  value="{{ $ticket->vac_day }}"
                    id="vac_day" class="form-control"
                    placeholder="" name="vac_day" >
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="vac_day_no"  name="vac_day_no" value="{{ $ticket->vac_day_no }}">
<div class="row pl7mob" >
    <div class="col-lg-12 col-md-12">
        <div class="form-group paddmob">
            <table style="width:100%">
                <tbody>
                    <tr>
                        <th style="text-align: center;background-color: #0073AA;border: 1px solid #000000;color: #ffffff;">
                            {{ 'النوع' }}
                        </th>
                        <th style="text-align: center;background-color: #0073AA;border: 1px solid #000000;color: #ffffff;">
                            {{ 'رصيد' }}
                        </th>
                        <th style="text-align: center;background-color: #0073AA;border: 1px solid #000000;color: #ffffff;">
                            {{ 'مستنفذ' }}
                        </th>
                        <th style="text-align: center;background-color: #0073AA;border: 1px solid #000000;color: #ffffff;">
                            {{ 'متبقي' }}
                        </th>
                    </tr>
                    <?php $all=($helpers['allVac']->getData());$infoVac=$all->infoVac;?>
                    <tr>
                        <th style="text-align: center;background-color: #0073AA;border: 1px solid #000000;color: #ffffff;">
                            {{ 'سنوية' }}
                        </th>
                        
                        <td style="text-align: center;border: 1px solid #000000;" id="r_balance">{{$infoVac->balance}}</td>
                        <td style="text-align: center;border: 1px solid #000000;" id="r_spent">{{$infoVac->balance_done}}</td>
                        <td style="text-align: center;border: 1px solid #000000;" id="r_remain">{{$infoVac->restB}}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center;border: 1px solid #000000;color: #ffffff;">
                            {{ 'طارئة' }}
                        </th>
                        <td style="text-align: center;border: 1px solid #000000;" id="u_balance">{{$infoVac->emergency}}</td>
                        <td style="text-align: center;border: 1px solid #000000;" id="u_spent">{{$infoVac->emergency_done}}</td>
                        <td style="text-align: center;border: 1px solid #000000;" id="u_remain">{{$infoVac->restE}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('dashboard.ticketRecive.maldesc',['name_maldesc'=>'سبب الاجازة'])



<script>

calcDuration();

function calcDuration(){
        twoDatesArr= new Array();
        twoDatesArr[0]= $('#start_date').val();
        twoDatesArr[1]= $('#end_date').val();
        


        d1Arr=twoDatesArr[0].split('/')
        d2Arr=twoDatesArr[1].split('/')
        d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
        d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
        if(d1Date>d2Date){
            
                $(".alert-danger").removeClass("hide");
                    $(".alert-success").addClass('hide');
                    $("#errMsg").text('تاريخ النهاية اقل من البداية')
            
            return false
            ;
        }
        var diff = Math.abs(d2Date - d1Date);
        diffinyear=diff/(24*60*60*1000*30*12);
        diffinmonth=diff/(24*60*60*1000*30);
        diffinday=diff/(24*60*60*1000);
        month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
        day=Math.floor(diffinday)-(Math.floor(diffinmonth)*30)+1
        txt='';
        txt1='';
        strr='';
        if(Math.floor(diffinyear)>0)
            txt=Math.floor(diffinyear)+' سنة'

        if(Math.floor(month1)>0)
            txt1=Math.floor(month1)+' شهر, '
        if(txt.length>0) {
            strr = txt
            if(txt1.length>0)
                strr+=', '+txt1
            else
                strr+=', 0 شهر, '
        }
        else {
            if(txt1.length>0)
                strr+=txt1

        }
        $("#vac_day_no").val(Math.floor(day));
        $("#vac_day").val((strr+Math.floor(day)+' يوم'));
        //console.log(d2Date-d1Date);
        return true;
        console.log(diffinyear,diffinmonth,diffinday);
    }
</script>


