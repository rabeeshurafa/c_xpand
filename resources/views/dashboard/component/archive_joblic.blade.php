<div class="modal fade text-left" id="joblicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel1">{{trans('admin.jobLic')}}  <span id=""></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="form-body">
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <table width="100%" class="detailsTB table jobLic_table">
                                    <thead>
                                    <tr>
                                    <th width="30px">#</th>
                                    <th width="50px">{{trans('archive.lic_num')}}</th>
                                    <th width="200px">{{trans('admin.business_name')}}</th>
                                    <th width="80px">{{trans('admin.start_date')}} </th>
                                    <th width="80px">{{trans('admin.end_date')}} </th>
                                    <th width="60px"> {{trans('admin.craft_type')}} </th>
                                    <th width="130px">{{trans('archive.attach')}} </th>
                                    </tr>
                                </thead>
                                <tbody id="jobLic_list">
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
<script>

function drawTableJoblic($joblic)
{   
     if ( $.fn.DataTable.isDataTable( '.jobLic_table' ) ) {
            $(".jobLic_table").dataTable().fnDestroy();
            $('#jobLic_list').empty();
        }
        var p=1;
        
        var typeArray = { "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'}; 
        
        $joblic.forEach(archive => {
            console.log(archive);
            $row="<tr>"+
                "<td>"+p+"</td>"+
                "<td>"+(archive.license_number??'')+"</td>"+
                "<td>"+(archive.trade_name??'')+"</td>"+
                "<td>"+(archive.start_date??'')+"</td>"+
                "<td>"+(archive.expiry_ate??'')+"</td>"+
                "<td>"+(archive.craft_type==null?'':archive.craft_type.name)+"</td>"+
                "<td>";
                    attach='';
                    if(archive.files){
                    var j=0;
                    for(j=0;j<archive.files.length;j++){
                        shortCutName=archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=archive.files[j].url;
                        if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-12 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $row += attach;
                    var attach='';
                }

                $row += "</td></tr>";
            $('#jobLic_list').append($row)
            p++;
           
        });
        $('.jobLic_table').DataTable({
        dom: 'Bfltip',
            buttons: [
                {
                    extend: 'excel',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'excel',
                        src:'{{asset('assets/images/ico/excel.png')}}',
                        style: 'cursor:pointer; height: 32px;',
                    },

                },
                {
                    extend: 'print',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'print',
                        src:'{{asset('assets/images/ico/Printer.png')}} ',
                        style: 'cursor:pointer;height: 32px;',
                        class:"fa fa-print"
                    },
                    customize: function ( win ) {
                  
 
                    $(win.document.body).find( 'table' ).find('tbody')
                        .css( 'font-size', '20pt' );
                    }
                },
                ],
            
            "language": {
                        "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                        "sLoadingRecords": "جارٍ التحميل...",
                        "sProcessing":   "جارٍ التحميل...",
                        "sLengthMenu":   "أظهر _MENU_ مدخلات",
                        "sZeroRecords":  "لم يعثر على أية سجلات",
                        "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sInfoPostFix":  "",
                        "sSearch":       "ابحث:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "الأول",
                            "sPrevious": "السابق",
                            "sNext":     "التالي",
                            "sLast":     "الأخير"
                        },
                        "oAria": {
                            "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                        }
                    }
            });
}
</script>

