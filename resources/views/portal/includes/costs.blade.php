@if($ticketInfo->has_debt_list==1)
<div class="row">
    <div class="col-md attachs-section" style="margin-left: 25px; margin-right: 25px;">
        <img src="{{ asset('assets/images/ico/cost.png') }}" width="40" height="40">
        <span class="cost-header" style="font-size: 20px;">{{ 'ديون سابقه' }}

        </span>

    </div>
</div>

<div class="row">
    <div class="card-body">
       <div class="form-group col-md-12">
        <table class="detailsTB table" style="margin-left: 15px;">
            <tbody>
                <tr>
                    <th scope="col">
                        {{ '' }}
                    </th>
                    <th scope="col" class="hideMob col-md-2" style="text-align: -webkit-center;color: white;">
                        {{ 'البند' }}
                    </th>
                    <th scope="col" class="hideMob col-md-2" style="text-align: -webkit-center;color: white;">
                        {{ 'المبغ المستحق' }}
                    </th>
                    <th scope="col" class="hideMob col-md-2" style="text-align: -webkit-center;color: white;">
                        {{ 'المبلغ المدفوع' }}
                    </th>
                    <th scope="col" class="hideMob col-md-2" style="text-align: -webkit-center;color: white;">
                        {{ 'رقم الوصل' }}
                    </th>
                    <th scope="col" class="hideMob col-md-3" style="text-align: -webkit-center;color: white;">
                        {{ 'الموظف' }}
                    </th>
                    <th scope="col"></th>

                </tr>
            </tbody>
            <tbody id="debtList">
                <tr>
                    <td style="color:#1E9FF2">1</td> 
                    <td>
                        {{'ديون كهرباء'}}
                        <input type="hidden" name="debtname[]" value="{{'ديون كهرباء'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                        <input type="text" class="form-control debtEmp" name="debtEmp[]">
                        <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td style="color:#1E9FF2">2</td> 
                    <td>
                        {{'ديون مياه'}}
                        <input type="hidden" name="debtname[]" value="{{'ديون مياه'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                        <input type="text" class="form-control debtEmp" name="debtEmp[]">
                        <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td style="color:#1E9FF2">3</td> 
                    <td>
                        {{'معارف'}}
                        <input type="hidden" name="debtname[]" value="{{'معارف'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                        <input type="text" class="form-control debtEmp" name="debtEmp[]">
                        <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                    </td>
                    <td>
                       
                    </td>
                </tr>
                <tr>
                    <td style="color:#1E9FF2">4</td> 
                    <td>
                        {{'رخص حرف'}}
                        <input type="hidden" name="debtname[]" value="{{'رخص حرف'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                        <input type="text" class="form-control debtEmp" name="debtEmp[]">
                        <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td style="color:#1E9FF2">5</td> 
                    <td>
                        {{'ديون هندسة'}}
                        <input type="hidden" name="debtname[]" value="{{'ديون هندسة'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                        <input type="text" class="form-control debtEmp"  name="debtEmp[]">
                        <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td style="color:#1E9FF2">6</td> 
                    <td>
                        {{'فنى كهرباء'}}
                        <input type="hidden" name="debtname[]" value="{{'فنى كهرباء'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                        <input type="text" class="form-control debtEmp" onclick="addDebt();" name="debtEmp[]">
                        <input type="hidden" class="form-control"  name="debtEmpID[]" value="">
                    </td>
                    <td>
                    </td>
                </tr>
            </tbody>
            <tbody id="debtTotalList">
                <tr>
                    <td style="color:#1E9FF2"></td> 
                    <td style="text-align: left;">
                        {{'المجموع الكلى'}}
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild" onblur="calcDebtrest();" id="debtTotal" name="debtTotal" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td style="color:#1E9FF2"></td> 
                    <td style="text-align: left;">
                        {{'المبلغ المدفوع'}}
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild" onblur="calcDebtrest();" id="payment" name="payment" value="">
                    </td>
                    <td style="text-align: -webkit-center;">
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td style="color:#1E9FF2"></td> 
                    <td style="text-align: left;">
                        {{'الباقى'}}
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild rest" id="rest" name="rest" value="">
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div> 
    </div>
    
</div>

@endif

@if($ticketInfo->has_price_list==1)
<div class="row">
    <div class="col-md attachs-section" style="margin-left: 25px; margin-right: 25px;">
        <img src="{{ asset('assets/images/ico/cost.png') }}" width="40" height="40">
        <span class="cost-header" style="font-size: 20px;">{{ 'التكاليف' }}

        </span>

    </div>
