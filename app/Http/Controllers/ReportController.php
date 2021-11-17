<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ReportController extends Controller
{
    public function index(Request $request){

      
        if(Session::get('haslogin') == 0 ){
            
            return redirect('login');
           
        }
        $sql = "SELECT
        od.order_id,
        od.username,
		sum(odtb.price * odtb.quatity)/2 AS total,
        od.pickup_date,
        od.status
    FROM
        order_detail_tb odtb
    INNER JOIN order_tb od ON odtb.order_id = od.order_id
    INNER JOIN product_detail_tb pdtb 
    WHERE od.status = 'จัดส่งเรียบร้อย'
    GROUP BY  od.order_id,
        od.username,
        od.pickup_date,
        od.status
    ORDER BY
        od.order_id";
     $dataset['DataReport'] = DB::select($sql);

     $sql2 ="SELECT
	sum(odtb.total_price) AS total_money2
FROM
	order_detail_tb odtb
WHERE
	odtb.status = 'จัดส่งเรียบร้อย'";
 $dataset['total_money2'] = DB::select($sql2);

        $group_code = $request->input('group_code');
        $sql3 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		WHERE map.group_code = '9300'";
        $dataset['mapfunc'] = DB::select($sql3);
       
        return view('report',['dataset'=>$dataset]);    

    }
    function getDetailModal (Request $request){
        \Log::info("[".__METHOD__."]"."start");
        $order_id = $request->input('order_id');
        $dataset['detailOrder']=array();
        //$sql2="x";
        if(!empty($order_id) || $order_id != ""){
            $sql2 = "SELECT
            odtb.order_id,pdtb.product_name, odtb.quatity, odtb.total_price
            FROM
            order_detail_tb odtb
            INNER JOIN order_tb od ON odtb.order_id = od.order_id
            JOIN product_detail_tb pdtb ON odtb.product_id = pdtb.product_id
            where odtb.order_id = '$order_id'";

            $sql2 = DB::select($sql2);
            
            \Log::info($sql2);
            return $sql2;
            //$dataset['detailOrder'] = DB::select($sql2);
        }
    }

    
    function getDetailReport (Request $request){
        \Log::info("[".__METHOD__."]"."start");
       
        $start_date = $request->input('startdate');
        $end_date = $request->input('enddate');
        $dataset['newdatepick']=array();
        $sql = "SELECT
        od.order_id,
        od.username,
        sum(odtb.price * odtb.quatity) AS total,
		sum(odtb.total_price) AS total_money ,
        od.pickup_date,
        od.status
    FROM
        order_tb od
    INNER JOIN order_detail_tb odtb ON odtb.order_id = od.order_id
    WHERE  
    od.status = 'จัดส่งเรียบร้อย' and (od.pickup_date >= '$start_date' AND od.pickup_date <= '$end_date')
    
    GROUP BY odtb.order_id,od.order_id ,od.username,od.pickup_date,od.status";
    
        \Log::info($sql);

            $sql = DB::select($sql);
            
            \Log::info($sql);
            return $sql;
            //$dataset['detailOrder'] = DB::select($sql2);
        
        
    }
  

}
