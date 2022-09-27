@extends('layouts.admin')

@section('search')

    <li class="dropdown dropdown-language nav-item hideMob">

        <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">

    </li>

@endsection

@section('content')



    <section id="hidden-label-form-layouts">

        <form method="post" id="setting_form" enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-xl-6 col-lg-6">

                    <div class="card rSide">

                        <div class="card-header">

                            <h4 class="card-title"><img src="https://db.expand.ps/images/Office_Equipment_-_088_-_Printer-512.png" height="32">

                                {{trans('assets.equp_header')}}

                            </h4>

                        </div>

                        <div class="card-body">

                            <div class="form-body">

                                <div class="row">

                                    <div class="col-lg-8 col-md-12 ">

                                        <div class="form-group ">

                                            <div class="input-group w-s-87 width88">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.equp_name')}}

                                            </span>

                                                </div>

                                                <input type="text" id="Equipment"

                                                       class="form-control ac ui-autocomplete-input"

                                                       placeholder="" name="Equipment" autocomplete="off">

                                            </div>

                                            <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>

                                        </div>

                                        <input type="hidden" id="equpiment_id" name="equpiment_id" value="">



                                        <div class="form-group">

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.brand')}}

                                            </span>

                                                </div>

                                                <select type="text" id="brand" name="brand" class="form-control brand">

                                                    <optgroup label=" ">

                                                    <option value="0"> -- {{trans('admin.select')}} --</option>

                                                        @foreach($brand as $bra)

                                                            <option value="{{$bra->id}}"> {{$bra->name}} </option>

                                                        @endforeach

                                                </select>

                                                </optgroup>



                                                <div class="input-group-append" 

                                                onclick="ShowConstantModal(77,'brand','العلامة التجارية')">

                                            <span class="input-group-text input-group-text2">

                                                <i class="fa fa-external-link"></i>

                                            </span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.equp_type')}}

                                            </span>

                                                </div>

                                                <select type="text" id="Eqtype" name="Eqtype" class="form-control Eqtype">

                                                    <optgroup label=" ">

                                                        <option value="0"> -- {{trans('admin.select')}} --</option>

                                                        <?php $types=$type;?>

                                                        @foreach($equp_types as $type)

                                                            <option value="{{$type->id}}"> {{$type->name}} </option>

                                                        @endforeach

                                                </select>

                                                </optgroup>



                                                <div class="input-group-append" 

                                                onclick="ShowConstantModal(78,'Eqtype','نوع المعدات')">

                                            <span class="input-group-text input-group-text2">

                                            <i class="fa fa-external-link"></i>

                                            </span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                <!-- <div class="col-lg-4 col-md-12">

                                <img src="https://db.expand.ps/images/equipment.jpg" style="cursor: pointer;" width="150" height="100" id="equipmentimg" onclick="document.getElementById('userimgpath').click(); return false">

                                <input type="hidden" id="equipmentimgpath" name="equipmentimgpath">

                                <input type="file" class="form-control-file" id="userimgpath" name="imgPic" style="display: none" onchange="doUploadPic()">

                                <meta name="csrf-token" content="{{ csrf_token() }}" />



                            </div> -->

                                    <div class="col-md-4" style="text-align: center;">

                                        <img id="userProfileImg" src="https://db.expand.ps/images/equipment.jpg" style="max-height: 100px; cursor:pointer" onclick="document.getElementById('imgPic').click(); return false">

                                        <input type="file" class="form-control-file" id="imgPic" name="imgPic" style="display: none" onchange="doUploadPic()" aria-invalid="false">

                                        <input type="hidden" id="userimgpath" name="userimgpath">

                                        <meta name="csrf-token" content="{{ csrf_token() }}" />



                                    </div>

                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group">

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.equp_status')}}

                                            </span>

                                                </div>

                                                <select type="text" id="EqtStatus" name="EqtStatus" class="form-control EqtStatus" onchange="if($(this).val()==2128)$('.failDate').show();else $('.failDate').hide();">

                                                    <optgroup label=" ">

                                                    <option value="0"> -- {{trans('admin.select')}} --</option>

                                                        @foreach($equp_status as $status)

                                                            <option value="{{$status->id}}"> {{$status->name}} </option>

                                                    @endforeach

                                                </select>

                                                </optgroup>

                                                <div class="input-group-append" 

                                                onclick="ShowConstantModal(79,'EqtStatus','حالة الجهاز')">

                                            <span class="input-group-text input-group-text2">

                                            <i class="fa fa-external-link"></i>

                                            </span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group">

                                            <div class="input-group w-s-87 failDate" style="display:none; width: 100% !important;">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                تاريخ الإتلاف

                                            </span>

                                                </div>

                                                <input type="text" id="failDate" class="form-control" placeholder="dd/mm/yyyy" name="failDate">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-12">

                                        <div class="form-group">

                                            <div class="input-group w-s-87">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.serial_No')}}

                                            </span>

                                                </div>

                                                <input type="text" id="SerialNo" class="form-control " placeholder="" name="SerialNo">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-12">

                                        <div class="form-group">

                                            <div class="input-group w-s-87" style="width: 100% !important;">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.internal_No')}}

                                            </span>

                                                </div>

                                                <input type="text" id="InternalNo" class="form-control " placeholder="" name="InternalNo">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-12">

                                        <div class="form-group">

                                            <div class="input-group w-s-87" style="width: 100% !important;">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.count')}}

                                            </span>

                                                </div>

                                                <input type="text" id="PiceCnt" class="form-control " placeholder="" name="PiceCnt">

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group">

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">

                                                    {{trans('assets.dept')}}

                                                </span>

                                                </div>

                                                <select type="text" id="Department" name="Department" class="form-control">

                                                    <optgroup label=" ">

                                                        @foreach($departments as $department)

                                                            <option value="{{$department->id}}"> {{$department->name}} </option>

                                                    @endforeach

                                                </select>

                                                </optgroup>



                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <div class="input-group w-s-87" style="width: 100% !important;">

                                                <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">

                                                    {{trans('assets.manager')}}

                                                </span>

                                                </div>

                                                <select type="text" id="pinc3" name="pinc3" class="form-control">

                                                    <optgroup label=" ">

                                                        @foreach($admins as $admin)

                                                            <option value="{{$admin->id}}"> {{$admin->nick_name}} </option>

                                                    @endforeach

                                                </select>

                                                </optgroup>



                                            </div>

                                        </div>

                                    </div>

                                </div>







                                <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>



                                <div class="row" style="">

                                    <div class="col-md-4" id="equipmentdvtext1" style="display: block">

                                        <div class="form-group">

                                            <div class="input-group w-s-87" style="width: 100% !important;">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.date_sale')}}

                                            </span>

                                                </div>



                                                <input type="text" id="dateinput" name="dateinput" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:38px;">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-4" id="equipmentdvtext2" style="display: block">

                                        <div class="form-group">

                                            <div class="input-group w-s-87" style="width: 100% !important;">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.expiry_date')}}

                                            </span>

                                                </div>

                                                <input type="text" name="Wdateinput" id="Wdateinput" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:38px;">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-4" id="equipmentdvtext3" style="display: block;">

                                        <div class="form-group">

                                            <div class="input-group w-s-87" style="width: 100% !important;">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.cost')}}

                                            </span>

                                                </div>

                                                <input id="OrgSalary2" name="OrgSalary" class="form-control numFeild " placeholder="00.00" style="    border-radius: 0rem !important;">

                                                <select id="OrgCurrencyID" name="OrgCurrencyID" type="text" class="form-control" style=" height: 37px !important;">

                                                    <option> - </option>

                                                    <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>

                                                    <option value="dollar"> {{trans('admin.dollar')}} </option>

                                                    <option value="dinar">{{trans('admin.dinar')}}  </option>

                                                    <option value="euro">{{trans('admin.euro')}}  </option>

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="row">

                                    <div class="col-sm-12">

                                        <div class="form-group">

                                            <div class="input-group w-s-87" style="width:100% !important">

                                                <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.note_repair')}}

                                            </span>

                                                </div>

                                                <textarea type="text" id="MantinanceNote" class="form-control" placeholder="{{trans('assets.note_repair')}}" name="MantinanceNote" style="border-radius:3px !important;height: 35px;" aria-invalid="false"></textarea>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-6 col-lg-6">

                    <div class="card lSide" style="min-height:555.5px">

                        <div class="card-header">

                            <h4 class="card-title">

                                <img src="https://db.expand.ps/images/sponsor.png" width="32" height="32">

                                {{trans('assets.suplier_header')}}

                            </h4>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <div class="input-group" style="width: 99% !important;">

                                            <div class="input-group-prepend">

                                    <span class="input-group-text" id="basic-addon1">

                                        {{trans('assets.address_detail')}}

                                    </span>

                                            </div>

                                            <textarea type="text" id="AddressDetailsAR" class="form-control" placeholder="{{trans('assets.address_detail')}}" name="AddressDetailsAR" style="height: 35px;"></textarea>



                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-8">

                                    <div class="form-group" id="equipmentdvtext12" style="display:block;">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1">

                                            {{trans('assets.company_s')}}

                                        </span>

                                            </div>



                                            <select onchange="getSupplierInfo($(this).val(),'formData1 #PHnum1')" type="text" id="Supplier" name="Supplier" class="form-control">

                                                    <option value="">-- {{trans('admin.select')}} --</option>

                                                @foreach($suppliers as $supplier)

                                                    <option value="{{$supplier->id}}"> {{$supplier->name}}  </option>

                                                @endforeach

                                            </select>

                                            <div class="input-group-append hide" onclick="">

                                                <a class="input-group-text input-group-text2" href="https://db.expand.ps/addSuppler">

                                                    <i class="fa fa-external-link-alt"></i>

                                                </a>

                                            </div>



                                        </div>

                                    </div>



                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <div class="input-group" style="width: 100% !important;">

                                            <div class="input-group-prepend">

                                        <span class="input-group-text input-group-text1" id="basic-addon1">

                                        <img src="https://db.expand.ps/images/jawwal35.png">

                                        </span>

                                            </div>

                                            <input type="text" id="PHnum1" name="PHnum1" maxlength="10" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1">



                                        </div>



                                    </div>

                                </div>



                            </div>

                            <div class="row">

                                <div class="col-md-8">

                                    <div class="form-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                    <span class="input-group-text" id="basic-addon1">

                                        {{trans('assets.company_sp')}}

                                    </span>

                                            </div>



                                            <select onchange="getSponserInfo($(this).val(),'formData1 #PHnum2')" type="text" id="SponsorName" name="SponsorName" class="form-control">

                                                <option value="">-- {{trans('admin.select')}} --</option>

                                                @foreach($sponsers as $sponser)

                                                    <option value="{{$sponser->id}}"> {{$sponser->name}}  </option>

                                                @endforeach

                                                

                                            </select>

                                            <div class="input-group-append hide">

                                                <a class="input-group-text input-group-text2" href="https://db.expand.ps/addSponsor">

                                                    <i class="fa fa-external-link-alt"></i>

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <div class="input-group" style="width:100% !important;">

                                            <div class="input-group-prepend">

                                        <span class="input-group-text input-group-text1" id="basic-addon1">

                                        <img src="https://db.expand.ps/images/jawwal35.png">

                                        </span>

                                            </div>

                                            <input type="text" id="PHnum2" name="PHnum2" maxlength="10" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1">



                                        </div>

                                    </div>

                                </div>



                            </div>

                            <div class="row">

                                <div class="form-group col-lg-12" id="equipmentdvtext14" style="display:none;">

                                    <textarea type="text" id="MantinanceNote1" class="form-control" placeholder="ملاحظات الصيانة" name="MantinanceNote1" style="border-radius:3px !important;height: 35px;"></textarea>

                                </div>

                            </div>




                        @can('assets_archives')
                            <div class="card-header" style="padding-top:0px;">

                                <h4 class="card-title">

                                    <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32">

                                    {{trans('assets.archive')}}

                                </h4>

                                <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->

                                <div class="heading-elements" style="display: none">

                                    <ul class="list-inline mb-0">

                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>

                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>

                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                        <li><a data-action="close"><i class="ft-x"></i></a></li>

                                    </ul>

                                </div>



                            </div>

                            <div class="card-content collapse show">

                                <div class="card-body" style="padding-bottom: 0px;">

                                    <div class="row" style="text-align: center">

                                        <div class="col-md-2 w-s-50" style="padding: 0px;">

                                            <div class="form-group">

                                                <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('#Equipment').val());$('#msgModal').modal('show')" style="cursor:pointer">

                                                <div class="form-group">

                                                    <a onclick="$('#ArchModalName').html($('#Equipment').val());$('#msgModal').modal('show');" style="color:#000000"> {{trans('assets.archive')}}

                                                        <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            @endcan
                            <div class="row" style="display: none">

                                <div class="col-md attachs-section">

                                    <img src="https://db.expand.ps/images/upload.png" width="40" height="40">

                                    <span class="attach-header"> {{trans('assets.attach')}}

                                        <span id="attach-required">*</span>

                            <span class="attach-icons">

                                <a href="#" onclick="document.getElementById('formData1upload-file[]').click(); return false" class="attach-icon"><i class="fa fa-paperclip"></i></a>

                                <a href="#" onclick="document.getElementById('formData1upload-image[]').click(); return false" class="attach-icon"><i class="fa fa-image"></i></a>

                                <a onclick="showLinkModal('formData1')" class="attach-icon"><i class="fa fa-link"></i></a>

                            </span>

                        </span>

                                </div>

                            </div>

                            <div class="row attachs-body" style="display: none">

                                <div class="form-group col-12 mb-2">

                                    <input type="hidden" name="fromname" value="formData1">

                                    <input type="file" class="form-control-file" id="formData1upload-file[]" multiple="" name="formData1UploadFile[]" onchange="doUploadAttach('formData1')" style="display: none" accept=".doxc, .xlsx, .pptx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">

                                    <input type="file" class="form-control-file" id="formData1upload-image[]" multiple="" name="formData1UploadImage[]" onchange="doUploadAttach('formData1')" accept="image/*" style="display: none">

                                    <div class="row formData1ImagesArea">

                                    </div>

                                    <div class="row formData1FilesArea" style="margin-left: 0px;">

                                    </div>

                                    <div class="row formData1LinkArea" style="margin-left: 0px;">

                                    </div>

                                </div>

                            </div>



                            <div class="form-actions" style="border-top:0px;">

                                <div class="text-right">
                                    @can('edit_model')
                                    <button  type="submit" style="display:none;" id="editBtn" class="btn btn-primary">{{trans('admin.modify')}} <i class="ft-thumbs-up position-right"></i></button>
                                    @endcan
                                    <button  type="submit" id="saveBtn" class="btn btn-primary">{{trans('assets.save')}} <i class="ft-thumbs-up position-right"></i></button>

                                    <button type="reset" onclick="redirectURL('linkIcon1-tab1')" class="btn btn-warning reset-data"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </section>

    <?php $type=$types;?>

    @include('dashboard.component.assets_archive')

    @include('dashboard.component.fetch_table')



