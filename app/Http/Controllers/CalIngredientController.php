<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CalIngredientController extends Controller
{
    

    public function index (Request $request)
    {  
        $data = $request->json()->all();
        $sql = "SELECT
        ing.ing_id,
        ing.ing_name,
        ing.capacity,
        SUM(fdtb.weight * oddt.quatity /1000) AS sum_quantity,
        ROUND(capacity-SUM(fdtb.weight * oddt.quatity /1000),2) AS added
        FROM
            ingredient_tb ing
        INNER JOIN  formula_detail_tb fdtb ON ing.ing_id = fdtb.ing_id
        INNER JOIN order_detail_tb oddt ON fdtb.product_id = oddt.product_id
        WHERE
        oddt.pickup_date = CURDATE() AND oddt.status = 'กำลังดำเนินการผลิต'
        GROUP BY ing.ing_id,ing.ing_name,ing.capacity";

        $dataset['dataingredient'] = DB::select($sql);

        return view('CalIngredient',['dataset'=>$dataset]);
        
    }

   
    public function UpdateUsed(Request $request){
        \Log::info("[".__METHOD__."]"."start");
        try{

            $data = $request->json()->all();
       
            $ing_id = $request->input('ingidname');
            $capacity = $request->input('addedtxt');
            \Log::info($ing_id);
            \Log::info($capacity);
           
            
            for($x = 0 ; $x < count($ing_id); $x++ ){
               
                $sql2 = "UPDATE order_detail_tb
                SET STATUS = 'ผลิตเสร็จสิ้น'
                WHERE
                    order_id in (
                        SELECT
                            order_id
                        FROM
                            order_detail_tb
                        WHERE
                            pickup_date = CURDATE()
                        AND STATUS = 'กำลังดำเนินการผลิต'
                        GROUP BY
                            order_id
                    )";
        
                $dataset2 = DB::select($sql2);

                $sql3 = "UPDATE order_tb
                SET STATUS = 'ผลิตเสร็จสิ้น'
                WHERE
                    order_id in (
                        SELECT
                            order_id
                        FROM
                            order_tb
                        WHERE
                            pickup_date = CURDATE()
                        AND STATUS = 'กำลังดำเนินการผลิต'
                        GROUP BY
                            order_id
                    )";
        
                $dataset3 = DB::select($sql3);
                \Log::info($dataset2);
                $data = array('ing_id' => $ing_id[$x],
                    'capacity' => $capacity[$x]
                );
              
            
        DB::table("ingredient_tb")->where('ing_id','=',$ing_id[$x])->update($data); 
    }
        return \Response::json(['message' => 'Update Complete'], 200);
    
        
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
    
  
    public function cutstock(Request $request){
        try{

        $data = $request->json()->all();
    //    \Log::info("[".__METHOD__."]"."start");
        $ing_id = $request->input('ingidname');
        $capacity = $request->input('capacitytxt');
        $used = $request->input('calstocktxt');
        \Log::info($ing_id);
        \Log::info($capacity);
        \Log::info($used);
        //     \Log::info($data);
          // $date  = \Carbon\Carbon::now()->timezone('Asia/Bangkok');
          for($x = 0 ; $x < count($ing_id); $x++ ){
            $result[$x] = $capacity[$x] - $used[$x];
            $result1[$x] = abs($result[$x]);
            if($result[$x]<0){
                
                throw new  \Exception ("ส่วนผสม $ing_id[$x] ไม่เพียงพอต่อการผลิต ต้องเพิ่มอีก $result1[$x] กิโลกรัม");
                
            }
                $data = array( 'ing_id' => $ing_id[$x],
                'capacity' => $result[$x]   
            );
        
         DB::table("ingredient_tb")->where('ing_id','=',$ing_id[$x])->update($data); 

            }
            
            return \Response::json(['message' => 'Update Stock'], 200);
        
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
}
