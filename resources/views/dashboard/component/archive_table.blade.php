<style>

    .orgnization_table th{

        color:#ffffff;

    }

</style>

@if ($type=="subscriber"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type=="orgnization"||$type == 'equip'||$type == 'org'||$type == 'employee'||$type == 'depart' || $type=='volunteer')



<div class="modal fade text-left" id="CertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">

    <div class="modal-dialog"  role="document">

        <div class="modal-content">

            <div class="modal-header">
            
              {{-- <h4 class="modal-title" id="myModalLabel1">الأرشيف  (<span id="ArchModalName"></span>)</h4> --}}

              <h4 class="modal-title" id="myModalLabel1">{{trans('admin.archieve')}}  (<span id="ArchModalName"></span>)</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">



                <div class="form-body">

                    <div class="row ">

                        <div class="col-sm-12">

                            <div class="form-group">

                              <ul class="nav nav-tabs">

                               <!-- <li class="nav-item">

                                  <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#xtab1" aria-expanded="true">شهادات</a>

                                </li>

                                -->

                                @if ($type=="orgnization")
                                <li class="nav-item">

                                <a class="nav-link active" id="base-tab12" data-toggle="tab12" aria-controls="tab12" href="#xtab12" aria-expanded="true">

                                    {{trans('admin.archieve')}}

                                <span id="outArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                </a>

                                </li>

                                <li class="nav-item">

                                <a class="nav-link" id="base-tab13" data-toggle="tab13" aria-controls="tab13" href="#xtab13" aria-expanded="false">

                                    {{trans('archive.law_archive')}}

                                    <span id="inArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                </a>

                                </li>
                                </ul>
                                <div class="tab-content px-1 pt-1 ">
                                <div class="tab-pane active" id="xtab12" aria-labelledby="base-tab12">

                                        <p>
                                <table width="100%" class="detailsTB table orgnization_table">

                                    <thead>

                                    <tr>

                                    <th width="30px">#</th>

                                    <th width="50px">{{trans('archive.archive_No')}}</th>
                                    <th width="80px">{{trans('archive.date')}} </th>
                                    <th width="60px"> {{trans('archive.type')}} </th>
                                    <th width="300px">{{trans('archive.title_name')}}</th>
                                    <th width="170px">{{trans('archive.attach')}} </th>

                                    </tr>

                                    </thead>

                                <tbody id="orgnization_list">

                                </tbody>

                                </table>
                                </p>
                                </div>
                                <div class="tab-pane" id="xtab13" aria-labelledby="base-tab13">

                                        <p>

                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table lawTbl">

                                                <thead>

                                                    <tr style="text-align:center !important;background: #00A3E8;">

                                                        <th width="50px">

                                                        #

                                                        </th>

                                                        <th >

                                                        {{trans('archive.date')}}

                                                        </th>

                                                        <th >

                                                            {{trans('archive.type')}} 

                                                        </th>

                                                        <th >

                                                            {{trans('archive.title_name')}} 

                                                        </th>
                                                        <th >

                                                            {{trans('admin.notes')}}  

                                                        </th>
                                                        <th >
                                                             {{trans('archive.copy_to')}} 
                                                        </th>
                                                        <th >
                                                             {{trans('archive.created_by')}}
                                                        </th>
                                                        <th >

                                                             {{trans('archive.attach')}}

                                                        </th>

                                                    </tr>

                                                </thead>

                                                <tbody id="lawList">

                                                </tbody>

                                            </table>

                                        </p>

                                    </div>
                                </div>
                                @elseif ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type=="project"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip'||$type == 'org' ||$type=='volunteer')

                                    @if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org' ||$type=='volunteer')

                                    <li class="nav-item">

                                    <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#xtab2" aria-expanded="true">

                                    {{trans('archive.out_archive')}}

                                    <span id="outArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                    </a>

                                    </li>

                                    <li class="nav-item">

                                    <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#xtab3" aria-expanded="false">

                                        {{trans('archive.in_archive')}}

                                        <span id="inArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                    </a>

                                    </li>

                                    @if ($type=="depart" )

                                    {{-- <li class="nav-item">

                                    <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#xtab5" aria-expanded="false">شهادة تسجيل  اراضي</a>

                                    </li> --}}

                                    

                                    <li class="nav-item">

                                    <a class="nav-link" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#xtab11" aria-expanded="false">

                                        {{trans('archive.law_archive')}}

                                        <span id="lawArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                    </a>

                                    </li>

                                    @endif
                                    

                                    @if ($type=="subscriber" )

                                    {{-- <li class="nav-item">

                                    <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#xtab5" aria-expanded="false">شهادة تسجيل  اراضي</a>

                                    </li> --}}

                                    

                                    <li class="nav-item">

                                    <a class="nav-link" id="base-tab6" data-toggle="tab" aria-controls="tab6" href="#xtab6" aria-expanded="false">

                                        {{trans('archive.building_permit_archive')}}

                                        <span id="licArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                    </a>

                                    </li>

                                    {{-- <li class="nav-item">

                                    <a class="nav-link" id="base-tab7" data-toggle="tab" aria-controls="tab7" href="#xtab7" aria-expanded="false">

                                        {{trans('archive.License_file_archive')}}

                                        <span id="licFileArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                    </a>

                                    </li> --}}

                                    @endif

                                    @endif

                                @if ($type=="project"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip')

                                <li class="nav-item">

                                    <a class="nav-link active" id="base-tab9" data-toggle="tab" aria-controls="tab9" href="#xtab9" aria-expanded="false">

                                        {{trans('admin.sub_archives')}}

                                        <span id="archiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                    </a>

                                </li>

                                @endif

                                <li class="nav-item">

                                  <a class="nav-link" id="base-tab8" data-toggle="tab" aria-controls="tab8" href="#xtab8" aria-expanded="false">

                                      {{trans('archive.copy_view')}}

                                      <span id="copyToCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="base-tab10" data-toggle="tab" aria-controls="tab10" href="#xtab10" aria-expanded="false">

                                        {{trans('archive.agenda_archieve')}} 

                                    <span id="linkToCount" style="color: #1e9ff2;margin-right:5px;"></span>    



                                </a>

                                </li>
                                @if ($type=="project"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip')

                                <li class="nav-item">

                                    <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#xtab14" aria-expanded="false">
    
                                        ارشيف الإتفاقيات والعقود
    
                                        <span id="contractArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    
    
                                    </a>
    
                                </li>

                                @else                                
                                <li class="nav-item">

                                <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#xtab4" aria-expanded="false">

                                    {{trans('archive.documents')}} 

                                    <span id="otherArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    

                                </a>

                                </li>
                                <li class="nav-item">

                                    <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#xtab14" aria-expanded="false">
    
                                        ارشيف الإتفاقيات والعقود
    
                                        <span id="contractArchiveCount" style="color: #1e9ff2;margin-right:5px;"></span>    
    
                                    </a>
    
                                </li>
                                @endif

                              </ul>

                              

                                <div class="tab-content px-1 pt-1">

                                    <div class="tab-pane" id="xtab11" aria-labelledby="base-tab11">

                                        <p>

                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table lawTbl">

                                                <thead>

                                                    <tr style="text-align:center !important;background: #00A3E8;">

                                                        <th style="width: 0px;padding: 0px 18px 0px 0px;">

                                                        #

                                                        </th>

                                                        <th >

                                                        {{trans('archive.date')}}

                                                        </th>

                                                        <th >

                                                            {{trans('archive.type')}} 

                                                        </th>

                                                        <th >

                                                            {{trans('archive.title_name')}} 

                                                        </th>
                                                        <th >

                                                            {{trans('admin.notes')}}  

                                                        </th>
                                                        <th >
                                                             {{trans('archive.created_by')}}
                                                        </th>
                                                        <th >

                                                            {{trans('archive.attach')}}

                                                        </th>

                                                    </tr>

                                                </thead>

                                                <tbody id="lawList">

                                                </tbody>

                                            </table>

                                        </p>

                                    </div>
                                    <div class="tab-pane" id="xtab6" aria-labelledby="base-tab6">

                                        <p>

                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table licTbl">

                                                <thead>

                                                    <tr style="text-align:center !important;background: #00A3E8;">

                                                        <th width="50px">

                                                        #

                                                        </th>

                                                        <th width="80px">

                                                            {{trans('archive.licfile_num')}}

                                                        </th>
                                                        <th width="80px">

                                                            {{trans('archive.lic_num')}}

                                                        </th>

                                                        <th width="80px">

                                                            {{trans('archive.pelvis_number')}}

                                                        </th>

                                                        <th width="80px">
                                                            رقم القطعة طابو
                                                        </th>

                                                        <th width="120px">

                                                            الغاية من الإستعمل

                                                        </th>

                                                        <th width="300px">

                                                            {{trans('archive.attach')}}

                                                        </th>

                                                    </tr>

                                                </thead>

                                                <tbody id="licList">

                                                </tbody>

                                            </table>

                                        </p>

                                    </div>

                                    {{-- <div class="tab-pane" id="xtab7" aria-labelledby="base-tab7">

                                        <p>

                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table licFileTbl">

                                                <thead>

                                                    <tr style="text-align:center !important;background: #00A3E8;">

                                                        <th width="50px">

                                                        #

                                                        </th>

                                                        <th width="80px">

                                                        {{trans('archive.licfile_num')}}

                                                        </th>

                                                        <th width="120px">

                                                            {{trans('archive.license_type')}}

                                                        </th>

                                                        <th width="80px">
                                                            {{trans('archive.build_type')}}
                                                        </th>
                                                        <th width="80px">
                                                            {{trans('archive.pelvis_number')}}
                                                        </th>
                                                        <th width="80px">
                                                            {{trans('archive.piece_number')}}
                                                        </th>
                                                        <th width="300px">
                                                            {{trans('archive.attach')}}
                                                        </th>

                                                    </tr>

                                                </thead>

                                                <tbody id="licFileList">

                                                </tbody>

                                            </table>

                                        </p>

                                    </div> --}}



                                    <div class="tab-pane

                                    @if ($type=="project"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip'||$type == 'orgnization')

                                    active

                                    @endif" id="xtab9" aria-labelledby="base-tab9">

                                        <p>

                                            <table width="100%" class="detailsTB table orgnization_table">

                                                <thead>

                                                <tr>

                                                <th width="30px">#</th>

                                                <th width="40px">{{trans('archive.archive_No')}}</th>
                                                
                                                <th width="50px">{{trans('archive.date')}} </th>
                                                <th width="40px"> {{trans('archive.type')}} </th>
                                                <th width="140px">{{trans('archive.title_name')}}</th>
                                                <th width="170px">{{trans('archive.attach')}} </th>

                                                </tr>

                                            </thead>

                                            <tbody id="orgnization_list">

                                            </tbody>

                                            </table>

                                        </p>

                                    </div>



                                    <div class="tab-pane 

                                    @if ($type=='subscriber' ||$type == 'employee'||$type == 'depart'||$type == 'org' ||$type=='volunteer')

                                        active

                                    @endif" id="xtab2" aria-labelledby="base-tab2">

                                        <p>

                                            <table width="100%" class="detailsTB table SaderTbla">

                                                <thead>

                                                <tr>

                                                    <th width="30px">#</th>

                                                    <th width="50px">{{trans('archive.num_send')}}</th>
                                                    <th width="80px">{{trans('archive.date')}} </th>
                                                    <th width="200px">{{trans('archive.title_send')}}</th>
                                                    <th width="170px">{{trans('archive.copy_to')}} </th>
                                                    <th width="80px">{{trans('archive.created_by')}} </th>
                                                    <th width="170px">{{trans('archive.attach')}} </th>

                                                </tr>

                                            </thead>

                                            <tbody id="msgList1">

                                            </tbody>

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane" id="xtab14" aria-labelledby="base-tab14">

                                        <p>

                                            <table width="100%" class="detailsTB table contractToTbl">

                                                <thead>

                                                    <tr>

                                                        <th width="30px">#</th>
    
                                                        <th width="50px">{{trans('archive.num_send')}}</th>
                                                        <th width="80px">{{trans('archive.date')}} </th>
                                                        <th width="200px">{{trans('archive.title_send')}}</th>
                                                        <th width="80px">{{trans('archive.type')}}</th>
                                                        <th width="170px">{{trans('archive.copy_to')}} </th>
                                                        <th width="80px">{{trans('archive.created_by')}} </th>
                                                        <th width="170px">{{trans('archive.attach')}} </th>
    
                                                    </tr>

                                                </thead>

                                                <tbody id="contractList">

                                                </tbody>

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane" id="xtab8" aria-labelledby="base-tab8">

                                        <p>

                                            <table width="100%" class="detailsTB table copyToTbl">

                                                    <thead>

                                                    <tr>

                                                    <th width="50px">#</th>

                                                    <th width="50px">{{trans('archive.archive_No')}}</th>

                                                    <th width="250px">{{trans('archive.title_name')}}</th>
                                                    
                                                    <th width="80px">{{trans('archive.type')}} </th>

                                                    <th width="170px"> {{trans('archive.original_document_linked')}} </th>

                                                    <th width="80px">{{trans('archive.date')}} </th>

                                                    <th width="80px">{{trans('archive.created_by')}} </th>

                                                    <th width="170px">{{trans('archive.attach')}} </th>

                                                    </tr>

                                                </thead>

                                                <tbody id="copyToList">

                                                </tbody>

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane" id="xtab10" aria-labelledby="base-tab10">

                                        <p>

                                            <table width="100%" class="detailsTB table jal_table">

                                                {{-- <thead>

                                                <tr>

                                                <th width="30px">#</th>

                                                <th width="50px">{{trans('archive.archive_No')}}</th>

                                                <th width="200px">{{trans('archive.title_name')}}</th>

                                                <th width="80px">{{trans('archive.date')}} </th>

                                                <th width="60px"> {{trans('archive.type')}} </th>

                                                    <th width="80px">{{trans('archive.created_by')}} </th>

                                                <th width="170px">{{trans('archive.attach')}} </th>

                                                </tr>

                                            </thead> --}}

                                            <thead>

                                                <tr>

                                                    <th  width="30px">

                                                        #

                                                    </th>

                                                    <th width="110px" >

                                                       {{trans('archive.meeting_name')}}

                                                    </th>

                                                    <th  width="30px">

                                                       {{trans('archive.meeting_number')}}

                                                    </th>

                                                    <th  width="50px">

                                                        {{trans('archive.meeting_date')}}

                                                    </th>             

                                                    {{-- <!--<th width="80px">{{trans('archive.created_by')}} </th>--> --}}
                                                    <th width="150px" >

                                                       {{trans('archive.topic')}}

                                                    </th>
                                                    <th width="150px" >

                                                       {{trans('archive.decision')}}

                                                    </th>
                                                    

                                                    <th width="300px">

                                                        {{trans('archive.attach')}}

                                                    </th>

                                                </tr>

                                            </thead>

                                            <tbody id="jal_list">

                                            </tbody>

                                            </table>

                                        </p>

                                    </div>



                                    <div class="tab-pane" id="xtab3" aria-labelledby="base-tab3">

                                        <p>

                                            <table width="100%" class="detailsTB table waredTbla">

                                                <thead>

                                                <tr>

                                                    <th width="30px">#</th>

                                                    <th width="50px">{{trans('archive.num_send')}}</th>
                                                    <th width="80px">{{trans('archive.date')}} </th>
                                                    <th width="200px">{{trans('archive.title_send')}}</th>
                                                    <th width="170px">{{trans('archive.copy_to')}} </th>
                                                    <th width="80px">{{trans('archive.created_by')}} </th>
                                                    <th width="170px">{{trans('archive.attach')}} </th>

                                                </tr>

                                                </thead>

                                                <tbody id="msgRList1">

                                                </tbody>

                                            </table>

                                        </p>

                                    </div>

                                    <div class="tab-pane" id="xtab4" aria-labelledby="base-tab4">

                                        <p>

                                            <table width="100%" class="detailsTB table OtherTbla">

                                                <thead>

                                                <tr>

                                                    <th width="50px">#</th>

                                                    <th width="50px">{{trans('archive.num_send')}}</th>

                                                    <th width="200px">{{trans('archive.title_send')}}</th>

                                                    <th width="80px">{{trans('archive.type')}}</th>

                                                    <th width="80px">{{trans('archive.date')}} </th>

                                                    <th width="80px">{{trans('archive.created_by')}} </th>

                                                    <th width="170px">{{trans('archive.attach')}} </th>

                                                </tr>

                                            </thead>

                                            <tbody id="msgOList11">

                                            </tbody>

                                            </table>

                                        </p>

                                    </div>

                                </div>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endif

<script>

var buildArray = { "2079": '{{trans('archive.build_type1')}}', "2080": '{{trans('archive.build_type2')}}',"2081": '{{trans('archive.build_type3')}}'}; 
var typeArray = { "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'}; 



@if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org' ||$type=='volunteer')

function drawTablesArchive($archives,$copyTo,$archivesLic,$jalArchive,$outArchiveCount,$inArchiveCount,$otherArchiveCount,$licFileArchiveCount,$licArchiveCount,$copyToCount,$linkToCount,$lawArchieveCount,$contractArchiveCount){ 

                $("#outArchiveCount").html(" ("+$outArchiveCount+") ");

                $("#inArchiveCount").html(" ("+$inArchiveCount+") ");

                $("#otherArchiveCount").html(" ("+$otherArchiveCount+") ");

                $("#contractArchiveCount").html(" ("+$contractArchiveCount+") ");

                $("#licArchiveCount").html(" ("+$licArchiveCount+") ");

                $("#licFileArchiveCount").html(" ("+$licFileArchiveCount+") ");

                $("#copyToCount").html(" ("+$copyToCount+") ");

                $("#linkToCount").html(" ("+$linkToCount+") ");
                // if($type == 'depart')
                $("#lawArchiveCount").html(" ("+$lawArchieveCount+") ");
                    
                // $("#ArchModalName").html(""+$name+"");
                // console.log($name);

@else

function drawTablesArchive($archives,$copyTo,$jalArchive,$copyToCount,$linkToCount,$archiveCount){ 

                $("#copyToCount").html("("+$copyToCount+")");

                $("#archiveCount").html("("+$archiveCount+")");

                $("#linkToCount").html("("+$linkToCount+")");
@endif





    @if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org'||$type=='volunteer')

    if ( $.fn.DataTable.isDataTable( '.SaderTbla' ) ) {

        $(".SaderTbla").dataTable().fnDestroy();

        $('#msgList1').empty();

    }
    if ( $.fn.DataTable.isDataTable( '.contractToTbl' ) ) {

        $(".contractToTbl").dataTable().fnDestroy();

        $('#contractList').empty();

    }
    if ( $.fn.DataTable.isDataTable( '.lawTbl' ) ) {

        $(".lawTbl").dataTable().fnDestroy();

        $('#lawList').empty();

    }

    if ( $.fn.DataTable.isDataTable( '.waredTbla' ) ) {

        $(".waredTbla").dataTable().fnDestroy();

        $('#msgRList1').empty();

    }

    if ( $.fn.DataTable.isDataTable( '.OtherTbla' ) ) {

        $(".OtherTbla").dataTable().fnDestroy();

        $('#msgOList11').empty();

    }

    if ( $.fn.DataTable.isDataTable( '.licTbl' ) ) {

        $(".licTbl").dataTable().fnDestroy();

        $('#licList').empty();

    }

    // if ( $.fn.DataTable.isDataTable( '.licFileTbl' ) ) {

    //     $(".licFileTbl").dataTable().fnDestroy();

    //     $('#licFileList').empty();

    // }

    if ( $.fn.DataTable.isDataTable( '.copyToTbl' ) ) {

        $(".copyToTbl").dataTable().fnDestroy();

        $('#copyToList').empty();

    }

    if ( $.fn.DataTable.isDataTable( '.jal_table' ) ) {

        $(".jal_table").dataTable().fnDestroy();

        $('#jal_list').empty();

    }

    var s=1;

    var w=1;

    var c=1,p=1,lc=1,lf=1;


    @elseif($type=="orgnization"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip')

        if ( $.fn.DataTable.isDataTable( '.orgnization_table' ) ) {

            $(".orgnization_table").dataTable().fnDestroy();

            $('#orgnization_list').empty();

        }
        if ( $.fn.DataTable.isDataTable( '.contractToTbl' ) ) {

            $(".contractToTbl").dataTable().fnDestroy();

            $('#contractList').empty();

        }
        if ( $.fn.DataTable.isDataTable( '.copyToTbl' ) ) {

        $(".copyToTbl").dataTable().fnDestroy();

        $('#copyToList').empty();

        }

        if ( $.fn.DataTable.isDataTable( '.jal_table' ) ) {

        $(".jal_table").dataTable().fnDestroy();

        $('#jal_list').empty();

        }

        var s=1;

        var w=1;

        var c=1,p=1,lc=1,lf=1;

        var typeArray = { "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'}; 

        

        $archives.forEach(archive => {

            if(archive.type=="contractArchive")

            { $row="<tr>"+

                "<td>"+s+"</td>"+

                "<td>"+(archive.serisal??'')+"</td>"+
                "<td>"+(archive.date??"")+"</td>"+

                "<td>"+(archive.title??"")+"</td>"+
                "<td>"+(archive.archive_type != null ?archive.archive_type.name :'' )+"</td>"+
                "<td>";
                    if(archive.copy_to){
                        $copy='';
                        for(j=0;j<archive.copy_to.length;j++){

                                $copy+=''+archive.copy_to[j].name+' , ' ;
                        }
                        $row += $copy;
                    }
                    $row += '</td>';
                $row +="<td>"+archive.admin.nick_name+"</td>";
                    $row += '<td>';

                attach='';

                if(archive.files.length>0){

                    console.log(archive.files.length);

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

                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                                +'    </div>'

                                +'  </div>' ;

                    }

                    $row += attach;

                var attach='';

                }

                

                $row += "</td></tr>";

            $('#contractList').append($row)

            s++;

                

            }

        if(archive.type=="inArchive"||archive.type=="outArchive"||archive.type=="projArchive"||archive.type=='munArchive'||archive.type=='empArchive'||archive.type=='assetsArchive'||archive.type=='citArchive'||archive.type=='depArchive')

           { $row="<tr>"+

                "<td>"+p+"</td>"+

                "<td>"+(archive.serisal==null?'-':archive.serisal)+"</td>"+
                "<td>"+(archive.date??'')+"</td>"+
                "<td>"+(archive.archive_type!=null?(archive.archive_type.name):'بدون تصنيف')+"</td>"+
                // "<td>"+(archive.type_id_name!=null?(archive.type_id_name):'بدون تصنيف')+"</td>"+
                "<td>"+(archive.title??'')+"</td>"+


                // "<td>"+(archive.archive_type!=null?(archive.archive_type!=null?archive.archive_type.name:'بدون تصنيف'):'بدون تصنيف')+"</td>"+

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

            $('#orgnization_list').append($row)

            p++;

           }

        });

        $("#ArchModalName").html($("#name_ar").val());

        $('.orgnization_table').DataTable({

            dom: 'Bfltip',

            buttons: [

                {

                    extend: 'excel',

                    tag: 'img',

                    title:'',

                    attr:  {

                        title: 'excel',

                        src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

            @if($type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip')

            $copyTo.forEach(copy => {
                if(copy.archive){
                    
                $row="<tr>"+

                "<td>"+c+"</td>"+

                "<td>"+(copy.archive.serisal==null?'-':copy.archive.serisal)+"</td>"+

                "<td>"+(copy.archive.title??'')+"</td>"+
                
                "<td>"+(copy.archive.archive_type==null?'':copy.archive.archive_type.name)+"</td>"+
                
                "<td>"+(copy.archive.name??'')+"</td>"+

                "<td>"+(copy.archive.date??'')+"</td>"+

                "<td>"+(copy.archive.admin.nick_name??'')+"</td>"+

                "<td>";

                    attach='';

                    if(copy.archive.files.length>0){

                    var j=0;

                    for(j=0;j<copy.archive.files.length;j++){

                        shortCutName=copy.archive.files[j].real_name;

                        urlfile='{{ asset('') }}';

                        urlfile+=copy.archive.files[j].url;

                        if(copy.archive.files[j].extension=="jpg"||copy.archive.files[j].extension=="png")

                        fileimage='{{ asset('assets/images/ico/image.png') }}';

                        else if(copy.archive.files[j].extension=="pdf")

                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';

                        else if(copy.archive.files[j].extension=="excel"||copy.archive.files[j].extension=="xsc")

                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';

                        else

                        fileimage='{{ asset('assets/images/ico/file.png') }}';

                            shortCutName=shortCutName.substring(0, 20);

                            attach+='<div id="attach" class=" col-sm-12 ">' +

                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'

                                +'    <span class="attach-text">'+shortCutName+'</span>'

                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'

                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                                +'    </div>'

                                +'  </div>' +

                                '</div>'

                    }

                    $row += attach;

                    attach='';

                }

                

               

                $row += "</td></tr>";

                $('#copyToList').append($row)

                c++;

            }

            });

                $('.copyToTbl').DataTable({



                    dom: 'Bfltip',

                        buttons: [

                            {

                                extend: 'excel',

                                tag: 'img',

                                title:'',

                                attr:  {

                                    title: 'excel',

                                    src:'{{asset('assets/images/ico/excel.png')}}',

                                    style: 'cursor:pointer;height:40px',

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

            $jalArchive.forEach(jal => {
    if(jal)
    {
            
            $row="<tr>"+

                "<td>"+c+"</td>"+
                
                "<td>"+jal.agenda_detail.agenda_extention.name+"</td>"+
                

                "<td>"+jal.agenda_detail.agenda_number+"</td>"+
                "<td>"+jal.agenda_detail.agenda_date+"</td>"+

                "<td>"+jal.title+"</td>"+

                "<td>"+jal.descision+"</td>";

                    id=jal.id;
                                attach='';
                                for(j=0;j<jal.files.length;j++){
                                    shortCutName=jal.files[j].real_name;
                                    shortCutName=shortCutName.substring(0, 20);
                                    if(jal.files[j].extension=="jpg"||jal.files[j].extension=="png")

                                    fileimage='{{ asset('assets/images/ico/image.png') }}';
                    
                                    else if(jal.files[j].extension=="pdf")
                    
                                    fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                    
                                    else if(jal.files[j].extension=="excel"||jal.files[j].extension=="xsc")
                    
                                    fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                    
                                    else
                    
                                    fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        attach+='       <div id="attach" class=" col-sm-12 ">   ' +
                                    '           <div class="attach" onmouseover="$(this).children().first().next().show()">		' +
                                    '               <span class="attach-text">'+shortCutName+'</span>		' +
                                    '                   <a class="attach-close1" href="{{asset('')}}'+jal.files[j].url+'" style="color: #74798D; float:left;" target="_blank">' +
                                    '                      <img style="width: 20px;"src="'+fileimage+'">' +
                                    '                   </a>		' +
                                    '                 <input type="hidden" id="subject'+id+'imgUploads[]" name="subject'+id+'imgUploads[]" value="'+jal.files[j].real_name+'">      ' +
                                    '                 <input type="hidden" id="subject'+id+'orgNameList[]" name="subject'+id+'orgNameList[]" value="'+jal.files[j].url+'">      ' +
                                    '                 <input type="hidden" id="subject'+id+'id[]" name="subject'+id+'id[]" value="'+jal.files[j].id+'">		' +
                                    '           </div>	' +
                                '             </div>' ;
                                }
                                
                                $row +='<td>'
                                +'        <div class="row">'
                                +'        <div class="col-8">'

                                +'        <div class="row subject'+id+'ImagesArea">'+attach+'               </div>'
                                +'        <div class="row subject'+id+'FilesArea">'
                                +'        </div>'
                                +'        </div>'
                                +'    <div class="col-4">'
                                +'            <span class="attach-icons" style="margin-left: 0px;">'
                                +'               <a href="{{ url('') }}/ar/admin/printDes/'+id+'"  class="attach-icon" target="_blank">'
                                +'                   <img src="https://db.expand.ps/images/printer.jpeg" style="height: 32px;">'
                                +'                </a>'
                                +'            </span>'
                                +'   </div>'
                                +'        </div>'
                                +'   </td>'
                                
                                // "<td>"+jal.descision+"</td></tr>";
                                
                                
                                $row += "</tr>";

            $('#jal_list').append($row)

            c++;
        
    }

  });

  $('.jal_table').DataTable({



        dom: 'Bfltip',

        buttons: [

            {

                extend: 'excel',

                tag: 'img',

                title:'',

                attr:  {

                    title: 'excel',

                    src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

            @endif

    @endif

    @if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org'||$type=='volunteer')

    $archives.forEach(archive => {

        

        if(archive.type=="lawArchieve")

           { $row="<tr>"+

                "<td>"+s+"</td>"+

                "<td>"+(archive.date??"")+"</td>"+
                "<td>"+(archive.archive_type != null ?archive.archive_type.name :'' )+"</td>"+

                "<td>"+(archive.title??"")+"</td>"+

                "<td>"+(archive.serisal??"")+"</td>";

                    // "<td>";
                    // if(archive.copy_to){
                    //     $copy='';
                    //     for(j=0;j<archive.copy_to.length;j++){
    
                    //             $copy+=''+archive.copy_to[j].name+' , ' ;
                    //     }
                    //     $row += $copy;
                    // }
                    // $row += '</td>';
                $row +="<td>"+(archive.admin==null?'':archive.admin.nick_name)+"</td>";
                    $row += '<td>';

                attach='';

                if(archive.files.length>0){

                    console.log(archive.files.length);

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

                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                                +'    </div>'

                                +'  </div>' ;

                    }

                    $row += attach;

                var attach='';

                }

                

                $row += "</td></tr>";

            $('#lawList').append($row)

            s++;

                

           }
        if(archive.type=="contractArchive")

           { $row="<tr>"+

                "<td>"+s+"</td>"+

                "<td>"+(archive.serisal??'')+"</td>"+
                "<td>"+(archive.date??"")+"</td>"+

                "<td>"+(archive.title??"")+"</td>"+
                "<td>"+(archive.archive_type != null ?archive.archive_type.name :'' )+"</td>"+
                "<td>";
                    if(archive.copy_to){
                        $copy='';
                        for(j=0;j<archive.copy_to.length;j++){
    
                                $copy+=''+archive.copy_to[j].name+' , ' ;
                        }
                        $row += $copy;
                    }
                    $row += '</td>';
                $row +="<td>"+archive.admin.nick_name+"</td>";
                    $row += '<td>';

                attach='';

                if(archive.files.length>0){

                    console.log(archive.files.length);

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

                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                                +'    </div>'

                                +'  </div>' ;

                    }

                    $row += attach;

                var attach='';

                }

                

                $row += "</td></tr>";

            $('#contractList').append($row)

            s++;

                

           }
        if(archive.type=="outArchive")

           { $row="<tr>"+

                "<td>"+s+"</td>"+

                "<td>"+(archive.serisal??'')+"</td>"+
                "<td>"+(archive.date??"")+"</td>"+

                "<td>"+(archive.title??"")+"</td>"+

                "<td>";
                    if(archive.copy_to){
                        $copy='';
                        for(j=0;j<archive.copy_to.length;j++){
    
                                $copy+=''+archive.copy_to[j].name+' , ' ;
                        }
                        $row += $copy;
                    }
                    $row += '</td>';
                $row +="<td>"+archive.admin.nick_name+"</td>";
                    $row += '<td>';

                attach='';

                if(archive.files.length>0){

                    console.log(archive.files.length);

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

                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                                +'    </div>'

                                +'  </div>' ;

                    }

                    $row += attach;

                var attach='';

                }

                

                $row += "</td></tr>";

            $('#msgList1').append($row)

            s++;

                

           }

           if(archive.type=="inArchive")

           { $row="<tr>"+

                "<td>"+w+"</td>"+

                "<td>"+(archive.serisal??'')+"</td>"+
                "<td>"+(archive.date??'')+"</td>"+
                "<td>"+(archive.title??'')+"</td>"+
                "<td>";
                    if(archive.copy_to){
                        $copy='';
                        for(j=0;j<archive.copy_to.length;j++){
    
                                $copy+=''+archive.copy_to[j].name+' , ' ;
                        }
                        $row += $copy;
                    }
                    $row += '</td>';
                    $row +="<td>"+(archive.admin==null?'':archive.admin.nick_name)+"</td>";
                    $row += '<td>';
                    attach='';

                    if(archive.files.length>0){

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

                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                                +'    </div>'

                                +'  </div>' +

                                '</div>';

                                

                    }

                    $row += attach;   

                var attach='';    

                }

                         

                $row += "</td></tr>";

            $('#msgRList1').append($row)

            w++;

           }

           if(archive.type=="projArchive"||archive.type=='munArchive'||archive.type=='empArchive'||archive.type=='assetsArchive'||archive.type=='citArchive'||archive.type=='depArchive')

           { $row="<tr>"+

                "<td>"+p+"</td>"+

                "<td>"+(archive.serisal!=null?(archive.serisal):'-')+"</td>"+

                "<td>"+(archive.title??'')+"</td>"+

                "<td>"+(archive.archive_type!=null?(archive.archive_type.name):'بدون تصنيف')+"</td>"+
                // "<td>"+(archive.archive_type!=null?archive.archive_type.name:'بدون تصنيف')+"</td>"+

                "<td>"+(archive.date??'')+"</td>"+

                "<td>"+(archive.admin==null?'':archive.admin.nick_name)+"</td>"+

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

            $('#msgOList11').append($row)

            p++;

            }

        

        

    });

    $('.lawTbl').DataTable({

        dom: 'Bfltip',

            buttons: [

                {

                    extend: 'excel',

                    tag: 'img',

                    title:'',

                    attr:  {

                        title: 'excel',

                        src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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


    $('.SaderTbla').DataTable({

        dom: 'Bfltip',

            buttons: [

                {

                    extend: 'excel',

                    tag: 'img',

                    title:'',

                    attr:  {

                        title: 'excel',

                        src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

    

    $('.waredTbla').DataTable({



        dom: 'Bfltip',

            buttons: [

                {

                    extend: 'excel',

                    tag: 'img',

                    title:'',

                    attr:  {

                        title: 'excel',

                        src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

    $('.OtherTbla').DataTable({

        dom: 'Bfltip',

            buttons: [

                {

                    extend: 'excel',

                    tag: 'img',

                    title:'',

                    attr:  {

                        title: 'excel',

                        src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

    @if ($type=="subscriber")

        $archivesLic.forEach(archive => {

           if(archive.type=="licArchive")

           { $row="<tr>"+

                "<td>"+lc+"</td>"+

                "<td>"+(archive.fileNo??'')+"</td>"+

                "<td>"+(archive.licNo??"")+"</td>"+
                
                // "<td>"+(buildArray[archive.license_type]??'')+"</td>"+
                "<td>"+(archive.licn??'')+"</td>"+
                "<td>"+(archive.licnfile??'')+"</td>"+
                "<td>"+(archive.use_desc??'')+"</td>"+
                "<td>";

                    attach='';
                    attach+='<div class=" row">';
                    if(archive.files){

                    var j=0;

                    for(j=0;j<archive.files.length;j++){
                        // shortCutName=archive.files[j].real_name;

                        // urlfile='{{ asset('') }}';

                        // urlfile+=archive.files[j].url;
                        extension=archive.files[j].url.split('.');

                        if(extension[1]=="jpg"||extension[1]=="png")

                        fileimage='{{ asset('assets/images/ico/image.png') }}';

                        else if(extension[1]=="pdf")

                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';

                        else if(extension[1]=="excel"||extension[1]=="xsc")

                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';

                        else

                        fileimage='{{ asset('assets/images/ico/file.png') }}';

                        //     shortCutName=shortCutName.substring(0, 20);

                            // attach+='<div id="attach" class=" col-sm-12 ">' +

                            //     '   <div class="attach" onmouseover="$(this).children().first().next().show()">'

                            //     +'    <span class="attach-text">'+shortCutName+'</span>'

                            //     +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><i class="fa fa-eye"></i></a>'

                            //     +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                            //     +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                            //     +'    </div>'

                            //     +'  </div>' +

                            //     '</div>'
                                
                                urlfile='{{ asset('') }}';
                                urlfile+=archive.files[j].url;
                                formDataStr="formDataaa";
                                // fileimage='{{ asset('assets/images/ico/file.png') }}';
                                attach+='<div id="attach" class=" col-sm-6 ">'
                                +'   <div class="attach" onmouseover="$(this).children().first().next().show()">'
    
                                +'    <span class="attach-text">'+archive.files[j].real_name+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+archive.files[j].real_name+'">'
    
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+archive.files[j].real_name+'">'
    
                                +'    </div>'
    
                                +'  </div>' 
    
                                // '</div>'

                    }           
                    attach+='  </div>';
                    $row += attach;

                    attach='';

                }
              
                $row += "</td></tr>";

            $('#licList').append($row)

            lc++;

           }

        //    if(archive.type=="licFileArchive")

        //    { $row="<tr>"+

        //         "<td>"+lf+"</td>"+

        //         "<td>"+archive.licNo+"</td>"+

        //         "<td>"+archive.license_id+"</td>"+

        //         "<td>"+buildArray[archive.license_type]+"</td>"+
        //         "<td>"+archive.licn+"</td>"+
        //         "<td>"+archive.licnfile+"</td>"+
                
        //         "<td>";

        //             attach='';

        //             if(archive.files){

        //             var j=0;

        //             for(j=0;j<archive.files.length;j++){

        //                 shortCutName=archive.files[j].real_name;

        //                 urlfile='{{ asset('') }}';

        //                 urlfile+=archive.files[j].url;

        //                 if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")

        //                 fileimage='{{ asset('assets/images/ico/image.png') }}';

        //                 else if(archive.files[j].extension=="pdf")

        //                 fileimage='{{ asset('assets/images/ico/pdf.png') }}';

        //                 else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")

        //                 fileimage='{{ asset('assets/images/ico/excellogo.png') }}';

        //                 else

        //                 fileimage='{{ asset('assets/images/ico/file.png') }}';

        //                     shortCutName=shortCutName.substring(0, 20);

        //                     attach+='<div id="attach" class=" col-sm-12 ">' +

        //                         '   <div class="attach" onmouseover="$(this).children().first().next().show()">'

        //                         +'    <span class="attach-text">'+shortCutName+'</span>'

        //                         +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'

        //                         +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

        //                         +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

        //                         +'    </div>'

        //                         +'  </div>' +

        //                         '</div>'

        //             }

        //             $row += attach;

        //             attach='';

        //         }

                

               

        //         $row += "</td></tr>";

        //     $('#licFileList').append($row)

        //     lf++;

        //    }

        });

        $('.licTbl').DataTable({

        dom: 'Bfltip',

            buttons: [

                {

                    extend: 'excel',

                    tag: 'img',

                    title:'',

                    attr:  {

                        title: 'excel',

                        src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

    // $('.licFileTbl').DataTable({

    //     dom: 'Bfltip',

    //         buttons: [

    //             {

    //                 extend: 'excel',

    //                 tag: 'img',

    //                 title:'',

    //                 attr:  {

    //                     title: 'excel',

    //                     src:'{{asset('assets/images/ico/excel.png')}}',

    //                     style: 'cursor:pointer;height:40px',

    //                 },



    //             },

    //             {

    //                 extend: 'print',

    //                 tag: 'img',

    //                 title:'',

    //                 attr:  {

    //                     title: 'print',

    //                     src:'{{asset('assets/images/ico/Printer.png')}} ',

    //                     style: 'cursor:pointer;height: 32px;',

    //                     class:"fa fa-print"

    //                 },

    //                 customize: function ( win ) {

                  

 

    //                 $(win.document.body).find( 'table' ).find('tbody')

    //                     .css( 'font-size', '20pt' );

    //                 }

    //             },

    //             ],

            

    //         "language": {

    //                     "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",

    //                     "sLoadingRecords": "جارٍ التحميل...",

    //                     "sProcessing":   "جارٍ التحميل...",

    //                     "sLengthMenu":   "أظهر _MENU_ مدخلات",

    //                     "sZeroRecords":  "لم يعثر على أية سجلات",

    //                     "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",

    //                     "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",

    //                     "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",

    //                     "sInfoPostFix":  "",

    //                     "sSearch":       "ابحث:",

    //                     "sUrl":          "",

    //                     "oPaginate": {

    //                         "sFirst":    "الأول",

    //                         "sPrevious": "السابق",

    //                         "sNext":     "التالي",

    //                         "sLast":     "الأخير"

    //                     },

    //                     "oAria": {

    //                         "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",

    //                         "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"

    //                     }

    //                 }

    // });

    @endif

   $copyTo.forEach(copy => {

    if(copy.archive){

            $row="<tr>"+

                "<td>"+c+"</td>"+

                "<td>"+(copy.archive.serisal==null?'-':copy.archive.serisal)+"</td>"+

                "<td>"+copy.archive.title+"</td>"+
                
                 "<td>"+copy.archive.archive_type==null?'':copy.archive.archive_type.name+"</td>"+
                 
                "<td>"+(copy.archive.name??'')+"</td>"+

                "<td>"+(copy.archive.date??'')+"</td>"+

                "<td>"+(copy.archive.admin=null?'':copy.archive.admin.nick_name)+"</td>"+

                "<td>";

                    attach='';

                    if(copy.archive.files.length>0){

                    var j=0;

                    for(j=0;j<copy.archive.files.length;j++){

                        shortCutName=copy.archive.files[j].real_name;

                        urlfile='{{ asset('') }}';

                        urlfile+=copy.archive.files[j].url;

                        if(copy.archive.files[j].extension=="jpg"||copy.archive.files[j].extension=="png")

                        fileimage='{{ asset('assets/images/ico/image.png') }}';

                        else if(copy.archive.files[j].extension=="pdf")

                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';

                        else if(copy.archive.files[j].extension=="excel"||copy.archive.files[j].extension=="xsc")

                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';

                        else

                        fileimage='{{ asset('assets/images/ico/file.png') }}';

                            shortCutName=shortCutName.substring(0, 20);

                            attach+='<div id="attach" class=" col-sm-12 ">' +

                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'

                                +'    <span class="attach-text">'+shortCutName+'</span>'

                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'

                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'

                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'

                                +'    </div>'

                                +'  </div>' +

                                '</div>'

                    }

                    $row += attach;

                    attach='';

                }

                

               

                $row += "</td></tr>";

            $('#copyToList').append($row)

            c++;}

  });

  $('.copyToTbl').DataTable({



        dom: 'Bfltip',

        buttons: [

            {

                extend: 'excel',

                tag: 'img',

                title:'',

                attr:  {

                    title: 'excel',

                    src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

    $jalArchive.forEach(jal => {
    if(jal)
    {
            
            $row="<tr>"+

                "<td>"+c+"</td>"+
                
                "<td>"+jal.agenda_detail.agenda_extention.name+"</td>"+
                

                "<td>"+jal.agenda_detail.agenda_number+"</td>"+
                "<td>"+jal.agenda_detail.agenda_date+"</td>"+

                "<td>"+jal.title+"</td>"+

                "<td>"+jal.descision+"</td>";

                    id=jal.id;
                                attach='';
                                for(j=0;j<jal.files.length;j++){
                                    shortCutName=jal.files[j].real_name;
                                    shortCutName=shortCutName.substring(0, 20);
                                    if(jal.files[j].extension=="jpg"||jal.files[j].extension=="png")

                                    fileimage='{{ asset('assets/images/ico/image.png') }}';
                    
                                    else if(jal.files[j].extension=="pdf")
                    
                                    fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                    
                                    else if(jal.files[j].extension=="excel"||jal.files[j].extension=="xsc")
                    
                                    fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                    
                                    else
                    
                                    fileimage='{{ asset('assets/images/ico/file.png') }}';
                                        attach+='       <div id="attach" class=" col-sm-12 ">   ' +
                                    '           <div class="attach" onmouseover="$(this).children().first().next().show()">		' +
                                    '               <span class="attach-text">'+shortCutName+'</span>		' +
                                    '                   <a class="attach-close1" href="{{asset('')}}'+jal.files[j].url+'" style="color: #74798D; float:left;" target="_blank">' +
                                    '                      <img style="width: 20px;"src="'+fileimage+'">' +
                                    '                   </a>		' +
                                    '                 <input type="hidden" id="subject'+id+'imgUploads[]" name="subject'+id+'imgUploads[]" value="'+jal.files[j].real_name+'">      ' +
                                    '                 <input type="hidden" id="subject'+id+'orgNameList[]" name="subject'+id+'orgNameList[]" value="'+jal.files[j].url+'">      ' +
                                    '                 <input type="hidden" id="subject'+id+'id[]" name="subject'+id+'id[]" value="'+jal.files[j].id+'">		' +
                                    '           </div>	' +
                                '             </div>' ;
                                }
                                
                                $row +='<td>'
                                +'        <div class="row">'
                                +'        <div class="col-8">'

                                +'        <div class="row subject'+id+'ImagesArea">'+attach+'               </div>'
                                +'        <div class="row subject'+id+'FilesArea">'
                                +'        </div>'
                                +'        </div>'
                                +'    <div class="col-4">'
                                +'            <span class="attach-icons" style="margin-left: 0px;">'
                                +'               <a href="{{ url('') }}/ar/admin/printDes/'+id+'"  class="attach-icon" target="_blank">'
                                +'                   <img src="https://db.expand.ps/images/printer.jpeg" style="height: 32px;">'
                                +'                </a>'
                                +'            </span>'
                                +'   </div>'
                                +'        </div>'
                                +'   </td>'
                                
                                // "<td>"+jal.descision+"</td></tr>";
                                
                                
                                $row += "</tr>";

            $('#jal_list').append($row)

            c++;
        
    }

  });

  $('.jal_table').DataTable({



        dom: 'Bfltip',

        buttons: [

            {

                extend: 'excel',

                tag: 'img',

                title:'',

                attr:  {

                    title: 'excel',

                    src:'{{asset('assets/images/ico/excel.png')}}',

                        style: 'cursor:pointer;height:40px',

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

    @endif

}

</script>



