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

<form method="post" id="permission_form" enctype="multipart/form-data">
        @csrf
        <div class="row white-row">
            <div class="col-sm-12 col-lg-6 col-md-12">
				<div class="card-header">
					<h4 class="card-title" style="padding-bottom: 10px !important;padding-top: 5px;">
						<i class="fa fa-key" style="color:#4267B2"></i>
                        <a onclick="$('#salahiat1').toggle();">
                            &nbsp;{{trans('admin.permissions_list')}} expand
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
												<div class="form-group">
													<input type="hidden" id="pk_i_id" name="pk_i_id" value="1" />
													<div id="ana2">
													    <?php $currList=array();
                                                            foreach($allPer as $row){
                                                                if($row->fk_i_type==1){
                                                                    $temp=array();
                                                                    $child=array();
                                                                    $temp[]=$row;
                                                                    $temp[0]->children=array();
                                                                    foreach($allPer as $row1)
                                                                        if($row1->fk_i_parent_id==$row->pk_i_id)
                                                                        $child[]=$row1;
                                                                    $row->setAttribute('children', $child);
                                                                    $currList[]=$temp;
                                                                }
                                                            }
                                                            //dd($currList);
                                                            ?>
														<select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
                                                              @foreach($currList as $row)
															    <optgroup label="{{$row[0]->s_function_title}}">
                                                                @foreach($row[0]->children as $row1)
																<option value='{{$row1->s_function_url}}'  <?php echo ($row1->b_enabled==1)? 'selected':""; ?>> {{$row1->s_function_title}}</option>
                                                                @endforeach
                                                                </optgroup>
                                                             @endforeach
														</select>
													</div>
													</div>
												</div>
											</div>
										</div>
                                        <div class="form-actions" style="border-top:0px; padding-bottom:44px;">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary" id="saveBtn">{{trans('admin.save')}}  <i class="ft-thumbs-up position-right"></i></button>
                                                <button type="reset" onclick="resetFunction()" class="btn btn-warning"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
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


    $(document).ready(function (){
        $('#my_multi_select2').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      });
        $('#my_multi_select').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      });
    })
</script>




	<script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
	<!--<script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
    -->
<script>

var arrKey=new Array();
var arrVal=new Array();
$( function() {
    $( ".ac" ).autocomplete({
		source: 'emp_auto_complete',
		minLength: 2,

        select: function( event, ui ) {
            let emp_id = ui.item.id
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "emp_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
                $('#salahiat').show()
            $('#employee_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#JobNumber').val(response.info.job_Number);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#NickName').val(response.info.nick_name);
            $('#InternalPhone').val(response.info.InternalPhone);
            $('#EmailAddress').val(response.info.email);
            $("#DepartmentID").val(response.info.department_id);
            if(response.info.image != 'https://expand-archive.com/expand_repo/public'/*window.location.origin*/){
                $('#userProfileImg').attr('src', response.info.image);
            }else{
                $('#userProfileImg').attr('src', '{{asset("assets/images/ico/user.png")}}');
            }
            if(response.info.status == 'on'){
                $('#customCheck2').prop('checked', true);
            }
            $("#msgStatic").html(response.ArchiveCount);
            drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
                response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
                ,response.licFileArchiveCount
                ,response.licArchiveCount,response.copyToCount,response.linkToCount);
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.job_title);
            });
            $("select#JobType option")
                 .each(function() { this.selected = (this.text == response.job_type);
            });

            $("select#DirectManager option")
                 .each(function() { this.selected = (this.text == response.DirectManager);
            });
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.department_id);
            });
            $("select#CurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency);
            });
            $('#HiringDate').val(response.info.start_date);
            $('#Salary').val(response.info.salary);
            $('#vac_year').val(response.details.year);
            $('#vac_annual').val(response.details.balance);
            $('#emr_blanace').val(response.details.emergency);
            $('#username').val(response.info.username);
            $('#password').val(response.info.curr_pass);
            $('#AddressDetails').val(response.info.details);
            $('#Note').val(response.info.notes);
            $("select#CityID").val(response.info.city_id)
            $("select#area_data").val(response.info.area_id)
            $("select#area_data").trigger('change')
            $("select#region_data").val(response.info.region_id)
            console.log(response.per)

            $("#ana").html()
            
            ctrl=response.per;
            $("#ana").html(ctrl)
            $("#my_multi_select2").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
              selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
            }); 
                  
                  
                  
                    },
                    });
        }
	});
} );

