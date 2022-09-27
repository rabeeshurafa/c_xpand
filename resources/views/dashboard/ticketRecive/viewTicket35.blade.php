<?php $readonly=true; ?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif

<style>
    /*.padd0left{*/
    /*    padding-left:0px !important;*/
    /*}*/
    /*.des-p-l22{*/
    /*    padding-left:0px !important;*/
    /*}*/
    /*.width95{*/
    /*    width:95% !important;*/
    /*}*/
    /*.width100{*/
    /*    width:100% !important;*/
    /*}*/
</style>

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
<input type="hidden" id="app_type"  name="app_type" value="{{$ticket->app_type}}">
<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticket->dept_id}}">
@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="form-group paddmob">
    
            <div class="input-group licNoGroup" id="licGroup">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    رقم الرخصة
                    </span>
                </div>
                <select onchange="fillData($(this).val())" {{ $readonly?"readonly":"" }}  class="form-control" name="licNo" id="licNo">
                    <option value="0">-- اختر --</option>
                    @foreach($helpers['licenses'] as $license)
                    <option value="{{ $license->id }}" {{ $ticket->licNo==$license->id?'selected':"" }}> {{ $license->licNo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم الحوض' }}
                    </span>
                </div>
                <input class="form-control" type="text" id="hodNo" name="hodNo"
                    class="form-control noleft" placeholder="رقم الحوض"
                    aria-describedby="basic-addon1" value="{{ $ticket->hodNo }}"  {{ $readonly?"readonly":"" }}>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 " >
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم القطعة' }}
                    </span>
                </div>
                <input class="form-control" type="text" id="pieceNo" name="pieceNo"
                    class="form-control noleft" placeholder="رقم القطعة"
                    aria-describedby="basic-addon1" value="{{ $ticket->pieceNo }}"  {{ $readonly?"readonly":"" }}>
            </div>
        </div>
    </div>
</div>

 <div class="row">
    <div class="col-md attachs-section">
        <img src="https://db.expand.ps/images/personal-information.png" width="40" height="40">
        <span class="attach-header">{{ 'المالك الجديد' }}</span>
    </div>
</div>
@include('dashboard.ticketRecive.subscriber_rec1')
@include('dashboard.ticketRecive.regionsTemplate_rec1')

<script>
    function fillData($id)

    {

        let license_id = $id;
    
        $.ajax({
    
        type: 'get', // the method (could be GET btw)
    
        url: "{{route('license_byId')}}",
    
    
    
            data: {
    
                license_id: license_id,
    
            },
    
            success:function(response){
    
                $("#hodNo").val('');
                $("#pieceNo").val('');
    
                $("#hodNo").val((response.info.hodNo??''));
                $("#pieceNo").val((response.info.peiceNo??''));
    
            },
    
        });

    }
</script>