
@extends('layouts.admin')
@section('search')
<!--<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round home_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>-->
@endsection
@section('content')
<style>
    @media (max-width:802px){
    .hidemob{
        display:none!important;
    }
    .showmob{
        display:inline-block!important;
    }
    .dataTables_length
    {
        float:left!important;
            margin-left: 15px;
    }
    .dataTables_filter>label{
        float:right!important;
        margin-top:0!important;
    }
    .noP{
        padding-right:5px!important;
        color: rgb(0, 115, 170)!important;
    }
    }
</style>
<div class="app-content container center-layout mt-2" style="overflow: auto;margin-top: 0px !important;">
	<div class="content-wrapper " style=" padding-top: 0px;">
		<div class="row ">
		    
			<div class="col-md-4">
			</div>
			
			<div class="col-md-4" style="text-align: center;padding-top: 10px;">
				<img src="https://db.expand.ps/images/intro.png">
			</div>
			
			<div class="col-md-4">
			</div>
			
		</div>
		
		<div class="row hidemob">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				&nbsp;<input id="searchContent" name="searchContent" class="form-control round ac1 hideMob home_search ui-autocomplete-input" placeholder="بحث" style="text-align: center;" autocomplete="off">
			</div>
			<div class="col-md-4">
			</div>
		</div>
		
		<div class="row hidemob">
		    <div class="col-sm-12">
		        &nbsp;
		    </div>
		</div>
		
		
		
        

	</div>
</div>

<div class="row" style="text-align: center;padding-top: 0px;">
			
			<div class="col-md-12">
			    
				<form id="menuFavorit">
                    <div class="row " style="display: flex;justify-content: center;">
       					{{--@can('myTaskTable')
    					<div class="col-md-1 showmob hide" style="text-align: center; padding: 5px;">
    					    <li class="dropdown nav-item " data-menu="dropdown" style="list-style: none;"  title="مهامى">
                				<a class="dropdown-toggle nav-link" onclick="showTasks(); ">
                					<span style="display: inline;">
                					    <img src="{{asset('assets/images/ico/done.png')}}" style="padding:5px; ;height: 64px;"> 
                					    <div  style="color: #000000;">مهامى </div>    
            					    </span>
                				</a>
                			</li>
    					</div>
    					@endcan--}}
    					<input type="hidden" name="showTask" id="showTask" value="0">
    					
				    </div>
    				    <div style="position:fixed; top:15%;right:0px;padding:20px;display:none;">
    				    <div>
    				        <span style="">
        					    <img src="https://db.expand.ps/images/complains.png" style="padding:5px; ;height: 64px;"> 
        					    <div style="color: #000000;">الشكاوى</div>    
        					</span>
    				    </div>
    				    <div>
    				        <span style="display: inline;">
        					    <img src="https://db.expand.ps/images/Eng64.png" style="padding:5px; ;height: 64px;"> 
        					    <div style="color: #000000;">التنظيم والبناء</div>    
    					    </span>
    				    </div>
    				    <div>
    				        <span style="display: inline;">
        					    <img src="https://db.expand.ps/images/electric64.png" style="padding:5px; ;height: 64px;"> 
        					    <div style="color: #000000;">طلبات الكهرباء</div>    
    					    </span>
    				    </div>
    				    <div>
    				        <span style="display: inline;">
        					    <img src="https://db.expand.ps/images/water-faucet64.png" style="padding:5px; ;height: 65px;"> 
        					    <div style="color: #000000;">طلبات المياه</div>    
    					    </span>
    				    </div>
    				    <div>
    				        <span style="display: inline;">
        					    <img src="https://db.expand.ps/images/certificate64.png" style="padding:5px; ;height: 64px;"> 
        					    <div style="color: #000000;">الشهادات </div>    
    					    </span>
    				    </div>
    				</div>
			    </form>
			    
			</div>
			
		</div>
@canany(['onlyTaskTable'])

