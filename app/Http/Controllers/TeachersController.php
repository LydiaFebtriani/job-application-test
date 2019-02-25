<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use App\Teacher;
use Illuminate\Http\Request;

/**
 * Controller for Student
 */
class TeachersController extends Controller
{
    /**
     * Display a listing of the Teacher.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Teachers' data
        $teachers = Teacher::all();
        // Array of string [[teachers id, name,their classes name]]
        $data = array();

        foreach ($teachers as $teacher) {
            // Get ClassRoom with the same teacher id
            $classes = $teacher->classrooms;

            // Set Classes name to string_classes
            $string_classes = "";
            foreach ($classes as $class) {
                if($class != null){
                    if($string_classes != "") $string_classes .= ", ";
                    $string_classes .= $class->name;
                }
            }
            // If this teacher has no class, set $string_classes to "-"
            if($string_classes == "") $string_classes = "-";

            // Push to array
            array_push($data, [$teacher->id,$teacher->name,$string_classes]);
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
     * Store a newly created Teacher in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new Teacher();
        // Store teacher's name
        $teacher->name = $request->name;
        $teacher->save();

        return redirect()->route("teachers");
    }

    /**
     * Display the Add New Teacher page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('addNewTeacher');
    }

    /**
     * Show the form for editing the Teacher.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get Teachers where id = $id
        $teacher = Teacher::find($id);

        // Get current classes
        $cur_classes = $teacher->classrooms;
        // Set Classes name to string_classes
        $string_classes = "";
        foreach ($cur_classes as $cur_class) {
            if($cur_class != null){
                if($string_classes != "") $string_classes .= ", ";
                $string_classes .= $cur_class->name;
            }
        }
        // If this teacher has no class, set $string_classes to "-"
        if($string_classes == "") $string_classes = "-";

        // Get all ClassRoom
        $classrooms = ClassRoom::all();
        // Array for ClassRoom, [[id => name], ...]
        $arr_class = array();
        array_push($arr_class, "");
        foreach ($classrooms as $classroom) {
            array_push($arr_class, [$classroom->id => $classroom->name]);
        }

        return view('editTeacher')->with("edit_info",
            [
                'teacher'=>$teacher, 
                'cur_classes'=>$string_classes, 
                'classes'=>$arr_class
            ]);
    }

    /**
     * Update the Teacher in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find Teacher with $id
        $teacher = Teacher::find($id);
        // Update name
        $teacher->name = $request->name;
        $teacher->save();

        // Find ClassRoom with $request->class
        $classroom = ClassRoom::find($request->class);
        // Update teacher_id
        $classroom->teacher_id = $id;
        $classroom->save();
        return redirect()->route("teachers");
    }

    /**
     * Remove the Teacher from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Teacher with $id
        $teacher = Teacher::find($id);
        // Delete Teacher with $id
        $teacher->delete();
        return redirect()->to('/teachers');
    }
}
