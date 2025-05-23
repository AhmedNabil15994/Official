<?php

/*----------------------------------------------------------
User Auth
----------------------------------------------------------*/
Route::group(['prefix' => '/'] , function () {
	$authController = App\Http\Controllers\AuthControllers::class;
    Route::get('/', function(){dd('landingPage');});
    Route::get('/login', [$authController,'login'])->name('login');
    Route::post('/login', [$authController,'doLogin'])->name('doLogin');
    Route::get('/logout', [$authController,'logout']);


    // Route::post('/pushInvoice', [App\Http\Controllers\DashboardControllers::class,'pushInvoice']);
    // Route::post('/invoices/{id}/pushInvoice', [\App\Http\Controllers\TenantInvoiceControllers::class,'pushInvoice']);
    
    // Route::get('/loginByCode', [$authController,'loginByCode'])->name('loginByCode');
    // Route::post('/checkByCode', [$authController,'checkByCode']);

    // Route::get('/getResetPassword', [$authController,'getResetPassword'])->name('getResetPassword');
    // Route::post('/resetPassword', [$authController,'resetPassword'])->name('resetPassword');
    // Route::get('/changePassword', [$authController,'changePassword']);
    // Route::post('/checkResetPassword', [$authController,'checkResetPassword']);
    // Route::post('/completeReset', [$authController,'completeReset']);


    // Route::get('impersonate/{token}',[App\Http\Controllers\ImpersonatesController::class, 'index'])->name('impersonate');
});