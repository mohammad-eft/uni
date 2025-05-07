<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unit;

class UnitController extends Controller
{
    public function create(){
        return view('units.create');
    }

    public function store(Request $request){
        unit::create($request->all());
        return redirect('units');
    }

    public function index(){
        $units = unit::all();
        return view('units.units', ['units'=>$units]);
    }

    public function show(string $id){
        $unit = unit::find($id);
        return view('units.single', ["unit"=>$unit]);
    }

    public function edit(string $id){
        $unit = unit::find($id);
        return view('units.edit', ['unit'=>$unit]);
    }

    public function update(Request $request){
        $unit = unit::find($request->id);
        $unit->unitName = $request->unitName;
        $unit->unitCount = $request->unitCount;
        $unit->save();
        return redirect('units');
    }

    public function delete(string $id){
        $unit = unit::find($id);
        $unit->delete();
        return redirect('units');
    }
}
