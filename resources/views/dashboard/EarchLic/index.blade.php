@extends('layouts.admin')
@section('search')
    <li class="dropdown dropdown-language nav-item hideMob">
        <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
    </li>
@endsection
@section('content')

<link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css"/>

<script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

<section class="horizontal-grid " id="horizontal-grid">

    <form method="post" id="setting_form" enctype="multipart/form-data">
        @csrf
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="row white-row">
                        <div class="col-sm-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                                        شهادة تسجيل  اراضي لاغراض للتسوية

                                    </h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body" style="padding-bottom: 0px;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">
															رقم الشهادة
														</span>
                                                            </div>
                                                            <input type="text" id="certid" class="form-control" name="certid">
                                                            <input type="hidden" id="id" name="id" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
        														<span class="input-group-text" id="basic-addon1">
        															تاريخ الشهادة
        														</span>
                                                            </div>
                                                            <input type="text" id="certdate" data-mask="00/00/0000" maxlength="10" class="form-control numFeild" name="certdate" autocomplete="off" value="<?php echo date('d/m/Y')?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">
															رقم الوصل
														</span>
                                                            </div>
                                                            <input type="text" id="recept_no" class="form-control" name="recept_no">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">
															مساحة القطعة م2
														</span>
                                                            </div>
                                                            <input type="text" id="peacem" class="form-control numFeild" name="peacem" value="0" onblur="$('.finalPrice').text(((parseFloat($('#peacem').val())*0.2)+parseFloat($('#fees').val())).toFixed(2))">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
        														<span class="input-group-text" id="basic-addon1">
        															رسم الشهادة
        														</span>
                                                            </div>
                                                            <input type="text" id="fees" class="form-control numFeild" name="fees" value="50" onblur="$('.finalPrice').text(((parseFloat($('#peacem').val())*0.2)+parseFloat($('#fees').val())).toFixed(2))">
                                                            <div class="input-group-prepend">
        														<span class="input-group-text finalPrice" id="basic-addon1">
        															المبلغ
        														</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-7 col-md-12 pr-s-12" style="">
                                                    <div class="form-group">
                                                        <div class="input-group mt-s-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                  اسم المشروع
                                                                </span>
                                                            </div> 
                                                            <input required="" type="text" id="projectname" class="form-control projectname ui-autocomplete-input" name="projectname" autocomplete="off">
                                                            <input type="hidden" id="projectid" name="projectid"  autocomplete="off">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-12 pr-s-12" style="">
                                                    <div class="form-group">
                                                        <div class="input-group mt-s-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                  الممول
                                                                </span>
                                                            </div>
                                                            <input required="" type="text" id="sponser" class="form-control alphaFeild ccac ui-autocomplete-input" name="sponser" autocomplete="off">
                                                            <input type="hidden" id="sponserid" name="sponserid" autocomplete="off">
                                                            <input type="hidden" id="sponsermodel" name="sponsermodel" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <h4 class="card-title">
                                        الأرض تحت تصرف
                                    </h4>
                                    <!-- <a class="heading-elements-toggle">
                                        <i class="ft-align-justify font-medium-3"></i></a> -->

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12" style="">
                                                <table style="width:100%; margin-top: -10px;" class="detailsTB table tbl1">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" width="200px" style="text-align: center!important; color: white;">الاسم</th>
                                                        <th scope="col" width="50px" style="text-align: center!important; color: white;">رقم الحوض</th>
                                                        <th scope="col" width="50px" style="text-align: center!important; color: white;">رقم القطعة</th>
                                                        <th scope="col" style="text-align: center!important; color: white;"></th>
                                                        <th scope="col" style="text-align: center!important; color: white;"></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" id="Name1" name="NameARList[]" class="form-control cac1 ui-autocomplete-input" placeholder="الاسم" autocomplete="off">
                                                            <input type="hidden" name="id1[]" id="id1">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="sequareNo1" name="sequareNo[]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="peaceNo1" name="peaceNo[]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="s_notes1" name="s_notes[]" class="form-control ">
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="delegateList">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="card-header">
                                    <h4 class="card-title">
                                        المدعيين بقطعة الارض لاغراض اعمال تسوية الاراضي
                                    </h4>
                                    <!-- <a class="heading-elements-toggle">
                                        <i class="ft-align-justify font-medium-3"></i></a> -->

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group mt-s-6">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                رقم الحوض
                                                                </span>
                                                        </div>
                                                        <input required="" type="text" id="sequareNo_2" class="form-control" name="sequareNo_2">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group mt-s-6">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                رقم القطعة
                                                                </span>
                                                        </div>
                                                        <input required="" type="text" id="peaceNo_2" class="form-control " name="peaceNo_2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-12 pr-s-12" style="">
                                                <div class="form-group">
                                                    <div class="input-group mt-s-6">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                اسم المنطقة
                                                                </span>
                                                        </div>
                                                        <input required="" type="text" id="areaname2" class="form-control" name="areaname2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12" style="">
                                                <table style="width:100%; margin-top: -10px;" class="detailsTB table tbl2">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" width="200px" style="text-align: center!important; color: white;">اسم المدعي</th>
                                                        <th scope="col" width="120px" style="text-align: center!important; color: white;">رقم الهوية</th>
                                                        <th scope="col" style="text-align: center!important; color: white;">ملاحظات</th>
                                                        <th scope="col" style="text-align: center!important; color: white;"></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" id="name2" name="name2[]" class="form-control cac2 ui-autocomplete-input" placeholder="الاسم" autocomplete="off">
                                                            <input type="hidden" name="id2[]" id="id2">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="ssn2" name="ssn[]" class="form-control numFeild">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="s_notes2" name="s_notes2[]" class="form-control ">
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="OwnerList">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 col-md-12">
                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">معاينة</h4>
                                    <!-- <a class="heading-elements-toggle">
                                        <i class="ft-align-justify font-medium-3"></i></a> -->

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div id="forPrint">



                                        </div>


                                        <div class="form-actions" style="border-top:0px;">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary" id="saveBtn">حفظ وطباعة <i class="fa fa-print"></i></button>
                                                <button id="editBtn" style="display:none;" class="btn btn-primary save-data">

                                                    تعديل
            
                                                    <i class="ft-thumbs-up position-right"></i>
            
                                                </button> 
                                                <button type="reset" onclick="$('#OwnerList').html(''); $('#delegateList').html(''); $('#id').val('0');$('#projectid').val('');$('#id1').val('');$('#id2').val('');" class="btn btn-warning">اعادة تعيين <i onclick="reset();" class="ft-refresh-cw position-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </form>
