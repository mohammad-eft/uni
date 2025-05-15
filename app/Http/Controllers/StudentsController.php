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
       
        // foreach($units as $unit){
        //     $unitTeachersIds = teacher_units::where('unit_id', $unit->id);
        //     foreach($unitTeachersIds as $unitTeachersId){
        //         dd( $unitTeachersId );
        //         $teacher[]=techers::find($unitTeachersId);
        //     }
        //     $units_teachers['teachers']=$teacher;
        //     $teacher=[];
        // }

        // foreach($units as $unit){
        //     $unitTeachersIds = teacher_units::where('unit_id', $unit->id);
        //     // dd($unitTeachersIds);
        //     foreach($unitTeachersIds as $teacher_unit){
        //         dd($teacher_unit);
        //         if ($teacher_unit->unit_id == $unit->id) {
        //             $teacher[]=techers::find($teacher_unit->id);
        //             dd( $teacher );
        //         }
        //     }
        //     $units_teachers['teachers']=$teacher;
        //     $teacher=[];
        // }
        // $teachers = techers::all();
        // $teacher_units = teacher_units::all();  
        
        $units = unit::all();

        foreach($units as $key => $unit){
            $teachersUnits = teacher_units::where("unit_id", $unit->id)->get();
            foreach ($teachersUnits as $data) {
                $teacher[] = techers::find($data->teacher_id);
            }
            $units[$key]['teachers']=$teacher;
            // $unit->teachers = $teacher;
            // $unit["teachers"] = $teacher;
            $teacher = [];
        }
        // dd($units->toArray());
        return view('students.create', ['units'=>$units]);
    }

    public function store(Request $request){
        $student_id = students::insertGetId(
            [
                'name'=>$request->name,
                'family'=>$request->family,
                'age'=>$request->age,
                // 'teacher'=>$this->teachers($request),
                // 'unit'=>implode(',',$request->unit)
            ]);
            foreach ($request->unit as $units) {
                allData::create([
                    'student_id'=>$student_id,
                    'teacher_id'=>$request[$units],
                    'unit_id'=>$units
                ]);
                // dd($request[$units]);
            }
        return redirect('students');
    }

    // public function teachers(Request $request){
    //     // $units;
    //     $teachers;
    //     // foreach(students::all() as $student){
    //     //     $units [$student->id]= $student->unit;
    //     // }
    //     // foreach (techers::all() as $teacher) {
    //     //     foreach(explode(',' ,$teacher->unit) as $unit){
    //     //         $teachers[$teacher->id]= $unit;
    //     //     }
    //     // }
    //     foreach($request->unit as $unit){
    //         foreach(techers::all() as $teacher){
    //             foreach (explode(',',$teacher->unit) as $teacher_unit) {
    //                 if ($teacher_unit == $unit) {
    //                     $teachers[$unit]=$teacher->id;
    //                 }
    //             }
    //         }
    //     }
    //     return implode(',',$teachers);
    // }

    public function index(){
        $students = students::all();
        // $teachers = [];
        // $units_id;
        // $units;
        // foreach ($students as $student) {
        //     $teacher = techers::find($student->teacher);
        //     $teachers [$student->teacher]= $teacher->name ." ". $teacher->family;
        // }
        // foreach (techers::all() as $teacher) {
        //     $units=unit::find($teacher->unit);
        //     $unit [$teacher->unit]= $units->unitName;
        // }
        // foreach($units_id as $units){
        //     foreach($units as $unit)
        //         $units[$unit] = unit::find($unit);
        // }

        foreach ($students as $student){
            // $user = students::find($student->id);
            // dd($user);
            // $units=explode(',',$student->unit);
            $units_id[$student->id]=explode(',',$student->unit);
        }
        foreach (unit::all() as $unit) {
            $units[$unit->id]=$unit;
        }
        return view('students.students', ['students'=>$students, 'units_id'=>$units_id, 'units'=>$units]);
    }

    public function show(string $id){
        // $student = students::find($id);
        // $teacher = techers::find($student->teacher);
        // $str;
        // $teachers;
        // foreach (explode(',' ,$student->teacher) as $teacher) {
        //     $str[]=$teacher;
        // }
        // foreach($students as $field){
        //     $teachers[$teacher->id]=$str;
        // }
        // $units_id = explode(',', $student->unit);
        // $units;
        // foreach(unit::all() as $unit){
        //     $units[$unit->id] = $unit;
        // }
        $student = students::find($id);
        $students_id = allData::where('student_id', $student->id)->get();
        foreach($students_id as $student_id){
            $unit[] = unit::find($student_id->unit_id);
            $teacher[] = techers::find($student_id->teacher_id);
        }
        $student['unit']=$unit;
        $student['teacher']=$teacher;

        // dd($student);
        return view('students.single', ["student"=>$student,
        //  'teacher'=>$teacher,'units_id'=>$units_id , 'units'=>$units
        ]);
    }

    public function edit(string $id){
        $student = students::find($id);
        $teachers = techers::all();
        $units = unit::all();
        $allData_teacher = allData::select('teacher_id', 'unit_id')->where('student_id', $id)->get();
        foreach($allData_teacher as $data){
            $teachers_id []= $data->teacher_id;
            $unit_id []= $data->unit_id;
        }
        $student['teachers'] = $teachers_id;
        $student['units']= $unit_id;

        foreach($units as $key => $unit){
            $teachers_units = teacher_units::select('teacher_id')->where('unit_id', $unit->id)->get();
            // dd($teachers_units);
            if (count($teachers_units) > 0) {
                foreach($teachers_units as $teacher_unit){
                    $teacher_units_id []= $teacher_unit->teacher_id;
                }
                $units[$key]['teacher_units']=$teacher_units_id;
                $teacher_units_id=[];
                // dd($teacher_units_id);
            }
        }
        // dd($units->toArray());
        
        
        
        
        // $allData_unit = allData::select('unit_id')->where('student_id', $id)->get();
        // foreach($allData_unit as  $data){
        //     $unit_id []= $data->unit_id;
        // }
        // dd($student->units);
        // $units = unit::all();
        // $units_id = explode(',', $student->unit);
        return view('students.edit', ['student'=>$student, 'teachers'=>$teachers, 'units'=>$units]);
    }

    public function update(Request $request){
        $student = students::find($request->id);
        $student->name = $request->name;
        $student->family = $request->family;
        $student->age = $request->age;

        $allDatas = allData::where('student_id', $student->id)->get();
        foreach($allDatas as $allData){
            $allData->delete();
        }

        foreach($request->unit as $unit){
            allData::create([
                'student_id'=>$student->id,
                'teacher_id'=>$request[$unit],
                'unit_id'=>$unit
            ]);
        }

        // $student->teacher = $request->teacher;
        // $student->unit = $request->unit;
        $student->save();
        return redirect('students');
    }

    public function delete(string $id){
        $student = students::find($id);
        $allData = allData::where('student_id', $id)->get();
        foreach($allData as $data){
            $data->delete();
        }
        $student->delete();
        return redirect('students');
    }
}
