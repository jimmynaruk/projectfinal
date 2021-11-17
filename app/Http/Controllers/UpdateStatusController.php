<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class UpdateStatusController extends Controller
{
    public function index (Request $request)
    {   
        
        $data = $request->json()->all();
        $sql = "SELECT
        otb.order_id,
        otb.username,
        sum(odtb.price * odtb.quatity) AS total,
        odtb.status,
        otb.pickup,
        otb.pickup_date
    FROM
        order_tb otb
    JOIN order_detail_tb odtb ON odtb.order_id = otb.order_id
    WHERE
        odtb.status = 'รอการตรวจสอบ'
    GROUP BY
        order_id,
        otb.pickup,
        otb.username,
        otb.pickup_date,
        odtb.status";
        $dataset['dataorder'] = DB::select($sql);

        return view('checkpayment',['dataset'=>$dataset],compact('property', 'files'));
      

    }
    
    public function acceptpayment (Request $request)
    {
       
        try{
        $order_id = $request->input('order_id');
        $status = 'กำลังดำเนินการผลิต';
          
            $data = array('status' => $status
            );
            $result = DB::table('order_tb')->where('order_id','=',$order_id)->update($data);
            $data = array('status' => $status
        );
            $result = DB::table('order_detail_tb')->where('order_id','=',$order_id)->update($data);
        
            
        return \Response::json(['message' => 'อนุมัติรายการนี้แล้วเข้าสู่การรอผลิต'], 200);
        } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);
    }
    }

    public function rejectOrder (Request $request)
    {
       
        try{
        $order_id = $request->input('order_id');
        $status = 'รายการถูกยกเลิก';
        $Description = $request->input('comment');
      
            $data = array('status' => $status,
                'Description' => $Description
            );
            $result = DB::table('order_tb')->where('order_id','=',$order_id)->update($data);
            
            $data = array('status' => $status
        );
            $result = DB::table('order_detail_tb')->where('order_id','=',$order_id)->update($data);
            
            
        return \Response::json(['message' => 'ยกเลิกรายการแล้ว'], 200);
        } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);
    }
    }
    
    public function findpic(Request $request)
    {
        $order_id = $request->input('order_id');
        log::info($request);
        try{

        $sql = DB::select("SELECT order_id,uploadpic
                           FROM order_tb
                           WHERE order_id = $order_id")[0];

        return \Response::json(['sql' => $sql], 200);
        
        //$order_id = DB::table('order_tb')->where('uploadpic')->pluck('order_id');
      
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }

      
}