</section>
@include('dashboard.component.fetch_table')
@stop
@section('script')


<script>

// var customerName='';
// var nationalId=0;


$(document).ready(
    
    
    
    function(){
        
        $( ".ccac" ).autocomplete({
            source: "orginzation_auto_complete",
            minLength: 2,
            select: function( event, ui ) {
                $("#sponser").val(ui.item.name)
                $("#sponsermodel").val(ui.item.model)
                $("#sponserid").val(ui.item.id)
                }
        });
        
        $( ".projectname" ).autocomplete({
            source: "project_auto_complete",
            minLength: 2,
            select: function( event, ui ) {
                $("#projectname").val(ui.item.name)
                $("#projectid").val(ui.item.id)
            }
        });
        $( ".cac1" ).autocomplete({
            source: "subscribe_auto_complete",
            minLength: 2,
            select: function( event, ui ) {
                $("#name2").val(ui.item.name);
                $("#ssn2").val(ui.item.national_id);
                $("#id2").val(ui.item.id)
                $("#id1").val(ui.item.id)
            }
        });
        
        $( ".cac2" ).autocomplete({
            source: "subscribe_auto_complete",
            minLength: 2,
            select: function( event, ui ) {
                //$("#NameAR").val(ui.item.label)
                $("#id2").val(ui.item.id)
                $("#ssn2").val(ui.item.NationalID)
            
            }
        });
        
        $("#sequareNo1").on('change',function(){
            $("#sequareNo_2").val($('#sequareNo1').val());
        })
        $("#peaceNo1").on('change',function(){
            $("#peaceNo_2").val($('#peaceNo1').val());
        })
        
        $("#s_notes1").on('blur',function(){
            $("#delegateList").append('<tr>'    
                                        +'<td>'+$('#Name1').val()
                                        +'    <input type="hidden" name="NameARList[]" class="form-control" value="'+$('#Name1').val()+'">'
                                        +'    <input type="hidden" name="id1[]" value="'+$('#id1').val()+'">'
                                        +'</td>'
                                        +'<td>'+$('#sequareNo1').val()
                                        +'    <input type="hidden" value="'+$('#sequareNo1').val()+'" name="sequareNo[]" class="form-control">'
                                        +'</td>'
                                        +'<td>'+$('#peaceNo1').val()
                                        +'    <input type="hidden" value="'+$('#peaceNo1').val()+'" name="peaceNo[]" class="form-control">'
                                        +' </td>'
                                        +'<td>'+$('#s_notes1').val()
                                        +'    <input type="hidden" value="'+$('#s_notes1').val()+'" name="s_notes[]" class="form-control ">'
                                        +' </td>'
                                        +'    <td>'
                                        +'         <div class="input-group-append" style="margin-left: 0px !important">'
                                        +'          <span class="input-group-text input-group-text2" style="margin-left: 0;" onclick="$(this).parent().parent().parent().remove();DrawPreview()">'
                                        +'              <i class="fa fa-trash" id="delLicRec"></i>   '             				  
                                        +'          </span>'
                                        +'       </div>'
                                        +'   </td>'
                                        +'</tr>')
            $('#Name1').val('');
            $('#sequareNo1').val('');
            $('#peaceNo1').val('');
            $('#s_notes1').val('')
            document.getElementById('Name1').focus
            DrawPreview()
        })
                
        $("#s_notes2").on('blur',function(){
            
            $("#OwnerList").append('<tr>'    
                                    +'    <td>'+$('#name2').val()
                                    +'          <input type="hidden" value="'+$('#name2').val()+'" name="name2[]" class="form-control cac1" placeholder="الاسم" autocomplete="off">'
                                    +'          <input type="hidden" value="'+$('#id2').val()+'" name="id2[]">'
                                    +'      </td>'
                                    +'      <td>'+$('#ssn2').val()
                                    +'          <input type="hidden" value="'+$('#ssn2').val()+'" name="ssn[]" class="form-control numFeild">'
                                    +'      </td>'
                                    +'      <td>'+$('#s_notes2').val()
                                    +'          <input type="hidden" value="'+$('#s_notes2').val()+'" name="s_notes2[]" class="form-control ">'
                                    +'      </td>'
                                    +'    <td>'
                                    +'    <div class="input-group-append" style="margin-left: 0px !important">'
                                    +'          <span class="input-group-text input-group-text2" style="margin-left: 0;" onclick="$(this).parent().parent().parent().remove();DrawPreview()">'
                                    +'              <i class="fa fa-trash" id="delLicRec"></i>   '             				  
                                    +'          </span>'
                                    +'       </div>'
                                    +'   </td>'
                                    +'</tr>');
                $('#name2').val('');
                $('#ssn2').val('');
                $('#s_notes2').val('');
            document.getElementById('name2').focus
            DrawPreview()
        })   
        
        $("input").blur(function(){
            DrawPreview()
        })
        $("input").keypress(function(){
            DrawPreview()
        })
        $("input").keyup(function(){
            DrawPreview()
        })
        $("input").change(function(){
            DrawPreview()
        })
    
        // $("#formData").on('submit',function(){
        //     var formData = new FormData($("#formData")[0]);
        //     $.ajax({
        //         url: "saveEarchLic",
        //         type: 'POST',
        //         data: formData,
        //         dataType:"json",
        //         async: true,
        //         success: function (data) {
        //             if(data.status.success){
        //                 self.location=realPath+'c_license/printLicEarth/'+data.appid
        //             }
        //             else {
        //                 $(".alert-success").addClass("hide");
        //                 $(".alert-danger").removeClass('hide');
        //                 $("#errMsg").text(data.status.msg)
        //             }
        //             $(".loader").addClass('hide');
        //             $(".form-actions").removeClass('hide');
        //         },
        //         cache: false,
        //         contentType: false,
        //         processData: false
        //     });
        // })
    });
    
                
    function  DrawPreview(){
        hdr='<table width="100%" dir="rtl">'
            +'<tr>'
            +'<td width="33%">التاريخ: '
            +$('#certdate').val()
            +'</td>'
            +'<td width="34%"></td>'
            +'<td width="33%">وصول دفع رقم: '
            +$('#recept_no').val()
            +'</td>'
            +'</tr>'
            +'<tr>'
            +'<td width="33%">الرقم: '
            +$('#certid').val()
            +'</td>'
            +'<td width="34%"></td>'
            +'<td width="33%">'
            +'<span>  المساحة م2  :</span>'
            +'  '+$('#peacem').val()
            +'</td>'
            +'</tr>'
            +'<tr>'
            +'<td width="33%">اسم المشروع: '
            +$('#projectname').val()
            +'</td>'
            +'<td width="34%"></td>'
            +'<td width="33%">رسوم شهادة التسجيل (شيكل): '
            +$('#fees').val()
            +'</td>'
            +'</tr>'
            +'<tr>'
            +'<td width="33%">الممول: '
            +$('#sponser').val()
            +'</td>'
            +'<td width="34%"></td>'
            +'<td width="33%">المبلغ المطلوب للدفع: '
            +$('.finalPrice').html()
            +' شيكل</td>'
            +'</tr>'
        +'</table>';
        
        part1='<table width="100%" dir="rtl">'
            +'<tr>'
            +'<th colspan="5" style="background:white;"> '
            +'<h2 style="font-size: 18px !important;font-weight: bold;">تشهد بلدية اذنا بان قطعة الارض وحسب سجلات البلدية التالية هي ملك وبتصرف التالية اسمائهم :  								</h2>'
            +'</td>'
            +'</tr>'
            +'<tr>';
        var NameARList=$('input[name^="NameARList"]');
        var sequareNo=$('input[name^="sequareNo"]');
        var peaceNo=$('input[name^="peaceNo"]');
        var s_notes=$('input[name^="s_notes"]');
        
            part1+='<tr>'
                    +'    <th scope="col" width="50px"style="background-color: #e7e7e7; border: 1px solid #000000;">#</th>'
                    +'    <th scope="col" width="200px"style="background-color: #e7e7e7; border: 1px solid #000000;">الاسم</th>'
                    +'    <th scope="col" width="70px"style="background-color: #e7e7e7; border: 1px solid #000000;">رقم الحوض</th>'
                    +'    <th scope="col" width="70px"style="background-color: #e7e7e7; border: 1px solid #000000;">رقم القطعة</th>'
                    +'    <th scope="col"style="background-color: #e7e7e7; border: 1px solid #000000;"></th>'
                    +'</tr>'
        flag=0;
        j=0;
        for(i=0;i<NameARList.length;i++){
            if($(NameARList[i]).val().length>0){
                part1+='<tr>'
                        +'    <td scope="col" width="50px" style="border: 1px solid #000000;">'+(j+1)+'</td>'
                        +'    <td scope="col" width="200px" style="border: 1px solid #000000;">'+$(NameARList[i]).val()+'</td>'
                        +'    <td scope="col" width="70px" style="border: 1px solid #000000;">'+$(sequareNo[i]).val()+'</td>'
                        +'    <td scope="col" width="70px" style="border: 1px solid #000000;">'+$(peaceNo[i]).val()+'</td>'
                        +'    <td scope="col" style="border: 1px solid #000000;">'+$(s_notes[i]).val()+'</td>'
                        +'</tr>';
                        j++
                flag=1;
            }
        }
        if(flag==0){
            part1+='<tr>'
                        +'<td colspan="5" style="border: 1px solid #000000;"> '
                        +'<h2 style="font-size: 18px !important;font-weight: bold;"> لا يوجد إدخالات</h2>'
                        +'</td>'
                        +'</tr>'
                    +'<tr>';
        }
        part1+='</table>';
        
        part1+='<table width="100%" dir="rtl">'
            +'<tr>'
            +'<th colspan="8" style="background:white;"> '
            +'<h2 style="font-size: 18px !important;font-weight: bold;">وقد اعطيت هذه الشهادة بناءا على طلب المدعيين بقطعة الارض لاغراض اعمال تسوية الاراضي وهم :								</h2>'
            +'</td>'
            +'</tr>'
            +'<tr>';
        var name2=$('input[name^="name2"]');
        var ssn=$('input[name^="ssn"]');
        var s_notes2=$('input[name^="s_notes2"]');
        
            part1+='<tr>'
                    +'    <th scope="col" width="50px"style="background-color: #e7e7e7; border: 1px solid #000000;">#</th>'
                    +'    <th scope="col" width="200px"style="background-color: #e7e7e7; border: 1px solid #000000;">اسم المدعي</th>'
                    +'    <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم الهوية</th>'
                    +'    <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم الحوض<br />حسب سجلات<br />التسوية</th>'
                    +'    <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">رقم قطعة<br />حسب سجلات<br />التسوية</th>'
                    +'    <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">مساحة القطعة م²</th>'
                    +'    <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">اسم المنطقة	</th>'
                    +'    <th scope="col" style="background-color: #e7e7e7; border: 1px solid #000000;">ملاحظات</th>'
                    +'</tr>'
        flag=0;
        j=0;
        for(i=0;i<name2.length;i++){
            if($(name2[i]).val().length>0){
                part1+='<tr>'
                        +'    <td scope="col" width="50px" style="border: 1px solid #000000;">'+(j+1)+'</td>'
                        +'    <td scope="col" width="200px" style="border: 1px solid #000000;">'+$(name2[i]).val()+'</td>'
                        +'    <td scope="col" style="border: 1px solid #000000;">'+$(ssn[i]).val()+'</td>'
                        +'    <td scope="col" style="border: 1px solid #000000;">'+$('#sequareNo_2').val()+'</td>'
                        +'    <td scope="col" style="border: 1px solid #000000;">'+$('#peaceNo_2').val()+'</td>'
                        +'    <td scope="col" style="border: 1px solid #000000;">'+$('#peacem').val()+'</td>'
                        +'    <td scope="col" style="border: 1px solid #000000;">'+$('#areaname2').val()+'</td>'
                        +'    <td scope="col" style="border: 1px solid #000000;">'+$(s_notes2[i]).val()+'</td>'
                        +'</tr>';
                        j++
                flag=1;
            }
        }
        if(flag==0){
            part1+='<tr>'
                        +'<td colspan="8" style="border: 1px solid #000000;"> '
                        +'<h2 style="font-size: 18px !important;font-weight: bold;"> لا يوجد إدخالات</h2>'
                        +'</td>'
                        +'</tr>'
                    +'<tr>';
        }
        part1+='</table>';
        footer='<div class="row">'
                +'<div class="col-sm-12">'
                    +'ملاحظة : ان تسجيل الادعاء بمساحة معينة في هذه الشهادة لا يعني بالضرورة صدور سند تسجيل الارض (الطابو) بنفس المساحة حيث ان هذه المساحة قابلة للنقصان نتيجة اقتطاع حرم طريق او وجود طريق مقترحة'
                +'</div>'
            +'</div>'
        $("#forPrint").html(hdr+part1+footer);
        
    }


    $('#setting_form').submit(function(e) {
        e.preventDefault();
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');     
        let formData = new FormData(this);
            $( "#certid" ).removeClass( "error" );
            $( "#certdate" ).removeClass( "error" );
            $( "#peacem" ).removeClass( "error" );
            $( "#fees" ).removeClass( "error" );
            $( "#sequareNo_2" ).removeClass( "error" );
            $( "#peaceNo_2" ).removeClass( "error" );


       $.ajax({
            type:'POST',
            url: "saveEarchLic",
            data: formData,
            contentType: false,
            processData: false,
            
            success: (response) => {
            $('.wtbl').DataTable().ajax.reload();
            $(".form-actions").removeClass('hide');
            $(".loader").addClass('hide');
            if (response) {
                
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: '{{trans('admin.data_added')}}',
                    showConfirmButton: false,
                    timer: 1500
				})

                //manualy empty tabls content//////
                    $('#OwnerList').html('');
                    $('#delegateList').html('');
                //////////////////////////////////
                this.reset();
                $('#OwnerList').html('');
                $('#delegateList').html('');
                $('#id').val('0');
                $('#projectid').val('');
                $('#id1').val('');
                $('#id2').val('');
                let url=`{{ route('admin.dashboard') }}/printLicEarth/${response.id}`
                window.open(url, '_blank');
                $('#editBtn').css('display','none');
                $('#saveBtn').css('display','inline-block');
            }
           },
            error: function(response){
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide'); 
                //   console.log(response);
                if(response.responseJSON.errors.certid){
                    $( "#certid" ).addClass( "error" );
                }
                if(response.responseJSON.errors.peacem){
                    $( "#peacem" ).addClass( "error" );
                }
                if(response.responseJSON.errors.fees){
                    $( "#fees" ).addClass( "error" );
                }
                if(response.responseJSON.errors.sequareNo_2){
                    $( "#sequareNo_2" ).addClass( "error" );
                }
                if(response.responseJSON.errors.peaceNo_2){
                    $( "#peaceNo_2" ).addClass( "error" );
                }
                // 
                if(response.responseJSON.errors.certid || response.responseJSON.errors.peacem|| response.responseJSON.errors.fees|| response.responseJSON.errors.sequareNo_2|| response.responseJSON.errors.peaceNo_2){
                	Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: 'يرجى تعبئة الحقول الإجبارية',
        				showConfirmButton: false,
        				timer: 1500
        				})
                }else{
        			Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: '{{trans('admin.error_save')}}',
        				showConfirmButton: false,
        				timer: 1500
        				})
                }
            }
        });
    });
    
    function update($id)
    {
        $('#saveBtn').css('display','none');
        $('#editBtn').css('display','inline-block');
        let id = $id;
        $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "earchLic_info",
            data: {
                id: id,
            },
            success:function(response){
                // console.log(response);
                    
                $('#certid').val(response.cert_no);
                $('#id').val(response.id);
                $('#recept_no').val(response.wasl_no);
                $('#peacem').val(response.area);
                $('#fees').val(response.cert_cost);
                date='';
                if(response.date!=null && response.date!=''){
                    rowdate=response.date.split('-');
                    date=rowdate[2]+'/'+rowdate[1]+'/'+rowdate[0];
                }
                
                $('#certdate').val(date);
                $('#projectname').val(response.proj_name);
                $('#projectid').val(response.proj_id);
                $('#sponserid').val(response.sponser_id);
                $('#sponsermodel').val(response.sponser_model);
                $('#sponser').val(response.sponser_name);
                $('#areaname2').val(response.area_name);
                
                if(response.hod_no.length>0)
                    $('#sequareNo_2').val(response.hod_no[(response.hod_no.length-1)]);
                
                if(response.pice_no.length>0)
                    $('#peaceNo_2').val(response.pice_no[(response.pice_no.length-1)]);
                
                
                
                var len = response.user_name.length;
                $('#delegateList').html('');
                $('#OwnerList').html('');
                
                for(var i=0; i<len; i++){
                    
                    var name = response.user_name[i];
                    var id = response.user_id[i];
                    var pice_no = response.pice_no[i];
                    var hod_no = response.hod_no[i];
                    var notes1 = response.notes1[i];
                    var notes2 = response.notes2[i];
                    var user_national = response.user_national[i];
                    if(name!=null){
                        $("#delegateList").append('<tr>'    
                                            +'<td>'+name
                                            +'    <input type="hidden" name="NameARList[]" class="form-control" value="'+name+'">'
                                            +'    <input type="hidden" name="id1[]" value="'+id+'">'
                                            +'</td>'
                                            +'<td>'+hod_no
                                            +'    <input type="hidden" value="'+hod_no+'" name="sequareNo[]" class="form-control">'
                                            +'</td>'
                                            +'<td>'+pice_no
                                            +'    <input type="hidden" value="'+pice_no+'" name="peaceNo[]" class="form-control">'
                                            +' </td>'
                                            +'<td>'+notes1
                                            +'    <input type="hidden" value="'+notes1+'" name="s_notes[]" class="form-control ">'
                                            +' </td>'
                                            +'    <td>'
                                            +'         <div class="input-group-append" style="margin-left: 0px !important">'
                                            +'          <span class="input-group-text input-group-text2" style="margin-left: 0;" onclick="$(this).parent().parent().parent().remove();DrawPreview()">'
                                            +'              <i class="fa fa-trash" id="delLicRec"></i>   '             				  
                                            +'          </span>'
                                            +'       </div>'
                                            +'   </td>'
                                            +'</tr>')
                                            
                        $("#OwnerList").append('<tr>'    
                                        +'    <td>'+name
                                        +'          <input type="hidden" value="'+name+'" name="name2[]" class="form-control cac1" placeholder="الاسم" autocomplete="off">'
                                        +'          <input type="hidden" value="'+id+'" name="id2[]">'
                                        +'      </td>'
                                        +'      <td>'+user_national
                                        +'          <input type="hidden" value="'+user_national+'" name="ssn[]" class="form-control numFeild">'
                                        +'      </td>'
                                        +'      <td>'+notes2
                                        +'          <input type="hidden" value="'+notes2+'" name="s_notes2[]" class="form-control ">'
                                        +'      </td>'
                                        +'    <td>'
                                        +'    <div class="input-group-append" style="margin-left: 0px !important">'
                                        +'          <span class="input-group-text input-group-text2" style="margin-left: 0;" onclick="$(this).parent().parent().parent().remove();DrawPreview()">'
                                        +'              <i class="fa fa-trash" id="delLicRec"></i>   '             				  
                                        +'          </span>'
                                        +'       </div>'
                                        +'   </td>'
                                        +'</tr>');
                                        
                    }
                }
                
                DrawPreview();
                window.scrollTo(0, 0);
            },
        });
    }
    
    function delete_earchLic($id) {
            if(confirm('هل انت متاكد من حذف الشهادة؟ لن يمكنك استرجاعه فيما بعد')){
            let id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({

                type: 'post',

                // the method (could be GET btw)

                url: "earchLic_delete",
                
                data: {

                    id: id,
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


                },

                error: function(response) {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: 'خطاء فى عملية الحذف',

                        showConfirmButton: false,

                        timer: 1500

                    }) 

                }

            });
            return true;
            }
            return false;
        }


</script>

@endsection
