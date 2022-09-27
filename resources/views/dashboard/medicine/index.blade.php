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
                    <div class="card leftSide">
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/product.png" width="32" height="32">
                                {{ 'بيانات الأدوية' }}
                            </h4>
                            <div class="heading-elements1" style="display: none;right: 87px; top: 10px;">
                                {{ 'الحالة' }}
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
                                            <div class="form-group">
                                                <div class="input-group" style="">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'اسم الدواء' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="ProductName"
                                                        class="form-control ac ui-autocomplete-input"
                                                        placeholder="" name="ProductName" autocomplete="off"
                                                        aria-invalid="false">
                                                    <input type="hidden" id="sparePartID" name="sparePartID" value="0">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'الاسم العلمي' }}
                                                        </span>
                                                    </div>
                                                    <input type="text" id="scientificName" class="form-control"
                                                        placeholder="" name="scientificName">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group validate">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'البديل الاول' }}
                                                        </span>
                                                    </div>
                                                    <input id="alternative1" name="alternative1" class="form-control"
                                                        placeholder="" style=" height: 38px ">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group" style="/* width: 103% !important; */">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{ 'البديل الثانى' }}
                                                        </span>
                                                    </div>
                                                    <input id="alternative2" name="alternative2" class="form-control"
                                                        placeholder="" style=" height: 38px ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="card rightSide">
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/sponsor.png" width="32" height="32">
                                {{ 'السعر/ المورد' }}
                            </h4>
                            <a class="heading-elements-toggle">
                                <i class="ft-align-justify font-medium-3">
                                </i>
                            </a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6" style="/* margin-left: -10px !important; */">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{ 'العلاج' }}
                                                    </span>
                                                </div>
                                                <select type="text" id="treatment" name="treatment"
                                                    class="form-control treatment">
                                                    <option value=""> - </option>
                                                    @foreach ($treatment as $treat)
                                                        <option value="{{ $treat->id }}"> {{ $treat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append"
                                                    onclick="ShowConstantModal(6026,'treatment','العلاج ')">
                                                    <span class="input-group-text input-group-text2">
                                                        <i class="fa fa-external-link"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="/* margin-left: -10px !important; */">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{ 'الجرعة' }}
                                                    </span>
                                                </div>
                                                <select type="text" id="dosage" name="dosage" class="form-control dosage">
                                                    <option value=""> - </option>
                                                    @foreach ($dosage as $dos)
                                                        <option value="{{ $dos->id }}"> {{ $dos->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append" onclick="ShowConstantModal(6025,'dosage','الجرعة ')">
                                                    <span class="input-group-text input-group-text2">
                                                        <i class="fa fa-external-link"></i>
                                                    </span>
                                                </div>
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
                                                        {{ 'مكان إحضاره' }}
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{ 'سعر الشراء' }}
                                                    </span>
                                                </div>
                                                <input id="Purechase" name="Purechase" class="form-control numFeild "
                                                    placeholder="00.00" style="    border-radius: 0rem !important;"
                                                    aria-invalid="false">
                                                <select id="PureCurrID" name="PureCurrID" type="text" class="form-control"
                                                    aria-invalid="false">
                                                    <option> - </option>
                                                    <option value="1" selected="">{{ 'شيكل' }}</option>
                                                    <option value="2">{{ 'دولار' }}</option>
                                                    <option value="3">{{ 'دينار' }}</option>
                                                    <option value="4">{{ 'يورو' }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="row" style="display:none">
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
                                        <input type="file" class="form-control-file" id="formDataupload-image[]" multiple=""
                                            name="formDataUploadImage[]" onchange="doUploadAttach('formData')"
                                            accept="image/*" style="display: none">
                                        <div class="row formDataImagesArea"></div>
                                        <div class="row formDataFilesArea" style="margin-left: 0px;"></div>
                                        <div class="row formDataLinkArea" style="margin-left: 0px;"></div>
                                    </div>
                                </div>

                                <div class="form-actions" style="border-top:0px;">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" id="saveBtn" style="">
                                            {{ 'حفظ' }}
                                            <i class="ft-thumbs-up position-right"></i></button>
                                        <a href="" type="reset" class="btn btn-warning">{{ 'اعادة تعيين' }}
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
    </section>



@include('dashboard.component.fetch_table')

@stop
@section('script')
    <script>
        $('#setting_form').submit(function(e) {
            $(".loader").removeClass('hide');
            e.preventDefault();
            let formData = new FormData(this);
            $("#ProductName").removeClass("error");

            $.ajax({
                type: 'POST',
                url: "store_medicines",
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
                    // $('#userProfileImg').attr('src', 'https://db.expand.ps/images/elecCounter.png');
                },
                error: function(response) {
                    $(".loader").addClass('hide');
                    if (response.responseJSON.errors.ProductName) {
                        $("#ProductName").addClass("error");
                            Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'يرجى تعبئة الحقول الاجبارية',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else{
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: '{{ trans('admin.error_save') }}',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        
                    }
                }
            });
        });

        $(function() {
            $(".ac").autocomplete({
                source: 'medicine_auto_complete',
                minLength: 2,

                select: function(event, ui) {
                    let med_id = ui.item.id
                    $.ajax({
                        type: 'get', // the method (could be GET btw)
                        url: "medicine_info",
                        data: {
                            med_id: med_id,
                        },
                        success: function(response) {
                            $('#sparePartID').val(response.info.id);
                            $('#ProductName').val(response.info.name);
                            $('#scientificName').val(response.info.scientific_name);
                            $('#alternative2').val(response.info.alternative_2);
                            $('#Purechase').val(response.info.purchasing_price);
                            // $('#Sale').val(response.info.selling_price);
                            $('#alternative1').val(response.info.alternative_1);
                            $('#treatment').val(response.info.treatment);
                            $('#dosage').val(response.info.dosage);
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
                            // $("select#SaleCurrID option").each(
                            //     function() {
                            //         this.selected = (this.text == response.info
                            //             .selling_cur);
                            //     });
                            window.scrollTo(0, 0);
                        },
                    });
                }
            });
        });

        function update($id) {
            let med_id = $id;
            $.ajax({
                type: 'get', // the method (could be GET btw)
                url: "medicine_info",
                data: {
                    med_id: med_id,
                },
                success: function(response) {

                    $('#sparePartID').val(response.info.id);
                    $('#ProductName').val(response.info.name);
                    $('#scientificName').val(response.info.scientific_name);
                    $('#alternative2').val(response.info.alternative_2);
                    $('#Purechase').val(response.info.purchasing_price);
                    // $('#Sale').val(response.info.selling_price);
                    $('#alternative1').val(response.info.alternative_1);
                    $('#treatment').val(response.info.treatment);
                    $('#dosage').val(response.info.dosage);
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
                    window.scrollTo(0, 0);
                },
            });
        }
        
        function delete_medicine($id) {
            if(confirm('هل انت متاكد من حذف الدواء؟  يمكنك استرجاعه فيما بعد')){
            let med_id = $id;
            var _token = '{{ csrf_token() }}';
            $.ajax({
        
                type: 'post',
        
                // the method (could be GET btw)
        
                url: "medicine_delete",
        
                data: {
        
                    med_id: med_id,
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