@endsection



@section('script')



    <script>

$('.reset-data').click(function(event){

    $("#msgStatic").html("(0)");



});

        $( function() {

            $( ".ac" ).autocomplete({

                source: 'equip_auto_complete',

                minLength: 1,



                select: function( event, ui ) {

                    let equip_id = ui.item.id

                    update(equip_id);

                    // $.ajax({

                    //     type: 'get', // the method (could be GET btw)

                    //     url: "equip_info",

                    //     data: {

                    //         equip_id: equip_id,

                    //     },

                    //     success:function(response){

                    //         $('#equpiment_id').val(response.info.id);

                    //         $('#Equipment').val(response.info.name);

                    //         $('#SerialNo').val(response.info.serial_number);

                    //         $('#InternalNo').val(response.info.internal_number);

                    //         $('#PiceCnt').val(response.info.count);

                    //         $('#dateinput').val(response.info.selling_date);

                    //         $('#Wdateinput').val(response.info.wdate_input);

                    //         $('#OrgSalary2').val(response.info.price);

                    //         $('#MantinanceNote').val(response.info.notes);

                    //         $("#AddressDetailsAR").val(response.info.address);

                    //         $("#PHnum2").val(response.info.sponsor_phone);

                    //         $("#PHnum1").val(response.info.supply_phone);

                    //         if(response.info.image != window.location.origin){

                    //             $('#userProfileImg').attr('src', response.info.image);

                    //         }else{

                    //             $('#userProfileImg').attr('src', window.location.origin+'/assets/images/ico/user.png');

                    //         }

                    //         $("#msgStatic").html(response.ArchiveCount);

                    //         drawTablesArchive(response.Archive,response.copyTo,response.jalArchive,

                    //         response.copyToCount,response.linkToCount,response.archiveCount);

                    //         $('#equipmentimg').attr('src', response.info.image);



                    //         $("select#brand option")

                    //                 .each(function() { this.selected = (this.text == response.brand);

                    //                 });

                    //         $("select#Eqtype option")

                    //                 .each(function() { this.selected = (this.text == response.type);

                    //                 });



                    //         $("select#EqtStatus option")

                    //                 .each(function() { this.selected = (this.text == response.status);

                    //                 });

                    //         $("select#Department option")

                    //                 .each(function() { this.selected = (this.text == response.department);

                    //                 });

                    //         $("select#pinc3 option")

                    //                 .each(function() { this.selected = (this.text == response.admin);

                    //                 });



                    //         $("select#OrgCurrencyID option")

                    //                 .each(function() { this.selected = (this.text == response.Currency);

                    //                 });

                    //         $("select#Supplier option")

                    //                 .each(function() { this.selected = (this.text == response.supplyer);

                    //                 });

                    //         $("select#SponsorName option")

                    //                 .each(function() { this.selected = (this.text == response.sponser);

                    //                 });



                    //     },

                    // });

                }

            });

        } );

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $('#setting_form').submit(function(e) {

            $(".loader").removeClass('hide');



            e.preventDefault();

            let formData = new FormData(this);

            $( "#Equipment" ).removeClass( "error" );

            $( "#brand" ).removeClass( "error" );

            $( "#Eqtype" ).removeClass( "error" );

            $( "#Department" ).removeClass( "error" );

            $.ajax({

                        type:'POST',

                        url: "store_equpment",

                        data: formData,

                        contentType: false,

                        processData: false,

                        success: (response) => {

                        $(".loader").addClass('hide');

            $('.wtbl').DataTable().ajax.reload();

            if (response) {

                Swal.fire({

                    position: 'top-center',

                    icon: 'success',

                    title: '{{trans('admin.data_added')}}',

                    showConfirmButton: false,

                    timer: 1500

                })

                $('#userProfileImg').attr('src', 'https://db.expand.ps/images/equipment.jpg');

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



                $("#Equipment").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#Equipment" ).removeClass( "error" );

                    }

                });

                $("#brand").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#brand" ).removeClass( "error" );

                    }

                });

                $("#Eqtype").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#Eqtype" ).removeClass( "error" );

                    }

                });



                $("#Department").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#Department" ).removeClass( "error" );

                    }

                });



                if(response.responseJSON.errors.Equipment){

                    $( "#Equipment" ).addClass( "error" );

                }

                if(response.responseJSON.errors.brand){

                    $( "#brand" ).addClass( "error" );

                }

                if(response.responseJSON.errors.Eqtype){

                    $( "#Eqtype" ).addClass( "error" );

                }

                if(response.responseJSON.errors.Department){

                    $( "#Department" ).addClass( "error" );

                }

            }

        });

        });

        function update($id)

        {

            let equip_id = $id;

            $('#saveBtn').css('display','none');
            $('#editBtn').css('display','inline-block');;

            $.ajax({

                type: 'get', // the method (could be GET btw)

                url: "equip_info",

                data: {

                    equip_id: equip_id,

                },

                success:function(response){
                    
                    $archiveCount=0;   
                    @can('equpContractArchive')
                    getContractArchive(response.info.id,response.contractArchiveCount);
                    $archiveCount+=response.contractArchiveCount;
                    @endcan
                    
                    @can('equpArchive')
                    getArchive(response.info.id,response.archiveCount);
                    $archiveCount+=response.archiveCount;
                    @endcan
                    
                    @can('equpCopyArchive')
                    getCopyArchive(response.info.id,response.copyToCount);
                    $archiveCount+=response.copyToCount;
                    @endcan
                    
                    @can('equpJalArchive')
                    getJalArchive(response.info.id,response.linkToCount);
                    $archiveCount+=response.linkToCount;
                    @endcan
            
                    $('#equpiment_id').val(response.info.id);

                    $('#Equipment').val(response.info.name);

                    $('#SerialNo').val(response.info.serial_number);

                    $('#InternalNo').val(response.info.internal_number);

                    $('#PiceCnt').val(response.info.count);

                    $('#dateinput').val(response.info.selling_date);

                    $('#Wdateinput').val(response.info.wdate_input);

                    $('#OrgSalary2').val(response.info.price);

                    $('#MantinanceNote').val(response.info.notes);

                    $("#AddressDetailsAR").val(response.info.address);

                    $("#PHnum2").val(response.info.sponsor_phone);

                    $("#PHnum1").val(response.info.supply_phone);

                    $("#msgStatic").html($archiveCount);

                    // drawTablesArchive(response.Archive,response.copyTo,response.jalArchive,

                    //         response.copyToCount,response.linkToCount,response.archiveCount);         
                    // $('#equipmentimg').attr('src', response.info.image);

                    if(response.info.image != window.location.origin){

                        $('#userProfileImg').attr('src', response.info.image);

                    }else{

                        $('#userProfileImg').attr('src', window.location.origin+'/assets/images/ico/user.png');

                    }



                    $('#equipmentimg').attr('src', response.info.image);



                    $("select#brand option")

                            .each(function() { this.selected = (this.text == response.brand);

                            });

                    $("select#Eqtype option")

                            .each(function() { this.selected = (this.text == response.type);

                            });



                    $("select#EqtStatus option")

                            .each(function() { this.selected = (this.text == response.status);

                            });

                    $("select#Department option")

                            .each(function() { this.selected = (this.text == response.department);

                            });

                    $("select#pinc3 option")

                            .each(function() { this.selected = (this.text == response.admin);

                            });



                    $("select#OrgCurrencyID option")

                            .each(function() { this.selected = (this.text == response.Currency);

                            });

                    $("select#Supplier option")

                            .each(function() { this.selected = (this.text == response.supplyer);

                            });

                    $("select#SponsorName option")

                            .each(function() { this.selected = (this.text == response.sponser);

                            });

                    window.scrollTo(0, 0);

                },

            });

        }

        function delete_equip($id) {
    if(confirm('هل انت متاكد من حذف المُعدة؟ لن يمكنك استرجاعها فيما بعد')){
    let equip_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "equip_delete",

        data: {

            equip_id: equip_id,
            _token: _token,
        },

        success: function(response) {

            $(".loader").addClass('hide');

            $('.wtbl').DataTable().ajax.reload();

            // setTimeout(function(){

            //     $(".alert-success").addClass("hide");

            // },2000)

            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تم الحذف بنجاح',

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

                title: 'خطأ فى عملية الحذف',

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

