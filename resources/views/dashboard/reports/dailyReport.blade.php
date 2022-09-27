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
                            <h4 class="card-title">
                               {{'تقرير عمل بتاريخ'}}
                            </h4>
                        </div>
                        <div class="form-body">
                            <div class="row" style="padding-right: 20px">
                                <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    نوع البحث
                                                </span>
                                            </div>
                                            <select name="arcType" id="arcType" class="form-control" onchange="ShowTypes()">
                                                <option value="1" >تفصيلى</option>
                                                <option value="2">إجمالى</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{"من تاريخ"}}
                                                </span>
                                            </div>
                                            <input type="text" id="from" maxlength="10" data-mask="00/00/0000" name="from" class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{"الى تاريخ"}}
                                                </span>
                                            </div>
                                            <input type="text" id="to" maxlength="10" data-mask="00/00/0000" name="to" class="form-control singledate " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" aria-invalid="false" value="<?php echo date('d/m/Y')?>" autocomplete="off" onblur="calcDuration()">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12 pr-s-12 pr-0">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <button type="submit" class="btn btn-primary" name="rep" onclick="search();">
                                                {{"بحث"}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                        <div class="form-group res">
                                        </div>
                                    </div>
                            </div>
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

    <input type="hidden" id="type" name="type" value="{{ $type }}">
    <div class="content-body resultTblaa">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="{{ asset('assets/images/ico/report32.png') }}" />
                            {{ trans('archive.search_result') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12 details">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right"
                                        class="detailsTB table wtbl">
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px">
                                                    #
                                                </th>
                                                 <th class="col1" width="150px">
                                                    {{ 'الموظف' }}
                                                </th>
                                                <th class="col2" width="150px">
                                                    {{ 'الوقت والتاريخ' }}
                                                </th>
                                                <th class="col3" width="150px">
                                                    {{ 'العنوان' }}
                                                </th>
                                                <th class="col4" width="170px">
                                                    {{ 'نوع الأرشيف' }}
                                                </th>
                                                <th class="col5" width="200px">
                                                    {{ 'مرتبط ب' }}
                                                </th>
                                                <th class="col6" width="200px">
                                                    {{ 'نسخة إلى' }}
                                                </th>
                                                <th class="col7"  width="200px">
                                                    {{ 'المرفقات' }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="recListaa">

                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="col-xl-12 col-lg-12 total">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right"
                                        class="detailsTB table totaltbl">
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px">
                                                    #
                                                </th>
                                                 <th class="col8" width="150px">
                                                    {{ 'نوع الارشيف' }}
                                                </th>
                                                <th class="col9" width="150px">
                                                    {{ 'عدد الحركات' }}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="totalBody">

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
    $(".totaltbl").hide()
        function ShowTypes(){
               
            if($('#arcType').find(":selected").val()=="1"){
                var table = $('.totaltbl').DataTable();
                table.destroy();
                $(".details").show()
                $(".totaltbl").hide()
            }
            else if($('#arcType').find(":selected").val()=="2"){
                var table = $('.wtbl').DataTable();
                table.destroy();
                $(".details").hide()
                $(".totaltbl").show()
            }
        }
        /*
        $(function() {
            if($('#arcType').find(":selected").val()=="1")
            var table = $('.wtbl').DataTable({
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
                }
            });
        });
        
        $(function() {
            if($('#arcType').find(":selected").val()=="2")
            var table = $('.totaltbl').DataTable({
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
                }
            });
        });
        */
        function calcDuration(str){
            twoDatesArr= new Array();
            twoDatesArr[0]= $('#from').val();
            twoDatesArr[1]= $('#to').val();
            d1Arr=twoDatesArr[0].split('/')
            d2Arr=twoDatesArr[1].split('/')
            d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
            d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
            if(d1Date>d2Date){
                alert('تاريخ النهاية اقل من البداية')
                //$('#from').val()=$('#to').val();
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
            // console.log(diffinyear,diffinmonth,diffinday);
        }

        function search() {
            if ($.fn.DataTable.isDataTable('.wtbl')) {
                $(".wtbl").dataTable().fnDestroy();
                $('#recListaa').empty();
            }
            let from = $("#from").val();
            let to = $("#to").val();
            let arcType = $("#arcType").val();
            
            $.ajax({
                type: 'get', // the method (could be GET btw)
                url: "allArchive",

                data: {
                    from: from,
                    to: to,
                    arcType: arcType,
                },
                success: function(response) {
                    var c = 1;
                    if(response.type!=2){
                        $('#recListaa').html('');
                        response.data.forEach(elem => {
                            // elem.created_at.substring(11,19)+' - '+
                            $date=elem.created_at.substring(8,10)+'/'+elem.created_at.substring(7,5)+'/'+elem.created_at.substring(4,0);

                            $row = "<tr>" +
                                "<td>" + c + "</td>" +
                                "<td>" + (elem.admin.nick_name??'') + "</td>" +

                                "<td>" + $date + "</td>" ;

                            if(elem.type!='licArchive'){
                                $row+= "<td>" + (elem.title??'' )+ "</td>" ;
                            }else{
                                $row+= "<td>" + "</td>" ;
                            }

                            if(elem.type=='licArchive'){
                                $row+= "<td>" + 'ارشيف رخص بناء / ملف ترخيص' + "</td>" ;
                            }else if(elem.type=='outArchive'){
                                $row+= "<td>" + 'أرشيف صادر' + "</td>" ;
                            }else if(elem.type=='empArchive'){
                                $row+= "<td>" + 'أرشيف الموظفين' + "</td>" ;
                            
                            }else if(elem.type=='lawArchieve'){
                                $row+= "<td>" + 'أرشيف القوانين والإجراءات' + "</td>" ;
                            
                            }else if(elem.type=='munArchive'){
                                $row+= "<td>" + 'أرشيف المؤسسة' + "</td>" ;
                            
                            }else if(elem.type=='citArchive'){
                                $row+= "<td>" + 'أرشيف المواطنين' + "</td>" ;
                            
                            }else if(elem.type=='inArchive'){
                                $row+= "<td>" + 'أرشيف الوارد' + "</td>" ;
                            
                            }else if(elem.type=='assetsArchive'){
                                $row+= "<td>" + 'أرشيف الأصول' + "</td>" ;
                            
                            }else if(elem.type=='projArchive'){
                                $row+= "<td>" + 'أرشيف المشاريع' + "</td>" ;
                            
                            }else if(elem.type=='depArchive'){
                                $row+= "<td>" + 'أرشيف الأقسام' + "</td>" ;
                            
                            }else{
                                $row+= "<td>" + 'بدون تصنيف' + "</td>" ;
                            }
                            $row+= "<td>" + (elem.name??'') + "</td>";
                            if(elem.type!='licArchive'){
                                $copyto='';
                                if(elem.copy_to!=null){
                                    elem.copy_to.forEach(elem2 => {
                                    $copyto+= elem2.name+" , ";
                                    });
                                }
                                $row+="<td>" + $copyto + "</td>" ;
                            }else{
                                $row+="<td> </td>" ;
                            }
                            $row+="<td>";
                            $attach = '';
                            var i = 1;
                            /*
                            if (elem.files && typeof(elem.files) == "object") {
                                elem.files.forEach(file => {
                                    attach += '<div id="attach" class=" col-sm-6 ">' +
                                        '<div class="attach">' +
                                        '<span class="attach-text">مرفق ' + i +
                                        '</span><a onclick="delAttach()"><i class="fa fa-trash"></i></a>' +
                                        '<a class="attach-close1" href="' + file +
                                        '" style="color: #74798D; float:left;" target="_blank">' +
                                        '  <i class="fa fa-eye"> </i>' +
                                        '</a><input type="hidden" value="" name="attach[]" >' +
                                        '</div>' +
                                        '</div>';
                                    i++;
                                });
                                $row += attach;
                            }
                            */

                            if(elem.files.length>0){ 
                                // console.log(elem.files);
                                //var i=1;
                                   $attach="<div class='row' style='margin-left:0px;'>";
                                    elem.files.forEach(file => {
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
                                        $attach += '<div id="attach" class=" col-sm-12 ">'
                                            +'<div class="attach">'                                        
                                            +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                                +'  <span class="attach-text">'+shortCutName+'</span>'
                                                +'    <img style="width: 20px;"src="'+fileimage+'">'
                                                +'</a>'
                                            +'</div>'
                                            +'</div>'; 
                                });
                                $attach += '</div>';
                                $row += $attach;
                            }

                            $row += "</td></tr>";
                            $('#recListaa').append($row)
                            c++;
                        });
                        
                    }
                    else {
                        $('#totalBody').html('');
                        $row = "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف الصادر' + "</td>" +
                            "<td>" + response.outArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف الوارد' + "</td>" +
                            "<td>" + response.inArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف المؤسسة' + "</td>" +
                            "<td>" + response.munArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف المشاريع' + "</td>" +
                            "<td>" + response.projArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف الأصول' + "</td>" +
                            "<td>" + response.assetsArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف المواطنين' + "</td>" +
                            "<td>" + response.citArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف القوانين والإجراءات' + "</td>" +
                            "<td>" + response.lawArchieveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف المالية ' + "</td>" +
                            "<td>" + response.financeArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف الموظفين ' + "</td>" +
                            "<td>" + response.empArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف الإتفاقيات والعقود ' + "</td>" +
                            "<td>" + response.contractArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $row += "<tr>" +
                            "<td>" + c + "</td>" +
                            "<td>" + 'ارشيف رخص البناء ' + "</td>" +
                            "<td>" + response.licArchiveCount + "</td>";
                        $row += "</tr>";
                        c++;
                        
                        $('#totalBody').append($row)
                        c++;
                    }
                    if(response.type!=2){
                        var table = $('.wtbl').DataTable();
                        table.destroy();
                        $('.wtbl').DataTable({
                            dom: 'Bfltip',
                            buttons: [{
                                    extend: 'excel',
                                    tag: 'img',
                                    title: '',
                                    attr: {
                                        title: 'excel',
                                        src: '{{ asset('assets/images/ico/excel.png') }}',
                                        style: 'cursor:pointer;height: 32px;',
                                    },
    
                                },
                                {
                                    extend: 'print',
                                    tag: 'img',
                                    title: '',
                                    attr: {
                                        title: 'print',
                                        src: '{{ asset('assets/images/ico/Printer.png') }} ',
                                        style: 'cursor:pointer;height: 32px;',
                                        class: "fa fa-print"
                                    },
                                    customize: function(win) {
    
    
                                        $(win.document.body).find('table').find('tbody')
                                            .css('font-size', '20pt');
                                    }
                                },
                            ],
    
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
                            }
                        });
                    }
                    else{
                        var table = $('.totaltbl').DataTable();
                        table.destroy();
                        $('.totaltbl').DataTable({
                            dom: 'Bfltip',
                            buttons: [{
                                    extend: 'excel',
                                    tag: 'img',
                                    title: '',
                                    attr: {
                                        title: 'excel',
                                        src: '{{ asset('assets/images/ico/excel.png') }}',
                                        style: 'cursor:pointer;height: 32px;',
                                    },
    
                                },
                                {
                                    extend: 'print',
                                    tag: 'img',
                                    title: '',
                                    attr: {
                                        title: 'print',
                                        src: '{{ asset('assets/images/ico/Printer.png') }} ',
                                        style: 'cursor:pointer;height: 32px;',
                                        class: "fa fa-print"
                                    },
                                    customize: function(win) {
    
    
                                        $(win.document.body).find('table').find('tbody')
                                            .css('font-size', '20pt');
                                    }
                                },
                            ],
    
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
                            }
                        });
                        
                    }
                },
            });

        }
    </script>
@endsection
