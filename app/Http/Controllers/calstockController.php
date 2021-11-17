<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class calstockController extends Controller
{
    

    public function index (Request $request)
    {  
        $data = $request->json()->all();
        $sql = "SELECT id_formulaping, name,  amount
                FROM detailping_tb";

        $dataset['dataformulaping'] = DB::select($sql);

        $sql = "SELECT id_formulapoon, name,  amount
                FROM detailpoon_tb";

        $dataset['dataformulapoon'] = DB::select($sql);
        
        $sql3 = "SELECT id_formulaping,name ,total,amount,amountinstock , (amount*total)/1000 as sum 
                 from detailping_tb";

        $dataset['formulasumping'] = DB::select($sql3);

        $sql4 = " SELECT id_formulapoon,name ,total,amount,amountinstock, (amount*total)/1000 as sum 
                    from detailpoon_tb";
     
        $dataset['formulasumpoon'] = DB::select($sql4);
      
        // foreach($dataset['formulasumpoon'] as $value){
        //     $r = $value->sum;
        //     DB::table("detailpoon_tb")->where('id_formulapoon',$value->id_formulapoon)->update(array('sum'=> $value->$r));
        // }
        $sql = "SELECT totalamountpoon,
        CURDATE()
    FROM
    amount_perday_tb
    WHERE
    date = CURDATE()";

        $dataset['amountdesdaypoon'] = DB::select($sql);

        $sql = "SELECT totalamountping,
        CURDATE()
    FROM
    amount_perday_tb
    WHERE
    date = CURDATE()";

        $dataset['amountdesdayping'] = DB::select($sql);
        
        return view('cal_ing',['dataset'=>$dataset]);
        
    }

    // public function UpdateUsed (Request $request)
    // {
     
    //     try{
    //         $data = $request->json()->all();
        
    //     $totalused = $request->input('usedtxtid');
          
    //         $data = array('id_formulaping' => $id_formulaping,
    //             'totalused' => $totalused
    //         );

    //         DB::table("detailping_tb")->where($id_formulaping)->update($data); 
        
            
    //     return \Response::json(['message' => 'บันทึกจำนวนส่วนผสมที่ต้องใช้'], 200);
    //     } catch (\Exception $e) {

    //     \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

    //     return \Response::json(['message' => $e->getMessage()], 500);
    // }
    // }
    
    
    
}
