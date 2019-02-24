<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Students' data
        $students = Student::all();
        // Array of string [[students name,their classes name]]
        $data = array();

        foreach ($students as $student) {
            // Get ClassRoom with the same class id
            $classes = ClassRoom::where('id','=',$student->class_id)->get();

            $string_classes = "";
            foreach ($classes as $class) {
                if($string_classes != "") $string_classes .= ", ";
                $string_classes .= $class->name;
            }

            // If this student has no class, set $string_classes to "-"
            if($string_classes == "") $string_classes = "-";
            // Push to array
            array_push($data, [$student->name,$string_classes]);
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
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
