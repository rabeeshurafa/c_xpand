<?php $readonly=true; ?>
@if(in_array(Auth()->user()->id,json_decode($config[0]->emp_to_update_json)))
    <?php $readonly=false; ?>
@endif
<div class="row">
@include('dashboard.includes.wasel_rec',['isrow'=>'false'])

    <div class="col-lg-4 col-md-12" >
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


<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticket->dept_id}}">
<input type="hidden" id="app_type"  name="app_type" value="3">
<input type="hidden" id="subscriber_id" name="subscriber_id" value="0">
<!--/////////////////////////////////for request constraint//////////////////////-->
<input type="hidden" id="buildingStatus"  name="buildingStatus" value="0">
<!--/////////////////////////////////////////////////////////////////////////////-->
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
    <div class="col-md-5">
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

<div class="row">
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
                <div class="input-group-append hidemob" onclick="ShowConstantModal(6016,'buildingType','نوع البناء')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
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
                <div class="input-group-append hidemob" onclick="ShowConstantModal(6084,'engOffice','مكتب المساحة')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md attachs-section"
        style="margin-left: 25px !important; margin-right: 25px !important;">
        <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
        <span class="attach-header">{{ 'تم استلام المرفقات التالية' }}
            <span id="attach-required">{{ '*' }}</span>
        </span>
    </div>
</div>

            <?php $total=0; 
                    $arr=json_decode($ticket->attatchName);
                    $arr1=json_decode($ticket->attachReceive);
                    $j=0;
                    $arr=is_array($arr)?$arr:array();
                    $arr1=is_array($arr1)?$arr1:array();
                    
                    // print_r($arr1);
                    ?>
                
                     <?php 
                    if(sizeof($arr)>0){?>
                        @for($i = 0 ; $i< sizeof($arr) ; $i++)
                        
                        <div class="row" style="margin-bottom: 7px;">
                            <div class="col-md-1 attdocmob1" style="margin-right:15px;padding-left: 0px;text-align: center;">
                                <input type="checkbox"  <?php if( $j < sizeof($arr1) ) if( $arr1[$j] == $i ){ echo 'checked'; $j++; } ?> {{ $readonly?"disabled":"" }} value="{{$i}}" name="attachReceive[]" class="condition">
                            </div>
                            <div class="col-md-10 w-80mob" style="text-align: center!important;padding-right:6px;padding-left:0;" >
                                <input class="form-control" id="plusRequieredAttach" {{ $readonly?"readonly":"" }} type="text" name="attatchName[]"value="{{$arr[$i]}}"/>
                            </div>
                            <div>
                            </div>
                            <hr>
                        </div> 
                        @endfor
                    <?php } ?>



<script>

 function CopyRec(){
        //console.log($("#myonoffswitchcol1").prop("checked")==true);return;
        row='<tr>'
            +'<td>'
            +$("#NameAR").val()
            +'		<input type="hidden" name="NameARList[]" value="'+$("#NameAR").val()+'" >'
            +'</td>'
            +'<td>'
            +'	'+$("#NNationalID").val()
            +'		<input type="hidden" name="NationalIDList[]" value="'+$("#NNationalID").val()+'" >'
            +'</td>'
            +'<td>'
            +'	'+$("#NMobileNo1").val()
            +'		<input type="hidden" name="MobileNo1List[]" value="'+$("#NMobileNo1").val()+'" >'
            +'		<input type="hidden" name="NeighborIDList[]" value="'+$("#NeighborID").val()+'" >'
            +'</td>'
            +'<td>'
            +'	'+$("#s_side").val()
            +'		<input type="hidden" name="s_sideList[]" value="'+$("#s_side").val()+'" >'
            +'</td>';
        row+='	<td>'
            +'	<div class="input-group-append" style="margin-left: 0px !important" onclick="$(this).parent().parent().remove()">'
            +'	<span class="input-group-text input-group-text2" style="margin-left: 0;" >'
            +'	<i class="fa fa-trash" id="plusElement2"></i>'
            +'	</span>'
            +'	</div>'
            +'	</td>'
            +'</tr>';
        $("#subTask").append(row)
        // i++
        $("#NameAR").val('');
        $("#NNationalID").val('');
        $("#NMobileNo1").val('');
        $("#NameAR").focus();
    }
    
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


