<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class editSilpController extends Controller
{
    public function index(Request $request)
    {   
        if(Session::get('haslogin') == 0 ){
            
            return view('login');
           
        }
        $userId = Session::get('getuser');

        $sql = "SELECT
        otb.order_id,
        sum(odtb.price * odtb.quatity) AS total,
        otb.username,
        otb.pickup_date,
        otb.pickup,
        otb.status,
        otb.Description 
    FROM
        order_tb otb
    JOIN order_detail_tb odtb ON odtb.order_id = otb.order_id
    where otb.status = 'รายการถูกยกเลิก' and odtb.username= \"$userId\"
    GROUP BY
        order_id,
        otb.pickup_date,otb.username
        ,otb.pickup,otb.status,otb.Description";
        \Log::info($sql);
        $dataset['silpedit'] = DB::select($sql);

        
        $group_code = $request->input('group_code');
        $sql2 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		WHERE map.group_code = '2'";
        $dataset['mapfunc'] = DB::select($sql2);

     return view('wrongslip',['dataset'=>$dataset]);
    }
    
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $imageName = $request->image->getClientOriginalName();
   
        $request->image->move(public_path('img/images'), $imageName);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
   
    }

    public function savepic(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();

            $order_id = $request->input('orderidinput');
            $uploadpic = $request->input('file');
            $str_arry=explode("\\",$uploadpic);
            $len = count($str_arry);
            $uploadpic=$str_arry[$len-1];

            $data = array('order_id' => $order_id,
                'uploadpic' => $uploadpic,
                'status' => 'รอการตรวจสอบ'
             );

             $result = DB::table('order_tb')->where('order_id','=',$order_id)->update($data);
             $data = array('order_id' => $order_id,
                'status' => 'รอการตรวจสอบ'
             );
            
             
             
             $result = DB::table('order_detail_tb')->where('order_id','=',$order_id)->update($data);

            return \Response::json(['message' => 'บันทึกรูปเรียบร้อย'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }

   
    
}
