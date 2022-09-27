<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Portal','prefix' =>'portal'], function () {
        Route::get('/', 'PortalController@portal')->name('portal');
        Route::get('/waterSubscription', 'PortalWater@WaterSubscription')->name('portal.waterSubscription');
        Route::get('/globalWaterMalfunction', 'PortalWater@globalWaterMalfunction')->name('portal.globalWaterMalfunction');
        Route::get('/waterMalfunction', 'PortalWater@waterMalfunction')->name('portal.waterMalfunction');
        Route::get('/waterMeterCheck', 'PortalWater@meterCheck')->name('portal.waterMeterCheck');
        Route::get('/waterLineDisconnect', 'PortalWater@waterLineDisconnect')->name('portal.waterLineDisconnect');
        Route::get('/waterLineReconnect', 'PortalWater@waterLineReconnect')->name('portal.waterLineReconnect');
        Route::get('/waiveWaterSubscription', 'PortalWater@waiveSubscription')->name('portal.waiveWaterSubscription');
        Route::get('/waterMeterRead', 'PortalWater@meterRead')->name('portal.waterMeterRead');
        Route::get('/waterMeterTransfer', 'PortalWater@meterTransfer')->name('portal.waterMeterTransfer');
        Route::get('/waterFinancialTransfer', 'PortalWater@waterFinancialTransfer')->name('portal.waterFinancialTransfer');
        
        Route::get('/elecLineDisconnect', 'PortalElec@elecLineDisconnect')->name('portal.elecLineDisconnect');
        Route::get('/elecFinancialTransfer', 'PortalElec@elecFinancialTransfer')->name('portal.elecFinancialTransfer');
        Route::get('/globalelecMalfunction', 'PortalElec@globalelecMalfunction')->name('portal.globalelecMalfunction');
        Route::get('/elecMalfunction', 'PortalElec@elecMalfunction')->name('portal.elecMalfunction');
        Route::get('/elecMeterCheck', 'PortalElec@elecMeterCheck')->name('portal.elecMeterCheck');
        Route::get('/elecMeterRead', 'PortalElec@elecMeterRead')->name('portal.elecMeterRead');
        Route::get('/elecMeterTransfer', 'PortalElec@elecMeterTransfer')->name('portal.elecMeterTransfer');
        Route::get('/elecLineReconnect', 'PortalElec@elecLineReconnect')->name('portal.elecLineReconnect');
        Route::get('/elecSubscription', 'PortalElec@elecSubscription')->name('portal.elecSubscription');
        Route::get('/waiveelecSubscription', 'PortalElec@waiveelecSubscription')->name('portal.waiveelecSubscription');
        Route::get('/newTicket37', 'PortalElec@newTicket37')->name('portal.newTicket37');
        Route::get('/newTicket16', 'PortalElec@newTicket16')->name('portal.newTicket16');
        Route::get('/newTicket27', 'PortalElec@newTicket27')->name('portal.newTicket27');
        Route::get('/newTicket29', 'PortalElec@newTicket29')->name('portal.newTicket29');
        Route::get('/newTicket36', 'PortalElec@newTicket36')->name('portal.newTicket36');
        Route::get('/newTicket39', 'PortalElec@newTicket39')->name('portal.newTicket39');
        
        Route::get('/outspreadTasks', 'PortalOutspread@outspreadTasks')->name('portal.outspreadTasks');
        Route::get('/publicComplaint', 'PortalOutspread@publicComplaint')->name('portal.publicComplaint');
        Route::get('/citizenComplaint', 'PortalOutspread@citizenComplaint')->name('portal.citizenComplaint');
        Route::get('/quittance', 'PortalOutspread@quittance')->name('portal.quittance');
        
        Route::get('/vacationRequest', 'PortalGeneral@vacationRequest')->name('portal.vacationRequest');
        Route::get('/leavePermission', 'PortalGeneral@leavePermission')->name('portal.leavePermission');
        Route::get('/collecting', 'PortalGeneral@collecting')->name('portal.collecting');
        Route::get('/requestSpareParts', 'PortalGeneral@requestSpareParts')->name('portal.requestSpareParts');
        Route::get('/PurchaseOrder', 'PortalGeneral@PurchaseOrder')->name('portal.PurchaseOrder');
        Route::get('/networkDevelopment', 'PortalGeneral@networkDevelopment')->name('portal.networkDevelopment');
        /************ ticket area ***************/
        Route::post('portal_saveTicket1', 'AppPortal@saveTicket1')->name('portal_saveTicket1');
        Route::post('portal_saveTicket2', 'AppPortal@saveTicket2')->name('portal_saveTicket2');
        Route::post('portal_saveTicket4', 'AppPortal@saveTicket4')->name('portal_saveTicket4');
        Route::post('portal_saveTicket5', 'AppPortal@saveTicket5')->name('portal_saveTicket5');
        Route::post('portal_saveTicket6', 'AppPortal@saveTicket6')->name('portal_saveTicket6');
        Route::post('portal_saveTicket7', 'AppPortal@saveTicket7')->name('portal_saveTicket7');
        Route::post('portal_saveTicket8', 'AppPortal@saveTicket8')->name('portal_saveTicket8');
        Route::post('portal_saveTicket9', 'AppPortal@saveTicket9')->name('portal_saveTicket9');
        Route::post('portal_saveTicket10', 'AppPortal@saveTicket10')->name('portal_saveTicket10');
        Route::post('portal_saveTicket11', 'AppPortal@saveTicket11')->name('portal_saveTicket11');
        Route::post('portal_saveTicket12', 'AppPortal@saveTicket12')->name('portal_saveTicket12');
        Route::post('portal_saveTicket13', 'AppPortal@saveTicket13')->name('portal_saveTicket13');
        Route::post('portal_saveTicket14', 'AppPortal@saveTicket14')->name('portal_saveTicket14');
        Route::post('portal_saveTicket15', 'AppPortal@saveTicket15')->name('portal_saveTicket15');
        Route::post('portal_saveTicket16', 'AppPortal@saveTicket16')->name('portal_saveTicket16');
        Route::post('portal_saveTicket17', 'AppPortal@saveTicket17')->name('portal_saveTicket17');
        Route::post('portal_saveTicket18', 'AppPortal@saveTicket18')->name('portal_saveTicket18');
        Route::post('portal_saveTicket19', 'AppPortal@saveTicket19')->name('portal_saveTicket19');
        Route::post('portal_saveTicket20', 'AppPortal@saveTicket20')->name('portal_saveTicket20');
        Route::post('portal_saveTicket21', 'AppPortal@saveTicket21')->name('portal_saveTicket21');
        Route::post('portal_saveTicket22', 'AppPortal@saveTicket22')->name('portal_saveTicket22');
        Route::post('portal_saveTicket23', 'AppPortal@saveTicket23')->name('portal_saveTicket23');
        Route::post('portal_saveTicket24', 'AppPortal@saveTicket24')->name('portal_saveTicket24');
        Route::post('portal_saveTicket25', 'AppPortal@saveTicket25')->name('portal_saveTicket25');
        Route::post('portal_saveTicket26', 'AppPortal@saveTicket26')->name('portal_saveTicket26');
        Route::post('portal_saveTicket27', 'AppPortal@saveTicket27')->name('portal_saveTicket27');
        Route::post('portal_saveTicket28', 'AppPortal@saveTicket28')->name('portal_saveTicket28');
        Route::post('portal_saveTicket29', 'AppPortal@saveTicket29')->name('portal_saveTicket29');
        Route::post('portal_saveTicket30', 'AppPortal@saveTicket30')->name('portal_saveTicket30');
        Route::post('portal_saveTicket31', 'AppPortal@saveTicket31')->name('portal_saveTicket31');
        Route::post('portal_saveTicket32', 'AppPortal@saveTicket32')->name('portal_saveTicket32');
        Route::post('portal_saveTicket33', 'AppPortal@saveTicket33')->name('portal_saveTicket33');
        Route::post('portal_saveTicket34', 'AppPortal@saveTicket34')->name('portal_saveTicket34');
        Route::post('portal_saveTicket35', 'AppPortal@saveTicket35')->name('portal_saveTicket35');
        Route::post('addReplay', 'AppPortal@addReplay')->name('addReplay');
        Route::post('directAddSmsLog', 'AppPortal@directAddSmsLog')->name('directAddSmsLog');
        Route::post('addTrans', 'AppPortal@addTrans')->name('addTrans');
        Route::get('viewTicket/{id}/{type}', 'AppPortal@viewTicket')->name('viewTicket');
        Route::get('editTicket/{id}/{type}', 'AppPortal@editTicket')->name('editTicket');
        Route::get('printTicket/{id}/{type}', 'PrintTicket@printTicket')->name('printTicket');
        Route::put('TicketDel', 'AppPortal@deleteTicket')->name('TicketDel');
        Route::put('updateVac', 'AppPortal@updateVac')->name('updateVac');
        Route::get('getVacForEmployee/{id}', 'AppPortal@getVacForEmployee')->name('getVacForEmployee');
        /****************************************/
        

        Route::get('portal_auto_complete', 'PortalWater@portal_auto_complete')->name('portal_auto_complete');
        Route::post('portal_appCustomer', 'PortalWater@appCustomer')->name('portal_appCustomer');
        
    });
    
    
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

