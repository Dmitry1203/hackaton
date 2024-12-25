<?php

namespace App\Imports;

use App\Models\Product;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

//class ImportProduct implements ToModel
class ImportProduct implements ToCollection
{

    public function collection(Collection $rows)
    {

        $a = count($rows);
        foreach ($rows as $row)
        {

            if ( $row[0] == 'Ramon Benedito' ){
                Product::create([
                    'name' => $row[0],
                    'num' => $row[1],
                    'count' => 1,
                ]);
            }
        }
    }

/*
    public function model(array $row)
    {

        if (!isset($row[0])) {
            return null;
        }

        if ( $row[0] == 'Ramon Benedito' ){

            return new Product([
                'name' => $row[0],
                'num' => $row[1],
            ]);

        }

    }
    */

}
