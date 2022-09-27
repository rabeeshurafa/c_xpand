@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
<style>

    #recList tr:nth-child(even) {background: #D7EDF9 !important;vertical-align: top !important;}
    #recList tr:nth-child(odd) {background: #FFF;vertical-align: top !important;}
    #recList input,#recList textarea{
    background-color: transparent;
    font-size:13pt !important;
    border: 0px;}
    #recList td{
        vertical-align: top !important;;
    }
</style>
    <div role="tabpanel" class="tab-pane active show" id="activeIcon1" aria-labelledby="activeIcon1-tab1"
        aria-expanded="true">
        <form action="C_agenda/saveMeeting" id="formData" method="post" novalidate>
            <!-- horizontal grid start -->
            <input type="hidden" name="topicToEdit" id="topicToEdit" value="0">
            <section class="horizontal-grid" id="horizontal-grid">
                <div class="row white-row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body" style="padding-bottom: 0px;">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group validate">
                                                    <div class="input-group w-s-87">
                                                        <img src="{{ asset('assets/images/ico/meeting.png') }}"
                                                            style="float: right;height: 34px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                style="">
                                                                {{trans('archive.meeting_name')}}
                                                            </span>
                                                        </div>
                                                        <input type="hidden" id="meetingID" name="meetingID" value="0">
                                                        <input type="hidden" id="meetingIDEnd" name="meetingIDEnd" value="0">
                                                        <input type="hidden" id="lastorder" name="lastorder" value="1">
                                                        <select type="text" id="meetingTitleName" name="meetingTitleName"
                                                            class="form-control alphaFeild"
                                                            style="width: 115px;"
                                                            aria-invalid="false"
                                                            onchange="DisplayMeeting();$('.allmember').addClass('hide');$('.meeting'+$(this).val()).removeClass('hide')">
                                                            <option disabled selected> -- {{trans('admin.select')}} -- </option>
                                                            @if(count($agendaExtention)>0)
                                                                @foreach($agendaExtention as $agenda)
                                                                    @if(Auth()->user()->id==74 ||(is_array(json_decode($agenda->employee))?in_array(Auth()->user()->id,json_decode($agenda->employee)):array()))
                                                                    <option value="{{$agenda->id}}">{{$agenda->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            
                                                        </select>

                                                        <div class="input-group-append"
                                                            onclick="AddNew('meetingTitle','اضافة اجتماع')"
                                                            style="cursor:pointet;padding-left: 5px;;margin-left:0px !important;">
                                                            <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-external-link"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group validate">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                style="">
                                                                {{trans('archive.meeting_number')}}
                                                            </span>
                                                            <input id="agendaNum" name="agendaNum" maxlength="20"
                                                                class="form-control"
                                                                style="height: calc(2.3rem + 2px) !important;"
                                                                onblur="DisplayMeeting()" placeholder=" رقم الاجتماع" on
                                                                aria-invalid="false">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group validate">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                style="">
                                                                {{trans('archive.meeting_date')}}
                                                            </span>
                                                            <input type="text" id="agendaDate" name="agendaDate"
                                                                class="form-control eng-sm singledatewithDay"
                                                                data-mask="00/00/0000" autocomplete="off"
                                                                placeholder="" aria-describedby="basic-addon1"
                                                                aria-invalid="false" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 startMeeting1" style="text-align:center; display:none;">
                                                <button type="button" name="mainbutton" id="mainbutton"
                                                    class="btn btn-primary mainbutton" style="padding-top:5px;padding-bottom:5px"
                                                    onclick="startMeeting()">
                                                    بدء الجلسة
                                                </button>
                                            </div>
                                            <div class="col-md-3 startMeeting" style="text-align:center; display:none;">
                                                <!-- <div class="form-group ">
                                                        <div class="input-group w-s-87">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1" style="display:none;">
                                                                بحث في المواضيع 
                                                                </span>
                                                                <input type="text" id="TopicSrch" name="TopicSrch" class="form-control eng-sm " placeholder="أدخل نص البحث" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                <input id="TopicSrch" name="TopicSrch"
                                                    class="form-control hide SubPagea round ac1 ui-autocomplete-input"
                                                    placeholder="{{trans('archive.topic_search')}} " style="text-align: center;width: 350px; "
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="content-body">
                <!-- card actions section start -->
                <section id="card-actions">
                </section>
            </div>
            <div class="content-body">
                <!-- card actions section start -->
                <section id="card-actions">
                    <div class="row">
                        <div class="col-12" id="topicAppend1">
                                            <input type="hidden" name="fromname" id="fromname" value="subject1">
                            <table style="width:100%;direction: rtl;text-align: right;background-color: #ffffff;"
                                class="detailsTB table wtbl1">
                                <thead>
                                    <tr
                                        style="text-align:center !important;background-color: #0073AA; color:#ffffff; height:45px !important;">
                                        <th scope="col" style=" width: 30px;color:#ffffff; " class="th1"
                                            width="50">
                                            #
                                        </th>
                                        <th scope="col" class=" th1" style="text-align:center;color:#ffffff; "
                                            width="450px">
                                            {{trans('archive.topic')}}
                                        </th>
                                        <th scope="col" class=" th1" style="text-align:center;color:#ffffff; "
                                            width="200">
                                            {{trans('archive.commitment_to')}}
                                        </th>
                                        <th scope="col" class="th1" style="text-align:center;color:#ffffff; "
                                            width="450px">
                                            {{trans('archive.decision')}}
                                        </th>
                                        <th scope="col" class=" th1" width="140"> </th>
                                    </tr>
                                </thead>
                                <tbody id="recList">
                                    <tr class="card123">
                                        <td scope="col">
                                            1
                                        </td>
                                        <td scope="col">
                                            <textarea class="form-control resize-ta" placeholder="{{trans('archive.enter_subject_here')}}"
                                                id="topicTitle1" name="topicTitle1" style=" text-align: right;"
                                                onchange="DrawBorder(1)"></textarea>
                                            <input type="hidden" id="topicid" name="topicid[]" value="1">
                                            <input type="hidden" id="topicid1" name="topicid1" value="1">
                                        </td>
                                        <td scope="col">
                                            <input id="applicantName1" onchange="DrawBorder(1)" name="applicantName1"
                                                class="form-control ccac" placeholder="{{trans('archive.recipient')}}"
                                                style="text-align: right; border:0px solid #000000;">
                                            <input type="hidden" id="applicantID" name="applicantID1" class="form-control"
                                                style="text-align: center;" value="0">
                                            <input type="hidden" id="applicantType" name="applicantType1" class="form-control"
                                                style="text-align: center;">

                                        </td>
                                        <td scope="col">
                                            <textarea type="text" class="form-control resize-ta" 
                                            placeholder="{{trans('archive.enter_subject')}}"
                                            onchange="DrawBorder(1)" rows="2"
                                                id="descisiontxt1" name="descisiontxt1"></textarea>
                                            <div class="row subject1ImagesArea">
                                            </div>
                                            <div class="row subject1FilesArea">
                                            </div>
                                        </td>
                                        <td scope="col">
                                            <input type="hidden" name="fromname" id="fromname" value="subject1">
                                            <input type="file" class="form-control-file" id="subject1UploadFile[]"
                                                multiple="" name="subject1UploadFile[]" onchange="doUploadAttachNew(1)"
                                                style="display: none">
                                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                            <input type="file" class="form-control-file" id="subject1UploadImage[]"
                                                multiple="" name="subject1UploadImage[]" onchange="doUploadAttachNew(1)"
                                                accept="image/*" style="display: none">

                                            <span class="attach-header">
                                                <span id="attach-required">*</span>
                                                <span class="attach-icons" style="margin-left: 0px;">
                                                    <button type="button" class="mainbutton" name="mainbutton" id="mainbutton"
                                                        style="border:0px; background:#ffffff"
                                                        onclick="saveMeeting();">
                                                        <img src="{{ asset('assets/images/ico/floppy-icon.png') }}"
                                                            style="height: 32px;">
                                                    </button>
                                                    <a href="#"
                                                        onclick="$('#fromname').val('subject1');document.getElementById('subject1UploadFile[]').click(); return false"
                                                        class="attach-icon">
                                                        <img src="{{ asset('assets/images/ico/upload.png') }}"
                                                            style="height: 32px;">
                                                    </a>
                                                    <a href="#"
                                                        onclick="document.getElementById('subject1UploadImage[]').click(); return false"
                                                        class="attach-icon hide">
                                                        <img src="{{ asset('assets/images/ico/upload.png') }}"
                                                            style="height: 32px;">
                                                    </a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

            <section class="horizontal-grid" id="horizontal-grid">
                <div class="row white-row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body row">
                                    <div class="form-body col-4 mb-2">
                                        <div class="row">
                                            <div class="col-md-1 startMeeting" style="text-align:center; display:none;">
                                                <button type="button" name="endbutton" id="endbutton"
                                                    class="btn btn-primary" style="padding-top:5px;padding-bottom:5px"
                                                    onclick="endMeeting()">
                                                    {{trans('archive.end_meeting')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-8 mb-2">
                                        <ol class="vasType 1vas addAttatch olmob">
                                            <li style="font-size: 17px !important;color:#000000">
                                                <div class="row">
                                                    <div class="col-sm-6 attmob">
                                                        <input type="text" id="attachName[]" name="attachName[]" class="form-control attachName" placeholder="أخل اسم المرفق"
                                                            value="">
                                                    </div>
                                                    <div class="attdocmob col-sm-5 attach_row_1 ">
                                                        
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('assets/images/ico/upload.png') }}" width="40" class="attachs"
                                                            height="40" style="cursor:pointer"
                                                            onclick="$('#currFile').val(1);$('#attachfile').trigger('click');">
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                        <div class="row">
                                            <div class="col-md-12 saveAttachment" style="text-align:center;">
                                                <button type="button" name="attachbutton" id="attachbutton"
                                                    class="btn btn-primary" style="padding-top:5px;padding-bottom:5px"
                                                    onclick="saveAttachMeeting();">
                                                    حفظ المرفقات
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" id="currFile" name="currFile">
                                        <input type="file" style="display:none" id="attachfile" name="attachfile" onchange="startUpload('formData')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade text-left" id="BeginMeeting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog2" role="document">
                    <div class="modal-content" style="width: 450px;">
                        <div class="modal-header modal-header2">
                            <h4 class="modal-title" id="myModalLabel2" style="color: #ffffff;"><span
                                    style="padding-right: 160px;">بدء الجلسة</span></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="color: #ffffff;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="input-group" style="max-height: 200px; overflow: auto;">
                                        <div class="input-group-prepend" style="margin-right:15%">
                                            <span class="input-group-text" id="basic-addon1" style="width: 81px;">
                                                {{trans('archive.meeting_date')}}
                                            </span>
                                            <input type="text" id="beginAgendaDate" name="beginAgendaDate"
                                                class="form-control eng-sm singledatewithDay" data-mask="00/00/0000 - EEEE"
                                                autocomplete="off" placeholder="" aria-describedby="basic-addon1"
                                                aria-invalid="false" style="width: 100%;">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="display:none">
                                    <div class="input-group w-s-87">
                                        <div class="input-group-prepend">
                                            <span style="margin-left: 10px; font-weight: bold; color: black">
                                                من الساعة
                                            </span>
                                            <input type="time" id="starttime" name="starttime" value="00:00">
                                            <span
                                                style="margin-left: 10px; margin-right: 10px; font-weight: bold; color: black;">
                                                الى الساعة
                                            </span>
                                            <input type="time" id="endtime" name="endtime" value="00:00">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group" id="attendessTable"
                                        style="max-height: 200px; overflow: auto;">
                                        <table style="width:100%" class="detailsTB table">
                                            <tr>
                                                <th scope="col">الرجاء اختيار الحضور</th>
                                            </tr>
                                            <tbody id="subTask3">
                                                {{-- <?php $i=1;
                        if(isset($meetingMembers) && !empty($meetingMembers) && count($meetingMembers) > 0){ ?>
                            <?php foreach ($meetingMembers as $key => $value){ ?>
                            <tr class="allmember meeting<?php echo $value->meeting_id; ?>">
                                <td width="20px">
                                    <?php echo $i;
                                    $i++; ?>
                                </td>
                                <td>
                                    <?php echo $value->memername; ?>
                                </td>
                                <td width="40px">
                                    <input type="checkbox" name="attendance[]" class="attendance" value="<?php echo $value->memberID; ?>">
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group" style="text-align:center">
                                    <button type="button" name="beginmeetsubmit" class="btn btn-info modalBtn"
                                        onclick="beginMeeting()">حفظ </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
@include('dashboard.component.fetch_table')
@endsection
@section('script')
    @include('dashboard.archive.defineMeeting');
    @include('dashboard.archive.takeADecision');
    <script>
    attach_index=2;
        function addNewAttatch() {
    
            if($(".attachName").last().val().length>0){
                var row = '<li style="font-size: 17px !important;color:#000000">' +
                    '<div class="row">' +
                    '<div class="col-sm-6 attmob">' +
                    '<input type="text" id="attachName[]" name="attachName[]" class="form-control attachName">' +
                    '</div>' +
                    '<div class="attdocmob col-sm-5 attach_row_'+attach_index+'">' +
                    //'<input type="text" name="feesValue2" class="form-control" disabled="disabled">' +
                    '</div>' +
                    '<div class="attdelmob attachs">' +
                    '<img src="{{ asset('assets/images/ico/upload.png') }}" width="40" height="40" style="cursor:pointer" onclick="$(\'#currFile\').val('+attach_index+');$(\'#attachfile\').trigger(\'click\'); addNewAttatch(); return false">' +
                    '</div>' +
                    '<div class="attdelmob attachs">' +
                    '<i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; " onclick="$(this).parent().parent().parent().remove()"></i>'+
                    '</div>' +
                    ' </div>' +
                   
                    ' </li>'
                    attach_index++
                $(".addAttatch").append(row)
            }
        }
    
    function startUpload(formDataStr)
        {
            id=$("#currFile").val()
            // $('#feesText'+id).val($('#attachfile').val().split('\\').pop())
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".loader").removeClass('hide');
            $(".form-actions").addClass('hide');
            var formData = new FormData($("#"+formDataStr)[0]);
            $.ajax({
                url: 'uploadTicketAttach',
                type: 'POST',
                data: formData,
                dataType:"json",
                async: true,
                success: function (data) {
                    row='';
                    console.log(data.all_files);
                    if(data.all_files){
                        addNewAttatch()
                        var j=0;
                        $actionBtn='';
                        for(j=0;j<data.all_files.length;j++){
                            $(".attach_row_"+id).html('')
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
                                            +'  <span class="attach-text hidemob">'+shortCutName+'</span>'
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
                        $(".attach_row_"+id).append($actionBtn)
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
                    $(".form-actions").removeClass('hide');
                },
                error:function(){
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    </script>
    <script>
    
    
    itopic=1;
    function saveMeeting(){
        //meetingID
        //lastorder
        
        if($("#meetingTitleName").val()==null){
            $("#meetingTitleName").addClass('error');
            return false;
        }
        if($("#topicTitle"+itopic).val()==null || $("#topicTitle"+itopic).val()==''){
            $("#topicTitle"+itopic).addClass('error');
            return false;
        }
        
        if($("#agendaNum").val()==''){
            $("#agendaNum").addClass('error');
            return false;
        }
        if($("#agendaDate").val()==''){
            $("#agendaDate").addClass('error');
            return false;
        }
        else
       {
           $("#agendaDate").removeClass('error');
       }
        
        //$("#lastorder").val(itopic)
        
        var formData = new FormData($("#formData")[0]);
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        $(".attach-icons").addClass('hide');
        $.ajax({
          url: 'ajaxSaveMeeting',
          type: 'POST',
          data: formData,
          async: true,
          success: function (data) {
              if(data.topicid){
                  ii=$("#lastorder").val();
                    ii++;
                    $("#lastorder").val(ii);
                    DisplayMeeting()
                    $("#meetingID").val(data.id)
                    $("#meetingIDEnd").val(data.id)
                    $("#topicid"+(itopic-1)).val(data.topicid)
                    // setTimeout(function(){
                    //   $(".alert-danger").addClass("hide");
                    //   $(".alert-success").addClass("hide");
                    // },2000)
                    
                    
                }
                else {
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                    $(".attach-icons").removeClass('hide');
                    // $(".alert-success").addClass("hide");
                    // $(".alert-danger").removeClass('hide');
                    Swal.fire({
        				position: 'top-center',
        				icon: 'error',
        				title: '{{trans('admin.error_save')}}',
        				showConfirmButton: false,
        				timer: 1500
    				})
                    $("#errMsg").text(data.status.msg)
                }
                // $(".loader").addClass('hide');
                // $(".form-actions").removeClass('hide');
                // $(".mainbutton").removeClass('hide');
          },
          cache: false,
          contentType: false,
          processData: false
        });
                  
        return true;
    }
    function editSubject(id){
        
        if(confirm('هل تريد تعديل الموضوع')){
            $("#topicToEdit").val(id);
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxEditMeeting',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            
                            setTimeout(function(){
                              $(".alert-danger").addClass("hide");
                              $(".alert-success").addClass("hide");
                          },2000)
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                        
            $(".card"+id).removeAttr('style','border: 2px solid #0000ff !important;')
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
    function deleteSubject(id){
        if( confirm('هل تريد حذف الموضوع')){
        
            topicid=$("#topicid"+id).val();
            if(topicid>0){
                var formData = {'topicid':topicid};
                $.ajax({
                  url: 'C_agenda/ajaxDeleteMeeting',
                  type: 'POST',
                  data: {'topicid':topicid},
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            
                  elemCt1=0;
                  $('.card123').each(function(){
                  if(typeof $(this).attr('style') !== "undefined")
                    elemCt1++
                    });
                    if(elemCt1==0)
                        $(window).unbind('beforeunload');
                    //console.log(elemCt1)
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                  },2000)
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                            return true;
                  },
                });
            }
                return true;
        }
                return false;
    }
    function AttachReplay(id){
        //DoAjax
            $("#topicToEdit").val(id);
            $(".allDec").html('');
            
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxReplay',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      $("#descisiontxt").val(data.topicData[0].decision)
                      
                      for(i=0;i<data.topicData[0].agreeList.length;i++){
                        $('.agreedMember').each(function () {
                            if ($(this).val()==data.topicData[0].agreeList[i].memberID) {
                                   $(this).trigger('click')
                               }
                            });
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
        $('.dec'+id).html($("#takeADecision").html());
        $('.dec'+id).toggle()
    }
    function saveDesicion(id){
            
            $("#topicToEdit").val(id);
        if(confirm('هل تريد حفظ التعديلات')){
            //$("#topicToEdit").val(id);
                ii=$("#lastorder").val();
                $("#lastorder").val(id);
                var formData =  new FormData($("#formData")[0]);
                $(".loader").removeClass('hide');
                $(".attach-icons").addClass('hide');
                $.ajax({
                  url: 'ajaxSaveDesicion',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.topicid){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            //$("#succMsg").text(data.status.msg)
                            $("#row"+id).removeAttr('style')
                            $("#lastorder").val(ii);
                            Swal.fire({
                				position: 'top-center',
                				icon: 'success',
                				title: 'تم التعديل',
                				showConfirmButton: false,
                				timer: 1000
            				})
                            setTimeout(function(){
                              $(".loader").addClass("hide");
                              $(".form-actions").removeClass('hide');
                              $(".attach-icons").removeClass('hide'); 
                              $(".alert-danger").addClass("hide");
                              $(".alert-success").addClass("hide");
                            },2000)
                        }else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                        $(".attach-icons").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
    function drawAttach()
        {
            // $('#feesText'+id).val($('#attachfile').val().split('\\').pop())
            $(".loader").removeClass('hide');
            $(".form-actions").addClass('hide');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            let formData = {
            'meetingID': $("#meetingID").val(),
            };
            $.ajax({
                url: '{{route('meetingAttach')}}',
                type: 'get',
                data: formData,
                dataType:"json",
                async: true,
                success: function (data) {
                    var attach_template='';
                console.log(data);
                if(data.length>0)
                    {
                      $('.addAttatch').html(' ');
                      let i=0;
                        for(i=0;i<=data.length;i++)
                        {
                            
                            if(i==data.length)
                            {
                                attach_template+=`<li style="font-size: 17px !important;color:#000000">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" id="attachName[]" name="attachName[]" class="form-control attachName" placeholder="أدخل اسم المرفق" value="">
                                        </div>
                                        <div class="col-sm-5 attach_row_${i+1}">
                                            
                                        </div>
                                        <div class="col-sm-1">
                                            <img src="{{ asset('assets/images/ico/upload.png') }}" width="40"
                                                height="40" style="cursor:pointer" class="attachs"
                                                onclick="$('#currFile').val(${i+1});$('#attachfile').trigger('click');">
                                        </div>
                                    </div>
                                </li>`
                                attach_index=i+1;
                            }
                            else{
                                if(data[i].Files[0].extension=="jpg"||data[i].Files[0].extension=="png")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/image.png';
                                else if(data[i].Files[0].extension=="pdf")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/pdf.png';
                                else if(data[i].Files[0].extension=="doc")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(data[i].Files[0].extension=="excel"||data[i].Files[0].extension=="xsc")
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/excellogo.png';
                                else
                                fileimage='https://t.expand.ps/expand_repov1/public/assets/images/ico/file.png';
                                shortCutName=data[i].Files[0].real_name;
                                shortCutName=shortCutName.substring(0, 32)
                            attach_template+=`<li style="font-size: 17px !important;color:#000000">
                                <div class="row">
                                    <div class="col-sm-6">
                                  <input type="text" reuired="" id="attachName[]" name="attachName[]" class="form-control attachName" value="${data[i].attachName}">
                                    </div>
                                    <div class="col-sm-5 attach_row_${i+1}">
                                        <div id="attach" class=" col-sm-12 ">
                                            <div class="attach"> 
                                                <a class="" href="{{asset('')}}${data[i].Files[0].url}" style="color: #74798D; float:left;" 
                                                target="_blank">  
                                                    <span class="attach-text">${shortCutName}</span>    
                                                    <img style="width: 20px;" src='${fileimage}'>
                                                </a>
                                                <input type="hidden" id="attach_ids[]" name="attach_ids[]" value="${data[i].attach_ids}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 attachs">
                                        <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; " onclick="$(this).parent().parent().parent().remove()"></i>
                                    </div> 
                                </div> 
                            </li>`
                            }
                        }
                        attach_index=i+1;
                    }
                
                $('.addAttatch').append(attach_template);
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                },
                error:function(){
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                },
            });
        }
    function DisplayMeeting(){
        
        if($("#meetingTitleName").val()==null){
            return false;
        }
        
        if($("#agendaNum").val()==''){
            return false;
        }
        
        $(".loader").removeClass('hide');
        var formData =  new FormData($("#formData")[0]);
        
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        $.ajax({
          url: 'ajaxDisplayMeeting',
          type: 'POST',
          data: formData,
          dataType:"json",
          async: true,
          success: function (data) {
              $('.attach-close1').show()
                $('.fa-save').show() 
                $('.mainbutton').show() 
                $('#endbutton').html('{{trans('archive.end_meeting')}}')
              //console.log(data.agenda_topic)
                //$("#recList").html('')
                $("#meetingID").val(data.id)
                if(data.file_ids)
                    drawAttach();
              if(data.agenda_topic!=null){
              if(data.agenda_topic.length !== null){
                $("#topicAppend").html('')
                $("#recList").html('')
                    itopic=data.agenda_topic.length;
                    //console.log(itopic)
                  if(data.agenda_topic.length>0){
                    
                    $("#meetingIDEnd").val(data.id)
                    $("#agendaDate").val(data.agenda_date)
                    $(".startMeeting").show()
                    $("#topicAppend").html('')
                    // itopic=$("#lastorder").val()
                    for(i=0;i<data.agenda_topic.length;i++){
                        id=data.agenda_topic[i].id;
                        attach='';
                        for(j=0;j<data.agenda_topic[i].files.length;j++){
                            shortCutName=data.agenda_topic[i].files[j].real_name;
                            shortCutName=shortCutName.substring(0, 40)
                            if(data.agenda_topic[i].files[j].extension=="jpg"||data.agenda_topic[i].files[j].extension=="png")
                            fileimage='{{ asset('assets/images/ico/image.png') }}';
                            else if(data.agenda_topic[i].files[j].extension=="pdf")
                            fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                            else if(data.agenda_topic[i].files[j].extension=="excel"||data.agenda_topic[i].files[j].extension=="xsc")
                            fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                            else
                            fileimage='{{ asset('assets/images/ico/file.png') }}';
                            
                                        attach+='       <div id="attach" class=" col-sm-6 ">   ' +
                            '           <div class="attach" onmouseover="$(this).children().first().next().show()">		' +
                            '               <span class="attach-text">'+shortCutName+'</span>		' +
                            '                   <a class="attach-close1" href="{{asset('')}}'+data.agenda_topic[i].files[j].url+'" style="color: #74798D; float:left;" target="_blank">' +
                            '                       <img style="width: 20px;"src="'+fileimage+'"> ' +
                            '                   </a>		' +
                            '                   <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>' +
                            '                 <input type="hidden" id="subject'+id+'imgUploads[]" name="subject'+id+'imgUploads[]" value="'+data.agenda_topic[i].files[j].real_name+'">      ' +
                            '                 <input type="hidden" id="subject'+id+'orgNameList[]" name="subject'+id+'orgNameList[]" value="'+data.agenda_topic[i].files[j].url+'">      ' +
                            '                 <input type="hidden" id="subject'+id+'id[]" name="subject'+id+'id[]" value="'+data.agenda_topic[i].files[j].id+'">		' +
                            '           </div>	' +
                        '             </div>' ;
                        }
                        //console.log(attach)   
        itopic=i+1;
        row='<tr class="card'+id+' card123">'
            +'    <td scope="col"> '+itopic+' </td>'
            +'    <td scope="col">'
            +'        <textarea class="form-control resize-ta" placeholder="" id="topicTitle'+id+'" name="topicTitle'+id+'" style=" text-align: right;" onchange="DrawBorder('+id+')">'+data.agenda_topic[i].title+'</textarea>'
            +'        <input type="hidden" id="topicid" name="topicid[]" value="'+id+'">'
            +'        <input type="hidden" id="topicid'+id+'" name="topicid'+id+'" value="'+id+'">'
            +'    </td>'
            +'    <td scope="col">'
            +'        <input id="applicantName'+id+'" onchange="DrawBorder('+id+')" name="applicantName'+id+'" class="form-control ccac ui-autocomplete-input" placeholder="" style="text-align: right; border:0px solid #000000;" autocomplete="off" value="'+
                (data.agenda_topic[i].connected_to_txt== null?'':data.agenda_topic[i].connected_to_txt)+'">'
            +'        <input type="hidden" id="applicantID'+id+'" name="applicantID'+id+'" class="form-control" style="text-align: center;" value="'+data.agenda_topic[i].connected_to+'">'
            +'        <input type="hidden" id="applicantType'+id+'" name="applicantType'+id+'" class="form-control" style="text-align: center;" value="'+data.agenda_topic[i].model+'">'
            +'    </td>'
            +'    <td scope="col">'
            +'        <textarea type="text" class="form-control resize-ta" onchange="DrawBorder('+id+')" rows="2" id="descisiontxt'+id+'" name="descisiontxt'+id+'">'+data.agenda_topic[i].descision+'</textarea>'
            +'        <div class="row subject'+id+'ImagesArea">'+attach+'               </div>'
            +'        <div class="row subject'+id+'FilesArea">'
            +'        </div>'
            +'   </td>'
            +'   <td scope="col">'
            +'       <input type="file" class="form-control-file" id="subject'+id+'UploadFile[]" multiple="" name="subject'+id+'UploadFile[]" onchange="doUploadAttachNew('+id+')" style="display: none">'
            +'        <meta name="csrf-token" content="V26dNupkYjw1kEd5sjXYftcct1upOdzMLntnhZBM">'
            +'        <input type="file" class="form-control-file" id="subject'+id+'UploadImage[]" multiple="" name="subject'+id+'UploadImage[]" onchange="doUploadAttachNew('+id+')" accept="image/*" style="display: none">'
            +'        <span class="attach-header">'
            +'            <span id="attach-required">*</span>'
            +'            <span class="attach-icons" style="margin-left: 0px;">'
            +'               <button type="button" class="mainbutton" name="mainbutton" id="mainbutton" style="border:0px; background:#ffffff" '
            +'                   onclick="saveDesicion('+id+')">'
            +'                    <img src="https://t.expand.ps/expand_repov1/public/assets/images/ico/floppy-icon.png" style="height: 32px;">'
            +'               </button>'
            +'               <a href="#" onclick="$(\'#fromname\').val(\'subject'+id+'\');document.getElementById(\'subject'+id+'UploadFile[]\').click(); return false" class="attach-icon">'
            +'                    <img src="https://t.expand.ps/expand_repov1/public/assets/images/ico/upload.png" style="height: 32px;">'
            +'               </a>'
            +'               <a href="#" onclick="$(\'#fromname\').val(\'subject'+id+'\');document.getElementById(\'subject'+id+'UploadImage[]\').click(); return false" class="attach-icon hide">'
            +'                   <img src="https://t.expand.ps/expand_repov1/public/assets/images/ico/upload.png" style="height: 32px;">'
            +'                </a>'
            +'               <a href="{{ url('') }}/ar/admin/printDes/'+id+'"  class="attach-icon" target="_blank">'
            +'                   <img src="https://doc.expand.ps/images/printer.jpeg" style="height: 32px;">'
            +'                </a>'
            +'            </span>'
            +'        </span>'
            +'    </td>'
            +'</tr>'
            $(".resize-ta").on("keyup", function() {
                    console.log($(this).height())
              $(this).height(calcHeight($(this).val()) + "px");
            });
                        $("#recList").prepend(row)
                        // $('textarea').height();
                    }
                    itopic++;
                    $("#lastorder").val(itopic)
                    if(data.is_closed==1){
                    setTimeout(function(){
                      
                        $('input').attr('readonly', true);
                        $('textarea').attr('readonly', true);
                        $('#agendaNum').attr('readonly', false);
                        $('#agendaDate').attr('readonly', false);
                        $('.fa-times').hide()   
                        $('.attach-close1').hide()
                        $('.otherattache').show()
                        $('.fa-save').hide() 
                        $('.mainbutton').hide() 
                        $('.attachs').hide();
                        $('#attachbutton').hide()
                        $('#endbutton').html('هذه الجلسة منتهية')
                        $('.ft-x').hide() 
                        $('.attach-icon').hide() 
                    
                  },2000)
                    }
                    else
                    
                    addTopicTemplate()
                  }else
                    addTopicTemplate()
              }
              }
              resizeText();
            $(".loader").addClass('hide');
            $(".attach-icons").removeClass('hide');
//             Swal.fire({
// 				position: 'top-center',
// 				icon: 'success',
// 				title: '{{trans('admin.data_added')}}',
// 				showConfirmButton: false,
// 				timer: 1500
// 			})
          },
          error:function(){
              
            $(".loader").addClass('hide');
            $(".attach-icons").removeClass('hide');
          },
          cache: false,
          contentType: false,
          processData: false
        });
        return true;
    }
    
        function startMeeting(){
    
        if( $('#meetingTitle').val() != '' ){
            if( $('#agendaNum').val() != 0){
                //$("#startMeet").hide();
    
    
                $(".loader").removeClass('hide');
                $("#beginAgendaDate").val($("#agendaDate").val());
                $("#BeginMeeting").modal('show');
                //DrawEmployee($("#meetingTitleID").val());
                $(".loader").addClass('hide');
    
                $('#repeat').css({"display":"none"});
                /*$('#mainbutton').css({"display":"none"});
                $('#startMeet').css({"display":"none"});*/
    
            $(".showDec").show()
                for(var i=0;i<=itopic;i++){
                    $('#decision'+i).css({"display":"block"});
                  }
            }
            else {
                alert('الرجاء ادخال رقم الاجتماع');
                $('#agendaNum').val('');
            }
        }
        else{
            alert('الرجاء ادخال اسم الاجتماع');
            $('#meetingTitle').val('');
        }
    
    }
    
    function beginMeeting(){
        if(confirm('هل تريد إضافة الحضور')){
            //$("#topicToEdit").val(id);
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxSaveAttendance',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            $("#BeginMeeting").modal('hide')
                            
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                  },2000)
                            $(".ft-check").show()
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
    
    function endMeeting(){
        if(confirm('عند إنهاء الجلسة لن تتمكن من تعديل أي محتوى\r\n هل تريد بالفعل إنهاء الجلسة')){
            //$("#topicToEdit").val(id);
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'ajaxEndMeeting',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.success){
                      Swal.fire({
        				position: 'top-center',
        				icon: 'success',
        				title: data.success,
        				showConfirmButton: false,
        				timer: 1000
        				})
        				
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status)
                            $("#BeginMeeting").modal('hide')
                            
                    $('input').attr('readonly', true);
                    $('textarea').attr('readonly', true);
                    $('#agendaNum').attr('readonly', false);
                    $('#agendaDate').attr('readonly', false);
                    $('.fa-times').hide() 
                    $('.attachs').hide();
                    $('.attach-close1').hide()
                    $('.fa-save').hide() 
                    //('#mainbutton').hide() 
                    
                    $('.mainbutton').hide()
                    $('#endbutton').html('هذه الجلسة منتهية')
                    $('.ft-x').hide() 
                    $('.attach-icon').hide() 
                    //$('.fa-paperclip').remove()
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                  },2000)
                            
                        }
                        else {
                            Swal.fire({
            				position: 'top-center',
            				icon: 'error',
            				title: data.error,
            				showConfirmButton: false,
            				timer: 1000
            				})
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            //$("#errMsg").text(data.status)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
    
    function saveAttachMeeting(){
            //$("#topicToEdit").val(id);
            $(".loader").removeClass('hide');
        var formData =  new FormData($("#formData")[0]);;
        $.ajax({
          url: 'attachMeeting',
          type: 'POST',
          data: formData,
          dataType:"json",
          async: true,
          success: function (data) {
              if(data.success){
              Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: data.success,
				showConfirmButton: false,
				timer: 1000
				})
				
                    $(".alert-danger").addClass("hide");
                    $(".alert-success").removeClass('hide');
                    $("#succMsg").text(data.status)
                    $("#BeginMeeting").modal('hide')
            //$('.fa-paperclip').remove()
            setTimeout(function(){
                $(".loader").addClass('hide');
          },2000)
                    
                }
                else {
                    Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: data.error,
    				showConfirmButton: false,
    				timer: 1000
    				})
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    //$("#errMsg").text(data.status)
                }
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
          },
          cache: false,
          contentType: false,
          processData: false
        });
    }
        $(document).ready(function(){
            
            $( ".ccac" ).autocomplete({
                source: "search",
                minLength: 2,
                select: function( event, ui ) {
                    $(this).next().val(ui.item.id)
                    $(this).next().next().val(ui.item.model)
                    $("#applicantName").val(ui.item.label)
                }
            });
            /*
            $( ".ccac" ).autocomplete({
                source: "searchAllCustomerCitizenByName",
                minLength: 2,
                select: function( event, ui ) {
                    $(this).next().val(ui.item.contact_id)
                    $("#applicantName").val(ui.item.label)
                }
            })*/
        } );
        
        function doUploadAttachNew(frmid){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
            $("#fromname").val('subject'+frmid)
            $("#startUpload").val(frmid)
            $(".loader").removeClass('hide');
            $(".form-actions").addClass('hide');
            $(".attach-icons").addClass('hide');
            var formData = new FormData($("#formData")[0]);

            $.ajax({
                url: 'agendaAttach',
                type: 'POST',
                data: formData,
                dataType:"json",
                async: true,
                success: function (data) {
                    row='';
                    row1='';
                    base_url='{{ asset('') }}';
                        for(j=0;j<data.all_files.length;j++){
                            shortCutName=data.all_files[j].real_name;
                            shortCutName=shortCutName.substring(0, 40)
                            if(data.all_files[j].extension=="jpg"||data.all_files[j].extension=="png")
                            fileimage='{{ asset('assets/images/ico/image.png') }}';
                            else if(data.all_files[j].extension=="pdf")
                            fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                            else if(data.all_files[j].extension=="excel"||data.all_files[j].extension=="xsc")
                            fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                            else
                            fileimage='{{ asset('assets/images/ico/file.png') }}';
                            row+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'		<span class="attach-text">'+shortCutName+'</span>'
                                +'		<a class="attach-close1" href="'+base_url+data.all_files[j].url+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'		<a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="subject'+frmid+'imgUploads[]" name="subject'+frmid+'imgUploads[]" value="'+data.all_files[j].real_name+'">'
                                +'      <input type="hidden" id="subject'+frmid+'orgNameList[]" name="subject'+frmid+'orgNameList[]" value="'+data.all_files[j].url+'">'
                                +'      <input type="hidden" id="subject'+frmid+'id[]" name="subject'+frmid+'id[]" value="'+data.all_files[j].id+'">'
                                +'		</div>'
                                +'	</div>' +
                                '</div>'
                        }
                        $(".subject"+frmid+"ImagesArea").append(row)
                        $(".loader").addClass('hide');
                        $(".attach-icons").removeClass('hide');
                        $(".form-actions").removeClass('hide');
                        return;
                        /*
                    if(data.status.success){
                        DrawBorder(frmid)
                        for(j=imgCounter;j<data.all_files.length;j++){
                            if(data.img[j].type==1 ) {
                            }
                            if(data.img[j].type==2 ) {
                                row1+='<div  class="col-sm-3" id="i'+(j+1)+'">'
                                    +'	   <div class="row"  onmouseover="$(this).children().first().children().first().next().show()"  onmouseout="$(this).children().first().children().first().next().hide()">'
                                    +'	       <div class="col-sm-12">'
                                    +'			   <a class="group" href="'+'uploads/'+data.img[j].name+'" title="'+data.img[j].orgname+'" style="color: #74798D" >' +
                                    '                <img src="'+'uploads/'+data.img[j].name+'" title="'+data.img[j].orgname+'" id="imgSlider'+(j+1)+'" width="100%"/></a>'
    
                                    +'		       <a class="attach-close" style="color: #74798D" onclick="$(this).parent().parent().parent().remove()" ><i class="fa fa-times"></i></a>'
                                    +'             <input type="hidden" id="subject'+frmid+'imgUploads[]" name="subject'+frmid+'imgUploads[]" value="'+data.img[j].name+'">'
                                    +'             <input type="hidden" id="subject'+frmid+'orgNameList[]" name="subject'+frmid+'orgNameList[]" value="'+data.img[j].orgname+'">'
                                    +'	       </div>'
                                    +'	   </div>'
                                    +'</div>'
                            }
                        }
                        //$(".attachs-carousel-container").html(row)
                        $(".alert-danger").addClass("hide");
                        $(".alert-success").removeClass('hide');
                        $("#succMsg").text(data.status.msg)
                        $(".subject"+frmid+"FilesArea").append(row)
                        console.log(".subject"+frmid+"FilesArea") 
                        $(".subject"+frmid+"ImagesArea").append(row1)
                        $(".loader").addClass('hide');
    
                        $(".group").colorbox({rel:'group'+frmid});
                        setTimeout(function(){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").addClass("hide");
                        },2000)
                    }
                    else {
                        $(".alert-success").addClass("hide");
                        $(".alert-danger").removeClass('hide');
                        $("#errMsg").text(data.status.msg)
                    }*/
                    $(".form-control-file").val('')
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                },
                error:function(){
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    $("#errMsg").text(data.status.msg)
                    $(".loader").addClass('hide');
                    $(".attach-icons").removeClass('hide');
                    $(".form-actions").removeClass('hide');
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
        itopic=1;
        function addTopicTemplate(){
            // $('.loader').addClass('hide');
            $('.hasLabel').addClass('hide');
            //$("#fromname").remove()
            // console.log($("#lastorder").val())
            itopic=$("#lastorder").val()
            // console.log('New rec: '+itopic)
            $("#lastorder").val(itopic)
            template='<tr class="card123" id="row'+itopic+'">'
            +'                    <td scope="col">'
            +'                         '+itopic
            +'                    </td>'
            +'                    <td scope="col">'
            +'                        <textarea class="form-control resize-ta" onchange="DrawBorder('+itopic+')" placeholder="{{trans('archive.enter_subject_here')}}" id="topicTitle'+itopic+'" name="topicTitle'+itopic+'" style="text-align: right;"></textarea>'
            +'                        <input type="hidden" id="topicid" name="topicid[]" value="'+itopic+'">'
            +'                        <input type="hidden" id="topicid'+itopic+'" name="topicid'+itopic+'" value="'+itopic+'">'
            +'                    </td>'
            +'                    <td scope="col">'
            +'                        <input id="applicantName'+itopic+'" onchange="DrawBorder('+itopic+')" name="applicantName'+itopic+'" class="form-control ccac"  placeholder="{{trans('archive.recipient')}}" style="text-align: right; border:0px solid #000000;">'
            +'                        <input type="hidden" id="applicantID" name="applicantID'+itopic+'" class="form-control" value="0" style="text-align: center;">'
            +'                        <input type="hidden" id="applicantType'+itopic+'" name="applicantType'+itopic+'" class="form-control" style="text-align: center;" >'
            +'                                        <input type="file" class="form-control-file" id="subject'+itopic+'UploadFile[]" multiple="" name="subject'+itopic+'UploadFile[]" onchange="doUploadAttachNew('+itopic+')" style="display: none">'
            +'                                        <input type="file" class="form-control-file" id="subject'+itopic+'UploadImage[]" multiple="" name="subject'+itopic+'UploadImage[]" onchange="doUploadAttachNew('+itopic+')" accept="image/*" style="display: none">'
            
            +'                    </td>'
            +'                    <td scope="col">'
            +'<textarea  type="text" class="form-control resize-ta" placeholder="{{trans('archive.enter_subject')}}" onchange="DrawBorder('+itopic+')" rows="2" id="descisiontxt'+itopic+'" name="descisiontxt'+itopic+'"></textarea>'
            +'                        '
            +'                                        <div class="row subject'+itopic+'ImagesArea">'
            +'                                        </div>'
            +'                                        <div class="row subject'+itopic+'FilesArea" style="margin-left: 0px;">'
            +'                                        </div>'
            +'                    </td>'
            +'                    <td scope="col"style="width: 106px;">'
            +'                            <span class="attach-header" >'
            +'                                <span id="attach-required">*</span>'
            +'                                <span class="attach-icons" style="margin-left: 0px;">'
            +' <button type="button" class="mainbutton" name="mainbutton" id="mainbutton" style="border:0px; background:#ffffff; " onclick="saveMeeting();">'
            +'                                                     <img src="{{asset('')}}assets/images/floppy-icon.png" style="height: 32px;">'
            +'                                                 </button>'
            +'                                    <a href="#" onclick="$(\'#fromname\').val(\'subject'+itopic+'\');document.getElementById(\'subject'+itopic+'UploadFile[]\').click(); return false" class="attach-icon">'
            +'                                        <img src="{{asset('')}}assets/images/upload.png" style="height: 32px;">'
            +'                                    </a>'
            +'                                </span>'
            +'                            </span>'
            +'                    </td>'
            +'                </tr>';
            $("#recList").prepend(template);
            $(".resize-ta").on("keyup", function() {
                    console.log($(this).height())
              $(this).height(calcHeight($(this).val()) + "px");
            });
            $( ".ccac" ).autocomplete({
                source: "search",
                minLength: 2,
                select: function( event, ui ) {
                    $(this).next().val(ui.item.id)
                    $(this).next().next().val(ui.item.model)
                    $("#applicantName").val(ui.item.label)
                }
            });
        }
        
        $(document).ready(function(){
            $("#TopicSrch").on("keydown",function(){
                var txt = $("#TopicSrch").val();
                //console.log(txt)
                $('.card123').each(function(){
                   if($(this).html().indexOf(txt) != -1){
                       $(this).show();
                   }
                else
                       $(this).hide();
                });
            })
        })
            
        function DrawBorder(id){
            $("#row"+id).attr('style','border: 2px solid #0000ff !important;')
            
            window.onbeforeunload = confirmExit;
        }
        
        var elemCt =0;
      function confirmExit()
      {
          //return ;
        $('.card123').each(function(){
          if(typeof $(this).attr('style') !== "undefined")
            elemCt++
        });
        if(elemCt>0)
            return "هل تريد مغادرة الصفحة دون الحفظ؟";
            
       $(window).unbind('beforeunload');
        return
      }
      function calcHeight(value) {
          let numberOfLineBreaks = (value.match(/\n/g) || []).length;
          // min-height + lines x line-height + padding + border
          let newHeight = 20 + numberOfLineBreaks * 20 + 12 + 2;
          return newHeight;
        }
        $(".resize-ta").on("keyup", function() {
                console.log($(this).height())
          $(this).height(calcHeight($(this).val()) + "px");
        });
        function resizeText(){
        let all=$("textarea");
            for(let i=0;i<all.length;i++)
            {
                if(all[i].value.length>50&&all[i].value.length<300)
                all[i].style.height= all[i].value.length + "px";
                if(all[i].value.length>300)
                all[i].style.height="300px"
            }
        }

    </script>

@endsection
