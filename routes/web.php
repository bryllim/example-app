<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use App\Models\Subject;
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
    return view('welcome')->with('students', Student::all());
})->name('home');

//------- Student Routes //

Route::get('/addstudent', function () { 
    return view('addstudent');
})->name('addstudent');

Route::post('/createstudent',
    [StudentController::class, 'create']
)->name('createstudent');

//------- Subject Routes //

Route::get('/subjects', function () {
    return view('subjects')->with('students', Student::all());;
})->name('subjects');

Route::post('/addsubject',
    [SubjectController::class, 'create']
)->name('addsubject');