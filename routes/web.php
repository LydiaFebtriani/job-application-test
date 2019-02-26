<?php

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

/* ROUTE FOR TEACHER */
Route::get('/teachers', 'TeachersController@index')->name('teachers');
// New & Store
Route::get('/teachers/new', 'TeachersController@show')->name('teachers.shownew');
Route::post('/teachers/store', 'TeachersController@store')->name('teachers.store');
// Edit & Update
Route::get('/teachers/edit/{id}', 'TeachersController@edit')->name('teachers.edit');
Route::put('/teachers/update/{id}', 'TeachersController@update')->name('teachers.update');
// Delete
Route::delete('/teachers/delete/{id}', 'TeachersController@destroy')->name('teachers.destroy');


/* ROUTE FOR STUDENT */
Route::get('/students', 'StudentsController@index')->name('students');
// New & Store
Route::get('/students/new', 'StudentsController@show')->name('students.shownew');
Route::post('/students/store', 'StudentsController@store')->name('students.store');
// Edit & Update
Route::get('/students/edit/{id}', 'StudentsController@edit')->name('students.edit');
Route::put('/students/update/{id}', 'StudentsController@update')->name('students.update');
// Delete
Route::delete('/students/delete/{id}', 'StudentsController@destroy')->name('students.destroy');


/* ROUTE FOR CLASSROOMS */
Route::get('/classrooms', 'ClassroomsController@index')->name('classrooms');
// New & Store
Route::get('/classrooms/new', 'ClassroomsController@show')->name('classrooms.shownew');
Route::post('/classrooms/store', 'ClassroomsController@store')->name('classrooms.store');
// Edit & Update
Route::get('/classrooms/edit/{id}', 'ClassroomsController@edit')->name('classrooms.edit');
Route::put('/classrooms/update/{id}', 'ClassroomsController@update')->name('classrooms.update');
// Delete
Route::delete('/classrooms/delete/{id}', 'ClassroomsController@destroy')->name('classrooms.destroy');
// Download PDF
Route::get('/classrooms/download', 'ClassroomsController@downloadPDF')->name('classrooms.download');

