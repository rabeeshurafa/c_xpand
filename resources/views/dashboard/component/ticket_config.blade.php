<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
    padding: 2px 6px !important;
    margin-top: 0 !important;
    background-color: #1E9FF2!important;
    border-color: #1E9FF2 !important;
    color: #FFFFFF;
    margin-left: 8px !important;
    margin-bottom: 2px;
}

</style>

<div class="modal fade text-left" id="AppModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel1">إعدادات 
                ({{ $ticketInfo->ticket_name }})
                </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

            </div>

            <div class="modal-body" style="background: #f4f5fa">

<form method="post" id="ticketConfigModal" enctype="multipart/form-data">
                <div class="form-body">


                        {{-- <div class="col-sm-12"> --}}
        @csrf
                    <div class="row DisabledItem white-row">

                            <div class="col-sm-12 col-md-6">
                                <div class="card ">
                                    {{-- <div class="card-header">
                                        <h4 class="card-title">
                                            <img src="https://db.expand.ps/images/waterTicketIco.png" width="32"
                                                height="32">
                                            {{ 'اشتراك مياه' }}
                                        </h4>

                                        <div class="heading-elements1 onOffArea form-group mt-1"
                                            style="display: none;    top: -5px;">
                                            <input type="checkbox" id="myonoffswitchHeader" class="switchery"
                                                data-size="xs" checked="">
                                        </div>
                                    </div> --}}
                                    <div class="card-content collapse show">
                                        <div class="card-body" style="padding-bottom: 0px;">
                                            <div class="form-body">
                                                <div class="row mobRow">
                                                    
                                                    <div class="form-group col-md-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{ 'المسؤول عن استقبال الطلب' }}
                                                                </span>
                                                            </div>
                                                            <input type="text" id="reciver_name"  
                                                            class="form-control numFeild modalAC" value="{{ isset($ticketInfo->admin)?$ticketInfo->admin->nick_name:'' }}"
                                                            placeholder="{{ 'اسم الموظف' }}" name="reciver_name">
                                                            <input type="hidden" id="reciver" name="reciver"
                                                            value="{{$ticketInfo->emp_to_receive}}">
                                                            <input type="hidden" id="id" name="id"
                                                            value="{{$ticketInfo->id}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="input-group col-md-6" style="padding-left: 69px;padding-right: 0px;">
                                                        <div class="input-group-prepend" style="height: 34px;">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"ارسال الطلب لغير الموظف التلقائى"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="single_receive" name="single_receive" class="form-control myselect2"
                                                            aria-invalid="false" style="height: 34px !important;">
                                                            <option value="1" {{ $ticketInfo->single_receive==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->single_receive==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>
                                                    
                                                </div>
                                                    
                                                
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:25%">
                                                            <span class="input-group-text" id="basic-addon1" style=" width: 100%; ">
                                                                {{ 'المسؤول عن إغلاق الطلب' }}
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_close_json" name="emp_to_close_json[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:75%">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_close_json))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:25%">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%; ">
                                                                {{ 'المسموح له سحب الطلب' }}
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_revoke_json" name="emp_to_revoke_json[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:75%;">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_revoke_json))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:25%">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%;">
                                                                {{ 'المسموح له تعديل الطلب' }}
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_update_json" name="emp_to_update_json[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:75%;">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_update_json))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>        

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:25% ;">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%; ">
                                                                {{ 'المسموح له إعادة فتح الطلب' }}
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_reopen_ticket" name="emp_to_reopen_ticket[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:75%;">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_reopen_ticket))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>    

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:25% ;">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%; ">
                                                                يسمح لهم بإصدار تقرير الطلب
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_report_ticket" name="emp_to_report_ticket[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:75%;">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_report_ticket))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:25% ;">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%; ">
                                                                نسخة تلقائية إلى      
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_tag_ticket" name="emp_to_tag_ticket[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:75%;">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_tag_ticket))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:40% ;">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%; ">
                                                                المسؤول عن استقبال الطلب من البورتال      
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_access_portal" name="emp_to_access_portal[]"  class="select2 select2-multiple-input-sm form-control portal" multiple="multiple" data-toggle="select" style="width:60%;">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_access_portal))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12" style="padding-right: 0px; padding-left: 30px; display:none ">
                                                    <table width="100%" class="detailsTB table archTbl" name="Courses" id="Courses">
                                                        <thead >
                                                            <tr>
                                                                <th class="col-md-6" style="text-align: center!important;color: white;">
                                                                    {{ 'القسم' }} </th>
                                                                <th class="col-md-5" style="text-align: center!important;color: white">
                                                                    {{ 'ملاحظات' }} </th>
                                                                <th width="20px">
                                                                    <i class="fa fa-plus-circle" id="plusElement3"
                                                                        style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: aliceblue;font-size: 15pt;">
            
                                                                    </i>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="msgRList3">
                                                            <tr>
                                                                {{-- <td width="80px">
                                                                    <input  class="form-control" type="text" name="courses[]" value="testtest">
                                                                    </td> --}}
                                                                <td class="col-md-6" >
                                                                    <input class="form-control" type="text" onclick="adddept()" name="department[]" >
                                                                        </td>
                                                                <td class="col-md-5" >
                                                                    <input  class="form-control" type="text" name="comment[]">
                                                                </td>
                                                                <td onclick="$(this).parent().remove()" > 
                                                                      <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "> </i> 
                                                                </td>
                                                            </tr>
            
                                                        </tbody>
                                                    </table>
            
                                                </div>
            

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="card ">
                                    {{-- <div class="card-header">
                                        <h4 class="card-title">
                                            <img src="https://db.expand.ps/images/waterTicketIco.png" width="32"
                                                height="32">
                                            {{ 'اشتراك مياه' }}
                                        </h4>

                                        <div class="heading-elements1 onOffArea form-group mt-1"
                                            style="display: none;    top: -5px;">
                                            <input type="checkbox" id="myonoffswitchHeader" class="switchery"
                                                data-size="xs" checked="">
                                        </div>
                                    </div> --}}
                                    <div class="card-content collapse show">
                                        <div class="card-body" style="padding-bottom: 0px;">
                                            <div class="form-body">

                                                <div class="row mobRow">
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"تابع لقسم"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="dept_id" name="dept_id" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <?php foreach($department as $row){?>
                                                            <option value="{{$row->id}}"  {{ $ticketInfo->dept_id==$row->id?'selected':'' }}> {{$row->name}} </option>
                                                            <?php }?>
                                                        </select>  
                                                    </div>

                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{ 'الوقت الإفتراضى لإغلاق الطلب' }}
                                                            </span>
                                                        </div>
                                                        <input type="text" id="reciver_name"  
                                                            class="form-control numFeild"
                                                            placeholder="{{ 'الوقت بالساعات' }}" name="time_to_close" 
                                                            value="{{ $ticketInfo->time_to_close }}">
                                                    </div>
                                                </div>

                                                <div class="row mobRow">

                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"إظهار رقم الوصل والمبلغ"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="show_receipt" name="show_receipt" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->show_receipt==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->show_receipt==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>

                                                   <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"رقم الوصل والمبلغ إجبارى"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="receipt_is_need" name="receipt_is_need" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->receipt_is_need==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->receipt_is_need==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>

                                                </div>

                                                <div class="row mobRow">

                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"جدول أسعار (التكاليف)"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="has_price_list" name="has_price_list" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->has_price_list==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->has_price_list==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"هل يوجد ديون سابقة"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="has_debt_list" name="has_debt_list" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->has_debt_list==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->has_debt_list==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>
                                                    </div>
                                                   
                                                    
                                                </div>

                                                <div class="row mobRow">
                                                    
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"هل يوجد مرفقات"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="has_attach" name="has_attach" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->has_attach==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->has_attach==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>

                                                   <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"هل المرفقات إجبارية"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="force_attach" name="force_attach" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->force_attach==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->force_attach==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>
                                                    
                                                </div>

                                                <div class="row mobRow">

                                                     <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"إرسال رسائل SMS"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="send_sms" name="send_sms" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->send_sms==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->send_sms==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>

                                                   <div class="input-group col-md-6 hide" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"تقديم الطلب فى حال تعطيل حساب المواطن"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="apply_for_band_customer" name="apply_for_band_customer" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->apply_for_band_customer==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->apply_for_band_customer==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select> 
                                                    </div>
                                                    
                                                </div>

                                                <div class="row mobRow">
                                                    <div class="input-group col-md-6 hide" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">{{"تقديم الطلب فى حال وجود رخص حرف منتهية"}}</span>
                                                        </div>
                                                        <select type="text" id="apply_with_finished_license" name="apply_with_finished_license" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->apply_with_finished_license==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->apply_with_finished_license==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>
                                                        
                                                    </div>

                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"إظهار أرشيف المواطن مع الطلب"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="show_archive" name="show_archive" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->show_archive==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->show_archive==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mobRow">
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"يسمح بتقديم الطلب من خلال البوابة الإلكترونية"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="public_app" name="public_app" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->public_app==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->public_app==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"إظهار الطلبات السابقة على النظام"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="apps_btn" name="apps_btn" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->apps_btn==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->apps_btn==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>
                                                </div>

                                                <div class="row mobRow">

                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{ 'إظهار رخص الحرف' }}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="joblic_btn" name="joblic_btn" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->joblic_btn==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->joblic_btn==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"يسمح للمشارك بالرد"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="can_reply" name="can_reply" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" > {{'نعم'}} </option>
                                                            <option value="2" > {{'لا'}} </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mobRow">
                                                    
                                                    <div class="input-group col-md-6 hide" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"إظهار سير العمل"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="show_process" name="show_process" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" > {{'نعم'}} </option>
                                                            <option value="2" > {{'لا'}} </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group col-md-6 hide" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{"براءة ذمة مع الطلب"}}
                                                            </span>
                                                        </div>
                                                        <select type="text" id="has_clearance" name="has_clearance" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->has_clearance==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->has_clearance==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>
                                                    
                                                </div>
                                                @if($ticketInfo->ticket_no != 32 && $ticketInfo->ticket_no != 28 && $ticketInfo->ticket_no != 33 && $ticketInfo->ticket_no != 30  && $ticketInfo->ticket_no != 34 && $ticketInfo->ticket_no != 31)
                                                <div class="row mobRow">
                                                    
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                اظهار رقم هوية المواطن 
                                                            </span>
                                                        </div>
                                                        <select type="text" id="show_nationalID" name="show_nationalID" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->show_nationalID==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->show_nationalID==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group col-md-6" style=" padding-bottom: 10px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                هل رقم الهوية اجباري
                                                            </span>
                                                        </div>
                                                        <select type="text" id="required_nationalID" name="required_nationalID" class="form-control myselect2"
                                                            aria-invalid="false">
                                                            <option value="1" {{ $ticketInfo->required_nationalID==1?'selected':'' }}> {{'نعم'}} </option>
                                                            <option value="2" {{ $ticketInfo->required_nationalID==2?'selected':'' }}> {{'لا'}} </option>
                                                        </select>  
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                                
                                                <div class="form-actions" style="border-top:0px; padding-bottom:44px;">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary" id="saveBtn">
                                                            <i class="la la-check-square-o"></i>
                                                            حفظ
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        {{-- </div> --}}


                </div>
                        

</form>

                    

            </div>

        </div>

    </div>

</div>
@section('script')
<script>
$('#AppModal').on('hidden.bs.modal', function (e) {
  location.reload(true);
})

$( function() {
    $( ".modalAC" ).autocomplete({
		source: "{{route('emp_auto_complete')}}",
		minLength: 2,

        select: function( event, ui ) {
            $("#reciver").val(ui.item.id)
        }
	});
    $('#ticketConfigModal').submit(function(e) {
        $(".loader").removeClass('hide');
        if($("#reciver_name").val().length==0){
            console.log($("#reciver_name").val().length);
            $("#reciver").val('0');
        }

       let formData = new FormData(this);
       e.preventDefault();
       $.ajax({
          type:'POST',
          url: "{{route('store_config')}}",
           data: formData,
           contentType: false,
           processData:false ,
           //dataType:json ,
           success: (response) => {
             if (response) {
                $(".loader").addClass('hide');
			    Swal.fire({
    				position: 'top-center',
    				icon: 'success',
    				title: 'تم حفظ الإعدادات',
    				showConfirmButton: false,
    				timer: 1500
    				})
                 }
                 
                $("#AppModal").modal('show')
           },
           error: function(response){
            $(".loader").addClass('hide');
/*
            $("#Name").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#Name" ).removeClass( "error" );
                    }
                });
                $("#NationalID").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NationalID" ).removeClass( "error" );
                    }
                });
                $("#NickName").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NickName" ).removeClass( "error" );
                    }
                });
                $("#DepartmentID").on('change', function (e) {
                        $( "#DepartmentID" ).removeClass( "error" );
                });
                $("#Position").on('change', function (e) {
                        $( "#Position" ).removeClass( "error" );
                });
                $("#JobType").on('change', function (e) {
                        $( "#JobType" ).removeClass( "error" );
                });
                $("#DirectManager").on('change', function (e) {
                        $( "#DirectManager" ).removeClass( "error" );
                });
                $("#MobileNo1").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#MobileNo1" ).removeClass( "error" );
                    }
                });
                $("#HiringDate").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#HiringDate" ).removeClass( "error" );
                    }
                });*/
/*
            if(response.responseJSON.errors.Name){
                $( "#Name" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NationalID){
                $( "#NationalID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NickName){
                $( "#NickName" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DepartmentID){
                $( "#DepartmentID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.Position){
                $( "#Position" ).addClass( "error" );
            }
            if(response.responseJSON.errors.JobType){
                $( "#JobType" ).addClass( "error" );
            }
            if(response.responseJSON.errors.HiringDate){
                $( "#HiringDate" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DirectManager){
                $( "#DirectManager" ).addClass( "error" );
            }
            if(response.responseJSON.errors.MobileNo1){
                $( "#MobileNo1" ).addClass( "error" );
            }*/

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
	
} );



function ShowConfigModal(bindTo) {

// $("#CitizenName").html($("#formDataNameAR").val())

$("#AppModal").modal('show')

}

$(document).ready(function() {
            $('#plusElement3').click(function() {
                $("#msgRList3").append('' +
                    '<tr>' +
                    '<td class="col-md-6">' +
                    ' <input  class="form-control"  type="text" onclick="adddept()"  name="department[]">' +
                    ' </td>' +
                    '<td class="col-md-5" >' +
                    '<input class="form-control"   type="text" name="comment[]">' +
                    '</td>' +
                    '<td onclick="$(this).parent().remove()" >' +
                    '  <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>' +
                    '</td>' +
                    ' </tr>'
                );
            });
        });
    function adddept() {
        $("#msgRList3").append('' +
            '<tr>' +
            '<td class="col-md-6">' +
            ' <input  class="form-control"  type="text" onclick="adddept()"  name="department[]">' +
            ' </td>' +
            '<td class="col-md-5" >' +
            '<input class="form-control"   type="text" name="comment[]">' +
            '</td>' +
            '<td onclick="$(this).parent().remove()" >' +
            '  <i class="fa fa-trash" id="plusElement1" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;  color:#1E9FF2;font-size: 15pt; "></i>' +
            '</td>' +
            ' </tr>'
        );
    }
</script>
@endsection