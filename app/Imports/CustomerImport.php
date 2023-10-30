<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'meetingroom' => $row[1],
            'customer' => $row[2],
            'request' => $row[3],
            'date' => $row[4],
            'time' => $row[5]
        ]);
    }
}
