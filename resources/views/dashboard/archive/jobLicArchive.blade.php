@extends('layouts.admin')

@section('search')

<li class="dropdown dropdown-language nav-item hideMob">

            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">

          </li>

@endsection

@section('content')

<div class="content-body">

        <section id="hidden-label-form-layouts">

            <form method="post" id="formDataaa" enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-xl-8 col-lg-6">

                    <div class="card rSide">

                        <div class="card-header">

                            <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />

                                رخص الحرف و الصناعات

                            </h4>
                            <div class="heading-elements1 onOffArea form-group mt-1" style="height: 20px; margin: 0px !important" title="الاعدادات">
                                <img src="{{ asset('assets/images/ico/share.png') }}" height="27px"
                                    onclick="ShowConfigModal('formData')" style="cursor:pointer">
                                    
                                <div class="form-group">
                                    <a onclick="ShowConfigModal('formData')" style="color:#000000">
                                    </a>
                                </div>
                            </div>

                        </div>

                        <?php $types=$type;?>

                        <div class="card-body">

                            <div class="form-body">

                                    <div class="row">

                                        <div class="col-lg-7 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                             اسم المشترك 

                                                        </span>

                                                    </div>

                                                    <input type="text" id="customerName" class="form-control cust" name="customerName">

                                                    <input type="hidden" id="customerid" name="customerid" value="0">

                                                    <input type="hidden" id="archieveid" name="archieveid" value="0">

                                                    <input type="hidden" id="customername" name="customername" value="0">

                                                    <input type="hidden" id="url" name="url" value="<?php echo $url ?>">

                                                    <input type="hidden" id="customerType" name="customerType" value="0">

                                                    <input type="hidden" id="msgType" name="msgType" value="">

                                                    <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">

                                                    <input type="hidden" id="ArchiveID" name="ArchiveID" value="0">

                                                    <input type="hidden" id="type" name="type" value="{{$type}}">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-5 col-md-12 pr-0"  >

                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-prepend">

    													<span class="input-group-text" id="basic-addon1">

    														نوع الحرفة

    													</span>

                                                    </div>

                                                    <select class="form-control licType" name="licType" id="licType">
                                                        <option>-- اختر --</option>

                                                        @foreach($craftType as $type)

                                                        <option value="{{$type->id}}">{{$type->name}}</option>

                                                        @endforeach

                                                    </select>

                                                    <div class="input-group-append" onclick="ShowConstantModal(103,'licType','نوع الحرفة')" style="cursor:pointer; margin-left: 0px !important;">

                                                        <span class="input-group-text input-group-text2">

                                                            <i class="fa fa-external-link"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12">

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                            تصنيف الرخصة

                                                        </span>

                                                    </div>

                                                    <select class="form-control lic_cat" name="lic_cat" id="lic_cat">
                                                        <option>-- اختر --</option>

                                                        @foreach($licenseRating as $rate)

                                                        <option value="{{$rate->id}}">{{$rate->name}}</option>

                                                        @endforeach

                                                    </select>

                                                    <div class="input-group-append" onclick="ShowConstantModal(104,'lic_cat','تصنيف رخصة')" style="cursor:pointer; margin-left: 0px !important;">

                                                    <span class="input-group-text input-group-text2">

                                                        <i class="fa fa-external-link"></i>

                                                    </span>

                                                </div>

                                                </div>

                                            </div>

                                        </div> 

                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                            المنطقة

                                                        </span>

                                                    </div>

                                                    <select class="form-control cityData" name="cityData" id="cityData" >
                                                        <option value="">-- اختر --</option>
                                                        @foreach($regions as $region)

                                                        <option value="{{$region->id}}"> {{$region->name}}</option>

                                                        @endforeach

                                                    </select>
                                                    
                                                    <div class="input-group-append" onclick="ShowConstantModal(154,'cityData','المنطقة')" style="cursor:pointer; margin-left: 0px !important;">

                                                    <span class="input-group-text input-group-text2">

                                                        <i class="fa fa-external-link"></i>

                                                    </span>

                                                    </div>
                                                    
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                            رقم الحد

                                                        </span>

                                                    </div>

                                                    <input type="text" id="LicBorder" name="LicBorder" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                            رقم الرخصة

                                                        </span>

                                                    </div>

                                                    <input type="text" id="licNo" name="licNo" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">

                                                </div>

                                            </div>

                                        </div>

                                </div>

                                        <div class="row">

                                            <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87" style="    width: 98% !important;">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                الاسم التجاري

                                                            </span>

                                                        </div>

                                                        <input type="text" id="businessName" name="businessName" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87">

                                                        <div class="input-group-prepend">

    														<span class="input-group-text" id="basic-addon1">

    															تاريخ البداية

    														</span>

                                                        </div>

                                                        <input type="text" id="startAt" name="startAt" data-mask="00/00/0000" maxlength="10" class="form-control" value="<?php echo date('d/m/Y')?>" onblur="calcRenew()">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87">

                                                        <div class="input-group-prepend">

    														<span class="input-group-text" id="basic-addon1">

    															تاريخ النهاية

    														</span>

                                                        </div>

                                                        <input type="text" id="endAt" name="endAt" data-mask="00/00/0000" maxlength="10" class="form-control" value="31/03/<?php echo date('m')<=3?date('Y'):date('Y')+1; ?>" placeholder="" autocomplete="off">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    

                                        <div class="row">

                                        <div class="col-lg-10 col-md-12 pr-0 pr-s-12 hide"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                            نوع المرفق

                                                        </span>

                                                    </div>

                                                    

                                                    <select class="form-control" name="AttahType" id="AttahType">
                                                            @foreach($attachment_type as $attachment)

                                                            <option value="{{$attachment->id}}"> {{$attachment->name}}   </option>

                                                            @endforeach

                                                    </select>

                                                    <div class="input-group-append" onclick="ShowConstantModal(46,'AttahType','نوع المرفق')" style="cursor:pointer">

                                                        <span class="input-group-text input-group-text2">

                                                            <i class="fa fa-external-link"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  ></div>

                                        <div class="col-lg-1 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">

                                                    </div>

                                                    <input type="hidden" name="fromname" value="formDataaa">

                                                    <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" 

                                                    onchange="doUploadAttach('formDataaa')" 

                                                    style="display: none" >

                                                </div>

                                            </div>

                                        </div>

                                        <div style="text-align: center;">

                                        

                                            <button type="submit" class="btn btn-primary" id="saveBtn" style="" onclick="SaveMasterArch()">

                                                حفظ    

                                            </button>

                                                

                                                

                                            </div>

                                    </div>

                                    

                                </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-4 col-lg-6 ">

                    @if ($type=='jobLicArchive')

                    <div class="card lSide" style="min-height:329.2px;">

                    @else

                    <div class="card lSide" style="min-height:329.2px;">

                    @endif

                        <div class="card-header">

                            <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />مرفقات الرخصة </h4>

                        </div>

                        <div class="card-body" id="attachList">

                            <div class="row formDataaaFilesArea" style="margin-left: 0px;">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </form>

