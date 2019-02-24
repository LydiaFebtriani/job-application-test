<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use App\Student;
use Illuminate\Http\Request;

/**
 * Controller for Student
 */
class StudentsController extends Controller
{
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
            // Get ClassRoom with the same class id
            $classes = ClassRoom::where('id','=',$student->class_id)->get();

            // Set Classes name to string_classes
            $string_classes = "";
            foreach ($classes as $class) {
                if($string_classes != "") $string_classes .= ", ";
                $string_classes .= $class->name;
            }

            // If this student has no class, set $string_classes to "-"
            if($string_classes == "") $string_classes = "-";
            // Push to array
            array_push($data, [$student->id,$student->name,$string_classes]);
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
        // Store student's class_id
        $student->class_id = $request->class;
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
        // Get all Teachers
        $classes = ClassRoom::all();
        // Array of Teachers' name
        $arr_class = array();
        array_push($arr_class, "");
        foreach ($classes as $class) {
            array_push($arr_class, $class->name);
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
        $student = Student::where('id','=',$id)->first();

        // Get all ClassRoom
        $classrooms = ClassRoom::all();
        // Array for ClassRoom, [[id => name], ...]
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
        // Update class_id
        $student->class_id = $request->class;
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
