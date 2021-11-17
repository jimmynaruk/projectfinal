<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class OrderAddressController extends Controller
{
    public function index(Request $request){

      
        if(Session::get('haslogin') == 0 ){
            
            return redirect('login');
           
        }

        $sql = "SELECT
        odtb.order_id,
        odtb.status,
        sum(oddtb.price * oddtb.quatity) AS total,
        odtb.pickup_date,
        userr.firstname,
        userr.lastname,
        userr.tel,
        userr.ShippingAdress
    FROM
        user_tb userr
    JOIN order_tb odtb ON odtb.username = userr.username
    INNER JOIN order_detail_tb oddtb ON odtb.order_id = oddtb.order_id
    WHERE odtb.status = 'ผลิตเสร็จสิ้น' and odtb.pickup='จัดส่งตามที่อยู่'
    GROUP BY odtb.order_id,odtb.status,odtb.pickup_date
    ,userr.firstname, userr.lastname,userr.tel, userr.ShippingAdress";
        \Log::info($sql);
        $dataset['DataOrderAddress'] = DB::select($sql);

        $group_code = $request->input('group_code');
        $sql3 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		WHERE map.group_code = '9300'";
        $dataset['mapfunc'] = DB::select($sql3);

         
        return view('OrderAddress', compact('dataset'));  
           
        
    }

    public function updateStatusSuccessDelivery (Request $request)
    {
       
        try{
            $data = $request->json()->all();
            $order_id = $request->input('order_id');
            $status = 'จัดส่งเรียบร้อย';
            $delivery_by = Session::get('getuser');
            \Log::info($order_id);
            $data = array(
                'status'  =>$status,
                'delivery_by' =>$delivery_by
            );
            
            DB::table('order_detail_tb')->where('order_id','=',$order_id)->update($data); 
                $data = array(
                'status'  =>$status,
                'delivery_by' =>$delivery_by
            );
            
            DB::table('order_tb')->where('order_id','=',$order_id)->update($data); 
        
            
            return \Response::json(['message' => 'อัปเดตสถานะรายการแล้ว'], 200);
        }catch (\Exception $e) {
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
        }
        
    }

    function getDetailModal (Request $request){

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
}
