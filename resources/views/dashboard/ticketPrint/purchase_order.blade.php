<?php $readonly=true; ?>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/custom-rtl.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    body,td,th,span,h1,h2,h3,h4,h5,h6{
        font-family:"Times New Roman";
        color:#000000;
        font-size:16pt;
    }
    div{
        padding:3x;
    }
    .ticket_name{
            font-size:20pt!important;
        }
        .response{
            position: fixed;
            bottom: 50%;
            left: 40px;
        }
    @media print{
        input,textarea{
            border:0px solid #ffffff !important;
        }
        .hideprint{
            display:none;
        }
        textarea{
            width:100%;
        }
        body{
            margin:0px;
            direction:rtl;
        }
        .hidePrint{
            display: none;
        }
    .form-check-input{
        position:relative;
        margin-right:-0.25rem;!important
        }
        .form-control input{
            background-color: #e9ecef!important;
            opacity: 1!important;
        }
        td,th,tr{
            border:3px solid #000000 !important;
        }
        body,td,th,span,h1,h2,h3,h4,h5,h6{
            font-family:"Times New Roman";
            color:#000000!important;
            font-size:18pt;
        }
        .ticket_name{
            font-size:25pt!important;
        }
            .input-group {
                width: 99% !important;
            }
            .marginrightminus30 {
                margin-right: 0px;
            }
        
    }
    span{
            margin-right: 20px;
    }
    .m5{
        margin-right:5px!important;
    }
    .footerLine{
        width:100%;
        text-align:center;
        margin-top:10%;
    }
</style>
<img src="{{$setting->header_img}}" width="100%" style="max-width:100%">
<!--<div>-->
<!--    <span width="50%" align="right">-->
        
<!--    </span>-->
<!--    <span width="50%" align="right">-->
<!--            <h6 style="margin-top:10px;font-size:16pt;font-weight:bold;">تاريخ الطلب :-->
<!--            <?php //echo date('d/m/Y',strtotime($ticket->created_at )); ?>-->
<!--            </h6>-->
<!--    </span>-->

<!--</div>-->


<form method="post" id="rpFrm" dir="rtl" style="min-height:950px;padding-top: 10px;">
    <div class="row">
        <div class="col-12" style="text-align:left;padding-left: 150px;">
        <span style="font-size:16pt;" align="right">
                    التاريخ  :
                 &emsp;&emsp;  /  &emsp;&emsp; /  <?php echo date('Y')?>  
        </span>
        </div>
    </div>
        <div class="row" style="text-align:center;margin-bottom:30px">
            <div class="col-12" style="text-align:center">
                <h1 class="ticket_name" style="text-align:center;font-weight: bold;display:inline;">
                    
                     السيد رئيس البلدية المحترم
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align:right;">
            <span style="font-size:16pt;" align="right">
                    الموضوع : طلب شراء
            </span>
            </div>
        </div>
        <div class="row">
                                        
                <div class="col-md-12">
                <table id="myTable"  class="table table-bordered order-list" cellpadding="0" cellspacing="0" width="100%" table-borderd>
                    <thead>
                        <tr style="text-align:center !important;background: #0073AA;">
                            <th style="color: white;border:3px solid #000000 !important;" rowspan="2">رقم المادة</th>
                            <th style="color: white;border:3px solid #000000 !important;" rowspan="2">الصنف</th>
                            <th style="color: white;border:3px solid #000000 !important;" colspan="2">الكمية</th>
                            <th style="color: white;border:3px solid #000000 !important;" rowspan="2">ملاحظات</th>
                        </tr>
                        <tr style="text-align:center !important;background: #0073AA;">
                            <th style="color: white;border:3px solid #000000 !important;">الوحدة</th>
                            <th style="color: white;border:3px solid #000000 !important;">العدد</th>
                        </tr>
                    </thead>
                    <tbody id="mytbody">
                        <?php $count = 1;?>
                        @foreach($helpers['orders'] as $order)
                            <tr>
                                <input type="hidden" id="order_id"  name="order_id[]" value="{{($order->id)}}">
                                <td class="col-sm-4 " style="width: 10%;border:3px solid #000000 !important;">
                                    <input readonly type="text" name="count[]" id="count" {{ $readonly?"readonly":"" }} value="{{$count++}}" class="form-control " style="color: black;font-size: 18px !important;font-weight: 900;text-align: center;"/>
                                </td>
                                <td class="col-sm-4 " style="width: 40%;border:3px solid #000000 !important;">
                                    <input readonly type="text" name="itemname[]" id="itemname" {{ $readonly?"readonly":"" }} value="{{($order->itemname??'')}}" class="form-control ac text-center" style="color: black;font-size: 18px !important;font-weight: 900;text-align: center;" />
                                </td>
                                <td class="col-sm-4" style="width: 15%;border:3px solid #000000 !important;">
                                    <input readonly type="text" name="types[]" {{ $readonly?"readonly":"" }} value="{{($order->types??'')}}"   class="form-control text-center" style="color: black;font-size: 18px !important;font-weight: 900;text-align: center;"/>
                                </td>
                                <td class="col-sm-4" style="width: 10%;border:3px solid #000000 !important;">
                                    <input readonly type="text" name="quantity[]" {{ $readonly?"readonly":"" }} value="{{($order->quantity??'')}}"  class="form-control text-center" oninput="CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount')" style="color: black;font-size: 18px !important;font-weight: 900;text-align: center;"/>
                                </td>
                                <td class="col-sm-4" style="width: 25%;border:3px solid #000000 !important;">
                                    <input type="text" name="price[]"  value=""  class="form-control price text-center" id="price" style="color: black;font-size: 18px !important;font-weight: 900;text-align: center;"/>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-6" style="text-align:right;">
                <span style="font-size:16pt;" align="right">
                    الطالب :
                </span>
                ......................................................................................
            </div>
            <div class="col-6" style="text-align:right;">
                <span style="font-size:16pt;" align="right">
                    القسم :
                </span>
                ......................................................................................
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-12" style="text-align:right;">
                <span style="font-size:16pt;" align="right">
                    المشتريات :
                </span>
                ..................................................................................................................................................................................................
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-12" style="text-align:right;">
                <span style="font-size:16pt;" align="right">
                    مدير البلدية :
                </span>
                .................................................................................................................................................................................................
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-12" style="text-align:right;">
                <span style="font-size:16pt;" align="right">
                    المالية  :
                </span>
                ........................................................................................................................................................................................................
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align:right;">
                <span style="font-size:16pt;" align="right">
                    رئيس البلدية  :
                </span>
                ...............................................................................................................................................................................................
            </div>
        </div>

        <button class=" btn btn-info response hideprint" onclick="window.print()"type="button" >
           <img src="https://db.expand.ps/images/printer.jpeg" height="32px" style="cursor: pointer" >
           طباعة
        </button>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/Tafqeet.js')}}"></script>

