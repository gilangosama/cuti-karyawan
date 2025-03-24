<?php

namespace App\Exports;

use App\Models\Cuti;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CutiExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $status;

    public function __construct($startDate = null, $endDate = null, $status = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
    }

    public function collection()
    {
        $query = Cuti::with(['user', 'approval1', 'approval2', 'hrd']);

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal Pengajuan',
            'Nama Karyawan',
            'Jenis Cuti',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Total Hari',
            'Alamat Cuti',
            'Status',
            'Approval 1',
            'Status Approval 1',
            'Approval 2',
            'Status Approval 2',
            'HRD',
            'Status HRD'
        ];
    }

    public function map($cuti): array
    {
        return [
            $cuti->id,
            $cuti->created_at->format('d/m/Y'),
            $cuti->user->name,
            $cuti->jenis_cuti,
            $cuti->start_date->format('d/m/Y'),
            $cuti->end_date->format('d/m/Y'),
            $cuti->total_days,
            $cuti->address,
            $cuti->status,
            $cuti->approval1->name ?? '-',
            $cuti->approval1_status ?? '-',
            $cuti->approval2->name ?? '-',
            $cuti->approval2_status ?? '-',
            $cuti->hrd->name ?? '-',
            $cuti->hrd_status ?? '-'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            'A1:O1' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '7C3AED']
                ],
                'font' => ['color' => ['rgb' => 'FFFFFF']]
            ]
        ];
    }
} 