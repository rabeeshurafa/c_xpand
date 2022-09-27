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

                <div class="col-xl-6 col-lg-6">

                    <div class="card rSide">

                        <div class="card-header">

                            <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />
                                 {{trans('archive.finance_achive')}}
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

                        <div class="card-body">

                            <div class="form-body">

                                    <div class="row">

                                        <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">
                                                            
                                                            {{trans('archive.supp_name')}}
                                                        </span>

                                                    </div>

                                                    <input type="text" id="supplierName" class="form-control cust" name="supplierName">
                                                    
                                                    <input type="hidden" id="suppliername" name="suppliername" value="0">

                                                    <input type="hidden" id="supplierType" name="supplierType" value="0">

                                                    <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">

                                                    <input type="hidden" id="url" name="url" value="<?php echo $url ?>">

                                                    <input type="hidden" id="pk_i_id" name="pk_i_id" value="">

                                                    <input type="hidden" id="ArchiveID" name="ArchiveID" value="">

                                                    <input type="hidden" id="supplierid" name="supplierid" value="0">

                                                </div>

                                            </div>

                                        </div>

                                        

                                        <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87" id="licGroup">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{trans('archive.date')}}
                                                        </span>

                                                    </div>
                                                        <!--<input type="text" id="date" name="date" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">-->
                                                        <input type="text" id="date" name="date" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">
                                                    </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{trans('archive.deal_type')}}
                                                        </span>

                                                    </div>

                                                    <select class="form-control financeType" name="financeType" id="financeType">
                                                        
                                                        <option value="">{{trans('admin.select')}}</option>

                                                        @foreach($license_type as $license)

                                                        <option value="{{$license->id}}"> {{$license->name}}   </option>

                                                        @endforeach

                                                    </select>

                                                

                                                    <div class="input-group-append"onclick="ShowConstantModal(105,'financeType','نوع المعاملة')" style="cursor:pointer;max-width: 15px;

                                                    margin-left: 0px !important;

                                                    padding-left: 0px !important;

                                                    padding-right: 0px !important;

                                                    margin-right:15px;

                                                     ">

                                                        <span class="input-group-text input-group-text2">

                                                            <i class="fa fa-external-link"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <div class="col-lg-8 col-md-12 pr-0 pr-s-12" style="min-width: 21%" >

                                            <div class="form-group">

                                                <div class="input-group w-s-87" style="width:97.5% !important">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                            {{trans('admin.notes')}}

                                                        </span>

                                                    </div>

                                                    <input type="text" id="notes" class="form-control " name="notes">

                                                </div>

                                            </div>

                                        </div>

                                </div>

                                        <div class="row">

                                        <div class="col-lg-10 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon1">

                                                            {{ trans('archive.attachment_type') }}

                                                        </span>

                                                    </div>

                                                    <select class="form-control AttahType" name="AttahType" id="AttahType">
                                                        
                                                        <option value="">{{trans('admin.select')}}</option>

                                                        @if($attachment_type)

                                                            @foreach($attachment_type as $attachment)

                                                            <option value="{{$attachment->id}}"> {{$attachment->name}}   </option>

                                                            @endforeach

                                                        @endif

                                                    </select>

                                                    <div class="input-group-append" onclick="ShowConstantModal(106,'AttahType','نوع المرفق')" style="cursor:pointer">

                                                        <span class="input-group-text input-group-text2">

                                                            <i class="fa fa-external-link"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >

                                            <div class="form-group">

                                                <div class="input-group w-s-87">

                                                    <div class="input-group-prepend">

                                                        <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">

                                                    </div>

                                                    <input type="hidden" name="fromname" value="formDataaa">

                                                    <input type="file" class="form-control-file" id="formDataaaupload-file[]" name="formDataaaUploadFile[]" onchange="doUploadAttach1('formDataaa')" 

                                                    style="display: none" >

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div style="text-align: center;">

                                        

                                    <button type="submit" class="btn btn-primary" id="saveBtn" style="">

                                        {{ trans('admin.save') }}   

                                    </button>

                                        

                                        

                                    </div>

                                </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-6 col-lg-6">

                    <div class="card lSide" style="min-height:302.2px;">

                        <div class="card-header">

                            <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />
                            
                              {{ trans('archive.attach') }}   
                            </h4>

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
@include('dashboard.archive.arc_config')
@include('dashboard.component.fetch_table')



