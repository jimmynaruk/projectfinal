<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class followStatusOrderController extends Controller
{
    public function index(Request $request)
    {   
        if(Session::get('haslogin') == 0 ){
            
            return view('login');
           
        }
        $userId = Session::get('getuser');
       
        $sql = "SELECT
        otb.order_id,
        sum(odtb.price * odtb.quatity) AS total,
        otb.username,
        otb.pickup_date,
        otb.pickup,
        otb.status,
        otb.Description 
    FROM
        order_tb otb
    JOIN order_detail_tb odtb ON odtb.order_id = otb.order_id
    where  odtb.username= \"$userId\"
    GROUP BY
        order_id,
        otb.pickup_date,otb.username
        ,otb.pickup,otb.status,otb.Description ";
        \Log::info($sql);
        $dataset['orderdetailuser'] = DB::select($sql);

      
        $group_code = $request->input('group_code');
        $sql2 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		WHERE map.group_code = '2'";
        $dataset['mapfunc'] = DB::select($sql2);

      
        
        
        return view('followStatusOrder',['dataset'=>$dataset]);
    }
    
   

   
    
}
