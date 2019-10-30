<?php
use Illuminate\Support\Facades\Route;

Route::get('/', ['uses' => 'GlogController@index', 'as' => 'glog_index']);
Route::get('/{logid}/view', ['uses' => 'GlogController@show', 'as' => 'glog_view']);
Route::get('/purge', ['uses' => 'ResetController@index', 'as' => 'glog_clear_logs']);
Route::post('/purge', ['uses' => 'ResetController@clear']);
