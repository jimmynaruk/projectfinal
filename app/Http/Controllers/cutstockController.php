<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class cutstockController extends Controller
{
    

    public function index (Request $request)
    {  
       
      
        return view('managedessert');
    }

    public function findAmountperday(Request $request)
    {

        try{

            $br_id = $request->input('order_id');

            $sql = "SELECT
            order_id,
            pickup_date,
            amount
        FROM
            order_tb 
        WHERE order_id = '$order_id'";

        $result = DB::select($sql);

            return $result;
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }
}
