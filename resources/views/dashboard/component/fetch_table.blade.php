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
<div class="content-body resultTblaa">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card" >
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title datatable_header"><img class="hidemob" src="{{asset('assets/images/ico/report32.png')}}" /> 
                            @if ($type=="outArchive")
                            {{ trans('archive.sending_out') }}
                            @elseif ($type=="inArchive")
                            {{ trans('archive.sending_in') }}
                            @elseif ($type=="empArchive")
                            {{ trans('archive.emp_archive_lst') }}
                            @elseif ($type=="contractArchive")
                            {{ trans('archive.dep_archive_lst') }}
                            @elseif ($type=="citArchive")
                            {{ trans('archive.cit_archive') }}
                            @elseif ($type=="licArchive")
                            {{ trans('archive.lic_archive') }}
                            @elseif ($type=="financeArchive")
                            {{ trans('archive.finance_achive_lst') }}
                            @elseif ($type=="projArchive")
                            {{ trans('archive.proj_archive_lst') }}
                            @elseif ($type=="munArchive")
                            {{ trans('archive.mun_archive_lst') }}
                            @elseif ($type=="licFileArchive")
                            {{ trans('archive.licFile_archive') }}
                            @elseif ($type=="joblicArchive")
                            {{ trans('archive.jobLic_archive') }}
                            @elseif ($type=="subscriber")
                            {{ trans('admin.subscribers') }}
                            @elseif ($type=="subscriber1")
                            {{ trans('admin.subscribers') }}
                            @elseif ($type=="depart")
                            {{ trans('admin.department') }}
                            @elseif ($type=="project")
                            {{ trans('admin.projects') }}
                            @elseif ($type=="employee")
                            {{ trans('admin.employee') }}
                            @elseif ($type=="vehicle")
                            {{ trans('admin.vehicles') }}
                            @elseif ($type=="buildings")
                            {{ trans('admin.buildings') }}
                            @elseif ($type=="warehouses")
                            {{ trans('admin.warehouses') }}
                            @elseif ($type=="Gardens_lands")
                            {{ trans('admin.Gardens_lands') }}
                            @elseif ($type=="equip")
                            {{ trans('admin.dev_equp') }}
                            @elseif ($type=="org")
                            {{ trans('admin.orginzation') }} 			   
                            @elseif ($type=="doctor")
                            أطباء		   
                            @elseif ($type=="hospital")
                            المستشفيات		   
                            @elseif ($type=="volunteer")                           
                            {{ 'المتطوعين' }}
                            @elseif ($type=="lawArchieve")                           
                            {{trans('archive.law_archive')}}
                            @elseif ($type=="assetsArchive")                           
                            {{trans('archive.assets_archive_lst')}}
                            @elseif ($type=="spareParts")
                            {{trans('assets.Spare_parts')}}
                            @elseif ($type=="aged")
                            {{'المسنين'}}
                            @elseif ($type=="medicines")
                            {{'الادوية'}}
                            @elseif ($type=="EarchLic")
                            {{'شهادات الاراضي'}}
                             @elseif ($type=="agArchive")
                            {{'ارشيف الجلسات'}}
                            @else
                            {{ trans('archive.search_result') }}
                             @endif
                            </h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                        @if ($type=="outArchive"||$type=="inArchive"||$type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='assetsArchive'||$type=='citArchive'||$type=='contractArchive')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px;">
                                                    #
                                                </th>
                                                <th  width="60px;">
                                                    {{trans('admin.number')}}
                                                </th>
                                                <th width="80px;">
                                                     @if ($type=='outArchive')  
                                                        {{trans('archive.date_send')}}
                                                    @elseif ($type=='inArchive') 
                                                        {{trans('archive.date_recivd')}}
                                                    @else
                                                    {{trans('archive.date')}}
                                                    @endif
                                                </th>
                                                @if($type=='assetsArchive'||$type=='empArchive'||$type=='citArchive'||$type=='projArchive'||$type=='contractArchive')
                                                <th width="80px;">
                                                    {{trans('admin.type')}}
                                                </th>
                                                @endif
                                                <th width="200px;" >
                                                    {{trans('archive.title_send')}}
                                                </th>
                                                <th width="150px;">
                                                     @if ($type=='inArchive') 
                                                        {{trans('archive.import_from')}}
                                                    @elseif ($type=='outArchive')
                                                        {{trans('admin.related_to')}}
                                                    @elseif ($type=='assetsArchive')
                                                        {{trans('archive.name_assets')}}
                                                    @else
                                                    {{trans('archive.commitment_to')}}
                                                    @endif
                                                    
                                                </th>
                                                <th width="140px;">
                                                    {{trans('admin.copy_to')}}
                                                </th>
                                                <th width="410px;">
                                                    {{trans('archive.attach')}}
                                                </th>
                                                <th style="width:79px!important;" class="hidemob">
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif($type == 'spareParts') <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px"> # </th>
                                                <th> {{trans('assets.sparePart_name')}} </th>
                                                <th> {{trans('assets.barecode')}} </th>
                                                <th> {{trans('assets.store')}} </th>
                                                <th> {{trans('assets.quantity')}} </th>
                                                <th style="width: 80px">  </th>

                                            </tr>
                                        </thead>
                                        @elseif($type == 'medicines') <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px"> # </th>
                                                <th> {{'اسم الدواء'}} </th>
                                                <th> {{'الاسم العلمى'}} </th>
                                                <th> {{'البديل الاول'}} </th>
                                                <th> {{'البديل الثانى'}} </th>
                                                <th> الجرعة </th>
                                                <th> العلاج </th>
                                                <th style="width: 30px">  </th>

                                            </tr>
                                        </thead>
                                        @elseif($type=='licArchive'||$type=='licFileArchive')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th  >
                                                    #
                                                </th>
                                                <th style="width:200px">
                                                    {{trans('admin.subscriber_name')}}
                                                </th>
                                                
                                                @if($type=='licArchive')
                                                <th style="width:100px">
                                                    رقم الملف
                                                </th>
                                                <th  >
                                                    {{trans('archive.lic_num')}}
                                                </th>
                                                @elseif($type=='licFileArchive')
                                                <th  >
                                                    {{trans('archive.licfile_num')}}
                                                </th>
                                                @endif
                                                
                                                <th>
                                                    الغاية من الإستعمال
                                                </th>
                                                <!--<th>-->
                                                <!--    {{trans('archive.build_type')}}-->
                                                <!--</th>-->
                                                <th>
                                                    {{ trans('archive.pelvis_number') }}
                                                </th>
                                                <th>
                                                   {{ trans('archive.piece_number') }}
                                                </th>
                                                <th style="width:320px">
                                                    {{trans('archive.attach')}}
                                                </th>
                                                <th style="width:80px!important;" >
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif($type=='financeArchive')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th  >
                                                    #
                                                </th>
                                                <th style="width:200px">
                                                    
                                                    {{trans('admin.supplier_name')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.date')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.deal_type')}}
                                                </th>
                                                <th>
                                                   {{trans('admin.notes')}}
                                                </th>
                                                <th style="width:320px">
                                                    {{trans('archive.attach')}}
                                                </th>
                                                <th style="width:80px!important;" >
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif($type=='agArchive')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px">
                                                #
                                                </th>
                                                <th>
                                                    رقم الجلسة
                                                </th>
                                                <th>
                                                    تاريخ الجلسة
                                                </th>
                                                <th>
                                                    اسم الاجتماع 
                                                </th>
                                                <th>
                                                   عدد المواضيع
                                                </th>
                                                <th>
                                                      عدد المستفيدين
                                                </th>
                                                <th>
                                                      المرفقات
                                                </th>
                                                <th style="width:150px;" class="hidemob">
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type=="jobLicArchive")
                                        <thead>
                                            <tr>
                                                <th  >
                                                   #
                                                </th>
                                                <th  >
                                                    {{trans('admin.subscriber_name')}}
                                                </th>
                                                <th >
                                                    الاسم التجاري
                                                </th>
                                                <th >
                                                    رقم الرخصة
                                                </th>
                                                <th >
                                                    المنطقة
                                                </th>
                                                <th >
                                                    تاريخ الإصدار
                                                </th>
                                                <th >
                                                    تاريخ الإنتهاء
                                                </th>
                                                
                                                <th >
                                                    حالة الرخصة
                                                </th>
                                                <th style="width: 15%;">
                                                    {{trans('archive.attach')}}
                                                </th>
                                                <th style="width:79px!important;" >
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type=="subscriber")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                             {{trans('admin.subscriber_name')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.phone')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.emp_id')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type=="subscriber1")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                             {{trans('admin.subscriber_name')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.phone')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.emp_id')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type=="aged")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{'الاسم'}}
                                                </th>
                                                <th>
                                                    {{'رقم الهوية'}}
                                                </th>
                                                <th>
                                                    {{'رقم الهاتف'}}
                                                </th>
                                                <th>
                                                    {{'تاريخ الميلاد'}} 
                                                </th>
                                                <th>
                                                    {{'تاريخ الدخول'}}
                                                </th>
                                                <th style="width: 30px">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type=="employee")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('admin.employee_name')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.phone')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.department')}}  
                                                </th>
                                                <th>
                                                    {{trans('admin.job_title')}}  
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type=="depart")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('admin.department')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.manager')}}
                                                </th>
                                                <th>
                                                    
                                                    {{trans('admin.related_to')}}   
                                                </th>
                                                <th style="width: 80px">
                                                       
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type=="project")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('admin.project_name')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.project_num')}}
                                                </th>
                                                
                                                <th>
                                                    {{trans('assets.datestart')}}   
                                                </th>
                                                <th>
                                                    {{trans('assets.dateend')}}   
                                                </th>
                                                
                                                <th>
                                                    {{trans('admin.project_cost')}}   
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}   
                                                </th>
                                                <th style="width: 80px">
                                                      
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'Gardens_lands')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.Gardens_lands_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.actual_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'buildings')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.buildings_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.actual_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'warehouses')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.warehouses_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.actual_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'org'|| $type=="hospital")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    @if($type=="hospital")
                                                    اسم المستشفى
                                                    @else
                                                    {{trans('admin.orgnization_name')}}
                                                    @endif
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.ZIP_code')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.phone')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.job_title')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type=="doctor")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    اسم الطبيب
                                                </th>
                                                <th>
                                                    {{trans('admin.phone')}} 
                                                </th>
                                                <th>
                                                    التخصص
                                                </th>
                                                <th>
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th style="width: 30px">
                                                    
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'equip')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.equp_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.dept')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.brand')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.equp_type')}} 
                                                </th>
                                                <th>
                                                    {{trans('assets.all_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.status')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.count')}}
                                                </th>
                                                <th style="width: 80px">
                                                   
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'vehicle')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.vehicles_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.department')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.vehicles_type')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.brand')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.fuel')}} 
                                                </th>
                                                <th>
                                                    {{trans('assets.all_price')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.date_sale')}}
                                                </th>
                                                <th style="width: 80px">
                                                    
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'jobLic')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                   اسم حامل الرخصة
                                                </th>
                                                <th>
                                                   رقم الهوية
                                                </th>
                                                <th>
                                                  رقم الرخصة
                                                </th>
                                                <th>
                                                   العنوان
                                                </th>
                                                <th>
                                                   الشارع / المنطقة
                                                </th>
                                                <th>
                                                   صنف الرخصة
                                                </th>
                                                <th>
                                                    نوع الحرفة او الصناعة
                                                </th>
                                                <th>
                                                   رقم الحد
                                                </th>
                                                <th>
                                                   اسم الحرفة
                                                </th>
                                                <th>
                                                   تاريخ الاصدار
                                                </th>
                                                <th>
                                                   رقم الوصل
                                                </th>
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'specialEmpArchive')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px">
                                                #
                                                </th>
                                                <th>
                                                   التاريخ
                                                </th>
                                                <th>
                                                   النوع
                                                </th>
                                                <th>
                                                   العنوان
                                                </th>
                                                <th>
                                                   ملاحظات
                                                </th>
                                                <th width="230px">
                                                    المرفقات
                                                </th>
                                                <th style="width:90px;">
                                                </th>
                                                <!--<th>-->
                                                <!--</th>-->
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'lawArchieve')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('archive.date')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.type')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.title_name')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.notes')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.commitment_to')}}
                                                </th>
                                                <th width="230px">
                                                    {{trans('archive.attach')}}
                                                </th>
                                                <th style="width:90px;" class="hidemob">
                                                </th>
                                                <!--<th>-->
                                                <!--</th>-->
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'EarchLic')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="10px">
                                                #
                                                </th>
                                                <th>
                                                    رقم الشهادة
                                                </th>
                                                <th>
                                                    تاريخ الشهادة
                                                </th>
                                                <th>
                                                    اسم المشروع
                                                </th>
                                                <th width="300px">
                                                      اسم المواطن
                                                </th>
                                                <th>
                                                      مساحة القطعة م2 
                                                </th>
                                                <th>
                                                      رسم الشهادة
                                                </th>
                                                <th>
                                                    رقم الحوض
                                                </th>
                                                <th>
                                                    رقم القطعة 
                                                </th>
                                                <th>
                                                    اسم المنطقة
                                                </th>
                                                <th style="width:150px;" class="hidemob">
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif($type == 'volunteer')                                        <thead>                                            <tr style="text-align:center !important;background: #00A3E8;">                                                <th width="50px">                                                #                                                </th>                                                <th>                                                    {{trans('admin.volunteer_name')}}                                                </th>                                                <th>                                                    {{trans('admin.birthdate')}}                                                </th>                                                <th>                                                    {{trans('admin.address')}}                                                </th>                                                <th>                                                    {{trans('admin.blood_type')}}                                                </th>                                                <th>                                                    {{trans('admin.driving_license')}}                                                </th>                                            </tr>                                        </thead>                                        @endif
                                        
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
        var buildArray = { "2079": '{{trans('archive.build_type1')}}', "2080": '{{trans('archive.build_type2')}}',"2081": '{{trans('archive.build_type3')}}'}; 


        
        var types=$('#type').val();
        $( function(){
            var table=$('.wtbl').DataTable({
            processing:true,
            serverSide:true,
            info:true,
            @if ($type=="employee")
            ajax:"{{ route('emp_info_all') }}",
            @elseif ($type=="subscriber")
            ajax:"{{ route('subscribe_info_all') }}",
            @elseif ($type=="subscriber1")
            ajax:"{{ route('citizen_info_all') }}",
            @elseif ($type=="aged")
            ajax:"{{ route('aged_info_all') }}",
            @elseif ($type=='agArchive')
            ajax: {
                url: '{{ route('agenda_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type=="depart")
            ajax:"{{ route('dep_info_all') }}",
            @elseif ($type=="medicines")
            ajax:"{{ route('medicine_info_all') }}",
            @elseif ($type=="jobLic")
            ajax:"{{ route('jobLic_info_all') }}",
            @elseif($type== 'spareParts')
            ajax:"{{ route('sparePart_info_all') }}",
            @elseif ($type == 'org' || $type=="doctor" || $type=="hospital")
            ajax: {
                url: '{{ route('orgnization_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type == 'vehicle')
            ajax:"{{ route('vehcile_info_all') }}",
            @elseif($type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands')
            ajax: {
                url: '{{ route('asset_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type == 'equip')
            ajax:"{{ route('equip_info_all') }}",
            @elseif ($type == 'project')
            ajax:"{{ route('project_info_all') }}",	    @elseif ($type == 'volunteer')            ajax:"{{ route('volunteer_info_all') }}",
            @elseif($type=="outArchive"||$type=="inArchive"||$type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='assetsArchive'||$type=='citArchive'||$type=='contractArchive' || $type=='lawArchieve' || $type == 'specialEmpArchive')
            ajax: {
                url: '{{ route('archieve_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif($type=="EarchLic")
            ajax: {
                url: '{{ route('all_EarchLic') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif($type=='licArchive'||$type=='licFileArchive')
            ajax: {
                url: '{{ route('archievelic_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif($type=='financeArchive')
            ajax: {
                url: '{{ route('financeArchive_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif($type=="jobLicArchive")
            ajax:"{{ route('archieveJoblic_info_all') }}",
            @endif
            @if($type == 'org' || $type=="hospital")
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data: null, 
                        render:function(data,row,type){
                            $actionBtn = (data.name??'');
                                return $actionBtn;
                        },
                        name:'name',
                    
                    },
                    {data:'manager_name',name:'manager_name'},
                    {data:'zepe_code',name:'zepe_code'},
                    {
                        data: null,
                        render:function(data,row,type){
                            $phone='';
                            if(data.phone_one!=null){
                               $phone= data.phone_one;
                            }else if(data.phone_two!=null){
                                $phone= data.phone_two;
                            }
                            
                            return $phone
                            
                        },
                        name:'name',
                    },
                    {data:'job_title_name' ,name:'t_constant.name'},
                    {data:'region_name',name:'regions.name'},
                    {
                    data: null, 
                    render:function(data,row,type){
                            $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                            @can('delete_model')
                            $actionBtn += '<a onclick="delete_org('+(data.id??'')+')" style="margin-right:5px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            @endcan
                                return $actionBtn;
                        },
                        name:'name',
                    },
                ],
            @elseif($type == 'doctor')
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data: null, 
                        render:function(data,row,type){
                            $actionBtn = '<a ondblclick="update('+data.id+')">'+(data.name??'')+'</a>';
                                return $actionBtn;
                        },
                        name:'name',
                    
                    },
                    {
                        data: null,
                        render:function(data,row,type){
                            $phone='';
                            if(data.phone_one!=null){
                               $phone= data.phone_one;
                            }else if(data.phone_two!=null){
                                $phone= data.phone_two;
                            }
                            
                            return $phone
                            
                        },
                        name:'name',
                    },
                    {data:'job_title_name' ,name:'t_constant.name'},
                    {data:'region_name',name:'regions.name'},
                    {
                    data: null, 
                    render:function(data,row,type){
                            // $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                            $actionBtn = '';
                            @can('delete_model')
                            $actionBtn = '<a onclick="delete_org('+(data.id??'')+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            @endcan
                                return $actionBtn;
                        },
                        name:'name',
                    },
                ],
            @elseif($type == 'depart')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = data.name;
                            return $actionBtn;
                    },
                    name:'name',
                },
                {data:'manager_name',name:'admins.name'},//manager_name
                {
                    data:null,
                    render:function(data,row,type){
                        $name='';
                        if(data.link_dept){
                            $name= data.link_dept.name;
                        }
                        return $name;
                    },
                    name:'name',
                },
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        
                        @can('delete_model')
                        $actionBtn += '<a onclick="delete_dept('+(data.id??'')+')" style="margin-right:5px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },

            ],
            @elseif($type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                { 
                   data: null, 
                    render:function(data,row,type){
                        $actionBtn = data.name;
                            return $actionBtn;
                    },
                    name:'name',
                },
                {data:'manager_name',name:'admins.nick_name'},//manager_name
                {data:'price'},
                {data:'region_name',name:'regions.name'},
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        @can('delete_model')
                        $actionBtn += '<a onclick="delete_building('+(data.id??'')+')" style="margin-right:5px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type == 'medicines')
            columns:[

                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                { data: null,
                render:function(data,row,type)
                {
                    $actionBtn = '<a ondblclick="update('+(data.id??'')+')">'+(data.name??'')+'</a>';
                    return $actionBtn;
                },
                name:'name', },
                {data:'scientific_name'},
                {data: 'alternative_1'},
                // {data:('storehouse.name')},
                {data:'alternative_2'},
                {data:'treatment.name'},
                {data:'dos.name'},
                {
                    data: null,
                    render:function(data,row,type){
                        // $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        
                        $actionBtn = '<a onclick="delete_medicine('+(data.id??'')+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type=="employee"||$type=="subscriber")
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = data.name;
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'phone_one'},
                @if ($type=="employee")
                {data:'department_name',name:'departments.name'},
                {data:'job_title_name',name:'a.name'},
                @elseif ($type=="subscriber")
                {data:'national_id'},
                @endif
                {data:'region_name',name:'regions.name'},
                @if ($type=="subscriber"||$type=="employee")
                {
                data: null, 
                render:function(data,row,type){
                    $actionBtn = '<a onclick="update('+(data.id??'')+')" class="btn btn-info" style="margin-left: 5px;"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                    @can('delete_model')
                        $actionBtn += '<a onclick="delete_user('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-trash"></i> </a>';
                    @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
                @endif
            ],
            @elseif($type=="subscriber1")
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = data.name;
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'phone_one'},
                {data:'national_id'},
                {data:'region_name',name:'regions.name'},
                { data: null, 
                render:function(data,row,type){
                    $actionBtn = '<a onclick="update('+(data.id??'')+')" class="btn btn-info" style="margin-left: 5px;"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                    @can('delete_model')
                        $actionBtn += '<a onclick="delete_user('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-trash"></i> </a>';
                    @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type=="aged")
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+(data.id??"")+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
                {data:'national_id'},
                {data:'phone'},
                {data:'birth_date'},
                {data:'enter_date'},
                {
                data: null, 
                render:function(data,row,type){
                    $actionBtn = '';
                    
                        $actionBtn = '<a onclick="delete_aged('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-trash"></i> </a>';
                    
                            return $actionBtn;
                    },
                    name:'name',
                },
                
            ],
            @elseif($type == 'vehicle')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = data.name;
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'manager_name',name:'admins.name'},
                {data:'department_name',name:'departments.name'},
                {data:'type_name',name:'b.name'},
                {data:'brand_name',name:'a.name'},//brand
                {data:'oilname',name:'o.name'},
                {data:'price'},
                {data:'selling_date'},
                {
                    data: null,
                    render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        @can('delete_model')
                        $actionBtn += '<a onclick="delete_vehicle('+(data.id??'')+')" style="margin-right:5px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type == 'jobLic')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+(data.id??'')+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'nationalId'},
                {data:'licNo'},
                {data:'address'},
                {data:'street'},
                {data:'lic_cat'},
                {data:'lic_type'},
                {data:'hadNo'},
                {data:'lic_name'},
                {data:'start_date'},
                {data:'waselNo'},
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '';
                        @can('store_archive')
                        $actionBtn = '<a onclick="update('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        @endcan
                        return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type == 'project')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = (data.name??'');
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'ProjectNo'},
                {data:'dateStart'},
                {data:'dateEnd'},
                {data:'Projectcost'},
                {data:'region_name',name:'regions.name'},
                {
                    data: null,
                    render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        @can('delete_model')
                        $actionBtn += '<a onclick="delete_proj('+(data.id??'')+')" style="margin-right:5px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        @endcan
                        return $actionBtn;
                    },
                    name:'name',
                },
            ], 
            @elseif($type == 'volunteer')            
            columns:[                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},                {                    data: null,                    render:function(data,row,type){                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';                            return $actionBtn;                    },                    name:'name',                },                {data:'birthdate'},                {data:'address.city.name'},                {data:'blood_type'},                {data:'lincence.name'},            ],
            @elseif($type == 'equip')
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data: null, 
                        render:function(data,row,type){
                            $actionBtn = (data.name??'');
                                return $actionBtn;
                        },
                        name:'name',
                
                     },
                {data:'manager_name',name:'admins.name'},
                {data:'department_name',name:'departments.name'},
                {data:'brand_name',name:'a.name'},//brand
                {data:'type_name',name:'b.name'},
                {data:'price'},
                {data:'status',name:'c.name'},
                {data:'count'},
                {
                    data: null,
                    render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        @can('delete_model')
                        $actionBtn += '<a onclick="delete_equip('+(data.id??'')+')" style="margin-right:5px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        @endcan
                        return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type == 'spareParts')
                columns:[

                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                { data: null,
                render:function(data,row,type)
                {

                $actionBtn = (data.name??'');
                return $actionBtn;
                },
                name:'name', },
                {data:'barcode'},
                { data: null,
                render:function(data,row,type)
                {
                if(data.storehouse != null){
                $actionBtn = '<span>'+data.storehouse.name+'</span>';
                }
                else{
                $actionBtn = '<span>'+' '+'</span>';
                }
                return $actionBtn;
                },
                name:'storehouse.name', },
                // {data:('storehouse.name')},
                {data:'quantity'},
                {
                    data: null,
                    render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        
                        $actionBtn += '<a onclick="delete_spare('+(data.id??'')+')" style="margin-right:5px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
                ],
            @elseif ($type=='agArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data:'agenda_number'},
                {data:'agenda_date'},
                {data:'agenda_extention.name'},
                {
                    data: null,
                    
                    render:function(data,row,type){
                        if(data.agenda_topic != null){
                            return data.agenda_topic.length;
                        }else{
                            return 0;
                        }
                    },
                    name:'agenda_number',  
                    searchable: false,
                },
                {
                    data: null,
                    
                    render:function(data,row,type){
                        count=0;
                        if(data.agenda_topic != null){
                            for(i=0 ; i < data.agenda_topic.length ; i++){
                                if(data.agenda_topic[i].connected_to != null && data.agenda_topic[i].connected_to != 0)
                                    count++;
                            }
                        }
                        return count;
                        
                    },
                    name:'agenda_number',  
                    searchable: false,
                },
                {
                    data: null,
                    
                    render:function(data,row,type){
                        if(data.files!=null && data.files.length>0){ 
                            var i=1;
                            var c=0;
                            $actionBtn="<div class='row' style='margin-left:0px;'>";
                            data.files.forEach(file => {
                                shortCutName=data.file_ids[c].attachName;
                                urlfile='{{ asset('') }}';
                                urlfile+=file.url;
                                if(file.extension=="jpg"||file.extension=="png"||file.extension=="jfif")
                                fileimage='{{ asset('assets/images/ico/image.png') }}';
                                else if(file.extension=="pdf")
                                fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                else if(file.extension=="doc"||file.extension=="docx")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(file.extension=="excel"||file.extension=="xsc")
                                fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                else
                                fileimage='{{ asset('assets/images/ico/file.png') }}';
                                $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                    +'<div class="attach">'                                        
                                      +' <a class="attach-close1 otherattache" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'  <span class="attach-text">'+shortCutName+'</span>'
                                        +'    <img style="width: 20px;"src="'+fileimage+'">'
                                        +'</a>'
                                    +'</div>'
                                    +'</div>'; 
                                    c++;
                            });
                            $actionBtn += '</div>';
                            return $actionBtn;
                        }
                        else{return '';}
                    },
                    name:'fileIDS',                    
                },
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = `<a 
                        onclick="
                            $('#meetingTitleName').val('${data.agenda_extention.id}');
                            $('#agendaNum').val('${data.agenda_number}');
                            DisplayMeeting();
                        " 
                        class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>`;
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type=="outArchive"||$type=="inArchive"||$type=='munArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        // $date=data.created_at.substring(0,10);
                        // $time=data.created_at.substring(11,19);
                        $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                        $serisal = '<a data-toggle="tooltip" data-placement="top" data-original-title="'+ ' تمت الإضافة بواسطة ' +  data.admin.nick_name  +' بتاريخ '+$date+'" >'+(data.serisal?data.serisal:'-')+'</a>';
                            return $serisal;
                    },
                    name:'serisal',
                
                },
                // {data:'serisal'},
                {data:'date'},
               
                {
                    data: null, 
                    render:function(data,row,type){
                        // $time=data.created_at.substring(11,19);
                        $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                        $actionBtn = '<a data-toggle="tooltip" data-placement="top" data-original-title="'+ ' تمت الإضافة بواسطة ' +  data.admin.nick_name  +' بتاريخ '+$date +'" ondblclick="update('+data.id+')">'+data.title+'</a>';
                            return $actionBtn;
                    },
                    name:'title',
                
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        //$actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                        if(data.url.url){
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}/'+data.url.url+'?id='+data.model_id+'">'+data.name+'</a>';
                        }
                        else
                        {
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}">'+(data.name??'')+'</a>';
                        }
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                // {data:'model_id'},

                {data: 'copyTo'},
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
                                if(file.extension=="jpg"||file.extension=="png"||file.extension=="jfif")
                                fileimage='{{ asset('assets/images/ico/image.png') }}';
                                else if(file.extension=="pdf")
                                fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                else if(file.extension=="doc"||file.extension=="docx")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(file.extension=="excel"||file.extension=="xsc")
                                fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                else
                                fileimage='{{ asset('assets/images/ico/file.png') }}';
                                $actionBtn += '<div id="attach" class=" col-sm-6 ">'
                                    +'<div class="attach">'                                        
                                      +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'  <span class="attach-text hidemob">'+shortCutName+'</span>'
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
                {
                data: null, 
                className:"hidemob",
                render:function(data,row,type){
                    $actionBtn = '';
                    @can('store_archive')
                        $actionBtn = '<a onclick="update('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                    @endcan
                    @can('archive_delete')
                        $actionBtn += '<a onclick="delete_archive('+(data.id??'')+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                    @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type=='assetsArchive'||$type=='empArchive'||$type=='citArchive'||$type=='projArchive'||$type=='contractArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        // $date=data.created_at.substring(0,10);
                        // $time=data.created_at.substring(11,19);
                        $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                        $serisal = '<a data-toggle="tooltip" data-placement="top" data-original-title="'+ ' تمت الإضافة بواسطة ' +  data.admin.nick_name  +' بتاريخ '+$date+'" >'+(data.serisal?data.serisal:'-')+'</a>';
                            return $serisal;
                    },
                    name:'serisal',
                
                },
                // {data:'serisal'},
                {data:'date'},
                {
                    data: null, 
                    render:function(data,row,type){
                        // $time=data.created_at.substring(11,19);
                        $type='';
                        if(data.archive_type!=null){
                            $type=data.archive_type.name;
                        }
                        return $type;
                    },
                    name:'title',
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        // $time=data.created_at.substring(11,19);
                        $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                        $actionBtn = '<a data-toggle="tooltip" data-placement="top" data-original-title="'+ ' تمت الإضافة بواسطة ' +  data.admin.nick_name  +' بتاريخ '+$date +'" ondblclick="update('+data.id+')">'+data.title+'</a>';
                            return $actionBtn;
                    },
                    name:'title',
                
                },
                
                {
                    data: null, 
                    render:function(data,row,type){
                        //$actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                        if(data.url.url){
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}/'+data.url.url+'?id='+data.model_id+'">'+data.name+'</a>';
                        }
                        else
                        {
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}">'+data.name+'</a>';
                        }
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                // {data:'model_id'},

                {data: 'copyTo'},
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
                                if(file.extension=="jpg"||file.extension=="png"||file.extension=="jfif")
                                fileimage='{{ asset('assets/images/ico/image.png') }}';
                                else if(file.extension=="pdf")
                                fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                else if(file.extension=="doc"||file.extension=="docx")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(file.extension=="excel"||file.extension=="xsc")
                                fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                else
                                fileimage='{{ asset('assets/images/ico/file.png') }}';
                                $actionBtn += '<div id="attach" class=" col-sm-6 ">'
                                    +'<div class="attach">'                                        
                                      +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'  <span class="attach-text hidemob">'+shortCutName+'</span>'
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
                {
                data: null, 
                className:"hidemob",
                render:function(data,row,type){
                    $actionBtn = '';
                    @can('store_archive')
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                    @endcan
                    @can('archive_delete')
                        $actionBtn += '<a onclick="delete_archive('+data.id+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                    @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif($type=="lawArchieve")
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        // $time=data.created_at.substring(11,19);
                        $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                        $tooltip='<a data-toggle="tooltip" data-placement="top" data-original-title="'+ ' تمت الإضافة بواسطة ' +  data.admin.nick_name  +' بتاريخ '+$date +'" >'+data.date+'</a>';
                        return $tooltip;
                    },
                    name:'name',
                
                },
                // {data:'date'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $type ='';
                        if(data.archive_type!=null)
                        $type = data.archive_type.name;
                            return $type;
                    },
                    name:'name',
                
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        // $time=data.created_at.substring(11,19);
                        $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                        $actionBtn = '<a data-toggle="tooltip" data-placement="top" data-original-title="'+ ' تمت الإضافة بواسطة ' +  data.admin.nick_name  +' بتاريخ '+$date +'" ondblclick="update('+data.id+')">'+data.title+'</a>';
                            return $actionBtn;
                    },
                    name:'title',
                
                },
                {data:'serisal'},
                
                {
                    data: null, 
                    render:function(data,row,type){
                        //$actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                        if(data.url.url){
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}/'+data.url.url+'?id='+data.model_id+'">'+(data.name??'')+'</a>';
                        }
                        else
                        {
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}">'+(data.name??'')+'</a>';
                        }
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                
                // {
                //     data: null, 
                //     render:function(data,row,type){
                //         $actionBtn = '<a ondblclick="update('+data.id+')">'+(data.name??'')+'</a>';
                //             return $actionBtn;
                //     },
                //     name:'name',
                
                // },
                // {data:'model_id'},

                // {data: 'copyTo'},
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
                                if(file.extension=="jpg"||file.extension=="png"||file.extension=="jfif")
                                fileimage='{{ asset('assets/images/ico/image.png') }}';
                                else if(file.extension=="pdf")
                                fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                else if(file.extension=="doc"||file.extension=="docx")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
                                else if(file.extension=="excel"||file.extension=="xsc")
                                fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                                else
                                fileimage='{{ asset('assets/images/ico/file.png') }}';
                                $actionBtn += '<div id="attach" class=" col-sm-12 ">'
                                    +'<div class="attach">'                                        
                                      +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'  <span class="attach-text hidemob">'+shortCutName+'</span>'
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
                {
                data: null, 
                className:"hidemob",
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        $actionBtn += '<a style="margin-right:17px;" onclick="delete_archive('+data.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
                // {
                // data: null, 
                // render:function(data,row,type){
                //         $actionBtn = '<a onclick="" class="btn btn-info"><i style="color:#ffffff" class="fa fa-trash"></i> </a>';
                //             return $actionBtn;
                //     },
                //     name:'name',
                // },
            ],
            @elseif($type=="EarchLic")
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data:'cert_no',name:'cert_no'},
                {data:'date',name:'date'},
                {data:'proj_name',name:'proj_name'},
                // {data:'sponser_name',name:'sponser_name'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $user_name ='';
                        if(data.user_name!=null)
                            for($i = 0 ; $i<data.user_name.length ; $i++)
                                if(data.user_name[$i]!=null)
                                    $user_name += data.user_name[$i]+',';
                        return $user_name;
                    },
                    name:'user_name',
                
                },
                {data:'area',name:'area'},
                {data:'cert_cost',name:'cert_cost'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $hod_no ='';
                        if(data.hod_no!=null)
                        $hod_no = data.hod_no[(data.hod_no.length-1)];
                            return $hod_no;
                    },
                    name:'hod_no',
                
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        $pice_no ='';
                        if(data.pice_no!=null)
                        $pice_no = data.pice_no[(data.pice_no.length-1)];
                            return $pice_no;
                    },
                    name:'pice_no',
                
                },
                {data:'area_name',name:'area_name'},
                {
                data: null, 
                className:"hidemob",
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        $actionBtn += '<a style="margin-right:17px;" onclick="delete_earchLic('+data.id+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        $actionBtn += `<a href='{{route('admin.dashboard')}}/printLicEarth/${data.id}' style="margin-right:17px;" target="_blank"> <img title='print'
                                    style='cursor:pointer;height: 32px;'
                                    class:"fa fa-print" src="{{asset('assets/images/ico/Printer.png')}}" /> </a>`;
                            return $actionBtn;
                    },
                    name:'name',
                },

            ],
            @elseif( $type == 'specialEmpArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data:'date'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $type ='';
                        if(data.archive_type!=null)
                        $type = data.archive_type.name;
                            return $type;
                    },
                    name:'name',
                
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.title+'</a>';
                            return $actionBtn;
                    },
                    name:'title',
                
                },
                {data:'serisal'},
                
                // {data:'model_id'},

                // {data: 'copyTo'},
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
                                if(file.extension=="jpg"||file.extension=="png"||file.extension=="jfif")
                                fileimage='{{ asset('assets/images/ico/image.png') }}';
                                else if(file.extension=="pdf")
                                fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                else if(file.extension=="doc"||file.extension=="docx")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
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
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        $actionBtn += '<a style="margin-right:17px;" onclick="delete_archive('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
                // {
                // data: null, 
                // render:function(data,row,type){
                //         $actionBtn = '<a onclick="" class="btn btn-info"><i style="color:#ffffff" class="fa fa-trash"></i> </a>';
                //             return $actionBtn;
                //     },
                //     name:'name',
                // },
            ],
            @elseif ($type=='licArchive'||$type=='licFileArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        // $time=data.created_at.substring(11,19);
                        $date=data.created_at.substring(8,10)+'/'+data.created_at.substring(7,5)+'/'+data.created_at.substring(4,0);
                        $actionBtn = '<a data-toggle="tooltip" data-placement="top" data-original-title="'
                        +  ' تمت الإضافة بواسطة ' 
                        +  data.admin.nick_name  
                        +  ' بتاريخ '
                        +  $date 
                        +  '" target="_blank" href="{{ route('admin.dashboard') }}/subscribers?id='+data.model_id+'">'+data.name+  '</a>';
                        
                        return $actionBtn;
                    },
                    name:'name',
                
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        if(data.notes!=null){
                            $notes=data.notes;
                            $actionBtn = '<a data-toggle="tooltip" data-placement="top" data-original-title="'
                            +  $notes  
                            +  '" target="_blank">'+(data.fileNo??'_')+  '</a>';
                            
                            return $actionBtn;
                            
                        }else{
                            $actionBtn = '<a target="_blank">'+(data.fileNo??'_')+  '</a>';
                            return $actionBtn;
                        }
                    },
                    name:'name',
                
                },
                // {data:'fileNo'},
                {data:'licNo'},
                
                // {
                //     data: null, 
                //     render:function(data,row,type){
                //         $actionBtn = '<a ondblclick="update('+data.id+')">'+data.license_type_name+'</a>';
                //             return $actionBtn;
                //     },
                //     name:'license_type',
                
                // },
                {
                    data: null, 
                    render:function(data,row,type){
                        $use_desc=""
                        if(data.use_desc!=null){
                            $use_desc=data.use_desc;
                        }
                            return $use_desc;
                    },
                    name:'use_desc',
                
                },
                // {
                //     data: null, 
                //     render:function(data,row,type){
                //         $actionBtn = '<a ondblclick="update('+data.id+')">'+buildArray[data.license_type]+'</a>';
                //             return $actionBtn;
                //     },
                //     name:'license_type',
                
                // },
                {data:'licn'},
                {data:'licnfile'},
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
                                $actionBtn += '<div id="attach" class=" col-sm-6 ">'
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
                
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '';
                        @can('store_archive')
                        $actionBtn = '<a onclick="update('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        @endcan
                        @can('archive_delete')
                        $actionBtn += '<a onclick="delete_archive('+(data.id??'')+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif ($type=='financeArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                // {data: 'name'},
                {
                    data: null, 
                    render:function(data,row,type){
                        //$actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                        if(data.url.url){
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}/'+data.url.url+'?id='+data.model_id+'">'+(data.name??'')+'</a>';
                        }
                        else
                        {
                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}">'+(data.name??'')+'</a>';
                        }
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'date'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $type ='';
                        if(data.archive_type!=null)
                        $type = data.archive_type.name;
                            return $type;
                    },
                    name:'name',
                    
                },
                {data:'title'},
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
                                $actionBtn += '<div id="attach" class=" col-sm-6 ">'
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
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '';
                        @can('store_archive')
                        $actionBtn = '<a onclick="update('+(data.id??'')+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        @endcan
                        @can('archive_delete')
                        $actionBtn += '<a onclick="delete_archive('+(data.id??'')+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                        @endcan
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            
            @elseif ($type=='jobLicArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 

                    render:function(data,row,type){

                        $actionBtn = '<a target="_blank" href="{{ route('admin.dashboard') }}/subscribers?id='+data.model_id+'">'+(data.name??'_')+'</a>';

                            return $actionBtn;

                    },

                    name:'name',
                    // data: null, 
                    // render:function(data,row,type){
                    //     $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                    //         return $actionBtn;
                    // },
                    // name:'name',
                
                },
                {data:'trade_name'},
                
                {data:'license_number'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $type ='';
                        if(data.regions!=null)
                        $type = data.regions.name;
                            return $type;
                    },
                    name:'name',
                
                },
                
                {data:'start_date'},
                {data:'expiry_ate'},
                {data:'status'},

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
                                if(file.extension=="jpg"||file.extension=="png"||file.extension=="jfif")
                                fileimage='{{ asset('assets/images/ico/image.png') }}';
                                else if(file.extension=="pdf")
                                fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                                else if(file.extension=="doc"||file.extension=="docx")
                                fileimage='https://template.expand.ps/public/assets/images/ico/word.png';
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
                
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                        $actionBtn += '<a onclick="delete_archive('+data.id+')" style="margin-right:17px;" onclick="" class="btn btn-info"><i style="color:#ffffff;" class="fa fa-trash"></i> </a>';
                            return $actionBtn;
                    },
                    name:'name',
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
