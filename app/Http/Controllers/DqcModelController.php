<?php

namespace App\Http\Controllers;

use App\Http\Requests\DqcModelFormRequest;
use App\Models\DqcModel;
use Illuminate\Http\Request;

class DqcModelController extends Controller
{
    public function index()
    {
        return DqcModel::query()->orderByDesc('id')->get();
    }

    public function store(DqcModelFormRequest $request): DqcModel
    {
        $obj = new DqcModel();
        $obj->model = $request->model;
        $obj->save();

        return $obj;
    }

    public function edit(DqcModel $model): DqcModel
    {
        return $model;
    }

    public function update(DqcModel $model, DqcModelFormRequest $request): DqcModel
    {
        $model->model = $request->model;
        $model->save();

        return $model;
    }

    public function destroy(DqcModel $model)
    {
        $model->delete();
    }
}
