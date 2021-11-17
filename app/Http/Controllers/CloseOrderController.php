<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class CloseOrderController extends Controller
{
    public function index(Request $request)
    {   
        if(Session::get('haslogin') == 0 ){
            
            return view('login');
           
        }
        $user = Session::get('getuser');
       
        $sql = "SELECT * FROM order_tb
        where  status = 'กำลังดำเนินการผลิต' ";
        \Log::info($sql);
        $dataset['userorder'] = DB::select($sql);


        $group_code = $request->input('group_code');
        $sql2 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		WHERE map.group_code = '2'";
        $dataset['mapfunc'] = DB::select($sql2);

        return view('closeorder',['dataset'=>$dataset]);
    }
     
    public function updateStatusSuccessOrder (Request $request)
    {
       
        try{
            $data = $request->json()->all();
            $order_id = $request->input('order_id');
            $status = 'ผลิตเสร็จสิ้น';

            \Log::info($order_id);
            $data = array(
                'status'  =>$status
            );
            
            DB::table('order_detail_tb')->where('order_id','=',$order_id)->update($data); 

                $data = array(
                'status'  =>$status
            );
            
            DB::table('order_tb')->where('order_id','=',$order_id)->update($data); 
        

            $data = array('status' => $status
        );
      
            
            return \Response::json(['message' => 'อัปเดตสถานะรายการแล้ว'], 200);
        }catch (\Exception $e) {
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
        }
        
    }
    
    
    
}
