<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class SecondSheetImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        $rowCounter = 0;
        foreach ($rows as $row)
        {
            $rowCounter++;

            //if ( $row[0] == 'Toni Clariana' ){

            if ($rowCounter > 2){
                Product::create([
                    'name' => $row[0],
                    'num' => 20,
                    'count' => 1,
                ]);

            }
            //}

        }
    }

}
