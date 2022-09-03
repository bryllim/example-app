<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Student;
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

Route::get('/addstudent', function () { 
    return view('addstudent');
})->name('addstudent');

Route::post('/createstudent',
    [StudentController::class, 'create']
)->name('createstudent');