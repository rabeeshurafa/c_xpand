<div class="row" style="position: relative;">
    <div class="col-md-7">
        <div class="form-group paddmob">
            <div class="input-group subscribermob">
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
    <div class="col-md-4 padd0left">
        <div class="form-group paddmob">
            <div class="input-group ">
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
                <input type="text" id="national_id" maxlength="9" minlength="9"
                    class="form-control numFeild" placeholder="{{ 'رقم الهوية' }}"
                    
                    value="{{ $ticket->national_id }}"
                    {{ $readonly?"readonly":"" }}
                    
                    name="national_id">
                
            </div>
        </div>
    </div>
</div>
@endif