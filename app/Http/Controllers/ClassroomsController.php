<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\Classroom;
use Illuminate\Http\Request;
use PDF;

/**
 * Controller for Classroom
 */
class ClassroomsController extends Controller
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
     * Display a listing of the Classroom.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("classrooms")->with("classrooms_data", $this->getClassesInformation());
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
     * Store a newly created Classroom in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom = new Classroom();
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

        return view("addNewClassroom")->with("teachers_data",$arr_teacher);
    }

    /**
     * Show the form for editing the Classroom.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get Classroom where id = $id
        $classroom = Classroom::find($id);
        return view('editClassroom')->with("edit_info",['classroom'=>$classroom]);
    }

    /**
     * Update the Classroom in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find Classroom with $id
        $classroom = Classroom::find($id);
        // Update name
        $classroom->name = $request->name;
        $classroom->save();

        return redirect()->route("classrooms");
    }

    /**
     * Remove the Classroom from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Classroom with $id
        $classroom = Classroom::find($id);
        // Delete Classroom with $id
        $classroom->delete();
        return redirect()->to('/classrooms');
    }

    /**
     * Get all classroom information
     *
     * @return array of string, [[class room id, name,their teacher name, students name]]
     */
    private function getClassesInformation(){
        // Classroom's data
        $classrooms = Classroom::all();
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

        return $data;
    }

    /**
     * Download PDF file that lists all the Classrooms 
     * with the names of Teachers and Students in them.
     *
     */
    public function downloadPDF(){
        $classrooms_data = $this->getClassesInformation();
        $pdf = PDF::loadView('pdf', compact('classrooms_data'));
        return $pdf->download('Classrooms Information.pdf');
    }
}
