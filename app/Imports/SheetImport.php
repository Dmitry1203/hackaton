<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// для больших файлов
// use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\DB;

class SheetImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        $rowCounter = 0;
        foreach ($rows as $row)
        {
            $rowCounter++;
            // со второй строки
            if ($rowCounter > 2){

                if (Self::validateRow($row)) {

                    $data= [
                        'name' => $row[0],
                        'about' => $row[1],
                        'articul' => $row[4],
                        'price' => $row[5],
                        'url' => $row[3],
                        'warranty' => $row[6],
                        'brand' => $row[7],
                        'country' => $row[8],
                        'collection' => $row[9],
                        'cat_lvl_1' => $row[10],
                        'cat_lvl_2' => $row[11]
                    ];

                    if (!empty($row[2])){
                        // есть ли такой продукт
                        if (DB::table('products')->where('id', $row[2])->exists()) {
                            // обновить запись
                            DB::table('products')->where('id', $row[2])->update($data);
                        } else {
                            // добавить запись
                            DB::table('products')->insert($data);
                        }
                    } else {
                        // добавить запись
                        DB::table('products')->insert($data);
                    }
                }
            }
        }
    }

    // валидация строки
    public function validateRow($row)
    {
        // $row[2] может быть пустым
        // тогда добавляем
        if (empty($row[0])
            || empty($row[1])
            || empty($row[3])
            || empty($row[4])
            || empty($row[5])
            || empty($row[6])
            || empty($row[7])
            || empty($row[8])
            || empty($row[9])
            || empty($row[10])
        ) {
             return false;
        }
        return $row;
    }

}
