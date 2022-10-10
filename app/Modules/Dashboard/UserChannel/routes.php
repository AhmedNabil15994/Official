<?php

/*----------------------------------------------------------
User Channels
----------------------------------------------------------*/
Route::group(['prefix' => '/channels'] , function () {
    Route::get('/', [App\Http\Controllers\UserChannelsControllers::class,'index']);
    Route::get('/{id}', [App\Http\Controllers\UserChannelsControllers::class,'view']);
    Route::get('/{id}/logout', [App\Http\Controllers\UserChannelsControllers::class,'logout']);
    Route::get('/{id}/clear', [App\Http\Controllers\UserChannelsControllers::class,'clear']);
});