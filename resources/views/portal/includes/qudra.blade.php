<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="lastRec" id="lastRec" value="4">
        <div class="form-group" style="margin-bottom: 0rem!important;">
            <div class="input-group" style="width:100%!important;">
                <div class="input-group-prepend">
                <label class="form-label " style="color: #ff9149; font-weight:bold">القدرة</label>
                </div>
                <div class="col-sm-12 col-md-3">
                    <input type="radio" name="phase[]" checked="" id="radio-1" class="jui-radio-buttons" value="1" onclick="">
                   
                    <label for="radio-1">1 فاز</label>
                    <input type="radio" name="phase[]" id="radio-2" class="jui-radio-buttons" value="2" onclick="">
                 <label for="radio-2">3 فاز</label></div>
                <div class="col-sm-12 col-md-3" 
                @if($type != 'elecSubscription')
                style="visibility: hidden;"
                @endif
                >
                    <div class="float-left">
                        <input type="number" class="form-control numFeild" style="width:60px;" name="inAmper" id="inAmper" value="32" placeholder="30 أمبير">
                    </div> &nbsp;
                    <label for="radio-1"> &nbsp; أمبير</label>
                </div>
    <div class="col-md-5 subs_padd45" 
    @if($type == 'elecSubscription')
    style="padding-right: 43px;"
    @else
    style="padding-right: 43px; display: none;"
    @endif
    >
        <div class="form-group">
            <div class="input-group" style="width: 98% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      نوع الاشتراك
                    </span>
                </div>
                    <select id="subscriptionType" name="subscriptionType"
                        class="form-control subscriptionType">
                        <option value="">اختر</option>
                        @foreach ($subsList as $subs)
                        <option value="{{$subs->id}}">{{$subs->name}}</option>
                        @endforeach
                    </select>
                <div class="input-group-append" onclick="ShowConstantModal(6032,'subscriptionType',' اشتراك كهرباء')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    


</div>