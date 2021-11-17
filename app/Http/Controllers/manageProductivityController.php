<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class manageProductivityController extends Controller
{
    
    public function index (Request $request)
    {  
        $data = $request->json()->all();
        $sql = "SELECT
        ing.ing_id,
        ing.ing_name,
        ing.capacity,
        SUM(fdtb.weight * pdtb.product_capacity /1000)*2 AS sum_quantity,
        ROUND(capacity-SUM(fdtb.weight * pdtb.product_capacity /1000)*2,2) AS added
FROM
    ingredient_tb ing
INNER JOIN  formula_detail_tb fdtb ON ing.ing_id = fdtb.ing_id
INNER JOIN product_detail_tb pdtb ON fdtb.product_id = pdtb.product_id
GROUP BY ing.ing_id,ing.ing_name,ing.capacity";

        $dataset['dataNewingredient'] = DB::select($sql);

    $sql2 = " select * from product_detail_tb";
    $dataset['dataproduct'] = DB::select($sql2);
        return view('manageProductivity',['dataset'=>$dataset]);
        
    }

    public function EditProductivity(Request $request)
    {
        \Log::info("[".__METHOD__."]"."start");
        try{
            
            // $product_id = $request->input('txtproid');
            $amount = $request->input('txtperday');
            $product_capacity = $request->input('txtperday');
            // \Log::info("user_id: ".$user_id.
            // " password: ".$password.
            // " user_email: ".$user_email               
            // \Log::info($product_id);
            // \Log::info($amount);
           
            $data = array(
                'product_capacity' => $product_capacity
                );
    
                DB::table('product_detail_tb')->update($data);
            
        return \Response::json(['message' => 'อัปเดตสต๊อกส่วนผสมแล้ว'], 200);
        } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);
    }
    }

    public function UpdateCapacity(Request $request){
        \Log::info("[".__METHOD__."]"."start");
        try{

            $data = $request->json()->all();
       
            $ing_id = $request->input('ingidname');
            $capacity = $request->input('newcapacity');
            \Log::info($ing_id);
            \Log::info($capacity);
          
            for($x = 0 ; $x < count($ing_id); $x++ ){
                
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
}

  

