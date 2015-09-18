<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['middleware' => 'auth'], function()
{

    Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);

    Route::get('auth/dropbox', 'DropboxController@redirectToProvider');
    Route::get('auth/dropbox/callback', 'DropboxController@handleProviderCallback');
});

Route::group(['middleware' => 'guest'], function()
{
    Route::get('/login', ['as'=> 'login', 'uses' => 'AuthController@login']);
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');

    Route::get('/register', ['as' => 'register', 'uses' => 'AuthController@register']);
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
});