<div class="row hidemob TaskModel">
    <div class="col-sm-12">
        
        <div class="form-group">

            <?php $days=array(
                'Mon'=>'الإثنين',
                'Tue'=>'الثلاثاء',
                'Wed'=>'الأربعاء',
                'Thu'=>'الخميس',
                'Fri'=>'الجمعة',
                'Sat'=>'السبت',
                'Sun'=>'الأحد',
                ); ?>
            <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">

	            <li class="nav-item">

					<a  class="nav-link active list1" style="color: #0073AA;" id="base-tab1" data-toggle="tab" aria-controls="ctab1" href="#ctab1" aria-expanded="true" >
					<b>
						<span class="list1Title" >مهامى</span>
						(<span id="ctabCnt1">{{sizeof($myTask)}}</span>) 

					</b></a>

				</li>
                <!--style="width: max-content;"-->
				<li class="nav-item" >

					<a   class="nav-link list2" style="color: #0073AA;" id="base-tab2" data-toggle="tab" aria-controls="ctab2" href="#ctab2" aria-expanded="false">
					<b>
					    <span class="list2Title" >مهام مؤجله</span>
						(<span id="ctabCnt2">{{sizeof($waittingTask)}}</span>)</b></a>

				</li>

				<li class="nav-item">

					<a  class="nav-link list3" style="color: #0073AA;" id="base-tab3" data-toggle="tab" aria-controls="ctab3" href="#ctab3" aria-expanded="false">
					<b>
					    <span class="list3Title" >مهام للاطلاع</span>
						(<span id="ctabCnt3">{{sizeof($taggedTask)}}</span>)

					</b></a>

				</li>

				<li class="nav-item">

					<a  class="nav-link list4" style="color: #0073AA;" id="base-tab4" data-toggle="tab" aria-controls="ctab4" href="#ctab4" aria-expanded="false">
					<b>
					    <span class="list4Title" >مهام قمت بتحويلها</span>
						(<span id="ctabCnt4">{{sizeof($sentTask)}}</span>)

					</b>

					</a>

				</li>

			</ul>
			<div class="tab-content px-1 pt-1" style="direction: rtl;max-height: 400px;overflow: auto;">
				<div role="tabpanel" class="tab-pane active" id="ctab1" aria-expanded="true" aria-labelledby="base-tab1">
					<p>
						<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 myTaskTable" >

							<thead width='100%'>

								<tr>

									<th class="" scope="col" style="text-align: right; color:#ffffff" >#</th>

									<th class="col-md-2 hideMob" scope="col" style="text-align:  right; direction:rtl;   color:#ffffff">

										 {{"المرسل"}}  </th>

									<th class="col-md-2" scope="col" style="text-align: right; color:#ffffff">

										 {{"اسم المستفيد"}}</th>

									<th class="col-md-2" scope="col" style="text-align: right; color:#ffffff">

										{{trans('admin.task_title')}}</th>

									<th class="col-md-3 hideMob" scope="col" style="text-align: center; color:#ffffff" >

									{{trans('admin.opening_date')}}</th>

									<th class="col-md-3 hideMob" scope="col" style="text-align: center; color:#ffffff">

									{{'الإجراءات'}}</th>

								</tr>

							</thead>

						<tbody id="cMyTask1">


						</tbody>

					</table>
                       
					</p>

				</div>

				<div class="tab-pane" id="ctab2" aria-labelledby="base-tab2">

					<p>
						<table style="width:100%; margin-top: 10px;direction: rtl;" class=" detailsTB table hdrTbl1 wtbl2" >

							<thead width='100%' id="wtbl2Header">

								<tr>

									<th class="" style="text-align: right; color:#ffffff" >#</th>

									<th class="col-md-2 hideMob"  style="text-align:  right; color:#ffffff;">

										 {{"المرسل"}}  </th>

									<th class="col-md-2"  style="text-align: right;  color:#ffffff;">

										 {{"اسم المستفيد"}}</th>

									<th class="col-md-2"  style="text-align: right; color:#ffffff;">

									{{trans('admin.task_title')}}</th>
									

									<th class="col-md-1 hideMob"  style="text-align: right;  color:#ffffff;">

										{{'الحالة'}}</th>

									<th class="col-md-2 hideMob" style="text-align: center; color:#ffffff;" >

									{{trans('admin.opening_date')}}</th>

									<th class="col-md-3 hideMob"  style="text-align: center; color:#ffffff; width:100% !important;" colspan="1">

									{{'الإجراءات'}}</th>

								</tr>

							</thead>

						<tbody id="cMyTask2">
                           


						</tbody>

					</table>
                    
					</p>

				</div>

				<div class="tab-pane" id="ctab3" aria-labelledby="base-tab3">

					<p>

						<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 wtbl3" >

							<thead width='100%'>

								<tr>

									<th class="" scope="col" style="text-align: right; color:#ffffff" >#</th>

									<th class="col-md-2 hideMob"  style="text-align:  right; direction:rtl;   color:#ffffff">

										 {{"المرسل"}}  </th>

									<th class="col-md-2"  style="text-align: right;   color:#ffffff">

										 {{"اسم المستفيد"}}</th>

									<th class="col-md-2" style="text-align: right;   color:#ffffff">

											{{trans('admin.task_title')}}</th>

									<th class="col-md-3 hideMob" style="text-align: center;   color:#ffffff" >

							            	{{trans('admin.opening_date')}}</th>

									<th class="col-md-3 hideMob" style="text-align: center;   color:#ffffff">

									{{'الإجراءات'}}</th>

								</tr>

							</thead>

						<tbody id="cMyTask3">
                           

						</tbody>

					</table>


					</p>

				</div>

				<div class="tab-pane" id="ctab4" aria-labelledby="base-tab4">

					<p>

						<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 wtbl4" >

						<thead width='100%'>

						<tr>

									<th class="" scope="col" style="text-align: right; color:#ffffff" >#</th>

									<th class="col-md-2 hideMob"  style="text-align:  right; direction:rtl;   color:#ffffff">

										 {{"تم تحويلها إلى"}}  </th>

									<th class="col-md-2"  style="text-align: right;   color:#ffffff">

										 {{"اسم المستفيد"}}</th>

									<th class="col-md-2"  style="text-align: right;   color:#ffffff">

										
	                                    {{trans('admin.task_title')}}</th>
									<th class="col-md-3 hideMob" style="text-align: center;   color:#ffffff" >

                                        	{{trans('admin.opening_date')}}</th>
									<!-- <th class="col-md-3" scope="col" style="text-align: center;   color:#ffffff">

									{{'الإجراءات'}}</th> -->

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
@endcanany
                    
                    <div class="row d-flex justify-content-sm-center" >
                        @can('waterTasks')
    					<div class="col-md-1 w-iconmob hidedesc" style="text-align: center; padding: 5px;">
                				<a class="dropdown-toggle nav-link" style="color: #ffffff;" href="/" data-toggle="dropdown" aria-expanded="true">
                					<span style="display: inline;">
                					    <img src="https://db.expand.ps/images/water-faucet64.png" style="padding:5px; ;height: 65px;"> 
                					    <div style="color: #000000;">طلبات المياه</div>    
            					    </span>
                				</a>
                				<ul class="dropdown-menu menumob" style="width: 200px;list-style: none">
                				    
                					@can('waterSubscription')
					                <li data-menu="">
                						<a class="dropdown-item" href="{{route('waterSubscription')}}">طلب اشتراك مياه</a>
                					</li>
                					@endcan
                					@can('waterMalfunction')
            					    <li data-menu="">
                					    <a class="dropdown-item" href="{{route('waterMalfunction')}}">عطل مياه لمشترك</a>
                					</li>
                					@endcan
                					@can('waterPermission')
                					<li data-menu="">
            							<a class="dropdown-item" href="{{route('waterPermission')}}">اذن اشغال عقار مياه</a>
                					</li>
                					@endcan
                					@can('globalWaterMalfunction')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('globalWaterMalfunction')}}">عطل مياه عام</a>
                					</li>
                					@endcan
                					@can('waterMeterCheck')
                					<li data-menu="">
            						    <a class="dropdown-item" href="{{route('waterMeterCheck')}}">فحص عداد مياه</a>
                					</li>
                					@endcan
                					@can('waterLineDisconnect')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('waterLineDisconnect')}}">فصل خط مياه</a>
                					</li>
                					@endcan
                					@can('waterLineReconnect')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('waterLineReconnect')}}">إعادة وصل خط مياه</a>
                					</li>
                					@endcan
                					@can('waiveWaterSubscription')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('waiveWaterSubscription')}}">تنازل عن اشتراك مياه</a>
                					</li>
                					@endcan
                					@can('waterMeterRead')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('waterMeterRead')}}">تغيير عداد مياه</a>
                					</li>
                					@endcan
                					@can('waterMeterTransfer')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('waterMeterTransfer')}}">نقل عداد مياه</a>
                					</li>
                					@endcan
                					@can('waterFinancialTransfer')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('waterFinancialTransfer')}}">نقل ذمة مالية/مياه</a>
                					</li>
                					@endcan
            				    </ul>
    					</div>
    					@endcan
			            @can('elecTasks')
					    <div class="col-md-1 w-iconmob hidedesc" style="text-align: center; padding: 5px;">
                				<a class="dropdown-toggle nav-link" style="color: #ffffff;" href="/" data-toggle="dropdown" aria-expanded="false">
                					<span style="display: inline;">
                					    <img src="https://template.expand.ps/public/assets/images/ico/elecicon1.jpg" style="padding:5px; ;height: 64px;"> 
                					    <div style="color: #000000;">طلبات الكهرباء</div>    
            					    </span>
                				</a>
                				<ul class="dropdown-menu menumob" style="width: 200px;list-style: none">
                				                @can('elecSubscription')    
	                        					<li data-menu="">
                        					        <a class="dropdown-item" href="{{route('elecSubscription')}}">طلب اشتراك كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('elecMalfunction')  
                        					    <li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecMalfunction')}}">عطل كهرباء لمشترك</a>
                            					</li>
                            					@endcan
                            					@can('elecPermission')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecPermission')}}">إذن اشغال عقار كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('globalelecMalfunction')  
	                        					<li data-menu="">
                        					    	<a class="dropdown-item" href="{{route('globalelecMalfunction')}}">عطل كهرباء عام</a>
                            					</li>
                            					@endcan
                            					@can('elecMeterCheck')  
                        					    <li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecMeterCheck')}}">فحص عداد كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('elecLineDisconnect')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecLineDisconnect')}}">فصل خط كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('elecLineReconnect')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecLineReconnect')}}">إعادة وصل خط كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('waiveelecSubscription')
                        					    <li data-menu="">
                            						<a class="dropdown-item" href="{{route('waiveelecSubscription')}}">تنازل عن اشتراك كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('elecMeterRead')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecMeterRead')}}">قراءة عداد طاقة شمسية</a>
                            					</li>
                            					@endcan
                            					@can('elecMeterTransfer')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecMeterTransfer')}}">نقل عداد كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('elecFinancialTransfer')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('elecFinancialTransfer')}}">نقل ذمة مالية/كهرباء</a>
                            					</li>
                            					@endcan
                            					@can('newTicket37')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('newTicket37')}}">نقل عامود كهرباء/كابل</a>
                            					</li>
                            					@endcan
                            					@can('newTicket16')
                        					    <li data-menu="">
                            						<a class="dropdown-item" href="{{route('newTicket16')}}">رفع قدرة العداد (زيادة أمبيرات)</a>
                            					</li>
                            					@endcan
                            					@can('newTicket27')
                        					    <li data-menu="">
                            						<a class="dropdown-item" href="{{route('newTicket27')}}">اصلاح/تركيب وحدات انارة تالفة</a>
                            					</li>
                            					@endcan
                            					@can('newTicket29')
	                        					<li data-menu="">
                            						<a class="dropdown-item" href="{{route('newTicket29')}}">ربط خلايا شمسية</a>
                            					</li>
                            					@endcan
                            					@can('newTicket36')
        					                    <li data-menu="">
                            						<a class="dropdown-item" href="{{route('newTicket36')}}">لوحة عرس (اشتراك مؤقت)</a>
                            					</li>
                            					@endcan
                            					@can('newTicket39')
        					                    <li data-menu="">
                            						<a class="dropdown-item" href="{{route('newTicket39')}}">طلب تحويل من 1 إلى 3 فاز</a>
                            					</li>
                            					@endcan
                            					
        		            				</ul>

    					</div>
    					@endcan
    					
    					@can('engTasks')
    					<div class="col-md-1 w-iconmob hidedesc" style="text-align: center; padding: 5px;">
                				<a class="dropdown-toggle nav-link" style="color: #ffffff;" href="/" data-toggle="dropdown" aria-expanded="true">
                					<span style="display: inline;">
                					    <img src="https://db.expand.ps/images/Eng64.png" style="padding:5px; ;height: 64px;"> 
                					    
                					    <div style="color: #000000;">التنظيم والبناء</div>    
            					    </span>
                				</a>
                				<ul class="dropdown-menu menumob" style="width: 200px;list-style: none">
                				    
    					            @can('straightening')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('straightening')}}">طلب استقامة</a>
                					</li>
                					@endcan
    					            @can('licenseFile')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('licenseFile')}}">فتح ملف ترخيص</a>
                					</li>
                					@endcan
    					            @can('buildingLicense')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('buildingLicense')}}">ترخيص بناء </a>
                					</li>
                					@endcan
    					            @can('sitePlan')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('sitePlan')}}">مخطط موقع</a>
                					</li>
                					@endcan
    					            @can('engineeringValidation')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('engineeringValidation')}}">مصادقة مخططات هندسية</a>
                					</li>
                					@endcan
    					            @can('retrieveLic')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('retrieveLic')}}">طلب استرداد تأمين رخصة بناء</a>
                					</li>
                					@endcan
                        		</ul>
    					</div>
    					@endcan
    					@can('ComplaintTasks')
    					<div class="col-md-1 w-iconmob hidedesc" style="text-align: center; padding: 5px;">
                				<a class="dropdown-toggle nav-link" style="color: #ffffff;" href="/" data-toggle="dropdown" aria-expanded="true">
                					<span style="display: inline;">
                					    <img src="https://db.expand.ps/bs/complain.png" style="padding:5px; ;height: 64px;"> 
                					    <div style="color: #000000;">الشكاوى</div>    
                					</span>
                				</a>
                				<ul class="dropdown-menu menumob" style="width: 200px;list-style: none">
                				    
    					            @can('outspreadTasks')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('outspreadTasks')}}">مهام متفرقة</a>
                					</li>
                					@endcan
    					            @can('publicComplaint')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('publicComplaint')}}">شكوى عامة</a>
                					</li>
                					@endcan
    					            @can('citizenComplaint')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('citizenComplaint')}}">شكوى ضد مواطن</a>
                					</li>
                					@endcan
    					            @can('quittance')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('quittance')}}">طلب براءة ذمة</a>
                					</li>
                					@endcan
                				</ul>
    					</div>
    					@endcan
    					@can('certTasks')
    					<div class="col-md-1 w-iconmob hidedesc" style="text-align: center; padding: 5px;">
                				<a class="dropdown-toggle nav-link" style="color: #ffffff;" href="/" data-toggle="dropdown" aria-expanded="true">
                					<span style="display: inline;">
                					    <img src="https://db.expand.ps/images/certificate64.png" style="padding:5px; ;height: 64px;"> 
                					    <div style="color: #000000;">الشهادات</div>    
                					</span>
                				</a>
                				<ul class="dropdown-menu menumob" style="width: 200px;list-style: none">
    					            @can('cert')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('cert')}}">طباعة شهادة لمواطن</a>
                					</li>
                					@endcan
    					            @can('sendOut')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('sendOut')}}">مراسلات خارجية</a>
                					</li>
                					@endcan
                				</ul>
    					</div>
    					@endcan
    					@can('centralArchive')
    					<div class="col-md-1 w-iconmob hidedesc" style="text-align: center; padding: 5px;">
                				<a class="dropdown-toggle nav-link" style="color: #ffffff;" href="/" data-toggle="dropdown" aria-expanded="true">
                					<span style="display: inline;">
                					    <img src="{{asset('assets/images/archive_ico.png')}}" style="padding:5px; ;height: 64px;"> 
                					    
                					    <div style="color: #000000;">الأرشيف المركزى </div>    
            					    </span>
                				</a>
                				<ul class="dropdown-menu menumob" style="width: 221px;">
                				    @can('out_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('out_archieve')}}">أرشيف المراسلات الصادرة</a>
                					</li>
                				    @endcan 
                				    @can('in_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('in_archieve')}}">أرشيف المراسلات الواردة</a>
                					</li>
                				    @endcan 
                				    @can('mun_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('mun_archieve')}}">أرشيف المؤسسة الداخلى</a>
                					</li>
                				    @endcan 
                				    @can('proj_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('proj_archieve')}}">أرشيف المشاريع</a>
                					</li>
                				    @endcan 
                				    @can('assets_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('assets_archieve')}}">أرشيف الأصول</a>
                					</li>
                				    @endcan 
                				    @can('emp_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('emp_archieve')}}">أرشيف الموظفين</a>
                					</li>
                				    @endcan 
                				    @can('dep_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('dep_archieve')}}">أرشيف الإتفاقيات والعقود</a>
                					</li>
                				    @endcan 
                				    @can('lic_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('lic_archieve')}}">أرشيف رخص البناء /ملف الترخيص</a>
                					</li>
                				    @endcan 
                				    @can('financeArchive')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('financeArchive')}}">أرشيف قسم المالية</a>
                					</li>
                				    @endcan 
                				    @can('cit_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('cit_archieve')}}">أرشيف المواطنين</a>
                					</li>
                				    @endcan 
                				    @can('law_archieve')
        					        <li data-menu="">
                						<a class="dropdown-item" href="{{route('law_archieve')}}">أرشيف القوانين والإجراءات</a>
                					</li>
                				    @endcan 
                        		</ul>
    					</div>
    					@endcan
    					@can('internal_icon')
    					<div class="col-md-1 w-iconmob hidedesc" style="text-align: center; padding: 5px;">
                				<a class="dropdown-toggle nav-link" style="color: #ffffff;" href="/" data-toggle="dropdown" aria-expanded="true">
                					<span style="display: inline;">
                					    <img src="https://template.expand.ps/public/assets/images/ico/internalApp.jpg" style="padding:5px; ;height: 64px;"> 
                					    <div style="color: #000000;">الطلبات الداخلية</div>    
                					</span>
                				</a>
                				<ul class="dropdown-menu menumob" style="width: 200px;list-style: none">
    					            @can('vacationRequest')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('vacationRequest')}}">طلب اجازة</a>
                					</li>
                					@endcan
    					            @can('leavePermission')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('leavePermission')}}">اذن خروج</a>
                					</li>
                					@endcan
                					@can('collecting')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('collecting')}}">طلب تحصيل</a>
                					</li>
                					@endcan
                					@can('requestSpareParts')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('requestSpareParts')}}">اذن اخراج مواد</a>
                					</li>
                					@endcan
                					@can('PurchaseOrder')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('PurchaseOrder')}}">اذن شراء</a>
                					</li>
                					@endcan
                					@can('networkDevelopment')
                					<li data-menu="">
                						<a class="dropdown-item" href="{{route('networkDevelopment')}}">صيانة وتطوير شبكة</a>
                					</li>
                					@endcan
                				</ul>
    					</div>
    					@endcan
				    </div>
