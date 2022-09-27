<div class="row">
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">
            <div class="form-group col-10" style="padding-left:0px;">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{trans('admin.city')}}
                    </span>
                </div>  
                <select id="city_id" name="city_id" type="text" class="form-control selectFullCorner city_id">
                    <option value=""> -- {{trans('admin.city')}} --</option>     
                    @foreach($city as $cit)
                        <option  value="{{$cit->id}}" {{$city_id==$cit->id?"selected":"" }} >  {{$cit->name}} </option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="ShowAddressModal($('#city_id').val(),'city_id','المدينة')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">
            <div class="form-group col-10" style="padding-left:0px;margin-left: -5px;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            {{trans('admin.state')}}
                        </span>
                    </div>  
                <select id="town_id" name="town_id" type="text" class="form-control selectFullCorner town_id">
                    <option value=""> -- {{trans('admin.state')}} -- </option>
                    @foreach($town as $tow)
                        <option  value="{{$tow->id}}" {{$town_id==$tow->id?"selected":"" }} >  {{$tow->name}} </option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="ShowAddressModal($('#city_id').val(),'town_id','البلدة')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">  
            <div class="form-group col-10" style="padding-left:0px;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            المنطقة
                        </span>
                    </div>  
                    <select id="region_id" name="region_id" type="text" class="form-control selectFullCorner region_id">
                        <option value=""> -- المنطقة --  </option>                                                                         
                        </select>
                    
                </div>
            </div>
            <div class="input-group-append col-2" onclick="ShowAddressModal($('#town_id').val(),'region_id','الحي')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="width: 98% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    {{trans('admin.address_details')}}
                    </span>
                </div>
                <textarea type="text" id="AddressDetails" class="form-control" 
                placeholder="{{trans('admin.address_details')}}" name="AddressDetails"
                    style="height: 40px;"></textarea>
                <div class="input-group-append hidden-xs hidden-sm">
                <span class="input-group-text input-group-text2" style="color:#ffffff">
                <i class="fa fa-external-link-alt"></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="width: 98% !important;">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        {{trans('admin.notes')}}
                        </span>
                </div>
                <textarea type="text" id="Note" class="form-control"
                    placeholder="{{trans('admin.notes')}}" name="Note" 
                    style="height: 40px;"></textarea>
                <div class="input-group-append hidden-xs hidden-sm">
                    <span class="input-group-text input-group-text2" style="color:#ffffff">
                    <i class="fa fa-external-link-alt"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    $('#city_id').on('change', function(){
        var city_id = $(this).val();
        if(city_id){
            $.ajax({
                type:'get',
                url:'getTownById',
                data:'city_id='+city_id,
                success:function(data){
                        fillIn='town_id';
                    if (data.length>0) {
                    $("." + fillIn).children().remove();
                    $("." + fillIn).append(new Option(" -- اختر البلدة -- ", ''));
				    for(i=0;i<data.length;i++)
				        if(i<data.length-1)
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
					    else
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
				}
				else
				{
				    $("." + fillIn).html(new Option(" -- اختر البلدة -- ", ''));
				    $(".region_id").html(new Option(" -- اختر الحي -- ", ''));

				}
                    // $('#state').html(html);
                    // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#town_id').children().remove();
            $('#region_id').children().remove();
        }
    });
    $('#town_id').on('change', function(){
        var town_id = $(this).val();
        if(town_id){
            $.ajax({
                type:'get',
                url:'getRegionById',
                data:'town_id='+town_id,
                success:function(data){
                    fillIn='region_id';
                    if (data.length>0) {
                    $("." + fillIn).children().remove();
                    $("." + fillIn).append(new Option(" -- اختر الحي -- ", ''));
				    for(i=0;i<data.length;i++)
				        if(i<data.length-1)
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
					    else
					    $("." + fillIn).append(new Option(data[i].name, data[i].id));
				}
				else
				{
				    $("." + fillIn).children().remove();
                    $("." + fillIn).append(new Option(" -- اختر الحي -- ", ''));
				}
                    // $('#state').html(html);
                    // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#town_id').html('<option value="">-- اختر البلدة --</option>');
            $('#region_id').html('<option value="">-- اختر الحي --</option>'); 
        }
    });
    
    $('#town_id').trigger('change');

});

    function drawAddress($city,$town,$region) {
        if($city){
            $.ajax({
                type:'get',
                url:'getCity',
                success:function(data){
                    console.log(data);
                        fillIn='city_id';
                    if (data.length>0) {
                    $("." + fillIn).children().remove();
                    $(".town_id").children().remove();
                    $("." + fillIn).append(new Option(" -- اختر المدينة -- ", ''));
				    for(i=0;i<data.length;i++)
				        if(data[i].id==$city)
				        {
				        $("." + fillIn).append(new Option(data[i].name, data[i].id,true,true));
			                let city_id = $city;
				            $.ajax({
                                type:'get',
                                url:'getTown',
                                data:'city_id='+city_id,
                                success:function(data){
                                    fillIn='town_id';
                                    if (data.length>0) {
                                    $("." + fillIn).children().remove();
                                    $(".region_id").children().remove();
                                    $(".region_id").append(new Option(" -- اختر المنطقة -- ", ''));
                                    $("." + fillIn).append(new Option(" -- اختر البلدة -- ", ''));
                				    for(i=0;i<data.length;i++)
            					        if(data[i].id==$town)
            					        {
            					            $("." + fillIn).append(new Option(data[i].name, data[i].id,true,true));
            					            let town_id = $town;
            					            $.ajax({
                                                type:'get',
                                                url:'getRegion',
                                                data:'town_id='+town_id,
                                                success:function(data){
                                                    fillIn='region_id';
                                                    if (data.length>0) {
                                                    $("." + fillIn).children().remove();
                                                    $("." + fillIn).append(new Option(" -- اختر المنطقة -- ", ''));
                                				    for(i=0;i<data.length;i++)
                            					        if(data[i].id==$region)
                            					        {
                            					        $("." + fillIn).append(new Option(data[i].name, data[i].id,true,true));
                            					        }
                            					        else
                            					        $("." + fillIn).append(new Option(data[i].name, data[i].id));
                                    				}
                                    				else
                                    				{
                                    				    $("." + fillIn).html(new Option(" -- اختر المنطقة -- ", ''));
                                    				}
                                                }
                                            });
            					        }
                					    else
            					        $("." + fillIn).append(new Option(data[i].name, data[i].id));
                    				}
                    				else
                    				{
                    				    $("." + fillIn).html(new Option(" -- اختر البلدة -- ", ''));
                    				}
                                }
                            });
				        }
				        else
				        $("." + fillIn).append(new Option(data[i].name, data[i].id));
    				}
    				else
    				{
    				    $("." + fillIn).html(new Option(" -- اختر المدينة -- ", ''));
    				}
                }
            });
        }
    }

    // $('#town_id').on('change', function(){
    //     var town_id = $(this).val();
    //     if(town_id){
    //         $.ajax({
    //             type:'get',
    //             url:'getRegionById',
    //             data:'town_id='+town_id,
    //             success:function(data){
    //                 fillIn='region_id';
    //                 if (data.length>0) {
    //                 $("." + fillIn).children().remove();
    //                 $("." + fillIn).append(new Option(" -- اختر الحي -- ", ''));
				//     for(i=0;i<data.length;i++)
				//         if(i<data.length-1)
				// 	    $("." + fillIn).append(new Option(data[i].name, data[i].id));
				// 	    else
				// 	    $("." + fillIn).append(new Option(data[i].name, data[i].id));
				// }
				// else
				// {
				//     $("." + fillIn).children().remove();
    //                 $("." + fillIn).append(new Option(" -- اختر الحي -- ", ''));
				// }
    //                 // $('#state').html(html);
    //                 // $('#city').html('<option value="">Select state first</option>'); 
    //             }
    //         }); 
    //     }else{
    //         $('#town_id').html('<option value="">-- اختر البلدة --</option>');
    //         $('#region_id').html('<option value="">-- اختر الحي --</option>'); 
    //     }
    // });
    
    // $('#town_id').trigger('change');


</script>