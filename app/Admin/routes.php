<?php

Admin::registerAdminRoutes();

Route::group([
    'namespace' => 'App\Admin\Controllers',
    'prefix' => 'admin',
    'middleware' => ['web', 'admin'],
    'as' => 'admin::'
], function () {
    Route::get('/', 'HomeController@index')->name('main');

    ///
    Route::group([
    	'middleware' => ['admin.check_permission']
    ], function(){
    	//组管理
    	Route::group([
    		'namespace' => 'Groups',
    	],function(){
    		Route::get('/groups','GroupController@index')->name('groups.index');
    		Route::get('/groups/{group}/edit','GroupController@edit')->name('groups.edit');
    		Route::put('/groups/{group}/update','GroupController@update')->name('groups.update');
    		Route::delete('/groups/{group}/destory','GroupController@destory')->name('groups.destory');
    	});
    });

   
});