<script>

            var myTaskTable;
            var watingTaskTable;
            var tagedTaskTable;
            var sentTaskTable;
            
    @can('onlyTaskTable')
        $('.TaskModel').removeClass('hide');
    @endcan
            
    function showTasks(){

        if($('#showTask').val() == 0){
            $('.TaskModel').removeClass('hidemob');
            $('#showTask').val(1);
        }else{
            $('.TaskModel').addClass('hidemob');
            $('#showTask').val(0);
        }
                if (window.matchMedia('(max-width: 767px)').matches) {
            $('.list1Title').html(' مهامي');
                    
            $('.list2Title').html(' مؤجلة');
            $('.list3Title').html(' للاطلاع');
            $('.list4Title').html(' محولة');
            $(".list1").css("width","min-content")
            $(".list2").css("width","min-content")
            $(".list3").css("width","min-content")
            $(".list4").css("width","min-content")
            let a=$('.dataTables_length>label')
                for(i=0;i<a.length;i++)
                {
                    b=a[i].childNodes;
                    if(b.length==3)
                    {
                        b[2].remove();
                        b[0].remove();
                    }
                }
            }
        
    }
    function decodeHtml(html) {
            var txt = document.createElement("textarea");
            txt.innerHTML = html;
            return txt.value;
        }
        
    @canany(['onlyTaskTable'])       
    $(function() {
             myTaskTable = $('.myTaskTable').DataTable({
                processing:true,
                serverSide:true,
                responsive: true,
                "ajax":"{{ route('getMyTaskAjax') }}",
                "language": {
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    }
                },
                "deferRender": true,
                 "columns":[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , className:"noP",orderable: false, searchable: false},
                    {
                        className:"hideMob",
                        data: 'trans', 
                        render:function(data,row,type){
                            $actionBtn = `<div class="hideMob"><img src="${data.image}" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                                                ${data.nick_name}</div>`
                                
                                return $actionBtn;
                        },
                        
                    name:'trans.nick_name'
                    },
                    {data:'.0',
                     className:"setWidth",
                        render:function(data,row,type){
                            $actionBtn = `<a href="javascript:void(0)" style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;"> 
                                            ${(data.customer_name??'') }`
                                return $actionBtn;
                        },
                        name:'0.customer_name'
                    },
                    {data:null,
                     className:"setWidth",
                        render:function(data,row,type){
                            rout='{{ route('admin.dashboard')}}'
                            ticket_name_o='';
                            if(data['trans'].related==23){
                            @foreach($ticketTypeList as $ticketType)
                                if(data[0].task_type==<?php echo $ticketType->id?>)
                                    ticket_name_o='<?php echo $ticketType->name?>'
                            @endforeach
                            }
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${data['trans'].related!=23?data['config'].ticket_name:ticket_name_o }
                                                                    <span class="hideMob">(${data[0].app_no })</span>
                                                                </a>`
                                return $actionBtn;
                        },
                    name:'config.ticket_name'
                    },
                    {data:null ,
                     
                        render:function(data,row,type){
                            days=Array();
                            days[0]='الأحد';
                            days[1]='الإثنين';
                            days[2]='الثلاثاء';
                            days[3]='الأربعاء';
                            days[4]='الخميس';
                            days[5]='الجمعة';
                            days[6]='السبت';
                            d=new Date(data['trans'].created_at)
                            $actionBtn = `<div class="row hideMob">
                                                <div class="col-sm-2">${days[d.getDay()]}</div> 
                                                <div class="col-sm-4">${d.getDate()}/${d.getMonth()+1}/${data['trans'].created_at.substr(0,4)}</div>
                                                <div class="col-sm-5"> 
                                                    <img src="{{ asset('assets/images/ico/clock.png') }}" width="32" height="32"> ${d.getHours()}:${d.getMinutes()}
                                                </div>
                                            </div>`
                                return $actionBtn;
                        },
                    name:'trans.created_at'
                    },
                    {data:null,
                        render:function(data,row,type){
                            if(data.response.length>0){
                                var txt=decodeURI(data['response'][0].s_text);
                                
                                $actionBtn = `<div class="row hideMob">
                                                <div class="col-sm-2">
                                                    <img src="${data['response'][0].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                                </div>
                                                <div class="col-sm-10">
                                                    <a class="nottes">
                                                    ${ txt!="null"? decodeHtml(txt):'' }
                                                    </a>
                                                </div>
                                            </div>`
                            }else{
                                var txt=decodeURI(data['trans'].s_note);
                                $actionBtn = `<div class="row hideMob">
                                                <div class="col-sm-2">
                                                    <img src="${data['trans'].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                                </div>
                                                <div class="col-sm-10">
                                                    <a class="nottes">
                                                    ${ txt!="null"? txt.replace(/(<([^>]+)>)/gi, " "):'' }
                                                    </a>
                                                </div>
                                            </div>`
                                            }
                                return $actionBtn;
                        },
                    
                    
                    },
                    
                ],
                createdRow: function (row, data, index) {
                    //
                    // if the second column cell is blank apply special formatting
                    //
                    if (data['trans'].is_seen==0) {
                        $(row).addClass('notseen');
                    }
                },
            });
            
            
              myTaskTable.on('init.dt', function() {
                  if (window.matchMedia('(max-width: 767px)').matches) {
                        $(".setWidth").each(function(){
                        $(this).css("width","50%")
                        $(this).css("padding-left","2%!important")
                        });
                        }
                $(".odd").each(function(){
                    $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                });
                $(".even").each(function(){
                    $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
                });
                $(".nottes").each(function(){
                    $(this).html($(this).text());
                });
               
              })
        });
   
    $(function() {
         watingTaskTable = $('.wtbl2').DataTable({
            processing:true,
            responsive: true,
            serverSide:true,
            fixedHeader: true,
            "ajax":"{{ route('getWatingTaskAjax') }}",
            "language": {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            },
            "deferRender": true,
             "columns":[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' ,className:"noP", orderable: false, searchable: false},
                {
                    className:"hideMob",
                    data: 'trans', 
                    render:function(data,row,type){
                        $actionBtn = `<img src="${data.image}" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                                            ${data.nick_name}`
                            return $actionBtn;
                    },
                    
                name:'trans.nick_name'
                },
                {data:'.0',
                 className:"setWidth",
                    render:function(data,row,type){
                        $actionBtn = `<a href="javascript:void(0)" style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;"> 
                                        ${(data.customer_name??'') }`
                            return $actionBtn;
                    },
                    name:'0.customer_name'
                },
                {data:null,className:"setWidth",
                    render:function(data,row,type){
                            rout='{{ route('admin.dashboard')}}'
                            ticket_name_o='';
                            if(data['trans'].related==23){
                            @foreach($ticketTypeList as $ticketType)
                                if(data[0].task_type==<?php echo $ticketType->id?>)
                                    ticket_name_o='<?php echo $ticketType->name?>'
                            @endforeach
                            }
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${data['trans'].related!=23?data['config'].ticket_name:ticket_name_o }
                                                                    <span class="hideMob">(${data[0].app_no })</span>
                                                                </a>`
                                return $actionBtn;
                    },
                name:'config.ticket_name'
                },
                {data:'.0',
                    className:"hideMob",
                    render:function(data,row,type){
                        $actionBtn = `<a href="javascript:void(0)" style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;"> 
                                        ${data.tname }`
                            return $actionBtn;
                    },
                    name:'0.tname'
                },
                {data:null ,
                    className:"hideMob",
                    render:function(data,row,type){
                        days=Array();
                        days[0]='الأحد';
                        days[1]='الإثنين';
                        days[2]='الثلاثاء';
                        days[3]='الأربعاء';
                        days[4]='الخميس';
                        days[5]='الجمعة';
                        days[6]='السبت';
                        d=new Date(data['trans'].created_at)
                        $actionBtn = `<div class="row">
                                            <div class="col-sm-2">${days[d.getDay()]}</div> 
                                            <div class="col-sm-4">${d.getDate()}/${d.getMonth()+1}/${data['trans'].created_at.substr(0,4)}</div>
                                            <div class="col-sm-5"> 
                                                <img src="{{ asset('assets/images/ico/clock.png') }}" width="32" height="32"> ${d.getHours()}:${d.getMinutes()}
                                            </div>
                                        </div>`
                            return $actionBtn;
                    },
                name:'trans.created_at'
                },
                {data:null,className:"hideMob",
                    render:function(data,row,type){
                        if(data.response.length>0){
                            var txt=decodeURI(data['response'][0].s_text);
                            
                            $actionBtn = `<div class="row">
                                            <div class="col-sm-2">
                                                <img src="${data['response'][0].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                            </div>
                                            <div class="col-sm-10">
                                                <a class="nottes">
                                                ${ txt!="null"? decodeHtml(txt):'' }
                                                </a>
                                            </div>
                                        </div>`
                        }else{
                            var txt=decodeURI(data['trans'].s_note);
                            $actionBtn = `<div class="row">
                                            <div class="col-sm-2">
                                                <img src="${data['trans'].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                            </div>
                                            <div class="col-sm-10">
                                                <a class="nottes">
                                                ${ txt!="null"? txt.replace(/(<([^>]+)>)/gi, " "):'' }
                                                </a>
                                            </div>
                                        </div>`
                                        }
                            return $actionBtn;
                    },
                
                
                },
                
            ],
            createdRow: function (row, data, index) {
                    //
                    // if the second column cell is blank apply special formatting
                    //
                    if (data['trans'].is_seen==0) {
                        $(row).addClass('notseen');
                    }
                },
        });
        
          watingTaskTable.on('init.dt', function() {
            $(".odd").each(function(){
                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
            });
            $(".even").each(function(){
                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
            });
            $(".nottes").each(function(){
                $(this).html($(this).text());
            });
          })
           
    });
    
     
    $(function() {
         tagedTaskTable = $('.wtbl3').DataTable({
            processing:true,
            serverSide:true,
            "ajax":"{{ route('getTaggedTaskAjax') }}",
            "language": {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            },
            "deferRender": true,
             "columns":[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , className:"noP",orderable: false, searchable: false},
                {className:"hideMob",
                    data: 'trans', 
                    render:function(data,row,type){
                        $actionBtn = `<img src="${data.image}" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                                            ${data.nick_name}`
                            return $actionBtn;
                    },
                    
                name:'trans.nick_name'
                },
                {data:'.0',
                 className:"setWidth",
                    render:function(data,row,type){
                        $actionBtn = `<a href="javascript:void(0)" style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;"> 
                                        ${(data.customer_name??'') }`
                            return $actionBtn;
                    },
                    name:'0.customer_name'
                },
                {data:null,
                 className:"setWidth",
                    render:function(data,row,type){
                            rout='{{ route('admin.dashboard')}}'
                            ticket_name_o='';
                            if(data['trans'].related==23){
                            @foreach($ticketTypeList as $ticketType)
                                if(data[0].task_type==<?php echo $ticketType->id?>)
                                    ticket_name_o='<?php echo $ticketType->name?>'
                            @endforeach
                            }
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${data['trans'].related!=23?data['config'].ticket_name:ticket_name_o }
                                                                    <span class="hideMob">(${data[0].app_no })</span>
                                                                </a>`
                                return $actionBtn;
                    },
                name:'config.ticket_name'
                },
                
                {data:null ,
                    className:"hideMob",
                    render:function(data,row,type){
                        days=Array();
                        days[0]='الأحد';
                        days[1]='الإثنين';
                        days[2]='الثلاثاء';
                        days[3]='الأربعاء';
                        days[4]='الخميس';
                        days[5]='الجمعة';
                        days[6]='السبت';
                        d=new Date(data['trans'].created_at)
                        $actionBtn = `<div class="row">
                                            <div class="col-sm-2">${days[d.getDay()]}</div> 
                                            <div class="col-sm-4">${d.getDate()}/${d.getMonth()+1}/${data['trans'].created_at.substr(0,4)}</div>
                                            <div class="col-sm-5"> 
                                                <img src="{{ asset('assets/images/ico/clock.png') }}" width="32" height="32"> ${d.getHours()}:${d.getMinutes()}
                                            </div>
                                        </div>`
                            return $actionBtn;
                    },
                name:'trans.created_at'
                },
                {data:null,className:"hideMob",
                    render:function(data,row,type){
                        if(data.response.length>0){
                            var txt=decodeURI(data['response'][0].s_text);
                            
                            $actionBtn = `<div class="row">
                                            <div class="col-sm-2">
                                                <img src="${data['response'][0].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                            </div>
                                            <div class="col-sm-10">
                                                <a class="nottes">
                                                ${ txt!="null"? decodeHtml(txt):'' }
                                                </a>
                                            </div>
                                        </div>`
                        }else{
                            var txt=decodeURI(data['trans'].s_note);
                            $actionBtn = `<div class="row">
                                            <div class="col-sm-2">
                                                <img src="${data['trans'].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                            </div>
                                            <div class="col-sm-10">
                                                <a class="nottes">
                                                ${ txt!="null"? txt.replace(/(<([^>]+)>)/gi, " "):'' }
                                                </a>
                                            </div>
                                        </div>`
                                        }
                            return $actionBtn;
                    },
                
                
                },
                
            ],
            createdRow: function (row, data, index) {
                    //
                    // if the second column cell is blank apply special formatting
                    //
                    if (data['trans'].is_seen==0) {
                        $(row).addClass('notseen');
                    }
                },
        });
        
          tagedTaskTable.on('init.dt', function() {
            $(".odd").each(function(){
                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
            });
            $(".even").each(function(){
                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
            });
            $(".nottes").each(function(){
                $(this).html($(this).text());
            });
          })
    });
    
    $(function() {
         sentTaskTable = $('.wtbl4').DataTable({
            processing:true,
            serverSide:true,
            "ajax":"{{ route('getSenTTaskAjax') }}",
            "language": {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            },
            "deferRender": true,
             "columns":[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , className:"noP",orderable: false, searchable: false},
                {className:"hideMob",
                    data: 'trans', 
                    render:function(data,row,type){
                        $actionBtn = `<img src="${data.image}" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                                                            ${data.nick_name}`
                            return $actionBtn;
                    },
                    
                name:'trans.nick_name'
                },
                {data:'.0',
                    className:"setWidth",
                    render:function(data,row,type){
                        $actionBtn = `<a href="javascript:void(0)" style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;"> 
                                        ${(data.customer_name??'') }`
                            return $actionBtn;
                    },
                    name:'0.customer_name'
                },
                {data:null,
                    className:"setWidth",
                    render:function(data,row,type){
                            rout='{{ route('admin.dashboard')}}'
                            ticket_name_o='';
                            if(data['trans'].related==23){
                            @foreach($ticketTypeList as $ticketType)
                                if(data[0].task_type==<?php echo $ticketType->id?>)
                                    ticket_name_o='<?php echo $ticketType->name?>'
                            @endforeach
                            }
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${data['trans'].related!=23?data['config'].ticket_name:ticket_name_o }
                                                                    <span class="hideMob">(${data[0].app_no })</span>
                                                                </a>`
                                return $actionBtn;
                        },
                name:'config.ticket_name'
                },
                
                {data:null ,
                 className:"hideMob",
                    render:function(data,row,type){
                        days=Array();
                        days[0]='الأحد';
                        days[1]='الإثنين';
                        days[2]='الثلاثاء';
                        days[3]='الأربعاء';
                        days[4]='الخميس';
                        days[5]='الجمعة';
                        days[6]='السبت';
                        d=new Date(data['trans'].created_at)
                        $actionBtn = `<div class="row">
                                            <div class="col-sm-2">${days[d.getDay()]}</div> 
                                            <div class="col-sm-4">${d.getDate()}/${d.getMonth()+1}/${data['trans'].created_at.substr(0,4)}</div>
                                            <div class="col-sm-5"> 
                                                <img src="{{ asset('assets/images/ico/clock.png') }}" width="32" height="32"> ${d.getHours()}:${d.getMinutes()}
                                            </div>
                                        </div>`
                            return $actionBtn;
                    },
                name:'trans.created_at'
                },
                // {data:null,
                //     render:function(data,row,type){
                //         if(data.response.length>0){
                //             var txt=decodeURI(data['response'][0].s_text);
                            
                //             $actionBtn = `<div class="row">
                //                             <div class="col-sm-2">
                //                                 <img src="${data['response'][0].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                //                             </div>
                //                             <div class="col-sm-10">
                //                                 <a class="nottes">
                //                                 ${ txt!="null"? decodeHtml(txt):'' }
                //                                 </a>
                //                             </div>
                //                         </div>`
                //         }else{
                //             var txt=decodeURI(data['trans'].s_note);
                //             $actionBtn = `<div class="row">
                //                             <div class="col-sm-2">
                //                                 <img src="${data['trans'].image }" class="avatar avatar-online" style="height:30px;margin-left: 15px;">
                //                             </div>
                //                             <div class="col-sm-10">
                //                                 <a class="nottes">
                //                                 ${ txt!="null"? txt.replace(/(<([^>]+)>)/gi, " "):'' }
                //                                 </a>
                //                             </div>
                //                         </div>`
                //                         }
                //             return $actionBtn;
                //     },
                
                
                // },
                
            ],
            createdRow: function (row, data, index) {
                    //
                    // if the second column cell is blank apply special formatting
                    //
                    if (data['trans'].is_seen==0) {
                        $(row).addClass('notseen');
                    }
                },
        });
        
          sentTaskTable.on('init.dt', function() {
            $(".odd").each(function(){
                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
            });
            $(".even").each(function(){
                $(this).children().first().next().next().next().next().next().children().first().children().first().next().html($(this).children().first().next().next().next().next().next().children().first().children().first().next().text());
            });
            $(".nottes").each(function(){
                $(this).html($(this).text());
            });
          })
    });
    $(".list1").on("click", function() {
            if (window.matchMedia('(max-width: 767px)').matches) {
                $(".setWidth").each(function(){
                    $(this).css({
                    'width':'50%',
                    'padding-left': '!important'
                });
                });
                } else {
                    //...
                }
        });
    $(".list2").on("click", function() {
            if (window.matchMedia('(max-width: 767px)').matches) {
                $(".setWidth").each(function(){
                    $(this).css({
                    'width':'50%',
                    'padding-left': '!important'
                });
                });
                } else {
                    //...
                }
    });
    $(".list3").on("click", function() {
            if (window.matchMedia('(max-width: 767px)').matches) {
                $(".setWidth").each(function(){
                    $(this).css({
                    'width':'50%',
                    'padding-left': '!important'
                });
                });
                } else {
                    //...
                }
    });
    $(".list4").on("click", function() {
            if (window.matchMedia('(max-width: 767px)').matches) {
                $(".setWidth").each(function(){
                    $(this).css({
                    'width':'50%',
                    'padding-left': '!important'
                });
                });
                } else {
                    //...
                }
    });
    @endcanany
    
    // $(function() {
    //         var table = $('.wtbl3').DataTable({
    //             "language": {
    //                 "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
    //                 "sLoadingRecords": "جارٍ التحميل...",
    //                 "sProcessing": "جارٍ التحميل...",
    //                 "sLengthMenu": "أظهر _MENU_ مدخلات",
    //                 "sZeroRecords": "لم يعثر على أية سجلات",
    //                 "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    //                 "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
    //                 "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    //                 "sInfoPostFix": "",
    //                 "sSearch": "ابحث:",
    //                 "sUrl": "",
    //                 "oPaginate": {
    //                     "sFirst": "الأول",
    //                     "sPrevious": "السابق",
    //                     "sNext": "التالي",
    //                     "sLast": "الأخير"
    //                 },
    //                 "oAria": {
    //                     "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
    //                     "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
    //                 }
    //             }
    //         });
    //     });
    // $(function() {
    //         var table = $('.wtbl4').DataTable({
    //             "language": {
    //                 "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
    //                 "sLoadingRecords": "جارٍ التحميل...",
    //                 "sProcessing": "جارٍ التحميل...",
    //                 "sLengthMenu": "أظهر _MENU_ مدخلات",
    //                 "sZeroRecords": "لم يعثر على أية سجلات",
    //                 "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    //                 "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
    //                 "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    //                 "sInfoPostFix": "",
    //                 "sSearch": "ابحث:",
    //                 "sUrl": "",
    //                 "oPaginate": {
    //                     "sFirst": "الأول",
    //                     "sPrevious": "السابق",
    //                     "sNext": "التالي",
    //                     "sLast": "الأخير"
    //                 },
    //                 "oAria": {
    //                     "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
    //                     "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
    //                 }
    //             }
    //         });
    //     });
    
</script>	
	
@stop
