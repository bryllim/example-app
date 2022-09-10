<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
 
class StudentController extends Controller
{
    public function create(Request $request)
    {
        // $student = Student::create([
        //     'name' => $request->name,
        //     'email' => $request->email
        // ]);

        //alternatively,

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        return redirect()->route('home')->with('success', 'New student added.');

    }

    public function update(Request $request){
        $student = Student::find($request->student_id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        return redirect()->route('home')->with('success', 'Student updated.');
    }

    public function delete(Request $request){
        
        $student = Student::find($request->student_id);
        $studentname = $student->name;
        $student->delete();

        return redirect()->route('home')->with('deleted', $studentname.' has been deleted.');
    }
}

?>