<script>







$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



   $('#formDataaa').submit(function(e) {

       e.preventDefault();

       if(parseInt($("#customerid").val())<= 0)

       {

           alert("الرجاء اختيار مورد");

       }

       else{

       $(".loader").removeClass('hide');

       let formData = new FormData(this);

       $.ajax({

          type:'POST',

          url: "store_finance_archive",

           data: formData,

           contentType: false,

           processData: false,

           success: (response) => {

            $(".loader").addClass('hide');
            
            $('#supplierid').val('');

            $('#ArchiveID').val('');

            $('#supplierName').val('');

            $('#suppliername').val('');

            $('#supplierType').val('');

            Swal.fire({

				position: 'top-center',

				icon: 'success',

				title: '{{trans('admin.data_added')}}',

				showConfirmButton: false,

				timer: 1500

				})

                $(".formDataaaFilesArea").html('');

               this.reset();

               $('.wtbl').DataTable().ajax.reload();  

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

       }

  });







$( function() {

    $( ".cust" ).autocomplete({

		source: 'supplier_auto_complete',

		minLength: 1,

		

        select: function( event, ui ) {

            // console.log(ui.item.model);

            $('#supplierid').val(ui.item.id);

            $('#suppliername').val(ui.item.name);
            
            $('#supplierName').val(ui.item.name);

            $('#supplierType').val(ui.item.model);
            
            // $('#date').val(ui.item.date);

           }

	    });

    });

    function update($id){

        let archive_id = $id;

    $('#saveBtn').text("تعديل");

        $(".formDataaaFilesArea").html('');

            $.ajax({

            type: 'get', // the method (could be GET btw)

            url: "{{ route('financeArchive_info') }}",

            data: {

                archive_id: archive_id,

            },

            success:function(response){

                    console.log(response.info)
                    
                    
            $('#supplierid').val(response.info.model_id);

            $('#ArchiveID').val(response.info.id);

            $('#supplierName').val(response.info.name);

            $('#suppliername').val(response.info.name);

            $('#supplierType').val(response.info.model_name);

            $('#notes').val(response.info.title);

            $('#financeType').val(response.info.type_id);
            
            let date=(response.info.date)

            dates=""

            if(date){

            dates=date.split("-");

            dates = dates[2]+'/'+dates[1]+'/'+dates[0];}
            
            $('#date').val(dates);
            

            row='';

                if(response.files){

                    var j=0;

                    for(j=0;j<response.files.length;j++){

                        shortCutName=response.files[j].real_name;

                        shortCutID=response.files[j].id;

                        urlfile='{{ asset('') }}';

                        urlfile+=response.files[j].url;

                        console.log(response.files[j].url)

                        formDataStr="formDataaa";

                                

                            row+='<div class="col-sm-12"><div class="form-group">'

                                +'  <div class="input-group w-s-87">'

                                +'      <div class="input-group-prepend">  			'

                                +'          <span class="input-group-text" id="basic-addon1">'

                                +'              {{ trans('archive.attachment_type') }}			'

                                +'          </span>          '

                                +'      </div>          '

                                +'      <input type="text" id="attachName[]" class="form-control" name="attachName[]" value="'+response.files[j].real_name+'">     ' 

                                +'      <input type="hidden" id="attachFile[]" name="attachFile[]" value="'+response.files[j].url+'">        '    

                                +'      <a href="'+urlfile+'" target="_blank">     '           

                                +'          <span class="input-group-text input-group-text2">       '             

                                +'              <i class="fa fa-download"></i>       '         

                                +'          </span>            '

                                +'      </a>            '

                                +'      <a onclick="$(this).parent().parent().remove()">       '         

                                +'          <span class="input-group-text input-group-text2">          '          

                                +'              <i class="fa fa-trash"></i>    '            

                                +'          </span> '           

                                +'      </a>'        

                                +'  </div>'       

                                +'</div></div>'

                    }

                    $(".formDataaaFilesArea").html(row)

                }

            window.scrollTo(0, 0);

            },

        });

    }

    function fillData($id)

    {

    let license_id = $id;

    console.log(license_id);

    $.ajax({

    type: 'get', // the method (could be GET btw)

    url: "license_info",



        data: {

            license_id: license_id,

        },

        success:function(response){

            $("#licn").val('');

            $("#licnfile").val('');

            $("#licn").val(response.info.hodNo);
    
            $("#licnfile").val(response.info.peiceNo);

        },

    });

    }

    

    function doUploadAttach1(formDataStr)

    {

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $(".loader").removeClass('hide');

        $(".form-actions").addClass('hide');

        var formData = new FormData($("#"+formDataStr)[0]);

        $.ajax({

            url: 'uploadAttach',

            type: 'POST',

            data: formData,

            dataType:"json",

            async: true,

            success: function (data) {

                row='';

                console.log(data.all_files);

                if(data.all_files){

                    var j=0;

                    for(j=0;j<data.all_files.length;j++){

                shortCutName=data.all_files[j].real_name;

                shortCutID=data.all_files[j].id;

                        urlfile='{{asset('')}}';

                        console.log(urlfile);

                        urlfile+=data.all_files[j].url;

                        console.log(urlfile);

                            shortCutName=shortCutName.substring(0, 40)

                            row+='<div class="col-sm-12"><div class="form-group">'

                                +'  <div class="input-group w-s-87">'

                                +'      <div class="input-group-prepend">  			'

                                +'          <span class="input-group-text" id="basic-addon1">'

                                +'              {{ trans('archive.attachment_type') }}			'

                                +'          </span>          '

                                +'      </div>          '

                                +'      <input type="text" id="attachName[]" class="form-control" name="attachName[]" value="'+$("#AttahType option:selected").text()+'">     ' 

                                +'      <input type="hidden" id="attachFile[]" name="attachFile[]" value="'+data.all_files[j].url+'">        '    

                                +'      <a href="'+urlfile+'" target="_blank">     '           

                                +'          <span class="input-group-text input-group-text2">       '             

                                +'              <i class="fa fa-download"></i>       '         

                                +'          </span>            '

                                +'      </a>            '

                                +'      <a onclick="$(this).parent().parent().remove()">       '         

                                +'          <span class="input-group-text input-group-text2">          '          

                                +'              <i class="fa fa-trash"></i>    '            

                                +'          </span> '           

                                +'      </a>'        

                                +'  </div>'       

                                +'</div></div>'

                    }

                    $(".alert-danger").addClass("hide");

                    $(".alert-success").removeClass('hide');

                    $("."+formDataStr+"FilesArea").append(row)

                    $(".loader").addClass('hide');

                    //document.getElementById(""+formDataStr+"upload-file[]").value="";

                    $(".group1").colorbox({rel:'group1'});

                    setTimeout(function(){

                        $(".alert-danger").addClass("hide");

                        $(".alert-success").addClass("hide");

                    },2000)

                }

                else {

                    $(".alert-success").addClass("hide");

                    $(".alert-danger").removeClass('hide');

                }

                $(".loader").addClass('hide');

                $(".form-actions").removeClass('hide');

            },

            error:function(){

                $(".alert-success").addClass("hide");

                $(".alert-danger").removeClass('hide');

                $(".loader").addClass('hide');

                $(".form-actions").removeClass('hide');

            },

            cache: false,

            contentType: false,

            processData: false

        });

    }
    
    function delete_archive($id) {
        if(confirm('هل انت متاكد من حذف الارشيف؟ لن يمكنك استرجاعه فيما بعد')){
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