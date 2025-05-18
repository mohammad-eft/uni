<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\techers;
use App\Models\unit;
use App\Models\teacher_units;
use App\Models\allData;
use App\Models\students;

class TechersController extends Controller
{
    public function create(){
        $units = unit::all();
        return view('teachers.create', ['units'=>$units]);
    }

    public function store(Request $request){
        $teacher_id = techers::insertGetId([
            "name"=>$request->name,
            "family"=>$request->family,
        ]);
        foreach($request->unit as $unit){
            teacher_units::create([
                'teacher_id'=>$teacher_id,
                'unit_id'=>$unit
            ]);
        }
        return redirect('teachers');
    }

    public function index(){
        $teachers = techers::all();
        return view('teachers.teachers', ['teachers'=>$teachers]);
    }

    public function show_units(string $id){
        $teacher = techers::find($id);
            $teacher_units = teacher_units::where('teacher_id', $teacher->id)->get();
            foreach($teacher_units as $unit){
                $units_teacher[]=unit::find($unit->unit_id);
            }
            $teacher['units']=$units_teacher;
        return view('teachers.units', [ 'teacher'=>$teacher]);
    }

    public function show_students(string $id){
        $teacher = techers::find($id);
        $allData = allData::select('student_id')->where('teacher_id', $id)->get();
        foreach($allData as $data){
            $students_id[]= students::find($data->student_id);
        }
        $teacher['students']=$students_id;
        return view('teachers.students', ['teacher'=>$teacher]);
        
    }

    public function show(string $id){
        $teacher = techers::find($id);
        $teacher_units = teacher_units::where('teacher_id', $id)->get();
        foreach($teacher_units as $teacher_unit){
            $units[]= unit::find($teacher_unit->unit_id);
        }
        $teacher['units']=$units;
        return view('teachers.single', ["teacher"=>$teacher]);
    }

    public function edit(string $id){
        $teacher = techers::find($id);
        $allUnits = unit::all();
        $teachers_units = teacher_units::select('unit_id')->where('teacher_id', $id)->get();
        foreach($teachers_units as $teachers_unit){
            $units[] = $teachers_unit->unit_id ;
        }
        $teacher['units']=$units;
        return view('teachers.edit', ['teacher'=>$teacher, 'allUnits'=>$allUnits]);
    }

    public function update(Request $request){
        $teacher = techers::find($request->id);
        $teacher->name = $request->name;
        $teacher->family=$request->family;
        teacher_units::where('teacher_id', $teacher->id)->delete();
        foreach($request->unit as $unit){
            teacher_units::create([
                'teacher_id'=>$teacher->id,
                'unit_id'=>$unit
            ]);
        }
        $teacher->save();
        return redirect('teachers');
    }

    public function delete(string $id){
        $teacher = techers::find($id);
        $allData = allData::where('teacher_id', $id)->delete();
        $teacher_units = teacher_units::where('teacher_id', $id)->delete();
        $teacher->delete();
        return redirect('teachers');
    }
}