</div>

<?php $type=$types;?>
@include('dashboard.archive.arc_config')
@include('dashboard.component.fetch_table')


<script>







$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



   $('#formDataaa').submit(function(e) {
    

    if(document.getElementById('formDataaaorgIdList[]')==null){
        if(confirm('لايوجد مرفقات هل تريد الاستمرار؟')){
            $(".loader").removeClass('hide');
            let formData = new FormData(this);
            e.preventDefault();

            $.ajax({

                type:'POST',

                url: "store_jobLic_archieve",

                data: formData,

                contentType: false,

                processData: false,

                success: (response) => {

                    $(".loader").addClass('hide');

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: '{{trans('admin.data_added')}}',

                        showConfirmButton: false,

                        timer: 1500

                        })

                        $(".formDataaaFilesArea").html('');

                    $('.wtbl').DataTable().ajax.reload();  

                    this.reset();

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

                }

            });

            return true;
        }
        return false;
    }else{
        $(".loader").removeClass('hide');
        let formData = new FormData(this);
        e.preventDefault();

        $.ajax({

            type:'POST',

            url: "store_jobLic_archieve",

            data: formData,

            contentType: false,

            processData: false,

            success: (response) => {

                $(".loader").addClass('hide');

                Swal.fire({

                    position: 'top-center',

                    icon: 'success',

                    title: '{{trans('admin.data_added')}}',

                    showConfirmButton: false,

                    timer: 1500

                    })

                    $(".formDataaaFilesArea").html('');

                $('.wtbl').DataTable().ajax.reload();  

                this.reset();

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

            }

        });

        return true;
    }
    return false;
  });







