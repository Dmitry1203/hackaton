<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

// создание отдельных вкладок
use App\Exports\ExportSheet;
use Illuminate\Support\Facades\DB;

class MultipleSheets implements WithMultipleSheets
{
    public function sheets(): array
    {
        // экспортируем вкладки по количеству категорий
        // первая Справочники

        $sheets[] = new ExportSheet('Справочники');
        $categories  = DB::table('categories')
            ->select(
                'brand_id',
                'name',
            )
            ->where('brand_id', session('brandId'))
            ->orderBy('priority')
            ->get();

        foreach ($categories as $category) {
            $sheets[] = new ExportSheet($category->name);
        }
        return $sheets;
    }
}
?>
