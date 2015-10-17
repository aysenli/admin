<?php

Route::group(['middleware' => ['admin']], function() {
  Route::get('/home', function() {
      return redirect('/');
  });
  
  Route::get('/', '\Zhuayi\BaseAdmin\AdminController@index');
  Route::get('/admin/user/', '\Zhuayi\BaseAdmin\AdminController@user');
  Route::get('/admin/user/edit/{id}', '\Zhuayi\BaseAdmin\AdminController@edit');
  Route::post('/admin/user/store/', '\Zhuayi\BaseAdmin\AdminController@store');
  Route::get('/admin/user/add/', '\Zhuayi\BaseAdmin\AdminController@add');
  Route::get('/admin/user/destroy/{id}', '\Zhuayi\BaseAdmin\AdminController@destroy');

  // role
  Route::get('/admin/role/', '\Zhuayi\BaseAdmin\RoleController@index');
  Route::get('/admin/role/edit/{id}', '\Zhuayi\BaseAdmin\RoleController@edit');
  Route::post('/admin/role/update/{id}', '\Zhuayi\BaseAdmin\RoleController@update');
  Route::get('/admin/role/add/', '\Zhuayi\BaseAdmin\RoleController@add');
  Route::post('/admin/role/create/', '\Zhuayi\BaseAdmin\RoleController@create');
  Route::get('/admin/role/destroy/{id}', '\Zhuayi\BaseAdmin\RoleController@destroy');

  // menu
  Route::get('/admin/menu/', '\Zhuayi\BaseAdmin\MenuController@index');
  Route::controller('/admin/menu', '\Zhuayi\BaseAdmin\MenuController');
});