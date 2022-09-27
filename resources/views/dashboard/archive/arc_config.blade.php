
<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
    padding: 2px 6px !important;
    margin-top: 0 !important;
    background-color: #1E9FF2!important;
    border-color: #1E9FF2 !important;
    color: #FFFFFF;
    margin-left: 8px !important;
    margin-bottom: 2px;
}
</style>
<div class="modal fade text-left" id="AppModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">

    <div class="modal-dialog" role="document" style="width: 800px;">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel1"> 
                       إعدادات مشاركة الارشيف مع الموظفين
                </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

            </div>
                <!--background-color: #1E9FF2!important;-->
            <div class="modal-body" style="background: #f4f5fa">

<form method="post" id="archiveConfigModal" enctype="multipart/form-data">
                <div class="form-body">
        @csrf
                    <div class="row white-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card ">
                                    <div class="card-content collapse show">
                                        <div class="card-body" style="padding-bottom: 0px;">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="input-group" style="width:100%!important">
                                                        <div class="input-group-prepend" style="">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%;">
                                                                {{ 'الموظفين ' }}
                                                            </span>
                                                        </div>
                                                        <select id="emp_to_json" name="emp_to_json[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:75%!important">
                                                            <?php 
                                                            if(isset($employees) && !empty($employees) && count($employees) > 0){ ?>
                                                                <?php foreach ($employees as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" <?php if(count($archive_config)==0){}else{echo in_array($value->id,json_decode($archive_config[0]->archiveroles))?"selected":"" ;}?> ><?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="archive_t" name="archive_t" value="{{$type}}">
                                                <input type="hidden" id="config_id" name="config_id" value="{{count($archive_config)=='0'?'0':$archive_config[0]->id}}">
                                                <input type="hidden" id="empid" name="empid" value="{{Auth()->user()->id}}">
                                                <div class="form-actions" style="border-top:0px; padding-bottom:44px;">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary" id="saveBtn">
                                                            <i class="la la-check-square-o"></i>
                                                            حفظ
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                    </div>


                </div>
                        

</form>

                    

            </div>

        </div>

    </div>

</div>
@section('script')
<script>
$( function() {
    $('#archiveConfigModal').submit(function(e) {
        $(".loader").removeClass('hide');

       let formData = new FormData(this);
       e.preventDefault();
       $.ajax({
          type:'POST',
          url: "store_archive_config",
           data: formData,
           contentType: false,
           processData:false ,
           //dataType:json ,
           success: (response) => {
             if (response) {
                $(".loader").addClass('hide');
			    Swal.fire({
    				position: 'top-center',
    				icon: 'success',
    				title: 'تم حفظ الإعدادات',
    				showConfirmButton: false,
    				timer: 1500
    				})
    				$("#AppModal").modal('hide')
                 }
                 
                $("#AppModal").modal('show')
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
  });
	
} );



function ShowConfigModal(bindTo) {

// $("#CitizenName").html($("#formDataNameAR").val())

$("#AppModal").modal('show')

}

</script>
@endsection