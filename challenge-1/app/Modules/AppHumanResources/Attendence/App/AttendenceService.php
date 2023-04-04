<?php

namespace App\Modules\AppHumanResources\Attendence\App;

use App\Imports\AttendenceImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AttendenceService extends Controller
{
    public function import($file){
        Excel::import(new AttendenceImport , $file );
        return true;
    }

    public function findAll(){
        
    }

    public function findById( int $id ){
        
    }
}
