<div class="row" style="position: relative;">
    <div class="col-md-7">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        @if(isset($name_subs))
                            {{$name_subs}}
                        @else
                        {{ 'مقدم الطلب' }}
                        @endif
                    </span>
                </div>
                <input type="text" id="subscriber_name1" 
                    class="form-control numFeild" readonly name="subscriber_name1" value="{{ $ticket->customer_name1 }}">
                <input type="hidden" id="subscriber_id1" name="subscriber_id1" value="{{ $ticket->customer_id1 }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group paddmob">
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                        <img id="mobImg" src="https://db.expand.ps/images/jawwal35.png">
                    </span>
                </div>
                <input type="text" {{ $readonly?"readonly":"" }} id="MobileNo1" maxlength="10" name="MobileNo1"
                    class="form-control noleft numFeild" value="{{ $ticket->customer_mobile1 }}"
                    onblur="$('#username').val($(this).val())">
            </div>
        </div>
    </div>
</div>