$( function() {

    $( ".cust" ).autocomplete({

		source: 'Linence_auto_complete',

		minLength: 1,

		

        select: function( event, ui ) {

            console.log(ui.item.model);

            $('#customerid').val(ui.item.id);

            $('#customername').val(ui.item.name);

            $('#customerType').val(ui.item.model);

            $('#licNo').val(ui.item.licNo);

            $('#licn').val(ui.item.licn);

            $('#licnfile').val(ui.item.licnfile);

           }

	    });

    });

    function update($id){

        let archive_id = $id;

    $('#saveBtn').text("تعديل");

        $(".formDataaaFilesArea").html('');

            $.ajax({

            type: 'get', // the method (could be GET btw)

            url: "{{ route('job_Lic_info') }}",

            data: {

                archive_id: archive_id,

            },

            success:function(response){

                console.log(response.info);

            $('#customerid').val(response.info.model_id);

            $('#ArchiveID').val(response.info.id);

            $('#customername').val(response.info.name);

            $('#customerName').val(response.info.name);

            $('#LicBorder').val(response.info.limit_number_id);

            $('#customerType').val(response.info.model_name);

            $('#licNo').val(response.info.license_number);

            $('#businessName').val(response.info.trade_name);

            $('#startAt').val(response.info.start_date);

            $('#endAt').val(response.info.expiry_ate);

            $('#archieveid').val(response.info.id);
            if(regions)
            $('#cityData').val(response.info.regions.id);
           
            if(response.info.craft_type!=null){
                $("select#licType option").each(
                                function() {
                                    this.selected = (this.text == response.info.craft_type.name);
                                });
            }
            if(response.info.license_rating!=null){
                $("select#lic_cat option").each(
                                function() {
                                    this.selected = (this.text == response.info.license_rating.name);
                                });
            }

            row='';

                if(response.files){

                    var j=0;

                    for(j=0;j<response.files.length;j++){

                        shortCutName=response.files[j].real_name;

                        shortCutID=response.files[j].id;

                        urlfile='{{ asset('') }}';

                        urlfile+=response.files[j].url;

                        formDataStr="formDataaa";

                            shortCutName=shortCutName.substring(0, 20)

                            row+='<div id="attach" class=" col-sm-6 ">' +

                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'

                                +'    <span class="attach-text">'+shortCutName+'</span>'

                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><i class="fa fa-eye"></i></a>'

                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'

                                +'      <input type="hidden" id="'+formDataStr+'imgUploads[]" name="'+formDataStr+'imgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="'+formDataStr+'orgNameList[]" name="'+formDataStr+'orgNameList[]" value="'+shortCutName+'">'

								+'             <input type="hidden" id="'+formDataStr+'orgIdList[]" name="'+formDataStr+'orgIdList[]" value="'+shortCutID+'">'

							    +'    </div>'

                                +'  </div>' +

                                '</div>'

                    }

                    $(".formDataaaFilesArea").html(row)

                }

            window.scrollTo(0, 0);

            },

        });

    }

    function delete_archive($id) {
    if(confirm('هل انت متاكد من حذف الارشيف؟ لن يمكنك استرجاعه فيما بعد')){
    let archive_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "jobLic_archieve_delete",

        data: {

            archive_id: archive_id,
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

                title: 'تم حذف البيانات بنجاح',

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

                title: '{{ trans('admin.error_save') }}',

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
@section('script')

@endsection
@endsection