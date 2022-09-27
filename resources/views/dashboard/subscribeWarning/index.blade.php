@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection

@section('content')
<style>
    .detailsTB th{
        color:#ffffff;
    }
      .detailsTB th,.detailsTB td{
        text-align:right !important;
        
    }
    .recList>tr>td{
        font-size:12px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding-bottom: 5px !important;
}
.dataTables_filter{
    margin-top:-15px;
}
.even{
    background-color:#D7EDF9 !important;
}
.dt-buttons
{
    text-align: left;
    display: inline;
    float: left;
    position: relative;
    bottom: 10px;
    margin-right: 10px;
}

</style>

<div class="content-body">
    <section id="hidden-label-form-layouts">
    <form method="post" id="formData" enctype="multipart/form-data">
        @csrf

        <section class="horizontal-grid" id="horizontal-grid"   >
                    <div class="row white-row" >
                        <div class="col-sm-12">
                            <div class="card leftSide">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <img src="https://q.expand.ps/images/personal-information.png" width="32" height="32">
                                         اخطارات المواطنين
                                    </h4>
                                    <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">
                                        الحالة
                                    </div>
                                    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
                                        <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked/>
                                    </div>
                                </div>
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="card-content collapse show" >
                                    <div class="card-body" style="padding-bottom: 0px;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-12 pr-0 pr-s-12"  >
                                                    <div class="form-group">
                                                        <div class="input-group w-s-87">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                     اسم الواطن
                                                                </span>
                                                            </div>
                                                            <input type="text" id="subscriberName" class="form-control alphaFeild cust" placeholder="اسم المسن" name="subscriberName">
                                                            <input type="hidden" id="subscriberID" name="subscriberID">
                                                            <input type="hidden" id="warningId" name="warningId">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12" style="padding-right: 0px;">

                                                    <div class="form-group">
                                            
                                                        <div class="input-group">
                                            
                                                            <div class="input-group-prepend">
                                            
                                                              <span class="input-group-text " id="basic-addon1">
                                            
                                                                التاريخ
                                            
                                                              </span>
                                            
                                                            </div>
                                            
                                                            <input id="date" name="date" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid selectFullCorner" placeholder="dd/mm/yyyy" autocomplete="off">
                                                           
                                                        </div>
                                            
                                                    </div>
                                            
                                                </div>
                                                
                                                <div class="col-lg-2 col-md-12" style="padding-right: 0px;">

                                                    <div class="form-group">
                                            
                                                        <div class="input-group" >
                                            
                                                            <div class="input-group-prepend">
                                            
                                                              <span class="input-group-text " id="basic-addon1" style="height: 33px !important;">
                                            
                                                                نوع الاخطار 
                                            
                                                              </span>
                                            
                                                            </div>
                                                            <select id="CurrencyID" name="CurrencyID" type="text" class="form-control valid" style="height: 33px !important;" aria-invalid="false">
                                            
                                                                <option value="0"> اختر </option>
                                            
                                                            </select>
                                            
                                                            <div class="input-group-append hidden-xs hidden-sm">
                                            
                                                                <div class="input-group-append" onclick="ShowConstantModal(30,'ownType','نوع الاخطار')">
                                            
                                                                    <span class="input-group-text input-group-text2">
                                            
                                                                        <i class="fa fa-external-link"></i>
                                            
                                                                    </span>
                                            
                                                                </div>
                                            
                                                            </div>
                                            
                                                        </div>
                                            
                                                    </div>
                                            
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <table style="width:100%; margin-top: -10px;" class="detailsTB table ">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="col">
                                                                        سبب الاخطار
                                                                    </th>
                                                                    <th scope="col"> 
                                                                        حالة الاخطار
                                                                    </th>
                                                                    <th scope="col">
                                                                        سبب ازالة لاخطار
                                                                    </th>
                                                                    <th scope="col">
                                                                        تاريخ ازالة الاخطار
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%;">
                                                                        <input id="date" name="date"  class="form-control eng-sm singledate valid selectFullCorner" placeholder="سبب الاخطار" autocomplete="off">
                                                                    </td>
                                                                    <td width="10%;">
                                                                        <div class="form-group form-group1" style="margin-bottom: 0px;">
                                                                            <div class="input-group">
                                                                                
                                                                                <select id="paymentOrg" name="paymentOrg" class="form-control paymentOrg">
                                                                                    <option value="0">اختر</option>
                                                                                </select>
                                                                                        
                                                                                <div class="input-group-append" onclick="ShowConstantModal(211,'paymentOrg','حالة الاخطار')" style="cursor:pointer;margin-left: 0px !important;">
                                                                                    <span class="input-group-text input-group-text2">
                                                                                        <i class="fa fa-external-link"></i>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="25%;">
                                                                        <input id="payment" name="payment"  class="form-control eng-sm singledate valid selectFullCorner" placeholder="سبب ازالة الاخطار" autocomplete="off">
                                                                    </td>
                                                                    <td width="10%;">
                                                                        
                                                                        <input id="date" name="date" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid selectFullCorner" placeholder="dd/mm/yyyy" autocomplete="off">
                                                                          
                                                                    </td>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="padding-right: 0px;">
                                                 <div class="row attachs-body repAttach" style="margin-left: 25px;">
                                                    <div class="form-group col-12 mb-2" style="padding-right: 0px;">
                                                
                                                        <ol class="vasType 1vas addAttatch1">
                                                            <li style="font-size: 17px !important;color:#000000">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" id="attachName1[]" name="attachName1[]" class="form-control attachName1" placeholder="أخل اسم المرفق"
                                                                          value="">
                                                                    </div>
                                                                    <div class="col-sm-5 attach_row1_1">
                                                                        
                                                                    </div>
                                                                    <div>
                                                                        <img src="{{ asset('assets/images/ico/upload.png') }}" width="40"
                                                                            height="40" style="cursor:pointer"
                                                                            onclick="$('#currFile1').val(1);$('#attachfile1').trigger('click');">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <input type="hidden" id="currFile1" name="currFile1">
                                                        <input type="hidden" id="attachfileName" name="attachfileName" value="attachfile1">
                                                        <input type="file" style="display:none" id="attachfile1" name="attachfile1" onchange="startUpload1('formData')">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="text-align: center;">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info" id="savebtn">
                                                        إضافة سند قبض
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

      </form>
    </section>
