<?php


namespace App\Service;


use App\Models\Dqc841;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Report
{
    private $query;

    public function __construct($search)
    {
        $this->query = Dqc841::query();

        if ($search) {
            $this->query->whereJoin('dqc84.dqcModel.model', '=', $search)
                ->orWhereJoin('dqc84.fat_part_no', '=', $search)
                ->orWhereJoin('description', 'LIKE', '%'.$search.'%')
                ->orWhere('parts_no', '=', $search);
        }

        $this->query->with('dqc84.dqcModel')->orderByDesc('id');
    }

    public function reportList(): LengthAwarePaginator
    {
        return $this->query->paginate(10);
    }

    public function reportExport(): BinaryFileResponse
    {
        return Excel::download(new ReportExport($this->query->get()), 'report-export.xlsx');
    }
}
