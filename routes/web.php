<?php

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/project', 'ProjectController@getProject')->name('project-by-secret');
Route::get('/project/{project_id}/info', 'ProjectController@info')->name('project-info');
Route::post('/project/{project_id}/theme/create', 'ThemeController@createTheme')->name('create-theme');
Route::get('/project/{project_id}/theme/{theme_id}/default', 'ThemeController@toggleDefault')->name('toggle-default');
Route::get('/project/{project_id}/theme/{theme_id}/info', 'ThemeController@info')->name('theme-info');
Route::post('/project/{project_id}/screen/create', 'ScreenController@createScreen')->name('create-screen');
Route::get('/project/{project_id}/screen/{screen_id}/info', 'ScreenController@info')->name('screen-info');
Route::get('/project/{project_id}/screen/{screen_id}/tag/create', 'TagController@create')->name('create-tag');
Route::post('/project/{project_id}/screen/{screen_id}/tag/create', 'TagController@store')->name('store-tag');
Route::post('/project/{project_id}/screen/{screen_id}/tag/update', 'TagController@update')->name('update-tag');
Route::post('/tags/delete', 'TagController@deleteTag')->name('delete-tag');
