<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


//note that the prefix is admin for all file route


Route::group(['namespace' => 'Dashboard'], function () {
        Route::get('portal_waterSubscription', 'WaterTicketController@WaterSubscription')->name('portal_waterSubscription');

    });
Route::group(['namespace' => 'Dashboard'], function () {
    Route::get('/export', 'UsersController@export')->name('admin.users.export');
    Route::get('/import', 'UsersController@import')->name('admin.users.import');
    Route::get('/transferUserTable', 'UsersImportController@transferUserTable')->name('admin.users.transferUserTable');
    Route::get('/transferEmpTable', 'EmpImportController@transferEmpTable')->name('admin.users.transferEmpTable');
    Route::get('/transferDeptTable', 'DeptImportController@transferDeptTable')->name('admin.users.transferDeptTable');
    Route::get('/transferOrgTable', 'OrgImportController@transferOrgTable')->name('admin.users.transferOrgTable');
    Route::get('/transferElecTable', 'ElecImportController@transferElecTable')->name('admin.users.transferElecTable');
    Route::get('/transferWaterTable', 'WaterImportController@transferWaterTable')->name('admin.users.transferWaterTable');
    Route::get('/transferLicTable', 'LicImportController@transferLicTable')->name('admin.users.transferLicTable');
    Route::get('/transferArchTable', 'ArchImportController@transferArchTable')->name('admin.users.transferArchTable');
    Route::get('/transferCopyToTable', 'ArchImportController@transferCopyToTable')->name('admin.users.transferCopyToTable');
    Route::get('/transferLicArchTable', 'LicArchImportController@transferLicArchTable')->name('admin.users.transferLicArchTable');
    Route::get('/transferAttachTable', 'AttachImportController@transferAttachTable')->name('admin.users.transferAttachTable');
    Route::get('/transferBuildTable', 'BuildLicImportController@transferBuildTable')->name('admin.users.transferBuildTable');
    Route::get('/transferTransTable', 'TransImportController@transferTransTable')->name('admin.users.transferTransTable');
    Route::get('/transferTicketStatusTable', 'TransImportController@transferTicketStatusTable')->name('admin.users.transferTicketStatusTable');
    Route::get('/transferResponseTable', 'TransImportController@transferResponseTable')->name('admin.users.transferResponseTable');
    
    Route::get('/transferMessageReceiversTable', 'MessageImportController@transferMessageReceiversTable')->name('admin.users.transferMessageReceiversTable');
    Route::get('/transferMessageTable', 'MessageImportController@transferMessageTable')->name('admin.users.transferMessageTable');
    Route::get('/transferMessageFilesTable', 'MessageImportController@transferMessageFilesTable')->name('admin.users.transferMessageFilesTable');

    Route::get('/transferTicket1Table', 'TicketImportController@transferTicket1Table')->name('admin.users.transferTicket1Table');
    Route::get('/transferTicket2Table', 'TicketImportController@transferTicket2Table')->name('admin.users.transferTicket2Table');
    Route::get('/transferTicket4Table', 'TicketImportController@transferTicket4Table')->name('admin.users.transferTicket4Table');
    Route::get('/transferTicket5Table', 'TicketImportController@transferTicket5Table')->name('admin.users.transferTicket5Table');
    Route::get('/transferTicket6Table', 'TicketImportController@transferTicket6Table')->name('admin.users.transferTicket6Table');
    Route::get('/transferTicket7Table', 'TicketImportController@transferTicket7Table')->name('admin.users.transferTicket7Table');
    Route::get('/transferTicket8Table', 'TicketImportController@transferTicket8Table')->name('admin.users.transferTicket8Table');
    Route::get('/transferTicket10Table', 'TicketImportController@transferTicket10Table')->name('admin.users.transferTicket10Table');
    Route::get('/transferTicket13Table', 'TicketImportController@transferTicket13Table')->name('admin.users.transferTicket13Table');
    Route::get('/transferTicket11Table', 'TicketImportController@transferTicket11Table')->name('admin.users.transferTicket11Table');
    Route::get('/transferTicket14Table', 'TicketImportController@transferTicket14Table')->name('admin.users.transferTicket14Table');
    Route::get('/transferTicket14bTable', 'TicketImportController@transferTicket14bTable')->name('admin.users.transferTicket14bTable');
    Route::get('/transferTicket15Table', 'TicketImportController@transferTicket15Table')->name('admin.users.transferTicket15Table');
    Route::get('/transferTicket16Table', 'TicketImportController@transferTicket16Table')->name('admin.users.transferTicket16Table');
    Route::get('/transferTicket12Table', 'TicketImportController@transferTicket12Table')->name('admin.users.transferTicket12Table');
    Route::get('/transferTicket17Table', 'TicketImportController@transferTicket17Table')->name('admin.users.transferTicket17Table');
    Route::get('/transferTicket19Table', 'TicketImportController@transferTicket19Table')->name('admin.users.transferTicket19Table');
    Route::get('/transferTicket18Table', 'TicketImportController@transferTicket18Table')->name('admin.users.transferTicket18Table');
    Route::get('/transferTicket23Table', 'TicketImportController@transferTicket23Table')->name('admin.users.transferTicket23Table');
    Route::get('/transferTicket28Table', 'TicketImportController@transferTicket28Table')->name('admin.users.transferTicket28Table');
    Route::get('/transferTicket32Table', 'TicketImportController@transferTicket32Table')->name('admin.users.transferTicket32Table');
    Route::get('/transferTicket36Table', 'TicketImportController@transferTicket36Table')->name('admin.users.transferTicket36Table');
    Route::get('/transferTicket31Table', 'TicketImportController@transferTicket31Table')->name('admin.users.transferTicket31Table');
    Route::get('/transferTicket37Table', 'TicketImportController@transferTicket37Table')->name('admin.users.transferTicket37Table');
    Route::get('/transferTicket24Table', 'TicketImportController@transferTicket24Table')->name('admin.users.transferTicket24Table');
    Route::get('/transferTicket24bTable', 'TicketImportController@transferTicket24bTable')->name('admin.users.transferTicket24bTable');
    Route::get('/transferOrdersTable', 'TicketImportController@transferOrdersTable')->name('admin.users.transferOrdersTable');
    Route::get('/transferEarchLic', 'EarchLicImportController@transferEarchLic')->name('admin.users.transferEarchLic');
    Route::get('/transferEarchLicOwners', 'EarchLicImportController@transferEarchLicOwners')->name('admin.users.transferEarchLicOwners');
    Route::get('/transferJsonTable', 'AppJsonImportController@transferJsonTable')->name('admin.users.transferJsonTable');
    Route::get('/transferBra2aaTable', 'AppJsonImportController@transferBra2aaTable')->name('admin.users.transferBra2aaTable');

});
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
        
        Route::get('viewTicketPortal/{id}', 'AppPortal@viewTicketPortal')->name('viewTicketPortal');

        /************ ticket area ***************/
        Route::post('saveTicket1', 'AppOp@saveTicket1')->name('saveTicket1');
        Route::post('saveTicket2', 'AppOp@saveTicket2')->name('saveTicket2');
        Route::post('saveTicket4', 'AppOp@saveTicket4')->name('saveTicket4');
        Route::post('saveTicket5', 'AppOp@saveTicket5')->name('saveTicket5');
        Route::post('saveTicket6', 'AppOp@saveTicket6')->name('saveTicket6');
        Route::post('saveTicket7', 'AppOp@saveTicket7')->name('saveTicket7');
        Route::post('saveTicket8', 'AppOp@saveTicket8')->name('saveTicket8');
        Route::post('saveTicket9', 'AppOp@saveTicket9')->name('saveTicket9');
        Route::post('saveTicket10', 'AppOp@saveTicket10')->name('saveTicket10');
        Route::post('saveTicket11', 'AppOp@saveTicket11')->name('saveTicket11');
        Route::post('saveTicket12', 'AppOp@saveTicket12')->name('saveTicket12');
        Route::post('saveTicket13', 'AppOp@saveTicket13')->name('saveTicket13');
        Route::post('saveTicket14', 'AppOp@saveTicket14')->name('saveTicket14');
        Route::post('saveTicket15', 'AppOp@saveTicket15')->name('saveTicket15');
        Route::post('saveTicket16', 'AppOp@saveTicket16')->name('saveTicket16');
        Route::post('saveTicket17', 'AppOp@saveTicket17')->name('saveTicket17');
        Route::post('saveTicket18', 'AppOp@saveTicket18')->name('saveTicket18');
        Route::post('saveTicket19', 'AppOp@saveTicket19')->name('saveTicket19');
        Route::post('saveTicket20', 'AppOp@saveTicket20')->name('saveTicket20');
        Route::post('saveTicket21', 'AppOp@saveTicket21')->name('saveTicket21');
        Route::post('saveTicket22', 'AppOp@saveTicket22')->name('saveTicket22');
        Route::post('saveTicket23', 'AppOp@saveTicket23')->name('saveTicket23');
        Route::post('saveTicket24', 'AppOp@saveTicket24')->name('saveTicket24');
        Route::post('saveTicket25', 'AppOp@saveTicket25')->name('saveTicket25');
        Route::post('saveTicket26', 'AppOp@saveTicket26')->name('saveTicket26');
        Route::post('saveTicket27', 'AppOp@saveTicket27')->name('saveTicket27');
        Route::post('saveTicket28', 'AppOp@saveTicket28')->name('saveTicket28');
        Route::post('saveTicket29', 'AppOp@saveTicket29')->name('saveTicket29');
        Route::post('saveTicket30', 'AppOp@saveTicket30')->name('saveTicket30');
        Route::post('saveTicket31', 'AppOp@saveTicket31')->name('saveTicket31');
        Route::post('saveTicket32', 'AppOp@saveTicket32')->name('saveTicket32');
        Route::post('saveTicket33', 'AppOp@saveTicket33')->name('saveTicket33');
        Route::post('saveTicket34', 'AppOp@saveTicket34')->name('saveTicket34');
        Route::post('saveTicket35', 'AppOp@saveTicket35')->name('saveTicket35');
        Route::post('saveTicket36', 'AppOp@saveTicket36')->name('saveTicket36');
        Route::post('saveTicket37', 'AppOp@saveTicket37')->name('saveTicket37');
        Route::post('saveTicket38', 'AppOp@saveTicket38')->name('saveTicket38');
        Route::post('addReplay', 'AppOp@addReplay')->name('addReplay');
        Route::post('directAddSmsLog', 'AppOp@directAddSmsLog')->name('directAddSmsLog');
        Route::post('addTrans', 'AppOp@addTrans')->name('addTrans');
        Route::get('viewTicket/{id}/{type}', 'AppOp@viewTicket')->name('viewTicket');
        Route::get('addSubscription/{id}/{type}', 'AppOp@addSubscription')->name('addSubscription');
        Route::get('editTicket/{id}/{type}', 'AppOp@editTicket')->name('editTicket');
        Route::get('printTicket/{id}/{type}', 'PrintTicket@printTicket')->name('printTicket');
        Route::get('printBar2aa/{id}/{type}', 'PrintTicket@printBar2aa')->name('printBar2aa');
        Route::put('TicketDel', 'AppOp@deleteTicket')->name('TicketDel');
        Route::put('updateVac', 'AppOp@updateVac')->name('updateVac');
        Route::get('getVacForEmployee/{id}', 'AppOp@getVacForEmployee')->name('getVacForEmployee');
        Route::POST ('saveEditTicket', 'PrintTicket@saveEditTicket')->name('saveEditTicket');
        Route::get('editPrint/{id}/{type}', 'PrintTicket@editPrint')->name('editPrint');
        /****************************************/
        
        

        Route::get('getWaterTickets', 'TasksTableController@getWaterTickets')->name('getWaterTickets');
        Route::get('getElecSubscriptionTickets', 'TasksTableController@getElecSubscriptionTickets')->name('getElecSubscriptionTickets');
        Route::get('getWaterMalfuncTickets', 'TasksTableController@getWaterMalfuncTickets')->name('getWaterMalfuncTickets');
        Route::get('getWaterDisconnectTickets', 'TasksTableController@getWaterDisconnectTickets')->name('getWaterDisconnectTickets');
        Route::get('getWaterFinancTransferTickets', 'TasksTableController@getWaterFinancTransferTickets')->name('getWaterFinancTransferTickets');
        Route::get('getWaterGlblMulfuncTickets', 'TasksTableController@getWaterGlblMulfuncTickets')->name('getWaterGlblMulfuncTickets');
        Route::get('getWaterMeterChekTickets', 'TasksTableController@getWaterMeterChekTickets')->name('getWaterMeterChekTickets');
        Route::get('getWaterMeterReadTickets', 'TasksTableController@getWaterMeterReadTickets')->name('getWaterMeterReadTickets'); 
        Route::get('getWaterMeterTransfrTickets', 'TasksTableController@getWaterMeterTransfrTickets')->name('getWaterMeterTransfrTickets'); 
        Route::get('getWaterLineRecnctTickets', 'TasksTableController@getWaterLineRecnctTickets')->name('getWaterLineRecnctTickets'); 
        Route::get('getWaiveWaterSubsTickets', 'TasksTableController@getWaiveWaterSubsTickets')->name('getWaiveWaterSubsTickets'); 
        Route::get('getElecDisconnectTickets', 'TasksTableController@getElecDisconnectTickets')->name('getElecDisconnectTickets'); 
        Route::get('getElecFinancTransferTickets', 'TasksTableController@getElecFinancTransferTickets')->name('getElecFinancTransferTickets'); 
        Route::get('getElecGlblMulfuncTickets', 'TasksTableController@getElecGlblMulfuncTickets')->name('getElecGlblMulfuncTickets'); 
        Route::get('getElecMalfuncTickets', 'TasksTableController@getElecMalfuncTickets')->name('getElecMalfuncTickets'); 
        Route::get('getElecMeterChekTickets', 'TasksTableController@getElecMeterChekTickets')->name('getElecMeterChekTickets'); 
        Route::get('getElecMeterReadTickets', 'TasksTableController@getElecMeterReadTickets')->name('getElecMeterReadTickets'); 
        Route::get('getElecMeterTransfrTickets', 'TasksTableController@getElecMeterTransfrTickets')->name('getElecMeterTransfrTickets'); 
        Route::get('getElecLineRecnctTickets', 'TasksTableController@getElecLineRecnctTickets')->name('getElecLineRecnctTickets'); 
        Route::get('getElec16Tickets', 'TasksTableController@getElec16Tickets')->name('getElec16Tickets'); 
        Route::get('getElec37Tickets', 'TasksTableController@getElec37Tickets')->name('getElec37Tickets'); 
        Route::get('getElec27Tickets', 'TasksTableController@getElec27Tickets')->name('getElec27Tickets'); 
        Route::get('getElec29Tickets', 'TasksTableController@getElec29Tickets')->name('getElec29Tickets'); 
        Route::get('getElec36Tickets', 'TasksTableController@getElec36Tickets')->name('getElec36Tickets'); 
        Route::get('getElec39Tickets', 'TasksTableController@getElec39Tickets')->name('getElec39Tickets'); 
        Route::get('getWaiveElecSubsTickets', 'TasksTableController@getWaiveElecSubsTickets')->name('getWaiveElecSubsTickets'); 
        Route::get('getBuildingLicTickets', 'TasksTableController@getBuildingLicTickets')->name('getBuildingLicTickets'); 
        Route::get('getEngValedTickets', 'TasksTableController@getEngValedTickets')->name('getEngValedTickets'); 
        Route::get('getLicFileTickets', 'TasksTableController@getLicFileTickets')->name('getLicFileTickets'); 
        Route::get('getOwnershipTransferTickets', 'TasksTableController@getOwnershipTransferTickets')->name('getOwnershipTransferTickets'); 
        Route::get('getRetriveLicTickets', 'TasksTableController@getRetriveLicTickets')->name('getRetriveLicTickets'); 
        Route::get('getSitePlanTickets', 'TasksTableController@getSitePlanTickets')->name('getSitePlanTickets'); 
        Route::get('getStraighteningTickets', 'TasksTableController@getStraighteningTickets')->name('getStraighteningTickets'); 
        Route::get('getCollectingTickets', 'TasksTableController@getCollectingTickets')->name('getCollectingTickets'); 
        Route::get('getLeaveTickets', 'TasksTableController@getLeaveTickets')->name('getLeaveTickets'); 
        Route::get('getVacationTickets', 'TasksTableController@getVacationTickets')->name('getVacationTickets'); 
        Route::get('getNetworkDevelopTickets', 'TasksTableController@getNetworkDevelopTickets')->name('getNetworkDevelopTickets'); 
        Route::get('getPurchaseTickets', 'TasksTableController@getPurchaseTickets')->name('getPurchaseTickets'); 
        Route::get('getRequestSpareTickets', 'TasksTableController@getRequestSpareTickets')->name('getRequestSpareTickets'); 
        Route::get('getOutspreadTickets', 'TasksTableController@getOutspreadTickets')->name('getOutspreadTickets'); 
        Route::get('getPublicComplaintTickets', 'TasksTableController@getPublicComplaintTickets')->name('getPublicComplaintTickets'); 
        Route::get('getCitizenComplaintTickets', 'TasksTableController@getCitizenComplaintTickets')->name('getCitizenComplaintTickets'); 
        Route::get('getQuittanceTickets', 'TasksTableController@getQuittanceTickets')->name('getQuittanceTickets'); 
        Route::get('getInnerQuittanceTickets', 'TasksTableController@getInnerQuittanceTickets')->name('getInnerQuittanceTickets'); 
        Route::get('getVehicleMaintenanceTickets', 'TasksTableController@getVehicleMaintenanceTickets')->name('getVehicleMaintenanceTickets'); 
        Route::get('getRefuelingTickets', 'TasksTableController@getRefuelingTickets')->name('getRefuelingTickets'); 

        Route::get('/', 'DashboardController@index')->name('admin.dashboard');  // the first page admin visits if authenticated
        Route::get('getMyTaskAjax', 'DashboardController@getMyTaskAjax')->name('getMyTaskAjax');
        Route::get('getWatingTaskAjax', 'DashboardController@getWatingTaskAjax')->name('getWatingTaskAjax');
        Route::get('getTaggedTaskAjax', 'DashboardController@getTaggedTaskAjax')->name('getTaggedTaskAjax');
        Route::get('getSenTTaskAjax', 'DashboardController@getSenTTaskAjax')->name('getSenTTaskAjax');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
        
        Route::get('mailPage', 'mailController@mailPage')->name('mailPage');
        Route::post('getMessage', 'mailController@getMessage')->name('getMessage');
        Route::post('getNextMessage', 'mailController@getNextMessage')->name('getNextMessage');
        Route::post('getPrevMessage', 'mailController@getPrevMessage')->name('getPrevMessage');
        Route::post('deleteMessage', 'mailController@deleteMessage')->name('deleteMessage');
        Route::post('storeMessage', 'mailController@storeMessage')->name('storeMessage');
        Route::post('StarMsg', 'mailController@StarMsg')->name('StarMsg');
        Route::post('setSend', 'mailController@setSend')->name('setSend');
        Route::post('storeFolder', 'mailController@storeFolder')->name('storeFolder');
        Route::post('moveFolder', 'mailController@moveFolder')->name('moveFolder');
        Route::get('updateOrganization', 'SettingsController@updateOrganization')
        ->name('updateOrganization')->middleware('can:updateOrganization');
        Route::post('store_settings', 'SettingsController@store_settings')->name('store_settings');
        Route::post('state', 'SettingsController@state')->name('state');
        Route::post('area', 'SettingsController@area')->name('area');
        Route::get('permissions', 'SettingsController@permissions')->name('permissions');
        Route::post('store_permission', 'SettingsController@store_permission')->name('store_permission');
        Route::get('Organization_info', 'SettingsController@Organization_info')->name('Organization_info');
        Route::get('Organization_law', 'SettingsController@Organization_law')->name('Organization_law');
        Route::get('Organization_archive_count', 'SettingsController@Organization_archive_count')->name('Organization_archive_count');
        Route::get('userper', 'SettingsController@userper')->name('userper');
        Route::post('store_usrpermission', 'SettingsController@store_usrpermission')->name('store_usrpermission');
        Route::post('getEmpPer', 'EmployeeController@getEmpPer')->name('getEmpPer');

        Route::get('addEarchLic','EarchLicController@index')->name('addEarchLic');
        Route::post('saveEarchLic','EarchLicController@saveEarchLic')->name('saveEarchLic');
        Route::get('printLicEarth/{id}', 'EarchLicController@printLicEarth')->name('printLicEarth');
        Route::get('all_EarchLic', 'EarchLicController@all_EarchLic')->name('all_EarchLic');
        Route::get('earchLic_info', 'EarchLicController@earchLic_info')->name('earchLic_info');
        Route::post('earchLic_delete', 'EarchLicController@earchLic_delete')->name('earchLic_delete');
        
        Route::get('agenda_info_all','ArchieveController@agenda_info_all')->name('agenda_info_all');
        
        Route::get('employee', 'EmployeeController@index')->name('employee')->middleware('can:employee');
        Route::post('changePassword', 'EmployeeController@changePassword')->name('changePassword');
        Route::get('password_index', 'EmployeeController@password_index')->name('password_index');
        Route::get('employee/id/{id}', 'EmployeeController@index');
        Route::post('store_employee', 'EmployeeController@store_employee')->name('store_employee');
        Route::get('emp_auto_complete', 'EmployeeController@emp_auto_complete')->name('emp_auto_complete');
        Route::get('emp_info', 'EmployeeController@emp_info')->name('emp_info');
        Route::get('emp_info_all', 'EmployeeController@emp_info_all')->name('emp_info_all');
        Route::get('get_noti', 'EmployeeController@get_noti')->name('get_noti');
        Route::get('noti_delete', 'EmployeeController@noti_delete')->name('noti_delete');
        Route::get('noti_seen', 'EmployeeController@noti_seen')->name('noti_seen');

        Route::get('license_byFileNo', 'LicenseController@license_byFileNo')->name('license_byFileNo');
        Route::get('license_byId', 'LicenseController@license_byId')->name('license_byId');
        Route::get('license', 'LicenseController@index')->name('license');
        Route::post('store_license', 'LicenseController@store_license')->name('store_license');
        Route::get('license_info_byUser', 'LicenseController@license_info_byUser')->name('license_info_byUser');
        
        Route::get('warning', 'SubscriberWarning@index')->name('warning');
        
        Route::post('store_archive_config', 'ArchieveController@store_archive_config')->name('store_archive_config');
        Route::post('store_config', 'WaterTicketController@store_config')->name('store_config');
        Route::post('uploadTicketAttach', 'WaterTicketController@uploadTicketAttach')->name('uploadTicketAttach');
        Route::get('waterSubscription', 'WaterTicketController@WaterSubscription')->name('waterSubscription');
        Route::get('waterMalfunction', 'WaterTicketController@waterMalfunction')->name('waterMalfunction');
        Route::get('waterPermission', 'WaterTicketController@waterPermission')->name('waterPermission');
        Route::get('globalWaterMalfunction', 'WaterTicketController@globalWaterMalfunction')->name('globalWaterMalfunction');
        Route::get('waterMeterCheck', 'WaterTicketController@meterCheck')->name('waterMeterCheck');
        Route::get('waterLineReconnect', 'WaterTicketController@waterLineReconnect')->name('waterLineReconnect');
        Route::get('waterLineDisconnect', 'WaterTicketController@waterLineDisconnect')->name('waterLineDisconnect');
        Route::get('waiveWaterSubscription', 'WaterTicketController@waiveSubscription')->name('waiveWaterSubscription');
        Route::get('waterMeterRead', 'WaterTicketController@meterRead')->name('waterMeterRead');
        Route::get('waterMeterTransfer', 'WaterTicketController@meterTransfer')->name('waterMeterTransfer');
        Route::get('waterFinancialTransfer', 'WaterTicketController@waterFinancialTransfer')->name('waterFinancialTransfer');
        Route::post('appCustomer', 'WaterTicketController@appCustomer')->name('appCustomer');
        Route::get('updateReport','DailyReport@updateReport')->name('updateReport');
        Route::post('saveReport','DailyReport@saveReport')->name('saveReport');
        Route::get('showReport','DailyReport@showReport')->name('showReport');
        Route::get('dailyWork','DailyReport@index')->name('dailyWork');
        Route::get('counterReadReport', 'CounterReadReport@index')->name('counterReadReport');
        Route::get('finaicalRequest', 'FinaicalRequestController@index')->name('finaicalRequest');
        Route::get('financialReport', 'FinaicalRequestController@financialReport')->name('financialReport');
        Route::get('financial_info_all', 'FinaicalRequestController@financial_info_all')->name('financial_info_all');
        Route::get('reporth','Reporth@index')->name('reporth');
        Route::get('searchReport','Reporth@searchReport')->name('searchReport');
        Route::get('spareParts', 'SparePartsController@spareParts')->name('spareParts');
        Route::post('store_spareParts', 'SparePartsController@store_spareParts')->name('store_spareParts');
        Route::get('sparePart_auto_complete', 'SparePartsController@sparePart_auto_complete')->name('sparePart_auto_complete');
        Route::get('sparePart_info', 'SparePartsController@sparePart_info')->name('sparePart_info');
        Route::get('sparePart_info_all', 'SparePartsController@sparePart_info_all')->name('sparePart_info_all');
        
        Route::get('medicine', 'MedicineController@medicines')->name('medicine');
        Route::get('medicines/id/{id}', 'MedicineController@medicines');
        Route::post('store_medicines', 'MedicineController@store_medicines')->name('store_medicines');
        Route::get('medicine_auto_complete', 'MedicineController@medicine_auto_complete')->name('medicine_auto_complete');
        Route::get('medicine_info', 'MedicineController@medicine_info')->name('medicine_info');
        Route::get('medicine_info_all', 'MedicineController@medicine_info_all')->name('medicine_info_all');
        Route::post('medicine_delete', 'MedicineController@medicine_delete')->name('medicine_delete');

        Route::get('alldeptticket', 'AllDeptTicket@index')->name('alldeptticket');
        Route::get('alldeptticket/id/{id}', 'AllDeptTicket@allEmpTicket');

        Route::get('taboDataIndex', 'TaboController@taboDataIndex')->name('taboDataIndex');
        Route::get('taboExcelIndex', 'TaboController@taboExcelIndex')->name('taboExcelIndex');
        Route::get('taboData', 'TaboController@getTaboData')->name('taboData');
        Route::post('saveNewData', 'TaboController@saveNewData')->name('saveNewData');

        Route::get('receive', 'TicketReceiveController@receive')->name('receive');

        Route::get('searchTasks', 'ReportController@searchTasks')->name('searchTasks');
        Route::post('searchByTask', 'ReportController@searchByTask')->name('searchByTask');
        Route::post('restoreAdmin', 'ReportController@restoreAdmin')->name('restoreAdmin');
        Route::post('restoreDepartment', 'ReportController@restoreDepartment')->name('restoreDepartment');
        Route::post('restoreUser', 'ReportController@restoreUser')->name('restoreUser');
        Route::post('restoreEqupment', 'ReportController@restoreEqupment')->name('restoreEqupment');
        Route::post('restoreVehicle', 'ReportController@restoreVehicle')->name('restoreVehicle');
        Route::post('restoreSpecialAsset', 'ReportController@restoreSpecialAsset')->name('restoreSpecialAsset');
        Route::post('restoreSparepart', 'ReportController@restoreSparepart')->name('restoreSparepart');
        Route::post('restoreProject', 'ReportController@restoreProject')->name('restoreProject');
        Route::get('smsReport', 'ReportController@smsReport')->name('smsReport');
        Route::get('vacationReport', 'ReportController@vacationReport')->name('vacationReport');
        Route::get('vacationsReport', 'ReportController@vacationsReport')->name('vacationsReport');
        Route::get('subscriberReport', 'ReportController@subscriberReport')->name('subscriberReport');
        Route::get('taskArchiveReport', 'ReportController@taskArchiveReport')->name('taskArchiveReport');
        
        /////////////////////////////////////////////////New Reports///////////////////////////////////////////////////////////
        Route::get('newSearchTasks', 'ReportController@newSearchTasks')->name('newSearchTasks');
        
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        
        
        Route::get('subscriberOutArchive', 'SubscriberController@subscriberOutArchive')->name('subscriberOutArchive');
        Route::get('subscriberInArchive', 'SubscriberController@subscriberInArchive')->name('subscriberInArchive');
        Route::get('subscriberLicArchive', 'SubscriberController@subscriberLicArchive')->name('subscriberLicArchive');
        Route::get('subscriberCopyArchive', 'SubscriberController@subscriberCopyArchive')->name('subscriberCopyArchive');
        Route::get('subscriberJalArchive', 'SubscriberController@subscriberJalArchive')->name('subscriberJalArchive');
        Route::get('subscriberOtherArchive', 'SubscriberController@subscriberOtherArchive')->name('subscriberOtherArchive');
        Route::get('subscribercontractArchive', 'SubscriberController@subscribercontractArchive')->name('subscribercontractArchive');
        Route::get('subscriberCert', 'SubscriberController@subscriberCert')->name('subscriberCert');
        
        Route::get('contractArchive', 'orginzationsController@contractArchive')->name('contractArchive');
        Route::get('orgOutArchive', 'orginzationsController@orgOutArchive')->name('orgOutArchive');
        Route::get('orgCert', 'orginzationsController@orgCert')->name('orgCert');
        Route::get('orgInArchive', 'orginzationsController@orgInArchive')->name('orgInArchive');
        Route::get('orgCopyArchive', 'orginzationsController@orgCopyArchive')->name('orgCopyArchive');
        Route::get('orgJalArchive', 'orginzationsController@orgJalArchive')->name('orgJalArchive');
        Route::get('orgOtherArchive', 'orginzationsController@orgOtherArchive')->name('orgOtherArchive');
        Route::get('finaceArchive', 'orginzationsController@finaceArchive')->name('finaceArchive');
        
        Route::get('empContractArchive', 'EmployeeController@empContractArchive')->name('empContractArchive');
        Route::get('empOutArchive', 'EmployeeController@empOutArchive')->name('empOutArchive');
        Route::get('empInArchive', 'EmployeeController@empInArchive')->name('empInArchive');
        Route::get('empCopyArchive', 'EmployeeController@empCopyArchive')->name('empCopyArchive');
        Route::get('empJalArchive', 'EmployeeController@empJalArchive')->name('empJalArchive');
        Route::get('empOtherArchive', 'EmployeeController@empOtherArchive')->name('empOtherArchive');
        
        Route::get('deptContractArchive', 'DepartmentController@deptContractArchive')->name('deptContractArchive');
        Route::get('deptOutArchive', 'DepartmentController@deptOutArchive')->name('deptOutArchive');
        Route::get('deptInArchive', 'DepartmentController@deptInArchive')->name('deptInArchive');
        Route::get('deptCopyArchive', 'DepartmentController@deptCopyArchive')->name('deptCopyArchive');
        Route::get('deptJalArchive', 'DepartmentController@deptJalArchive')->name('deptJalArchive');
        Route::get('deptOtherArchive', 'DepartmentController@deptOtherArchive')->name('deptOtherArchive');
        Route::get('deptLawArchive', 'DepartmentController@deptLawArchive')->name('deptLawArchive');
        
        Route::get('projArchive', 'ProjectController@projArchive')->name('projArchive');
        Route::get('projCopyArchive', 'ProjectController@projCopyArchive')->name('projCopyArchive');
        Route::get('projJalArchive', 'ProjectController@projJalArchive')->name('projJalArchive');
        Route::get('projContractArchive', 'ProjectController@projContractArchive')->name('projContractArchive');
        
        Route::get('equpArchive', 'AssetsController@equpArchive')->name('equpArchive');
        Route::get('equpCopyArchive', 'AssetsController@equpCopyArchive')->name('equpCopyArchive');
        Route::get('equpJalArchive', 'AssetsController@equpJalArchive')->name('equpJalArchive');
        Route::get('equpContractArchive', 'AssetsController@equpContractArchive')->name('equpContractArchive');
        
        Route::get('vehcileArchive', 'vehicleController@vehcileArchive')->name('vehcileArchive');
        Route::get('vehcileCopyArchive', 'vehicleController@vehcileCopyArchive')->name('vehcileCopyArchive');
        Route::get('vehcileJalArchive', 'vehicleController@vehcileJalArchive')->name('vehcileJalArchive');
        Route::get('vehcileContractArchive', 'vehicleController@vehcileContractArchive')->name('vehcileContractArchive');
        
        Route::get('assetsArchive', 'SpecialAssetsController@assetsArchive')->name('assetsArchive');
        Route::get('assetsCopyArchive', 'SpecialAssetsController@assetsCopyArchive')->name('assetsCopyArchive');
        Route::get('assetsJalArchive', 'SpecialAssetsController@assetsJalArchive')->name('assetsJalArchive');
        Route::get('assetsContractArchive', 'SpecialAssetsController@assetsContractArchive')->name('assetsContractArchive');

        Route::post('restoreOrgnization', 'ReportController@restoreOrgnization')->name('restoreOrgnization');

        Route::get('dailyReport', 'ReportController@DailyReport')->name('dailyReport')->middleware('can:dailyReport');
        Route::get('messagesReport', 'ReportController@messagesReport')->name('messagesReport');
        Route::get('deletedArchiveReport', 'ReportController@deletedArchiveReport')->name('deletedArchiveReport')->middleware('can:deletedArchiveReport');
        Route::get('deletedDefinitionsReport', 'ReportController@deletedDefinitionsReport')->name('deletedDefinitionsReport');
        Route::get('deletedDefinitions', 'ReportController@deletedDefinitions')->name('deletedDefinitions');
        Route::get('allArchive', 'ReportController@allArchive')->name('allArchive');
        Route::get('deletedArchive', 'ReportController@deletedArchive')->name('deletedArchive');
        Route::get('customerReport', 'ReportController@customerReport')->name('customerReport');
        Route::get('tasksReport', 'ReportController@tasksReport')->name('tasksReport');
        Route::get('dailyTaskReport', 'ReportController@dailyTaskReport')->name('dailyTaskReport');
        Route::get('searchDailyTask', 'ReportController@searchDailyTask')->name('searchDailyTask');
        Route::get('totalReport', 'ReportController@totalReport')->name('totalReport');

        Route::get('straightening', 'BuildingTicketController@straightening')->name('straightening');
        Route::get('ownershipTransfer', 'BuildingTicketController@ownershipTransfer')->name('ownershipTransfer');
        Route::get('retrieveLic', 'BuildingTicketController@retrieveLic')->name('retrieveLic');
        Route::get('licenseFile', 'BuildingTicketController@licenseFile')->name('licenseFile');
        Route::get('buildingLicense', 'BuildingTicketController@buildingLicense')->name('buildingLicense');
        Route::get('sitePlan', 'BuildingTicketController@sitePlan')->name('sitePlan');
        Route::get('engineeringValidation', 'BuildingTicketController@engineeringValidation')->name('engineeringValidation');

        Route::get('outspreadTasks', 'OutspreadTaskController@outspreadTasks')->name('outspreadTasks');
        Route::get('quittance', 'OutspreadTaskController@quittance')->name('quittance');
        Route::get('publicComplaint', 'OutspreadTaskController@publicComplaint')->name('publicComplaint');
        Route::get('citizenComplaint', 'OutspreadTaskController@citizenComplaint')->name('citizenComplaint');
        Route::get('innerQuittance', 'OutspreadTaskController@innerQuittance')->name('innerQuittance');

        Route::get('vacationRequest', 'GeneralRequescontroller@vacationRequest')->name('vacationRequest');
        Route::get('leavePermission', 'GeneralRequescontroller@leavePermission')->name('leavePermission');
        Route::get('collecting', 'GeneralRequescontroller@collecting')->name('collecting');
        Route::get('requestSpareParts', 'GeneralRequescontroller@requestSpareParts')->name('requestSpareParts');
        Route::get('PurchaseOrder', 'GeneralRequescontroller@PurchaseOrder')->name('PurchaseOrder');
        Route::get('networkDevelopment', 'GeneralRequescontroller@networkDevelopment')->name('networkDevelopment');
        Route::get('vehicleMaintenance', 'GeneralRequescontroller@vehicleMaintenance')->name('vehicleMaintenance');
        Route::get('refueling', 'GeneralRequescontroller@refueling')->name('refueling');

        Route::get('elecSubscription', 'elecTicketController@elecSubscription')->name('elecSubscription');
        Route::get('elecMalfunction', 'elecTicketController@elecMalfunction')->name('elecMalfunction');
        Route::get('elecPermission', 'elecTicketController@elecPermission')->name('elecPermission');
        Route::get('globalelecMalfunction', 'elecTicketController@globalelecMalfunction')->name('globalelecMalfunction');
        Route::get('elecMeterCheck', 'elecTicketController@elecMeterCheck')->name('elecMeterCheck');
        Route::get('elecLineReconnect', 'elecTicketController@elecLineReconnect')->name('elecLineReconnect');
        Route::get('elecLineDisconnect', 'elecTicketController@elecLineDisconnect')->name('elecLineDisconnect');
        Route::get('waiveelecSubscription', 'elecTicketController@waiveelecSubscription')->name('waiveelecSubscription');
        Route::get('elecMeterRead', 'elecTicketController@elecMeterRead')->name('elecMeterRead');
        Route::get('elecMeterTransfer', 'elecTicketController@elecMeterTransfer')->name('elecMeterTransfer');
        Route::get('elecFinancialTransfer', 'elecTicketController@elecFinancialTransfer')->name('elecFinancialTransfer');
        Route::get('newTicket37', 'elecTicketController@newTicket37')->name('newTicket37');
        Route::get('newTicket16', 'elecTicketController@newTicket16')->name('newTicket16');
        Route::get('newTicket27', 'elecTicketController@newTicket27')->name('newTicket27');
        Route::get('newTicket29', 'elecTicketController@newTicket29')->name('newTicket29');
        Route::get('newTicket36', 'elecTicketController@newTicket36')->name('newTicket36');
        Route::get('newTicket39', 'elecTicketController@newTicket39')->name('newTicket39');

        Route::get('elec', 'ElecController@index')->name('elec');
        Route::post('store_elec', 'ElecController@store_elec')->name('store_elec');
        Route::get('elec_info_byUser', 'ElecController@elec_info_byUser')->name('elec_info_byUser');

        Route::get('water', 'WaterController@index')->name('water');
        Route::post('store_water', 'WaterController@store_water')->name('store_water');
        Route::get('water_info_byUser', 'WaterController@water_info_byUser')->name('water_info_byUser');
        
        Route::get('hospitalVisit', 'HospitalVisitController@index')->name('hospitalVisit');
        
        Route::get('aged', 'AgedController@index')->name('aged');
        Route::get('aged/id/{id}', 'AgedController@index')->name('ageds');
        Route::post('store_aged', 'AgedController@store_aged')->name('store_aged');
        Route::get('aged_auto_complete', 'AgedController@aged_auto_complete')->name('aged_auto_complete');
        Route::get('aged_info', 'AgedController@aged_info')->name('aged_info');
        Route::get('aged_info_all', 'AgedController@aged_info_all')->name('aged_info_all');
        Route::post('aged_delete', 'AgedController@aged_delete')->name('aged_delete');
        
       
        Route::get('volunteer', 'VolunteerController@index')->name('volunteer');
        Route::post('store_volunteer', 'VolunteerController@store_volunteer')->name('store_volunteer');
        Route::get('volunteer_auto_complete', 'VolunteerController@volunteer_auto_complete')->name('volunteer_auto_complete');
        Route::get('volunteer_info', 'VolunteerController@volunteer_info')->name('volunteer_info');
        Route::get('volunteerReport', 'ArchieveController@volunteerReport')->name('volunteer_report');
        Route::get('volunteer_info_all', 'VolunteerController@volunteer_info_all')->name('volunteer_info_all');

        Route::get('volunteerArchieve_report', 'ArchieveController@volunteerArchieve_report')->name('volunteerArchieve_report');

        // Route::get('waterSubscription', 'WaterSubscriptionController@index')->name('waterSubscription');
        Route::get('supplier_auto_complete', 'orginzationsController@supplier_auto_complete')
        ->name('supplier_auto_complete');

        Route::get('assets_archieve','ArchieveController@assets_archieve')->name('assets_archieve');


        Route::get('department', 'DepartmentController@index')->name('department')->middleware('can:department');
        Route::get('deptNotAllowed', 'DepartmentController@deptNotAllowed')->name('deptNotAllowed');
        Route::get('department/id/{id}', 'DepartmentController@index');

        Route::post('store_department', 'DepartmentController@store_department')->name('store_department');
        Route::post('depart_manger', 'DepartmentController@depart_manger')->name('depart_manger');
        Route::get('dept_auto_complete', 'DepartmentController@dept_auto_complete')->name('dept_auto_complete');
        Route::get('dep_info', 'DepartmentController@dep_info')->name('dep_info');
        Route::get('dep_info_all', 'DepartmentController@dep_info_all')->name('dep_info_all');
        
        Route::get('civil','Civil@index')->name('civil');
        Route::post('civilStore','Civil@store_citizen')->name('civilStore');
        Route::get('citizen_info_all','Civil@citizen_info_all')->name('citizen_info_all');
        Route::get('subscribers', 'SubscriberController@index')->name('subscribers')->middleware('can:subscribers');
        Route::get('subscribers/id/{id}', 'SubscriberController@index')->name('subscriber');
        Route::post('store_subscriber', 'SubscriberController@store_subscriber')->name('store_subscriber');
        Route::get('subscribe_auto_complete', 'SubscriberController@subscribe_auto_complete')->name('subscribe_auto_complete');
        Route::get('subscribe_info', 'SubscriberController@subscribe_info')->name('subscribe_info');
        Route::get('subscriber_tasks', 'SubscriberController@subscriber_tasks')->name('subscriber_tasks');
        Route::get('subscribe_info_all', 'SubscriberController@subscribe_info_all')->name('subscribe_info_all');
        
        Route::post('subscribe_delete', 'SubscriberController@subscribe_delete')->name('subscribe_delete');
        Route::post('emp_delete', 'EmployeeController@emp_delete')->name('emp_delete');
        Route::post('archive_delete', 'ArchieveController@archive_delete')->name('archive_delete');
        Route::post('licArchive_delete', 'ArchieveController@licArchive_delete')->name('licArchive_delete');
        Route::post('recoverArchive', 'ArchieveController@recoverArchive')->name('recoverArchive');
        Route::post('licArchive_recovery', 'ArchieveController@licArchive_recovery')->name('licArchive_recovery');
        Route::post('jobLic_archieve_delete', 'ArchieveController@jobLic_archieve_delete')->name('jobLic_archieve_delete');
        Route::post('dept_delete', 'DepartmentController@dept_delete')->name('dept_delete');
        Route::post('lic_delete', 'LicenseController@lic_delete')->name('lic_delete');
        Route::post('elec_delete', 'ElecController@elec_delete')->name('elec_delete');
        Route::post('water_delete', 'WaterController@water_delete')->name('water_delete');
        Route::post('equip_delete', 'AssetsController@equip_delete')->name('equip_delete');
        Route::post('vehicle_delete', 'vehicleController@vehicle_delete')->name('vehicle_delete');
        Route::post('building_delete', 'SpecialAssetsController@building_delete')->name('building_delete');
        Route::post('spare_delete', 'SparePartsController@spare_delete')->name('spare_delete');
        Route::post('proj_delete', 'ProjectController@proj_delete')->name('proj_delete');
        Route::post('org_delete', 'orginzationsController@org_delete')->name('org_delete');

        Route::get('projects', 'ProjectController@index')->name('projects')->middleware('can:projects');
        Route::get('projNotAllowed', 'ProjectController@projNotAllowed')->name('projNotAllowed');
        Route::get('projects/id/{id}', 'ProjectController@index');
        Route::post('store_project', 'ProjectController@store_project')->name('store_project');
        Route::post('depart_manger_project', 'ProjectController@depart_manger_project')->name('depart_manger_project');
        Route::get('project_auto_complete', 'ProjectController@project_auto_complete')->name('project_auto_complete');
        Route::get('project_info', 'ProjectController@project_info')->name('project_info');
        Route::get('project_info_all', 'ProjectController@project_info_all')->name('project_info_all');

        Route::get('empArchive','ArchieveController@specialEmpArchive')->name('empArchive');
        Route::post('store_specialEmpArchive','ArchieveController@store_specialEmpArchive')->name('store_specialEmpArchive');
        Route::get('law_archieve','ArchieveController@law_archieve')->name('law_archieve');

        Route::get('enginering', 'orginzationsController@enginering')->name('enginering')->middleware('can:enginering');
        Route::get('enginering/id/{id}', 'orginzationsController@enginering');
        Route::get('space/id/{id}', 'orginzationsController@space');
        Route::get('space', 'orginzationsController@space')->name('space')->middleware('can:space');
        Route::get('banks', 'orginzationsController@banks')->name('banks')->middleware('can:banks');
        Route::get('banks/id/{id}', 'orginzationsController@banks');
        Route::get('suppliers/id/{id}', 'orginzationsController@suppliers');
        Route::get('suppliers', 'orginzationsController@suppliers')->name('suppliers')->middleware('can:suppliers');
        Route::get('orginzation', 'orginzationsController@index')->name('orginzation')->middleware('can:orginzation');
        Route::get('orginzation/id/{id}', 'orginzationsController@index');
        Route::post('store_orginzation', 'orginzationsController@store_orginzation')->name('store_orginzation');
        Route::get('orginzation_auto_complete', 'orginzationsController@orginzation_auto_complete')
        ->name('orginzation_auto_complete');
        Route::get('orgnization_info', 'orginzationsController@orgnization_info')->name('orgnization_info');
        Route::get('orgnization_info_all', 'orginzationsController@orgnization_info_all')->name('orgnization_info_all');
        Route::get('doctor', 'orginzationsController@doctor')->name('doctor');
        Route::get('doctor/id/{id}', 'orginzationsController@doctor');
        Route::get('hospital/id/{id}', 'orginzationsController@hospital');
        Route::get('hospital', 'orginzationsController@hospital')->name('hospital');
        Route::get('hospital_auto_complete', 'orginzationsController@hospital_auto_complete')->name('hospital_auto_complete');


        Route::get('dev_equp', 'AssetsController@dev_equp')->name('dev_equp')->middleware('can:dev_equp');
        Route::get('dev_equp/id/{id}', 'AssetsController@dev_equp');
        Route::post('store_equpment', 'AssetsController@store_equpment')->name('store_equpment');
        Route::get('equip_auto_complete', 'AssetsController@equip_auto_complete')
        ->name('equip_auto_complete');
        Route::get('equip_info', 'AssetsController@equip_info')->name('equip_info');
        Route::get('equip_info_all', 'AssetsController@equip_info_all')->name('equip_info_all');


        Route::get('buildings', 'SpecialAssetsController@buildings')->name('buildings')->middleware('can:buildings');
        Route::get('buildings/id/{id}', 'SpecialAssetsController@buildings');
        Route::get('Gardens_lands/id/{id}', 'SpecialAssetsController@Gardens_lands');
        Route::get('Gardens_lands', 'SpecialAssetsController@Gardens_lands')->name('Gardens_lands')->middleware('can:Gardens_lands');
        Route::get('warehouses', 'SpecialAssetsController@warehouses')->name('warehouses')->middleware('can:warehouses');
        Route::get('warehouses/id/{id}', 'SpecialAssetsController@warehouses');
        Route::post('store_assets', 'SpecialAssetsController@store_assets')->name('store_assets');
        Route::get('asset_auto_complete', 'SpecialAssetsController@asset_auto_complete')
        ->name('asset_auto_complete');
        Route::get('asset_info', 'SpecialAssetsController@asset_info')->name('asset_info');
        Route::get('asset_info_all', 'SpecialAssetsController@asset_info_all')->name('asset_info_all');


        Route::get('vehicles', 'vehicleController@index')->name('vehicles')->middleware('can:vehicles');
        Route::get('vehicles/id/{id}', 'vehicleController@index');
        Route::post('store_vehcile', 'vehicleController@store_vehcile')->name('store_vehcile');
        Route::get('vehicle_auto_complete', 'vehicleController@vehicle_auto_complete')
        ->name('vehicle_auto_complete');
        Route::get('vehcile_info', 'vehicleController@vehcile_info')->name('vehcile_info');
        Route::get('vehcile_info_all', 'vehicleController@vehcile_info_all')->name('vehcile_info_all');

        Route::post('getConstantChildren', 'ExtentionsController@getConstantChildren')->name('getConstantChildren');
        Route::post('deleteSubConstant', 'ExtentionsController@deleteSubConstant')->name('deleteSubConstant');
        Route::post('store_model', 'ExtentionsController@store_model')->name('store_model');
