<?php

use Illuminate\Support\Facades\Route;
use App\Teacher;
use App\Student;
use App\User;
use App\Role;
use App\Subject;
use App\Material;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users',    'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/subjects', 'SubjectsController');
    Route::get('/api_subjects', 'SubjectsApiController@showView')->name('subjects.showView');
    
});

Route::namespace('Teacher')->prefix('teacher')->name('teacher.')->group(function(){
    Route::resource('/materials', 'MaterialsController');
    Route::get('/materials/download/{file}', 'MaterialsController@downloadFile')->name('materials.download');
    Route::resource('/subjects',  'SubjectsController');
    
});

Route::namespace('Student')->prefix('student')->name('student.')->group(function(){
    Route::resource('/materials', 'MaterialsController');
    Route::get('/materials/download/{file}', 'MaterialsController@downloadFile')->name('materials.download');
    Route::resource('/subjects',  'SubjectsController');

    Route::post('/subjects/search','SubjectsController@search')->name('subjects.search');
    
});

