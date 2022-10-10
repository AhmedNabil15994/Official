<?php

/*----------------------------------------------------------
Dashboard
----------------------------------------------------------*/
Route::group(['prefix' => '/dashboard'] , function () {
    Route::get('/', [App\Http\Controllers\DashboardControllers::class,'index']);
    Route::post('/changeLang', [App\Http\Controllers\DashboardControllers::class,'changeLang']);
});