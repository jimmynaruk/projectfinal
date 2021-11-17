<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ShowStockController extends Controller
{
    

    public function index (Request $request)
    {  
        $data = $request->json()->all();
        $sql = "SELECT * 
                from ingredient_tb ";

        $dataset['cutformulaping'] = DB::select($sql);
       
       $sql2 = "SELECT id_formulapoon ,name,  amountinstock - (amount*total)/1000 as totalsum 
        from detailpoon_tb ";

       $dataset['cutformulapoon'] = DB::select($sql2);

        return view('showstock',['dataset'=>$dataset]);
        
    }
 public function ResetCal (Request $request)
    {
      \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();
        
            
            $amount = $request->input('ingidname');

         
                $data = array(
                    'amount' => $amount
                   
                );
                $result = DB::table('formula_detail_tb')->update($data);
            
             
            
        return \Response::json(['message' => 'Reset'], 200);
        } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);
    }
    }
  


}