</div>
<input type="hidden" id="type" name="type" value="">
<div class="content-body resultTblaa">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" /> 
                             سندات القبض  
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                        <thead>
                                            <tr>
                                                <th width="2%;">
                                                   #
                                                </th>
                                                <th   width="12%;">
                                                    اسم المسن
                                                </th>
                                                <th  width="8%;">
                                                     المبلغ المستحق 
                                                 </th>
                                                <th  width="8%;">
                                                    المبلغ المقبوض
                                                </th>
                                                <th  width="8%;">
                                                    المبلغ الباقى
                                                </th>
                                                <th  width="10%;">
                                                    التاريخ
                                                </th>
                                                <th  width="10%;">
                                                    الموظف
                                                </th>
                                                <th  width="8%;">
                                                    رقم السند
                                                </th>
                                                <th width="20%;">
                                                    ملاحظات
                                                </th>
                                                <th width="8%;">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="recListaa">
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>  
@section('script')
<script>


function resetFunction(){

    $(".addAttatch1").html('');
    
    attachments='<li style="font-size: 17px !important;color:#000000">'
                    +'<div class="row">'
                    +    '<div class="col-sm-6" >'
                    +        '<input type="text" reuired="" id="attachName1[]" name="attachName1[]" class="form-control attachName1" >'
                    +    '</div>'
                    +    '<div class="attdocmob col-sm-5 attach_row1_1" >'
                    +'</div>' 
                    +'<div>' 
                    +'<img src="{{ asset('assets/images/ico/upload.png') }}" width="40" height="40" style="cursor:pointer" onclick="$(\'#currFile1\').val(1);$(\'#attachfile1\').trigger(\'click\');  return false">' 
                    +'</div>'
                    +'</div>' 
                    +'</li>';
                    
}

attach_index1=2;

    function addNewAttatch1() {

        if($(".attachName1").last().val().length>0){
            var row = '<li style="font-size: 17px !important;color:#000000">' +
                '<div class="row">' +
                '<div class="col-sm-6">' +
                '<input type="text" id="attachName1[]" name="attachName1[]" class="form-control attachName1">' +
                '</div>' +
                '<div class="col-sm-5 attach_row1_'+attach_index1+'">' +
                //'<input type="text" name="feesValue2" class="form-control" disabled="disabled">' +
                '</div>' +
                '<div>' +
                '<img src="{{ asset('assets/images/ico/upload.png') }}" width="40" height="40" style="cursor:pointer" onclick="$(\'#currFile1\').val('+attach_index1+');$(\'#attachfile1\').trigger(\'click\');  return false">' +
                
                '</div>' +
                '<div>' +
                '<i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; " onclick="$(this).parent().parent().parent().remove()"></i>'+
                '</div>' +
                ' </div>' +
               
                ' </li>'
                attach_index1++
            $(".addAttatch1").append(row)
        }
    }

