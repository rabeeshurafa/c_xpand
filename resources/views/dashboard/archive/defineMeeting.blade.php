
<div class="modal fade text-left" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content" style="width: 500px;">
            <div class="modal-header modal-header2">
                <h4 class="modal-title" id="myModalLabel1" style="color: #ffffff;"><span>اضافة اجتماع</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <div class="form-group">
                        <div class="input-group" style="max-height: 200px; overflow: auto;">
                            <table style="width:100%" class="detailsTB table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">العنوان</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="subTask3">
                                    <?php $i=1;
                                    $meetingTitleList = App\Models\AgendaExtention::get();
                                    foreach($meetingTitleList as $row){
                                    ?>
                                    <tr> 
                                        <td width="20px"><?php echo $i;$i++;?> </td>
                                        <td><?php echo $row->name?></td>
                                        <td width="60px">
                                            <i class="fa fa-edit" id="trash" aria-hidden="true" style="color:#1E9FF2;padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="editConstant12(<?php echo $row->id?>,'<?php echo $row->meetingnamear?>')"></i>
                                            <i class="fa fa-trash" id="trash" aria-hidden="true" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="deleteCer(<?php echo $row->id?>,'<?php echo $row->meetingnamear?>')"></i>
                                        </td>
                                        </tr>
                                    <?php }?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group w-s-87">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 85px;">
                                    عنوان الاجتماع
                                </span>
                            </div>
                            <input type="text" id="name_ar1" class="form-control" placeholder=" عنوان الاجتماع" name="name_ar1">
                            <input type="hidden" id="s_name_en1" class="form-control" placeholder="" name="s_name_en1">
                            <input type="hidden" id="fk_i_constant_id1" class="form-control" placeholder="Label (En)" name="fk_i_constant_id1">
                            <input type="hidden" id="fk_i_constantdet_id1" class="form-control" placeholder="Label (En)" name="fk_i_constantdet_id1">
                            <input type="hidden" id="ctrlToRefresh1" class="form-control" placeholder="Label (En)" name="ctrlToRefresh1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group w-s-87">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 85px;">
                                    الصلاحيات
                                </span>
                            </div>
                            <input type="text" id="meetingPerEmp" class="form-control alphaFeild manForPer" placeholder="اختر الموظف" name="meetingPerEmp">
                        </div>
                    </div>
                    <div class="form-group">
                        <table class="table borderless table-sm" id="permembers">
                            <tbody id="persubTask2">

                            </tbody>
                        </table>
                    </div>
                    <div class="form-group hide">
                        <div class="input-group w-s-87">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 85px;">
                                    رئيس الاجتماع
                                </span>
                            </div>
                            <input type="text" id="meetingManager" class="form-control alphaFeild man" placeholder="اختر العضو" name="meetingManager">
                            <input type="hidden" id="managerID" class="form-control" placeholder="" name="managerID">
                        </div>
                    </div>
                    <div class="form-group hide">
                        <div class="input-group w-s-87">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 85px;">
                                    الأعضاء
                                </span>
                            </div>
                            <input type="text" id="membername" class="form-control alphaFeild cac" placeholder="اختر العضو" name="membername">
                            <input type="hidden" id="memberID" name="memberID">
                        </div>
                    </div>
                    <div class="form-group">
                        <table class="table borderless table-sm" id="members">
                            <tbody id="subTask2">

                            </tbody>
                        </table>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group w-s-87">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 85px;">
                                    الموظف للتوقيع
                                </span>
                            </div>
                            <input type="text" class="form-control alphaFeild man1" placeholder="اختر العضو" name="membername">
                            <input type="hidden" id="signature_emp" name="signature_emp">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group w-s-87">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 85px;">
                                    المسمى الوظيفي
                                </span>
                            </div>
                            <input type="text" id="signature_jobtitle" class="form-control alphaFeild " placeholder="" name="signature_jobtitle">
                        </div>
                    </div>
                    <div class="form-group" style="text-align:center">
                        <button type="button" name="meettitlesubmit" class="btn btn-info modalBtn" onclick="addMeeting()">حفظ </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $( function() {

        $( ".man" ).autocomplete({
            source: "searchEmpByName",
            minLength: 2,
            select: function( event, ui ) {
                $("#meetingManager").val(ui.item.label)
                $("#managerID").val(ui.item.id)
            }
        });

        $( ".man1" ).autocomplete({
            source: "searchEmpByName",
            minLength: 2,
            select: function( event, ui ) {
                $("#signature_emp").val(ui.item.id)
            }
        });

        $( ".manForPer" ).autocomplete({
            source: "searchEmpByName",
            minLength: 2,
            select: function( event, ui ) {
                row='<tr>'
                        +'<td>'
                        +$("#membername").val()
                        +'		<input type="hidden" name="meetingPerEmp[]" value="'+ui.item.label+'" >'+ui.item.label
                        +'		<input type="hidden" name="meetingPerEmpID[]" value="'+ui.item.id+'" >'
                        +'</td>'
                    row+='	<td >'
                        +'	<div class="input-group-append" style="margin-left: 0px !important" onclick="$(this).parent().parent().remove()">'
                        +'	<span class="input-group-text input-group-text2" style="margin-left: 0;" >'
                        +'	<i class="fa fa-trash" id="plusElement2"></i>'
                        +'	</span>'
                        +'	</div>'
                        +'	</td>'
                        +'</tr>';
                    $("#persubTask2").append(row)
                    setTimeout(function(){ 
                        $("#meetingPerEmp").val('');
                    }, 200);
            }
        });
        $( ".cac" ).autocomplete({
            source: "searchEmpByName",
            minLength: 2,
            select: function( event, ui ) {
                $("#membername").val(ui.item.label)
                $("#memberID").val(ui.item.id)
                
                row='<tr>'
                        +'<td>'
                        +$("#membername").val()
                        +'		<input type="hidden" name="MemberNameList[]" value="'+ui.item.label+'" >'
                        +'</td>'
                        +'<td>'
                        +'		<input type="hidden" name="MemberIDList[]" value="'+ui.item.id+'" >'
                        +'</td>';
                    row+='	<td >'
                        +'	<div class="input-group-append" style="margin-left: 0px !important" onclick="$(this).parent().parent().remove()">'
                        +'	<span class="input-group-text input-group-text2" style="margin-left: 0;" >'
                        +'	<i class="fa fa-trash" id="plusElement2"></i>'
                        +'	</span>'
                        +'	</div>'
                        +'	</td>'
                        +'</tr>';
                    $("#subTask2").append(row)
                    setTimeout(function(){ 
                        $("#membername").val('');
                    }, 200);
                    $("#membername").focus();
            }
        });
    } );
    
    function addMeeting(){
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        fillIn="meetingTitleName";
        //$(".form-actions").addClass('hide');
        if($("#fk_i_constantdet_id1").val()==0) {

            var MemberNameList = document.getElementsByName('MemberNameList[]');
            var membersname = new Array();
            for(var i=0;i<MemberNameList.length;i++){
                membersname.push(MemberNameList[i].value);
            }

            var MemberIDList = document.getElementsByName('MemberIDList[]');
            var membersid = new Array();
            for(var i=0;i<MemberIDList.length;i++){
                membersid.push(MemberIDList[i].value);
            }
            
            var meetingPerEmpList = document.getElementsByName('meetingPerEmp[]');
            var meetingPerEmp = new Array();
            for(var i=0;i<meetingPerEmpList.length;i++){
                meetingPerEmp.push(meetingPerEmpList[i].value);
            }
            var MemberPerIDList = document.getElementsByName('meetingPerEmpID[]');
            var membersPerid = new Array();
            for(var i=0;i<MemberPerIDList.length;i++){
                membersPerid.push(MemberPerIDList[i].value);
            }
            // alert( $("#name_ar1").val());
            var formData = {
                //'fk_i_constant_id': $("#fk_i_constant_id1").val(),
                'name_ar1': $("#name_ar1").val(),
                'meetingnameen': $("#s_name_en1").val(),
                'meetingmanager': $("#meetingManager").val(),
                'managerID': $("#managerID").val(),
                'MemberNameList': membersname,
                'MemberIDList': membersid,
                'MemberPerIDList': membersPerid,
                'meetingPerEmpList': meetingPerEmp,
                'signature_emp':$("#signature_emp").val(),
                'signature_jobtitle':$("#signature_jobtitle").val()
            };
                        console.log(formData);

            // return;
            $.ajax({
                url: 'doAddMeetingTitles',
                type: 'POST',
                data: formData,
                dataType: "json",
                async: true,
                success: function (data) {

                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{trans('admin.data_added')}}',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        location.reload();
                },
                error: function(response) {
                    if(response.responseJSON.errors.name_ar1){
                        $( "#name_ar1" ).addClass( "error" );
                    }
                    $(".loader").addClass('hide');
                }



            });
        }
        else{
            var MemberNameList = document.getElementsByName('MemberNameList[]');
            var membersname = new Array();
            for(var i=0;i<MemberNameList.length;i++){
                membersname.push(MemberNameList[i].value);
            }

            var MemberIDList = document.getElementsByName('MemberIDList[]');
            var membersid = new Array();
            for(var i=0;i<MemberIDList.length;i++){
                membersid.push(MemberIDList[i].value);
            }


            var meetingPerEmpList = document.getElementsByName('meetingPerEmp[]');
            var meetingPerEmp = new Array();
            for(var i=0;i<meetingPerEmpList.length;i++){
                meetingPerEmp.push(meetingPerEmpList[i].value);
            }
            var MemberPerIDList = document.getElementsByName('meetingPerEmpID[]');
            var membersPerid = new Array();
            for(var i=0;i<MemberPerIDList.length;i++){
                membersPerid.push(MemberPerIDList[i].value);
            }
            var formData = {
                //'fk_i_constant_id': $("#fk_i_constant_id1").val(),
                'id': $("#fk_i_constantdet_id1").val(),
                'name_ar1': $("#name_ar1").val(),
                'meetingnameen': $("#s_name_en1").val(),
                'meetingmanager': $("#meetingManager").val(),
                'managerID': $("#managerID").val(),
                'signature_emp': $("#signature_emp").val(),
                'signature_jobtitle': $("#signature_jobtitle").val(),
                'MemberNameList': membersname,
                'MemberIDList': membersid,
                'meetingPerEmpID': membersPerid,
                'MemberPerIDList':membersPerid
            };
            console.log(formData);
            $.ajax({
                url: 'doEditMeetingTitle',
                type: 'POST',
                data: formData,
                dataType: "json",
                async: true,
                success: function (data) {
                    
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{trans('admin.data_added')}}',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        location.reload();
                    $("#" + fillIn).children().remove();//(new Option(" Select ", ''));
                    $("#" + fillIn).html(new Option("-- اختر --", ''));
                    
                    for (i = 0; i < data.meetingTitleList1.length; i++)
                            $("#" + fillIn).append(new Option(data.meetingTitleList1[i].meetingnamear, data.meetingTitleList1[i].pk_i_id));
                    
                    $("#subTask3").html('');
                    for(j=0; j<data.meetingTitleList1.length;j++) {
                        row += '<tr>'
                            + '<td width="20px">'
                            + i
                            + '</td>'
                            + '<td>'
                            + data.meetingTitleList1[j].meetingnamear
                            + '</td>'
                            + '<td width="40px">'
                            + '<i class="fa fa-edit" id="trash" aria-hidden="true" style="color:#1E9FF2;padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="editConstant12('+data.meetingTitleList1[j].pk_i_id+',\''+data.meetingTitleList1[j].meetingnamear+'\')"></i>'
                            + '<i class="fa fa-trash" id="trash" aria-hidden="true" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="deleteCer('+data.meetingTitleList1[j].pk_i_id+',\''+data.meetingTitleList1[j].meetingnamear+'\')"></i>'
                            + '</td>'
                            + '</tr>'
                        i++
                    }

                    $("#subTask3").html(row);

                    $(".loader").addClass('hide');
                    //$(".form-actions").removeClass('hide');
                    $("#name_ar1").val(''),
                    $("#s_name_en1").val(''),
                    $("#meetingManager").val(''),
                    $("#subTask2").children().remove(),
                    $("#AddNew").modal('hide');

                    //$("#QuickAdd").modal('hide');

                    DrawCert($("#fk_i_constant_id1").val())
                    $("#fk_i_constantdet_id1").val('0')
                },
                error: function () {
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    $("#errMsg").text(data.status.msg)
                    $(".loader").addClass('hide');
                    //$(".form-actions").removeClass('hide');
                },
                /*cache: false,
                 contentType: false,
                 processData: false*/
            });
        }
    }
            
    function AddNew(ctrl,title){


        restModalForm();

        $(".loader").removeClass('hide');
        //$(".form-actions").addClass('hide');
        $("#subTask2").children().remove(),
        DrawCert(0)
        //$("#fk_i_constant_id1").val(contid);
        $("#ctrlToRefresh1").val(ctrl);
        $("#ModalTitle").html(title);
        $("#ModalTitle1").html(title);
        $("#AddNew").modal('show');

        $(".loader").addClass('hide');
    }
    
    function restModalForm(){
        $("#name_ar1").val('');
        $("#meetingManager").val('');
        $("#managerID").val('');
        $("#subTask2").html('');
        $(".meettitlesubmit").text('حفظ');
    }
    
    function DrawCert(id){
        return ;
                var formData = {'pk_i_id':id};
                console.log(formData);
                $.ajax({
                    url: 'getMeetingTitleByID',
                    type: 'POST',
                    data: formData,
                    dataType:"json",
                    async: true,
                    success: function (data) {
                        i=1;
                        row='';
                        for(j=0; j<data.meetingTitleList.length;j++) {
                            row += '<tr>'
                                + '<td width="20px">'
                                + i
                                + '</td>'
                                + '<td>'
                                + data.meetingTitleList[j].meetingnamear
                                + '</td>'
                                + '<td width="40px">'
                                + '<i class="fa fa-edit" id="trash" aria-hidden="true" style="color:#1E9FF2;padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="editConstant12('+data.meetingTitleList[j].pk_i_id+',\''+data.meetingTitleList[j].meetingnamear+'\')"></i>'
                                + '<i class="fa fa-trash" id="trash" aria-hidden="true" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="deleteCer('+data.meetingTitleList[j].pk_i_id+',\''+data.meetingTitleList[j].meetingnamear+'\')"></i>'
                                + '</td>'
                                + '</tr>'
                            i++
                        }

                        $("#subTask3").html(row);
                    },
                    error:function(){
                        $(".alert-success").addClass("hide");
                        $(".alert-danger").removeClass('hide');
                        $("#errMsg").text(data.status.msg)
                        $(".loader").addClass('hide');
                        //$(".form-actions").removeClass('hide');
                    },
                    /*cache: false,
                     contentType: false,
                     processData: false*/
                });
            }
            
    function editConstant12(id,title){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var formData = {'id':id};
        console.log(formData);
        $.ajax({
            url: 'getMeetingDetailsByID',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {meetingManager
                console.log(data);
                $("#name_ar1").val(data.name);
                $("#fk_i_constantdet_id1").val(data.id);
                if(data.adminData!=null){
                $("#meetingManager").val(data.adminData.name);
                $("#managerID").val(data.adminData.id);
                }
                else{
                $("#meetingManager").val('');
                $("#managerID").val('');
                }
                
                if(data.signature_empData!=null){
                    $(".man1").val(data.signature_empData.name);
                    $("#signature_emp").val(data.signature_empData.id);
                    $("#signature_jobtitle").val(data.signature_jobtitle);
                }
                else{
                    $(".man1").val('');
                    $("#signature_emp").val('');
                    $("#signature_jobtitle").val('');
                }
                $("#subTask2").html('');
                for(j=0; j<data.usersData.length;j++) {
                    row='<tr>'
                        +'<td>'+data.usersData[j].name
                        +'		<input type="hidden" name="MemberNameList[]" value="'+data.usersData[j].name+'" >'
                        +'</td>'
                        +'<td>'
                        +'		<input type="hidden" name="MemberIDList[]" value="'+data.usersData[j].id+'" >'
                        +'</td>';
                    row+='	<td style="border: hidden;" >'
                        +'	<div class="input-group-append" style="margin-left: 0px !important" onclick="$(this).parent().parent().remove()">'
                        +'	<span class="input-group-text input-group-text2" style="margin-left: 0;" >'
                        +'	<i class="fa fa-trash" id="plusElement2"></i>'
                        +'	</span>'
                        +'	</div>'
                        +'	</td>'
                        +'</tr>';
                    $("#subTask2").append(row);
                }
                
                    $("#persubTask2").html('')
                for(j=0; j<data.employeeData.length;j++) {
                    row='<tr>'
                        +'<td>'+data.employeeData[j].name
                        +'		<input type="hidden" name="meetingPerEmpID[]" value="'+data.employeeData[j].id+'" >'
                        +'</td>';
                    row+='	<td style="border: hidden;" >'
                        +'	<div class="input-group-append" style="margin-left: 0px !important" onclick="$(this).parent().parent().remove()">'
                        +'	<span class="input-group-text input-group-text2" style="margin-left: 0;" >'
                        +'	<i class="fa fa-trash" id="plusElement2"></i>'
                        +'	</span>'
                        +'	</div>'
                        +'	</td>'
                        +'</tr>';
                    $("#persubTask2").append(row);
                }
            },
            error:function(){
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $("#errMsg").text(data.status.msg)
                $(".loader").addClass('hide');
                //$(".form-actions").removeClass('hide');
            },
            /*cache: false,
             contentType: false,
             processData: false*/
        });
        $(".modalBtn").text('تعديل');
    }
            
    function deleteCer(id,title){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                //deleteCertification
                fillIn=$("#ctrlToRefresh1").val();
                if(!confirm('هل انت متاكد من حذف هذا التسجيل ؟'))
                    return
                var formData = {
                    'id': id,
                    'meetingnamear': title
                    /*'fk_i_constant_id': $("#fk_i_constant_id1").val(),*/
                };
                console.log(formData);
                $.ajax({
                    url: 'deleteMeetingTitle',
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    async: true,
                    success: function (data) {
                        Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{trans('admin.meeting_deleted')}}',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        location.reload();
                    },
                    error: function () {
                        $(".alert-success").addClass("hide");
                        $(".alert-danger").removeClass('hide');
                        $("#errMsg").text(data.status.msg)
                        $(".loader").addClass('hide');
                    },
                    /*cache: false,
                     contentType: false,
                     processData: false*/
                });
            }
    function deletemember(element,empid,meetingid){
        if(!confirm('هل تريد حذف العضو؟'))
            return;
                formData={'empid':empid,'meetingid':meetingid}
                $.ajax({
                    url: 'c_agenda/deleteMember',
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    async: true,
                    success: function (data) {
                        $(element).parent().parent().remove()
                    },
                    error: function () {
                        $(".alert-success").addClass("hide");
                        $(".alert-danger").removeClass('hide');
                        $("#errMsg").text(data.status.msg)
                        $(".loader").addClass('hide');
                    },
                    /*cache: false,
                     contentType: false,
                     processData: false*/
                });
            }
            
    function deletePermember(id){
        
        if(!confirm('هل تريد حذف العضو؟'))
            return;
        formData={'empid':id,'meetingid':$("#fk_i_constantdet_id1").val()}
        $.ajax({
            url: 'c_agenda/deletePerMember',
            type: 'POST',
            data: formData,
            dataType: "json",
            async: true,
            success: function (data) {
                $(element).parent().parent().remove()
            },
            error: function () {
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $("#errMsg").text(data.status.msg)
                $(".loader").addClass('hide');
            },
            /*cache: false,
             contentType: false,
             processData: false*/
        });
            
    }

</script>