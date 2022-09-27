@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection

@section('content')

    <style>
        /* The Modal (background) */
        .modal1 {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content1 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            /*   float: right; */
            font-size: 28px;
            font-weight: bold;
            margin-left: auto;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .rate:not(:checked)>label {
            font-size: 30px !important;
        }

        .rate {
            width: auto;
            position: relative;
            float: left;
            height: 40px;
            margin-top: -3px;
        }

        .Priority {
            padding: 0;
            position: relative;
            left: 0;
            line-height: 39px;
            float: left;
        }

        .fa-2x {
            font-size: 24px !important;
        }
    td{
        height:40px;
    }
    u,li{
        font-weight: bold;
    }
    
    @media print{
        input,textarea{
            border:0px solid #ffffff!important;
        }
        textarea{
            width:100%;
        }
        body{
            margin:0px;
        }
        .hidePrint{
            display: none;
        }
        .header{margin-top: 50 px !important;}

    }
    
    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />
    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="formDataaa" enctype="multipart/form-data" style="background: #FFF;margin-bottom: 50px;padding: 20px;">
            @csrf
            <div class="row white-row">
                <input type="hidden" id="customerId" name="customerId">
                <input type="hidden" id="jobLicId" name="jobLicId">
                <input type="hidden" id="customerType" name="customerType">
                <input type="hidden" id="pk_i_id" name="pk_i_id" value="">
                <table style="width:100%" dir="rtl" id="for-print">
                    <tr>
                        <td colspan="4" align="center">
                            <h2 class="header">
                                (رخصة حرف و صناعات)
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="12%">
                          رقم الرخصة
                            </td>
                            <td width="20%">
                            <input type="text" style="display: inline-block;width:70%;" value="" id="licNo" class="form-control hidePrintB" placeholder="أدخل رقم الرخصة " name="licNo">
                        </td>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="12%">
                            اسم حامل الرخصة:
                            </td>
                            <td>
                            <input type="text" style="display: inline-block;width:70%;" value="" id="name" class="form-control  cust" placeholder="أدخل اسم حامل الرخصة " name="name">
                            
                        </td>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td  align="right" width="12%">
                            رقم الهوية:
                            </td>
                            <td>
                            <input type="text" style="display: inline-block;width:70%;" value="" id="nationalId" class="form-control hidePrintB" placeholder="أدخل رقم الهوية " name="nationalId">
                        </td>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td  align="right" width="10%">
                            العنوان:   
                            </td>
                            <td>
                            <input type="text" style="display: inline-block;width:70%;" value="" id="address" class="form-control hidePrintB" placeholder=" " name="address">

                        </td>
                        <td  align="right" width="7%">
                            الشارع/المنطقة: 
                            </td>
                            <td > 
                            <input type="text" style="display: inline-block;width:70%;" value="" id="street" class="form-control hidePrintB" placeholder=" " name="street">

                        </td>
                    </tr>
                    <tr>
                        <td  align="right" width="12%">
                            صنف الرخصة: 
                            </td>
                            <td>
                            <input type="text" style="display: inline-block;width:70%;" value="" id="lic_cat" class="form-control hidePrintB" placeholder="أدخل صنف الرخصة " name="lic_cat">
                        </td>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td  align="right" width="12%">
                            نوع الحرفة أو الصناعة
                            </td>
                            <td>
                            <input type="text" style="display: inline-block;width:70%;" value="" id="lic_type" class="form-control hidePrintB" placeholder="أدخل نوع الحرفة أو الصناعة " name="lic_type">
                        </td>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td width="13%">
                            رقم (الحد الرابع من التصنيف)
                            </td>
                        <td>
                            <input type="text" style="display: inline-block;width:70%;" value="" id="hadNo" class="form-control hidePrintB" placeholder="أدخل رقم الحد الرابع من التصنيف " name="hadNo">
                        </td>
                        <td width="7%">
                            الاسم
                        </td>
                        <td>
                            <input type="text" style="display: inline-block;width:70%;" value="" id="lic_name" class="form-control hidePrintB" placeholder="أدخل اسم الحرفة " name="lic_name">
                        </td>
                    </tr>
                                <tr>
                                    <td >
                                        تاريخ الإصدار: 
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo date('d/m/Y');?>" style="display: inline-block;width:70%;" value="" id="start_date" data-mask="00/00/0000" maxlength="10" class="form-control hidePrintB" placeholder="أدخل تاريخ الإصدار " name="start_date">
                                    </td>
                                    <td width="7%">
                                        تاريخ الإنتهاء: 
                                    </td>
                                    <td>
                                        <input type="text" style="display: inline-block;width:70%;" value="31/03/<?php echo date('m')<=3?date('Y'):date('Y')+1; ?>" id="end_date" data-mask="00/00/0000" maxlength="10" class="form-control hidePrintB" placeholder="أدخل تاريخ الإنتهاء " name="end_date">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        رقم الوصل: 
                                    </td>
                                    <td>
                                        <input type="text" style="display: inline-block;width:70%;" value="" id="waselNo" class="form-control hidePrintB" placeholder="أدخل رقم الوصل " name="waselNo">
                                    </td>
                                    <td width="7%"> 
                                        تاريخ الوصل: 
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo date('d/m/Y');?>" style="display: inline-block;width:70%;" value="" id="wasel_date" data-mask="00/00/0000" maxlength="10" class="form-control hidePrintB" placeholder="أدخل تاريخ الوصل " name="wasel_date">
                                    </td>
                                </tr>
                </table>
                
                <!--<button type="button" class="hidePrint" style="position: fixed;left: 50px;">-->
                <!--    <img src="https://y.expand.ps/images/printer.jpeg" id="makeResponse" height="32px" style="cursor: pointer" onclick="printData1();">-->
                <!--</button>-->
                 <button class="hidePrint btn btn-info" onclick="printData1();" style="position: fixed;left: 120px;" type="submit" >
                   <img src="https://db.expand.ps/images/printer.jpeg" id="makeResponse" height="32px" style="cursor: pointer" onclick="printData1();">
                   حفظ وطباعة 
                </button>
            </div>
            
        

        </form>
        
        
    </section>
@include('dashboard.component.fetch_table')
        @endsection

@section('script')

<script>
function printData1()
{
//   var divToPrint=document.getElementById("for-print");
//       console.log(divToPrint);

//   newWin= window.open("");
//   newWin.document.write(divToPrint.outerHTML);
//   newWin.print();
//   newWin.close();
var html='';
$('#formDataaa input').each(function(){
    txt=$(this).val();
if($(this).attr('name')!='_token'||$(this).attr('type')!='hidden'){
    $(this).hide();
    $(this).parent().append('<span class="txt">'+txt+'</span>')
}
});
   var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                  mywindow.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">');
                  mywindow.document.write('<style>'
                  +'td{width:150px !important;height:40px!important;font-size:14pt!important;}'
                  +'.header{margin-top:50px !important;}'
                  +' input,textarea{'
                    +'     border:0px solid #ffffff !important;'
                   +'  }'
                  +'@media print {'
                  +'      .footerLine{'
                +'            display:block;'
                 +'           bottom:0;'
                  +'          width: 100%;'
                +'            position:fixed; '   
                 +'           text-align: center;'
                  +'          font-weight: bold;'
                +'            font-size: 16px;'
                 +'       }'
                 +' input,textarea{'
                    +'     border:0px solid #ffffff !important;font-size:14pt!important;height:40px!important;'
                   +'  }'
                   +'.header{margin-top:50px !important;}'
                  +'  }'
                  +'</style>');
                  mywindow.document.write('</head><body style=" line-height: 24; font-size: 14px;" ><img src="https://db.expand.ps/images/ithnabnr.png" width="100%" style="max-width:100%">');
                  

                    mywindow.document.write('<table style="width:100%" dir="rtl" id="for-print">');
     console.log($("#for-print").html());
                    var footer='<tr>'
                                    +'<td colspan="3" align="left">'
                                      +'  توقيع سلطة الترخيص'
                                      +' <br><br><br>'
                                    +'</td>'
                                    +'</tr>'
                                    +'<tr>'
                                    +'  <td colspan="3" align="left" style="padding-top:70px; width:100% !important;">'
                                     +'    <hr style="border:2px solid #000000">'
                                     +'   </td>'
                                    +'</tr>'
                                    +   '<tr>'
                                    +'<td colspan="3" align="right">'
                                    +'    <b>الشروط:'
                                     +'   </b>'
                                      +'  <ul>'
                                    +'        <li>'
                                     +'       يعمل بهذه الرخصة لمدة سنة واحدة تبدأ في أول نيسان من كل سنة وتنتهي في 31 آذار من السنة التي تليها.'
                                      +'      </li>'
                                    +'        <li>'
                                     +'           لا يجوز تحويل الرخصة الى شخص آخر.'
                                      +'      </li>'
                                        +'    <li>'
                                          +'      يجب عرض الرخصة في مكان بارز.'
                                            +'</li>'
                                    +'    </ul>'
                                    +'</td>'
                            +'    </tr>'
                  mywindow.document.write($("#for-print").html());
                  mywindow.document.write(footer);
                  mywindow.document.write('</table></body></html>');
                    
                  mywindow.document.close(); // necessary for IE >= 10
                  mywindow.focus();
                  
    $(".txt").remove()
    $('#formDataaa input').show();
}

$('#formDataaa').submit(function(e) {
    $(".loader").removeClass('hide');
    $( "#customerName" ).removeClass( "error" );
    $( "#licNo" ).removeClass( "error" );
       e.preventDefault();
       let formData = new FormData(this);

       $.ajax({
          type:'POST',
          url: "store_jobLic",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".loader").addClass('hide');
             $('.wtbl').DataTable().ajax.reload();
             console.log(response);
             if (response) {
                Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
               this.reset();
             }
              
           },
           error: function(response){
            $(".loader").addClass('hide');

            Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: '{{trans('admin.error_save')}}',
				showConfirmButton: false,
				timer: 1500
				})

           }
       });
  });

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
  $( function() {
      
    $( ".cust_auto" ).autocomplete({
		source: 'Linence_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
           
            var currentIndex=$("input[name^=copyToID]").length -1;
            $('input[name="copyToID[]"]').eq(currentIndex).val(ui.item.id);
            $('input[name="copyToCustomer[]"]').eq(currentIndex).val(ui.item.name);
            $('input[name="copyToType[]"]').eq(currentIndex).val(ui.item.model);
        }
	});
});
$( function() {
    $( ".cust" ).autocomplete({
		source: 'Linence_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            console.log(ui.item);
            $('#name').val(ui.item.name);
            $('#customerId').val(ui.item.id);
            $('#customerType').val(ui.item.model);
            $("#nationalId").val(ui.item.national_id);
            
           }
	    });
    });
