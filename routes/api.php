<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'token'
], function() {
    Route::post('/', 'UserController@token');
    Route::delete('/', 'UserController@token');
});

Route::group([
    'prefix' => 'projects',
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('{id}', 'ProjectController@find');
    Route::delete('{id}', 'ProjectController@delete');
    Route::put('{id}', 'ProjectController@update');
    Route::post('', 'ProjectController@create');
    Route::get('', 'ProjectController@index');

    Route::get('{id}/tags', 'ProjectTagController@getTagsByProject');
    Route::post('{id}/tags', 'ProjectTagController@create');
    Route::delete('{id}/tags/{tagId}, ProjectTagController@delete');
});

Route::group([
    'prefix' => 'tags',
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('{id}', 'TagController@find');
    Route::delete('{id}', 'TagController@delete');
    Route::put('{id}', 'TagController@update');
    Route::post('', 'TagController@create');
    Route::get('', 'TagController@index');

    // find projects related to a tag
    Route::get('{tagId}/projects', 'ProjectTagController@getProjectsByTag');
});

Route::group([
    'prefix' => 'scopes',
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('{id}', 'ScopesController@find');
    Route::delete('{id}', 'ScopesController@delete');
    Route::put('{id}', 'ScopesController@update');
    Route::post('', 'ScopesController@create');
    Route::get('', 'ScopesController@index');

    // find users by scope
    Route::get('{id}/users', 'UserScopesController@getUsersByScope');
});

Route::group([
    'prefix' => 'user',
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('', function(Request $request) {
        return $request->user()->toArray();
    });
});
