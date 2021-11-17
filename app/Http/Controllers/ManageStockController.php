<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ManageStockController extends Controller
{
    

    public function index (Request $request)
    {  
        $data = $request->json()->all();
       
        $sql = "Select ing_id, ing_name ,capacity 
        from ingredient_tb";
        
        $dataset['datastock'] = DB::select($sql);

        
        return view('managestock',['dataset'=>$dataset]);
       
    }

    public function saveMangeStock(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();

            $ing_name = $request->input('txtnamedes');
            $capacity = $request->input('txtamount');
            

            $data = array(
                'ing_name' => $ing_name,
            'capacity' => $capacity
             );
            
            
             DB::table("ingredient_tb")->insert( $data);
          

            return \Response::json(['message' => 'บันทึกการทำรายการเรียบร้อย'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }

   

    public function Editstock(Request $request)
    {
       
        try{
           
            $ing_id = $request->input('id_ing');
            $ing_name = $request->input('name_ing');
            $capacity = $request->input('amount_ing');
            // \Log::info("user_id: ".$user_id.
            // " password: ".$password.
            // " user_email: ".$user_email               
    
                
            $data = array('ing_id' => $ing_id,
            'ing_name' => $ing_name,
            'capacity' => $capacity
            );
            $result = DB::table('ingredient_tb')->where('ing_id','=',$ing_id)->update($data);
        
            
        return \Response::json(['message' => 'อัปเดตสต๊อกส่วนผสมแล้ว'], 200);
        } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);
    }
    }

   
   
    public function finddataStock(Request $request)
    {

        try{
            $ing_id = $request->input('ing_id');

            $sql = "SELECT
            ing_id,
            ing_name,
            capacity
        FROM
        ingredient_tb 
        WHERE ing_id = '$ing_id'";

        $result = DB::select($sql);

            return $result;
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }

  

    public function deleteStock(Request $request)
    {   
        try{
            \Log::info("start ");
           
            $ing_id = $request->input('ing_id');
          
            $result = DB::table('ingredient_tb')->where('ing_id',$ing_id)->delete();
            
            
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
