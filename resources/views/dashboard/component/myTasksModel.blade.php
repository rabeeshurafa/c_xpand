
<ul class="mega-dropdown-menu dropdown-menu row" id="tasksListModel" style="z-index: 10;" >
<li class="dropdown-content scrollable-container media-list media-list1 w-100 ps-container ps-theme-dark" style="max-height: 728px !important; width: 100% !important;" data-ps-id="a5a8fe69-1beb-3d41-c5b0-8fed8c88f654">

    <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">

        <li class="nav-item">

			<a  class="nav-link active list101" style="color: #0073AA;" id="base-tab101" data-toggle="tab" aria-controls="ctab101" href="#ctab101" aria-expanded="true" >
			<b>
				<span class="list1Title" >مهامى</span>
				(<span id="ctabCnt101"></span>)

			</b></a>

		</li>
		<li class="nav-item" >

			<a   class="nav-link list201" style="color: #0073AA;" id="base-tab201" data-toggle="tab" aria-controls="ctab201" href="#ctab201" aria-expanded="false">
			<b>
			    <span class="list2Title" >مهام مؤجله</span>
				(<span id="ctabCnt201"></span>)
				</b></a>
				

		</li>

		<li class="nav-item">

			<a  class="nav-link list301" style="color: #0073AA;" id="base-tab301" data-toggle="tab" aria-controls="ctab301" href="#ctab301" aria-expanded="false">
			<b>
			    <span class="list3Title" >مهام للاطلاع</span>
				(<span id="ctabCnt301"></span>)

			</b></a>

		</li>

		<li class="nav-item">

			<a  class="nav-link list401" style="color: #0073AA;" id="base-tab401" data-toggle="tab" aria-controls="ctab401" href="#ctab401" aria-expanded="false">
			<b>
			    <span class="list4Title" >مهام قمت بتحويلها</span>
				(<span id="ctabCnt401"></span>)

			</b>

			</a>

		</li>

	</ul>
	<div class="tab-content px-1 pt-1" style="direction: rtl;">
		<div role="tabpanel" class="tab-pane active" id="ctab101" aria-expanded="true" aria-labelledby="base-tab101">
			<p>
				<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl101 myTaskTable101" >

					<thead width='100%'>

						<tr>

							<th class="" scope="col" style="text-align: right; color:#ffffff" >#</th>

							<th class="hideMob" scope="col" style="text-align:  right; direction:rtl;   color:#ffffff">

								 {{"المرسل"}}  </th>

							<th class="col-md-2" scope="col" style="text-align: right; color:#ffffff">

								 {{"اسم المستفيد"}}</th>

							<th class="col-md-2" scope="col" style="text-align: right; color:#ffffff">

								{{trans('admin.task_title')}}</th>

							<th class="col-md-3 hideMob" scope="col" style="text-align: center; color:#ffffff" >

							{{trans('admin.opening_date')}}</th>

							<th class="hideMob" width="30%" scope="col" style="text-align: center; color:#ffffff">

							{{'الإجراءات'}}
							<div  style="width: 200px;">
							    
							</div>
							</th>

						</tr>

					</thead>

				<tbody id="cMyTask101">


				</tbody>

			</table>
               
			</p>

		</div>

		<div class="tab-pane" id="ctab201" aria-labelledby="base-tab201">

			<p>
				<table style="width:100%; margin-top: 10px;direction: rtl;" class=" detailsTB table hdrTbl101 wtbl201" >

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

							<th class="hideMob" width="30%" style="text-align: center; color:#ffffff;">

							{{'الإجراءات'}}
							<div  style="width: 200px;">
							    
							</div>
							</th>

						</tr>

					</thead>

				<tbody id="cMyTask201">
                   


				</tbody>

			</table>
            
			</p>

		</div>

		<div class="tab-pane" id="ctab301" aria-labelledby="base-tab301">

			<p>

				<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 wtbl301" >

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

							<th class="hideMob" style="text-align: center;   color:#ffffff">

							{{'الإجراءات'}}
							<div  style="width: 200px;">
							    
							</div>
							</th>

						</tr>

					</thead>

				<tbody id="cMyTask301">
                   

				</tbody>

			</table>


			</p>

		</div>

		<div class="tab-pane" id="ctab401" aria-labelledby="base-tab401">

			<p>

				<table style="width:100%; margin-top: 10px;direction: rtl;" class="detailsTB table hdrTbl1 wtbl401" >

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


				<tbody id="cMyTask401">
                    
				</tbody>

			</table>
			

			</p>

		</div>

	</div>

</li>
</ul>
<script>

