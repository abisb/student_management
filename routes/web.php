<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarkController;
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



//student route//    
    Route::get('/', 'StudentController@index');
    Route::get('students_list', 'StudentController@list');
    Route::get('stud/listing', [StudentController::class, 'getStudents'])->name('stud.listing');
    Route::get('students_create', 'StudentController@student_create');
    Route::post('student/create', 'StudentController@create')->name('student.create');
    Route::get('edit_student/{id}/edit', 'StudentController@edit')->name('edit_student.edit');
    Route::post('student/update', 'StudentController@update')->name('student.update');
    Route::get('/delete_student/{id}/delete', 'StudentController@delete')->name('delete_student');
//student route end//  

//mark route//  
    Route::get('students_mark', 'MarkController@list');
    Route::get('create_mark', 'MarkController@create_mark');
    Route::post('mark/create', 'MarkController@create')->name('mark.create');
    Route::get('mark/listing', [MarkController::class, 'getmark'])->name('mark.listing');
    Route::get('edit_mark/{id}/edit', 'MarkController@edit')->name('edit_mark.edit');
    Route::post('mark/update', 'MarkController@update')->name('mark.update');
    Route::get('/delete_mark/{id}/delete', 'MarkController@delete')->name('delete_mark');
//mark route end//  