
<div class="modal fade text-left" id="AddressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
						<tbody id="Addresspop">

						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group" style="color:#EB844C">
				<span id="ConstantTitle1"></span> جديد: 
			</div>
			<form method="post" id="store-Address" onsubmit="return false;" >
                @csrf
			<div class="form-group">

			  <input type="text" id="AConstantName" class="form-control" placeholder="" name="AConstantName">
			  <input type="hidden" id="constantID" name="constantID">
			  <input type="hidden" id="constantParentID"name="constantParentID">
			  <input type="hidden" id="listToRefresh" name="listToRefresh">
			  <input type="hidden" id="city_id_p" name="city_id_p">
			  <input type="hidden" id="town_id_p" name="town_id_p">
			  <input type="hidden" id="region_id_p" name="region_id_p">
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
    
$('#store-Address').submit(function(e) {
	$(".loader").removeClass('hide');
	fillIn=$("#listToRefresh").val();
	if(fillIn=="city_id")
        url_ajax="store_city"
    if(fillIn=="town_id")
        url_ajax="store_Town"
    if(fillIn=="region_id")
        url_ajax="store_Region"
	console.log(fillIn)
	$("." + fillIn).children().remove();
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: `${url_ajax}`,
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
						$("#AConstantName").val('')
						$("#AddressModal").modal('hide');
           },
           error: function(response){
			$(".loader").addClass('hide');
            if(response.responseJSON.errors.s_name_ar1){
                $( "#AConstantName" ).addClass( "error" );
            }
          
           }
       });
  });
  
function ShowAddressModal(contid,ctrl,title){
    $(".loader").removeClass('hide');
    if(ctrl=="town_id")
        $("#city_id_p").val(contid);
    if(ctrl=="region_id")
        $("#town_id_p").val(contid);
    DrawConstantTable1(ctrl)
    // $("#constantID").val(contid);
    $("#constantParentID").val(contid);
    $("#listToRefresh").val(ctrl);
    $("#contid").val(contid);
    console.log($("#AConstantName").html());
    $("#AConstantName").val('')
    $("#AConstantName").html('')
    $("#ConstantTitle").html(title);
    $("#ConstantTitle1").html(title);
    $("#AddressModal").modal('show');
	$("#Addresspop").html('');
    $(".loader").addClass('hide');
}

function DrawConstantTable1(ctrl){
	var formData = {
	    city_id:$("#city_id_p").val(),
	    town_id:$("#town_id_p").val(),
		_token: '{{csrf_token()}}',
	};
	if(ctrl=="city_id")
        url_ajax='getCity';
    if(ctrl=="town_id")
        url_ajax='getTown';
    if(ctrl=="region_id")
        url_ajax='getRegion';
	$.ajax({
		url:`${url_ajax}`,
		type: 'get',
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
					+ '<i class="fa fa-edit" id="trash" aria-hidden="true" style="color:#1E9FF2;padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="editConstantObj1('+data[j].id+',\''+data[j].name+'\',\''+ctrl+'\')"></i>'
					+ '<i class="fa fa-trash" id="trash" aria-hidden="true" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;" onclick="deleteConstantObj1('+data[j].id+',\''+ctrl+'\')"></i>'
					+ '</td>'
					+ '</tr>'
				i++
			}

			$("#Addresspop").html(row);
		},
		error:function(){
			$(".alert-success").addClass("hide");
			$("#errMsg").text(data.status.msg)
			$(".loader").addClass('hide');
		},
		/*cache: false,
		 contentType: false,
		 processData: false*/
	});
}


function editConstantObj1(constID,constName,ctrl){
    if(ctrl=="city_id")
    $("#city_id_p").val(constID)
    if(ctrl=="town_id")
    $("#town_id_p").val(constID)
    if(ctrl=="region_id")
    $("#region_id_p").val(constID)
    
    $("#AConstantName").val(constName)
}
// delete_region
function deleteConstantObj1(id,ctrl){
    if(!confirm('هل تريد حذف السجل'))
        return;
	if(ctrl=="city_id")
    $("#city_id_p").val(id)
    if(ctrl=="town_id")
    $("#town_id_p").val(id)
    if(ctrl=="region_id")
    $("#region_id_p").val(id)
    fillIn=$("#listToRefresh").val();
	$("." + fillIn).children().remove();
	
	var formData = {
	    city_id:$("#city_id_p").val(),
	    town_id:$("#town_id_p").val(),
	    region_id:$("#region_id_p").val(),
	    tabel:ctrl,
		_token: '{{csrf_token()}}',
	};
   $.ajax({
          type:'POST',
          url: 'delete_region',
           data: formData,
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
						$("#AConstantName").val('')
						$("#AddressModal").modal('hide');
           },
           error: function(response){
			$(".loader").addClass('hide');
            if(response.responseJSON.errors.s_name_ar1){
                $( "#AConstantName" ).addClass( "error" );
            }
          
           }
       });
}

</script>