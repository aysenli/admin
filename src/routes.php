<?php

Route::group(['middleware' => ['admin']], function() {
  Route::get('/home', function() {
      return redirect('/');
  });
  
  Route::get('/', 'App\Http\Controllers\Admin\AdminController@index');
  Route::get('/admin/user/', 'App\Http\Controllers\Admin\AdminController@user');
  Route::get('/admin/user/edit/{id}', '\App\Http\Controllers\Admin\AdminController@edit');
  Route::post('/admin/user/store/', 'App\Http\Controllers\Admin\AdminController@store');
  Route::get('/admin/user/add/', 'App\Http\Controllers\Admin\AdminController@add');
  Route::get('/admin/user/destroy/{id}', 'App\Http\Controllers\Admin\AdminController@destroy');

  // role
  Route::get('/admin/role/', 'App\Http\Controllers\Admin\RoleController@index');
  Route::get('/admin/role/edit/{id}', 'App\Http\Controllers\Admin\RoleController@edit');
  Route::post('/admin/role/update/{id}', 'App\Http\Controllers\Admin\RoleController@update');
  Route::get('/admin/role/add/', '\App\Http\Controllers\Admin\RoleController@add');
  Route::post('/admin/role/create/', 'App\Http\Controllers\Admin\RoleController@create');
  Route::get('/admin/role/destroy/{id}', 'App\Http\Controllers\Admin\RoleController@destroy');

  // menu
  Route::get('/admin/menu/', 'App\Http\Controllers\Admin\MenuController@index');
  Route::post('/admin/menu/create/', 'App\Http\Controllers\Admin\MenuController@create');
  Route::post('/admin/menu/store/', 'App\Http\Controllers\Admin\MenuController@store');
  Route::get('/admin/menu/add/', '\App\Http\Controllers\Admin\MenuController@add');
  Route::get('/admin/menu/edit/{id}', '\App\Http\Controllers\Admin\MenuController@edit');
  Route::post('/admin/menu/update/{id}', 'App\Http\Controllers\Admin\MenuController@update');
  Route::get('/admin/menu/destroy/{id}', 'App\Http\Controllers\Admin\MenuController@destroy');
});

// --------------------Auth related routes------------------------ 
Route::controller('auth', 'App\Http\Controllers\Auth\AuthController');
Route::controller('password', 'App\Http\Controllers\Auth\PasswordController');