<?php
$i=0;
foreach(config('global.permissions') as $name => $value)
{?>
	arrKey[<?php echo $i?>]='{{$name}}'
	arrVal[<?php echo $i?>]="@lang('admin.'.$name)"
	<?php  $i++; ?>
<?php }?>

function update($id)
{
    let emp_id = $id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "emp_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
            $('#employee_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#JobNumber').val(response.info.job_Number);
            if(response.info.status == 'on'){
                $('#customCheck2').prop('checked', true);
            }
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#NickName').val(response.info.nick_name);
            $('#InternalPhone').val(response.info.InternalPhone);
            $('#EmailAddress').val(response.info.email);
            $("#DepartmentID").val(response.info.department_id);
            $('#userProfileImg').attr('src', response.info.image);
            $("#msgStatic").html(response.ArchiveCount);
            drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
                response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
                ,response.licFileArchiveCount
                ,response.licArchiveCount,response.copyToCount,response.linkToCount);
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.job_title);
            });
            $("select#JobType option")
                 .each(function() { this.selected = (this.text == response.job_type);
            });

            $("select#DirectManager option")
                 .each(function() { this.selected = (this.text == response.DirectManager);
            });
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.department_id);
            });
            $("select#CurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency);
            });
            $('#HiringDate').val(response.info.start_date);
            $('#Salary').val(response.info.salary);
            $('#vac_year').val(response.details.year);
            $('#vac_annual').val(response.details.balance);
            $('#emr_blanace').val(response.details.emergency);
            $('#username').val(response.info.username);
            $('#password').val(response.info.curr_pass);
            $('#AddressDetails').val(response.info.details);
            $('#Note').val(response.info.notes);
            $("select#CityID").val(response.info.city_id)
            $("select#area_data").val(response.info.area_id)
            $("select#area_data").trigger('change')
            $("select#region_data").val(response.info.region_id)
            /*
            $("select#CityID option")
                 .each(function() { this.selected = (this.text == response.city);
            });
            $("select#TownID option")
                 .each(function() { this.selected = (this.text == response.area);
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.text == response.region);
            });*/

            $("#ana").html()
            
            ctrl=response.per;
            $("#ana").html(ctrl)
            $("#my_multi_select2").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
                selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
            });
                    },
                    });
}

