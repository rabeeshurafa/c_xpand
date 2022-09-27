@extends('layouts.admin')
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

        .detailsTB th {
            color: #ffffff !important;
        }

    </style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

    <section class="horizontal-grid " id="horizontal-grid">

        <form method="post" id="setting_form" enctype="multipart/form-data">
            @csrf
            <div class="row white-row">

                <div class="col-sm-12 col-lg-6 col-md-12">
                    <div class="card leftSide">
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/info.png" width="32" height="32">
                                ملفات الطابو
                            </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-8">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            اسم الحوض
                                                        </span>
                                                    </div>
                                                    <input type="text" id="hod_name" required="" class="form-control"
                                                        placeholder="" name="hod_name" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            رقم الحوض
                                                        </span>
                                                    </div>
                                                    <input type="text" id="hod_no" required="" class="form-control"
                                                        placeholder="" name="hod_no" value="">
                                                    <input type="hidden" id="phase" required="" class="form-control"
                                                        placeholder="" name="phase" value="1">
                                                    <input type="hidden" id="pk_i_id" required="" class="form-control"
                                                        placeholder="" name="pk_i_id" value="0">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 98% !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            إختر الملف
                                                        </span>
                                                    </div>
                                                    <input type="file" id="s_image" required=""
                                                        accept="application/vnd.ms-excel" name="s_image">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="btn bg-success alert-icon-left alert-dismissible mb-2" role="alert"
                                                style="width: 100%;text-align: right;color:#ffffff;">
                                                <span class="alert-icon">
                                                    <i class="la la-thumbs-o-up"></i>
                                                </span>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong style="color:#ffffff">
                                                    تعليمات التحميل
                                                </strong>
                                                <ul>
                                                    <li>
                                                        يجب أن يكون الملف بإمتداد
                                                        <span
                                                            class="label label-lg label-light-danger label-inline">xls</span>
                                                    </li>
                                                    <li>
                                                        يجب مراعاة ترتيب الأعمدة كالتالي
                                                        <ol>
                                                            <li>
                                                                رقم القطعة المؤقت
                                                            </li>
                                                            <li>
                                                                اسم المالك
                                                            </li>
                                                            <li>
                                                                مساحة القطعة(متر مربع)
                                                            </li>
                                                        </ol>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions" style="border-top:0px;">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="addBtn">حفظ <i
                                                class="ft-thumbs-up position-right"></i></button>
                                        <button type="reset" class="btn btn-warning">اعادة تعيين <i
                                                class="ft-refresh-cw position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-6 col-md-12">
                    <div class="card rightSide">
                        <div class="card-header">
                            <h4 class="card-title">
                                <img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32">
                                كشوفات طابو سابقة
                            </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                الحوض
                                            </td>
                                            <td>
                                                <i class="fa fa-attach"></i>
                                                الرقم المؤقت
                                            </td>
                                            <td>
                                                <i class="fa fa-attach"></i>
                                                الرقم الدائم
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td>
                                                1 </td>
                                            <td>
                                                سهل الغرس(38) </td>
                                            <td>
                                                <a href="/uploads/16325506082587.xls" target="_blank">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/c_tabo/add/2/3" title="رفع الملف">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2 </td>
                                            <td>
                                                ابو الشافط(7) </td>
                                            <td>
                                                <a href="/uploads/16323939739935.xls" target="_blank">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/c_tabo/add/2/2" title="رفع الملف">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3 </td>
                                            <td>
                                                ظهرة عوليم(5) </td>
                                            <td>
                                                <a href="/uploads/16323935917988.xls" target="_blank">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/c_tabo/add/2/1" title="رفع الملف">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>




        </form>
    </section>


    {{-- @include('dashboard.component.fetch_table'); --}}


@stop
@section('script')


    {{-- <script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"
        type="text/javascript"></script> --}}
    {{-- <script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript">

    </script> --}}
    <script>

    </script>



@endsection
