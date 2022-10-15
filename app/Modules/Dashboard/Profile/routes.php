<?php

/*----------------------------------------------------------
Profile
----------------------------------------------------------*/
Route::group(['prefix' => '/profile'] , function () {
    Route::get('/', [App\Http\Controllers\ProfileControllers::class,'index']);
    Route::post('/updateProfile', [App\Http\Controllers\ProfileControllers::class,'updateProfile']);
});