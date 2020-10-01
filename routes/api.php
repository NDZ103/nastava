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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//->middleware('can:manage-users')
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/subjects', 'SubjectsApiController');
});

Route::namespace('Student')->prefix('student')->name('student.')->group(function(){
 
    Route::resource('/subjects',  'SubjectsController');
    //Route::get('/subjects/search', 'SubjectsController@search')->name('subjects.search');
});
Route::get('/todo/search/', 'TodoController@search')->name('todo.search');

