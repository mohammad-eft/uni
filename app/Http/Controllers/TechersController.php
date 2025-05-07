<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\techers;
use App\Models\unit;

class TechersController extends Controller
{
    public function create(){
        $units = unit::all();
        return view('teachers.create', ['units'=>$units]);
    }

    public function store(Request $request){
        techers::create([
            "name"=>$request->name,
            "family"=>$request->family,
            'unit'=>implode(',',$request->unit)
        ]);
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
        $unit_id;
        $units;
        $teacher = techers::find($id);
        foreach($teacher as $x){
            $unit_id[$teacher->id]=explode(',', $teacher->unit);
        }
        foreach(unit::all() as $unit){
            $units[$unit->id]=$unit;
        }
        return view('teachers.units', ['units'=>$units, 'unit_id'=>$unit_id, 'teacher'=>$teacher]);
    }

    public function show(string $id){
        $teacher = techers::find($id);
        $unit = unit::find($teacher->unit);
        return view('teachers.single', ["teacher"=>$teacher, 'unit'=>$unit]);
    }

    public function edit(string $id){
        $teacher = techers::find($id);
        $units = unit::all();
        return view('teachers.edit', ['teacher'=>$teacher, 'units'=>$units]);
    }

    public function update(Request $request){
        $teacher = techers::find($request->id);
        $teacher->name = $request->name;
        $teacher->family = $request->family;
        $teacher->unit = $request->unit;
        $teacher->save();
        var_dump($request->unit);
        return redirect('teachers');
    }

    public function delete(string $id){
        $teacher = techers::find($id);
        $teacher->delete();
        return redirect('teachers');
    }
}
