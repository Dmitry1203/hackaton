<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportSellingExport implements FromView, WithTitle, WithColumnWidths, WithStyles, WithColumnFormatting
{

    public function title(): string
    {
        return 'Отчет о продажах';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 60,
        ];
    }

    // https://docs.laravel-excel.com/2.1/reference-guide/formatting.html

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['size' => 18]],
            /*
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],
            // Styling an entire column.
            'C'  => ['font' => ['size' => 16]],
            */
        ];
    }

    // https://docs.laravel-excel.com/2.1/reference-guide/formatting.html
    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function view(): View
    {

        $beginPeriod_DDMMYYYY = session('reportBegin');
        $endPeriod_DDMMYYYY = session('reportEnd');

        $beginPeriod = date("Y-m-d", strtotime($beginPeriod_DDMMYYYY));
        $endPeriod = date("Y-m-d", strtotime($endPeriod_DDMMYYYY));

        $report = DB::table('cash')
            ->join('clients', 'clients.client_id', '=', 'cash.client_id')
            ->select(
                 DB::raw('DATE_FORMAT(cash.operation_date, "%d.%m.%Y %H:%i") as operation_date'),
                'clients.name',
                'clients.surname',
                'clients.phone',
                'cash.staff',
                'cash.summa',
                'cash.comment'
            )
            ->where('cash.company_id', Auth::user()->company_id)
            ->where('cash.operation_detail', '>', 1)
            ->whereDate('cash.operation_date', '>=', $beginPeriod)
            ->whereDate('cash.operation_date', '<=', $endPeriod)
            ->orderBy('cash.operation_date', 'desc')
            ->get();

            $allSumma = 0;
            foreach ($report as $item) {
                $allSumma += $item->summa;
            }

        $data = [
            'report_begin' => $beginPeriod_DDMMYYYY,
            'report_end' => $endPeriod_DDMMYYYY,
            'all_summa' => $allSumma,
            'report' => $report,
        ];

        return view('export.report3', [
            'report' => $data
        ]);
    }
}
?>
