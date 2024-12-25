<?php

// https://docs.laravel-excel.com/2.1/reference-guide/formatting.html

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
//use Illuminate\Support\Facades\Auth;

class ExportSheet implements FromView, WithTitle, WithColumnWidths, WithStyles, WithColumnFormatting
{

    private $sheetName;
    //private $exportIndex;
    private $arrCols;
    private $arrStyles;
    private $arrFormats;

    public function __construct( $sheetName )
    {
        $this->sheetName = $sheetName;
        //$this->exportIndex = $exportIndex;
        $this->arrCols = [
                'A' => 40,
                'B' => 30,
                'C' => 10,
                'D' => 25,
                'E' => 18,
                'F' => 15,
                'G' => 20,
                'H' => 20,
                'I' => 24,
                'K' => 24,
                'L' => 24,
                'M' => 24,
        ];

        //'A4'   => ['font' => ['size' => 16]],
        $this->arrStyles = [
        ];

        $this->arrFormats = [
                'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }

    public function columnWidths(): array
    {
        if ($this->sheetName != 'Справочники'){
            return $this->arrCols;
        }
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        if ($this->sheetName != 'Справочники'){
            return $this->arrStyles;
        }
        return [];
    }

    public function columnFormats(): array
    {
        if ($this->sheetName != 'Справочники'){
            return $this->arrFormats;
        }
        return [];
    }

    public function view(): View
    {
        if ($this->sheetName == 'Справочники'){
            return view('export.data', []);
        } else {
            return view('export.products', [
                'data' => self::getData()
            ]);
        }
    }

    public function getData()
    {
        $data  = DB::table('products')
            ->where('cat_lvl_1', $this->sheetName)
            ->orderBy('cat_lvl_1')
            ->orderBy('cat_lvl_2')
            ->orderBy('collection')
            ->get();
        return $data;
    }

}

?>
