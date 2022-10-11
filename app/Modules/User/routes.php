<?php

	Route::group(['prefix' => '/account'] , function () {
	    $controller = App\Http\Controllers\UsersController::class;
	    Route::post('/register', [$controller,'register']);
	    Route::post('/login', [$controller,'login']);
	});

	Route::group(['prefix' => '/channels'] , function () {
    	$controller = App\Http\Controllers\ChannelsControllers::class;
        Route::get('/', [$controller,'channels']);
        Route::post('/createChannel', [$controller,'createChannel']);
        Route::post('/deleteChannel', [$controller,'deleteChannel']);
        Route::post('/transferDays', [$controller,'transferDays']);
    });