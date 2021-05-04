<?php

namespace App\Http\Controllers;

use App\Models\Dqc84;
use App\Models\DqcModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Dqc84Controller extends Controller
{
    public function index()
    {
        return Dqc84::with('dqcModel')->get();
    }

    public function store(Request $request): Dqc84
    {
        $obj = new Dqc84();
        $obj->fat_part_no = $request->fat_part_no;
        $obj->model = $request->model;
        $obj->total_location = $request->total_location;
        $obj->save();

        return $obj;
    }

    public function edit(Dqc84 $model): Dqc84
    {
        return $model;
    }

    public function update(Dqc84 $model, Request $request): Dqc84
    {
        $model->fat_part_no = $request->fat_part_no;
        $model->model = $request->model;
        $model->total_location = $request->total_location;
        $model->save();

        return $model;
    }

    public function destroy(Dqc84 $model)
    {
        $model->delete();
    }

    public function getModels()
    {
        return DqcModel::all();
    }
}
