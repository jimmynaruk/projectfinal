<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class checkAmountperdayController extends Controller
{
    

    public function index (Request $request)
    {  
        $data = $request->json()->all();
        $sql = "SELECT
        ordtb.product_id,
        pdtb.product_name,
        ordtb.pickup_date,
        SUM(quatity) AS total_amount
    FROM
        order_detail_tb ordtb
    INNER JOIN product_detail_tb pdtb ON pdtb.product_id = ordtb.product_id
    WHERE
        pickup_date = CURDATE() AND ordtb.status = 'กำลังดำเนินการผลิต'
    GROUP BY
    ordtb.product_id,pdtb.product_name,ordtb.pickup_date";

        $dataset['amountdesday'] = DB::select($sql);
    
        return view('checkamountperday',['dataset'=>$dataset]);
      
    }

   

    public function uptotal(Request $request){
        \Log::info("[".__METHOD__."]"."start");
        try{

            $data = $request->json()->all();
       
            $product_id = $request->input('proid');
            $amount = $request->input('caltxt');
            \Log::info($product_id);
            \Log::info($amount);
            // $date  = \Carbon\Carbon::now()->timezone('Asia/Bangkok');

            for($x = 0 ; $x < count($product_id); $x++ ){
                
                $data = array('product_id' => $product_id[$x],
                    'amount' => $amount[$x]
                );
        
            
        DB::table("formula_detail_tb")->where('product_id','=',$product_id[$x])->update($data); 
    }
        return \Response::json(['message' => 'Update Complete'], 200);
    
        
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }

    
   
}
