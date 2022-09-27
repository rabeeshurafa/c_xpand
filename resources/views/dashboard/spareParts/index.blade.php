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

    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="setting_form" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">

                <div class="col-sm-12 col-md-6">
                    <div class="card leftSide" >
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/product.png" width="32" height="32">
                                {{trans('assets.Spare_parts_data')}}
                            </h4>
                            <div class="heading-elements1" style="display: none;right: 87px; top: 10px;">
                                {{trans('admin.status')}}
                            </div>
                            <div class="heading-elements1 onOffArea" style="display: none;    top: 10px;">
                                <div class="onoffswitch" onclick="ShowModal()">
                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                        id="myonoffswitchHeader">
                                    <label class="onoffswitch-label" for="myonoffswitchHeader">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group" style="">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('assets.name')}}
                                                                </span>
                                                            </div>
                                                            <input type="text" id="ProductName"
                                                                class="form-control ac ui-autocomplete-input"
                                                                placeholder="Product Name" name="ProductName"
                                                                autocomplete="off" aria-invalid="false">
                                                            <input type="hidden" id="sparePartID" name="sparePartID"
                                                                value="0">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('assets.barecode')}}
                                                                </span>
                                                            </div>
                                                            <input type="text" id="Parcode" maxlength="9"
                                                                class="form-control" placeholder="Parcode" name="Parcode">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: center;">
                                            <img id="userProfileImg" src="https://db.expand.ps/images/elecCounter.png"
                                                style="max-height: 100px; cursor:pointer"
                                                onclick="document.getElementById('imgPic').click(); return false">
                                            <input type="hidden" id="userimgpath" name="userimgpath">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group validate">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{trans('assets.store')}}
                                                        </span>
                                                    </div>

                                                    <select type="text" id="Warehouse" name="Warehouse"
                                                        class="form-control valid" aria-invalid="false">
                                                        <option value=""> - </option>
                                                        @foreach ($Warehouses as $Warehouse)
                                                            <option value="{{ $Warehouse->id }}"> {{ $Warehouse->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group" style="/* width: 103% !important; */">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{trans('assets.quantity')}}
                                                        </span>
                                                    </div>
                                                    <input id="Quantity" name="Quantity" class="form-control numFeild "
                                                        placeholder="00000" style=" height: 38px " aria-invalid="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="/* margin-left: -10px !important; */">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{trans('assets.brand')}}
                                                        </span>
                                                    </div>
                                                    <select type="text" id="brand" name="brand" class="form-control">
                                                        <option value=""> - </option>
                                                        @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"> {{ $brand->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append"
                                                        onclick="ShowConstantModal(6107,'brand','الماركة')">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="EnabledItem"
                                        style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">
                                        {{ 'UserDisable' }}</div>

                                </div>
                            </div>
                        </div>

                        <div class="card-header" style="padding-top:0px; display:none">
                            <h4 class="card-title"> {{ 'السيرال و بيانات الضمان' }}
                                <div class="" style="    top: 10px; float:left">
                                    <div class="onoffswitch">
                                        <input type="checkbox" onclick="$('#serialTables').toggle()" name="onoffswitch"
                                            class="onoffswitch-checkbox" id="myonoffswitchHeader11">
                                        <label class="onoffswitch-label" for="myonoffswitchHeader11">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>

                            </h4>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="card rightSide">
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/sponsor.png" width="32" height="32">
                                {{trans('assets.cost_supp')}}
                            </h4>
                            <a class="heading-elements-toggle">
                                <i class="ft-align-justify font-medium-3">
                                </i>
                            </a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group validate">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('assets.dept')}}
                                                    </span>
                                                </div>

                                                <select type="text" id="Department" name="Department"
                                                    class="form-control valid" aria-invalid="false">
                                                    <option value=""> - </option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}"> {{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('assets.supp')}}
                                                    </span>
                                                </div>
                                                <select type="text" id="Supplier" name="Supplier" class="form-control">
                                                    <option value=""> - </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"> {{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('assets.purchasing_price')}}
                                                    </span>
                                                </div>
                                                <input id="Purechase" name="Purechase" class="form-control numFeild "
                                                    placeholder="00.00" style="    border-radius: 0rem !important;"
                                                    aria-invalid="false">
                                                <select id="PureCurrID" name="PureCurrID" type="text" class="form-control"
                                                    aria-invalid="false">
                                                    <option> - </option>
                                                    <option value="1" selected="">{{trans('admin.shekel')}}</option>
                                                    <option value="2">{{trans('admin.dollar')}}</option>
                                                    <option value="3">{{trans('admin.dinar')}}</option>
                                                    <option value="4">{{trans('admin.euro')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('assets.selling_price')}}
                                                    </span>
                                                </div>
                                                <input id="Sale" name="Sale" class="form-control numFeild "
                                                    placeholder="00.00" style="    border-radius: 0rem !important;"
                                                    aria-invalid="false">
                                                <select id="SaleCurrID" name="SaleCurrID" type="text"
                                                    class="form-control" aria-invalid="false">
                                                    <option> - </option>
                                                    <option value="1" selected="">{{trans('admin.shekel')}}</option>
                                                    <option value="2">{{trans('admin.dollar')}}</option>
                                                    <option value="3">{{trans('admin.dinar')}}</option>
                                                    <option value="4">{{trans('admin.euro')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="row" style="display:none;">
                                    <div class="col-md attachs-section">
                                        <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
                                        <span class="attach-header">{{ 'المرفقات' }}
                                            <span id="attach-required">*</span>
                                            <span class="attach-icons">
                                                <a href="#"
                                                    onclick="document.getElementById('formDataupload-file[]').click(); return false"
                                                    class="attach-icon"><i class="fa fa-paperclip"></i></a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="row attachs-body">
                                    <div class="form-group col-12 mb-2">
                                        <input type="file" class="form-control-file" id="imgPic" name="imgPic"
                                            style="display: none" onchange="doUploadPic()">
                                        <input type="hidden" name="fromname" value="formData">
                                        <input type="file" class="form-control-file" id="formDataupload-file[]" multiple=""
                                            name="formDataUploadFile[]" onchange="doUploadAttach('formData')"
                                            style="display: none">
                                        <input type="file" class="form-control-file" id="formDataupload-image[]"
                                            multiple="" name="formDataUploadImage[]" onchange="doUploadAttach('formData')"
                                            accept="image/*" style="display: none">
                                        <div class="row formDataImagesArea"></div>
                                        <div class="row formDataFilesArea" style="margin-left: 0px;"></div>
                                        <div class="row formDataLinkArea" style="margin-left: 0px;"></div>
                                    </div>
                                </div>

                                <div class="form-actions" style="border-top:0px;">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" id="saveBtn" style="">
                                            {{ trans('admin.save') }}
                                            <i class="ft-thumbs-up position-right"></i></button>
                                        <a href="" type="reset" class="btn btn-warning">{{ trans('assets.reset') }}
                                            <i class="ft-refresh-cw position-right"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            




        </form>
    @include('dashboard.component.fetch_table')
    </section>



@stop
@section('script')


    <script>
        $('#setting_form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $("#ProductName").removeClass("error");

            $.ajax({
                type: 'POST',
                url: "store_spareParts",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    $('.wtbl').DataTable().ajax.reload();
                    if (response) {
                        $(".loader").addClass('hide');
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: '{{ trans('admin.data_added') }}',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        this.reset();
                    }
                    $('#userProfileImg').attr('src', 'https://db.expand.ps/images/elecCounter.png');
                },
                error: function(response) {
                    if (response.responseJSON.errors.ProductName) {
                        $("#ProductName").addClass("error");
                    }


                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: '{{ trans('admin.error_save') }}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        });

        $(function() {
            $(".ac").autocomplete({
                source: 'sparePart_auto_complete',
                minLength: 2,

                select: function(event, ui) {
                    let sparePart_id = ui.item.id
                    $.ajax({
                        type: 'get', // the method (could be GET btw)
                        url: "sparePart_info",
                        data: {
                            sparePart_id: sparePart_id,
                        },
                        success: function(response) {
                            $('#sparePartID').val(response.info.id);
                            $('#ProductName').val(response.info.name);
                            $('#Parcode').val(response.info.barcode);
                            $('#Quantity').val(response.info.quantity);
                            $('#Purechase').val(response.info.purchasing_price);
                            $('#Sale').val(response.info.selling_price);

                            if (response.info.image !=
                                'http://expand.local' /*window.location.origin*/
                            ) {
                                $('#userProfileImg').attr('src', response.info.image);
                            } else {
                                $('#userProfileImg').attr('src',
                                    'https://db.expand.ps/images/elecCounter.png');
                            }

                            $("select#brand option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .brand);
                                });
                            $("select#Warehouse option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .storehouse_name);
                                });
                            $("select#Department option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .dept_name);
                                });
                            $("select#Supplier option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .supp_name);
                                });
                            $("select#PureCurrID option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .purchasing_cur);
                                });
                            $("select#SaleCurrID option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .selling_cur);
                                });

                        },
                    });
                }
            });
        });

        function update($id) {
            let sparePart_id = $id;
            $.ajax({
                type: 'get', // the method (could be GET btw)
                url: "sparePart_info",
                data: {
                    sparePart_id: sparePart_id,
                },
                success: function(response) {

                    $('#sparePartID').val(response.info.id);
                            $('#ProductName').val(response.info.name);
                            $('#Parcode').val(response.info.barcode);
                            $('#Quantity').val(response.info.quantity);
                            $('#Purechase').val(response.info.purchasing_price);
                            $('#Sale').val(response.info.selling_price);

                            if (response.info.image !=
                                'http://expand.local' /*window.location.origin*/
                            ) {
                                $('#userProfileImg').attr('src', response.info.image);
                            } else {
                                $('#userProfileImg').attr('src',
                                    'https://db.expand.ps/images/elecCounter.png');
                            }

                            $("select#brand option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .brand);
                                });
                            $("select#Warehouse option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .storehouse_name);
                                });
                            $("select#Department option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .dept_name);
                                });
                            $("select#Supplier option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .supp_name);
                                });
                            $("select#PureCurrID option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .purchasing_cur);
                                });
                            $("select#SaleCurrID option").each(
                                function() {
                                    this.selected = (this.text == response.info
                                        .selling_cur);
                                });



                },
            });
        }

        function delete_spare($id) {
    if(confirm('هل انت متاكد من حذف القطعة؟ لن يمكنك استرجاعه فيما بعد')){
    let spare_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "spare_delete",

        data: {

            spare_id: spare_id,
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

            // $("#ajaxform")[0].reset();

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
