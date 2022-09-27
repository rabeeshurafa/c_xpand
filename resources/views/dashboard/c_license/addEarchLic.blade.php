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
                                                            <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">
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
                                                            <input type="text" id="certdate" data-mask="00/00/0000" maxlength="10" class="form-control numFeild" name="certdate" autocomplete="off" value="07/02/2022">
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
                                                            <input required="" type="text" id="projectname" class="form-control" name="projectname">

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
                                                            <input type="hidden" id="sponserid" name="sponserid" class="form-control ccac alphaFeild ui-autocomplete-input" autocomplete="off">
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
                                                        <th scope="col" width="200px">الاسم</th>
                                                        <th scope="col" width="50px">رقم الحوض</th>
                                                        <th scope="col" width="50px">رقم القطعة</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
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
                                                            <div class="input-group-append" style="margin-left: 0px !important">
                                                                      <span class="input-group-text input-group-text2" style="margin-left: 0;">
                                                                          <i class="fa fa-plus-circle" id="plusElement2"></i>
                                                                      </span>
                                                            </div>
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
                                                        <th scope="col" width="200px">اسم المدعي</th>
                                                        <th scope="col" width="120px">رقم الهوية</th>
                                                        <th scope="col">ملاحظات</th>
                                                        <th scope="col"></th>
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
                                                            <div class="input-group-append" style="margin-left: 0px !important">
                                                                      <span class="input-group-text input-group-text2" style="margin-left: 0;">
                                                                          <i class="fas fa-plus-circle" id="plusElement3"></i>
                                                                      </span>
                                                            </div>
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
                                                <button type="reset" class="btn btn-warning">اعادة تعيين <i class="ft-refresh-cw position-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </form>
</section>

@stop
@section('script')


<script>


</script>

@endsection
