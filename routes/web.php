<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/project/{project_id}/info', 'ProjectController@info')->name('project-info');
Route::post('/project/{project_id}/theme/create', 'ThemeController@createTheme')->name('create-theme');
Route::get('/project/{project_id}/theme/{theme_id}/info', 'ThemeController@info')->name('theme-info');
Route::post('/project/{project_id}/screen/create', 'ScreenController@createScreen')->name('create-screen');
Route::get('/project/{project_id}/screen/{screen_id}/info', 'ScreenController@info')->name('screen-info');
