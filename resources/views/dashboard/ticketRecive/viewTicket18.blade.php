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

    <div class="col-lg-6 col-md-12">
        <div class="form-group paddmob">
            <div class="input-group" style="">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'حالة البناء' }}
                    </span>
                </div>
                <select {{ $readonly?"readonly":"" }} id="buildingStatus" name="buildingStatus" type="text"
                    class="form-control valid buildingStatus" style="height: 38px !important;"
                    aria-invalid="false">
                    @foreach($helpers['buildingStatusList'] as $buildingStatus)
                    <option value="{{ $buildingStatus->id }}" {{ $ticket->buildingStatus==$buildingStatus->id?'selected':"" }} >{{ $buildingStatus->name }}</option>
                    @endforeach

                </select>
                <div class="input-group-append hidemob"onclick="ShowConstantModal(6014,'buildingStatus','حالة البناء')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="form-group paddmob">
            <div class="input-group"
                style="height: 38px !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'رقم ملف الترخيص' }}
                    </span>
                </div>
                <input {{ $readonly?"readonly":"" }} type="text" id="fileNo" required="" name="fileNo"
                    class="form-control" placeholder="00000"
                    aria-describedby="basic-addon1" value="{{ $ticket->fileNo }}">
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticketInfo->dept_id}}">
<input type="hidden" id="app_type"  name="app_type" value="3">


<input type="hidden" name="subscriptionID" id="subscriptionID">

@include('dashboard.includes.subscriber_rec')
@include('dashboard.includes.regionsTemplate_rec')

