@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
<style>
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
.dt-buttons
{
    text-align: left;
    display: inline;
    float: left;
    position: relative;
    bottom: 10px;
    margin-right: 10px;
}

</style>
<div class="content-body">
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title"><img src="{{asset('assets/images/archive_ico.png')}}" style="height: 32px" />{{trans('archive.report_archive')}}  </h4>
                    </div>
                    <div class="card-body">
                        <form id="formDataaa" onsubmit="return false">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('archive.archive_type')}}  
                                                    </span>
                                                </div>
                                                <select name="arcType" id="OrgType" class="form-control">
                                                    <option value="all" >{{trans('admin.all')}}</option>
                                                    <option value="taskArchive">ارشيف الطلبات</option>
                                                    @canany(['cert', 'sendOut'])
                                                    <option value="certArchive">ارشيف الشهادات / المراسلات </option>
                                                    @endcan
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('archive.from_date')}}
                                                    </span>
                                                </div>
                                                <input type="text" id="frmDate" name="frmDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y', strtotime(date('Y-m-d') . " -30 days"))?>" onblur="calcDuration()" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('archive.to_date')}}
                                                    </span>
                                                </div>
                                                <input type="text" id="toDate" name="toDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y')?>" onblur="calcDuration()" placeholder="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group res">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend lblTo">
                                                    <span class="input-group-text lblName" id="basic-addon1">
                                                        {{trans('archive.commitment_to')}}
                                                    </span>
                                                </div>
                                                <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                <input type="hidden" id="customerid" name="customerid" value="0">
                                                <input type="hidden" id="customerType" name="customerType">
                                                <input type="hidden" id="arcType" name="arcType">
                                                <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:center">
                                    <button type="button" class="btn btn-primary" onclick="search();" style="">
                                    بحث
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<style>
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
.dt-buttons
{
    margin-bottom: 20px;
    text-align: left;
    
}

</style>

