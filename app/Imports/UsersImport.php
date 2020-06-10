<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param Collection $collection
    */
     public function model(array $row)
    {
        return new User([
           'phone'     => $row[0],
           'jine'    => $row[1], 
        ]);
    }
}