$("#CityID").change(function () {
        $("#area_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "state",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var state_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#area_data").append(state_details);
            }
         },
        });
    });

    $("#area_data").change(function () {
        $("#region_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "area",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var region_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#region_data").append(region_details);
            }
         },
        });
    });


    $('#setting_form').submit(function(e) {
        $(".loader").removeClass('hide');

       e.preventDefault();
       let formData = new FormData(this);
            $( "#Name" ).removeClass( "error" );
            $( "#NationalID" ).removeClass( "error" );
            $( "#NickName" ).removeClass( "error" );
            $( "#DepartmentID" ).removeClass( "error" );
            $( "#Position" ).removeClass( "error" );
            $( "#HiringDate" ).removeClass( "error" );
            $( "#DirectManager" ).removeClass( "error" );
            $( "#JobType" ).removeClass( "error" );
            $( "#MobileNo1" ).removeClass( "error" );

       $.ajax({
          type:'POST',
          url: "store_employee",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".loader").addClass('hide');

            $('.wtbl').DataTable().ajax.reload();
             if (response) {
                $(".loader").addClass('hide');
			Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
            $('#userProfileImg').attr('src', '{{asset('assets/images/ico/user.png')}}');

               this.reset();
             }
           },
           error: function(response){
            $(".loader").addClass('hide');

            $("#Name").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#Name" ).removeClass( "error" );
                    }
                });
                $("#NationalID").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NationalID" ).removeClass( "error" );
                    }
                });
                $("#NickName").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NickName" ).removeClass( "error" );
                    }
                });
                $("#DepartmentID").on('change', function (e) {
                        $( "#DepartmentID" ).removeClass( "error" );
                });
                $("#Position").on('change', function (e) {
                        $( "#Position" ).removeClass( "error" );
                });
                $("#JobType").on('change', function (e) {
                        $( "#JobType" ).removeClass( "error" );
                });
                $("#DirectManager").on('change', function (e) {
                        $( "#DirectManager" ).removeClass( "error" );
                });
                $("#MobileNo1").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#MobileNo1" ).removeClass( "error" );
                    }
                });
                $("#HiringDate").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#HiringDate" ).removeClass( "error" );
                    }
                });

            if(response.responseJSON.errors.Name){
                $( "#Name" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NationalID){
                $( "#NationalID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NickName){
                $( "#NickName" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DepartmentID){
                $( "#DepartmentID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.Position){
                $( "#Position" ).addClass( "error" );
            }
            if(response.responseJSON.errors.JobType){
                $( "#JobType" ).addClass( "error" );
            }
            if(response.responseJSON.errors.HiringDate){
                $( "#HiringDate" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DirectManager){
                $( "#DirectManager" ).addClass( "error" );
            }
            if(response.responseJSON.errors.MobileNo1){
                $( "#MobileNo1" ).addClass( "error" );
            }

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




$(document).ready(function () {

    

    $('#permission_form').submit(function(e) {
        $(".loader").removeClass('hide');

       e.preventDefault();
       let formData = new FormData(this);

       $.ajax({
          type:'POST',
          url: "store_permission",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $(".loader").addClass('hide');

            $('.wtbl').DataTable().ajax.reload();
             if (response) {
                $(".loader").addClass('hide');
			Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
            $('#userProfileImg').attr('src', '{{asset('assets/images/ico/user.png')}}');

               this.reset();
             }
           },
           error: function(response){
            $(".loader").addClass('hide');

            $("#Name").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#Name" ).removeClass( "error" );
                    }
                });
                $("#NationalID").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NationalID" ).removeClass( "error" );
                    }
                });
                $("#NickName").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#NickName" ).removeClass( "error" );
                    }
                });
                $("#DepartmentID").on('change', function (e) {
                        $( "#DepartmentID" ).removeClass( "error" );
                });
                $("#Position").on('change', function (e) {
                        $( "#Position" ).removeClass( "error" );
                });
                $("#JobType").on('change', function (e) {
                        $( "#JobType" ).removeClass( "error" );
                });
                $("#DirectManager").on('change', function (e) {
                        $( "#DirectManager" ).removeClass( "error" );
                });
                $("#MobileNo1").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#MobileNo1" ).removeClass( "error" );
                    }
                });
                $("#HiringDate").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#HiringDate" ).removeClass( "error" );
                    }
                });

            if(response.responseJSON.errors.Name){
                $( "#Name" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NationalID){
                $( "#NationalID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NickName){
                $( "#NickName" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DepartmentID){
                $( "#DepartmentID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.Position){
                $( "#Position" ).addClass( "error" );
            }
            if(response.responseJSON.errors.JobType){
                $( "#JobType" ).addClass( "error" );
            }
            if(response.responseJSON.errors.HiringDate){
                $( "#HiringDate" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DirectManager){
                $( "#DirectManager" ).addClass( "error" );
            }
            if(response.responseJSON.errors.MobileNo1){
                $( "#MobileNo1" ).addClass( "error" );
            }

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



            $("#my_multi_select1").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>البنود الغير متاحة</b></div>",
              selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>البنود المتاحة</b></di>"
            });
            
            $("#my_multi_select2").multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
              selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
            });    
});
// selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>"+{{trans('admin.unavailable_per')}}+"</b></div>",
//   selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>"+{{trans('admin.available_per')}}+"</b></di>"
</script>
@endsection

