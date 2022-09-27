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
<input type="hidden" id="app_type"  name="app_type" value="4">

{{--
<pre class="row">
    
    {{ $ticket}}
</pre>
--}}
    <script>
    $('.ticket_name').html('{{$helpers['ticket_name']->name}}')
    </script>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'نوع الطلب' }}
                    </span>
                </div>
                <select id="task_type" {{ $readonly?"readonly":"" }}  name="task_type" type="text"
                    class="form-control valid ticket_type" style="" aria-invalid="false">
                    <option value=""> {{ 'نوع الطلب' }} </option>
                    @foreach($helpers['ticketTypeList'] as $ticketType)
                    <option value="{{ $ticketType->id }}" {{ $ticket->task_type==$ticketType->id?'selected':"" }} >{{ $ticketType->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append hidemob"onclick="ShowConstantModal(6029,'ticket_type','نوع البناء')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'وصف الطلب' }}
                    </span>
                </div>
                <textarea {{ $readonly?"readonly":"" }} type="text" id="malDesc" class="form-control"
                    placeholder="وصف الطلب" name="malDesc"
                    style="height: 35px;">{{ $ticket->malDesc }}</textarea>

            </div>
        </div>
    </div>
</div>

<input type="hidden" name="subscriptionID" id="subscriptionID">
                                    
<div class="row" style="position: relative;">
    <div class="col-md-7">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'مقدم الطلب' }}
                    </span>
                </div>
                <input type="text" id="subscriber_name" 
                    class="form-control numFeild" readonly name="subscriber_name" value="{{ $ticket->customer_name }}">
                <input type="hidden" id="subscriber_id" name="subscriber_id" value="{{ $ticket->customer_id }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="input-group" style="width: 97% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                        <img id="mobImg" src="https://db.expand.ps/images/jawwal35.png">
                    </span>
                </div>
                <input type="text" {{ $readonly?"readonly":"" }} id="MobileNo" maxlength="10" name="MobileNo"
                    class="form-control noleft numFeild" value="{{ $ticket->customer_mobile }}"
                    onblur="$('#username').val($(this).val())">
            </div>
        </div>
    </div>
</div>

@if($ticketInfo->show_nationalID == 1)
<div calss="row" style="position: relative; ">
    <div class="col-md-7" style="padding-right: 0px;">
        <div class="form-group paddmob">
            <div class="input-group subscribermob">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم الهوية' }}
                    </span>
                </div>
                <input type="text" id="national_id" 
                    class="form-control numFeild" placeholder="{{ 'رقم الهوية' }}"
                    
                    value="{{ $ticket->national_id }}"
                    {{ $readonly?"readonly":"" }}
                    
                    name="national_id">
                
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
    
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    المنطقة
                    </span>
                </div>
                <select id="AreaID" {{ $readonly?"readonly":"" }} name="AreaID" type="text" style="height: 36px !important" class="form-control">
                    
                    @foreach($helpers['region'] as $sub)
                    <option value="{{ $sub->id }}" {{ $ticket->region==$sub->id?'selected':"" }}>{{ $sub->name }}</option>
                    @endforeach
                </select>
    
            </div>
        </div>
    </div>



    <div class="col-md-7" style="padding-left: 22px">
        <div class="form-group">
            <div class="input-group" style="width:100% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'العنوان بالتفصيل' }}
                    </span>
                </div>
                <textarea type="text" {{ $readonly?"readonly":"" }} id="Address" class="form-control"
                 value="" name="Address" style="height: 35px;">{{ $ticket->address }}</textarea>

            </div>
        </div>
    </div>
    <div class="col-md-1 hidemob" style="padding-right: 18px;" >
        <a id="customer_location" href="https://www.google.com/maps/place/%D8%A8%D9%8A%D8%AA%D8%A7+%D8%A7%D9%84%D9%81%D9%88%D9%82%D8%A7%E2%80%AD/@32.1413383,35.2890394,14z/data=!3m1!4b1!4m5!3m4!1s0x151cde8e09aea509:0x5f1f34e632ceeef1!8m2!3d32.14134!4d35.286399" target="_blank">
            <img src="https://db.expand.ps/images/google35.png" style="    margin-left: -5px;;width:32px;height:32px;border-radius: 5px;"></a>
    </div>
</div>
