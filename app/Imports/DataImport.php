<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'id'=>$row['0'],
            'nama' => $row['1'],
            'tugas1'=>$row['2'],
            'uts'=>$row['3'],
            'tugas2'=>$row['4'],
            'kuis'=>$row['5'],
            'uas'=>$row['6'],
        ]);
    }
}