function update($id)
{
    
    let jobLic_id = $id;
    $.ajax({
    type: 'get', // the method (could be GET btw)
    url: "jobLic_info",

        data: {
            jobLic_id: jobLic_id,
        },
        success:function(response){
            console.log(response.info)
        $('#customerId').val(response.info.user_id);
        $('#jobLicId').val(response.info.id);
        
        $('#name').val(response.info.name);
        $("#address").val(response.info.address);
        $("#street").val(response.info.street);
        $("#lic_cat").val(response.info.lic_cat);
        $("#nationalId").val(response.info.nationalId);
        $("#lic_type").val(response.info.lic_type);
        $("#hadNo").val(response.info.hadNo);
        $("#lic_name").val(response.info.lic_name);
        $("#licNo").val(response.info.licNo);
        $("#waselNo").val(response.info.waselNo);   
        let date=(response.info.start_date)
        dates=""
        if(date){
        dates=date.split("-");
        dates = dates[2]+'/'+dates[1]+'/'+dates[0];}
        $("#start_date").val(dates);
        
         date=(response.info.end_date)
        dates=""
        if(date){
        dates=date.split("-");
        dates = dates[2]+'/'+dates[1]+'/'+dates[0];}
        $("#end_date").val(dates);
        
         date=(response.info.wasel_date)
        dates=""
        if(date){
        dates=date.split("-");
        dates = dates[2]+'/'+dates[1]+'/'+dates[0];}
        $("#wasel_date").val(dates);
        
       
        },
    });
}
</script>

@endsection

