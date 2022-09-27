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


<input type="hidden" id="dept_id"  name="dept_id" value="{{$ticket->dept_id}}">
<input type="hidden" id="app_type"  name="app_type" value="3">
<input type="hidden" id="subscriber_id" name="subscriber_id" value="{{ $ticket->customer_id }}">

<!--/////////////////////////////////for request constraint//////////////////////-->
<input type="hidden" id="AreaID" name="AreaID" value="0">
<input type="hidden" id="subscriptionType" name="subscriptionType" value="0">
<!--/////////////////////////////////////////////////////////////////////////////-->

<input type="hidden" name="subscriptionID" id="subscriptionID">

<div class="row" style="position: relative;">
    <div class="col-md-8" style="padding-left: 0px;">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'اسم المالك' }}
                    </span>
                </div>
                <input type="text" readonly value="{{ $ticket->customer_name }}" id="subscriber_name" 
                    class="form-control numFeild ac10" placeholder="{{ 'اسم المالك' }}"
                    name="subscriber_name">
            </div>
        </div>
    </div>
    
    <div class="col-md-4" style="padding-left: 48px;">
        <div class="form-group">
            <div class="input-group" style="width: 97% !important; ">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                        <img id="mobImg1" src="https://db.expand.ps/images/jawwal35.png">
                    </span>
                </div>
                <input type="text" value="{{ $ticket->customer_mobile }}" id="MobileNo" {{ $readonly?"readonly":"" }} maxlength="10" name="MobileNo"
                    class="form-control noleft numFeild" placeholder="0590000000"
                    aria-describedby="basic-addon1"
                    onblur="$('#username').val($(this).val())">
            </div>
        </div>
    </div>
</div>
{{--
<div class="row">
    <div class="col-md-12">

        <div class="form-group">
            <div class="input-group">
                <label class="form-label"
                    style="color: #ff9149;"><b>{{ 'مقدم الطلب' }}</b>:</label>
                <div class="col-sm-12 col-md-8">
                    <label for="radio-3">{{"المالك"}} </label>
                    <input
                        type="radio" name="Applicanttype[]" checked="" id="radio-3"
                        class="jui-radio-buttons" value="1"
                        onclick="$('.Acting').hide();">
                    <label for="radio-4">{{"ممثل عنه"}} </label>
                    <input
                        type="radio" name="Applicanttype[]" id="radio-4"
                        class="jui-radio-buttons" value="2"
                        onclick="$('.Acting').show();">
                </div>
            </div>
        </div>
    </div>
</div>
--}}

<div class="row">
    <div class="col-md-12">

        <div class="form-group">
            <div class="input-group">
                <label class="form-label" style="color: #ff9149; font-weight:bold">
                    {{ 'مقدم الطلب' }}
                </label>
                <div class="col-sm-12 col-md-8">
                    <input {{ $readonly?"readonly":"" }}
                        onchange="if($(this).prop('checked'))$('.attach-required').hide()"
                        type="radio" name="Ownership[]" {{ $ticket->Applicanttype==1?"checked":"" }} id="radio-3"
                        class="jui-radio-buttons" value="1"
                        onclick="$('.ownertypes').hide();$('.owner').show();">
                    <label for="radio-3">{{ 'المالك' }} </label>
                    <input {{ $readonly?"readonly":"" }}
                        onchange="if($(this).prop('checked'))$('.attach-required').show()"
                        type="radio" name="Ownership[]" id="radio-4"
                        class="jui-radio-buttons" value="2" {{ $ticket->Applicanttype==2?"checked":"" }}
                        onclick="$('.ownertypes').hide();$('.rent').show();">
                    <label for="radio-4">{{ 'ممثل عنه' }} </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row {{ $ticket->Applicanttype==1?"hide":"" }}" style="position: relative;">
    <div class="col-md-7">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{ 'مقدم الطلب' }}
                    </span>
                </div>
                <input type="text" id="subscriber_name" 
                    class="form-control numFeild" readonly name="subscriber_name1" value="{{ $ticket->customer_name1 }}">
                <input type="hidden" id="subscriber_id1" name="subscriber_id1" value="{{ $ticket->customer_id1 }}">
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
                <input type="text" {{ $readonly?"readonly":"" }} id="MobileNo1" maxlength="10" name="MobileNo1"
                    class="form-control noleft numFeild" value="{{ $ticket->customer_mobile1 }}"
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
                    @if(isset($ticket))
                    value="{{ $ticket->national_id }}"
                    {{ $readonly?"readonly":"" }}
                    @endif
                    name="national_id">
                
            </div>
        </div>
    </div>
</div>
@endif


<div class="row" >
    <div class="col-md attachs-section" style="margin-left:25px; margin-right: 25px ">
        <img src="https://db.expand.ps/images/neighbor.png" width="40" height="40">
        <span class="attach-header">{{"بيانات الجيران"}}</span>
    </div>
