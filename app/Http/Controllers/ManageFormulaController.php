<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManageFormulaController extends Controller
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
        
        $sql = "SELECT
        fdtb.formula_id,fdtb.product_id,pdtb.product_name,ing.ing_id,ing.ing_name,fdtb.weight

        FROM
            formula_detail_tb fdtb
        INNER JOIN product_detail_tb pdtb ON fdtb.product_id = pdtb.product_id
        INNER JOIN ingredient_tb ing ON fdtb.ing_id = ing.ing_id
        order by fdtb.product_id";

        $dataset['formuladetail'] = DB::select($sql);
    
        $sql2 = "SELECT * FROM product_detail_tb";

        $dataset['productname'] = DB::select($sql2);

        return view('ManageFormula',['dataset'=>$dataset]);

    }
    
  
    public function finddataFormula(Request $request)
    {

        try{
            $formula_id = $request->input('formula_id');

            $sql = "SELECT
            fdtb.formula_id,fdtb.product_id,pdtb.product_name,ing.ing_id,ing.ing_name,fdtb.weight
    
            FROM
                formula_detail_tb fdtb
            INNER JOIN product_detail_tb pdtb ON fdtb.product_id = pdtb.product_id
            INNER JOIN ingredient_tb ing ON fdtb.ing_id = ing.ing_id
            WHERE formula_id = '$formula_id'";

        $result = DB::select($sql);

            return $result;
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }

    public function EditFormula(Request $request)
    {
        \Log::info("[".__METHOD__."]"."start");
        try{
            
            $formula_id = $request->input('id_ing');
            $weight = $request->input('weight');
            // \Log::info("user_id: ".$user_id.
            // " password: ".$password.
            // " user_email: ".$user_email               
    
                
            $data = array('formula_id' => $formula_id,
            'weight' => $weight
            );

            DB::table('formula_detail_tb')->where('formula_id','=',$formula_id)->update($data);
        
            
        return \Response::json(['message' => 'อัปเดตสูตรส่วนผสมแล้ว'], 200);
        } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);
    }
    }


    public function deleteFormula(Request $request)
    {   
        try{
            \Log::info("start ");
           
            $formula_id = $request->input('formula_id');
          
            $result = DB::table('formula_detail_tb')->where('formula_id',$formula_id)->delete();
            
            
            if( $result == null || empty($result) || $result == "" ) {
            throw new  \Exception(" Data not found.");
        }
        
        return \Response::json(['message' => 'Delete Complete'], 200);
        
         } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);

    }
    
    }

    
    }