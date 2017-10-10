<?php

Route::group(
    [
        'prefix' => Config::get("glog.route-prefix"),
        'middleware' => Config::get("glog.middlewares")
    ],
    function () {
        Route::get('/', ['uses' => 'GlogController@index', 'as' => 'glog_index']);
        Route::get('/clear-logs', ['uses' => 'ResetController@index', 'as' => 'glog_clear_logs']);
        Route::post('/clear-logs', ['uses' => 'ResetController@clear']);
    }

);
