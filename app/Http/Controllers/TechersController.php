<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\techers;
use App\Models\unit;
use App\Models\teacher_units;
use App\Models\allData;

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
            // 'unit'=>implode(',',$request->unit)
        ]);
        foreach($request->unit as $unit){
            teacher_units::create([
                'teacher_id'=>$teacher_id,
                'unit_id'=>$unit
            ]);
        }
        // techers::create($request->all());
        return redirect('teachers');
    }

    public function index(){
        $teachers = techers::all();
        // $units = [];
        // $unit_id;
        // $units;
        // foreach ($teachers as $teacher) {
        //     $unit = unit::find($teacher->unit);
        //     $units[$teacher->unit]=$unit->unitName;
        // }
        // foreach($teachers as $teacher){
        //     $unit_id[$teacher->id]=explode(',', $teacher->unit);
        // }
        // foreach(unit::all() as $unit){
        //     $units[$unit->id]=$unit;
        // }
        return view('teachers.teachers', ['teachers'=>$teachers]);
    }

    public function show_units(string $id){
        // $unit_id;
        // $units;
        // foreach($teacher as $x){
        //     $unit_id[$teacher->id]=explode(',', $teacher->unit);
        // }
        // foreach(unit::all() as $unit){
        //     $units[$unit->id]=$unit;
        // }
        // $teacher = techers::find($id);
        // $teachers_units = teacher_units::all();
        // foreach($teachers_units as $key => $teacher_unit){
        //     $teachers[] = unit::where('id', $teacher_unit->unit_id);
        //     foreach ($teachers as $teacher) {
        //         $data[] = techers::find($data->teacher_id);
        //     }
        //     $units[$key]['teachers']=$teacher;
        //     // $unit->teachers = $teacher;
        //     // $unit["teachers"] = $teacher;
        //     $teacher = [];
        // }
        $teacher = techers::find($id);
        // $teachers = techers::all();

        // foreach ($teachers as $key => $teacher) {
            $teacher_units = teacher_units::where('teacher_id', $teacher->id)->get();
            foreach($teacher_units as $unit){
                $units_teacher[]=unit::find($unit->unit_id);
            }
            $teacher['units']=$units_teacher;
            // $units_teacher=[];
        // }
        // foreach($teachers as $data){
        //     dd($data->name);

        // }
        return view('teachers.units', [ 'teacher'=>$teacher]);
    }

    public function show(string $id){
        $teacher = techers::find($id);
        // $unit = unit::find($teacher->unit);
        $teacher_units = teacher_units::where('teacher_id', $id)->get();
        foreach($teacher_units as $teacher_unit){
            $units[]= unit::find($teacher_unit->unit_id);
        }
        // dd($units);
        $teacher['units']=$units;
        return view('teachers.single', ["teacher"=>$teacher]);
    }

    public function edit(string $id){
        $teacher = techers::find($id);
        $allUnits = unit::all();
        // foreach ($teachers_units as $teacher_unit) {
        //     $units[]=unit::find($teacher_unit->unit_id);
        // }
        // dd($teacher->units->toArray());
        // $units=[];
        $teachers_units = teacher_units::select('unit_id')->where('teacher_id', $teacher->id)->get();
        // dd($teachers_units);
        foreach($teachers_units as $teachers_unit){
            $test[] = $teachers_unit->unit_id ;
        }
        // dd($teachers_units);
        $teacher['units']=$test;
        return view('teachers.edit', ['teacher'=>$teacher, 'allUnits'=>$allUnits]);
    }

    public function update(Request $request){
        
        // dd($request->all());
        // // dd($request->all());
        // // $teacher_units = teacher_units::all();
        // // foreach ($teacher_units as $key => $teachers) {
            //     $teachers_id = teacher_units::where('teacher_id', $teacher->id)->get();
        //     // dd($teachers_id);
        //     foreach($teachers_id as $teacher_id){
        //         $unit[] = unit::find($teacher_id->unit_id);
        //     }
        //     $teacher['unit']=$unit;
        //     $unit = [];
        //     // dd($teacher);
        // // }
        // foreach ($teacher->unit as $teacher_unit) {
            //     $teacher->name = $request->name;
            //     $teacher->family = $request->family;
            //     $teacher_unit->id = $request->unit;
            //     // dd($teacher_unit->id);
            // }
            // $teacher->save();
            // $teacher_unit->save();
            // dd($teacher->id);
        $teacher = techers::find($request->id);
        $teacher->name = $request->name;
        $teacher->family=$request->family;

        $teacher_units = teacher_units::where('teacher_id', $teacher->id)->get();
        foreach($teacher_units as $unit){
            $unit->delete();
        }
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
        $allData = allData::where('teacher_id', $id)->get();
        $teacher_units = teacher_units::where('teacher_id', $id)->get();
        // dd($teacher_units);
        foreach($allData as $data){
            $data->delete();
        }
        foreach($teacher_units as $teacher_unit){
            $teacher_unit->delete();
        }
        $teacher->delete();
        return redirect('teachers');
    }
}
