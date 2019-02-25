<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\ClassRoom;
use Illuminate\Http\Request;

/**
 * Controller for ClassRoom
 */
class ClassRoomsController extends Controller
{
    /**
     * Display a listing of the ClassRoom.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ClassRoom's data
        $classrooms = ClassRoom::all();
        // Array of string [[class room id, name,their teacher name, students name]]
        $data = array();

        foreach ($classrooms as $classroom) {
            // Get Teacher with the same teacher id
            $teacher = $classroom->teacher;
            // Get teacher name
            if($teacher == null) {
                $teacher_name = "-";
            } else {
                $teacher_name = $teacher->name;
            }

            // Get Student with the same class id
            $students = $classroom->students;
            // Set Students' name to string_students
            $string_students = "";
            foreach ($students as $student) {
                if($student != null) {
                    if($string_students != "") $string_students .= ", ";
                    $string_students .= $student->name;
                }
            }
            // If this class has no student, set $string_students to "-"
            if($string_students == "") $string_students = "-";

            // Push to array
            array_push($data, [$classroom->id,$classroom->name,$teacher_name,$string_students]);
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
     * Store a newly created ClassRoom in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom = new ClassRoom();
        // Store classroom's name
        $classroom->name = $request->name;
        // Store classroom's teacher_id
        $classroom->teacher_id = $request->teacher;
        $classroom->save();

        return redirect()->route("classrooms");
    }

    /**
     * Display the Add New Class page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Get all Teachers
        $teachers = Teacher::all();

        // Array of teacher, [teachers' id => [name, their classes]]
        $arr_teacher = array();
        array_push($arr_teacher, "");
        foreach ($teachers as $teacher) {
            // Get the teacher's classrooms
            $classes = $teacher->classrooms;
            // Set classes' name to str_classes
            $str_classes = "";
            foreach ($classes as $class) {
                if($class != null){
                    if($str_classes != "") $str_classes .= ", ";
                    $str_classes .= $class->name;
                }
            }
            array_push($arr_teacher, [$teacher->id => $teacher->name." (".$str_classes.")"]);
        }

        return view("addNewClassRoom")->with("teachers_data",$arr_teacher);
    }

    /**
     * Show the form for editing the ClassRoom.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get ClassRoom where id = $id
        $classroom = ClassRoom::find($id);
        return view('editClassRoom')->with("edit_info",['classroom'=>$classroom]);
    }

    /**
     * Update the ClassRoom in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find ClassRoom with $id
        $classroom = ClassRoom::find($id);
        // Update name
        $classroom->name = $request->name;
        $classroom->save();

        return redirect()->route("classrooms");
    }

    /**
     * Remove the ClassRoom from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find ClassRoom with $id
        $classroom = ClassRoom::find($id);
        // Delete ClassRoom with $id
        $classroom->delete();
        return redirect()->to('/classrooms');
    }
}
