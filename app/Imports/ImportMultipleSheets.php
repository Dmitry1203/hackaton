<?php
namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Facades\DB;

class ImportMultipleSheets implements WithMultipleSheets
{
    public function sheets(): array
    {

        // импортируем вкладки по количеству категорий
        // первая Справочники

        $categoriesCount  = DB::table('categories')
            ->where('brand_id', session('brandId'))
            ->count();

        $data = [];
        for ($i = 1; $i <= $categoriesCount; $i++) {
            $data += [ $i => new SheetImport()];
        }
        return $data;
    }
}
