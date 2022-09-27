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

            <div class="card leftSide" style="min-height:544.562px">

                <div class="card-header">

                    <h4 class="card-title">

                        <img src="https://db.expand.ps/images/car.png" width="32" height="32"> {{trans('assets.vehicles_header')}}

                    </h4>

                </div>

                <div class="card-body">

                    <div class="form-body">

                        <div class="row">

                            <div class="col-lg-8 col-md-12 ">

                                <div class="form-group">

                                    <div class="input-group w-s-87 width88">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.vehicles_name')}}

                                            </span>

                                        </div>



                                        <input type="text" id="Vehiclename" class="form-control ac ui-autocomplete-input" placeholder=" {{trans('assets.vehicles_name')}}" name="Vehiclename" autocomplete="off">

                                        <input type="hidden" id="vehicle_id" name="vehicle_id" value="">

                                    </div>

                                    <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>



                                </div>

                                <div class="form-group">

                                    <div class="input-group w-s-87 width88">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon1">

                                                {{trans('assets.plate')}}

                                            </span>

                                        </div>

                                        <input type="text" id="plateNo" class="form-control" placeholder="" name="plateNo">

                                    </div>

                                </div>

                                <div class="form-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">

                                                    {{trans('assets.vehicles_brand')}}

                                                </span>

                                            </div>

                                            <select type="text" id="vehiclebrand" name="vehiclebrand" class="form-control vehiclebrand">

                                            <optgroup label=" ">

                                                    <option value="0"> -- {{trans('admin.select')}} --</option>

                                            @foreach($vehicleBrands as $bra)

                                              <option value="{{$bra->id}}"> {{$bra->name}} </option>

                                            @endforeach

                                        </select>

                                        </optgroup>

                                        <div class="input-group-append" 

                                        onclick="ShowConstantModal(80,'vehiclebrand','العلامة التجارية للمركبة')">



                                            <span class="input-group-text input-group-text2">

                                                <i class="fa fa-external-link"></i>

                                            </span>

                                        </div>



                                        </div>

                                    </div>

                            </div>



                            <div class="col-md-4" style="text-align: center;">

                                <img id="userProfileImg" src="https://db.expand.ps/images/car.png" style="max-height: 100px; cursor:pointer" onclick="document.getElementById('imgPic').click(); return false">

                                <input type="file" class="form-control-file" id="imgPic" name="imgPic" style="display: none" onchange="doUploadPic()" aria-invalid="false">

                                <input type="hidden" id="userimgpath" name="userimgpath">

                                <meta name="csrf-token" content="{{ csrf_token() }}" />

                            </div>





                            <div class="col-lg-8 col-md-12">

                                <div class="form-group">

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1">

                                            {{trans('assets.vehicles_type')}}

                                        </span>

                                        </div>

                                        <select type="text" id="vehicletype" name="vehicletype" class="form-control vehicletype">

                                        <optgroup label=" ">

                                            <?php $types=$type;?>

                                                    <option value="0"> -- {{trans('admin.select')}} --</option>

                                            @foreach($vehicleTypes as $type)

                                              <option value="{{$type->id}}"> {{$type->name}} </option>

                                            @endforeach

                                        </select>

                                        </optgroup>

                                        <div class="input-group-append" 

                                        onclick="ShowConstantModal(81,'vehicletype','نوع المركبة')">



                                            <span class="input-group-text input-group-text2">

                                                <i class="fa fa-external-link"></i>



                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4 col-md-12" style="padding: 0 !important;">

                                <div class="form-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">

                                                    <img src="https://db.expand.ps/images/gas-station.png" width="15px" height="15px">

                                                    {{trans('assets.fuel')}}

                                                </span>

                                            </div>

                                        



                                            <select type="text" id="oiltype" name="oiltype" class="form-control oiltype">

                                                <option value="">اختر  </option>
                                                @foreach($oilTypes as $oilType)
                                                <option value="{{$oilType->id}}">{{$oilType->name}}  </option>
                                                @endforeach

                                        </select>
                                        
                                        <div class="input-group-append" 

                                        onclick="ShowConstantModal(6109,'oiltype','نوع الوقود')">
                                            
                                            <span class="input-group-text input-group-text2">

                                                <i class="fa fa-external-link"></i>

                                            </span>

                                        </div>

                                        </div>

                                    </div>

                            </div>

                        </div>

                        

                        <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>



                        <div class="row" style="">

                            <div class="form-group col-md-4 mb-2" id="vehicledvtext1" style="display: block">

                                <label class="sr-only" for="dateinput21">{{trans('assets.date_sale')}}</label>

                                <span style="color: #1D9CED">{{trans('assets.date_sale')}} :</span><br style="color: #1D9CED">

                                <input type="text" id="dateinput21" name="dateinput21" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">

                            </div>

                            <div class="form-group col-md-4 mb-2" id="vehicledvtext2" style="display: block">

                                <label class="sr-only" for="Wdateinput22">{{trans('assets.date_end')}}</label>

                                <span style="color: #1D9CED">{{trans('assets.date_end')}}</span><br>

                                <input type="text" id="Wdateinput22" name="Wdateinput22" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">

                            </div>

                            <div class="form-group col-md-4 mb-2" id="vehicledvtext3" style="display: block;">

                                <label class="sr-only" for="CW">{{trans('assets.all_price')}}</label>

                                <span style="color: #1D9CED">{{trans('assets.all_price')}} :</span><br>



                                <input id="OrgSalary3" name="OrgSalary" class="form-control numFeild right_border" placeholder="00.00" style="height: 38px;width: 50%;float: right;">

                                <select id="OrgCurrencyID3" name="OrgCurrencyID3" type="text" class="form-control left_border" style="height: 38px !important;width: 50%;float: right;">

                                    <option> - </option>

                                    <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>

                                    <option value="dollar"> {{trans('admin.dollar')}} </option>

                                    <option value="dinar">{{trans('admin.dinar')}}  </option>

                                    <option value="euro">{{trans('admin.euro')}}  </option>

                                </select>

                            </div>

                        </div>

                        <div class="row" style="">

                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext4" style="display: block">

                                                            <label class="sr-only" for="licensedate"></label>

                                                            <span style="color: #1D9CED">{{trans('assets.date_lic_end')}} :</span><br>

                                                            <input type="text" id="licensedate" name="licensedate" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">

                                                        </div>

                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext12" style="display: block">

                                                            <label class="sr-only" for="Inshurencedate"></label>

                                                            <span style="color: #1D9CED">{{trans('assets.sure_end')}} :</span><br>

                                                            <input type="text" id="Inshurencedate" name="Inshurencedate" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">

                                                        </div>

                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext13" style="display: block;">

                                                            <label class="sr-only" for="pinc2"></label>

                                                            <span style="color: #1D9CED">{{trans('assets.manager')}}</span><br>

                                                            <select id="pinc2" name="pinc2" class="form-control" style="border-radius:3px !important;height:36px !important;">

                                                            <optgroup label=" ">

                                                                @foreach($admins as $admin)

                                                                <option value="{{$admin->id}}"> {{$admin->name}} </option>

                                                                @endforeach

                                                            </select>

                                                            </optgroup>

                                                        </div>

                                                    </div>

                                                    

                       

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-6 col-lg-6">

            <div class="card rightSide">

                <div class="card-header">

                    <h4 class="card-title">

                        <img src="https://db.expand.ps/images/sponsor.png" width="32" height="32">{{trans('assets.suplier_v_header')}}

                    </h4>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-7">

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

                        <div class="col-md-5" style="    padding-left: 10px;">

                            <div class="form-group">

                                <div class="input-group">

                                    <div class="input-group-prepend">

