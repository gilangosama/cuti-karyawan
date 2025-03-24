<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSuratCutiExport implements WithMultipleSheets
{
    protected $cutis;

    public function __construct($cutis)
    {
        $this->cutis = $cutis;
    }

    public function sheets(): array
    {
        $sheets = [];
        
        foreach ($this->cutis as $cuti) {
            $sheets[] = new SuratCutiExport($cuti);
        }

        return $sheets;
    }
} 