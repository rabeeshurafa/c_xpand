@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="{{trans('archive.search')}}" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')

<link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css"/>

<script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

<section class="horizontal-grid " id="horizontal-grid">

<form method="post" id="permission_form" enctype="multipart/form-data">
        @csrf
        <div class="row white-row">
            <div class="col-sm-12 col-lg-3 col-md-12">
            </div>
            <div class="col-sm-12 col-lg-6 col-md-12">
				<div class="card-header">
					<h4 class="card-title" style="padding-bottom: 10px !important;padding-top: 5px;">
						<i class="fa fa-key" style="color:#4267B2"></i>
                        <a onclick="$('#salahiat1').toggle();">
                            &nbsp;{{trans('admin.emp_permissions_list')}}
                        </a>
                    </h4>

                        <a class="heading-elements-toggle">
					    <i class="ft-align-justify font-medium-3">

					    </i>
					</a>
					<div class="heading-elements">
						<a href="https://db.expand.ps/PerGroup" style="color:#4267B2;padding-top: 5px;font-size:25px !important;" title="عودة للصلاحيات">
						    <i class="fa fa-arrow-alt-circle-left"></i>
						</a>
					</div>
				</div>
				<div class="card-content collapse " id="salahiat1" style="display: block;    background-color: #ffffff;">
					<div class="card-body" style="padding-bottom: 0px;">
						<div class="form-body">
							<div class="row">
								<div class="col-md-12" >
								    <select class="form-control" id="empList" name="empList">
								        <option value="0">-- {{trans('admin.select')}} --</option>
								        @foreach($admin as $row)
								        <option value="{{ $row->id}}">{{ $row->nick_name}}</option>
								        @endforeach
								    </select>
            					</div>
            				</div>
							<div class="row">
								<div class="col-md-12" >
								    &nbsp;
            					</div>
            				</div>
							<div class="row">
								<div class="col-md-12" >
								<div class="form-group">
									<input type="hidden" id="pk_i_id" name="pk_i_id" value="1" />
									<div id="ana">
										<?php $currList=array();
                                            foreach($SysPer as $row){
                                                if($row->fk_i_type==1){
                                                    $temp=array();
                                                    $child=array();
                                                    $temp[]=$row;
                                                    $temp[0]->children=array();
                                                    foreach($SysPer as $row1)
                                                        if($row1->fk_i_parent_id==$row->pk_i_id)
                                                        $child[]=$row1;
                                                    $row->setAttribute('children', $child);
                                                    $currList[]=$temp;
                                                }
                                            }
                                            ;
                                            ?>
										<select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">
                                              @foreach($currList as $row)
											    <optgroup label="{{$row[0]->s_function_title}}">
                                                @foreach($row[0]->children as $row1)
                                                    @if (Auth()->user()->id!=74 && $row1->pk_i_id==73) continue;
                                                    
                                                    @else
												<option value='{{$row1->s_function_url}}' <?php echo in_array($row1->s_function_url,$local_permissions)?"selected":"" ?>> {{$row1->s_function_title}}</option>
                                                
                                                    
                                                    @endif;@endforeach
                                                </optgroup>
                                             @endforeach
										</select>
									</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="form-actions" style="border-top:0px; padding: 0px;padding-bottom:44px;">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="saveBtn">{{trans('admin.save')}}  <i class="ft-thumbs-up position-right"></i></button>
                            </div>
                        </div>
					</div>
				</div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-12">
            </div>
        </div>




  </form>
</section>


@stop
@section('script')

<script>

$('#ana').css('display','none');
$('#saveBtn').css('display','none');
    $(document).ready(function (){
        $("#empList").on("change",function(){
            if($(this).val()!=0)
            {
                $('#ana').css('display','block');
                $('#saveBtn').css('display','inline-block');
                let emp_id = $(this).val()
                $.ajax({
                    type: 'get', // the method (could be GET btw)
                    url: "emp_info",
                    data: {
                        emp_id: emp_id,
                    },
                    success:function(response){
                        $("#ana").html()
                        
                        ctrl=response.per;
                        $("#ana").html(ctrl)
                        $("#my_multi_select2").multiSelect({
                          selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>{{trans('admin.unavailable_per')}}</b></div>",
                          selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>{{trans('admin.available_per')}}</b></div>"
                        }); 
                    },
                });
            }
            else
            {
                $('#ana').css('display','none');
                $('#saveBtn').css('display','none');
            }
        })
        
    $('#permission_form').submit(function(e) {
        $(".loader").removeClass('hide');

       e.preventDefault();
       let formData = new FormData(this);

       $.ajax({
          type:'POST',
          url: "store_usrpermission",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".loader").addClass('hide');

             if (response) {
                $(".loader").addClass('hide');
                console.log(response);
                if (response.success) {
			Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
                }
                else
                {
                    Swal.fire({
    				position: 'top-center',
    				icon: 'error',
    				title: '{{trans('admin.error_save')}}',
    				showConfirmButton: false,
    				timer: 1500
    				})
                }
               this.reset();
             }
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
        $('#my_multi_select2').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>{{trans('admin.unavailable_per')}}</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>{{trans('admin.available_per')}}</b></div>"
      });
        $('#my_multi_select').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>{{trans('admin.unavailable_per')}}</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>{{trans('admin.available_per')}}</b></div>"
      });
    })
</script>




	<script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
	<!--<script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
    -->
@endsection