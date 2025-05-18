<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use App\Models\techers;
use App\Models\unit;
use App\Models\allData;
use App\Models\teacher_units;

class StudentsController extends Controller
{
    public function create(){
        $units = unit::all();
        foreach($units as $key => $unit){
            $teachersUnits = teacher_units::select('teacher_id')->where("unit_id", $unit->id)->get();
            foreach ($teachersUnits as $data) {
                $teacher[] = techers::find($data->teacher_id);
            }
            $units[$key]['teachers']=$teacher;
            $teacher = [];
        }
        return view('students.create', ['units'=>$units]);
    }

    public function store(Request $request){
        $student_id = students::insertGetId([
                'name'=>$request->name,
                'family'=>$request->family,
                'age'=>$request->age,
            ]);
            foreach ($request->unit as $units) {
                allData::create([
                    'student_id'=>$student_id,
                    'teacher_id'=>$request[$units],
                    'unit_id'=>$units
                ]);
            }
        return redirect('students');
    }

    public function index(){
        $students = students::all();
        return view('students.students', ['students'=>$students]);
    }

    public function show(string $id){
        $student = students::find($id);
        $students_id = allData::select('unit_id', 'teacher_id')->where('student_id', $id)->get();
        foreach($students_id as $student_id){
            $unit[] = unit::find($student_id->unit_id);
            $teacher[] = techers::find($student_id->teacher_id);
        }
        $student['unit']=$unit;
        $student['teacher']=$teacher;
        return view('students.single', ["student"=>$student]);
    }

    public function edit(string $id){
        $student = students::find($id);
        $teachers = techers::all();
        $units = unit::all();
        $allData = allData::select('teacher_id', 'unit_id')->where('student_id', $id)->get();
        foreach($allData as $data){
            $teachers_id []= $data->teacher_id;
            $unit_id []= $data->unit_id;
        }
        $student['teachers'] = $teachers_id;
        $student['units']= $unit_id;
        foreach($units as $key => $unit){
            $teachers_units = teacher_units::select('teacher_id')->where('unit_id', $unit->id)->get();
            // معلم هایی که یک درس را ارائه می دهند
            // آیدی معلم هایی رو بده که به این درس مرتبط هستند
            if (count($teachers_units) > 0) {
                foreach($teachers_units as $teacher_unit){
                    $unit_teachers_id []= $teacher_unit->teacher_id;
                }
                $units[$key]['teacher_units']=$unit_teachers_id;
                $unit_teachers_id=[];
            }
        }
        return view('students.edit', ['student'=>$student, 'teachers'=>$teachers, 'units'=>$units]);
    }

    public function update(Request $request){
        $student = students::find($request->id);
        $student->name = $request->name;
        $student->family = $request->family;
        $student->age = $request->age;
        $allDatas = allData::where('student_id', $student->id)->delete();
        foreach($request->unit as $unit){
            allData::create([
                'student_id'=>$student->id,
                'teacher_id'=>$request[$unit],
                'unit_id'=>$unit
            ]);
        }
        $student->save();
        return redirect('students');
    }

    public function delete(string $id){
        $student = students::find($id);
        $allData = allData::where('student_id', $id)->delete();
        $student->delete();
        return redirect('students');
    }
}