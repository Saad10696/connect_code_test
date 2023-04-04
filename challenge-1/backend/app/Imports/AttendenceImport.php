<?php

namespace App\Imports;

use App\Models\Attendence;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AttendenceImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Attendence([
            'employee_id' => $row[1],
            'date' => $row[2],
            'checkin' => $row[3],
            'checkout' => $row[4],
        ]);
    }
}