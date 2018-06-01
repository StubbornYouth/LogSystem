<?php

Admin::registerAdminRoutes();

Route::group([
    'namespace' => 'App\Admin\Controllers',
    'prefix' => 'admin',
    'middleware' => ['web', 'admin'],
    'as' => 'admin::'
], function () {
    Route::get('/', 'UserController@index')->name('main');

    ///
    Route::group([
    	'middleware' => ['admin.check_permission']
    ], function(){
    	//组管理
    	Route::group([
    		'namespace' => 'Groups'
    	],function(){
    		Route::get('groups','GroupController@index')->name('groups.index');
    	});
    });

   
});