</div>
<div class="row attachs-body" style="margin-left: 25px; margin-right: 25px;">
    <div class="form-group col-12 mb-2">

        <ol class="vasType 1vas addRec">
            <?php $sum=0;?>
            @if(count($fees)>0)
            <?php
            $arr=json_decode($fees[0]->fees_json); ?>
            @if(is_array($arr) && sizeof($arr)>0)
            @foreach($arr as $fee)
            <?php $sum+=$fee->feesValue*1; ?>
            <li style="font-size: 17px !important;color:#000000">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" name="feesText[]" class="form-control feesText"  value="{{ $fee->feesText}}">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="feesValue[]" class="form-control FessVals" value="{{ $fee->feesValue*1}}" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                    </div>
                </div>
            </li>
            @endforeach
            @endif
            @endif
            <li style="font-size: 17px !important;color:#000000">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" name="feesText[]" class="form-control feesText"
                            value="">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="feesValue[]" class="form-control FessVals" value="0" onblur="calcTotal();addExtraRow();" onchange="calcTotal()">
                    </div>
                </div>
            </li>                            
        </ol>

        <ol class="vasType 1vas " style="list-style-type: none;">
            <li style="font-size: 17px !important;color:#000000">
                <div class="row">
                    <div class="col-sm-8">
                        {{ 'الإجمالي' }}
                    </div>
                    <div class="col-sm-3">
                        <input type="number" id="total" disabled name="total" class="form-control" value="{{$sum}}" >
                    </div>
                </div>
            </li>
        </ol>

    </div>
</div>
@endif

<script>
    $(document).ready(function () {
    
    
    
        $( ".debtEmp" ).autocomplete({
    		source:'emp_auto_complete',
    		minLength: 1,
            select: function( event, ui ) {
                // var currentIndex=$("input[name^=debtEmpID]").length -1;
                // $('input[name="debtEmpID[]"]').eq(currentIndex).val(ui.item.id);
    		}
    	});
    });
    var lastCntr = 7;

    function calcTotal() {
        total = 0;
        $(".FessVals").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#total').val(total)

    }
    function calcDebtTotal() {
        
        total = 0;
        $(".debtValue").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#debtTotal').val(total)

    }
    function calcDebtPayed() {
        
        total = 0;
        $(".debtPayed").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#payment').val(total);
        $res = 0;
        $res =parseInt($('#debtTotal').val())- parseInt($('#payment').val());
        $('.rest').val($res);

    }
    function calcDebtrest() {
        
        $res = 0;
        // if($("#payment").val().length>0){
          $res=$('#debtTotal').val()-$("#payment").val();
        // }
        $('.rest').val($res);

    }

    function addExtraRow() {
        if($(".feesText").last().val().length>0){
            var row = '<li style="font-size: 17px !important;color:#000000"><div class="row">' +
                '<div class="col-sm-8">' +
                '<input type="text" onblur="addExtraRow()" class="form-control feesText" name="feesText[]" value=""> ' +
                '</div>' +
                '<div class="col-sm-3">' +
                '<input type="number" name="feesValue[]" id="feesValue[]" class="form-control FessVals"onblur="calcTotal()" onchange="calcTotal()"> ' +
                '</div>' +
                '</div></li>'
            
            $(".addRec").append(row)
            setTimeout(function(){$(".feesText").last().focus},900)
            
        }
    }
    
    function addDebt(){
        row='';
        row+='<tr>'
            +'<td style="color:#1E9FF2">'+(lastCntr++)+'</td>' 
            +'<td>'
            +'<input type="text" class="form-control alphaFeild" name="debtname[]">'
            +'</td>'
            +'<td class="hideMob" style="text-align: -webkit-center;">'
            +'<input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">'
            +'</td>'
            +'<td class="hideMob" style="text-align: -webkit-center;">'
            +'<input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">'
            +'</td>'
            +'<td class="hideMob" style="text-align: -webkit-center;">'
            +'<input type="text" class="form-control alphaFeild"  name="debtVoucher[]" value="">'
            +'</td>'
            +'<td style="text-align: -webkit-center;">'
            +'<input type="text" class="form-control debtEmp" onclick="addDebt();" name="debtEmp[]">'
            +'<input type="hidden" class="form-control"  name="debtEmpID[]" value="">'
            +'</td>'
            +'<td>'
            +'<a class="remove-btn" onclick="$(this).parent().parent().remove(); calcDebtTotal();" >'
            +'<i class="fa fa-trash" style="color:#1E9FF2;"></i>'
            +'</a>'
            +'</td>'
            +'</tr>';
        $("#debtList").append(row);
        
        $( ".debtEmp" ).autocomplete({
    		source:'emp_auto_complete',
    		minLength: 1,
            select: function( event, ui ) {
                // var currentIndex=$("input[name^=debtEmpID]").length -1;
                // $('input[name="debtEmpID[]"]').eq(currentIndex).val(ui.item.id);
    		}
    	});
    }
    
    
    
    
</script>
