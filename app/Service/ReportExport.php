<?php

namespace App\Service;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportExport implements FromCollection, WithHeadings, WithMapping,ShouldAutoSize, WithEvents
{
    private $query;
    private $rowCount;

    public function __construct($query)
    {
        $this->query = $query;
        $this->rowCount = $this->query->count() + 1;
    }

    public function headings(): array
    {
        return [
            'MODEL',
            'FAT_PART_NO',
            'TOTAL_LOCATION',
            'PARTS_NO',
            'UNT_USG',
            'DESCRIPTION',
            'REF_DESIGNATOR'
        ];
    }

    public function collection(): \Illuminate\Support\Collection
    {
        return collect($this->query);
    }

    public function map($row): array
    {
        return [
            $row->dqc84->dqcModel->model,
            $row->dqc84->fat_part_no,
            $row->dqc84->total_location,
            $row->parts_no,
            $row->unt_usg,
            $row->description,
            $row->ref_designator,
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event)
            {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle('A1:W1')->getFont()->setBold(true);

                //Description
                $event->sheet->getDelegate()->getStyle('F1:F'.$this->rowCount)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(false);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(50);

                // Ref_Designator
                $event->sheet->getDelegate()->getStyle('G1:G'.$this->rowCount)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getColumnDimension('G')->setAutoSize(false);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(70);
            },
        ];
    }
}

