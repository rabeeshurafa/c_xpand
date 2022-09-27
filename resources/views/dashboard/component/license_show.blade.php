<div class="modal fade text-left" id="licModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel1"> 
              {{trans('admin.building_permits')}}  <span id="user_name"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body_licence">
                
                
                    
            </div>
        </div>
    </div>
</div>
<script>
function getLic($id)
{
    
    let subscriber_id = $id;
    $.ajax({
    type: 'get', // the method (could be GET btw)
    url: "license_info_byUser",

        data: {
            subscriber_id: subscriber_id,
        },
        success:function(response){
            template=""
            count = 0;
            $('.modal-body_licence').html('');
            if(response.info.length>0)
            {
                response.info.forEach(licence => {
                    count++;
                    template+=' <div class="card-content collapse show" >'

                                +'<div class="card-body" style="padding-bottom: 0px;">'

                                    +'<div class="form-body">'

                                    + '<div class="row">'

                                        +'<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +      "{{trans('admin.building_lic_num')}}" + ': '

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     licence.licNo

                                        + '</span>'
                                        +'<span>&nbsp; &nbsp; &nbsp;</span>'
                                        +'<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +      "{{trans('admin.purpose_use')}}" +':  '

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     (licence.use_desc??'')

                                        + '</span>'
                                        +'<span>&nbsp; &nbsp; &nbsp;</span>'
                                        +'<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +      "رقم ملف الترخيص" +':  '

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     (licence.fileNo??'')

                                        + '</span>'
                                        +'<span>&nbsp; &nbsp; &nbsp;</span>'
                                        +'<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +      "تاريخ فتح الملف" +':  '

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     (licence.license_date??'')

                                        + '</span>'
                                        +'<span>&nbsp; &nbsp; &nbsp;</span>'
                                        +'<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +     "الموقع" +':  '

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     (licence.site??'')

                                        + '</span>'
                                        +'<span>&nbsp; &nbsp; &nbsp;</span>'
                                        +'<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +     "رقم الخصة" +':  '

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     (licence.licNo??'')

                                        + '</span>'
                                        +'<span>&nbsp; &nbsp; &nbsp;</span>'
                                        +'<span class="" id="basic-addon1" style="color:#4267B2; padding-right: 20px; padding-bottom: 20px;">'

                                        +     "الغاية من الإستعمال " +':  '

                                        + '</span>'
                                        +    '<span class="" id="basic-addon1" style="color:#4267B2">'

                                        +     (licence.use_desc??'')

                                        + '</span>'
                                        
                                    + '</div>'

                                    + '<div class="row">'

                                        +    '<div class="col-sm-12">'

                                            +    '<div class="form-group">'
                                                +   '<input type="hidden" id="licenceId" name="licenceId" value="'+licence.id+'">'
                                                +   ' <table style="width:100%; margin-top: -10px; " class="detailsTB table etbl">'

                                                    +'<tr>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"رقم القطعة مالية"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"رقم القطعة طابو"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"رقم الحوض مالية"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"رقم الحوض طابو"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;">'+"المساحة المرخصة"+'</th>'
                                                        +'<th scope="col" style="text-align: right !important;"> مساحة الارض</th>'
                                                        +'<th scope="col" style="text-align: right !important;">اوصاف البناء </th>'
                                                        +'<th scope="col" style="text-align: right !important;"> رسوم الترخيص</th>'
                                                        +'<th scope="col" style="text-align: right !important;"> المدفوع </th>'
                                                        // +'<th scope="col" style="text-align: right !important;">اوصاف البناء</th>'
                                                        +'<th scope="col" style="text-align: right !important;">الباقى</th>'
                                                        +'<th scope="col" style="text-align: right !important;"></th>'
                                                    +'</tr>'
                                                    +'<tr>'
                                                        +'<td style="text-align: right !important;">'+(licence.peiceNo??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.peiceNoTabo??"")+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.hodNo??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.hod_tapo_No??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.licenseArea??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.allArea??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.building_desc??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.fees??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.paid_up??'')+'</td>'
                                                        // +'<td style="text-align: right !important;">'+(licence.building_desc??'')+'</td>'
                                                        +'<td style="text-align: right !important;">'+(licence.rest??'')+'</td>'
                                                        +'<td style="text-align: right !important;"></td>'
                                                    +'</tr>'
                                                    +'<tr>'
                                                        +'<td colspan="12" style="text-align: right !important;">'
                                                        +'<span style="color: #ff9149;">ملاحظات: '
                                                        +(licence.notes??'')
                                                            +'</span>'
                                                        +'</td>'
                                                    +'</tr>'
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
                template += "<div> لا يوجد لدى المشترك رخص بناء</div>"
            }
            $("#user_name").html("("+$('#formDataNameAR').val()+")");
        $("#licCount").html("("+count+")");
        $('.modal-body_licence').append(template);

        },
    });
}
</script>

