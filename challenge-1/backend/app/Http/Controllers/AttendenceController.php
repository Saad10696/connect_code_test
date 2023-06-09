<?php

namespace App\Http\Controllers;

use App\Modules\AppHumanResources\Attendence\App\AttendenceService;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    protected $_service;

    public function __construct( AttendenceService $attend )
    {
        $this->_service = $attend;
    }

    public function import(Request $request){

        $extension = $request->file?->getClientOriginalExtension();
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            $this->_service->import( $request->file );
            return response()->json([
                'message' => 'Import Successfully'
            ]);
        }else{
            return response()->json([
                'message' => 'Invalid file format, csv, xlsx, xls format are acceptable'
            ]);
        }
    }

    public function index(Request $request){
        return response()->json([
            'data' => $this->_service->findAll( $request->only('employee_id') ),
            'message' => 'Request Completed Successfully'
        ]);
    }

    public function attendenceByEmpId($id){
        return response()->json([
            'data' => $this->_service->findOne( $id ),
            'message' => 'Request Completed Successfully'
        ]);
    }
}
