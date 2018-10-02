<?php

Route::group(
    [
        'prefix' => Config::get("glog.route-prefix"),
        'middleware' => Config::get("glog.middlewares"),
        'namespace' => 'Gazatem\Glog\Http\Controllers',
    ],
    function () {
        Route::get('/', ['uses' => 'GlogController@index', 'as' => 'glog_index']);
        Route::get('/{logid}/view', ['uses' => 'GlogController@view', 'as' => 'glog_view']);
        Route::get('/purge', ['uses' => 'ResetController@index', 'as' => 'glog_clear_logs']);
        Route::post('/purge', ['uses' => 'ResetController@clear']);
    }

);
