<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dqc841FormRequest;
use App\Models\Dqc84;
use App\Models\Dqc841;
use App\Service\Report;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Dqc841Controller extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return Dqc841::with('dqc84')->orderByDesc('id')->paginate(10);
    }

    public function store(Dqc841FormRequest $request): Dqc841
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

    public function update(Dqc841 $model, Dqc841FormRequest $request): Dqc841
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

    public function reportList(Request $request): LengthAwarePaginator
    {
        return (new Report($request->search))->reportList();
    }

    public function exportReport(Request $request): BinaryFileResponse
    {
        return (new Report($request->search))->reportExport();
    }
}
