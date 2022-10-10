<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/messages/'] , function () {
    $controller = App\Http\Controllers\HomeController::class;
    Route::post('sendMessage', [$controller,'sendMessage']);
    Route::post('sendButtons', [$controller,'sendButtons']);
    Route::post('sendPreview', [$controller,'sendPreview']);
});

Route::group(['prefix' => '/webhooks'] ,function(){
    Route::webhooks('/messages-webhook','default');
});
