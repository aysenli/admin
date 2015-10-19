<?php

Route::group(['middleware' => ['admin']], function() {
  Route::get('/home', function() {
      return redirect('/');
  });
  
  Route::get('/', '\Zhuayi\admin\AdminController@index');
  Route::get('/admin/user/', '\Zhuayi\admin\AdminController@user');
  Route::get('/admin/user/edit/{id}', '\Zhuayi\admin\AdminController@edit');
  Route::post('/admin/user/store/', '\Zhuayi\admin\AdminController@store');
  Route::get('/admin/user/add/', '\Zhuayi\admin\AdminController@add');
  Route::get('/admin/user/destroy/{id}', '\Zhuayi\admin\AdminController@destroy');

  // role
  Route::get('/admin/role/', '\Zhuayi\admin\RoleController@index');
  Route::get('/admin/role/edit/{id}', '\Zhuayi\admin\RoleController@edit');
  Route::post('/admin/role/update/{id}', '\Zhuayi\admin\RoleController@update');
  Route::get('/admin/role/add/', '\Zhuayi\admin\RoleController@add');
  Route::post('/admin/role/create/', '\Zhuayi\admin\RoleController@create');
  Route::get('/admin/role/destroy/{id}', '\Zhuayi\admin\RoleController@destroy');

  // menu
  Route::get('/admin/menu/', '\Zhuayi\admin\MenuController@index');
  Route::controller('/admin/menu', '\Zhuayi\admin\MenuController');
});