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
        return Attendence::where( $filters )->limit(500)->get();
    }
}
