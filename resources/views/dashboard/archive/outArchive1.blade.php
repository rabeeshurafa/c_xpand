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

            <div class="col-xl-12 col-lg-12">

                <div class="card">

                    <div class="card-header">

                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />

                            @if ($type=='outArchive')

                            {{trans('archive.out_archive')}} 

                            @elseif ($type=='inArchive')

                            {{trans('archive.in_archive')}} 

                            @elseif ($type=='projArchive')

                            {{trans('archive.proj_archive')}}

                            @elseif ($type=='munArchive')

                            {{trans('archive.mun_archive')}} 

                            @elseif ($type=='empArchive')

                            {{trans('archive.emp_archive')}} 

                            @elseif ($type=='depArchive')

                            {{trans('archive.dep_archive')}} 

                            @elseif ($type=='assetsArchive')

                            {{trans('archive.assets_archive')}} 

                            @elseif ($type=='citArchive')

                            {{trans('archive.cit_archive')}} 

                            @endif

                           

                        </h4>

                    </div>

                    <div class="card-body">

                            <div class="form-body">

                                <div class="row">

                                    <div class="col-lg-7 col-md-12 pr-0 pr-s-12"  >

                                        <div class="row">

                                            <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                @if ($type=='outArchive')

                                                                {{trans('archive.export_to')}} 

                                                                @elseif ($type=='inArchive')

                                                                {{trans('archive.import_from')}} 

                                                                @elseif ($type=='projArchive'||'munArchive')

                                                                {{trans('archive.title')}} 

                                                                @endif

                                                            </span>

                                                            

                                                        </div>

                                                        @if($type=='outArchive')

                                                            <input type="hidden" id="archive_type" name="archive_type" value="1">

                                                            @elseif($type=='inArchive')

                                                            <input type="hidden" id="archive_type" name="archive_type" value="2">

                                                            @endif

                                                        

                                                        @if($type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive')

                                                            <input type="text" id="msgTitle" class="form-control" name="msgTitle" style="width: 30%;">

                                                    

                                                            @if($type=='munArchive')

                                                            <select name="archive_type" id="archive_type" class="form-control">

                                                                    

                                                                    <option value="">-- نوع الارشيف --</option>

                                                                    @if(count($projArchive) > 0)

                                                                    @foreach($archive_type as $archive)

                                                                    <option value="{{$archive->id}}"> {{$archive->name}}   </option>

                                                                    @endforeach

                                                                    @endif

    

                                                                </select>

                                                            <div class="input-group-append" onclick="ShowConstantModal(42,'archive_type','نوع الأرشيف')" style="cursor:pointer">

                                                                <span class="input-group-text input-group-text2">

                                                                    <i class="fa fa-external-link"></i>

                                                                </span>

                                                            </div>

                                                            @elseif($type=='empArchive')

                                                            <select name="archive_type" id="archive_type" class="form-control">

                                                                    

                                                                    <option value="">-- نوع الارشيف --</option>

                                                                    @if(count($empArchive) > 0)

                                                                    @foreach($empArchive as $archive)

                                                                    <option value="{{$archive->id}}"> {{$archive->name}}   </option>

                                                                    @endforeach

                                                                    @endif

    

                                                                </select>

                                                            <div class="input-group-append" onclick="QuickAdd(52,'archive_type','نوع الأرشيف')" style="cursor:pointer">

                                                                <span class="input-group-text input-group-text2">

                                                                    <i class="fa fa-external-link"></i>

                                                                </span>

                                                            </div>

                                                            @elseif($type=='depArchive')

                                                            <select name="archive_type" id="archive_type" class="form-control">

                                                                    

                                                                    <option value="">- نوع الارشيف --</option>

                                                                    @if(count($depArchive) > 0)

                                                                    @foreach($depArchive as $archive)

                                                                    <option value="{{$archive->id}}"> {{$archive->name}}   </option>

                                                                    @endforeach

                                                                    @endif

    

                                                                </select>

                                                            <div class="input-group-append" onclick="QuickAdd(62,'archive_type','نوع الأرشيف')" style="cursor:pointer">

                                                                <span class="input-group-text input-group-text2">

                                                                    <i class="fa fa-external-link"></i>

                                                                </span>

                                                            </div>

                                                            @elseif($type=='citArchive')

                                                            <select name="archive_type" id="archive_type" class="form-control">

                                                                    

                                                                    <option value="">-- نوع الارشيف --</option>

                                                                    @if(count($citArchive) > 0)

                                                                    @foreach($citArchive as $archive)

                                                                    <option value="{{$archive->id}}"> {{$archive->name}}   </option>

                                                                    @endforeach

                                                                    @endif

    

                                                                </select>

                                                            <div class="input-group-append" onclick="QuickAdd(72,'archive_type','نوع الأرشيف')" style="cursor:pointer">

                                                                <span class="input-group-text input-group-text2">

                                                                    <i class="fa fa-external-link"></i>

                                                                </span>

                                                            </div>

                                                            @elseif($type=='projArchive')

                                                            <select name="archive_type" id="archive_type" class="form-control archive_type">

                                                                    

                                                                    <option value="">-- نوع الارشيف --</option>

                                                                    @if(count($projArchive)>0)

                                                                    @foreach($projArchive as $archive)

                                                                    <option value="{{$archive->id}}"> {{$archive->name}}   </option>

                                                                    @endforeach

                                                                    @endif

    

                                                                </select>

                                                            <div class="input-group-append" onclick="ShowConstantModal(82,'archive_type','نوع الأرشيف')" style="cursor:pointer">

                                                                <span class="input-group-text input-group-text2">

                                                                    <i class="fa fa-external-link"></i>

                                                                </span>

                                                            </div>

                                                            @endif

                                                        @elseif ($type=='inArchive'||$type=='outArchive')

                                                        <input type="text" id="customerName" class="form-control cust" name="customerName" style="width: 30%;">

                                                        @endif

                                                        <input type="hidden" id="customerid" name="customerid" value="0">

                                                        <input type="hidden" id="customername" name="customername" value="0">

                                                        <input type="hidden" id="customerType" name="customerType" value="0">

                                                        <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">

                                                        <input type="hidden" id="url" name="url" value="<?php echo $url ?>">

                                                        <input type="hidden" id="pk_i_id" name="pk_i_id" value="">

                                                        <input type="hidden" id="ArchiveID" name="ArchiveID" value="">

                                                        <!-- 2166  -->

                                                        

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                @if ($type=='projArchive'||$type=='munArchive')

                                                                {{trans('archive.date')}}

                                                                @elseif ($type=='outArchive'||'inArchive')  

                                                                {{trans('archive.date_send')}}

                                                                @endif

                                                                

                                                            </span>

                                                        </div>

                                                        <input type="text" id="msgDate" name="msgDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                @if ($type=='projArchive')

                                                                {{trans('archive.proj_name')}} 

                                                                @elseif($type=='empArchive')

                                                                {{trans('archive.name_emp')}}

                                                                @elseif ($type=='depArchive')  

                                                                {{trans('archive.name_dep')}}

                                                                @elseif ($type=='citArchive')  

                                                                {{trans('archive.name_cit')}}

                                                                @elseif ($type=='assetsArchive')  

                                                                {{trans('archive.name_assets')}}

                                                                @elseif ($type=='munArchive')  

                                                                {{trans('admin.related_to')}}

                                                                @elseif ($type=='outArchive'||$type=='inArchive')  

                                                                {{trans('archive.title_send')}}

                                                                @endif

                                                            </span>

                                                        </div>

                                                        @if($type=='projArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive')

                                                        <input type="text" id="customerName" class="form-control cust" name="customerName" style="width: 30%;">

                                                        @elseif($type=='munArchive')

                                                        <input type="text" id="customerName" class="form-control cust" name="customerName2" style="width: 30%;">

                                                        <input type="hidden" name="customerName" value="0">

                                                        @elseif ($type=='inArchive'||$type=='outArchive')

                                                        <input type="text" id="msgTitle" class="form-control" name="msgTitle">

                                                        @endif

                                                        <input type="hidden" id="OrgType" class="form-control" name="OrgType" value="2076">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87">

                                                        <div class="input-group-prepend">

                                                            <span class="input-group-text" id="basic-addon1">

                                                                @if ($type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive')

                                                                {{trans('archive.num')}}

                                                                @elseif ($type=='outArchive'||$type=='inArchive')  

                                                                {{trans('archive.num_send')}}

                                                                @endif

                                                                

                                                            </span>

                                                        </div>

                                                        <input type="text" id="msgid" name="msgid" class="form-control eng-sm valid" style="text-align: left;direction: ltr;">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">

                                                <input type="checkbox" name="copyTo" onclick="$('.copyto').toggle()"> {{trans('archive.copy_to')}}

                                            </div>

                                            <div class="col-md-8 pr-0 pr-s-12 copyto hide"  >

                                                <div class="form-group">

                                                    <div class="input-group w-s-87">

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

                                    <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >

                                        <div class="row attachs-body">

                                            <div class="form-group col-12 mb-2">

                                                <div class="progress">

                                                    <div class="bar"></div >

                                                    <div class="percent">0%</div >

                                                </div>

                                                <input type="hidden" name="fromname" value="formDataaa">

                                                <meta name="csrf-token" content="{{ csrf_token() }}" />



                                                <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" onchange="doUploadAttach('formDataaa')" 

                                                style="display: none" >

                                                <div class="row formDataaaFilesArea" style="margin-left: 0px;">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-1 col-md-12 pr-0 pr-s-12"  >

                                        <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer;    float: left;" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">

                                        <!-- <a onclick="showLinkModal('formDataaa')" class="attach-icon">

                                            <img src="images/hyper.png" width="35" height="35" style="cursor:pointer">

                                        </a>-->

                                    </div>

                                </div>

                                <div style="text-align: center;">

                                    <button type="submit" class="btn btn-primary" id="" style="" >

                                    {{ trans('admin.save') }}    

                                    </button>                                    

                                </div>

                            </div>

                    </div>

                </div>

            </div>



        </div>

      </form>

    </section>

</div>

@include('dashboard.component.fetch_table');

@section('script')

<script>

$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   $('#formDataaa').submit(function(e) {

    $(".loader").removeClass('hide');

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

            $(".loader").addClass('hide');

            Swal.fire({

				position: 'top-center',

				icon: 'success',

				title: '{{trans('admin.data_added')}}',

				showConfirmButton: false,

				timer: 1500

				})

               this.reset();

               $('.wtbl').DataTable().ajax.reload();  

               $(".formDataaaFilesArea").html('');

           },

           error: function(response){

            $(".loader").addClass('hide');

            $("#customerName").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#customerName" ).removeClass( "error" );

                    }

                });

                

            if(response.responseJSON.errors.archive_type){

                $( "#archive_type" ).addClass( "error" );

            }

                

            if(response.responseJSON.errors.customerid){

                $( ".cust" ).addClass( "error" );

            }

            Swal.fire({

				position: 'top-center',

				icon: 'error',

				title: '{{trans('admin.error_save')}}',

				showConfirmButton: false,

				timer: 1500

				})

                $(".formDataaaFilesArea").html('');

            if(response.responseJSON.errors.customerName){

                $( "#customerName" ).addClass( "error" );

            }

           }

       });

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

    $(".cust").on("keypress",function(){

        $("#customerid").val('')

    })

    $( ".cust" ).autocomplete({

        @if($type=='projArchive')

		source: 'project_auto_complete',

        @else

		source: 'archive_auto_complete',

		@endif

		minLength: 1,

		

        select: function( event, ui ) {

            console.log(ui.item);

            $('#customerid').val(ui.item.id);

            $('#customerName').val(ui.item.name);

            $('#customername').val(ui.item.name);

            $('#customerType').val(ui.item.model);

            $('#msgid').val(ui.item.zepe_code);

           }

	    });

    });

    function update($id){

        let archive_id = $id;

        $(".formDataaaFilesArea").html('');

            $.ajax({

            type: 'get', // the method (could be GET btw)

            url: "{{ route('archieve_info') }}",

            data: {

                archive_id: archive_id,

            },

            success:function(response){

            $('#customerid').val(response.info.id);

            $('#ArchiveID').val(response.info.id);

            $('#customerName').val(response.info.name);

            $('#customername').val(response.info.name);

            $('#customerType').val(response.info.model_name);

            $('#msgTitle').val(response.info.title);

            $('#msgDate').val(response.info.date);

            $('#msgid').val(response.info.serisal);

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

                

            row='';

                if(response.CopyTo){

                    var j=0;

                    for(j=0;j<response.CopyTo.length;j++){

                        

                            row+='<div class="col-md-8 pr-0 pr-s-12 copyto hide" style="display: block;">'

                                +'    <div class="form-group">'

                                +'        <div class="input-group w-s-87">'

                                +'            <div class="input-group-prepend">'

                                +'                <span class="input-group-text" id="basic-addon1">'

                                +'                    نسخة إلى '

                                +'                </span>'

                                +'            </div>'

                                +'            <input type="text" id="copyToText[]" class="form-control cust_auto ui-autocomplete-input" name="copyToText[]" autocomplete="off" value="'+response.CopyTo[j].name+'">'

                                +'            <input type="hidden" id="copyToID[]" name="copyToID[]" value="'+response.CopyTo[j].model_id+'">'

                                +'            <input type="hidden" id="copyToCustomer[]" name="copyToCustomer[]" value="'+response.CopyTo[j].name+'">'

                                +'            <input type="hidden" id="copyToType[]" name="copyToType[]" value="'+response.CopyTo[j].model_name+'">'

                                +'            <div class="input-group-append" onclick="$(this).parent().parent().remove()" style="cursor:pointer">'

                                +'                <span class="input-group-text input-group-text2">                <i class="fa fa-trash"></i>            </span>'

                                +'            </div>'

                                +'        </div>'

                                +'    </div>'

                                +'</div>'

                    }

                    $(".copyto").append(row)

                }

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

        $('.copyto').append('<div class="form-group">'

                            +'    <div class="input-group w-s-87">'

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

   

</script>

@endsection

@endsection