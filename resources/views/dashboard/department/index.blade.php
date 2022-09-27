@extends('layouts.admin')

@section('search')

<li class="dropdown dropdown-language nav-item hideMob">

            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">

          </li>

@endsection

@section('content')

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
.preW{
    width:35%!important;
}
.select2-container--default
{
    width:70%!important;
}
</style>

<section class="horizontal-grid" id="horizontal-grid">

		<form id="ajaxform">

                <div class="row white-row">

                    <div class="col-sm-12 col-md-6">

                        <div class="card leftSide">

                            <div class="card-header">

                                <h4 class="card-title">

									<img src="https://db.expand.ps/images/487574_32.png">

									<span1> {{trans('admin.dept_info')}}</span1>

								</h4>





                                    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">

                                        <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">

                                    </div>

                            </div>

                            <div class="card-content collapse show">

                                <div class="card-body" style="padding-bottom: 0px;">

                                    <div class="form-body">

										<div class="row">

											<div class="col-md-6">

												<div class="form-group">

													<div class="input-group">

														<div class="input-group-prepend">

															<span class="input-group-text" id="basic-addon1">

															{{trans('admin.department')}}

															</span>

														</div>

														<input type="text" id="departmentName"

														class="form-control alphaFeild ac ui-autocomplete-input" placeholder="{{trans('admin.department')}}"

														 name="departmentName" aria-invalid="false" autocomplete="off">

													</div>

													<div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>



												</div>

											</div>

											<input type="hidden" name="department_id" id="department_id" >



											<div class="col-md-6">

												<div class="form-group">

													<div class="input-group">

														<div class="input-group-prepend">

															<span class="input-group-text" id="basic-addon1">

															{{trans('admin.manager')}}



															</span>

														</div>

														<select id="Incharge" name="Incharge" type="text" class="form-control selectFullCorner">

                                                            <option value=""> -- {{trans('admin.select_manager')}}  --</option>



														    @foreach($admins as $admin)

															<option value="{{$admin->id}}"> {{$admin->nick_name}} </option>

															@endforeach

														</select>

														<div class="input-group-append">

															<span class="input-group-text input-group-text2">

																<a target="_blank">

																	<i class="fa fa-external-link-alt" style="color:#ffffff"></i></a>

															</span>

														</div>

													</div>

												</div>

											</div>

										</div>



										<div class="row hide">

											<div class="col-md-6">

												<div class="form-group">

													<div class="input-group">

														<div class="input-group-prepend">

															<span class="input-group-text input-group-text1" id="basic-addon1">



                                                                            <img src="https://db.expand.ps/images/email35.png" style="max-width: 35px;">

															</span>

														</div>

														<input type="text" id="email" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))" class="form-control noleft" placeholder="something@domian.ps" name="email" aria-invalid="false">

													</div>

												</div>

											</div>

											<div class="col-md-6">

												<div class="form-group">

													<div class="input-group">

														<div class="input-group-prepend">

															<span class="input-group-text" id="basic-addon1">

															{{trans('admin.Internal_Phone')}}

															</span>

														</div>

														<input type="text" id="phone" class="form-control numFeild" placeholder="022000000" name="phone" aria-invalid="false" maxlength="9" style="width:78px;border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;">



														<input type="text" id="extphone" class="form-control numFeild" placeholder="123" name="extphone" aria-invalid="false">



														<div class="input-group-append">

															<span class="input-group-text input-group-text2 ">

																<i class="fa fa-external-link-alt" style="color:#ffffff"></i>

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

															{{trans('admin.related_to')}}

															</span>

														</div>

														<select id="LinkDept" name="LinkDept" type="text" class="form-control selectFullCorner">

															<option value="">   </option>

															@foreach($departments as $department)

																<option value="{{ $department->id}}">  {{ $department->name}}  </option>

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

															{{trans('admin.manager')}}

															</span>

														</div>

														<input type="text" id="inChargeLink" name="inChargeLink" class="form-control" readonly="" placeholder="{{trans('admin.manager')}}" aria-invalid="false">

														<input type="hidden" id="inChargessn" name="inChargessn" class="form-control" readonly="" placeholder="{{trans('admin.manager')}}" aria-invalid="false">

														<div class="input-group-append">

															<span class="input-group-text input-group-text2">

																<i class="fa fa-external-link-alt" style="color:#ffffff"></i>

															</span>

														</div>

													</div>

												</div>

											</div>

										</div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pr-s-12">
                                                <div class="form-group">
                                                    <div class="input-group" style="width:100% !important">
                                                        <div class="input-group-prepend" style="width:30%">
                                                            <span class="input-group-text" id="basic-addon1"style=" width: 100%;">
                                                                {{trans('admin.permission_dept_archive')}}
                                                            </span>
                                                        </div>
                                                        <select id="allowed_emp" name="allowed_emp[]"  class="select2 form-control" multiple="multiple" data-toggle="select" style="width:70%;">
                                                            <?php 
                                                            if(isset($admins) && !empty($admins) && count($admins) > 0){ ?>
                                                                <?php foreach ($admins as $key => $value){ ?>
                                                                    <option value="<?php echo $value->id; ?>" > <?php echo $value->nick_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
										</div>

										<div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>



									</div>

                                </div>

                            </div>



							<div class="card">

								<div class="card-header">

									<h4 class="card-title">

										<img src="https://db.expand.ps/images/personal-information.png" height="32">

										<span1> {{trans('admin.dep_employees')}}</span1>

									</h4>



									<div class="heading-elements1 onOffArea" style="display: none;    top: 10px;">



									</div>

								</div>

								<div class="card-content collapse show">

									<div class="card-body" style="padding-bottom: 0px;">

										<div class="form-body">



											<div class="row">





											<div class="col-md-12">

													<table style="width:100%; margin-top: -10px;" class="detailsTB table">

														<tbody><tr>

														<th scope="col">#</th>

															<th scope="col">{{trans('admin.employee_name')}} </th>

															<th scope="col">{{trans('admin.job_title')}} </th>

															<th scope="col">{{trans('admin.start_date')}}  </th>

															<th scope="col">{{trans('admin.working_years')}}  </th>

														</tr>

														</tbody><tbody id="employees_data">



														</tbody>

													</table>



												</div>







											</div>

										</div>

									</div>

								</div>



							</div>

							<div class="card">

								<div class="card-header">

									<h4 class="card-title">

										<img src="https://db.expand.ps/images/personal-information.png" height="32">

										<span1> {{trans('admin.prev_employees')}}  </span1>

									</h4>



									<div class="heading-elements1 onOffArea postionleft" style="top: 10px;" >

										<a onclick="$('.prevEmp').toggle();"> {{trans('admin.press_here')}}  </a>

									</div>

								</div>

								<div class="card-content collapse prevEmp" style="display: none;">

									<div class="card-body" style="padding-bottom: 0px;">

										<div class="form-body">



											<div class="row">

												<div class="col-md-12">

													<table style="width:100%; margin-top: -10px;" class="detailsTB table">

														<tbody><tr>

															<th scope="col">#</th>

															<th scope="col">{{trans('admin.employee_name')}} </th>

															<th scope="col">{{trans('admin.working_location')}} </th>

															<th scope="col">{{trans('admin.start_date')}}  </th>

															<th scope="col">{{trans('admin.leaving_date')}}  </th>

														</tr>

														</tbody><tbody id="prevEmp">



														</tbody>

													</table>



												</div>

											</div>

										</div>

									</div>

								</div>



							</div>

						</div>

                    </div>







					<div class="col-sm-12 col-md-6">

                        <div class="card rightSide" style="min-height:453.875px">

                            <div class="card-header hide">

                                <h4 class="card-title"><img src="https://db.expand.ps/images/41254_32.png">

								{{trans('admin.employee_dep_info')}}

								</h4>

                                <a class="heading-elements-toggle">

                                    <i class="ft-align-justify font-medium-3"></i></a>

								<div class="heading-elements1 heading-elements2">

									<ul class="list-inline mb-0">

										<li>

											<img src="https://db.expand.ps/images/right_arrow.png" width="32" height="32" onclick="GetPrev()">

										</li>

										<li>

											<img src="https://db.expand.ps/images/left_arrow.png" width="32" height="32" onclick="GetNext()">

										</li>

									</ul>

								</div>

                            </div>

                            <div class="card-content collapse  hide">

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-12">

											<table style="width:100%; margin-top: -10px;" class="detailsTB table">

															<tbody><tr>

																<th scope="col">{{trans('admin.employee_name')}} </th>

																<th scope="col">{{trans('admin.working_location')}}</th>

																<th scope="col">{{trans('admin.active')}}</th>

															</tr>

															<tr>

																<td>

																	Rabiee

																</td>

																<td>

																	Accounting

																</td>

																<td>

																	<div class="onoffswitch">

																		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch2">

																		<label class="onoffswitch-label" for="myonoffswitch2">

																			<span class="onoffswitch-inner"></span>

																			<span class="onoffswitch-switch"></span>

																		</label>

																	</div>

																</td>

															</tr>

															<tr>

																<td>

																	Razan

																</td>

																<td>

																	programming

																</td>

																<td>

																	<div class="onoffswitch">

																		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch3" checked="">

																		<label class="onoffswitch-label" for="myonoffswitch3">

																			<span class="onoffswitch-inner"></span>

																			<span class="onoffswitch-switch"></span>

																		</label>

																	</div>

																</td>

															</tr>

															<tr>

																<td>

																	Mustafa

																</td>

																<td>

																	programming

																</td>

																<td>

																	<div class="onoffswitch">

																		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch4" checked="">

																		<label class="onoffswitch-label" for="myonoffswitch4">

																			<span class="onoffswitch-inner"></span>

																			<span class="onoffswitch-switch"></span>

																		</label>

																	</div>

																</td>

															</tr>

														</tbody></table>



										</div>

                                    </div>

								</div>

                            </div>

							<div class="card-header" style="padding-top:0px;">

								<h4 class="card-title"><img src="https://db.expand.ps/images/t8521_32.png">{{trans('admin.dep_tasks_info')}} </h4>

								<a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>



							</div>

							<div class="card-content collapse show ">

								<div class="card-body">

									<div class="row">

										<div class="col-md-12">

											<div class="form-group">

												<table style="width:100%" class="detailsTB table">

													<tbody><tr>

														<th scope="col">{{trans('admin.task_name')}}</th>

														<th scope="col" width="100px">{{trans('admin.time')}}</th>

														<th scope="col" width="120px">{{trans('admin.default_emp')}}</th>

														<th scope="col" width="60px">{{trans('admin.message')}}</th>

														<th scope="col" width="60px">{{trans('admin.active')}}</th>

														<th scope="col"></th>

													</tr>

													<tr>

														<td>

															<input class="form-control form-control1 " style="text-align: right;" id="taskName" placeholder="{{trans('admin.enter_name_task')}}">

														</td>

														<td>

															<input class="form-control form-control1 numFeild" style="text-align: right;" id="taskEndTime" placeholder="{{trans('admin.expire_date')}}">

														</td>

														<td>

															<select id="InchargeSelect" name="InchargeSelect" type="text" class="form-control form-control1 selectFullCorner">

																<option value="37"> يونس ابو عمر </option>

															</select>

														</td>

														<td>

															<div class="onoffswitch">

																<input type="checkbox" name="onoffswitch" checked="checked" class="onoffswitch-checkbox" id="myonoffswitchcol1">

																<label class="onoffswitch-label" for="myonoffswitchcol1">

																	<span class="onoffswitch-inner"></span>

																	<span class="onoffswitch-switch"></span>

																</label>

															</div>

														</td>

														<td>

															<div class="onoffswitch">

																<input type="checkbox" name="onoffswitch" checked="checked" class="onoffswitch-checkbox" id="myonoffswitchcol2">

																<label class="onoffswitch-label" for="myonoffswitchcol2">

																	<span class="onoffswitch-inner"></span>

																	<span class="onoffswitch-switch"></span>

																</label>

															</div>

														</td>

														<td>

															<div class="input-group-append" style="margin-left: 0px !important" onclick="CopyRec()">

															  <span class="input-group-text input-group-text2" style="margin-left: 0;">

																  <i class="fas fa-plus-circle" id="plusElement2"></i>

															  </span>

															</div>

														</td>

													</tr>

													</tbody><tbody id="subTask">



													</tbody>

												</table>

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-md-12">

											<div class="form-group">

												<div class="input-group">

													<div class="input-group-prepend">

														<span class="input-group-text" id="basic-addon1">

														{{trans('admin.notes')}}

														</span>

													</div>

													<textarea type="text" id="NoteAR" class="form-control" placeholder="{{trans('admin.notes')}}" name="NoteAR" style="height: 35px;"></textarea>

													<div class="input-group-append">

														<span class="input-group-text input-group-text2" style="color:#ffffff">

															<i class="fa fa-external-link-alt"></i>

														</span>

													</div>

												</div>

											</div>

										</div>

									</div>


                                @can('depart_archives')
									<div class="card-header" style="padding-top:0px;">

										<h4 class="card-title">

											<img src="{{ asset('assets/images/ico/msg.png') }}" width="32" height="32">

											{{trans('admin.sub_archives')}}

										</h4>

									</div>

									<div class="card-content collapse show">

										<div class="card-body" style="padding-bottom: 0px;">

											<div class="row" style="text-align: center">

													<div class="col-md-2 w-s-50" style="padding: 0px;">

														<div class="form-group">

															<img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#ArchModalName').html($('#departmentName').val());$('#msgModal').modal('show')" style="cursor:pointer">

															<div class="form-group">

																<a onclick="$('#ArchModalName').html($('#departmentName').val());$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}}

																<span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>

															</div>

														</div>

													</div>

												</div>

										</div>

									</div>
                                    @endcan


									<div class="form-actions" style="border-top:0px;">

										<div class="text-right">
                                            @can('edit_model')
											<button type="submit" style="display:none" class="btn btn-primary save-data" id="editBtn">{{trans('admin.modify')}} <i class="ft-thumbs-up position-right"></i></button>
                                            @endcan
                                            <button type="submit" class="btn btn-primary save-data" id="saveBtn">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>

											<button type="reset" onclick="$('#employees_data').html('');" class="btn btn-warning reset-data"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>



										</div>

									</div>

								</div>

							</div>

                        </div>





                    </div>

                </div>

				</form>

            </section>

@include('dashboard.component.dept_archive')

@include('dashboard.component.fetch_table')

@stop

@section('script')



<script>

$('.reset-data').click(function(event){

	$("#msgStatic").html("(0)");

});

$( function() {

    $( ".ac" ).autocomplete({

		source: 'dept_auto_complete',

		minLength: 2,



        select: function( event, ui ) {

            update(ui.item.id);

        }

	});

} );



function update($id)

{

	let dep_id = $id;

    $.ajax({

        type: 'get', // the method (could be GET btw)

        url: "dep_info",

        data: {

            dep_id: dep_id,

        },

        success:function(response){
          if (response.status!=false) {  
                $('#allowed_emp').val(''); 
                $archiveCount=0;    
                @can('deptContractArchive')    
                getContractArchive(response.info.id,response.contractArchiveCount);
                $archiveCount+=response.contractArchiveCount;
                @endcan
                
                @can('deptOutArchive')
                getOutArchive(response.info.id,response.outArchiveCount);
                $archiveCount+=response.outArchiveCount;
                @endcan
                
                @can('deptInArchive')
                getInArchive(response.info.id,response.inArchiveCount);
                $archiveCount+=response.inArchiveCount;
                @endcan
                
                @can('deptOtherArchive')
                getOtherArchive(response.info.id,response.otherArchiveCount);
                $archiveCount+=response.otherArchiveCount;
                @endcan
                
                @can('deptCopyArchive')
                getCopyArchive(response.info.id,response.copyToCount);
                $archiveCount+=response.copyToCount;
                @endcan
                
                @can('deptJalArchive') 
                getJalArchive(response.info.id,response.linkToCount);
                $archiveCount+=response.linkToCount;
                @endcan
                
                @can('deptLawArchive')  
                getLawArchive(response.info.id,response.lawArchieveCount);
                $archiveCount+=response.lawArchieveCount;
                @endcan
                
                $('#saveBtn').css('display','none');
                $('#editBtn').css('display','inline-block');
    
                $('#department_id').val(response.info.id);
    
                $('#departmentName').val(response.info.name);
    
                $('#email').val(response.info.email);
    
                $('#phone').val(response.info.phone);
    
                $('#extphone').val(response.info.extphone);
    
                $('#inChargeLink').val(response.dep_parent_manager);
    
    			$("#msgStatic").html($archiveCount);
    			
    			
    			$('.select2-selection__rendered').html('');
                    
                    
                    if(response.allowedEmp!=null){
                        $("#allowed_emp").html('');
                        for($i=0 ; $i<response.allAdmin.length ; $i++){
                                $selected=0;
                            for($c=0 ;$c<response.allowedEmp.length; $c++){
                                
                                if(response.allowedEmp[$c] == response.allAdmin[$i].id){
                                    $selected=1;
                                   $("#allowed_emp").append('<option value="'+response.allAdmin[$i].id+'" selected >'+ response.allAdmin[$i].nick_name +'</option>');
                                //   console.log(response.allAdmin[$i].id+'selected');
                                   break;
                                }
                                
                            }
                            if($selected==0){
                                $("#allowed_emp").append('<option value="'+response.allAdmin[$i].id+'">'+ response.allAdmin[$i].nick_name +'</option>');
                            }
                            
                        }
                    }
    
                // drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
    
                //     response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
    
                //     ,response.licFileArchiveCount
    
                //     ,response.licArchiveCount,response.copyToCount,response.linkToCount,response.lawArchieveCount);
    
                $("select#LinkDept option")
    
                     .each(function() { this.selected = (this.text == response.dep_parent);
    
                });
    
                $("select#Incharge option")
    
                     .each(function() { this.selected = (this.text == response.admin);
    
                });
    
    
    
                 //////manualy reset table/////
    
                 $('#employees_data').html('');
    
                //////////////////////////////
    
    
    
    			var len = response.employees.length;
    
                for(var i=0; i<len; i++){
    
    			    var index = i+1;
    
                    var name = response.employees[i].name;
    
                    var start_date = response.employees[i].start_date;
    
                    var job_title = response.job_title[i];
    
    
    
    				var start = new Date(start_date).getFullYear();
    
    				var end   = new Date().getFullYear();
    
                    var years = end - start;
    
    
    
                        var employees_data = '<tr><td>'+index +'</td><td>'
    
                        +name+'</td><td>'+job_title+'</td><td>'+start_date+'</td><td style="text-align:center">'
    
    					+years+'</td></tr>'
    
                        $("#employees_data").append(employees_data);
    
                    }
    
    
    
                    window.scrollTo(0, 0);

	        }else{
                window.location = "{{route('deptNotAllowed')}}";
            }
        },
    });

}

$("#LinkDept").change(function () {

        var val = $(this).val();

$.ajax({

   type: 'post', // the method (could be GET btw)

   url: "depart_manger",

   data: {

        val: val,

        _token: '{{csrf_token()}}',

   },

   success:function(response){

	$('#inChargeLink').val(response);

         },

        });

    });





$(".save-data").click(function(event){



	$(".loader").removeClass('hide');

     $( "#departmentName" ).removeClass( "error" );

      event.preventDefault();



      let departmentName = $("input[name=departmentName]").val();

      let email = $("input[name=email]").val();

      let phone = $("input[name=phone]").val();

      let extphone = $("input[name=extphone]").val();

      var Incharge = $('#Incharge').find(":selected").val();

      var LinkDept = $('#LinkDept').find(":selected").val();

      var _token ='{{csrf_token()}}';

      let department_id = $("input[name=department_id]").val();

      let allowedEmp=$('#allowed_emp').val();

      $.ajax({

        url: "store_department",

        type:"POST",

        data:{

            departmentName:departmentName,

            email:email,

			department_id:department_id,

            phone:phone,

            extphone:extphone,

            Incharge:Incharge,

            LinkDept:LinkDept,
            
            allowedEmp:allowedEmp,

            _token: _token ,

         },



        success:function(response){

			$(".loader").addClass('hide');
            $('#allowed_emp').val('');
            
            $('.select2-selection__rendered').html('');
			Swal.fire({

				position: 'top-center',

				icon: 'success',

				title: '{{trans('admin.department_added')}}',

				showConfirmButton: false,

				timer: 1500

				})

            // $(".alert-success").removeClass('hide');

            // $("#succMsg").text('{{trans('admin.department_added')}}')

			$('.wtbl').DataTable().ajax.reload();

            setTimeout(function(){

                $(".alert-success").addClass("hide");

            },2000)

            $("#ajaxform")[0].reset();



        },

        error: function(response) {

			$(".loader").addClass('hide');



			Swal.fire({

				position: 'top-center',

				icon: 'error',

				title: '{{trans('admin.error_save')}}',

				showConfirmButton: false,

				timer: 1500

				})



			// Swal.fire('Any fool can use a computer');



            // $(".alert-success").addClass("hide");

			// $(".alert-danger").removeClass('hide');

            // $("#errMsg").text('{{trans('admin.error_save')}}')

            setTimeout(function(){

                $(".alert-danger").addClass("hide");

            },2000)

			$("#departmentName").on('keyup', function (e) {

                    if ($(this).val().length > 0) {

                        $( "#departmentName" ).removeClass( "error" );

                    }

                });

            if(response.responseJSON.errors.departmentName){

                $( "#departmentName" ).addClass( "error" );

            }





           }







       });

  });



  function delete_dept($id) {
    if(confirm('هل انت متاكد من حذف القسم؟ لن يمكنك استرجاعه فيما بعد')){
    let dept_id = $id;
    var _token = '{{ csrf_token() }}';
    $.ajax({

        type: 'post',

        // the method (could be GET btw)

        url: "dept_delete",

        data: {

            dept_id: dept_id,
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

                title: 'تمت عملية الحذف بنجاح',

                showConfirmButton: false,

                timer: 1500

            })

            $("#ajaxform")[0].reset();

        },

        error: function(response) {

            $(".loader").addClass('hide');

            Swal.fire({

                position: 'top-center',

                icon: 'error',

                title: 'خطاء فى عملية الحذف',

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

