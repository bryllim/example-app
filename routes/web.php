<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

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

Route::post('/deletestudent',
    [StudentController::class, 'delete']
)->name('deletestudent');

Route::post('updatestudent',
    [StudentController::class, 'update']
)->name('updatestudent');

Route::get('studentupdate/{id}', function($id) {
    return view('studentupdate')->with('student', Student::find($id));
})->name('studentupdate');

//------- Subject Routes //

Route::get('/subjects', function () {
    return view('subjects')->with('students', Student::all());
})->name('subjects');

Route::post('/addsubject',
    [SubjectController::class, 'create']
)->name('addsubject');

Route::post('getsubjects', function(Request $request) {
    $student = Student::find($request->id);
    $subjects = $student->subjects;
    return json_encode($subjects);
})->name('getsubjects');