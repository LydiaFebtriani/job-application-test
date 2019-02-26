<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use Illuminate\Http\Request;

/**
 * Controller for Student
 */
class StudentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the Student.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Students' data
        $students = Student::all();
        // Array of string [[students id, name, their classes name]]
        $data = array();

        foreach ($students as $student) {
            // Get Classroom with the same class id
            $class = $student->classroom;
            // Get class name
            if($class == null) {
                $class_name = "-";
            } else {
                $class_name = $class->name;
            }

            // Push to array
            array_push($data, [$student->id,$student->name,$class_name]);
        }
        return view("students")->with("students_data",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        // Store student's name
        $student->name = $request->name;
        // Store student's classroom_id
        $student->classroom_id = $request->class;
        $student->save();

        return redirect()->route("students");
    }

    /**
     * Display the Add New Student page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Get all Classroom
        $classes = Classroom::all();

        // Array of Classroom, [classrooms' id => name]
        $arr_class = array();
        array_push($arr_class, "");
        foreach ($classes as $class) {
            array_push($arr_class, [$class->id => $class->name]);
        }
        return view('addNewStudent')->with("classes_data",$arr_class);
    }

    /**
     * Show the form for editing the Student.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get Students where id = $id
        $student = Student::find($id);

        // Get all Classroom
        $classrooms = Classroom::all();
        // Array for Classroom, [[id => name], ...]
        $arr_class = array();
        array_push($arr_class, "");
        foreach ($classrooms as $classroom) {
            array_push($arr_class, [$classroom->id => $classroom->name]);
        }

        return view('editStudent')->with("edit_info",['student'=>$student, 'classes'=>$arr_class]);
    }

    /**
     * Update the Student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find Student with $id
        $student = Student::find($id);
        // Update name
        $student->name = $request->name;
        $student->classroom_id = $request->class;
        $student->save();

        return redirect()->route("students");
    }

    /**
     * Remove the Student from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Student with $id
        $student = Student::find($id);
        // Delete Student with $id
        $student->delete();
        return redirect()->to('/students');
    }
}