<script>
    
      CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount');  
    $(document).ready(function () {
        
    //     $( ".ac" ).autocomplete({
    // 		source:'sparePart_auto_complete',
    // 		minLength: 1,
    //         select: function( event, ui ) {
    // 		}
	   // });
    
    });
    @if($config[0]->ticket_no==34)
    $(document).ready(function(){
        $("#amountInAlpha") .html(tafqeet ({{ $ticket->AmountInNIS1 }})+' {{ $helpers['CurrencyList'][$ticket->CurrencyID1] }}')
    })
    @endif
    window.globalCounter =  {{($count)}};
    $(document).ready(function () {
        
        
        
        
        $("#mytbody").on("input","#price", function () {
            if($(".price").last().val().length>0){
                var data = '<tr><td class="col-sm-4 " style="width: 5%; border: none;">' 
                + window.globalCounter 
                + '</td><input type="hidden" id="order_id"  name="order_id[]" value="0"><td class="col-sm-4" style="width: 50%; border: none;">'
                +'<input type="text" class="form-control ac" name="itemname[]"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control" name="quantity[]" oninput="CalculateColumns(\'myTable\',\'price[]\',\'quantity[]\',\'total[]\',\'totalamount\')"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control" name="types[]"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control price" id="price" name="price[]" oninput="CalculateColumns(\'myTable\',\'price[]\',\'quantity[]\',\'total[]\',\'totalamount\')"/>'
                +'</td><td class="col-sm-4" style="width: 15%; border: none;">'
                +'<input type="text" class="form-control" name="total[]"/>'
                +'</td><td style=" border: none;"><i id="delete" class="fa fa-trash" style="color:#1E9FF2;padding-top: 9px;"></i></td></tr>';
                $("#mytbody").append(data);
                window.globalCounter++;
                
                $( ".ac" ).autocomplete({
            		source:'sparePart_info',
            		minLength: 1,
                    select: function( event, ui ) {
            		}
    	        });
    	        
                if(window.globalCounter>=7){
                    $(".leftSide").removeAttr("style");
                }
            }
        });

        $("#mytbody").on("click", "#delete", function (ev) {
            var $currentTableRow = $(ev.currentTarget).parents('tr')[0];
            $currentTableRow.remove();
            CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount');
            window.globalCounter--;

            $("#mytbody").find('tr').each(function (index) {
                var firstTDDomEl = $(this).find('td')[0];
                var $firstTDJQObject = $(firstTDDomEl);
                $firstTDJQObject.text(index + 1);
            });
        });


    });    

    function CalculateColumns(ContainerID, Col1, Col2, Col3, GrandTotalID) {
        if( typeof ContainerID == 'string' ) var ContainerID = document.getElementById( ContainerID );

        var arrCol1 = new Array();
        var arrCol2 = new Array();
        var arrCol3 = new Array();
        var GrandTotal = 0;
        var ContainerIDElements = new Array( 'input');
        //var ContainerIDElements = new Array('input', 'textarea', 'select');

        for( var i = 0; i < ContainerIDElements.length; i++ ){
            els = ContainerID.getElementsByTagName( ContainerIDElements[i] );
            for( var j = 0; j < els.length; j++ ){
                if(els[j].name == Col1) arrCol1.push(els[j]);
                if(els[j].name == Col2) arrCol2.push(els[j]);
                if(els[j].name == Col3) arrCol3.push(els[j]);
            }
        }

        for( var j = 0; j < arrCol1.length; j++ ) {
           if((Number(arrCol1[j].value)>0) && (Number(arrCol2[j].value)>0)) {
               arrCol3[j].value = Number(arrCol1[j].value) * Number(arrCol2[j].value);
               GrandTotal += Number(arrCol3[j].value);
           }
        }

        document.getElementById(GrandTotalID).value = GrandTotal;
    } // CalculateColumns
</script>

