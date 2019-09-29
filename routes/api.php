<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*Route::get('task','TaskController@task');
Route::get('task/{id}','TaskController@taskId');
Route::post('task','TaskController@taskSave');
Route::put('task/{id}', 'TaskController@taskUpdate');
Route::delete('task/{task}', 'TaskController@taskDelete');*/
Route::group(['middleware' => 'auth:api'], function(){
    Route::apiResource('task','Api\TaskController');
});


