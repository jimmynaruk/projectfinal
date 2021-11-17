<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CreateFormulaController extends Controller
{
    

    public function index (Request $request)
    {  
        // $chkGroup = Session::get('chk_groupCode')->group_code;

        // if ($chkGroup === 9200) {
        //     return redirect('main');
        // }
        
        if(Session::get('haslogin') == 0 ){
            
        return view('login');
       
        }
        $data = $request->json()->all();
        $sql = "SELECT * FROM product_detail_tb";

        $sql2 = "SELECT * FROM ingredient_tb";
        
        $group_code = $request->input('group_code');
        $sql3 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
        WHERE map.group_code = '9100'";

        $dataset['productname'] = DB::select($sql);
        $dataset['ingname'] = DB::select($sql2);
        $dataset['mapgroup'] = DB::select($sql3);
        return view('CreateFormula',['dataset'=>$dataset]);

    }
    
  
    public function saveFormula(Request $request)
    {
        try{
            
            $product_id = $request->input('selectgroupdata');
            $ing_id = $request->input('checkForid');
            $weight = $request->input('weight');
            
            \Log::info($ing_id);
            \Log::info($weight);
            // \Log::info($group_code);
           
            $result = DB::table('formula_detail_tb')->where('product_id',$product_id)->delete();
            \Log::info('$result'.$result);
        //    $wdadwawad=explode(" ",$function_id);
         
        //    \Log::info(json_encode($wdadwawad));
          
            for($x = 0 ; $x < count($ing_id); $x++){
            $data = array(
                'product_id' => $product_id,
                'ing_id' => $ing_id[$x],
                'weight' => $weight[$x]
            );
            DB::table("formula_detail_tb")->insert( $data);
        }
     

      
            return \Response::json(['message' => 'บันทึก'], 200);

        }catch (\Exception $e) {
            \Log::info('$e'.$e);
            return $e->getMessage();
        }
    }

    
    }