<input type="hidden" id="type" name="type" value="{{$type}}">
<div class="content-body resultTblaa">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" /> 
                            {{ trans('archive.search_result') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="30px">
                                                #
                                                </th>
                                                
                                                <th class="col2">
                                                   تاريخ الاصدار
                                                </th>
                                                <th class="col7">
                                                   أنشئ بواسطة 
                                                </th>
                                                <th class="col3">
                                                    {{trans('archive.type')}}
                                                </th>
                                                <th class="col4">
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th class="col5">
                                                    {{trans('admin.related_to')}}
                                                </th>
                                                
                                                <th>
                                                    {{trans('archive.attach')}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="recListaa">
                                          
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
    calcDuration();
    function constantSelect(id){
	var formData = {
		'id':id,
		_token: '{{csrf_token()}}',
	};
    
	$.ajax({
		url:'getConstantByID',
		type: 'POST',
		data: formData,
		dataType:"json",
		async: true,
		success: function (data) {
		    
		    $("#OrgType1").children().remove();
			
			    if (data.length>0) {
			        $("#OrgType1").append(new Option("الكل", "-1"));
				    for(i=0;i<data.length;i++)
					    $("#OrgType1").append(new Option(data[i].name, data[i].id));
				}
			
		},
		error:function(){
			$("#OrgType1").children().remove();
		},
		/*cache: false,
		 contentType: false,
		 processData: false*/
	});
}
function SubtractDates(d1,d2,returnFeild){
    d1Arr=d1.split('/')
    d2Arr=d2.split('/')
    d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
    d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
    if(d1Date>d2Date)
        alert('Ending date less than strartingdate')
    var diff = Math.abs(d1Date - d2Date);
    diffinyear=diff/(24*60*60*1000*30*12);
    diffinmonth=diff/(24*60*60*1000*30);
    month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
    $("#"+returnFeild).val(Math.floor(diffinyear)+'Year,'+Math.floor(month1)+'M');
    console.log(diffinyear,diffinmonth);
}
function calcDuration(str){
        twoDatesArr= new Array();
        twoDatesArr[0]= $('#frmDate').val();
        twoDatesArr[1]= $('#toDate').val();
        


        d1Arr=twoDatesArr[0].split('/')
        d2Arr=twoDatesArr[1].split('/')
        d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
        d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
        if(d1Date>d2Date){
            alert('تاريخ النهاية اقل من البداية')
            return;
        }
        var diff = Math.abs(d2Date - d1Date);
        diffinyear=diff/(24*60*60*1000*30*12);
        diffinmonth=diff/(24*60*60*1000*30);
        diffinday=diff/(24*60*60*1000);
        month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
        day=Math.floor(diffinday)-(Math.floor(diffinmonth)*30)
        txt='';
        txt1='';
        strr='';
        if(Math.floor(diffinyear)>0)
            txt=Math.floor(diffinyear)+' سنة'

        if(Math.floor(month1)>0)
            txt1=Math.floor(month1)+' شهر, '
        if(txt.length>0) {
            strr = txt
            if(txt1.length>0)
                strr+=', '+txt1
            else
                strr+=', 0 شهر, '
        }
        else {
            if(txt1.length>0)
                strr+=txt1

        }
        $(".res").text(strr+Math.floor(day)+'يوم');
        //console.log(d2Date-d1Date);
        console.log(diffinyear,diffinmonth,diffinday);
    }
    $( function(){
            var table=$('.wtbl').DataTable({
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
    });
    function search(){
        $('.loader').removeClass('hide');
        
        if ( $.fn.DataTable.isDataTable( '.wtbl' ) ) {
        $(".wtbl").dataTable().fnDestroy();
        $('#recListaa').empty();
        }
        let customerid = $("#customerid").val();
        let customerType = $("#customerType").val();
        let name = $("#customerName").val();
        let start = $("#frmDate").val();
        let end = $("#toDate").val();
        var arcType = $('#OrgType').find(":selected").val();
        let OrgType1 = $("#OrgType1").val();
        let msgType = $("#msgType").val();
        $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "archieve_report",

                data: {
                    customerid:customerid,
                    customerType:customerType,
                    name: name,
                    arcType:arcType,
                    start:start,
                    end:end,
                    orgType:OrgType1,
                    msgType:msgType,

                },
                success:function(response){
                    
                    
                    var c=1;
                    console.log(response);
                    var typeArray = {"lawArchieve": '{{trans('archive.law_archieve')}}',"certArchive": '{{trans('archive.cert_archive')}}',"taskArchive": '{{trans('archive.task_archive')}}', "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'}; 
                
                    response.result.forEach(elem => {
                        $type=(typeArray[elem.type]??'');
                        if(elem.type=='taskArchive'){
                            $type='<a target="_blank" href="{{asset(app()->getLocale())}}'+'/admin/'+elem.task_link+'">'
                                                +'<span class="hideMob" >'+ elem.task_name +'</span>'
                                                +'</a>';
                        }
                        $row="<tr>"+
                            "<td>"+c+"</td>"+
                            "<td>"+(elem.date??'')+"</td>"+
                            "<td>"+(elem.admin==null?'':elem.admin.nick_name)+"</td>"+
                            "<td>"+$type+"</td>"+
                            "<td>"+(elem.title??'')+"</td>"+
                            "<td>"+(elem.name??'')+"</td>";
                            $row += '<td>';
                            attach='';

                    if(elem.files){

                    var j=0;

                    for(j=0;j<elem.files.length;j++){

                        shortCutName=elem.files[j].real_name;

                        urlfile='{{ asset('') }}';

                        urlfile+=elem.files[j].url;

                        if(elem.files[j].extension=="jpg"||elem.files[j].extension=="png")

                        fileimage='{{ asset('assets/images/ico/image.png') }}';

                        else if(elem.files[j].extension=="pdf")

                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';

                        else if(elem.files[j].extension=="excel"||elem.files[j].extension=="xsc")

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
                        $('#recListaa').append($row)
                        c++;
                    });
                    $('.wtbl').DataTable({
                        dom: 'Bfltip',
                        buttons: [
                            {
                                extend: 'excel',
                                tag: 'img',
                                title:'',
                                attr:  {
                                    title: 'excel',
                                    src:'{{asset('assets/images/ico/excel.png')}}',
                                    style: 'cursor:pointer;height:40px;',
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
                    $('.loader').addClass('hide');
                },
            });
    }
    
$( function() {
    $(".cust").on("keyup",function(){
        $("#customername").val($(this).val())
    })
    $( ".cust" ).autocomplete({
		source: 'archive_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            console.log(ui.item);
            $('#customerid').val(ui.item.id);
            $('#customerName').val(ui.item.name);
            $('#customerType').val(ui.item.model);
           }
	    });
    });
    
</script>
@endsection