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


            <div class="col-xl-12 col-lg-12 colMob">

                <div class="card">

                    <div class="card-header">

                        <h4 class="card-title"><img src="{{asset('assets/images/archive_ico.png')}}" style="height: 32px"/>

                            {{trans('archive.assets_archive')}}

                        </h4>
                        <div class="heading-elements1 onOffArea form-group mt-1" style="height: 20px; margin: 0px !important" title="الاعدادات">
                            <img src="{{ asset('assets/images/ico/share.png') }}" height="30px"
                                onclick="ShowConfigModal('formData')" style="cursor:pointer">
                                
                            <div class="form-group">
                                <a onclick="ShowConfigModal('formData')" style="color:#000000">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                                <div class="row white-row">

                                    <div class="col-lg-6 col-md-12 "  >

                                        <div class="row">

                                            <div class="col-lg-8 col-md-12 "  >

                                                <div class="form-group paddmob">

                                                    <div class="input-group ">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                {{trans('archive.title')}}

                                                            </span>

                                                        </div>



                                                        {{-- @if($type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive') --}}

                                                            <input type="text" id="msgTitle" class="form-control" name="msgTitle" style="width: 30%;">

                                                            <select name="archive_type" id="archive_type" class="form-control archive_type">



                                                                <option value="0">-- {{ trans('archive.document_type') }} --</option>

                                                                @foreach($archive_type as $archive)

                                                                <option value="{{$archive->id}}"> {{$archive->name}}   </option>

                                                                @endforeach



                                                            </select>

                                                            <div class="input-group-append hidemob" onclick="ShowConstantModal(9,'archive_type','{{ trans('archive.document_type') }}')" style="cursor:pointer">

                                                                <span class="input-group-text input-group-text2">

                                                                    <i class="fa fa-external-link"></i>

                                                                </span>

                                                            </div>

                                                        {{-- @elseif ($type=='inArchive'||$type=='outArchive')

                                                        <input type="text" id="customerName" class="form-control cust" name="customerName" style="width: 30%;">

                                                        @endif --}}

                                                        <input type="hidden" id="customerid" name="customerid" value="0">

                                                        <input type="hidden" id="customername" name="customername" value="0">

                                                        <input type="hidden" id="customerType" name="customerType" value="0">

                                                        <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">

                                                        <input type="hidden" id="url" name="url" value="<?php echo $url ?>">

                                                        <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">

                                                        <input type="hidden" id="ArchiveID" name="ArchiveID" value="">

                                                        <!-- 2166  -->



                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-4 col-md-12 "  >

                                                <div class="form-group paddmob">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                
                                                                {{trans('archive.date')}}



                                                            </span>

                                                        </div>

                                                        <input type="text" id="msgDate" name="msgDate" data-mask="00/00/0000" maxlength="10" class="form-control valid" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-8 col-md-12"  >

                                                <div class="form-group paddmob">

                                                    <div class="input-group">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                {{trans('archive.name_assets')}}

                                                            </span>

                                                        </div>

                                                        <input type="text" id="customerName" class="form-control cust" name="customerName" style="width: 30%;">

                                                        <input type="hidden" id="OrgType" class="form-control" name="OrgType" value="2076">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-4 col-md-12 "  >

                                                <div class="form-group paddmob">

                                                    <div class="input-group ">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                {{trans('archive.num')}}

                                                            </span>

                                                        </div>

                                                        <input type="text" id="msgid" name="msgid" class="form-control valid" style="text-align: left;direction: ltr;">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 checkCop">

                                                <input type="checkbox" name="copyTo" onclick="$('.copyto').toggle()"> {{trans('archive.copy_to')}}

                                            </div>

                                            <div class="col-md-8  copyto hide"  >

                                                <div class="form-group paddmob">

                                                    <div class="input-group w-91">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                {{trans('archive.copy_to')}}

                                                            </span>

                                                        </div>

                                                        <input type="text" id="copyToText[]" class="form-control cust_auto" name="copyToText[]">

                                                        <input type="hidden" id="copyToID[]" name="copyToID[]" value="0">

                                                        <input type="hidden" id="copyToCustomer[]" name="copyToCustomer[]" value="0">

                                                        <input type="hidden" id="copyToType[]" name="copyToType[]" value="0">

                                                        <div class="input-group-append" onclick="addRec()" style="cursor:pointer">

                                                            <span class="input-group-text input-group-text2">

                                                                <i class="fa fa-plus"></i>

                                                            </span>

                                                        </div>

                                                        <!-- 2166  -->

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-5 col-md-12"  >

                                        <div class="row attachs-body">

                                            <div class="form-group paddmob">

                                                <input type="hidden" name="fromname" value="formDataaa">

                                                <meta name="csrf-token" content="{{ csrf_token() }}" />



                                                <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" onchange="doUploadAttach('formDataaa')"

                                                style="display: none" >

                                                <div class="row formDataaaFilesArea" style="margin-left: 0px;">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-1 col-md-12 hidemob"  >

                                        <img style="float:left;" src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">

                                        <!-- <a onclick="showLinkModal('formDataaa')" class="attach-icon">

                                            <img src="images/hyper.png" width="35" height="35" style="cursor:pointer">

                                        </a>-->

                                    </div>

                                </div>

                                <div style="text-align: center;padding-bottom: 20px;">

                                    <button type="submit" class="btn btn-primary" id="saveBtn" style="" >

                                    {{ trans('admin.save') }}

                                    </button>
                                    <div class="col-lg-1 col-md-12 hidedesc-inline"  >

                                        <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer;    float: left;" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">

                                    </div>


                                </div>

                    </div>

                </div>

            </div>


      </form>

    </section>

</div>

@include('dashboard.archive.arc_config')
@include('dashboard.component.fetch_table')

<script>
function ShowConfigModal(bindTo) {

// $("#CitizenName").html($("#formDataNameAR").val())

$("#AppModal").modal('show')

}
$("#customerName").keyup(function () {
    if($("#customerName").val()=='')
    {
        // console.log('hiiiiiiiii11');
        $('#customerid').val(0);
    }
    });

     $('input[name="copyToText[]"]').keyup(function () {
    if($('input[name="copyToText[]"]').val()=='')
    {
        // console.log('hiiiiiiiii11');
       
        $('input[name="copyToID[]"]').val(0);
    }
    });

$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   $('#formDataaa').submit(function(e) {
    if($('#archive_type').val()==0){
        $( ".archive_type" ).addClass( "error" );
        return false;
    }
    if((!$('#customerid').val()||$('#customerid').val()==0))
    {
        alert('الرجاء اختيار أصل معرف مسبقاً');
        return false;
    }
    if((! $('input[name="copyToID[]"]').val()|| $('input[name="copyToID[]"]').val()==0)&&$('input[name="copyToText[]"]').val()!='')
    {
        alert('الرجاء اختيار جهة نسخة إلى معرفة مسبقاً');
        return false;
    }
    if(document.getElementById('formDataaaorgNameList[]')==null){
        if(confirm('لايوجد مرفقات هل تريد الاستمرار؟')){
            $(".loader").removeClass('hide');
            $('#saveBtn').css('display','none');
            $('#editBtn').css('display','none');
            e.preventDefault();

            let formData = new FormData(this);

            $( "#customerName" ).removeClass( "error" );
            $.ajax({

                type:'POST',

                url: "store_archive",

                data: formData,

                contentType: false,

                processData: false,

                success: (response) => {
                    $('#saveBtn').css('display','inline-block');
                    $('#editBtn').css('display','none');
                    $(".loader").addClass('hide');
                    $( ".archive_type" ).removeClass( "error" );
                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: '{{trans('admin.data_added')}}',

                        showConfirmButton: false,

                        timer: 1500

                        })
                        $('input[name="copyToID[]"]').val('');
                        $('input[name="copyToCustomer[]"]').val('');
                        $('input[name="copyToType[]"]').val('');
                        $('#customerid').val('');
                        $('#customername').val('');
                        $('#customerType').val('');
                        $('#pk_i_id').val('');
                        $('#ArchiveID').val('');
                    this.reset();

                    $('.wtbl').DataTable().ajax.reload();

                    $(".formDataaaFilesArea").html('');

                },

                error: function(response){
                    $('#saveBtn').css('display','inline-block');
                    $('#editBtn').css('display','none');
                    $(".loader").addClass('hide');
                    $( ".archive_type" ).removeClass( "error" );
                    Swal.fire({

                        position: 'top-center',

                        icon: 'error',

                        title: '{{trans('admin.error_save')}}',

                        showConfirmButton: false,

                        timer: 1500

                        })

                    // if(response.responseJSON.errors.customerName){

                    //     $( "#customerName" ).addClass( "error" );

                    // }

                }

            });
            return true;
        }
        return false;
    }else{
        $(".loader").removeClass('hide');
            $('#saveBtn').css('display','none');
            $('#editBtn').css('display','none');
        e.preventDefault();

        let formData = new FormData(this);

        $( "#customerName" ).removeClass( "error" );

        $.ajax({

            type:'POST',

            url: "store_archive",

            data: formData,

            contentType: false,

            processData: false,

            success: (response) => {
                $( ".archive_type" ).removeClass( "error" );
                 $('#saveBtn').css('display','inline-block');
                $('#editBtn').css('display','none');
            $(".loader").addClass('hide');
                Swal.fire({

                    position: 'top-center',

                    icon: 'success',

                    title: '{{trans('admin.data_added')}}',

                    showConfirmButton: false,

                    timer: 1500

                    })
                    $('input[name="copyToID[]"]').val('');
                        $('input[name="copyToCustomer[]"]').val('');
                        $('input[name="copyToType[]"]').val('');
                        $('#customerid').val('');
                        $('#customername').val('');
                        $('#customerType').val('');
                        $('#pk_i_id').val('');
                        $('#ArchiveID').val('');
                this.reset();

                $('.wtbl').DataTable().ajax.reload();

                $(".formDataaaFilesArea").html('');

            },

            error: function(response){
                $( ".archive_type" ).removeClass( "error" );
                 $('#saveBtn').css('display','inline-block');
                    $('#editBtn').css('display','none');
            $(".loader").addClass('hide');
                Swal.fire({

                    position: 'top-center',

                    icon: 'error',

                    title: '{{trans('admin.error_save')}}',

                    showConfirmButton: false,

                    timer: 1500

                    })

                // if(response.responseJSON.errors.customerName){

                //     $( "#customerName" ).addClass( "error" );

                // }

            }

        });
        return true;
    }
    return false;
  });

  $( function() {

    $( ".cust_auto" ).autocomplete({

		source: 'archive_auto_complete',

		minLength: 1,



        select: function( event, ui ) {

            var currentIndex=$("input[name^=copyToID]").length -1;

            $('input[name="copyToID[]"]').eq(currentIndex).val(ui.item.id);

            $('input[name="copyToCustomer[]"]').eq(currentIndex).val(ui.item.name);

            $('input[name="copyToType[]"]').eq(currentIndex).val(ui.item.model);

        }

	});

});

$( function() {

    $( ".cust" ).autocomplete({

		source: 'archive_auto_complete',

		minLength: 1,



        select: function( event, ui ) {

            console.log(ui.item);

            $('#customerid').val(ui.item.id);

            $('#customerName').val(ui.item.name);

            $('#customername').val(ui.item.name);

            $('#customerType').val(ui.item.model);

           }

	    });

    });

    function update($id){

        let archive_id = $id;

    $('#saveBtn').text("تعديل");

        $(".formDataaaFilesArea").html('');

            $.ajax({

            type: 'get', // the method (could be GET btw)

            url: "{{ route('archieve_info') }}",

            data: {

                archive_id: archive_id,

            },

            success:function(response){

            $('#ArchiveID').val(response.info.id);

            $('#customerid').val(response.info.id);

            $('#customerName').val(response.info.name);

            $('#customername').val(response.info.name);

            $('#customerType').val(response.info.model_name);

            $('#archive_type').val(response.info.type_id);

            $('#msgTitle').val(response.info.title);

            let date=(response.info.date)

            dates=""

            if(date){

            dates=date.split("-");

            dates = dates[2]+'/'+dates[1]+'/'+dates[0];}

            $("#msgDate").val(dates);

            // $('#msgDate').val(response.info.date);

            $('#msgid').val(response.info.serisal);

            row='';

            console.log(response);

                // console.log(response.info.all_files);

                if(response.files){

                    var j=0;

                    for(j=0;j<response.files.length;j++){

                        shortCutName=response.files[j].real_name;

                        urlfile='{{ asset('') }}';
                        shortCutID=response.files[j].id;

                        console.log(urlfile);

                        urlfile+=response.files[j].url;

                        formDataStr="formDataaa";

                        console.log(urlfile);

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



            // attach='';

            // var i=1;

            // if(response.info.fileIDS&&typeof(response.info.fileIDS)=="object"){

            // response.info.fileIDS.forEach(file => {

            //     attach+='<div id="attach" class=" col-sm-6 ">'

            //             +'<div class="attach">'

            //                 +'<span class="attach-text">مرفق '+i+'</span><a onclick="delAttach()"><i class="fa fa-trash"></i></a>'

            //                 +'<a class="attach-close1" href="'+file+'" style="color: #74798D; float:left;" target="_blank">'

            //                 +'  <i class="fa fa-eye"> </i>'

            //                 +'</a><input type="hidden" value="" name="attach[]" >'

            //                 +'</div>'

            //             +'</div>';

            //             i++;

            //         });}

            // $(".formDataaaFilesArea").html(attach)

            window.scrollTo(0, 0);

            },

        });

    }

    function CopyRec(id){



		var formData =  {'id':id};

		$.ajax({

			url:'c_archive/GetMunArchByID',

			type: 'POST',

			data: formData,

			dataType:"json",

			async: true,

			success: function (data) {

			    if(data.inCharge.length>0){



                    for(i=0;i<data.inCharge.length;i++){

                        attach='';

                        for(j=0;j<data.inCharge[i].attach.length;j++)

                            attach+='<div id="attach'+data.inCharge[i].attach[j].ID+'" class=" col-sm-6 ">'

                                    +'  <div class="attach">'

                                        +'<span class="attach-text">'+data.inCharge[i].attach[j].AttachName+'</span><a onclick="delAttach('+data.inCharge[i].attach[j].ID+')"><i class="fa fa-trash"></i></a>'

                                        +'<a class="attach-close1" href="'+realPath+'uploads/'+data.inCharge[i].attach[j].AttachServerName+'" style="color: #74798D; float:left;" target="_blank">'

                                        +'  <i class="fa fa-eye"> </i>'

                                        +'</a><input type="hidden" value="'+data.inCharge[i].attach[j].pk_i_id+'" name="attach[]" >'

                                        +'</div>'

                                    +'</div>';

                        $(".formDataaaFilesArea").html(attach)

                        $("#pk_i_id").val(data.inCharge[i].pk_i_id)

                        d=new Date(data.inCharge[i].arch_date);

                        $("#msgDate").val(d.getDate()+'/'+((d.getMonth()+1)<10?'0'+(d.getMonth()+1):(d.getMonth()+1))+'/'+d.getFullYear())

                        $("#customerName").val(data.inCharge[i].receiver_name)

                        $("#msgTitle").val(data.inCharge[i].arch_title)

                        $("#msgid").val(data.inCharge[i].arch_no)



                    }

			    }

			    else

			        alert('لا يوجد بيانات')

			},

			error:function(){

			},

		});

    }

    function addRec(){

        $('.copyto').append('<div class="form-group paddmob">'

                            +'    <div class="input-group w-91">'

                            +'        <div class="input-group-prepend">'

							+'			<span class="input-group-text" id="basic-addon1">'

							+'				 {{trans('archive.copy_to')}}'

							+'			</span>'

                            +'        </div>'

                            +'        <input type="text" id="copyToText[]" class="form-control cust_auto ui-autocomplete-input" name="copyToText[]" autocomplete="off">'

                            +'        <input type="hidden" id="copyToID[]" name="copyToID[]" value="0">'

                            +'        <input type="hidden" id="copyToCustomer[]" name="copyToCustomer[]" value="0">'

                            +'        <input type="hidden" id="copyToType[]" name="copyToType[]" value="0">'

                            +'        <div class="input-group-append" onclick="$(this).parent().parent().remove()" style="cursor:pointer">'

                            +'            <span class="input-group-text input-group-text2">'

                            +'                <i class="fa fa-trash"></i>'

                            +'            </span>'

                            +'        </div>'

                            +'    </div>'

                            +'</div>')

                            

    $( ".cust_auto" ).autocomplete({

		source: 'archive_auto_complete',

		minLength: 1,



        select: function( event, ui ) {

            var currentIndex=$("input[name^=copyToID]").length -1;

            $('input[name="copyToID[]"]').eq(currentIndex).val(ui.item.id);

            $('input[name="copyToCustomer[]"]').eq(currentIndex).val(ui.item.name);

            $('input[name="copyToType[]"]').eq(currentIndex).val(ui.item.model);

        }

	});

    }

    function delete_archive($id) {
    if(confirm('هل انت متاكد من حذف الارشيف؟ لن يمكنك استرجاعه فيما بعد')){
        $(".loader").removeClass('hide');
    let archive_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "archive_delete",

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

