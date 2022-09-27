<div class="modal fade text-left" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">

    <div class="modal-dialog"  role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel1">{{trans('admin.sub_archives')}}
                (<span id="ArchModalName"></span>) 
                            </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="form-body">

                    <div class="row DisabledItem">

                        <div class="col-sm-12">

                            <div class="form-group">

                                <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">
                                    
                                    @can('subscriberOutArchive')
									<li class="nav-item">

										<a class="nav-link active"  style="color: #0073AA;" id="base-tab8" data-toggle="tab" aria-controls="ctab8" href="#ctab8" aria-expanded="true">
                                        <b>
                                            {{trans('archive.out_box')}}
											(<span id="ctabCnt8"></span>) 

										</b></a>

									</li>
									@endcan
									
									@can('subscriberInArchive')
									<li class="nav-item">

										<a class="nav-link" id="base-tab10" style="color: #0073AA;" data-toggle="tab" aria-controls="ctab10" href="#ctab10" aria-expanded="false">
                                        <b>
                                           {{trans('archive.in_box')}}
											(<span id="ctabCnt10"></span>) 

										</b></a>

									</li>
									@endcan
									
									@can('subscriberCert')
									<li class="nav-item">

										<a class="nav-link"  style="color: #0073AA;" id="base-tab12" data-toggle="tab" aria-controls="ctab12" href="#ctab12" aria-expanded="false">
                                        <b>
                                            الشهادات / مراسلات خارجية
											(<span id="ctabCnt12"></span>) 

										</b></a>

									</li>
									@endcan
									
									@can('subscriberLicArchive')
									<li class="nav-item">

										<a class="nav-link" id="base-tab7" style="color: #0073AA;" data-toggle="tab" aria-controls="ctab7" href="#ctab7" aria-expanded="false">
                                        <b>
                                            {{trans('archive.lic_archive')}}
											(<span id="ctabCnt7"></span>) 

										</b></a>

									</li>
                                    @endcan
                                    
                                    @can('subscriberCopyArchive')
									<li class="nav-item">

										<a class="nav-link" id="base-tab11" style="color: #0073AA;" data-toggle="tab" aria-controls="ctab11" href="#ctab11" aria-expanded="false">
                                        <b>
                                            {{trans('archive.copy_to')}}
											(<span id="ctabCnt11"></span>) 

										</b></a>

									</li>
									@endcan
									
									@can('subscriberJalArchive')
									<li class="nav-item">

										<a class="nav-link" id="base-tab5" style="color: #0073AA;" data-toggle="tab" aria-controls="ctab5" href="#ctab5" aria-expanded="false">
                                        <b>
                                           {{trans('archive.meeting_archive')}}
											(<span id="ctabCnt5"></span>) 

										</b></a>

									</li>
									@endcan
									
									@can('subscriberOtherArchive')
									<li class="nav-item">

										<a class="nav-link" id="base-tab6" style="color: #0073AA;" data-toggle="tab" aria-controls="ctab6" href="#ctab6" aria-expanded="false">
                                        <b>
                                           {{trans('archive.documents')}}
											(<span id="ctabCnt6"></span>) 

										</b></a>

									</li>
									@endcan
									
									@can('subscriberContractArchive')
									<li class="nav-item">

										<a class="nav-link" id="base-tab9" style="color: #0073AA;" data-toggle="tab" aria-controls="ctab9" href="#ctab9" aria-expanded="false">
                                        <b>
                                        
                                            {{trans('archive.dep_archive')}}
											(<span id="ctabCnt9"></span>)
                                        </b></a>

									</li>
									@endcan
								</ul>

                                <div class="tab-content px-1 pt-1" style="margin-top:0px !important ;">

                                    <div role="tabpanel" class="tab-pane active" id="ctab8" aria-expanded="true" aria-labelledby="base-tab8">

                                        <p>

                                            <table style="width:100%; margin-top: 10px;direction: rtl;" id="archivetbl" class="detailsTB table hdrTbl1 archivetbl" >

                                                <thead>

                                                    <tr>

                                                        <th scope="col" style="text-align: right;color:#ffffff; width: 10px;">#</th>

                                                        <th scope="col"  style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                        
                                                        {{trans('archive.archive_No')}}  </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.date')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.title_name')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.copy_to')}} </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.created_by')}} </th>
                                                        
                                                        <th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.attach')}}</th>

                                                    </tr>

                                                </thead>

                                            

                                        </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane"  id="ctab10" aria-labelledby="base-tab10">

                                        <p>

                                            <table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 inArchivetbl" >

                                                <thead>

                                                    <tr>

                                                        <th scope="col" style="text-align: right;color:#ffffff; width: 10px;">#</th>

                                                        <th scope="col"  style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                        
                                                        {{trans('archive.archive_No')}}  </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.date')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.title_name')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.copy_to')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.created_by')}} </th>
                                                        
                                                        <th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.attach')}}</th>

                                                    </tr>

                                                </thead>

                                            

                                            </table>

                                        </p>

                                    </div>
                                    
                                    
                                    <div class="tab-pane"  id="ctab12" aria-labelledby="base-tab12">

                                        <p>

                                            <table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 certArchivetbl" >

                                                <thead>

                                                    <tr>

                                                        <th scope="col" style="text-align: right;color:#ffffff; width: 10px;">#</th>

                                                        <th scope="col"  style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                        
                                                        اسم الشهادة  </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        تاريخ الاصدار</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.created_by')}} </th>

                                                        <th scope="col" style="width:50px;text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        طباعة</th>

                                                    </tr>

                                                </thead>

                                            

                                            </table>

                                        </p>

                                    </div>
                                    
                                    <div class="tab-pane"  id="ctab7" aria-labelledby="base-tab7">

                                        <p>

                                            <table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 licArchivetbl" >

                                                <thead>

                                                    <tr>

                                                        <th scope="col" style="text-align: right;color:#ffffff; width: 10px;">#</th>

                                                        <th scope="col"  style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                        
                                                          {{trans('archive.licfile_num')}} </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.lic_num')}} </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                         {{trans('archive.pelvis_number')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                         {{trans('admin.Part_number_tabo')}}  </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('admin.purpose_use')}}   </th>
                                                        
                                                        <th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.attach')}}</th>

                                                    </tr>

                                                </thead>

                                            

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane"  id="ctab11" aria-labelledby="base-tab11">

                                        <p>

                                            <table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 copyArchivetbl" >

                                                <thead>

                                                    <tr>

                                                        <th scope="col" style="text-align: right;color:#ffffff; width: 10px;">#</th>

                                                        <th scope="col"  style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                        
                                                        {{trans('archive.archive_No')}}  </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.title_name')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                        {{trans('archive.type')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                        {{trans('archive.original_document_linked')}} </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.date')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.created_by')}} </th>
                                                        
                                                        <th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.attach')}}</th>

                                                    </tr>

                                                </thead>

                                            

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane"  id="ctab5" aria-labelledby="base-tab5">

                                        <p>

                                            <table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 jalArchivetbl" >

                                                <thead>

                                                    <tr>

                                                        <th scope="col" style="text-align: right;color:#ffffff; width: 10px;">#</th>

                                                        <th scope="col"  style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                        
                                                        {{trans('archive.meeting_name')}}  </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.meeting_number')}}  </th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                        {{trans('archive.topic')}}</th>

                                                        <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                        {{trans('archive.decision')}} </th>
                                                        
                                                        <th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.attach')}}</th>

                                                    </tr>

                                                </thead>

                                            

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane"  id="ctab6" aria-labelledby="base-tab6">

                                        <p>

                                            <table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 other" >

                                                <thead>

                                                    <tr>

                                                        <th scope="col" style="width:10px !important; text-align: right;color:#ffffff;">#</th>

                                                        {{--<th scope="col"  style="width:50px !important; text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                        
                                                        {{trans('archive.archive_No')}}  </th>--}}

                                                        <th scope="col" style="width:100px !important; text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                        
                                                        {{trans('archive.title_name')}} </th>

                                                        <th scope="col" style="width:50px !important; text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                        {{trans('archive.type')}}</th>

                                                        <th scope="col" style="width:50px !important;text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                        {{trans('archive.date')}}</th>

                                                        <th scope="col" style="width:50px !important;text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                        {{trans('archive.created_by')}} </th>
                                                        
                                                        <th scope="col" style="width:200px !important;text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">

                                                        {{trans('archive.attach')}}</th>

                                                    </tr>

                                                </thead>

                                            

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane" id="ctab9" aria-labelledby="base-tab9">

                                        <p>



                                        <table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 lawtbl" >

                                            <thead>

                                                <tr>

                                                    <th scope="col" style="text-align: right;color:#ffffff; width: 10px;">#</th>

                                                    <th scope="col"  style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff; width: 150px;">
                                                    
                                                     {{trans('archive.archive_No')}}   </th>

                                                    <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">

                                                    {{trans('archive.date')}}</th>

                                                    <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                    {{trans('archive.title_name')}}</th>

                                                    <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                    {{trans('archive.copy_to')}} </th>

                                                    <th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                                                    
                                                    {{trans('archive.created_by')}} </th>
                                                    
                                                    <th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">

                                                    {{trans('archive.attach')}}</th>

                                                </tr>

                                            </thead>


                                        </table>

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

    function getOutArchive($id,$outArchiveCount){
       
        var table = $('.archivetbl').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscriberOutArchive') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
            columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        {data:'serisal'},
                        {data:'date'},
                        {data:'title'},
                        
                        {
                            data: null, 
                            render:function(data,row,type){
                                $copyto ='';
                                if(data.copy_to[0]!=null){
                                    for($i=0;$i<data.copy_to.length;$i++)
                                        $copyto += data.copy_to[$i].name+' , ';
                                }
                                return $copyto;
                            },
                            name:'name',
                        
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                $admin ='';
                                if(data.admin!=null){
                                    $admin = data.admin.nick_name;
                                }
                                return $admin;
                            },
                            name:'name',
                        
                        },
                        
                        {
                            data: null,
                            
                            render:function(data,row,type){
                                if(data.files.length>0){ 
                                    var i=1;
                                    $actionBtn="<div class='row' style='margin-left:0px;'>";
                                    data.files.forEach(file => {
                                        shortCutName=file.real_name;
                                        shortCutName=shortCutName.substring(0, 20);
                                        urlfile='{{ asset('') }}';
                                        urlfile+=file.url;
                                        if(file.extension=="jpg"||file.extension=="png")
                                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                                        else if(file.extension=="pdf")
                                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                        else if(file.extension=="excel"||file.extension=="xsc")
                                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                        else
                                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                            +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                    });
                                    $actionBtn += '</div>';
                                    return $actionBtn;
                                }
                                else{return '';}
                            },
                            name:'fileIDS',                    
                        },
                    
                    ],

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
        
        $('#ctabCnt8').html($outArchiveCount);
        
    }

    function getInArchive($id,$inArchiveCount){

        var table = $('.inArchivetbl').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscriberInArchive') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
            columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        {data:'serisal'},
                        {data:'date'},
                        {data:'title'},
                        
                        {
                            data: null, 
                            render:function(data,row,type){
                                $copyto ='';
                                if(data.copy_to[0]!=null){
                                    for($i=0;$i<data.copy_to.length;$i++)
                                        $copyto += data.copy_to[$i].name+' , ';
                                }
                                return $copyto;
                            },
                            name:'name',
                        
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                $admin ='';
                                if(data.admin!=null){
                                    $admin = data.admin.nick_name;
                                }
                                return $admin;
                            },
                            name:'name',
                        
                        },
                        
                        {
                            data: null,
                            
                            render:function(data,row,type){
                                if(data.files.length>0){ 
                                    var i=1;
                                    $actionBtn="<div class='row' style='margin-left:0px;'>";
                                    data.files.forEach(file => {
                                        shortCutName=file.real_name;
                                        shortCutName=shortCutName.substring(0, 20);
                                        urlfile='{{ asset('') }}';
                                        urlfile+=file.url;
                                        if(file.extension=="jpg"||file.extension=="png")
                                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                                        else if(file.extension=="pdf")
                                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                        else if(file.extension=="excel"||file.extension=="xsc")
                                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                        else
                                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                            +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                    });
                                    $actionBtn += '</div>';
                                    return $actionBtn;
                                }
                                else{return '';}
                            },
                            name:'fileIDS',                    
                        },
                    
                    ],

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
        
        $('#ctabCnt10').html($inArchiveCount);
        
    }
    
    function getCert($id,$certCount){

        var table = $('.certArchivetbl').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscriberCert') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
            columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        {data:'type_id_name'},
                        {data:'cer_date'},
                        {
                            data: null, 
                            render:function(data,row,type){
                                $admin ='';
                                if(data.admin!=null){
                                    $admin = data.admin.nick_name;
                                }
                                return $admin;
                            },
                            name:'name',
                        
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                if(data.msg_content)
                                {
                                    var mm =data.msg_content
                                    $actionBtn = '<a  style="margin-right: 10px;" onclick="printDivP('+mm+')" > <img class="fa fa-print" title="print" src="https://t.expand.ps/expand_repov1/public/assets/images/ico/Printer.png " style="cursor:pointer;height: 32px;"> </a>';
                                }
                                    return $actionBtn;

                            },
                            name:'msg_content',
                        
                        },
                        
                    
                    ],

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
        $('#ctabCnt12').html($certCount);
        
    }
    
    function printDivP(m)
    {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
          mywindow.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">');
          mywindow.document.write('</head><body style=" line-height: 24; font-size: 14px;" >');
          mywindow.document.write('<style>'
          +'@media print {'
          +'      .footerLine{'
        +'            display:block;'
         +'           bottom:0;'
          +'          width: 100%;'
        +'            position:fixed; '   
         +'           text-align: center;'
          +'          font-weight: bold;'
        +'            font-size: 16px;'
         +'       }'
          +'  }'
          +'</style>');
    
          mywindow.document.write(m);
          mywindow.document.write('</body></html>');
    
          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/
    
    }
    
    function getLicArchive($id,$licArchiveCount){

        var table = $('.licArchivetbl').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscriberLicArchive') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
            columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        {data:'fileNo'},
                        {data:'licNo'},
                        {
                            data: null, 
                            render:function(data,row,type){
                                $hodNo ='';
                                if(data.license!=null){
                                    $hodNo = data.license.hodNo;
                                }
                                return $hodNo;
                            },
                            name:'name',
                        
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                $peiceNo ='';
                                if(data.license!=null){
                                    $peiceNo = data.license.peiceNo;
                                }
                                return $peiceNo;
                            },
                            name:'name',
                        
                        },
                        
                        {data:'use_desc'},
                      
                        {
                            data: null,
                            
                            render:function(data,row,type){
                              if(data.files.length>0){ 
                                    var i=1;
                                    $actionBtn="<div class='row' style='margin-left:0px;'>";
                                    data.files.forEach(file => {
                                        shortCutName=file.real_name;
                                        shortCutName=shortCutName.substring(0, 20);
                                        extension=file.url.split('.');
                                        urlfile='{{ asset('') }}';
                                        urlfile+=file.url;
                                        if(extension[1]=="jpg"||extension[1]=="png")
                                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                                        else if(extension[1]=="pdf")
                                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                        else if(extension[1]=="excel"||extension[1]=="xsc")
                                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                        else
                                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                              +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'     
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                    });
                                    $actionBtn += '</div>';
                                    return $actionBtn;
                                }
                                else{return '';}
                            },
                            name:'fileIDS',     
                        },
                    
                    ],

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
        
        $('#ctabCnt7').html($licArchiveCount);
        
    }

    function getOtherArchive($id,$otherArchiveCount){

        var table = $('.other').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscriberOtherArchive') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
            columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        // {data:'serisal'},
                        {data:'title'},
                        {
                            data: null, 
                            render:function(data,row,type){
                                $type ='';
                                if(data.type!=null){
                                    if(data.type =='munArchive'){
                                        $type = 'أرشيف مؤسسة';
                                    }else if(data.type =='projArchive'){
                                        $type = 'أرشيف المشاريع';
                                    }else if(data.type =='assetsArchive'){
                                        $type = 'أرشيف الأصول';
                                    }else if(data.type =='empArchive'){
                                        $type = 'أرشيف الموظفين';
                                    }else if(data.type =='citArchive'){
                                        $type = 'أرشيف المواطنين';
                                    }else if(data.type =='lawArchieve'){
                                        $type = 'أرشيف القوانين والإجراءات';
                                    }else if(data.type =='depArchive'){
                                        $type = 'أرشيف المالية';
                                    }else if(data.type =='taskArchive'){
                                      $type+='<a target="_blank" href="{{asset(app()->getLocale())}}'+'/admin/'+data.task_link+'">'
                                            +'<span class="hideMob" >'+ data.task_name +'</span>'
                                            +'</a>';
                                    }else if(data.type =='certArchive'){
                                      $type= data.task_name ;
                                    }
                                }
                                return $type;
                            },
                            name:'name',
                        
                        },
                        {data:'date'},
                        {
                            data: null, 
                            render:function(data,row,type){
                                $admin ='';
                                if(data.admin!=null){
                                    $admin = data.admin.nick_name;
                                }
                                return $admin;
                            },
                            name:'name',
                        
                        },
                        
                        {
                            data: null,
                            
                            render:function(data,row,type){
                                if(data.files.length>0){ 
                                    var i=1;
                                    $actionBtn="<div class='row' style='margin-left:0px;'>";
                                    data.files.forEach(file => {
                                        shortCutName=file.real_name;
                                        shortCutName=shortCutName.substring(0, 20);
                                        urlfile='{{ asset('') }}';
                                        urlfile+=file.url;
                                        if(file.extension=="jpg"||file.extension=="png")
                                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                                        else if(file.extension=="pdf")
                                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                        else if(file.extension=="excel"||file.extension=="xsc")
                                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                        else
                                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                            +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                    });
                                    $actionBtn += '</div>';
                                    return $actionBtn;
                                }
                                else{return '';}
                            },
                            name:'fileIDS',                    
                        },
                    
                    ],

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
        
        $('#ctabCnt6').html($otherArchiveCount);
        
    }

    function getCopyArchive($id,$copyToCount){

        var table = $('.copyArchivetbl').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscriberCopyArchive') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
            columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        { data: null, 
                            render:function(data,row,type){
                                $serial ='';
                                if(data.archive.serisal !=null){
                                    $serial = data.archive.serisal;
                                }
                                return $serial;
                            },
                            name:'name',
                        },
                        { data: null, 
                            render:function(data,row,type){
                                $title ='';
                                if(data.archive.title !=null){
                                    $title = data.archive.title;
                                }
                                return $title;
                            },
                            name:'name',
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                $type ='';
                                if(data.archive.type !=null){
                                     if(data.archive.type=='outArchive'){
                                        $type ='ارشيف صادر';
                                    }else if(data.archive.type=='inArchive'){
                                        $type ='أرشيف وارد';
                                    }else if(data.archive.type=='munArchive'){
                                        $type ='أرشيف المؤسسة';
                                    }else if(data.archive.type=='projArchive'){
                                        $type ='أرشيف المشاريع';
                                    }else if(data.archive.type=='assetsArchive'){
                                        $type ='أرشيف الأصول';
                                    }else if(data.archive.type=='empArchive'){
                                        $type ='أرشيف الموظفين';
                                    }else if(data.archive.type=='contractArchive'){
                                        $type ='أرشيف الإتفاقيات والعقود';
                                    }else if(data.archive.type=='citArchive'){
                                        $type ='أرشيف المواطنين ';
                                    }
                                }
                                return $type;
                            },
                            name:'name',
                        
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                $name ='';
                                if(data.archive !=null){
                                   $name= data.archive.name;
                                }
                                return $name;
                            },
                            name:'name',
                        
                        },
                        { data: null, 
                            render:function(data,row,type){
                                $date ='';
                                if(data.archive.date !=null){
                                    $date = data.archive.date;
                                }
                                return $date;
                            },
                            name:'name',
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                $admin ='';
                                if(data.archive.admin!=null){
                                    $admin = data.archive.admin.name;
                                }
                                return $admin;
                            },
                            name:'name',
                        
                        },
                        
                        {
                            data: null,
                            
                            render:function(data,row,type){
                                if(data.archive.files.length>0){ 
                                    var i=1;
                                    $actionBtn="<div class='row' style='margin-left:0px;'>";
                                    data.archive.files.forEach(file => {
                                        shortCutName=file.real_name;
                                        shortCutName=shortCutName.substring(0, 20);
                                        urlfile='{{ asset('') }}';
                                        urlfile+=file.url;
                                        if(file.extension=="jpg"||file.extension=="png")
                                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                                        else if(file.extension=="pdf")
                                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                        else if(file.extension=="excel"||file.extension=="xsc")
                                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                        else
                                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                            +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                    });
                                    $actionBtn += '</div>';
                                    return $actionBtn;
                                }
                                else{return '';}
                            },
                            name:'fileIDS',                    
                        },
                    
                    ],

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
        
        $('#ctabCnt11').html($copyToCount);
        
    }

    function getJalArchive($id,$jalArchiveCount){

        var table = $('.jalArchivetbl').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscriberJalArchive') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
            columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        { data: null, 
                            render:function(data,row,type){
                                $name ='';
                                if(data.agenda_detail!=null)
                                    if(data.agenda_detail.agenda_extention.name !=null){
                                        $name = data.agenda_detail.agenda_extention.name;
                                    }
                                return $name;
                            },
                            name:'name',
                        },
                        { data: null, 
                            render:function(data,row,type){
                                $agenda_number ='';
                                if(data.agenda_detail!=null)
                                    if(data.agenda_detail.agenda_number !=null){
                                        $agenda_number = data.agenda_detail.agenda_number;
                                    }
                                return $agenda_number;
                            },
                            name:'name',
                        },
                        {data: 'title'},
                        {data: 'descision'},
                        {
                            data: null,
                            
                            render:function(data,row,type){
                                if(data.files.length>0){ 
                                    var i=1;
                                    $actionBtn="<div class='row' style='margin-left:0px;'>";
                                    data.files.forEach(file => {
                                        shortCutName=file.real_name;
                                        shortCutName=shortCutName.substring(0, 20);
                                        urlfile='{{ asset('') }}';
                                        urlfile+=file.url;
                                        if(file.extension=="jpg"||file.extension=="png")
                                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                                        else if(file.extension=="pdf")
                                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                        else if(file.extension=="excel"||file.extension=="xsc")
                                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                        else
                                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                            +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                    });
                                    $actionBtn += '</div>';
                                    return $actionBtn;
                                }
                                else{return '';}
                            },
                            name:'fileIDS',                    
                        },
                    
                    ],

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
        
        $('#ctabCnt5').html($jalArchiveCount);
        
    }

    function getContractArchive($id,$contractArchiveCount){
            // let $orgnization_id;

        var table = $('.lawtbl').DataTable({
            destroy: true,
            ajax: {
                url: '{{ route('subscribercontractArchive') }}',
                data: function (d) {
                    d.subscriber_id = $id;
                }
            },
            
                columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                        {data:'serisal'},
                        {data:'date'},
                        {data:'title'},
                        
                        {
                            data: null, 
                            render:function(data,row,type){
                                $copyto ='';
                                if(data.copy_to[0]!=null){
                                    for($i=0;$i<data.copy_to.length;$i++)
                                        $copyto += data.copy_to[$i].name+' , ';
                                }
                                return $copyto;
                            },
                            name:'name',
                        
                        },
                        {
                            data: null, 
                            render:function(data,row,type){
                                $admin ='';
                                if(data.admin!=null){
                                    $admin = data.admin.nick_name;
                                }
                                return $admin;
                            },
                            name:'name',
                        
                        },
                        
                        {
                            data: null,
                            
                            render:function(data,row,type){
                                if(data.files.length>0){ 
                                    var i=1;
                                    $actionBtn="<div class='row' style='margin-left:0px;'>";
                                    data.files.forEach(file => {
                                        shortCutName=file.real_name;
                                        shortCutName=shortCutName.substring(0, 20);
                                        urlfile='{{ asset('') }}';
                                        urlfile+=file.url;
                                        if(file.extension=="jpg"||file.extension=="png")
                                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                                        else if(file.extension=="pdf")
                                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                        else if(file.extension=="excel"||file.extension=="xsc")
                                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                        else
                                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                            +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                    });
                                    $actionBtn += '</div>';
                                    return $actionBtn;
                                }
                                else{return '';}
                            },
                            name:'fileIDS',                    
                        },
                    
                    ],

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
        
        $('#ctabCnt9').html($contractArchiveCount);
        
    }

</script>