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
            border:0px solid #ffffff;
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
        body,td,th,span,h1,h2,h3,h4,h5,h6{
            font-family:"Times New Roman";
            color:#000000!important;
            font-size:16pt;
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
        <div class="col-6" style="text-align:right">
        <span style="font-size:16pt;" align="right">
            @if( $config[0]->ticket_no==31)
                
                    التاريخ  :
                    <?php echo $ticket->date_buy ; ?>
                
            @else
                
                    تاريخ الطلب :
                    <?php echo date('d/m/Y',strtotime($ticket->created_at )); ?>
                
            @endif
        </span>
        </div>
    </div>
        <div class="row" style="text-align:center;margin-bottom:30px">
            <div class="col-12" style="text-align:center">
                <h1 class="ticket_name" style="text-align:center;font-weight: bold;display:inline;">
                    
                     {{ $config[0]->ticket_name }}
                </h1>
                <span class="hide" style="font-size:16pt;">رقم الطلب :
                    ({{$ticket->app_no}})  
                </span>
            </div>
        </div>
        @if($config[0]->ticket_no==34)
        <div class="row">
            <div class="col-5" style="text-align:right">
                <span> يرجى الموافقة على صرف مبلغ : </span>
                <span style="margin-right:5px;">
                    {{ $ticket->AmountInNIS1 }} {{ $helpers['CurrencyList'][$ticket->CurrencyID1] }}
                </span>
            </div>
            <div class="col-6" style="text-align:right">
                <span>
                    المبلغ بالحروف:
                </span>
                <span id="amountInAlpha" style="margin-right:5px;">
                    
                </span>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px;margin-top:20px;">
            <div class="col-6" style="text-align:right">
                <span> لأمر السادة /السيد : </span>
                <span class="m5">{{$ticket->customer_name}}</span>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12 attachs-section"  style="margin-left: 25px; margin-right: 25px;text-align: right;margin-bottom: 0;right;margin-top: 25px;">
    
                <h2 class="cost-header " style="">{{ 'وذلك عن الأعمال التالية:' }}
                </h2>
            </div>
        </div>
        @endif
        <div class="row">
                                        
                <div class="col-md-12">
                <table id="myTable"  class="table table-bordered order-list" cellpadding="0" cellspacing="0" width="100%" table-borderd>
                    <thead>
                        <tr style="text-align:center !important;background: #0073AA;">
                            <th style="color: white">رقم</th>
                            <th style="color: white">البيان</th>
                            <th style="color: white">الكمية</th>
                            <th style="color: white">الوحدة</th>
                            @if( $config[0]->ticket_no!=33)
                            <th style="color: white">السعر</th>
                            <th style="color: white">المجموع</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="mytbody">
                        <?php $count = 1;?>
                        @foreach($helpers['orders'] as $order)
                            <tr>
                                <input type="hidden" id="order_id"  name="order_id[]" value="{{($order->id)}}">
                                <td class="col-sm-4 " style="width: 5%; border: none;">
                                    <input readonly type="text" name="count[]" id="count" {{ $readonly?"readonly":"" }} value="{{$count++}}" class="form-control " />
                                </td>
                                <td class="col-sm-4 " style="width: 35%;  border: none;">
                                    <input readonly type="text" name="itemname[]" id="itemname" {{ $readonly?"readonly":"" }} value="{{($order->itemname??'')}}" class="form-control ac text-center" />
                                </td>
                                <td class="col-sm-4" style="width: 15%; border: none;">
                                    <input readonly type="text" name="quantity[]" {{ $readonly?"readonly":"" }} value="{{($order->quantity??'')}}"  class="form-control text-center" oninput="CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount')"/>
                                </td>
                                <td class="col-sm-4" style="width: 15%; border: none;">
                                    <input readonly type="text" name="types[]" {{ $readonly?"readonly":"" }} value="{{($order->types??'')}}"   class="form-control text-center" />
                                </td>
                                @if( $config[0]->ticket_no!=33)
                                <td class="col-sm-4" style="width: 15%; border: none;">
                                    <input readonly type="mail" name="price[]" {{ $readonly?"readonly":"" }} value="{{($order->price??'')}}"  class="form-control price text-center" id="price" oninput="CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount')"/>
                                </td>
                                <td class="col-sm-4" style="width: 15%; border: none;">
                                    <input readonly type="text" name="total[]" {{ $readonly?"readonly":"" }} value="{{($order->total??'')}}"  class="form-control text-center"/>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                           <!--<tr>-->
                           <!--     <input type="hidden" id="order_id"  name="order_id[]" value="0">-->
                           <!--     <td class="col-sm-4 " style="width: 5%; border: none;">-->
                           <!--         {{$count++}}-->
                           <!--     </td>-->
                           <!--     <td class="col-sm-4" style="width: 35%;  border: none;">-->
                           <!--         <input type="text" name="itemname[]" id="itemname" {{ $readonly?"readonly":"" }}  class="form-control ac " />-->
                           <!--     </td>-->
                           <!--     <td class="col-sm-4" style="width: 15%; border: none;">-->
                           <!--         <input type="text" name="quantity[]" {{ $readonly?"readonly":"" }}   class="form-control" oninput="CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount')"/>-->
                           <!--     </td>-->
                           <!--     <td class="col-sm-4" style="width: 15%; border: none;">-->
                           <!--         <input type="text" name="types[]" {{ $readonly?"readonly":"" }}   class="form-control" />-->
                           <!--     </td>-->
                           <!--     <td class="col-sm-4" style="width: 15%; border: none;">-->
                           <!--         <input type="mail" name="price[]" {{ $readonly?"readonly":"" }}   class="form-control price" id="price" oninput="CalculateColumns('myTable','price[]','quantity[]','total[]','totalamount')"/>-->
                           <!--     </td>-->
                           <!--     <td class="col-sm-4" style="width: 15%; border: none;">-->
                           <!--         <input type="text" name="total[]" {{ $readonly?"readonly":"" }}   class="form-control"/>-->
                           <!--     </td>-->
                           <!--     <td class="col-sm-2" style="width: 5%; border: none;">-->
                           <!--         <i id="delete" class="fa fa-trash {{ $readonly?"hide":"" }}"  style="color:#1E9FF2;padding-top: 9px;"></i>-->
                           <!--     </td>-->
                           <!-- </tr>-->
                    </tbody>
                    @if( $config[0]->ticket_no!=33)
                    <tfoot>
                        <tr>
                            <td class="col-sm-4" colspan="5" style="text-align: left; height: 100%; border: none;">
                                <span class="input-group-text" id="basic-addon1" style="background-color:whitesmoke; display: grid; height:45px;margin-right:0; width: 100%; color:#000000;text-align: left;font-weight: bold;font-size:15pt!important;">المجموع الكلي</span>
                            </td>
                            <td class="col-sm-4" style="width: 15%; border: none;">
                                <input type="text" style="font-weight: bold;font-size:15pt!important;" id="totalamount" name="totalamount" {{ $readonly?"readonly":"" }} value="{{ $ticket->totalamount }}"  class="form-control text-center"/>
                            </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
                
            </div>
        </div>
        <?php $str=url()->full();?>
        <?php $flag=explode("=",$str);?>
        @if(count($flag)==1)
            <div class="row" >
                <div class="col-md-12 attachs-section"  style="margin-left: 25px; margin-right: 25px;text-align: right;margin-bottom: 0;right;margin-top: 25px;">
        
                    <h2 class="cost-header " style="">{{ 'اجراءات الموظفين' }}
                    </h2>
                </div>
                
            </div>
            <div id="responseList">
            <?php 
            $lastReciver=$ticket->history[0]->sender_id ;  
            $tagArr=array() ; 
            $lastTicket=array(); $i=0;?>
            @foreach($ticket->history as $rowTicket)
           <?php  
           if($rowTicket->recive_type==1) 
                    $lastReciver=$rowTicket->reciver_id;
                if(in_array($rowTicket->recive_type,array(1,2))) 
                    $lastTicket=$rowTicket;
            ?>
            
            <div class="card-content collpase show ResponseList">
                <div class="card-body" style="padding-bottom:0;">
                    <div class="row"
                        style="background-color: #ffffff; margin-left: 15px;margin-right: 15px;">
                        <!--<div class="col-sm-12 col-md-2 imgAvatar" style="text-align: center;">-->
                        <!--    <span class="avatar" style="width: 60px;">-->
                        <!--        <img src="{{ $rowTicket->sender_image }}"-->
                        <!--            style="border: 1px solid #c7c7c7;padding: 2px; max-height:60px;">-->
                        <!--    </span>-->
                        <!--</div>-->
                        <div class="col-sm-12 col-md-3 marginrightminus30 infoAvatar" style="text-align: right;">
                            <a style="color:#385898;font-weight: 600;">{{ $rowTicket->sender_name }}</a>
                            <br>
                            <time class="fs14">
                                {{ date('d/m/Y',strtotime($rowTicket->created_at)) }}
                                الساعة : 
                                {{ date('H:i',strtotime($rowTicket->created_at)) }} </time>
                        </div>
                        <div class="col-sm-12 col-md-8 marginrightminus30">
                            <?php if($i==0){ $i++ ?>
                            <h5 style="text-align: right;">
                                <time style="font-family: Helvetica, Arial, sans-serif !important;; color:#000000; font-size: 17px !important;font-weight: 500;">
        
                                    {{"تم إنشاء الطلب بواسطة:"}}
                                    <b>{{ $rowTicket->sender_name }} </b>
                                </time>
                            </h5>
                            <?php 
                            if(strlen(trim($rowTicket->trans_note))+strlen(trim($rowTicket->s_note))>0){
                            ?>
                            <br />
                            <p style="text-align: right;"><b style="color:#5599FE">ملاحظات: </b>
                            <?php echo $rowTicket->trans_note." ".$rowTicket->s_note?>   </p>
                            <?php }}else{ 
                            //var_dump($rowTicket);?><h5 style="text-align: right;">
                                <time style="font-family: Helvetica, Arial, sans-serif !important;; color:#000000; font-size: 17px !important;font-weight: 500;">
                                    <?php  echo$rowTicket->s_note ?>
                                    <?php 
                if(in_array($rowTicket->recive_type,array(1,2))) 
                echo strlen(trim($rowTicket->trans_note))>0?'<br />'.$rowTicket->trans_note:''?>
                                </time>
                            </h5>
                                <?php }
                                ?>
                        </div>
                        
                        <?php $arr=is_array($rowTicket->Files)?$rowTicket->Files:array();?>
                        @foreach($arr as $file)
                        
                        <div class="col-sm-4 attach_row11_{{$i}}">
                            <div id="attach" class=" col-sm-12 ">
                                <div class="attach"> 
                                    <a class="attach-close1" href="https://t.expand.ps/expand_repov1/public/{{$file->Files[0]->url}}" style="color: #74798D; float:left;" 
                                    target="_blank">  
                                        <span class="attach-text">{{ substr($file->attachName,0,40)}}</span>    
                                        <img style="width: 20px;" src="https://t.expand.ps/expand_repov1/public/assets/images/ico/image.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                                
                        <?php $i++;?>
                        @endforeach
                    </div>
                    
                </div>
                <div class="card-body"
                    style="background-color: #F4F5FA; min-height:15px;padding-top: 0;padding-bottom: 0rem;">
                </div>
            </div>
            @endforeach
            </div>
        @endif
        <div class="row" style="padding-top: 50px;">
            <div class="col-3" style="text-align:center">
                <span>رئيس المجلس </span>
                
            </div>
            <div class="col-3" style="text-align:center">
                <span>المحاسب</span>
            </div>
            <div class="col-3" style="text-align:center">
                <span>نائب الرئيس</span>
            </div>
            <div class="col-3" style="text-align:center">
                <span>عضو اللجنة المالية</span>
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

