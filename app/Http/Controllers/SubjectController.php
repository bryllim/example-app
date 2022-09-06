<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create(Request $request){
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->grade = $request->grade;
        $subject->save();
    }
}
