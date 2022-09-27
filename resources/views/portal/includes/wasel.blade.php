@if($ticketInfo->show_receipt == 1)
@if(isset($isrow))
@else
<div class="row hidemob">
@endif    
    <div class="col-lg-3 col-md-12">
        <div class="form-group">

            <div class="input-group" >

                <div class="input-group-prepend">

                  <span class="input-group-text " id="basic-addon1">

                    رقم الوصل

                  </span>

                </div>

                <input type="text" id="ReciptNo" {{ $ticketInfo->receipt_is_need==1?'required':''}} 
                @if($ticketInfo->receipt_is_need==1)
                    oninvalid="this.setCustomValidity(' يرجى ادخال رقم الوصل ')"
                    oninput="this.setCustomValidity('')" 
                @endif
                name="ReciptNo" class="form-control" placeholder="00000" aria-describedby="basic-addon1">
                
            </div>

        </div>

    </div>

    <div class="
    @if(isset($isrow))
    col-lg-4
    @else
    col-lg-5
    @endif
    col-md-12" style="padding-right: 0px;">

        <div class="form-group">

            <div class="input-group" style="width: 168px  !important;">

                <div class="input-group-prepend">

                  <span class="input-group-text " id="basic-addon1" style="height: 33px !important;">

                     المبلغ

                  </span>

                </div>

                <input type="text"  {{ $ticketInfo->receipt_is_need==1?'required':''}} 
                @if($ticketInfo->receipt_is_need==1)
                    oninvalid="this.setCustomValidity(' يرجى ادخال المبلغ ')"
                    oninput="this.setCustomValidity('')" 
                @endif
                id="AmountInNIS" name="AmountInNIS" class="form-control numFeild" placeholder="000" aria-describedby="basic-addon1" style="height: 33px !important;">

                <select id="CurrencyID" name="CurrencyID" type="text" class="form-control valid" style="height: 33px !important;" aria-invalid="false">

                    <option value="26" selected=""> شيكل </option>

                    <option value="28"> دينار </option>

                    <option value="27"> دولار </option>

                    <option value="31"> يورو </option>

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
@if(isset($isrow))
@else
</div>
@endif

@endif