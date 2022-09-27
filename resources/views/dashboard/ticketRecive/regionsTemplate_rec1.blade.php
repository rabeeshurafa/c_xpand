<div class="row">

    <div class="col-md-4 padd0left">
        <div class="form-group paddmob">
    
            <div class="input-group width100">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    المنطقة
                    </span>
                </div>
                <select id="AreaID1" {{ $readonly?"readonly":"" }} name="AreaID1" type="text" style="height: 36px !important" class="form-control">
                    
                    @foreach($helpers['region'] as $sub)
                    <option value="{{ $sub->id }}" {{ $ticket->region==$sub->id?'selected':"" }}>{{ $sub->name }}</option>
                    @endforeach
                </select>
    
            </div>
        </div>
    </div>

    <div class="col-md-7 des-p-l22">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'العنوان بالتفصيل' }}
                    </span>
                </div>
                <textarea type="text" {{ $readonly?"readonly":"" }} id="Address1" class="form-control"
                 value="" name="Address1" style="height: 35px;">{{ $ticket->address1 }}</textarea>

            </div>
        </div>
    </div>
    <div class="col-md-1 hidemob" style="padding-right: 8px;" >
        <a id="customer_location" href="https://www.google.com/maps/place/%D8%A8%D9%8A%D8%AA%D8%A7+%D8%A7%D9%84%D9%81%D9%88%D9%82%D8%A7%E2%80%AD/@32.1413383,35.2890394,14z/data=!3m1!4b1!4m5!3m4!1s0x151cde8e09aea509:0x5f1f34e632ceeef1!8m2!3d32.14134!4d35.286399" target="_blank">
            <img src="https://db.expand.ps/images/google35.png" style="    margin-left: -5px;;width:32px;height:32px;border-radius: 5px;"></a>
    </div>
</div>