<div class="row">
                                        
    <div class="col-md-6" >
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم الحوض' }}
                    </span>
                </div>
                <input {{ $readonly?"readonly":"" }} class="form-control" type="text" id="hodNo" name="hodNo"
                    class="form-control noleft" placeholder="رقم الحوض"
                    aria-describedby="basic-addon1" value="{{ $ticket->hodNo }}">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'رقم القطعة' }}
                    </span>
                </div>
                <input {{ $readonly?"readonly":"" }} class="form-control" type="text" id="pieceNo" name="pieceNo"
                    class="form-control noleft" placeholder="رقم القطعة"
                    aria-describedby="basic-addon1" value="{{ $ticket->pieceNo }}">
            </div>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-6">
        <div class="form-group paddmob">
            <div class="input-group" style=" ">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'نوع البناء' }}
                    </span>
                </div>
                <select {{ $readonly?"readonly":"" }} id="buildingType" name="buildingType" type="text"
                    class="form-control valid buildingType" aria-invalid="false">
                    <option value="0" selected=""> {{ '-- نوع البناء --' }} </option>
                    @foreach($helpers['buildingTypeList'] as $buildingType)
                    <option value="{{ $buildingType->id }}" {{ $ticket->buildingType==$buildingType->id?'selected':"" }}>{{ $buildingType->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append hidemob"onclick="ShowConstantModal(6016,'buildingType','نوع البناء')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'مكتب المساحة' }}
                    </span>
                </div>
                <select {{ $readonly?"readonly":"" }} id="engOffice" name="engOffice" type="text"
                    class="form-control valid" aria-invalid="false">
                    <option value="0" selected=""> {{ 'اختر' }} </option>
                    @foreach($helpers['officeAreaList'] as $officeArea)
                    <option  value="{{ $officeArea->id }}" {{ $ticket->engOffice==$officeArea->id?'selected':"" }}>{{ $officeArea->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md attachs-section"
        style="margin-left: 25px !important; margin-right: 25px !important;">
        <span class="attach-header">{{ 'تم استلام المرفقات التالية' }}
            <span id="attach-required">{{ '*' }}</span>

        </span>

        <div class="col-md-6 hide" style="margin-top:10px">
            <div class="form-group">
                <div class="input-group">
                    <div class="col-sm-12 col-md-8">
                        <input
                            onchange="if($(this).prop('checked')){$('.afterM').show();$('.beforeM').hide();}"
                            type="radio" name="beforeMun[]" {{ $readonly?"disabled":"" }} {{ $ticket->beforeMun==1?'checked':"" }} id="radio-4"
                            class="jui-radio-buttons" value="1">
                        <label for="radio-4">{{ 'بعد البلدية' }} </label>
                        <input
                            onchange="if($(this).prop('checked')){$('.beforeM').show();$('.afterM').hide();}"
                            type="radio" name="beforeMun[]" {{ $ticket->beforeMun==2?'checked':"" }} {{ $readonly?"disabled":"" }} id="radio-3" class="jui-radio-buttons"
                            value="2">
                        <label for="radio-3">{{ 'قبل البلدية' }} </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row attachs-body " style="padding-right: 20px;">

    <div class="form-group col-12 mb-2 afterM {{ $ticket->beforeMun==2?'hide':"" }}">
        <h4 style="font-family: Helvetica,Arial, sans-serif !important; color: #1E9FF2;">
            {{"متطلبات إجبارية لقبول الطلب"}}
        </h4>

                <div id="requieredAttatch">
                    
                    <?php $total=0; 
                    $arr=json_decode($ticket->docs1);
                    $arr1=json_decode($ticket->attachReceive1);
                    $j=0;
                    $arr=is_array($arr)?$arr:array();
                    $arr1=is_array($arr1)?$arr1:array();
                    
                    // print_r($arr1);
                    ?>
                
                     <?php 
                    if(sizeof($arr)>0){?>
                        @for($i = 0 ; $i< sizeof($arr) ; $i++)
                        <div class="row" style="margin-bottom: 7px;">
                            <div class="col-md-1 attdocmob1" style="margin-right:0;padding-left: 0px;text-align: center;">
                                <input type="checkbox"  <?php if( $j < sizeof($arr1) ) if( $arr1[$j] == $i ){ echo 'checked'; $j++; } ?> {{ $readonly?"disabled":"" }} value="{{$i}}" name="attachReceive1[]" class="condition">
                            </div>
                            <div class="col-md-10 w-80mob" style="text-align: center!important;padding-right:6px;padding-left:0;" >
                                <input class="form-control docs1" id="plusRequieredAttach" {{ $readonly?"readonly":"" }} type="text" name="docs1[]" value="{{$arr[$i]}}"/>
                            </div>
                            <div>
                            </div>
                            <hr>
                        </div>
                        @endfor
                    <?php } ?>

                </div>
        <input type="hidden" value="8" name="attachReceive1N" id="attachReceive1N">
        <h4 style="font-family: Helvetica,Arial, sans-serif !important; color: #1E9FF2;">
            متطلبات أخرى
        </h4>
                <div id="unrequieredAttatch">
                    
                    <?php $total=0; 
                    $arr=json_decode($ticket->docs2);
                    $arr1=json_decode($ticket->attachReceive2);
                    $j=0;
                    $arr=is_array($arr)?$arr:array();
                    $arr1=is_array($arr1)?$arr1:array();
                    
                    // print_r($arr1);
                    ?>
                
                     <?php 
                    if(sizeof($arr)>0){?>
                        @for($i = 0 ; $i< sizeof($arr) ; $i++)
                        <div class="row" style="margin-bottom: 7px;">
                            <div class="col-md-1 attdocmob1" style="margin-right:0;padding-left: 0px;text-align: center;">
                                <input type="checkbox"  <?php if( $j < sizeof($arr1) ) if( $arr1[$j] == $i ){ echo 'checked'; $j++; } ?> {{ $readonly?"disabled":"" }} value="{{$i}}" name="attachReceive2[]" class="condition">
                            </div>
                            <div class="col-md-10 w-80mob" style="text-align: center!important;padding-right:6px;padding-left:0;" >
                                <input class="form-control docs2" id="plusUnrequieredAttach" {{ $readonly?"readonly":"" }} type="text" name="docs2[]" value="{{$arr[$i]}}"/>
                            </div>
                            <div>
                            </div>
                            <hr>
                        </div>
                        @endfor
                    <?php } ?>

                </div>

    </div>
    
    <input type="hidden" value="2" name="attachReceive2N" id="attachReceive2N">
    
    <div class="form-group col-12 mb-2 beforeM {{ $ticket->beforeMun==1?'hide':"" }}" >
        <h4 style="font-family: Helvetica,Arial, sans-serif !important; color: #1E9FF2;">
            {{"متطلبات إجبارية لقبول الطلب"}}
        </h4>

                <div id="requieredAttatch2">
                    
                    <?php $total=0; 
                    $arr=json_decode($ticket->docs3);
                    $arr1=json_decode($ticket->attachReceive3);
                    $j=0;
                    $arr=is_array($arr)?$arr:array();
                    $arr1=is_array($arr1)?$arr1:array();
                    
                    // print_r($arr1);
                    ?>
                
                     <?php 
                    if(sizeof($arr)>0){?>
                        @for($i = 0 ; $i< sizeof($arr) ; $i++)
                        <div class="row" style="margin-bottom: 7px;">
                            <div class="col-md-1 attdocmob1" style="margin-right:0;padding-left: 0px;text-align: center;">
                                <input type="checkbox"  <?php if( $j < sizeof($arr1) ) if( $arr1[$j] == $i ){ echo 'checked'; $j++; } ?> {{ $readonly?"disabled":"" }} value="{{$i}}" name="attachReceive3[]" class="condition">
                            </div>
                            <div class="col-md-10 w-80mob" style="text-align: center!important;padding-right:6px;padding-left:0;" >
                                <input class="form-control docs3" id="plusRequieredAttach2" {{ $readonly?"readonly":"" }} type="text" name="docs3[]" value="{{$arr[$i]}}"/>
                            </div>
                            <div>
                            </div>
                            <hr>
                        </div>
                        @endfor
                    <?php } ?>

                </div>
                
            <input type="hidden" value="5" name="attachReceive3N" id="attachReceive3N">
    </div>
</div>

<script>
    
    $(document).ready(function() {
        
        $("#requieredAttatch").on("blur", "#plusRequieredAttach",function() {
            console.log($(".docs1").last().val());
            if($(".docs1").last().val().length>0){
                lastC1=$("#attachReceive1N").val();
                    $("#requieredAttatch").append('' 
                    +'<tr>'
                    +    '<td class="col-md-1">'
                    +        '<input type="checkbox" value="'+lastC1+'" name="attachReceive1[]" class="condition">'
                    +    '</td>'
                    +    '<td class="col-md-10" id="plusRequieredAttach"  style="text-align: center!important;" >'
                    +        '<input class="form-control docs1"  type="text" name="docs1[]"  >'
                    +    '</td>'
                    +    '<td onclick="$(this).parent().remove()" >'
                    +        '<i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor:pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
                    +    '</td>'
                    +'</tr>'
                    );
                    $("#attachReceive1N").val(++lastC1);
            }
            
        });
    });
    $(document).ready(function() {
        $("#requieredAttatch2").on("blur", "#plusRequieredAttach2",function() {
            
            if($(".docs3").last().val().length>0){
            lastC3=$("#attachReceive3N").val();
            $("#requieredAttatch2").append('' 
            +'<tr>'
            +    '<td class="col-md-1">'
            +        '<input type="checkbox" value="'+lastC3+'" name="attachReceive3[]" class="condition2">'
            +    '</td>'
            +    '<td class="col-md-10" id="plusRequieredAttach2" style="text-align: center!important;" >'
            +        '<input class="form-control docs3"  type="text" name="docs3[]"  >'
            +    '</td>'
            +    '<td onclick="$(this).parent().remove()" >'
            +        '<i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor:pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
            +    '</td>'
            +'</tr>'
            );
            $("#attachReceive3N").val(++lastC3);
            }
        });
    });
    $(document).ready(function() {
        $("#unrequieredAttatch").on("blur", "#plusUnrequieredAttach",function() {
            if($(".docs2").last().val().length>0){
            lastC2=$("#attachReceive2N").val();
            $("#unrequieredAttatch").append('' 
            +'<tr>'
            +    '<td class="col-md-1">'
            +        '<input type="checkbox" value="'+lastC2+'" name="attachReceive2[]" class="condition">'
            +    '</td>'
            +    '<td class="col-md-10" id="plusUnrequieredAttach" style="text-align: center!important;" >'
            +        '<input class="form-control docs2"  type="text" name="docs2[]"  >'
            +    '</td>'
            +    '<td onclick="$(this).parent().remove()" >'
            +        '<i class="fa fa-trash" id="delete" style="padding-top:10px;position: relative;left: 3%;cursor:pointer;  color:#1E9FF2;font-size: 15pt; "></i>'
            +    '</td>'
            +'</tr>'
            );
            $("#attachReceive2N").val(++lastC2);
            }
        });
    });
    
</script>


