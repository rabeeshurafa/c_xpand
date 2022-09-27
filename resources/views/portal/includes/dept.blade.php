<div class="row" onclick="trigerDept();" >
    <div class="col-md attachs-section" style="margin-left: 25px; margin-right: 25px;">
        <img src="{{ asset('assets/images/ico/cost.png') }}" width="40" height="40">
        <span class="cost-header" style="font-size: 20px;">{{ 'ديون سابقه' }}

        </span>

    </div>
</div>

<div class="row deptRow">
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
                        <input type="hidden" class="debtname" name="debtname[]" value="{{'ديون كهرباء'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild   debtVoucher"  name="debtVoucher[]" value="">
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
                        <input type="hidden" class="debtname" name="debtname[]" value="{{'ديون مياه'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild   debtVoucher"  name="debtVoucher[]" value="">
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
                        {{'معارف (ضريبة أملاك)'}}
                        <input type="hidden" class="debtname" name="debtname[]" value="{{'معارف (ضريبة أملاك)'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild debtVoucher"  name="debtVoucher[]" value="">
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
                        {{'رخص حرف وصناعات'}}
                        <input type="hidden" class="debtname" name="debtname[]" value="{{'رخص حرف وصناعات'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild  debtVoucher"  name="debtVoucher[]" value="">
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
                        <input type="hidden" class="debtname" name="debtname[]" value="{{'ديون هندسة'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild   debtVoucher"  name="debtVoucher[]" value="">
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
                        <input type="hidden" class="debtname" name="debtname[]" value="{{'فنى كهرباء'}}">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">
                    </td>
                    <td class="hideMob" style="text-align: -webkit-center;">
                        <input type="text" class="form-control alphaFeild   debtVoucher"  name="debtVoucher[]" value="">
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

<script>
$( ".deptRow" ).addClass( "hide" );
function trigerDept(){
            $( ".deptRow" ).toggleClass( "hide" );
            resize();
        }
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
    function calcDebtTotal() {
        
        total = 0;
        $(".debtValue").each(function(){
            if($(this).val().length>0)
                total += parseInt($(this).val())
        })
        
        $('#debtTotal').val(total)

    }
    function calcDebtrest() {
        
        $res = 0;
        // if($("#payment").val().length>0){
          $res= (+$('#debtTotal').val())-(+$("#payment").val());
        // }
        $('.rest').val($res);

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
    function addDebt(){
        row='';
        row+='<tr>'
            +'<td style="color:#1E9FF2">'+(lastCntr++)+'</td>' 
            +'<td>'
            +'<input type="text" class="form-control alphaFeild" class="debtname" name="debtname[]">'
            +'</td>'
            +'<td class="hideMob" style="text-align: -webkit-center;">'
            +'<input type="number" class="form-control alphaFeild debtValue" onblur="calcDebtTotal();" name="debtValue[]" value="">'
            +'</td>'
             +'<td class="hideMob" style="text-align: -webkit-center;">'
            +'<input type="number" class="form-control alphaFeild debtPayed" onblur="calcDebtPayed();" name="debtPayed[]" value="">'
            +'</td>'
            +'<td class="hideMob" style="text-align: -webkit-center;">'
            +'<input type="text" class="form-control alphaFeild  debtVoucher"  name="debtVoucher[]" value="">'
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