<span class="input-group-text" id="basic-addon1">

    {{trans('assets.manager')}}

</span>

                                    </div>

                                    <select type="text" id="pinc3" name="pinc3" class="form-control">

                                    <optgroup label=" ">

                                            @foreach($admins as $admin)

                                              <option value="{{$admin->id}}"> {{$admin->name}} </option>

                                            @endforeach

                                        </select>

                                        </optgroup>

                                </div>

                            </div>

                        </div>



                    </div>

                    <div class="row" style="display:none">

                        <div class="col-md-12">

                            <div class="form-group">

                                <div class="input-group" style="width: 99% !important;">

                                    <div class="input-group-prepend">

<span class="input-group-text" id="basic-addon1">

    {{trans('assets.address_detail')}}

</span>

                                    </div>

                                    <textarea type="text" id="AddressDetailsAR" class="form-control" placeholder="تفاصيل العنوان" name="AddressDetailsAR" style="height: 35px;"></textarea>



                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-7">

                            <div class="form-group" id="vehicledvtext14" style="display:block;">

                                <div class="input-group">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1">

                                            {{trans('assets.company_s')}}

                                        </span>

                                    </div>



                                    <select onchange="getSupplierInfo($(this).val(),'formData2 #PHnum1')" type="text" id="Supplier" name="Supplier" class="form-control">

                                   

                                            <option value="">

                                                --  {{trans('admin.select')}} --

                                                </option>

                                            @foreach($suppliers as $supplier)

                                            <option value="{{$supplier->id}}"> {{$supplier->name}}  </option>

                                            @endforeach

                                        </select>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="form-group">

                                <div class="input-group">

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

                        <div class="col-md-7">

                            <div class="form-group">

                                <div class="input-group">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1">

                                            {{trans('assets.company_sp')}}

                                        </span>

                                    </div>

                                    <select onchange="getSponserInfo($(this).val(),'formData2 #PHnum2')" type="text" id="Sponsor" name="Sponsor" class="form-control">

                                    

                                            <option value=" ">

                                            -- {{trans('admin.select')}} --

                                            </option>

                                            @foreach($sponsers as $sponser)

                                            <option value="{{$sponser->id}}"> {{$sponser->name}}  </option>

                                            @endforeach

                                        </select>                                    <div class="input-group-append hide">

                                        <a class="input-group-text input-group-text2" href="https://db.expand.ps/addSponsor">

                                        <i class="fa fa-external-link-alt"></i>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="form-group">

                                <div class="input-group">

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

                    <div class="row" style="display: none">

                        <div class="col-md attachs-section">

                            <img src="https://db.expand.ps/images/upload.png" width="40" height="40">

                            <span class="attach-header">{{trans('assets.archive')}}

                            <span id="attach-required">*</span>

                            <span class="attach-icons">

                                <a href="#" onclick="document.getElementById('formData2upload-file[]').click(); return false" class="attach-icon"><i class="fas fa-paperclip"></i></a>

                                <a href="#" onclick="document.getElementById('formData2upload-image[]').click(); return false" class="attach-icon"><i class="far fa-image"></i></a>

                                <a onclick="showLinkModal('formData2')" class="attach-icon"><i class="fas fa-link"></i></a>

                            </span>

                        </span>

                        </div>

                    </div>

                    <div class="row attachs-body" style="display: none">

                        <div class="form-group col-12 mb-2">

                            <input type="hidden" name="fromname" value="formData2">

                            <input type="file" class="form-control-file" id="formData2upload-file[]" multiple="" name="formData2UploadFile[]" onchange="doUploadAttach('formData2')" style="display: none" accept=".doxc, .xlsx, .pptx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">

                            <input type="file" class="form-control-file" id="formData2upload-image[]" multiple="" name="formData2UploadImage[]" onchange="doUploadAttach('formData2')" accept="image/*" style="display: none">

                            <div class="row formData2ImagesArea">

                            </div>

                            <div class="row formData2FilesArea" style="margin-left: 0px;">

                            </div>

                            <div class="row formData2LinkArea" style="margin-left: 0px;">

                            </div>

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

                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('#Vehiclename').val());$('#msgModal').modal('show')" style="cursor:pointer">

                                            <div class="form-group">

                                                <a onclick="$('#ArchModalName').html($('#Vehiclename').val());$('#msgModal').modal('show')" style="color:#000000">{{trans('assets.archive')}}

                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endcan
                    <div class="form-actions" style="border-top:0px;">

                        <div class="text-right">
                        
                            
                        @can('edit_model')
                        <button id="editBtn" style="display:none" class="btn btn-primary save-data">{{trans('admin.modify')}}<i class="ft-thumbs-up position-right"></i></button>
                        @endcan
                        <button id="saveBtn" class="btn btn-primary save-data">{{trans('assets.save')}}<i class="ft-thumbs-up position-right"></i></button>
                        
                        <button type="reset" class="btn btn-warning reset-data"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

