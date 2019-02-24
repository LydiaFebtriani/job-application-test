<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ClassRoom's data
        $classrooms = ClassRoom::all();
        // Array of string [[class room name,their teacher name, students name]]
        $data = array();

        foreach ($classrooms as $classroom) {
            // Get Teacher with the same teacher id
            $teachers = Teacher::where("id","=",$classroom->teacher_id)->get();
            // Set Teachers' name to string_teachers
            $string_teachers = "";
            foreach ($teachers as $teacher) {
                if($string_teachers != "") $string_teachers .= ", ";
                $string_teachers .= $teacher->name;
            }
            // If this class has no teacher, set $string_teachers to "-"
            if($string_teachers == "") $string_teachers = "-";

            // Get Student with the same class id
            $students = Student::where("class_id","=",$classroom->id)->get();
            // Set Students' name to string_students
            $string_students = "";
            foreach ($students as $student) {
                if($string_students != "") $string_students .= ", ";
                $string_students .= $student->name;
            }
            // If this class has no student, set $string_students to "-"
            if($string_students == "") $string_students = "-";

            // Push to array
            array_push($data, [$classroom->name,$string_teachers,$string_students]);
        }
        return view("classrooms")->with("classrooms_data",$data);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classRoom)
    {
        //
    }
}
