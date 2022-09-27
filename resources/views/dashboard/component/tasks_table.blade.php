<style>
    .dt-buttons {
        text-align: left;
        display: inline;
        float: left;
        position: relative;
        bottom: 10px;
        margin-right: 10px;
    }
    .detailsTB th{
        color:#ffffff;
    }
      .detailsTB th,.detailsTB td{
        text-align:right !important;
        
    }
    .recList>tr>td{
        font-size:12px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding-bottom: 5px !important;
    }
    .dataTables_filter{
        margin-top:-15px;
    }
    .even{
        background-color:#D7EDF9 !important;
    }
</style>

<div class="modal fade text-left" id="AppModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">

    <div class="modal-dialog"  role="document">

        <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title" id="myModalLabel1">{{trans('admin.system_order')}}

                                (<span id="repName"></span>)
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

									<li class="nav-item" >

										<a class="nav-link active" style="color:#0073AA" id="base-tab1" data-toggle="tab" aria-controls="ctab1" href="#ctab1" aria-expanded="true">
                                        <b >
                                        
											<img src="https://db.expand.ps/images/Eng64.png" height="32" />
                                            {{trans('admin.engineering_requests')}}
											(<span id="ctabCnt1"></span>) 

										</b></a>

									</li>

									<li class="nav-item">

										<a class="nav-link" style="color:#0073AA" id="base-tab2" data-toggle="tab" aria-controls="ctab2" href="#ctab2" aria-expanded="false">
                                        <b>
                                        
											<img src="https://db.expand.ps/images/electric64.png" height="32" />
                                            {{trans('admin.electricity_requests')}}
											(<span id="ctabCnt2"></span>)</b></a>

									</li>

									<li class="nav-item">

										<a class="nav-link" style="color:#0073AA" id="base-tab3" data-toggle="tab" aria-controls="ctab3" href="#ctab3" aria-expanded="false">
                                        <b>
                                        
											<img src="https://db.expand.ps/images/water-faucet64.png" height="32" />
                                            {{trans('admin.water_requsts')}}
											(<span id="ctabCnt3"></span>)

										</b></a>

									</li>

									<li class="nav-item">

										<a class="nav-link" style="color:#0073AA" id="base-tab4" data-toggle="tab" aria-controls="ctab4" href="#ctab4" aria-expanded="false">
                                        <b>
                                        
											<img src="https://db.expand.ps/images/icon/TaskIcons8.png" height="32" />
                                                {{trans('admin.miscellaneous_requests')}}
											(<span id="ctabCnt4"></span>)

										</b>

										</a>

									</li>

								</ul>

                				<div class="tab-content px-1 pt-1">
                
                					<div role="tabpanel" class="tab-pane active" id="ctab1" aria-expanded="true" aria-labelledby="base-tab1">
                
                						<p>
                
                							<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 tasktbl1" >
                
                							    <thead>
                
                									<tr>
                
                										<th scope="col" style="text-align: right;color:#ffffff">#</th>
                
                										<th scope="col" style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp;{{trans('admin.sender')}}  </th>
                
                										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/TaskIcons8.png" height="32" /> &nbsp;{{trans('admin.task_title')}}</th>
                
                										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/openDateIcon.png" height="32" /> &nbsp;{{trans('admin.opening_date')}}</th>
                
                										<th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp; {{trans('admin.action')}}</th>
                
                									</tr>
                
                								</thead>
                
                							<tbody id="cMyTask1">
                
                							</tbody>
                
                						</table>
                
                						</p>
                
                					</div>
                
                					<div class="tab-pane" id="ctab2" aria-labelledby="base-tab2">
                
                						<p>
                
                
                
                						<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl2 tasktbl2"  >
                
                						    <thead>
                
                							<tr>
                
                										<th scope="col" style="text-align: right;color:#ffffff">#</th>
                
                										<th scope="col" style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp;{{trans('admin.sender')}}  </th>
                
                										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/TaskIcons8.png" height="32" /> &nbsp;{{trans('admin.task_title')}}</th>
                
                										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/openDateIcon.png" height="32" /> &nbsp;{{trans('admin.opening_date')}}</th>
                
                										<th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp; {{trans('admin.action')}}</th>
                
                							</tr>
                
                							</thead>
                
                							
                
                							<tbody id="cMyTask2">
                
                							</tbody>
                
                						</table>
                
                						</p>
                
                					</div>
                
                					<div class="tab-pane" id="ctab3" aria-labelledby="base-tab3">
                
                						<p>
                
                						<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl3 tasktbl3" >
                
                						    <thead>
                
                							<tr>
                
            										<th scope="col" style="text-align: right;color:#ffffff">#</th>
            
            										<th scope="col" style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff">
            
            											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp;{{trans('admin.sender')}}  </th>
            
            										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
            
            											<img src="https://db.expand.ps/images/icon/TaskIcons8.png" height="32" /> &nbsp;{{trans('admin.task_title')}}</th>
            
            										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
            
            											<img src="https://db.expand.ps/images/icon/openDateIcon.png" height="32" /> &nbsp;{{trans('admin.opening_date')}}</th>
            
            										<th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">
            
            											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp; {{trans('admin.action')}}</th>
                
                							</tr>
                
                							</thead>
                
                							<tbody id="cMyTask3">
                
                							</tbody>
                
                						</table>
                
                						</p>
                
                					</div>
                
                					<div class="tab-pane" id="ctab4" aria-labelledby="base-tab4">
                
                						<p>
                
                						<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl4 tasktbl4" >
                
                						    <thead>
                
                							<tr>
                
                										<th scope="col" style="text-align: right;color:#ffffff">#</th>
                
                										<th scope="col" style="text-align:  right; direction:rtl; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp;  </th>
                
                										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/TaskIcons8.png" height="32" /> &nbsp;{{trans('admin.task_title')}}</th>
                
                										<th scope="col" style="text-align: right; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/openDateIcon.png" height="32" /> &nbsp;{{trans('admin.opening_date')}}</th>
                
                										<th scope="col" style="text-align: center; font-family: Arial, sans-serif !important;color:#ffffff">
                
                											<img src="https://db.expand.ps/images/icon/toolsIcon.png" height="32" /> &nbsp; {{trans('admin.action')}}</th>
                
                							</tr>
                
                							</thead>

                							<tbody id="cMyTask4">
                
                							</tbody>
                
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



</script>