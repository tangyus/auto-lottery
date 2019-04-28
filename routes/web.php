<?php

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('config')->group(function () {
    // 查看配置
    Route::get('', 'ConfigController@show')
        ->name('config');

    // 新增保存
    Route::post('', 'ConfigController@store')
        ->name('config.store');

    // 修改更新
    Route::PUT('{config}', 'ConfigController@update')
        ->name('config.update');
});

Route::resource('tables', 'TablesController', ['except' => 'show']);
Route::prefix('table/{name}')->group(function () {
    Route::resource('fields', 'FieldsController', ['except' => 'show']);
    Route::get('fields/generate', 'FieldsController@generate')->name('fields.generate');
});

Route::prefix('award')->group(function () {
    Route::get('', 'AwardController@index')->name('award');
    Route::post('generate', 'AwardController@generate')->name('award.generate');
    Route::get('red_packet', 'AwardController@redPacket')->name('award.red_packet');
    Route::post('red_packet/generate', 'AwardController@generateRedPacket')->name('award.red_packet.generate');
    Route::get('list', 'AwardController@awardList')->name('award.list');
    Route::get('list/group', 'AwardController@awardListGroupByTime')->name('award.list.group');
});

Route::resource('model', 'ModelController');