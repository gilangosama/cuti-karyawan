<?php

namespace App\Exports;

use App\Models\Cuti;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Str;

class SuratCutiExport 
{
    protected $cuti;

    public function __construct(Cuti $cuti)
    {
        $this->cuti = $cuti;
    }

    public function export()
    {
        try {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set Default Font
            $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
            $spreadsheet->getDefaultStyle()->getFont()->setSize(11);

            // Logo dan Header Section
            $sheet->mergeCells('A1:H1');
            $sheet->setCellValue('A1', 'PT. Kaltim Methanol Industri');
            $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
            $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1')->getFont()->getColor()->setRGB('0000FF'); // Warna biru

            $sheet->mergeCells('A2:H2');
            $sheet->setCellValue('A2', 'LEAVE FORM');
            $sheet->getStyle('A2')->getFont()->setSize(14)->setBold(true);
            $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Document Info (dalam box)
            $sheet->setCellValue('A3', 'No. Document : SMT.FM.PSL-01-02');
            $sheet->setCellValue('D3', 'TGL. 01 Agustus 2011');
            $sheet->setCellValue('F3', 'Rev. : 01');
            $sheet->setCellValue('H3', 'Hal. : 1 dari 1');

            // Baris kosong
            $sheet->mergeCells('A4:H4');

            // Registration Number
            $sheet->setCellValue('A5', 'Registration Number :');
            $sheet->setCellValue('D5', '/Personnel-KMI/X/2024');

            // Baris kosong
            $sheet->mergeCells('A6:H6');

            // Employee Information (2 kolom)
            $sheet->setCellValue('A7', 'Name');
            $sheet->setCellValue('B7', ': ' . ($this->cuti->user->name ?? '-'));
            $sheet->setCellValue('E7', 'Leave Period');
            $sheet->setCellValue('F7', ': 2024 / 2025');

            $sheet->setCellValue('A8', 'Badge No.');
            $sheet->setCellValue('B8', ': ' . ($this->cuti->user->badge_number ?? '-'));
            $sheet->setCellValue('E8', 'Joint Date');
            $sheet->setCellValue('F8', ': ' . ($this->cuti->user->profil->join_date ?? '-'));

            $sheet->setCellValue('A9', 'Position');
            $sheet->setCellValue('B9', ': ' . ($this->cuti->user->profil->position ?? '-'));
            $sheet->setCellValue('E9', 'Shift / Non Shift');
            $sheet->setCellValue('F9', ': NS');

            $sheet->setCellValue('A10', 'Section');
            $sheet->setCellValue('B10', ': ' . ($this->cuti->user->profil->department ?? '-'));
            $sheet->setCellValue('E10', 'Total Leave day(s)');
            $sheet->setCellValue('F10', ': ' . ($this->cuti->total_days ?? '0') . ' Work / Calendar Days');

            // Baris kosong
            $sheet->mergeCells('A11:H11');

            // Leave Details
            $sheet->mergeCells('A12:H12');
            $sheet->setCellValue('A12', 'I. Hereby I submit my leave form (Annual/ Grand Leave)');
            $sheet->getStyle('A12')->getFont()->setBold(true);

            $sheet->setCellValue('A13', 'On the date');
            $sheet->setCellValue('C13', ': ' . optional($this->cuti->start_date)->format('F j, Y'));
            $sheet->setCellValue('E13', 'until');
            $sheet->setCellValue('F13', optional($this->cuti->end_date)->format('F j, Y'));

            $sheet->setCellValue('A14', 'Holiday');
            $sheet->setCellValue('C14', ': ' . optional($this->cuti->start_date)->format('d') . '-' . optional($this->cuti->end_date)->format('d F Y'));

            // Baris kosong
            $sheet->mergeCells('A15:H15');

            // Back on duty & Address
            $sheet->setCellValue('A16', 'Back on duty');
            $sheet->setCellValue('C16', ': ' . optional($this->cuti->end_date)->addDay()->format('F j, Y'));
            $sheet->setCellValue('A17', 'Address on leave');
            $sheet->setCellValue('C17', ': ' . ($this->cuti->address ?? '-'));

            // Baris kosong untuk tanda tangan
            $sheet->mergeCells('A18:H18');
            $sheet->mergeCells('A19:H19');

            // Tanda tangan
            $sheet->setCellValue('A20', 'Bontang, ' . now()->format('F j, Y'));
            
            $sheet->setCellValue('A21', 'Propose by');
            $sheet->setCellValue('D21', 'Approval I');
            $sheet->setCellValue('G21', 'Approval II');

            // Spasi untuk tanda tangan
            $sheet->getRowDimension('22')->setRowHeight(50);
            $sheet->getRowDimension('23')->setRowHeight(50);

            // Nama dan jabatan sesuai dengan yang dipilih user
            $sheet->setCellValue('A24', $this->cuti->user->name ?? '-');
            $sheet->setCellValue('D24', $this->cuti->approval1->name ?? '-');
            $sheet->setCellValue('G24', $this->cuti->approval2->name ?? '-');

            $sheet->setCellValue('A25', $this->cuti->user->profil->position ?? '-');
            $sheet->setCellValue('D25', $this->cuti->approval1->profil->position ?? '-');
            $sheet->setCellValue('G25', $this->cuti->approval2->profil->position ?? '-');

            // Personnel Remarks
            $sheet->mergeCells('A27:H27');
            $sheet->setCellValue('A27', 'Personnel Remarks :');
            $sheet->getStyle('A27')->getFont()->setBold(true);
            
            $sheet->setCellValue('A28', '1. Remaining Leave day(s) period __________ = __________ Work days/ Calendar Days');
            $sheet->setCellValue('A29', '2. Remaining Leave day(s) __________ work day/ calendar day should be finished before __________');
            $sheet->setCellValue('A30', '3. After leave should be report to Superior and Personnel');
            $sheet->setCellValue('A31', '4. If any delay kindly report to Personnel');

            // Personnel Section (menggunakan data HRD yang dipilih)
            $sheet->mergeCells('A33:H33');
            $sheet->setCellValue('A33', 'Personnel Section,');
            
            $sheet->getRowDimension('34')->setRowHeight(50);
            
            // Menggunakan data HRD yang dipilih user
            $sheet->setCellValue('A35', $this->cuti->hrd->name ?? '-');
            $sheet->setCellValue('A36', $this->cuti->hrd->profil->position ?? 'Personnel SM');

            // Section Remarks
            $sheet->mergeCells('A38:H38');
            $sheet->setCellValue('A38', 'Section Remarks :');
            $sheet->getStyle('A38')->getFont()->setBold(true);

            $sheet->setCellValue('A39', 'Back on duty');
            $sheet->setCellValue('A41', 'Acknowledge by,');
            $sheet->getRowDimension('42')->setRowHeight(50);
            $sheet->setCellValue('A43', 'Position');
            $sheet->setCellValue('A44', '(Fulfill by Superior after leave)');

            // Distribution
            $sheet->mergeCells('A46:H46');
            $sheet->setCellValue('A46', 'Distribution : The employee, Personnel, Superior');

            // Set column widths
            $sheet->getColumnDimension('A')->setWidth(20);
            $sheet->getColumnDimension('B')->setWidth(5);
            $sheet->getColumnDimension('C')->setWidth(25);
            $sheet->getColumnDimension('D')->setWidth(20);
            $sheet->getColumnDimension('E')->setWidth(15);
            $sheet->getColumnDimension('F')->setWidth(25);
            $sheet->getColumnDimension('G')->setWidth(20);
            $sheet->getColumnDimension('H')->setWidth(15);

            // Add borders
            $sheet->getStyle('A1:H46')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // Create file
            $writer = new Xlsx($spreadsheet);
            $filename = 'surat-cuti-' . Str::slug($this->cuti->user->name ?? 'unknown') . '-' . now()->format('dmY') . '.xlsx';
            
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output');
            exit;

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat export: ' . $e->getMessage());
        }
    }
} 