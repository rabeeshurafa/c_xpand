<div class="row" style="position: relative;">
    <div class="col-md-7">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'مقدم الطلب' }}
                    </span>
                </div>
                <input type="text" id="subscriber_name1" 
                    class="form-control numFeild" placeholder="{{ 'مقدم الطلب' }}"
                    name="subscriber_name1">
                <input type="hidden" id="subscriber_id1" name="subscriber_id1" value="0">
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
                <input type="text" id="MobileNo1" maxlength="10" name="MobileNo1"
                    class="form-control noleft numFeild" placeholder="0590000000"
                    aria-describedby="basic-addon1"
                    onblur="$('#username').val($(this).val())">
            </div>
        </div>
    </div>
</div>