var myTaskTable;
var watingTaskTable;
var tagedTaskTable;
var sentTaskTable;
var count=0;
            
    // function showTasks(){

    //     if($('#showTask').val() == 0){
    //         $('.TaskModel').removeClass('hidemob');
    //         $('#showTask').val(1);
    //     }else{
    //         $('.TaskModel').addClass('hidemob');
    //         $('#showTask').val(0);
    //     }
    //             if (window.matchMedia('(max-width: 767px)').matches) {
    //         $('.list1Title').html(' مهامي');
                    
    //         $('.list2Title').html(' مؤجلة');
    //         $('.list3Title').html(' للاطلاع');
    //         $('.list4Title').html(' محولة');
    //         $(".list1").css("width","min-content")
    //         $(".list2").css("width","min-content")
    //         $(".list3").css("width","min-content")
    //         $(".list4").css("width","min-content")
    //         let a=$('.dataTables_length>label')
    //             for(i=0;i<a.length;i++)
    //             {
    //                 b=a[i].childNodes;
    //                 if(b.length==3)
    //                 {
    //                     b[2].remove();
    //                     b[0].remove();
    //                 }
    //             }
    //         }
        
    // }
    function decodeHtml(html) {
            var txt = document.createElement("textarea");
            txt.innerHTML = html;
            return txt.value;
        }
        
         
    $(function() {
             myTaskTable = $('.myTaskTable101').DataTable({
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
                            if(data.ticketName!=null){
                                ticket_name_o=data.ticketName;
                            }
                            
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${(ticket_name_o=='')?data['config'].ticket_name:ticket_name_o }
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
                                 try {
                                    var txt=decodeURI(data['response'][0].s_text);
                                }
                                catch(err) {
                                    var txt=data['response'][0].s_text;
                                }
                                var temp= txt.split('&lt;\\br&gt;');
                                txt='';
                                for(i=0;i<temp.length;i++)
                                txt+=temp[i];
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
                               try {
                                  var txt=decodeURI(data['trans'].s_note);
                                }
                                catch(err) {
                                  var txt=data['trans'].s_note;
                                }
                                var temp= txt.split('&lt;\\br&gt;');
                                txt='';
                                for(i=0;i<temp.length;i++)
                                txt+=temp[i];
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
                count+=myTaskTable.page.info().recordsTotal;
                $('#ctabCnt101').html(myTaskTable.page.info().recordsTotal);
                $('#tasksCount101').html(count);
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
         watingTaskTable = $('.wtbl201').DataTable({
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
                            if(data.ticketName!=null){
                                ticket_name_o=data.ticketName;
                            }
                            
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${ticket_name_o==''?data['config'].ticket_name:ticket_name_o }
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
                            try {
                                    var txt=decodeURI(data['response'][0].s_text);
                                }
                                catch(err) {
                                    var txt=data['response'][0].s_text;
                                }
                            var temp= txt.split('&lt;\\br&gt;');
                                txt='';
                                for(i=0;i<temp.length;i++)
                                txt+=temp[i];
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
                            try {
                                  var txt=decodeURI(data['trans'].s_note);
                                }
                                catch(err) {
                                  var txt=data['trans'].s_note;
                                }
                            var temp= txt.split('&lt;\\br&gt;');
                                txt='';
                                for(i=0;i<temp.length;i++)
                                txt+=temp[i];
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
            // count+=watingTaskTable.page.info().recordsTotal;
            $('#ctabCnt201').html(watingTaskTable.page.info().recordsTotal);  
            // $('#tasksCount101').html(count);
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
         tagedTaskTable = $('.wtbl301').DataTable({
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
                            if(data.ticketName!=null){
                                ticket_name_o=data.ticketName;
                            }
                            
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${ticket_name_o==''?data['config'].ticket_name:ticket_name_o }
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
                            try {
                                    var txt=decodeURI(data['response'][0].s_text);
                                }
                                catch(err) {
                                    var txt=data['response'][0].s_text;
                                }
                            var temp= txt.split('&lt;\\br&gt;');
                                txt='';
                                for(i=0;i<temp.length;i++)
                                txt+=temp[i];
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
                            try {
                                  var txt=decodeURI(data['trans'].s_note);
                                }
                                catch(err) {
                                  var txt=data['trans'].s_note;
                                }
                            var temp= txt.split('&lt;\\br&gt;');
                                txt='';
                                for(i=0;i<temp.length;i++)
                                txt+=temp[i];
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
            // count+=tagedTaskTable.page.info().recordsTotal;
            $('#ctabCnt301').html(tagedTaskTable.page.info().recordsTotal);  
            // $('#tasksCount101').html(count);
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
         sentTaskTable = $('.wtbl401').DataTable({
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
                            if(data.ticketName!=null){
                                ticket_name_o=data.ticketName;
                            }
                            
                            $actionBtn = `<a onclick="$('body').trigger('click');$('.loader').removeClass('hide')" href="${rout}/viewTicket/${data['trans'].ticket_id}/${data['trans'].related}">   
                                                                ${ticket_name_o==''?data['config'].ticket_name:ticket_name_o }
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
            // count+=sentTaskTable.page.info().recordsTotal;
            $('#ctabCnt401').html(sentTaskTable.page.info().recordsTotal);
            
            // $('#tasksCount101').html(count);
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
    $(".list101").on("click", function() {
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
    $(".list201").on("click", function() {
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
    $(".list301").on("click", function() {
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
    $(".list401").on("click", function() {
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
    
    $( document ).ready(function() {
        if(screen.width>767.98){
            $("#tasksListModel").css("width",((window.innerWidth)-150));
            $("#tasksListModel").css("max-width",(window.innerWidth));
            $("#tasksListModel").css("margin-right",75);
        }else{
            $("#tasksListModel").css("width",window.innerWidth);
            $("#tasksListModel").css("max-width",window.innerWidth);
            $("#tasksListModel").css("margin-right",0);
        }
    });
    
    $(window).resize(function() {
      if(screen.width>767.98){
            $("#tasksListModel").css("width",((window.innerWidth)-150));
            $("#tasksListModel").css("max-width",(window.innerWidth));
            $("#tasksListModel").css("margin-right",75);
        }else{
            $("#tasksListModel").css("width",window.innerWidth);
            $("#tasksListModel").css("max-width",window.innerWidth);
            $("#tasksListModel").css("margin-right",0);
        }
    });

</script>