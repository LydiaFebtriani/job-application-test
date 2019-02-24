<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use App\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Teachers data
        $teachers = Teacher::all();
        // Array of string [[teachers name,their classes name]]
        $data = array();

        foreach ($teachers as $teacher) {
            // Get ClassRoom with the same teacher id
            $classes = ClassRoom::where('teacher_id','=',$teacher->id)->get();

            $string_classes = "";
            foreach ($classes as $class) {
                if($string_classes != "") $string_classes .= ", ";
                $string_classes .= $class->name;
            }

            // If this teacher has no class, set $string_classes to "-"
            if($string_classes == "") $string_classes = "-";
            // Push to array
            array_push($data, [$teacher->name,$string_classes]);
        }
        return view("teachers")->with("teachers_data",$data);
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
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
