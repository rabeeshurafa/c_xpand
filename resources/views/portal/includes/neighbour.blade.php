<style>
    .detailsTB th {
    color: #ffffff !important;
}
</style>

<div class="row" >
    <div class="col-md attachs-section" style="margin-left:25px; margin-right: 25px ">
        <img src="https://db.expand.ps/images/neighbor.png" width="40" height="40">
        <span class="attach-header">{{"بيانات الجيران"}}</span>
    </div>
</div>
<div class="row" style="padding-right: 25px; padding-left: 25px">
    <div class="col-md-12">
        <div class="form-group">
            <table style="width:100%; margin-top: -10px; " class="detailsTB table">
                <tbody><tr>
                    <th scope="col" width="200px">{{"الاسم"}}</th>
                    <th scope="col" width="120px">{{"رقم الهوية"}}</th>
                    <th scope="col" width="120px">{{"الجوال"}}</th>
                    <th scope="col">{{"الإتجاه"}}</th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="NameAR" name="NameARList[]" class="form-control alphaFeild cac ui-autocomplete-input" placeholder="الاسم" autocomplete="off">
                        <input type="hidden" name="NeighborID" id="NeighborIDList[]">
                    </td>
                    <td>
                        <input type="text" id="NNationalID" name="NationalIDList[]" maxlength="9" minlength="9" class="form-control numFeild" placeholder="ID No.">
                    </td>
                    <td>
                        <input type="text" id="NMobileNo1" name="MobileNo1List[]" maxlength="10" minlength="10" class="form-control numFeild" placeholder="0590000000" aria-describedby="basic-addon1">
                     </td>
                    <td>
                        <input type="text" id="s_side" name="s_sideList[]" class="form-control " placeholder="" aria-describedby="basic-addon1" >
                     </td>
                    <td>
                        <div class="input-group-append" style="margin-left: 0px !important" onclick="CopyRec()">
                      <span class="input-group-text input-group-text2" style="margin-left: 0;">
                          <i class="fa fa-plus-circle" id="plusElement2"></i>
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

<script>

$(document).ready(function () {

        $( "#NameAR" ).autocomplete({
    		source:'subscribe_auto_complete',
    		minLength: 1,
            select: function( event, ui ) {
                // $("#subscriber_id").val(ui.item.id)
                getNData(ui.item.id)
    		}
    	});
    
    });

    function getNData(id){
    
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')

            }

        });
    formData={'id':id}
       $.ajax({
          type:'POST',
          url: "appCustomer",
           data: formData,
           /*contentType: false,
           processData: false,*/
           success: (response) => {
            //  console.log(response);
             $('#NameAR').val(response.name);
             $('#NNationalID').val(response.national_id);
             $('#NMobileNo1').val(response.phone_one??response.phone_two);
             

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

    i=3;
    function CopyRec(){
        //console.log($("#myonoffswitchcol1").prop("checked")==true);return;
        row='<tr>'
            +'<td>'
            +$("#NameAR").val()
            +'		<input type="hidden" name="NameARList[]" value="'+$("#NameAR").val()+'" >'
            +'</td>'
            +'<td>'
            +'	'+$("#NNationalID").val()
            +'		<input type="hidden" name="NationalIDList[]" value="'+$("#NNationalID").val()+'" >'
            +'</td>'
            +'<td>'
            +'	'+$("#NMobileNo1").val()
            +'		<input type="hidden" name="MobileNo1List[]" value="'+$("#NMobileNo1").val()+'" >'
            +'		<input type="hidden" name="NeighborIDList[]" value="'+$("#NeighborID").val()+'" >'
            +'</td>'
            +'<td>'
            +'	'+$("#s_side").val()
            +'		<input type="hidden" name="s_sideList[]" value="'+$("#s_side").val()+'" >'
            +'</td>';
        row+='	<td>'
            +'	<div class="input-group-append" style="margin-left: 0px !important" onclick="$(this).parent().parent().remove()">'
            +'	<span class="input-group-text input-group-text2" style="margin-left: 0;" >'
            +'	<i class="fa fa-trash" id="plusElement2"></i>'
            +'	</span>'
            +'	</div>'
            +'	</td>'
            +'</tr>';
        $("#subTask").append(row)
        i++
        $("#NameAR").val('');
        $("#NNationalID").val('');
        $("#NMobileNo1").val('');
        $("#NameAR").focus();
    }


</script>
