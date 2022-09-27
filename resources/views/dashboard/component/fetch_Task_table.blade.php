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

<input type="hidden" id="type" name="type" value="{{$type}}">
<div class="content-body resultTblaa hidemob">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card" >
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title datatable_header"><img src="{{asset('assets/images/ico/report32.png')}}" /> 
                            @if ($type=="WaterSubscription")
                            ارشيف اشتراكات المياه
                            @elseif($type=="elecSubscription")
                            ارشيف اشتراكات الكهرباء
                            @elseif($type=="waterMalfunction")
                            ارشيف عطل مياه لمشترك
                            @elseif($type=="elecMalfunction")
                            ارشيف عطل كهرباء لمشترك
                            @elseif($type=="waterLineDisconnect")
                            ارشيف فصل خط مياه
                            @elseif($type=="elecLineDisconnect")
                            ارشيف فصل خط كهرباء
                            @elseif($type=="waterFinancialTransfer")
                            ارشيف نقل ذمة مالية مياه
                            @elseif($type=="elecFinancialTransfer")
                            ارشيف نقل ذمة مالية كهرباء
                            @elseif($type=="globalWaterMalfunction")
                            ارشيف عطل مياه عام
                            @elseif($type=="globalWaterMalfunction")
                            ارشيف عطل كهرباء عام
                            @elseif($type=="waterMeterCheck")
                            ارشيف فحص عداد مياه
                            @elseif($type=="elecMeterCheck")
                            ارشيف فحص عداد كهرباء
                            @elseif($type=="waterMeterRead")
                            ارشيف تغيير عداد مياه
                            @elseif($type=="elecMeterRead")
                            ارشيف قراءة عداد طاقة شمسية
                            @elseif($type=="waterMeterTransfer")
                            ارشيف نقل عداد مياه
                            @elseif($type=="elecMeterTransfer")
                            ارشيف نقل عداد كهرباء
                            @elseif($type=="waterLineReconnect")
                            ارشيف إعادة وصل خط مياه
                            @elseif($type=="elecLineReconnect")
                            ارشيف إعادة وصل خط كهرباء
                            @elseif($type=="waiveWaterSubscription")
                            ارشيف تنازل عن اشتراك مياه 
                            @elseif($type=="waiveelecSubscription")
                            ارشيف تنازل عن اشتراك كهرباء 
                            @elseif($type=="newTicket16")
                            ارشيف رفع قدرة العداد 
                            @elseif($type=="newTicket37")
                            ارشيف نقل عامود كهرباء / كابل 
                            @elseif($type=="newTicket27")
                            ارشيف اصلاح / تركيب وحدات انارة 
                            @elseif($type=="newTicket29")
                            ارشيف ربط خلايا شمسية 
                            @elseif($type=="newTicket36")
                            ارشيف لوحة عرس (اشتراك مؤقت) 
                            @elseif($type=="newTicket39")
                            ارشيف تحويل من 1 الى 3 فاز 
                            @elseif($type=="buildingLicense")
                            ارشيف ترخيص بناء   
                            @elseif($type=="engineeringValidation")
                            ارشيف مخطط موقع   
                            @elseif($type=="licenseFile")
                            ارشيف فتح ملف ترخيص   
                            @elseif($type=="ownershipTransfer")
                            ارشيف نقل ملكية رخصة بناء   
                            @elseif($type=="retrieveLic")
                            ارشيف طلب استرداد تأمين رخصة بناء   
                            @elseif($type=="sitePlan")
                            ارشيف طلب مخطط موقع   
                            @elseif($type=="straightening")
                            ارشيف طلب استقامة   
                            @elseif($type=="collecting")
                            ارشيف طلب تحصيل   
                            @elseif($type=="leavePermission")
                            ارشيف طلب إذن خروج   
                            @elseif($type=="vacationRequest")
                            ارشيف طلب اجازة   
                            @elseif($type=="networkDevelopment")
                            ارشيف صيانه عامه   
                            @elseif($type=="PurchaseOrder")
                            ارشيف اذن الشراء   
                            @elseif($type=="requestSpareParts")
                            ارشيف اذن اخراج مواد   
                            @elseif($type=="outspreadTasks")
                            ارشيف المهام المتفرقة   
                            @elseif($type=="publicComplaint")
                            ارشيف الشكاوى العامة   
                            @elseif($type=="citizenComplaint")
                            ارشيف الشكاوى ضد المواطنين   
                            @elseif($type=="quittance")
                            ارشيف طلبات براءة الذمة    
                            @elseif($type=="innerQuittance")
                            ارشيف طلبات براءة الذمة الداخلية    
                            @elseif($type=="vehicleMaintenance")
                            ارشيف صيانة المركبات       
                            @elseif($type=="refueling")
                            ارشيف المحروقات      
                            @endif
                            
                            <div class="dt-buttons" style="height: 20px;padding-top: 10px;" title="الاعدادات">
                                <img src="{{ asset('assets/images/ico/share.png') }}" height="27px"
                                    onclick="ShowArchiveConfigModal('formData')" style="cursor:pointer">
                                    
                                <div class="form-group">
                                    <a onclick="ShowArchiveConfigModal('formData')" style="color:#000000">
                                    </a>
                                </div>
                            </div>
                            </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                         <thead>
                                            @if($type=="waterFinancialTransfer"||$type=="elecFinancialTransfer"||$type=="sitePlan"||$type=="PurchaseOrder"||$type=="publicComplaint"||$type=="citizenComplaint")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="150px;">
                                                    @if($type=="PurchaseOrder")
                                                    المورد
                                                    @else
                                                    مقدم الطلب
                                                    @endif
                                                </th>
                                                <th width="80px;">
                                                    رقم الهاتف
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="quittance")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="150px;">
                                                    مقدم الطلب
                                                </th>
                                                <th width="80px;">
                                                    رقم الهاتف
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;">
                                                    الغاية 
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="leavePermission")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="150px;">
                                                    اسم الموظف
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;">
                                                    نوع المغادرة
                                                </th>
                                                <th width="80px;">
                                                    تاريخ المغادرة 
                                                </th>
                                                <th width="80px;" >
                                                    وقت الخروج
                                                </th>
                                                <th width="80px;">
                                                      وقت العودة
                                                </th>
                                                <th width="80px;">
                                                      المدة الزمنية 
                                                </th>
                                                <th width="200px;">
                                                      سبب المغادرة  
                                                </th>
                                                <th width="80px;">
                                                      الحالة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="vacationRequest")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="150px;">
                                                    اسم الموظف
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;">
                                                    نوع الاجازة
                                                </th>
                                                <th width="80px;">
                                                    تاريخ البدء 
                                                </th>
                                                <th width="80px;" >
                                                    تاريخ الانتهاء
                                                </th>
                                                <th width="80px;">
                                                     عدد الايام 
                                                </th>
                                                <th width="200px;">
                                                      سبب الاجازة  
                                                </th>
                                                <th width="80px;">
                                                      الحالة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="networkDevelopment")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="150px;">
                                                    نوع الصيانة
                                                </th>
                                                <th width="80px;">
                                                    وصف الصيانة  
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;">
                                                    المنطقة 
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="outspreadTasks")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="150px;">
                                                    مقدم الطلب 
                                                </th>
                                                <th width="80px;">
                                                    نوع الطلب
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;">
                                                    المنطقة 
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="requestSpareParts")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="innerQuittance")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="150px;">
                                                    مقدم الطلب
                                                </th>
                                                <th width="80px;">
                                                    رقم الهوية
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @elseif($type=="vehicleMaintenance" || $type=="refueling")
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="150px;">
                                                    اسم المركبة
                                                </th>
                                                <th width="80px;">
                                                    رقم المركبة
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @else
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="160px;">
                                                    التاريخ والوقت
                                                </th>
                                                <th width="150px;">
                                                    مقدم الطلب
                                                </th>
                                                <th width="80px;">
                                                    رقم الهاتف
                                                </th>
                                                <th width="50px;">
                                                    رقم الطلب
                                                </th>
                                                <th width="80px;">
                                                    المنطقة 
                                                </th>
                                                <th width="80px;" >
                                                   حالة الطلب
                                                </th>
                                                <th width="150px;">
                                                     انشئ بواسطة
                                                </th>
                                                <th style="width:79px!important;" >
                                                    طباعة الطلب
                                                </th>
                                            </tr>
                                            @endif
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
@include('dashboard.component.task_archive_config')
<script>
    
        var buildArray = { "2079": '{{trans('archive.build_type1')}}', "2080": '{{trans('archive.build_type2')}}',"2081": '{{trans('archive.build_type3')}}'}; 

        $appStatusList=[];
        $appStatusList[1]="مفتوح";
        $appStatusList[5002]="مفتوح";
        $appStatusList[6006]="تحت المتابعة";
        $appStatusList[6010]="مقبول";
        $appStatusList[5003]="مغلق";
        $appStatusList[6007]="قيد الكشف الفني";
        $appStatusList[6009]="تست";
        $appStatusList[135]="مرفوض";
        
        // var types=$('#type').val();
        $( function(){
            var table=$('.wtbl').DataTable({
            processing:true,
            serverSide:true,
            info:true,
            
            @if ($type=="WaterSubscription")
            ajax: {
                url: '{{ route('getWaterTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecSubscription")
            ajax: {
                url: '{{ route('getElecSubscriptionTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waterMalfunction")
            ajax: {
                url: '{{ route('getWaterMalfuncTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waterLineDisconnect")
            ajax: {
                url: '{{ route('getWaterDisconnectTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waterFinancialTransfer")
            ajax: {
                url: '{{ route('getWaterFinancTransferTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="globalWaterMalfunction")
            ajax: {
                url: '{{ route('getWaterGlblMulfuncTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waterMeterCheck")
            ajax: {
                url: '{{ route('getWaterMeterChekTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waterMeterRead")
            ajax: {
                url: '{{ route('getWaterMeterReadTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waterMeterTransfer")
            ajax: {
                url: '{{ route('getWaterMeterTransfrTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waterLineReconnect")
            ajax: {
                url: '{{ route('getWaterLineRecnctTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waiveWaterSubscription")
            ajax: {
                url: '{{ route('getWaiveWaterSubsTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="waiveelecSubscription")
            ajax: {
                url: '{{ route('getWaiveElecSubsTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecLineDisconnect")
            ajax: {
                url: '{{ route('getElecDisconnectTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecFinancialTransfer")
            ajax: {
                url: '{{ route('getElecFinancTransferTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="globalelecMalfunction")
            ajax: {
                url: '{{ route('getElecGlblMulfuncTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecMalfunction")
            ajax: {
                url: '{{ route('getElecMalfuncTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecMeterCheck")
            ajax: {
                url: '{{ route('getElecMeterChekTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecMeterRead")
            ajax: {
                url: '{{ route('getElecMeterReadTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecMeterTransfer")
            ajax: {
                url: '{{ route('getElecMeterTransfrTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="elecLineReconnect")
            ajax: {
                url: '{{ route('getElecLineRecnctTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="newTicket16")
            ajax: {
                url: '{{ route('getElec16Tickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="newTicket37")
            ajax: {
                url: '{{ route('getElec37Tickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="newTicket27")
            ajax: {
                url: '{{ route('getElec27Tickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="newTicket29")
            ajax: {
                url: '{{ route('getElec29Tickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="newTicket36")
            ajax: {
                url: '{{ route('getElec36Tickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="newTicket39")
            ajax: {
                url: '{{ route('getElec39Tickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="buildingLicense")
            ajax: {
                url: '{{ route('getBuildingLicTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="engineeringValidation")
            ajax: {
                url: '{{ route('getEngValedTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="licenseFile")
            ajax: {
                url: '{{ route('getLicFileTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="ownershipTransfer")
            ajax: {
                url: '{{ route('getOwnershipTransferTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="retrieveLic")
            ajax: {
                url: '{{ route('getRetriveLicTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="sitePlan")
            ajax: {
                url: '{{ route('getSitePlanTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="straightening")
            ajax: {
                url: '{{ route('getStraighteningTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="collecting")
            ajax: {
                url: '{{ route('getCollectingTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="leavePermission")
            ajax: {
                url: '{{ route('getLeaveTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="vacationRequest")
            ajax: {
                url: '{{ route('getVacationTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="networkDevelopment")
            ajax: {
                url: '{{ route('getNetworkDevelopTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="PurchaseOrder")
            ajax: {
                url: '{{ route('getPurchaseTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="requestSpareParts")
            ajax: {
                url: '{{ route('getRequestSpareTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="outspreadTasks")
            ajax: {
                url: '{{ route('getOutspreadTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="publicComplaint")
            ajax: {
                url: '{{ route('getPublicComplaintTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="citizenComplaint")
            ajax: {
                url: '{{ route('getCitizenComplaintTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="quittance")
            ajax: {
                url: '{{ route('getQuittanceTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="innerQuittance")
            ajax: {
                url: '{{ route('getInnerQuittanceTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="vehicleMaintenance")
            ajax: {
                url: '{{ route('getVehicleMaintenanceTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="refueling")
            ajax: {
                url: '{{ route('getRefuelingTickets') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @endif
            
            @if ($type=="waterFinancialTransfer"||$type=="elecFinancialTransfer"||$type=="sitePlan"||$type=="PurchaseOrder"||$type=="publicComplaint"||$type=="citizenComplaint")   
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    {data:'customer_name',name:'customer_name'},
                    {data:'customer_mobile',name:'customer_mobile'},
                    {data:'app_no',name:'app_no'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            // link= '/admin/viewTicket/'+data.id+'/'+11;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
            @elseif($type=="quittance")
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    {data:'customer_name',name:'customer_name'},
                    {data:'customer_mobile',name:'customer_mobile'},
                    {data:'app_no',name:'app_no'},
                    {data:'reason_name',name:'t_constant.name'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            // link= '/admin/viewTicket/'+data.id+'/'+11;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
            @elseif ($type=="leavePermission")   
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data:'customer_name',name:'customer_name'},
                    {
                        data:null,
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span >'+ data.leave_name
                                            +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'t_constant.name',
                        
                    },
                    {data:'app_no',name:'app_no'},
                    {data:'leave_date',name:'leave_date'},
                    {data:'start',name:'start'},
                    {data:'end_dior',name:'end_dior'},
                    {data:'period',name:'period'},
                    {data:'malDesc',name:'malDesc'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            // link= '/admin/viewTicket/'+data.id+'/'+11;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
            @elseif ($type=="vacationRequest")   
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data:'customer_name',name:'customer_name'},
                    {data:'app_no',name:'app_no'},
                    {
                        data:null,
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span >'+ data.vac_name
                                            +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'t_constant.name',
                        
                    },
                    {data:'start_date',name:'start_date'},
                    {data:'end_date',name:'end_date'},
                    {
                        data:'vac_day_no',
                        render:function(data,row,type){
                            $actionbtn=(data==0?1:data);
                            return $actionbtn;
                        },
                        name:'vac_day_no'
                        
                    },
                    {data:'malDesc',name:'malDesc'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            // link= '/admin/viewTicket/'+data.id+'/'+11;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
  
            @elseif($type=="networkDevelopment") 
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    {data:'net_name',name:'t_constant.name'},
                    {data:'malDesc',name:'malDesc'},
                    {data:'app_no',name:'app_no'},
                    {data:'regionName',name:'regions.name'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            link= '/admin/viewTicket/'+data.id+'/'+6;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
            @elseif($type=="outspreadTasks") 
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    {data:'customer_name',name:'customer_name'},
                    {data:'task_name',name:'t_constant.name'},
                    {data:'app_no',name:'app_no'},
                    {data:'regionName',name:'regions.name'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            link= '/admin/viewTicket/'+data.id+'/'+6;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
            @elseif($type=="requestSpareParts") 
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    {data:'app_no',name:'app_no'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            link= '/admin/viewTicket/'+data.id+'/'+6;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
                 @elseif($type=="innerQuittance") 
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    {data:'app_no',name:'app_no'},
                    {data:'customer_name',name:'customer_name'},
                    {data:'national_id',name:'national_id'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            link= '/admin/viewTicket/'+data.id+'/'+6;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                            
                                $actionBtn = `<i  style="margin-right:17px;" onclick="PrintForm('${ data.customer_name}','${ data.national_id}','${ data.input1}','${ data.input2}','${ data.input3}',
                                '${ data.input4}','${ data.input5}','${ data.input6}','${ data.input7}','${ data.input8}','${ data.input9}','${ data.input10}','${ data.input11}',
                                '${ data.input12}','${ data.input13}','${ data.input14}')"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </i>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
            @elseif($type=="vehicleMaintenance" || $type=="refueling") 
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            console.log(link)
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    
                    {data:'customer_name',name:'customer_name'},
                    {data:'vehicle_no',name:'vehicle_no'},
                    {data:'app_no',name:'app_no'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            link= '/admin/viewTicket/'+data.id+'/'+6;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                            
                                $actionBtn = `<i  style="margin-right:17px;" onclick="PrintForm('${ data.customer_name}','${ data.national_id}','${ data.input1}','${ data.input2}','${ data.input3}',
                                '${ data.input4}','${ data.input5}','${ data.input6}','${ data.input7}','${ data.input8}','${ data.input9}','${ data.input10}','${ data.input11}',
                                '${ data.input12}','${ data.input13}','${ data.input14}')"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </i>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
                
            @else 
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data:null, 
                        render:function(data,row,type){
                            link= '/admin/viewTicket/'+data.id+'/'+{{$app_no}};
                            
                            // $rowDateTime=data.created_at.split('T');
                            // $rowDate=$rowDateTime[0].split('-');
                            // $date=$rowDate[2]+'/'+$rowDate[1]+'/'+$rowDate[0];
                            // $time=$rowDateTime[1].substring(0, 5);
                            date=new Date(data.created_at);
                            $date=`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
                            $time=`${date.getHours()}:${date.getMinutes()}`;
                            $actionbtn='<a target="_blank" href="{{asset(app()->getLocale())}}'+link+'">'
                                            +'<span class="hideMob" >'+ $date
                                            +'<img src="{{ asset('assets/images/ico/clock.png') }}" style="margin-right: 29px;margin-left: 8px;" width="32" height="32">'
                                            +$time +'</span>'
                                        +'</a>';
                            return $actionbtn;
                        },
                        name:'created_at',
                        
                    },
                    {data:'customer_name',name:'customer_name'},
                    {data:'customer_mobile',name:'customer_mobile'},
                    {data:'app_no',name:'app_no'},
                    {data:'regionName',name:'regions.name'},
                    { 
                        data:null, 
                        render:function(data,row,type){
                            color='green';
                           
                            if(data.ticket_status==5003){
                                color='red';
                            }
                            link= '/admin/viewTicket/'+data.id+'/'+6;
                            
                                $actionbtn='<div class="row">';
                                $actionbtn+=(data.ticket_status==5003?'<img src="{{asset('assets/images/ico/lock.png')}}" style="height: 18px"> &nbsp; &nbsp;'
                                            :'<img src="{{asset('assets/images/ico/greenlook.png')}}" style="height: 18px">  &nbsp; &nbsp;')
                                $actionbtn+= `<div style="color:${color};">${$appStatusList[data.ticket_status]}</div>`;
                                $actionbtn+='</div>';
                                
                                    return $actionbtn;
                        },
                        name:'ticket_status'
                    },
                    {data:'added_by',name:'admins.name'},
                    {
                        data: null,
                        render:function(data,row,type){
                                $actionBtn = `<a href='{{route('admin.dashboard')}}/printTicket/${data.id}/{{$app_no}}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                                    return $actionBtn;
                        },
                        name:'admins.name',
                    },
                   
                ],
            @endif
            
            
            dom: 'Bflrtip',
            buttons: [
                {
                    extend: 'excel',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'excel',
                        src:'{{asset('assets/images/ico/excel.png')}}',
                        style: 'cursor:pointer;display:inline;height: 40px; padding-top: 4px;',
                    },

                },
                {
                    extend: 'print',
                    tag: 'img',
                    title:'',
                    attr:  {
                        title: 'print',
                        src:'{{asset('assets/images/ico/Printer.png')}} ',
                        style: 'cursor:pointer;height: 32px;display:inline',
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
            table.buttons().container().appendTo($('.datatable_header'));
            table.on( 'draw.dt', function () {
                setTimeout(function(){
                    $(".attach-text").each(function(){
                        $(this).html($(this).html().substring(0, 18))
                    })
                    $('a').on('mouseenter', function() {
                        $(this).tooltip('show');
                    });
                },500)
            } );
        
        })
</script>    
