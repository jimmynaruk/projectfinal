<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ManageUserOrderController extends Controller
{
    

    public function index (Request $request)
    {  
        if(Session::get('haslogin') == 0 ){
            
            return view('login');
           
        }
        $user = Session::get('getuser');
        $userId = Session::get('getIdUser');

        $sql = "SELECT * FROM order_tb
        where username= \"$user\" and status = 'ยังไม่ชำระเงิน' ";
        $dataset['dataorderuser'] = DB::select($sql);
        
        $sql2 = "SELECT
        otb.order_id,
        otb.pickup_date,
        sum(odtb.price * odtb.quatity) AS total,
        odtb.username,
        odtb.pickup_date,
        otb.status
    FROM
        order_tb otb
    JOIN order_detail_tb odtb ON odtb.order_id = otb.order_id
    where otb.status = 'ยังไม่ชำระเงิน' and odtb.username= \"$user\"
    GROUP BY
        order_id,
        otb.pickup_date,odtb.username
        ,odtb.pickup_date,otb.status";


        $dataset['dataordermanage'] = DB::select($sql2);
        
        $sql3 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		WHERE map.group_code = '9300'";
        $dataset['mapfunc'] = DB::select($sql3);

        return view('manageUserOrder',['dataset'=>$dataset]);
        
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
    // public function UpdateUsed (Request $request)
    // {
       
    //     try{
    //     $id = $request->input('id');
    //     $used = $request->input('used');
          
    //         $data = array('used' => $used
    //         );
    //         $result = DB::table('stock_tb')->where('id','=',$id)->update($data);
        
            
    //     return \Response::json(['message' => 'บันทึกส่วนผสม'], 200);
    //     } catch (\Exception $e) {

    //     \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

    //     return \Response::json(['message' => $e->getMessage()], 500);
    // }
    // }
    
    // public function finddetailroom(Request $request)
    // {

    //     try{

    //         $room_id = $request->input('room_id');

    //         $sql = "SELECT
    //         rdt.room_id,
    //         rdt.room_size,
	// 					cpn.namecom,
	// 					rdt.Description
    //     FROM
    //        room_detail_tb rdt
    //     INNER JOIN company_tb cpn ON rdt.company_id = cpn.company_id
    //     WHERE rdt.room_id = '$room_id'";

    //     $result = DB::select($sql);

    //         return $result;
    //     }catch  (\Exception $e) {

    //         \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
    //         return \Response::json(['message' => $e->getMessage()], 500);
    
    //     }
    // }
    
}
