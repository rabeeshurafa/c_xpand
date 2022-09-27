
<div class="modal fade text-left" id="ConstantModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog2" role="document">
	  <div class="modal-content">
		<div class="modal-header modal-header2">
		  <h4 class="modal-title" id="myModalLabel1" style="color: #ffffff;"><span id="ConstantTitle"></span></h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="form-body">
			<div class="form-group">
				<div class="input-group" style="max-height: 200px; overflow: auto;">
					<table style="width:100%" class="detailsTB table">
						<tr>
							<th scope="col">#</th>
							<th scope="col">العنوان</th>
							<th scope="col"></th>
						</tr>
						<tbody id="Constantpop">

						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group" style="color:#EB844C">
				<span id="ConstantTitle1"></span> جديد: 
			</div>
			<form method="post" id="store-Constant" onsubmit="return false;" >
                @csrf
			<div class="form-group">

			  <input type="text" id="constantName" class="form-control" placeholder="" name="constantName">
			  <input type="hidden" id="constantID" name="constantID">
			  <input type="hidden" id="constantParentID"name="constantParentID">
			  <input type="hidden" id="listToRefresh" name="listToRefresh">
		  </div>
		  <div class="form-group" style="text-align:center">
			  <button type="submit" class="btn btn-info modalBtn"  >حفظ</button>
		  </div>
		</form>
		  </div>
		</div>
	  </div>
	</div>
</div>
<script>
    
$('#store-Constant').submit(function(e) {
	$(".loader").removeClass('hide');
	fillIn=$("#listToRefresh").val();
	console.log(fillIn)
	$("." + fillIn).children().remove();
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: "{{url('/ar/admin/SaveConstant')}}",
           data: formData,
           contentType: false,
           processData: false,
		    dataType:"json",
           success: function (data) {
	        console.log(data)
			$(".loader").addClass('hide');
				if (data.length>0) {
                    $("." + fillIn).html(new Option(" -- اختر -- ", ''));
				    for(i=0;i<data.length;i++)
				        if(i<data.length-1)
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
					    else
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
				}
				$(".loader").addClass('hide');
						//$(".form-actions").removeClass('hide');
						$("#constantName").val('')
						$("#constantID").val('')
						$("#ConstantModal").modal('hide');
           },
           error: function(response){
			$(".loader").addClass('hide');
            if(response.responseJSON.errors.s_name_ar1){
                $( "#constantName" ).addClass( "error" );
            }
          
           }
       });
  });
  
function ShowConstantModal(contid,ctrl,title){
    $(".loader").removeClass('hide');
    DrawConstantTable(contid)
    //$("#constantID").val(contid);
    $("#constantParentID").val(contid);
    $("#listToRefresh").val(ctrl);
    $("#contid").val(contid);
    $("#ConstantTitle").html(title);
    $("#ConstantTitle1").html(title);
    $("#ConstantModal").modal('show');
	$("#Constantpop").html('');
    $(".loader").addClass('hide');
}

function DrawConstantTable(id){
	var formData = {
		'id':id,
		_token: '{{csrf_token()}}',
	};
    
	$.ajax({
		url:'{{url('/ar/admin/getConstantByID')}}',
		type: 'POST',
		data: formData,
		dataType:"json",
		async: true,
		success: function (data) {
			i=1;
			row='';
			for(j=0; j<data.length;j++) {
				row += '<tr>'
					+ '<td width="20px">'
					+ i
					+ '</td>'
					+ '<td>'
					+ data[j].name
					+ '</td>'
					+ '<td width="40px">'
					+ '<i class="fa fa-edit" id="trash" aria-hidden="true" style="color:#1E9FF2;padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="editConstantObj('+data[j].id+',\''+data[j].name+'\')"></i>'
					+ '<i class="fa fa-trash" id="trash" aria-hidden="true" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="deleteConstantObj('+data[j].id+')"></i>'
					+ '</td>'
					+ '</tr>'
				i++
			}

			$("#Constantpop").html(row);
		},
		error:function(){
			$(".alert-success").addClass("hide");
			// $(".alert-danger").removeClass('hide');
			$("#errMsg").text(data.status.msg)
			$(".loader").addClass('hide');
			//$(".form-actions").removeClass('hide');
		},
		/*cache: false,
		 contentType: false,
		 processData: false*/
	});
}


function editConstantObj(constID,constName){
    $("#constantID").val(constID)
    $("#constantName").val(constName)
}
function deleteConstantObj(id){
    if(!confirm('هل تريد حذف السجل'))
        return;
    $("#constantID").val(id)
    fillIn=$("#listToRefresh").val();
	$("." + fillIn).children().remove();
   let formData = new FormData($("#store-Constant")[0]);
   $.ajax({
      type:'POST',
      url: "{{url('/ar/admin/deleteConstant')}}",
       data: formData,
       contentType: false,
       processData: false,
       success: function (data) {
		$(".loader").addClass('hide');
		fillIn=$("#listToRefresh").val()
			if (data.length>0) {
                    $("." + fillIn).html(new Option(" -- اختر -- ", ''));
				    for(i=0;i<data.length;i++)
				        if(i<data.length-1)
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
					    else
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
				}
			$(".loader").addClass('hide');
			//$(".form-actions").removeClass('hide');
			$("#constantName").val('')
			$("#constantID").val('')
			$("#ConstantModal").modal('hide');
       },
       error: function(response){
		$(".loader").addClass('hide');
        if(response.responseJSON.errors.s_name_ar1){
            $( "#s_name_ar1" ).addClass( "error" );
        }
      
       }
   });
}

</script>