$('#formData').submit(function(e) {
    $(".loader").removeClass('hide');
    $("#savebtn").addClass('hide');
    
    // $( "#customerName" ).removeClass( "error" );
    // $( "#licNo" ).removeClass( "error" );
       e.preventDefault();
       let formData = new FormData(this);

       $.ajax({
          type:'POST',
          url: "store_payment",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".loader").addClass('hide');
            $("#savebtn").removeClass('hide');
            
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
				
				$('#aged_id').val('');
				$('#paymentId').val('');
				$('#empId').val('');
				$('#orgId').val('');
               resetFunction();
               this.reset();
               
             }
              
           },
           error: function(response){
            $(".loader").addClass('hide');
            $("#savebtn").removeClass('hide');
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

function startUpload1(formDataStr)
    {
        id=$("#currFile1").val()
        // $('#feesText'+id).val($('#attachfile').val().split('\\').pop())
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".loader").removeClass('hide');
        // $(".form-actions").addClass('hide');
        var formData = new FormData($("#"+formDataStr)[0]);
        $.ajax({
            url: '{{url('ar/admin/uploadTicketAttach')}}',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                row='';
                console.log(data.all_files);
                if(data.all_files){
                    addNewAttatch1()
                    var j=0;
                    $actionBtn='';
                    for(j=0;j<data.all_files.length;j++){
                        $(".attach_row1_"+id).html('')
                        file=data.all_files[j]
                        shortCutName=data.all_files[j].real_name;
                        shortCutID=data.all_files[j].id;
                        urlfile='https://t.expand.ps/expand_repov1/public/';
                        console.log(urlfile);
                        urlfile+=data.all_files[j].url;
                        console.log(urlfile);
                         shortCutName=file.real_name;
                                shortCutName=shortCutName.substring(0, 20);
                                urlfile='https://t.expand.ps/expand_repov1/public/';
                                urlfile+=file.url;
                                if(file.extension=="jpg"||file.extension=="png")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/image.png';
                                else if(file.extension=="pdf")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/pdf.png';
                                else if(file.extension=="doc")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(file.extension=="excel"||file.extension=="xsc")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/excellogo.png';
                                else
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/file.png';
                                $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                    +'<div class="attach">'                                        
                                      +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'  <span class="attach-text">'+shortCutName+'</span>'
                                        +'    <img style="width: 20px;"src="'+fileimage+'">'
                                        +'</a>'
                                        +'<input type="hidden" id="attach_ids[]" name="attach_ids[]" value="'+file.id+'">'
                                    +'</div>'
                                    +'</div>'; 
                            $actionBtn += '</div>';
                            shortCutName=shortCutName.substring(0, 40)
                    }
                    $(".alert-danger").addClass("hide");
                    $(".alert-success").removeClass('hide');
                    $(".attach_row1_"+id).append($actionBtn)
                    $(".loader").addClass('hide');
                    
                    $(".group1").colorbox({rel:'group1'});
                    setTimeout(function(){
                        $(".alert-danger").addClass("hide");
                        $(".alert-success").addClass("hide");
                    },2000)
                }
                else {
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                }
                $(".loader").addClass('hide');
                // $(".form-actions").removeClass('hide');
            },
            error:function(){
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $(".loader").addClass('hide');
                // $(".form-actions").removeClass('hide');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    // $( function() {
      
    //     $( ".cust_auto" ).autocomplete({
    // 		source: 'orginzation_auto_complete',
    // 		minLength: 1,
    		
    //         select: function( event, ui ) {
    //           $('#paymentOrg').val(ui.item.name);
    //             $('#orgId').val(ui.item.id);
    //         }
    // 	});
    // });

    $( function() {
      
        $( ".emp_auto" ).autocomplete({
    		source: 'emp_auto_complete',
    		minLength: 1,
    		
            select: function( event, ui ) {
                $('#empName').val(ui.item.nick_name);
                $('#empId').val(ui.item.id);
            }
    	});
    });

    $( function() {
    $( ".cust" ).autocomplete({
		source: 'aged_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            console.log(ui.item);
            $('#agedName').val(ui.item.name);
            $('#aged_id').val(ui.item.id);
           }
	    });
    });
     function update($id)
    {
        
        let payment_id = $id;
        $.ajax({
        type: 'get', // the method (could be GET btw)
        url: "payment_info",
    
            data: {
                payment_id: payment_id,
            },
            success:function(response){
                $('#agedName').val(response.info.aged_name);
                $('#aged_id').val(response.info.aged_id);
                $('#paymentId').val(response.info.id);
                $('#AmountInNIS').val(response.info.payment_val);
                $('#CurrencyID').val(response.info.payment_cur);
                $('#empName').val(response.info.emp_name);
                $('#empId').val(response.info.emp_id);
                $('#payment').val(response.info.payment);
                $('#paymentNo').val(response.info.payment_no);
                $('#paymentOrg').val(response.info.payment_org);
                $('#rest').val(response.info.rest);
                $('#notes').val(response.info.notes);
                
                let date=(response.info.date)
                dates=""
                if(date){
                    dates=date.split("-");
                    dates = dates[2]+'/'+dates[1]+'/'+dates[0];
                    
                }
                $("#date").val(dates);
            
                attachments='';
                c=0;
                if(response.info.file_ids!=null){
                    for(c=0;c<response.info.Files.length;c++){
                        attach=response.info.Files[c];
                        // console.log('hiiiiiiiiii');
                        
                        attachments+='<li style="font-size: 17px !important;color:#000000">'
                            +'<div class="row">'
                            +    '<div class="col-sm-6" >'
                            +        '<input type="text" reuired="" id="attachName1[]" name="attachName1[]" class="form-control attachName1" value="'+attach.attachName+'">'
                            +    '</div>'
                            +    '<div class="attdocmob col-sm-5 attach_row_'+(c+1)+'" >'
                            +        '<div id="attach" class=" col-sm-12 ">'
                            +            '<div class="attach">'
                            +                '<a class="attach-close1" href="https://h.expand.ps/expand_repov1/public/'+attach.Files[0].url+'" style="color: #74798D; float:left;" target="_blank">'
                            +                    '<span class="attach-text hidemob">'+attach.Files[0].real_name+'</span>'      
                            +                    '<img style="width: 20px;" src="https://t.expand.ps/expand_repov1/public/assets/images/ico/image.png">'
                            +                '</a>'
                            +                '<input type="hidden" id="attach_ids[]" name="attach_ids[]" value="'+attach.attach_ids+'">'
                            +            '</div>'
                            +        '</div>'
                            +    '</div>'
                            +'<div>' 
                            +'<img src="{{ asset('assets/images/ico/upload.png') }}" width="40" height="40" style="cursor:pointer" onclick="$(\'#currFile1\').val('+attach_index1+');$(\'#attachfile1\').trigger(\'click\');  return false">' 
                    
                            +'</div>' 
                            +    '<div>'
                            +        '<i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; " onclick="$(this).parent().parent().parent().remove()"></i>'
                            +    '</div>' 
                                
                            +'</div>' 
                            +'</li>'
                        
                        
                    }
                }
                if(c==0){
                    c++;
                    attach_index1=c+1;
                }
                attachments+='<li style="font-size: 17px !important;color:#000000">'
                    +'<div class="row">'
                    +    '<div class="col-sm-6" >'
                    +        '<input type="text" reuired="" id="attachName1[]" name="attachName1[]" class="form-control attachName1" >'
                    +    '</div>'
                    +    '<div class="attdocmob col-sm-5 attach_row1_'+(c)+'" >'
                    +'</div>' 
                    +'<div>' 
                    +'<img src="{{ asset('assets/images/ico/upload.png') }}" width="40" height="40" style="cursor:pointer" onclick="$(\'#currFile1\').val('+c+');$(\'#attachfile1\').trigger(\'click\');  return false">' 
                    +'</div>'
                    +'</div>' 
                    +'</li>';
                $(".addAttatch1").html('')
                $(".addAttatch1").append(attachments)
                window.scrollTo(0, 0);
            
            },
        });
    }
    
    function delete_payment($id) {
            if(confirm('هل انت متاكد من حذف السند؟ لن يمكنك استرجاعه فيما بعد')){
            let payment_id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "payment_delete",
                
                data: {

                    payment_id: payment_id,
                    _token: _token,
                },

                success: function(response) {

                    $(".loader").addClass('hide');

                    $('.wtbl').DataTable().ajax.reload();

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: '{{ trans('admin.data_added') }}',

                        showConfirmButton: false,

                        timer: 1500

                    })

                    $("#ajaxform")[0].reset();

                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{ trans('admin.error_save') }}',

                        showConfirmButton: false,

                        timer: 1500

                    }) 

                    $("#formDataNameAR").on('keyup', function(e) {

                        if ($(this).val().length > 0) {

                            $("#formDataNameAR").removeClass("error");

                        }

                    });

                    if (response.responseJSON.errors.formDataNameAR) {

                        $("#formDataNameAR").addClass("error");

                    }

                }

            });
            return true;
            }
            return false;
        }
</script>
@endsection
@endsection