</section>

<?php $type=$types;?>

@include('dashboard.component.vehicle_archive')

@include('dashboard.component.fetch_table')



@stop



@section('script')

<script>

$('.reset-data').click(function(event){

    $("#msgStatic").html("(0)");



});

$( function() {

    $( ".ac" ).autocomplete({

            source: 'vehicle_auto_complete',

            minLength: 1,

            

            select: function( event, ui ) {

                let vehcile_id = (ui.item.id);

                update(vehcile_id);

            },

        });

            });

function update($id)

{

    

    let vehcile_id = $id;

    $('#saveBtn').css('display','none');
    $('#editBtn').css('display','inline-block');

                $.ajax({

                type: 'get', // the method (could be GET btw)

                url: "vehcile_info",

                data: {

                    vehcile_id: vehcile_id,

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

                    $('#vehicle_id').val(response.info.id);



                $('#Vehiclename').val(response.info.name);

                $('#plateNo').val(response.info.serial_number);

                $('#dateinput21').val(response.info.selling_date);

                $('#Wdateinput22').val(response.info.wdateinput);

                $('#licensedate').val(response.info.licensedate);

                $('#OrgSalary3').val(response.info.price);

                $('#Inshurencedate').val(response.info.Inshurencedate);

                $("#PHnum2").val(response.info.sponsor_phone);

                $("#PHnum1").val(response.info.supply_phone);

                $('#carimg').attr('src', response.info.image);

                $("#msgStatic").html($archiveCount);

                if(response.info.image != window.location.origin){

                $('#userProfileImg').attr('src', response.info.image);  

                }else{

                    $('#userProfileImg').attr('src','https://db.expand.ps/images/car.png');

                }

                // drawTablesArchive(response.Archive,response.copyTo,response.jalArchive,

                //             response.copyToCount,response.linkToCount,response.archiveCount);                   
                $("select#vehiclebrand option").each(function() { this.selected = (this.text == response.brand); 

                });

                $("select#vehicletype option")

                    .each(function() { this.selected = (this.text == response.type); 

                });



                $("select#EqtStatus option")

                    .each(function() { this.selected = (this.text == response.status); 

                });

                $("select#Department option")

                    .each(function() { this.selected = (this.text == response.department); 

                });

                $("select#pinc2 option")

                    .each(function() { this.selected = (this.text == response.admin); 

                });

                $("select#pinc3 option")

                    .each(function() { this.selected = (this.text == response.admin_two); 

                });

                $("select#OrgCurrencyID3 option")

                    .each(function() { this.selected = (this.text == response.Currency); 

                });

                // $("select#oiltype option")

                //     .each(function() { this.selected = (this.text == response.oiltype); 

                // });
                $("#oiltype").val(response.oiltype);
                
                
                
                $("select#Supplier option")

                    .each(function() { this.selected = (this.text == response.supplyer); 

                });

                $("select#SponsorName option")

                    .each(function() { this.selected = (this.text == response.sponser); 

                });



                // $('#vehicle_id').val(response.info.id);



                // $('#Vehiclename').val(response.info.name);

                // $('#plateNo').val(response.info.serial_number);

                // $('#dateinput21').val(response.info.selling_date);

                // $('#Wdateinput22').val(response.info.wdateinput);

                // $('#licensedate').val(response.info.licensedate);

                // $('#OrgSalary3').val(response.info.price);

                // $('#userProfileImg').attr('src', response.info.image);

                // $('#Inshurencedate').val(response.info.Inshurencedate);

                // $("#PHnum2").val(response.info.sponsor_phone);

                // $("#PHnum1").val(response.info.supply_phone);

                // $('#carimg').attr('src', response.info.image);

                // $("#msgStatic").html(response.ArchiveCount);

                // drawTablesArchive(response.Archive,response.copyTo,response.jalArchive,

                //             response.copyToCount,response.linkToCount,response.archiveCount);                 $("select#vehiclebrand option")

                //     .each(function() { this.selected = (this.text == response.brand); 

                // });

                // $("select#vehicletype option")

                //     .each(function() { this.selected = (this.text == response.type); 

                // });



                // $("select#EqtStatus option")

                //     .each(function() { this.selected = (this.text == response.status); 

                // });

                // $("select#Department option")

                //     .each(function() { this.selected = (this.text == response.department); 

                // });

                // $("select#pinc2 option")

                //     .each(function() { this.selected = (this.text == response.admin); 

                // });

                // $("select#pinc3 option")

                //     .each(function() { this.selected = (this.text == response.admin_two); 

                // });

                // $("select#OrgCurrencyID3 option")

                //     .each(function() { this.selected = (this.text == response.Currency); 

                // });

                // $("select#oiltype option")

                //     .each(function() { this.selected = (this.text == response.oiltype); 

                // });

                



                // $("select#Supplier option")

                //     .each(function() { this.selected = (this.text == response.supplyer); 

                // });

                // $("select#SponsorName option")

                //     .each(function() { this.selected = (this.text == response.sponser); 

                // });

            window.scrollTo(0, 0);

            },

        });

}

