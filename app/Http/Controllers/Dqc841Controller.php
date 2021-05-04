<?php

namespace App\Http\Controllers;

use App\Models\Dqc84;
use App\Models\Dqc841;
use Illuminate\Http\Request;

class Dqc841Controller extends Controller
{
    public function index()
    {
        return Dqc841::with('dqc84')->get();
    }

    public function store(Request $request): Dqc841
    {
        $obj = new Dqc841();
        $obj->fat_part_no = $request->fat_part_no;
        $obj->parts_no = $request->parts_no;
        $obj->unt_usg = $request->unt_usg;
        $obj->description = $request->description;
        $obj->ref_designator = $request->ref_designator;
        $obj->save();

        return $obj;
    }

    public function edit(Dqc841 $model): Dqc841
    {
        return $model;
    }

    public function update(Dqc841 $model, Request $request): Dqc841
    {
        $model->fat_part_no = $request->fat_part_no;
        $model->parts_no = $request->parts_no;
        $model->unt_usg = $request->unt_usg;
        $model->description = $request->description;
        $model->ref_designator = $request->ref_designator;
        $model->save();

        return $model;
    }

    public function destroy(Dqc841 $model)
    {
        $model->delete();
    }

    public function getDqc84()
    {
        return Dqc84::all();
    }

    public function reportList(Request $request)
    {
        dd($request->all());
    }
}