/*****************/
        Route::post('getConstantByID', 'ExtentionsController@getConstantByID')->name('getConstantByID');
        Route::post('SaveConstant', 'ExtentionsController@SaveConstant')->name('SaveConstant');
        Route::post('deleteConstant', 'ExtentionsController@deleteConstant')->name('deleteConstant');
        
/*****************/
        Route::get('search','SearchController@full_search')->name('search');
        Route::get('out_archieve','ArchieveController@out_archieve')->name('out_archieve')->middleware('can:out_archieve');

        Route::get('archive_auto_complete','ArchieveController@archive_auto_complete')
        ->name('archive_auto_complete');

        // Route::post('law_archieve_all','ArchieveController@law_archieve_all')->name('law_archieve_all');
        Route::post('store_lawArchive','ArchieveController@store_lawArchive')->name('store_lawArchive');
        Route::post('store_archive','ArchieveController@store_archive')->name('store_archive');
        Route::post('store_jal_archive','JalArchieveController@store_jal_archive')->name('store_jal_archive');
        Route::get('archieve_jal_info', 'JalArchieveController@archieve_info')->name('archieve_jal_info');
        Route::get('archieve_info_all','ArchieveController@archieve_info_all')
        ->name('archieve_info_all');
        Route::get('archievelic_info_all','ArchieveController@archievelic_info_all')
        ->name('archievelic_info_all');
        Route::get('archieve_report','ArchieveController@archieve_report')
        ->name('archieve_report');
        Route::get('jobLic_report','ArchieveController@jobLicReport')
        ->name('jobLicReport');
        Route::get('jobLic_reports','ArchieveController@jobLic_reports')
        ->name('jobLic_reports');
        Route::get('jobLic_add','jobLicController@index')
        ->name('jobLic_add');
        Route::get('jobLic_info_all', 'jobLicController@jobLic_info_all')->name('jobLic_info_all');
        Route::post('store_jobLic','jobLicController@store_jobLic')->name('store_jobLic'); 
        Route::get('jobLic_info', 'jobLicController@jobLic_info')->name('jobLic_info');
        Route::get('jobLic_info_byUser', 'jobLicController@jobLic_info_byUser')->name('jobLic_info_byUser');

        Route::get('in_archieve','ArchieveController@in_archieve')->name('in_archieve')->middleware('can:in_archieve');
        Route::get('emp_archieve','ArchieveController@emp_archieve')->name('emp_archieve')->middleware('can:emp_archieve');
        Route::get('dep_archieve','ArchieveController@dep_archieve')->name('dep_archieve')->middleware('can:dep_archieve');
        Route::get('cit_archieve','ArchieveController@cit_archieve')->name('cit_archieve')->middleware('can:cit_archieve');
        Route::get('mun_archieve','ArchieveController@mun_archieve')->name('mun_archieve')->middleware('can:mun_archieve');
        Route::get('proj_archieve','ArchieveController@proj_archieve')->name('proj_archieve')->middleware('can:proj_archieve');

        Route::get('title_archieve','ArchieveController@projArchive')->name('title_archieve');
        Route::get('title_archieve','ArchieveController@munArchive')->name('title_archieve');
        Route::get('lic_archieve','ArchieveController@licArchive')->name('lic_archieve')->middleware('can:lic_archieve');
        Route::get('jobLic_archieve','ArchieveController@jobLicArchive')->name('jobLic_archieve')->middleware('can:jobLic_archieve');
        Route::get('report_archieve','ArchieveController@reportArchive')->name('report_archieve')->middleware('can:report_archieve');
        Route::get('agenda_archieve','ArchieveController@agendaArchive')->name('agenda_archieve')->middleware('can:agenda_archieve');
        Route::get('jal_archieve','ArchieveController@jalArchive')->name('jal_archieve')->middleware('can:jal_archieve');
        Route::get('agenda_report','ArchieveController@agendaReportArchive')->name('agenda_report')->middleware('can:agenda_report');

        Route::get('jobLic_report','ArchieveController@jobLicReport')->name('jobLicReport');
        Route::get('jobLic_reports','ArchieveController@jobLic_reports')->name('jobLic_reports');
        
        Route::post('uploadAttach','ArchieveController@uploadAttach')->name('uploadAttach');

        // Route::get('licFile_archieve','ArchieveController@licFileArchive')->name('licFile_archieve')->middleware('can:licFile_archieve');
        Route::get('finance_archive','ArchieveController@financeArchive')->name('finance_archive');
        Route::post('store_finance_archive','ArchieveController@store_finance_archive')->name('store_finance_archive');
        Route::get('financeArchive_info_all','ArchieveController@financeArchive_info_all')->name('financeArchive_info_all');
        Route::get('financeArchive_info','ArchieveController@financeArchive_info')->name('financeArchive_info');
        
        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
            Route::put('update', 'ProfileController@updateprofile')->name('update.profile');
        });
                Route::post('agendaAttach','AgendaArchieveController@agendaAttach')->name('agendaAttach');
        Route::get('searchEmpByName', 'AgendaArchieveController@searchEmpByName')
        ->name('searchEmpByName');
        Route::get('searchSubscriberByName', 'AgendaArchieveController@searchSubscriberByName')
        ->name('searchSubscriberByName');
        Route::post('ajaxEndMeeting','AgendaArchieveController@ajaxEndMeeting')->name('ajaxEndMeeting');
        Route::post('doAddMeetingTitles','AgendaArchieveController@doAddMeetingTitles')->name('doAddMeetingTitles');
        Route::post('ajaxDisplayMeeting','AgendaArchieveController@ajaxDisplayMeeting')->name('ajaxDisplayMeeting');
        Route::post('ajaxSaveMeeting','AgendaArchieveController@ajaxSaveMeeting')->name('ajaxSaveMeeting');
        Route::post('ajaxSaveDesicion','AgendaArchieveController@ajaxSaveDesicion')->name('ajaxSaveDesicion');
        Route::get('generalSearch', 'AgendaArchieveController@searchSubscriberByName')
        ->name('generalSearch');
        Route::post('deleteMeetingTitle','AgendaArchieveController@deleteMeetingTitle')
        ->name('deleteMeetingTitle');
        Route::post('getMeetingDetailsByID','AgendaArchieveController@getMeetingDetailsByID')
        ->name('getMeetingDetailsByID');
        Route::post('doEditMeetingTitle','AgendaArchieveController@doAddMeetingTitles')
        ->name('doEditMeetingTitle');
        Route::get('printDes/{id}','AgendaArchieveController@printDes')
        ->name('printDes');
        Route::get('archieve_agenda_report','AgendaArchieveController@archieve_agenda_report')->name('archieve_agenda_report');
        Route::get('meetingAttach','AgendaArchieveController@meetingAttach')->name('meetingAttach');
        Route::post('attachMeeting','AgendaArchieveController@attachMeeting')->name('attachMeeting');
        Route::post('uploadPic','SettingsController@uploadPic')->name('uploadPic');

        Route::post('saveCert','certController@saveCert')->name('saveCert');
        Route::post('getUserCertification','certController@getUserCertification')->name('getUserCertification');
        Route::post('getCertification','certController@getCertification')->name('getCertification');
        Route::get('getCertifications','certController@getCertifications')->name('getCertifications');
        Route::get('getCertificationsUser','certController@getCertificationsUser')->name('getCertificationsUser');
        Route::post('deleteCert','certController@deleteCert')->name('deleteCert');
        Route::post('saveCertDetails','certController@saveCertDetails')->name('saveCertDetails');

        Route::get('archieve_info', 'ArchieveController@archieve_info')->name('archieve_info');
        Route::get('archieveLic_info', 'ArchieveController@archieveLic_info')->name('archieveLic_info');
        Route::get('job_Lic_info', 'ArchieveController@job_Lic_info')->name('job_Lic_info');
        Route::get('archieveJoblic_info_all', 'ArchieveController@archieveJoblic_info_all')->name('archieveJoblic_info_all');
        Route::get('jalArchieve_info_all', 'ArchieveController@jalArchieve_info_all')->name('jalArchieve_info_all');
        
        Route::get('Linence_auto_complete','ArchieveController@Linence_auto_complete')
        ->name('Linence_auto_complete');
        Route::post('store_lince_archive','ArchieveController@store_lince_archive')
        ->name('store_lince_archive');
        Route::get('license_info_all', 'LicenseController@license_info_all')->name('license_info_all');
        Route::get('license_info', 'LicenseController@license_info')->name('license_info');

        Route::get('elec_info_all', 'ElecController@elec_info_all')->name('elec_info_all');
        Route::get('elec_info', 'ElecController@elec_info')->name('elec_info');
        
        Route::get('water_info_all', 'WaterController@water_info_all')->name('water_info_all');
        Route::get('water_info', 'WaterController@water_info')->name('water_info');
        
        Route::post('store_jobLic_archieve','ArchieveController@store_jobLic_archieve')
        ->name('store_jobLic_archieve');
        
        Route::get('cert', 'certController@index')->name('cert');
        Route::get('sendOut', 'certController@sendOut')->name('sendOut');
        
        Route::post('store_city', 'RegionsController@store_city')->name('store_city');
        Route::get('getCityById', 'RegionsController@getCityById')->name('getCityById');
        Route::get('getCity', 'RegionsController@getCity')->name('getCity');
        Route::post('store_Town', 'RegionsController@store_Town')->name('store_Town');
        Route::get('getTownById', 'RegionsController@getTownById')->name('getTownById');
        Route::get('getTown', 'RegionsController@getTown')->name('getTown');
        Route::post('store_Region', 'RegionsController@store_Region')->name('store_Region');
        Route::get('getRegionById', 'RegionsController@getRegionById')->name('getRegionById');
        Route::get('getRegion', 'RegionsController@getRegion')->name('getRegion');
        Route::post('delete_region', 'RegionsController@delete_region')->name('delete_region');
        //tabo
        /**
         * admins Routes
         */
        Route::group(['prefix' => 'users' , 'middleware' => 'can:users'], function () {
            Route::get('/', 'UsersController@index')->name('admin.users.index');
            Route::get('/create', 'UsersController@create')->name('admin.users.create');
            Route::post('/store', 'UsersController@store')->name('admin.users.store');
            

        });

    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {
        
        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {
    Route::get('search','SearchController@full_search')->name('search');
        Route::get('get_noti', 'EmployeeController@get_noti')->name('get_noti');
        Route::get('noti_delete', 'EmployeeController@noti_delete')->name('noti_delete');
        Route::get('noti_seen', 'EmployeeController@noti_seen')->name('noti_seen');

    });
});
