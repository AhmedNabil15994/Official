<?php

/*----------------------------------------------------------
User Channels
----------------------------------------------------------*/
Route::group(['prefix' => '/channels'] , function () {
    Route::get('/', [App\Http\Controllers\UserChannelsControllers::class,'index']);
    Route::get('/{id}', [App\Http\Controllers\UserChannelsControllers::class,'view']);
    Route::get('/{id}/logout', [App\Http\Controllers\UserChannelsControllers::class,'logout']);
    Route::get('/{id}/clear', [App\Http\Controllers\UserChannelsControllers::class,'clear']);
    Route::get('/{id}/resend', [App\Http\Controllers\UserChannelsControllers::class,'resend']);
    Route::get('/{id}/getHistory', [App\Http\Controllers\UserChannelsControllers::class,'getHistory']);
    Route::get('/{id}/getQueue', [App\Http\Controllers\UserChannelsControllers::class,'getQueue']);
    Route::post('/{id}/transferDays', [App\Http\Controllers\UserChannelsControllers::class,'transferDays']);
    Route::post('/{id}/updateSetting', [App\Http\Controllers\UserChannelsControllers::class,'updateSetting']);
});