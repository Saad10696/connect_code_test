<?php

namespace App\Modules\AppHumanResources\Attendence\App;

use App\Imports\AttendenceImport;
use App\Http\Controllers\Controller;
use App\Models\Attendence;
use Maatwebsite\Excel\Facades\Excel;

class AttendenceService extends Controller
{
    public function import($file){
        Excel::import(new AttendenceImport , $file );
        return true;
    }

    public function findAll($filters = []){
        return Attendence::where( $filters )
        ->join('employees as e', 'e.id', '=', 'employee_id')
        ->select(['attendences.*', 'e.name as emp_name', \DB::raw("TIMESTAMPDIFF(HOUR, checkin_at, checkout_at) as worked_hrs") ])
        ->limit(500)
        ->get();
    }

    public function findOne( int $id ){
        $attendance = Attendence::where('employee_id', $id)
        ->join('employees as e', 'e.id', '=', 'employee_id')
        ->select(['attendences.*', 'e.name as emp_name', \DB::raw("TIMESTAMPDIFF(HOUR, checkin_at, checkout_at) as worked_hrs") ])
        ->limit(30)
        ->get();

        return [
            'work_hrs' => $attendance->sum('worked_hrs'),
            'attendance' => $attendance,
        ];
    }
}
