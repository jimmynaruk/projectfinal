<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class DeliverInshopController extends Controller
{
    public function index(Request $request){

      
        if(Session::get('haslogin') == 0 ){
            
            return redirect('login');
           
        }

        $sql = "SELECT
        odtb.order_id,
        odtb.status,
        odtb.pickup_date,
        userr.firstname,
        userr.lastname,
        userr.tel,
        userr.ShippingAdress
        FROM
            user_tb userr
        JOIN order_tb odtb ON odtb.username = userr.username
        WHERE odtb.status = 'ผลิตเสร็จสิ้น' and odtb.pickup= 'รับหน้าร้าน'
        ORDER BY odtb.order_id";
        // \Log::info($sql);
        $dataset['DataOrderAddress'] = DB::select($sql);


        
        

        // $group_code = $request->input('group_code');
        // $sql3 = "SELECT
        // fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        // FROM
        // function_tb fun
        // INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		// INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		// WHERE map.group_code = '9300'";
        // $dataset['mapfunc'] = DB::select($sql3);

        // return \Response::json(['dataModal' =>  $sql2], 200);

         return view('DeliverInshop', compact('dataset'));  
           
           
        
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



    // public function finddetailOrder(Request $request)
    // {   
        
    //     $order_id = $request->input('order_id1');
    //     \log::info($order_id);
    //     try{

    //     $sql = DB::select("SELECT
    //     pdtb.product_name, odtb.quatity, odtb.total_price
    //    FROM
    //    order_detail_tb odtb
    //    INNER JOIN order_tb od ON odtb.order_id = od.order_id
    //    JOIN product_detail_tb pdtb ON odtb.product_id = pdtb.product_id
    //    where odtb.order_id = $order_id")[0];

    //     return \Response::json(['sql' => $sql], 200);
        
    //     //$order_id = DB::table('order_tb')->where('uploadpic')->pluck('order_id');
      
    //     }catch  (\Exception $e) {

    //         \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
    //         return \Response::json(['message' => $e->getMessage()], 500);
    
    //     }
    // }

   
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
}