$('#setting_form').submit(function(e) {

    $(".loader").removeClass('hide');

       e.preventDefault();

       let formData = new FormData(this);

     $( "#Vehiclename" ).removeClass( "error" );

     $( "#plateNo" ).removeClass( "error" );

     $( "#vehiclebrand" ).removeClass( "error" );

     $( "#oiltype" ).removeClass( "error" );

       $.ajax({

          type:'POST',

          url: "store_vehcile",

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

               this.reset();

               $('#userProfileImg').attr('src', 'https://db.expand.ps/images/car.png');



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



                $("#Vehiclename").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#Vehiclename" ).removeClass( "error" );

                    }

                });

                $("#plateNo").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#plateNo" ).removeClass( "error" );

                    }

                });

            if(response.responseJSON.errors.Vehiclename){

                $( "#Vehiclename" ).addClass( "error" );

            }

            if(response.responseJSON.errors.plateNo){

                $( "#plateNo" ).addClass( "error" );

            }

            if(response.responseJSON.errors.vehiclebrand){

                $( "#vehiclebrand" ).addClass( "error" );

            }

            if(response.responseJSON.errors.oiltype){

                $( "#oiltype" ).addClass( "error" );

            }

           }

       });

  });



  function delete_vehicle($id) {
    if(confirm('هل انت متاكد من حذف المركبة؟ لن يمكنك استرجاعها فيما بعد')){
    let vehicle_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "vehicle_delete",

        data: {

            vehicle_id: vehicle_id,
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



@stop

