<div class="modal fade text-left" id="WaterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel1"> 
              {{trans('admin.water_subscription')}}  
              (<span id="waterCustomerName"></span>)
            </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body_water">
                
                
                    
            </div>
        </div>
    </div>
</div>
<script>
function getWater($id)
{
    
    let subscriber_id = $id;
    $.ajax({
    type: 'get', // the method (could be GET btw)
    url: "water_info_byUser",

        data: {
            subscriber_id: subscriber_id,
        },
        success:function(response){
            template=""
            count = 0;
            $('.modal-body_water').html('');
            if(response.info)
            {
                response.info.forEach(water => {
                    count++;
                    
                    template+=' <div class="card-content collapse show" >'

                                +'<div class="card-body" style="padding-bottom: 0px;">'

                                    +'<div class="form-body">'

                                    + '<div class="row">'

                                        +    '<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +      "{{trans('admin.building_lic_num')}}" +':'  

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     (water.licNo??'')

                                        + '</span>'
                                        
                                    + '</div>'

                                    + '<div class="row">'

                                        +    '<div class="col-sm-12">'

                                            +    '<div class="form-group">'
                                                +   '<input type="hidden" id="waterId" name="waterId" value="'+water.id+'">'
                                                +   ' <table style="width:100%; margin-top: -10px; " class="detailsTB table etbl">'

                                                    +'<tr>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"{{trans('admin.subscription_num')}}"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"{{trans('admin.subscription_date')}}"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"{{trans('admin.subscription_type')}}"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"{{trans('admin.conter_type')}}"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"{{trans('admin.payment_method')}}"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"{{trans('admin.subscription_place_disc')}}"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"{{trans('admin.status')}}"+'</th>'
                                                        // +'<th scope="col" style="text-align: right !important;"></th>'
                                                    +'</tr>'
                                                    +'<tr>'
                                                        +'<td style="text-align: right !important;">'+(water.subscription_no??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(water.subscription_date??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(water.subscription_Type_name??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(water.counter_Type_name??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(water.payType_name??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(water.placeDesc??'')+'</td>'
                                                        +'<td style="text-align: right !important;">فعال</td>'
                                                        // +'<td style="text-align: right !important;"><a onclick="deleteObj(11483,2);"><i class="fa fa-trash"></i></a></td>'
                                                    +'</tr>'
                                                    // +'<tr>'
                                                    //     +'<td colspan="12" style="text-align: right !important;">'+
                                                    //         '<span style="color: #ff9149;">'+"{{trans('admin.notes')}}"+': '
                                                    //         +'</span>'
                                                    //     +'</td>'
                                                    // +'</tr>'
                                                +    '</table>'

                                            +    '</div>'

                                        +    '</div>'

                                    +   '</div>'

                                +  '</div>'

                                +'</div>'

                                +'</div>'
                });
            }
            else {
                template += "<div> لا يوجد لدى المشترك اشتراك مياه</div>"
            }
            $("#user_name").html("("+$('#formDataNameAR').val()+")");
            $("#waterCount").html("("+count+")");
            $('.modal-body_water').append(template);

        },
    });
}
</script>

