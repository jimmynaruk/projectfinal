<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class editOrderUserController extends Controller
{
    

    public function index (Request $request)
    {  

      
        return view('editOrderUser');
      
    }

    public function finddetaieditOrder(Request $request)
    {

        try{

            $br_id = $request->input('order_id');
            $sql = "SELECT * FROM
            booking_tb 
        WHERE br_id = '$br_id'";

        $result = DB::select($sql);

            return $result;
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }
}
