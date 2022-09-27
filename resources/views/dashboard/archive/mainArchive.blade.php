@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
<div class="content-body">
    <section id="hidden-label-form-layouts">
    <form method="post" id="archive-form" enctype="multipart/form-data">
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
                        <form id="formDataaa" onsubmit="return false">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >
                                        <div class="row">
                                            <div class="col-lg-9 col-md-12 pr-0 pr-s-12"  >
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
                                                        <input type="text" id="customerName" class="form-control cust" name="customerName" style="width: 30%;">
                                                        
                                                        @if($type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive')
                                                            <select name="OrgType" id="OrgType" class="form-control">
                                                                    
                                                                <option value="">-- نوع الارشيف --</option>
                                                                
                                                            </select>
                                                            <div class="input-group-append" onclick="QuickAdd(42,'OrgType','نوع الأرشيف')" style="cursor:pointer">
                                                                <span class="input-group-text input-group-text2">
                                                                    <i class="fa fa-external-link"></i>
                                                                </span>
                                                            </div>
                                                        @elseif ($type=='inArchive'||$type=='outArchive')
                                                        
                                                        @endif
                                                        <input type="hidden" id="customerid" name="customerid" value="0">
                                                        <input type="hidden" id="customerType" name="customerType" value="0">
                                                        <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                                        <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">
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
                                            <div class="col-lg-9 col-md-12 pr-0 pr-s-12"  >
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
                                                        <input type="text" id="msgTitle" class="form-control" name="msgTitle">
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
                                            <div class="col-md-9 pr-0 pr-s-12 copyto hide"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('archive.copy_to')}}
                                                            </span>
                                                        </div>
                                                        <input type="text" id="copyToText[]" class="form-control cust_auto" name="copyToText[]">
                                                        <input type="hidden" id="copyToID[]" name="copyToID[]" value="0">
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
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                        <div class="row attachs-body">
                                            <div class="form-group col-12 mb-2">
                                                <input type="hidden" name="fromname" value="formDataaa">
                                                <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" onchange="doUploadAttach('formDataaa')" 
                                                style="display: none" >
                                                <div class="row formDataaaFilesArea" style="margin-left: 0px;">
                                                </div>
                                                <div class="row formDataaaLinkArea" style="margin-left: 0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-12 pr-0 pr-s-12"  >
                                        <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">
                                        <!-- <a onclick="showLinkModal('formDataaa')" class="attach-icon">
                                            <img src="images/hyper.png" width="35" height="35" style="cursor:pointer">
                                        </a>-->
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" id="" style="" onclick="SaveMasterArch()">
                                    {{ trans('admin.save') }}    
                                    </button>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
      </form>
    </section>
</div>
@include('dashboard.component.fetch_table');
@endsection
@section('script')
<script>


$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#archive-form').submit(function(e) {
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
               this.reset();
               $('.wtbl').DataTable().ajax.reload();  
           },
           error: function(response){
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
            $('input[name="copyToType[]"]').eq(currentIndex).val(ui.item.model);
        }
	});
});


$( function() {
    $( ".cust" ).autocomplete({
		source: 'archive_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            $('#customerid').val(ui.item.id);
            $('#customerType').val(ui.item.model);
           }
	    });
    });


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
                            +'        <input type="text" id="copyToText[]" class="form-control cust_auto ui-autocomplete-input" name="copyToText[]">'
                            +'        <input type="hidden" id="copyToID[]" name="copyToID[]" value="0">'
                            +'        <input type="hidden" id="copyToType[]" name="copyToType[]" value="0">'
                            +'        <div class="input-group-append" onclick="$(this).parent().parent().remove()" style="cursor:pointer">'
                            +'            <span class="input-group-text input-group-text2">'
                            +'                <i class="fa fa-trash"></i>'
                            +'            </span>'
                            +'        </div>'
                            +'    </div>'
                            +'</div>')
            $( ".cust" ).autocomplete({
                source:"generalSearch",
                minLength: 2,
                select: function( event, ui ) {
                    $(this).next().val(ui.item.id)
                    $(this).next().next().val(ui.item.category)
                    
                }
            });
    }
</script>
@endsection