</div>

<div class="row" style="padding-right: 25px; padding-left: 25px">
    <div class="col-md-12">
        <div class="form-group">
            <table style="width:100%; margin-top: -10px; " class="detailsTB table">
                <tbody><tr>
                    <th scope="col" width="200px">{{"الاسم"}}</th>
                    <th scope="col" width="120px">{{"رقم الهوية"}}</th>
                    <th scope="col" width="120px">{{"الجوال"}}</th>
                    <th scope="col">{{"الإتجاه"}}</th>
                    <th scope="col"></th>
                </tr>
                
                <tr>
                    <td>
                        <input type="text" id="NameAR" name="NameARList[]"  {{ $readonly?"readonly":"" }} class="form-control alphaFeild cac ui-autocomplete-input" placeholder="الاسم" autocomplete="off">
                        <input type="hidden" name="NeighborID" id="NeighborIDList[]">
                    </td>
                    <td>
                        <input type="text" id="NNationalID" name="NationalIDList[]" {{ $readonly?"readonly":"" }} maxlength="9" minlength="9" class="form-control numFeild" placeholder="ID No.">
                    </td>
                    <td>
                        <input type="text" id="NMobileNo1" name="MobileNo1List[]"  {{ $readonly?"readonly":"" }} maxlength="10" minlength="10" class="form-control numFeild" placeholder="0590000000" aria-describedby="basic-addon1">
                     </td>
                    <td>
                        <input type="text" id="s_side" name="s_sideList[]" {{ $readonly?"readonly":"" }} class="form-control " placeholder="" aria-describedby="basic-addon1" >
                     </td>
                    <td>
                        <div class="input-group-append {{ $readonly?"hide":"" }}" style="margin-left: 0px !important" onclick="CopyRec()">
                            <span class="input-group-text input-group-text2" style="margin-left: 0;">
                                <i class="fa fa-plus-circle" id="plusElement2"></i>
                            </span>
                        </div>
                    </td>
                </tr>
                </tbody>
                
                <?php $total=0; 
                    $arr1=json_decode($ticket->NameARList);
                    $arr2=json_decode($ticket->NationalIDList);
                    $arr3=json_decode($ticket->MobileNo1List);
                    $arr4=json_decode($ticket->s_sideList);
                    $j=0;
                    $arr1=is_array($arr1)?$arr1:array();
                    $arr2=is_array($arr2)?$arr2:array();
                    $arr3=is_array($arr3)?$arr3:array();
                    $arr4=is_array($arr4)?$arr4:array();
                    
                    // print_r($arr1);
                    ?>
                
                     <?php 
                    if(sizeof($arr1)>0){?>
                        @for($i = 0 ; $i< sizeof($arr1) ; $i++)
                <tr>
                    <td>
                        {{($arr1[$i]??'')}}
                    </td>
                    <td>
                        {{($arr2[$i]??'')}}
                    </td>
                    <td>
                       {{($arr3[$i]??'')}}
                     </td>
                    <td>
                        {{($arr4[$i]??'')}}
                     </td>
                    <td>
                    	<div class="input-group-append {{ $readonly?"hide":"" }}" style="margin-left: 0px !important" onclick="$(this).parent().parent().remove()">
                    	    <span class="input-group-text input-group-text2" style="margin-left: 0;" >
                        	    <i class="fa fa-trash" id="plusElement2"></i>
                        	</span>
                    	</div>
                	</td>
                </tr>
                @endfor
                    <?php } ?>
                
                <tbody id="subTask">

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md attachs-section"
        style="margin-left: 25px !important; margin-right: 25px !important;">
        <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
        <span class="attach-header">{{ 'مرفقات' }}
            <span id="attach-required">{{ '*' }}</span>

            <span style="position:absolute; left: 0; font-size: 0.76em;">
                {{ 'يرجى التأكد من إستلام التالي' }}
            </span>
        </span>
    </div>
</div>

<div class="col-md-12">
    <table width="100%" class="detailsTB table archTbl attachs-body" name="Education"
        id="Education">
        <tbody id="requieredAttatch" style="border: hidden">
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
                        
                        <tr>
                            <td class="col-md-1">
                                <input type="checkbox"  <?php if( $j < sizeof($arr1) ) if( $arr1[$j] == $i ){ echo 'checked'; $j++; } ?> {{ $readonly?"disabled":"" }} value="{{$i}}" name="attachReceive[]" class="condition">
                            </td>
                            <td class="col-md-10" style="text-align: center!important;" >
                                <input class="form-control" id="plusRequieredAttach" {{ $readonly?"readonly":"" }} type="text" name="attatchName[]"value="{{$arr[$i]}}"/>
                            </td>
                            <td>
                            </td>
                
                        </tr> 
                        @endfor
                    <?php } ?>
        </tbody>
    </table>

</div>



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


